<?php

/**
 * Crear nuestros menús gestionables desde el
 * administrador de Wordpress.
 */
/*Creacion de los menus para utilizarlos en Wordpress*/
function regiones_menu() {
  register_nav_menus(
    array(
      'navigation_regiones' => __( 'Menú de regiones' ),
    )
  );
}
add_action( 'init', 'regiones_menu' );
function movil_menu() {
  register_nav_menus(
    array(
      'navigation_movil' => __( 'Menú de regiones para movil' ),
    )
  );
}
add_action( 'init', 'movil_menu' );
function footer_menu() {
  register_nav_menus(
    array(
      'navigation_footer' => __( 'Menú para el footer' ),
    )
  );
}
/**
 * Crear una zonan de widgets que podremos gestionar
 * fácilmente desde administrador de Wordpress.
 */

function mis_widgets(){
 register_sidebar(
   array(
       'name'          => __( 'Sidebar' ),
       'id'            => 'sidebar',
       'before_widget' => '<div class="widget">',
       'after_widget'  => '</div>',
       'before_title'  => '<h3>',
       'after_title'   => '</h3>',
   )
 );
 register_sidebar(
   array(
       'name'          => __( 'SidebarContador' ),
       'id'            => 'sidebarContador',
       'before_widget' => '<div class="widget">',
       'after_widget'  => '</div>',
       'before_title'  => '<h3>',
       'after_title'   => '</h3>',
   )
 );
}
add_action('init','mis_widgets');


/**
 * Filtrar resultados de búsqueda para que solo muestre
 * posts en el listado
 */

//function buscar_solo_posts($query) {
// if($query->is_search) {
//   $query->set('post_type','post');
// }
// return $query;
//}
//add_filter('pre_get_posts','buscar_solo_posts');

/**
    *Insertar imagen destacada al tema de wordpress
    *Opciones para incrustar en html
    *<?php the_post_thumbnail( $size, $attr ); ?>

    *the_post_thumbnail('thumbnail'); // Thumbnail (default 150px x 150px max)
    *the_post_thumbnail('medium'); // Medium resolution (default 300px x 300px max)
    *the_post_thumbnail('large'); // Large resolution (default 640px x 640px max)
    *the_post_thumbnail('full'); // Full resolution (original size uploaded)
    *the_post_thumbnail( array(100,100) ); // Other resolutions
*/
add_action( 'init', 'footer_menu' );

/*Habilitar miniaturas en post*/
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );


//Agregamos Open Graph en los Language Attributes
function add_opengraph_doctype( $output ) {
        return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
    }
add_filter('language_attributes', 'add_opengraph_doctype');

//Añadimos la información Open Graph
function insert_fb_in_head() {
    global $post;
    if ( !is_singular()) //Si no es un post o página
        return;
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
//     if(!has_post_thumbnail( $post->ID )) { //La entrada no tiene imagen destacada, utiliza una imagen predeterminada
//         $default_image="http://latitudmegalopolis.com/wp-content/themes/latitud/img/i_logo.png"; //Aquí tienes que poner la ruta de la imagen prefeterminada que se mostrará.
//         echo '<meta property="og:image" content="' . $default_image . '"/>';
//     }
//     else{
//         $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
//         echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
//     }
//     echo "
// ";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

//Quitar funcion Jetpack’s Open Graph meta tags
add_filter( 'jetpack_enable_open_graph', '__return_false' );
