@extends('layouts.grafitex')

@section('styles')
@endsection

@section('title','Grafitex-Presupuesto Editar')
@section('titlePag','Edición del presupuesto')
@section('navbar')
@include('campaign._navbarcampaign')
@endsection
@section('breadcrumbs')
{{-- {{ Breadcrumbs::render('campaignpresupuestos') }} --}}
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
                              name="campaign_name" value="{{ old('campaign_name',$campaign->campaign_name) }}"
                              disabled />
                        </div>
                        <div class="form-group col">
                           <label for="campaign_initdate">Fecha Inicio</label>
                           <input type="date" class="form-control form-control-sm" id="campaign_initdate"
                              name="campaign_initdate"
                              value="{{ old('campaign_initdate',$campaign->campaign_initdate) }}" disabled />
                        </div>
                        <div class="form-group col">
                           <label for="campaign_enddate">Fecha Finalización</label>
                           <input type="date" class="form-control form-control-sm" id="campaign_enddate"
                              name="campaign_enddate" value="{{ old('campaign_enddate',$campaign->campaign_enddate) }}"
                              disabled />
                        </div>
                     </div>
                     <div class="row">
                        Hay un total de {{$totalPaisStores}} tiendas, de ellas
                        @foreach($paisStores as $paisStore)
                        {{ $paisStore->totales }} {{ $paisStore->country }} ,
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="form-group col">
                           <label class="form-label-sm" for="referencia">Referencia<span
                                 class="badge badge-primary navbar-badge">{{$campaignpresupuesto->id}}</span></label>
                           <input type="text" class="form-control-sm form-control" id="referencia" name="referencia"
                              value="{{$campaignpresupuesto->referencia}}" readonly>
                        </div>
                        <div class="form-group col-1">
                           <label class="form-label-sm" for="version">Versión</label>
                           <input type="number" class="form-control-sm form-control" id="version" name="version"
                              step="0.1" value="{{$campaignpresupuesto->version}}" readonly>
                        </div>
                        <div class="form-group col">
                           <label class="form-label-sm" for="fecha">Fecha</label>
                           <input type="date" class="form-control-sm form-control" id="fecha" name="fecha"
                              value="{{$campaignpresupuesto->fecha}}" readonly>
                        </div>
                        <div class="form-group col">
                           <label class="form-label-sm" for="atencion">Atención</label>
                           <input type="text" class="form-control-sm form-control" id="atencion" name="atencion"
                              value="{{$campaignpresupuesto->atencion}}" readonly>
                        </div>
                        <div class="form-group col">
                           <label class="form-label-sm" for="ambito">Ámbito</label>
                           <input type="text" class="form-control-sm form-control" id="ambito" name="ambito"
                              value="{{$campaignpresupuesto->ambito}}" readonly>
                        </div>
                        <div class="form-group col-1">
                           <label class="form-label-sm" for="estado">Estado</label>
                           <input type="text" class="form-control-sm form-control" id="estado" name="estado"
                              value="{{$campaignpresupuesto->estado}}" readonly>
                        </div>
                        <div class="form-group col">
                           <label class="form-label-sm" for="observaciones">Observaciones</label>
                           <input type="text" class="form-control-sm form-control" id="observaciones"
                              name="observaciones" value="{{$campaignpresupuesto->observaciones}}" readonly>
                        </div>
                     </div>
                  </div>
                  <div class="card-body m-1 p-0">
                     <div class="row">
                        <!-- Materiales -->
                        <div class="col-6">
                           <div class="card collapsed-card">
                              {{-- titulo card --}}
                              <div class="card-header text-white bg-primary p-0" data-card-widget="collapse"
                                 style="cursor: pointer">
                                 <h3 class="card-title pl-3">Materiales</h3><span class="sumTotMat ml-3">
                                    {{number_format($totalMateriales,2,',','.')}}</span>
                                 <div class="card-tools pr-3">
                                    <button type="button" class="btn btn-tool"><i class="fas fa-plus"></i></button>
                                 </div>
                              </div>
                              {{-- tabla presupuesto materiales --}}
                              <div class="card-body">
                                 <div class="table-responsive">
                                    <table id="tMaterial" class="table table-hover table-sm small sortable"
                                       cellspacing="0" width=100%>
                                       <thead>
                                          <tr>
                                             <th class="text-left px-2">Material</th>
                                             <th class="text-right px-2">Unidades</th>
                                             <th class="text-right px-2">€ ud.</th>
                                             <th class="text-right px-2">Total<br />
                                                <span class="sumTotMat">{{number_format($totalMateriales,2,',','.')}}
                                                </span>
                                             </th>
                                             <th class="text-center">Observaciones</th>
                                             <th class="text-center" width="140px">Actions</th>
                                          </tr>
                                       </thead>
                                       @if(count($materiales)>0)
                                       <tbody>
                                          @foreach($materiales as $material)
                                          {{-- <form id="form{{$material->id}}" role="form" method="post"
                                             action="javascript:void(0)"> --}}
                                             <form id="form{{$material->id}}" role="form" method="post"
                                             action="{{ route('campaign.presupuesto.detalle.update',$material->id) }}" >
                                            
                                             <input type="hidden" name="_tokenMaterial{{$material->id}}"
                                                value="{{ csrf_token()}}" id="tokenMaterial{{$material->id}}">
                                             @csrf
                                             <tr class="editarTr" id="{{$material->id}}"><span class="d-none"
                                                   id="sum{{$material->id}}">sumTotMat</span>
                                                <input type="hidden" name="presupuesto_id"
                                                   value="{{$material->presupuesto_id}}" readonly="readonly">
                                                <input type="hidden" name="tipo" value="0" readonly="readonly">
                                                <input type="checkbox" id="check{{$material->id}}" style="display:none">
                                                <td class="my-0 py-1">
                                                   <input type="text" id="concepto{{$material->id}}"
                                                      class="my-0 py-0 form-control-plaintext item text-left"
                                                      name="concepto" value="{{$material->concepto}}"
                                                      readonly="readonly">
                                                </td>
                                                <td class="my-0 py-1">
                                                   <input type="text" id="unidades{{$material->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-right"
                                                      name="unidades" onchange="totalizar({{$material->id}})"
                                                      value="{{$material->unidades}}" readonly="readonly"></td>
                                                <td class="my-0 py-1">
                                                   <input type="text" id="preciounidad{{$material->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-right"
                                                      name="preciounidad" onchange="totalizar({{$material->id}})"
                                                      value="{{number_format($material->preciounidad,2,',','.')}}"
                                                      readonly="readonly"></td>
                                                <td class="my-0 py-1"><input type="hidden" id="total{{$material->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item" name="total"
                                                      value="{{$material->total}}" readonly="readonly">
                                                   <span id="totLabel{{$material->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-right text-primary">
                                                      {{number_format($material->total,2,',','.')}}
                                                   </span>
                                                </td>
                                                <td class="my-0 py-1">
                                                   <input type="text" id="observaciones{{$material->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-center"
                                                      name="observaciones" value="{{$material->observaciones}}"
                                                      readonly="readonly"></td>
                                                {{-- acctiones --}}
                                                <td class="my-0 py-1"> <a class="editar" title="Editar">
                                                      <i id="editar{{$material->id}}"
                                                         class="fas fa-edit text-primary fa-2x mx-1"></i>
                                                   </a>
                                                   <a href="#" title="Validar"
                                                      class="far fa-check-circle text-success fa-2x mx-1"
                                                      onclick="actualizar('form{{$material->id}}',{{$material->id}},'/campaign/presupuesto/detalle/update/','#tokenMaterial{{$material->id}}'),'.sumTotMat'"><i></i>
                                                   </a>
                                                   <a href="{{ route('campaign.presupuesto.detalle.delete',$material->id) }}"
                                                      title="hola">
                                                      <i class="far fa-trash-alt text-danger fa-2x ml-1"></i>
                                                   </a>
                                                   {{-- <button type="submit"><i class="fas fa-upload text-primary fa-lg mx-1"></i></button> --}}
                                                </td>
                                             </tr>
                                          </form>
                                          @endforeach
                                       </tbody>
                                       @endif
                                       <tfoot>
                                          {{-- <form id="formMaterialNew" role="form" method="post" action="javascript:void(0)"> --}}
                                          <form id="formMaterialNew" role="form" method="post"
                                             action="{{ route('campaign.presupuesto.detalle.store') }}">
                                             <input type="hidden" name="_tokenMaterialNew" value="{{ csrf_token()}}"
                                                id="tokenMaterialNew">
                                             @csrf
                                             <tr class="" id="tmaterialNew">
                                                <input type="hidden" name="presupuesto_id"
                                                   value="{{$campaignpresupuesto->id}}" readonly="readonly">
                                                <input type="hidden" name="tipo" value="0" readonly="readonly">
                                                <td class="my-0 py-1"><input type="text" id="materialNew"
                                                      class="my-0 py-0 form-control item text-left" name="concepto"
                                                      value="">
                                                </td>
                                                <td class="my-0 py-1"><input type="text" id="unidadesMaterialNew"
                                                      class="my-0 py-0 px-2 form-control item text-right"
                                                      name="unidades" onchange="totalizar('MaterialNew')" value="0">
                                                </td>
                                                <td class="my-0 py-1"><input type="text" id="preciounidadMaterialNew"
                                                      class="my-0 py-0 px-2 form-control item text-right"
                                                      name="preciounidad" onchange="totalizar('MaterialNew')" value="0">
                                                </td>
                                                <td class="my-0 py-1"><input type="hidden" id="totalMaterialNew"
                                                      class="my-0 py-0 px-2 form-control item" name="total" value="0">
                                                   <span id="totLabelMaterialNew"
                                                      class="my-0 py-0 px-2 pt-1 form-control item"></span>
                                                </td>
                                                <td class="my-0 py-1"><input type="text" id="observacionesMaterialNew"
                                                      class="my-0 py-0 px-2 form-control item text-center"
                                                      name="observaciones" value=""></td>
                                                <td class="my-0 py-1">
                                                   {{-- <a href="#" title="Validar"
                                                      onclick="nuevoMaterial('formMaterialNew','tmaterialNew','/campaign/presupuesto/detalle/store/','#tokenMaterialNew')"><i
                                                         class="fas fa-plus text-success fa-2x mx-1"></i></a> --}}
                                                   <a href="#" title="Validar"
                                                      onclick="document.getElementById('formMaterialNew').submit()">
                                                      <i class="fas fa-plus text-success fa-2x mx-1"></i>
                                                   </a>
                                                   {{-- <button type="submit"><i class="fas fa-upload text-primary fa-lg mx-1"></i></button> --}}
                                                </td>
                                             </tr>
                                          </form>
                                       </tfoot>
                                    </table>
                                    {{-- <button type="button" class="btn btn-default btn-block" name="Guardar">Guardar Materiales</button> --}}
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Promedio -->
                        <div class="col-6">
                           <div class="card collapsed-card">
                              <div class="card-header text-white bg-success p-0" data-card-widget="collapse"
                                 style="cursor: pointer">
                                 <h3 class="card-title pl-3">Promedio</h3><span class="sumTotPromedio ml-3">
                                    {{number_format($totalPromedios,2,',','.')}}</span>
                                 <div class="card-tools pr-3">
                                    <button type="button" class="btn btn-tool"><i class="fas fa-plus"></i></button>
                                 </div>
                              </div>
                              <div class="card-body">
                                 <div class="table-responsive">
                                    <table id="tPromedio" class="table table-hover table-sm small sortable"
                                       cellspacing="0" width=100%>
                                       <thead>
                                          <tr>
                                             <th class="text-left px-2">Concepto</th>
                                             <th class="text-right px-2">Unidades</th>
                                             <th class="text-right px-2">€ ud.</th>
                                             <th class="text-right px-2">Total <br />
                                                <span
                                                   class="sumTotPromedio ml-3">{{number_format($totalPromedios,2,',','.')}}
                                                </span>
                                             </th>
                                             <th class="text-center">Observaciones</th>
                                             <th class="text-center" width="140px">Actions</th>
                                          </tr>
                                       </thead>
                                       @if(count($promedios)>0)
                                       <tbody>
                                          @foreach($promedios as $promedio)
                                          <form id="form{{$promedio->id}}" role="form" method="post"
                                             action="javascript:void(0)">
                                             {{-- <form id="form{{$promedio->id}}" role="form" method="post"
                                             action="{{ route('campaign.presupuesto.detalle.update',$promedio->id) }}" >
                                             --}}
                                             <input type="hidden" name="_tokenDetalle{{$promedio->id}}"
                                                value="{{ csrf_token()}}" id="tokenDetalle{{$promedio->id}}">
                                             @csrf
                                             <tr class="editarTr" id="{{$promedio->id}}"><span class="d-none"
                                                   id="sum{{$promedio->id}}">sumTotPromedio</span>
                                                <input type="hidden" name="presupuesto_id"
                                                   value="{{$promedio->presupuesto_id}}" readonly="readonly">
                                                <input type="hidden" name="tipo" value="1" readonly="readonly">
                                                <input type="checkbox" id="check{{$promedio->id}}" style="display:none">
                                                <td class="my-0 py-1">
                                                   <input type="text" id="concepto{{$promedio->id}}"
                                                      class="my-0 py-0 form-control-plaintext item text-left"
                                                      name="concepto" value="{{$promedio->concepto}}"
                                                      readonly="readonly">
                                                </td>
                                                <td class="my-0 py-1">
                                                   <input type="text" id="unidades{{$promedio->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-right"
                                                      name="unidades" onchange="totalizar({{$promedio->id}})"
                                                      value="{{$promedio->unidades}}" readonly="readonly">
                                                </td>
                                                <td class="my-0 py-1">
                                                   <input type="text" id="preciounidad{{$promedio->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-right"
                                                      name="preciounidad" onchange="totalizar({{$promedio->id}})"
                                                      value="{{number_format($promedio->preciounidad,2,',','.')}}"
                                                      readonly="readonly"></td>
                                                <td class="my-0 py-1"><input type="hidden" id="total{{$promedio->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item" name="total"
                                                      value="{{$promedio->total}}" readonly="readonly">
                                                   <span id="totLabel{{$promedio->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-right text-primary">
                                                      {{number_format($promedio->total,2,',','.')}}
                                                   </span>
                                                </td>
                                                <td class="my-0 py-1">
                                                   <input type="text" id="observaciones{{$promedio->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-center"
                                                      name="observaciones" value="{{$promedio->observaciones}}"
                                                      readonly="readonly"></td>
                                                {{-- actiones --}}
                                                <td class="my-0 py-1"> <a class="editar" title="Editar">
                                                      <i id="editar{{$promedio->id}}"
                                                         class="fas fa-edit text-primary fa-2x mx-1"></i>
                                                   </a>
                                                   <a href="#" title="Validar"
                                                      class="far fa-check-circle text-success fa-2x mx-1"
                                                      onclick="actualizar('form{{$promedio->id}}',{{$promedio->id}},'/campaign/presupuesto/detalle/update/','#tokenDetalle{{$promedio->id}}','.sumTotPromedio')"><i></i>
                                                   </a>
                                                   <a href="{{ route('campaign.presupuesto.detalle.delete',$promedio->id) }}"
                                                      title="hola">
                                                      <i class="far fa-trash-alt text-danger fa-2x ml-1"></i>
                                                   </a>
                                                   {{-- <button type="submit"><i class="fas fa-upload text-primary fa-lg mx-1"></i></button> --}}
                                                </td>
                                             </tr>
                                          </form>
                                          @endforeach
                                       </tbody>
                                       @endif
                                       <tfoot>
                                          {{-- <form id="formPromedioNew" role="form" method="post" action="javascript:void(0)"> --}}
                                          <form id="formPromedioNew" role="form" method="post"
                                             action="{{ route('campaign.presupuesto.detalle.store') }}">
                                             <input type="hidden" name="_tokenDetalleNew" value="{{ csrf_token()}}"
                                                id="tokenDetalleNew">
                                             @csrf
                                             <tr class="" id="tPromedioNew">
                                                <input type="hidden" name="presupuesto_id"
                                                   value="{{$campaignpresupuesto->id}}" readonly="readonly">
                                                <input type="hidden" name="tipo" value="1" readonly="readonly">
                                                <td class="my-0 py-1"><input type="text" id="promedioNew"
                                                      class="my-0 py-0 form-control item text-left" name="concepto"
                                                      value="">
                                                </td>
                                                <td class="my-0 py-1"><input type="text" id="unidadesPromedioNew"
                                                      class="my-0 py-0 px-2 form-control item text-right"
                                                      name="unidades" onchange="totalizar('PromedioNew')" value="0">
                                                </td>
                                                <td class="my-0 py-1"><input type="text" id="preciounidadPromedioNew"
                                                      class="my-0 py-0 px-2 form-control item text-right"
                                                      name="preciounidad" onchange="totalizar('PromedioNew')" value="0">
                                                </td>
                                                <td class="my-0 py-1"><input type="hidden" id="totalPromedioNew"
                                                      class="my-0 py-0 px-2 form-control item" name="total" value="0">
                                                   <span id="totLabelPromedioNew"
                                                      class="my-0 py-0 px-2 pt-1 form-control item"></span>
                                                </td>
                                                <td class="my-0 py-1"><input type="text" id="observacionesPromedioNew"
                                                      class="my-0 py-0 px-2 form-control item text-center"
                                                      name="observaciones" value=""></td>
                                                <td class="my-0 py-1">
                                                   <a href="#" title="Validar"
                                                      onclick="document.getElementById('formPromedioNew').submit()">
                                                      <i class="fas fa-plus text-success fa-2x mx-1"></i>
                                                   </a>
                                                   {{-- <button type="submit"><i class="fas fa-upload text-primary fa-lg mx-1"></i></button> --}}
                                                </td>
                                             </tr>
                                          </form>
                                       </tfoot>
                                    </table>
                                    {{-- <button type="button" class="btn btn-default btn-block" name="Guardar">Guardar promedio</button> --}}
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <!-- Extras -->
                        <div class="col-6">
                           <div class="card collapsed-card">
                              <div class="card-header text-white bg-warning p-0" data-card-widget="collapse"
                                 style="cursor: pointer">
                                 <h3 class="card-title pl-3">Extras</h3><span class="sumTotExtra ml-3">
                                    {{number_format($totalExtras,2,',','.')}}</span>
                                 <div class="card-tools pr-3">
                                    <button type="button" class="btn btn-tool"><i class="fas fa-plus"></i></button>
                                 </div>
                              </div>
                              <div class="card-body">
                                 <div class="table-responsive">
                                    <table id="tExtra" class="table table-hover table-sm small sortable" cellspacing="0"
                                       width=100%>
                                       <thead>
                                          <tr>
                                             <th class="text-left px-2">Extra</th>
                                             <th class="text-right px-2">Unidades</th>
                                             <th class="text-right px-2">€ ud.</th>
                                             <th class="text-right px-2">Total <br />
                                                <span class="sumTotExtra ml-3">{{number_format($totalExtras,2,',','.')}}
                                                </span>
                                             </th>
                                             <th class="text-center">Observaciones</th>
                                             <th class="text-center" width="140px">Actions</th>
                                          </tr>
                                       </thead>
                                       @if(count($extras)>0)
                                       <tbody>
                                          @foreach($extras as $extra)
                                          <form id="form{{$extra->id}}" role="form" method="post"
                                             action="javascript:void(0)">
                                             {{-- <form id="form{{$extra->id}}" role="form" method="post"
                                             action="{{ route('campaign.presupuesto.detalle.update',$extra->id) }}" >
                                             --}}
                                             <input type="hidden" name="_tokenDetalle{{$extra->id}}"
                                                value="{{ csrf_token()}}" id="tokenDetalle{{$extra->id}}">
                                             @csrf
                                             <tr class="editarTr" id="{{$extra->id}}"><span class="d-none"
                                                   id="sum{{$extra->id}}">sumTotExtra</span>
                                                <input type="hidden" name="presupuesto_id"
                                                   value="{{$extra->presupuesto_id}}" readonly="readonly">
                                                <input type="hidden" name="tipo" value="2" readonly="readonly">
                                                <input type="checkbox" id="check{{$extra->id}}" style="display:none">
                                                <td class="my-0 py-1">
                                                   <input type="text" id="concepto{{$extra->id}}"
                                                      class="my-0 py-0 form-control-plaintext item text-left"
                                                      name="concepto" value="{{$extra->concepto}}" readonly="readonly">
                                                </td>
                                                <td class="my-0 py-1">
                                                   <input type="text" id="unidades{{$extra->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-right"
                                                      name="unidades" onchange="totalizar({{$extra->id}})"
                                                      value="{{$extra->unidades}}" readonly="readonly"></td>
                                                <td class="my-0 py-1">
                                                   <input type="text" id="preciounidad{{$extra->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-right"
                                                      name="preciounidad" onchange="totalizar({{$extra->id}})"
                                                      value="{{number_format($extra->preciounidad,2,',','.')}}"
                                                      readonly="readonly"></td>
                                                <td class="my-0 py-1"><input type="hidden" id="total{{$extra->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item" name="total"
                                                      value="{{$extra->total}}" readonly="readonly">
                                                   <span id="totLabel{{$extra->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-right text-primary">
                                                      {{number_format($extra->total,2,',','.')}}
                                                   </span>
                                                </td>
                                                <td class="my-0 py-1">
                                                   <input type="text" id="observaciones{{$extra->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-center"
                                                      name="observaciones" value="{{$extra->observaciones}}"
                                                      readonly="readonly"></td>
                                                {{-- actiones --}}
                                                <td class="my-0 py-1"> <a class="editar" title="Editar">
                                                      <i id="editar{{$extra->id}}"
                                                         class="fas fa-edit text-primary fa-2x mx-1"></i>
                                                   </a>
                                                   <a href="#" title="Validar"
                                                      class="far fa-check-circle text-success fa-2x mx-1"
                                                      onclick="actualizar('form{{$extra->id}}',{{$extra->id}},'/campaign/presupuesto/detalle/update/','#tokenDetalle{{$extra->id}}','.sumTotExtra')"><i></i>
                                                   </a>
                                                   <a href="{{ route('campaign.presupuesto.detalle.delete',$extra->id) }}"
                                                      title="hola">
                                                      <i class="far fa-trash-alt text-danger fa-2x ml-1"></i>
                                                   </a>
                                                   {{-- <button type="submit"><i class="fas fa-upload text-primary fa-lg mx-1"></i></button> --}}
                                                </td>
                                             </tr>
                                          </form>
                                          @endforeach
                                       </tbody>
                                       @endif
                                       <tfoot>
                                          {{-- <form id="formExtraNew" role="form" method="post" action="javascript:void(0)"> --}}
                                          <form id="formExtraNew" role="form" method="post"
                                             action="{{ route('campaign.presupuesto.detalle.store') }}">
                                             <input type="hidden" name="_tokenDetalleNew" value="{{ csrf_token()}}"
                                                id="tokenDetalleNew">
                                             @csrf
                                             <tr class="" id="tExtraNew">
                                                <input type="hidden" name="presupuesto_id"
                                                   value="{{$campaignpresupuesto->id}}" readonly="readonly">
                                                <input type="hidden" name="tipo" value="2" readonly="readonly">
                                                <td class="my-0 py-1"><input type="text" id="extraNew"
                                                      class="my-0 py-0 form-control item text-left" name="concepto"
                                                      value="">
                                                </td>
                                                <td class="my-0 py-1"><input type="text" id="unidadesExtraNew"
                                                      class="my-0 py-0 px-2 form-control item text-right" name="unidades"
                                                      onchange="totalizar('ExtraNew')" value="0"></td>
                                                <td class="my-0 py-1"><input type="text" id="preciounidadExtraNew"
                                                      class="my-0 py-0 px-2 form-control item text-right"
                                                      name="preciounidad" onchange="totalizar('ExtraNew')" value="0"></td>
                                                <td class="my-0 py-1"><input type="hidden" id="totalExtraNew"
                                                      class="my-0 py-0 px-2 form-control item" name="total" value="0">
                                                   <span id="totLabelExtraNew"
                                                      class="my-0 py-0 px-2 pt-1 form-control item"></span>
                                                </td>
                                                <td class="my-0 py-1"><input type="text" id="observacionesExtraNew"
                                                      class="my-0 py-0 px-2 form-control item text-center"
                                                      name="observaciones" value=""></td>
                                                <td class="my-0 py-1">
                                                   <a href="#" title="Validar"
                                                      onclick="document.getElementById('formExtraNew').submit()">
                                                      <i class="fas fa-plus text-success fa-2x mx-1"></i>
                                                   </a>
                                                   {{-- <button type="submit"><i class="fas fa-upload text-primary fa-lg mx-1"></i></button> --}}
                                                </td>
                                             </tr>
                                          </form>
                                       </tfoot>
                                    </table>
                                    {{-- <button type="button" class="btn btn-default btn-block" name="Guardar">Guardar extras</button> --}}
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- Picking -->
                        <div class="col-6">
                           <div class="card collapsed-card">
                              <div class="card-header text-white bg-orange p-0" data-card-widget="collapse"
                                 style="cursor: pointer">
                                 <h3 class="card-title pl-3">Picking</h3><span class="sumTotPicking ml-3">
                                    {{number_format($totalPickings,2,',','.')}}</span>
                                 <div class="card-tools pr-3">
                                    <button type="button" class="btn btn-tool"><i class="fas fa-plus"></i></button>
                                 </div>
                              </div>
                              <div class="card-body">
                                 <div class="table-responsive">
                                    <table id="tPicking" class="table table-hover table-sm small sortable" cellspacing="0"
                                       width=100%>
                                       <thead>
                                          <tr>
                                             <th class="text-left px-2">Área</th>
                                             <th class="text-right px-2">Unidades</th>
                                             <th class="text-right px-2">€ ud.</th>
                                             <th class="text-right px-2">Total <br />
                                                <span
                                                   class="sumTotPicking ml-3">{{number_format($totalPickings,2,',','.')}}
                                                </span>
                                             </th>
                                             <th class="text-center">Observaciones</th>
                                             <th class="text-center" width="140px">Actions</th>
                                          </tr>
                                       </thead>
                                       @if(count($pickings)>0)
                                       <tbody>
                                          @foreach($pickings as $picking)
                                          <form id="form{{$picking->id}}" role="form" method="post"
                                             action="javascript:void(0)">
                                             {{-- <form id="form{{$picking->id}}" role="form" method="post"
                                             action="{{ route('campaign.presupuesto.detalle.update',$picking->id) }}" >
                                             --}}
                                             <input type="hidden" name="_tokenDetalle{{$picking->id}}"
                                                value="{{ csrf_token()}}" id="tokenDetalle{{$picking->id}}">
                                             @csrf
                                             <tr class="editarTr" id="{{$picking->id}}"><span class="d-none"
                                                   id="sum{{$picking->id}}">sumTotPicking</span>
                                                <input type="hidden" name="presupuesto_id"
                                                   value="{{$picking->presupuesto_id}}" readonly="readonly">
                                                <input type="hidden" name="tipo" value="3" readonly="readonly">
                                                <input type="checkbox" id="check{{$picking->id}}" style="display:none">
                                                <td class="my-0 py-1">
                                                   <input type="text" id="concepto{{$picking->id}}"
                                                      class="my-0 py-0 form-control-plaintext item text-left"
                                                      name="concepto" value="{{$picking->concepto}}" readonly="readonly">
                                                </td>
                                                <td class="my-0 py-1">
                                                   <input type="text" id="unidades{{$picking->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-right"
                                                      name="unidades" onchange="totalizar({{$picking->id}})"
                                                      value="{{$picking->unidades}}" readonly="readonly"></td>
                                                <td class="my-0 py-1">
                                                   <input type="text" id="preciounidad{{$picking->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-right"
                                                      name="preciounidad" onchange="totalizar({{$picking->id}})"
                                                      value="{{number_format($picking->preciounidad,2,',','.')}}"
                                                      readonly="readonly"></td>
                                                <td class="my-0 py-1"><input type="hidden" id="total{{$picking->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item" name="total"
                                                      value="{{$picking->total}}" readonly="readonly">
                                                   <span id="totLabel{{$picking->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-right text-primary">
                                                      {{number_format($picking->total,2,',','.')}}
                                                   </span>
                                                </td>
                                                <td class="my-0 py-1">
                                                   <input type="text" id="observaciones{{$picking->id}}"
                                                      class="my-0 py-0 px-2 form-control-plaintext item text-center"
                                                      name="observaciones" value="{{$picking->observaciones}}"
                                                      readonly="readonly"></td>
                                                {{-- actiones --}}
                                                <td class="my-0 py-1"> <a class="editar" title="Editar">
                                                      <i id="editar{{$picking->id}}"
                                                         class="fas fa-edit text-primary fa-2x mx-1"></i>
                                                   </a>
                                                   <a href="#" title="Validar"
                                                      class="far fa-check-circle text-success fa-2x mx-1"
                                                      onclick="actualizar('form{{$picking->id}}',{{$picking->id}},'/campaign/presupuesto/detalle/update/','#tokenDetalle{{$picking->id}}','.sumTotPicking')"><i></i>
                                                   </a>
                                                   <a href="{{ route('campaign.presupuesto.detalle.delete',$picking->id) }}"
                                                      title="hola">
                                                      <i class="far fa-trash-alt text-danger fa-2x ml-1"></i>
                                                   </a>
                                                   {{-- <button type="submit"><i class="fas fa-upload text-primary fa-lg mx-1"></i></button> --}}
                                                </td>
                                             </tr>
                                          </form>
                                          @endforeach
                                       </tbody>
                                       @endif
                                       <tfoot>
                                          {{-- <form id="formPickingNew" role="form" method="post" action="javascript:void(0)"> --}}
                                          <form id="formPickingNew" role="form" method="post"
                                             action="{{ route('campaign.presupuesto.detalle.store') }}">
                                             <input type="hidden" name="_tokenDetalleNew" value="{{ csrf_token()}}"
                                                id="tokenDetalleNew">
                                             @csrf
                                             <tr class="" id="tPickingNew">
                                                <input type="hidden" name="presupuesto_id"
                                                   value="{{$campaignpresupuesto->id}}" readonly="readonly">
                                                <input type="hidden" name="tipo" value="3" readonly="readonly">
                                                <td class="my-0 py-1"><input type="text" id="pickingNew"
                                                      class="my-0 py-0 form-control item text-left" name="concepto"
                                                      value="">
                                                </td>
                                                <td class="my-0 py-1"><input type="text" id="unidadesPickingNew"
                                                      class="my-0 py-0 px-2 form-control item text-right" name="unidades"
                                                      onchange="totalizar('PickingNew')" value="0"></td>
                                                <td class="my-0 py-1"><input type="text" id="preciounidadPickingNew"
                                                      class="my-0 py-0 px-2 form-control item text-right"
                                                      name="preciounidad" onchange="totalizar('PickingNew')" value="0">
                                                </td>
                                                <td class="my-0 py-1"><input type="hidden" id="totalPickingNew"
                                                      class="my-0 py-0 px-2 form-control item" name="total" value="0">
                                                   <span id="totLabelPickingNew"
                                                      class="my-0 py-0 px-2 pt-1 form-control item"></span>
                                                </td>
                                                <td class="my-0 py-1"><input type="text" id="observacionesPickingNew"
                                                      class="my-0 py-0 px-2 form-control item text-center"
                                                      name="observaciones" value=""></td>
                                                <td class="my-0 py-1">
                                                   <a href="#" title="Validar"
                                                      onclick="document.getElementById('formPickingNew').submit()">
                                                      <i class="fas fa-plus text-success fa-2x mx-1"></i>
                                                   </a>
                                                   {{-- <button type="submit"><i class="fas fa-upload text-primary fa-lg mx-1"></i></button> --}}
                                                </td>
                                             </tr>
                                          </form>
                                       </tfoot>
                                    </table>
                                    {{-- <button type="button" class="btn btn-default btn-block" name="Guardar">Guardar extras</button> --}}
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
<div class="card-footer">
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

<script>
   @if(Session::has('message'))
      toastr.options={
         progressBar:true,
         positionClass:"toast-top-center"
      };
      toastr.success("{{ Session::get('message') }}");
   @endif
   @if ($errors->any())
      @foreach ($errors->all() as $error)
         toastr.options={
            closeButton: true,
            progressBar:true,
            positionClass:"toast-top-center",
            showDuration: "300",
            hideDuration: "1000",
            timeOut: 0,
         };
         toastr.error("{{ $error }}");
      @endforeach
   @endif
</script>
<script>
   function totalizar(id) {
      ud=$('#unidades'+id).val();
      precio=parseFloat($('#preciounidad'+id).val().replace(',','.'));
      total=(ud*precio).toFixed(2);
      $('#preciounidad'+id).val(precio);
      $('#total'+id).val(total);
      $('#totLabel'+id).text(total);
   }

   $('.editarTr').dblclick(function(){
      var trid = $(this).closest('tr').attr('id'); // table row ID
      var sumTot='.'+$('#sum'+trid).text();
      checkId='#check'+trid;

      if( $(checkId).prop('checked') ==true) {
         $('#check'+trid).prop('checked',false);
         $('#editar'+trid).removeClass("text-warning").addClass("text-primary")
         $(this).closest('tr').css('background-color','#ffffff');
         actualizar('form'+trid,trid,'/campaign/presupuesto/detalle/update/','#tokenMaterial'+trid,sumTot);
         $(this).closest('tr').find('input').attr('readonly',true);
      }
      else{
         $('#check'+trid).prop('checked',true);
         $('#editar'+trid).removeClass("text-primary").addClass("text-warning")
         $(this).closest('tr').css('background-color','#f1e599');
         $(this).closest('tr').find('input').removeAttr('readonly');
      }
   });

   $('.editar').click(function(){
      var trid = $(this).closest('tr').attr('id');
      checkId='#check'+trid;

      if( $(checkId).prop('checked') ==true) {
         $('#check'+trid).prop('checked',false);
         $('#editar'+trid).removeClass("text-warnign").addClass("text-primary")
         $(this).closest('tr').css('background-color','#ffffff');
         $(this).closest('tr').find('input').attr('readonly',true);
      }
      else{
         $('#check'+trid).prop('checked',true);
         $('#editar'+trid).removeClass("text-primary").addClass("text-warning")
         $(this).closest('tr').css('background-color','#f1e599');
         $(this).closest('tr').find('input').removeAttr('readonly');
      }
   });
</script>

<script>
   function actualizar(formulario,materialId,ruta,tok,sumTot) {
   var token = $(tok).val();
   var route = ruta;
   route= ruta+materialId;
   var formElement = document.getElementById(formulario);
   var formData = new FormData(formElement);
   
   $.ajax({
      cache:false,
      contentType: false,
      processData: false,
      
      type: "POST",
      url: route,
      headers: { "X-CSRF-TOKEN": token },
      data: formData,
      success: function(data) {
         console.log(data);
         $(sumTot).text(data.tot);
         toastr.options={
            progressBar:true,
            positionClass:"toast-top-center"
         };
         toastr.info(data.notification);
      },
      error:function(msj){
         console.log(msj.responseJSON.errors);
         toastr.options={
            "closeButton": true,
            "progressBar":true,
            "positionClass":"toast-top-center",
            "options.escapeHtml" : true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": 0,
         };
         toastr.error("Ha habido un error. <br />No se ha podido actualizar. <br />"+ msj.responseJSON.message);
      }
   });
}

</script>

@endpush