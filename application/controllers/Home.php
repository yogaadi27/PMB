<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
        $kode_thak=$this->model_app->kode_thak_aktif();
        $d['informasi']=$this->model_app->get_all_info($kode_thak);
        $d['thak']=$this->model_admin->ambil_thak_aktif();
        $d['prodi']=$this->model_app->get_prodi();
        $d['cek_reg']=$this->model_cek->cek_reg();
        $d['jadwal_tes']=$this->model_admin->get_all_tes($kode_thak);
		$this->load->view('home',$d);
	}

	public function daftar()
	{
                $kode_thak=$this->model_app->kode_thak_aktif();
                $nisn=$this->input->post('nisn', TRUE);
                $cek=$this->cek_nisn($nisn);
                if ($cek) {
                        $config['upload_path']          = './photo/';
                        $config['allowed_types']        = 'jpg|png';
                        $config['max_size']             = 200;
                        $config['max_width']            = 1324;
                        $config['max_height']           = 1068;

                        $this->load->library('upload', $config);

                        if ( ! $this->upload->do_upload('userfile'))
                        {
                                $this->session->set_flashdata('error_daftar', '<div class="alert alert-danger"><i class="icon fa-4x fa fa-warning"></i><br>
                                                                <h3>Pilih Photo sesuai Aturan ! <i class="fa fa-fw fa-frown-o"></i> </h3>
                                                                 </div>');
                                redirect('home');
                        }
                        else
                        {
                                $poto = $this->upload->data();
                              
                                $nisn=strtoupper($this->input->post('nisn', TRUE));
                                $nama=strtoupper($this->input->post('nama', TRUE));
                                $agama=strtoupper($this->input->post('agama', TRUE));
                                $jkel=$this->input->post('jenisKelamin', TRUE);
                                $tgl=$this->input->post('tgl_lahir', TRUE);
                                $alamat=strtoupper($this->input->post('alamat', TRUE));
                                $hp=$this->input->post('hp', TRUE);
                                $email=$this->input->post('email', TRUE);
                                $sekolah=strtoupper($this->input->post('sekolah', TRUE));
                                $kota=strtoupper($this->input->post('kota_sekolah', TRUE));
                                $nilai=$this->input->post('nilai_un', TRUE);
                                $prodi=$this->input->post('prodi', TRUE);
                                $poto=$poto['file_name'];
                                $t = date("Y-m-d H:i:s");

                                $data=array(
                                    'thak'=>$kode_thak,
                                    'nama_pendaftar'=>$nama,
                                    'nisn'=>$nisn,
                                    'tgl_lahir'=>$tgl,
                                    'jkel'=>$jkel,
                                    'agama'=>$agama,
                                    'sekolah'=>$sekolah,
                                    'kota'=>$kota,
                                    'alamat'=>$alamat,
                                    'no_hp'=>$hp,
                                    'email'=>$email,
                                    'prodi'=>$prodi,
                                    'nilai_un'=>$nilai,
                                    'daftar_tgl'=>$t,
                                    'foto'=>$poto
                                    );
                                $result=$this->model_app->register_siswa($data);
                                if ($result) {
                                       $this->session->set_flashdata('error_daftar', '<div class="alert alert-success  wow zoomInUp" data-wow-delay="300ms" data-wow-duration="1000ms"><i class="icon fa-4x fa fa-check-square-o"></i><br>
                                            <h3>Selamat ! Pendaftaran Berhasil..! <i class="fa fa-fw fa-smile-o"></i>
                                            <br>Silakan Cetak Bukti Pendaftaran ! <a href="'.base_url('home/cetak_bukti/'.$nisn.'').'" target="_blank">Di Sini</a></h3>
                                             </div>');
                                }else{
                                        $this->session->set_flashdata('error_daftar', '<div class="alert alert-danger wow zoomInUp" data-wow-delay="300ms" data-wow-duration="1000ms"><i class="icon fa-4x fa fa-close "></i><br>
                                            <h3>Masalah Pendaftaran ! <i class="fa fa-fw fa-frown-o"></i>
                                           </h3>
                                             </div>');
                                }
                                redirect('home');
                        }
                }else{
                        $this->session->set_flashdata('error_daftar', '<div class="alert alert-danger  wow zoomInUp" data-wow-delay="300ms" data-wow-duration="1000ms"><i class="icon fa-4x fa fa-warning"></i><br>
                                                                <h3>Maaf, NISN Sudah Terdaftar ! Tidak Bisa daftar lagi ! <i class="fa fa-fw fa-frown-o"></i>
                                                                <br>Apakah Anda Lupa Mencetak Bukti Pendaftaran ? <br><a href="'.base_url('home/cetak_bukti/'.$nisn.'').'" target="_blank">Cetak kembali bukti pendaftaran..!</a></h3>
                                                                 </div>');
                        redirect('home');
                }
		
	}

    private function cek_nisn($nisn)
    {
            $cek=$this->model_cek->cek_nisn($nisn);
            if ($cek) {
                    return true;
            }else{
                    return false;
            }
    }

    public function cetak_bukti($id)
    {
        $kode_thak=$this->model_app->kode_thak_aktif();
        $d['data']=$this->model_app->cetak_form($id);
        $d['jadwal']=$this->model_admin->get_all_tes($kode_thak);
       // load mPDF library
        $this->load->library('m_pdf');

       
        $pdfFilePath ="registrasi-".time()."-download.pdf";
 
        
        //actually, you can pass mPDF parameter on this load() function
        $pdf = $this->m_pdf->load();
        
        $html=$this->load->view('bukti_reg',$d , true);

        //generate the PDF!
        $pdf->WriteHTML($html);
        
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $pdf->Output($pdfFilePath, "I");

    }

    public function pengumuman_maba($kode)
    {
        $thak=$this->model_app->kode_thak_aktif();
        $limit=$this->model_app->get_limit($kode);
        $array = array('pendaftaran.thak' => $thak, 'pendaftaran.prodi' => $kode);
        $d['det']=$this->model_app->detail_lulus_prodi($kode);
        $d['thak']=$this->model_admin->ambil_thak_aktif();
        $d['maba']=$this->model_app->siswa_lulus($array,$limit);
        $this->load->view('pengumuman',$d);
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */