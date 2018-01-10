<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('home');
		}
	}

	public function index()
	{
		$d['']='';
		$d['content']=$this->load->view('admin/pendaftaran/view',$d, TRUE);
		$this->load->view('admin/home', $d);
	}

	public function show_pendaftaran()
	{
		$kode_thak=$this->model_app->kode_thak_aktif();
		$q=$this->model_admin->get_all_siswa($kode_thak);
		$html='';
		$no=1;
		if ($q) {
			foreach ($q as $data) {

				if ($data->input_tes_tgl == 0 OR $data->nilai_tes == 0) {
					$tes='<a href="javascript:void(0);" class="btn btn-danger btn-xs" title="Masukan Nilai Tes" onclick="input_tes('.$data->id_daftar.')"><i class="fa fa-exclamation-triangle"></i> Belum Tes</a>';
				}else{
					$tes='<a href="javascript:void(0);" class="btn btn-success btn-xs" title="Edit Tes" onclick="edit_tes('.$data->id_daftar.')"><i class="fa fa-check-square-o"></i> Sudah Tes</a>';
				}
				$html.='<tr>
						<td>'.$no.'</td>
						<td>'.$data->nama_pendaftar.'</td>
						<td>'.$data->nisn.'</td>
						<td>'.$data->sekolah.'</td>
						<td>'.$data->jenjang.' '.$data->nama_prodi.'</td>
						<td>
							<a href="javascript:void(0);" class="btn btn-success btn-xs" title="Lihat Detail" onclick="detail('.$data->id_daftar.')"><i class="fa fa-eye"></i></a>
							<a href="javascript:void(0);" class="btn btn-danger btn-xs" title="Hapus" onclick="hapus('.$data->id_daftar.')"><i class="fa fa-trash"></i></a> 
						</td>
						<td>'.$tes.'</td>
				</tr>';
				$no++;
			}
		}else{
			$html.='<tr><td colspan="7">Tidak Ada Data Jadwal Tes</td></tr>';
		}
		echo $html;
	}

	public function detail($id)
	{
		$result=$this->model_admin->get_detail_siswa($id);
		if ($result) {
			echo json_encode($result);
		}else{
			return false;
		}
	}

	public function delete_siswa()
	{
		$id=$this->input->post('id', TRUE);
		$query=$this->model_admin->del_siswa($id);
		if ($query) {
			$msg['success'] = true;
			$msg['pesan'] = '<div class="alert alert-success" role="alert">Siswa berhasil  di Hapus !</div>';	
		}
		echo json_encode($msg);
	}

	public function get_det_tes($id)
	{
		$result=$this->model_admin->get_data_tes($id);
		if ($result) {
			echo json_encode($result);
		}
	}

	public function input_nil_tes()
	{
		$nilai=$this->input->post('nilai_tes', TRUE);
		$t = date("Y-m-d H:i:s");
		$data=array(
			'nilai_tes'=>$nilai,
			'input_tes_tgl'=>$t
			);
		$id=$this->input->post('key', TRUE);
		$result=$this->model_admin->input_tes($id,$data);
		if ($result) {
			$msg['success'] = true;
			$msg['pesan'] = '<div class="alert alert-success" role="alert">Nilai Berhasil Di masukan !</div>';	
		}
		echo json_encode($msg);
	}

	public function update_nil_tes()
	{
		$nilai=$this->input->post('nilai_tes', TRUE);
		$id=$this->input->post('key', TRUE);
		$data=array(
			'nilai_tes'=>$nilai
			);
		$result=$this->model_admin->input_tes($id,$data);
		if ($result) {
			$msg['success'] = true;
			$msg['pesan'] = '<div class="alert alert-success" role="alert">Nilai Berhasil Di Update !</div>';	
		}
		echo json_encode($msg);
	}

}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/Pendaftaran.php */