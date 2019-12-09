<?php
require 'connect.php';

$postdata = file_get_contents("php://input");
if (isset($postdata) && !empty($postdata)){
  $request = json_decode($postdata);

  $name = mysqli_real_escape_string($conn , trim($request -> name));
  $quantity = mysqli_real_escape_string($conn , trim($request -> quantity));
  $status = mysqli_real_escape_string($conn , trim($request -> status));
  $categoryId  = mysqli_real_escape_string($conn , trim($request -> category));
  
  $sql = "INSERT INTO `todo`(`name`, `status`, `quantity`, `category_id`) VALUES ('{$name}','{$status}','{$quantity}','{$categoryId}')";
 
  if(mysqli_query($conn,$sql)){
    http_response_code(201);
  }
  else{
    http_response_code(422);
  }
}

?>