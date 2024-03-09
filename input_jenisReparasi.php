<?php
// Mendapatkan data dari URL
$kdJenisRep = $_GET['kdJenisRep'];
$reparasi = $_GET['reparasi'];
$tarif = $_GET['tarif'];
$keterangan = $_GET['keterangan'];

// Membangun koneksi ke database
require('koneksi.php');

// Menyiapkan query insert
$sql = "INSERT INTO jenis_reparasi (kdJenisRep, reparasi, tarif, keterangan)
        VALUES ('$kdJenisRep', '$reparasi', '$tarif', '$keterangan')";

// Menjalankan query dan menangani error
if (mysqli_query($db, $sql)) {
  // Data berhasil ditambahkan
  header("location:tampilJenisReparasi.php"); // Redirect ke halaman tampil data
} else {
  // Gagal menambahkan data
  echo "Error: " . mysqli_error($db);
}

// Menutup koneksi database
mysqli_close($db);
?>
