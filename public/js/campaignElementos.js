// Botones collapse
//=================
//boton collapse  Elementos
$('#elementos').on('shown.bs.collapse', function() {
   $("#btnelementos").removeClass("fas fa-plus").addClass("fas fa-minus");
});
$('#elementos').on('hidden.bs.collapse', function() {
   $("#btnelementos").removeClass("fas fa-minus").addClass("fas fa-plus");
});
//boton collapse  conteos
$('#conteos').on('shown.bs.collapse', function() {
   $("#btnconteos").removeClass("fas fa-plus").addClass("fas fa-minus");
});
$('#conteos').on('hidden.bs.collapse', function() {
   $("#btnconteos").removeClass("fas fa-minus").addClass("fas fa-plus");
});