<?php
require 'connect.php';

$postdata = file_get_contents("php://input");
if (isset($postdata) && !empty($postdata)){
  $request = json_decode($postdata);
  $category  = mysqli_real_escape_string($conn , trim($request -> category));
  
  $sql = "INSERT INTO `category`(`category`) VALUES ('{$category}')";
 
  if(mysqli_query($conn,$sql)){
    http_response_code(201);
  }
  else{
    http_response_code(422);
  }
}

?>