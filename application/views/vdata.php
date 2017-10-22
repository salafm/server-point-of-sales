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
    .glyphicon-remove {
      color: red;
      font-size: 20px;
    }

    .glyphicon-ok{
      color:green;
      font-size: 20px;
    }
    .alert{
      color:red;
      text-decoration: underline;
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
            					<a class="btn btn-default btn-sm disabled" id="tombol"><span class="fa fa-plus"></span> Kirim Barang</a>
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
            					<a class="btn btn-default btn-sm disabled" id="tombol2"><span class="fa fa-plus"></span> Tambah Produk</a>
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
          <input type="hidden" value="" name="idcabang" id="idcabang1"/>
          <div class="form-body" id="form-body">
          </div>
          </div>
          <div class="modal-footer" id="bawah">
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
        <input type="hidden" value="" name="idcabang" id="idcabang4"/>
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
          <div class="modal-header">
            <h4 class="" align="center">Komposisi Produk</h4>
          </div>
          <div class="modal-body form" id="form-body4">
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <input type="submit" id="btnSave4" class="btn btn-default" value="Simpan"/>
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

  var flag = 1;
  var pesan;

  //init datatable
	$('#myTable, #myTable1').DataTable({
    responsive:false
  });

  //----------------------------------------------------------all barang------------------------------------------------------
  //tampil barang
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

  //show modal tambah barang
	 $(function(){
     $(document).on('click','#tombol', function(){
       var e = $(this).closest('div.tab-pane').find('select.pil');
       var value = e.children('option').filter(':selected').val();
       var teks = e.children('option').filter(':selected').text();
       document.getElementById('idcabang1').value = value;
       $('#form')[0].reset();
       $('input.harga').removeAttr('value');
       $('input.harga').attr('disabled','disabled');
       $('#bawah').html('<input type="button" id="btn" class="btn btn-default" value="Cek Ketersediaan"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>');
       var isi ='<div class="form-group"><label class="control-label col-md-3">Deskripsi</label><div class="col-md-9">'
       +'<input name="desk" id="" placeholder="Keterangan transaksi" class="form-control" type="text" maxlength="50" autocomplete="off"></div></div>'
       +'<div class="input" id="barang1"><div class="form-group"></label><label class="control-label col-md-3">Nama Barang</label><div class="col-md-7">'
       +'<select name="pil[]" class="form-control pilbarang" onchange="" required><option value="" selected>--Pilih--</option><?php foreach($barang as $b){?>'
       +'<option value="<?php echo $b->idbarang?>"><?php echo $b->nama?></option><?php }?></select></div><label class="control-label col-md-1 ikon" id=""></label></div>'
       +'<div class="form-group"><label class="control-label col-md-3">Jumlah</label><div class="col-md-3"><input name="jml[]" id="jml" placeholder="Jumlah produk" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required></div>'
       +'<label class="control-label col-md-1" style="padding-left:3px">Satuan</label><div class="col-md-3 colsatuan"><input name="harga[]" id="harga" placeholder="Harga produk" class="form-control hidden" type="text" disabled>'
       +'<input name="satuan[]" id="satuan1" placeholder="Satuan Barang" class="form-control" type="text" disabled></div>'
       +'<div class="col-md-1"><a class="btn btn-primary btn-sm plus" id="pluss1"><i class="fa fa-plus"></i></a></div>';
       $("#form-body").html(isi);
       $('#modal_form').modal('show');
       $('.modal-title').text('Tambah Stok Barang di '+teks);
    }).on('click', 'a.plus' ,function(){
        var id = $(this).prop('id').replace('pluss','');
        var idb = parseInt(id)+1;
        var isi = '<div class="input" id="barang'+idb+'"><div class="form-group"></label><label class="control-label col-md-3">Nama Barang</label><div class="col-md-7">'
        +'<select name="pil[]" class="form-control pilbarang" onchange="" required><option value="" selected>--Pilih--</option><?php foreach($barang as $b){?>'
        +'<option value="<?php echo $b->idbarang?>"><?php echo $b->nama?></option><?php }?></select></div><label class="control-label col-md-1 ikon" id=""></label></div>'
        +'<div class="form-group"><label class="control-label col-md-3">Jumlah</label><div class="col-md-3"><input name="jml[]" id="jml" placeholder="Jumlah produk" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required></div>'
        +'<label class="control-label col-md-1" style="padding-left:3px">Satuan</label><div class="col-md-3 colsatuan"><input name="harga[]" id="harga" placeholder="Harga produk" class="form-control hidden" type="text" disabled>'
        +'<input name="satuan[]" id="satuan1" placeholder="Satuan Barang" class="form-control" type="text" disabled></div>'
        +'<div class="col-md-1"><a class="btn btn-primary btn-sm plus" id="pluss'+idb+'"><i class="fa fa-plus"></i></a></div>'
        +'<div class="col-md-1"><a class="btn btn-danger btn-sm minus" id="minuss'+idb+'"><i class="fa fa-minus"></i></a></div></div></div>';
        $("#form-body").append(isi);
         $('#pluss'+id).attr('class','btn btn-primary btn-sm plus hidden');
         $('#minuss'+id).attr('class','btn btn-primary btn-sm minus hidden');
    }).on('click','a.minus', function(){
      var id = $(this).prop('id').replace('minuss','');
      var idl = id-1;
      $('#barang'+id).remove();
      if(id == 1){
        $('#pluss'+idl).attr('class','btn btn-primary btn-sm plus');
      }else {
        $('#pluss'+idl).attr('class','btn btn-primary btn-sm plus');
        $('#minuss'+idl).attr('class','btn btn-danger btn-sm minus');
      }
    }).on('click','#btn', function(){
      $.ajax({
        url: '<?php echo site_url('data/cekbarang') ?>',
        type:'get',
        data: $('#form').serialize(),
        dataType:'JSON',
        success:function(data){
          var flag =1;
          for (var i = 0; i < data.length; i++) {
            var id = i+1;
            if(data[i] == 0){
              flag = 0;
              $('#barang'+id).find('label.ikon').html('<span class="glyphicon glyphicon-remove" ></span>');
            }else {
              $('#barang'+id).find('label.ikon').html('<span class="glyphicon glyphicon-ok" ></span>');
            }
          }

          if(flag == 0){
            var isi = '<label class="control-label pull-left alert">Stok barang tidak mencukupi</label>'
                     +'<input type="button" id="btn" class="btn btn-default" value="Cek Ketersediaan"/>'
                     +'<button type="button" class="btn btn-default batal1" data-dismiss="modal">Batal</button>';
            $('#bawah').html(isi);
          }else {
            var isi = '<input type="submit" class="btn btn-default pull-left" value="Kirim Barang"/>'
                     +'<input type="button" id="btn" class="btn btn-default" value="Cek Ketersediaan"/>'
                     +'<button type="button" class="btn btn-default batal1" data-dismiss="modal">Batal</button>';
           $('#bawah').html(isi);
          }
        }
      })
    });
  });

   //simpan tambah barang
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
         alert('Gagal mengirim barang. Stok barang tidak mencukupi.\nSilahkan tekan tombol cek ketersediaan terlebih dahulu.');
       }
     });
     e.preventDefault();
   });


  //-------------------------------------------------edit data doubleclick-----------------------------------------------------
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
  if (kolom == 'harga') {
    isian = isian.replace(' Rp. ','');
    isian = isian.substring(0, isian.length-3);
    isian = isian.replace('.','');
  }
  isian = isian.replace(' Rp. ','');
	var $input = $('<input>', {
		value: isian,
    id: 'input'+kolom,
		type: 'text',
		blur: function() {
      clearSelection();
		   if (ok == 1)
		   { if(kolom == 'harga'){
         $this.text(toRp(this.value));
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

     //remove all select
    function clearSelection() {
      if(document.selection && document.selection.empty) {
          document.selection.empty();
      } else if(window.getSelection) {
          var sel = window.getSelection();
          sel.removeAllRanges();
      }
    }

    //------------------------------------------konversi---------------------------------------------------------------------
    //show setting konversi
    $(function() {
      $(document).on('click','.setting', function(){
        var idbarang = $(this).closest('tr').find('td.idbarang').text();
        var nama = $(this).closest('tr').find('td.nama').text();
        var satuan = $(this).closest('tr').find('td.satuan').text();
        var stok = $(this).closest('tr').find('td.stok').text();
        stok = stok.replace(',','.');
        var harga = $(this).closest('tr').find('td.harga').text();
        harga = harga.replace(' Rp. ','');
        harga = harga.substring(0, harga.length-3);
        harga = harga.replace('.','');
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

    //----------------------------------------------------------all about komposisi-------------------------------------------------------------------
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
      }).on('click','.plusss', function(){
        var id = ($(this).prop('id')).replace('plus','');
        var idb = parseInt(id)+1;
        var idcabang = $('#idcabang3').val();
        $("#form-body3").append('<div class="input3" id="komposisi'+idb+'"><div class="form-group"><label class="control-label col-md-3">Nama Bahan</label><div class="col-md-7">'
        +'<select name="pil[]" class="form-control pil2" onchange="" required></select></div></div>'
        +'<div class="form-group"><label class="control-label col-md-3" style="padding-left:0px">Jumlah</label><div class="col-md-3"><input name="jml[]" id="jml" placeholder="Jumlah bahan" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required></div>'
        +'<label class="control-label col-md-1" style="padding-left:3px">Satuan</label><div class="col-md-3 colsatuan" ><input name="satuan[]" value="" id="" class="form-control satuan" type="text" disabled></div>'
        +'<div class="col-md-1"><a class="btn btn-primary btn-sm plusss" id="plus'+idb+'"><i class="fa fa-plus"></i></a></div>'
        +'<div class="col-md-1"><a class="btn btn-danger btn-sm minusss" id="minus'+idb+'"><i class="fa fa-minus"></i></a></div></div>');
        $('#plus'+id).attr('class','btn btn-primary btn-sm plusss hidden');
        $('#minus'+id).attr('class','btn btn-primary btn-sm minusss hidden');
        $.ajax({
         url : '<?php echo site_url('data/pilihbarang/') ?>'+idcabang,
         type:'get',
         success:function(data){
           $('#komposisi'+idb).find('select.pil2').html(data);
         }
       });
      }).on('click','.minusss', function(){
        var id = ($(this).prop('id')).replace('minus','');
        var idl = id-1;
        $('div#komposisi'+id).remove();
        if(idl == 1){
          $('a#plus'+idl).attr('class','btn btn-primary btn-sm plusss');
        }else{
          $('a#plus'+idl).attr('class','btn btn-primary btn-sm plusss');
          $('a#minus'+idl).attr('class','btn btn-danger btn-sm minusss');
        }
      }).on('change','.pilbarang', function(){
        var idb = $(this).closest('div.input').prop('id');
        var id = $(this).val();
        $.ajax({
          url : '<?php echo site_url('data/satuanbarang/') ?>',
          type:'get',
          data:{
            'idbarang' : id
          },
          success:function(data){
            $('#'+idb).find('div').find('div.colsatuan').html(data);
          }
        })
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



    //--------------------------------------------------------------all produk ------------------------------------------------------------------------

    var dtable;
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
            dtable =  $('#myTable1').DataTable({
              responsive:false
            });
          });
        }
      });
    }

    //show modal tambah produk
      $(function(){
        $('#tombol2').click( function(){
          var id = parseInt($(this).closest('div.input2').prop('id'));
          var e = $(this).closest('div.tab-pane').find('select.pil');
          var value = e.children('option').filter(':selected').val();
          var teks = e.children('option').filter(':selected').text();
          document.getElementById('idcabang4').value = value;
          $('#form2')[0].reset();
          $('div.daftarbarang').html('');
          $('div.hilang').attr('class','form-group hidden hilang');
          $('input.satuan').removeAttr('value');
          $('input.satuan').attr('disabled','disabled');
          $('#modal_form_produk').modal('show');
          $('.modal-title').text('Tambah Produk di '+teks);
          var isi = '<div class="input2" id="100"><div class="form-group"><label class="control-label col-md-3">Nama Bahan</label><div class="col-md-7">'
                    +'<select name="pil[]" class="form-control pil2" onchange="" id="pilihan" required></select></div></div><div class="form-group">'
                    +'<label class="control-label col-md-3" style="padding-left:0px">Jumlah</label><div class="col-md-3">'
                    +'<input name="jml[]" id="jml" placeholder="Jumlah bahan" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required>'
                    +'</div><label class="control-label col-md-1" style="padding-left:3px">Satuan</label><div class="col-md-3 colsatuan" >'
                    +'<input name="satuan[]" value="" id="" class="form-control satuan" type="text" disabled></div><div class="col-md-1">'
                    +'<a class="btn btn-primary btn-sm pluss" id="200" onclick=""><i class="fa fa-plus"></i></a></div></div></div>';
          $('#form-body4').html(isi);
          $.get({
            url : '<?php echo site_url('data/pilihbarang/') ?>'+value,
            success:function(data){
              $('#100').find('select.pil2').html(data);
            }
          });
       });
     });

      //simpan produk
      $('#form2').submit(function(e) {
        $.ajax({
          url : '<?php echo site_url('Data/simpanproduk');?>',
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

      //tambah elemen input produk
      $(document).on('click', 'a.pluss' ,function(){
          var idcabang = $('#idcabang4').val();
          var id = $(this).attr('id');
          var ids = parseInt(id);
          var idbaru = ids+1;
          var idminus = idbaru*2; var idminus2 = idminus-2;
          var id2 = parseInt($(this).closest('div.input2').prop('id'));
          var idsbaru = id2+1;
            $("#form-body4").append('<div class="input2" id="'+idsbaru+'"><div class="form-group"><label class="control-label col-md-3">Nama Bahan</label><div class="col-md-7">'
          +'<select name="pil[]" class="form-control pil2" onchange="" required></select></div></div>'
          +'<div class="form-group"><label class="control-label col-md-3" style="padding-left:0px">Jumlah</label><div class="col-md-3"><input name="jml[]" id="jml" placeholder="Jumlah bahan" class="form-control" type="text" title="Hanya angka diperbolehkan" pattern="^[1-9][0-9]{0,11}$" maxlength="11" autocomplete="off" required></div>'
          +'<label class="control-label col-md-1" style="padding-left:3px">Satuan</label><div class="col-md-3 colsatuan" ><input name="satuan[]" value="" id="" class="form-control satuan" type="text" disabled></div>'
          +'<div class="col-md-1"><a class="btn btn-primary btn-sm pluss" id="'+idbaru+'"><i class="fa fa-plus"></i></a></div>'
          +'<div class="col-md-1"><a class="btn btn-danger btn-sm minuss" id="'+idminus+'"><i class="fa fa-minus"></i></a></div></div>');
           $('#'+id).attr('class','btn btn-primary btn-sm pluss hidden');
           $('#'+idminus2).attr('class','btn btn-primary btn-sm minuss hidden');
           $.ajax({
             url : '<?php echo site_url('data/pilihbarang/') ?>'+idcabang,
             success:function(data){
               $('#'+idsbaru).find('select.pil2').html(data);
             }
           });
      }).on('click','a.minuss', function(){
        var id = $(this).attr('id');
        var ids = parseInt(id); ids2 = ids-2;
        var idbaru = ids/2; idbaru = idbaru-1;
        var id2 = $(this).closest('div.input2').prop('id');
        $('#'+id2).remove();
        $('#'+idbaru).attr('class','btn btn-primary btn-sm pluss');
        $('#'+ids2).attr('class','btn btn-danger btn-sm minuss');
      }).on('change','.pil2', function(){
        var idcabang = $('#idcabang4').val();
        var idb = $(this).closest('div.input2').prop('id');
        var id = $(this).val();
        $.ajax({
          url : '<?php echo site_url('data/satuanbarangclient/') ?>',
          type:'get',
          data:{
            'idbarang' : id,
            'idcabang' : idcabang
          },
          success:function(data){
            $('#'+idb).find('div').find('div.colsatuan').html(data);
          }
        })
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
          var row = dtable.row(tr);
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
	</script>
</body>
<?php
include 'footer.html'
?>
</html>
