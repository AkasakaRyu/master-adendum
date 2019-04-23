<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Dashboard extends CI_Model {

	protected $investasi = "ak_data_investasi";
	protected $bidang = "ak_data_bidang";
	protected $divisi = "ak_data_divisi";
	
	public function get_list_data() {
		return $this->db->where(
			$this->investasi.'.deleted',false
		)->join(
			$this->bidang,
			$this->bidang.'.bidang_id='.
			$this->investasi.'.bidang_id'
		)->join(
			$this->divisi,
			$this->divisi.'.divisi_id='.
			$this->investasi.'.divisi_id'
		)->get($this->investasi)->result();
	}

	public function get_data() {
		return $this->db->where(
			'investasi_id',$this->input->post('investasi_id')
		)->get($this->investasi)->row();
	}

	public function get_id() {
		$res = $this->db->get($this->investasi)->num_rows();
		return "INV".date('ymd').str_pad($res+1, 4, "0", STR_PAD_LEFT);
	}

	public function check_pr() {
		$data = $this->db->where(
			'investasi_pr_number',$this->input->post('investasi_pr_number')
		)->get($this->investasi)->num_rows();
		if($data==0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function check_po() {
		$data = $this->db->where(
			'investasi_po_number',$this->input->post('investasi_po_number')
		)->get($this->investasi)->num_rows();
		if($data==0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function check_kontrak() {
		$data = $this->db->where(
			'investasi_no_kontrak',$this->input->post('investasi_no_kontrak')
		)->get($this->investasi)->num_rows();
		if($data==0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function simpan($data) { return $this->db->insert($this->investasi,$data); }

	public function edit($data) {
		return $this->db->where(
			'investasi_id', $this->input->post('investasi_id')
		)->update($this->investasi,$data);
	}

	public function hapus($data) {
		return $this->db->where(
			'investasi_id', $this->input->post('investasi_id')
		)->update($this->investasi,$data);
	}

	public function options() {
		$res = $this->db->select(
			"investasi_id as id,investasi_id as value,investasi_nama as text"
		)->where(
			'deleted', FALSE
		)->get($this->investasi)->result();
		return $res;
	}

}