@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Galeria Campaña')
@section('titlePag','Galeria de la Campaña')
@section('navbar')
    @include('campaign._navbaredit')
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render('campaignGaleria') }}
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
                        <span class="hidden" id="campaign_id"></span>
                    </div>
                    <div class="col-auto mr-auto">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @yield('breadcrumbs')
                        </ol>
                    </div>
                </div>
            </div>
        </div>
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
                                            value="{{ old('campaign_name',$campaign->campaign_name) }}" disabled />
                                    </div>
                                    <div class="form-group col">
                                        <label for="campaign_initdate">Fecha Inicio</label>
                                        <input type="date" class="form-control form-control-sm" id="campaign_initdate"
                                            name="campaign_initdate"
                                            value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}"
                                            disabled />
                                    </div>
                                    <div class="form-group col">
                                        <label for="campaign_enddate">Fecha Finalización</label>
                                        <input type="date" class="form-control form-control-sm" id="campaign_enddate"
                                            name="campaign_enddate"
                                            value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                                            disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tcampaignElementos" class="table table-hover table-sm small" cellspacing="0" width=100%>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Elemento</th>
                                        <th>Imagen</th>
                                        <th>Img</th>
                                        <th>Observaciones</th>
                                        <th width="100px" class="text-center"><span class="ml-1">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($campaigngaleria as $imagen)
                                   <tr>
                                       <td>{{$imagen->id}}</td>
                                       <td>{{$imagen->elemento}}</td>
                                       <td>{{$imagen->imagen}}</td>
                                       <td>
                                            <a href="{{route('campaign.galeria.edit',[$imagen->campaign_id,$imagen->id])}}"><img src="{{asset('storage/galeria/'.$imagen->imagen)}}" id="{{$imagen->id}}imagen" title="imagen elemento" width="100px"/></a>
                                       </td>
                                       <td>{{$imagen->observaciones}}</td>
                                       <td>
                                       </td>
                                       <td width="100px">
                                          <div class="text-center">
                                             <a href="" title="Edit"><i class="far fa-edit text-primary fa-lg mx-1"></i></a>
                                             <a href="" title="Delete"><i class="far fa-trash-alt text-danger fa-lg ml-1"></i></a>
                                          </div>
                                       </td>
                                   </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scriptchosen')
{{-- <script src="{{ asset('js/campaignElementos.js')}}"></script> --}}

<script>
   $(document).ready(function() {

   });

    $('#menucampaign').addClass('active');
    $('#navgaleria').toggleClass('activo');

</script>

@endpush