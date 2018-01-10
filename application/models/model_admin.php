<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_admin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	// ---------------auth model-----------------------------//
	public function cek_login($us,$pw)
	{
		$this->db->select('password');
		$this->db->from('admin');
		$this->db->where('username', $us);
		$hash = $this->db->get()->row('password');

		$cek=$this->verify_password_hash($pw, $hash);
		if ($cek) {
			$query = $this->db->select('id_admin,username,fullname')
			                ->where('username', $us)
			                ->limit(1)
			                ->get('admin');
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function change_password($id,$data)
	{
		$this->db->update('admin', $data, array('id_admin' => $id));
		return true;
	}

	private function verify_password_hash($pw, $hash)
	{
		return password_verify($pw,$hash);
	}

	public function auto_insert($table,$data)
	{
		$this->db->insert($table, $data);
		return true;
	}

	//--------------------------model thak----------------------------------//
	public function ambil_thak_aktif()
	{
		$query = $this->db->get_where('thak', array('status' => 'Aktif'),1);
		if ($query) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function tutup_reg($id,$data)
	{
		$q=$this->db->update('thak', $data, array('thak' => $id,'status'=>'Aktif'));
		if ($q) {
			return true;
		}else{
			return false;
		}
	}

	public function open_reg($id,$data)
	{
		$q=$this->db->update('thak', $data, array('thak' => $id,'status'=>'Aktif'));
		if ($q) {
			return true;
		}else{
			return false;
		}
	}

	public function ubah_thak($thak)
	{
		$ubah_nonaktif=$this->change_nonaktif();
		if ($ubah_nonaktif) {
			$data=array(
			'status'=>'Aktif'
				);
			$q=$this->db->update('thak', $data, array('thak' => $thak));
			if ($q) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	private function change_nonaktif()
	{
		$data=array(
			'status'=>'Nonaktif'
			);
		$q=$this->db->update('thak', $data, array('status' => 'Aktif'));
		if ($q) {
			return true;
		}else{
			return false;
		}
	}

	public function show_all_thak()
	{
		$query = $this->db->select('*')
				->order_by('thak', 'DESC')
				->where('status', 'Nonaktif')
                ->get('thak');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function hapus_thak($thak)
	{
		// $result = $this->db->delete('thak', array('thak' => $id)); 
		// if ($result) {
		// 	return true;
		// }else{
		// 	return false;
		// }
		$temp_ids = array();
	    $delete_ids = array();
	    $errors = array();
	    // $query = $this->db->get('poto');
	    $query = $this->db->select('id_daftar,foto')
                ->where('thak', $thak)
                ->get('pendaftaran');
	    if($query->num_rows()>0)
	    {
	      foreach($query->result() as $row)
	      {
	        $temp_ids[$row->id_daftar] = $row->foto;
	      }
	      // print_r($temp_ids);
	    }

	    foreach($temp_ids as $id=>$file)
	    {
	      $path_file = 'photo/'.$file;
	      if(unlink($path_file))
	      {
	        $delete_ids[] = $id;
	      }
	      else
	      {
	        $errors[] = 'Couldn\'t delete file '.$file;
	      }
	    }
    		$tables = array('pendaftaran', 'agenda_tes', 'informasi','thak');
			$this->db->where('thak',$thak);
			$this->db->delete($tables);
		    if(sizeof($errors)>0)
		    {
		      return $errors;
		    }
		    return true;
	}

	public function data_jenjang()
	{
		$query = $this->db->select('*')
				->order_by('created_at', 'DESC')
                ->get('jenjang');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function ambil_jenjang($id)
	{
		$query = $this->db->get_where('jenjang', array('kode_jenjang' => $id));
		if ($query) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function update_jenjang($id,$data)
	{
		$query = $this->db->update('jenjang', $data, array('kode_jenjang' => $id));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function hapus_jenjang($id)
	{
		$result = $this->db->delete('jenjang', array('kode_jenjang' => $id)); 
		if ($result) {
			return true;
		}else{
			return false;
		}
	}

	public function get_prodi()
	{
		$this->db->select('kode_prodi,nama_prodi,jenjang,kuota');
		$this->db->from('prodi');
		$this->db->join('jenjang', 'jenjang.kode_jenjang = prodi.jenjang_id');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function ambil_prodi($id)
	{
		$query = $this->db->get_where('prodi', array('kode_prodi' => $id));
		if ($query) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function ubah_prodi($id,$data)
	{
		$query = $this->db->update('prodi', $data, array('kode_prodi' => $id));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function hapus_prodi($id)
	{
		$result = $this->db->delete('prodi', array('kode_prodi' => $id)); 
		if ($result) {
			return true;
		}else{
			return false;
		}
	}

	public function get_all_tes($kode_thak)
	{
		$query = $this->db->get_where('agenda_tes', array('thak' => $kode_thak));
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function ambil_tes($id)
	{
		$query = $this->db->get_where('agenda_tes', array('id' => $id));
		if ($query) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function update_tes($id,$data)
	{
		$query = $this->db->update('agenda_tes', $data, array('id' => $id));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function hapus_tes($id)
	{
		$result = $this->db->delete('agenda_tes', array('id' => $id)); 
		if ($result) {
			return true;
		}else{
			return false;
		}
	}

	public function get_all_siswa($kode_thak)
	{
		$this->db->select('id_daftar,nama_pendaftar,nisn,sekolah,nama_prodi,jenjang,nilai_tes,input_tes_tgl,fc_ijazah,fc_skhu,verifikasi_tgl');
		$this->db->from('pendaftaran');
		$this->db->join('prodi', 'prodi.kode_prodi = pendaftaran.prodi');
		$this->db->join('jenjang', 'jenjang.kode_jenjang = prodi.jenjang_id');
		$this->db->where('pendaftaran.thak', $kode_thak);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function get_detail_siswa($id)
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->join('prodi', 'prodi.kode_prodi = pendaftaran.prodi');
		$this->db->join('jenjang', 'jenjang.kode_jenjang = prodi.jenjang_id');
		$this->db->where('pendaftaran.id_daftar', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function del_siswa($id)
	{
		 $this->db->where('id_daftar',$id);
	     $query = $this->db->get('pendaftaran');
	     $row = $query->row();

	     unlink("./photo/$row->foto");

	     $this->db->delete('pendaftaran', array('id_daftar' => $id));
	     return true;
	}

	public function get_data_tes($id)
	{
		$this->db->select('id_daftar,nama_pendaftar,sekolah,nilai_un,nilai_tes,foto');
		$this->db->from('pendaftaran');
		$this->db->where('pendaftaran.id_daftar', $id);
		$query = $this->db->get();
		if ($query){
			return $query->row();
		}else{
			return false;
		}
	}

	public function input_tes($id,$data)
	{
		$query=$this->db->update('pendaftaran', $data, array('id_daftar' => $id));
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file model_admin.php */
/* Location: ./application/models/model_admin.php */