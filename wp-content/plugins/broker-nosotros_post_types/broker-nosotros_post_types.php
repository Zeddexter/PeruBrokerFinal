<?php
/*
    Plugin Name: Broker Nosotros - Post Types
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
function broker_post_type() {

	$labels = array(
		'name'                  => _x( 'Nosotros', 'Post Type General Name', 'broker-nosotros' ),
		'singular_name'         => _x( 'Nosotros', 'Post Type Singular Name', 'broker-nosotros' ),
		'menu_name'             => __( 'Nosotros', 'broker-nosotros' ),
		'name_admin_bar'        => __( 'Seccion', 'broker-nosotros' ),
		'archives'              => __( 'Archivo', 'broker-nosotros' ),
		'attributes'            => __( 'Atributos', 'broker-nosotros' ),
		'parent_item_colon'     => __( 'Seccion Padre', 'broker-nosotros' ),
		'all_items'             => __( 'Todas Las Secciones', 'broker-nosotros' ),
		'add_new_item'          => __( 'Agregar sección', 'broker-nosotros' ),
		'add_new'               => __( 'Agregar sección', 'broker-nosotros' ),
		'new_item'              => __( 'Nueva seccion', 'broker-nosotros' ),
		'edit_item'             => __( 'Editar Seccion', 'broker-nosotros' ),
		'update_item'           => __( 'Actualizar Seccion', 'broker-nosotros' ),
		'view_item'             => __( 'Ver Seccion', 'broker-nosotros' ),
		'view_items'            => __( 'Ver Secciones', 'broker-nosotros' ),
		'search_items'          => __( 'Buscar', 'broker-nosotros' ),
		'not_found'             => __( 'No Encontrado', 'broker-nosotros' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'broker-nosotros' ),
		'featured_image'        => __( 'Imagen Destacada', 'broker-nosotros' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'broker-nosotros' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'broker-nosotros' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'broker-nosotros' ),
		'insert_into_item'      => __( 'Insertar en Seccion', 'broker-nosotros' ),
		'uploaded_to_this_item' => __( 'Agregado en Seccion', 'broker-nosotros' ),
		'items_list'            => __( 'Lista de Secciones', 'broker-nosotros' ),
		'items_list_navigation' => __( 'Navegación de Secciones', 'broker-nosotros' ),
		'filter_items_list'     => __( 'Filtrar Secciones', 'broker-nosotros' ),
	);

	
	$args = array(
		'label'                 => __( 'Seccion', 'broker-nosotros' ),
		'description'           => __( 'Secciones para el Sitio Web', 'broker-nosotros' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 2,
        'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_admin_column'     => true,
	);
	register_post_type( 'broker_Seccion', $args );

}
add_action( 'init', 'broker_post_type','my_admin_menu');
