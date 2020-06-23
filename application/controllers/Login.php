<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();       
		$this->load->model('login_model');
		$this->load->helper(array('url','form'));
		$this->load->library('session');
		session_start();
	}

	function index()
	{
		$data=array('title'=>'Panin Scheduler',
						);
		$this->load->view('Home/login',$data); 
	}

	function auth_login()
	{
		$data = array('username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE))
			);
		$this->load->model('login_model'); // load model_user
		$hasil = $this->login_model->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['uid'] = $sess->uid;
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='admin') {
				redirect('home/index');
			}
			elseif ($this->session->userdata('level')=='member') {
				redirect('home/member');
			}		
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

	public function logout() 
	{
		$this->session->unset_userdata(array('username' => '',
											 'level'=>'' ));
		$this->session->sess_destroy();
		redirect('login');
	}
	

}