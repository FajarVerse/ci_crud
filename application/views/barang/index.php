<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
</head>

<body>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Data Barang</h3>
            <a href="<?= site_url('menu/tambah_barang') ?>">Tambah Barang</a>
        </div>
    </div>
    <div class="card-body">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Satuan Barang</th>
                    <th>Stock</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($TbBarang as $row):
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->kode_brg ?></td>
                        <td><?= $row->nama_brg ?></td>
                        <td>Rp. <?= number_format($row->harga_beli, 0, ',', '.') ?></td>
                        <td>Rp. <?= number_format($row->harga_jual, 0, ',', '.') ?></td>
                        <td><?= $row->satuan_brg ?></td>
                        <td><?= $row->stock_brg ?></td>
                        <td>
                            <a href="<?= site_url("menu/update_barang/" . $row->kode_brg) ?>">Edit</a>
                            <a href="<?= site_url("menu/delete_barang/" . $row->kode_brg) ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        console.log(<?php $barang ?>)
    </script>
</body>

</html>