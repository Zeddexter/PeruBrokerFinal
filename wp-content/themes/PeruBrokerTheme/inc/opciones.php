
<?php


function perubroker_reportes(){
 add_menu_page('PeruBroker','Reportes','administrator','rp_estadisticas','rp_estadisticas','',20);
add_submenu_page('rp_estadisticas','Estadisticas','Estadisticas','administrator','rp_estadisticas','rp_estadisticas');
//add_submenu_page('rp_estadisticas','Fishing Report','Fishing Report','administrator','rp_fishing_report','rp_fishing_report');
//add_submenu_page('rp_estadisticas','Reportes','Reportes','administrator','rp_reportes','rp_reportes');
}

add_action('admin_menu','perubroker_reportes');

function rp_estadisticas (){
    ?>
 
    <div id="wpwrap"></div>
        <h1>Estadísticas</h1>
        <div>
            
            <label for="Anio">Año:</label>
           <input type="text" name="Anio" id="Anio" style="width:50px;">
            <br>
            <label for="mes">Mes:</label>
            <select name="" id="">
               <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select><br>
            <label for="tipo_reporte">Tipo de reporte:</label>
            <select name="tipo_reporte" id="">
               <option value="1">Estadisticas</option>
                <option value="2">Fishing Reports</option>
                <option value="3">Reportes</option>
</select>
            <div class="container">
                <ul>
                        <li><label><input type="checkbox" class="subOption" id="ChkQuincenal"> Quincenal</label><br>
                        <div id = "dvRadioButton" style="display: none">
                        <label for="PrimeraQuincena"><input type="radio" name="Quincena" id="PrimeraQuincena"> Primera Quincena</label>
                        <label for="SegundaQuincena"><input type="radio" name="Quincena" id="SegundaQuincena"> Segunda Quincena</label>
                        </div>
                    </li>
                        <li><label><input type="checkbox" class="subOption" id= "ChkNumSem"> Semanal</label></li>
                </ul>
            </div>
            <div id = "dvNumSem" style = "display: none">
            <label for="NumSemana">Número de semana:</label>
            <?php $numero_semana = date("W"); ?>
            <input type="text" name="Weeknumber" id="weeknumber" style="width:50px;" value = "<?php echo $numero_semana; ?>">    
            </div>
            <h3>Cargar archivo PDF ó Excel</h3>
            <?php 
            
            
      $upload_fil =  wp_upload_dir();
       
      $uploadFileDir = $upload_fil['baseurl'].'/Reportes/';
            echo $uploadFileDir;
            ?>
<form action="upload_filespb.php" method="post" enctype="multipart/form-data">
<input type="file" name="uploadedFile" size="50" class="custom-file-input"  accept="application/pdf, application/vnd.ms-excel" />

<input type="submit" value="Upload" name = "uploadBtn" class="button button primary" />
<br>
<br>
</form>
    </div>
        <table class= "wp-list-table widefat striped">
            <thead>
            <tr>
                <th class="manage-column">ID</th>
                <th class="manage-column">Año</th>
                <th class="manage-column">Mes</th>
                <th class="manage-column">Quincena</th>
                <th class="manage-column">Número Semana</th>
                <th class="manage-column">Titulo</th>
                <th class="manage-column">adjunto</th>
            </tr>
            </thead>
            <tbody> 
                <?php global $wpdb;
                      $tbl_estadisticas = $wpdb->prefix.'reportespb';
                      $registros = $wpdb->get_results("select * from $tbl_estadisticas where typerep = 0 ",ARRAY_A);
                      foreach($registros as $registro){ ?>
                        <tr>
                            <td><?php echo $registro['id']; ?></td>
                            <td><?php echo $registro['years']; ?></td>
                            <td><?php echo $registro['months']; ?></td>
                            <td><?php echo $registro['biweeklys']; ?></td>
                            <td><?php echo $registro['weeknumbers']; ?></td>
                            <td><?php echo $registro['title']; ?></td>
                            <td><?php echo $registro['files']; ?></td>
                        </tr>
                      <?php }
                ?>
            </tbody>
        </table>
    <?php
}
function rp_fishing_report(){
    ?>
    <div id="wpwrap"></div>
        <h1>Fishing Report</h1>
    <?php
}
function rp_reportes(){
    ?>
    <div id="wpwrap"></div>
        <h1>Reportes</h1>
    <?php
}