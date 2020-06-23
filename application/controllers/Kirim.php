
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Kirim extends CI_Controller {
 

  function __construct()
  {
        parent::__construct();       
        $this->load->model('User_model');
        $this->load->model('Cabang_model');
        $this->load->model('Event_model');
        $this->load->helper(array('url','form'));
  }
  public function index()
  {
   $this->load->helper('form');                             //memasukkan library helper form
   $this->load->view('tampilan_email');       //memasukkan tampilan view tampilan_pengiriman.php
  }

  public function prosespengiriman()
  {
   $this->load->helper(array('form', 'url'));
   $this->load->library('email');
   $this->load->library('upload');
   
   //konfigurasi emaile
   $config = array();
   $config['charset'] = 'utf-8';
   $config['useragent'] = 'Codeigniter'; //bebas sesuai keinginan kamu
   $config['protocol']= "smtp";
   $config['mailtype']= "html";
   $config['smtp_host']= "ssl://smtp.gmail.com";
   $config['smtp_port']= "465";
   $config['smtp_timeout']= "5";
   $config['smtp_user']= "itregion.semarang@gmail.com";              //isi dengan email anda
   $config['smtp_pass']= "p@n1nbank";            // isi dengan password dari email anda
   $config['crlf']="\r\n";
   $config['newline']="\r\n";
 
   $config['wordwrap'] = TRUE;
 
 //memanggil library email dan set konfigurasi untuk pengiriman email
   
   $this->email->initialize($config);
 //konfigurasi pengiriman kotak di view ke pengiriman email di gmail
   $this->email->from('itregion_semarang@gmail.com');
   $hasil = $this->User_model->get_all_usermail();
   foreach ($hasil as $key) 
   {
    $aa = $key->nama_email;
    $this->email->to($aa);
    $this->email->subject('schedule yang akan datang');

    //manggil date
    $tgle = $this->Event_model->get_all_event();
    $tgl_event = $tgle->date_event;
    print_r($tgl_event);
    exit();


    $abc = $this->Event_model->get_event_date();
    $isi = '';
     foreach ($abc as $key) 
          {
            $isi .= $key->nama_cabang.' - '.$key->nama_event.' - '.$key->date_event;
            // $isi['asem1'] = $key->nama_event;
            // $isi['asem2'] = $key->date_event;
          }
    $this->email->message($isi);
    if($this->email->send())
    {
      echo "pengiriman email berhasil";
    }else
    {
      echo "pengiriman email gagal";
    }
   }
  
//proses uploads
   
   $this->upload->initialize(array(
                        "upload_path"   => "./uploads/",
   "allowed_types" => "*"
   ));
   
  }
 }