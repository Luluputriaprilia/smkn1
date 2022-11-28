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
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
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
				Data Guru
				<small></small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Guru</a></li>
				<li class="active">Data Guru</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">

						<div class="box">
							<div class="box-header">
								<a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span
											class="fa fa-user-plus"></span> Add Guru</a>
								</div>


							<!-- /.box-header -->
							<div class="box-body">
								<table id="example1" class="table table-striped" style="font-size:13px;">
									<thead>
									<tr>
										<th>Photo</th>
										<th>NIP</th>
										<th>Nama</th>
										<th>Tempat/Tgl Lahir</th>
										<th>Jenis Kelamin</th>
										<th>Mata Pelajaran</th>
										<th>pendidikan guru</th>
										<th style="text-align:right;">Aksi</th>
									</tr>
									</thead>
									<tbody>

									<?php foreach ($data->result_array() as $i):
										$guru_id = $i['guru_id'];
										$guru_nama = $i['guru_nama'];
										$guru_nip = $i['guru_nip'];
										$guru_tgl_lhr = $i['guru_tempat_lahir'];
										$guru_tmp_lhr = $i['guru_tgl_lahir'];
										$guru_jenkel = $i['guru_jenkel'];
										$guru_matpel = $i['guru_matpel'];
										$guru_pendidikan_guru = $i['guru_pendidikan_guru'];
										$guru_photo = $i['guru_photo'];
										$gbr = $i['guru_photo'];
										?>

									<tr>

										<td><img width="40" height="40" class="img-circle" src="
												<?php echo base_url() . 'assets/images/' . $guru_photo; ?>">
										</td>

										<td><?php echo $guru_nip; ?></td>
										<td><?php echo $guru_nama; ?></td>
										<td><?php echo $guru_tmp_lhr; ?></td>
										<td><?php echo $guru_tgl_lhr; ?></td>
										<td><?php echo $guru_pendidikan_guru?></td>
										<td><?php if ($guru_jenkel == 'L') {
												echo "Laki-laki";
											} else {
												echo "Perempuan";
											} ?></td>
										<td><?php echo $guru_matpel; ?></td>
										<td style="text-align:right;"
										<a class="btn" data-toggle="modal"
										   data-target="#ModalEdit<?php echo $guru_id; ?>"><span
													class="fa fa-pencil"></span></a>
										<a class="btn"
										   href="<?php echo base_url() . 'admin/guru/reset_password/' . $guru_id; ?>"><span
													class="fa fa-refresh"></span></a>
										<a class="btn" data-toggle="modal"
										   data-target="#ModalHapus<?php echo $guru_id; ?>"><span
													class="fa fa-trash"></span></a>
										</td>
									</tr>
								<?php endforeach; ?>
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
				<h4 class="modal-title" id="myModalLabel"> Add Guru</h4>
			</div>
			<form class="form-horizontal" action="<?php echo base_url() . 'admin/guru/simpan_guru' ?>" method="post"
				  enctype="multipart/form-data">
				<div class="modal-body">

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">NIP</label>
						<div class="col-sm-7">
							<input type="text" name="xnip" class="form-control" id="inputUserName" placeholder="NIP"
								   required onkeypress="return isNumberKey(event)">
						</div>
					</div>

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Nama</label>
						<div class="col-sm-7">
							<input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama"
								   required onkeypress="return isCharKey(event)">
						</div>
					</div>

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
						<div class="col-sm-7">
							<div class="radio radio-info radio-inline">
								<input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
								<label for="inlineRadio1"> Laki-Laki </label>
							</div>
							<div class="radio radio-info radio-inline">
								<input type="radio" id="inlineRadio1" value="P" name="xjenkel">
								<label for="inlineRadio2"> Perempuan </label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Tempat Lahir</label>
						<div class="col-sm-7">
							<input type="text" name="xtmp_lahir" class="form-control" id="inputUserName"
								   placeholder="Tempat Lahir" required onkeypress="return isCharKey(event)">
						</div>
					</div>

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Tanggal Lahir</label>
						<div class="col-sm-7">
							<input type="date" name="xtgl_lahir" class="form-control" id="inputUserName"
								   placeholder="Contoh: 25 September 1993" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Pendidikan Guru</label>
						<div class="col-sm-7">
							<input type="text" name="xpendguru" class="form-control" id="inputUserName"
								   placeholder="Contoh: S1 Teknik Informatika" required>
						</div>
					</div>

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Mata Pelajaran</label>
						<div class="col-sm-7">
							<input type="text" name="xmapel" class="form-control" id="inputUserName"
								   placeholder="Contoh: PPKN, Matematika" required onkeypress="return isCharKey(event)">
						</div>
					</div>

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Photo</label>
						<div class="col-sm-7">
							<input type="file" name="filefoto" required/>
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

<!--Modal Edit Album-->


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
<!-- page script -->
<script>
	function isNumberKey(evt)   // validasi agar text field nya hanya bisa memasukan angka tidak bisa huruf
	{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}

	function isCharKey(evt)  //validasi  agar text field nya hanya bisa memasukan huruf tidak bisa angka
	{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode != 32 && charCode < 65 && charCode > 46)
			return false;
		return true;
	}


</script>


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
			text: "Guru Berhasil disimpan ke database.",
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
			text: "Guru berhasil di update",
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
			text: "Guru Berhasil dihapus.",
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
