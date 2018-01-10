<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.min.css');  ?>">
<script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-dashboard"></i>
        Pendaftaran
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('administrator/main') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pendaftaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tags"></i> Data Pendaftar</h3>
              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
            <div id="pesan-sukses">
            </div>
              <div class="table-responsive">
                <table id="tabel_daftar" class="table table-hover table-bordered table-responsive">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Nisn</th>
                      <th>Sekolah</th>
                      <th>Prodi</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="showdata">
                    
                  </tbody>
                </table>
              </div>

            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
       
       <div class="modal fade bs-example-modal-sm" id="modal_add" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title modal-title-tes"><i class="fa fa-edit"></i> Masukan Nilai Tes</h4>
                </div>
                <div class="modal-body" style="text-align: center;">
                <div class="box box-success box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title" id="nama-static"></h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <form class="form-horizontal form-nilai-tes">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <img class="img-thumbnail img-responsive image-static" src=""  width="100px" /><br> 
                        <p class="form-control-static" id="asal-sek"></p>
                      </div>
                    </div>
                    <div class="form-group">
                    <p class="text-red"><i class="fa fa-exclamation-triangle"></i> Masukan Nilai Tes</p>
                      <div class="col-xs-8 col-xs-offset-2">
                        <input type="number" class="form-control input-val-tes" data-mask="99.99" name="nilai_tes" placeholder="00.00">
                        <input type="hidden" id="key" name="key">
                      </div>
                    </div>
                  </form>
                  </div>
                  <!-- /.box-body -->
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Close</button>
                  <button type="button" class="btn btn-primary" id="btn-simpan-tes"><i class="fa fa-fw fa-check"></i> Simpan</button>
                  <button type="button" class="btn btn-primary" id="btn-update-tes"><i class="fa fa-fw fa-check"></i> Update</button>
                </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="detail_modal" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel"><i class="fa fa-user"></i> Biodata Pendaftar</h4>
              </div>
              <div class="modal-body">
               <div class="row">
                <form class="form-horizontal">
                <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-9">
                        <div class="row">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-xs-3 control-label">NISN</label>
                            <div class="col-xs-9">
                              <input type="email" class="form-control" id="nisn" placeholder="NISN" readonly>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-xs-3 control-label">Nama</label>
                            <div class="col-xs-9">
                              <input type="email" class="form-control" id="nama" placeholder="Nama" readonly>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-xs-3 control-label">Tgl Lahir</label>
                            <div class="col-xs-4">
                              <input type="email" class="form-control" id="tgl" placeholder="Tgl Lahir" readonly>
                            </div>
                             <label for="inputEmail3" class="col-xs-2 control-label">Agama</label>
                            <div class="col-xs-3">
                              <input type="email" class="form-control" id="agama" placeholder="Agama" readonly>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-xs-3 control-label">Alamat</label>
                            <div class="col-xs-9">
                              <textarea class="form-control" id="alamat" readonly></textarea>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-xs-3 control-label">Telp/Hp</label>
                            <div class="col-xs-9">
                              <input type="email" class="form-control" id="hp" placeholder="Alamat" readonly>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-xs-3 control-label">Email</label>
                            <div class="col-xs-9">
                              <input type="email" class="form-control" id="email" placeholder="Email" readonly>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-xs-3 control-label">Asal Sekolah</label>
                            <div class="col-xs-9">
                              <input type="email" class="form-control" id="sekolah" placeholder="Sekolah" readonly>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-xs-3 control-label">Nilai UN</label>
                            <div class="col-xs-9">
                              <input type="email" class="form-control" id="un" placeholder="Nilai UN" readonly>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-xs-3 control-label">Prodi</label>
                            <div class="col-xs-9">
                              <input type="email" class="form-control" id="prodi" placeholder="Prodi Pilihan" readonly>
                            </div>
                          </div>
                        </div> 
                    </div>
                    <div class="col-xs-3" style="text-align: center;">
                      <img class="img-thumbnail img-responsive" id="foto" src="<?=base_url('photo/') ?>"  width="100px" /><br>
                      <label for="" id="jkel"></label><br>&nbsp;
                    </div>

                  </div><!-- /row -->
                </div><!-- /col-xs-12 -->
                </form> 
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Close</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


<script type="text/javascript" charset="utf-8" >

    function show_pendaftar() {
      
       $.ajax({
          type: 'GET',
          url: '<?php echo base_url() ?>administrator/pendaftaran/show_pendaftaran',
          success: function(data){
             //console.log(data);
             $('#showdata').html(data);
             $('#tabel_daftar').DataTable();
          },
          error: function(){
            alert('Could not get Data from Database');
          }
        });
    }

    function detail(id) {
      $.ajax({
          method:"GET",
          url:'<?php echo base_url('administrator/pendaftaran/detail/') ?>'+ id,
          dataType:'json',
          success:function(data){
            //console.log(data);
             if (data.jkel === 'L') {
                var jkel = "Laki-laki";
                }else{
                  var jkel = "Perempuan";
                };
              //console.log(jkel);
              $("#foto").attr('src',"<?php echo base_url('photo/') ?>"+data.foto);
              $("#nisn").val(data.nisn);
              $("#nama").val(data.nama_pendaftar);
              $("#tgl").val(data.tgl_lahir);
              $("#agama").val(data.agama);
              $("#alamat").val(data.alamat);
              $("#hp").val(data.no_hp);
              $("#email").val(data.email);
              $("#sekolah").val(data.sekolah);
              $("#un").val(data.nilai_un);
              $("#prodi").val(data.nama_prodi);
              $("#jkel").text(jkel);
              $("#detail_modal").modal('show');
          }
        });
    }


      function input_tes(id) {
        $("#btn-update-tes").hide();
        $("#btn-simpan-tes").show();
        $(".modal-title-tes").html('<i class="fa fa-edit"></i> Masukan Nilai Tes');

         $.ajax({
          method:"GET",
          url:'<?php echo base_url('administrator/pendaftaran/get_det_tes/') ?>'+ id,
          dataType:'json',
          success:function(data){
            //console.log(data);
              $(".image-static").attr('src',"<?php echo base_url('photo/') ?>"+data.foto);
              $("#nama-static").text(data.nama_pendaftar);
              $("#asal-sek").text(data.sekolah);
              $("#key").val(data.id_daftar);
              $("#modal_add").modal('show');
          }
        });
      }

      $("#btn-simpan-tes").click( function() {
        $.ajax({
            url: '<?php echo base_url('administrator/pendaftaran/input_nil_tes')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: $(".form-nilai-tes").serialize(),
            success: function(response){ // Ketika proses pengiriman berhasil
             //console.log(response);
             var response = JSON.parse(response);
             show_pendaftar();
              if (response.success==true){
                $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
               $("#modal_add").modal('hide'); 
              }else{
                alert('Masalah menghapus Data');
              }
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
        });
      })

    function edit_tes(id) {
        $("#btn-update-tes").show();
        $("#btn-simpan-tes").hide();
        $(".modal-title-tes").html('<i class="fa fa-edit"></i> Edit Nilai Tes');

         $.ajax({
          method:"GET",
          url:'<?php echo base_url('administrator/pendaftaran/get_det_tes/') ?>'+ id,
          dataType:'json',
          success:function(data){
            //console.log(data);
              $(".image-static").attr('src',"<?php echo base_url('photo/') ?>"+data.foto);
              $("#nama-static").text(data.nama_pendaftar);
              $("#asal-sek").text(data.sekolah);
              $(".input-val-tes").val(data.nilai_tes);
              $("#key").val(data.id_daftar);
              $("#modal_add").modal('show');
          }
        });      
     }

      $("#btn-update-tes").click( function() {
        $.ajax({
            url: '<?php echo base_url('administrator/pendaftaran/update_nil_tes')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: $(".form-nilai-tes").serialize(),
            success: function(response){ // Ketika proses pengiriman berhasil
             //console.log(response);
             var response = JSON.parse(response);
             show_pendaftar();
              if (response.success==true){
                $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
               $("#modal_add").modal('hide'); 
              }else{
                alert('Masalah menghapus Data');
              }
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
        });
      })

      function hapus(id) {
        var conf = confirm("Anda Yakin ingin menghapusnya ?");
        if (conf) {
           $.ajax({
            url: '<?php echo base_url('administrator/pendaftaran/delete_siswa')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data:{id:id}, // Set data yang akan dikirim
            success: function(response){ // Ketika proses pengiriman berhasil
              //var response = JSON.parse(response);
              console.log(response);
              show_pendaftar();
              // show_jenjang();
              //   if (response.success==true){
              //    $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
              // }else{
              //   alert("Masalah menghapus Data")
              // }

            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
          });
        }
      }

      $(document).ready(function () {
        show_pendaftar();
      });

       

  </script>