<?php

namespace App\Http\Controllers;

use App\{CampaignStore, Store};
use App\{CampaignMedida, Medida};
use App\{CampaignCarteleria, Carteleria};
use App\{CampaignMobiliario, Mobiliario};
use App\{CampaignUbicacion, Ubicacion};
use App\{CampaignSegmento, Segmento};
use App\{CampaignStoreconcept, Storeconcept};
use App\{CampaignArea, Area};
use App\{CampaignCountry, Country};
use App\Http\Requests\CampaignCountryRequest; 
use Illuminate\Http\Request;


class CampaignAsociarController extends Controller
{
    public function stores(Request $request)
    {
        if ($request->ajax()) {
            $campaign = $request->campaign_id;
            $stores = $request->datoslist;
            CampaignStore::where('campaign_id', '=', $campaign)->delete();
            $data = array();
            $contador = !is_null($request->datoslist);

            if (!is_null($request->datoslist)) {
                foreach ($stores as $store) {
                    if (!empty($store)) {
                        $c = Store::find($store);
                        $data[] = [
                            'campaign_id' => $campaign,
                            'store_id' => $store,
                            'store' => $c->store
                        ];
                    }
                }

                CampaignStore::insert($data);
            }

            return response()->json([
                "mensaje" => $request->all(),
                "cont" => $contador,
            ]);
        }
    }

    public function medidas(Request $request)
    {
        if ($request->ajax()) {
            $campaign=$request->campaign_id;
            $medidas = $request->datoslist;
            CampaignMedida::where('campaign_id','=',$campaign)->delete();
            $data=array();
            $contador=!is_null($request->datoslist);

            if(!is_null($request->datoslist)){
                foreach($medidas as $medida){
                    if(!empty($medida)){
                        $c=Medida::find($medida);
                        $data[]=[
                            'campaign_id'=>$campaign,
                            'medida_id'=>$medida,
                            'medida'=>$c->medida
                        ];
                    }
                }
            
                CampaignMedida::insert($data);
            }          
            return response()->json([
                "mensaje" => $request->all(),
                "cont"=>$contador,
                ]);
        }
    }

    public function cartelerias(Request $request)
    {
        if ($request->ajax()) {
            $campaign = $request->campaign_id;
            $cartelerias = $request->datoslist;
            CampaignCarteleria::where('campaign_id', '=', $campaign)->delete();
            $data = array();
            $contador = !is_null($request->datoslist);

            if (!is_null($request->datoslist)) {
                foreach ($cartelerias as $carteleria) {
                    if (!empty($carteleria)) {
                        $c = Carteleria::find($carteleria);
                        $data[] = [
                            'campaign_id' => $campaign,
                            'carteleria_id' => $carteleria,
                            'carteleria' => $c->carteleria
                        ];
                    }
                }
                CampaignCarteleria::insert($data);
            }
            return response()->json([
                "mensaje" => $request->all(),
                "cont" => $contador,
            ]);
        }
    }

    public function mobiliarios(Request $request)
    {
        if ($request->ajax()) {
            $campaign=$request->campaign_id;
            $mobiliarios = $request->datoslist;
            CampaignMobiliario::where('campaign_id','=',$campaign)->delete();
            $data=array();
            $contador=!is_null($request->datoslist);

            if(!is_null($request->datoslist)){            
                foreach($mobiliarios as $mobiliario){
                    if(!empty($mobiliario)){
                        $c=Mobiliario::find($mobiliario);
                        $data[]=[
                            'campaign_id'=>$campaign,
                            'mobiliario_id'=>$mobiliario,
                            'mobiliario'=>$c->mobiliario
                        ];
                    }
                }
            
                CampaignMobiliario::insert($data);
            }
            return response()->json([
                "mensaje" => $request->all(),
                "cont"=>$contador,
                ]);
        }
    }

    public function ubicaciones(Request $request)
    {
        if ($request->ajax()) {
            $campaign = $request->campaign_id;
            $ubicaciones = $request->datoslist;
            CampaignUbicacion::where('campaign_id', '=', $campaign)->delete();
            $data = array();
            $contador = !is_null($request->datoslist);

            if (!is_null($request->datoslist)) {
                foreach ($ubicaciones as $ubicacion) {
                    if (!empty($ubicacion)) {
                        $c = Ubicacion::find($ubicacion);
                        $data[] = [
                            'campaign_id' => $campaign,
                            'ubicacion_id' => $ubicacion,
                            'ubicacion' => $c->ubicacion
                        ];
                    }
                }

                CampaignUbicacion::insert($data);
            }

            return response()->json([
                "mensaje" => $request->all(),
                "cont" => $contador,
            ]);
        }
    }

    public function segmentos(Request $request)
    {
        if ($request->ajax()) {
            $campaign=$request->campaign_id;
            $segmentos = $request->datoslist;
            CampaignSegmento::where('campaign_id','=',$campaign)->delete();
            $data=array();
            $contador=!is_null($request->datoslist);

            if(!is_null($request->datoslist)){            
                foreach($segmentos as $segmento){
                    if(!empty($segmento)){
                        $c=Segmento::find($segmento);
                        $data[]=[
                            'campaign_id'=>$campaign,
                            'segmento_id'=>$segmento,
                            'segmento'=>$c->segmento
                        ];
                    }
                }
            
                CampaignSegmento::insert($data);
            }
            return response()->json([
                "mensaje" => $request->all(),
                "cont"=>$contador,
                ]);
        }
    }

    public function storeconcepts(Request $request)
    {
        if ($request->ajax()) {
            $campaign=$request->campaign_id;
            $storeconcepts = $request->datoslist;
            CampaignStoreconcept::where('campaign_id','=',$campaign)->delete();
            $data=array();
            $contador=!is_null($request->datoslist);

            if(!is_null($request->datoslist)){
            foreach($storeconcepts as $storeconcept){
                if(!empty($storeconcept)){
                    $c=StoreConcept::find($storeconcept);
                    $data[]=[
                        'campaign_id'=>$campaign,
                        'storeconcept_id'=>$storeconcept,
                        'storeconcept'=>$c->storeconcept
                    ];
                }
            }
            
            CampaignStoreconcept::insert($data);
        }  
            return response()->json([
                "mensaje" => $request->all(),
                "cont"=>$contador,
                ]);
        }
    }

    public function areas(Request $request)
    {
        if ($request->ajax()) {
            $campaign = $request->campaign_id;
            $areas = $request->datoslist;
            CampaignArea::where('campaign_id', '=', $campaign)->delete();
            $data = array();
            $contador = !is_null($request->datoslist);

            if (!is_null($request->datoslist)) {
                foreach ($areas as $area) {
                    if (!empty($area)) {
                        $c = Area::find($area);
                        $data[] = [
                            'campaign_id' => $campaign,
                            'area_id' => $area,
                            'area' => $c->area
                        ];
                    }
                }
                CampaignArea::insert($data);
            }

            return response()->json([
                "mensaje" => $request->all(),
                "cont" => $contador,
            ]);
        }
    }

    public function countries(CampaignCountryRequest $request)
    {
        if ($request->ajax()) {
            $campaign=$request->campaign_id;
            $countries = $request->datoslist;
            CampaignCountry::where('campaign_id','=',$campaign)->delete();
            $data=array();
            $contador=!is_null($request->datoslist);

            if(!is_null($request->datoslist)){
                foreach($countries as $country){
                    if(!empty($country)){
                        $c=Country::find($country);
                        $data[]=[
                            'campaign_id'=>$campaign,
                            'country_id'=>$country,
                            'country'=>$c->country
                        ];
                    }
                }
                
                CampaignCountry::insert($data);
            }
            return response()->json([
                "mensaje" => $request->all(),
                "cont"=>$contador,
                ]);
        }
    }



}
