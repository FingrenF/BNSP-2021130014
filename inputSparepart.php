<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Data Sparepart</title>
</head>
<body>
  <h1>Input Data Sparepart</h1>
  <form action="input_sparepart.php" method="GET">
    <label for="kdSparepart">Kode Sparepart:</label>
    <input type="text" name="kdSparepart" id="kdSparepart" required>
    <br>
    <label for="namaSparepart">Nama Sparepart:</label>
    <input type="text" name="namaSparepart" id="namaSparepart" required>
    <br>
    <label for="harga">Harga:</label>
    <input type="number" name="harga" id="harga" required>
    <br>
    <label for="stok">Stok:</label>
    <input type="number" name="stok" id="stok" required>
    <br><br>
    <button type="submit">Simpan</button>
  </form>
</body>
</html>
