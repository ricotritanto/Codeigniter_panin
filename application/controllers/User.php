<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
        parent::__construct();  
        $this->load->library('session');
        if ($this->session->userdata('username')=="") {
            redirect('login');
        }     
        $this->load->model('User_model');
        $this->load->helper(array('url','form'));
    }

    function index()
    {
        $data=array(
            'title'=>'Panin Bank',
            //'isi'  =>'user/input_user',
            'hasil'=>$this->User_model->get_all_user()
            //'kode'=>$this->Golongan_model->getKodeGolongan(),
        );
         $this->load->view('layout/wrapper',$data);
         $this->load->view('user/input_user',$data);
         
        //$this->list_user();
    }
    
    function tambah_User()
    {
        $nama_email = $this->input->post('nama_email');
        $nama_user = $this->input->post('nama_user');
        $data = array(
            "nama_email" => $nama_email,
            "nama_user" => $nama_user,
        );
        $cek = $this->User_model->getby('user_email',array('nama_email'=>$nama_email));
        if (count($cek)!=0) 
        {
            print "<script type='text/javascript'> alert('User email sudah ada'); document.location='".base_url('user')."'; </script>";
        }
        else
        {
            //Transfering data to Model
            $this->User_model->tambah_user($data);
            $data['message'] = 'Data Inserted Successfully';
            $this->index();
        }
        
    
    }

    function list_user()
    {
        $data['hasil'] = $this->User_model->get_all_user();
         $this->load->view('layout/wrapper',$data);
        $this->load->view('user/List_user',$data);

    }
    
    function update($id)
    {
        $data=array('title'=>'Panin Bank',
                    'isi'  =>'user/update_user',
        'no_id'=>$id 
        );
        $data['hasil']=$this->User_model->getById($id);
        //$this->load->view('Cabang/update_cabang',$data);
        $this->load->view('layout/wrapper',$data);
        $this->load->view('user/Update_user',$data);
    }

    function update_data()
    {
        $id = $this->input->post('id');
        $data=array(      
          'nama_user'=>$this->input->post('nama_user'),
          'nama_email'=>$this->input->post('nama_email'),
          );
        $this->User_model->m_update($data,$id);
        $data['message'] = 'Update data berhasil';
        echo "<script type='text/javascript'> location.href='".base_url('user/list_user')."'; </script>";
    }

    function hapus($id)
    {
        $this->User_model->delete($id);
        $data['message'] = 'Hapus data berhasil';
        echo "<script type='text/javascript'> location.href='".base_url('user/list_user')."'; </script>";
    }
}

