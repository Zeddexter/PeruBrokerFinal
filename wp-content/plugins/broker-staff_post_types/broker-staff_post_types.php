<?php
/*
    Plugin Name: Broker Staff - Post Types
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
function brokerstaff_post_type() {

	$labels = array(
		'name'                  => _x( 'Staff', 'Post Type General Name', 'broker-staff' ),
		'singular_name'         => _x( 'Staff', 'Post Type Singular Name', 'broker-staff' ),
		'menu_name'             => __( 'Staff', 'broker-staff' ),
		'name_admin_bar'        => __( 'Staff', 'broker-staff' ),
		'archives'              => __( 'Archivo', 'broker-staff' ),
		'attributes'            => __( 'Atributos', 'broker-staff' ),
		'parent_item_colon'     => __( 'Staff Padre', 'broker-staff' ),
		'all_items'             => __( 'Staff', 'broker-staff' ),
		'add_new_item'          => __( 'Agregar Staff', 'broker-staff' ),
		'add_new'               => __( 'Agregar Staff', 'broker-staff' ),
		'new_item'              => __( 'Nueva Staff', 'broker-staff' ),
		'edit_item'             => __( 'Editar Staff', 'broker-staff' ),
		'update_item'           => __( 'Actualizar Staff', 'broker-staff' ),
		'view_item'             => __( 'Ver Staff', 'broker-staff' ),
		'view_items'            => __( 'Ver Staff', 'broker-staff' ),
		'search_items'          => __( 'Buscar Staff', 'broker-staff' ),
		'not_found'             => __( 'No Encontrado', 'broker-staff' ),
		'not_found_in_trash'    => __( 'No Encontrado en Papelera', 'broker-staff' ),
		'featured_image'        => __( 'Imagen Destacada', 'broker-staff' ),
		'set_featured_image'    => __( 'Guardar Imagen destacada', 'broker-staff' ),
		'remove_featured_image' => __( 'Eliminar Imagen destacada', 'broker-staff' ),
		'use_featured_image'    => __( 'Utilizar como Imagen Destacada', 'broker-staff' ),
		'insert_into_item'      => __( 'Insertar en Staff', 'broker-staff' ),
		'uploaded_to_this_item' => __( 'Agregado en Staff', 'broker-staff' ),
		'items_list'            => __( 'Lista de Staff', 'broker-staff' ),
		'items_list_navigation' => __( 'Navegación de Staffes', 'broker-staff' ),
		'filter_items_list'     => __( 'Filtrar Staffes', 'broker-staff' ),
	);
	$args = array(
		'label'                 => __( 'Staff', 'broker-staff' ),
		'description'           => __( 'Staffes para el Sitio Web', 'broker-staff' ),
		'labels'                => $labels,
		'supports'              => array( 'title',  'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          =>  'edit.php?post_type=broker_seccion',
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-buddicons-buddypress-logo',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'broker_Staff', $args );

}
add_action( 'init', 'brokerstaff_post_type', 0 );
