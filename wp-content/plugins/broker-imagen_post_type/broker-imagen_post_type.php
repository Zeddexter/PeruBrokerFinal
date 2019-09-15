<?php
/*
    Plugin Name: Broker Imagen Principal - Post Types
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
function broker_imagen_post_type() {

	$labels = array(
		'name'                  => _x( 'Imagen', 'Post Type General Name', 'broker-imagen' ),
		'singular_name'         => _x( 'Imagen', 'Post Type Singular Name', 'broker-imagen' ),
		'menu_name'             => __( 'Imagen principal', 'broker-imagen' ),
		'name_admin_bar'        => __( 'Imagen principal', 'broker-imagen' ),
		'archives'              => __( 'Archivo', 'broker-imagen' ),
		'attributes'            => __( 'Atributos', 'broker-imagen' ),
		'parent_item_colon'     => __( 'Seccion Padre', 'broker-imagen' ),
		'all_items'             => __( 'Todas Las Secciones', 'broker-imagen' ),
		'add_new_item'          => __( 'Agregar Imagen', 'broker-imagen' ),
		'add_new'               => __( 'Agregar Imagen', 'broker-imagen' ),
		'new_item'              => __( 'Nueva Imagen', 'broker-imagen' ),
		'edit_item'             => __( 'Editar Imagen', 'broker-imagen' ),
		'update_item'           => __( 'Actualizar Imagen', 'broker-imagen' ),
		'view_item'             => __( 'Ver Imagen', 'broker-imagen' ),
		'view_items'            => __( 'Ver Imagenes', 'broker-imagen' ),
		'search_items'          => __( 'Buscar Imagen', 'broker-imagen' ),
		'not_found'             => __( 'No Encontrado', 'broker-imagen' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'broker-imagen' ),
		'featured_image'        => __( 'Imagen Principal', 'broker-imagen' ),
		'set_featured_image'    => __( 'Agregar imagen principal', 'broker-imagen' ),
		'remove_featured_image' => __( 'Eliminar Imagen principal', 'broker-imagen' ),
		'use_featured_image'    => __( 'Utilizar como imagen principal', 'broker-imagen' ),
		'insert_into_item'      => __( 'Insertar en Imagen', 'broker-imagen' ),
		'uploaded_to_this_item' => __( 'Agregado en Imagen', 'broker-imagen' ),
		'items_list'            => __( 'Lista de Imagenes', 'broker-imagen' ),
		'items_list_navigation' => __( 'Navegación de Imagenes', 'broker-imagen' ),
		'filter_items_list'     => __( 'Filtrar Imagenes', 'broker-imagen' ),
	);

	
	$args = array(
		'label'                 => __( 'Imagen', 'broker-imagen' ),
		'description'           => __( 'Secciones para el Sitio Web', 'broker-imagen' ),
		'labels'                => $labels,
		'supports'              => array( 'title','editor','thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 1,
        'menu_icon'             => 'dashicons-format-image',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
        'show_admin_column'     => true,
	);
	register_post_type( 'broker-imagen', $args );

}
add_action( 'init', 'broker_imagen_post_type',0);
