<?php 
require_once( $_SERVER['DOCUMENT_ROOT'] .'/perubrokerfinal/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/perubrokerfinal/wp-includes/wp-db.php' );

$idioma = $_POST['idioma'];
$html = "";
$html.= "<option value = '9999'>Ninguno</option> ";
global $wpdb;
       $tbl_tipo_reporte = $wpdb->prefix.'tipo_reportes';     
     $resultadoM = $wpdb->get_results("select 
       id, descripcion
       from $tbl_tipo_reporte 
       where idioma = ".$idioma."
        order by id",ARRAY_A);
        foreach($resultadoM as $rowM): 
            $html.="<option value ='".$rowM['id']."'>".$rowM['descripcion']."</option>";
        endforeach; 
       
    echo $html;