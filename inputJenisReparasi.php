<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Data Jenis Reparasi</title>
</head>
<body>
  <h1>Input Data Jenis Reparasi</h1>
  <form action="input_jenisReparasi.php" method="GET">
    <label for="kdJenisRep">Kode JenisReparasi:</label>
    <input type="text" name="kdJenisRep" id="kdJenisRep" required>
    <br>
    <label for="reparasi">Reparasi:</label>
    <input type="text" name="reparasi" id="reparasi" required>
    <br>
    <label for="tarif">Tarif :</label>
    <input type="number" name="tarif" id="tarif">
    <br>
    <label for="keterangan">Keterangan:</label>
    <input type="text" name="keterangan" id="keterangan">
    <br><br>
    <button type="submit">Simpan</button>
  </form>
</body>
</html>