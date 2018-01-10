<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('home');
		}
	}

	public function index()
	{
		$d['content']=$this->load->view('admin/tes/view', '', TRUE);
		$this->load->view('admin/home', $d);
	}

	public function add_tes()
	{
		$kode_thak=$this->model_app->kode_thak_aktif();
		$tes=strtoupper($this->input->post('tes', TRUE));
		$tgl=$this->input->post('tgl_tes', TRUE);
		$mulai=$this->input->post('mulai', TRUE);
		$sampai=$this->input->post('sampai', TRUE);
		$ket=$this->input->post('ket', TRUE);
		$data=array(
			'thak'=>$kode_thak,
			'nama_tes'=>$tes,
			'mulai'=>$mulai,
			'sampai'=>$sampai,
			'tgl_tes'=>$tgl,
			'ket'=>$ket
			);
		$table='agenda_tes';
		$result=$this->model_admin->auto_insert($table,$data);
		if ($result) {
			$msg['pesan']='<div class="alert alert-success" role="alert">Tes berhasil  di tambahkan !</div>';
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function show_tes()
	{
		$kode_thak=$this->model_app->kode_thak_aktif();
		$q=$this->model_admin->get_all_tes($kode_thak);
		$html='';
		$no=1;
		if ($q) {
			foreach ($q as $data) {
				$html.='<tr>
						<td>'.$no.'</td>
						<td>'.$data->nama_tes.'</td>
						<td>'.$data->tgl_tes.'</td>
						<td>'.$data->mulai.'</td>
						<td>'.$data->sampai.'</td>
						<td>
						<a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="edit('.$data->id.')"><i class="fa fa-edit"></i> Edit</a>
						<a href="javascript:void(0);" class="btn btn-danger btn-xs" onclick="hapus('.$data->id.')"><i class="fa fa-trash"></i> Hapus</a> 
						</td>
				</tr>';
				$no++;
			}
		}else{
			$html.='<tr><td colspan="6">Tidak Ada Data Jadwal Tes</td></tr>';
		}
		echo $html;
	}

	public function get_tes($id)
	{
		$res=$this->model_admin->ambil_tes($id);
		if ($res) {
			echo json_encode($res);
		}
	}

	public function update_tes()
	{
		$id=$this->input->post('key', TRUE);
		$tes=$this->input->post('tes', TRUE);
		$tgl=$this->input->post('tgl_tes', TRUE);
		$mulai=$this->input->post('mulai', TRUE);
		$sampai=$this->input->post('sampai', TRUE);
		$ket=$this->input->post('ket', TRUE);
		$data=array(
			'nama_tes'=>$tes,
			'mulai'=>$mulai,
			'sampai'=>$sampai,
			'tgl_tes'=>$tgl,
			'ket'=>$ket
			);
		$query=$this->model_admin->update_tes($id,$data);
		if ($query) {
			$msg['pesan']='<div class="alert alert-success" role="alert">Tes berhasil  di Update !</div>';
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function delete_tes()
	{
		$id=$this->input->post('id', TRUE);
		$q=$this->model_admin->hapus_tes($id);
		if ($q) {
			$msg['pesan']='<div class="alert alert-success" role="alert">Agenda Tes berhasil  di Di Hapus !</div>';
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}

/* End of file Tes.php */
/* Location: ./application/controllers/Tes.php */