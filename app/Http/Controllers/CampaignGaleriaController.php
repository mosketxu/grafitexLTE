<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\CampaignGaleria;
use Image;
use Illuminate\Http\Request;


class CampaignGaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($campaignId)
    {
        $campaign=Campaign::find($campaignId);
        $campaigngaleria=CampaignGaleria::where('campaign_id',$campaignId)->get();

        // dd($campaign);

        return view('campaign.galeria.index',compact('campaign','campaigngaleria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($campaignId,$imagenId)
    {
        $campaign=Campaign::find($campaignId);
        $campaigngaleria=CampaignGaleria::where('id',$imagenId)->first();

        return view('campaign.galeria.edit',compact('campaign','campaigngaleria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $campGal=json_decode($request->campaigngaleria);


        //Por si me interesa estos datos de la imagen
        $extension=$request->file('photo')->getClientOriginalExtension();
        $tipo=$request->file('photo')->getClientMimeType();
        $nombre=$request->file('photo')->getClientOriginalName();
        $tamayo=$request->file('photo')->getClientSize();
        
        // Genero el nombre que le pondré a la imagen
        $file_name=$campGal->elemento.'-'.$campGal->campaign_id.'.'.$extension;

        // verifico si existe la imagen y la borro si existe. Busco el nombre que debería tener.
        $mi_imagen = public_path().'/storage/galeria/'.$file_name;
        $mi_imagenthumb = public_path().'/storage/galeria/thumbails/thumb-'.$file_name;
        if (@getimagesize($mi_imagen)) {
            unlink($mi_imagen);
        }
        if (@getimagesize($mi_imagenthumb)) {
            unlink($mi_imagenthumb);
        }

        // verifico que realmente llega un fichero
        if($files=$request->file('photo')){
            // for save the original image
            $imageUpload=Image::make($files);
            $originalPath='storage/galeria/';
            $imageUpload->save($originalPath.$file_name);
        }
        Image::make($request->file('photo'))
            ->resize(144,144)
            ->save('storage/galeria/thumbnails/thumb-'.$file_name);

        $campaigngaleria=CampaignGaleria::find($campGal->id);
        $campaigngaleria->imagen = $file_name;
        $campaigngaleria->save();

        // $image = CampaignGaleria::latest()->first(['photo_name']);
        return Response()->json($campaigngaleria);

        // return back()
        //     ->with('success', 'You have successfully upload image.');
    }
   
    public function updateindex(Request $request)
    {
        // dd($request);
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            $campGal=CampaignGaleria::find($request->imagenId);
            // json_decode($request->campaigngaleria);
        
        //Por si me interesa estos datos de la imagen
        $extension=$request->file('photo')->getClientOriginalExtension();
        $tipo=$request->file('photo')->getClientMimeType();
        $nombre=$request->file('photo')->getClientOriginalName();
        $tamayo=$request->file('photo')->getClientSize();
        
        // Genero el nombre que le pondré a la imagen
        $file_name=$campGal->elemento.'-'.$campGal->campaign_id.'.'.$extension;

        // verifico si existe la imagen y la borro si existe. Busco el nombre que debería tener.
        $mi_imagen = public_path().'/storage/galeria/'.$file_name;
        $mi_imagenthumb = public_path().'/storage/galeria/thumbails/thumb-'.$file_name;
        if (@getimagesize($mi_imagen)) {
            unlink($mi_imagen);
        }
        if (@getimagesize($mi_imagenthumb)) {
            unlink($mi_imagenthumb);
        }

        // verifico que realmente llega un fichero
        if($files=$request->file('photo')){
            // for save the original image
            $imageUpload=Image::make($files);
            $originalPath='storage/galeria/';
            $imageUpload->save($originalPath.$file_name);
        }
        Image::make($request->file('photo'))
            ->resize(144,144)
            ->save('storage/galeria/thumbnails/thumb-'.$file_name);

        $campaigngaleria=CampaignGaleria::find($campGal->id);
        $campaigngaleria->imagen = $file_name;
        $campaigngaleria->save();

        // $image = CampaignGaleria::latest()->first(['photo_name']);
        return Response()->json($campaigngaleria);

        // return back()
        //     ->with('success', 'You have successfully upload image.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
