<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Home extends CI_Controller {

	function __construct(){
		parent::__construct(); 
		$this->load->library('session');
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}
		$this->load->model('login_model');
		$this->load->helper(array('url','form'));

	}


	public function index() {
		$data=array('title'=>'Panin Scheduler',
					'isi'  =>'home/index_home'
						);
		$this->load->view('layout/wrapper',$data);
		$this->load->view('home/beranda');	
	}

	public function member() {
		$data=array('title'=>'Panin Scheduler',
						);
		$this->load->view('layout/wrapper',$data);	
		$this->load->view('member/C_member',$data); 
	}

	

}