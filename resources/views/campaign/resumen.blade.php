@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Resumen Campaña')
@section('titlePag','Elementos generados')

@section('breadcrumbs')
{{ Breadcrumbs::render('campaignResumen') }}
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
                        <span class="hidden" id="campaign_id">{{$campaign->id}}</span>
                    </div>
                    <div class="col-auto mr-auto">
                        aqui
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tcampaignResumen" class="table table-hover table-sm small" cellspacing="0" width=100%>
                                <thead>
                                    <tr>
                                        <th>#</th>
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
            {{-- @include('campaign._campaignCreateModal') --}}
        </section>
    </div>
@endsection

@push('scriptchosen')
<script>
    $(document).ready( function () {
        $('#tcampaignResumen').DataTable({
            'processing': true,
            'serverSide': true,
            'ajax': "{{ route('api.campaigns.resumen',$campaign->id) }}",
            'columns': [
                { 'data': 'id' },
                { 'data': 'store' },
                { 'data': 'country' },
                { 'data': 'name' },
                { 'data': 'area' },
                { 'data': 'segmento' },
                { 'data': 'storeconcept' },
                { 'data': 'ubicacion' },
                { 'data': 'mobiliario' },
                { 'data': 'propxelemento' },
                { 'data': 'carteleria' },
                { 'data': 'medida' },
                { 'data': 'material' },
                { 'data': 'unitxprop' },
                { 'data': 'imagen' },
                { 'data': 'observaciones' },
                { 'data': 'precio' },
                { 'data': 'btn' },
            ],
        });
        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>

@endpush