@extends('layouts.grafitex')

@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('title','Grafitex-Campañas')
@section('titlePag','Campañas')

@section('breadcrumbs')
{{ Breadcrumbs::render('campaign') }}
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-2">
        <div id="content-app">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header text-primary m-0 p-0">
                        @include('_partials._header')
                    </div>
                </div>
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
                                </tr>
                            </thead>
                            <tbody class="">
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- @include('campaign._campaignCreateModal') --}}
            </div>
        </div>
    </div>
@endsection

@push('scriptchosen')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

    <script>
            $(document).ready( function () {
                $('#tCampaigns').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('api.campaigns.index') }}",
                    "columns": [
                        { "data": "id" },
                        { "data": "campaign_name" },
                        { "data": "campaign_initdate" },
                        { "data": "campaign_enddate" },
                        { "data": "created_at" },
                        { "data": "updated_at" },
                    ]
                });
            });
        </script>

@endpush