<?php 
/**
 * @package db Peru Broker
 * @version 0.1
 */
/*
    Plugin Name: db Peru Broker
    Plugin URI: 
    Description: Creación de tabla para reportes
    Author: Joel Torres
    Version: 0.1
    Author URI: 
 */

require_once(ABSPATH.'wp-admin/includes/upgrade.php');

function db_plugin_reportes()
 {
    global $wpdb;
    $nombreTabla = $wpdb->prefix. "reportespb";
    $created  = dbDelta(
        "CREATE TABLE $nombreTabla (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            typerep int,
            years int,
            months int,
            biweeklys int,
            weeknumbers int,
            title nvarchar(150),
            route_file nvarchar(400),
            files   nvarchar(200),
            PRIMARY KEY (id, typerep,years,months,biweeklys,weeknumbers)
            )
            character set utf8 collate utf8_general_ci;
        "
    );
 }

 register_activation_hook(__FILE__.'db_plugin_reportes');
?>