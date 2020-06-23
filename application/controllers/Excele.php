<?php
 
class Excele extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Bvr_model');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }
 
 
    public function aaa() 
    {
    		$kolome = array(
					  'A'=>array('name'=>'Data1 || Data2 || Data3'),
                      'B'=>array('name'=>'Data1 || Data2 || Data3'),
                      'C'=>array('name'=>'Data1 || Data2 || Data3'));
    		$nomer = 1;
    		 foreach ($kolome as $key => $val) 
    		 {
    		 	# codechoe...
    		 	 echo "$key ";
    		 	 echo "<br> ";
    		 	 echo "$nomer ". $val['name'] ."";
    		 	$nomer++;
    		 }






    }

    function abc()
    {


    		 $perusahaan = array(
                      'AUTO'=>array('name'=>'Astra Otoparts','location'=>'Kelapa Gading, DKI Jakarta'),
                      'GDG'=>array('name'=>'Gudang Garam ','location'=>'Kediri , Jawa Timur'),
                      'BCA'=>array('name'=>'PT. Bank Central Asia','location'=>'Jakarta Pusat, DKI Jakarta')
                      );

   //lakukan perulangan
   $c=1;
   foreach($perusahaan as $key => $val)
   {
     echo "Nama Perushaan ||  	$key ke $c ". $val['name'] ."<br>";
     $c++;
   }
	}
	
 }














