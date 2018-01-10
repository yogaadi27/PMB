<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('home');
		}
	}

	public function index()
	{
		$d['content']=$this->load->view('admin/main/view','', true);
		$this->load->view('admin/home',$d);
	}

	public function add_info()
	{
		$info=$this->input->post('info', TRUE);
		$thak=$this->model_app->kode_thak_aktif();
		$t = date("Y-m-d H:i:s");
		$data=array(
			'thak'=>$thak,
			'info'=>$info,
			'created_at'=>$t
			);
		$result=$this->model_app->tambah_info($data);
		$msg['success'] = false;
		if ($result) {
			$msg['pesan']='<div class="alert alert-success" role="alert">Informasi berhasil  di tambahkan !</div>';
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function show_info()
	{
		$kode_thak=$this->model_app->kode_thak_aktif();
		$q=$this->model_app->get_all_info($kode_thak);
		$html='';
		$no=1;
		if ($q) {
			foreach ($q as $data) {
				$html.='<tr>
						<td>'.$no.'</td>
						<td>'.$data->info.'</td>
						<td>
						<a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="edit('.$data->id_info.')"><i class="fa fa-edit"></i> Edit</a>
						<a href="javascript:void(0);" class="btn btn-danger btn-xs" onclick="hapus('.$data->id_info.')"><i class="fa fa-trash"></i> Hapus</a> 
						</td>
				</tr>';
				$no++;
			}
		}else{
			$html.='<tr><td colspan="3">Tidak Ada Data Informasi</td></tr>';
		}
		echo $html;
	}

	public function get_info($id)
	{
		$res=$this->model_app->ambil_info($id);
		if ($res) {
			echo json_encode($res);
		}
	}

	public function update_info()
	{
		$info=$this->input->post('info', TRUE);
		$id=$this->input->post('id', TRUE);
		$data=array(
				'info'=>$info
			);
		$result=$this->model_app->ubah_info($id,$data);
		if ($result) {
			$msg['pesan']='<div class="alert alert-success" role="alert">Informasi berhasil  di Update !</div>';
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function delete_info()
	{
		$id=$this->input->post('id', TRUE);
		$q=$this->model_app->hapus_info($id);
		if ($q) {
			$msg['pesan']='<div class="alert alert-success" role="alert">Informasi berhasil  di Di Hapus !</div>';
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}

/* End of file Main */
/* Location: ./application/controllers/Main */