<?php
// Mendapatkan data dari URL
$kdJenisRep = $_GET['kdJenisRep'];
$reparasi = $_GET['reparasi'];
$tarif = $_GET['tarif'];
$keterangan = $_GET['keterangan'];

// Membangun koneksi ke database
require('koneksi.php');

// Menyiapkan query update
$sql = "UPDATE jenis_reparasi SET reparasi='$reparasi', tarif='$tarif', keterangan='$keterangan' WHERE kdJenisRep='$kdJenisRep'";

// Menjalankan query dan menangani error
if (mysqli_query($db, $sql)) {
  // Data berhasil diupdate
  header("location:tampilJenisReparasi.php"); // Redirect ke halaman tampil data
} else {
  // Gagal update data
  echo "Error: " . mysqli_error($db);
}

// Menutup koneksi database
mysqli_close($db);
?>
