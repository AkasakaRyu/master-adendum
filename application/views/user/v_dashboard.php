<div class="row">
	<div class="col-lg-6">
		<div class="col-lg-12 mt-4">
			<div class="card enable-shadow">
				<div class="card-header bg-success">
					<h4 class="text-white text-center card-title">
						<i class="fa fa-info-circle"></i> Selamat Datang, <?= $this->session->userdata('nama') ?>
					</h4>
				</div>
				<div class="card-body">
					<canvas id="myChart" width="100%" height="50%"></canvas>
				</div>
				<div class="card-footer bg-success text-white">
					<?= form_open("",array('id' => 'FrmChart')) ?>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Periode Awal</label>
									<?php
										$data = array(
											'name' => 'periode_awal',
											'type' => 'date',
											'id' => 'periode_awal',
											'class' => 'form-control',
											'required' => 'true',
											'autocomplete' => 'off',
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Periode Akhir</label>
									<?php
										$data = array(
											'name' => 'periode_akhir',
											'type' => 'date',
											'id' => 'periode_awal',
											'class' => 'form-control',
											'required' => 'true',
											'autocomplete' => 'off',
										);
										echo form_input($data);
									?>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<button type="submit" class="btn btn-block btn-secondary">Cari</button>
								</div>
							</div>
						</div>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="row m-0">
			<div class="col-lg-6 mt-4">
				<div class="card bg-success enable-shadow">
					<div class="card-header">
						<h4 class="text-white text-center card-title">
							<i class="fa fa-building"></i>
							Divisi
						</h4>
						<hr />
					</div>
					<div class="card-footer">
						<p class="card-text"><a href="<?= base_url('divisi/dashboard'); ?>" class="btn btn-block btn-secondary">Akses Modul</a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-6 mt-4">
				<div class="card bg-success enable-shadow">
					<div class="card-header">
						<h4 class="text-white text-center card-title">
							<i class="fa fa-suitcase"></i>
							Bidang
						</h4>
						<hr />
					</div>
					<div class="card-footer">
						<p class="card-text"><a href="<?= base_url('bidang/dashboard'); ?>" class="btn btn-block btn-secondary">Akses Modul</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row m-0">
			<div class="col-lg-6 mt-4">
				<div class="card bg-success enable-shadow">
					<div class="card-header">
						<h4 class="text-white text-center card-title">
							<i class="fa fa-money-check"></i>
							Investasi
						</h4>
						<hr />
					</div>
					<div class="card-footer">
						<p class="card-text"><a href="<?= base_url('investasi/dashboard'); ?>" class="btn btn-block btn-secondary">Akses Modul</a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-6 mt-4">
				<div class="card bg-success enable-shadow">
					<div class="card-header">
						<h4 class="text-white text-center card-title">
							<i class="fa fa-cogs"></i>
							Exploitasi
						</h4>
						<hr />
					</div>
					<div class="card-footer">
						<p class="card-text"><a href="<?= base_url('exploitasi/dashboard'); ?>" class="btn btn-block btn-secondary">Akses Modul</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12 mt-4">
			<div class="card bg-success enable-shadow">
				<div class="card-header">
					<h4 class="text-white text-center card-title">
						<i class="fa fa-clock"></i>
						Adendum
					</h4>
					<hr />
				</div>
				<div class="card-footer">
					<p class="card-text"><a href="<?= base_url('adendum/dashboard'); ?>" class="btn btn-block btn-secondary">Akses Modul</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('user/js/js_page_dashboard') ?>