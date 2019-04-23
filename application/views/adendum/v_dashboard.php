<div class="col-12">
	<div class="pl-3 py-4">
		<div class="card card-light enable-shadow">
			<div class="card-header bg-secondary text-white">
				<h4 class="card-title mb-0">
					<i class="fa fa-building mr-2"></i> Data <?= $Title ?>
					<div class="float-none float-md-right mt-2 mt-md-0 mr-md-1">
						<a href="<?= base_url('user/dashboard') ?>" class="btn btn-sm btn-block btn-light"><i class="fa fa-home mr-2"></i> Beranda</a>
					</div>
				</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-sm table-striped table-bordered" id="dtAden">
						<thead>
							<tr>
								<th>Exploitasi/Investasi</th>
								<th>PR</th>
								<th>PO</th>
								<th>Kontrak</th>
								<th>Nilai</th>
								<th>Selesai</th>
								<th>Jaminan</th>
								<th class="text-right"><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade bd-example-modal-lg" id="AdenMod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><i class="fa fa-building mr-3"></i> Tambah Data <?= $Title ?></h5>
				</div>
				<?= form_open("#",array('id' => 'FrmAden')) ?>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Kode <?= $Title ?></label>
									<?php
										$data = array(
											'name' => 'adendum_id',
											'id' => 'adendum_id',
											'class' => 'form-control',
											'readonly' => 'true',
											'required' => 'true',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Exploitasi/Investasi <?= $Title ?></label>
									<?php
										$data = array(
											'name' => 'exp_inv',
											'id' => 'exp_inv',
											'class' => 'form-control',
											'readonly' => 'true',
											'required' => 'true',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Nomor PR</label>
									<?php
										$data = array(
											'name' => 'adendum_pr_number',
											'id' => 'adendum_pr_number',
											'class' => 'form-control',
											'required' => 'true',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Nomor PO</label>
									<?php
										$data = array(
											'name' => 'adendum_po_number',
											'id' => 'adendum_po_number',
											'class' => 'form-control',
											'required' => 'true',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">No. Kontrak</label>
									<?php
										$data = array(
											'name' => 'adendum_no_kontrak',
											'id' => 'adendum_no_kontrak',
											'class' => 'form-control',
											'required' => 'true',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Nilai Pekerjaan</label>
									<?php
										$data = array(
											'name' => 'adendum_nilai_pekerjaan',
											'id' => 'adendum_nilai_pekerjaan',
											'class' => 'form-control uang',
											'required' => 'true',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Jaminan Selesai Pekerjaan</label>
									<?php
										$data = array(
											'name' => 'adendum_tanggal_jaminan_pelaksanaan',
											'type' => 'date',
											'id' => 'adendum_tanggal_jaminan_pelaksanaan',
											'class' => 'form-control',
											'required' => 'true',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Selesai Pekerjaan</label>
									<?php
										$data = array(
											'name' => 'adendum_selesai_pekerjaan',
											'type' => 'date',
											'id' => 'adendum_selesai_pekerjaan',
											'class' => 'form-control',
											'required' => 'true',
											'autocomplete' => 'off'
										);
										echo form_input($data);
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-circle btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-2"></i> Close</button>
						<button type="submit" class="btn btn-circle btn-primary"><i class="fa fa-check mr-2"></i> Save changes</button>
					</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('adendum/js/js_page_dashboard') ?>