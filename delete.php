<?php

require 'connect.php';

$id = $_GET['id'];
echo $sql = "DELETE FROM `todo` WHERE tId = $id ";


if (mysqli_query($conn ,$sql)) 
{
  http_response_code(204);
    
} else {
   return http_response_code(422);
}

?>