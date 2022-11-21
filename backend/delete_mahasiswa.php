<?php
require "database.php";
//Delete record from tabel 'user'at database 'backend_webpro'
//query for delete a record
$sql= "DELETE FROM mahasiswa WHERE nim ='$_GET[nim]'";
if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully";
  header('Location: tables_mahasiswa.php');
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>