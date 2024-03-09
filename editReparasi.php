<?php
// Get reparation number from URL
$noReparasi = $_GET['noReparasi'];

require('koneksi.php');

// Select data for editing
$sql = "SELECT * FROM reparasi WHERE noReparasi = '$noReparasi'";
$query = mysqli_query($db, $sql) or die('SQL error: ' . mysqli_error($db));
$row = mysqli_fetch_array($query);

// Check if data exists
if (empty($row)) {
  echo "Error: Reparasi with number '$noReparasi' not found!";
  exit;
}

// Edit form
echo "<h2>Edit Data Reparasi</h2>";
echo "<form action='edit_Reparasi.php' method='POST'>";  // Use POST for editing data

echo "<table>";

echo "<tr>";
echo "  <td>No. Reparasi:</td>";
echo "  <td><input type='text' name='noReparasi' value='$row[noReparasi]' size='10' READONLY></td>";
echo "</tr>";

echo "<tr>";
echo "  <td>Tanggal Terima:</td>";
echo "  <td><input type='date' name='tglTerima' value='$row[tglReparasi]' required></td>";  // Assuming tglReparasi stores receive date
echo "</tr>";

echo "<tr>";
echo "  <td>Nama Montir:</td>";
echo "  <td><input type='text' name='namaMontir' value='$row[namaMontir]' size='30'></td>"; // Optional field
echo "</tr>";

echo "<tr>";
echo "  <td>No. Mobil:</td>";
echo "  <td><input type='text' name='noMobil' value='$row[noMobil]'></td>"; // Optional field
echo "</tr>";

echo "<tr>";
echo "  <td>Kode Jenis Reparasi:</td>";
echo "  <td><input type='text' name='kdJenisRep' value='$row[kdJenisRep]'></td>"; // Optional field
echo "</tr>";

echo "<tr>";
echo "  <td>Tanggal Bayar:</td>";
echo "  <td><input type='date' name='tglBayar' value='$row[tglBayar]'></td>"; // Optional field
echo "</tr>";

echo "<tr>";
echo "  <td>Status:</td>";
echo "  <td><input type='text' name='status' value='$row[status]'></td>";
echo "</tr>";
echo "<tr>";
echo " <td>&nbsp;</td>";
echo " <td><input type='submit' value='SIMPAN'>";
echo "<input type='reset' value='BATAL'></td>";
echo "</tr>";
echo "</table>";
echo "</form><br>";
