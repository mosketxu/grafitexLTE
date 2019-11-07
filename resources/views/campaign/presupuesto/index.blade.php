@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Presupuestos')
@section('titlePag','Presupuesto')
@section('navbar')
    @include('campaign._navbarcampaign')
@endsection


@section('breadcrumbs')
{{-- {{ Breadcrumbs::render('campaign') }} --}}
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
                    <a href="" role="button" data-toggle="modal" data-target="#campaignPresupuestoCreateModal">
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
                        <table id="tpresupuesto" class="table table-hover table-sm small" cellspacing="0" width=100%>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Referencia</th>
                                    <th>Versión</th>
                                    <th>Fecha Presupuesto</th>
                                    <th>A la Atención</th>
                                    <th>Ámbito</th>
                                    <th>Observaciones</th>
                                    <th>Creado el:</th>
                                    <th>Modificado el:</th>
                                    <th>Estado</th>
                                    <th class="text-right">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($presupuestos as $presupuesto)
                                <tr>
                                    <td>{{$presupuesto->id}}</td>
                                    <td>{{$presupuesto->referencia}}</td>
                                    <td>{{$presupuesto->version}}</td>
                                    <td>{{$presupuesto->fecha}}</td>
                                    <td>{{$presupuesto->atención}}</td>
                                    <td>{{$presupuesto->ambito}}</td>
                                    <td>{{$presupuesto->observaciones}}</td>
                                    <td>{{$presupuesto->created_at}}</td>
                                    <td>{{$presupuesto->updated_at}}</td>
                                    <td>
                                        <div class="text-right">
                                            @if($presupuesto->estado==="Creado")
                                            <i class="fas fa-circle text-primary fa-lg"></i>
                                            @elseif($presupuesto->estado==="Iniciado")
                                            <i class="fas fa-circle text-teal fa-lg"></i>
                                            @elseif($presupuesto->estado==="Finalizado")
                                            <i class="fas fa-circle text-fuchsia fa-lg"></i>
                                            @else
                                            <i class="fas fa-circle text-warning fa-lg"></i>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right">
                                                {{-- <a href="{{route('campaign.destroy', $id )}}" title="Show"><i class="far fa-eye text-success fa-lg mr-1"></i></a> --}}
                                                <a href="{{route('campaign.presupuesto.edit', $presupuesto->id )}}" title="Edit"><i class="far fa-edit text-primary fa-lg mx-1"></i></a>
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
        <!-- Modal -->
        <div class="modal fade" id="campaignPresupuestoCreateModal" tabindex="-1" role="dialog"
            aria-labelledby="campaignPresupuestoCreateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="campaignPresupuestoCreateModalLabel">Nuevo Presupuesto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('campaign.presupuesto.store') }}">
                            @csrf
                            <input type="hidden" id="campaign_id" name="campaign_id" value="{{ $campaign->id }}" />
                            <div class="row">
                                <div class="form-group col">
                                    <label for="referencia">Referencia</label>
                                    <input type="text" class="form-control form-control-sm" id="referencia"
                                        name="referencia" value="{{ old('referencia') }}" />
                                </div>
                                <div class="form-group col">
                                    <label for="version">Versión</label>
                                    <input type="text" class="form-control form-control-sm" id="version" name="version"
                                        value="{{ old('version','1.0')}}" />
                                </div>
                                <div class="form-group col">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" id="fecha" name="fecha"
                                        value="{{ old('fecha') }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="ambito">Ámbito</label>
                                    <input type="text" class="form-control form-control-sm" id="ambito" name="ambito"
                                        value="{{ old('ambito','Nacional')}}" />
                                </div>
                                <div class="form-group col">
                                    <label for="atención">A la atención</label>
                                    <input type="text" class="form-control form-control-sm" id="atencion"
                                        name="atencion" value="{{ old('atención') }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="observaciones">Observaciones</label>
                                    <input type="memo" class="form-control form-control-sm" id="observaciones"
                                        name="observaciones" value="{{ old('atención') }}" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" name="Guardar" onclick="form.submit()">Guardar</button>
                            </div>
                        </form>
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
        $('#menucampaign').addClass('active');
        $('#navpresupuesto').toggleClass('activo');
    });
</script>

@endpush