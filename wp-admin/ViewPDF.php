<?php 

    $actual_file_name = $_GET['route_file'];
    $saved_file_name = $_GET['files']; 
    $uploadFileDir =  WP_CONTENT_DIR.'/uploaded_files/'.$saved_file_name;
    ?>
    <object data="<?php echo $uploadFileDir; ?>" type="application/pdf">
    <embed src="<?php echo $uploadFileDir; ?>" type="application/pdf" />
</object>
<?php
?>