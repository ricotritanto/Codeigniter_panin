<?php
 
class Excel_main extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Bvr_model');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }
 
 
    public function aaa($tgl_awal,$tgl_akhir) 
    {
        $this->load->library('excel');

            //activate worksheet number 1
            $this->excel->setActiveSheetIndex(0);

            //name the worksheet
            $this->excel->getActiveSheet()->setTitle('Branch visit report');

            //set cell A1 content with some text
            $this->excel->getActiveSheet()->setCellValue('A1', 'BRANCH VISIT REPORT');
            $this->excel->getActiveSheet()->setCellValue('A2', 'PANIN BANK');
            $this->excel->getActiveSheet()->setCellValue('A4', 'No');
            $this->excel->getActiveSheet()->setCellValue('A5', 'Tanggal Visit');
            $this->excel->getActiveSheet()->setCellValue('A6', 'Nama Cabang');
            $this->excel->getActiveSheet()->setCellValue('A7', 'Suhu Ruang Server');
            $this->excel->getActiveSheet()->setCellValue('A8', 'Suhu AC');
            $this->excel->getActiveSheet()->setCellValue('A9', 'Input UPS');
            $this->excel->getActiveSheet()->setCellValue('A10', 'Output Ups');
            $this->excel->getActiveSheet()->setCellValue('A11', 'UPS Bateray');
            $this->excel->getActiveSheet()->setCellValue('A12', 'Kebersihan Ruang Server');
            $this->excel->getActiveSheet()->setCellValue('A13', 'Check CCTV');
            $this->excel->getActiveSheet()->setCellValue('A14', 'Datetime CBSTeller');
            $this->excel->getActiveSheet()->setCellValue('A15', 'Aplikasi CRM');
            $this->excel->getActiveSheet()->setCellValue('A16', 'Update Sophos');
            $this->excel->getActiveSheet()->setCellValue('A17', 'Kebersihan ATM');
            $this->excel->getActiveSheet()->setCellValue('A18', 'Status ATM');
            $this->excel->getActiveSheet()->setCellValue('A19', 'UPS ATM');
            $this->excel->getActiveSheet()->setCellValue('A20', 'AC');
            $this->excel->getActiveSheet()->setCellValue('A21', 'Sticker Informasi');
            $this->excel->getActiveSheet()->setCellValue('A22', 'Fisik ATM');
            $this->excel->getActiveSheet()->setCellValue('A23', 'Backup Image');
            $this->excel->getActiveSheet()->setCellValue('A24', 'Backup SQL');
            $this->excel->getActiveSheet()->setCellValue('A25', 'Catatan');


            //change the font size
            $this->excel->getActiveSheet()->getStyle('A1:A2')->getFont()->setSize(15);
            $this->excel->getActiveSheet()->getStyle('A4:A25')->getFont()->setSize(13);

            //make the font become bold
            $this->excel->getActiveSheet()->getStyle('A1:A2')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle('A4:A25')->getFont()->setBold(true);

            //merge cell A1 until D1
            // $this->excel->getActiveSheet()->mergeCells('H1:M1');
            // $this->excel->getActiveSheet()->mergeCells('H2:M2');

            $this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
            $this->excel->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);

            //ambil POST
            // $tgl_awal= $this->input->post('tgl_awal');
            // $tgl_akhir= $this->input->post('tgl_akhir');

            $firstValue=4;
            $enter1 = $firstValue;
            $nomer = 1;
            $kolom='B';
            $baris=4;
     
            $aaa= $this->Bvr_model->getLapDate($tgl_awal,$tgl_akhir);
            foreach ($aaa as $key) 
            {
                
                $baris=4;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$nomer);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->date_visit);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->kd_cabang.'-'.$key->nama_cabang);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->suhu_r_server);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->suhu_out_ac);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->input_ups);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->ups_bateray);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->output_ups);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->clean_r_server);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->check_cctv);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->datetime_cbsteller);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->crm);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->update_sophos);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->clean_r_atm);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->status_atm);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->ups_atm);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->AC);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->sticker_informasi);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->fisik_atm);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->backup_image);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->backup_sql);
                $baris++;
                $this->excel->getActiveSheet()->setCellValue($kolom.$baris,$key->catatan);
                $baris++;
                $kolom++;
                $nomer++;
            }

            //membuat garis pada tabel excel
            $no=$enter1++; //membuat garis mengikuti jumlahnya data
            $sharedStyle1 = new PHPExcel_Style();
            $sharedStyle1->applyFromArray(
             array('borders' => array(
             'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
             'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
             'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
             'left' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
             ),
             ));

            //set border dari cell A4 sampai V
            // $this->excel->getActiveSheet()->setSharedStyle($sharedStyle1, "A4:A25");

            // Set style for header row using alternative method
            $this->excel->getActiveSheet()->getStyle('A4:A25')->applyFromArray(
                 array
                 (
                    'font' => array
                 (
                    'bold' => true
                 ),
                    'alignment' => array
                 (
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                 ),
                    'borders' => array
                    (
                    '  top' => array
                    (
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                    ),
                    'fill' => array
                    (
                     'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                     'rotation' => 90,
                     'startcolor' => array
                     (
                     'argb' => 'FFA0A0A0'
                    ),
                     'endcolor' => array
                     (
                     'argb' => 'FFFFFFFF'
                    )
                )
                )
                );

            //set aligment to center for that merged cell (A1 to D1)
            $this->excel->getActiveSheet()
                        ->getStyle('B1:P1000')
                        ->getAlignment()
                        ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
             
            // $filename='Branch visit report.xls'; //save our workbook as this file name
            // header('Content-Type: application/vnd.ms-excel'); //mime type
            // header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
            // header('Cache-Control: max-age=0'); //no cache
                        
            // //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
            // //if you want to save it as .XLSX Excel 2007 format
            // $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
            // //force user to download the Excel file without writing it to server's HD
            // $objWriter->save('download/'.$filename);
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Branch visit report.xls"');
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
            $objWriter->save('php://output');
            exit;
 
            // // Save Excel 2007 file
            // $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
            // $objWriter->save(str_replace('.php', '.xlsx', __FILE__));
    }
 
} 
                                   