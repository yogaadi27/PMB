<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.min.css');  ?>">
<script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
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
                      <th>FC Ijazah</th>
                      <th>FC Skhu</th>
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
    <div class="modal fade" id="modalNews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            <form id="form" action="javascript:void(0)">
                <!-- textarea -->
                <div class="form-group">
                  <textarea  class="form-control textarea" rows="3" name="info" id="info-data" placeholder="Masukan Informasi Terbaru ..."></textarea>
                  <input type="hidden" name="id" class="id-info">
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btn-simpan-news">Simpan</button>
            <button type="button" class="btn btn-primary" id="btn-update-news">Ubah</button>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript" charset="utf-8" >

    function show_pendaftar() {
      
       $.ajax({
          type: 'GET',
          url: '<?php echo base_url() ?>administrator/verifikasi/show_pendaftaran',
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

    // function detail(id) {
    //   $.ajax({
    //       method:"GET",
    //       url:'<?php echo base_url('administrator/pendaftaran/detail/') ?>'+ id,
    //       dataType:'json',
    //       success:function(data){
    //         //console.log(data);
    //          if (data.jkel === 'L') {
    //             var jkel = "Laki-laki";
    //             }else{
    //               var jkel = "Perempuan";
    //             };
    //           //console.log(jkel);
    //           $("#foto").attr('src',"<?php echo base_url('photo/') ?>"+data.foto);
    //           $("#nisn").val(data.nisn);
    //           $("#nama").val(data.nama_pendaftar);
    //           $("#tgl").val(data.tgl_lahir);
    //           $("#agama").val(data.agama);
    //           $("#alamat").val(data.alamat);
    //           $("#hp").val(data.no_hp);
    //           $("#email").val(data.email);
    //           $("#sekolah").val(data.sekolah);
    //           $("#un").val(data.nilai_un);
    //           $("#prodi").val(data.nama_prodi);
    //           $("#jkel").text(jkel);
    //           $("#detail_modal").modal('show');
    //       }
    //     });
    // }


    //   function input_tes(id) {
    //     $("#btn-update-tes").hide();
    //     $("#btn-simpan-tes").show();
    //     $(".modal-title-tes").html('<i class="fa fa-edit"></i> Masukan Nilai Tes');

    //      $.ajax({
    //       method:"GET",
    //       url:'<?php echo base_url('administrator/pendaftaran/get_det_tes/') ?>'+ id,
    //       dataType:'json',
    //       success:function(data){
    //         //console.log(data);
    //           $(".image-static").attr('src',"<?php echo base_url('photo/') ?>"+data.foto);
    //           $("#nama-static").text(data.nama_pendaftar);
    //           $("#asal-sek").text(data.sekolah);
    //           $("#key").val(data.id_daftar);
    //           $("#modal_add").modal('show');
    //       }
    //     });
    //   }

    //   $("#btn-simpan-tes").click( function() {
    //     $.ajax({
    //         url: '<?php echo base_url('administrator/pendaftaran/input_nil_tes')?>', // File tujuan
    //         type: 'POST', // Tentukan type nya POST atau GET
    //         data: $(".form-nilai-tes").serialize(),
    //         success: function(response){ // Ketika proses pengiriman berhasil
    //          //console.log(response);
    //          var response = JSON.parse(response);
    //          show_pendaftar();
    //           if (response.success==true){
    //             $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
    //            $("#modal_add").modal('hide'); 
    //           }else{
    //             alert('Masalah menghapus Data');
    //           }
    //         },
    //         error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
    //           alert(xhr.responseText); // munculkan alert
    //         }
    //     });
    //   })

    // function edit_tes(id) {
    //     $("#btn-update-tes").show();
    //     $("#btn-simpan-tes").hide();
    //     $(".modal-title-tes").html('<i class="fa fa-edit"></i> Edit Nilai Tes');

    //      $.ajax({
    //       method:"GET",
    //       url:'<?php echo base_url('administrator/pendaftaran/get_det_tes/') ?>'+ id,
    //       dataType:'json',
    //       success:function(data){
    //         //console.log(data);
    //           $(".image-static").attr('src',"<?php echo base_url('photo/') ?>"+data.foto);
    //           $("#nama-static").text(data.nama_pendaftar);
    //           $("#asal-sek").text(data.sekolah);
    //           $(".input-val-tes").val(data.nilai_tes);
    //           $("#key").val(data.id_daftar);
    //           $("#modal_add").modal('show');
    //       }
    //     });      
    //  }

    //   $("#btn-update-tes").click( function() {
    //     $.ajax({
    //         url: '<?php echo base_url('administrator/pendaftaran/update_nil_tes')?>', // File tujuan
    //         type: 'POST', // Tentukan type nya POST atau GET
    //         data: $(".form-nilai-tes").serialize(),
    //         success: function(response){ // Ketika proses pengiriman berhasil
    //          //console.log(response);
    //          var response = JSON.parse(response);
    //          show_pendaftar();
    //           if (response.success==true){
    //             $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
    //            $("#modal_add").modal('hide'); 
    //           }else{
    //             alert('Masalah menghapus Data');
    //           }
    //         },
    //         error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
    //           alert(xhr.responseText); // munculkan alert
    //         }
    //     });
    //   })

    //   function hapus(id) {
    //     var conf = confirm("Anda Yakin ingin menghapusnya ?");
    //     if (conf) {
    //        $.ajax({
    //         url: '<?php echo base_url('administrator/pendaftaran/delete_siswa')?>', // File tujuan
    //         type: 'POST', // Tentukan type nya POST atau GET
    //         data:{id:id}, // Set data yang akan dikirim
    //         success: function(response){ // Ketika proses pengiriman berhasil
    //           //var response = JSON.parse(response);
    //           console.log(response);
    //           show_pendaftar();
    //           // show_jenjang();
    //           //   if (response.success==true){
    //           //    $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
    //           // }else{
    //           //   alert("Masalah menghapus Data")
    //           // }

    //         },
    //         error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
    //           alert(xhr.responseText); // munculkan alert
    //         }
    //       });
    //     }
    //   }

      $(document).ready(function () {
        show_pendaftar();
      });

       

  </script>