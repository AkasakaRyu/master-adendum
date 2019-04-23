<script src="<?= base_url('assets/jquery/jquery.mask.min.js'); ?>"></script>
<script>
  $(document).ready(function() {
  	$( '.uang' ).mask('0.000.000.000', {reverse: true});

		$("#dtAden").DataTable({
			"processing": true,
			"ajax": {
				"url": "<?= base_url('adendum/dashboard/list_data/') ?>",
				"type": "POST"
			}
		});

		$(document).on('click','#detail',function() {
			$('#AdenMod').modal('show');
			var form = $("#FrmAden");
			jQuery.ajax({
				type: "POST",
				url: "<?= base_url('adendum/dashboard/get_data/') ?>",
				dataType: 'json',
				data: { adendum_id: $(this).attr("data") },
				success: function(data) {
					$.each(data, function(key, value) {
						var ctrl = $('[name='+key+']');
						var ctrl2 = $('select#'+key);
						console.log(ctrl.prop("type"));
						switch(ctrl.prop("type")) {
							case "select-one" :
								ctrl2.val(value).trigger("change");
								ctrl2.attr('disabled','true');
								$("button[type=submit]").attr('disabled','true');
							break;
							default:
								ctrl.val(value);
								ctrl.attr('disabled','true');
								$("button[type=submit]").attr('disabled','true');
						}
					});
				}
			});
		});

		$(document).on('click','#edit',function() {
			$('#AdenMod').modal('show');
			var form = $("#FrmAden");
			jQuery.ajax({
				type: "POST",
				url: "<?= base_url('adendum/dashboard/get_data/') ?>",
				dataType: 'json',
				data: { adendum_id: $(this).attr("data") },
				success: function(data) {
					$.each(data, function(key, value) {
						var ctrl = $('[name='+key+']');
						var ctrl2 = $('select#'+key);
						console.log(ctrl.prop("type"));
						switch(ctrl.prop("type")) {
							case "select-one" :
								ctrl2.val(value).trigger("change");
								ctrl2.removeAttr('disabled','true');
							break;
							default:
								ctrl.val(value);
								ctrl.removeAttr('disabled','true');
								$("button[type=submit]").removeAttr('disabled','true');
						}
					});
				}
			});
		});

		$('#FrmAden').submit(function(e) {
			console.log($("#FrmAden").serialize());
			e.preventDefault();
			swal({
				title: "Anda Yakin Ingin Menyimpan Data?",
				text: "",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((Oke) => {
				if(Oke) {
					$.ajax({
						type: "POST",
						url: "<?= base_url('adendum/dashboard/simpan/') ?>",
						data: $("#FrmAden").serialize(),
						timeout: 5000,
						success: function(response) {
							var data = JSON.parse(response);
							swal(data.warning, data.pesan, data.kode).then((value) => {
								if(data.kode=="success") {
									location.reload();
								}
							})
						},
						error: function(xhr, status, error) {
							swal(error, "Please Ask Support or Refresh the Page!", "error").then((value) => {
								location.reload();
							})
						}
					})
				} else {
					swal("Poof!","Penyimpanan Data Dibatalkan", "error").then((value) => {
						location.reload();
					})
				}
			})
		});

		$(document).on('click','#hapus',function() {
			swal({
				title: "Anda Yakin Ingin Menghapus Data?",
				text: "",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			}).then((Oke) => {
				if(Oke) {
					$.ajax({
						type: "POST",
						url: "<?= base_url('adendum/dashboard/hapus/') ?>",
						data: { adendum_id: $(this).attr("data") },
						timeout: 5000,
						success: function(response) {
							var data = JSON.parse(response);
							swal(data.warning, data.pesan, data.kode).then((value) => {
								location.reload();
							})
						},
						error: function(xhr, status, error) {
							swal(error, "Please Ask Support or Refresh the Page!", "error").then((value) => {
								location.reload();
							})
						}
					})
				} else {
					swal("Poof!","Penyimpanan Data Dibatalkan", "error").then((value) => {
						location.reload();
					})
				}
			})
		});
	});
</script>
