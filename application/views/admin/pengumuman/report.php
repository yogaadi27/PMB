<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bukti Pendfataran</title>
	
	<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <style type="text/css">
    
	td {
	    padding-top: .20em;
	    padding-bottom: .20em;
	}
	</style>
</head>

<body>
	<div class="container">
	<table width="100%" style="text-align: center; vertical-align: top; font-family border-spacing: 5px:serif; font-size: 15pt; color: #000088;">
	<tr>		
		<td width="100%">
		<h4>Laporan Data Mahasiswa Baru Tahun Akademik <?=$thak_aktif->tahun_ajaran ?></h4>
		<h3><?=$prodi->nama_prodi ?></h3>

		</td>
	</tr>
	</table>
	<br>
	<table class="table table-bordered table-hover" width="100%" style="font-size: 9pt;">
		<thead>
			<tr>
				<th width="3%">No</th>
				<th width="15%">Nisn</th>
				<th width="25%">Nama</th>
				<th width="10%">Tgl Lahir</th>
				<th width="7%">J.Kel</th>
				<th width="10%">Agama</th>
				<th width="15%" >Email</th>
				<th width="15%" >No_Hp</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=0; foreach ($maba as $mb ): $no++;?>
				<tr>
					<td> <?=$no  ?> </td>
					<td> <?=$mb->nisn  ?> </td>
					<td> <?=$mb->nama_pendaftar  ?> </td>
					<td> <?=$mb->tgl_lahir  ?> </td>
					<td> <?=$mb->jkel  ?> </td>
					<td> <?=$mb->agama  ?> </td>
					<td> <?=$mb->email ?> </td>
					<td> <?=$mb->no_hp  ?> </td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	</div>
	

</body>
</html>