@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Elementos Campaña')
@section('titlePag','Elementos Campaña')
@section('navbar')
    @include('campaign._navbaredit')
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render('campaignElementos') }}
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
                                        <th>Store</th>
                                        <th>Country</th>
                                        <th>Name</th>
                                        <th>Area</th>
                                        <th>Segmento</th>
                                        <th>Store Concept</th>
                                        <th>Ubicación</th>
                                        <th>Mobiliario</th>
                                        <th>Prop x Elemento</th>
                                        <th>Carteleria</th>
                                        <th>Medida</th>
                                        <th>Material</th>
                                        <th>Unit x Prop</th>
                                        <th>Imagen</th>
                                        <th>Observaciones</th>
                                        <th>Precio</th>
                                        <th width="100px" class="text-center"><span class="ml-1">Est. </span> &nbsp; &nbsp; &nbsp;Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="">
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
<script src="{{ asset('js/campaignElementos.js')}}"></script>
<script>
    $(document).ready( function () {
        $('#tcampaignElementos').DataTable({
            'ajax': "{{ route('api.campaigns.elementos',$campaign->id) }}",
            'columns': [
                { 'data': 'store' },{ 'data': 'country' }, { 'data': 'name' }, { 'data': 'area' },
                { 'data': 'segmento' }, { 'data': 'storeconcept' }, { 'data': 'ubicacion' },
                { 'data': 'mobiliario' }, { 'data': 'propxelemento' }, { 'data': 'carteleria' },
                { 'data': 'medida' }, { 'data': 'material' }, { 'data': 'unitxprop' },
                { 'data': 'imagen' }, { 'data': 'observaciones' }, { 'data': 'precio' }, { 'data': 'btn' },
            ],
            dom: 'lBfrtip',
            buttons: true
    });
    });
</script>

@endpush