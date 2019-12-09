<?php
header("Access-Control-Allow-Origin: *");
require 'connect.php';
error_reporting(E_ERROR);
$todolist = [];
$sql = "SELECT (@row_num:=@row_num+1) AS num, todo.*, category.*
FROM todo
INNER JOIN category ON todo.category_id = category.cat_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   $cr = 0;
    while($row =  mysqli_fetch_assoc($result)) {
      
       $todolist[$cr]['tId'] = $row['tId'];
       $todolist[$cr]['name'] = $row['name'];
       $todolist[$cr]['status'] = $row['status'];
       $todolist[$cr]['quantity'] = $row['quantity'];
       $todolist[$cr]['category'] = $row['category'];
       $todolist[$cr]['category_id'] = $row['category_id'];
       $cr++;
    }
    // print_r($todolist);
    echo json_encode($todolist);
} else {
    echo "0 results";
}

?>