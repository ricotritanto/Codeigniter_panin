<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {

	function __construct(){
        parent::__construct(); 
        $this->load->library('session');
        if ($this->session->userdata('username')=="") {
            redirect('login');
        }      
        $this->load->model('Cabang_model');
        $this->load->helper(array('url','form'));
    }

    function index()
    {
       $data=array('title'=>'Panin Bank',
                     'hasil'=>$this->Cabang_model->get_all_cabang()
                        );

        
        $this->load->view('layout/wrapper',$data);
        $this->load->view('Cabang/cabang_view',$data);
        //$this->list_cabang();
    }
    
    function tambah_cabang()
    {
        $nama_cabang = $this->input->post('nama_cabang');
        $kd_cabang = $this->input->post('kd_cabang');
        $data = array(
            "nama_cabang" => $nama_cabang,
            "kd_cabang" => $kd_cabang,
        );
        //Transfering data to Model
        $this->Cabang_model->tambah_cabang($data);
        $data['message'] = 'Data Inserted Successfully';
        $this->index();
    
    }

    function list_cabang()
    {
        $data['hasil'] = $this->Cabang_model->get_all_cabang();
        $this->load->view('layout/wrapper',$data);
        $this->load->view('Cabang/Tampil_cabang',$data);
       
    }
    
    function update($id)
    {
        $data=array('title'=>'Panin Bank',
                    'isi'  =>'cabang/update_cabang',
        'no_id'=>$id 
        );
        $data['hasil']=$this->Cabang_model->getById($id);
        //$this->load->view('Cabang/update_cabang',$data);
        $this->load->view('layout/wrapper',$data);
        $this->load->view('Cabang/update_cabang',$data);
    }

    function update_data()
    {
        $id = $this->input->post('no_id');
        $data=array(      
          'kd_cabang'=>$this->input->post('kd_cabang'),
          'nama_cabang'=>$this->input->post('nama_cabang'),
          );
        $this->Cabang_model->m_update($data,$id);
        $data['message'] = 'Update data berhasil';
        echo "<script type='text/javascript'> location.href='".base_url('cabang/list_cabang')."'; </script>";
    }

    function hapus($id)
    {
        $this->Cabang_model->delete($id);
        $data['message'] = 'Hapus data berhasil';
        echo "<script type='text/javascript'> location.href='".base_url('cabang/list_cabang')."'; </script>";
    }
}

