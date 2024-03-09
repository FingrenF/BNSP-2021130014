<?php
// Mendapatkan kode sparepart dari URL
$kdJenisRep= $_GET['kdJenisRep'];

// Membangun koneksi ke database
require('koneksi.php');

// Menyiapkan query delete
$sql = "DELETE FROM jenis_reparasi WHERE kdJenisRep='$kdJenisRep'";

// Menjalankan query dan menangani error
if (mysqli_query($db, $sql)) {
  // Data berhasil dihapus
  header("location:tampilJenisReparasi.php"); // Redirect ke halaman tampil data
} else {
  // Gagal hapus data
  echo "Error: " . mysqli_error($db);
}

// Menutup koneksi database
mysqli_close($db);
?>
