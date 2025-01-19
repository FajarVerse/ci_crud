<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pelanggan</title>
  <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
  <script>
    $(document).ready(function() {
      let inputId = $("#input_id")
      let inputName = $('#input_nama')
      let inputAlamat = $('#input_alamat')
      let inputPhone = $('#input_phone')
      inputId.focus()

      inputId.on("keypress", function(e) {
        if (e.which === 13) {
          e.preventDefault();
          let idPelanggan = $(this).val()
          console.log(idPelanggan)

          if (idPelanggan.trim() === "") {
            alert("ID Pelanggan must not blank")
            return
          }

          $.ajax({
            url: '<?php echo base_url(); ?>index.php/pelanggan/search_pelanggan',
            type: "GET",
            data: {
              idPelanggan: idPelanggan
            },
            dataType: "json",
            success: function(response) {
              console.log(response)
              if (response.status === "success") {
                inputName.val(response.data.nama_pelanggan)
                inputAlamat.val(response.data.alamat)
                inputPhone.val(response.data.phone)
              } else {
                alert(response.message)
              }
            },
            error: function() {
              alert("Data is not found")
            }
          })
        }
      })

      const btnEdit = $("#btn_update")

      btnEdit.on("click", function(e) {
        e.preventDefault();

        let inputId = $("#input_id").val()
        let inputName = $('#input_nama').val()
        let inputAlamat = $('#input_alamat').val()
        let inputPhone = $('#input_phone').val()

        if (inputId.trim() === "" || inputName.trim() === "" || inputAlamat.trim() === "" || inputPhone.trim() === "") {
          alert("All data cannot be empty");
          return;
        }

        $.ajax({
          url: "<?= base_url("index.php/pelanggan/update_pelanggan"); ?>",
          type: "GET",
          data: {
            idPelanggan: inputId,
            namaPelanggan: inputName,
            alamatPelanggan: inputAlamat,
            noPhone: inputPhone,
          },
          dataType: "json",
          success: function(response) {
            console.log(response)
            if (response.status === "success") {
              alert(response.message)
              console.log(response)
              let rowId = $(this).find("td:first").text();
              if (rowId === inputId) {
                $(this).find('td:nth-child(2)').text(inputName)
                $(this).find('td:nth-child(3)').text(inputAlamat)
                $(this).find('td:nth-child(4)').text(inputPhone)
              }
              $("#input_id").val("").prop("disabled", false).focus()
              $('#input_nama').val("")
              $('#input_alamat').val("")
              $('#input_phone').val("")

            } else {
              alert(response.message)
            }
          },
          error: function() {
            alert('Data is not found')
          }
        })
      })

      const btnDelete = $("#btn_delete")

      btnDelete.on("click", function(e) {
        e.preventDefault();

        let inputId = $("#input_id").val()

        if (inputId.trim() === "") {
          alert("Id Pelanggan is must blank");
          return;
        }

        if (!confirm("apakah kamu yakin ingin menghapus data")) {
          return
        }

        $.ajax({
          url: "<?= base_url("index.php/pelanggan/delete_pelanggan"); ?>",
          type: "GET",
          data: {
            idPelanggan: inputId,
          },
          dataType: "json",
          success: function(response) {
            console.log(response)
            if (response.status === "success") {
              alert(response.message)
              console.log(response)
              $("table tbody tr").each(function() {
                let rowId = $(this).find("td:first").text();
                if (rowId === inputId) {
                  $(this).remove()
                }
              })
              $("#input_id").val("").prop("disabled", false).focus()
              $('#input_nama').val("")
              $('#input_alamat').val("")
              $('#input_phone').val("")

            } else {
              alert(response.message)
            }
          },
          error: function() {
            alert('Data is not found')
          }
        })
      })
    })
  </script>
</head>

<body>
  <h2>Form Pelanggan</h2>
  <table>

    <form>
      <tr>
        <td>ID Pelanggan</td>
        <td>:</td>
        <td><input type="text" name="id" id="input_id" required></td>
      </tr>
      <tr>
        <td>Nama Pelanggan</td>
        <td>:</td>
        <td><input type="text" name="nama" id="input_nama" required></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><input type="text" name="alamat" id="input_alamat" required></td>
      </tr>
      <tr>
        <td>No Phone</td>
        <td>:</td>
        <td><input type="text" name="phone" id="input_phone" required></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <button type="button" name="btn_update" id="btn_update">Update</button>
        <button type="button" name="btn_delete" id="btn_delete">Delete</button>
      </tr>
    </form>
  </table>
  <h2>Daftar Pelanggan</h2>
  <table>
    <thead>
      <tr>
        <td>ID Pelanggan</td>
        <td>Nama Pelanggan</td>
        <td>Alamat Pelanggan</td>
        <td>No. Telepon Pelanggan</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pelanggan as $plg): ?>
        <tr>
          <td><?= $plg['id_pelanggan'] ?></td>
          <td><?= $plg['nama_pelanggan'] ?></td>
          <td><?= $plg['alamat'] ?></td>
          <td><?= $plg['phone'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>