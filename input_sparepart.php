<?php
// Mendapatkan data dari URL
$kdSparepart = $_GET['kdSparepart'];
$namaSparepart = $_GET['namaSparepart'];
$harga = $_GET['harga'];
$stok = $_GET['stok'];

// Membangun koneksi ke database
require('koneksi.php');

// Menyiapkan query insert
$sql = "INSERT INTO sparepart (kdSparepart, namaSparepart, harga, stok)
        VALUES ('$kdSparepart', '$namaSparepart', $harga, $stok)";

// Menjalankan query dan menangani error
if (mysqli_query($db, $sql)) {
  // Data berhasil ditambahkan
  header("location:tampilSparepart.php"); // Redirect ke halaman tampil data
} else {
  // Gagal menambahkan data
  echo "Error: " . mysqli_error($db);
}

// Menutup koneksi database
mysqli_close($db);
?>
