<?php
include 'header.php'
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <style media="screen">
    .modal-open {
      padding-right: 0px !important;
      overflow-y: auto !important;
    }
    </style>
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
                <h3>Database <small>Barang Gudang</small></h3>
              </div>
            </div>
			<div class="clearfix"></div>

			<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">
              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Stok Bahan</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Bahan Masuk</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Barang Keluar</a>
                  </li>
                  <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Produk</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <div class="x_title">
                    <h2>Stok Bahan Mentah</h2>
  					         <a class="btn btn-default btn-sm pull-right" onclick="tambah()" id="tombol"><span class="fa fa-plus"></span> Tambah Barang</a>
                      <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>No. </th>
                              <th>ID Barang</th>
                              <th>Nama</th>
                              <th>Harga</th>
                              <th>Stok</th>
                              <th>Satuan</th>
                              <th>Hapus</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                						$no = 1;
                						foreach($barang as $c){
                					  ?>
                                <tr id="<?php echo $c->id?>">
                                <td><?php echo $no++?></td>
                                <td title="Double click untuk edit and tekan Enter untuk menyimpan"
                                class="edit" id="idbarang"><?php echo $c->idbarang?></td>
                                <td title="Double click untuk edit and tekan Enter untuk menyimpan"
                                class="edit" id="nama"><?php echo $c->nama?></td>
                                <td title="Double click untuk edit and tekan Enter untuk menyimpan"
                                class="edit" id="harga"><?php echo $c->harga?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id="stok"><?php echo $c->stok?></td>
                                <td title="Double click untuk edit and tekan Enter untuk menyimpan"
                                class="edit" id="satuan"><?php echo $c->satuan?></td>
                                <td><button class="btn btn-danger btn-xs" onclick="hapus(<?php echo $c->id;?>)">
                                <i class="fa fa-remove"></i></button></td>
                                </tr>
                					  <?php }?>
                          </tbody>
                        </table>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <div class="x_title">
                    <h2>Data Barang Masuk </h2>
  					         <a class="btn btn-default btn-sm pull-right" onclick="tambahstok()" id="tombol2"><span class="fa fa-plus"></span> Tambah Stok Barang</a>
                      <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <table id="myTable1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>No. </th>
                              <th>ID Transaksi</th>
                              <th>Tanggal Transaksi</th>
                              <th>Hapus</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                						$no = 1;
                						foreach($barangmasuk as $b){
                					  ?>
                                <tr id="<?php echo $b->id?>">
                                <td><?php echo $no++?></td>
                                <td title="Double click untuk edit and tekan Enter untuk menyimpan"
                                class="edit" id=""><?php echo $b->idtransaksi?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id=""><?php echo $b->tanggal?></td>
                                <td><button class="btn btn-danger btn-xs" onclick="hapus(<?php echo $b->id;?>)">
                                <i class="fa fa-remove"></i></button></td>
                                </tr>
                					  <?php }?>
                          </tbody>
                        </table>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile2-tab">
                    <div class="x_title">
                    <h2>Data Barang Keluar </h2>
                      <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <table id="myTable2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>No. </th>
                              <th>ID Transaksi</th>
                              <th>ID Cabang</th>
                              <th>Tanggal</th>
                              <th>Hapus</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                						$no = 1;
                						foreach($barangkeluar as $bk){
                					  ?>
                                <tr id="<?php echo $bk->id?>">
                                <td><?php echo $no++?></td>
                                <td title="Double click untuk edit and tekan Enter to menyimpan"
                                class="edit" id=""><?php echo $bk->idtransaksi?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id=""><?php echo $bk->idcabang?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id=""><?php echo $bk->tanggal?></td>
                                <td><button class="btn btn-danger btn-xs" onclick="hapus(<?php echo $bk->id;?>)">
                                <i class="fa fa-remove"></i></button></td>
                                </tr>
                					  <?php }?>
                          </tbody>
                        </table>
                    </div>
                  </div>

                  <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile3-tab">
                    <div class="x_title">
                    <h2>Data Produk <small>Barang jadi</small></h2>
                    <a class="btn btn-default btn-sm pull-right" onclick="tambahproduk()" id="tombol3"><span class="fa fa-plus"></span> Tambah Produk</a>
                      <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <table id="myTable3" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>No. </th>
                              <th>ID Produk</th>
                              <th>Nama</th>
                              <th>Harga</th>
                              <th>Tanggal Ditambahkan</th>
                              <th>Hapus</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                						$no = 1;
                						foreach($produk as $p){
                					  ?>
                                <tr id="<?php echo $p->id?>">
                                <td><?php echo $no++?></td>
                                <td title="Double click untuk edit and tekan Enter untuk menyimpan"
                                class="edit" id=""><?php echo $p->idproduk?></td>
                                <td title="Double click untuk edit and tekan Enter untuk menyimpan"
                                class="edit" id=""><?php echo $p->nama?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id=""><?php echo $p->harga?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id=""><?php echo $p->tanggal?></td>
                                <td><button class="btn btn-danger btn-xs" onclick="hapus(<?php echo $p->id;?>)">
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
            <a type="button" id="btnSave" class="btn btn-default" onclick="simpan()">Simpan</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

  <!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_bahan" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title"></h3>
    </div>
    <div class="modal-body form">
      <form action="#" id="form2" class="form-horizontal">
        <input type="hidden" value="" name="barang"/>
        <div class="form-body" id="form-body">
          <div class="form-group">
            <label class="control-label col-md-3">Id Transaksi</label>
            <div class="col-md-9">
              <input name="idtrans" id="idtrans" placeholder="Masukkan id transaksi" class="form-control" type="text">
            </div>
          </div>
          <div class="input" id="1000">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Barang</label>
              <div class="col-md-7">
                <select id="pil" name="pil[]" class="form-control" onchange="javascript:satuan(this.value)">
                  <option value="0" selected>--Pilih--</option>
                  <?php foreach($barang as $d){?>
                  <option value="<?php echo $d->idbarang?>"><?php echo $d->nama?></option>
                  <?php }?>
                </select>
              </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3" style="padding-left:3px">Harga</label>
                <div class="col-md-7">
                  <input name="harga[]" id="harga" placeholder="Harga Satuan" class="form-control" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Jumlah</label>
                <div class="col-md-3">
                  <input name="jml[]" id="jml" placeholder="Jumlah barang" class="form-control" type="text">
                </div>
                <label class="control-label col-md-1" style="padding-left:3px">Satuan</label>
                <div class="col-md-3 colsatuan" id="wtf">
                  <input value="" class="form-control" type="text" disabled>
                </div>
                <div class="col-md-1">
                  <a class="btn btn-primary btn-sm plus" id="2000" onclick=""><i class="fa fa-plus"></i></a>
                </div>
              </div>
          </div>
        </div>
      </form>
        </div>
        <div class="modal-footer">
          <!--a type="button" id="btntambah" class="btn btn-default pull-left" onclick="tambah()">Tambah Barang</a-->
          <a type="button" id="btnSave2" class="btn btn-default" onclick="simpanstok()">Simpan</a>
          <button type="button" class="btn btn-default batal1" data-dismiss="modal">Batal</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_produk" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 class="modal-title"></h3>
  </div>
  <div class="modal-body form">
    <form action="#" id="form3" class="form-horizontal">
      <input type="hidden" value="" name="barang"/>
      <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Id Produk</label>
          <div class="col-md-9">
            <input name="idproduk" id="idproduk" placeholder="Id produk harus beda satu sama lain" class="form-control" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">Nama Produk</label>
          <div class="col-md-9">
            <input name="nama" id="nama" placeholder="Masukkan nama produk" class="form-control" type="text">
          </div>
        </div>
        <div class="modal-header">
          <h4 class="" align="center">Komposisi Produk</h4>
        </div>
        <div class="modal-body form" id="form-body2">
          <div class="form-group" id="100">
            <label class="control-label col-md-3">Nama Bahan</label>
            <div class="col-md-3">
              <select id="pil2" name="pil[]" class="form-control" onchange="">
                <option value="0" selected>--Pilih--</option>
                <?php foreach($barang as $d){?>
                <option value="<?php echo $d->idbarang?>"><?php echo $d->nama?></option>
                <?php }?>
              </select>
            </div>
            <label class="control-label col-md-1" style="padding-left:0px">Jumlah</label>
            <div class="col-md-3">
              <input name="jml[]" id="jml" placeholder="Jumlah bahan" class="form-control" type="text">
            </div>
            <div class="col-md-1">
              <a class="btn btn-primary btn-sm pluss" id="200" onclick=""><i class="fa fa-plus"></i></a>
            </div>
          </div>
        </div>
      </div>
    </form>
      </div>
      <div class="modal-footer">
        <!--a type="button" id="btntambah2" class="btn btn-default pull-left" onclick="tambah()">Tambah Barang</a-->
        <a type="button" id="btnSave3" class="btn btn-default" onclick="simpanproduk()">Simpan</a>
        <button type="button" class="btn btn-default batal1" data-dismiss="modal">Batal</button>
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

  //init datatable
	$('#myTable, #myTable1, #myTable2, #myTable3 ').dataTable({
		responsive:true
	});

  //cek required tambah barang
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

  //tambah elemen input stok
  $(document).on('click', 'a.plus' ,function(){
      var id = $(this).attr('id');
      var ids = parseInt(id);
      var idbaru = ids+1;
      var idminus = idbaru*2; var idminus2 = idminus-2;
      var id2 = parseInt($(this).closest('div.input').prop('id'));
      var idsbaru = id2+1;
        $("#form-body").append('<div class="input" id="'+idsbaru+'"><div class="form-group"><label class="control-label col-md-3">Nama Barang</label><div class="col-md-7">'
      +'<select id="pil" name="pil[]" class="form-control" onchange="javascript:satuan(this.value)"><option value="0" selected>--Pilih--</option><?php foreach($barang as $d){?>'
      +'<option value="<?php echo $d->idbarang?>"><?php echo $d->nama?></option><?php }?></select></div></div>'
      +'<div class="form-group"><label class="control-label col-md-3" style="padding-left:3px">Harga</label><div class="col-md-7"><input name="harga[]" id="harga" placeholder="Harga Satuan" class="form-control" type="text"></div></div>'
      +'<div class="form-group"><label class="control-label col-md-3">Jumlah</label><div class="col-md-3"><input name="jml[]" id="jml" placeholder="Jumlah barang" class="form-control" type="text"></div>'
      +'<label class="control-label col-md-1" style="padding-left:3px">Satuan</label><div class="col-md-3 colsatuan" id=""><input value="" class="form-control" type="text" disabled></div>'
      +'<div class="col-md-1"><a class="btn btn-primary btn-sm plus" id="'+idbaru+'"><i class="fa fa-plus"></i></a></div>'
      +'<div class="col-md-1"><a class="btn btn-danger btn-sm minus" id="'+idminus+'"><i class="fa fa-minus"></i></a></div></div></div>');
       $('#'+id).attr('class','btn btn-primary btn-sm plus hidden');
       $('#'+idminus2).attr('class','btn btn-primary btn-sm minus hidden');
  });

 //hapus elemen input tambah stok barang
  $(document).on('click','a.minus', function(){
    var id = $(this).attr('id');
    var ids = parseInt(id); ids2 = ids-2;
    var idbaru = ids/2; idbaru = idbaru-1;
    var id2 = $(this).closest('div.input').prop('id');
    $('#'+id2).remove();
    $('#'+idbaru).attr('class','btn btn-primary btn-sm plus');
    $('#'+ids2).attr('class','btn btn-danger btn-sm minus');
  });

  //tambah elemen input produk
  $(document).on('click', 'a.pluss' ,function(){
      var id = $(this).attr('id');
      var ids = parseInt(id);
      var idbaru = ids+1;
      var idminus = idbaru*2; var idminus2 = idminus-2;
      var id2 = parseInt($(this).closest('div.form-group').prop('id'));
      var idsbaru = id2+1;
        $("#form-body2").append('<div class="form-group" id="'+idsbaru+'"><label class="control-label col-md-3">Nama Bahan</label><div class="col-md-3">'
      +'<select id="pil" name="pil[]" class="form-control" onchange=""><option value="0" selected>--Pilih--</option><?php foreach($barang as $d){?>'
      +'<option value="<?php echo $d->idbarang?>"><?php echo $d->nama?></option><?php }?></select></div>'
      +'<label class="control-label col-md-1" style="padding-left:0px">Jumlah</label><div class="col-md-3"><input name="jml[]" id="jml" placeholder="Jumlah bahan" class="form-control" type="text"></div>'
      +'<div class="col-md-1"><a class="btn btn-primary btn-sm pluss" id="'+idbaru+'"><i class="fa fa-plus"></i></a></div>'
      +'<div class="col-md-1"><a class="btn btn-danger btn-sm minuss" id="'+idminus+'"><i class="fa fa-minus"></i></a></div></div>');
       $('#'+id).attr('class','btn btn-primary btn-sm pluss hidden');
       $('#'+idminus2).attr('class','btn btn-primary btn-sm minuss hidden');
  });

 //hapus elemen input tambah produk
  $(document).on('click','a.minuss', function(){
    var id = $(this).attr('id');
    var ids = parseInt(id); ids2 = ids-2;
    var idbaru = ids/2; idbaru = idbaru-1;
    var id2 = $(this).closest('div.form-group').prop('id');
    $('#'+id2).remove();
    $('#'+idbaru).attr('class','btn btn-primary btn-sm pluss');
    $('#'+ids2).attr('class','btn btn-danger btn-sm minuss');
  });

  //show modal tambah barang
  function tambah()
  {
    document.getElementById('btnSave').setAttribute('class','btn btn-default disabled');
    $('#form')[0].reset();
    $('#modal_form').modal('show');
    $('.modal-title').text('Tambah Barang Gudang');
  }

  //show modal tambah stok
    function tambahstok()
    {
      //document.getElementById('btnSave2').setAttribute('class','btn btn-default disabled');
      $('#form2')[0].reset();
      $('#modal_form_bahan').modal('show');
      $('.modal-title').text('Tambah Stok Bahan');
    }

    //show modal tambah produk
      function tambahproduk()
      {
        //document.getElementById('btnSave3').setAttribute('class','btn btn-default disabled');
        $('#form3')[0].reset();
        $('#modal_form_produk').modal('show');
        $('.modal-title').text('Tambah Produk');
      }

    //simpan tambah barang ke database
	 function simpan()
    {
	 $.ajax({
		url : '<?php echo site_url('gudang/simpanbarang/');?>',
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
			alert('Gagal menambahkan data \n'+errorThrown);
		}
	   });
    }

    //simpan stok
    function simpanstok() {
      $.ajax({
        url : '<?php echo site_url('gudang/updatestok');?>',
        type: 'POST',
        data: $("#form2").serialize(),
        dataType: 'JSON',
        success: function(response){
           $('#modal_form_bahan').modal('hide');
           alert('Berhasil menambahkan stok');
           location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
    		{
    			alert('Gagal menambahkan data \n'+errorThrown);
    		}
      });
    }

    //simpan produk
    function simpanproduk() {
      $.ajax({
        url : '<?php echo site_url('gudang/simpanproduk');?>',
        type: 'POST',
        data: $("#form3").serialize(),
        dataType: 'JSON',
        success: function(response){
           $('#modal_form_produk').modal('hide');
           alert('Berhasil menambah produk');
           location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
    		{
    			alert('Gagal menambahkan data \n'+errorThrown);
    		}
      });
    }

 //edit dbklik
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

  //hapus barang
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

    //remove selection
    function clearSelection() {
      if(document.selection && document.selection.empty) {
          document.selection.empty();
      } else if(window.getSelection) {
          var sel = window.getSelection();
          sel.removeAllRanges();
      }
    }

    //show satuan perbarang
    function satuan(id) {
      var idroot = $(this).children(":selected").html();
      var idcol = $('#'+idroot).find('div.form-group div.colsatuan').prop('id');
      console.log(idroot);
      $.get({
  			url : '<?php echo site_url('gudang/satuanbarang/');?>'+id,
  			success : function(data){
  				$('.colsatuan').html(data);
  			}
  		});
    }
	</script>
</body>
<?php
include 'footer.html'
?>
</html>
