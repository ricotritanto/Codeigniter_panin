<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang_model extends CI_Model	 {

	
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

	public function tambah_cabang($data = array())
	{
		$this->db->insert('cabang', $data);
	}

	public function get_all_cabang() 
	{
		$query = $this->db->get('cabang');
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
  		$this->db->where('no_id', $id); 
  		return $this->db->get('cabang')->row();
  		
  	}
  	function m_update($data,$id)
	{
		$this->db->where('no_id', $id);
        $this->db->update('cabang',$data);
	}

	function delete($id)
	{
		$this->db->where('no_id',$id);
	 	$this->db->delete('Cabang'); 
	}


}
