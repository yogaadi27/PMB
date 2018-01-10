<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenjang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('home');
		}
	}

	public function index()
	{
		$d['content']=$this->load->view('admin/jenjang/view','', TRUE);
		$this->load->view('admin/home', $d);
	}

	public function add_jenjang()
	{
		$jenjang=strtoupper($this->input->post('jenjang', TRUE));
		 $t = date("Y-m-d H:i:s");
		$data=array(
			'jenjang'=>$jenjang,
			'created_at'=>$t
			);
		$table='jenjang';
		$result=$this->model_admin->auto_insert($table,$data);
		if ($result) {
			$msg['pesan']='<div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-square-o"></i> Jenjang berhasil  di tambahkan !</div>';
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function show_jenjang()
	{
		$q=$this->model_admin->data_jenjang();
		if ($q) {
			echo json_encode($q);
		}else{
			$msg['pesan'] = '<tr><td colspan="3">Tidak Ada Data</td></tr>';
			echo json_encode($msg);
		}
	}

	public function get_jenjang($id)
	{
		$res=$this->model_admin->ambil_jenjang($id);
		if ($res) {
			echo json_encode($res);
		}else{
			echo json_encode("Gagal");
		}
	}

	public function edit_jenjang()
	{
		$id=$this->input->post('key', TRUE);
		$jenjang=strtoupper($this->input->post('jenjang', TRUE));
		$data=array(
			'jenjang'=>$jenjang
			);
		$result=$this->model_admin->update_jenjang($id,$data);
		if ($result) {
			$msg['success'] = true;
			$msg['pesan'] = '<div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-square-o"></i> Jenjang berhasil  di Update !</div>';
		}
		echo json_encode($msg);
	}

	public function delete_jenjang()
	{
		$id=$this->input->post('id', TRUE);
		$q=$this->model_admin->hapus_jenjang($id);
		if ($q) {
			$msg['success'] = true;
			$msg['pesan'] = '<div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-square-o"></i> Jenjang berhasil  di Hapus !</div>';
		}
		echo json_encode($msg);
	}

}

/* End of file Jenjang.php */
/* Location: ./application/controllers/Jenjang.php */