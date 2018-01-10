<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bukti Pendfataran</title>
	
	<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

    <style type="text/css">

	@page {

  	margin-top: 3.5cm;

	margin-bottom: 1.5cm;

	header: myHeader1;

	footer: myFooter;

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
			<img src="<?=base_url('assets/ak.png') ?>" width="75px" />
		</div></td>
		<td width="80%" style="text-align: center;">
			<h5>KEMENTERIAN RISET DAN TEKNOLOGI DAN PENDIDIKAN TINGGi</h5>
			<h3>AKADEMI KOMUNITAS NEGERI NGANJUK</h3>
			<h4>PDD POLITEKNIK NEGERI JEMBER</h4>
			<h5>Jl. Gatot Subroto No. 2 Nganjuk Telp. (0358) 321483 email : aknganjuk@yahoo.com</h5>
		</td>
	</tr>
	</table>
</htmlpageheader>
<htmlpagefooter name="myFooter" style="display:none">

<table width="100%" style="border-top: 2px solid #000000; vertical-align: bottom; font-family: serif; font-size: 8pt;

    color: #000000; font-weight: bold; font-style: italic;"><tr>

    <td width="33%"><span style="font-weight: bold; font-style: italic;"><?=base_url() ?></span></td>

    <td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>

    <td width="33%" style="text-align: right; ">{DATE j-m-Y}</td>

    </tr></table>

</htmlpagefooter>
	<div class="container">
			<table width="100%" style="text-align: center; vertical-align: top; font-family border-spacing: 5px:
			serif; font-size: 15pt; color: #000088;">
			<tr>		
				<td width="80%">
					&nbsp;
				<h2><strong>Bukti Pendaftaran Mahasiswa Baru</strong></h2>
				<h3>Tahun Akademik <?=$data->tahun_ajaran ?></h3>
				&nbsp;
				</td>
				<td width="20%">
					<img src="<?=base_url('photo/'.$data->foto.'') ?>" style="border:1px  solid #000000;" width="100px" />
				</td>
			</tr>
			</table>
			&nbsp;
		<table width="100%" style="vertical-align: top; font-family:
			serif; font-size: 13pt; color: #000088;">
			<tr>		
				<td width="20%">
					<strong>Nama</strong>
				</td>
				<td width="80%">
					: <?=$data->nama_pendaftar ?>
				</td>
			</tr>
			
			<tr>		
				<td width="20%">
					<strong>NISN </strong>
				</td>
				<td width="80%">
					: <?=$data->nisn ?>
				</td>
			</tr>	
			<tr>		
				<td width="20%">
					<strong>Agama </strong>
				</td>
				<td width="80%">
					: <?=$data->agama ?>
				</td>
			</tr>	
			<tr>		
				<td width="20%">
					<strong>Jenis Kelamin </strong>
				</td>
				<td width="80%">
					: <?php if ($data->jkel == 'L'): ?>
						LAKI-LAKI
						<?php else: ?>
						PEREMPUAN
					<?php endif ?>
				</td>
			</tr>	
			<tr>		
				<td width="20%">
					<strong>Tanggal Lahir </strong>
				</td>
				<td width="80%">
					: <?=date('d-m-Y', strtotime($data->tgl_lahir)); ?>
				</td>
			</tr>	
			<tr>		
				<td width="20%">
					<strong>Alamat </strong>
				</td>
				<td width="80%">
					: <?=$data->alamat ?>
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<strong>Telp/Hp </strong>
				</td>
				<td width="80%">
					: <?=$data->no_hp ?>
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<strong>Email </strong>
				</td>
				<td width="80%">
					: <?=$data->email ?>
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<strong>Asal Sekolah </strong>
				</td>
				<td width="80%">
					: <?=$data->sekolah ?> , <?=$data->kota ?>
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<strong>Nilai UN </strong>
				</td>
				<td width="80%">
					: <?=$data->nilai_un ?>
				</td>
			</tr>
			<tr>		
				<td width="20%">
					<strong>Prodi Pilihan </strong>
				</td>
				<td width="80%">
					: <?=$data->jenjang ?> <?=$data->nama_prodi ?>
				</td>
			</tr>		
		</table>
		<p>&nbsp;</p>
		<!-- <div width="100%" style="text-align: center;">
			<h3>Jadwal Tes</h3>
		</div>
		<p>&nbsp;</p> -->
		<!-- <table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Tes</th>
					<th>Tanggal</th>
					<th>Waktu</th>
					<th>Tempat</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($jadwal): ?>
				<?php foreach ($jadwal as $tes): ?>
					<tr>
				        <td><?=$tes->nama_tes?></td>
				        <td><?=date('d-m-Y', strtotime($tes->tgl_tes)); ?></td>
				       <td><?=$tes->mulai?> <strong>s/d</strong> <?=$tes->sampai?> </td>
				        <td>Kampus AKN Nganjuk</td>
				    </tr>
				<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="4">Tidak Ada Tes</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table> -->
		<p>&nbsp;</p>
		<div class="alert alert-info">
			<p>* Dengan ini saya menyatakan bahwa data yang saya masukan adalah benar.<br>
				* Harap melakukan Verifikasi di Kampus AKN Nganjuk sebelum tes berlangsung.<br>
				* Berkas yang harus dibawa saat verifikasi : </p>
			<ul>
				<li>Bukti Pendafatran</li>
				<li>Pass Poto 3x4 ( 4lembar )</li>
				<li>Foto Copy Ijazah Asli/Sementara</li>
				<li>Foto Copy SKHUN Asli/Sementara</li>
				<li>Membayar biaya pendaftaran Rp. 200.000</li>
			</ul>
		</div>
		<div style="float: right; width: 28%; margin-bottom: 0pt; text-align: center;">
		<strong>Pendaftar</strong><br>
		<br>&nbsp;
		<br>&nbsp;
		<strong><?=$data->nama_pendaftar ?></strong>
		</div>

	</div>
	

</body>
</html>