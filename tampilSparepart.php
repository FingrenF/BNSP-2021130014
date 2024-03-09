<?php
include "koneksi.php";

// Determine sorting order (default ascending)
$sort = $_GET['sort'] ?? 'asc';

// Construct query with sorting based on price
$query = "SELECT * FROM sparepart ORDER BY harga $sort";

// Execute query
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
  <title>Tampilan Data Sparepart</title>
</head>
<body>
<nav>
  <a href="tampilSparepart.php">Sparepart</a> |
  <a href="tampilJenisReparasi.php">Jenis Reparasi</a> |
  <a href="tampilReparasi.php">Reparasi</a> |
  <a href="tampilDetilReparasi.php">Detil Reparasi</a>
</nav>


  <h1>Tampilan Data Sparepart</h1>

  <p>Urutkan berdasarkan harga:
    <a href="?sort=asc">Terkecil (Asc)</a> |
    <a href="?sort=desc">Terbesar (Desc)</a>
  </p>
  <a href="inputSparepart.php">Tambah Data</a>
  <table border="1">
    <tr>
      <th>Kode Sparepart</th>
      <th>Nama Sparepart</th>
      <th>Harga</th>
      <th>Stok</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["kdSparepart"] . "</td>";
      echo "<td>" . $row["namaSparepart"] . "</td>";
      echo "<td>" . $row["harga"] . "</td>";
      echo "<td>" . $row["stok"] . "</td>";
      echo "<td><a href='editSparepart.php?kdSparepart=" . $row["kdSparepart"] . "'>Edit</a></td>";
      echo "<td><a href='deleteSparepart.php?kdSparepart=" . $row['kdSparepart'] . "' onclick='return confirm(\"Hapus sparepart dengan kode " . $row['kdSparepart'] . "? \")'>Delete</a></td>";
      echo "</tr>";
    }
    ?>
  </table>
</body>
</html>
