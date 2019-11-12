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
                           <label class="form-label-sm" for="referencia">Referencia</label>
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
                     <!-- Materiales -->
                     <div class="card">
                        {{-- titulo card --}}
                        <div class="card-header text-white bg-primary p-0" data-card-widget="collapse"
                           style="cursor: pointer">
                           <h3 class="card-title pl-3">Materiales</h3><span id="totMat2" class="ml-3">
                              {{number_format($totalMateriales,2,',','.')}}</span>
                           <div class="card-tools pr-3">
                              <button type="button" class="btn btn-tool"><i class="fas fa-minus"></i></button>
                           </div>
                        </div>
                        {{-- tabla presupuesto materiales --}}
                        <div class="card-body">
                           <div class="table-responsive">
                              <table id="tMaterial" class="table table-hover table-sm small sortable" cellspacing="0"
                                 width=100%>
                                 <thead>
                                    <tr>
                                       <th class="text-left px-2">Material</th>
                                       <th class="text-right px-2">Unidades</th>
                                       <th class="text-right px-2">€ ud.</th>
                                       <th class="text-right px-2" id="totMat">Total
                                          <br />{{number_format($totalMateriales,2,',','.')}}</th>
                                       <th class="text-center">Observaciones</th>
                                       <th class="text-center" width="140px">Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($materiales as $material)
                                    <form id="form{{$material->id}}" role="form" method="post"
                                       action="javascript:void(0)">
                                       {{-- <form id="form{{$material->id}}" role="form" method="post"
                                       action="{{ route('campaign.presupuesto.detalle.update',$material->id) }}" >
                                       --}}
                                       <input type="hidden" name="_tokenMaterial{{$material->id}}"
                                          value="{{ csrf_token()}}" id="tokenMaterial{{$material->id}}">
                                       @csrf
                                       <tr class="editarTr" id="{{$material->id}}">
                                          <input type="hidden" name="presupuesto_id"
                                             value="{{$material->presupuesto_id}}" readonly="readonly">
                                          <input type="checkbox" id="check{{$material->id}}" style="display:none">
                                          <td class="my-0 py-1">
                                             <input type="text" id="concepto{{$material->id}}" 
                                             class="my-0 py-0 form-control-plaintext item text-left" 
                                             name="concepto" value="{{$material->concepto}}" readonly="readonly">
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
                                             value="{{number_format($material->preciounidad,2,',','.')}}" readonly="readonly"></td>
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
                                                name="observaciones" value="{{$material->observaciones}}" readonly="readonly"></td>
                                                {{-- acctiones --}}
                                          <td class="my-0 py-1"> <a class="editar" title="Editar">
                                                <i id="editar{{$material->id}}" class="fas fa-edit text-primary fa-2x mx-1"></i>
                                             </a>
                                             <a href="#" title="Validar" class="far fa-check-circle text-success fa-2x mx-1"
                                                onclick="actualizar('form{{$material->id}}',{{$material->id}},'/campaign/presupuesto/material/update/','#tokenMaterial{{$material->id}}')"><i></i>
                                             </a>
                                             <a href="{{ route('campaign.presupuesto.detalle.delete',$material->id) }}" title="hola">
                                                <i class="far fa-trash-alt text-danger fa-2x ml-1"></i>
                                             </a>
                                             {{-- <button type="submit"><i class="fas fa-upload text-primary fa-lg mx-1"></i></button> --}}
                                          </td>
                                       </tr>
                                    </form>
                                    @endforeach
                                 </tbody>
                                 <tfoot>
                                    <tr>
                                       <th class="text-center">Material</th>
                                       <th class="text-center">Unidades</th>
                                       <th class="text-center">€ ud</th>
                                       <th class="text-center">Total</th>
                                       <th class="text-center">Observaciones</th>
                                       <th class="text-center"></th>
                                    </tr>
                                    {{-- <form id="formMaterialNew" role="form" method="post" action="javascript:void(0)"> --}}
                                       <form id="formMaterialNew" role="form" method="post" action="{{ route('campaign.presupuesto.detalle.store') }}"
                                          >
                                       <input type="hidden" name="_tokenMaterialNew" value="{{ csrf_token()}}" id="tokenMaterialNew">
                                       @csrf
                                       <tr class="" id="tmaterialNew">
                                          <input type="hidden" name="presupuesto_id"
                                             value="{{$material->presupuesto_id}}" readonly="readonly">
                                          <input type="hidden" name="tipo" value="0" readonly="readonly">
                                          <td class="my-0 py-1"><input type="text" id="materialNew"
                                             class="my-0 py-0 form-control item text-left" name="concepto" value="">
                                          </td>
                                          <td class="my-0 py-1"><input type="text" id="unidadesMaterialNew"
                                                class="my-0 py-0 px-2 form-control item text-right" name="unidades"
                                                onchange="totalizar('MaterialNew')" value="0"></td>
                                          <td class="my-0 py-1"><input type="text" id="preciounidadMaterialNew"
                                             class="my-0 py-0 px-2 form-control item text-right" name="preciounidad"
                                             onchange="totalizar('MaterialNew')" value="0"></td>
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
                                                onclick="nuevoMaterial('formMaterialNew','tmaterialNew','/campaign/presupuesto/material/store/','#tokenMaterialNew')"><i
                                                   class="fas fa-plus text-success fa-2x mx-1"></i></a> --}}
                                             <a href="#" title="Validar" onclick="document.getElementById('formMaterialNew').submit()">
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
                           <!-- Modal Crear-->
                           {{-- <div class="modal fade" id="conceptoCreateModal" tabindex="-1" role="dialog"
                              aria-labelledby="conceptoCreateModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="conceptoCreateModalLabel">Nuevo Concepto</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <form method="post" action="{{ route('campaign.presupuesto.material.store') }}">
                                          @csrf
                                          <input type="hidden" id="presupuesto_id" name="presupuesto_id"
                                             value="{{ $presupuesto->id }}" />

                                             <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                             <button type="button" class="btn btn-primary" name="Guardar"
                                                onclick="form.submit()">Guardar</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div> --}}
                        </div>
                     </div>
                     <div class="card-footer">
                     </div>
                  </div>
                  <!-- Promedio -->
                  <div class="card collapsed-card">
                     <div class="card-header text-white bg-success p-0" data-card-widget="collapse"
                        style="cursor: pointer">
                        <h3 class="card-title pl-3">Promedio</h3>
                        <div class="card-tools pr-3">
                           <button type="button" class="btn btn-tool"><i class="fas fa-plus"></i></button>
                        </div>
                     </div>
                     <div class="card-body">
                        <form action="#" method="post">
                           <input type="hidden" name="_tokenPromedio" value="{{ csrf_token()}}" id="tokenPromedio">
                           <div class="form-group">
                              @csrf
                              <input type="hidden" class="" name="campaign_id" value="{{$campaign->id}} " />
                           </div>
                           <button type="button" class="btn btn-default btn-block" name="Guardar">Guardar
                              Promedios</button>
                        </form>
                     </div>
                  </div>
                  <!-- Extras -->
                  <div class="card collapsed-card">
                     <div class="card-header text-black bg-warning p-0" data-card-widget="collapse"
                        style="cursor: pointer">
                        <h3 class="card-title pl-3">Extras</h3>
                        <div class="card-tools pr-3">
                           <button type="button" class="btn btn-tool"><i class="fas fa-plus"></i></button>
                        </div>
                     </div>
                     <div class="card-body collapse">
                        <form action="#" method="post">
                           <input type="hidden" name="_tokenExtras" value="{{ csrf_token()}}" id="tokenExtras">
                           <div class="form-group">
                              @csrf
                              <input type="hidden" class="" name="campaign_id" value="{{$campaign->id}} " />
                           </div>
                           <button type="button" class="btn btn-default btn-block" name="Guardar">Guardar
                              Extras</button>
                           {{-- <button type="button" class="btn btn-default btn-block" name="Guardar"
                                    onclick="asociar({{ $campaign->id}},'/campaign/asociar','#tokenUbicacion','ubicacionesduallistbox[]','Ubicaciones','ubicacion','campaign_ubicacions')">Asociar
                           Ubicaciones</button> --}}
                        </form>
                     </div>
                  </div>
                  <!-- Picking -->
                  <div class="card collapsed-card">
                     <div class="card-header text-black bg-warning p-0" data-card-widget="collapse"
                        style="cursor: pointer">
                        <h3 class="card-title pl-3">Picking</h3>
                        <div class="card-tools pr-3">
                           <button type="button" class="btn btn-tool"><i class="fas fa-plus"></i></button>
                        </div>
                     </div>
                     <div class="card-body collapse">
                        <form action="#" method="post">
                           <input type="hidden" name="_tokenPicking" value="{{ csrf_token()}}" id="tokenPicking">
                           <div class="form-group">
                              @csrf
                              <input type="hidden" class="" name="campaign_id" value="{{$campaign->id}} " />
                           </div>
                           <button type="button" class="btn btn-default btn-block" name="Guardar">Guardar
                              Picking</button>
                           {{-- <button type="button" class="btn btn-default btn-block" name="Guardar"
                                       onclick="asociar({{ $campaign->id}},'/campaign/asociar','#tokenUbicacion','ubicacionesduallistbox[]','Ubicaciones','ubicacion','campaign_ubicacions')">Asociar
                           Ubicaciones</button> --}}
                        </form>
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
      checkId='#check'+trid;

      if( $(checkId).prop('checked') ==true) {
         $('#check'+trid).prop('checked',false);
         $('#editar'+trid).removeClass("text-warning").addClass("text-primary")
         $(this).closest('tr').css('background-color','#ffffff');
         actualizar('form'+trid,trid,'/campaign/presupuesto/material/update/','#tokenMaterial'+trid);
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
   function actualizar(formulario,materialId,ruta,tok) {
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
         $('#totMat').text('Total:'+data.tot);
         $('#totMat2').text('Total:'+data.tot);
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

function nuevoMaterial(formulario,materialId,ruta,tok,tipo) {
   var token = $(tok).val();
   var route = route('campaign.presupuesto.detalle.store');
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
         $('#totMat').text('Total:'+data.tot);
         $('#totMat2').text('Total:'+data.tot);
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