<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Data Reparasi</title>
</head>
<body>
  <h1>Input Data Reparasi</h1>
  <form action="input_reparasi.php" method="GET">
    <label for="noReparasi">No. Reparasi:</label>
    <input type="text" name="noReparasi" id="noReparasi" required>
    <br>
    <label for="tglReparasi">Tanggal Reparasi:</label>
    <input type="date" name="tglReparasi" id="tglReparasi" required>
    <br>
    <label for="namaMontir">Nama Montir:</label>
    <input type="text" name="namaMontir" id="namaMontir">
    <br>
    <label for="noMobil">No. Mobil:</label>
    <input type="text" name="noMobil" id="noMobil">
    <br>
    <label for="kdJenisRep">Kode Jenis Reparasi:</label>
    <input type="text" name="kdJenisRep" id="kdJenisRep">
    <br>
    <label for="tglBayar">Tanggal Bayar:</label>
    <input type="date" name="tglBayar" id="tglBayar">
    <br>
    <label for="status">Status:</label>
    <input type="text" name="status" id="status">
    <br><br>
    <button type="submit">Simpan</button>
  </form>
</body>
</html>