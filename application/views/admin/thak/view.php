<script type="text/javascript" src="<?= base_url('assets/js/datepicker/bootstrap-datepicker.min.js')  ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/datepicker/bootstrap-datepicker.id.min.js')  ?>" charset="UTF-8"></script>
<link rel="stylesheet" href="<?= base_url('assets/css/datepicker/bootstrap-datepicker3.css')  ?>"/>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-dashboard"></i>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tags"></i> Tahun Akademik yang sedang Aktif</h3>
              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
             <div class="callout callout-success">

              <h4>Tahun Akademik <?=$thak_aktif->tahun_ajaran?> is Activated !</h4>
              <?php if ($thak_aktif->ket === 'Dibuka'): ?>
                  <i class="fa fa-spin fa-refresh fa-4x"></i> 
                  <h3><i class="fa fa-fw fa-exclamation"></i> Pendaftaran Telah Dibuka..!!</h3>
                  <button type="button" class="btn btn-danger btn-md" onclick="close_reg('<?=$thak_aktif->thak?>')"><i class="fa fa-fw fa-times-circle"></i> Tutup Pendaftaran</button>
              <?php else: ?>
                  <i class="fa fa-refresh fa-4x"></i> 
                  <h3><i class="fa fa-fw fa-exclamation"></i> Pendaftaran Belum Dibuka..!!</h3>
                  <button type="button" class="btn btn-primary btn-md" onclick="open_reg('<?=$thak_aktif->thak?>')"><i class="fa fa-fw fa-check-square-o"></i> Buka Sekarang..!!</button>
              <?php endif; ?>

            </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
      </div>

       <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-tags"></i>Data Tahun Akademik</h3>
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
              <button type="button" id="tambah-th" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_add"><i class="fa fa-fw fa-plus"></i> Tahun Akademik</button>
              <table class="table table-hover table-bordered table-responsive">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode thak</th>
                    <th>Tahun Ajaran</th>
                    <th>Status</th>
                    <th>Pendaftaran</th>
                    <th></th>
                    <th></th>
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
        <div class="modal fade" role="dialog" id="modal_add">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Tahun Akademik</h4>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                <div id="pesan-error">  
                </div>
                  <div class="row">
                    <form id="form" method="POST" action="javascript:void(0);">
                      <div class="form-group">
                      <label for="">Pilih Tahun</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control" name="thak" id="thak">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <div class="form-group">
                      <label for="">Tahun Ajaran</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                           <input class="form-control" type="text" name="tajar" id="tajar" readonly>
                        </div>
                        <!-- /.input group -->
                      </div>              
                      <!-- /.form group -->
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn-add-thak">Simpan</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <script type="text/javascript" charset="utf-8" >
    $("#thak").datepicker( {
          format: " yyyy", // Notice the Extra space at the beginning
          viewMode: "years", 
          minViewMode: "years",
          autoclose: true
      });
    
      $('#thak').on('change', function() {
        var thak=this.value;
        var thak2=parseInt(thak)+1;
        var th=thak+"/"+thak2;
        $("#tajar").val(th);
      })

      $("#btn-add-thak").click(function () {
        var data =$("#form").serialize();
          $.ajax({
            url: '<?php echo base_url('administrator/thak/add_thak')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: data,
            success: function(response){ // Ketika proses pengiriman berhasil
            var response = JSON.parse(response);
            // console.log(response);
              
              show_thak();
              if (response.success==true){
               $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
               $("#modal_add").modal('hide');
              }else{
                $("#pesan-error").html(response.pesan).fadeIn().delay(3000).slideUp();
              }
              $("#form")[0].reset();

            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
        });
      });

      function show_thak() {
          $.ajax({
          type: 'GET',
          url: '<?php echo base_url() ?>administrator/thak/show_thak',
          dataType: 'json',
          success: function(data){
           // console.log(data);
           if (data.length > 0) {
               var html = '';
                var no=1;
                for(i=0; i<data.length; i++){
                  html +='<tr>'+
                        '<td>'+no+'</td>'+
                        '<td>'+data[i].thak+'</td>'+
                        '<td>'+data[i].tahun_ajaran+'</td>'+
                        '<td>'+data[i].status+'</td>'+
                        '<td>'+data[i].ket+'</td>'+
                        '<td>'+
                          '<a href="javascript:void(0);" class="btn btn-danger btn-md"  onclick="hapus('+data[i].thak+')"><i class="fa fa-trash-o"></i></a>'+
                        '</td>'+
                        '<td>'+
                          '<a href="javascript:void(0);" class="btn btn-success btn-md"  onclick="change_thak('+data[i].thak+')"><i class="fa fa-upload"></i>  Aktifkan Tahun Akademik</a>'+
                        '</td>'+
                        '</tr>';
                  no++;
                }
                $('#showdata').html(html);
              }else{
                  $('#showdata').html(data.pesan);
              }
          },
          error: function(){
            alert('Could not get Data from Database');
          }
        });
      }

      function hapus(id) {
        var conf = confirm("Anda Yakin ingin menghapusnya ?");
        if (conf) {
           $.ajax({
            url: '<?php echo base_url('administrator/thak/delete_thak')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data:{id:id}, // Set data yang akan dikirim
            success: function(response){ // Ketika proses pengiriman berhasil
              var response = JSON.parse(response);
              //console.log(response);
              show_thak();
                if (response.success==true){
                 $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
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

      function close_reg(id) {
           $.ajax({
              url: '<?php echo base_url('administrator/thak/close_reg')?>', // File tujuan
              type: 'POST', // Tentukan type nya POST atau GET
              data:{id:id},
              success: function(response){ // Ketika proses pengiriman berhasil
              //console.log(response);
                  location.reload();
              },
              error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                alert(xhr.responseText); // munculkan alert
              }
          });
      }

      function open_reg(id) {
            $.ajax({
              url: '<?php echo base_url('administrator/thak/open_reg')?>', // File tujuan
              type: 'POST', // Tentukan type nya POST atau GET
              data:{id:id},
              success: function(response){ // Ketika proses pengiriman berhasil
              //console.log(response);
                  location.reload();
              },
              error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                alert(xhr.responseText); // munculkan alert
              }
          });
      }

      function change_thak(thak) {
         $.ajax({
              url: '<?php echo base_url('administrator/thak/change_thak')?>', // File tujuan
              type: 'POST', // Tentukan type nya POST atau GET
              data:{id:thak},
              success: function(response){ // Ketika proses pengiriman berhasil
                 var response = JSON.parse(response);
                   if (response.success==true){
                       location.reload();
                    }else{
                      alert("Problem to change Tahun Akademik");
                    }
              },
              error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                alert(xhr.responseText); // munculkan alert
              }
          });
      }

      $(document).ready(function () {
        show_thak();
      });

  </script>