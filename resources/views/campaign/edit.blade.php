@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Campañas Edit')
@section('titlePag','Edición campaña')

@section('breadcrumbs')
{{ Breadcrumbs::render('campaignEdit') }}
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    {{-- content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-auto ">
                    <span class="h3 m-0 text-dark">@yield('titlePag')</span>
                </div>
                <div class="col-auto mr-auto">
                    <a href="" role="button" data-toggle="modal" data-target="#campaignCreateModal">
                        <i class="fas fa-plus-circle fa-lg text-primary mt-2"></i>
                    </a>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @yield('breadcrumbs')
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- - /.content-header --}}
    {{-- main content  --}}
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="campaign_name">Campaña</label>
                                    <input type="text" class="form-control form-control-sm" id="campaign_name"
                                        name="campaign_name"
                                        value="{{ old('campaign_name',$campaignEdit->campaign_name) }}" disabled />
                                </div>
                                <div class="form-group col">
                                    <label for="campaign_initdate">Fecha Inicio</label>
                                    <input type="date" class="form-control form-control-sm" id="campaign_initdate"
                                        name="campaign_initdate"
                                        value="{{ old('campaign_initdate',$campaignEdit->campaign_initdate) }}"
                                        disabled />
                                </div>
                                <div class="form-group col">
                                    <label for="campaign_enddate">Fecha Finalización</label>
                                    <input type="date" class="form-control form-control-sm" id="campaign_enddate"
                                        name="campaign_enddate"
                                        value="{{ old('campaign_enddate',$campaignEdit->campaign_enddate) }}"
                                        disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Filtro Stores -->
                    <div class="card ">
                        <div class="card-header text-white bg-primary p-0" data-toggle="collapse" data-target="#stores">
                            <h3 class="card-title pl-3">Stores</h3>
                            <div class="card-tools pr-3">
                                <button type="button" class="btn btn-tool"><i id="btnstores"
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div id="stores" class="card-body collapse">
                            <form id="storesform" action="#" method="post">
                                <input type="hidden" name="_tokenStore" value="{{ csrf_token()}}"
                                    id="tokenStore">
                                <div class="form-group">
                                    @csrf
                                    <input type="hidden" class="" name="campaign_id" value="{{$campaignEdit->id}} " />
                                    <select class="duallistbox" multiple="multiple" name="storesduallistbox[]"
                                        size="5">
                                        @foreach ($storesDisponibles as $store )
                                        <option value="{{$store->id}}">{{$store->id}} {{$store->store}}
                                        </option>
                                        @endforeach
                                        @foreach ($storesAsociadas as $store )
                                        <option value="{{$store->store_id}}" selected="selected">{{$store->store_id}} {{$store->store}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociar({{ $campaignEdit->id}},'/campaignstore','#tokenStore','storesduallistbox[]','Stores','store','Store','CampaignStore')">Asociar Stores</button>
                            </form>
                        </div>

                    </div>

                    <!-- Filtro Medida -->
                    <div class="card ">
                        <div class="card-header text-white bg-info p-0" data-toggle="collapse"
                            data-target="#medidas">
                            <h3 class="card-title pl-3">Medida</h3>
                            <div class="card-tools pr-3">
                                <button type="button" class="btn btn-tool"><i id="btnmedidas"
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div id="medidas" class="card-body collapse">
                            <form id="medidaform" action="#" method="post">
                                <input type="hidden" name="_tokenMedida" value="{{ csrf_token()}}"
                                    id="tokenMedida">
                                <div class="form-group">
                                    @csrf
                                    <input type="hidden" class="" name="campaign_id" value="{{$campaignEdit->id}} " />
                                    <select class="duallistbox" multiple="multiple" name="medidasduallistbox[]"
                                        size="5">
                                        @foreach ($medidasDisponibles as $medida )
                                        <option value="{{$medida->id}}">{{$medida->medida}}</option>
                                        @endforeach
                                        @foreach ($medidasAsociadas as $medida )
                                        <option value="{{$medida->medida_id}}" selected="selected">
                                            {{$medida->medida}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociarMedida({{ $campaignEdit->id}})">Asociar Medidas</button> --}}
                                <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociar({{ $campaignEdit->id}},'/campaignmedida','#tokenMedida','medidasduallistbox[]','Medidas')">Asociar Medidas</button>
                                </form>
                        </div>
                    </div>

                    <!-- Filtro Carteleria -->
                    <div class="card ">
                        <div class="card-header text-white bg-info p-0" data-toggle="collapse"
                            data-target="#cartelerias">
                            <h3 class="card-title pl-3">Carteleria</h3>
                            <div class="card-tools pr-3">
                                <button type="button" class="btn btn-tool"><i id="btncartelerias"
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div id="cartelerias" class="card-body collapse">
                            <form id="carteleriaform" action="#" method="post">
                                <input type="hidden" name="_tokenCarteleria" value="{{ csrf_token()}}"
                                    id="tokenCarteleria">
                                <div class="form-group">
                                    @csrf
                                    <input type="hidden" class="" name="campaign_id" value="{{$campaignEdit->id}} " />
                                    <select class="duallistbox" multiple="multiple" name="carteleriasduallistbox[]"
                                        size="5">
                                        @foreach ($carteleriasDisponibles as $carteleria )
                                        <option value="{{$carteleria->id}}">{{$carteleria->carteleria}}</option>
                                        @endforeach
                                        @foreach ($carteleriasAsociadas as $carteleria )
                                        <option value="{{$carteleria->carteleria_id}}" selected="selected">
                                            {{$carteleria->carteleria}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociarCarteleria({{ $campaignEdit->id}})">Asociar Cartelerias</button> --}}
                                <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociar({{ $campaignEdit->id}},'/campaigncarteleria','#tokenCarteleria','carteleriasduallistbox[]','Cartelerias')">Asociar Cartelerias</button>
                                </form>
                        </div>
                    </div>
                    <!-- Filtro Mobiliario -->
                    <div class="card">
                        <div class="card-header text-white bg-success p-0" data-toggle="collapse"
                            data-target="#mobiliarios">
                            <h3 class="card-title pl-3">Mobiliario</h3>
                            <div class="card-tools pr-3">
                                <button type="button" class="btn btn-tool"><i id="btnmobiliarios"
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div id="mobiliarios" class="card-body collapse">
                            <form id="mobiliarioform" action="#" method="post">
                                <input type="hidden" name="_tokenMobiliario" value="{{ csrf_token()}}"
                                    id="tokenMobiliario">
                                <div class="form-group">
                                    @csrf
                                    <input type="hidden" class="" name="campaign_id" value="{{$campaignEdit->id}} " />
                                    <select class="duallistbox" multiple="multiple" name="mobiliariosduallistbox[]"
                                        size="5">
                                        @foreach ($mobiliariosDisponibles as $mobiliario )
                                        <option value="{{$mobiliario->id}}">{{$mobiliario->mobiliario}}</option>
                                        @endforeach
                                        @foreach ($mobiliariosAsociadas as $mobiliario )
                                        <option value="{{$mobiliario->mobiliario_id}}" selected="selected">
                                            {{$mobiliario->mobiliario}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociarMobiliario({{ $campaignEdit->id}})">Asociar Mobiliarios</button> --}}
                                <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociar({{ $campaignEdit->id}},'/campaignmobiliario','#tokenMobiliario','mobiliariosduallistbox[]','Mobiliarios')">Asociar Mobiliario</button>
                                </form>
                        </div>
                    </div>
                    <!-- Filtro Ubicacion -->
                    <div class="card">
                        <div class="card-header text-black bg-warning p-0" data-toggle="collapse"
                            data-target="#ubicaciones">
                            <h3 class="card-title pl-3">Ubicación</h3>
                            <div class="card-tools pr-3">
                                <button type="button" class="btn btn-tool"><i id="btnubicaciones"
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div id="ubicaciones" class="card-body collapse">
                            <form id="ubicacionform" action="#" method="post">
                                <input type="hidden" name="_tokenUbicacion" value="{{ csrf_token()}}"
                                    id="tokenUbicacion">
                                <div class="form-group">
                                    @csrf
                                    <input type="hidden" class="" name="campaign_id" value="{{$campaignEdit->id}} " />
                                    <select class="duallistboxSinFiltro" multiple="multiple"
                                        name="ubicacionesduallistbox[]" size="5">
                                        @foreach ($ubicacionesDisponibles as $ubicacion )
                                        <option value="{{$ubicacion->id}}">{{$ubicacion->ubicacion}}</option>
                                        @endforeach
                                        @foreach ($ubicacionesAsociadas as $ubicacion )
                                        <option value="{{$ubicacion->ubicacion_id}}" selected="selected">
                                            {{$ubicacion->ubicacion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociarUbicacion({{ $campaignEdit->id}})">Asociar Ubicaciones</button> --}}
                                <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociar({{ $campaignEdit->id}},'/campaignubicacion','#tokenUbicacion','ubicacionesduallistbox[]','Ubicaciones')">Asociar Ubicaciones</button>
                                </form>
                        </div>
                    </div>
                    <!-- Filtro Segmento -->
                    <div class="card">
                        <div class="card-header text-white bg-indigo p-0" data-toggle="collapse"
                            data-target="#segmentos">
                            <h3 class="card-title pl-3">Segmentos</h3>
                            <div class="card-tools pr-3">
                                <button type="button" class="btn btn-tool"><i id="btnsegmentos"
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div id="segmentos" class="card-body collapse">
                            <form id="segmentoform" action="#" method="post">
                                <input type="hidden" name="_tokenSegmento" value="{{ csrf_token()}}" id="tokenSegmento">
                                <div class="form-group">
                                    @csrf
                                    <input type="hidden" class="" name="campaign_id" value="{{$campaignEdit->id}} " />
                                    <select class="duallistboxSinFiltro" multiple="multiple"
                                        name="segmentosduallistbox[]" size="5">
                                        @foreach ($segmentosDisponibles as $segmento )
                                        <option value="{{$segmento->id}}">{{$segmento->segmento}}</option>
                                        @endforeach
                                        @foreach ($segmentosAsociadas as $segmento )
                                        <option value="{{$segmento->segmento_id}}" selected="selected">
                                            {{$segmento->segmento}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociarSegmento({{ $campaignEdit->id}})">Asociar Segmentos</button> --}}
                                <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociar({{ $campaignEdit->id}},'/campaignsegmento','#tokenSegmento','segmentosduallistbox[]','Segmentos')">Asociar Segmentos</button>

                                </form>
                        </div>
                    </div>
                    <!-- Filtro Store Concept -->
                    <div class="card">
                        <div class="card-header text-white bg-navy p-0" data-toggle="collapse"
                            data-target="#storeconcepts">
                            <h3 class="card-title pl-3">Store Concepts</h3>
                            <div class="card-tools pr-3">
                                <button type="button" class="btn btn-tool"><i id="btnstoreconcepts"
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div id="storeconcepts" class="card-body collapse">
                            <form id="storeconceptform" action="#" method="post">
                                <input type="hidden" name="_tokenStoreconcept" value="{{ csrf_token()}}"
                                    id="tokenStoreconcept">
                                <div class="form-group">
                                    @csrf
                                    <input type="hidden" class="" name="campaign_id" value="{{$campaignEdit->id}} " />
                                    <select class="duallistbox" multiple="multiple" name="storeconceptsduallistbox[]"
                                        size="5">
                                        @foreach ($storeconceptsDisponibles as $storeconcept )
                                        <option value="{{$storeconcept->id}}">{{$storeconcept->storeconcept}}</option>
                                        @endforeach
                                        @foreach ($storeconceptsAsociadas as $storeconcept )
                                        <option value="{{$storeconcept->storeconcept_id}}" selected="selected">
                                            {{$storeconcept->storeconcept}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociarStoreconcept({{ $campaignEdit->id}})">Asociar Store
                                    Concepts</button> --}}
                                <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociar({{ $campaignEdit->id}},'/campaignstoreconcept','#tokenStoreconcept','storeconceptsduallistbox[]','Store Concepts')">Asociar Store Concepts</button>
                            </form>
                        </div>
                    </div>

                    <!-- Filtro Area -->
                    <div class="card">
                        <div class="card-header text-white bg-purple p-0" data-toggle="collapse" data-target="#areas">
                            <h3 class="card-title pl-3">Area</h3>
                            <div class="card-tools pr-3">
                                <button type="button" class="btn btn-tool"><i id="btnareas"
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div id="areas" class="card-body collapse">
                            <form method="post" id="areaform" action="">
                                <input type="hidden" name="_tokenArea" value="{{ csrf_token()}}" id="tokenArea">
                                <div class="form-group">
                                    @csrf
                                    <input type="hidden" class="" name="campaign_id" value="{{$campaignEdit->id}} " />
                                    <select class="duallistbox" multiple="multiple" name="areasduallistbox[]" size="5">
                                        @foreach ($areasDisponibles as $area )
                                        <option value="{{$area->id}}">{{$area->area}}</option>
                                        @endforeach
                                        @foreach ($areasAsociadas as $area )
                                        <option value="{{$area->area_id}}" selected="selected">
                                            {{$area->area}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociarArea({{ $campaignEdit->id}})">Asociar Areas</button> --}}
                                <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociar({{ $campaignEdit->id}},'/campaignarea','#tokenArea','areasduallistbox[]','Areas')">Asociar Areas</button>
                            </form>
                        </div>
                    </div>

                    <!-- Filtro Country -->
                    <div class="card">
                        <div class="card-header text-white bg-fuchsia p-0" data-toggle="collapse"
                            data-target="#countries"">
                            <h3 class=" card-title pl-3">Country</h3>
                            <div class="card-tools pr-3">
                                <button type="button" class="btn btn-tool"><i id="btncountries"
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div id="countries" class="card-body collapse">
                            <form method="post" id="countryform" action="">
                                <input type="hidden" name="_tokenCountry" value="{{ csrf_token()}}" id="tokenCountry">
                                <div class="form-group">
                                    @csrf
                                    <input type="hidden" class="" name="campaign_id" value="{{$campaignEdit->id}} " />
                                    <select class="duallistboxSinFiltro" multiple="multiple"
                                        name="countriesduallistbox[]" size="5">
                                        @foreach ($countriesDisponibles as $country )
                                        <option value="{{$country->id}}">{{$country->country}}</option>
                                        @endforeach
                                        @foreach ($countriesAsociadas as $country )
                                        <option value="{{$country->id}}" selected="selected">
                                            {{$country->country}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociarCountry({{ $campaignEdit->id}})">Asociar Countries</button> --}}
                                <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociar({{ $campaignEdit->id}},'/campaigncountry','#tokenCountry','countriesduallistbox[]','Countries')">Asociar Countries</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scriptchosen')
<script>
    $(document).ready( function () {

    });
</script>
<script src="{{ asset('js/campaignEdit.js')}}"></script>


@endpush