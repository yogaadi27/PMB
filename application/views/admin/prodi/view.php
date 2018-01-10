<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-dashboard"></i>
        Prodi
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
              <h3 class="box-title"><i class="fa fa-tags"></i> Data Prodi</h3>
              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
            <div id="pesan-sukses">
            </div>
              <button type="button" id="add-prodi" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_add"><i class="fa fa-fw fa-plus"></i> Tambah Prodi</button>
              <table class="table table-hover table-bordered table-responsive">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Prodi</th>
                    <th>Nama Prodi</th>
                    <th>Jenjang</th>
                    <th>Kuota</th>
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
                <h4 class="modal-title" id="mod-judul"></h4>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                <div id="pesan-error">  
                </div>
                  <div class="row">
                    <form id="form" method="POST" action="javascript:void(0);">
                     <div class="form-group">
                      <label for="">Kode Prodi</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-key"></i>
                          </div>
                          <input type="text" style="text-transform:uppercase" class="form-control" name="kode_prodi" id="kode_prodi">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <div class="form-group">
                      <label for="">Nama Prodi</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-pencil"></i>
                          </div>
                          <input type="text" style="text-transform:uppercase" class="form-control" name="prodi" id="prodi">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <div class="form-group">
                      <label for="">Kuota</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-archive"></i>
                          </div>
                          <input type="number" class="form-control" name="kuota" id="kuota">
                          <input type="hidden" id="key" name="key">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <div class="form-group">
                        <label for="">Pilih Jenjang</label>
                        <div class="input-group">
                           <select name="jenjang" id="jenjang" class="form-control" required>
                            <option selected>Pilih Jenjang</option>
                                <?php foreach ($jenjang as $item): ?>
                                    <option value="<?=$item->kode_jenjang; ?>"><?=$item->jenjang; ?></option>
                                <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                     <!--/form group -->
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Tutup</button>
                <button type="button" class="btn btn-primary" id="btn-add-prodi"><i class="fa fa-fw fa-check"></i> Simpan</button>
                <button type="button" class="btn btn-primary" id="btn-upd-prodi"><i class="fa fa-fw fa-check"></i> Update</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <script type="text/javascript" charset="utf-8" >

      $("#add-prodi").click(function () {
        $("#btn-add-prodi").show();
        $("#btn-upd-prodi").hide();
        $("#mod-judul").html('<i class="fa fa-flag"></i> Tambah Prodi');
        $('#kode_prodi').removeAttr('readonly');
      })

      $("#btn-add-prodi").click(function () {
       var str = $.trim($('#kode_prodi').val());
         

        if ( str.length === 0 ) {
          $("#pesan-error").html('<div class="alert alert-danger" role="alert"><i class="fa fa-fw fa-times"></i> Semua field wajib di isi ..!!</div>').fadeIn().delay(3000).slideUp();
        }else{
          var data =$("#form").serialize();
          $.ajax({
            url: '<?php echo base_url('administrator/prodi/add_prodi')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: data,
            success: function(response){ // Ketika proses pengiriman berhasil
             //console.log(response);
             var response = JSON.parse(response);
             show_prodi();
              if (response.success==true){
                $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
               $("#modal_add").modal('hide'); 
              }else if(response.success==false){
                  $("#pesan-error").html(response.pesan).fadeIn().delay(3000).slideUp();
                }
              else{
                alert('Masalah Menambah Data');
              }
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
        });
        }
        
      });

      function show_prodi() {
          $.ajax({
          type: 'GET',
          url: '<?php echo base_url() ?>administrator/prodi/show_prodi',
          dataType: 'json',
          success: function(data){
            //console.log(data);
            if (data.length > 0) {
               var html = '';
                var no=1;
                for(i=0; i<data.length; i++){
                  html +='<tr>'+
                        '<td>'+no+'</td>'+
                        '<td>'+data[i].kode_prodi+'</td>'+
                        '<td>'+data[i].nama_prodi+'</td>'+
                        '<td>'+data[i].jenjang+'</td>'+
                        '<td>'+data[i].kuota+'</td>'+
                        '<td>'+
                          '<a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="edit(\''+data[i].kode_prodi+'\')"><i class="fa fa-edit"></i> Edit</a>  '+
                          '<a href="javascript:void(0);" class="btn btn-danger btn-xs"  onclick="hapus(\''+data[i].kode_prodi+'\')"><i class="fa fa-trash-o"></i> Delete</a>'+
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

      function edit(id) {
        $("#btn-add-prodi").hide();
        $("#btn-upd-prodi").show();
        $("#mod-judul").html('<i class="fa fa-flag"></i> Edit Prodi');
        $('#kode_prodi').prop('readonly', true);
         $.ajax({
          method:"GET",
          url:'<?php echo base_url('administrator/prodi/get_prodi/') ?>'+ id,
          dataType:'json',
          success:function(data){
            //console.log(data);
              $("#kode_prodi").val(data.kode_prodi);
              $("#prodi").val(data.nama_prodi);
              $("#kuota").val(data.kuota);
              $("#jenjang").val(data.jenjang_id);
              $("#modal_add").modal('show');
          }
        });
      }

      $("#btn-upd-prodi").click(function () {
        var data = $("form").serialize();
          $.ajax({
            url: '<?php echo base_url('administrator/prodi/update_prodi')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: data, // Set data yang akan dikirim
            success: function(response){ // Ketika proses pengiriman berhasil
             var response = JSON.parse(response);
             show_prodi();
             if (response.success==true){
                //show_jenjang();
                $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
                $("#modal_add").modal('hide'); // Close / Tutup Modal Dialog
              }else{
                alert("Masalah mengupdate Data")
              }

            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
          });
      });

      function hapus(id) {
        var conf = confirm("Anda Yakin ingin menghapusnya ?");
        if (conf) {
           $.ajax({
            url: '<?php echo base_url('administrator/prodi/delete_prodi')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data:{id:id}, // Set data yang akan dikirim
            success: function(response){ // Ketika proses pengiriman berhasil
              var response = JSON.parse(response);
              //console.log(response);
              show_prodi();
                if (response.success==true){
                 $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
                $("#modal_add").modal('hide'); // Close / Tutup Modal Dialog
                }
              else{
                alert("Masalah menghapus Data")
              }

            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
              alert(xhr.responseText); // munculkan alert
            }
          });
        }
      }

      $('#modal_add').on('hidden.bs.modal', function (e) {
       $("#form")[0].reset();
      })

      $(document).ready(function () {
        show_prodi();
      });

  </script>