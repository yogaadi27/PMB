<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bukti Pendfataran</title>
	
	<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<!-- <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet"> -->
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <style type="text/css">

	@page {

  	margin-top: 3cm;

	margin-bottom: 1.5cm;

	header: myHeader1;

	/*footer: myFooter;*/

	}
	
	td {
	    padding-top: .20em;
	    padding-bottom: .20em;
	}
	</style>
</head>

<body>
<htmlpageheader name="myHeader1" style="display:none">
	<table width="100%" style="border-bottom: 2px solid #000000; vertical-align: top; font-family:
		serif; font-size: 9pt; color: #000088;"><tr>		
		<td width="20%" align="center">
		<div>
			<img src="<?=base_url('assets/ak.png') ?>" width="55px" />
		</div></td>
		<td width="80%" style="text-align: left;">
			<h5>AKADEMI KOMUNITAS NEGERI NGANJUK</h5>
			<h4>KARTU PESERTA UJIAN</h4>
			<h5>Penerimaan Mahasiswa Baru TA. 2017-2018</h5>
		</td>
	</tr>
	</table>
</htmlpageheader>
	<div class="container">
			<table width="100%" style="text-align: left; vertical-align: top; font-family border-spacing: 5px:
			serif; font-size: 10pt; color: #000088;">
			<tr>		
				<td width="20%">
					<p>NAMA Lengkap</p>
					<p>Tgl lahir</p>
					<p>Alamat</p>
					<p>Sekolah Asal</p>
					<p>Prodi Pilihan</p>
					<p>Lokasi Ujian</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>Nganjuk, <?=date('m-d-Y') ?></p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>Administrasi</p>
				</td>
				<td width="60%">
					<p>: <?=$data->nama_pendaftar ?></p>
					<p>: <?=$data->tgl_lahir ?></p>
					<p>: <?=$data->alamat ?></p>
					<p>: <?=$data->sekolah ?></p>
					<p>: <?=$data->jenjang ?> <?=$data->nama_prodi ?></p>
					<p>: Kampus AKN Nganjuk</p>
					<p>&nbsp;&nbsp;Jl.Gatot Subroto 2b .kauman nganjuk</p>
					<p>&nbsp;</p>
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Tes</th>
								<th>Tanggal</th>
								<th>Waktu</th>
							</tr>
						</thead>
						<tbody>
						<?php if ($jadwal): ?>
						<?php foreach ($jadwal as $tes): ?>
							<tr>
						        <td><?=$tes->nama_tes?></td>
						        <td><?=date('d-m-Y', strtotime($tes->tgl_tes)); ?></td>
						       <td><?=$tes->mulai?> <strong>s/d</strong> <?=$tes->sampai?> </td>
						    </tr>
						<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="3">Tidak Ada Tes</td>
							</tr>
						<?php endif; ?>
						</tbody>
					</table>
				</td>
				<td width="20%" style="text-align: center;vertical-align: top;font-size: 10pt;"> 
					<img src="<?=base_url('photo/'.$data->foto.'') ?>" style="border:1px  solid #000000;" width="80px" />
					<p>&nbsp;</p>
					<strong>Pendaftar</strong><br>
					<br>&nbsp;
					<br>&nbsp;
					<br>&nbsp;
					<strong>Yoga Adi Nugraha</strong>
				</td>
			</tr>
			</table>
		<p>&nbsp;</p>
		<div class="alert alert-info">
			<p>* Cetaklah Kertu ini dengan printer berwarna.<br>
				* Ketika Ujian ,Anda Perlu membawa kartu ujian asli hasil verifikasi,kartu identitas asli dan perlengkapan tulis ( Bollpoint, Pensil 2B, Penghapus, Rautan ,dll).</p>
		</div>
	</div>
	<p>------------------------------------------------------------Potong disini------------------------------------------------------------------------</p>
	

</body>
</html>