<?php 
// require get_template_directory().'/wp-config.php';
// require get_template_directory().'//wp-includes/wp-db.php';
echo $_SERVER['DOCUMENT_ROOT'];
require_once( $_SERVER['DOCUMENT_ROOT'] .'/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
echo $_GET["codigo"];

?>
 <div id="wpwrap">
    <h1>Modificar</h1></div>
    <form action="" method= "POST">
    <?php
    if(isset($_GET["codigo"]))
    {
        $codigo_tip = $_GET["codigo"];
        
        global $wpdb;
        $tbl_tipo_reportes = $wpdb->prefix.'tipo_reportes';     
        $registros = $wpdb->get_results("select 
        id,
        descripcion
        from $tbl_tipo_reportes where id = $codigo_tip ",ARRAY_A);
       $_url_adm =  esc_url(home_url( '/' ))."wp-admin/";

      foreach($registros as $registro){ 
        ?>
           <input type="text" id="TxtDesc" name="TxtDesc" size="100" value= "<?php echo $registro['descripcion']; ?>" >
           <input type="submit" id="Modificar" value="Modificar">                
        <?php
    
           

      } ?>
            </form>
            
      <?php
      if (!empty($_POST))
      {
        global $wpdb;
        $table = $wpdb->prefix.'tipo_reportes';
        $wpdb->update($table,array('descripcion' => sanitize_text_field($_POST["TxtDesc"])),array('id'=> sanitize_text_field( $codigo_tip )));
        header("Location: ".esc_url(home_url( '/' ))."wp-admin/admin.php?page=rp_tipo_reportes");
      }
    
    }