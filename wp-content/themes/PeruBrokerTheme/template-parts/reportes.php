<!-- SECCION DE REPORTES -->
<?php

//  function Ver_PDF($archivo_reporte,$ruta_reporte){
//     if(isset($archivo_reporte) && isset($ruta_reporte)){
//         if(isset($_GET['Ver'])){
//         $file1 = 'Example.pdf';
//         header('Content-type: application/pdf');
//         header('Content-Disposition: inline; filename="'.$ruta_reporte.'"');
//         header('Content-Transfer-Encoding: binary');
//         header('Accept-Ranges: bytes');
//         @readfile($ruta_reporte); 
//     }   
//     }    
//  }

// require_once( 'download_files.php' );
$anio_seleccionado = date('Y');
if(isset($_POST['anio'])){
    $anio_seleccionado = $_POST['anio'];
}?>
<section class=" reportes tables-page-section" ="service" id="reportes" >
    <div class="content content-reportes">
                    <div class="section_title text-center">
                    <?php
                                            $nav_menu_locations = get_nav_menu_locations();
                                            $menu_id = absint($nav_menu_locations["menu-principal"]);
                                            $menu_items = wp_get_nav_menu_items($menu_id);
                                            if (!empty($menu_items)) {
                                                echo "<h2>".$menu_items[3]->title."</h2>";
                                            }
                                        ?>
                                        <div class="mensaje-reportes">
                                            <?php mostrar_mensaje_reportes(); ?>
                                        </div>
                    </div>
        <div class="row" >
    <!-- data-aos="flip-right" data-aos-duration="1000" -->

            <div class="col-md-8 col-lg-7 "  >
            <div> <?php echo  "<label for='anio'><b>Año</b></label>";  ?>
            <form name="myform" action="#reportes" method="post">
            <select name="anio" onchange="this.form.submit()">
            <?php  global $wpdb;
                            $tbl_rep = $wpdb->prefix.'reportespb';
                            $rows = $wpdb->get_results("select years FROM $tbl_rep where typerep is not null  group by years",ARRAY_A); 
                            foreach($rows as $row){ ?>
                                <option value= "<?php echo $row['years'];?>"<?php if($anio_seleccionado == $row['years']){ echo " selected"; }?>><?php echo $row['years'];?></option>
                           <?php }
                            ?>
	    </select></form>
        </div>
                  <div >  
                        
                        <h4>Estadísticas de Harina de Pescado</h4>
                        <div class="table-responsive estadistica">
                        <?php 
                           // $_tipo_reporte = "0";
                            global $wpdb;
                            $tbl_rep = $wpdb->prefix.'reportespb';
                            $rows = $wpdb->get_results("select typerep,sum(biweeklys) as Col_Quincena,sum(weeknumbers) as Col_Sem FROM $tbl_rep where typerep is not null  group by typerep",ARRAY_A); 
                            foreach($rows as $row){
                                if ($row["typerep"]=="0")
                                { ?>
                                 <div class="table-responsive estadistica">
                                 <table class="table">
                                                                <thead>
                                                                <tr>
                                                        <th class="manage-column">Año</th>
                                                        <th class="manage-column">Mes</th>
                                                   <?php if($row["Col_Quincena"]!="0"){?> <th class="manage-column">Quincena</th><?php } ?>
                                                   <?php if($row["Col_Sem"]!="0"){?> <th class="manage-column">Número Semana</th><?php } ?>
                                                        <th class="manage-column">Descripción</th>
                                                        <th class="manage-column">Adjunto</th>
                                                    </tr>  </thead>
                                                                <?php 

                                        global $wpdb;
                                        $tbl_estadisticas = $wpdb->prefix.'reportespb';     
                                        $registros = $wpdb->get_results("select 
                                        id,
                                        years,
                                        case when typerep = 0 then 'Estadísticas de Harina de Pescado' 
                                            when typerep = 1 then 'Reporte de pesca Anchoveta – Perú'
                                            when typerep = 2 then 'Reporte desenvolvimiento Anual de Captura – Anchoveta' end as typerep,
                                            typerep as typerep_id,
                                        case when months = 1 then 'Enero'
                                            when months = 2 then 'Febrero'
                                            when months = 3 then 'Marzo'
                                            when months = 4 then 'Abril'
                                            when months = 5 then 'Mayo'
                                            when months = 6 then 'Junio'
                                            when months = 7 then 'Julio'
                                            when months = 8 then 'Agosto'
                                            when months = 9 then 'Septiembre'
                                            when months = 10 then 'Octubre'
                                            when months = 11 then 'Noviembre'
                                            when months = 12 then 'Diciembre' end as months ,
                                        case when biweeklys  = 1 then 'Primera Quincena'
                                            when biweeklys = 2 then 'Segunda Quincena'
                                            else '' end biweeklys,
                                        case when weeknumbers = 0 then ''
                                            else weeknumbers end  as weeknumbers,
                                        title,
                                        files, route_file 
                                        from $tbl_estadisticas where typerep = ".$row["typerep"]." and years = '".$anio_seleccionado."' 
                                         order by years,months,
                                        case when weeknumbers >0 then 9999 else typerep end,biweeklys,weeknumbers",ARRAY_A);
                                        ?> 

                                        <?php
                                        foreach($registros as $registro){ ?>
                                        <tr>
                                            
                                            <td><?php echo $registro['years']; ?></td>
                                            <td><?php echo $registro['months']; ?></td>
                                            <?php if($row["Col_Quincena"]!="0"){ echo "<td>".$registro['biweeklys']."</td>";} ?>
                                            <?php if($row["Col_Sem"]!="0"){ echo "<td>".$registro['weeknumbers']."</td>";} ?>
                                            <td><?php echo $registro['title']; ?></td>

                                            <td>  
                                            <?php if(isset($registro['files'])){
                                                //echo $registro['files'];
                                                $url_down = site_url()."/wp-admin/download_files.php?files=".$registro['files']."&route_file=".$registro["route_file"]."";
                                                $url_down2 = 
                                                $id_cookie = '';
                                                $descarga = "  onclick = \"window.open('". $url_down."');\"";
                                                if(isset($_COOKIE['pum-283'])) {
                                                    $id = "id='ABC'  onclick = \"window.open('". $url_down."');\"";
                                                } 
                                                else {
                                                    $id = "id='popup-informacion'";
                                                   
                                                }
                                                ?>
                                               
                                                <button id="Ver" <?php echo $descarga; ?>>Ver PDF</button>
                                                   <button <?php echo  $id; ?>
                                                     style="cursor: pointer;" 
                                                     > Descargar</button>
                                                  <?php } ?>
                                        </td>
                                            </tr>
                                            
                                        <?php } ?></table></div> <?php

                                }
                                if($row["typerep"]=="1")     
                                { ?>
                                <h4>Reporte de pesca Anchoveta – Perú</h4>
                                <div class="table-responsive fishing-report">
                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                        <th class="manage-column">Año</th>
                                                        <th class="manage-column">Mes</th>
                                                   <?php if($row["Col_Quincena"]!="0"){?> <th class="manage-column">Quincena</th><?php } ?>
                                                   <?php if($row["Col_Sem"]!="0"){?> <th class="manage-column">Número Semana</th><?php } ?>
                                                        <th class="manage-column">Descripción</th>
                                                        <th class="manage-column">Adjunto</th>
                                                    </tr>  </thead>
                                                                <?php 

                                        global $wpdb;
                                        $tbl_estadisticas = $wpdb->prefix.'reportespb';     
                                        $registros = $wpdb->get_results("select 
                                        id,
                                        years,
                                        case when typerep = 0 then 'Estadísticas de Harina de Pescado' 
                                            when typerep = 1 then 'Reporte de pesca Anchoveta – Perú'
                                            when typerep = 2 then 'Reporte desenvolvimiento Anual de Captura – Anchoveta' end as typerep,
                                            typerep as typerep_id,
                                        case when months = 1 then 'Enero'
                                            when months = 2 then 'Febrero'
                                            when months = 3 then 'Marzo'
                                            when months = 4 then 'Abril'
                                            when months = 5 then 'Mayo'
                                            when months = 6 then 'Junio'
                                            when months = 7 then 'Julio'
                                            when months = 8 then 'Agosto'
                                            when months = 9 then 'Septiembre'
                                            when months = 10 then 'Octubre'
                                            when months = 11 then 'Noviembre'
                                            when months = 12 then 'Diciembre' end as months ,
                                        case when biweeklys  = 1 then 'Primera Quincena'
                                            when biweeklys = 2 then 'Segunda Quincena'
                                            else '' end biweeklys,
                                        case when weeknumbers = 0 then ''
                                            else weeknumbers end  as weeknumbers,
                                        title,
                                        files, route_file 
                                        from $tbl_estadisticas where typerep = ".$row["typerep"]."  and years = '".$anio_seleccionado."' 
                                        order by years,months,
                                        case when weeknumbers >0 then 9999 else typerep end,biweeklys,weeknumbers",ARRAY_A);
                                        ?> 

                                        <?php
                                        foreach($registros as $registro){ ?>
                                        <tr>
                                            
                                            <td><?php echo $registro['years']; ?></td>
                                            <td><?php echo $registro['months']; ?></td>
                                            <?php if($row["Col_Quincena"]!="0"){ echo "<td>".$registro['biweeklys']."</td>";} ?>
                                            <?php if($row["Col_Sem"]!="0"){ echo "<td>".$registro['weeknumbers']."</td>";} ?>
                                            <td><?php echo $registro['title']; ?></td>

                                            <td>  
                                            <?php if(isset($registro['files'])){
                                                //echo $registro['files'];
                                                $url_down = site_url()."/wp-admin/download_files.php?files=".$registro['files']."&route_file=".$registro["route_file"]."";
                                                
                                                $id_cookie = '';
                                                if(isset($_COOKIE['pum-283'])) {
                                                    $id = "id='ABC'  onclick = \"window.open('". $url_down."');\"";
                                                } 
                                                else {
                                                    $id = "id='popup-informacion'";
                                                }
                                                    ?>
                                                   <button <?php echo  $id; ?>
                                                     style="cursor: pointer;" > Descargar</button>
                                               <?php
                                            }
                                                    ?>
                                        </td>
                                            </tr>
                                            
                                        <?php } ?></table></div>
                                <?php }
                                if($row["typerep"]=="2")
                                { ?>
                                <h4>Reporte desenvolvimiento Anual de Captura – Anchoveta</h4>
                                <div class="table-responsive fishing-report">
                                    <table class="table">
                                    <thead>
                                    <tr>
                            <th class="manage-column">Año</th>
                            <th class="manage-column">Mes</th>
                       <?php if($row["Col_Quincena"]!="0"){?> <th class="manage-column">Quincena</th><?php } ?>
                       <?php if($row["Col_Sem"]!="0"){?> <th class="manage-column">Número Semana</th><?php } ?>
                            <th class="manage-column">Descripción</th>
                            <th class="manage-column">Adjunto</th>
                        </tr>  </thead>
                                    <?php 

                        global $wpdb;
                        $tbl_estadisticas = $wpdb->prefix.'reportespb';     
                        $registros = $wpdb->get_results("select 
                        id,
                        years,
                        case when typerep = 0 then 'Estadísticas de Harina de Pescado' 
                            when typerep = 1 then 'Reporte de pesca Anchoveta – Perú'
                            when typerep = 2 then 'Reporte desenvolvimiento Anual de Captura – Anchoveta' end as typerep,
                            typerep as typerep_id,
                        case when months = 1 then 'Enero'
                            when months = 2 then 'Febrero'
                            when months = 3 then 'Marzo'
                            when months = 4 then 'Abril'
                            when months = 5 then 'Mayo'
                            when months = 6 then 'Junio'
                            when months = 7 then 'Julio'
                            when months = 8 then 'Agosto'
                            when months = 9 then 'Septiembre'
                            when months = 10 then 'Octubre'
                            when months = 11 then 'Noviembre'
                            when months = 12 then 'Diciembre' end as months ,
                        case when biweeklys  = 1 then 'Primera Quincena'
                            when biweeklys = 2 then 'Segunda Quincena'
                            else '' end biweeklys,
                        case when weeknumbers = 0 then ''
                            else weeknumbers end  as weeknumbers,
                        title,
                        files, route_file 
                        from $tbl_estadisticas where typerep = ".$row["typerep"]." 
                        and years = '".$anio_seleccionado."'   order by years,months,
                        case when weeknumbers >0 then 9999 else typerep end,biweeklys,weeknumbers",ARRAY_A);
                        ?> 

                                <?php
                                foreach($registros as $registro){ ?>
                                <tr>
                        
                            <td><?php echo $registro['years']; ?></td>
                            <td><?php echo $registro['months']; ?></td>
                            <?php if($row["Col_Quincena"]!="0"){ echo "<td>".$registro['biweeklys']."</td>";} ?>
                            <?php if($row["Col_Sem"]!="0"){ echo "<td>".$registro['weeknumbers']."</td>";} ?>
                            <td><?php echo $registro['title']; ?></td>

                            <td>  
                            <?php if(isset($registro['files'])){
                                //echo $registro['files'];
                                $url_down = site_url()."/wp-admin/download_files.php?files=".$registro['files']."&route_file=".$registro["route_file"]."";
                               
                                  $id_cookie = '';
                                                if(isset($_COOKIE['pum-283'])) {
                                                    $id = "id='ABC'  onclick = \"window.open('". $url_down."');\""; 
                                                } 
                                                else {
                                                    $id = "id='popup-informacion'";
                                                }
                                                    ?>
                                                   <button <?php echo  $id; ?>
                                                    
                                                     style="cursor: pointer;" > Descargar</button> <?php
                            }
                                    ?>
                        </td>
                            </tr>
                            
                      <?php } ?></table> </div><?php
                                }
                            }
                        ?>
            </div> 
        </div>  
    </div>                       
 
                     <div class="col">
                        <figure>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/507-768x768.jpg">
                        </figure>
                    </div>
                    </div>
            </section>