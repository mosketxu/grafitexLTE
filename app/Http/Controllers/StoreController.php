<?php

namespace App\Http\Controllers;

use App\{Area,Country,Segmento, Store, StoreElemento, Elemento, Storeconcept};
use Illuminate\Support\Facades\DB;

use Image;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->busca) {
            $busqueda = $request->busca;
        } else {
            $busqueda = '';
        } 

        $stores=Store::search($request->busca)
        ->orderBy('id')
        ->paginate('10')->onEachSide(1);

        $totalStores=Store::count();
        $countries=Country::get();
        $areas=Area::orderBy('area')->get();
        $segmentos=Segmento::orderBy('segmento')->get();
        $conceptos=Storeconcept::orderBy('storeconcept')->get();

        // $stores=Store::with('StoreElement')
        //     ->orderBy('id','asc')
        //     ->paginate(10);

        return view('stores.index',compact('stores','totalStores','busqueda','countries','areas','segmentos','conceptos'));
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
        $request->validate([
            'id'=>'required|unique:stores',
            'name'=>'required',
            'country'=>'required',
            'area_id'=>'required',
            'segmento'=>'required',
            'concepto_id'=>'required',
        ]);
        
        $a=Area::find($request->area_id)->area;
        $c=Storeconcept::find($request->concepto_id)->storeconcept;
        if($request->area=="Canarias")
            $z="CA";
        else
            $z=$request->country;

        DB::table('stores')->insert([
            'id'=>$request->id,
            'name'=>$request->name,
            'country'=>$request->country,
            'zona'=>$z,
            'area_id'=>$request->area_id,
            'area'=>$a,
            'segmento'=>$request->segmento,
            'concepto_id'=>$request->concepto_id,
            'concepto'=>$c,
            'observaciones'=>$request->observaciones,
             ]
        );

        $notification = array(
            'message' => 'Elemento creado satisfactoriamente!',
            'alert-type' => 'success'
        );
        return redirect('store')->with($notification);

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
    public function edit($id)
    {
        $storeEdit = Store::find($id);

        $elementosDisponibles = Elemento::whereNotIn('id', function ($query) use ($id) {
            $query->select('store_id')->from('store_elements')->where('store_id', '=', $id);
            })->get();
        $storesAsociadas = Elemento::whereIn('id', function ($query) use ($id) {
            $query->select('store_id')->from('store_elements')->where('store_id', '=', $id);
        })->get();

        return view('store.edit', compact('storeEdit', 'elementosDisponibles', 'storesAsociadas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateimagenindex(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image|mimes:pdf,jpeg,png,jpg,gif,svg|max:2048',
        ]);
            
        $store=Store::find($request->id);
        // json_decode($request->campaigngaleria);

        
        //Por si me interesa estos datos de la imagen
        $extension=$request->file('imagen')->getClientOriginalExtension();
        $tipo=$request->file('imagen')->getClientMimeType();
        $nombre=$request->file('imagen')->getClientOriginalName();
        $tamayo=$request->file('imagen')->getClientSize();
        
        // Genero el nombre que le pondré a la imagen
        $file_name=$store->id.'.jpg'; 

        // Si no existe la carpeta la creo
        $ruta = public_path().'/storage/store';
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
            mkdir($ruta.'/thumbnails', 0777, true);
        }
        
        // verifico si existe la imagen y la borro si existe. Busco el nombre que debería tener.
        $mi_imagen = $ruta.'/'.$file_name;
        $mi_imagenthumb = $ruta.'/thumbails/'.$file_name;


        if (@getimagesize($mi_imagen)) {
            unlink($mi_imagen);
        }
        if (@getimagesize($mi_imagenthumb)) {
            unlink($mi_imagenthumb);
        }
        
        

        // verifico que realmente llega un fichero
        if($files=$request->file('imagen')){
            // for save the original image
            $imageUpload=Image::make($files)->encode('jpg');
            $originalPath='storage/store/';
            $imageUpload->save($originalPath.$file_name);
        }

        Image::make($request->file('imagen'))
            ->resize(144,144)
            ->encode('jpg')
            ->save('storage/store/thumbnails/thumb-'.$file_name);


        $store->imagen = $file_name;
        $store->save();

        // $image = CampaignGaleria::latest()->first(['imagen_name']);
        return Response()->json($store);

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
