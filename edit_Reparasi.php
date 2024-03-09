<?php
// Mendapatkan data dari URL
$noReparasi = $_POST['noReparasi'];
$tglTerima = $_POST['tglTerima'];
$namaMontir = $_POST['namaMontir'];
$noMobil = $_POST['noMobil'];
$kdJenisRep = $_POST['kdJenisRep'];
$tglBayar = $_POST['tglBayar'];
$status = $_POST['status'];

// Membangun koneksi ke database
require('koneksi.php');

// Menyiapkan query update
$sql = "UPDATE reparasi SET tglReparasi='$tglTerima', namaMontir='$namaMontir', noMobil='$noMobil', kdJenisRep='$kdJenisRep', tglBayar='$tglBayar', status='$status' WHERE noReparasi='$noReparasi'";

// Menjalankan query dan menangani error
if (mysqli_query($db, $sql)) {
  // Data berhasil diupdate
  header("location:tampilReparasi.php"); // Redirect ke halaman tampil data
} else {
  // Gagal update data
  echo "Error: " . mysqli_error($db);
}

// Menutup koneksi database
mysqli_close($db);
?>
