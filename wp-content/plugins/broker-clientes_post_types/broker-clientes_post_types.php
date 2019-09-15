<?php
/*
    Plugin Name: Broker Clientes - Post Type
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
function broker_clientes_post_type() {

	$labels = array(
		'name'                  => _x( 'Clientes', 'Post Type General Name', 'broker-clientes' ),
		'singular_name'         => _x( 'Clientes', 'Post Type Singular Name', 'broker-clientes' ),
		'menu_name'             => __( 'Clientes', 'broker-clientes' ),
		'name_admin_bar'        => __( 'Seccion', 'broker-clientes' ),
		'archives'              => __( 'Archivo', 'broker-clientes' ),
		'attributes'            => __( 'Atributos', 'broker-clientes' ),
		'parent_item_colon'     => __( 'Seccion Padre', 'broker-clientes' ),
		'all_items'             => __( 'Todos los clientes', 'broker-clientes' ),
		'add_new_item'          => __( 'Agregar cliente', 'broker-clientes' ),
		'add_new'               => __( 'Agregar cliente', 'broker-clientes' ),
		'new_item'              => __( 'Nuevo cliente', 'broker-clientes' ),
		'edit_item'             => __( 'Editar cliente', 'broker-clientes' ),
		'update_item'           => __( 'Actualizar cliente', 'broker-clientes' ),
		'view_item'             => __( 'Ver cliente', 'broker-clientes' ),
		'view_items'            => __( 'Ver clientes', 'broker-clientes' ),
		'search_items'          => __( 'Buscar cliente', 'broker-clientes' ),
		'not_found'             => __( 'No Encontrado', 'broker-clientes' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'broker-clientes' ),
		'featured_image'        => __( 'Imagen del cliente', 'broker-clientes' ),
		'set_featured_image'    => __( 'Guardar imagen del cliente', 'broker-clientes' ),
		'remove_featured_image' => __( 'Eliminar Imagen del cliente', 'broker-clientes' ),
		'use_featured_image'    => __( 'Utilizar como imagen del cliente', 'broker-clientes' ),
		'insert_into_item'      => __( 'Insertar cliente', 'broker-clientes' ),
		'uploaded_to_this_item' => __( 'Agregado en clientes', 'broker-clientes' ),
		'items_list'            => __( 'Lista de clientes', 'broker-clientes' ),
		'items_list_navigation' => __( 'Navegación de clientes', 'broker-clientes' ),
		'filter_items_list'     => __( 'Filtrar clientes', 'broker-clientes' ),
	);
	$args = array(
		'label'                 => __( 'Seccion', 'broker-clientes' ),
		'description'           => __( 'Secciones para el Sitio Web', 'broker-clientes' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-universal-access-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'broker_clientes', $args );

}
add_action( 'init', 'broker_clientes_post_type', 0 );
?>