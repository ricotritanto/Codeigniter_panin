<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Emaile extends CI_Controller {
 
    function __construct() {
        parent::__construct();
//            jika belum login redirect ke login
        if ($this->session->userdata('logged') <> 1) {
            redirect(site_url('auth'));
        }
    }
 
    function sendMail() {
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "your_email@gmail.com";
        $config['smtp_pass'] = "your_password";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        
        $ci->email->initialize($config);
 
        $ci->email->from('your_email@gmail.com', 'Your Name');
        $list = array('recipient_email@domain.com');
        $ci->email->to($list);
        $ci->email->subject('judul email');
        $ci->email->message('isi email');
        if ($this->email->send()) {
            echo 'Email sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }
}
 