<?php
include "koneksi.php";

// Query untuk mengambil data
$query = "SELECT * FROM detil_rep";

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
  <title>Tampilan Data Detil Reparasi</title>
</head>
<nav>
    <a href="tampilSparepart.php">Sparepart</a> |
    <a href="tampilJenisReparasi.php">Jenis Reparasi</a> |
    <a href="tampilReparasi.php">Reparasi</a> |
    <a href="tampilDetilReparasi.php">Detil Reparasi</a>
  </nav>
<body>
  <h1>Tampilan Data Detil Reparasi</h1>
  <a href="inputDetilReparasi.php">Tambah Data</a>
  <table border="1">
    <tr>
      <th>No Reparasi</th>
      <th>Kode Sparepart</th>
      <th>Jumlah Sparepart</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["noReparasi"] . "</td>";
      echo "<td>" . $row["kdSparepart"] . "</td>";
      echo "<td>" . $row["jmlSparepart"] . "</td>";
      echo "<td><a href='editDetilReparasi.php?noReparasi=" . $row['noReparasi'] . "&kdSparepart=" . $row['kdSparepart'] . "'>Edit</a></td>";
      echo "<td><a href='deleteDetilReparasi.php?noReparasi=" . $row['noReparasi'] . "&kdSparepart=" . $row['kdSparepart'] . "' onclick='return confirm(\"Hapus detil reparasi dengan no " . $row['noReparasi'] . " dan Kode Sparepart ". $row['kdSparepart']. "? \")'>Delete</a></td>";
      echo "</tr>";
    }
    ?>
  </table>
</body>
</html>

