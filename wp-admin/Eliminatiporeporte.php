<?php
//echo $_SERVER['DOCUMENT_ROOT'];
echo $_SERVER['DOCUMENT_ROOT'];
// require_once( $_SERVER['DOCUMENT_ROOT'] .'/perubrokerFinal/wp-config.php' );
// require_once( $_SERVER['DOCUMENT_ROOT'] . '/perubrokerFinal/wp-includes/wp-db.php' );
echo "<br>";
echo $_GET["codigo"];

if(isset($_GET["codigo"]))
{

    echo "<br>paso";
    $id = $_GET['codigo'];
    echo $id;
    global $wpdb;
    // $wpdb->delete('wp_tipo_reportes',array('id'=>$id));
    global $wpdb;
    $table = $wpdb->prefix.'tipo_reportes';

    if (!empty($_GET['codigo'])) {

        global $wpdb;
        $wpdb->delete( $table, array('id' => $id) );
        
      }
}
wp_redirect(admin_url(esc_url(home_url( '/' ))."wp-admin/admin.php?page=rp_tipo_reportes"));   
//header("Location: ".esc_url(home_url( '/' ))."wp-admin/admin.php?page=rp_tipo_reportes");
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