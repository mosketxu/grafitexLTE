@extends('layouts.grafitex')

@section('styles')
<!-- DataTables -->
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> --}}
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css"> --}}
{{-- <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.css')}}"> --}}
@endsection

@section('title','Grafitex-Campañas')
@section('titlePag','Campañas')

@section('breadcrumbs')
{{ Breadcrumbs::render('campaign') }}
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{-- content header --}}
        @include('_partials._header')
        {{-- main content  --}}
        <section class="content">
            <div class="container-fluid">
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
                                <th width="100px" class="text-center">Est. &nbsp; &nbsp; &nbsp;Acción</th>
                            </tr>
                        </thead>
                        <tbody class="">
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- @include('campaign._campaignCreateModal') --}}
        </section>
    </div>
@endsection

@push('scriptchosen')
<!-- DataTables -->
{{-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> --}}
<script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

{{-- <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script> --}}
{{-- <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script> --}}

{{-- <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script> --}} --}}
{{-- <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script> --}}

<script>
    $(document).ready( function () {
                $('#tCampaigns').DataTable({
                    'processing': true,
                    'serverSide': true,
                    'ajax': "{{ route('api.campaigns.index') }}",
                    'columns': [
                        { 'data': 'id' },
                        { 'data': 'campaign_name' },
                        { 'data': 'campaign_initdate' },
                        { 'data': 'campaign_enddate' },
                        { 'data': 'created_at' },
                        { 'data': 'updated_at' },
                        // { 'data': 'campaign_state' },
                        { 'data': 'btn' },
                    ],
                });
            });
</script>

@endpush