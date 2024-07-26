<footer>
    <div class="container-fluid menu-footer">
      <div class="row margen-top">
         <div class="col-12 hidden-xs hidden-sm menu-footer-div text-center">
            <?php wp_nav_menu( array( 'theme_location' => 'navigation_footer' ) ); ?>
         </div>
         <div class="col-12 col-md-10 text-center footer-comment">
            <p>Este material cuenta con derechos de propiedad intelectual. De no existir previa autorización por escrito de LATITUD MEGALÓPOLIS © <?php echo date("Y") ?>, Compañía periodística, queda expresamente prohibida la publicación, retransmisión, distribución, venta, edición y cualquier otro uso de los contenidos.</p>
         </div>
         <div class="col-2 oculto-xs">
            <img class="full-img-fo" src="<?php bloginfo('template_url'); ?>/resources/logo_nuevo2.png" alt="">
         </div>
      </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
<script src="<?php bloginfo('template_url'); ?>/js/scroll.js"></script>
<script type="text/javascript">
n =  new Date();
//Año
y = n.getFullYear();
//Mes
m = n.getMonth();
//Día
d = n.getDate();

var mes = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]
//Lo ordenas a gusto.
document.getElementById("fecha").innerHTML = d + " de " + mes[m] + " de " + y;
</script>
</html>
