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
            toastr.info('Datos actualizados con éxito','Filtro stores',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
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
            toastr.info('Datos actualizados con éxito','Filtro medidas',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
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
            toastr.info('Datos actualizados con éxito','Filtro cartelerias',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
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
            toastr.info('Datos actualizados con éxito','Filtro mobiliarios',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
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
            toastr.info('Datos actualizados con éxito','Filtro ubicaciones',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
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
            toastr.info('Datos actualizados con éxito','Filtro Segmentos',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
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
            toastr.info('Datos actualizados con éxito','Filtro Store Concepts',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
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
            toastr.info('Datos actualizados con éxito','Filtro Area',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
      },
      error:function(msj){
            // console.log(msj.responseJSON.errors);
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
            toastr.info('Datos actualizados con éxito','Filtro Country',{
               "progressBar":true,
               "positionClass":"toast-top-center"
            });
            // $("#msj-success").fadeIn();
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

