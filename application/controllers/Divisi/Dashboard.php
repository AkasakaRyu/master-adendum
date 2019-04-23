<?php
class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$isLogin = $this->session->userdata('LoggedIn');
		if($isLogin) {
			$level = $this->session->userdata('level');
			if($level=="Master") {
				$this->load->model('Divisi/M_Dashboard','m');
			}
		} else {
			redirect('portal');
		}
	}

	public function index() {
		$data["Title"] = "Divisi";
		$data["Konten"] = "divisi/v_dashboard";
		$this->load->view("v_master",$data);
	}

	public function list_data() {
		$list = $this->m->get_list_data();
		$datatb = array();
		$no = 0;
		foreach($list as $data) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $data->divisi_nama;
			$row[] = "<button id='edit' data='".$data->divisi_id."' class='btn btn-xs btn-warning'><i class='fa fa-pencil-alt'></i></button> | 
			<button id='hapus' class='btn btn-xs btn-danger' data='".$data->divisi_id."'><i class='fa fa-trash-alt'></i></a>";
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
			'divisi_id' => $res->divisi_id,
			'divisi_nama' => $res->divisi_nama
		);
		echo json_encode($data);
	}

	public function simpan() {
		$divisi_id = $this->input->post('divisi_id');
		if($divisi_id=="") {
			$data = array(
				'divisi_id' => $this->m->get_id(),
				'divisi_nama' => $this->input->post('divisi_nama')
			);
			$res = $this->m->simpan($data);
			$pesan = array(
				'warning' => 'Berhasil!',
				'kode' => 'success',
				'pesan' => 'Data divisi '.$this->input->post('divisi_nama').' berhasil di simpan'
			);
		} else {
			$data = array( 
				'divisi_nama' => $this->input->post('divisi_nama')
			);
			$res = $this->m->edit($data);
			$pesan = array(
				'warning' => 'Berhasil!',
				'kode' => 'success',
				'pesan' => 'Data divisi '.$this->input->post('divisi_nama').' berhasil di perbaharui'
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
			'pesan' => 'Data divisi berhasil di hapus'
		);
		echo json_encode($pesan);
	}

	public function options() {
		$res = $this->m->options();
		echo json_encode($res);
	}

}