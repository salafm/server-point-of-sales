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
                <h3>Database<small> Barang</small></h3>
              </div>
            </div> 
			<div class="clearfix"></div>
			
			<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Silahkan Pilih Cabang :</h2>
					<div class="col-md-8 col-sm-8 col-xs-6">
					<select id="pil" class="form-control input-sm" onchange="javascript:showCustomer(this.value)">
						<option value="0" selected>--Pilih--</option>
						<?php foreach($cabang as $c){?>
						<option value="<?php echo $c->id?>"><?php echo $c->nama?></option> 
						<?php }?>
					</select></div>
					<a class="btn btn-default btn-sm disabled" onclick="tambah()" id="tombol"><span class="fa fa-plus"></span> Tambah Barang</a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">	
                    <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No. </th>
                          <th>ID Barang</th>
                          <th>Deskripsi</th>
                          <th>Harga</th>
                          <th>Stok</th>
                          <th>Satuan</th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
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
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="barang"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Id Barang</label>
              <div class="col-md-9">
                <input name="idbarang" id="1" placeholder="Masukkan id barang" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nama Barang</label>
              <div class="col-md-9">
                <input name="nama" id="2" placeholder="Masukkan nama barang" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Harga</label>
              <div class="col-md-9">
				<input name="harga" id="3" placeholder="Masukkan harga barang" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Stock</label>
              <div class="col-md-9">
				<input name="stok" id="4" placeholder="Masukkan jumlah persediaan barang" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Satuan</label>
              <div class="col-md-9">
				<input name="satuan" id="5" placeholder="kg, pack, sachet, dll" class="form-control" type="text">
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <a type="button" id="btnSave" class="btn btn-default">Simpan</a>
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
	
	$('#myTable').dataTable({
		responsive:true
	});
	
	function showCustomer(id){
		if(id!=0){
			document.getElementById('tombol').setAttribute('class','btn btn-default btn-sm');
		}
		else{
			document.getElementById('tombol').setAttribute('class','btn btn-default btn-sm disabled');
			document.getElementById('tombol').setAttribute('onclick','btn btn-default btn-sm disabled');
		}
		$.get({
			url : '<?php echo site_url('data/tampil/');?>'+id,
			success : function(data){
				$('#myTable').DataTable().destroy();
				$('tbody').html(data);
				$(document).ready(function() {
					$('#myTable').dataTable({
						responsive:true
					});
				} );
			}
		});
	}
	
	$(document).ready(function(){	
		$("#1, #2, #3, #4, #5").on('input', function() {
			var nama = document.getElementById('1').value;
			var user = document.getElementById('2').value;
			var pass = document.getElementById('3').value;
			var pass1 = document.getElementById('4').value;
			var pass2 = document.getElementById('5').value;
			if(nama!=='' && user!=='' && pass!=='' && pass1!=='' && pass2!==''){
				document.getElementById('btnSave').setAttribute('class','btn btn-default');
			}
			else{
				document.getElementById('btnSave').setAttribute('class','btn btn-default disabled');
			}
		});
	});
	
	function tambah()
    {
		var e = document.getElementById("pil");
		var value = e.options[e.selectedIndex].value;
		var teks = e.options[e.selectedIndex].innerHTML;
		document.getElementById('btnSave').setAttribute('class','btn btn-default disabled');
		document.getElementById('btnSave').setAttribute('onclick','simpan('+value+')');
		$('#form')[0].reset();
        $('#modal_form').modal('show');
		$('.modal-title').text('Tambah Barang di '+teks);
    }
	
	function simpan(id)
    {
	 $.ajax({
		url : '<?php echo site_url('data/simpanbarang/');?>'+id,
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
			alert('Gagal menambahkan data');
		}
	});
    }
	
	$(document).on('dblclick', '.edit' ,function() {
	var ok = 0;
	var id = $(this).closest('tr').prop('id');
	var kolom = $(this).attr('id');
	var teks = $(this).html();
	var $this = $(this);
	var $input = $('<input>', {
		value: $this.text(),
		type: 'text',
		blur: function() {
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
							'tabel':'barang'
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
	
	function hapus(id)
    {
      if(confirm('Apa anda yakin akan menghapus data ini?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('data/hapus')?>/"+id,
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
	</script>
</body>
<?php 
include 'footer.html'
?>
</html>