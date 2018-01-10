<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prodi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('home');
		}
	}

	public function index()
	{
		$d['jenjang']=$this->model_admin->data_jenjang();
		$d['content']=$this->load->view('admin/prodi/view', $d, TRUE);
		$this->load->view('admin/home', $d);
	}

	public function add_prodi()
	{
		$kode_prodi=strtoupper($this->input->post('kode_prodi', TRUE));
		$cek=$this->cek_prodi($kode_prodi);

		if ($cek) {
			$prodi=strtoupper($this->input->post('prodi', TRUE));
			$kuota=$this->input->post('kuota', TRUE);
			$jenjang=$this->input->post('jenjang', TRUE);
			$t = date("Y-m-d H:i:s");
			$data=array(
				'kode_prodi'=>$kode_prodi,
				'nama_prodi'=>$prodi,
				'jenjang_id'=>$jenjang,
				'kuota'=>$kuota,
				'created_at'=>$t
				);
			$table='prodi';
			
			$q=$this->model_admin->auto_insert($table,$data);
			if ($q) {
				$msg['pesan']='<div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-square-o"></i> Prodi berhasil  di tambahkan !</div>';
				$msg['success'] = true;
			}
		}else{
			$msg['success'] = false;
			$msg['pesan']='<div class="alert alert-danger" role="alert"><i class="fa fa-fw fa-times"></i> Kode Prodi sudah digunakan , Harap coba yang lain !</div>';
		}

		echo json_encode($msg);
	}

	private function cek_prodi($kode_prodi)
	{
		$cek=$this->model_cek->cek_prodi($kode_prodi);
		if ($cek) {
			return true;
		}else{
			return false;
		}
	}

	public function show_prodi()
	{
		$result=$this->model_admin->get_prodi();
		if ($result) {
			echo json_encode($result);
		}else{
			$msg['pesan'] = '<tr><td colspan="3">Tidak Ada Data</td></tr>';
			echo json_encode($msg);
		}
	}

	public function get_prodi($id)
	{
		$res=$this->model_admin->ambil_prodi($id);
		if ($res) {
			echo json_encode($res);
		}else{
			echo json_encode("Gagal");
		}
	}

	public function update_prodi()
	{
		$prodi=strtoupper($this->input->post('prodi', TRUE));
		$kuota=$this->input->post('kuota', TRUE);
		$jenjang=$this->input->post('jenjang', TRUE);
		$id=$this->input->post('kode_prodi', TRUE);

		$data=array(
			'nama_prodi'=>$prodi,
			'jenjang_id'=>$jenjang,
			'kuota'=>$kuota,
			);
		$result=$this->model_admin->ubah_prodi($id,$data);
		if ($result) {
			$msg['success'] = true;
			$msg['pesan'] = '<div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-square-o"></i> Prodi berhasil  di Update !</div>';
		}
		echo json_encode($msg);
	}

	public function delete_prodi()
	{
		$id=$this->input->post('id', TRUE);
		$q=$this->model_admin->hapus_prodi($id);
		if ($q) {
			$msg['success'] = true;
			$msg['pesan'] = '<div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-square-o"></i> Prodi berhasil  di Hapus !</div>';
		}
		echo json_encode($msg);
	}

}

/* End of file Prodi.php */
/* Location: ./application/controllers/Prodi.php */