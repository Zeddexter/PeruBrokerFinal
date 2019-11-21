<?php 

    $actual_file_name = $_GET['route_file'];
    $saved_file_name = $_GET['files']; ?>
    <object data="<?php echo $actual_file_name; ?>" type="application/pdf">
    <embed src="<?php echo $actual_file_name; ?>" type="application/pdf" />
</object>
<?php
?>