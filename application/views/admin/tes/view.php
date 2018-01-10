<script type="text/javascript" src="<?= base_url('assets/plugins/timepicker/bootstrap-clockpicker.min.js')  ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/datepicker/bootstrap-datepicker.min.js')  ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/datepicker/bootstrap-datepicker.id.min.js')  ?>" charset="UTF-8"></script>
<link rel="stylesheet" href="<?= base_url('assets/css/datepicker/bootstrap-datepicker3.css')  ?>"/>
<link rel="stylesheet" href="<?= base_url('assets/plugins/timepicker/bootstrap-clockpicker.min.css')  ?>"/>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-dashboard"></i>
        Tes
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         <!-- Small boxes (Stat box) -->
      <div class="row">
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tags"></i> Jadwal Tes</h3>
              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
              <div id="pesan-sukses">
              </div>
              <button type="button" id="add_button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_tes"><i class="fa fa-fw fa-plus"></i> Tambah Jadwal Tes</button>
              <table class="table table-hover table-bordered table-responsive">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Tes</th>
                    <th>Tanggal</th>
                    <th colspan="2" style="text-align: center;">Jam</th>
                  </tr>
                </thead>
                <tbody id="showdata">
                  
                </tbody>
              </table>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="modal fade" id="modal_tes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"></h4>
          </div>
          <form id="form" action="javascript:void(0)">
          <div class="modal-body">
                 <div class="form-group">
                  <label for="">Nama Tes</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" style="text-transform:uppercase" class="form-control" name="tes" id="tes">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                  <label for="">Tanggal Tes</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" style="text-transform:uppercase" class="form-control" name="tgl_tes" id="tgl_tes">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                   <label for="">Waktu Tes</label>
                    <div class="row">
                      <div class="col-xs-6">
                        <div class="input-group clockpicker">
                          <input type="text" class="form-control" placeholder="Mulai Jam" name="mulai"  id="mulai" value="">
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                        </div>
                      </div>
                      <div class="col-xs-6">
                         <div class="input-group clockpicker">
                          <input type="text" class="form-control" placeholder="Sampai Jam" name="sampai" id="sampai" value="">
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                        </div> 
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                  <label for="">Keterangan</label>
                      <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Tambahan....!"></textarea>
                  </div>
                  <input type="hidden" name="key" id="key">
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary" id="btn-simpan-tes">Simpan</button>
            <button type="submit" class="btn btn-primary" id="btn-update-tes">Update</button>
          </div>
         </form>
        </div>
      </div>
    </div>
   <script type="text/javascript">
    $('.clockpicker').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose:'true'
    });

    $("#add_button").click( function() {
      $("#btn-simpan-tes").show();
      $("#btn-update-tes").hide();
      $(".modal-title").html("Tambah Jadwal Tes");
    });
      
      $("#tgl_tes").datepicker( {
          format: " yyyy-mm-dd", // Notice the Extra space at the beginning
          autoclose: true
      });

    $("#btn-simpan-tes").click(function () {
         $.ajax({
            url: '<?php echo base_url('administrator/tes/add_tes')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: $("#form").serialize(),
            success: function(response){ // Ketika proses pengiriman berhasil
             //console.log(response);
             show_tes();
             var response = JSON.parse(response);
              if (response.success==true){
                $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
               $("#modal_tes").modal('hide'); 
              }else{
                alert('ERROR PROGRAM!! Please contact Programmer');
              }
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
        });
    });

    function show_tes() {
       $.ajax({
          type: 'GET',
          url: '<?php echo base_url() ?>administrator/tes/show_tes',
          success: function(data){
             $('#showdata').html(data);
          },
          error: function(){
            alert('Could not get Data from Database');
          }
        });
    }

    $(document).ready(function () {
      show_tes();
    });

    function edit(id) {
        $("#btn-simpan-tes").hide();
        $("#btn-update-tes").show();
        $(".modal-title").html("Edit Jadwal Tes");
  
         $.ajax({
          method:"GET",
          url:'<?php echo base_url('administrator/tes/get_tes/') ?>'+ id,
          dataType:'json',
          success:function(data){
            //console.log(data);
              $("#tgl_tes").val(data.tgl_tes);
              $("#tes").val(data.nama_tes);
              $("#mulai").val(data.mulai);
              $("#sampai").val(data.sampai);
              $("#ket").val(data.ket);
              $("#key").val(data.id);
              $("#modal_tes").modal('show');
          },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
        }
      });
    }

    $("#btn-update-tes").click(function () {
      $.ajax({
            url: '<?php echo base_url('administrator/tes/update_tes')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: $("#form").serialize(), // Set data yang akan dikirim
            success: function(response){ // Ketika proses pengiriman berhasil
             //console.log(response);
             var response = JSON.parse(response);
             show_tes();
             if (response.success==true){
                //show_jenjang();
                $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
                $("#modal_tes").modal('hide'); // Close / Tutup Modal Dialog
              }else{
                alert("Masalah mengupdate Data")
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
            url: '<?php echo base_url('administrator/tes/delete_tes')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data:{id:id}, // Set data yang akan dikirim
            success: function(response){ // Ketika proses pengiriman berhasil
              var response = JSON.parse(response);
              //console.log(response);
              show_tes();
                if (response.success==true){
                 $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
                $("#modal_tes").modal('hide'); // Close / Tutup Modal Dialog
              }else{
                alert("Masalah menghapus Data")
              }

            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
          });
        }
      }

      $('#modal_tes').on('hidden.bs.modal', function (e) {
       $("#form")[0].reset();
      })
</script>