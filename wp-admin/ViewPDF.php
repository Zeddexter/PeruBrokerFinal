<?php 

    $actual_file_name = $_GET['route_file'];
    $saved_file_name = $_GET['files']; 
    // echo "Actual::::::::";
    // echo $actual_file_name;
    // echo "Saved::::::::::.";
    // echo $saved_file_name;

    ?>
<!-- <script src='./js/pdfobject.js'></script> -->
<script>
PDFObject.embed($actual_file_name);
</script>

<?php
?>