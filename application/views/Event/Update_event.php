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
  <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Update Schedule</div>
          <div class="panel-body">
            <div class="col-md-6">
              <form role="form" method="post" action="<?php echo base_url().'Event/update_data' ?>">
                <div class="form-group">
                  <label>Nama Cabang</label>
                  <select class="form-control" name="nm_cabang">
                    <?php
                    foreach ($cbg as $key )
                    {
                         if($key->no_id==$hasil[0]->no_id)
                         {
                          echo "<option value=".$key->no_id." selected='selected'>".$key->kd_cabang."--".$key->nama_cabang."</option>";
                         }else{
                          echo "<option value=".$key->no_id.">".$key->kd_cabang."--".$key->nama_cabang."</option>";
                         } 
                    }
                    ?>
                  </select>
                  <!-- <input class="form-control"  name="kd_cabang" required value="<?php echo $hasil[0]->kd_cabang." - ".$hasil[0]->nama_cabang;?>"> -->
                </div>
                                
                <div class="form-group">
                  <label>Nama Schedule</label>
                  <textarea class="form-control" name="event" required value="<?php echo $hasil[0]->nama_event;?>"></textarea> 
                </div>

                 <div class="form-group">
                  <label>Jadwal Schedule</label>
                  <input class="form-control" name="tgl_event" id="datepicker" required value="<?php echo $hasil[0]->date_event;?>">
                </div>

                <button type="submit" class="btn btn-primary" value="Update Data">Update</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <input type="hidden" name="id_event" value="<?php echo $hasil[0]->id_event; ?>">
                <input type="hidden" name="stts" value="edit"></td>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>




</body>
</head>
</html>
<script>
$(function() {
              $( "#datepicker" ).datepicker({ dateFormat: "dd-mm-yyyy" });
          }); 
//     $(document).ready(function($){
//       $(".datepicker").datepicker({dateFormat:"yy-mm-dd"});
// //       var $j = jQuery.noConflict();
// // $j(".datepicker").datepicker();
//     });
  </script>
