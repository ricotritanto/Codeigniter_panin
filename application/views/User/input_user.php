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
					<div class="panel-heading">Add New User</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="post" action="<?php echo base_url().'User/tambah_user' ?>">
							
								<div class="form-group">
									<label>Nama User</label>
									<input class="form-control"  name="nama_user">
								</div>
																
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" name="nama_email" required>
								</div>
								<button type="submit" class="btn btn-primary">Save</button>
								<button type="reset" class="btn btn-default">Reset</button>

							</form>
						</div>
					</div>
				</div>
			</div>
	</div>




</body>

</html>