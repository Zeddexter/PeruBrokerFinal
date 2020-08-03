<!-- SECCION DE REPORTES -->
<?php
// require_once( 'download_files.php' );
// $anio_seleccionado = date('Y');
// if(isset($_POST['anio'])){
//     $anio_seleccionado = $_POST['anio'];
// }
?>
<section class=" reportes tables-page-section" ="service" id="reportes" >
    <div class="content content-reportes">
                    <div class="section_title text-center">
                    <?php
                                            $nav_menu_locations = get_nav_menu_locations();
                                            $menu_id = absint($nav_menu_locations["menu-principal"]);
                                            $menu_items = wp_get_nav_menu_items($menu_id);
                                            if (!empty($menu_items)) {
                                                echo "<h2>".$menu_items[4]->title."</h2>";
                                            }
                                        ?>
                                        <div class="mensaje-reportes">
                                            <?php mostrar_mensaje_reportes(); ?>
                                        </div>
                    </div>
        <div class="row" >
    <!-- data-aos="flip-right" data-aos-duration="1000" -->

            <div class="col-md-8 col-lg-7 "  >
            <?php if (wpm_get_language() == 'en')
                { ?>
            <div> <?php echo  "<label for='anio'><b>Year</b></label>";  ?>
                <?php } else { ?>
                    <div> <?php echo  "<label for='anio'><b>Año</b></label>";  ?>
              <?php  } ?>
            <form name="myform" action="#reportes" method="post">
            <select name="anio" onchange="this.form.submit()">
            <?php  global $wpdb;
            $contador_year = 0;
                            $tbl_rep = $wpdb->prefix.'reportespb';
                            $rows = $wpdb->get_results("select years FROM $tbl_rep where typerep is not null  group by years order by years",ARRAY_A); 
                            
                            foreach($rows as $row){ 
                                if($contador_year == 0 )
                                { ?>
<option value= "<?php echo $row['years'];?>"<?php  echo " selected";?>><?php echo $row['years'];?></option>
                                <?php
                                 $anio_seleccionado = $row['years'];
                                  }
                                else
                                { ?>
<option value= "<?php echo $row['years'];?>"><?php echo $row['years'];?></option>
                                <?php } 
                                $contador_year++;
                                ?>
                                
                                
                           <?php }
                            ?>
	    </select></form>
        </div>
                  <div >  
                        <?php
                        global $wpdb;
                        $tbl_tipo_reporte = $wpdb->prefix.'tipo_reportes';     
                      $opciones = $wpdb->get_results("
                      SELECT t1.id,t1.descripcion FROM wp_tipo_reportes t1 inner join wp_reportespb t2 on t1.id=t2.typerep group by t1.id,t1.descripcion order by t1.id
                      ",ARRAY_A);
                        $options = '';
                        //echo $select ;
                        foreach($opciones as $registro){ 
                            echo "<div class='table-responsive estadistica'>";
                            echo "<h4>".$registro["descripcion"],"</h4>";
                            global $wpdb;
                            $tbl_rep = $wpdb->prefix.'reportespb';
                            $rows = $wpdb->get_results("select typerep,sum(biweeklys) as Col_Quincena,sum(weeknumbers) as Col_Sem 
                            FROM $tbl_rep where typerep ='".$registro["id"]."'  group by typerep",ARRAY_A); 
                            foreach($rows as $row){ ?>
                                <table class="table">
                                                <thead>
                                                <tr> <?php
                                                if (wpm_get_language() == 'en')
                { ?>
                         <th class="manage-column">Year</th>
                                        <th class="manage-column">Month</th>
                                <?php if($row["Col_Quincena"]!="0"){?> <th class="manage-column">Fortnight</th><?php } ?>
                                <?php if($row["Col_Sem"]!="0"){?> <th class="manage-column">Number Week</th><?php } ?>
                                        <th class="manage-column">Description</th>
                                        <th class="manage-column">Attached</th>
                    </tr>  </thead>
                <?php } else { ?>
                                        <th class="manage-column">Año</th>
                                        <th class="manage-column">Mes</th>
                                <?php if($row["Col_Quincena"]!="0"){?> <th class="manage-column">Quincena</th><?php } ?>
                                <?php if($row["Col_Sem"]!="0"){?> <th class="manage-column">Número Semana</th><?php } ?>
                                        <th class="manage-column">Descripción</th>
                                        <th class="manage-column">Adjunto</th>
                    </tr>  </thead> 
                    <?php }
                 
                    global $wpdb;
                                        $tbl_estadisticas = $wpdb->prefix.'reportespb';     
                                        $Tablas = $wpdb->get_results("select 
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
                                        from $tbl_estadisticas where typerep = ".$registro["id"]." and years = '".$anio_seleccionado."' 
                                          order by years,months,
                                        case when weeknumbers >0 then 9999 else typerep end,biweeklys,weeknumbers",ARRAY_A);
                                        ?> 

                                        <?php
                                        foreach($Tablas as $registro){ ?>
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
                                                $url_down2 = site_url()."/wp-admin/ViewPDF.php?files=".$registro['files']."&route_file=".$registro["route_file"]."";
                                                $id_cookie
                                                 = '';
                                                $descarga = "  onclick = \"window.open('". $url_down2."');\"";
                                                if(isset($_COOKIE['pum-283'])) {
                                                    $id = "id='ABC'  onclick = \"window.open('". $url_down."');\"";
                                                } 
                                                else {
                                                    $id = "id='popup-informacion'";
                                                   
                                                }
                                                ?>
                                               <a href="<?php echo site_url()."/reportes/".$registro["files"]; ?>">Visualizar</a>
                                                <!-- <button id="Ver" <?php // echo $descarga; ?>>Ver PDF</button> -->
                                                   <button <?php echo  $id; ?>
                                                     style="cursor: pointer;" 
                                                     > Descargar</button>
                                                  <?php } ?>
                                        </td>
                                            </tr>
                                            
                                        <?php } ?></table></div>
                    <?php
                            } 
                            // echo "</div>";
                    
                        
                            }
                        ?>
                        <!-- </div></div> -->
            <!-- </div>  -->
        </div>  
    </div>                       
 
                     <div class="col">
                        <figure>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/507-768x768.jpg">
                        </figure>
                    </div>
                    </div>
            </section>