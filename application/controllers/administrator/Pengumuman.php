<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$d['prodi']=$this->model_app->get_prodi();
		$d['content']=$this->load->view('admin/pengumuman/view', $d, TRUE);
		$this->load->view('admin/home', $d);
	}

	public function prodi($kode_prodi)
	{
		$thak=$this->model_app->kode_thak_aktif();
		$d['prodi']=$this->model_app->ambil_prodi($kode_prodi);
		$d['siswa']=$this->model_app->get_siswa_prodi($kode_prodi,$thak);
		$d['content']=$this->load->view('admin/pengumuman/prodi', $d, TRUE);
		$this->load->view('admin/home', $d);
	}

	// public function do_verifikasi($kode)
	// {
	// 	$thak=$this->model_app->kode_thak_aktif();
	// 	$limit=$this->model_app->get_limit($kode);
	// 	$filter=array(
	// 		'prodi'=>$kode,
	// 		'thak'=>$thak
	// 		);
	// 	$set_lulus=$this->model_app->set_lulus($filter,$limit);
	// 	if ($set_lulus) {
	// 		$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible">
	// 								                <h4><i class="icon fa fa-check"></i> Berhasil Verifikasi!</h4>
	// 								              </div>');
	// 	}else{
	// 		$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible">
	// 								                <h4><i class="icon fa fa-check"></i> Gagal Verifikasi!</h4>
	// 								              </div>');
	// 	}
	// 	redirect('administrator/pengumuman/prodi/'.$kode);
	// }

	public function report_maba($kode)
	{
		$kode_thak=$this->model_app->kode_thak_aktif();
		$filter=array(
				'thak'=>$kode_thak,
				'prodi'=>$kode,
				'nilai_tes !='=>0
			);
		$limit=$this->model_app->get_limit($kode);
		$d['thak_aktif']=$this->model_admin->ambil_thak_aktif();
		$d['maba']=$this->model_app->report($filter,$limit);
       //print_r($d['maba']);
        $d['prodi']=$this->model_admin->ambil_prodi($kode);
        //$d['jadwal']=$this->model_admin->get_all_tes($kode_thak);
       // load mPDF library
        $this->load->library('m_pdf');

       
        $pdfFilePath ="laporan-".$kode.time()."-download.pdf";
 
        
        //actually, you can pass mPDF parameter on this load() function
        $pdf = $this->m_pdf->load();
        
        $header = '
			        <table width="100%" style="border-bottom: 2px solid #000000; vertical-align: top; font-family:
					serif; font-size: 9pt; color: #000088;"><tr>		
					<td width="20%" align="right">
					<div>
						<img src="'.base_url('assets/ak.png').'" width="75px" />
					</div></td>
					<td width="80%" style="text-align: center;">
						<h5>KEMENTERIAN RISET DAN TEKNOLOGI DAN PENDIDIKAN TINGGi</h5>
						<h3>AKADEMI KOMUNITAS NEGERI NGANJUK</h3>
						<h4>PDD POLITEKNIK NEGERI JEMBER</h4>
						<h5>Jl. Gatot Subroto No. 2 Nganjuk Telp. (0358) 321483 email : aknganjuk@yahoo.com</h5>
					</td>
				</tr>
				</table>
				';

		$footer = '<table width="100%" style="border-top: 2px solid #000000; vertical-align: bottom; font-family: serif; font-size: 8pt;

    color: #000000; font-weight: bold; font-style: italic;"><tr>

    <td width="33%"><span style="font-weight: bold; font-style: italic;">'.base_url().'</span></td>

    <td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>

    <td width="33%" style="text-align: right; ">{DATE j-m-Y}</td>

    </tr></table>';

    $pdf->SetHTMLHeader($header);
	$pdf->SetHTMLFooter($footer);


        $pdf->AddPage('L', // L - landscape, P - portrait
            '', '', '', '',
            20, // margin_left
            20, // margin right
            40, // margin top
            20, // margin bottom
            10, // margin header
            12); // margin footer);

        $html=$this->load->view('admin/pengumuman/report',$d , true);

        //generate the PDF!
        $pdf->WriteHTML($html);
        
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $pdf->Output($pdfFilePath, "I");
	}

}

/* End of file Pengumuman.php */
/* Location: ./application/controllers/Pengumuman.php */