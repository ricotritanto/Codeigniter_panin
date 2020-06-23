<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bvr extends CI_Controller {

	function __construct(){
		parent::__construct();       
		$this->load->model('Cabang_model');
		$this->load->model('Bvr_model');
		$this->load->helper(array('url','form'));
	}

	function index()
	{ 
		$data=array(
			'title'=>'Panin Bank',
			'cabang'=>$this->Cabang_model->get_all_cabang(),
			//'event'=>$this->Bvr_model->get_all_event(),
		);
		//$this->list_event();
		$this->load->view('layout/wrapper',$data); 
		$this->load->view('Bvr/Bvr_view',$data);  
	}

	function tambah_bvr()
	{
		$no_id = $this->input->post('nm_cabang');
		$tgl_visit = $this->input->post('tgl_visit');
		$suhu_r_server = $this->input->post('suhu_r_server');
		$keluaran_ac = $this->input->post('keluaran_ac');
		$input_ups = $this->input->post('input_ups');
		$ups_batteray = $this->input->post('ups_batteray');
		$output_ups = $this->input->post('output_ups');
		$kebersihan = $this->input->post('kebersihan');
		$tgl_cctv = $this->input->post('tgl_cctv');
		$cbsteller = $this->input->post('cbsteller');
		$crm = $this->input->post('crm');
		$tgl_sophos = $this->input->post('tgl_sophos');
		$c_r_atm = $this->input->post('c_r_atm');
		$sttus_atm = $this->input->post('sttus_atm');
		$ups_atm = $this->input->post('ups_atm');
		$ac = $this->input->post('ac');
		$informasi = $this->input->post('informasi');
		$fisik = $this->input->post('fisik');
		$image = $this->input->post('image');
		$sql = $this->input->post('sql');
		$catatan = $this->input->post('catatan');
		$data = array(
			"no_id" => $no_id,
			"date_visit" => $tgl_visit,
			"suhu_r_server"=> $suhu_r_server,
			"suhu_out_ac"=> $keluaran_ac,
			"input_ups"=> $input_ups,
			"ups_bateray"=> $ups_batteray,
			"output_ups"=> $output_ups,
			"clean_r_server"=> $kebersihan,
			"check_cctv"=> $tgl_cctv,
			"datetime_cbsteller"=> $cbsteller,
			"crm"=> $crm,
			"update_sophos"=> $tgl_sophos,
			"clean_r_atm"=> $c_r_atm,
			"status_atm"=> $sttus_atm,
			"ups_atm"=> $ups_atm,
			"ac"=> $ac,
			"sticker_informasi"=> $informasi,
			"fisik_atm"=> $fisik,
			"backup_image"=> $image,
			"backup_sql"=> $sql,
			"catatan"=>$catatan,

		);

		$this->Bvr_model->tambah_bvr($data);
		$data['message'] = 'Data Inserted Successfully';
		echo "<script type='text/javascript'> location.href='".base_url('bvr')."'; </script>";
	}

	function list_bvr()
	{
		 $data=array(
			'title'=>'Panin Bank',
			'hasil'=>$this->Bvr_model->get_all_Bvr(),
			//'event'=>$this->Bvr_model->get_all_event(),
		);
		//$this->list_event();
		$this->load->view('layout/wrapper',$data);
		$this->load->view('BVR/tampil_bvr',$data);
	}

	function hapus($id)
	{
		$this->Bvr_model->delete($id);
		$data['message'] = 'Hapus data berhasil';
		echo "<script type='text/javascript'> location.href='".base_url('Bvr/list_bvr')."'; </script>";
	}

	function update($id)
	{
		// $aa = $this->Event_model->get_Event_byId($id);
		// print_r($aa);exit();

		$data=array(
					'title'=>'Panin Bank',
					'hasil'=>$this->Bvr_model->get_bvr_byId($id),
					'cbg'=>$this->Cabang_model->get_all_Cabang()   
		);
		$this->load->view('layout/wrapper',$data);
		$this->load->view('bvr/update_bvr',$data);
	}

	function update_data()
	{  
		$id = $this->input->post('id');
			$data=array(
			  'no_id'=>$this->input->post('nm_cabang'),
			  'date_visit'=>$this->input->post('tgl_visit'),
			  'suhu_r_server'=>$this->input->post('suhu_r_server'),
			  'suhu_out_ac'=>$this->input->post('keluaran_ac'),
			  'input_ups'=>$this->input->post('input_ups'),
			  'ups_bateray'=>$this->input->post('ups_bateray'),
			  'output_ups'=>$this->input->post('output_ups'),
			  'clean_r_server'=>$this->input->post('Kebersihan'),
			  'check_cctv'=>$this->input->post('tgl_cctv'),
			  'datetime_cbsteller'=>$this->input->post('cbsteller'),
			  'crm'=>$this->input->post('crm'),
			  'update_sophos'=>$this->input->post('tgl_sophos'),
			  'clean_r_atm'=>$this->input->post('c_r_atm'),
			  'status_atm'=>$this->input->post('sttus_atm'),
			  'ups_atm'=>$this->input->post('ups_atm'),
			  'ac'=>$this->input->post('ac'),
			  'sticker_informasi'=>$this->input->post('Informasi'),
			  'fisik_atm'=>$this->input->post('fisik_atm'),
			  'backup_image'=>$this->input->post('backup_image'),
			  'backup_sql'=>$this->input->post('backup_sql'),
			  'catatan'=>$this->input->post('catatan'),

		
		);
		 $this->Bvr_model->m_update($data,$id);
		 $data['message'] = 'Update data berhasil';
		echo "<script type='text/javascript'> location.href='".base_url('Bvr/list_bvr')."'; </script>";
	}

	function search_bvr()
	{
		$data=array(
					'title'=>'Panin Bank',  
		);
		$this->load->view('layout/wrapper',$data);
		$this->load->view('bvr/Search_bvr',$data);
	}


	function search_bvr2()
	{
	   $tgl_awal= $this->input->post('tgl_awal');
		$tgl_akhir= $this->input->post('tgl_akhir');
	 
		// $sess_data=array(
		//     'tgl_awal'=>$tgl_awal,
		//     'tgl_akhir'=>$tgl_akhir
		// );
		// $this->session->set_userdata($sess_data);
		$data=array( 
					'title'=>'Panin Bank',
					'hasil'=> $this->Bvr_model->getLapDate($tgl_awal,$tgl_akhir),
					'tgl_awal'=>$tgl_awal,
					'tgl_akhir'=>$tgl_akhir
					 // 'aa'=>$this->Bvr_model->get_all_Bvr(),          
			// 'tgl_awal'=>date("d M Y",strtotime($this->session->userdata('tgl_awal'))),
			// 'tgl_akhir'=>date("d M Y",strtotime($this->session->userdata('tgl_akhir'))),
		);
		$this->load->view('layout/wrapper',$data);
		$this->load->view('bvr/tampil_search',$data);
	}


}