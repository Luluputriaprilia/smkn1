<!--Counter Inbox-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SMKN 1 Garut</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shorcut icon" type="text/css" href="<?php echo base_url() ?>tampilan/img/favicon.png">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css' ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/font-awesome/css/font-awesome.min.css' ?>">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.css' ?>">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datepicker/datepicker3.css' ?>">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
		 folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">
	<link rel="stylesheet" type="text/css"
		  href="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.css' ?>"/>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<?php
	$this->load->view('admin/v_header');
	?>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">

			<!-- /.search form -->
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<?php
			$this->load->view('admin/v_menu');
			?>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Data Agenda
				<small></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Agenda</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">

						<div class="box">
							<?php
							if ($this->session->userdata('akses') == '1') {
								?>
								<div class="box-header">
									<a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span
												class="fa fa-plus"></span> Add Agenda</a>
								</div>
							<?php } ?>
							<!-- /.box-header -->
							<div class="box-body">
								<table id="example1" class="table table-striped" style="font-size:12px;">
									<thead>
									<tr>
										<th style="width:70px;">#</th>
										<th>Agenda</th>
										<th>Tanggal</th>
										<th>Tempat</th>
										<th>Waktu</th>
										<th>Author</th>
										<?php
										if ($this->session->userdata('akses') == '1') {
											?>
											<th style="text-align:right;">Aksi</th>
										<?php } ?>
									</tr>
									</thead>
									<tbody>

									<tr>
										<td>22 Oktober 2022</td>
										<td>Agenda Aja</td>
										<td>22 Oktober 2022</td>
										<td>Garut</td>
										<td>07:00 - 08:00</td>
										<td>Andri</td>
										<td style="text-align:right;">

											<a class="btn" data-toggle="modal"><span class="fa fa-pencil"></span></a>
											<a class="btn" data-toggle="modal"><span class="fa fa-trash"></span></a>

										</td>
									</tr>

									<tr>
										<td>22 Oktober 2022</td>
										<td>Agenda Aja</td>
										<td>22 Oktober 2022</td>
										<td>Garut</td>
										<td>07:00 - 08:00</td>
										<td>Andri</td>
										<td style="text-align:right;">

											<a class="btn" data-toggle="modal"><span class="fa fa-pencil"></span></a>
											<a class="btn" data-toggle="modal"><span class="fa fa-trash"></span></a>

										</td>
									</tr>

									<tr>
										<td>22 Oktober 2022</td>
										<td>Agenda Aja</td>
										<td>22 Oktober 2022</td>
										<td>Garut</td>
										<td>07:00 - 08:00</td>
										<td>Andri</td>
										<td style="text-align:right;">

											<a class="btn" data-toggle="modal"><span class="fa fa-pencil"></span></a>
											<a class="btn" data-toggle="modal"><span class="fa fa-trash"></span></a>

										</td>
									</tr>

									</tbody>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">

		<strong>Copyright <?php echo date('Y'); ?> by SMKN 1 Garut</strong>
	</footer>
	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Create the tabs -->
		<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
			<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
			<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		</ul>
		<!-- Tab panes -->

	</aside>
	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
		 immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--Modal Add Pengguna-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true"><span class="fa fa-close"></span></span></button>
				<h4 class="modal-title" id="myModalLabel">Add Agenda</h4>
			</div>
			<form class="form-horizontal" action="<?php echo base_url() . 'admin/agenda/simpan_agenda' ?>" method="post"
				  enctype="multipart/form-data">
				<div class="modal-body">

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Nama Agenda</label>
						<div class="col-sm-7">
							<input type="text" name="xnama_agenda" class="form-control" id="inputUserName"
								   placeholder="Nama Agenda" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
						<div class="col-sm-7">
							<textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..."
									  required></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Mulai</label>
						<div class="col-sm-7">
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" name="xmulai" class="form-control pull-right" id="datepicker"
									   required>
							</div>
						</div>
						<!-- /.input group -->
					</div>
					<!-- /.form group -->

					<!-- Date range -->
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Selesai</label>
						<div class="col-sm-7">
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" name="xselesai" class="form-control pull-right" id="datepicker2"
									   required>
							</div>
						</div>
						<!-- /.input group -->
					</div>
					<!-- /.form group -->
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Tempat</label>
						<div class="col-sm-7">
							<input type="text" name="xtempat" class="form-control" id="inputUserName"
								   placeholder="Tempat" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Waktu</label>
						<div class="col-sm-7">
							<input type="text" name="xwaktu" class="form-control" id="inputUserName"
								   placeholder="Contoh: 10.30-11.00 WIB" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
						<div class="col-sm-7">
							<textarea class="form-control" name="xketerangan" rows="2"
									  placeholder="Keterangan ..."></textarea>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php foreach ($data->result_array() as $i) :
	$agenda_id = $i['agenda_id'];
	$agenda_nama = $i['agenda_nama'];
	$agenda_deskripsi = $i['agenda_deskripsi'];
	$agenda_mulai = $i['agenda_mulai'];
	$agenda_selesai = $i['agenda_selesai'];
	$agenda_tempat = $i['agenda_tempat'];
	$agenda_waktu = $i['agenda_waktu'];
	$agenda_keterangan = $i['agenda_keterangan'];
	$agenda_author = $i['agenda_author'];
	$tangal = $i['tanggal'];
	?>


	<!--Modal Edit Pengguna-->
	<div class="modal fade" id="ModalEdit<?php echo $agenda_id; ?>" tabindex="-1" role="dialog"
		 aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true"><span class="fa fa-close"></span></span></button>
					<h4 class="modal-title" id="myModalLabel">Edit Agenda</h4>
				</div>
				<form class="form-horizontal" action="<?php echo base_url() . 'admin/agenda/update_agenda' ?>"
					  method="post" enctype="multipart/form-data">
					<div class="modal-body">

						<div class="form-group">
							<label for="inputUserName" class="col-sm-4 control-label">Nama Agenda</label>
							<div class="col-sm-7">
								<input type="hidden" name="kode" value="<?php echo $agenda_id; ?>">
								<input type="text" name="xnama_agenda" class="form-control"
									   value="<?php echo $agenda_nama; ?>" id="inputUserName" placeholder="Nama Agenda"
									   required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
							<div class="col-sm-7">
								<textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..."
										  required><?php echo $agenda_deskripsi; ?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="inputUserName" class="col-sm-4 control-label">Mulai</label>
							<div class="col-sm-7">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" name="xmulai" value="<?php echo $agenda_mulai; ?>"
										   class="form-control pull-right datepicker3" required>
								</div>
							</div>
							<!-- /.input group -->
						</div>
						<!-- /.form group -->

						<!-- Date range -->
						<div class="form-group">
							<label for="inputUserName" class="col-sm-4 control-label">Selesai</label>
							<div class="col-sm-7">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" name="xselesai" value="<?php echo $agenda_selesai; ?>"
										   class="form-control pull-right datepicker4" required>
								</div>
							</div>
							<!-- /.input group -->
						</div>
						<!-- /.form group -->
						<div class="form-group">
							<label for="inputUserName" class="col-sm-4 control-label">Tempat</label>
							<div class="col-sm-7">
								<input type="text" name="xtempat" class="form-control"
									   value="<?php echo $agenda_tempat; ?>" id="inputUserName" placeholder="Tempat"
									   required>
							</div>
						</div>
						<div class="form-group">
							<label for="inputUserName" class="col-sm-4 control-label">Waktu</label>
							<div class="col-sm-7">
								<input type="text" name="xwaktu" class="form-control"
									   value="<?php echo $agenda_waktu; ?>" id="inputUserName"
									   placeholder="Contoh: 10.30-11.00 WIB" required>
							</div>
						</div>

						<div class="form-group">
							<label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
							<div class="col-sm-7">
								<textarea class="form-control" name="xketerangan" rows="2"
										  placeholder="Keterangan ..."><?php echo $agenda_keterangan; ?></textarea>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php foreach ($data->result_array() as $i) :
	$agenda_id = $i['agenda_id'];
	$agenda_nama = $i['agenda_nama'];
	$agenda_deskripsi = $i['agenda_deskripsi'];
	$agenda_mulai = $i['agenda_mulai'];
	$agenda_selesai = $i['agenda_selesai'];
	$agenda_tempat = $i['agenda_tempat'];
	$agenda_waktu = $i['agenda_waktu'];
	$agenda_keterangan = $i['agenda_keterangan'];
	$agenda_author = $i['agenda_author'];
	$tangal = $i['tanggal'];
	?>
	<!--Modal Hapus Pengguna-->
	<div class="modal fade" id="ModalHapus<?php echo $agenda_id; ?>" tabindex="-1" role="dialog"
		 aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true"><span class="fa fa-close"></span></span></button>
					<h4 class="modal-title" id="myModalLabel">Hapus Agenda</h4>
				</div>
				<form class="form-horizontal" action="<?php echo base_url() . 'admin/agenda/hapus_agenda' ?>"
					  method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<input type="hidden" name="kode" value="<?php echo $agenda_id; ?>"/>
						<p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $agenda_nama; ?></b> ?</p>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datepicker/bootstrap-datepicker.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.js' ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
<!-- page script -->
<script>
	$(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});

		$('#datepicker').datepicker({
			autoclose: true,
			format: 'yyyy-mm-dd'
		});
		$('#datepicker2').datepicker({
			autoclose: true,
			format: 'yyyy-mm-dd'
		});
		$('.datepicker3').datepicker({
			autoclose: true,
			format: 'yyyy-mm-dd'
		});
		$('.datepicker4').datepicker({
			autoclose: true,
			format: 'yyyy-mm-dd'
		});
		$(".timepicker").timepicker({
			showInputs: true
		});

	});
</script>
<?php if ($this->session->flashdata('msg') == 'error'): ?>
	<script type="text/javascript">
		$.toast({
			heading: 'Error',
			text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
			showHideTransition: 'slide',
			icon: 'error',
			hideAfter: false,
			position: 'bottom-right',
			bgColor: '#FF4859'
		});
	</script>

<?php elseif ($this->session->flashdata('msg') == 'success'): ?>
	<script type="text/javascript">
		$.toast({
			heading: 'Success',
			text: "Agenda Berhasil disimpan ke database.",
			showHideTransition: 'slide',
			icon: 'success',
			hideAfter: false,
			position: 'bottom-right',
			bgColor: '#7EC857'
		});
	</script>
<?php elseif ($this->session->flashdata('msg') == 'info'): ?>
	<script type="text/javascript">
		$.toast({
			heading: 'Info',
			text: "Agenda berhasil di update",
			showHideTransition: 'slide',
			icon: 'info',
			hideAfter: false,
			position: 'bottom-right',
			bgColor: '#00C9E6'
		});
	</script>
<?php elseif ($this->session->flashdata('msg') == 'success-hapus'): ?>
	<script type="text/javascript">
		$.toast({
			heading: 'Success',
			text: "Agenda Berhasil dihapus.",
			showHideTransition: 'slide',
			icon: 'success',
			hideAfter: false,
			position: 'bottom-right',
			bgColor: '#7EC857'
		});
	</script>
<?php else: ?>

<?php endif; ?>
</body>
</html>
