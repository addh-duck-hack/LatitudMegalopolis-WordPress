$(document).ready(function(){
	var altura = $('.nav-principal').offset().top;

	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('.nav-principal').addClass('menu-fixed');
		} else {
			$('.nav-principal').removeClass('menu-fixed');
		}
	});
	$.get("https://api.latitudmegalopolis.com/functions/valores.php",{keycode: "SUMVISITAS"}, function (respuesta){console.log(respuesta.Mensaje)}, "json");
});
