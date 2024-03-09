<?php
// Mendapatkan data dari URL
$kdSparepart = $_GET['kdSparepart'];
$noReparasi = $_GET['noReparasi'];
$jmlSparepart = $_GET['jmlSparepart'];

// Membangun koneksi ke database
require('koneksi.php');

// Menyiapkan query update
$sql = "UPDATE detil_rep SET jmlSparepart='$jmlSparepart', kdSparepart='$kdSparepart', noReparasi = '$noReparasi'  WHERE kdSparepart='$kdSparepart' and noReparasi = '$noReparasi'";

// Menjalankan query dan menangani error
if (mysqli_query($db, $sql)) {
  // Data berhasil diupdate
  header("location:tampilDetilReparasi.php"); // Redirect ke halaman tampil data
} else {
  // Gagal update data
  echo "Error: " . mysqli_error($db);
}

// Menutup koneksi database
mysqli_close($db);
?>
