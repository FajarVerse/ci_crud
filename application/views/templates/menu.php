<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">
</head>

<body>
    <ul>
        <li><a href="#">File</a></li>
        <li class="toggle-dropdown"><a href="#">Master</a>
            <ul class="dropdown">
                <li><a href="<?= site_url('menu/barang') ?>">Barang</a></li>
                <li><a href="<?= site_url('pelanggan') ?>">Customer</a></li>
                <li><a href="#">Karyawan</a></li>
            </ul>
        </li>
        <li><a href="#">Transaksi</a></li>
    </ul>
</body>

</html>