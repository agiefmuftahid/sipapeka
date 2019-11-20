<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manajemen Bidang | Badan Pertanahan Nasional Kanwil Provinsi Bengkulu</title>
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
            <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#activity5" data-toggle="tab">Data Anggaran</a></li>
                  <li><a href="#timeline5" data-toggle="tab">Data Bidang/Subbag</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity5">
                  <h2 class="box-title" style="font-family: 'Bree Serif', serif;">Data Anggaran&nbsp;
                  <a data-balloon="Menampilkan data anggaran" data-balloon-pos="right" class="text-black"><small><i class="fa fa-question-circle"></i></small></a>&nbsp;</h2><br>
                  <div>
                        <button data-balloon="Tambah" data-balloon-pos="up" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-data"><i class="fa fa-plus-square"></i> Tambah </button>
                  </div><br><br>
                  <?=$this->session->flashdata('notif')?>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-striped">
                      <br/>
                      </br>
                        <thead>
                              <tr>
                                <th>No.</th>
                                <th>Tahun</th>
                                <th>Jumlah</th>
                                <th>Sisa</th>
                                <th>Aksi</th>
                              </tr>
                        </thead>
                        <tfoot>
                              <tr>
                                <th>No.</th>
                                <th>Tahun</th>
                                <th>Jumlah</th>
                                <th>Sisa</th>
                                <th>Aksi</th>
                              </tr>
                        </tfoot>
                        <tbody>
                        <?php $x=1;$no=0; foreach($data3 as $dt){?>
                            <tr>
                                      <td><?php echo ++$no;?></td>
                                      <td><?php echo $dt['tahun'];?></td>
                                      <?php $query = $this->db->query('select SUM(jumlah) as jlh from tb_anggaran where tahun="'.$dt['tahun'].'"')->row();
                                      $query2 = $this->db->query('select SUM(hargaTotal) as hrgtot from tb_beli where year(tanggalBeli)="'.$dt['tahun'].'"')->row()?>
                                      <td><?php echo 'Rp. ' . number_format( $dt['jlh'], 0 , '' , '.' ) . ',-';?></td>
                                      <td><?php echo 'Rp. ' . number_format(($query->jlh)-($query2->hrgtot), 0 , '' , '.' ) . ',-';?></td>
                                      <td>
                                          <center>
                                            <div class="tooltip-demo">
                                              <a>
                                                  <button data-balloon="Ubah Data" data-balloon-pos="up" data-toggle="modal" data-target="#ubah-data<?php echo $x; ?>" class="btn btn-info" title="Ubah Data"><i class="fa fa-pencil-square-o"></i></button>
                                              </a>
                                              <a><button data-balloon="Hapus Data" data-balloon-pos="up"  data-toggle="modal" data-target="#hapus<?php echo $x;?>" class="btn btn-danger" title="Hapus Data"><i class="fa fa-trash"></i></button></a>
                                              <a href="<?php echo base_url('Anggaran/cetakRAB/'.$dt['tahun']) ?>" target="_blank"><button data-balloon="Cetak RAB" data-balloon-pos="up"  data-toggle="modal" class="btn btn-default" title="Cetak RAB"><i class="fa fa-print"></i></button></a>
                                            </div>
                                          </center>
                                      </td>
                            </tr>
                        <?php $x++;}?>
                        </tbody>
                  </table>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
              </div>
              <div class="tab-pane" id="timeline5">
                  <h2 class="box-title" style="font-family: 'Bree Serif', serif;">Tabel Bidang&nbsp;
                  <a data-balloon="Menampilkan data bidang dalam bentuk tabel" data-balloon-pos="right" class="text-black"><small><i class="fa fa-question-circle"></i></small></a>&nbsp;</h2><br>
                  <div>
                        <button data-balloon="Tambah" data-balloon-pos="up" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-data"><i class="fa fa-plus-square"></i> Tambah </button>
                  </div><br>
                  <?=$this->session->flashdata('notif2')?>
                  <!-- /.box-header -->
                  <table id="example2" class="table table-bordered table-striped">
                      <br/>
                      </br>
                        <thead>
                              <tr>
                                <th>No.</th>
                                <th>Nama Bidang</th>
                                <th>Jatah</th>
                                <th>Aksi</th>
                              </tr>
                        </thead>
                        <tfoot>
                              <tr>
                                <th>No.</th>
                                <th>Nama Bidang</th>
                                <th>Jatah</th>
                                <th>Aksi</th>
                              </tr>
                        </tfoot>
                        <tbody>
                        <?php $x=1;$no=0; foreach($data as $dt){?>
                            <tr>
                                      <td><?php echo ++$no;?></td>
                                      <td><?php if(!empty($dt['namaBidang'])){echo $dt['namaBidang'];}?></td>
                                      <td><?php if(!empty($dt['jatah'])){echo 'Rp. ' . number_format( $dt['jatah'], 0 , '' , '.' ) . ',-';}?></td>
                                      <td>
                                          <center>
                                            <div class="tooltip-demo">
                                              <a>
                                                  <button data-balloon="Ubah Data" data-balloon-pos="up" data-toggle="modal" data-target="#edit-data<?php echo $x; ?>" class="btn btn-info" title="Ubah Data"><i class="fa fa-pencil-square-o"></i></button>
                                              </a>
                                              <a><button data-balloon="Hapus Data" data-balloon-pos="up"  data-toggle="modal" data-target="#hapus-data<?php echo $x;?>" class="btn btn-danger" title="Hapus Data"><i class="fa fa-trash"></i></button></a>
                                              <a>
                                                  <button data-balloon="Detail" data-balloon-pos="up" data-toggle="modal" data-target="#detail-data<?php echo $x; ?>" class="btn btn-warning" title="Detail"><i class="fa fa-info-circle"></i></button>
                                              </a>
                                            </div>
                                          </center>
                                      </td>
                            </tr>
                        <?php $x++;}?>
                        </tbody>
                  </table>
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
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title" style="font-family: 'Bree Serif', serif;">Tambah Data</h3>
                </div>
                <form action="<?php echo base_url('Bidang/tambahBidang')?>" method="post" id="form" class="form-horizontal">
                  <div class="modal-body form">
                      <div class="form-body">
                        <div class="form-group">
                          <label class="control-label col-md-3">Nama Bidang</label>
                          <div class="col-md-9">
                            <input name="namaBidang" id="namaBidang" required placeholder="Nama Bidang" class="form-control" type="text">
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
<!-- End Modal Tambah -->
<!-- Modal Tambah 2 -->
          <div class="modal fade" id="add-data" role="dialog">
            <div class="modal-dialog" style="width: 65%;">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title" style="font-family: 'Bree Serif', serif;">Tambah Data</h3>
                </div>
                <form action="<?php echo base_url('Anggaran/tambahAnggaran')?>" method="post" id="form" class="form-horizontal">
                  <div class="modal-body form">
                      <div class="form-body">
                        <div class="form-group">
                          <label class="control-label col-md-1">Tahun</label>
                          <div class="col-md-3">
                            <input name="tahun" id="tahun" required placeholder="Tahun" class="form-control" type="text">
                          </div>
                        </div><br>
                        <h4>Anggaran per Bidang :</h4><br>
                        <div class="form-group">
                          <div class="col-md-5">
                            <label>Umum dan Informasi</label>
                          </div>
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-1">
                            <h4 style="text-align: right;">Rp.</h4>
                          </div>
                          <div class="col-md-5">
                            <input type="text" required class="form-control" id="jumlah1" name="jumlah1" placeholder="Jumlah">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-5">
                            <label>Kepegawaian</label>
                          </div>
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-1">
                            <h4 style="text-align: right;">Rp.</h4>
                          </div>
                          <div class="col-md-5">
                            <input type="text" required class="form-control" id="jumlah2" name="jumlah2" placeholder="Jumlah">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-5">
                            <label>Perencanaan</label>
                          </div>
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-1">
                            <h4 style="text-align: right;">Rp.</h4>
                          </div>
                          <div class="col-md-5">
                            <input type="text" required class="form-control" id="jumlah3" name="jumlah3" placeholder="Jumlah">
                          </div>
                        </div><div class="form-group">
                          <div class="col-md-5">
                            <label>Keuangan dan BMN</label>
                          </div>
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-1">
                            <h4 style="text-align: right;">Rp.</h4>
                          </div>
                          <div class="col-md-5">
                            <input type="text" required class="form-control" id="jumlah4" name="jumlah4" placeholder="Jumlah">
                          </div>
                        </div><div class="form-group">
                          <div class="col-md-5">
                            <label>Infrastruktur Pertanahan</label>
                          </div>
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-1">
                            <h4 style="text-align: right;">Rp.</h4>
                          </div>
                          <div class="col-md-5">
                            <input type="text" required class="form-control" id="jumlah5" name="jumlah5" placeholder="Jumlah">
                          </div>
                        </div><div class="form-group">
                          <div class="col-md-5">
                            <label>Hubungan Hukum Pertanahan</label>
                          </div>
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-1">
                            <h4 style="text-align: right;">Rp.</h4>
                          </div>
                          <div class="col-md-5">
                            <input type="text" required class="form-control" id="jumlah6" name="jumlah6" placeholder="Jumlah">
                          </div>
                        </div><div class="form-group">
                          <div class="col-md-5">
                            <label>Penataan Pertanahan</label>
                          </div>
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-1">
                            <h4 style="text-align: right;">Rp.</h4>
                          </div>
                          <div class="col-md-5">
                            <input type="text" required class="form-control" id="jumlah7" name="jumlah7" placeholder="Jumlah">
                          </div>
                        </div><div class="form-group">
                          <div class="col-md-5">
                            <label>Pengadaan Tanah</label>
                          </div>
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-1">
                            <h4 style="text-align: right;">Rp.</h4>
                          </div>
                          <div class="col-md-5">
                            <input type="text" required class="form-control" id="jumlah8" name="jumlah8" placeholder="Jumlah">
                          </div>
                        </div><div class="form-group">
                          <div class="col-md-5">
                            <label>Penanganan Masalah dan Pengendalian Pertanian</label>
                          </div>
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-1">
                            <h4 style="text-align: right;">Rp.</h4>
                          </div>
                          <div class="col-md-5">
                            <input type="text" required class="form-control" id="jumlah9" name="jumlah9" placeholder="Jumlah">
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
<!-- End Modal Tambah -->
<!-- Modal Ubah -->
<?php $z=1; foreach ($data as $dt) {?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $z;?>" class="modal fade">
    <div class="modal-dialog" style="width:40%;">
      <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title" style="font-family: 'Bree Serif', serif;">Ubah Data</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('Bidang/ubahBidang')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="form-group">
              <label class="control-label col-md-3">Nama Bidang</label>
              <div class="col-md-9">
                <input type="hidden" id="idBidang" value="<?php echo $dt['idBidang'] ?>" name="idBidang"/>
                <input name="namaBidang" id="namaBidang" value="<?php echo $dt['namaBidang'] ?>" required placeholder="Nama Bidang" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Jatah</label>
              <div class="col-md-9">
                <input name="jatah" id="jatah" readonly value="<?php if(!empty($dt['jatah'])){echo $dt['jatah'];} ?>" required placeholder="Jatah" class="form-control" type="text">
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
  <?php $z++;} ?>
<!-- END Modal Ubah -->
<!-- Modal Ubah 2 -->
<?php $s=1;$e=2; foreach ($data3 as $dt) {?>
<div class="modal fade" id="ubah-data<?php echo $s;?>" role="dialog">
  <div class="modal-dialog" style="width: 75%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" style="font-family: 'Bree Serif', serif;">Ubah Data</h3>
      </div>
      <form action="<?php echo base_url('Anggaran/ubahAnggaran')?>" method="post" id="form" class="form-horizontal">
        <div class="modal-body form">
            <div class="form-body">
              <div class="form-group">
                <label class="control-label col-md-1">Tahun</label>
                <div class="col-md-3">
                  <input name="tahun" id="tahun" readonly value="<?php echo $dt['tahun']?>" required placeholder="Tahun" class="form-control" type="text">
                </div>
              </div>
              <center><h3>Anggaran per Bidang</h3></center>
              <div id="form-group<?php echo $e;?>">
               <?php $brg=$this->db->query('select tb_anggaran.idBidang, tb_bidang.namaBidang, tb_anggaran.idAnggaran, tb_anggaran.jumlah from tb_bidang INNER JOIN tb_anggaran ON tb_bidang.idBidang = tb_anggaran.idBidang WHERE tb_anggaran.tahun='.$dt['tahun'])->result_array(); $w=1;
                foreach ($brg as $d) { ?>
                <div class="form-group">
                  <div class="col-md-6"><input type="hidden" class="form-control" value="<?php echo $d['idAnggaran'];?>" name="idAnggaran[]">
                    <select name="idBidang[]" readonly required id="idBidang" class="form-control" style="width: 100%;">
                      <option selected hidden value="<?php echo $d['idBidang'];?>"><?php echo $d['namaBidang'];?></option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <input type="text" id="jlh2" class="form-control" value="<?php echo $d['jumlah'] ?>" name="jumlah[]" placeholder="Jumlah">
                    <input type="hidden" id="jlh3" class="form-control" value="<?php echo $d['jumlah'] ?>" name="jumlahLama[]" placeholder="Jumlah">
                  </div>
                </div>
                <?php } ?>
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
<?php $s++;} ?>
<!-- End Modal UBah -->
<!-- Dialog Box -->
<?php $y=1; foreach ($data as $dt){?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-data<?php echo $y; ?>" class="modal fade">
    <div class="modal-dialog" style="width:30%;margin-top: 150px;">
      <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title" style="font-family: 'Bree Serif', serif;">Hapus</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('Bidang/hapusBidang')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <p>Anda Yakin Ingin Menghapus Data ? </p>
        </div>
        <div class="modal-footer">
            <a href="<?php echo base_url('Bidang/hapusBidang/'.$dt['idBidang']);?>" class="btn btn-danger"> Ya&nbsp;</a>
            <button type="button" class="btn btn-info" data-dismiss="modal"> Tidak</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php $y++;} ?>
<!-- Modal Detail -->
<!-- Dialog Box -->
<?php $o=1; foreach ($data3 as $dt){?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus<?php echo $o; ?>" class="modal fade">
    <div class="modal-dialog" style="width:30%;margin-top: 150px;">
      <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title" style="font-family: 'Bree Serif', serif;">Hapus</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('Anggaran/hapusAnggaran/'.$dt['tahun']);?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <p>Anda Yakin Ingin Menghapus Data ? </p>
                    <?php $brg=$this->db->query('select jumlah, idBidang from tb_anggaran WHERE tb_anggaran.tahun="'.$dt['tahun'].'"')->result_array(); $w=1;
                    foreach ($brg as $d) { ?>
                          <input type="hidden" readonly class="form-control" value="<?php echo $d['idBidang'];?>" name="idBidang[]" placeholder="Nama Barang">
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
  <?php $o++;} ?>
<!-- Modal Detail -->
<?php $e=1; foreach ($data as $dt) {?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detail-data<?php echo $e;?>" class="modal fade">
    <div class="modal-dialog" style="width:60%;">
      <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title" style="font-family: 'Bree Serif', serif;">Daftar Pegawai</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('Bidang/ubahBidang')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <table class="table table-bordered">
                        <thead>
                              <tr>
                                <th>No.</th>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>Bidang</th>
                              </tr>
                        </thead>
                        <tbody>
                        <?php $brang=$this->db->query('select * from tb_pegawai join tb_bidang on tb_pegawai.idBidang = tb_bidang.idBidang WHERE tb_pegawai.idBidang='.$dt['idBidang'])->result_array(); ?>
                        <?php $x=1; $no=0; foreach($brang as $dt){?>
                            <tr>
                                      <td><?php echo ++$no;?></td>
                                      <td><?php echo $dt['NIP_pegawai'];?></td>
                                      <td><?php echo $dt['namaPegawai'];?></td>
                                      <td><?php echo $dt['namaBidang'];?></td>
                            </tr>
                        <?php $x++;}?>
                        </tbody>
                  </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php $e++;} ?>
<!-- END Modal Ubah -->
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
            <input type="hidden" name="form" value="Anggaran/formAnggaran">
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
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
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
<script type="text/javascript">
  $(document).ready(function() {
      var max_fields      = 15; //maximum input boxes allowed
      var wrapper         = $("#form-group"); //Fields wrapper
      var add_button      = $("#add_field_button"); //Add button ID

      var x = 1; //initlal text box count
      $(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
              x++; //text box increment
              $(wrapper).append('<div class="form-group"><div class="col-md-5"><select name="idBidang[]" required id="idBidang" class="form-control" style="width: 100%;"><option selected hidden value="0">-- Pilih --</option><?php foreach ($data as $n) {?><option value="<?php echo $n['idBidang'];?>"><?php echo $n['namaBidang'];?></option><?php } ?></select></div><div class="col-md-1"></div><div class="col-md-1"><h4 style="text-align: right;">Rp.</h4></div><div class="col-md-4"><input type="text" class="form-control" id="jumlah" name="jumlah[]" placeholder="Jumlah"></div><button type="button" class="btn btn-danger" id="remove_field"><i class="fa fa-times"></i></button></div>'); //add input box
          }
      });

      $(wrapper).on("click","#remove_field", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent('div').remove(); x--;
      })
  });

</script>
<?php $o=2; foreach ($data3 as $dt) {?>
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
              $(wrapper).append('<div class="form-group"><div class="col-md-6"><select name="idBidang[]" required id="idBidang" class="form-control" style="width: 100%;"><option selected hidden value="0">-- Pilih --</option><?php foreach ($data as $n) {?><option value="<?php echo $n['idBidang'];?>"><?php echo $n['namaBidang'];?></option><?php } ?></select></div><div class="col-md-5"><input type="text" class="form-control" name="jumlah[]" placeholder="Jumlah"></div><button type="button" class="btn btn-danger" id="remove_field<?php echo $o;?>"><i class="fa fa-times"></i></button></div>'); //add input box
          }
      });

      $(wrapper).on("click","#remove_field<?php echo $o;?>", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent('div').remove(); x--;
      })
  });
</script>
<?php $o++;}?>
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
                $( '#jumlah1' ).mask('000.000.000', {reverse: true});
                $( '#jumlah2' ).mask('000.000.000', {reverse: true});
                $( '#jumlah3' ).mask('000.000.000', {reverse: true});
                $( '#jumlah4' ).mask('000.000.000', {reverse: true});
                $( '#jumlah5' ).mask('000.000.000', {reverse: true});
                $( '#jumlah6' ).mask('000.000.000', {reverse: true});
                $( '#jumlah7' ).mask('000.000.000', {reverse: true});
                $( '#jumlah8' ).mask('000.000.000', {reverse: true});
                $( '#jumlah9' ).mask('000.000.000', {reverse: true});
                $( '#jlh2' ).mask('000.000.000', {reverse: true});
                $( '#jlh3' ).mask('000.000.000', {reverse: true});
                $( '#tahun' ).mask('0000', {reverse: true});
 
            })
</script>
</body>
</html>
