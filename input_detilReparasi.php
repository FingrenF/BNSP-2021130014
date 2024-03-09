<?php
// Mendapatkan data dari URL
$noReparasi = $_GET['noReparasi'];
$kdSparepart = $_GET['kdSparepart'];
$jmlSparepart = $_GET['jmlSparepart'];

// Membangun koneksi ke database
require('koneksi.php');

// Menyiapkan query insert
$sql = "INSERT INTO detil_rep (noReparasi, kdSparepart, jmlSparepart)
        VALUES ('$noReparasi', '$kdSparepart', '$jmlSparepart')";

// Menjalankan query dan menangani error
if (mysqli_query($db, $sql)) {
  // Data berhasil ditambahkan
  header("location:tampilDetilReparasi.php"); // Redirect ke halaman tampil data
} else {
  // Gagal menambahkan data
  echo "Error: " . mysqli_error($db);
}

// Menutup koneksi database
mysqli_close($db);
?>
