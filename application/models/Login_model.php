<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model	 {

	
	public function __construct()
	{
        parent::__construct();
    }

	public function cek_user($data) 
	{
		$query = $this->db->get_where('usere_login', $data);
		return $query;
	}



	public function tambah_login($data = array())
	{
		$this->db->insert('usere_login', $data);
	}

	public function get_all_login() 
	{
		$query = $this->db->get('usere_login');
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $data) 
			{
				$hasil[]=$data;
			}
			return $hasil;
		}
	}
	function getById($id)
	{ 
  		$this->db->where('uid', $id); 
  		return $this->db->get('usere_login')->row();
  		
  	}
  	function m_update($data,$id)
	{
		$this->db->where('uid', $id);
        $this->db->update('usere_login',$data);
	}

	function delete($id)
	{
		$this->db->where('uid',$id);
	 	$this->db->delete('usere_login'); 
	}


}
