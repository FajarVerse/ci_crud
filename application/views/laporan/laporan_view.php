<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan</title>
  <style>
    table,
    fieldset {
      width: 100%;
      box-sizing: border-box;
    }
  </style>
</head>

<body>

  <h1>Laporan Barang</h1>

  <form action="" method="get">
    <fieldset>
      <legend>Pencarian Berdasarkan Nama Barang</legend>
      <label for="nama">Nama Barang</label>
      <input type="text" id="nama" name="nama" value="<?= isset($_GET['nama']) ? $_GET['nama'] : "" ?>">
    </fieldset>
    <br>
    <fieldset>
      <legend>Pencarian Berdasarkan Harga Jual</legend>
      <label for="min_harga">Harga Jual</label>
      <input type="number" id="min_harga" name="min_harga" value="<?= isset($_GET['min_harga']) ? $_GET['min_harga'] : "" ?>">
      <label for="max_harga">s/d</label>
      <input type="number" id="max_harga" name="max_harga" value="<?= isset($_GET['max_harga']) ? $_GET['max_harga'] : "" ?>">
    </fieldset>
    <br>

    <button type="submit">Search</button>
    <button type="submit" onclick="handleResetForm">Reset</button>
  </form>

  <br>

  <table border="1">
    <thead>
      <tr>
        <td>No.</td>
        <td>Code Barang</td>
        <td>Nama Barang</td>
        <td>Harga Beli</td>
        <td>Harga Jual</td>
        <td>Satuan Barang</td>
        <td>Stock Barang</td>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($barang)): ?>
        <?php $number = 1; ?>
        <?php foreach ($barang as $brg) : ?>
          <tr>
            <td><?= $number++ ?></td>
            <td><?= $brg->kode_brg ?></td>
            <td><?= $brg->nama_brg ?></td>
            <td><?= $brg->harga_beli ?></td>
            <td><?= $brg->harga_jual ?></td>
            <td><?= $brg->satuan_brg ?></td>
            <td><?= $brg->stock_brg ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="7">Data is not found</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <script>
    const handleResetForm = () => {
      const inputs = document.querySelectorAll("input")

      inputs.forEach(input => (
        input.value = ""
      ))

      window.location.href = "http://localhost/ci_crud/index.php/Laporan"
    }
  </script>
</body>

</html>