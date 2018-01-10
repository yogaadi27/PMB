<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('administrator/main');
		}
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|callback_cek_login');
		 if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/login');
        }
        else
        {
        	$this->session->set_flashdata('greeting', '<div id="greeting" class="callout callout-success">
									        <h4>Selamat Datang , Admin !</h4>

									        <p>Bagaimana kabar Anda hari ini ? Semoga hari Anda menyenangkan..!!</p>
									      </div>');
        	redirect('administrator/main');
        }
	}

	public function cek_login()
	{
		$us=$this->input->post('username');
		$pw=$this->input->post('password');
		$q=$this->model_admin->cek_login($us,$pw);
		if ($q) {
			foreach ($q as $row)
			{
				$sess_array=array(
							'id'=>$row['id_admin'],
							'username'=>$row['username'],
							'fullname'=>$row['fullname']
					);
			     $this->session->set_userdata('logged_in',$sess_array);
			}
			return true;
		}else{
			$this->form_validation->set_message('cek_login', '<i class="fa fa-fw fa-exclamation-triangle"></i> Invalid Username or Password !');
			return false;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('administrator');
	}

	public function change_password()
	{
		$username=$this->input->post('username', TRUE);
		$password=$this->input->post('password', TRUE);
		$confirm=$this->input->post('confirmPassword', TRUE);
		$fullname=$this->input->post('fullname', TRUE);
		if ($confirm == $password) {
			$pw_hash=password_hash($password,PASSWORD_DEFAULT);
			$id=$this->session->userdata('logged_in')['id'];
			$data=array(
				'username'=>$username,
				'password'=>$pw_hash,
				'fullname'=>$fullname
				);
			$result=$this->model_admin->change_password($id,$data);
			if ($result) {
				// $this->session->set_flashdata('callback', '<div class="alert alert-danger alert-dismissible">
			 //        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			 //        <h6>Silahkan Login Kembali</h6>
			 //      </div>');
				$this->logout();
			}else{
				echo'<script type="text/javascript" charset="utf-8">alert("Failed To change Password")</script>';	
			}
		}else{
			echo'<script type="text/javascript" charset="utf-8">alert("Invalid Password and confirmPassword")</script>';
		}
		// print_r($this->input->post());
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */