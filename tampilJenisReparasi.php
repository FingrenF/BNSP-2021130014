<?php
include "koneksi.php";

// Query untuk mengambil data
$query = "SELECT * FROM jenis_reparasi";

// Eksekusi query
$result = mysqli_query($db, $query);

if (!$result) {
  die("Error: " . mysqli_error($db));
}

// Mendapatkan kata kunci pencarian
$cari = $_GET['cari'] ?? '';

// Query dengan filter berdasarkan kolom "reparasi"
$query = "SELECT * FROM jenis_reparasi WHERE reparasi LIKE '%$cari%'";

// Eksekusi query
$result = mysqli_query($db, $query);

if (!$result) {
  die("Error: " . mysqli_error($db));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tampilan Data Jenis Reparasi</title>
</head>
<nav>
    <a href="tampilSparepart.php">Sparepart</a> |
    <a href="tampilJenisReparasi.php">Jenis Reparasi</a> |
    <a href="tampilReparasi.php">Reparasi</a> |
    <a href="tampilDetilReparasi.php">Detil Reparasi</a>
  </nav>
<body>
<form action="tampilJenisReparasi.php" method="get">
  <input type="text" name="cari" placeholder="Cari jenis reparasi...">
  <input type="submit" value="Cari">
</form>
  <h1>Tampilan Data Jenis Reparasi</h1>
  <a href="inputJenisReparasi.php">Tambah Data</a>
  <table border="1">
    <tr>
      <th>Kode Jenis Reparasi</th>
      <th>Jenis Reparasi</th>
      <th>Tarif</th>
      <th>Keterangan</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["kdJenisRep"] . "</td>";
      echo "<td>" . $row["reparasi"] . "</td>";
      echo "<td>" . $row["tarif"] . "</td>";
      echo "<td>" . $row["keterangan"] . "</td>";
      echo "<td><a href='editJenisReparasi.php?kdJenisRep=" . $row["kdJenisRep"] . "'>Edit</a></td>";
      echo "<td><a href='deleteJenisReparasi.php?kdJenisRep=" . $row['kdJenisRep'] . "' onclick='return confirm(\"Hapus reparasi dengan no " . $row['kdJenisRep'] . "? \")'>Delete</a></td>";
      echo "</tr>";
    }
    ?>
  </table>
</body>
</html>

