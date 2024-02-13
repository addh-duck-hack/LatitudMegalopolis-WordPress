$(window).load(function() {
   var fecha = new Date(),
   diaSemana = fecha.getDay(),
   dia = fecha.getDate(),
   mes = fecha.getMonth(),
   year = fecha.getFullYear();
   var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
   var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

   $("#fecha").html('<h1>'+semana[diaSemana]+', '+dia+' de '+meses[mes]+' del '+year+'</h1>');
});
