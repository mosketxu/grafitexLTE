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
                        <div class="form-group col-2">
                           <label class="form-label-sm" for="fecha">Fecha</label>
                           <input type="date" class="form-control-sm form-control" id="fecha" name="fecha"
                              value="{{$campaignpresupuesto->fecha}}" readonly>
                        </div>
                        <div class="form-group col-1">
                           <label class="form-label-sm float-right mr-3" for="total">Total</label>
                           <input type="text" class="form-control-sm form-control text-right" id="total" name="total"
                              value="{{number_format($campaignpresupuesto->total,2,',','.')}} €" readonly>
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
                  <div class="card-body">
                     <div class="row">
                        {{-- Promedios --}}
                        <div class="col-3">
                           <div class="card">
                              <div class="card-header text-white bg-primary py-1">
                                 <div class="row">
                                    <div class="col-4 text-left">Zona</div>
                                    <div class="col-4 text-right">
                                       <span class="badge badge-primary badge-pill">{{$totalStores}} </span>
                                    </div>
                                    <div class="col-4 text-right">
                                       <span class="badge badge-primary badge-pill">{{number_format($totalMateriales,2,',','.')}} €</span>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-body p-1">
                                 @foreach ($promedios as $promedio)
                                 <div class="row">
                                    <div class="col-4 text-left">{{$promedio->zona}}</div>
                                    <div class="col-4 text-right">
                                       <span class="badge badge-primary badge-pill">{{$promedio->stores}}</span>
                                    </div>
                                    <div class="col-4 text-right ">
                                       <span class="badge badge-primary badge-pill mr-3">{{number_format($promedio->total,2,',','.')}} €</span>
                                    </div>
                                 </div>
                                 @endforeach
                              </div>
                           </div>
                        </div>
                        <div class="col-9">
                           <div class="card">
                              <div class="card-header">
                                 header
                              </div>
                              <div class="card-body">
                                    body
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-6">
                           <!-- Materiales todos-->
                           <div class="card">
                                 {{-- titulo card --}}
                              <div class="card-header text-white bg-primary p-0" data-card-widget="collapse"
                                 style="cursor: pointer">
                                 <h3 class="card-title pl-3">Materiales</h3><span class="sumTotMat ml-3">
                                    {{number_format($totalMateriales,2,',','.')}}</span>
                                 <div class="card-tools pr-3">
                                    <button type="button" class="btn btn-tool"><i class="fas fa-minus"></i></button>
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
                                             <th class="text-right px-2">Uds x prop</th>
                                             <th class="text-right px-2">€ ud.</th>
                                             <th class="text-right px-2">Total</th>
                                          </tr>
                                       </thead>
                                       @if(count($materiales)>0)
                                       <tbody>
                                          @foreach($materiales as $material)
                                          <tr>
                                             <td class="text-left my-0 py-1">{{$material->tarifa->familia}}</td>
                                             <td class="text-right my-0 py-1">{{$material->unidades}}</td>
                                             <td class="text-right my-0 py-1">{{number_format($material->precio,2,',','.')}}</td>
                                             <td class="text-right my-0 py-1">{{number_format($material->tot,2,',','.')}}</td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                       @endif
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="card">
                              <div class="card-header text-white bg-warning p-0" data-card-widget="collapse"
                                    style="cursor: pointer">
                                 <h3 class="card-title pl-3">Extras</h3><span class="sumTotExtra ml-3">
                                    {{number_format($totalExtras,2,',','.')}}</span>
                                 <div class="card-tools pr-3">
                                    <button type="button" class="btn btn-tool"><i class="fas fa-minus"></i></button>
                                 </div>
                              </div>
                              <div class="card-body">
                                 <div class="table-responsive">
                                    <table id="tExtra" class="table table-hover table-sm small sortable" cellspacing="0" width=100%>
                                       <thead>
                                          <tr>
                                             <th class="text-left px-2">Extra</th>
                                             <th class="text-right px-2" width="10%">Unidades</th>
                                             <th class="text-right px-2" width="10%">€ ud.</th>
                                             <th class="text-right px-2" width="10%">Total <br />
                                             </th>
                                             <th class="text-center">Observaciones</th>
                                             <th class="text-center" width="15%">Actions</th>
                                          </tr>
                                       </thead>
                                       @if(count($extras)>0)
                                       <tbody>
                                          @foreach($extras as $extra)
                                             <form id="form{{$extra->id}}" role="form" method="post"
                                                      action="javascript:void(0)">
                                             {{-- <form id="form{{$extra->id}}" role="form" method="post"
                                                      action="{{ route('campaign.presupuesto.extra.update',$extra->id) }}" > --}}
                                                      
                                                <input type="hidden" name="_tokenExtra{{$extra->id}}"
                                                   value="{{ csrf_token()}}" id="tokenExtra{{$extra->id}}">
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
                                                         value="{{$extra->unidades}}" readonly="readonly">
                                                   </td>
                                                   <td class="my-0 py-1">
                                                      <input type="text" id="preciounidad{{$extra->id}}"
                                                         class="my-0 py-0 px-2 form-control-plaintext item text-right"
                                                         name="preciounidad" onchange="totalizar({{$extra->id}})"
                                                         value="{{number_format($extra->preciounidad,2,',','.')}}"
                                                         readonly="readonly">
                                                   </td>
                                                   <td class="my-0 py-1">
                                                      <input type="hidden" id="total{{$extra->id}}"
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
                                                         readonly="readonly">
                                                   </td>
                                                      {{-- acciones --}}
                                                   <td class="my-0 py-1">
                                                      <a class="editar" title="Editar">
                                                         <i id="editar{{$extra->id}}" class="fas fa-edit text-primary fa-2x mx-1"></i>
                                                      </a>
                                                      <a href="{{ route('campaign.presupuesto.extra.delete',$extra->id) }}" title="Eliminar">
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
                                          <form id="formExtraNew" role="form" method="post" action="{{ route('campaign.presupuesto.extra.store') }}">
                                             <input type="hidden" name="_tokenExtraNew" value="{{ csrf_token()}}" id="tokenExtraNew">
                                             @csrf
                                             <tr class="" id="tExtraNew">
                                                <input type="hidden" name="presupuesto_id" value="{{$campaignpresupuesto->id}}" readonly="readonly">
                                                <input type="hidden" name="tipo" value="2" readonly="readonly">
                                                <td class="my-0 py-1">
                                                   <input type="text" id="extraNew" class="my-0 py-0 form-control item text-left" name="concepto" value="">
                                                </td>
                                                <td class="my-0 py-1"><input type="text" id="unidadesExtraNew" class="my-0 py-0 px-2 form-control item text-right" name="unidades"
                                                   onchange="totalizar('ExtraNew')" value="0">
                                                </td>
                                                <td class="my-0 py-1"><input type="text" id="preciounidadExtraNew" class="my-0 py-0 px-2 form-control item text-right"
                                                   name="preciounidad" onchange="totalizar('ExtraNew')" value="0">
                                                </td>
                                                <td class="my-0 py-1"><input type="hidden" id="totalExtraNew" class="my-0 py-0 px-2 form-control item" name="total" value="0">
                                                   <span id="totLabelExtraNew" class="my-0 py-0 px-2 pt-1 form-control item"></span>
                                                </td>
                                                <td class="my-0 py-1"><input type="text" id="observacionesExtraNew"
                                                   class="my-0 py-0 px-2 form-control item text-center"
                                                   name="observaciones" value="">
                                                </td>
                                                <td class="my-0 py-1">
                                                   <a href="#" title="Validar" onclick="document.getElementById('formExtraNew').submit()">
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

<script src="{{ asset('js/sortTable.js')}}"></script>
<script>
   @include('_partials._errortemplate')
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
         actualizar('form'+trid,trid,'/campaign/presupuesto/extra/update/','#tokenMaterial'+trid,sumTot);
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
         $(sumTot).text(data.totExtra);
         $('#total').val(data.tot);
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