<?php

function connect()
{
  global $connection;
  if(isset($connection)) { return true; }

  $connection = mysqli_connect("34.94.246.220", "root", "qwerty1", "peaceful-berm-265521:us-west2:meditrac");

  $error = mysqli_connect_error();
  if($error != null) { return false; }
  else { return true; }
}

?>