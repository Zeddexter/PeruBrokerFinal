<?php 

    $actual_file_name = $_GET['route_file'];
    $saved_file_name = $_GET['files'];

    header("Content-Type: application/pdf,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel");
    // header("Content-Disposition: attachment; filename=$saved_file_name");
    header("Content-Disposition: inline; filename=$saved_file_name");
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    header("Content-Length: " . filesize($actual_file_name));
    @readfile($actual_file_name);
    //exit; 
?>
