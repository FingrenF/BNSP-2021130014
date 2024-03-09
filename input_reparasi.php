<?php
$noReparasi = $_GET["noReparasi"];
$tglReparasi = $_GET["tglReparasi"];
$namaMontir = $_GET["namaMontir"];
$noMobil = $_GET["noMobil"];
$kdJenisRep = $_GET["kdJenisRep"];
$tglBayar = $_GET["tglBayar"];
$status = $_GET["status"];

require('koneksi.php');
$query = "INSERT INTO reparasi (noReparasi, tglReparasi, namaMontir, noMobil, kdJenisRep, tglBayar, status)
         VALUES ('$noReparasi', '$tglReparasi', '$namaMontir', '$noMobil', '$kdJenisRep', '$tglBayar', '$status')";

  if (mysqli_query($db, $query)) {
    // Data berhasil ditambahkan
    header("location:tampilReparasi.php"); // Redirect ke halaman tampil data
  } else {
    // Gagal menambahkan data
    echo "Error: " . mysqli_error($db);
  }
  
  // Menutup koneksi database
  mysqli_close($db);
?>