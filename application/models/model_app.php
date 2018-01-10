<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_app extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_prodi()
	{
		$this->db->select('*');
		$this->db->from('prodi');
		$this->db->join('jenjang', 'jenjang.kode_jenjang = prodi.jenjang_id');
		$query = $this->db->get();
        if ($query) {
        	return $query->result();
        }else{
        	return false;
        }
	}

	public function kode_thak_aktif()
	{
		$query = $this->db->select('thak')
                ->where('status','Aktif')
                ->limit(1)
                ->get('thak');
        return $query->row('thak');
	}

	public function register_siswa($data)
	{
		$query=$this->db->insert('pendaftaran', $data);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function cetak_form($id)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->join('prodi', 'prodi.kode_prodi = pendaftaran.prodi');
		$this->db->join('jenjang', 'jenjang.kode_jenjang = prodi.jenjang_id');
		$this->db->join('thak', 'thak.thak = pendaftaran.thak');
		$this->db->where('pendaftaran.nisn', $id);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function cetak_ver($id)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->join('prodi', 'prodi.kode_prodi = pendaftaran.prodi');
		$this->db->join('jenjang', 'jenjang.kode_jenjang = prodi.jenjang_id');
		$this->db->join('thak', 'thak.thak = pendaftaran.thak');
		$this->db->where('pendaftaran.id_daftar', $id);
		$query = $this->db->get();
		if ($query) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function ambil_prodi($kode_prodi)
	{
		$query = $this->db->get_where('prodi', array('kode_prodi' => $kode_prodi));
        if ($query) {
        	return $query->row();
        }else{
        	return false;
        }
	}

	public function get_siswa_prodi($kode_prodi,$thak)
	{
		$data = array('prodi' => $kode_prodi, 'thak' => $thak,'input_tes_tgl != '=> 0,'nilai_tes !='=> 0 );
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where($data);
		$this->db->order_by('nilai_tes', 'DESC');
		$query = $this->db->get();
        if ($query->num_rows() > 0) {
        	return $query->result();
        }else{
        	return false;
        }
	}

	public function get_limit($kode)
	{
		$query = $this->db->get_where('prodi', array('kode_prodi' => $kode),1);
		return $query->row('kuota');
	}

	// public function set_lulus($filter,$limit)
	// {
	// 	$data = array(
	// 			        'status' => 'lulus'
	// 			);
	// 	$this->db->where($filter);
	// 	$this->db->order_by('nilai_tes', 'DESC');
	// 	$this->db->limit($limit);
	// 	$this->db->update('pendaftaran',$data);
	// 	return true;
	// }

	public function report($filter,$limit)
	{
		$query = $this->db->select('*')
                ->where($filter)
                ->order_by('nilai_tes', 'DESC')
                ->limit($limit)
                ->get('pendaftaran');
        return $query->result();
	}

	public function tambah_info($data)
	{
		$this->db->insert('informasi',$data);
		return true;
	}

	public function get_all_info($kode_thak)
	{
		$query = $this->db->select('*')
                ->where('thak', $kode_thak)
                ->order_by('created_at','DESC')
                ->get('informasi');
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function ambil_info($id)
	{
		$query = $this->db->get_where('informasi', array('id_info' => $id));
		if ($query) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function ubah_info($id,$data)
	{
		$this->db->update('informasi', $data, array('id_info' => $id));
		return true;
	}

	public function hapus_info($id)
	{
		$result = $this->db->delete('informasi', array('id_info' => $id)); 
		if ($result) {
			return true;
		}else{
			return false;
		}
	}

	public function siswa_lulus($array,$limit)
	{
		
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where($array);
		$this->db->order_by('nilai_tes DESC,nama_pendaftar ASC');
		$this->db->limit($limit);
		$query = $this->db->get();

		// $this->db->select('*');
		// $this->db->from('pendaftaran');
		// $this->db->join('prodi', 'prodi.kode_prodi = pendaftaran.prodi');
		// $this->db->join('jenjang', 'kode_jenjang. = prodi.jenjang_id');
		// $this->db->where($array);
		
		// $query = $this->db->get();
		return $query->result();
	}

	public function detail_lulus_prodi($kode)
	{
		$this->db->select('kode_prodi,nama_prodi,jenjang,kuota');
		$this->db->from('prodi');
		$this->db->join('jenjang', 'jenjang.kode_jenjang = prodi.jenjang_id');
		$this->db->where('prodi.kode_prodi',$kode);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	
	public function do_verifikasi($data,$id)
	{
		$this->db->update('pendaftaran', $data, array('id_daftar' => $id));
		return true;
	}
}

/* End of file model_app.php */
/* Location: ./application/models/model_app.php */