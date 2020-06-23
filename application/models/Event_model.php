<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model	 {

	
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

	public function tambah_event($data = array())
	{
		$this->db->insert('event', $data);
	}

	public function get_all_event() 
	{
		$query = $this->db->query('select * from event, cabang where event.no_id=cabang.no_id
			');
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $data) 
			{
				$hasil[]=$data;
			}
			return $hasil;
		}

		$query = $this->db->get('event');
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $data) 
			{
				$hasil[]=$data;
			}
			return $hasil;
		}
	}

	public function get_event_byId($id) 
	{
		
		$query = $this->db->query("select * from event,cabang where event.no_id=cabang.no_id AND event.id_event
			='".$id."'");
		return $query->result();
	}

	public function get_event_date($tgl_mulai,$tgl_event)
	{
		$query = $this->db->query("SELECT * FROM event,cabang WHERE event.no_id = cabang.no_id AND event.date_event BETWEEN '$tgl_mulai' AND '$tgl_event'");
		
		return $query->result();
	}

	public function delete($id)
	{
		$this->db->where('id_event',$id);
	 	$this->db->delete('event'); 
	}

	public function m_update($data, $id)
	{
		$this->db->where('id_event', $id);
        $this->db->update('event',$data);
    }

}
