@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Campañas')
@section('titlePag','Campañas')
@section('navbar')
    @include('_partials._navbar')
@endsection


@section('breadcrumbs')
{{ Breadcrumbs::render('campaign') }}
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tCampaigns" class="table table-hover table-sm small" cellspacing="0" width=100%>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Campaña</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin Prevista</th>
                                        <th>Creada el:</th>
                                        <th>Modificada el:</th>
                                        {{-- <th>Estado</th> --}}
                                        <th class="text-right"><span class="ml-1">Est. </span> &nbsp; &nbsp; &nbsp;Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
                    </div>
            @include('campaign._campaignCreateModal')
        </section>
    </div>
@endsection

@push('scriptchosen')

<script src="{{ asset('js/datatablesdefault.js')}}"></script>
<script>
    $(document).ready( function () {
        $('#tCampaigns').DataTable({
            'ajax': "{{ route('api.campaigns.index') }}",
            'columns': [
                { 'data': 'id' },
                { 'data': 'campaign_name' },
                { 'data': 'campaign_initdate' },
                { 'data': 'campaign_enddate' },
                { 'data': 'created_at' },
                { 'data': 'updated_at' },
                { 'data': 'btn' },
            ],
            'processing': true,
            'serverSide': true,
            'paging':true,
            'orderMulti': true,
            'keys': false,
            'stateSave': false,
            'blurable': false,
            'responsive': true,
            'colReorder': true,
            'dom': 'lfrtip',
            'language': {'url': '//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json'}
        });
        $('.select2').select2({
            theme: 'bootstrap4'
        });

        $('#menucampaign').addClass('active');
        $('#navcampaigns').toggleClass('activo');
    });
</script>

@endpush

