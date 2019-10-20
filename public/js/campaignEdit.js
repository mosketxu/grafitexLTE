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
      data: { campaign_id: campaignId, datoslist:datosDuallist},
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
            toastr.error("Ha habido un error. <br />No se ha podido grabar. <br />Si se repite contacte con el Administrador.<br>"+ msj.responseJSON.message,'Fitro ' + filtro,{
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