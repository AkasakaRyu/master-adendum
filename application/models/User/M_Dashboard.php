<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_Dashboard extends CI_Model {

	protected $adendum = "ak_data_adendum";

	public function get_adendum_data() {
		if(!empty($this->input->post('periode_awal'))) {
			$data = $this->db->where(
				'adendum_tanggal_jaminan_pelaksanaan>=',
				$this->input->post('periode_awal')
			)->where(
				'adendum_tanggal_jaminan_pelaksanaan<=',
				$this->input->post('periode_akhir')
			)->get($this->adendum)->result();
			$alpha = array();
			$beta = array();
			$charlie = array();
			$delta = array();
			foreach($data as $x) {
				$earlier = new DateTime(date('Y-m-d'));
				$later = new DateTime($x->adendum_selesai_pekerjaan);
				$diff = $later->diff($earlier)->format("%a");
				if($diff<14) {
					$alpha[] = array('ok');
				} elseif($diff>=14 AND $diff<30) {
					$beta[] = array('ok');
				} elseif($diff>=30 AND $diff<365) {
					$charlie[] = array('ok');
				} else {
					$delta[] = array('ok');
				}
			}
			return array(
				'seminggu' => count($alpha),
				'duaminggu' => count($beta),
				'sebulan' => count($charlie),
				'melewati' => count($delta)
			);
		} else {
			$data = $this->db->get($this->adendum)->result();
			$alpha = array();
			$beta = array();
			$charlie = array();
			$delta = array();
			foreach($data as $x) {
				$earlier = new DateTime(date('Y-m-d'));
				$later = new DateTime($x->adendum_selesai_pekerjaan);
				$diff = $later->diff($earlier)->format("%a");
				if($diff<14) {
					$alpha[] = array('ok');
				} elseif($diff>=14 AND $diff<30) {
					$beta[] = array('ok');
				} elseif($diff>=30) {
					$charlie[] = array('ok');
				} else {
					$delta[] = array('ok');
				}
			}
			return array(
				'seminggu' => count($alpha),
				'duaminggu' => count($beta),
				'sebulan' => count($charlie),
				'melewati' => count($delta)
			);
		}
	}

}