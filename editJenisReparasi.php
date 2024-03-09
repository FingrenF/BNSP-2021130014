<?php

$kdJenisRep = $_GET['kdJenisRep'];

require('koneksi.php');

// Select data for editing
$sql = "SELECT * FROM jenis_reparasi WHERE kdJenisRep = '$kdJenisRep'";
$query = mysqli_query($db, $sql) or die('SQL error: ' . mysqli_error($db));
$row = mysqli_fetch_array($query);

// Check if data exists
if (empty($row)) {
  echo "Error: jenisrep with code '$kdJenisRep' not found!";
  exit;
}

// Edit form
echo "<form method='GET' action='edit_jenisReparasi.php'>
        <table>
          <tr>
            <td>Kode Jenis Reparasi:</td>
            <td><input type='text' name='kdJenisRep' value='$row[kdJenisRep]' size='10' READONLY></td>
          </tr>
          <tr>
            <td>Reparasi :</td>
            <td><input type='text' name='reparasi' value='$row[reparasi]' size='30' required></td>
          </tr>
          <tr>
            <td>Tarif :</td>
            <td><input type='number' name='tarif' value='$row[tarif]' step='0.01' required></td>
          </tr>
          <tr>
          <td>Keterangan :</td>
          <td><input type='text' name='keterangan' value='$row[keterangan]' size='30' required></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type='submit' value='SIMPAN'>
                <input type='reset' value='BATAL'></td>
          </tr>
        </table>
      </form><br>";