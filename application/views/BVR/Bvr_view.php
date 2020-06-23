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



<div class="row">
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg> Add New Branch Visit Report</div>
          <div class="panel-body">
            <form class="form-horizontal" action="<?php echo base_url().'Bvr/tambah_bvr' ?>" method="post">
              <fieldset>
                <!-- Name input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="name">Nama Cabang</label>
                  <div class="col-md-9">
                  <select class="form-control" name="nm_cabang">
                  <?php
                    foreach ($cabang as $key ) 
                    {
                      echo "<option value=".$key->no_id.">".$key->kd_cabang."-".$key->nama_cabang."</option>";
                    }
                  ?>
                  </select>
                  </div>
                </div>
              
                <!-- Email input-->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="visit">Tanggal Visit</label>
                  <div class="col-md-9">
                    <input class="form-control datepicker" name="tgl_visit" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="suhuserver">Cek Suhu Ruang Server</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="suhu_r_server" maxlength="2" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="suhuac">Cek Suhu Keluaran AC</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="keluaran_ac" maxlength="2" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="suhu">Volt input UPS Rack Server</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="input_ups" maxlength="3" required>
                  </div>
                </div>

                <!-- radio button -->
                <div class="form-group">
                  <label  class="col-md-3 control-label" for="ups">UPS Bateray backup</label>
                  <div class="col-md-9">
                    <label>
                      <input type="radio" name="ups_batteray" value="Ok" required> OK 
                    </label>
                    <label>
                      <input type="radio" name="ups_batteray" value="Not Ok" required> Not Ok 
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="out">Volt Output UPS Rack Server</label>
                  <div class="col-md-9">
                    <input class="form-control" type="text" name="output_ups" maxlength="3" required>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label"> Kebersihan Ruang Server / rack server</label>
                  <div class="col-md-9">
                    <label>
                      <input type="radio" name="kebersihan" value="Ok" required> OK 
                    </label>
                    <label>
                      <input type="radio" name="kebersihan" value="Not Ok" required> Not Ok
                    </label>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-md-3 control-label" for="cctv">Check CCTV</label>
                  <div class="col-md-9">
                    <input class="form-control datepicker" name="tgl_cctv" required>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="cbs">Date & Time CBS TELLER</label>
                  <div class="col-md-9">
                    <label>
                      <input type="radio" name="cbsteller" value="Ok" required> OK 
                    </label>
                    <label> 
                      <input type="radio" name="cbsteller" value="Not Ok" required>Not Ok
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="crm">Aplikasi CRM Berjalan (PC PB)</label>
                  <div class="col-md-9">
                    <label>
                      <input type="radio" name="crm" value="Ok" required> OK 
                    </label>
                    <label>
                      <input type="radio" name="crm" value="Not Ok" required> Not Ok
                    </label>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-md-3 control-label" for="sophos">Update Antivirus Sophos</label>
                  <div class="col-md-9">
                    <input class="form-control datepicker" name="tgl_sophos" required>
                  </div>
                </div>


                <div class="form-group">
                  <label  class="col-md-3 control-label" for="atme">Kebersihan Ruang ATM</label>
                  <div class="col-md-9">
                    <label>
                      <input type="radio" name="c_r_atm" value="Ok" required> OK 
                    </label>
                    <label>
                      <input type="radio" name="c_r_atm" value="Not Ok" required> Not Ok
                    </label>
                  </div>
                </div>


                <div class="form-group">
                  <label  class="col-md-3 control-label" for="sttusatm">Status ATM</label>
                  <div class="col-md-9">
                    <label>
                      <input type="radio" name="sttus_atm" value="Ok" required> OK
                    </label>
                    <label>
                      <input type="radio" name="sttus_atm" value="Not Ok" required> Not Ok
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="clean">UPS ATM</label>
                  <div class="col-md-9">
                    <label>
                      <input type="radio" name="ups_atm" value="Ok" required> OK 
                    </label>
                    <label>
                      <input type="radio" name="ups_atm" value="Not Ok" required> Not Ok
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="acene">AC</label>
                  <div class="col-md-9">
                    <label>
                      <input type="radio" name="ac" value="Ok" required> OK
                    </label>
                    <label>
                      <input type="radio" name="ac"  value="Not Ok" required> Not Ok
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="info">Sticker Informasi</label>
                  <div class="col-md-9">
                    <label>
                      <input type="radio" name="informasi"  value="Ok" required> OK
                    </label>
                    <label>
                      <input type="radio" name="informasi"  value="Not Ok" required> Not Ok
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="fisik">Fisik Atm</label>
                  <div class="col-md-9">
                    <label>
                      <input type="radio" name="fisik"  value="Ok" required> OK
                    </label>
                    <label>
                      <input type="radio" name="fisik"  value="Not Ok" required> Not Ok
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="image">Backup Image</label>
                  <div class="col-md-9">
                    <label>
                      <input type="radio" name="image" value="Copy" required> Copy
                    </label>
                    <label>
                      <input type="radio" name="image" value="Not Copy" required> Not Copy
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-md-3 control-label" for="image">Backup Sql</label>
                  <div class="col-md-9">
                    <label>
                      <input type="radio" name="sql" value="Copy" required> Copy
                      </label>
                      <label>
                      <input type="radio" name="sql" value="Not Copy" required> Not Copy
                    </label>
                  </div>
                </div
                
                <!-- Message body -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="message">Catatan</label>
                  <div class="col-md-9">
                    <textarea class="form-control" name="catatan" placeholder="type your message here..." rows="5" required></textarea>
                  </div>
                </div>
                
                <!-- Form actions -->
                <div class="form-group">
                  <div class="col-md-12 widget-right">
                    <button type="submit" class="btn btn-default btn-md pull-right">Save</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>


</form> 
<a href="<?php echo base_url().'Bvr/list_bvr' ?>">+ View data</a>  || <a href="<?php echo base_url().'Bvr/search_bvr' ?>">+ Search data</a>
</table>
</head>

<script>
    $(document).ready(function($){
      $(".datepicker").datepicker({
        format:'dd/mm/yyyy'
      });
      });
  </script>

