<?php
/*
    Plugin Name: Broker Servicios - Post Types
    Plugin URI: 
    Description: Añade Post Types al sitio PeruBroker
    Version: 1.0.0
    Author: Joel Torres / Joan Torres
    Author URI: https://www.facebook.com/cyberzsoft/
    Text Domain: PeruBroker
 */
 //Cuando alguien trate de acceder no le muestre el contenido del plugin solo se muestre en blanco.
 if(!defined('ABSPATH')) die();
 
// Registrar Custom Post Type
function broker_servicios_post_type() {

	$labels = array(
		'name'                  => _x( 'Servicios', 'Post Type General Name', 'broker-servicios' ),
		'singular_name'         => _x( 'Servicios', 'Post Type Singular Name', 'broker-servicios' ),
		'menu_name'             => __( 'Servicios', 'broker-servicios' ),
		'name_admin_bar'        => __( 'Seccion', 'broker-servicios' ),
		'archives'              => __( 'Archivo', 'broker-servicios' ),
		'attributes'            => __( 'Atributos', 'broker-servicios' ),
		'parent_item_colon'     => __( 'Seccion Padre', 'broker-servicios' ),
		'all_items'             => __( 'Todos los servicios', 'broker-servicios' ),
		'add_new_item'          => __( 'Agregar servicio', 'broker-servicios' ),
		'add_new'               => __( 'Agregar servicio', 'broker-servicios' ),
		'new_item'              => __( 'Nueva servicio', 'broker-servicios' ),
		'edit_item'             => __( 'Editar servicio', 'broker-servicios' ),
		'update_item'           => __( 'Actualizar servicio', 'broker-servicios' ),
		'view_item'             => __( 'Ver servicio', 'broker-servicios' ),
		'view_items'            => __( 'Ver servicioes', 'broker-servicios' ),
		'search_items'          => __( 'Buscar servicio', 'broker-servicios' ),
		'not_found'             => __( 'No Encontrado', 'broker-servicios' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'broker-servicios' ),
		'featured_image'        => __( 'Imagen Destacada', 'broker-servicios' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'broker-servicios' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'broker-servicios' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'broker-servicios' ),
		'insert_into_item'      => __( 'Insertar en Seccion', 'broker-servicios' ),
		'uploaded_to_this_item' => __( 'Agregado en Seccion', 'broker-servicios' ),
		'items_list'            => __( 'Lista de Secciones', 'broker-servicios' ),
		'items_list_navigation' => __( 'Navegación de Secciones', 'broker-servicios' ),
		'filter_items_list'     => __( 'Filtrar Secciones', 'broker-servicios' ),
	);
	$args = array(
		'label'                 => __( 'Seccion', 'broker-servicios' ),
		'description'           => __( 'Secciones para el Sitio Web', 'broker-servicios' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-editor-kitchensink',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'broker_servicios', $args );

}
add_action( 'init', 'broker_servicios_post_type', 0 );
?>