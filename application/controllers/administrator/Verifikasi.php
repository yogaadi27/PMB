<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Verifikasi extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			if (!$this->session->userdata('logged_in')) {
				redirect('home');
			}
		}
	
		public function index()
		{
			$d['content']=$this->load->view('admin/verifikasi/view','', TRUE);
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

					if ($data->verifikasi_tgl==0) {
						$tes='<a href="'.base_url('administrator/verifikasi/do_verifikasi/'.$data->id_daftar.'').'" class="btn btn-danger btn-xs" title="Lakukan Verifikasi"><i class="fa fa-exclamation-triangle"></i> Belum Verifikasi</a>';
					}else{
						$tes='<a href="'.base_url('administrator/verifikasi/do_verifikasi/'.$data->id_daftar.'').'" class="btn btn-primary btn-xs" title="Edit Verifikasi"><i class="fa fa-check-square-o"></i> Sudah Verifikasi</a>
							<a href="'.base_url('administrator/verifikasi/cetak_verifikasi/'.$data->id_daftar.'').'" class="btn bg-maroon btn-xs" title="Cetak Kartu Ujian" target="_blank"><i class="fa fa-print"></i> Cetak Kartu Ujian</a>';
					}

					if ($data->fc_ijazah == 1) {
						$fc_ijazah='<span class="badge bg-green"><i class="fa fa-check"></i></span>';
					}else{
						$fc_ijazah='<span class="badge bg-red"><i class="fa fa-times"></i></span>';
					}

					if ($data->fc_skhu == 1) {
						$fc_skhu='<span class="badge bg-green"><i class="fa fa-check"></i></span>';
					}else{
						$fc_skhu='<span class="badge bg-red"><i class="fa fa-times"></i></span>';
					}

					$html.='<tr>
							<td>'.$no.'</td>
							<td>'.$data->nama_pendaftar.'</td>
							<td>'.$data->nisn.'</td>
							<td>'.$data->sekolah.'</td>
							<td>'.$data->jenjang.' '.$data->nama_prodi.'</td>
							<td>'.$fc_ijazah.'</td>
							<td>'.$fc_skhu.'</td>
							<td>'.$tes.'</td>
					</tr>';
					$no++;
				}
			}else{
				$html.='<tr><td colspan="7">Tidak Ada Data Jadwal Tes</td></tr>';
			}
			echo $html;
		}

		public function do_verifikasi($id=NULL)
		{
			if (!empty($id))
	        {
	        	if (isset($_POST['submit'])) {
	        		$pas_foto=$this->input->post('pas_foto', TRUE);
	        		$fc_ijazah=$this->input->post('fc_ijazah', TRUE);
	        		$fc_skhu=$this->input->post('fc_skhu', TRUE);
	        		$t = date("Y-m-d H:i:s");
	        		$data=array('pas_foto'=>$pas_foto,
	        					'fc_ijazah'=>$fc_ijazah,
	        					'fc_skhu'=>$fc_skhu,
	        					'verifikasi_tgl'=>$t);
	        		$result=$this->model_app->do_verifikasi($data,$id);
	        		redirect('administrator/verifikasi');
	        	}else{
	        		$d['siswa']=$this->model_admin->get_detail_siswa($id);
	        		$d['content']=$this->load->view('admin/verifikasi/do_verifikasi',$d, TRUE);
	       			$this->load->view('admin/home', $d); 
	        	}
	        }else{
	        	// Whoops, we don't have a page for that!
            	show_404();
	        }
		
		}

		public function cetak_verifikasi($id=NULL)
		{
			if (!empty($id)){
	        	$kode_thak=$this->model_app->kode_thak_aktif();
		        $d['data']=$this->model_app->cetak_ver($id);
		        $d['jadwal']=$this->model_admin->get_all_tes($kode_thak);
		       //print_r($data);
		       //load mPDF library
		        $this->load->library('m_pdf');

		       
		        $pdfFilePath ="registrasi-".time()."-download.pdf";
		 
		        
		        //actually, you can pass mPDF parameter on this load() function
		        $pdf = $this->m_pdf->load();
		        
		        $html=$this->load->view('admin/verifikasi/cetak_verifikasi',$d, true);

		        //generate the PDF!
		        $pdf->WriteHTML($html);
		        
		        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
		        $pdf->Output($pdfFilePath, "I");
	        }
	        else{
	        	// Whoops, we don't have a page for that!
            	show_404();
	        }
		}
	}
	
	/* End of file Verifikasi.php */
	/* Location: ./application/controllers/Verifikasi.php */	