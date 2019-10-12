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
                <div class="card-body">
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
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Filtro Stores -->
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Stores</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse"><i
                                                            class="fas fa-minus"></i></button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="remove"><i class="fas fa-remove"></i></button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <form id="storesform" action="#" method="post">
                                                            <div class="form-group">
                                                                <select class="duallistbox" multiple="multiple"
                                                                    name="storesduallistbox[]" size="5">
                                                                    @foreach ($storesDisponibles as $store )
                                                                    <option value="{{$store->id}}">{{$store->id}}
                                                                        {{$store->store_name}}</option>
                                                                    @endforeach
                                                                    @foreach ($storesAsociadas as $store )
                                                                    <option value="{{$store->id}}" selected="selected">
                                                                        {{$store->id}}
                                                                        {{$store->store_name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-default btn-block">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Filtro Medidas -->
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Medidas</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse"><i
                                                            class="fas fa-minus"></i></button>
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="remove"><i class="fas fa-remove"></i></button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <form id="medidasform" action="#" method="post">
                                                            <div class="form-group">
                                                                <select class="duallistbox" multiple="multiple"
                                                                    name="medidasduallistbox[]" size="5">
                                                                    @foreach ($medidasDisponibles as $medida )
                                                                    <option value="{{$medida->medida}}">{{$medida->medida}}</option>
                                                                    @endforeach
                                                                    @foreach ($storesAsociadas as $store )
                                                                    <option value="{{$medida->medida}}" selected="selected">{{$medida->medida}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-default btn-block">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
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
    //Bootstrap Duallistbox
    var demo1 = $('.duallistbox').bootstrapDualListbox({
        nonSelectedListLabel: 'No Seleccionadas',
        selectedListLabel: 'Seleccionadas',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: false,
    });
    $("#storeform").submit(function() {
      alert($('[name="storesduallistbox[]"]').val());
      return false;
    });
</script>

@endpush