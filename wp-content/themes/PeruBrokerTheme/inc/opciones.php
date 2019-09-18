
<?php
function perubroker_reportes(){
 add_menu_page('PeruBroker','Reportes','administrator','rp_estadisticas','rp_estadisticas','',20);
add_submenu_page('rp_estadisticas','Todos los reportes','Todos los reportes','administrator','rp_estadisticas','rp_estadisticas');
add_submenu_page('rp_estadisticas','Nuevo registro','Nuevo registro','administrator','rp_nuevos_registros','rp_nuevos_registros');
//add_submenu_page('rp_estadisticas','Reportes','Reportes','administrator','rp_reportes','rp_reportes');
}

add_action('admin_menu','perubroker_reportes');

function rp_estadisticas (){
    $selectedTipo = 0;
        ?>
 <?php function get_options($select){
     $opciones = array('Estadisticas'=>0,'Fishing Report'=>1,'Reportes'=>2);
     $options = '';
     while (list($k,$v)=each($opciones))
     {
         if($select ==$v)
         {
            $options.='<option value="'.$v.'" selected>'.$k.'</option>';
         }
         else
         {
            $options.='<option value="'.$v.'">'.$k.'</option>';
         }
          
     }
     return $options;
 }
 if(isset($_POST['tipo_reporte']))
 {
    $selectedTipo = $_POST['tipo_reporte'];
 }
 
?>
    <div id="wpwrap"></div>
        <h1>Reportes</h1>
        
        <form id="category-select" class="category-select" action="" method="post">
        <label for="tipo_reporte">Tipo de reporte:</label>
            <select name="tipo_reporte" data-native-menu="false" id="tipo_reporte" onchange="this.form.submit()">
               <?php echo get_options($selectedTipo); ?>
            </select>
            
                                <noscript>
                                <input type="submit" name="Selection" value="view" />
                                </noscript>
            </form>
            <form action = "" method = "POST">
        <input type="button" value="Nuevo" name="BtnNuevo" id="BtnNuevo" class= "button button primary">
        <input type="hidden" id="ipaddr" name="ipaddr" value="<?php echo $selectedTipo ?>">
        <div id="DvFormulario" style="Display:None" >
        <label for="Anio">Año:</label>
           <input type="text" name="Anio" id="Anio" style="width:50px;" value = <?php echo date("Y");?> />
            <br>
            <label for="mes">Mes:</label>
            <select name='mes' id='mes'>
    <?php
        $months = array(
            1=>'Enero','Febrero','Marzo','Abril',
            'Mayo','Junio','Julio','Agosto','Septiembre',
            'Octubre','Noviembre','Diciembre',
        );

        $key = date("n"); //$_GET['page'];     // Month number
        $default = $months[$key]; // Month name

        foreach ($months as $num => $name) {
            $selected = ($name == $default) ? "selected='selected'" : "";
            printf('<option value="%s" %s>%s</option>', $num, $selected, $name);
        }
    ?>
</select>
<div class="container">
                <ul>
                        <li><label><input type="checkbox" class="subOption" id="ChkQuincenal"> Quincenal</label><br>
                        <div id = "dvRadioButton" style="display: none">
                        <label for="PrimeraQuincena"><input type="radio" name="Quincena" value="1" id="PrimeraQuincena"> Primera Quincena</label>
                        <label for="SegundaQuincena"><input type="radio" name="Quincena" value="2" id="SegundaQuincena"> Segunda Quincena</label>
                        </div>
                    </li>
                        <li><label><input type="checkbox" class="subOption" id= "ChkNumSem"> Semanal</label></li>
                </ul>
            </div>
            <div id = "dvNumSem" style = "display: none">
            <label for="NumSemana">Número de semana:</label>
            <?php $numero_semana = date("W"); ?>
            <input type="text" name="NumeroSemana" id="NumeroSemana" style="width:50px;" value = "<?php echo $numero_semana; ?>">    
            </div>
            <div><label for="Titulo">Título:</label>
            <input type="text" name="Titulo" id="Titulo" required></div>
            <br>
            <div><input type="submit" name="submit" value="Agregar" class= "button button primary"></div>
            </form>  
        </div>    
        <br>
        <div id="lista" style="list-style-type: disc;">
            <ul id = "menu_arbol" class="nav nav-tabs">
                <li class="sub_lista">Año: 2019 </li>
                <ul>
                    <li>Mes: Septiembre
                    <ul>
                        <li>Primera Quincena</li>
                    </ul>
                    </li>
                </ul>
            </ul>
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

                <?php 
                        global $wpdb;
                        $tbl_estadisticas = $wpdb->prefix.'reportespb';     
                      $registros = $wpdb->get_results("select * from $tbl_estadisticas where typerep = $selectedTipo ",ARRAY_A);
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
//require_once('/wp-config.php');

    if(isset($_POST['submit'])){
        
        echo $selectedTipo;
    }

?>
    <?php
 }
 function rp_nuevos_registros(){
     echo "Hola Mundo";
 }