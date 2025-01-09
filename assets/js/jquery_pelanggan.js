$(document).ready(function () {
	// pada saat aplikasi dijalankan kursor aktif di text id pelanggan
	$("#id_pelanggan").focus();

	$("#id_pelanggan").keypress((e) => {
		console.log("test");
	});

	// pada saat di text di pelanggan ditekan tombil enter
	$("#id_pelanggan").keypress(function (e) {
		if (e.which == 13) {
			$.post("Pelanggan/getById", { id: $(this).val() }, function (data) {
				const idPelanggan = JSON.parse(data);

				if (idPelanggan) {
					alert("Id Pelanggan sudah ada");
				} else {
					$("#nama_pelanggan").prop("disabled", false).focus();
					$("#alamat").prop("disabled", false);
					$("#phone").prop("disabled", false);
					$("#btnInsert").prop("disabled", false);
				}
			});
		}
	});

	$("#btnInsert").click(function () {
		const data = $("#formPelanggan").serialize();
		$.post("Pelanggan/insert", data, function () {
			alert("Insert Data Succsess");
			location.reload();
		});
	});
});
