<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-dashboard"></i>
        Jenjang
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
       <li><a href="<?=base_url('administrator/main') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jenjang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-graduation-cap"></i> Data Jenjang</h3>
              <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
            <div id="pesan-sukses">
            </div>
              <button type="button" id="add-jenjang" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_add"><i class="fa fa-fw fa-plus"></i> Tambah Jenjang</button>
              <table class="table table-hover table-bordered table-responsive">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Jenjang</th>
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
                      <label for="">Nama Jenjang</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-graduation-cap"></i>
                          </div>
                          <input type="text" style="text-transform:uppercase" class="form-control" name="jenjang" id="jenjang">
                          <input type="hidden" id="key" name="key">
                        </div>
                        <!-- /.input group -->
                      </div>
                     <!--/form group -->
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Tutup</button>
                <button type="button" class="btn btn-primary" id="btn-add-jenjang"><i class="fa fa-fw fa-check"></i> Simpan</button>
                <button type="button" class="btn btn-primary" id="btn-upd-jenjang"><i class="fa fa-fw fa-check"></i> Update</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <script type="text/javascript" charset="utf-8" >

      $("#add-jenjang").click(function () {
        $("#btn-add-jenjang").show();
        $("#btn-upd-jenjang").hide();
        $("#mod-judul").html('<i class="fa fa-graduation-cap"></i> Tambah Jenjang');
      })

      $("#btn-add-jenjang").click(function () {
        var data =$("#form").serialize();
          $.ajax({
            url: '<?php echo base_url('administrator/jenjang/add_jenjang')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: data,
            success: function(response){ // Ketika proses pengiriman berhasil
             var response = JSON.parse(response);
             show_jenjang();
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
      });

      function show_jenjang() {
          $.ajax({
          type: 'GET',
          url: '<?php echo base_url() ?>administrator/jenjang/show_jenjang',
          dataType: 'json',
          success: function(data){
            //console.log(data);
            if (data.length > 0) {
               var html = '';
                var no=1;
                for(i=0; i<data.length; i++){
                  html +='<tr>'+
                        '<td>'+no+'</td>'+
                        '<td>'+data[i].jenjang+'</td>'+
                        '<td>'+
                          '<a href="javascript:void(0);" class="btn btn-success btn-xs" onclick="edit('+data[i].kode_jenjang+')"><i class="fa fa-edit"></i> Edit</a>  '+
                          '<a href="javascript:void(0);" class="btn btn-danger btn-xs"  onclick="hapus('+data[i].kode_jenjang+')"><i class="fa fa-trash-o"></i> Delete</a>'+
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
        $("#btn-add-jenjang").hide();
        $("#btn-upd-jenjang").show();
        $("#mod-judul").html('<i class="fa fa-graduation-cap"></i> Edit Jenjang');

         $.ajax({
          method:"GET",
          url:'<?php echo base_url('administrator/jenjang/get_jenjang/') ?>'+ id,
          dataType:'json',
          success:function(data){
            //console.log(data);
              $("#jenjang").val(data.jenjang);
              $("#key").val(data.kode_jenjang);
              $("#modal_add").modal('show');
          }
        });

      }

      $("#btn-upd-jenjang").click(function () {
        var data = $("form").serialize();
          $.ajax({
            url: '<?php echo base_url('administrator/jenjang/edit_jenjang')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data: data, // Set data yang akan dikirim
            success: function(response){ // Ketika proses pengiriman berhasil
             var response = JSON.parse(response);
            //console.log(response);
             if (response.success==true){
                show_jenjang();
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
            url: '<?php echo base_url('administrator/jenjang/delete_jenjang')?>', // File tujuan
            type: 'POST', // Tentukan type nya POST atau GET
            data:{id:id}, // Set data yang akan dikirim
            success: function(response){ // Ketika proses pengiriman berhasil
              var response = JSON.parse(response);
              //console.log(response);
              show_jenjang();
                if (response.success==true){
                 $("#pesan-sukses").html(response.pesan).fadeIn().delay(3000).slideUp();
                $("#modal_add").modal('hide'); // Close / Tutup Modal Dialog
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

      $(document).ready(function () {
        show_jenjang();
      });

       $('#modal_add').on('hidden.bs.modal', function (e) {
       $("#form")[0].reset();
      })

  </script>