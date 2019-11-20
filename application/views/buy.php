<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pembelian Barang | Badan Pertanahan Nasional Kanwil Provinsi Bengkulu</title>
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
    <?=$this->session->flashdata('akun')?>
      <div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <div class="tab-content">
              <div class="active tab-pane" id="activity1">
                  <h2 class="box-title" style="font-family: 'Bree Serif', serif;">Tabel Data Pembelian&nbsp;
                  <a data-balloon="Menampilkan data pembelian barang habis pakai dalam bentuk tabel" data-balloon-pos="right" class="text-black"><small><i class="fa fa-question-circle"></i></small></a>&nbsp;</h2>
                  <br>
                  <div>
                        <button data-balloon="Tambah" data-balloon-pos="up" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-data"><i class="fa fa-plus-square"></i> Tambah </button>&nbsp; <br>
                  </div><br><br>
                  <?=$this->session->flashdata('notif')?>
                  <form action="<?php echo base_url('Beli/formBeli') ?>" method="post">
                    <div style="margin-left: 120px;">
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
                                  <option value="Kategori">Kategori</option>
                                  <option value="tanggalBeli">Tahun Anggaran</option>
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
                        <div class="col-md-12" style="margin-left: 290px;">
                          <div class="tooltip-demo">
                            <button class="btn btn-default" type="submit" data-balloon="Cari" data-balloon-pos="up" name="button"><i class="fa fa-search" aria-hidden="true"></i></button>&nbsp;&nbsp;<button class="btn btn-default" type="submit" name="tampil" data-balloon="Tampil Semua" data-balloon-pos="up"><i class="fa fa-tasks" aria-hidden="true"></i></button></div>
                          </div>
                        </div>
                    </div><br><br><br>
                  </form>
                  <div class="col-md-3 pull-right">Sisa Anggaran&nbsp;:
                  <input readonly value="<?php echo 'Rp. ' . number_format( ($data5->jlh)-($data4->hrgtot), 0 , '' , '.' ) . ',-'; ?>" required class="form-control input-lg" type="text"><br>
                  </div>
                  <!-- /.box-header -->
                  <table id="example1" class="table table-bordered table-striped">
                      <br/>
                      </br>
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Tanggal Beli</th>
                          <th>No Bukti</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Kategori</th>
                          <th>Jumlah</th>
                          <th>Harga Total</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No.</th>
                          <th>Tanggal Beli</th>
                          <th>No Bukti</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Kategori</th>
                          <th>Jumlah</th>
                          <th>Harga Total</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                      <tbody>
                      <?php $x=1; $no=0; foreach($data as $dt){?>
                      <tr>
                        <td><?php echo ++$no;?></td>
                        <td><?php echo $dt['tanggalBeli'];?></td>
                        <td><?php echo $dt['noBukti'];?></td>
                        <td><?php echo $dt['kodeBarang'];?></td>
                        <td><?php echo $dt['namaBarang'];?></td>
                        <td><?php echo $dt['kategori'];?></td>
                        <td><?php echo $dt['jumlah'];?></td>
                        <td><?php echo 'Rp. ' . number_format( $dt['hrg'], 0 , '' , '.' ) . ',-'?></td>
                        <td>
                            <center>
                              <div class="tooltip-demo">
                                <a>
                                    <button data-balloon="Ubah Data" data-balloon-pos="up"  data-toggle="modal" data-target="#edit-data<?php echo $x; ?>" class="btn btn-info" title="Ubah Data"><i class="fa fa-pencil-square-o"></i></button>
                                </a>
                                <a><button data-balloon="Hapus Data" data-balloon-pos="up" class="btn btn-danger" data-toggle="modal" data-target="#hapus-data<?php echo $x; ?>" title="Hapus Data"><i class="fa fa-trash"></i></button></a>
                              </div>
                            </center>
                        </td>
                      </tr>
                      <?php $x++; }?>
                      </tbody>
                  </table>
              </div>
              <div class="tab-pane" id="timeline1">
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
        <b>Agief Muftahid</b> 1.0
      </div>
      <strong>SI Pengadaan Barang Persediaan Kantor | BPN Kanwil Provinsi Bengkulu</strong>
   </footer>
   <?php $this->load->view('controlsidebar'); ?>
  </div>
  <!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<!-- ./wrapper -->
<!-- Modal Tambah -->
          <div class="modal fade" id="tambah-data" role="dialog">
            <div class="modal-dialog" style="width:60%;">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title" style="font-family: 'Bree Serif', serif;">Tambah Data</h3>
                </div>
                <form action="<?php echo base_url('Beli/tambahBeli')?>" method="post" id="form" class="form-horizontal">
                  <div class="modal-body form">
                      <div class="form-body">
                        <div class="form-group">
                          <label class="control-label col-md-2">Tanggal Beli</label>
                          <div class="col-md-4">
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" value="<?php echo date('Y-m-d');?>" required name="tanggalBeli" class="form-control pull-right" id="date">
                            </div>
                          </div>
                          <?php $id=$this->db->query("SELECT IF(noBukti is not null,MAX(CAST(SUBSTRING(noBukti, 1, length(noBukti)-8)as int))+1,'1') as he FROM tb_beli ORDER BY noBukti ASC");?>
                          <label class="control-label col-md-2">No. Bukti</label>
                          <div class="col-md-3">
                            <input name="noBukti" readonly id="noBukti" value="<?php echo $id->row()->he.'.'.date('m').'.'.date('Y');?>" required placeholder="No. Bukti" class="form-control" type="text">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-2">Nama Barang</label>
                            <div class="col-md-9">
                              <div class="row">
                                <div class="col-md-6">
                                  <select name="kodeBarang" required id="kodeBarang" class="form-control" style="width: 100%;">
                                    <option selected hidden>-- Pilih Barang --</option>
                                    <option style="background-color: #3a9128;" value="0">Tambah Baru</option>
                                    <?php foreach ($data2 as $dt) {?>
                                    <option value="<?php echo $dt['kodeBarang'];?>"><?php echo $dt['namaBarang'];?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="col-md-6">
                                  <input name="namaBarang" disabled id="namaBarang" required placeholder="Nama Barang" class="form-control" type="text">
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-2">Kategori</label>
                            <div class="col-md-9">
                              <div class="row">
                                <div class="col-md-6">
                                  <select disabled name="kategori" required id="kategori" class="form-control" style="width: 100%;">
                                    <option selected hidden value="0">-- Pilih Kategori --</option>
                                    <option style="background-color: #3a9128;" value="0">Tambah Baru</option>
                                    <?php foreach ($data3 as $dt) {?>
                                    <option value="<?php echo $dt['idKategori'];?>"><?php echo $dt['kategori'];?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="col-md-6">
                                  <input name="ktg" disabled id="ktg" required placeholder="Kategori" class="form-control" type="text">
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-2">Keterangan</label>
                            <div class="col-md-9">
                             <div class="row">
                              <div class="col-md-4">
                                <input name="kdBarang" disabled id="kdBarang" required placeholder="Kode Barang" class="form-control" type="text">
                              </div>
                              <div class="col-md-4">
                                <input name="hargaSatuan" disabled id="hargaSatuan" required placeholder="Harga" class="form-control" type="text">
                              </div>
                              <div class="col-md-4">
                                <input name="satuan" disabled id="satuan" required placeholder="Satuan" class="form-control" type="text">
                              </div>
                             </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-2">Jumlah</label>
                            <div class="col-md-9">
                            <input name="jumlah" id="jumlah" required placeholder="Jumlah" class="form-control" type="text">
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
<?php $y=1; $h=2; foreach ($data as $dt) {?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $y;?>" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title" style="font-family: 'Bree Serif', serif;">Ubah Data</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('Beli/ubahBeli')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                      <div class="form-group">
                        <label class="control-label col-md-3">Tanggal Beli</label>
                        <div class="col-md-9">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          <input type="text" required value="<?php echo $dt['tanggalBeli'];?>" name="tanggalBeli" class="form-control pull-right" id="tanggalBeli<?php echo $y;?>">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">No. Bukti</label>
                        <div class="col-md-9">
                        <input name="noBuktiLama"  id="noBukti" value="<?php echo $dt['noBukti'];?>" required placeholder="No. Bukti" class="form-control" type="hidden">
                          <input name="noBukti" id="noBukti" value="<?php echo $dt['noBukti'];?>" required placeholder="No. Bukti" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Kode Barang</label>
                        <div class="col-md-9">
                          <input name="kodeBarang" id="kodeBarang" value="<?php echo $dt['kdBarang'];?>" required placeholder="Kode Barang" class="form-control" type="text">
                          <input name="kodeBarang2" id="kodeBarang2" value="<?php echo $dt['kdBarang'];?>" required placeholder="Kode Barang" class="form-control" type="hidden">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Nama Barang</label>
                        <div class="col-md-9">
                          <input name="namaBarang" id="namaBarang" value="<?php echo $dt['namaBarang'];?>" required placeholder="Nama Barang" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Kategori</label>
                        <div class="col-md-9">
                          <select name="kategori" required id="kategori" class="form-control" style="width: 100%;">
                            <option selected hidden value="<?php echo $dt['idKategori'];?>"><?php echo $dt['kategori'];?></option>
                            <?php foreach ($data3 as $d) {?>
                            <option value="<?php echo $d['idKategori'];?>"><?php echo $d['kategori'];?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Jumlah</label>
                        <div class="col-md-9">
                          <input name="jumlah" id="jumlah<?php echo $h;?>" value="<?php echo $dt['jumlah'];?>" required placeholder="Jumlah" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Satuan</label>
                        <div class="col-md-9">
                          <input name="satuan" id="satuan" value="<?php echo $dt['satuan'];?>" required placeholder="Satuan" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3">Harga per Satuan</label>
                        <div class="col-md-9">
                          <input name="hargaSatuan" value="<?php echo $dt['hargaSatuan'];?>" id="harga<?php echo $h;?>" required placeholder="Harga per Satuan" class="form-control" type="text">
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
  </div>
  <?php $y++; $h++;} ?>
<!-- END Modal Ubah -->
<!-- Dialog Box -->
<?php $y=1; foreach ($data as $dt){?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-data<?php echo $y; ?>" class="modal fade">
    <div class="modal-dialog" style="width:30%;margin-top: 150px;">
      <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title" style="font-family: 'Bree Serif', serif;">Hapus</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('Beli/hapusBeli/'.$dt['noBukti']);?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <p>Anda Yakin Ingin Menghapus Data ? </p>
        </div>
        <div class="modal-footer">
            <a href="<?php echo base_url('Beli/hapusBeli/'.$dt['noBukti']);?>" class="btn btn-danger"> Ya&nbsp;</a>
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
              <a href="<?php echo base_url('User/logout');?>" class="btn btn-danger"> Ya&nbsp;</a>
              <button type="button" class="btn btn-info" data-dismiss="modal"> Tidak</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <?php $nip = $this->session->userdata('nip');
  $user = $this->db->query('select * from tb_user join tb_pegawai on tb_user.NIP_pegawai=tb_pegawai.NIP_pegawai where tb_user.NIP_pegawai ="'.$nip.'"')->result_array(); 
foreach($user as $dt){?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="pengaturan" class="modal fade">
      <div class="modal-dialog" style="width:40%;margin-top: 100px;margin-left: 400px">
        <div class="modal-content">
          <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h4 class="modal-title" style="font-family: 'Bree Serif', serif;">Pengaturan</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url('User/ubahUser');?>" method="post" enctype="multipart/form-data" role="form">
          <div class="modal-body">
            <div class="form-group">
              <label class="control-label col-md-2">Username</label>
              <div class="col-md-10">
                <input name="username" id="username" value="<?php echo $dt['username'] ?>" max="12" required class="form-control" type="text">
                <input name="username2" id="username2" value="<?php echo $dt['username'] ?>" max="12" required class="form-control" type="hidden">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2">Password</label>
              <div class="col-md-10">
                <input name="password" id="password" value="<?php echo $dt['password'] ?>" max="12" required class="form-control" type="text">
              </div>
            </div>
            <input type="hidden" name="form" value="Beli/formBeli">
            <div class="form-group">
              <label class="control-label col-md-2">User</label>
              <div class="col-md-10">
                <select name="nip" required id="nip" class="form-control" style="width: 100%;">
                  <option selected hidden value="<?php echo $dt['NIP_pegawai'];?>"><?php echo $dt['namaPegawai'];?></option>
                  <?php $peg = $this->db->query('select * from tb_pegawai')->result_array(); ?>
                  <?php foreach ($peg as $n) {?>
                  <option value="<?php echo $n['NIP_pegawai'];?>"><?php echo $n['namaPegawai'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary"> Simpan</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
          </div>
          </form>
        </div>
      </div>
    </div>
<?php } ?>
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/silatah/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery/dist/jquery.mask.min.js'); ?>"></script>
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
<script type="text/javascript">
  function he(){
    var id = document.getElementById("ya").value;
    $.ajax({
      url : "<?php echo site_url('User/he/')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {

          $('[name="ye"]').val(data.noBukti);

      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
  });
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
    $('#date').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })
    $('#datepicker2').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })
    <?php $f=1; foreach ($data as $dt) {?>
    $('#tanggalBeli<?php echo $f;?>').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })
    <?php $f++;} ?>
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
<script>
      $(document).ready(function() {
          // Untuk sunting
          $('#edit-data').on('show.bs.modal', function (event) {
              var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
              var modal          = $(this)
 
              // Isi nilai pada field
              modal.find('#idBeli').attr("value",div.data('idbeli'));
              modal.find('#tanggalBeli').attr("value",div.data('tanggalbeli'));
              modal.find('#noBukti').attr("value",div.data('nobukti'));
              modal.find('#kodeBarang').attr("value",div.data('kodebarang'));
              modal.find('#namaBarang').attr("value",div.data('namabarang'));
              modal.find('#jumlah').attr("value",div.data('jumlah'));
              modal.find('#satuan').attr("value",div.data('satuan'));
              modal.find('#hargaSatuan').attr("value",div.data('hargasatuan'));
          });
      });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#kodeBarang').change(function(){
      var fak=$(this).val();
      var he=$('#he').val();
      if(fak==0)
      {
        $('#kdBarang').prop('disabled',false);
        $('#namaBarang').prop('disabled',false);
        $('#satuan').prop('disabled',false);
        $('#hargaSatuan').prop('disabled',false);
        $('#kategori').prop('disabled',false);
        $('#ktg').prop('disabled',false);

        $('#kdBarang').prop('readonly',true);
        $('#namaBarang').prop('readonly',false);
        $('#satuan').prop('readonly',false);
        $('#hargaSatuan').prop('readonly',false);
        $('#kategori').prop('readonly',false);
        $('#ktg').prop('readonly',false);

        <?php $kode = $this->db->query("SELECT IF(kodeBarang is not null,MAX(CAST(SUBSTRING(kodeBarang, 1, length(kodeBarang))as int))+1,'000001') as idMax FROM tb_barang");?>
        document.getElementById("kdBarang").value = "<?php echo sprintf("%06d", $kode->row()->idMax);?>";
        document.getElementById("namaBarang").value = "";
        document.getElementById("satuan").value = "";
        document.getElementById("hargaSatuan").value = "";
        document.getElementById("kategori").value = "0";
        document.getElementById("ktg").value = "";
      }else
      {
        $('#kdBarang').prop('disabled',false);
        $('#namaBarang').prop('disabled',false);
        $('#satuan').prop('disabled',false);
        $('#hargaSatuan').prop('disabled',false);
        $('#ktg').prop('disabled',false);
        $('#kategori').prop('disabled',true);


        $('#kdBarang').prop('readonly',true);
        $('#namaBarang').prop('readonly',true);
        $('#satuan').prop('readonly',true);
        $('#hargaSatuan').prop('readonly',true);
        $('#ktg').prop('readonly',true);
        $.ajax({
          url : "<?php echo site_url('User/ajax_edit3/')?>",
          type: "GET",
          data : {'fak':fak},
          dataType: "JSON",
          success: function(data)
          {
              $('[name="kdBarang"]').val(data.kodeBarang);
              $('[name="namaBarang"]').val(data.namaBarang);
              $('[name="satuan"]').val(data.satuan);
              $('[name="hargaSatuan"]').val(data.hargaSatuan);
              $('[name="ktg"]').val(data.kategori);

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
        });
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#kategori').change(function(){
      var fak=$(this).val();
      if(fak==0)
      {
        $('#ktg').prop('disabled',false);

        $('#ktg').prop('readonly',false);

        document.getElementById("ktg").value = "";
      }else
      {
        $('#ktg').prop('disabled',false);


        $('#ktg').prop('readonly',true);
        $.ajax({
          url : "<?php echo site_url('User/ajax_edit2/')?>",
          type: "GET",
          data : {'fak':fak},
          dataType: "JSON",
          success: function(data)
          {
              $('[name="ktg"]').val(data.kategori);

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
        });
      }
    });
  });
</script>
<script type="text/javascript">
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#form-group"); //Fields wrapper
    var add_button      = $("#add_field_button"); //Add button ID
    var he      = 0; //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><div class="form-group"><label class="control-label col-md-2"></label><div class="col-md-3"><select name="kodeBarang" required id="kodeBarang" class="form-control" style="width: 100%;"><option value="1">Tambah</option><option value="he">he</option></select></div></div><div class="form-group"><label class="control-label col-md-2"></label><div class="col-md-3"><input name="namaBarang" disabled id="namaBarang" required placeholder="Nama Barang" class="form-control" type="text"></div><div class="col-md-2"><input name="hargaSatuan" disabled id="hargaSatuan" required placeholder="Harga Satuan" class="form-control" type="text"></div><div class="col-md-2"><input name="satuan" disabled id="satuan" required placeholder="Satuan" class="form-control" type="text"></div><div class="col-md-2"><input name="jumlah" id="jumlah" required placeholder="Jumlah" class="form-control" type="text"></div><button type="button" class="btn btn-danger" id="remove_field"><i class="fa fa-times"></i></button></div></div>');
        }
        he++;
        document.getElementById("he").value = he;
    });

    $(wrapper).on("click","#remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().remove(); x--;
    })
});

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
<script type="text/javascript">
            $(document).ready(function(){
 
                // Format mata uang.
                $( '#hargaSatuan' ).mask('000.000.000', {reverse: true});
                <?php $s=2; foreach ($data as $d) {?>
                $( '#harga<?php echo $s;?>' ).mask('000.000.000', {reverse: true});
                <?php $s++;} ?>
                $( '#jumlah' ).mask('000.000.000', {reverse: true});
                <?php $g=2; foreach ($data as $dt) {?>
                $( '#jumlah<?php echo $g;?>' ).mask('000.000.000', {reverse: true});
                <?php $g++;} ?>
 
            })
</script>
</body>
</html>
