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

<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Update Schedule</div>
					<div class="panel-body">			
						<table data-toggle="table" id="table-style" data-url="tables/data2.json" data-row-style="rowStyle">
						    <thead>
						    <tr align="center">
						        <th data-field="id" data-align="right" > No </th>
						        <th data-field="kode" > Kode Cabang </th>
						        <th data-field="cabang" > Nama Cabang </th>
						        <th data-field="cabang" > Schedule </th>
						        <th data-field="tgl" > Tanggal schedule </th>
						        <th data-field="aksi" colspan="3" > Aksi </th>

						    </tr>
						    </thead>
						    <?php 
							$no = 1; 
							foreach ($hasil as $data): 
							?> 
							<tr>  
							 <td> <?php echo $no; ?> </td> 
							 <td> <?php echo $data->kd_cabang; ?> </td> 
							 <td> <?php echo $data->nama_cabang; ?> </td> 
							 <td> <?php echo $data->nama_event; ?> </td> 
							 <td> <?php echo $data->date_event; ?> </td> 
							 <td align="center" width="30"> <a href='<?php echo base_url('event/update/'.$data->id_event);?>' rel="example_group" class="link" 
										style="float:left;">EDIT</a></td>
							 <td align="center" width="30"> <a href="<?php echo base_url('event/hapus/'.$data->id_event);?>"
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





























