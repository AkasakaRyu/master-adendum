<?php
class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$level = $this->session->userdata('level');
			if($level=="Master") {
				$this->load->model('Investasi/M_Dashboard','m');
			}
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Investasi";
		$data["Konten"] = "investasi/v_dashboard";
		$this->load->view("v_master",$data);
	}

	public function list_data() {
		$list = $this->m->get_list_data();
		$datatb = array();
		foreach($list as $data) {
			$earlier = new DateTime(date('Y-m-d'));
			$later = new DateTime($data->investasi_selesai_pekerjaan);
			$diff = $later->diff($earlier)->format("%a");
			if($diff<14 AND $later>$earlier) {
				$indikator = '<span class="badge badge-success">'.$data->investasi_mulai_pelaksanaan.'</span>';
			} elseif($diff>=14 AND $diff<30 AND $later>$earlier) {
				$indikator = '<span class="badge badge-warning">'.$data->investasi_mulai_pelaksanaan.'</span>';
			} elseif($diff>=30 AND $later>$earlier) {
				$indikator = '<span class="badge badge-danger">'.$data->investasi_mulai_pelaksanaan.'</span>';
			} else {
				$indikator = '<span class="badge badge-primary" style="background:purple">'.$data->investasi_mulai_pelaksanaan.'</span>';
			}
			$row = array();
			$row[] = $data->investasi_po_number;
			$row[] = $data->bidang_nama;
			$row[] = $data->investasi_no_kontrak;
			$row[] = $data->investasi_uraian_pekerjaan;
			$row[] = $data->divisi_nama;
			$row[] = "Rp. ".number_format($data->investasi_nilai_pekerjaan,2,",",".");
			$row[] = $indikator;
			$row[] = "<button id='detail' data='".$data->investasi_id."' class='btn btn-sm btn-info'>Detail</i></button> | 
			<button id='edit' data='".$data->investasi_id."' class='btn btn-sm btn-warning'>Edit</i></button> | 
			<button id='hapus' class='btn btn-sm btn-danger' data='".$data->investasi_id."'>Delete</button> | 
			<button id='adendum' class='btn btn-sm btn-primary' data='".$data->investasi_id."'>Adendum</button>";
			$datatb[] = $row;
		}
		$output = array(
			"draw" => $this->input->post('draw'),
			"data" => $datatb
		);
		echo json_encode($output);
	}

	public function get_data() {
		$res = $this->m->get_data();
		$data = array(
			'investasi_id' => $res->investasi_id,
			'divisi_id' => $res->divisi_id,
			'bidang_id' => $res->bidang_id,
			'investasi_pr_number' => $res->investasi_pr_number,
			'investasi_po_number' => $res->investasi_po_number,
			'investasi_uraian_pekerjaan' => $res->investasi_uraian_pekerjaan,
			'investasi_no_kontrak' => $res->investasi_no_kontrak,
			'investasi_nilai_pekerjaan' => $res->investasi_nilai_pekerjaan,
			'investasi_mulai_pelaksanaan' => $res->investasi_mulai_pelaksanaan,
			'investasi_selesai_pekerjaan' => $res->investasi_selesai_pekerjaan,
			'investasi_tanggal_jaminan_pelaksanaan' => $res->investasi_tanggal_jaminan_pelaksanaan
		);
		echo json_encode($data);
	}

	public function simpan() {
		$investasi_id = $this->input->post('investasi_id');
		$check_po = $this->m->check_po();
		$check_pr = $this->m->check_pr();
		$check_kontrak = $this->m->check_kontrak();
		if($check_po AND $check_pr AND $check_kontrak) {
			if($investasi_id=="") {
				$data = array(
					'investasi_id' => $this->m->get_id(),
					'divisi_id' => $this->input->post('divisi_id'),
					'bidang_id' => $this->input->post('bidang_id'),
					'investasi_pr_number' => $this->input->post('investasi_pr_number'),
					'investasi_po_number' => $this->input->post('investasi_po_number'),
					'investasi_uraian_pekerjaan' => $this->input->post('investasi_uraian_pekerjaan'),
					'investasi_no_kontrak' => $this->input->post('investasi_no_kontrak'),
					'investasi_nilai_pekerjaan' => $this->input->post('investasi_nilai_pekerjaan'),
					'investasi_mulai_pelaksanaan' => $this->input->post('investasi_mulai_pelaksanaan'),
					'investasi_selesai_pekerjaan' => $this->input->post('investasi_selesai_pekerjaan'),
					'investasi_tanggal_jaminan_pelaksanaan' => $this->input->post('investasi_tanggal_jaminan_pelaksanaan')
				);
				$res = $this->m->simpan($data);
				$pesan = array(
					'warning' => 'Berhasil!',
					'kode' => 'success',
					'pesan' => 'Data investasi '.$this->input->post('investasi_uraian_pekerjaan').' berhasil di simpan'
				);
			} else {
				$data = array( 
					'divisi_id' => $this->input->post('divisi_id'),
					'bidang_id' => $this->input->post('bidang_id'),
					'investasi_pr_number' => $this->input->post('investasi_pr_number'),
					'investasi_po_number' => $this->input->post('investasi_po_number'),
					'investasi_uraian_pekerjaan' => $this->input->post('investasi_uraian_pekerjaan'),
					'investasi_no_kontrak' => $this->input->post('investasi_no_kontrak'),
					'investasi_nilai_pekerjaan' => $this->input->post('investasi_nilai_pekerjaan'),
					'investasi_mulai_pelaksanaan' => $this->input->post('investasi_mulai_pelaksanaan'),
					'investasi_selesai_pekerjaan' => $this->input->post('investasi_selesai_pekerjaan'),
					'investasi_tanggal_jaminan_pelaksanaan' => $this->input->post('investasi_tanggal_jaminan_pelaksanaan')
				);
				$res = $this->m->edit($data);
				$pesan = array(
					'warning' => 'Berhasil!',
					'kode' => 'success',
					'pesan' => 'Data investasi '.$this->input->post('investasi_uraian_pekerjaan').' berhasil di perbaharui'
				);
			}
		} else {
			$pesan = array(
				'warning' => 'Terjadi Kesalahan!!',
				'kode' => 'error',
				'pesan' => 'Nomor PO, PR dan Kontrak harus unik!'
			);
		}
		echo json_encode($pesan);
	}

	public function hapus() {
		$data = array( 'deleted' => TRUE );
		$this->m->hapus($data);
		$pesan = array(
			'warning' => 'Berhasil!',
			'kode' => 'success',
			'pesan' => 'Data investasi berhasil di hapus'
		);
		echo json_encode($pesan);
	}

	public function options() {
		$res = $this->m->options();
		echo json_encode($res);
	}

}