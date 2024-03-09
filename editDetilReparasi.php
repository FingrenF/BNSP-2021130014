<?php
// Get sparepart code from URL
$noReparasi = $_GET['noReparasi'];
$kdSparepart = $_GET['kdSparepart'];


require('koneksi.php');

// Select data for editing
$sql = "SELECT * FROM detil_rep WHERE kdSparepart = '$kdSparepart' And noReparasi = '$noReparasi'";
$query = mysqli_query($db, $sql) or die('SQL error: ' . mysqli_error($db));
$row = mysqli_fetch_array($query);

// Check if data exists
if (empty($row)) {
  echo "Error: Sparepart with code '$kdSparepart' not found!";
  exit;
}

// Edit form
echo "<form method='GET' action='edit_detilReparasi.php'>
        <table>
          <tr>
            <td>no Reparasi:</td>
            <td><input type='text' name='noReparasi' value='$row[noReparasi]' size='10' READONLY></td>
          </tr>
          <tr>
            <td>Kode Sparepart:</td>
            <td><input type='text' name='kdSparepart' value='$row[kdSparepart]' size='30' required></td>
          </tr>
          <tr>
            <td>Jumlah Sparepart</td>
            <td><input type='number' name='jmlSparepart' value='$row[jmlSparepart]' min='0' required></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type='submit' value='SIMPAN'>
                <input type='reset' value='BATAL'></td>
          </tr>
        </table>
      </form><br>";