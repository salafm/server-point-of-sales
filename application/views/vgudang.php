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

    table.tabel{
      width: 70%;
			margin-left: auto;
			margin-right: auto;
    }
    #myTable2 td.desk {
      white-space: normal !important;
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
  					         <a class="btn btn-default btn-sm pull-right" onclick="tambahstok()" id="tombol"><span class="fa fa-plus"></span> Tambah Stok Barang</a>
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
                                <td title="Kolom ini tidak bisa diedit"
                                class="id" id="idbarang" name="barang"><?php echo $c->idbarang?></td>
                                <td title="Double click untuk edit and tekan Enter untuk menyimpan"
                                class="edit" id="nama"><?php echo $c->nama?></td>
                                <td title="Double click untuk edit and tekan Enter untuk menyimpan"
                                class="edit" id="harga">Rp. <?php echo number_format($c->harga,2,",",".")?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id="stok"><?php echo $c->stok?></td>
                                <td title="Double click untuk edit and tekan Enter untuk menyimpan"
                                class="edit" id="satuan"><?php echo $c->satuan?></td>
                                <td name="barang"><button class="btn btn-danger btn-xs delete" id="<?php echo $c->id;?>">
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
                              <th>Deskripsi</th>
                              <th>Waktu Transaksi</th>
                              <th>Info Detail</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                						$no = 1;
                						foreach($barangmasuk as $b){
                					  ?>
                                <tr id="<?php echo $b->idtransaksi; ?>">
                                <td><?php echo $no++?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class=""><?php echo $b->idtransaksi?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id=""><?php echo $b->deskripsi?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id=""><?php echo strftime("%A, %d/%m/%Y : %T", strtotime($b->tanggal)); ?></td>
                                <td><button class="btn btn-default btn-sm details" id="">
                                <i class="fa fa-info-circle"></i>  &nbsp;details</button></td>
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
                        <table id="myTable2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" style="width:100%">
                          <thead>
                            <tr>
                              <th>No. </th>
                              <th>ID Transaksi</th>
                              <th>Cabang Tujuan</th>
                              <th>Deskripsi</th>
                              <th>Waktu Transaksi</th>
                              <th>Info Detail</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                						$no = 1;
                						foreach($barangkeluar as $bk){
                					  ?>
                                <tr id="<?php echo $bk->idtransaksi; ?>">
                                <td><?php echo $no++?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id="idtransaksi"><?php echo $bk->idtransaksi?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id=""><?php echo $bk->nama?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="desk" id=""><?php echo $bk->deskripsi?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id=""><?php echo strftime("%A, %d/%m/%Y : %T", strtotime($bk->tanggal)); ?></td>
                                <td><button class="btn btn-default btn-sm details" id="">
                                <i class="fa fa-info-circle"></i>  &nbsp;details</button></td>
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
                              <th>Waktu Ditambahkan</th>
                              <th>Info Detail</th>
                              <th>Hapus</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                						$no = 1;
                						foreach($produk as $p){
                					  ?>
                                <tr id="<?php echo $p->idproduk?>">
                                <td><?php echo $no++?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="id" id="idproduk" name="produk"><?php echo $p->idproduk?></td>
                                <td title="Double click untuk edit and tekan Enter untuk menyimpan"
                                class="edit" id="nama"><?php echo $p->nama?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id="">Rp. <?php echo number_format($p->harga,2,",",".")?></td>
                                <td title="Kolom ini tidak bisa diedit"
                                class="" id=""><?php echo strftime("%A, %d/%m/%Y : %T", strtotime($p->tanggal));?></td>
                                <td><button class="btn btn-default btn-sm details" id="">
                                <i class="fa fa-info-circle"></i>  &nbsp;details</button></td>
                                <td name="produk"><button class="btn btn-danger btn-xs delete" id="<?php echo $p->id;?>">
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
<div class="modal fade" id="modal_form_bahan" role="dialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title"></h3>
    </div>
      <form action="#" id="form" class="form-horizontal">
    <div class="modal-body form">
        <input type="hidden" value="" name="barang"/>
        <div class="form-body" id="form-body">
          <div class="form-group">
            <label class="control-label col-md-3">Deskripsi</label>
            <div class="col-md-9">
              <input name="desk" id="desk" placeholder="Deskripsi transaksi" class="form-control" type="text" maxlength="50" autocomplete="off">
            </div>
          </div>
          <div class="input" id="1000">
            <div class="form-group hidden hilang">
              <label class="control-label col-md-3">Id Barang</label>
              <div class="col-md-9">
                <input placeholder="Id barang harus unik" class="form-control inputid" type="text" title="Minimal 5 karakter. Hanya huruf dan angka" pattern="^[A-Za-z0-9]{5,10}$" minlength="5" maxlength="10" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nama Barang</label>
              <div class="col-md-7">
                <input type="text" name="nama[]" value="" placeholder="Masukkan nama barang" class="form-control barang" autocomplete="on" title="Minimal 5 karakter, maksimal 30 karakter. Karakter spesial diperbolehkan" pattern="^.{5,30}$" type="text" minlength="5" maxlength="30" required>
                <input type="hidden" name="pil[]" value="" class="isiid">
                <div class="daftarbarang" id="daftarbarang"></div>
              </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3" style="padding-left:3px">Harga</label>
                <div class="col-md-7">
                  <input name="harga[]" id="harga" placeholder="Harga Satuan" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Jumlah</label>
                <div class="col-md-3">
                  <input name="jml[]" id="jml" placeholder="Jumlah barang" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required>
                </div>
                <label class="control-label col-md-1" style="padding-left:3px">Satuan</label>
                <div class="col-md-3 colsatuan" >
                  <input name="satuan[]" value="" id="" class="form-control satuan" type="text" disabled>
                </div>
                <div class="col-md-1">
                  <a class="btn btn-primary btn-sm plus" id="2000" onclick=""><i class="fa fa-plus"></i></a>
                </div>
              </div>
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <input type="submit" id="btnSave2" class="btn btn-default" value="Simpan"/>
          <button type="button" class="btn btn-default batal1" data-dismiss="modal">Batal</button>
        </div>
      </form>
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
    <form action="#" id="form2" class="form-horizontal">
  <div class="modal-body form">
      <input type="hidden" value="" name="barang"/>
      <div class="form-body">
        <div class="form-group">
          <label class="control-label col-md-3">Id Produk</label>
          <div class="col-md-9">
            <input name="idproduk" id="idproduk" placeholder="Id produk harus beda satu sama lain" class="form-control" type="text" title="Minimal 5 karakter. Hanya huruf dan angka" pattern="^[A-Za-z0-9]{5,10}$" minlength="5" maxlength="10" autocomplete="off" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">Nama Produk</label>
          <div class="col-md-9">
            <input name="nama" id="nama" placeholder="Masukkan nama produk" class="form-control" type="text" autocomplete="off" title="Minimal 5 karakter, maksimal 30 karakter. Karakter spesial diperbolehkan" pattern="^.{5,30}$" type="text" minlength="5" maxlength="30" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">Kategori</label>
          <div class="col-md-9">
            <select class="form-control" name="kategori" required>
              <option value="">--Pilih Kategori--</option>
              <option value="makanan">Makanan</option>
              <option value="minuman">Minuman</option>
              <option value="lain">Lain-lain</option>
            </select>
          </div>
        </div>
        <div class="modal-header">
          <h4 class="" align="center">Komposisi Produk</h4>
        </div>
        <div class="modal-body form" id="form-body2">
          <div class="input2" id="100">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Bahan</label>
              <div class="col-md-7">
                <select name="pil[]" class="form-control pil2" onchange="" required>
                  <option value="" selected>--Pilih--</option>
                  <?php foreach($barang as $d){?>
                  <option value="<?php echo $d->idbarang?>"><?php echo $d->nama?></option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3" style="padding-left:0px">Jumlah</label>
              <div class="col-md-3">
                <input name="jml[]" id="jml" placeholder="Jumlah bahan" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required>
              </div>
              <label class="control-label col-md-1" style="padding-left:3px">Satuan</label>
              <div class="col-md-3 colsatuan" >
                <input name="satuan[]" value="" id="" class="form-control satuan" type="text" disabled>
              </div>
              <div class="col-md-1">
                <a class="btn btn-primary btn-sm pluss" id="200" onclick=""><i class="fa fa-plus"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <input type="submit" id="btnSave3" class="btn btn-default" value="Simpan"/>
        <button type="button" class="btn btn-default batal1" data-dismiss="modal">Batal</button>
      </div>
    </form>
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

  var flag =1;
  var pesan;
  //init datatable
	$('#myTable').DataTable({
		responsive:false
	});

  //details details barang masuk
  function format (id) {
    return '<table class="table dt-responsive table-bordered nowrap tabel" width="100%"><thead>'
    +'<tr><th colspan="5" style="text-align:center;background:#ededed">Detail transaksi '+id+'</th>'
    +'</tr><tr><th>Nama barang</th><th>Harga</th><th>Jumlah</th><th>Satuan</th><th>Total Harga</th></tr></thead>'
    +'<tbody class="'+id+'"></tbody></table>';
  }

  //show details barang masuk
    $(document).ready(function(){
      var table = $('#myTable1').DataTable({
        responsive:false
      });

      $('#myTable1 tbody').on('click', 'td button.details', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var id = $(this).closest('tr').prop('id');
        $.get({
          url:'<?php echo site_url('gudang/detailbarangmasuk/') ?>'+id,
          success: function(data){
            $('.'+id).html(data);
          }
        });

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(id) ).show();
            tr.addClass('shown');
        }
      });
    });

    //details barang keluar
    function format2 (id) {
      return '<table id="myTable4" class="table dt-responsive table-bordered nowrap tabel" width="100%"><thead>'
      +'<tr><th colspan="6" style="text-align:center;background:#ededed">Detail transaksi '+id+'</th>'
      +'</tr><tr><th colspan="3" style="text-align:center;">Produk</th><th colspan="3" style="text-align:center;">Detail bahan keluar</th></tr>'
      +'<tr><th>Nama produk</th><th>Jumlah</th><th>Harga Satuan</th><th>Nama barang</th><th>Jumlah keluar</th><th>Satuan</th></tr></thead>'
      +'<tbody class="'+id+'"></tbody></table>';
    }

    //show details barang keluar
      $(document).ready(function(){
        var table = $('#myTable2').DataTable({
          responsive:false,
          autoWidth:false
        });

        $('#myTable2 tbody').on('click', 'td button.details', function () {
          var tr = $(this).closest('tr');
          var row = table.row(tr);
          var id = $(this).closest('tr').prop('id');
          $.get({
            url:'<?php echo site_url('gudang/detailbarangkeluar/') ?>'+id,
            success: function(data){
              $('.'+id).html(data);
            }
          });

          if ( row.child.isShown() ) {
              // This row is already open - close it
              row.child.hide();
              tr.removeClass('shown');
          }
          else {
              // Open this row
              row.child(format2(id)).show();
              tr.addClass('shown');
          }
        });
      });

        //details produk
        function format3 (id) {
          return '<table class="table dt-responsive table-bordered nowrap tabel" width="100%"><thead>'
          +'<tr><th colspan="5" style="text-align:center;background:#ededed">Komposisi produk '+id+'</th>'
          +'</tr><tr><th>Nama barang</th><th>Harga</th><th>Jumlah</th><th>Satuan</th><th>Total</th></tr></thead>'
          +'<tbody class="'+id+'"></tbody></table>';
        }

        //show details produk
          $(document).ready(function(){
            var table = $('#myTable3').DataTable({
              responsive:false
            });

            $('#myTable3 tbody').on('click', 'td button.details', function () {
              var tr = $(this).closest('tr');
              var row = table.row(tr);
              var id = $(this).closest('tr').prop('id');
              $.get({
                url:'<?php echo site_url('gudang/detailproduk/') ?>'+id,
                success: function(data){
                  $('.'+id).html(data);
                }
              });

              if ( row.child.isShown() ) {
                  // This row is already open - close it
                  row.child.hide();
                  tr.removeClass('shown');
              }
              else {
                  // Open this row
                  row.child(format3(id)).show();
                  tr.addClass('shown');
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
        $("#form-body").append('<div class="input" id="'+idsbaru+'"><div class="form-group hidden hilang"><label class="control-label col-md-3">Id Barang</label>'
      +'<div class="col-md-9"><input placeholder="Id barang harus unik" class="form-control inputid" type="text" title="Minimal 5 karakter. Hanya huruf dan angka" pattern="^[A-Za-z0-9]{5,10}$" minlength="5" maxlength="10" autocomplete="off"></div></div>'
      +'<div class="form-group"><label class="control-label col-md-3">Nama Barang</label><div class="col-md-7">'
      +'<input type="text" name="nama[]" value="" placeholder="Masukkan nama barang" class="form-control barang" autocomplete="on" title="Minimal 5 karakter, maksimal 30 karakter. Karakter spesial diperbolehkan" pattern="^.{5,30}$" type="text" minlength="3" maxlength="30" required>'
      +'<input type="hidden" name="pil[]" value="" class="isiid"><div class="daftarbarang" id="daftarbarang"></div></div></div>'
      +'<div class="form-group"><label class="control-label col-md-3" style="padding-left:3px">Harga</label><div class="col-md-7"><input name="harga[]" id="harga" placeholder="Harga Satuan" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required></div></div>'
      +'<div class="form-group"><label class="control-label col-md-3">Jumlah</label><div class="col-md-3"><input name="jml[]" id="jml" placeholder="Jumlah barang" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required></div>'
      +'<label class="control-label col-md-1" style="padding-left:3px">Satuan</label><div class="col-md-3 colsatuan" id=""><input name="satuan[]" value="" class="form-control satuan" id="" type="text" disabled></div>'
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
      var id2 = parseInt($(this).closest('div.input2').prop('id'));
      var idsbaru = id2+1;
        $("#form-body2").append('<div class="input2" id="'+idsbaru+'"><div class="form-group"><label class="control-label col-md-3">Nama Bahan</label><div class="col-md-7">'
      +'<select name="pil[]" class="form-control pil2" onchange="" required><option value="" selected>--Pilih--</option><?php foreach($barang as $d){?>'
      +'<option value="<?php echo $d->idbarang?>"><?php echo $d->nama?></option><?php }?></select></div></div>'
      +'<div class="form-group"><label class="control-label col-md-3" style="padding-left:0px">Jumlah</label><div class="col-md-3"><input name="jml[]" id="jml" placeholder="Jumlah bahan" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required></div>'
      +'<label class="control-label col-md-1" style="padding-left:3px">Satuan</label><div class="col-md-3 colsatuan" ><input name="satuan[]" value="" id="" class="form-control satuan" type="text" disabled></div>'
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
    var id2 = $(this).closest('div.input2').prop('id');
    $('#'+id2).remove();
    $('#'+idbaru).attr('class','btn btn-primary btn-sm pluss');
    $('#'+ids2).attr('class','btn btn-danger btn-sm minuss');
  });

  //show modal tambah stok
    function tambahstok()
    {
      //document.getElementById('btnSave2').setAttribute('class','btn btn-default disabled');
      $('#form')[0].reset();
      $('div.daftarbarang').html('');
      $('div.hilang').attr('class','form-group hidden hilang');
      $('input.satuan').removeAttr('value');
      $('input.satuan').attr('disabled','disabled');
      $('#modal_form_bahan').modal('show');
      $('.modal-title').text('Tambah Stok Bahan');
    }

    //show modal tambah produk
      function tambahproduk()
      {
        //document.getElementById('btnSave3').setAttribute('class','btn btn-default disabled');
        $('#form2')[0].reset();
        $('div.daftarbarang').html('');
        $('div.hilang').attr('class','form-group hidden hilang');
        $('input.satuan').removeAttr('value');
        $('input.satuan').attr('disabled','disabled');
        $('#modal_form_produk').modal('show');
        $('.modal-title').text('Tambah Produk');
      }

    //simpan stok
    $('#form').submit(function(e) {
      console.log($("#form").serialize());
      $.ajax({
        url : '<?php echo site_url('gudang/updatestok');?>',
        type: 'POST',
        data: $("#form").serialize(),
        dataType: 'JSON',
        success: function(response){
           $('#modal_form_bahan').modal('hide');
           alert('Berhasil menambahkan barang');
           location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Gagal menambahkan barang \n'+errorThrown);
        }
      });
      e.preventDefault();
    });

    //simpan produk
    $('#form2').submit(function(e) {
      $.ajax({
        url : '<?php echo site_url('gudang/simpanproduk');?>',
        type: 'POST',
        data: $("#form2").serialize(),
        dataType: 'JSON',
        success: function(response){
           $('#modal_form_produk').modal('hide');
           alert('Berhasil menambah produk');
           location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
    		{
    			alert('Gagal menambahkan produk \n'+errorThrown);
    		}
      });
      e.preventDefault();
    });

    //edit dblclick
  	$(document).on('dblclick', '.edit' ,function() {
  	var ok = 0;
  	var id = $(this).closest('tr').find('td.id').text();
    var where = $(this).closest('tr').find('td.id').prop('id');
    var tabel = $(this).closest('tr').find('td.id').attr('name');
  	var kolom = $(this).attr('id');
  	var teks = $(this).html();
  	var $this = $(this);
    var isian = $this.text();
    if (kolom == 'harga') {
      isian = isian.replace('Rp. ','');
      isian = isian.substring(0, isian.length-3);
      isian = isian.replace('.','');
    }
  	var $input = $('<input>', {
  		value: isian,
      id: 'input'+kolom,
  		type: 'text',
  		blur: function() {
        clearSelection();
  		   if (ok == 1)
  		   { if(kolom == 'harga'){
    			$this.text(toRp(this.value));
         }else{
    			$this.text(this.value);
         }
  			}
  			else{
  				$this.text(teks);
  				alert('Data belum tersimpan, tekan Enter untuk menyimpan');
  			}
  		},
  		keyup: function(e){
  			if((e.keyCode) === 13){
  				if (confirm('Apa anda yakin ingin menyimpannya?')){
            if(flag==1){
              ok = 1;
    					e.preventDefault();
    					var value = $input.val();
    					$.ajax({
    						type: "POST",
    						url:'<?php echo site_url('gudang/editsimpan')?>',
    						data: {
    							'id':id,
    							'isi':value,
    							'kolom':kolom,
    							'tabel':tabel,
                  'where':where
    						},
    						success: function(response){
    							alert(response);
    						},
    					});
            }
            else{
              alert(pesan);
            }
  				}
  			}
  		}
  	}).appendTo( $this.empty() ).focus();
  	});

    //valdiasi nama
    $(document).ready(function() {
      $(document).on('input', 'input#inputnama', function(){
        pesan = "Minimal 5 karakter, maksimal 30 karakter. \nKarakter spesial diperbolehkan";
        var value = $(this).val();
        var patt = new RegExp("^.{5,30}$");
        var valid = patt.test(value);
        if(valid){$(this).removeClass("invalid").addClass("valid"); flag=1;}
           else{$(this).removeClass("valid").addClass("invalid"); flag=0;}
      });
    });

    //validasi harga
    $(document).ready(function() {
      $(document).on('input', 'input#inputharga', function(){
        pesan = "Hanya angka diperbolehkan";
        var value = $(this).val();
        var patt = new RegExp("^[1-9][0-9]{0,11}$");
        var valid = patt.test(value);
        if(valid){$(this).removeClass("invalid").addClass("valid"); flag=1;}
           else{$(this).removeClass("valid").addClass("invalid"); flag=0;}
      });
    });

    //validasi satuan
    $(document).ready(function() {
      $(document).on('input', 'input#inputsatuan', function(){
        pesan = "Minimal 3 karakter, maksimal 15 karakter. \nKarakter spesial diperbolehkan";
        var value = $(this).val();
        var patt = new RegExp("^.{3,15}$");
        var valid = patt.test(value);
        if(valid){$(this).removeClass("invalid").addClass("valid"); flag=1;}
           else{$(this).removeClass("valid").addClass("invalid"); flag=0;}
      });
    });

  //to rupiah
  function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('') + ',00';
  }

  //hapus barang dan produk
	 $(document).ready(function(){
     $(document).on('click', '.delete', function(){
       var tabel = $(this).closest('td').attr('name');
       var id = $(this).attr('id');
       if(confirm('Apa anda yakin akan menghapus data ini?'))
       {
         $.ajax({
           url : "<?php echo site_url('gudang/hapus')?>/"+id,
           type: "POST",
           data : {'tabel' : tabel},
           dataType: "JSON",
           success: function(data)
           {
              alert('Data berhasil dihapus');
              location.reload();
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
               alert('Gagal menghapus data. Barang masih digunakan di produk');
           }
         });
       }
     });
   });

    //remove selection
    function clearSelection() {
      if(document.selection && document.selection.empty) {
          document.selection.empty();
      } else if(window.getSelection) {
          var sel = window.getSelection();
          sel.removeAllRanges();
      }
    }

    //search autocomplete
    $(document).ready(function(){
      $(document).on('keyup','.barang', function(){
        var idroot = $(this).closest('div.input').prop('id');
        var barang = $(this).val();
        if(barang != ''){
          $.post({
            url:'<?php echo site_url('gudang/search/') ?>',
            data : {'nama' : barang},
            success:function(data) {
              $('#'+idroot+' div.daftarbarang').fadeIn();
              $('#'+idroot+' div.daftarbarang').html(data);
            }
          });
        }else{
          $('#'+idroot+' div.daftarbarang').fadeOut();
        }
      });

      $(document).ready(function(){
        $(document).on('click', '#daftarbarang ul li', function(){
        var name = $(this).attr('name');
        var id = $(this).attr('id');
        var idroot = $(this).closest('div.input').prop('id');
        if(name == 'baru'){
          $('#'+idroot+' input.barang').val(id);
          $('#'+idroot+' input.satuan').removeAttr('disabled');
          $('#'+idroot+' input.satuan').removeAttr('readOnly');
          $('#'+idroot+' input.satuan').removeAttr('value');
          $('#'+idroot+' div.hilang').attr('class','form-group hilang');
          $('#'+idroot+' input.isiid').removeAttr('name');
          $('#'+idroot+' input.inputid').attr('name','pil[]');
          $('#'+idroot+' input.inputid').attr('required','required');
          $('#'+idroot+' div.daftarbarang').fadeOut();
        }else{
          $('#'+idroot+' input.barang').val($(this).text());
          $('#'+idroot+' input.inputid').removeAttr('name');
          $('#'+idroot+' input.isiid').attr('name','pil[]');
          $('#'+idroot+' input.isiid').val(id);
          $('#'+idroot+' div.hilang').attr('class','form-group hilang hidden');
          $('#'+idroot+' div.daftarbarang').fadeOut();
          $.get({
      			url : '<?php echo site_url('gudang/satuanbarang/');?>'+id,
      			success : function(data){
      				$('#'+idroot+' div.colsatuan').html(data);
      			}
      		});
        }
        });
      });
    });

    //satuan barang
    $(document).ready(function(){
      $(document).on('change', '.pil2', function(){
        var idroot = $(this).closest('div.input2').prop('id');
        var id = $(this).val();
        $.get({
          url : '<?php echo site_url('gudang/satuanbarang/');?>'+id,
          success : function(data){
            $('#'+idroot+' div.colsatuan').html(data);
          }
        });
      });
    });
	</script>
</body>
<?php
include 'footer.html'
?>
</html>
