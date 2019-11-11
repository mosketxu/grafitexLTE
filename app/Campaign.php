<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

use App\{CampaignPaisStore};


class Campaign extends Model
{
    use SoftDeletes;

    const CREADA = 0;
    const INICIADA = 1;
    const FINALIZADA = 2;
    const CANCELADA = 3;

    protected $fillable=['campaign_name','campaign_initdate','campaign_enddate','campaign_state','slug'];
    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();
       // registering a callback to be executed upon the creation of an activity AR
        static::creating(function($campaign) {
        $campaign->slug= \Str::slug($campaign->campaign_name);
        // check to see if any other slugs exist that are the same & count them
        $count = static::whereRaw("slug RLIKE '^{$campaign->slug}(-[0-9]+)?$'")->count();
        // if other slugs exist that are the same, append the count to the slug
            $campaign->slug = $count ? "{$campaign->slug}-{$count}" : $campaign->slug;
         });
    }

    static function inserta($tabla,$datos,$campo,$campaignId)
    {
        foreach (array_chunk($datos->toArray(),1000) as $t){
            $dataSet = [];
            foreach ($datos as $dato) {
                $dataSet[] = [
                    'campaign_id'  => $campaignId,
                    $campo  => $dato->$campo,
                ];
            }
            DB::table($tabla)->insert($dataSet);
        }
    }
    public function campaignStores(){
        return $this->hasMany(CampaignStore::class);
    }
    public function campaignElementos(){
        return $this->hasMany(CampaignElemento::class);
    }

    static function getConteoMaterial($campaignId)
    {
        return CampaignElemento::where('campaign_id',$campaignId)
            ->select('material',DB::raw('count(*) as totales'),DB::raw('SUM(unitxprop) as unidades'))
            ->groupBy('material')
            ->get();

    }

    static function getConteoPaisStores($campaignId)
    {
        return CampaignPaisStore::where('campaign_id',$campaignId)
            ->select('country',DB::raw('count(*) as totales'))
            ->groupBy('country')
            ->get();
    }
}


// $imagenes=CampaignElemento::where('campaign_id',$id)
// ->distinct('campaign_id','mobiliario','carteleria','medida')
// ->select('campaign_id',DB::raw("REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(CONCAT(mobiliario,carteleria,medida),' ',''),'.',''),'(',''),')',''),'+','') as elemento"))
// ->get();


// foreach (array_chunk($imagenes->toArray(),1000) as $t){
//     $dataSet = [];
//     foreach ($generar as $gen) {
//         $dataSet[] = [
//             'campaign_id'  => $id,
//             'mobiliario'  => $gen->mobiliario,
//             'carteleria'  => $gen->carteleria,
//             'medida'  => $gen->medida,
//             'elemento'  => str_replace('.','',str_replace(')','',str_replace('(','',str_replace('-','',str_replace(' ','',$gen->mobiliario.'-'.$gen->carteleria.'-'.$gen->medida))))),
//             'imagen'  => 'pordefecto.jpg',
//         ];
//     }
//     DB::table('campaign_galerias')->insert($dataSet);