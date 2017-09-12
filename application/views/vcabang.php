<?php
include 'header.php'
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

        <!-- Bootstrap -->
    <link href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url('vendors/iCheck/skins/flat/green.css'); ?>" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url('vendors/jqvmap/dist/jqvmap.min.css'); ?>" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('vendors/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">
	<!-- Datatables -->
    <link href="<?php echo base_url('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('build/css/custom.min.css'); ?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

         <!-- page content -->
		 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Database <small>Cabang</small></h3>
              </div>
            </div>
			<div class="clearfix"></div>

			<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
						<button class="btn btn-default btn-sm" onclick="tambah()"><span class="fa fa-plus"></span> Tambah Cabang</button>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Cabang</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>IP Address</th>
                          <th>Waktu dibuat</th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
					  <tbody>
					  <?php
						$no = 1;
						foreach($cabang as $c){
					  ?>
                        <tr id="<?php echo $c->id?>">
                          <td><?php echo $no++?></td>
                          <td title="Double click untuk edit and tekan Enter to menyimpan"
							  class="edit" id="nama"><?php echo $c->nama?></td>
                          <td title="Kolom ini tidak bisa diedit"
							  class="" id="user"><?php echo $c->user?></td>
                          <td title="Kolom ini tidak bisa diedit"
						      class="" id="pass"><?php echo $c->pass?></td>
                            <td title="Kolom ini tidak bisa diedit"
  						      class="" id="pass"><?php echo $c->ip?></td>
                              <td title="Kolom ini tidak bisa diedit"
    						      class="" id="pass"><?php echo $c->dibuat?></td>
                          <td><button class="btn btn-danger btn-xs" onclick="hapus(<?php echo $c->id;?>)">
						  <i class="fa fa-remove"></i></button></td>
                        </tr>
					  <?php }?>
                      </tbody>
                    </table>
                </div>
              </div>
			 </div>
		   </div>
         </div>
		</div>
	  </div>
	</div>

	<!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Tambah Cabang</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="cabang"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Cabang</label>
              <div class="col-md-9">
                <input name="nama" id="name" placeholder="Masukkan nama cabang" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Username</label>
              <div class="col-md-9">
                <input name="user" id="users" placeholder="Username tidak boleh sama dengan yg lain" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Password</label>
              <div class="col-md-9">
				<input name="pass" id="passw" placeholder="Masukkan password" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Ip Address</label>
              <div class="col-md-9">
				<input name="ip" id="ip" placeholder="Format ipv4" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">API Key</label>
              <div class="col-md-9">
				<input name="api" id="api" placeholder="Klik generate API Key untuk mendapatkan API Key" class="form-control"  type="text" readonly="true">
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-default btn-sm" onclick="generateAPI()"><span class="fa fa-key"></span> Generate API Key</button>
            <a type="button" id="btnSave" onclick="simpan()" class="btn btn-default disabled">Simpan</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
	<!-- Datatables -->
    <script src="<?php echo base_url('vendors/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatables.net-scroller/js/dataTables.scroller.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/jszip/dist/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/pdfmake/build/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/pdfmake/build/vfs_fonts.js'); ?>"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('build/js/custom.min.js'); ?>"></script>
	<script>
	$('#myTable').DataTable( {
		responsive: true
	});

	$(document).ready(function(){
		$("#name, #users, #passw, #ip").on('input', function() {
			var nama = document.getElementById('name').value;
			var user = document.getElementById('users').value;
			var pass = document.getElementById('passw').value;
			var ip = document.getElementById('ip').value;
			if(nama!=='' && user!=='' && pass!=='' && ip!==''){
				document.getElementById('btnSave').setAttribute('class','btn btn-default');
			}
			else{
				document.getElementById('btnSave').setAttribute('class','btn btn-default disabled');
			}
		});
	});

	$('.edit').on('dblclick', function() {
	var ok = 0;
	var id = $(this).closest('tr').prop('id');
	var kolom = $(this).attr('id');
	var teks = $(this).html();
	var $this = $(this);
	var $input = $('<input>', {
		value: $this.text(),
		type: 'text',
		blur: function() {
      clearSelection();
		   if (ok == 1)
		   {
			$this.text(this.value);
			}
			else{
				$this.text(teks);
				alert('Data belum tersimpan, tekan Enter untuk menyimpan');
			}
		},
		keyup: function(e){
			if((e.keyCode) === 13){
				if (confirm('Apa anda yakin ingin menyimpannya?')){
					ok = 1;
					e.preventDefault();
					var value = $input.val();
					$.ajax({
						type: "POST",
						url:'<?php echo site_url('cabang/editsimpan')?>',
						data: {
							'id':id,
							'isi':value,
							'kolom':kolom,
							'tabel':'cabang'
						},
						success: function(response){
							alert(response);
						},
					});
				}
			}
		}
	}).appendTo( $this.empty() ).focus();
	});

	function tambah()
    {
	  document.getElementById('btnSave').setAttribute('class','btn btn-default disabled');
      $('#form')[0].reset();
      $('#modal_form').modal('show');
    }

	function simpan()
    {
	 $.ajax({
		url : '<?php echo site_url('cabang/simpancabang')?>',
		type: "POST",
		data: $('#form').serialize(),
		dataType: "JSON",
		success: function(response)
		{
		   $('#modal_form').modal('hide');
		   alert('Berhasil menambahkan data');
		   location.reload();
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Gagal menambahkan data \n'+textStatus+' : \n'+errorThrown);
		}
	});
    }

	function hapus(id)
    {
      if(confirm('Apa anda yakin akan menghapus data ini?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('cabang/hapus')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               alert('Data berhasil dihapus');
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Gagal menghapus data');
            }
        });

      }
    }

  function clearSelection() {
    if(document.selection && document.selection.empty) {
        document.selection.empty();
    } else if(window.getSelection) {
        var sel = window.getSelection();
        sel.removeAllRanges();
    }
  }

  function generateAPI()
  {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < 16; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

    document.getElementById('api').value = text;
  }
	</script>
</body>
<?php
include 'footer.html'
?>
</html>
