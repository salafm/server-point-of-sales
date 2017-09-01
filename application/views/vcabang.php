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
                          <th>Pilihan</th>
                        </tr>
                      </thead>
					  <tbody>
					  <?php
						$no = 1;
						foreach($cabang as $c){
					  ?>
                        <tr>
                          <td><?php echo $no++?></td>
                          <td title="Double click to Edit and press Enter to Save" 
							  class="edit" id="<?php echo $c->id?>"><?php echo $c->nama?></td>
                          <td class="edit" id="<?php echo $c->id?>"><?php echo $c->user?></td>
                          <td class="edit" id="<?php echo $c->id?>"><?php echo $c->pass?></td>
                          <td>Delete</td>
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
          <input type="hidden" value="" name="book_id"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Cabang</label>
              <div class="col-md-9">
                <input name="nama" placeholder="Masukkan nama cabang" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Username</label>
              <div class="col-md-9">
                <input name="user" placeholder="Masukkan username" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Password</label>
              <div class="col-md-9">
				<input name="pass" placeholder="Masukkan password" class="form-control" type="text">
              </div>
            </div>
			<div class="form-group">
				<label class="control-label col-md-3">Ip Address</label>
				<div class="col-md-9">
					<input name="ip" placeholder="Isi Ip Address" class="form-control" type="text">

				</div>
			</div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-default">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
	
	$('.edit').on('dblclick', function() {
	var id = $(this).attr('id');
	var $this = $(this);
	var $input = $('<input>', {
		value: $this.text(),
		type: 'text',
		blur: function() {
		   $this.text(this.value);
		},
		keyup: function(e){
			if((e.keyCode) === 13){
				if (confirm('Are you sure you want to save this thing into the database?')){
					e.preventDefault();
					var value = $input.val();
					$.ajax({
						type: "POST",
						url:'<?php echo site_url('cabang/savedata')?>',
						data: {
							'id':id,
							'title':value
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
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
	</script>
</body>
<?php 
include 'footer.html'
?>
</html>