<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-dashboard"></i>
        Data Pengumuman
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('administrator/main') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url('administrator/pengumuman') ?>"><i class="fa fa-file-o"></i> Pengumuman</a></li>
        <li class="active">Prodi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bullhorn"></i> Pengumuman</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo $this->session->flashdata('info'); ?>
  
              <a href="<?=base_url('administrator/pengumuman/report_maba/'.$prodi->kode_prodi)  ?>" type="button" target="_blank" class="btn bg-maroon"><i class="fa fa-print"></i> Cetak Data Mahasiswa Baru</a>
             <p class="text-red"><i class="fa fa-fw fa-exclamation-circle"></i> Seleksi Berdasarkan Nilai Tes yang paling Tinggi !</p>
              <h3><i class="fa fa-book"></i> <?=$prodi->nama_prodi ?></h3>
              <div class="table-responsive"> 
                <table class="table table-hover table-bordered">
                  <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Nilai Tes</th>
                    <th></th>
                  </thead>
                  <tbody>
                  <?php if ($siswa): ?>
                     <?php $no=0; foreach ($siswa as $value): $no++;?>
                    <?php 

                      if ($no <= $prodi->kuota) {
                        $ket='<label class="label label-success">LULUS</label>';
                        $clas='info';
                      }else{
                        $ket='<label class="label label-danger">TIDAK LULUS</label>';
                        $clas='danger';
                      }
                     ?>
                      <tr class=<?=$clas ?>>
                        <td><?=$no  ?></td>
                        <td><?=$value->nama_pendaftar  ?></td>
                        <td><?=$value->tgl_lahir  ?></td>
                        <td><?=$value->jkel  ?></td>
                        <td><?=$value->nilai_tes ?></td>
                        <td><?=$ket  ?> </td>
                      </tr>
                      <?php endforeach ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="6">Tidak Ada Data</td>
                      </tr>
                  <?php endif ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="<?=base_url('administrator/pengumuman') ?>" type="button" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
            </div><!-- box-footer -->
            <!-- /.box-footer -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->