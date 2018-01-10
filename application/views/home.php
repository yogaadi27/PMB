
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PMB AKN Nganjuk</title>

	<link rel="stylesheet" href="<?= base_url('assets/css/datepicker/bootstrap-datepicker3.css')  ?>"/>
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/jasny-bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/scrolling-nav.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css') ?>">

    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/jasny-bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.easing.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/scrolling-nav.js') ?>"></script>
    <script src="<?=base_url('assets/plugins/newsticker/jquery.bootstrap.newsbox.min.js') ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/datepicker/bootstrap-datepicker.min.js')  ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/datepicker/bootstrap-datepicker.id.min.js')  ?>" charset="UTF-8"></script>
	 <script src="<?= base_url('assets/js/wow.min.js')  ?>"></script>
	<style>
		#map {
			margin: auto;
			border: 1px solid #2c3e50;
		}

		ul#gulung
	            {
	                 padding:0px;
	                 margin:0px;
	                 list-style:none;
	            }
	            #gulung .news-item
	            {
	                 padding:1px 1px;
	                 margin:0px;
	                 border-bottom:1px dotted #555; 
	            }
	</style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><strong><i class="fa fa-fw fa-home"></i> Home</strong></a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about"><i class="fa fa-flag"></i> Prodi</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#alur"><i class="fa fa-map"></i> Alur Pendaftaran</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services"><i class="fa fa-file-text"></i> Formulir Pendaftaran!</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact"><i class="fa fa-university"></i> Panitia</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li class="dropdown">
			          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-bullhorn"></i> Pengumuman<span class="caret"></span></a>
			          <ul class="dropdown-menu">
			          	<?php foreach ($prodi as $data_pro): ?>
			          		<li><a href="<?=base_url('home/pengumuman_maba/'.$data_pro->kode_prodi.'') ?>" target="_blank"><?=$data_pro->jenjang ?> <?=$data_pro->nama_prodi ?></a></li>
			          	<?php endforeach ?>
			          </ul>
			        </li> -->
                	<li><a href="<?php echo base_url('administrator') ?>"><i class="fa fa-sign-in"></i> Login System</a></li>
                </ul>
            </div>
        </div>
    </nav>
    					

    <section id="intro" class="intro-section">
        <div class="container">
        	<div class="page-header">
			    <h1>Penerimaan Mahasiswa Baru Tahun Akademik <?=$thak->tahun_ajaran ?></h1>
			</div>
			 <?php echo $this->session->flashdata('error_daftar'); ?>
            <div class="row wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
                <div class="col-lg-8">
                   <!-- Full Page Image Background Carousel Header -->
					<div id="myCarousel" class="carousel slide">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
						</ol>

						<!-- Wrapper for Slides -->
						<div class="carousel-inner">
							<div class="item active">
								<!-- Set the first background image using inline CSS below. -->
								<img class="img-responsive" src="<?=base_url('assets') ?>/images/slide1.jpg" alt="">
								<div class="carousel-caption">
									<h4>Wisuda Mahasiswa Angkatan 2</h4>
								</div>
							</div>
							<div class="item">
								<!-- Set the second background image using inline CSS below. -->
								<img class="img-responsive" src="<?=base_url('assets') ?>/images/slide2.jpg" alt="">
								<div class="carousel-caption">
									<h4>Pra PEKA Mahasiswa BARU Tahun Akademik 2016/2017</h4>
								</div>
							</div>
							<div class="item">
								<!-- Set the third background image using inline CSS below. -->
								<img class="img-responsive" src="<?=base_url('assets') ?>/images/slide3.jpg" alt="">
								<div class="carousel-caption">
									<h4>Kegiatan Manajemen POLIJE di Nganjuk
									</h4>
								</div>
							</div>
						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							<span class="icon-prev"></span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
							<span class="icon-next"></span>
						</a>

					</div>
                </div>
                   <!--  <h1>Akademi Komunitas Negeri Nganjuk<br><small>Perguruan Tinggi Negeri <em>pertama</em> di Nganjuk !</small></h1>
					<p>&nbsp;</p>
                    <p>Bergabunglah bersama <strong>Akademi Komunitas Negeri Nganjuk</strong> dengan pilihan Program Studi (Prodi) pilihan.<br>Bekali diri anda kompetensi untuk meningkatkan karier dan peluang usaha.</p>
					<p>&nbsp;</p>
                    <a class="btn btn-info page-scroll" href="#about">Prodi Pilihan</a>
					<a class="btn btn-danger page-scroll" href="#services"><i class="fa fa-fw fa-send-o"></i> Daftar Sekarang !</a> -->
                <!-- </div> -->
                <div class="col-md-4">
                	<h3>Akademi Komunitas Negeri Nganjuk</h3>
					<div class="panel panel-primary">
	                    <div class="panel-heading">
	                        <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Informasi Terbaru</h3>
	                    </div>
	                    <div class="panel-body">
	                        <ul id="gulung">
	                        <?php if ($informasi): ?>

	                        	 <?php foreach ($informasi as $info):
	                        		 $d=date('Y-m-d',strtotime($info->created_at));
	                        		 
	                        		 $date=date_create($d);
	                        		$n=date('Y-m-d');
	                        		 $now=date_create($n);
	                        		$diff=date_diff($date,$now);
		                       		
	                        		if ($diff->d < 1) {
	                        			$label='<label class="label label-success">Baru</label>';
	                        		}else{
	                        			$label='';
	                        		}
	                        	  ?>
	                        	 	<li class="news-item"><?=$label  ?><p><?=$info->info ?></p></li>
	                        	 <?php endforeach ?>

	                        <?php else: ?>
	                        	<li class="news-item"><p>Tidak Ada Informasi Terbaru</p></li>	
	                        <?php endif ?>
                 
	                        </ul>
	                    </div>
	                    <div class="panel-footer"></div>
               		</div>

                    <a class="btn btn-info page-scroll" href="#about">Prodi Pilihan</a>
					<a class="btn btn-danger page-scroll" href="#services"><i class="fa fa-fw fa-send-o"></i> Daftar Sekarang !</a> 
				</div><!-- /col-lg-4 -->
            </div>
        </div>
    </section>

    <section id="about" class="about-section">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
                <div class="col-lg-12">
					<div class="col-lg-6">
						<h2>Manajemen Informatika</h2>
						<img src="<?php echo base_url('assets/images/mif.jpg') ?>" alt="Laboratorium Komputer" class="img-thumbnail img-responsive">
					</div>
					<div class="col-lg-6">
						<h2>Teknologi Industri Pangan</h2>
						<img src="<?php echo base_url('assets/images/tipclass.jpg') ?>" alt="Laboratorium Komputer" class="img-thumbnail img-responsive">
					</div>
                </div>
            </div>
        </div>
    </section>

    <section id="alur" class="alur-section">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
                <div class="col-lg-12">
                <h1>Alur Pendaftaran</h1>
                <img src="<?=base_url('assets/alur.png')  ?>" class="img-responsive img-thumbnail" alt="">
                </div>
            </div>
            <div class="row">
            <h3>Jadwal Tes</h3>
            	<div class="col-md-10 col-md-offset-1">
            		<table class="table table-bordered">
            			<thead>
            				<tr class="info">
            					<th style="text-align: center;">TES</th>
            					<th style="text-align: center;">Tanggal Tes</th>
            					<th style="text-align: center;">Waktu</th>
            					<th style="text-align: center;">Keterangan</th>
            				</tr>
            			</thead>
            			<tbody>
            			<?php if ($jadwal_tes): ?>
            					<?php foreach ($jadwal_tes as $tes): ?>
            						<tr>
								        <td><?=$tes->nama_tes?></td>
								        <td><?=$tes->tgl_tes?></td>
								       <td><?=$tes->mulai?> <strong>s/d</strong><?=$tes->sampai?> </td>
								        <td><?=$tes->ket?></td>
								    </tr>
								<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="4">Tidak Ada Tes</td>
							</tr>
						<?php endif; ?>
            				
            			</tbody>
					</table>
            	</div>	
            </div>
        </div>
    </section>

    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
                <h1>Formulir Pendaftaran</h1>
                	<?php if ($cek_reg === 'Ditutup'): ?>

					      <div class="alert alert-danger">
			                <h3><i class="icon fa fa-4x fa-warning"></i><br><strong>Maaf, Pendaftaran Belum Dibuka atau Sudah Ditutup!</strong></h3>
			                <h2>Come Back Soon !<i class="fa fa-fw fa-frown-o"></i> </h2>
			              </div>

					<?php else: ?>
					<hr>
					<p>&nbsp;</p>
					<?=form_open_multipart('home/daftar','class="form-horizontal"') ?>
						<div class="form-group">
							<label class="col-sm-2 control-label">NISN</label>
							<div class="col-sm-6">
								<input type="text" name="nisn" class="form-control" placeholder="NISN" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Lengkap</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
							</div>
						</div>
						<div class="form-group">
							
							<label class="col-sm-2 control-label">Agama</label>
							<div class="col-sm-2">
								<select class="form-control" name="agama" required>
									<option>Islam</option>
									<option>Kristen</option>
									<option>Katolik</option>
									<option>Hindu</option>
									<option>Budha</option>
								</select>
							</div>
							<label class="col-sm-2 control-label">Jenis Kelamin</label>
							<div class="col-sm-4" style="text-align:left">
								<div class="radio" required>
									<label>
										<input type="radio" name="jenisKelamin" value="L" checked>
										Laki-laki
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="jenisKelamin" value="P">
										Perempuan
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Lahir</label>
							<div class="col-sm-2">
								<input type="" class="form-control date-picker" name="tgl_lahir" placeholder="yyyy-mm-dd" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Alamat Domisili</label>
							<div class="col-sm-6">
								<textarea name="alamat" class="form-control" placeholder="Alamat Domisili" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Telp/Hp</label>
							<div class="col-sm-4">
								<input type="" name="hp" class="form-control" placeholder="Telepon/Hp" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">E-Mail</label>
							<div class="col-sm-4">
								<input type="email" name="email" class="form-control" placeholder="E-Mail">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Asal Sekolah</label>
							<div class="col-sm-3">
								<input type="text" name="sekolah" class="form-control" placeholder="contoh : SMAN 1 JAKARTA" required>
							</div>
							<label class="col-sm-1 control-label">Kab/Kota</label>
							<div class="col-sm-2">
								<input type="text" name="kota_sekolah" class="form-control" placeholder="contoh : JAKARTA" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nilai UNAS</label>
							<div class="col-sm-2">
								<input type="nilai" name="nilai_un" class="form-control" data-mask="99.99" placeholder="00.00" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Pilihan Prodi</label>
							<div class="col-sm-10" style="text-align:left">
								<?php foreach ($prodi as $prodi): ?>
								<div class="radio">
									<label>
										<input type="radio" name="prodi" value="<?=$prodi->kode_prodi ?>" required>
										<?=$prodi->jenjang ?> <?=$prodi->nama_prodi ?>
									</label>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Foto</label>
							<div class="col-sm-10" style="text-align:left">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 150px; height: 200px;"></div>
									<div>
										<span class="btn btn-default btn-file">
											<span class="fileinput-new">Pilih gambar</span>
											<span class="fileinput-exists">Ganti</span>
											<input type="file" name="userfile" required>
										</span>
										<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Hapus</a>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group" style="text-align:left">
							<div class="col-sm-offset-2 col-sm-10">
								<hr>
								<button type="submit" class="btn btn-primary">Daftar !</button>
								<button type="reset" class="btn btn-danger">Batal !</button>
							</div>
						</div>
					<?=form_close()  ?>

					<?php endif; ?>

                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="100ms" data-wow-duration="700ms">
                <h1>Panitia Pendaftaran</h1>	
				<p>&nbsp;</p>
				<p>Untuk informasi lebih lanjut, hubungi Panitia Pendaftaran pada:</p>
				<p>&nbsp;</p>

                <div class="col-lg-8" id="map">	
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53208.900272513834!2d111.89926258832604!3d-7.599429691762774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e784b0283d82377%3A0x733697641163a131!2sAkademi+Komunitas+Negeri+Nganjuk!5e0!3m2!1sid!2sid!4v1479946699239" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
				 <div class="col-lg-4">	
				 <h3>Contact</h3>
					<p>&nbsp;</p>
				<p align="left">Jl.Jenderal Gatot Subroto No.2b,Kauman<br>Nganjuk, JATIM 64411<br></p>
				<p align="left"><i class="fa fa-phone"></i><abbr title="Telepon">P</abbr>: (0358) 3516569</p>
				<p align="left"><i class="fa fa-envelope-o"></i><abbr title="Email">E</abbr>: aknganjuk@yahoo.com</p>
				<p align="left"><i class="fa fa-clock-o"></i><abbr title="Jam Kantor">J</abbr>: Senin - Sabtu: 8:00 sampai 20:00</p>
				<p align="left"><i class="fa fa-home"></i><abbr title="Website">W</abbr>: <a href="http://aknganjuk.ac.id/">aknganjuk.ac.id</a></p>
				<ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>
				 </div>
            </div>
        </div>
    </section>

		<script type="text/javascript">

			wow = new WOW(
			  {
				animateClass: 'animated',
				offset:       100,
				callback:     function() {
				 
				}
			  }
			);
			 wow.init();

	      $(".date-picker").datepicker( {
          format: " yyyy-mm-dd", // Notice the Extra space at the beginning
          autoclose: true
     		 });

	       $('.carousel').carousel({
        interval: 5000 //changes the speed
    });

	      $(document).ready( function () {
		      	$("#gulung").bootstrapNews({
	            newsPerPage: 2,
	            autoplay: true,
	            direction: 'up',
	            newsTickerInterval: 3000,
	            onToDo: function () {
	                //console.log(this);
	            }
	        })
	      });
		</script>

</body>
</html>
