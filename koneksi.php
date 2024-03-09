<?php
$host = "localhost";
$user = "root";
$password = "KitBui03";
$database = "bnsp";

$db = mysqli_connect($host, $user, $password, $database);

if (!$db) {
  die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
