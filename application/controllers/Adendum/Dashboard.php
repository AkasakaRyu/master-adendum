<?php
class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$level = $this->session->userdata('level');
			if($level=="Master") {
				$this->load->model('Adendum/M_Dashboard','m');
			}
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Adendum";
		$data["Konten"] = "adendum/v_dashboard";
		$this->load->view("v_master",$data);
	}

	public function list_data() {
		$list = $this->m->get_list_data();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			if(!empty($data->investasi_id)) {
				$id = $data->investasi_id;
			} else {
				$id = $data->exploitasi_id;
			}
			$row = array();
			$row[] = $id;
			$row[] = $data->adendum_pr_number;
			$row[] = $data->adendum_po_number;
			$row[] = $data->adendum_no_kontrak;
			$row[] = "Rp. ".number_format($data->adendum_nilai_pekerjaan,2,",",".");
			$row[] = $data->adendum_selesai_pekerjaan;
			$row[] = $data->adendum_tanggal_jaminan_pelaksanaan;
			$row[] = "<button id='detail' class='btn btn-sm btn-info' data='".$data->adendum_id."'>Detail</button> | 
			<button id='edit' class='btn btn-sm btn-warning' data='".$data->adendum_id."'>Edit</button> | 
			<button id='hapus' class='btn btn-sm btn-danger' data='".$data->adendum_id."'>Delete</button>";
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
		if(empty($res->exploitasi_id)) {
			$exp_inv = $res->investasi_id;
		} else {
			$exp_inv = $res->exploitasi_id;
		}
		$data = array(
			'adendum_id' => $res->adendum_id,
			'exp_inv' => $exp_inv,
			'adendum_pr_number' => $res->adendum_pr_number,
			'adendum_po_number' => $res->adendum_po_number,
			'adendum_no_kontrak' => $res->adendum_no_kontrak,
			'adendum_nilai_pekerjaan' => $res->adendum_nilai_pekerjaan,
			'adendum_tanggal_jaminan_pelaksanaan' => $res->adendum_tanggal_jaminan_pelaksanaan,
			'adendum_selesai_pekerjaan' => $res->adendum_selesai_pekerjaan,
		);
		echo json_encode($data);
	}

	public function simpan() {
		$adendum_id = $this->input->post('adendum_id');
		$check_po = $this->m->check_po();
		$check_pr = $this->m->check_pr();
		$check_kontrak = $this->m->check_kontrak();
		if($check_po AND $check_pr AND $check_kontrak) {
			if($adendum_id=="") {
				$data = array(
					'adendum_id' => $this->m->get_id(),
					'investasi_id' => $this->input->post('investasi_id'),
					'exploitasi_id' => $this->input->post('exploitasi_id'),
					'adendum_pr_number' => $this->input->post('adendum_pr_number'),
					'adendum_po_number' => $this->input->post('adendum_po_number'),
					'adendum_no_kontrak' => $this->input->post('adendum_no_kontrak'),
					'adendum_nilai_pekerjaan' => $this->input->post('adendum_nilai_pekerjaan'),
					'adendum_selesai_pekerjaan' => $this->input->post('adendum_selesai_pekerjaan'),
					'adendum_tanggal_jaminan_pelaksanaan' => $this->input->post('adendum_tanggal_jaminan_pelaksanaan')
				);
				$res = $this->m->simpan($data);
				$pesan = array(
					'warning' => 'Berhasil!',
					'kode' => 'success',
					'pesan' => 'Data adendum '.$this->input->post('adendum_id').' berhasil di simpan'
				);
			} else {
				$data = array( 
					'adendum_pr_number' => $this->input->post('adendum_pr_number'),
					'adendum_po_number' => $this->input->post('adendum_po_number'),
					'adendum_no_kontrak' => $this->input->post('adendum_no_kontrak'),
					'adendum_nilai_pekerjaan' => $this->input->post('adendum_nilai_pekerjaan'),
					'adendum_selesai_pekerjaan' => $this->input->post('adendum_selesai_pekerjaan'),
					'adendum_tanggal_jaminan_pelaksanaan' => $this->input->post('adendum_tanggal_jaminan_pelaksanaan')
				);
				$res = $this->m->edit($data);
				$pesan = array(
					'warning' => 'Berhasil!',
					'kode' => 'success',
					'pesan' => 'Data adendum '.$this->input->post('adendum_id').' berhasil di perbaharui'
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
			'pesan' => 'Data adendum berhasil di hapus'
		);
		echo json_encode($pesan);
	}

	public function options() {
		$res = $this->m->options();
		echo json_encode($res);
	}

}