<!DOCTYPE html>
<html lang="en">

<head>
  <title>Document</title>
  <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="min-h-screen pt-10 pb-10">
    <div class=" container">
      <div class=" w-full px-16 flex">
        <div class="w-1/2">
          <form id="formPelanggan" class=" w-96 p-5 bg-white rounded-md shadow-md shadow-slate-600">
            <h1 class=" font-bold text-4xl text-blue-500 mb-5">Form Customer</h1>
            <div>
              <label for="id_pelanggan" class="">
                <input type="text" id="id_pelanggan" name="id" placeholder="ID Pelanggan" class="w-full px-3 py-2 bg-transparent border-b-2 border-b-slate-300 mb-3 outline-none focus:border-b-blue-500 transition-all duration-300 ease-in-out">
              </label>
            </div>
            <div>
              <label for="nama_pelanggan">
                <input type="text" id="nama_pelanggan" name="nama" placeholder="Nama Pelanggan" disabled class="w-full px-3 py-2 bg-transparent border-b-2 border-b-slate-300 mb-3 outline-none focus:border-b-blue-500 transition-all duration-300 ease-in-ou">
              </label>
            </div>
            <div>
              <label for="alamat">
                <input type="text" id="alamat" name="alamat" placeholder="Alamat" disabled class="w-full px-3 py-2 bg-transparent border-b-2 border-b-slate-300 mb-3 outline-none focus:border-b-blue-500 transition-all duration-300 ease-in-ou">
              </label>
            </div>
            <div>
              <label for="phone">
                <input type="text" id="phone" name="no_phone" placeholder="No Phone" disabled class="w-full px-3 py-2 bg-transparent border-b-2 border-b-slate-300 mb-3 outline-none focus:border-b-blue-500 transition-all duration-300 ease-in-ou">
              </label>
            </div>
            <div>
              <button type="button" id="btnInsert" disabled class="w-full py-2 mt-5 bg-blue-500 font-medium text-lg text-white rounded-md ">Add Data </button>
            </div>
          </form>
        </div>
        <div class="w-1/2">
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
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/js/jquery_pelanggan.js'); ?>"></script>

</body>

</html>