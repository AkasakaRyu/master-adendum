<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Dashboard extends CI_Model {

	protected $adendum = "ak_data_adendum";
	
	public function get_list_data() {
		return $this->db->where(
			$this->adendum.'.deleted',false
		)->get($this->adendum)->result();
	}

	public function get_data() {
		return $this->db->where(
			'adendum_id',$this->input->post('adendum_id')
		)->get($this->adendum)->row();
	}

	public function get_id() {
		$res = $this->db->get($this->adendum)->num_rows();
		return "ADEN".date('ymd').str_pad($res+1, 4, "0", STR_PAD_LEFT);
	}

	public function check_pr() {
		$data = $this->db->where(
			'adendum_pr_number',$this->input->post('adendum_pr_number')
		)->get($this->adendum)->num_rows();
		if($data==0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function check_po() {
		$data = $this->db->where(
			'adendum_po_number',$this->input->post('adendum_po_number')
		)->get($this->adendum)->num_rows();
		if($data==0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function check_kontrak() {
		$data = $this->db->where(
			'adendum_no_kontrak',$this->input->post('adendum_no_kontrak')
		)->get($this->adendum)->num_rows();
		if($data==0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function simpan($data) { return $this->db->insert($this->adendum,$data); }

	public function edit($data) {
		return $this->db->where(
			'adendum_id', $this->input->post('adendum_id')
		)->update($this->adendum,$data);
	}

	public function hapus($data) {
		return $this->db->where(
			'adendum_id', $this->input->post('adendum_id')
		)->update($this->adendum,$data);
	}

	public function options() {
		$res = $this->db->select(
			"adendum_id as id,adendum_id as value,adendum_nama as text"
		)->where(
			'deleted', FALSE
		)->get($this->adendum)->result();
		return $res;
	}

}