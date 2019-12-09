<?php

require 'connect.php';
$postdata = file_get_contents("php://input");
if (isset($postdata) && !empty($postdata)){
  $request = json_decode($postdata);

  $id = mysqli_real_escape_string($conn , (int)$_GET['id']);
  $name = mysqli_real_escape_string($conn , trim($request -> name));
  $quantity = mysqli_real_escape_string($conn , trim($request -> quantity));
  $status = mysqli_real_escape_string($conn , trim($request -> status));
  $categoryId = mysqli_real_escape_string($conn , trim($request -> category_id));
  
  $sql = "UPDATE `todo` SET name='$name', status = '$status', quantity='$quantity', category_id = '$categoryId' WHERE tId=$id";
 
  if(mysqli_query($conn,$sql)){
    http_response_code(201);
  }
  else{
    console.log($postdata);
    http_response_code(422);
    
  }
}

?>