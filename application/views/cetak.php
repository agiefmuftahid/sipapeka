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
                  <center><h2 class="box-title" style="font-family: 'Bree Serif', serif;">Cetak Laporan&nbsp;
                  <a data-balloon="Mencetak Laporan Berdasarkan Tahun dan Bulan" data-balloon-pos="right" class="text-black"><small><i class="fa fa-question-circle"></i></small></a>&nbsp;</h2></center><br>
                  <form action="<?php echo base_url('User/laporan') ?>" method="post" target="_blank">
                    <div style="margin-left: 120px;">
                      <div class="form-group">
                        <table class="table" style="width: 88%">
                          <tbody>
                            <tr>
                              <td colspan="2">Data Yang Ingin Di Cetak</td>
                              <td colspan="2">
                                <select name="tabel" id="tabel" class="form-control" onchange="yesnoCheck(this);" style="width: 100%;" >
                                  <option selected="selected" hidden value="">Pilih</option>
                                  <option value="tb_beli">Data Pembelian</option>
                                  <option value="tb_kwitansi">Data Distribusi</option>
                                  <option value="tb_barang">Stok Barang</option>
                                </select>
                              </td>
                            <tr>
                            <tr id="row1" style="display: none;">
                              <td><input type="radio" id="co" checked="checked" name="co" value="no1" onclick="setReadOnly(this)"></td>
                              <td>Berdasarkan Tahun Anggaran</td>
                              <td colspan="2">
                                <select name="tahun" id="tahun" class="form-control" style="width: 100%;" >
                                  <option selected="selected" hidden value="">-- Pilih Tahun --</option>
                                  <?php foreach ($data2 as $dt) {?>
                                  <option value="<?php echo $dt['tahun'];?>"><?php echo $dt['tahun'];?></option>
                                  <?php } ?>
                                </select>
                              </td>
                            <tr>
                            <tr id="row2" style="display: none;">
                              <td><input type="radio" id="co" name="co" value="no2" onclick="setReadOnly(this)"></td>
                              <td>Berdasarkan Bulan</td>
                              <td>
                                <select name="tahun2" id="tahun2" disabled="disabled" class="form-control" style="width: 100%;" >
                                  <option selected="selected" hidden value="">-- Pilih Tahun --</option>
                                  <?php foreach ($data2 as $dt) {?>
                                  <option value="<?php echo $dt['tahun'];?>"><?php echo $dt['tahun'];?></option>
                                  <?php } ?>
                                </select>
                              </td>
                              <td>
                                <select name="bulan" id="bulan" disabled="disabled" class="form-control" style="width: 100%;" >
                                  <option selected="selected" disabled="disabled" value="">-- Pilih Bulan --</option>
                                  <option value="01">Januari</option>
                                  <option value="02">Februari</option>
                                  <option value="03">Maret</option>
                                  <option value="04">April</option>
                                  <option value="05">Mei</option>
                                  <option value="06">Juni</option>
                                  <option value="07">Juli</option>
                                  <option value="08">Agustus</option>
                                  <option value="09">September</option>
                                  <option value="10">Oktober</option>
                                  <option value="11">November</option>
                                  <option value="12">Desember</option>
                                </select>
                              </td>
                            <tr>
                            <tr id="row3" style="display: none;">
                              <td><input type="radio" id="co" name="co" value="no3" onclick="setReadOnly(this)"></td>
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
                            <button class="btn btn-default" id="tombol" style="display: none;" type="submit" data-balloon="Cetak Laporan" data-balloon-pos="up" name="cetak"><i class="fa fa-print" aria-hidden="true" target="_blank"></i>&nbsp;&nbsp;Cetak</button></div>
                          </div>
                        </div>
                    </div><br><br>
                  </form>
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
            <input type="hidden" name="form" value="User/formLaporan">
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
    $('#tanggalBeli').datepicker({
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
    function yesnoCheck(that) {
        if (that.value == "tb_kwitansi" || that.value == "tb_beli") {
            document.getElementById("row1").style.display = "";
            document.getElementById("row2").style.display = "";
            document.getElementById("row3").style.display = "";
            document.getElementById("tombol").style.display = "";
        } else if(that.value == "tb_barang"){
            document.getElementById("tombol").style.display = "";
        }
    }
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tabel').change(function(){
      var tabel=$(this).val();
      if(tabel=="tb_beli" || tabel =="tb_kwitansi")
      {
        $('#tahun').prop('disabled',false);
        document.getElementById("tahun").value = "";
        document.getElementById("datepicker").value = "";
        document.getElementById("datepicker2").value = "";
        document.getElementById("tahun2").value = "";
        document.getElementById("bulan").value = "";
        document.getElementById("co").value = "no1";

      }else{
        $('#tahun').prop('disabled',true);
      }
    });
  });
</script>
<script type="text/javascript">
function setReadOnly(obj){
   if(obj.value == "no1"){
     $('#tahun').prop('disabled',false);
     $('#tahun2').prop('disabled',true);
     $('#bulan').prop('disabled',true);
     $('#datepicker').prop('disabled',true);
     $('#datepicker2').prop('disabled',true);
     document.getElementById("datepicker").value = "";
     document.getElementById("datepicker2").value = "";
     document.getElementById("tahun2").value = "";
     document.getElementById("bulan").value = "";
   } 
   else if(obj.value == "no2"){
     $('#tahun2').prop('disabled',false);
     $('#bulan').prop('disabled',false);
     $('#tahun').prop('disabled',true);
     $('#datepicker').prop('disabled',true);
     $('#datepicker2').prop('disabled',true);
     document.getElementById("datepicker").value = "";
     document.getElementById("datepicker2").value = "";
     document.getElementById("tahun").value = "";
   }
   else if(obj.value == "no3"){
     $('#datepicker').prop('disabled',false);
     $('#datepicker2').prop('disabled',false);
     $('#tahun2').prop('disabled',true);
     $('#bulan').prop('disabled',true);
     $('#tahun').prop('disabled',true);
     document.getElementById("tahun").value = "";
     document.getElementById("tahun2").value = "";
     document.getElementById("bulan").value = "";
   }
}
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
          url : "<?php echo site_url('Admin/ajax_edit2/')?>",
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
</body>
</html>
