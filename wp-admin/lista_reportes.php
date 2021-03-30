<?php 
require_once( $_SERVER['DOCUMENT_ROOT'] .'/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );

$idioma = $_POST['idioma'];
$tipo_reporte = $_POST['tiporeporte'];
$html = "";
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
                            from $tbl_estadisticas where typerep =".$tipo_reporte." 
                            and idioma = ".$idioma." order by years,
                            case when weeknumbers >0 then 9999 else typerep end
                            ,biweeklys,weeknumbers",ARRAY_A);

                            $html.= "<table class= 'wp-list-table widefat striped'>
                            <thead>
                            <tr>
                                <th class='manage-column'>Año</th>
                                <th class='manage-column'>Mes</th>
                                <th class='manage-column'>Quincena</th>
                                <th class='manage-column'>Número Semana</th>
                                <th class='manage-column'>Descripción</th>
                                <th class='manage-column'>adjunto</th>
                                <th class='manage-column'></th>
                                <th class='manage-columgit pn'></th>
                                <th class='manage-columgit pn'></th>
                            </tr>
                            </thead>
                            <tbody > ";

                            foreach($registros as $registro){ 
                                $html.= "<tr>
                                    <td>".$registro['years']."</td>
                                    <td>".$registro['months']."</td>
                                    <td>".$registro['biweeklys']."</td>
                                    <td>".$registro['weeknumbers']."</td>
                                    <td>".$registro['title']."</td>
                                    <td>   
                                    ";
                                    if(isset($registro['files'])){
                                        $html.=  "<a href='".WP_CONTENT_URL."/uploaded_files/".$registro["files"]."'". 
                                        " name='link'>Descargar</a>";
                                        // echo "console.log(".WP_CONTENT_URL."/uploaded_files/".$registro["files"];
                                    }else {
                                        $html.=  "
                            </form>
                                            <form action='". esc_url( admin_url('lista_reportes.php') ). "' method='post' enctype='multipart/form-data'>
                                    <input type='file' name='uploadedFile'  class='custom-file-input' accept='.xls,.xlsx,.pdf,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel'/>
                                    <input type='hidden' name='IdKey' value=".$registro['id']."  >
                                    <input type='hidden' name='Nombre' value=".$registro['years']."-".$registro["typerep"].$registro['months']."-".$registro['id']."  >
                                    <input type='hidden' name='tipo_reportes' value =".$registro['typerep_id'].">
                                    <input type='submit' value='Adjuntar' name='uploadBtn' class='button button primary'>
                                    </form>
                                    ";
                                } 
                                //                   <td><a href=". esc_url(home_url( '/' ))."wp-admin/admin.php?page=rp_nuevos_registros&id=".$registro['id']."><span class='fa fa-trash'></span>Editar</a></td>  
                                $html.="
                               </td>
            
                               <td><a href=". esc_url(home_url( '/' ))."wp-admin/eliminar_reporte.php?files=".$registro['files']."&codigo=".$registro['id']."><span class='fa fa-trash'></span>Eliminar</a></td>                           
                                </tr>";
                            }           
                            $html.= "</tbody>
                            </table>";           
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
                                        $newFileName = sanitize_text_field($_POST['Nombre']).'.'.$fileExtension;
            
                                    
                                        // check if file has one of the following extensions
                                        $allowedfileExtensions = array('pdf','jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','xlsx');
                                        if (in_array($fileExtension, $allowedfileExtensions))
                                        {
                                        // directory in which the uploaded file will be moved
                                        
                                                $uploadFileDir =  WP_CONTENT_DIR.'/uploaded_files/'; //'./uploaded_files/';
                                               
                                                $dest_path = $uploadFileDir . $newFileName;
                                                if(move_uploaded_file($fileTmpPath, $dest_path)) 
                                                {
                                                    $message ='File is successfully uploaded.';
                                                    //Evento guardar ID
                                                    global $wpdb;
                                                    $tbl_estadisticas = $wpdb->prefix.'reportespb'; 
                                                    $wpdb->update( $tbl_estadisticas, array( 'files' => $newFileName,'route_file'=>$dest_path),array('id'=>$_POST['IdKey']));
                                                    header("Location: ".esc_url(home_url( '/' ))."wp-admin/admin.php?page=rp_estadisticas&tipo_rep=".$_POST["tipo_reportes"]);
                                                }
                                                else 
                                                {
                                                    $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
                                                }
                                        }
                                        else
                                        {
                                        $message = 'Upload failed. Allowed file types: '.implode(',', $allowedfileExtensions);
                                        }
                                    }
                                    else
                                    {
                                        $message = 'There is some error in the file upload. Please check the following error.<br>';
                                        $message .= "Error:".$_FILES["uploadedFile"]["error"];
                                    }
                                    
                                }  

                                echo $message;
                              
    echo $html;
