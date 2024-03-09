<?php
// Menentukan halaman yang akan ditampilkan
$page = $_GET['page'] ?? 'home';

// Menentukan file yang sesuai dengan pilihan halaman
$file = 'tampil_' . $page . '.php';

// Menampilkan header
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Bengkel</title>
</head>
<body>
  <h1>Aplikasi Bengkel</h1>
  <nav>
    <a href="tampilSparepart.php">Sparepart</a> |
    <a href="tampilJenisReparasi.php">Jenis Reparasi</a> |
    <a href="tampilReparasi.php">Reparasi</a> |
    <a href="tampilDetilReparasi.php">Detil Reparasi</a>
  </nav>

</body>
</html>

