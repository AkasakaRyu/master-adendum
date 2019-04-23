<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Dashboard extends CI_Model {

	protected $divisi = "ak_data_divisi";
	
	public function get_list_data() {
		return $this->db->where(
			$this->divisi.'.deleted',false
		)->get($this->divisi)->result();
	}

	public function get_data() {
		return $this->db->where(
			'divisi_id',$this->input->post('divisi_id')
		)->get($this->divisi)->row();
	}

	public function get_id() {
		$res = $this->db->get($this->divisi)->num_rows();
		return "DEPT".date('ymd').str_pad($res+1, 4, "0", STR_PAD_LEFT);
	}

	public function simpan($data) { return $this->db->insert($this->divisi,$data); }

	public function edit($data) {
		return $this->db->where(
			'divisi_id', $this->input->post('divisi_id')
		)->update($this->divisi,$data);
	}

	public function hapus($data) {
		return $this->db->where(
			'divisi_id', $this->input->post('divisi_id')
		)->update($this->divisi,$data);
	}

	public function options() {
		$res = $this->db->select(
			"divisi_id as id,divisi_id as value,divisi_nama as text"
		)->where(
			'deleted', FALSE
		)->get($this->divisi)->result();
		return $res;
	}

}