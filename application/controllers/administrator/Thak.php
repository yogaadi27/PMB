<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('home');
		}

	}

	public function index()
	{
		$d['thak_aktif']=$this->model_admin->ambil_thak_aktif();
		$d['content']=$this->load->view('admin/thak/view',$d, TRUE);
		$this->load->view('admin/home', $d);
	}

	public function add_thak()
	{
		
		$thak=$this->input->post('thak', TRUE);
		$cek=$this->cek_thak($thak);
		$msg['success']=false;
		if ($cek) {
			$thajar=$this->input->post('tajar', TRUE);
			$status="Nonaktif";
			$ket="Ditutup";
			$t = date("Y-m-d H:i:s");
			$data=array(
				'thak'=>$thak,
				'tahun_ajaran'=>$thajar,
				'status'=>$status,
				'ket'=>$ket,
				'created_at'=>$t
				);
			$table='thak';
			$q=$this->model_admin->auto_insert($table,$data);
			if ($q) {
				$msg['pesan']='<div class="alert alert-success" role="alert">Tahun Akademik berhasil  di tambahkan !</div>';
				$msg['success'] = true;
			}
		}else{
			$msg['pesan']='<div class="alert alert-danger" role="alert">Maaf,Tahun Akademik sudah ada !</div>';
		}
		echo json_encode($msg);
	}

	private function cek_thak($thak)
	{
		$cek = $this->model_cek->cek_thak($thak);
		if ($cek) {
			return true;
		}else{
			return false;
		}
	}

	public function show_thak()
	{
		$q=$this->model_admin->show_all_thak();
		if ($q) {
			echo json_encode($q);
		}else{
			$msg['pesan'] = '<tr><td colspan="7">Tidak Ada Data Tahun Akademik yang lain..!</td></tr>';
			echo json_encode($msg);
		}
	}

	public function delete_thak()
	{
		$thak=$this->input->post('id', TRUE);
		$q=$this->model_admin->hapus_thak($thak);
		if ($q) {
			$msg['success'] = true;
			$msg['pesan'] = '<div class="alert alert-success" role="alert">Tahun Akademik berhasil  di Hapus !</div>';
		}
		echo json_encode($msg);
	}

	public function close_reg()
	{
		$id=$this->input->post('id', TRUE);
		$data=array(
			'ket'=>'Ditutup'
			);
		$result=$this->model_admin->tutup_reg($id,$data);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	public function open_reg()
	{
		$id=$this->input->post('id', TRUE);
		$data=array(
			'ket'=>'Dibuka'
			);
		$result=$this->model_admin->open_reg($id,$data);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	public function change_thak()
	{
		$thak=$this->input->post('id', TRUE);
		$result=$this->model_admin->ubah_thak($thak);
		if ($result) {
			$msg['success'] = true;
		}else{
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

}

/* End of file Thak.php */
/* Location: ./application/controllers/Thak.php */