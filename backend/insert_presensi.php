<?php
require "database.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$date_created = date("Y-m-d");
// $date_modified = date("Y-m-d");
// insert data into table
$sql = "INSERT INTO presensi (tgl_presensi, makul, kelas, nim, nama, status_presensi) 
VALUES (CURRENT_TIMESTAMP(), '$makul', '$kelas', '$nim', '$nama', '$presensi')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "<br>";
$conn->close();
// me-redirect ke file : read_data.php untuk menampilkan hasilnya
// header('Location: tables_user.php');
?>