<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penjualan</title>
  <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
</head>

<body>
  <form id="form_penjualan">
    <div><input type="text" name="txtNoFaktur" id="no_faktur" placeholder="No Faktur"></div>
    <div><input type="date" name="txtTglFaktur" id="tgl_faktur" placeholder="Tanggal Faktur"></div>
    <div><input type="text" name="txtKodeBarang" id="kode_brg" placeholder="Kode Barang"></div>
    <div><input type="text" name="txtNamaBarang" id="nama_brg" placeholder="Nama Barang" disabled></div>
    <div><input type="text" name="txtHargaJual" id="harga_jual" placeholder="Harga Jual Barang" disabled></div>
    <div>
      <input type="number" name="txtJumlah" id="jml_jual" placeholder="Jumlah Penjualan">
      <button type="button" id="btn_count">Count</button>
    </div>
    <div><input type="text" name="txtJmlBayar" id="jml_bayar" placeholder="Jumlah Pembayaran"></div>
    <div>
      <button type="button" id="btn_save">Save</button>
      <button type="button" id="btn_cancel">Cancel</button>
    </div>
  </form>

  <script src="<?= base_url("assets/js/barang.js") ?>"></script>
  <script>
    $(document).ready(function() {
      $("#btn_count").click(function() {
        let total = $("#jml_jual").val() * $("#harga_jual").val();
        console.log(total)
        $("#jml_bayar").val(total)
      })

      $('#btn_save').click(function() {
        const data = $("#form_penjualan").serialize()

        console.log(JSON.stringify(data))

        $.post("penjualan/insert", data, function() {
          alert("Data saved successfully")

          setTimeout(() => {
            location.reload()
          }, 5000)
        })
      })
    })
  </script>
</body>

</html>