<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	function __construct(){
        parent::__construct();  
        $this->load->library('session');
        if ($this->session->userdata('username')=="") {
            redirect('login');
        }     
        $this->load->model('Cabang_model');
        $this->load->model('Event_model');
        $this->load->helper(array('url','form'));
    }

    function index()
    { 
        $data=array(
            'title'=>'Panin Bank',

            'cabang'=>$this->Cabang_model->get_all_cabang(),
            'event'=>$this->Event_model->get_all_event(),
        );
        //$this->list_event();
        $this->load->view('layout/wrapper',$data);
        $this->load->view('Event/event_view',$data);

        
    }
    
    function tambah_event()
    {
        $nama_event = $this->input->post('nama_event');
        $tanggal = $this->input->post('tgl_event');
        $no_id = $this->input->post('nm_cabang');
        $data = array(
            "nama_event" => $nama_event,
            "date_event" => $tanggal,
            "no_id"=> $no_id,
        );
        //Transfering data to Model
        $this->Event_model->tambah_event($data);
        $data['message'] = 'Data Inserted Successfully';
        echo "<script type='text/javascript'> location.href='".base_url('event/list_event')."'; </script>";
    
    }

    function list_event()
    {
        $data['hasil'] = $this->Event_model->get_all_event();
        $this->load->view('layout/wrapper',$data);
        $this->load->view('event/Tampil_event',$data);
    }

    function update($id)
    {
        // $aa = $this->Event_model->get_Event_byId($id);
        // print_r($aa);exit();
        $data=array(
                    'title'=>'Panin Bank',
                    'isi'  =>'event/update_event',
                    //'id_event'=>$id,
                    // 'kd_cabang'=>$this->Cabang_model->get_all_cabang(),
                    'hasil'=>$this->Event_model->get_Event_byId($id),
                    'cbg'=>$this->Cabang_model->get_all_Cabang()   
        );
        
        $this->load->view('layout/wrapper',$data);
        $this->load->view('Event/Update_event',$data);
    }

    function update_data()
    {  
        $id = $this->input->post('id_event');
              $data=array(
              'no_id'=>$this->input->post('nm_cabang'),
              'nama_event'=>$this->input->post('event'),
              'date_event'=>$this->input->post('tgl_event'),
        
        );
        $this->Event_model->m_update($data,$id);
         $data['message'] = 'Update data berhasil';
        echo "<script type='text/javascript'> location.href='".base_url('event/list_event')."'; </script>";
    }
    function hapus($id)
    {   
        $this->Event_model->delete($id);
        $data['message'] = 'hapus data berhasil';
        echo "<script type='text/javascript'> location.href='".base_url('event/list_event')."'; </script>";
    }
    
}

