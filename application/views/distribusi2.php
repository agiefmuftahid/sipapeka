<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Distribusi Barang | Badan Pertanahan Nasional Kanwil Provinsi Bengkulu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/silatah/dist/img/Icon/logobpn.ico');?>">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/dist/css/skins/_all-skins.min.css'); ?>">
  <!-- Data Tables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/bower_components/select2/dist/css/select2.min.css'); ?>">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/balloon/balloon.css');?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/balloon/balloon.min.css');?>"/>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
</head>
<body class="hold-transition skin-black sidebar-mini" style="font-family: 'Bree Serif', serif;">
<div class="wrapper">
<?php $this->load->view('sidebar2'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#activity3" data-toggle="tab">Tambah Data</a></li>
                  <li><a href="#timeline3" data-toggle="tab">Tabel Distribusi</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity3">
                <div class="box-body">
                    <div class="col-md-12">
                      <center><h3 class="box-title" style="font-family: 'Bree Serif', serif;">Tambah Data Distribusi</h3></center></br></br>
                      <form class="form-horizontal" id="form_transaksi" role="form">
                            <div class="col-md-8">
                              <div class="form-group">
                                <label class="control-label col-md-3" 
                                  for="nama_barang">No Bukti :</label>
                                <div class="col-md-8">
                                  <input type="text" class="form-control reset" 
                                    name="noBukti" id="bukti">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3" 
                                  for="nama_barang">Pengambil</label>
                                <div class="col-md-8">
                                  <select name="pegawai" required id="pegawai" class="form-control" style="width: 100%;">
                                    <option selected hidden value="0">-- Pilih --</option>
                                    <?php foreach ($pegawai as $dt) {?>
                                    <option value="<?php echo $dt['NIP_pegawai'];?>"><?php echo $dt['namaPegawai'];?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3" 
                                  for="nama_barang">Pemberi</label>
                                <div class="col-md-8">
                                  <input type="text" class="form-control reset" 
                                    name="admin" id="admin">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3">Tanggal Keluar</label>
                                <div class="col-md-8">
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" required name="tgl_keluar" class="form-control pull-right" id="agief">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3" 
                                  for="id_barang">Id Barang :</label>
                                <div class="col-md-5">
                                  <input list="list_barang" class="form-control reset" 
                                    placeholder="Kode Barang" name="id_barang" id="id_barang" 
                                    autocomplete="off" onchange="showBarang(this.value)">
                                  <datalist id="list_barang">
                                    <?php foreach ($barang as $brg){ ?>
                                      <option value="<?php echo $brg['kodeBarang'];?>"><?php echo $brg['namaBarang']; ?></option>
                                    <?php } ?>
                                  </datalist>
                                </div>
                                <div class="col-md-1">
                                  <a href="javascript:;" class="btn btn-primary" data-balloon="Cari Barang" data-balloon-pos="up"
                                    data-toggle="modal" 
                                    data-target="#modal-cari-barang">
                                    <i class="fa fa-search"></i></a>
                                </div>
                              </div>
                              <div id="barang">
                                <div class="form-group">
                                  <label class="control-label col-md-3" 
                                    for="nama_barang">Nama Barang :</label>
                                  <div class="col-md-8">
                                    <input type="text" class="form-control reset" 
                                      name="nama_barang" id="nama_barang" 
                                      readonly="readonly">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3" 
                                    for="harga_barang">Harga (Rp) :</label>
                                  <div class="col-md-8">
                                    <input type="text" class="form-control reset" 
                                      name="harga_barang" id="harga_barang" 
                                      readonly="readonly">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3" 
                                    for="qty">Jumlah :</label>
                                </div>
                              </div><!-- end id barang -->
                              <div class="form-group">
                                <label class="control-label col-md-3" 
                                  for="sub_total">Total (Rp):</label>
                                <div class="col-md-8">
                                  <input type="text" class="form-control reset" 
                                    name="sub_total[]" id="sub_total" 
                                    readonly="readonly">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-md-offset-4 col-md-3">
                                    <button data-balloon="Tambah ke Tabel" data-balloon-pos="up" type="button" class="btn btn-primary" 
                                    id="tambah" onclick="addbarang()">
                                      <i class="fa fa-cart-plus"></i>  Tambah</button>
                                </div>
                                <div class="col-md-offset-1 col-md-1">
                                    <button data-balloon="Hapus Data" data-balloon-pos="up" type="button" class="btn btn-default" 
                                    id="tambah" onclick="reset()">
                                      Hapus</button>
                                </div>
                              </div>
                                <!-- </div>
                              </div> --><!-- end panel-->
                            </div><!-- end col-md-8 -->
                            <div class="col-md-4 mb">
                              <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="total" class="besar">Total (Rp) :</label>
                                      <input type="text" class="form-control input-lg" 
                                      name="total" id="total" placeholder="0"
                                      readonly="readonly"  value="<?= number_format( 
                                            $this->cart->total(), 0 , '' , '.' ); ?>">
                                  </div>
                              </div>
                            </div><!-- end col-md-4 -->
                      </form>
                      <form action="<?php echo base_url('Admin/tambahDistribusi');?>" role="form" method="post" class="form-horizontal">
                        <table id="table_transaksi" style="width: 100%;" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                                <th>No</th>
                                <th>No Bukti</th>
                                <th>Pengambil</th>
                                <th>Pemberi</th>
                                <th>Tanggal</th>
                                <th>Id Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                        <div class="col-md-offset-5" style="margin-top:20px">
                          <button type="submit" class="btn btn-primary btn-lg" 
                          id="selesai" disabled="disabled"><i class="fa fa-check-circle"></i>
                          &nbsp;Selesai</button>
                        </div>
                      </form>
                    </div><!-- end col-md-9 -->
                </div>
                  <!-- /.box-body -->
              </div>
              <div class="tab-pane" id="timeline3">
                <div class="box-body">
                  <h2 class="box-title" style="font-family: 'Bree Serif', serif;">Tabel Distribusi Barang&nbsp;
                  <a data-balloon="Menampilkan data distribusi barang ke tiap bidang dalam bentuk tabel" data-balloon-pos="right" class="text-black"><small><i class="fa fa-question-circle"></i></small></a>&nbsp;</h2><br>
                  <div>
                        <a data-balloon="Cetak" data-balloon-pos="up" href="<?php echo base_url('Admin/cetakDistribusi') ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Cetak</a>
                  </div><br><br>
                  <?=$this->session->flashdata('notif')?>
                  <form action="<?php echo base_url('Admin/formDistribusi') ?>" method="post">
                    <div style="margin-left: 120px">
                      <div class="form-group">
                        <table class="table" style="width: 88%">
                          <tbody>
                            <tr>
                              <td><input type="radio" checked="checked" name="co" value="no" onclick="setReadOnly(this)"></td>
                              <td>Berdasarkan Kata Kunci</td>
                              <td>
                                <select name="field" id="field" class="form-control" style="width: 100%;" >
                                  <option selected="selected" disabled="disabled" value="">Filter By</option>
                                  <option value="namaBarang">Nama Barang</option>
                                  <option value="noBukti">No Bukti</option>
                                  <option value="namaBidang">Pengambil</option>
                                </select>
                              </td>
                              <td>
                                <input class="form-control" type="text" id="search" name="search" value="" placeholder="Kata Kunci">
                              </td>
                            <tr>
                            <tr>
                              <td><input type="radio" name="co" value="yes" onclick="setReadOnly(this)"></td>
                              <td>Berdasarkan Rentang Tanggal</td>
                              <td>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                <input type="text" required disabled name="tgl1" class="form-control pull-right" id="datepicker">
                                </div>
                              </td>
                              <td>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                <input type="text" required disabled name="tgl2" class="form-control pull-right" id="datepicker2">
                                </div>
                              </td>
                            <tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12" style="margin-left: 260px;">
                          <div class="tooltip-demo">
                            <button class="btn btn-default" type="submit" data-balloon="Cari" data-balloon-pos="up" name="button"><i class="fa fa-search" aria-hidden="true"></i></button>&nbsp;&nbsp;<button class="btn btn-default" type="submit" name="tampil" data-balloon="Tampil Semua" data-balloon-pos="up"><i class="fa fa-tasks" aria-hidden="true"></i></button></div>
                          </div>
                        </div>
                    </div><br><br>
                  </form>
                  <!-- /.box-header --><br><br>
                  <table id="example1" class="table table-bordered table-striped">
                        <thead>
                              <tr>
                                <th>No.</th>
                                <th>No.Bukti</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal Keluar</th>
                                <th>Penerima</th>
                                <th>Pemberi</th>
                                <th>Harga Total</th>
                                <th>Aksi</th>
                              </tr>
                        </thead>
                        <tfoot>
                              <tr>
                                <th>No.</th>
                                <th>No.Bukti</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal Keluar</th>
                                <th>Penerima</th>
                                <th>Pemberi</th>
                                <th>Harga Total</th>
                                <th>Aksi</th>
                              </tr>
                        </tfoot>
                        <tbody>
                        <?php $x=1;   $no=0; foreach($data as $dt){?>
                            <tr>
                                      <td><?php echo ++$no;?></td>
                                      <td><?php echo $dt['noBukti'];?></td>
                                      <td><?php $barang=$this->db->query('select tb_barang.namaBarang, tb_barang.kodeBarang from tb_barang INNER JOIN tb_distribusi ON tb_barang.kodeBarang = tb_distribusi.kodeBarang WHERE tb_distribusi.noBukti='.$dt['noBukti'])->result_array();
                                        foreach ($barang as $barang){?>
                                        <?php echo "- ".$barang['namaBarang']." <br>"; ?>
                                        </a>
                                         <?php }?>
                                      </td>
                                      <td><?php $barang=$this->db->query('select tb_distribusi.jumlah from tb_barang INNER JOIN tb_distribusi ON tb_barang.kodeBarang = tb_distribusi.kodeBarang WHERE tb_distribusi.noBukti='.$dt['noBukti'])->result_array();
                                        foreach ($barang as $barang){?>
                                        <?php echo $barang['jumlah']." <br>"; ?>
                                        </a>
                                         <?php }?>
                                      </td>
                                      <td><?php echo $dt['tglDistribusi'];?></td>
                                      <td><?php echo $dt['namaPegawai'];?></td>
                                      <td><?php echo $dt['namaKantor'];?></td>
                                      <td><?php echo $dt['hargaTotal'];?></td>
                                      <td>
                                          <center>
                                            <div class="tooltip-demo">
                                              <a>
                                                  <button data-balloon="Ubah Data" data-balloon-pos="up"  data-toggle="modal" data-target="#ubah-data<?php echo $x;?>" class="btn btn-info" title="Ubah Data"><i class="fa fa-pencil-square-o"></i></button>
                                              </a>
                                              <a><button data-balloon="Hapus Data" data-balloon-pos="up" class="btn btn-danger" data-toggle="modal" data-target="#hapus-data<?php echo $x; ?>" title="Hapus Data"><i class="fa fa-trash"></i></button></a>
                                              <a>
                                                  <button data-balloon="Kwitansi" data-balloon-pos="up"  data-toggle="modal" data-target="#kwitansi<?php echo $x;?>" class="btn btn-warning" title="Cetak Kwitansi"><i class="fa fa-file-text"></i></button>
                                              </a>
                                            </div>
                                          </center>
                                      </td>
                            </tr>
                        <?php $x++; }?>
                        </tbody>
                  </table>
                </div>
              </div>
              <!-- /.box -->
              </div>
            </div>
          </div>
        <!-- /.col -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Alpha Version</b> 1.0
      </div>
      <strong>SI Distribusi Barang | BPN Kanwil Provinsi Bengkulu</strong>
   </footer>
   <?php $this->load->view('controlsidebar'); ?>
  </div>
  <!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<!-- ./wrapper -->
<!-- Modal Tambah -->
  <div class="modal fade" id="tambah-data" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" style="font-family: 'Bree Serif', serif;">Beli Barang</h3>
        </div>
        <form action="<?php echo base_url('Admin/tambahDistribusi');?>" method="post" id="form" class="form-horizontal">
          <div class="modal-body form">
              <div class="form-body">
                <div class="form-group">
                  <label class="control-label col-md-3">No. Bukti</label>
                  <div class="col-md-9">
                    <input name="noBukti" id="noBukti" required placeholder="No. Bukti" class="form-control" type="text">
                  </div>
                </div>
                <div id="form-group"> 
                  <div class="form-group">
                    <label class="control-label col-md-3">Detail Barang</label>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="kodeBarang[]" placeholder="Nama Barang">
                    </div>
                    <div class="col-md-4">
                      <input type="text" class="form-control" name="jumlah[]" placeholder="Jumlah">
                    </div>
                      <button class="btn btn-success" id="add_field_button"><i class="fa fa-plus-square"></i></button>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Tanggal Keluar</label>
                  <div class="col-md-9">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  <input type="text" required name="tglKeluar" class="form-control pull-right" id="datepicker">
                  </div>
                </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Penerima</label>
                  <div class="col-md-9">
                    <input name="NIP_pegawai" id="NIP_pegawai" required placeholder="Satuan" class="form-control" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Pemberi</label>
                  <div class="col-md-9">
                    <input name="NIP_user" id="NIP_user" required placeholder="Harga per Satuan" class="form-control" type="text">
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
        </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
  </div>
<!-- End Modal Tambah -->
<!-- Modal Ubah -->
<?php $y=1;$a=2; foreach($data as $dt){?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ubah-data<?php echo $y; ?>" class="modal fade">
    <div class="modal-dialog" style="width: 50%">
      <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title" style="font-family: 'Bree Serif', serif;">Ubah Data</h4>
            </div>
          <form class="form-horizontal" action="<?php echo base_url('Admin/ubahDistribusi')?>" method="post" enctype="multipart/form-data" role="form">
            <div class="modal-body">
                <div class="form-group">
                  <label class="control-label col-md-3">No Bukti</label>
                  <div class="col-md-8">
                    <input name="nmrBukti" id="noBukti" value="<?php echo $dt['noBukti'];?>" required placeholder="No Bukti" class="form-control" type="text">
                    <input name="noBukti" id="noBukti" value="<?php echo $dt['noBukti'];?>" required placeholder="No Bukti" class="form-control" type="hidden">
                  </div>
                </div>
                <div id="form-group<?php echo $a;?>">
                <?php $brg=$this->db->query('select tb_barang.namaBarang, tb_barang.kodeBarang, tb_distribusi.jumlah, tb_distribusi.idDistribusi from tb_barang INNER JOIN tb_distribusi ON tb_barang.kodeBarang = tb_distribusi.kodeBarang WHERE tb_distribusi.noBukti='.$dt['noBukti'])->result_array(); $w=1;
                foreach ($brg as $d) { if ($w==1) { ?>
                  <div class="form-group">
                    <label class="control-label col-md-3">Detail Barang</label>
                    <input type="hidden" class="form-control" value="<?php echo $d['idDistribusi'];?>" name="idDistribusi[]" placeholder="Nama Barang">
                    <div class="col-md-4">
                      <?php $he = $this->Madmin->lihat('tb_barang')->result_array(); ?>
                      <select name="kodeBarang[]" required id="kodeBarang" class="form-control" style="width: 100%;">
                        <option selected hidden value="<?php echo $d['kodeBarang'];?>"><?php echo $d['namaBarang'];?></option>
                        <?php foreach ($he as $n) {?>
                        <option value="<?php echo $n['kodeBarang'];?>"><?php echo $n['namaBarang'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" value="<?php echo $d['jumlah'];?>" name="jumlah[]" placeholder="Jumlah">
                      <input type="hidden" class="form-control" value="<?php echo $d['jumlah'];?>" name="jumlahLama[]" placeholder="Jumlah">
                    </div>
                      <button type="button" class="btn btn-success" id="add_field_button<?php echo $a;?>"><i class="fa fa-plus-square"></i></button>
                  </div>
                <?php }else{ ?>
                  <div class="form-group">
                    <label class="control-label col-md-3"></label>
                    <input type="hidden" class="form-control" value="<?php echo $d['idDistribusi'];?>" name="idDistribusi[]" placeholder="Nama Barang">
                    <div class="col-md-4">
                      <?php $he = $this->Madmin->lihat('tb_barang')->result_array(); ?>
                      <select name="kodeBarang[]" required id="kodeBarang" class="form-control" style="width: 100%;">
                        <option selected hidden value="<?php echo $d['kodeBarang'];?>"><?php echo $d['namaBarang'];?></option>
                        <?php foreach ($he as $n) {?>
                        <option value="<?php echo $n['kodeBarang'];?>"><?php echo $n['namaBarang'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" value="<?php echo $d['jumlah'];?>" name="jumlah[]" placeholder="Jumlah">
                      <input type="hidden" class="form-control" value="<?php echo $d['jumlah'];?>" name="jumlahLama[]" placeholder="Jumlah">
                    </div>
                      <button type="button" class="btn btn-danger" id="remove_field<?php echo $a;?>"><i class="fa fa-times"></i></button>
                  </div>
                <?php };$w++;}?>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Tanggal Keluar</label>
                  <div class="col-md-8">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  <input type="text" required name="tglDistribusi" value="<?php echo $dt['tglDistribusi'];?>" class="form-control pull-right" id="tglKeluar<?php echo $a;?>">
                  </div>
                </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Penerima</label>
                  <div class="col-md-8">
                    <input name="namaPegawai" id="namaPegawai" value="<?php echo $dt['namaPegawai'];?>" required placeholder="Satuan" class="form-control" type="text">
                    <input name="NIP_pegawai" id="NIP_pegawai" value="<?php echo $dt['NIP_pegawai'];?>" required placeholder="Satuan" class="form-control" type="hidden">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Pemberi</label>
                  <div class="col-md-8">
                    <input name="namaUser" id="namaUser" value="<?php echo $dt['namaKantor'];?>" required placeholder="Pemberi" class="form-control" type="text">
                    <input name="NIP_user" id="NIP_user" value="<?php echo $dt['NIP_user'];?>" required placeholder="Pemberi" class="form-control" type="hidden">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
            </div>
          </form>
      </div>
    </div>
  </div>
  <?php $y++;$a++; } ?>
<!-- END Modal Ubah -->
<!-- Modal Kwitansi -->
<?php $z=1; foreach($data2 as $dt){?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="kwitansi<?php echo $z; ?>" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h2 class="modal-title" style="font-family: 'Bree Serif', serif;"><i class="fa fa-print"></i> Cetak Kwitansi</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('Admin/cetakKwitansi')?>" method="post" enctype="multipart/form-data" role="form" target="_blank">
                <div class="modal-body">
                    <div class="form-group">
                      <label class="control-label col-md-3">No Bukti</label>
                      <div class="col-md-9">
                        <?php $brang=$this->db->query('select idDistribusi from tb_distribusi WHERE tb_distribusi.noBukti='.$dt['noBukti'])->result_array();
                        foreach ($brang as $d) { ?>
                        <input type="hidden" class="form-control" value="<?php echo $d['idDistribusi'];?>" name="idDistribusi[]" placeholder="Nama Barang"><?php } ?>
                        <input name="nmorBukti" readonly id="noBukti" value="<?php echo $dt['noBukti'];?>" required placeholder="No Bukti" class="form-control" type="text">
                      </div>
                    </div>
                    <div id="form-group2">
                    <?php $brg=$this->db->query('select tb_barang.namaBarang, tb_barang.kodeBarang, tb_distribusi.jumlah from tb_barang INNER JOIN tb_distribusi ON tb_barang.kodeBarang = tb_distribusi.kodeBarang WHERE tb_distribusi.noBukti='.$dt['noBukti'])->result_array(); $w=1;
                    foreach ($brg as $d) { if ($w==1) { ?>
                      <div class="form-group">
                        <label class="control-label col-md-3">Detail Barang</label>
                        <div class="col-md-5">
                          <input type="text" readonly class="form-control" value="<?php echo $d['kodeBarang'];?>" name="kodeBarang[]" placeholder="Nama Barang">
                        </div>
                        <div class="col-md-4">
                          <input type="text" readonly class="form-control" value="<?php echo $d['jumlah'];?>" name="jumlah[]" placeholder="Jumlah">
                        </div>
                      </div>
                    <?php }else{ ?>
                      <div class="form-group">
                        <label class="control-label col-md-3"></label>
                        <div class="col-md-5">
                          <input type="text" class="form-control" readonly value="<?php echo $d['kodeBarang'];?>" name="kodeBarang[]" placeholder="Nama Barang">
                        </div>
                        <div class="col-md-4">
                          <input type="text" class="form-control" readonly value="<?php echo $d['jumlah'];?>" name="jumlah[]" placeholder="Jumlah">
                        </div>
                      </div>
                    <?php };$w++;}?>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Tanggal Keluar</label>
                      <div class="col-md-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                      <input type="text" required readonly name="tglDistribusi" value="<?php echo $dt['tglDistribusi'];?>" class="form-control pull-right" id="tglKeluar">
                      </div>
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Penerima</label>
                      <div class="col-md-9">
                        <input name="NIP_pegawai" readonly id="NIP_pegawai" value="<?php echo $dt['NIP_pegawai'];?>" required placeholder="Satuan" class="form-control" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Pemberi</label>
                      <div class="col-md-9">
                        <input name="NIP_user" id="NIP_user" readonly value="<?php echo $dt['NIP_user'];?>" required placeholder="Pemberi" class="form-control" type="text">
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit"> Cetak&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div>
              </form>
            </div>
          </div>
      </div>
  </div>
  <?php $z++; } ?>
<!-- END Modal Kwitansi -->
<!-- Dialog Box -->
<?php $y=1; foreach ($data as $dt){?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-data<?php echo $y; ?>" class="modal fade">
    <div class="modal-dialog" style="width:30%;margin-top: 150px;">
      <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title" style="font-family: 'Bree Serif', serif;">Hapus</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('Admin/hapusDistribusi/'.$dt['noBukti']);?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <p>Anda Yakin Ingin Menghapus Data ? </p>
                    <?php $brg=$this->db->query('select tb_barang.namaBarang, tb_barang.kodeBarang, tb_distribusi.jumlah from tb_barang INNER JOIN tb_distribusi ON tb_barang.kodeBarang = tb_distribusi.kodeBarang WHERE tb_distribusi.noBukti='.$dt['noBukti'])->result_array(); $w=1;
                    foreach ($brg as $d) { ?>
                          <input type="hidden" readonly class="form-control" value="<?php echo $d['kodeBarang'];?>" name="kodeBarang[]" placeholder="Nama Barang">
                          <input type="hidden" readonly class="form-control" value="<?php echo $d['jumlah'];?>" name="jumlah[]">
                    <?php $w++;}?>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger"> Ya&nbsp;</button>
            <button type="button" class="btn btn-info" data-dismiss="modal"> Tidak</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php $y++;} ?>
<!-- dialog box -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="keluar" class="modal fade">
      <div class="modal-dialog" style="width:30%;margin-top: 150px;">
        <div class="modal-content">
          <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h4 class="modal-title" style="font-family: 'Bree Serif', serif;">Anda Yakin Ingin Keluar Dari Sistem ? </h4>
          </div>
          <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data" role="form">
          <div class="modal-footer">
              <a href="<?php echo base_url('Login/logout');?>" class="btn btn-danger"> Ya&nbsp;</a>
              <button type="button" class="btn btn-info" data-dismiss="modal"> Tidak</button>
          </div>
          </form>
        </div>
      </div>
    </div>
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/silatah/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/silatah/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/silatah/bower_components/Chart.js/Chart.js'); ?>"></script>
<!-- FastClick -->
<!-- DataTables -->
<script src="<?php echo base_url('assets/silatah/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/silatah/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/silatah/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/silatah/dist/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/silatah/dist/js/demo.js'); ?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/silatah/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/silatah/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
<script src="<?php echo base_url('assets/silatah/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?php echo base_url('assets/silatah/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('assets/silatah/bower_components/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/silatah/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets/silatah/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url('assets/silatah/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js'); ?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url('assets/silatah/plugins/timepicker/bootstrap-timepicker.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/silatah/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- page script -->
<script>
          var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
            showLeftPush = document.getElementById( 'showLeftPush' ),
            body = document.body;
            
          showLeftPush.onclick = function() {
            classie.toggle( this, 'active' );
            classie.toggle( body, 'cbp-spmenu-push-toright' );
            classie.toggle( menuLeft, 'cbp-spmenu-open' );
            disableOther( 'showLeftPush' );
          };
          

          function disableOther( button ) {
            if( button !== 'showLeftPush' ) {
              classie.toggle( showLeftPush, 'disabled' );
            }
          }
</script>
<script type="text/javascript">
function setReadOnly(obj){
   if(obj.value == "no"){
     $('#field').prop('disabled',false);
     $('#search').prop('disabled',false);
     $('#datepicker').prop('disabled',true);
     $('#datepicker2').prop('disabled',true);
     document.getElementById("datepicker").value = "";
     document.getElementById("datepicker2").value = "";
   } 
   else {
     $('#field').prop('disabled',true);
     $('#search').prop('disabled',true);
     $('#datepicker').prop('disabled',false);
     $('#datepicker2').prop('disabled',false);
     document.getElementById("field").value = "";
     document.getElementById("search").value = "";
   }
}
</script>
<script>
  $(function () {
    $('#example1').DataTable({
      'searching'   : false
    })
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

     //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }
    lineChartOptions.datasetFill = false
    var lineChartData = {
      labels  : [<?php foreach ($data2 as $key){
                echo "'".$key['tahun']."',";            
          }?>],
      datasets: [
        {
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#f56954',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php foreach ($data2 as $data2){
                                  echo $data2['jumlah'].',';            
          }?>]
        }
      ]
    }
    lineChart.Line(lineChartData, lineChartOptions)


    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.

   var color1 = '#f56954' 
   var color2 = '#f39c12' 
   var color3 = '#00c0ef' 
   var color4 = '#3c8dbc' 
   var color5 = '#000080'
   var color6 = '#DDA0DD'
   var color7 = '#808000'
   var color8 = '#8B0000'
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
    <?php $x=1; foreach ($data4 as $dt) { ?>
      {
        value    : <?php echo $dt['jumlah']; ?>,
        color    : color<?php echo $x;?>,
        highlight: '#d2d6de',
        label    : '<?php echo $dt['namaOrmawa'] ?>'
      }, <?php $x++;} ?>
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions) 

   
  })
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })
    $('#datepicker2').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })

    <?php $f=2; foreach ($data as $dt) {?>
    $('#tglKeluar<?php echo $f;?>').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })
    <?php $f++;} ?>
    
    $('#agief').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<!-- <script>
      $(document).ready(function() {
          // Untuk sunting
          $('#edit-data').on('show.bs.modal', function (event) {
              var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
              var modal          = $(this)
 
              // Isi nilai pada field
              modal.find('#idKeluar').attr("value",div.data('idkeluar'));
              modal.find('#kodeBarang').attr("value",div.data('kodebarang'));
              modal.find('#jumlah').attr("value",div.data('jumlah'));
              modal.find('#tglKeluar').attr("value",div.data('tglkeluar'));
              modal.find('#NIP_pegawai').attr("value",div.data('nippegawai'));
              modal.find('#NIP_user').attr("value",div.data('nipuser'));
          });
      });
</script>
<script>
      $(document).ready(function() {
          // Untuk sunting
          $('#kwitansi').on('show.bs.modal', function (event) {
              var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
              var modal          = $(this)
 
              // Isi nilai pada field
              modal.find('#idKeluar').attr("value",div.data('idkeluar'));
              modal.find('#kodeBarang').attr("value",div.data('kodebarang'));
              modal.find('#namaBarang').attr("value",div.data('namabarang'));
              modal.find('#jumlahKeluar').attr("value",div.data('jumlahkeluar'));
              modal.find('#tglKeluar').attr("value",div.data('tglkeluar'));
              modal.find('#namaPegawai').attr("value",div.data('namapegawai'));
              modal.find('#namaUser').attr("value",div.data('namauser'));
              modal.find('#jumlahTotal').attr("value",div.data('jumlahtotal'));
          });
      });
</script> -->
<script type="text/javascript">
  $(document).ready(function() {
      var max_fields      = 10; //maximum input boxes allowed
      var wrapper         = $("#form-group"); //Fields wrapper
      var add_button      = $("#add_field_button"); //Add button ID

      var x = 1; //initlal text box count
      $(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
              x++; //text box increment
              $(wrapper).append('<div class="form-group"><label class="control-label col-md-3"></label><div class="col-md-4"><input type="text" class="form-control" name="kodeBarang[]" placeholder="Nama Barang"></div><div class="col-md-4"><input type="text" class="form-control" name="jumlah[]" placeholder="Jumlah"></div><button type="button" class="btn btn-danger" id="remove_field"><i class="fa fa-times"></i></button></div>'); //add input box
          }
      });

      $(wrapper).on("click","#remove_field", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent('div').remove(); x--;
      })
  });

</script>

<?php $o=2; foreach ($data as $dt) {?>
<script type="text/javascript">
  $(document).ready(function() {
      var max_fields      = 10; //maximum input boxes allowed
      var wrapper         = $("#form-group<?php echo $o;?>"); //Fields wrapper
      var add_button      = $("#add_field_button<?php echo $o;?>"); //Add button ID

      var x = 1; //initlal text box count
      $(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
              x++; //text box increment
              $(wrapper).append('<div class="form-group"><label class="control-label col-md-3"></label><input type="hidden" class="form-control" name="idDistribusi[]" placeholder="Nama Barang"><div class="col-md-4"><?php $he = $this->Madmin->lihat('tb_barang')->result_array(); ?><select name="kodeBarang[]" required id="kodeBarang" class="form-control" style="width: 100%;"><option selected hidden value="0">-- Pilih --</option><?php foreach ($he as $n) {?><option value="<?php echo $n['kodeBarang'];?>"><?php echo $n['namaBarang'];?></option><?php } ?></select></div><div class="col-md-3"><input type="text" class="form-control" name="jumlah[]" placeholder="Jumlah"><input type="hidden" class="form-control" value="<?php echo $d['jumlah'];?>" name="jumlahLama" placeholder="Jumlah"></div><button type="button" class="btn btn-danger" id="remove_field<?php echo $o; ?>"><i class="fa fa-times"></i></button></div>'); //add input box
          }
      });

      $(wrapper).on("click","#remove_field<?php echo $o;?>", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent('div').remove(); x--;
      })
  });
</script>
<?php $o++;}?>
<script type="text/javascript">
      function reset(){
        $('#sub_total').val('');
        $('#qty').val('');
        $('#harga_barang').val('');
        $('#nama_barang').val('');
        $('#id_barang').val('');
        $('#pegawai').val('');
        $('#admin').val('');
        $('#agief').val('');
        $('#bukti').val('');
      }
      function showBarang(str) 
      {

          if (str == "") {
              $('#nama_barang').val('');
              $('#harga_barang').val('');
              $('#qty').val('');
              $('#sub_total').val('');
              $('#reset').hide();
              return;
          } else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                 xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                 if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("barang").innerHTML = 
                    xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "<?= base_url(
              'index.php/admin/getbarang') ?>/"+str,true);
            xmlhttp.send();
          }
      }

      function subTotal(qty)
      {

        var harga = $('#harga_barang').val().replace(".", "").replace(".", "");

        $('#sub_total').val(convertToRupiah(harga*qty));
      }

      function convertToRupiah(angka)
      {

          var rupiah = '';    
          var angkarev = angka.toString().split('').reverse().join('');
          
          for(var i = 0; i < angkarev.length; i++) 
            if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
          
          return rupiah.split('',rupiah.length-1).reverse().join('');
      
      }

      var table;
        $(document).ready(function() {

          table = $('#table_transaksi').DataTable({ 
            paging: false,
            "info": false,
            "searching": false,
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' 
            // server-side processing mode.
            
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?= site_url('admin/ajax_list_transaksi')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
            { 
              "targets": [ 0,1,2,3,4,5,6 ], //last column
              "orderable": false, //set not orderable
            },
            ],

          });
        });

        function reload_table()
        {

          table.ajax.reload(null,false); //reload datatable ajax 
        
        }

        function addbarang()
        {
            var id_barang = $('#id_barang').val();
            var qty = $('#qty').val();
            if (id_barang == '') {
              $('#id_barang').focus();
            }else if(qty == ''){
              $('#qty').focus();
            }else{
           // ajax adding data to database
              $.ajax({
                url : "<?= site_url('admin/addbarang')?>",
                type: "POST",
                data: $('#form_transaksi').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                   //reload ajax table
                   reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding data');
                }
            });

              showTotal();
              //mereset semua value setelah btn tambah ditekan
              $('#sub_total').val('');
              $('#qty').val('');
              $('#harga_barang').val('');
              $('#nama_barang').val('');
              $('#id_barang').val('');
              var select_val = $('#pegawai option:selected').val();
              $('#pegawai').val(select_val);
              $('#bukti').prop('readonly',true);
              $('#admin').prop('readonly',true);
              $('#pegawai').prop('readonly',true);
              $('#agief').prop('readonly',true);
            };
            var total = $('#total').val().replace(".", "").replace(".", "");
            if (total > 0) {
              $('#selesai').removeAttr("disabled");
            }else{
              $('#selesai').attr("disabled","disabled");
            };
        }

        function deletebarang(id,sub_total)
        {
            // ajax delete data to database
              $.ajax({
                url : "<?= site_url('admin/deletebarang')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                   reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

              var ttl = $('#total').val().replace(".", "").replace(".", "");

              $('#total').val(convertToRupiah(ttl-sub_total));

        }

        function showTotal()
        {

          var total = $('#total').val().replace(".", "").replace(".", "");

          var sub_total = $('#sub_total').val().replace(".", "").replace(".", "");

          $('#total').val(convertToRupiah((Number(total)+Number(sub_total))));
          if (total > 0) {
            $('#selesai').removeAttr("disabled");
          }else{
            $('#selesai').attr("disabled","disabled");
          };

        }

        //maskMoney
      $('.uang').maskMoney({
        thousands:'.', 
        decimal:',', 
        precision:0
      });

        function showKembali(str)
        {
          var total = $('#total').val().replace(".", "").replace(".", "");
          var bayar = str.replace(".", "").replace(".", "");
          var kembali = bayar-total;

          $('#kembali').val(convertToRupiah(kembali));

          if (kembali >= 0) {
            $('#selesai').removeAttr("disabled");
          }else{
            $('#selesai').attr("disabled","disabled");
          };

          if (total == '0') {
            $('#selesai').attr("disabled","disabled");
          };
        }

</script>
<script type="text/javascript">
  $(document).ready(function(){
      $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
          localStorage.setItem('activeTab', $(e.target).attr('href'));
      });
      var activeTab = localStorage.getItem('activeTab');
      if(activeTab){
          $('#myTab a[href="' + activeTab + '"]').tab('show');
      }
  });
</script>
</body>
</html>
