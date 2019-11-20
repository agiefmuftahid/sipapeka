<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stok Barang | Badan Pertanahan Nasional Kanwil Provinsi Bengkulu</title>
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
              <div class="active tab-pane" id="activity2">
                  <h2 class="box-title" style="font-family: 'Bree Serif', serif;">Tabel Stok Barang&nbsp;
                  <a data-balloon="Menampilkan data stok barang habis pakai yang telah dibeli BPN dalam bentuk tabel" data-balloon-pos="right" class="text-black"><small><i class="fa fa-question-circle"></i></small></a>&nbsp;</h2><br>
                  <!-- /.box-header -->
                      <div>
                      </div><br><br>
                      <form action="<?php echo base_url('Stok/formBarang') ?>" method="post">
                        <div style="margin-left: 270px;">
                          <div class="col-md-3">
                            <select name="field" id="field" class="form-control" style="width: 100%;" >
                              <option selected="selected" disabled="disabled" value="">Filter By</option>
                              <option value="kodeBarang">Kode Barang</option>
                              <option value="namaBarang">Nama Barang</option>
                              <option value="kategori">Kategori</option>
                              <option value="satuan">Satuan</option>
                            </select>
                          </div>
                          <div class="col-md-3">
                            <input class="form-control" type="text" name="search" value="" placeholder="Kata Kunci">
                          </div>
                          <div class="col-md-4"><div class="tooltip-demo">
                            <button class="btn btn-default" type="submit" data-balloon="Cari" data-balloon-pos="up" name="button"><i class="fa fa-search" aria-hidden="true"></i></button>&nbsp;&nbsp;<button class="btn btn-default" type="submit" name="tampil" data-balloon="Tampil Semua" data-balloon-pos="up"><i class="fa fa-tasks" aria-hidden="true"></i></button></div>
                          </div>
                        </div><br><br><br><br>
                      </form>
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Kategori</th>
                          <th>Jumlah</th>
                          <th>Satuan</th>
                          <th>Harga per Satuan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No.</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Kategori</th>
                          <th>Jumlah</th>
                          <th>Satuan</th>
                          <th>Harga per Satuan</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                      <tbody>
                      <?php $x=1; $no=0; foreach($data as $dt){?>
                      <tr>
                                <td><?php echo ++$no;?></td>
                                <td><?php echo $dt['kodeBarang'];?></td>
                                <td><?php echo $dt['namaBarang'];?></td>
                                <td><?php echo $dt['kategori'];?></td>
                                <td><?php echo $dt['jumlah'];?></td>
                                <td><?php echo $dt['satuan'];?></td>
                                <td><?php echo 'Rp. ' . number_format( $dt['hargaSatuan'], 0 , '' , '.' ) . ',-';?></td>
                                <td>
                                  <center>
                                    <div class="tooltip-demo">
                                      <a
                                          <button  data-toggle="modal" data-target="#edit-data<?php echo $x;?>" data-balloon="Ubah Data" data-balloon-pos="up" class="btn btn-info"><i class="fa fa-pencil-square-o"></i></button>
                                      </a>
                                      <a><button  data-toggle="modal" data-balloon="Hapus Data" data-balloon-pos="up" data-target="#hapus-data<?php echo $x;?>" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                    </div>
                                  </center>
                              </td>
                      </tr>
                      <?php $x++; }?>
                      </tbody>
                  </table>
                  <!-- /.box-body -->
              </div>
              <div class="tab-pane" id="timeline2">
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
<!-- Modal Ubah -->
<?php $y=1; $no=0; foreach($data as $dt){?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $y;?>" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title" style="font-family: 'Bree Serif', serif;">Ubah Data</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('Stok/ubahBarang');?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                      <div class="form-group">
                          <label class="control-label col-md-3">Kode Barang</label>
                          <div class="col-md-9">
                            <input name="kodeLama" id="kodeLama" value="<?php echo $dt['kodeBarang'];?>" required placeholder="NPM" class="form-control" type="hidden">
                            <input name="kodeBarang" id="kodeBarang" value="<?php echo $dt['kodeBarang'];?>" required placeholder="Kode Barang" class="form-control" type="text">
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
                              <option selected hidden value="<?php echo $dt['idKategori'];?>"><?php echo $dt['kategori'] ?></option>
                              <?php $data2 = $this->db->query('Select * from tb_kategori')->result_array(); foreach ($data2 as $d) {?>
                              <option value="<?php echo $d['idKategori'];?>"><?php echo $d['kategori'];?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Jumlah</label>
                          <div class="col-md-9">
                            <input name="jumlah" readonly id="jumlah" value="<?php echo $dt['jumlah'];?>" required placeholder="Jumlah" class="form-control" type="text">
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
                            <input name="hargaSatuan" id="hargaSatuan" value="<?php echo $dt['hargaSatuan'];?>" required placeholder="Harga per Satuan" class="form-control" type="text">
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
<?php $y++;} ?>
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
        <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <p>Anda Yakin Ingin Menghapus Data ? </p>
        </div>
        <div class="modal-footer">
            <a href="<?php echo base_url('Stok/hapusBarang/'.$dt->kodeBarang);?>" class="btn btn-danger"> Ya&nbsp;</a>
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
            <input type="hidden" name="form" value="Stok/formBarang">
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
              modal.find('#kodeBarang').attr("value",div.data('kodebarang'));
              modal.find('#kodeLama').attr("value",div.data('kodebarang'));
              modal.find('#namaBarang').attr("value",div.data('namabarang'));
              modal.find('#kategori').attr("value",div.data('kategori'));
              modal.find('#jumlah').attr("value",div.data('jumlah'));
              modal.find('#satuan').attr("value",div.data('satuan'));
              modal.find('#hargaSatuan').attr("value",div.data('hargasatuan'));
          });
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
        $( '#jumlah' ).mask('000.000.000', {reverse: true});
        $( '#tahun' ).mask('0000', {reverse: true});

    })
</script>
</body>
</html>
