<?php
include "koneksi.php";

// Query untuk mengambil data
$query = "SELECT  * FROM Reparasi";

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
  <title>Tampilan Data Reparasi</title>
</head>
<nav>
    <a href="tampilSparepart.php">Sparepart</a> |
    <a href="tampilJenisReparasi.php">Jenis Reparasi</a> |
    <a href="tampilReparasi.php">Reparasi</a> |
    <a href="tampilDetilReparasi.php">Detil Reparasi</a>
  </nav>
<body>
    
  <h1>Tampilan Data Reparasi</h1>
  <a href="inputReparasi.php">Tambah Data</a>
  <table border="1">
    <tr>
      <th>No Reparasi</th>
      <th>Tanggal Reparasi</th>
      <th>Nama Montir</th>
      <th>No Mobil</th>
      <th>Kode Jenis Reparasi</th>
      <th>Tanggal Bayar</th>
      <th>Status</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["noReparasi"] . "</td>";
      echo "<td>" . $row["tglReparasi"] . "</td>";
      echo "<td>" . $row["namaMontir"] . "</td>";
      echo "<td>" . $row["noMobil"] . "</td>";
      echo "<td>" . $row["kdJenisRep"] . "</td>";
      echo "<td>" . $row["tglBayar"] . "</td>";
      echo "<td>" . $row["status"] . "</td>";
      echo "<td><a href='editReparasi.php?noReparasi=" . $row["noReparasi"] . "'>Edit</a></td>";
      echo "<td><a href='deleteReparasi.php?noReparasi=" . $row['noReparasi'] . "' onclick='return confirm(\"Hapus reparasi dengan no " . $row['noReparasi'] . "? \")'>Delete</a></td>";
      echo "</tr>";
    }
    ?>
  </table>
</body>
</html>