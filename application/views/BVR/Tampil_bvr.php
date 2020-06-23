<?php
if (empty($hasil))
{
  echo "data masih kosong!";
}
else
{
  ?>
  <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Panin Scheduler</title>

<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-table.css" rel="stylesheet">

<!--Icons-->
<script src="<?php echo base_url(); ?>assets/js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
  	
<div class="col-md-15">
				<div class="panel panel-default">
					<div class="panel-heading">View Schedule</div>
					<div class="panel-body">			
						<table data-toggle="table" id="table-style" data-url="tables/data2.json" data-row-style="rowStyle">
						    <thead>
						    <tr align="center">
						        <th data-field="id" data-align="right" > No </th>
						        <th data-field="visit" > Tanggal Visit </th>
						        <th data-field="kode" > Nama Cabang </th>
						        <th data-field="cabang" > Suhu Ruang Server </th>
						        <th data-field="cabang" > Suhu Keluaran AC </th>
						        <th data-field="input" > Volt Input UPS </th>
						        <th data-field="bateray" > UPS Bateray Backup </th>
						        <th data-field="output" > Volt Output UPS </th>
						        <th data-field="bersih" > Kebersihan Server </th>
						        <th data-field="cctv" > Check CCTV </th>
						        <th data-field="cbsteller" > Date & Time CBS TELLER  </th>
						        <th data-field="crm" > Aplikasi CRM </th>
						        <th data-field="sophos" > Update Sophos  </th>
						        <th data-field="ratm" > Kebersihan Ruang ATM </th>
						        <th data-field="sttus" > Status ATM </th>
						        <th data-field="atm" > UPS ATM </th>
						        <th data-field="ac" > AC </th>
						        <th data-field="info" > Sticker Informasi </th>
						        <th data-field="fisik" > Fisik ATM </th>
						        <th data-field="image" > Backup Image </th>
						        <th data-field="sql" > Backup SQL </th>
						        <th data-field="catatan" > Catatan </th>
						        <th data-field="aksi" colspan="2" > Aksi </th>
						    </tr>
						    </thead>
						    <?php 
							$no = 1; 
							foreach ($hasil as $data): 
							?> 
							<tr>  
							 <td> <?php echo $no; ?> </td> 
							 <td> <?php echo $data->date_visit; ?></td> 
							 <td> <?php echo $data->kd_cabang."-".$data->nama_cabang; ?> </td> 
							 <td> <?php echo $data->suhu_r_server; ?>° </td> 
							 <td> <?php echo $data->suhu_out_ac; ?>° </td> 
							 <td> <?php echo $data->input_ups; ?> </td> 
							 <td> <?php echo $data->ups_bateray; ?> </td> 
							 <td> <?php echo $data->output_ups; ?> </td> 
							 <td> <?php echo $data->clean_r_server; ?> </td> 
							 <td> <?php echo $data->check_cctv; ?> </td> 
							 <td> <?php echo $data->datetime_cbsteller; ?> </td> 
							 <td> <?php echo $data->crm; ?> </td> 
							 <td> <?php echo $data->update_sophos; ?> </td> 
							 <td> <?php echo $data->clean_r_atm; ?> </td> 
							 <td> <?php echo $data->status_atm; ?> </td> 
							 <td> <?php echo $data->ups_atm; ?> </td> 
							 <td> <?php echo $data->AC; ?> </td> 
							 <td> <?php echo $data->sticker_informasi; ?> </td> 
							 <td> <?php echo $data->fisik_atm; ?> </td> 
							 <td> <?php echo $data->backup_image; ?> </td> 
							 <td> <?php echo $data->backup_sql; ?> </td> 
							 <td> <?php echo $data->catatan; ?> </td> 
							 <td align="center" width="30"> <a href='<?php echo base_url('bvr/update/'.$data->id);?>' rel="example_group" class="link" 
										style="float:left;">EDIT </a> </td>
							  <td align="center" width="30"><a href="<?php echo base_url('bvr/hapus/'.$data->id);?>"
							 			onClick="return confirm('Anda yakin...??')" class="link" style="float:left;">Hapus</a>
							  </td>
							</tr> 
							<?php 
								$no++; 
								endforeach; 
								?>  
								<?php  
								} 
								?> 
						</table>
						<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>
					</div>
				</div>
			</div>
		</div><!--/.row-->	

</form>
</body>
</html>

<a href="<?php echo base_url()?>Bvr">Kembali ke Home</a><br>
