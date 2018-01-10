
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PMB AKN Nganjuk</title>


    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

</head>

<body>
  <div class="container">
  	<div class="row">
  		<div class="col-lg-12">
  			<div class="page-header">
			  <h1><i class="fa fa-fw fa-file-text"></i> Mahasiswa Baru yang diterima</h1>
			  <h2>Tahun Akademik <?=$thak->tahun_ajaran  ?></h2>
			</div>
			<h2><span class="label label-success"><?=$det->jenjang ?> <?=$det->nama_prodi ?></span></h2>
			<div class="alert alert-success" role="alert">
			<li>Jumlah Kuota : <label class="label label-primary"><b><?=$det->kuota ?> mahasiswa</b></label></li>
			<li>Nama yang tidak tercantum dalam Lampiran Ini di nyatakan <label class="label label-danger"><b>Tidak Lulus</b></label></li>
			<li>Bagi yang lulus harap melakukan <label class="label label-success"><b>Daftar Ulang</b> </label></li>
			</div>
			<table class="table table-hover">
			  <thead>
			  	<tr>
			  		<th>No</th>
			  		<th>Nama Pendaftar</th>
			  		<th>Asal Sekolah</th>
			  		<th>Nilai Tes</th>
			  		
			  		<th></th>
			  	</tr>
			  </thead>
			  <tbody>
			 	<?php $no=0; foreach ($maba as $siswa): $no++; ?>
			 		<tr>
			 			<td><?=$no ?></td>
			 			<td><?=$siswa->nama_pendaftar ?> </td>
			 			<td><?=$siswa->sekolah ?> </td>
			 			<td><?=$siswa->nilai_tes ?></td>
			 			
			 			<td><label class="label label-success">Lulus</label></td>
			 		</tr>
			 	<?php endforeach ?>
			  </tbody>
			</table>
  		</div>
  	</div>
  </div>
</body>
</html>
