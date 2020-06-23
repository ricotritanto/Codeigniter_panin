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
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg> Update Branch Visit Report</div>
          <div class="panel-body">
            <form class="form-horizontal" action="<?php echo base_url().'Bvr/update_data' ?>" method="post">
              <fieldset>
                <!-- Name input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="name">Nama Cabang</label>
                  <div class="col-md-9">
                  <select class="form-control" name="nm_cabang">
                   <?php
                    foreach ($cbg as $key )
                    {
                         if($key->no_id==$hasil[0]->no_id){
                          echo "<option value=".$key->no_id." selected='selected'>".$key->kd_cabang."--".$key->nama_cabang."</option>";
                         }else{
                          echo "<option value=".$key->no_id.">".$key->kd_cabang."--".$key->nama_cabang."</option>";
                         } 
                    }
                   ?>
                  </select>
                  </div>
                </div>
              
                <!-- Email input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="visit">Tanggal Visit</label>
                  <div class="col-md-9">
                    <input class="form-control datepicker" name="tgl_visit" value="<?php echo $hasil[0]->date_visit;?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="suhuserver">Cek Suhu Ruang Server</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="suhu_r_server" maxlength="2" value="<?php echo $hasil[0]->suhu_r_server;?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="suhuac">Cek Suhu Keluaran AC</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="keluaran_ac" maxlength="2" value="<?php echo $hasil[0]->suhu_out_ac;?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="suhu">Volt input UPS Rack Server</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="input_ups" maxlength="3" value="<?php echo $hasil[0]->input_ups;?>" required>
                  </div>
                </div>

                <!-- radio button -->
                <div class="form-group">
                  <label  class="col-md-3 control-label" for="ups">UPS Bateray backup</label>
                  <div class="col-md-9">
                      <?php foreach ($hasil as $key )
                        {
                            if ($key->ups_bateray=="Ok")
                            {
                                echo "<label><input type='radio' name='ups_bateray' value='Ok'  checked> Ok </label>
                                          <label><input type='radio' name='ups_bateray' value='Not Ok'> Not Ok </td></label>";
                            }
                            else
                            {
                                echo "<label><input type='radio' name='ups_bateray' value='Ok'> Ok </label>
                                      <label><input type='radio' name='ups_bateray' value='Not Ok' checked> Not Ok </td></label>";
                            }
                        }
                      ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="out">Volt Output UPS Rack Server</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="output_ups" maxlength="3" value="<?php echo $hasil[0]->output_ups;?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label"> Kebersihan Ruang Server / rack server</label>
                  <div class="col-md-9">
                     <?php foreach ($hasil as $key )
                      {
                        if ($key->clean_r_server=="Ok")
                        {
                            echo "<input type='radio' name='Kebersihan' value='Ok'  checked> Ok </label>
                                      <input type='radio' name='Kebersihan' value='Not Ok'> Not Ok </label>";
                        }
                        else
                        {
                            echo "<label><input type='radio' name='Kebersihan' value='Ok'> Ok </label>
                                  <label><input type='radio' name='Kebersihan' value='Not Ok' checked> Not Ok </label>";
                        }
                      }
                     ?>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-md-3 control-label" for="cctv">Check CCTV</label>
                  <div class="col-md-9">
                    <input class="form-control datepicker" name="tgl_cctv" value="<?php echo $hasil[0]->check_cctv;?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="cbs">Date & Time CBS TELLER</label>
                  <div class="col-md-9">
                    <?php foreach ($hasil as $key )
                      {
                        if ($key->datetime_cbsteller=="Ok")
                        {
                            echo "<label><input type='radio' name='cbsteller' value='Ok'  checked> Ok </label>
                                  <label><input type='radio' name='cbsteller' value='Not Ok'> Not Ok </label>";
                        }
                        else
                        {
                            echo "<label><input type='radio' name='cbsteller' value='Ok'> Ok </label>
                                  <label><input type='radio' name='cbsteller' value='Not Ok' checked> Not Ok </label>";
                        }
                      }
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="crm">Aplikasi CRM Berjalan (PC PB)</label>
                  <div class="col-md-9">
                    <?php foreach ($hasil as $key )
                      {
                        if ($key->crm=="Ok")
                        {
                            echo "<label><input type='radio' name='crm' value='Ok'  checked> Ok </label>
                                  <label><input type='radio' name='crm' value='Not Ok'> Not Ok </label>";
                        }
                        else
                        {
                            echo "<label><input type='radio' name='crm' value='Ok'> Ok </label>
                                  <label><input type='radio' name='crm' value='Not Ok' checked> Not Ok </label>";
                        }
                      }
                    ?>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-md-3 control-label" for="sophos">Update Antivirus Sophos</label>
                  <div class="col-md-9">
                    <input class="form-control datepicker" name="tgl_sophos" value="<?php echo $hasil[0]->update_sophos;?>" required>
                  </div>
                </div>


                <div class="form-group">
                  <label  class="col-md-3 control-label" for="atme">Kebersihan Ruang ATM</label>
                  <div class="col-md-9">
                    <?php foreach ($hasil as $key )
                      {
                        if ($key->clean_r_atm="Ok")
                        {
                            echo "<label><input type='radio' name='c_r_atm' value='Ok'  checked> Ok </label>
                                  <label><input type='radio' name='c_r_atm' value='Not Ok'> Not Ok </label>";
                        }
                        else
                        {
                            echo "<label><input type='radio' name='c_r_atm' value='Ok'> Ok </label>
                                  <label><input type='radio' name='c_r_atm' value='Not Ok' checked> Not Ok </label>";
                        }
                      }
                    ?>
                  </div>
                </div>


                <div class="form-group">
                  <label  class="col-md-3 control-label" for="sttusatm">Status ATM</label>
                  <div class="col-md-9">
                    <?php foreach ($hasil as $key )
                      {
                        if ($key->status_atm="Ok")
                        {
                            echo "<label><input type='radio' name='sttus_atm' value='Ok'  checked> Ok </label>
                                  <label><input type='radio' name='sttus_atm' value='Not Ok'> Not Ok </label>";
                        }
                        else
                        {
                            echo "<label><input type='radio' name='sttus_atm' value='Ok'> Ok </label>
                                  <label><input type='radio' name='sttus_atm' value='Not Ok' checked> Not Ok </label>";
                        }
                      }
                   ?>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="clean">UPS ATM</label>
                  <div class="col-md-9">
                    <?php foreach ($hasil as $key )
                    {
                        if ($key->ups_atm="Ok")
                        {
                            echo "<label><input type='radio' name='ups_atm' value='Ok'  checked> Ok </label>
                                  <label><input type='radio' name='ups_atm' value='Not Ok'> Not Ok </label>";
                        }
                        else
                        {
                            echo "<label><input type='radio' name='ups_atm' value='Ok'> Ok </label>
                                  <label><input type='radio' name='ups_atm' value='Not Ok' checked> Not Ok </label>";
                        }
                    }
                  ?>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="acene">AC</label>
                  <div class="col-md-9">
                    <?php foreach ($hasil as $key )
                      {
                        if ($key->AC="Ok")
                        {
                            echo "<label><input type='radio' name='ac' value='Ok'  checked> Ok </label>
                                  <label><input type='radio' name='ac' value='Not Ok'> Not Ok </label>";
                        }
                        else
                        {
                            echo "<label><input type='radio' name='ac' value='Ok'> Ok </label>
                                  <label><input type='radio' name='ac' value='Not Ok' checked> Not Ok </label>";
                        }
                      }
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="info">Sticker Informasi</label>
                  <div class="col-md-9">
                    <?php foreach ($hasil as $key )
                      {
                        if ($key->sticker_informasi="Ok")
                        {
                            echo "<label><input type='radio' name='Informasi' value='Ok'  checked> Ok </label>
                                  <label><input type='radio' name='Informasi' value='Not Ok'> Not Ok </label>";
                        }
                        else
                        {
                            echo "<label><input type='radio' name='Informasi' value='Ok'> Ok </label>
                                  <label><input type='radio' name='Informasi' value='Not Ok' checked> Not Ok </label>";
                        }
                      }
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="fisik">Fisik Atm</label>
                  <div class="col-md-9">
                    <l<?php foreach ($hasil as $key )
                    {
                        if ($key->fisik_atm="Ok")
                        {
                            echo "<label><input type='radio' name='fisik_atm' value='Ok'  checked> Ok </label>
                                   <label><input type='radio' name='fisik_atm' value='Not Ok'> Not Ok </label>";
                        }
                        else
                        {
                            echo "<label><input type='radio' name='fisik_atm' value='Ok'> Ok 
                                  <label><input type='radio' name='fisik_atm' value='Not Ok' checked> Not Ok </label>";
                        }
                    }
                  ?>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="image">Backup Image</label>
                  <div class="col-md-9">
                    <?php foreach ($hasil as $key )
                      {
                        if ($key->backup_image="Copy")
                        {
                            echo "<label><input type='radio' name='backup_image' value='Copy'  checked> Copy </label>
                                  <label><input type='radio' name='backup_image' value='Not copy'> Not copy </label>";
                        }
                        else
                        {
                            echo "<label><input type='radio' name='backup_image' value='Copy'> Copy </label>
                                  <label><input type='radio' name='backup_image' value='Not copy' checked> Not copy </label>";
                        }
                      }
                    ?>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="image">Backup Sql</label>
                  <div class="col-md-9">
                    <?php foreach ($hasil as $key )
                      {
                        if ($key->backup_sql="Copy")
                        {
                            echo "<label><input type='radio' name='backup_sql' value='Copy'  checked> Copy 
                                  <label><input type='radio' name='backup_sql' value='Not copy'> Not copy </td>";
                        }
                        else
                        {
                            echo "<label><input type='radio' name='backup_sql' value='Copy'> Copy </label>
                                  <label><input type='radio' name='backup_sql' value='Not copy' checked> Not copy </label>";
                        }
                      }
                    ?>
                  </div>
                </div
                
                <!-- Message body -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="message">Catatan</label>
                  <div class="col-md-9">
                    <textarea class="form-control" name="catatan" rows="5" required><?php echo $hasil[0]->catatan;?></textarea>
                  </div>
                </div>
                
                <!-- Form actions -->
                <div class="form-group">
                    <button type="submit" class="btn btn-info" > Update </button> 
                    <button type="submit" class="btn btn-warning " onclick="myFunction()"> Cancel </button>
                    <input type="hidden" name="id" value="<?php echo $hasil[0]->id; ?>">
                    <input type="hidden" name="stts" value="edit">
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>


</form> 
</table>
</head>

<script>
    $(document).ready(function($){
      $(".datepicker").datepicker({
        format:'dd/mm/yyyy'
      });
      });
// $(document).ready(function($){
//       $(".datepicker").datepicker({format:"dd-mm-yyyy"});
// //       var $j = jQuery.noConflict();
// // $j(".datepicker").datepicker();
//     });
  </script>

