// Botones collapse
//=================
//boton collapse  Stores
$('#stores').on('shown.bs.collapse', function() {
   $("#btnstores").removeClass("fas fa-plus").addClass("fas fa-minus");
});
$('#stores').on('hidden.bs.collapse', function() {
   $("#btnstores").removeClass("fas fa-minus").addClass("fas fa-plus");
});
//boton collapse  Medidas
$('#medidas').on('shown.bs.collapse', function() {
   $("#btnmedidas").removeClass("fas fa-plus").addClass("fas fa-minus");
});
$('#medidas').on('hidden.bs.collapse', function() {
   $("#btnmedidas").removeClass("fas fa-minus").addClass("fas fa-plus");
});
//boton collapse  Cartelerias
$('#cartelerias').on('shown.bs.collapse', function() {
   $("#btncartelerias").removeClass("fas fa-plus").addClass("fas fa-minus");
});
$('#cartelerias').on('hidden.bs.collapse', function() {
   $("#btncartelerias").removeClass("fas fa-minus").addClass("fas fa-plus");
});
//boton collapse  Mobiliarios
$('#mobiliarios').on('shown.bs.collapse', function() {
   $("#btnmobiliarios").removeClass("fas fa-plus").addClass("fas fa-minus");
});
$('#mobiliarios').on('hidden.bs.collapse', function() {
   $("#btnmobiliarios").removeClass("fas fa-minus").addClass("fas fa-plus");
});
//boton collapse  Ubicaciones
$('#ubicaciones').on('shown.bs.collapse', function() {
   $("#btnubicaciones").removeClass("fas fa-plus").addClass("fas fa-minus");
});
$('#ubicaciones').on('hidden.bs.collapse', function() {
   $("#btnubicaciones").removeClass("fas fa-minus").addClass("fas fa-plus");
});
//boton collapse  Segmentos
$('#segmentos').on('shown.bs.collapse', function() {
   $("#btnsegmentos").removeClass("fas fa-plus").addClass("fas fa-minus");
});
$('#segmentos').on('hidden.bs.collapse', function() {
   $("#btnsegmentos").removeClass("fas fa-minus").addClass("fas fa-plus");
});
//boton collapse  Store Concepts
$('#storeconcepts').on('shown.bs.collapse', function() {
   $("#btnstoreconcepts").removeClass("fas fa-plus").addClass("fas fa-minus");
});
$('#storeconcepts').on('hidden.bs.collapse', function() {
   $("#btnstoreconcepts").removeClass("fas fa-minus").addClass("fas fa-plus");
});
//boton collapse  Area Concepts
$('#areas').on('shown.bs.collapse', function() {
   $("#btnareas").removeClass("fas fa-plus").addClass("fas fa-minus");
});
$('#areas').on('hidden.bs.collapse', function() {
   $("#btnareas").removeClass("fas fa-minus").addClass("fas fa-plus");
});
//boton collapse  Country Concepts
$('#countries').on('shown.bs.collapse', function() {
   $("#btncountries").removeClass("fas fa-plus").addClass("fas fa-minus");
});
$('#countries').on('hidden.bs.collapse', function() {
   $("#btncountries").removeClass("fas fa-minus").addClass("fas fa-plus");
});
 
// Duallistbox
// ===========

    //Duallistbox Con filtro
    var duallist = $('.duallistbox').bootstrapDualListbox({
        nonSelectedListLabel: 'No Seleccionadas',
        selectedListLabel: 'Seleccionadas',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: false,
        filterPlaceHolder:'Filtros...',
    });
    //Duallistbox Sin filtro
    var duallist = $('.duallistboxSinFiltro').bootstrapDualListbox({
        nonSelectedListLabel: 'No Seleccionadas',
        selectedListLabel: 'Seleccionadas',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: false,
        filterPlaceHolder:'Filtros...',
        showFilterInputs:false,
    });


// Funciones asociar
// =================

// Asociar 
function asociar(campaignId,ruta,tok,datosduallist,filtro) {
   var token = $(tok).val();
   var route = ruta;
   // var datosDuallist=$(datosduallist).val();
   var datosDuallist=$('[name="'+datosduallist+'"]').val();

   $.ajax({
      url: route,
      headers: { "X-CSRF-TOKEN": token },
      type: "POST",
      dataType: "json",
      data: { campaign_id: campaignId, datoslist:datosDuallist  },
      success: function(data) {
         if(data.cont==true){
            toastr.info('Datos actualizados con éxito','Filtro ' + filtro,{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
         else{
            toastr.warning('Todos los filtros Stores borrados','Filtro ' + filtro,{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
      },
      error:function(msj){
            console.log(msj.responseJSON.errors);
            toastr.error("Ha habido un error. <br />No se ha podido grabar. <br />Si se repite contacte con el Administrador.",'Fitro ' + filtro,{
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




// Asociar Store
function asociarStore(campaignId) {
   var token = $("#tokenStore").val();
   var route = "/campaignstore";
   var stores=$('[name="storesduallistbox[]"]').val();
   $.ajax({
      url: route,
      headers: { "X-CSRF-TOKEN": token },
      type: "POST",
      dataType: "json",
      data: { campaign_id: campaignId, stores:stores  },
      success: function(data) {
         if(data.cont==true){
            toastr.info('Datos actualizados con éxito','Filtro Stores',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
         else{
            toastr.warning('Todos los filtros Stores borrados','Filtro Stores',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
      },
      error:function(msj){
            console.log(msj.responseJSON.errors);
            toastr.error("Ha habido un error. <br />No se ha podido grabar. <br />Si se repite contacte con el Administrador.",'Fitro stores',{
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


// Asociar Medida
function asociarMedida(campaignId) {
   var token = $("#tokenMedida").val();
   var route = "/campaignmedida";
   var medidas=$('[name="medidasduallistbox[]"]').val();
   $.ajax({
      url: route,
      headers: { "X-CSRF-TOKEN": token },
      type: "POST",
      dataType: "json",
      data: { campaign_id: campaignId, medidas:medidas  },
      success: function(data) {
         if(data.cont==true){
            toastr.info('Datos actualizados con éxito','Filtro Medidas',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
         else{
            toastr.warning('Todos los filtros Medidas borrados','Filtro Medidas',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
      },
      error:function(msj){
            console.log(msj.responseJSON.errors);
            toastr.error("Ha habido un error. <br />No se ha podido grabar. <br />Si se repite contacte con el Administrador.",'Fitro medidas',{
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



// Asociar Carteleria
function asociarCarteleria(campaignId) {
   var token = $("#tokenCarteleria").val();
   var route = "/campaigncarteleria";
   var cartelerias=$('[name="carteleriasduallistbox[]"]').val();
   $.ajax({
      url: route,
      headers: { "X-CSRF-TOKEN": token },
      type: "POST",
      dataType: "json",
      data: { campaign_id: campaignId, cartelerias:cartelerias  },
      success: function(data) {
         if(data.cont==true){
            toastr.info('Datos actualizados con éxito','Filtro Cartelerias',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
         else{
            toastr.warning('Todos los filtros Cartelerias borrados','Filtro Cartelerias',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
      },
      error:function(msj){
            console.log(msj.responseJSON.errors);
            toastr.error("Ha habido un error. <br />No se ha podido grabar. <br />Si se repite contacte con el Administrador.",'Fitro cartelerias',{
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

// Asociar Mobiliario
function asociarMobiliario(campaignId) {
   var token = $("#tokenMobiliario").val();
   var route = "/campaignmobiliario";
   var mobiliarios=$('[name="mobiliariosduallistbox[]"]').val();
   $.ajax({
      url: route,
      headers: { "X-CSRF-TOKEN": token },
      type: "POST",
      dataType: "json",
      data: { campaign_id: campaignId, mobiliarios:mobiliarios  },
      success: function(data) {
         if(data.cont==true){
            toastr.info('Datos actualizados con éxito','Filtros Mobiliarios',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
         else{
            toastr.warning('Todos los filtros Mobiliarios borrados','Filtro Mobiliarios',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
      },
      error:function(msj){
            console.log(msj.responseJSON.errors);
            toastr.error("Ha habido un error. <br />No se ha podido grabar. <br />Si se repite contacte con el Administrador.",'Fitro Mobiliarios',{
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


// Asociar Ubicaciones
function asociarUbicacion(campaignId) {
   var token = $("#tokenUbicacion").val();
   var route = "/campaignubicacion";
   var ubicaciones=$('[name="ubicacionesduallistbox[]"]').val();
   $.ajax({
      url: route,
      headers: { "X-CSRF-TOKEN": token },
      type: "POST",
      dataType: "json",
      data: { campaign_id: campaignId, ubicaciones:ubicaciones  },
      success: function(data) {
         if(data.cont==true){
            toastr.info('Datos actualizados con éxito','Filtro Ubicaciones',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
         else{
            toastr.warning('Todos los filtros Ubicaciones borrados','Filtro Ubicaciones',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
      },
      error:function(msj){
            console.log(msj.responseJSON.errors);
            toastr.error("Ha habido un error. <br />No se ha podido grabar. <br />Si se repite contacte con el Administrador.",'Fitro Ubicaciones',{
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


// Asociar Segmentos
function asociarSegmento(campaignId) {
   var token = $("#tokenSegmento").val();
   var route = "/campaignsegmento";
   var segmentos=$('[name="segmentosduallistbox[]"]').val();
   $.ajax({
      url: route,
      headers: { "X-CSRF-TOKEN": token },
      type: "POST",
      dataType: "json",
      data: { campaign_id: campaignId, segmentos:segmentos  },
      success: function(data) {
         if(data.cont==true){
            toastr.info('Datos actualizados con éxito','Filtro Segmentos',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
         else{
            toastr.warning('Todos los filtros Segmentos borrados','Filtro Segmentos',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
      },
      error:function(msj){
            console.log(msj.responseJSON.errors);
            toastr.error("Ha habido un error. <br />No se ha podido grabar. <br />Si se repite contacte con el Administrador.",'Fitro Segmentos',{
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

// Asociar Store Concepts
function asociarStoreconcept(campaignId) {
   var token = $("#tokenStoreconcept").val();
   var route = "/campaignstoreconcept";
   var storeconcepts=$('[name="storeconceptsduallistbox[]"]').val();
   $.ajax({
      url: route,
      headers: { "X-CSRF-TOKEN": token },
      type: "POST",
      dataType: "json",
      data: { campaign_id: campaignId, storeconcepts:storeconcepts  },
      success: function(data) {
         if(data.cont==true){
            toastr.info('Datos actualizados con éxito','Filtro Store Concepts',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
         else{
            toastr.warning('Todos los filtros Store Concepts borrados','Filtro Store Concepts',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
      },
      error:function(msj){
            console.log(msj.responseJSON.errors);
            toastr.error("Ha habido un error. <br />No se ha podido grabar. <br />Si se repite contacte con el Administrador.",'Fitro Store Concepts',{
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

// Asociar Areas
function asociarArea(campaignId) {
   var token = $("#tokenArea").val();
   var route = "/campaignarea";
   var areas=$('[name="areasduallistbox[]"]').val();
   $.ajax({
      url: route,
      headers: { "X-CSRF-TOKEN": token },
      type: "POST",
      dataType: "json",
      data: { campaign_id: campaignId, areas:areas  },
      success: function(data) {
         if(data.cont==true){
            toastr.info('Datos actualizados con éxito','Filtro Areas',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
         else{
            toastr.warning('Todos los filtros Areas borrados','Filtro Areas',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
      },
      error:function(msj){
            console.log(msj.responseJSON.errors);
            toastr.error("Ha habido un error. <br />No se ha podido grabar. <br />Si se repite contacte con el Administrador.",'Fitro Area',{
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


// Asociar Countries
function asociarCountry(campaignId) {
   var token = $("#tokenCountry").val();
   var route = "/campaigncountry";
   var countries=$('[name="countriesduallistbox[]"]').val();
   $.ajax({
      url: route,
      headers: { "X-CSRF-TOKEN": token },
      type: "POST",
      dataType: "json",
      data: { campaign_id: campaignId, countries:countries  },
      success: function(data) {
         if(data.cont==true){
            toastr.info('Datos actualizados con éxito','Filtro Countries',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
         else{
            toastr.warning('Todos los filtros Countries borrados','Filtro Countries',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
         }
      },
      error:function(msj){
            // console.log(msj.responseJSON.errors);
            // $("#msj").html(msj.responseJSON.errors.campaign_id);
            // $("#msj-error").fadeIn();
            // toastr.error(msj.responseJSON.errors.campaign_id,'Fitro Country',{
            toastr.error("Ha habido un error. <br />No se ha podido grabar. <br />Si se repite contacte con el Administrador.",'Fitro Country',{
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

