<?php 
/*
Plugin Name: Broker Reportes - Post Types
Plugin URI: 
    Description: Añade Post Types al sitio PeruBroker
    Version: 1.0.0
    Author: Joel Torres / Joan Torres
    Author URI: https://www.facebook.com/cyberzsoft/
    Text Domain: PeruBroker
 */

add_action('init','crear_post_type_seccion_reportes', 0);
function crear_post_type_seccion_reportes(){
    // Etiquetas para el Post Type
	$labels = array(
		'name'                => _x( 'Sección Reportes', 'Post Type General Name', 'broker-reportes' ),
		'singular_name'       => _x( 'Sección Reportes', 'Post Type Singular Name', 'broker-reportes' ),
		'menu_name'           => __( 'Sección Reportes', 'broker-reportes' ),
		'parent_item_colon'   => __( 'Reporte Padre', 'broker-reportes' ),
		'all_items'           => __( 'Sección Reportes', 'broker-reportes' ),
		'view_item'           => __( 'Ver Reportes', 'broker-reportes' ),
		'add_new_item'        => __( 'Agregar Nuevo reporte', 'broker-reportes' ),
		'add_new'             => __( '------------------------------', 'broker-reportes' ),
		'edit_item'           => __( 'Editar Reporte', 'broker-reportes' ),
		'update_item'         => __( 'Actualizar Reporte', 'broker-reportes' ),
		'search_items'        => __( 'Buscar Reporte', 'broker-reportes' ),
		'not_found'           => __( 'No encontrado', 'broker-reportes' ),
		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'broker-reportes' ),
    );
    // Otras opciones para el post type

	$args = array(
		'label'               => __( 'reportes', 'broker-reportes' ),
		'description'         => __( 'Reportes news and reviews', 'broker-reportes' ),
		'labels'              => $labels,
		// Todo lo que soporta este post type
		'supports'            => array( 'title','editor', 'thumbnail', 'revisions' ),
		/* Un Post Type hierarchical es como las paginas y puede tener padres e hijos.
		* Uno sin hierarchical es como los posts
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-page',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
    );
    // Por ultimo registramos el post type
	register_post_type( 'seccion_reportes', $args );
}





// Post Type Estadísticas
add_action( 'init', 'crear_post_type_estadistica', 0 );


function crear_post_type_estadistica() {

// Etiquetas para el Post Type
	$labels = array(
		'name'                => _x( 'Estadística', 'Post Type General Name', 'broker-reportes' ),
		'singular_name'       => _x( 'Estadística', 'Post Type Singular Name', 'broker-reportes' ),
		'menu_name'           => __( 'Estadísticas', 'broker-reportes' ),
		'parent_item_colon'   => __( 'Estadística Padre', 'broker-reportes' ),
		'all_items'           => __( '- Estadísticas', 'broker-reportes' ),
		'view_item'           => __( 'Ver Estadísticas', 'broker-reportes' ),
		'add_new_item'        => __( 'Agregar Nueva Estadística', 'broker-reportes' ),
		'add_new'             => __( 'Agregar Nueva Estadística', 'broker-reportes' ),
		'edit_item'           => __( 'Editar Estadística', 'broker-reportes' ),
		'update_item'         => __( 'Actualizar Estadística', 'broker-reportes' ),
		'search_items'        => __( 'Buscar Estadística', 'broker-reportes' ),
		'not_found'           => __( 'No encontrado', 'broker-reportes' ),
		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'broker-reportes' ),
	);

// Otras opciones para el post type

	$args = array(
		'label'               => __( 'estadistica', 'broker-reportes' ),
		'description'         => __( 'Próximas Estadísticas', 'broker-reportes' ),
		'labels'              => $labels,
		// Todo lo que soporta este post type
		'supports'            => array( 'title','revisions' ),
		/* Un Post Type hierarchical es como las paginas y puede tener padres e hijos.
		* Uno sin hierarchical es como los posts
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
        'show_in_menu'        =>  'edit.php?post_type=seccion_reportes',
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'taxonomies' 	      => array('year','frecuencia'),
		'menu_position'       => 5,
   		'menu_icon'           => 'dashicons-calendar-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	// Por ultimo registramos el post type
	register_post_type( 'estadisticas', $args );

}

// Post Type Report fishing
add_action( 'init', 'crear_post_type_fishingreport', 0 );

function crear_post_type_fishingreport() {

// Etiquetas para el Post Type
	$labels = array(
		'name'                => _x( 'Fishing Report', 'Post Type General Name', 'broker-reportes' ),
		'singular_name'       => _x( 'Fishing Report', 'Post Type Singular Name', 'broker-reportes' ),
		'menu_name'           => __( 'Fishing Report', 'broker-reportes' ),
		'parent_item_colon'   => __( 'Fishing Report Padre', 'broker-reportes' ),
		'all_items'           => __( '- Fishing Report', 'broker-reportes' ),
		'view_item'           => __( 'Ver Fishing Reports', 'broker-reportes' ),
		'add_new_item'        => __( 'Agregar Nuevo Fishing Report', 'broker-reportes' ),
		'add_new'             => __( 'Agregar Nuevo Fishing Report', 'broker-reportes' ),
		'edit_item'           => __( 'Editar Fishing Report', 'broker-reportes' ),
		'update_item'         => __( 'Actualizar Fishing Report', 'broker-reportes' ),
		'search_items'        => __( 'Buscar Fishing Report', 'broker-reportes' ),
		'not_found'           => __( 'No encontrado', 'broker-reportes' ),
		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'broker-reportes' ),
	);

// Otras opciones para el post type

	$args = array(
		'label'               => __( 'fishing report', 'broker-reportes' ),
		'description'         => __( 'Próximos Fishing report', 'broker-reportes' ),
		'labels'              => $labels,
		// Todo lo que soporta este post type
		'supports'            => array( 'title','revisions' ),
		/* Un Post Type hierarchical es como las paginas y puede tener padres e hijos.
		* Uno sin hierarchical es como los posts
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
        'show_in_menu'        =>  'edit.php?post_type=seccion_reportes',
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'taxonomies' 	      => array('year','frecuencia'),
   		'menu_icon'           => 'dashicons-calendar-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	// Por ultimo registramos el post type
	register_post_type( 'fishing_report', $args );

}

add_action('init','crear_post_type_reportes', 0);
function crear_post_type_reportes(){
    // Etiquetas para el Post Type
	$labels = array(
		'name'                => _x( 'Reportes', 'Post Type General Name', 'broker-reportes' ),
		'singular_name'       => _x( 'Reporte', 'Post Type Singular Name', 'broker-reportes' ),
		'menu_name'           => __( 'Reportes', 'broker-reportes' ),
		'parent_item_colon'   => __( 'Reporte Padre', 'broker-reportes' ),
		'all_items'           => __( '- Reportes', 'broker-reportes' ),
		'view_item'           => __( 'Ver Reportes', 'broker-reportes' ),
		'add_new_item'        => __( 'Agregar Nuevo reporte', 'broker-reportes' ),
		'add_new'             => __( 'Agregar Nuevo reporte', 'broker-reportes' ),
		'edit_item'           => __( 'Editar Reporte', 'broker-reportes' ),
		'update_item'         => __( 'Actualizar Reporte', 'broker-reportes' ),
		'search_items'        => __( 'Buscar Reporte', 'broker-reportes' ),
		'not_found'           => __( 'No encontrado', 'broker-reportes' ),
		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'broker-reportes' ),
    );
    // Otras opciones para el post type

	$args = array(
		'label'               => __( 'reportes', 'broker-reportes' ),
		'description'         => __( 'Reportes news and reviews', 'broker-reportes' ),
		'labels'              => $labels,
		// Todo lo que soporta este post type
		'supports'            => array( 'title', 'revisions' ),
		/* Un Post Type hierarchical es como las paginas y puede tener padres e hijos.
		* Uno sin hierarchical es como los posts
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        =>  'edit.php?post_type=seccion_reportes',
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'taxonomies' 	      => array('year','frecuencia'),
		'menu_icon'           => 'dashicons-admin-page',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
    );
    // Por ultimo registramos el post type
	register_post_type( 'reportes', $args );
}
//Taxonomias

//Frecuencia
function taxonomia_frecuencia(){
	$labels = array(
		'name'              => _x( 'Frecuencia', 'taxonomy general name' ),
		'singular_name'     => _x( 'Frecuencia', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar frecuencia' ),
		'all_items'         => __( 'Todas las frecuencias' ),
		'parent_item'       => __( 'frecuencia Padre' ),
		'parent_item_colon' => __( 'frecuencia Padre:' ),
		'edit_item'         => __( 'Editar frecuencia' ),
		'update_item'       => __( 'Actualizar frecuencia' ),
		'add_new_item'      => __( 'Agregar Nuevo frecuencia' ),
		'new_item_name'     => __( 'Nuevo frecuencia' ),
		'menu_name'         => __( 'frecuencia' ),
	);
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
        'query_var'         => true,
        'show_in_menu'        => false,
		'rewrite' => array( 'slug' => 'frecuencia' ),
	);
	
	register_taxonomy( 'frecuencia', array( 'reportes','estadisticas','fishing_report' ), $args );
}
add_action('init', 'taxonomia_frecuencia');

//Temporada
function taxonomia_temporada(){
	$labels = array(
		'name'              => _x( 'Temporada', 'taxonomy general name' ),
		'singular_name'     => _x( 'Temporada', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar temporada' ),
		'all_items'         => __( 'Todas las temporadas' ),
		'parent_item'       => __( 'temporada Padre' ),
		'parent_item_colon' => __( 'temporada Padre:' ),
		'edit_item'         => __( 'Editar temporada' ),
		'update_item'       => __( 'Actualizar temporada' ),
		'add_new_item'      => __( 'Agregar Nuevo temporada' ),
		'new_item_name'     => __( 'Nuevo temporada' ),
        'menu_name'         => __( 'temporada' ),
      
	);
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
        'query_var'         => true,
        'show_in_menu'        => false,
		'rewrite' => array( 'slug' => 'temporada' ),
	);
	
	register_taxonomy( 'temporada', array( 'reportes','fishing_report' ), $args );
}
add_action('init', 'taxonomia_temporada');

//Regiones
function taxonomia_regiones(){
	$labels = array(
		'name'              => _x( 'regiones', 'taxonomy general name' ),
		'singular_name'     => _x( 'region', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar region' ),
		'all_items'         => __( 'Todas las regiones' ),
		'parent_item'       => __( 'region Padre' ),
		'parent_item_colon' => __( 'region Padre:' ),
		'edit_item'         => __( 'Editar region' ),
		'update_item'       => __( 'Actualizar regiones' ),
		'add_new_item'      => __( 'Agregar Nuevo region' ),
		'new_item_name'     => __( 'Nueva region' ),
		'menu_name'         => __( 'regiones' ),
	);
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
        'query_var'         => true,
        'show_in_menu'        => false,
		'rewrite' => array( 'slug' => 'regiones' ),
	);
	
	register_taxonomy( 'regiones', array( 'reportes','fishing_report' ), $args );
}
add_action('init', 'taxonomia_regiones');

//Año
function taxonomia_year(){
	$labels = array(
		'name'              => _x( 'Año', 'taxonomy general name' ),
		'singular_name'     => _x( 'Año', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar año' ),
		'all_items'         => __( 'Todos los años' ),
		'parent_item'       => __( 'año Padre' ),
		'parent_item_colon' => __( 'año Padre:' ),
		'edit_item'         => __( 'Editar año' ),
		'update_item'       => __( 'Actualizar año' ),
		'add_new_item'      => __( 'Agregar Nuevo año' ),
		'new_item_name'     => __( 'Nuevo año' ),
		'menu_name'         => __( 'año' ),
	);
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
        'query_var'         => true,
        'show_in_menu'        => false,
		'rewrite' => array( 'slug' => 'year' ),
	);
	
	register_taxonomy( 'year', array( 'reportes','estadisticas','fishing_report' ), $args );
}
add_action('init', 'taxonomia_year');