<?php
//echo $_SERVER['DOCUMENT_ROOT'];
echo $_SERVER['DOCUMENT_ROOT'];
// require get_template_directory().'/perubrokerFinal/wp-config.php';
// require get_template_directory().'/perubrokerFinal/wp-includes/wp-db.php';
require_once( $_SERVER['DOCUMENT_ROOT'] .'/wp-config.php' );
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php' );
echo "<br>";
echo $_GET["codigo"];

if(isset($_GET["codigo"]))
{

    echo "<br>paso";
    $id = $_GET['codigo'];
    echo $id;
    global $wpdb;
    // $wpdb->delete('wp_tipo_reportes',array('id'=>$id));

    $table_name = 'wp_tipo_reportes';
    if (!empty($id)) 
    {
        $wpdb->delete('wp_tipo_reportes', array('id' => $id) );
     // $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id IN($id)"));
    
    }

    //    // $wpdb->show_errors(); 
    //     $wpdb->delete( 'wp_tipo_reportes', array('id' => $id) );
       // $wpdb->print_error();
        echo "<br>final";

}
//wp_redirect(admin_url(esc_url(home_url( '/' ))."wp-admin/admin.php?page=rp_tipo_reportes"));   
header("Location: ".esc_url(home_url( '/' ))."wp-admin/admin.php?page=rp_tipo_reportes");
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
// $dbname = "your_dbname";
// $conn = mysqli_connect("localhost", "usernname", "password", $dbname);
// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// // sql to delete a record
// $sql = "DELETE FROM Bookings WHERE Staff_ID = $id"; 

// if (mysqli_query($conn, $sql)) {
//     mysqli_close($conn);
//     header('Location: book.php'); //If book.php is your main page where you list your all records
//     exit;
// } else {
//     echo "Error deleting record";
// }

?>