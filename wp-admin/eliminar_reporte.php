<?php 
require_once( $_SERVER['DOCUMENT_ROOT'] .'/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
$path = WP_CONTENT_DIR.'/uploaded_files/';
$file = $path.$_GET["files"];

if (!empty($file)) 
{
    unlink($file);
}
$id = $_GET["codigo"];
$table = 'wp_reportespb';
$wpdb->delete( $table, array( 'id' => $id ) );

echo "<h4>Se eliminó el registro corretamente</h4>";
// header("Location: ".esc_url(home_url( '/' ))."wp-admin/admin.php?page=rp_estadisticas";
?>
