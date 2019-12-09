<?php
header("Access-Control-Allow-Origin: *");
require 'connect.php';
error_reporting(E_ERROR);
$todolist = [];
$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   $cr = 0;
    while($row =  mysqli_fetch_assoc($result)) {
      
       $todolist[$cr]['cat_id'] = $row['cat_id'];
       $todolist[$cr]['category'] = $row['category'];
       $cr++;
    }
    // print_r($todolist);
    echo json_encode($todolist);
} else {
    echo "0 results";
}

?>