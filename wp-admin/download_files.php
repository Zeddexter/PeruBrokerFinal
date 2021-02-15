<?php 

    $file_name = $_GET['files'];
    $route_file = $_GET['route_file'];

    // header("Content-Type: application/pdf,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel");
    // // header("Content-Disposition: attachment; filename=$saved_file_name");
    // // header("Content-Disposition: inline; filename=$saved_file_name");
    // header('Content-Transfer-Encoding: binary');
    // header('Accept-Ranges: bytes');
    // header("Content-Type: application/force-download");
    // header("Content-Disposition: attachment; filename=\"$route_file\"");
    // header("Content-Length: " . filesize($file_name));
    // @readfile($route_file);
    //exit; 
   
            // header('Content-Description: File Transfer');
            // header('Content-Type: application/octet-stream');
            // header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
            // header('Expires: 0');
            // header('Cache-Control: must-revalidate');
            // header('Pragma: public');
            // header('Content-Length: ' . filesize($route_file));
            // flush(); // Flush system output buffer
            // readfile($route_file);
            // die();
            header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; filename=".$file_name);
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: ".filesize($route_file));
            
            readfile($route_file);
?>
