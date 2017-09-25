<?php
include 'header.php'
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <style media="screen">
    table.tabel{
      width: 70%;
      margin-left: auto;
      margin-right: auto;
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
                <h3>Database<small> Barang Cabang</small></h3>
              </div>
            </div>
			<div class="clearfix"></div>

			<div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Stok Barang</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Stok Produk</a>
                </li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_title">
                      <h2>Silahkan Pilih Cabang :</h2>
            					<div class="col-md-8 col-sm-8 col-xs-6">
            					<select id="" class="form-control input-sm pil" onchange="javascript:lihatbarang(this.value)">
            						<option value="0" selected>--Pilih--</option>
            						<?php foreach($cabang as $c){?>
            						<option value="<?php echo $c->id?>"><?php echo $c->nama?></option>
            						<?php }?>
            					</select></div>
            					<a class="btn btn-default btn-sm disabled tom" id="tombol"><span class="fa fa-plus"></span> Tambah Barang</a>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>No. </th>
                              <th>ID Barang</th>
                              <th>Nama Barang</th>
                              <th>Harga</th>
                              <th>Stok</th>
                              <th>Satuan</th>
                              <th>Pengaturan</th>
                              <th>Hapus</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                    </div>
            			 </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_title">
                      <h2>Silahkan Pilih Cabang :</h2>
            					<div class="col-md-8 col-sm-8 col-xs-6">
            					<select id="" class="form-control input-sm pil" onchange="javascript:lihatproduk(this.value)">
            						<option value="0" selected>--Pilih--</option>
            						<?php foreach($cabang as $c){?>
            						<option value="<?php echo $c->id?>"><?php echo $c->nama?></option>
            						<?php }?>
            					</select></div>
            					<a class="btn btn-default btn-sm disabled tom" id="tombol2"><span class="fa fa-plus"></span> Tambah Barang</a>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <table id="myTable1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th>No. </th>
                              <th>ID Produk</th>
                              <th>Nama Produk</th>
                              <th>Harga</th>
                              <th>Stok</th>
                              <th>Info Detail</th>
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
      <form action="#" id="form" class="form-horizontal">
        <div class="modal-body form">
          <input type="hidden" value="" name="idcabang" id="idcabang"/>
          <div class="form-body" id="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Deskripsi</label>
              <div class="col-md-9">
                <input name="desk" id="" placeholder="Keterangan transaksi" class="form-control" type="text" maxlength="50" autocomplete="off">
              </div>
            </div>
            <div class="input" id="1000">
              <div class="form-group">
                <label class="control-label col-md-3">Nama Produk</label>
                <div class="col-md-7">
                  <select name="pil[]" class="form-control pilproduk" onchange="" required>
                    <option value="" selected>--Pilih--</option>
                    <?php foreach($produk as $d){?>
                    <option value="<?php echo $d->idproduk?>"><?php echo $d->nama?></option>
                    <?php }?>
                  </select>
                  <input type="hidden" name="nama[]" value="" class="nama">
                  <input type="hidden" name="kategori[]" value="" class="kategori">
                </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Jumlah</label>
                  <div class="col-md-3">
                    <input name="jml[]" id="jml" placeholder="Jumlah produk" class="form-control" type="text"  title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required>
                  </div>
                  <label class="control-label col-md-1" style="padding-left:3px">Harga</label>
                  <div class="col-md-3 colharga">
                    <input name="harga[]" id="harga" placeholder="Harga produk" class="form-control" type="text" disabled>
                  </div>
                  <div class="col-md-1">
                    <a class="btn btn-primary btn-sm plus" id="2000" onclick=""><i class="fa fa-plus"></i></a>
                  </div>
                </div>
            </div>
          </div>
          </div>
          <div class="modal-footer">
            <input type="submit" id="btnSave" class="btn btn-default" value="Simpan">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          </div>
        </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form_satuan" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title2"></h3>
      </div>
    <form action="#" id="form_satuan" class="form-horizontal">
      <div class="modal-body form">
        <input type="hidden" id="idcabang2" value="" name="idcabang"/>
          <div class="form-body" id="form-body2">
            <div class="form-group">
              <label class="control-label col-md-4">Satuan Sebelumnya</label>
              <div class="col-md-8">
                <input name="" id="satuan" value="" class="form-control" type="text" disabled>
                <input name="stok" id="stok" value="" class="form-control" type="hidden">
                <input name="idbarang" id="idbarang" value="" class="form-control" type="hidden">
                <input name="harga" id="harga" value="" class="form-control" type="hidden">
              </div>
            </div>
            <div class="modal-header">
              <h4 class="" align="center">Konversi per 1 satuan sebelumnya</h4>
            </div>
            <div class="modal-body form" id="form-body2">
              <div class="form-group">
                <label class="control-label col-md-3" style="padding-left:0px">Konstanta</label>
                <div class="col-md-3">
                  <input name="jml" id="jml" placeholder="Kons konversi" class="form-control" type="text" title="Hanya angka dan titik diperbolehkan. Gunakan titik untuk desimal" pattern="^[0-9.]{0,11}$" maxlength="11" autocomplete="off" required>
                </div>
                <label class="control-label col-md-2" style="padding-left:3px">Satuan</label>
                <div class="col-md-3 colsatuan" >
                  <input name="satuan" value="" id="" class="form-control satuan" type="text" placeholder="kg, pc, dll"  title="Minimal 3 karakter, maksimal 15 karakter. Karakter spesial diperbolehkan" pattern="^.{3,15}$" minlength="3" maxlength="15" autocomplete="off" required>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="modal-footer">
            <input type="submit" id="btnSave2" class="btn btn-default" value="Simpan">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          </div>
        </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form_komposisi" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title3"></h3>
      </div>
      <form action="#" id="form_komposisi" class="form-horizontal">
        <div class="modal-body form">
          <input type="hidden" id="idcabang3" value="" name="idcabang"/>
          <input type="hidden" id="idproduk2" value="" name="idproduk"/>
          <div class="form-body" id="form-body3">
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" id="btnSave3" class="btn btn-default" value="Simpan">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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

  var flag = 1;
  var pesan;

  //init datatable
	$('#myTable, #myTable1').DataTable({
    responsive:false
  });

  //tampil produk
	function lihatbarang(id){
		if(id!=0){
			document.getElementById('tombol').setAttribute('class','btn btn-default btn-sm');
		}
		else{
			document.getElementById('tombol').setAttribute('class','btn btn-default btn-sm disabled');
		}
		$.get({
			url : '<?php echo site_url('data/tampilbarang/');?>'+id,
			success : function(data){
				$('#myTable').DataTable().destroy();
				$('#myTable tbody').html(data);
				$(document).ready(function() {
					$('#myTable').DataTable({
            responsive:false
          });
				});
			}
		});
	}

  var tabel;
  function lihatproduk(id){
    if(id!=0){
      document.getElementById('tombol2').setAttribute('class','btn btn-default btn-sm');
    }
    else{
      document.getElementById('tombol2').setAttribute('class','btn btn-default btn-sm disabled');
    }
    $.get({
      url : '<?php echo site_url('data/tampilproduk/');?>'+id,
      success : function(data){
        $('#myTable1').DataTable().destroy();
        $('#myTable1 tbody').html(data);
        $(document).ready(function() {
          tabel =  $('#myTable1').DataTable({
            responsive:false
          });
        });
      }
    });
  }

  //show modal tambah produk
	 $(function(){
     $('.tom').click( function(){
       var e = $(this).closest('div.tab-pane').find('select.pil');
       var value = e.children('option').filter(':selected').val();
       var teks = e.children('option').filter(':selected').text();
       document.getElementById('idcabang').value = value;
       $('#form')[0].reset();
       $('input.harga').removeAttr('value');
       $('input.harga').attr('disabled','disabled');
       $('#modal_form').modal('show');
       $('.modal-title').text('Tambah Produk di '+teks);
    });
  });

 //simpan tambah produk
 $('#form').submit(function (e){
   $.ajax({
     url : '<?php echo site_url('data/simpanbarang/');?>',
     type: "POST",
     data: $('#form').serialize(),
     dataType: "JSON",
     success: function(response){
       $('#modal_form').modal('hide');
       alert(response.pesan);
       location.reload();
     },
     error: function (jqXHR, textStatus, errorThrown){
       alert('Gagal mengirim barang. Stok barang tidak mencukupi');
     }
   });
   e.preventDefault();
 })


  //edit dblclick
	$(document).on('dblclick', '.edit' ,function() {
	var ok = 0;
  var e = $(this).closest('div.tab-pane').find('select.pil');
  var idcabang = e.children('option').filter(':selected').val();
	var id = $(this).closest('tr').find('td.idbarang').text();
  var where = $(this).closest('tr').find('td.idbarang').prop('id');
  var tabel = $(this).closest('tr').attr('name');
	var kolom = $(this).attr('id');
	var teks = $(this).html();
	var $this = $(this);
  var isian = $this.text();
  isian = isian.replace(' Rp. ','');
	var $input = $('<input>', {
		value: isian,
    id: 'input'+kolom,
		type: 'text',
		blur: function() {
      clearSelection();
		   if (ok == 1)
		   { if(kolom == 'harga'){
         $this.text('Rp. '+this.value);
       }else{$this.text(this.value);}
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
  						url:'<?php echo site_url('data/editsimpan')?>',
  						data: {
  							'id':id,
  							'isi':value,
  							'kolom':kolom,
  							'tabel':tabel,
                'idcabang':idcabang,
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

  //hapus data barang
	$(function() {
    $(document).on('click','.hapus', function(){
      var tabel = $(this).closest('tr').attr('name');
      var id = $(this).attr('name');
      if(confirm('Apa anda yakin akan menghapus data ini?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('data/hapus/')?>"+id,
            type: "POST",
            data:{
              'tabel' : tabel
            },
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


    //add input elemen tambah produk
    $(document).on('click', 'a.plus' ,function(){
        var id = $(this).attr('id');
        var ids = parseInt(id);
        var idbaru = ids+1;
        var idminus = idbaru*2; var idminus2 = idminus-2;
        var id2 = parseInt($(this).closest('div.input').prop('id'));
        var idsbaru = id2+1;
        $("#form-body").append('<div class="input" id="'+idsbaru+'"><div class="form-group"><label class="control-label col-md-3">Nama Barang</label><div class="col-md-7">'
        +'<select name="pil[]" class="form-control pilproduk" onchange="" required><option value="" selected>--Pilih--</option><?php foreach($produk as $d){?>'
        +'<option value="<?php echo $d->idproduk?>"><?php echo $d->nama?></option><?php }?></select><input type="hidden" name="nama[]" value="" class="nama"><input type="hidden" name="kategori[]" value="" class="kategori"></div></div>'
        +'<div class="form-group"><label class="control-label col-md-3">Jumlah</label><div class="col-md-3"><input name="jml[]" id="jml" placeholder="Jumlah produk" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required></div>'
        +'<label class="control-label col-md-1" style="padding-left:3px">Harga</label><div class="col-md-3 colharga"><input name="harga[]" id="harga" placeholder="Harga produk" class="form-control" type="text" disabled></div>'
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

     //remove all select
    function clearSelection() {
      if(document.selection && document.selection.empty) {
          document.selection.empty();
      } else if(window.getSelection) {
          var sel = window.getSelection();
          sel.removeAllRanges();
      }
    }

    //harga otomatis
    $(document).ready(function(){
      $(document).on('change', '.pilproduk', function(){
        var idroot = $(this).closest('div.input').prop('id');
        var id = $(this).val();
        var nama = $(this).children("option").filter(":selected").text();
        $('#'+idroot+' input.nama').val(nama);
        $.get({
          url : '<?php echo site_url('data/hargaproduk/') ?>'+id,
          dataType:'json',
          success: function(data){
            $('#'+idroot+' div.colharga').html(data.output1);
            $('#'+idroot+' input.kategori').val(data.output2);
          }
        });
      });
    });

    //details produk
    function format3 (id) {
      return '<table id="myTable3" class="table dt-responsive table-bordered nowrap tabel" width="100%"><thead>'
      +'<tr><th colspan="3" style="text-align:center;background:#ededed">Komposisi produk '+id+'</th>'
      +'</tr><tr><th>Nama barang</th><th>Jumlah</th><th>Satuan</th></tr></thead>'
      +'<tbody class="'+id+'"></tbody></table>';
    }

    //show details produk
    $(document).ready(function(){
      $(document).on('click', 'td button.details', function (){
        var e = $(this).closest('div.tab-pane').find('select.pil');
        var idcabang = e.children('option').filter(':selected').val();
        var tr = $(this).closest('tr');
        var row = tabel.row(tr);
        var id = tr.prop('id');
        $.ajax({
          url:'<?php echo site_url('data/detailproduk/');?>',
          type : 'get',
          data:{
            'idcabang' : idcabang,
            'idproduk' : id
          },
          success: function(data){
            $('.'+id).html(data);
          }
        });
        if (row.child.isShown()) {
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

    //show setting konversi
    $(function() {
      $(document).on('click','.setting', function(){
        var idbarang = $(this).closest('tr').find('td.idbarang').text();
        var nama = $(this).closest('tr').find('td.nama').text();
        var satuan = $(this).closest('tr').find('td.satuan').text();
        var stok = $(this).closest('tr').find('td.stok').text();
        var harga = $(this).closest('tr').find('td.harga').text();
        harga = parseInt(harga.replace('Rp. ',''));
        var e = $(this).closest('div.tab-pane').find('select.pil');
        var idcabang = e.children('option').filter(':selected').val();
        var namacabang = e.children('option').filter(':selected').text();
        $('#idcabang2').attr('value',idcabang);
        $('input#satuan').attr('value',satuan);
        $('input#stok').attr('value',stok);
        $('input#idbarang').attr('value',idbarang);
        $('input#harga').attr('value',harga);
        $('#form_satuan')[0].reset();
        $('#modal_form_satuan').modal('show');
        $('.modal-title2').text('Konversi Satuan '+nama+' di '+namacabang);
      });
    });

    //simpan konversi
    $('#form_satuan').submit(function(e){
      $.ajax({
       url : '<?php echo site_url('data/konversi/');?>',
       type: "POST",
       data: $('#form_satuan').serialize(),
       dataType: "JSON",
       success: function(response)
       {
          $('#modal_form').modal('hide');
          alert(response.pesan);
          location.reload();
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
         alert('Gagal mengkonversi satuan barang');
       }
     });
     e.preventDefault();
    });

    //show setting komposisi
    $(function() {
      $(document).on('click','.komposisi', function(){
        var idproduk = $(this).closest('tbody').attr('class');
        var produk = $('#myTable1 tr#'+idproduk).find('td.nama').text();
        var e = $(this).closest('div.tab-pane').find('select.pil');
        var idcabang = e.children('option').filter(':selected').val();
        var namacabang = e.children('option').filter(':selected').text();
        $('#idcabang3').attr('value',idcabang);
        $('#idproduk2').attr('value',idproduk);
        $.ajax({
          url: '<?php echo site_url('data/komposisi/') ?>',
          type : 'get',
          data : {
            'idproduk' : idproduk,
            'idcabang' : idcabang
          },
          success : function(response){
            $('#form-body3').html(response);
          }
        });
        $('#form_komposisi')[0].reset();
        $('#modal_form_komposisi').modal('show');
        $('.modal-title3').text('Edit komposisi '+produk+' di '+namacabang);
      });
    });

    //simpan komposisi
    $('#form_komposisi').submit(function(e){
      $.ajax({
       url : '<?php echo site_url('data/simpankomposisi/');?>',
       type: "POST",
       data: $('#form_komposisi').serialize(),
       dataType: "JSON",
       success: function(response)
       {
          $('#modal_form_komposisi').modal('hide');
          alert(response.pesan);
          location.reload();
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
         alert('Gagal mengubah komposisi produk');
       }
     });
     e.preventDefault();
    });
	</script>
</body>
<?php
include 'footer.html'
?>
</html>
