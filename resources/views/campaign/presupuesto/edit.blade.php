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
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="card">
                  <div class="card-header m-0 p-0">
                     <form id="formpresupuesto" role="form" method="post"
                        action="{{ route('campaign.presupuesto.update',$campaignpresupuesto->id) }}">
                        @csrf
                        <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
                        <div class="card">
                           <div class="card-header m-1 p-0">
                              <div class="row">
                                 <div class="form-group col">
                                    <label class="form-label-sm" for="referencia">Referencia</label>
                                    <input type="text" class="form-control-sm form-control" id="referencia"
                                       name="referencia" value="{{$campaignpresupuesto->referencia}}">
                                 </div>
                                 <div class="form-group col-1">
                                    <label class="form-label-sm" for="version">Versión</label>
                                    <input type="number" class="form-control-sm form-control" id="version"
                                       name="version" step="0.1" value="{{$campaignpresupuesto->version}} ">
                                 </div>
                                 <div class="form-group col">
                                    <label class="form-label-sm" for="fecha">Fecha</label>
                                    <input type="date" class="form-control-sm form-control" id="fecha" name="fecha"
                                       value="{{$campaignpresupuesto->fecha}}">
                                 </div>
                                 <div class="form-group col">
                                    <label class="form-label-sm" for="atencion">Atención</label>
                                    <input type="text" class="form-control-sm form-control" id="atencion"
                                       name="atencion" value="{{$campaignpresupuesto->atencion}}">
                                 </div>
                                 <div class="form-group col">
                                    <label class="form-label-sm" for="ambito">Ámbito</label>
                                    <input type="text" class="form-control-sm form-control" id="ambito" name="ambito"
                                       value="{{$campaignpresupuesto->ambito}}">
                                 </div>
                                 <div class="form-group col-1">
                                    <label class="form-label-sm" for="estado">Estado</label>
                                    <select name="estado" id="estado" class="form-control form-control-sm">
                                       <option value="{{$campaignpresupuesto->estado}}">
                                          {{$campaignpresupuesto->estado}}
                                       </option>
                                       <option value="Creado">Creado</option>
                                       <option value="Iniciado">Iniciado</option>
                                       <option value="Aceptado">Aceptado</option>
                                       <option value="Rechazado">Rechazado</option>
                                    </select>
                                 </div>
                                 <div class="form-group col">
                                    <label class="form-label-sm" for="observaciones">Observaciones</label>
                                    <input type="text" class="form-control-sm form-control" id="observaciones"
                                       name="observaciones" value="{{$campaignpresupuesto->observaciones}}">
                                 </div>
                                 <div class="form-group col-1">
                                    <label class="form-label-sm" for="observaciones"> &nbsp;</label>
                                    <button type="submit"
                                       class="form-control-sm form-control btn btn-primary btn-sm">Actualizar</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card-body m-1 p-0">
                           {{-- <a href="" title="Edit" onclick="cambiaDisabled();"><i class="far fa-edit text-primary fa-lg mx-1"></i></a> --}}
                           <!-- Materiales -->
                           <div class="card">
                              <div class="card-header text-white bg-primary p-0" data-card-widget="collapse"
                                 style="cursor: pointer">
                                 <h3 class="card-title pl-3">Materiales</h3>
                                 <div class="card-tools pr-3">
                                    <button type="button" class="btn btn-tool"><i class="fas fa-minus"></i></button>
                                 </div>
                              </div>
                              <div class="card-body">
                                 <div class="form-group">
                                    <div class="table-responsive">
                                       <table id="" class="table table-hover table-sm small sortable" cellspacing="0" width=100%>
                                          <thead>
                                             <tr>
                                                <th>Material</th>
                                                <th>Unidades</th>
                                                <th>Ud x Prop</th>
                                                <th>€ ud.</th>
                                                <th>Total</th>
                                                <th>Observaciones</th>
                                                <th colspan="2">Actions</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($materiales as $material)
                                             <form id="form{{$material->id}}" role="form" method="post" action="javascript:void(0)" >
                                             {{-- <form id="form{{$material->id}}" role="form" method="post" action="{{ route('campaign.presupuesto.material.update',$material->id) }}" > --}}
                                                <input type="hidden" name="_tokenMaterial{{$material->id}}" value="{{ csrf_token()}}" id="tokenMaterial{{$material->id}}">
                                                @csrf
                                                <tr>
                                                   <input type="hidden" name="presupuesto_id" value="{{$material->presupuesto_id}}" readonly="readonly">
                                                   <td><input type="text" id="concepto{{$material->id}}" class="form-control-plaintext item" name="concepto" value="{{$material->concepto}}" readonly="readonly"></td>
                                                   <td><input type="number" step="1" id="unidades{{$material->id}}" class="form-control-plaintext item" name="unidades" onchange="totalizar({{$material->id}})"  value="{{$material->unidades}}" readonly="readonly"></td>
                                                   <td><input type="number" step="1" id="uxprop{{$material->id}}" class="form-control-plaintext item" name="uxprop" value="{{$material->uxprop}}" readonly="readonly"></td>
                                                   <td><input type="number"  step="0.01" id="preciounidad{{$material->id}}" class="form-control-plaintext item" name="preciounidad" onchange="totalizar({{$material->id}})"  value="{{$material->preciounidad}}" readonly="readonly"></td>
                                                   <td><input name="total" id="total{{$material->id}}" class="form-control-plaintext item" name="total" value="{{$material->total}}" readonly="readonly"></td>
                                                   <td><input type="text" id="observaciones{{$material->id}}" class="form-control-plaintext item" name="observaciones" value="{{$material->observaciones}}" readonly="readonly"></td>
                                                   <td>
                                                      <a class="editar" title="Editar"><i class="fas fa-edit text-primary fa-lg mx-1"></i></a>
                                                      <a href="#" title="Validar" onclick="actualizarMaterial('form{{$material->id}}',{{$material->id}},'/campaign/presupuesto/material/update/','#tokenMaterial{{$material->id}}')"><i class="far fa-check-circle text-success fa-lg mx-1"></i></a>
                                                      <button type="submit"><i class="fas fa-upload text-primary fa-lg mx-1"></i></button>
                  

                                                      <a href="#" title="Eliminar"><i class="far fa-trash-alt text-danger fa-lg ml-1"></i></a>
                                                   </td>
                                                </tr>
                                             </form>
                                             @endforeach
                                          </tbody>
                                       </table>
                                       {{-- <button type="button" class="btn btn-default btn-block" name="Guardar">Guardar Materiales</button> --}}
                                    </div>
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
                                    <input type="hidden" name="_tokenPromedio" value="{{ csrf_token()}}"
                                       id="tokenPromedio">
                                    <div class="form-group">
                                       @csrf
                                       <input type="hidden" class="" name="campaign_id" value="{{$campaign->id}} " />
                                    </div>
                                    {{-- <button type="button" class="btn btn-default btn-block" name="Guardar"
                                       onclick="asociar({{ $campaign->id}},'/campaign/asociar','#tokenSegmento','segmentosduallistbox[]','Segmentos','segmento','campaign_segmentos')">Asociar
                                    Segmentos</button> --}}
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
                                    <input type="hidden" name="_tokenPicking" value="{{ csrf_token()}}"
                                       id="tokenPicking">
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
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="card-footer">
      </div>
</div>
</div>
</div>
</section>
</div>
@endsection

@push('scriptchosen')

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
      precio=parseFloat($('#preciounidad'+id).val());
      // precio = precio.toString().replace(/\./g,',');
      total=ud*precio;
      $('#preciounidad'+id).val(precio);
      $('#total'+id).val(total);
   }

   $('.editar').click(function(){
      $(this).closest('tr').find('input').removeAttr('readonly');
      $(this).closest('tr').css('background-color','#e2eae4');
   });
</script>

<script>
function actualizarMaterial(formulario,materialId,ruta,tok) {
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
         toastr.success('Línea actualizada con éxito',{
            "progressBar":true,
            "positionClass":"toast-top-center"
         });
      },
      error:function(msj){
         console.log(msj.responseJSON.errors);
         toastr.error("Ha habido un error. <br />No se ha podido actualizar. <br />"+ msj.responseJSON.message,{
            "closeButton": true,
            "progressBar":true,
            "positionClass":"toast-top-center",
            "options.escapeHtml" : true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": 0,
         });
      }
   });
}
</script>

<script>
   $('#menucampaign').addClass('active');
    $('#navpresupuesto').toggleClass('activo');
</script>

@endpush