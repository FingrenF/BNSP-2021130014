<?php
// Mendapatkan data dari URL
$kdSparepart = $_GET['kdSparepart'];
$namaSparepart = $_GET['namaSparepart'];
$harga = $_GET['harga'];
$stok = $_GET['stok'];

// Membangun koneksi ke database
require('koneksi.php');

// Menyiapkan query update
$sql = "UPDATE sparepart SET namaSparepart='$namaSparepart', harga=$harga, stok=$stok WHERE kdSparepart='$kdSparepart'";

// Menjalankan query dan menangani error
if (mysqli_query($db, $sql)) {
  // Data berhasil diupdate
  header("location:tampilSparepart.php"); // Redirect ke halaman tampil data
} else {
  // Gagal update data
  echo "Error: " . mysqli_error($db);
}

// Menutup koneksi database
mysqli_close($db);
?>
