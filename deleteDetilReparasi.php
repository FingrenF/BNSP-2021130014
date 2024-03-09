<?php
// Mendapatkan kode sparepart dari URL
$kdSparepart = $_GET['kdSparepart'];
$noReparasi = $_GET['noReparasi'];

// Membangun koneksi ke database
require('koneksi.php');

// Menyiapkan query delete
$sql = "DELETE FROM detil_rep WHERE kdSparepart='$kdSparepart' and noReparasi = '$noReparasi'";

// Menjalankan query dan menangani error
if (mysqli_query($db, $sql)) {
  // Data berhasil dihapus
  header("location:tampilDetilReparasi.php"); // Redirect ke halaman tampil data
} else {
  // Gagal hapus data
  echo "Error: " . mysqli_error($db);
}

// Menutup koneksi database
mysqli_close($db);
?>
