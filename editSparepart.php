<?php
// Get sparepart code from URL
$kdSparepart = $_GET['kdSparepart'];

require('koneksi.php');

// Select data for editing
$sql = "SELECT * FROM sparepart WHERE kdSparepart = '$kdSparepart'";
$query = mysqli_query($db, $sql) or die('SQL error: ' . mysqli_error($db));
$row = mysqli_fetch_array($query);

// Check if data exists
if (empty($row)) {
  echo "Error: Sparepart with code '$kdSparepart' not found!";
  exit;
}

// Edit form
echo "<form method='GET' action='Edit_Sparepart.php'>
        <table>
          <tr>
            <td>Kode Sparepart:</td>
            <td><input type='text' name='kdSparepart' value='$row[kdSparepart]' size='10' READONLY></td>
          </tr>
          <tr>
            <td>Nama Sparepart:</td>
            <td><input type='text' name='namaSparepart' value='$row[namaSparepart]' size='30' required></td>
          </tr>
          <tr>
            <td>Harga:</td>
            <td><input type='number' name='harga' value='$row[harga]' step='0.01' required></td>
          </tr>
          <tr>
            <td>Stok:</td>
            <td><input type='number' name='stok' value='$row[stok]' min='0' required></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type='submit' value='SIMPAN'>
                <input type='reset' value='BATAL'></td>
          </tr>
        </table>
      </form><br>";