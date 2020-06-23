<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bvr_model extends CI_Model	 {

	
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

	public function tambah_bvr($data = array())
	{
		$this->db->insert('visit_report', $data);
	}

	public function get_all_bvr() 
	{
		// select date_format(str_to_date('12/31/2011', '%m/%d/%Y'), '%Y%m');
		// $query = $this->db->query("SELECT * FROM visit_report, cabang WHERE visit_report.no_id=cabang.no_id ORDER BY date_visit ASC");
		$query = $this->db->query("select * from visit_report, cabang where visit_report.no_id=cabang.no_id order by str_to_date(date_visit, '%d/%m/%Y') DESC");
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $data) 
			{
				$hasil[]=$data;
			}
			return $hasil;
		}

		$query = $this->db->get('visit_report');
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $data) 
			{
				$hasil[]=$data;
			}
			return $hasil;
		}
	}

	public function get_bvr_byId($id) 
	{
		
		$query = $this->db->query("select * from visit_report,cabang where visit_report.no_id=cabang.no_id AND visit_report.id
			='".$id."'");
		return $query->result();
	}

	
    public function getLapDate($tgl_awal,$tgl_akhir)
    {
       	// STR_TO_DATE(LEFT(reporttime,LOCATE(' ',reporttime)),'%m/%d/%Y') BETWEEN '2010-07-28' AND '2010-07-29'
			$query = $this->db->query("select * from visit_report, cabang where visit_report.no_id=cabang.no_id
			AND date_visit BETWEEN '$tgl_awal' and '$tgl_akhir' ORDER BY str_to_date(date_visit, '%d/%m/%Y') DESC");

       		

		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $data) 
			{
				$hasil[]=$data;
			}
			return $hasil;
		}

		$query = $this->db->get('visit_report');
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $data) 
			{
				$hasil[]=$data;
			}
			return $hasil;
		}

	}
	public function delete($id)
	{
		$this->db->where('id',$id);
	 	$this->db->delete('visit_report'); 
	}

	public function m_update($data, $id)
	{
		$this->db->where('id', $id);
		// $tgl=$this->db->query("select id, date_format(date_visit,'%d-%m-%Y') AS date_visit from visit_report"); 
        $this->db->update('visit_report',$data);
    }

     public function excele()
     {
        $sql3 = "select * from visit_report, cabang where visit_report.no_id=cabang.no_id order by date_visit
			";
        $dapat = $this->db->query($sql3);
        if($dapat->num_rows()>0)
        {
        foreach ($dapat->result() as $barishasil)
        {
           $dapathasil[]=$barishasil;
        }  
        return $dapathasil;  
        }
    }
}
