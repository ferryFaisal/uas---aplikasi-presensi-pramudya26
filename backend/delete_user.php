<?php
require "database.php";
//Delete record from tabel 'user'at database 'backend_webpro'
//query for delete a record
$sql= "DELETE FROM user WHERE email ='$_GET[email]'";
if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully";
  header('Location: tables_user.php');
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>