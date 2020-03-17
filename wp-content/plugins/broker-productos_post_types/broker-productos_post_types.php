<?php
/*
    Plugin Name: Broker Productos - Post Types
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
function broker_productos_post_type() {

	$labels = array(
		'name'                  => _x( 'Productos', 'Post Type General Name', 'broker-productos' ),
		'singular_name'         => _x( 'Productos', 'Post Type Singular Name', 'broker-productos' ),
		'menu_name'             => __( 'Productos', 'broker-productos' ),
		'name_admin_bar'        => __( 'Seccion', 'broker-productos' ),
		'archives'              => __( 'Archivo', 'broker-productos' ),
		'attributes'            => __( 'Atributos', 'broker-productos' ),
		'parent_item_colon'     => __( 'Seccion Padre', 'broker-productos' ),
		'all_items'             => __( 'Todos los productos', 'broker-productos' ),
		'add_new_item'          => __( 'Agregar producto', 'broker-productos' ),
		'add_new'               => __( 'Agregar producto', 'broker-productos' ),
		'new_item'              => __( 'Nueva producto', 'broker-productos' ),
		'edit_item'             => __( 'Editar producto', 'broker-productos' ),
		'update_item'           => __( 'Actualizar producto', 'broker-productos' ),
		'view_item'             => __( 'Ver producto', 'broker-productos' ),
		'view_items'            => __( 'Ver producto', 'broker-productos' ),
		'search_items'          => __( 'Buscar producto', 'broker-productos' ),
		'not_found'             => __( 'No Encontrado', 'broker-productos' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'broker-productos' ),
		'featured_image'        => __( 'Imagen Destacada', 'broker-productos' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'broker-productos' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'broker-productod' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'broker-productos' ),
		'insert_into_item'      => __( 'Insertar en Seccion', 'broker-productos' ),
		'uploaded_to_this_item' => __( 'Agregado en Seccion', 'broker-productos' ),
		'items_list'            => __( 'Lista de Secciones', 'broker-productos' ),
		'items_list_navigation' => __( 'Navegación de Secciones', 'broker-productos' ),
		'filter_items_list'     => __( 'Filtrar Secciones', 'broker-productos' ),
	);
	$args = array(
		'label'                 => __( 'Seccion', 'broker-productos' ),
		'description'           => __( 'Secciones para el Sitio Web', 'broker-productos' ),
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
	register_post_type( 'broker_productos', $args );

}
add_action( 'init', 'broker_productos_post_type', 0 );
?>