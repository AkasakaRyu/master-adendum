<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Dashboard extends CI_Model {

	protected $bidang = "ak_data_bidang";
	
	public function get_list_data() {
		return $this->db->where(
			$this->bidang.'.deleted',false
		)->get($this->bidang)->result();
	}

	public function get_data() {
		return $this->db->where(
			'bidang_id',$this->input->post('bidang_id')
		)->get($this->bidang)->row();
	}

	public function get_id() {
		$res = $this->db->get($this->bidang)->num_rows();
		return "DEPT".date('ymd').str_pad($res+1, 4, "0", STR_PAD_LEFT);
	}

	public function simpan($data) { return $this->db->insert($this->bidang,$data); }

	public function edit($data) {
		return $this->db->where(
			'bidang_id', $this->input->post('bidang_id')
		)->update($this->bidang,$data);
	}

	public function hapus($data) {
		return $this->db->where(
			'bidang_id', $this->input->post('bidang_id')
		)->update($this->bidang,$data);
	}

	public function options() {
		$res = $this->db->select(
			"bidang_id as id,bidang_id as value,bidang_nama as text"
		)->where(
			'deleted', FALSE
		)->get($this->bidang)->result();
		return $res;
	}

}