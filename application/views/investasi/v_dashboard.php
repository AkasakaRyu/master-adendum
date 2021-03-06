<div class="col-12">
	<div class="pl-3 py-4">
		<div class="card card-light enable-shadow">
			<div class="card-header bg-secondary text-white">
				<h4 class="card-title mb-0">
					<i class="fa fa-building mr-2"></i> Data <?= $Title ?>
					<div class="float-none float-md-right mt-2 mt-md-0">
						<a href="#" class="btn btn-sm btn-block btn-light" role="button" data-toggle="modal" data-target="#InvMod"><i class="fa fa-plus mr-2"></i> Tambah <?= $Title ?></a>
					</div>
					<div class="float-none float-md-right mt-2 mt-md-0 mr-md-1">
						<a href="<?= base_url('user/dashboard') ?>" class="btn btn-sm btn-block btn-light"><i class="fa fa-home mr-2"></i> Beranda</a>
					</div>
				</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-sm table-striped table-bordered" id="dtInv">
						<thead>
							<tr>
								<th>PO</th>
								<th>Bidang</th>
								<th>Kontrak</th>
								<th>Uraian</th>
								<th>Divisi</th>
								<th>Nilai</th>
								<th>Pelaksanaan</th>
								<th class="text-right"><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="modal fade bd-example-modal-lg" id="InvMod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"><i class="fa fa-building mr-3"></i> Tambah Data <?= $Title ?></h5>
					</div>
					<?= form_open("#",array('id' => 'FrmInv')) ?>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Kode <?= $Title ?></label>
										<?php
											$data = array(
												'name' => 'investasi_id',
												'id' => 'investasi_id',
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
										<label for="">Uraian Pekerjaan</label>
										<?php
											$data = array(
												'name' => 'investasi_uraian_pekerjaan',
												'id' => 'investasi_uraian_pekerjaan',
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
										<label for="">Nomor PR</label>
										<?php
											$data = array(
												'name' => 'investasi_pr_number',
												'id' => 'investasi_pr_number',
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
												'name' => 'investasi_po_number',
												'id' => 'investasi_po_number',
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
												'name' => 'investasi_no_kontrak',
												'id' => 'investasi_no_kontrak',
												'class' => 'form-control',
												'required' => 'true',
												'autocomplete' => 'off'
											);
											echo form_input($data);
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Bidang</label>
										<?php
											$data = array(
												'name' => 'bidang_id',
												'id' => 'bidang_id',
												'class' => 'form-control',
												'required' => 'true'
											);
											$option = array(
												'' => ''
											);
											echo form_dropdown($data,$option);
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Divisi</label>
										<?php
											$data = array(
												'name' => 'divisi_id',
												'id' => 'divisi_id',
												'class' => 'form-control',
												'required' => 'true'
											);
											$option = array(
												'' => ''
											);
											echo form_dropdown($data,$option);
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Nilai Pekerjaan</label>
										<?php
											$data = array(
												'name' => 'investasi_nilai_pekerjaan',
												'id' => 'investasi_nilai_pekerjaan',
												'class' => 'form-control uang',
												'required' => 'true',
												'autocomplete' => 'off'
											);
											echo form_input($data);
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Mulai Pelaksanaan</label>
										<?php
											$data = array(
												'name' => 'investasi_mulai_pelaksanaan',
												'type' => 'date',
												'id' => 'investasi_mulai_pelaksanaan',
												'class' => 'form-control',
												'required' => 'true',
												'autocomplete' => 'off'
											);
											echo form_input($data);
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Selesai Pekerjaan</label>
										<?php
											$data = array(
												'name' => 'investasi_selesai_pekerjaan',
												'type' => 'date',
												'id' => 'investasi_selesai_pekerjaan',
												'class' => 'form-control',
												'required' => 'true',
												'autocomplete' => 'off'
											);
											echo form_input($data);
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Tanggal Jaminan Pelaksanaan</label>
										<?php
											$data = array(
												'name' => 'investasi_tanggal_jaminan_pelaksanaan',
												'type' => 'date',
												'id' => 'investasi_tanggal_jaminan_pelaksanaan',
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
		<div class="modal fade bd-example-modal-lg" id="InvAdenMod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
												'name' => 'investasi_id',
												'id' => 'investasi_id_aden',
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
										<label for="">Uraian Pekerjaan</label>
										<?php
											$data = array(
												'name' => 'adendum_uraian_pekerjaan_aden',
												'id' => 'investasi_uraian_pekerjaan_aden',
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
										<label for="">Nomor PR</label>
										<?php
											$data = array(
												'name' => 'adendum_pr_number',
												'id' => 'investasi_pr_number_aden',
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
												'id' => 'investasi_po_number_aden',
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
												'id' => 'investasi_no_kontrak_aden',
												'class' => 'form-control',
												'required' => 'true',
												'autocomplete' => 'off'
											);
											echo form_input($data);
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Bidang</label>
										<?php
											$data = array(
												'name' => 'bidang_id',
												'id' => 'bidang_id_aden',
												'class' => 'form-control',
												'required' => 'true'
											);
											$option = array(
												'' => ''
											);
											echo form_dropdown($data,$option);
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Divisi</label>
										<?php
											$data = array(
												'name' => 'divisi_id',
												'id' => 'divisi_id_aden',
												'class' => 'form-control',
												'required' => 'true'
											);
											$option = array(
												'' => ''
											);
											echo form_dropdown($data,$option);
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Nilai Pekerjaan</label>
										<?php
											$data = array(
												'name' => 'adendum_nilai_pekerjaan',
												'id' => 'investasi_nilai_pekerjaan_aden',
												'class' => 'form-control uang',
												'required' => 'true',
												'autocomplete' => 'off'
											);
											echo form_input($data);
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Mulai Pelaksanaan</label>
										<?php
											$data = array(
												'name' => 'adendum_mulai_pelaksanaan',
												'type' => 'date',
												'id' => 'investasi_mulai_pelaksanaan_aden',
												'class' => 'form-control',
												'required' => 'true',
												'autocomplete' => 'off'
											);
											echo form_input($data);
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Selesai Pekerjaan</label>
										<?php
											$data = array(
												'name' => 'adendum_selesai_pekerjaan',
												'type' => 'date',
												'id' => 'investasi_selesai_pekerjaan_aden',
												'class' => 'form-control',
												'required' => 'true',
												'autocomplete' => 'off'
											);
											echo form_input($data);
										?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Tanggal Jaminan Pelaksanaan</label>
										<?php
											$data = array(
												'name' => 'adendum_tanggal_jaminan_pelaksanaan',
												'type' => 'date',
												'id' => 'investasi_tanggal_jaminan_pelaksanaan_aden',
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
</div>
<?php $this->load->view('investasi/js/js_page_dashboard') ?>