<?php
 
/*
 * Following code will list all the products
 */
header('Access-Control-Allow-Origin: *');

// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
 
// get all products from products table
$result = mysql_query("SELECT *FROM tbltracks ORDER BY id desc" ) or die(mysql_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    
    $response = array();
 
    while ($row = mysql_fetch_array($result)) {
        $response[] = $row;
    }
    // success
    header("Content-type: text/json");
    echo json_encode($response);
} else {
    
    $response = "No podcast found";

    echo json_encode($response);
}
?>
