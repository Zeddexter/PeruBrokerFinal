
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
 elseif(isset($_GET["tipo_rep"]))
     {
        $selectedTipo = $_GET["tipo_rep"];
     }
?><div id="wpwrap"></div>
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
        <br> <table class= "wp-list-table widefat striped">
            <thead>
            <tr>
                <th class="manage-column">Año</th>
                <th class="manage-column">Mes</th>
                <th class="manage-column">Quincena</th>
                <th class="manage-column">Número Semana</th>
                <th class="manage-column">Descripción</th>
                <th class="manage-column">adjunto</th>
                <th class="manage-column"></th>
            </tr>
            </thead>
            <tbody> 
                <?php 
                        global $wpdb;
                        $tbl_estadisticas = $wpdb->prefix.'reportespb';     
                      $registros = $wpdb->get_results("select 
                        id,
                        years,
                        case when typerep = 0 then 'Estadisticas' 
                             when typerep = 1 then 'Fishing report'
                             when typerep = 2 then 'reportes' end as typerep,
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
                        from $tbl_estadisticas where typerep = $selectedTipo ",ARRAY_A);
                      foreach($registros as $registro){ ?>
                        <tr>
                            <td><?php echo $registro['years']; ?></td>
                            <td><?php echo $registro['months']; ?></td>
                            <td><?php echo $registro['biweeklys']; ?></td>
                            <td><?php echo $registro['weeknumbers']; ?></td>
                            <td><?php echo $registro['title']; ?></td>
                            <td>  
                            <?php if(isset($registro['files'])){
                                //echo $registro['files'];
                                ?> 
                                <a href="<?php echo $registro['route_file']; ?>">Descargar</a> <?php
                            }else {
                                    ?>
                                    <form action="" method="post" enctype="multipart/form-data">
                            <input type="file" name="uploadedFile"  class="custom-file-input" accept="application/pdf,application/vnd.ms-excel"/>
                            <input type="hidden" name="IdKey" value="<?php echo $registro['id']; ?>"  >
                            <input type="hidden" name="Nombre" value="<?php echo $registro['years']."-".$registro["typerep"].$registro['months']."-".$registro['id']; ?>"  >
                            <input type="submit" value="Adjuntar" name="uploadBtn" class="button button primary">
                            </form>
                                    <?php
                            } ?>
                           </td>
                            </tr>
                      <?php }
                      
                      session_start();
                      $message = ''; 
                      $paso1 = '0';
                      $paso2 = '';
                      if(isset($_POST['uploadBtn'])&&$_POST['uploadBtn']=='Adjuntar')
                      {
                        if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
                        {
                        //   $paso1 = $registro['id'];
                        //   echo  "Data";
                          // get details of the uploaded file
                          $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
                          $fileName = $_FILES['uploadedFile']['name'];
                          $fileSize = $_FILES['uploadedFile']['size'];
                          $fileType = $_FILES['uploadedFile']['type'];
                          $fileNameCmps = explode(".", $fileName);
                          $fileExtension = strtolower(end($fileNameCmps));
                         
                          // sanitize file-name
                         // $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                         $newFileName = $_POST['Nombre'].'.'.$fileExtension;

                      
                          // check if file has one of the following extensions
                          $allowedfileExtensions = array('pdf','jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
                          if (in_array($fileExtension, $allowedfileExtensions))
                          {
                            // directory in which the uploaded file will be moved
                            
                            $uploadFileDir = './uploaded_files/';
                            $dest_path = $uploadFileDir . $newFileName;
                            if(move_uploaded_file($fileTmpPath, $dest_path)) 
                            {
                              $message ='File is successfully uploaded.';
                                 //Evento guardar ID
                                global $wpdb;
                                $tbl_estadisticas = $wpdb->prefix.'reportespb'; 
                                $wpdb->update( $tbl_estadisticas, array( 'files' => $newFileName,'route_file'=>$dest_path),array('id'=>$_POST['IdKey']));
                              header('Location: http://localhost/PerubrokerFinal/wp-admin/admin.php?page=rp_estadisticas ');
                            }
                            else 
                            {
                              $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                            }
                          }
                          else
                          {
                            $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
                          }
                        }
                        else
                        {
                          $message = 'There is some error in the file upload. Please check the following error.<br>';
                          $message .= 'Error:' . $_FILES['uploadedFile']['error'];
                        }
                      }
                      echo $message;
                     
                ?>
            </tbody>
        </table>
   
    <?php
 }
 function rp_nuevos_registros(){
    ?>
   
    <form action="" method= "POST">
     <div id="wpwrap"></div>
        <h1>Nuevo reporte</h1>
    <br>
    <div class="row">
    <label for="anio" style="font-weight: bold;">Año:</label>
        <b><input type="text" id= "anio" name = "anio" style="width:60px;" value= "<?php echo date("Y"); ?>"></b>
        <br>
        <br>
        <div>
        <label for="SelTipRep" style="font-weight: bold;">Tipo reporte: </label>
            <select name="SelTipRep" id="SelTipRep">
                <option value="0">Estadistica</option>
                <option value="1">Fishing report</option>
                <option value="2">Reportes</option>
            </select>
        </div>
        <br>
        <div>        
        
        <label for="Selmes" style="font-weight: bold;">Seleccione mes: </label>
            <select name="Selmes" id="Selmes">
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <ul>
          <li>
                <label for="titulo" style="font-weight: bold;">Titulo:</label>
                <input type="text" name="titulo" id="titulo"  style="width:250px;" >
          </li>
          </ul>
        <ul>
            
            <li>
            <input type="radio" name="Tipo" value="1" id="Tipo1" checked>    
            <label for="Tipo1" style="font-weight: bold;"  >Quincena:</label>
            </li>
            <ul style="margin-left:35px;">
                <li>
                    <input type="radio" name="Quincena" value="1" id="PrimeraQuincena">
                    <label for="PrimeraQuincena">Primera Quincena</label><br>
                    <input type="radio" name="Quincena" value="2" id="SegundaQuincena">
                    <label for="SegundaQuincena">Segunda Quincena</label>
                </li>
            </ul>
            <li>
                <input type="radio" name="Tipo" value="2" id="Tipo2">  
                <label for="Tipo2" style="font-weight: bold;" >Número de semana:</label><br><br>
            </li>
                <div id = "dNumSem" style="display:none"> 
                <ul style="margin-left:35px;">
                        <li>
                            <label for="num_semana" style="font-weight: bold;">Número de semana:</label>
                            <input type="text" id="num_semana" name = "num_semana" value = "<?php echo date("W");?>" style="width:60px;">
                        </li>
                </ul>    
                <ul style="margin-left:35px;">
                <li>
                          
                        <?php           
                        function semanasMes($year,$month)
                        {
                            # Obtenemos el ultimo dia del mes
                            $ultimoDiaMes=date("t",mktime(0,0,0,$month,1,$year));
                        
                            # Obtenemos la semana del primer dia del mes
                            $primeraSemana=date("W",mktime(0,0,0,$month,1,$year));
                        
                            # Obtenemos la semana del ultimo dia del mes
                            $ultimaSemana=date("W",mktime(0,0,0,$month,$ultimoDiaMes,$year));

                            if($month == 12 )
                            {
                                $ultimaSemana = 52;
                            }
                            $semanainicio = $primeraSemana;
                            $semanafin = $ultimaSemana;

                            $nSena = [];
                            while ($semanainicio <=  $semanafin) {
                                $nSena[] = intval($semanainicio);
                                $semanainicio++;
                            }
                            
                            # Devolvemos en un array los dos valores
                            return array($primeraSemana,$ultimaSemana,$nSena);
                        }
                        $meses_ES = array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                        $year=date("Y");
                        echo "<table colspan = '1' rowspan = '0' border= '1' style = 'border-collapse: collapse;'>";
                        echo "<th>Mes</th><th> Número de semana </th>";
                        
                        for($i=1;$i<=12;$i++)
                        {
                            
                            list($primeraSemana,$ultimaSemana,$nSena)=semanasMes($year,$i);
                        // echo "<br>Mes: ".$i." - ".$year." - Primera semana: ".$primeraSemana." - Ultima semana: ".$ultimaSemana;
                            echo  "<tr><td><b>".$meses_ES[$i]."</b></td><td>".json_encode($nSena)."</td></tr>";
                        } ?>  
                        </table>
                    </li>
                </ul>
                </li>
            </ul>  
            </div>
          <hr>
                <input type="submit" name ="registrar" value="Registrar" class="button button-primary button-large">
          <hr>
        </form>
        <!-- <ul><li>
            <h3>Cargar archivo PDF ó Excel</h3>
          <form action="upload_filespb.php" method="post" enctype="multipart/orm-data"><input type="file" name="uploadedFile" size="50" class="custom-file-input" accept="application/pdf,application/vnd.ms-excel"/><input type="submit"value="Upload" name="uploadBtn"class="button button primary"/></form></li></ul> -->
    </div>
    <?php 
    if(isset($_POST["registrar"]))
    {
        $quincena = "0";
        $num_semana = "0";
        if($_POST["Tipo"]=="1")
        {
            $quincena =  $_POST["Quincena"];
        }
        elseif($_POST["Tipo"]=="2")
        {
            $num_semana =  $_POST["num_semana"];
        }
        
        // Insertar registros
        global $wpdb;
        $table = $wpdb->prefix.'reportespb';
        $data = array('typerep' => $_POST["SelTipRep"], 
                      'years' =>  $_POST["anio"],
                      'months' => $_POST["Selmes"],
                      'biweeklys'=> $quincena,
                      'weeknumbers' => $num_semana,
                      'title' => $_POST["titulo"]
                    );
        $wpdb->insert($table,$data);
        $my_id = $wpdb->insert_id;
        echo $my_id;
        Header("Location: http://localhost/PerubrokerFinal/wp-admin/admin.php?page=rp_estadisticas&tipo_rep=".$_POST["SelTipRep"]);
        // $result = $wpdb->update($table, array('officerOrder' => $memberOrder,
        //         'officerTitle' => $memberTitle, 'officerName' => $memberName, 'officerPhone' => 
        //         $memberPhone), array('officerId' => $memberId), array('%d','%s', '%s', '%s'),
        //         array('%d'));            
        
    }
    
    ?>
    <?php
 }