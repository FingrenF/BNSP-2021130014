<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Data Detil Reparasi</title>
</head>
<body>
  <h1>Input Data Detil Reparasi</h1>
  <form action="input_detilReparasi.php" method="GET">
    <label for="noReparasi">No Reparasi:</label>
    <input type="text" name="noReparasi" id="noReparasi" required>
    <br>
    <label for="kdSparepart">Kode Sparepart:</label>
    <input type="text" name="kdSparepart" id="kdSparepart" required>
    <br>
    <label for="jmlSparepart">Jumlah Sparepart :</label>
    <input type="number" name="jmlSparepart" id="jmlSparepart">
    <br><br>
    <button type="submit">Simpan</button>
  </form>
</body>
</html>