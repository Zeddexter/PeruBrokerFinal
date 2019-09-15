<?php
/*
    Plugin Name: Broker Contacto - Post Type
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
function broker_contacto_post_type() {

	$labels = array(
		'name'                  => _x( 'contacto', 'Post Type General Name', 'broker-contacto' ),
		'singular_name'         => _x( 'contacto', 'Post Type Singular Name', 'broker-contacto' ),
		'menu_name'             => __( 'contacto', 'broker-contacto' ),
		'name_admin_bar'        => __( 'contacto', 'broker-contacto' ),
		'archives'              => __( 'Archivo', 'broker-contacto' ),
		'attributes'            => __( 'Atributos', 'broker-contacto' ),
		'parent_item_colon'     => __( 'Seccion Padre', 'broker-contacto' ),
		'all_items'             => __( 'Todos los contacto', 'broker-contacto' ),
		'add_new_item'          => __( 'Agregar contacto', 'broker-contacto' ),
		'add_new'               => __( 'Agregar contacto', 'broker-contacto' ),
		'new_item'              => __( 'Nuevo contacto', 'broker-contacto' ),
		'edit_item'             => __( 'Editar contacto', 'broker-contacto' ),
		'update_item'           => __( 'Actualizar contacto', 'broker-contacto' ),
		'view_item'             => __( 'Ver contacto', 'broker-contacto' ),
		'view_items'            => __( 'Ver contacto', 'broker-contacto' ),
		'search_items'          => __( 'Buscar contacto', 'broker-contacto' ),
		'not_found'             => __( 'No Encontrado', 'broker-contacto' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'broker-contacto' ),
		'featured_image'        => __( 'Imagen del contacto', 'broker-contacto' ),
		'set_featured_image'    => __( 'Guardar imagen del contacto', 'broker-contacto' ),
		'remove_featured_image' => __( 'Eliminar Imagen del contacto', 'broker-contacto' ),
		'use_featured_image'    => __( 'Utilizar como imagen del contacto', 'broker-contacto' ),
		'insert_into_item'      => __( 'Insertar contacto', 'broker-contacto' ),
		'uploaded_to_this_item' => __( 'Agregado en contacto', 'broker-contacto' ),
		'items_list'            => __( 'Lista de contacto', 'broker-contacto' ),
		'items_list_navigation' => __( 'Navegación de contacto', 'broker-contacto' ),
		'filter_items_list'     => __( 'Filtrar contacto', 'broker-contacto' ),
	);
	$args = array(
		'label'                 => __( 'Seccion', 'broker-contacto' ),
		'description'           => __( 'Secciones para el Sitio Web', 'broker-contacto' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-location-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'broker_contacto', $args );

}
add_action( 'init', 'broker_contacto_post_type', 0 );
?>