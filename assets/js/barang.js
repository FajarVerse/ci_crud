$(document).ready(function () {
	$("#no_faktur").focus();
	$("#kode_brg").keypress(function (e) {
		if (e.which == 13) {
			console.log("test");
			$.get("Menu/getByCode", { kode: $(this).val() }, function (data) {
				const barang = JSON.parse(data);
				console.log(barang);
				if (barang) {
					$("#nama_brg").val(barang.nama_brg).prop("disabled", true);
					$("#harga_jual").val(barang.harga_jual).prop("disabled", true);
					$("#jml_jual").focus();
				} else {
					alert("Code barang is not found");
				}
			});
		}
	});
});
