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
                                    <th class="text-right">Est. &nbsp; &nbsp; &nbsp; Op. &nbsp; &nbsp; </th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($campaigns as $campaign)
                                <tr data-entry-id="{{ $campaign->id }}">
                                    <td>{{$campaign->id ?? '' }}</td>
                                    <td>{{$campaign->campaign_name ?? '' }}</td>
                                    <td>{{$campaign->campaign_initdate ?? '' }}</td>
                                    <td>{{$campaign->campaign_enddate ?? '' }}</td>
                                    <td>{{$campaign->created_at ?? '' }}</td>
                                    <td>{{$campaign->updated_at ?? '' }}</td>
                                    <td class="text-right">
                                        @if($campaign->campaign_state===0)
                                        <i class="fas fa-circle text-primary fa-xs"></i>
                                        @elseif($campaign->campaign_state===1)
                                        <i class="fas fa-circle text-warning fa-xs"></i>
                                        @else
                                        <i class="fas fa-circle text-success fa-xs"></i>
                                        @endif
                                        &nbsp; &nbsp;
                                        <a href="{{route('campaign.show',$campaign->id) }}" title="Show"><i
                                                class="far fa-eye text-success"></i></a>
                                        <a href="{{route('campaign.edit',$campaign->id) }}" title="Edit"><i
                                                class="far fa-edit text-primary"></i></a>
                                        <a href="{{route('campaign.destroy',$campaign->id)}}" title="Delete"><i
                                                class="far fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                                @endforeach
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
        $(document).ready(function () {
            $('#tCampaigns').DataTable();
        });
    </script>

@endpush