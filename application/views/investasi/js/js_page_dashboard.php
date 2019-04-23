<script src="<?= base_url('assets/jquery/jquery.mask.min.js'); ?>"></script>
<script>
  $(document).ready(function() {
  	$( '.uang' ).mask('0.000.000.000', {reverse: true});
  	
		$("#dtInv").DataTable({
			"processing": true,
			"ajax": {
				"url": "<?= base_url('investasi/dashboard/list_data/') ?>",
				"type": "POST"
			}
		});

		$("#divisi_id").select2({
			placeholder: "-- PILIH DIVISI --",
		});
		
		$.ajax({
			url: "<?= base_url('divisi/dashboard/options/') ?>",
			type: "GET",
			dataType: "json",
			success:function(data) {
				$.each(data, function(key, value) {
					$('#divisi_id').append('<option value="'+ value.id +'">'+ value.text +'</option>');
				});
			}
		});

		$("#bidang_id").select2({
			placeholder: "-- PILIH BIDANG --",
		});
		
		$.ajax({
			url: "<?= base_url('bidang/dashboard/options/') ?>",
			type: "GET",
			dataType: "json",
			success:function(data) {
				$.each(data, function(key, value) {
					$('#bidang_id').append('<option value="'+ value.id +'">'+ value.text +'</option>');
				});
			}
		});

		$("#divisi_id_aden").select2({
			placeholder: "-- PILIH DIVISI --",
		});
		
		$.ajax({
			url: "<?= base_url('divisi/dashboard/options/') ?>",
			type: "GET",
			dataType: "json",
			success:function(data) {
				$.each(data, function(key, value) {
					$('#divisi_id_aden').append('<option value="'+ value.id +'">'+ value.text +'</option>');
				});
			}
		});

		$("#bidang_id_aden").select2({
			placeholder: "-- PILIH BIDANG --",
		});
		
		$.ajax({
			url: "<?= base_url('bidang/dashboard/options/') ?>",
			type: "GET",
			dataType: "json",
			success:function(data) {
				$.each(data, function(key, value) {
					$('#bidang_id_aden').append('<option value="'+ value.id +'">'+ value.text +'</option>');
				});
			}
		});

		$('#FrmInv').submit(function(e) {
			console.log($("#FrmInv").serialize());
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
						url: "<?= base_url('investasi/dashboard/simpan/') ?>",
						data: $("#FrmInv").serialize(),
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

		$('#FrmAden').submit(function(e) {
			console.log($("#FrmInv").serialize());
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

		$(document).on('click','#edit',function() {
			$('#InvMod').modal('show');
			var form = $("#FrmAden");
			jQuery.ajax({
				type: "POST",
				url: "<?= base_url('investasi/dashboard/get_data/') ?>",
				dataType: 'json',
				data: { investasi_id: $(this).attr("data") },
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

		$(document).on('click','#detail',function() {
			$('#InvMod').modal('show');
			var form = $("#FrmInv");
			jQuery.ajax({
				type: "POST",
				url: "<?= base_url('investasi/dashboard/get_data/') ?>",
				dataType: 'json',
				data: { investasi_id: $(this).attr("data") },
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

		$(document).on('click','#adendum',function() {
			$('#InvAdenMod').modal('show');
			var form = $("#FrmAden");
			jQuery.ajax({
				type: "POST",
				url: "<?= base_url('investasi/dashboard/get_data/') ?>",
				dataType: 'json',
				data: { investasi_id: $(this).attr("data") },
				success: function(data) {
					$.each(data, function(key, value) {
						var ctrl = $('#'+key+'_aden');
						var ctrl2 = $('select#'+key+"_aden");
						console.log(ctrl.prop("type"));
						switch(ctrl.prop("type")) {
							case "select-one" :
								ctrl2.val(value).trigger("change");
							break;
							default:
								ctrl.val(value);
								$("#investasi_uraian_pekerjaan_aden").attr('disabled','true');
								$("#divisi_id_aden").attr('disabled','true');
								$("#bidang_id_aden").attr('disabled','true');
								$("#investasi_mulai_pelaksanaan_aden").attr('readonly','true');
								$("button[type=submit]").removeAttr('disabled','true');
								$("#FrmInv").trigger('reset');
						}
					});
				}
			});
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
						url: "<?= base_url('investasi/dashboard/hapus/') ?>",
						data: { investasi_id: $(this).attr("data") },
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
