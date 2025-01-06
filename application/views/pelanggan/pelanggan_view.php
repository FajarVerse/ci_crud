<!DOCTYPE html>
<html lang="en">

<head>
  <title>Document</title>
  <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
</head>

<body>
  <form id="formPelanggan">
    <div>
      <label for="id_pelanggan">
        <input type="text" id="id_pelanggan" name="id" placeholder="ID Pelanggan">
      </label>
    </div>
    <div>
      <label for="nama_pelanggan">
        <input type="text" id="nama_pelanggan" name="nama" placeholder="Nama Pelanggan" disabled>
      </label>
    </div>
    <div>
      <label for="alamat">
        <input type="text" id="alamat" name="alamat" placeholder="Alamat" disabled>
      </label>
    </div>
    <div>
      <label for="phone">
        <input type="text" id="phone" name="no_phone" placeholder="No Phone" disabled>
      </label>
    </div>
    <div>
      <button type="button" id="btnInsert" disabled>Add Data </button>
    </div>
  </form>
  <table>
    <thead>
      <tr>
        <th>ID Pelanggan</th>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>No Phone</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($pelanggan as $p): ?>
        <tr>
          <td><?= $p['id_pelanggan']; ?></td>
          <td><?= $p['nama_pelanggan']; ?></td>
          <td><?= $p['alamat']; ?></td>
          <td><?= $p['phone']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <script src="<?= base_url('assets/js/jquery_pelanggan.js'); ?>"></script>

</body>

</html>