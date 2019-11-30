<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;

    protected $fillable=['id','name','country','area','segmento','concept'];

    public function storeelementos()  
    {
        return $this->hasMany(StoreElemento::class);
    }

    public function campaignelementos()  
    {
        return $this->hasMany(CampaignElemento::class);
    }

    public function storeElement(){
        return $this->hasMany(StoreElement::class);
    }
}
