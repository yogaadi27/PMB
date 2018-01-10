<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_cek extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek_thak($thak)
	{
		$query = $this->db->get_where('thak', array('thak' => $thak));
		if ($query->num_rows() == 0) {
			return true;
		}else{
			return false;
		}
	}

	public function cek_prodi($kode)
	{
		$query = $this->db->get_where('prodi', array('kode_prodi' => $kode));
		if ($query->num_rows() == 0) {
			return true;
		}else{
			return false;
		}
	}

	public function cek_reg()
	{
		$this->db->select('ket');
		$this->db->from('thak');
		$this->db->where('status', 'Aktif');
		return $this->db->get()->row('ket');
	}

	public function cek_nisn($nisn)
	{
		$query = $this->db->get_where('pendaftaran', array('nisn' => $nisn));
		if ($query->num_rows() == 0) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file model_cek.php */
/* Location: ./application/models/model_cek.php */