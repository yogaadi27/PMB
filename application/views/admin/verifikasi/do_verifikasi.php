<!-- DataTables -->
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-dashboard"></i>
        Verifikasi
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('administrator/main') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Verifikasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tags"></i>Lakukan Verifikasi</h3>
              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
            
               <?=form_open('',array('class'=>'form-horizontal','data-toggle'=>'validator','role'=>'form')); ?>
               <div class="col-md-6">
                  <!-- <label class="label label-info"><strong>Data Pendaftar</strong></label> -->
                  <h4 class="text-danger"><i class="fa fa-user"><strong><em> Data Pendaftar</em></strong></i></h4>
                  <div class="form-group">
                    <label for="nisn" class="col-xs-2 control-label">NISN</label>
                    <div class="col-xs-10">
                      <input type="text" class="form-control" id="nisn" value="<?=$siswa->nisn ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama" class="col-xs-2 control-label">Nama</label>
                    <div class="col-xs-10">
                      <input type="text" class="form-control" id="nama" value="<?=$siswa->nama_pendaftar ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tgl" class="col-xs-2 control-label">Tgl Lahir</label>
                    <div class="col-xs-4">
                      <input type="text" class="form-control" id="tgl" value="<?=$siswa->tgl_lahir ?>">
                    </div>
                    <label for="agama" class="col-xs-2 control-label">Agama</label>
                    <div class="col-xs-4">
                      <input type="text" class="form-control" id="agama" value="<?=$siswa->agama ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="alamat" class="col-xs-2 control-label">Alamat</label>
                    <div class="col-xs-10">
                      <input type="text" class="form-control" id="alamat" placeholder="Email" value="<?=$siswa->alamat ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tlp" class="col-xs-2 control-label">Tlp / Hp</label>
                    <div class="col-xs-10">
                      <input type="number" class="form-control" id="tlp" placeholder="Email" value="<?=$siswa->no_hp ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-xs-2 control-label">Email</label>
                    <div class="col-xs-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?=$siswa->email ?>">
                    </div>
                  </div>
                  <h4 class="text-danger"><i class="fa fa-university"></i> <strong><em> Data Sekolah</em></strong></h4>
                  <div class="form-group">
                      <label for="skl" class="col-xs-3 control-label">Asal Sekolah</label>
                      <div class="col-xs-9">
                        <input type="text" class="form-control" id="skl" value="<?=$siswa->sekolah ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="un" class="col-xs-3 control-label">Nilai UN</label>
                      <div class="col-xs-9">
                        <input type="text" class="form-control" id="un" value="<?=$siswa->nilai_un ?>">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="prodi" class="col-xs-3 control-label">Prodi pilihan</label>
                      <div class="col-xs-9">
                        <input type="text" class="form-control" id="prodi" value="<?=$siswa->jenjang ?> <?=$siswa->nama_prodi ?>">
                      </div>
                  </div>
               </div>
               <div class="col-md-6">
                <h4 class="text-red"><i class="fa fa-check-square-o"><strong><em> Verifikasi</em></strong></i></h4>
                <div style="text-align: center;">
                   <img class="img-thumbnail" src="<?=base_url('photo/'.$siswa->foto.'') ?>" width="90" height="120" alt="">
                </div>
              
                 <div class="form-group">
                  <label class="col-xs-4 control-label">Pas Foto ( 3 x 4 )</label>
                  <div class="col-xs-8" style="text-align:left">
                    <div class="radio">
                      <label>
                        <input type="radio" name="pas_foto" value="1" required <?php if ($siswa->pas_foto==TRUE) {
                          echo "checked";
                        } ?> >Ada
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="pas_foto" value="0" required <?php if ($siswa->pas_foto==FALSE) {
                          echo "checked";
                        } ?>>Tidak Ada
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-4 control-label">Foto Copy Ijazah</label>
                  <div class="col-xs-8" style="text-align:left">
                    <div class="radio">
                      <label>
                        <input type="radio" name="fc_ijazah" value="1" required <?php if ($siswa->fc_ijazah==TRUE) {
                          echo "checked";
                        } ?>>Ada
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="fc_ijazah" value="0" required <?php if ($siswa->fc_ijazah==FALSE) {
                          echo "checked";
                        } ?>>Tidak Ada
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-4 control-label">Foto Copy Skhun</label>
                  <div class="col-xs-8" style="text-align:left">
                    <div class="radio">
                      <label>
                        <input type="radio" name="fc_skhu" value="1" required <?php if ($siswa->fc_skhu==TRUE) {
                          echo "checked";
                        } ?>>Ada
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="fc_skhu" value="0" required <?php if ($siswa->fc_skhu==FALSE) {
                          echo "checked";
                        } ?>>Tidak Ada
                      </label>
                    </div>
                  </div>
                </div>
                  <div class="form-group">
                    <label class="col-xs-4 control-label">Biaya Ujian</label>
                    <div class="col-xs-8">
                      <p class="form-control-static">Rp. 200.000</p>
                    </div>
                  </div>
                   <div class="form-group">
                  <label class="col-xs-4 control-label"></label>
                  <div class="col-xs-8" style="text-align:left">
                    <div class="radio">
                      <label>
                        <input type="radio" name="conf" value="" required><strong class="text-danger">Telah memenuhi syarat verifikasi !</strong>
                      </label>
                    </div>
                  </div>
                </div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Verifikasi</button>
                    <a href="<?=base_url('administrator/verifikasi')  ?>" type="button" class="btn btn-danger"><i class="fa fa-check-square-o"></i> Kembali</a>
                  </div>
               </div>
               <?=form_close() ?>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->