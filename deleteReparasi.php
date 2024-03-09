<?php
// Mendapatkan kode sparepart dari URL
$noReparasi = $_GET['noReparasi'];

// Membangun koneksi ke database
require('koneksi.php');

// Menyiapkan query delete
$sql = "DELETE FROM reparasi WHERE noReparasi='$noReparasi'";

// Menjalankan query dan menangani error
if (mysqli_query($db, $sql)) {
  // Data berhasil dihapus
  header("location:tampilReparasi.php"); // Redirect ke halaman tampil data
} else {
  // Gagal hapus data
  echo "Error: " . mysqli_error($db);
}

// Menutup koneksi database
mysqli_close($db);
?>
