<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model	 {

	
	public function __construct()
	{
        parent::__construct();
    }

	/*public function getKodeGolongan()
	{
        $q = $this->db->query("select MAX(RIGHT(kd_golongan,2)) as code_max from tbl_golongan");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf($tmp);
            }
        }else{
            $code = "01";
        }
        return "G00".$code;
    }
	*/

	public function tambah_user($data = array())
	{
		$this->db->insert('user_email', $data);
	}

	public function get_all_user() 
	{
		$query = $this->db->get('user_email');
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $data) 
			{
				$hasil[]=$data;
			}
			return $hasil;
		}
	}

	public function get_all_usermail() 
	{
		$aa = $this->db->query('select nama_email from user_email ');
		if ($aa->num_rows() > 0) 
		{
			foreach ($aa->result() as $data) 
			{
				$hasil[]=$data;
			}
			return $hasil;
		}
	}

	function getById($id)
	{ 
  		$this->db->where('id', $id); 
  		return $this->db->get('user_email')->row();
  		
  	}
  	function m_update($data,$id)
	{
		$this->db->where('id', $id);
        $this->db->update('user_email',$data);
	}

	function delete($id)
	{
		$this->db->where('id',$id);
	 	$this->db->delete('user_email'); 
	}

	function getby($table,$condition){
		$this->db->where($condition);
		return $this->db->get($table)->row();
	}

}
