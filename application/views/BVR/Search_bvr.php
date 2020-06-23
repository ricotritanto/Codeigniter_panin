<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Panin Scheduler</title>

<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
  
<!--Icons-->
<script src="<?php echo base_url(); ?>assets/js/lumino.glyphs.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>

<body>
<form method="post" action="<?php echo base_url().'Bvr/search_bvr2' ?>">
<div class="panel-footer">
            <div class="input-group">
                <td>Cari berdasarkan tanggal : </td>
                <input type="text" autocomplete="off" class="datepicker" name="tgl_awal">
                <td>---</td> 
                <input type="text" autocomplete="off" class="datepicker" name="tgl_akhir">
                <button class="btn btn-success btn-md" id="btn-chat">Search</button>
              </span>
            </div>
          </div>



 </form>
 </table>
<script>
    $(document).ready(function($){
      $(".datepicker").datepicker({
format:'dd/mm/yyyy'
});
});
  </script>

   <script>
//     $(document).ready(function($){
//       $(".datepicker").datepicker({format:"dd-mm-yyyy"});
// //       var $j = jQuery.noConflict();
// // $j(".datepicker").datepicker();
//     });
  </script>
  

  
