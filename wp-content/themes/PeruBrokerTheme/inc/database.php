<?php
function  perubroker_database()
{
    global $wpdb;
    global $perubroker_dbversion;
    //Agregamos una version
    $perubroker_dbversion = '0.1';

    $tabla = $wpdb->prefix. "reportespb";
    $charset_collate = $wpdb->get_charset_collate();

    $sql  = 
        "CREATE TABLE $tabla (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            typerep int,
            years int,
            months int,
            biweeklys int,
            weeknumbers int,
            title varchar(150) NOT NULL,
            route_file varchar(400) ,
            files   varchar(200),
            PRIMARY KEY (id, typerep,years,months,biweeklys,weeknumbers)
            )
            $charset_collate;
        ";
        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        
        dbDelta($sql);

        add_option('perubroker_version',$perubroker_dbversion);

        $version_actual = get_option('perubroker_version');
 if($perubroker_dbversion != $version_actual){
    $tabla = $wpdb->prefix. "reportespb";
    $sql  = 
        "CREATE TABLE $tabla (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            typerep int,
            years int,
            months int,
            biweeklys int,
            weeknumbers int,
            title varchar(150) NOT NULL,
            route_file varchar(400) ,
            files   varchar(200),
            PRIMARY KEY (id, typerep,years,months,biweeklys,weeknumbers)
            )
            $charset_collate;
        ";
        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        
        dbDelta($sql);
 }

}
add_action('after_setup_theme','perubroker_database');

function perubroker_database_revisar(){
    global $perubroker_dbversion;
    if(get_site_option('perubroker_dbversion')!= $perubroker_dbversion){
        perubroker_database();
    }
}

add_action('plugins_loaded','perubroker_database_revisar');