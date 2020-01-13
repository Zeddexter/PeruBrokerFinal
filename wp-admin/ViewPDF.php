<?php 

    $actual_file_name = $_GET['route_file'];
    $saved_file_name = $_GET['files']; 
    // echo "Actual::::::::";
    // echo $actual_file_name;
    // echo "Saved::::::::::.";
    // echo $saved_file_name;

    ?>
<script src='./js/pdfobject.js'></script>
<script>
PDFObject.embed($actual_file_name);
</script>
    <embed src="<?php echo $actual_file_name; ?>" type="application/pdf" width="100%" height="100%"/>
    <object data="<?php echo $actual_file_name; ?>" type="application/pdf">
    
   
</object>
<?php
?>