<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cetak | Badan Pertanahan Nasional Kanwil Provinsi Bengkulu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
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
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
</head>
<style type="text/css" media="print">
  @page { size: landscape; }
</style>
<body onload="window.print();">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
          <center><a><img src="<?php echo base_url('assets/silatah/dist/img/logobpn.png'); ?>" width="100" height="100" style=" text-align: center"></a></center>
      </div>
      <div class="row">
        <center>
          <h4>BADAN PERTANAHAN NASIONAL</h4>
          <h5>KANTOR WILAYAH PROVINSI BENGKULU<br></h5>
        <h6>Jl. Basuki Rahmat No. 7, Telepon (0736) 21813, Email bengkulu@bpn.go.id</h6>
        </center>
      </div>
   <hr style="border-style:solid;border-color:black;border-width:8;">
      <div class="row">
        <div class="col-xs-12">
          <div class="tab-pane" id="timeline">
                      <!-- The timeline -->
          <?php
              function tgl_indo($tanggal){
                $bulan = array (
                  1 =>   'Januari',
                  'Februari',
                  'Maret',
                  'April',
                  'Mei',
                  'Juni',
                  'Juli',
                  'Agustus',
                  'September',
                  'Oktober',
                  'November',
                  'Desember'
                );
                $pecahkan = explode('-', $tanggal);
                
                // variabel pecahkan 0 = tanggal
                // variabel pecahkan 1 = bulan
                // variabel pecahkan 2 = tahun
               
                return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
          }?>
                <center><h3 class="box-title">Laporan Pembelian Barang<br><small>Terhitung mulai&nbsp;:&nbsp;<?php echo tgl_indo($tgl1);?>&nbsp;sampai&nbsp;: <?php echo tgl_indo($tgl2); ?></h3></center><br>
                  <table class="table table-bordered" style="border-collapse: collapse; width: 100%; margin: 0 auto;">
                    <thead>
                        <tr>
                          <th>No.</th>
                          <th>Tanggal Beli</th>
                          <th>No Bukti</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                          <th>Satuan</th>
                          <th>Harga per Satuan</th>
                          <th>Harga Total</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=0; foreach($data as $dt){?>
                      <tr>
                        <td colspan="9"><?php echo $dt['kategori']?></td>
                      </tr>
                      <?php $where = $this->db->query('select *,tb_beli.jumlah as jlh from tb_beli join tb_barang on tb_beli.kdBarang=tb_barang.kodeBarang join tb_kategori on tb_barang.idKategori=tb_kategori.idKategori where tb_barang.idKategori ="'.$dt['idKategori'].'"')->result_array();
                      foreach($where as $d){?>
                      <tr>
                        <td><?php echo ++$no;?></td>
                        <td><?php echo $d['tanggalBeli'];?></td>
                        <td><?php echo $d['noBukti'];?></td>
                        <td><?php echo $d['kodeBarang'];?></td>
                        <td><?php echo $d['namaBarang'];?></td>
                        <td><?php echo $d['jlh'];?></td>
                        <td><?php echo $d['satuan'];?></td>
                        <td><?php echo 'Rp. ' . number_format( $d['hargaSatuan'], 0 , '' , '.' ) . ',-';?></td>
                        <td><?php $he =  $d['jlh'] * $d['hargaSatuan'];echo 'Rp. ' . number_format( $he, 0 , '' , '.' ) . ',-'?></td>
                      </tr>
                      <?php };}?>
                      <tr>
                        <td colspan="8" style="text-align: right"><strong>Jumlah :</strong></td>
                        <td><strong><?php echo 'Rp. ' . number_format( $jumlah[0]['jumlah'], 0 , '' , '.' ) . ',-';?></strong></td>
                      </tr>
                      </tbody>
                  </table>
              </div>
        <!-- /.col -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

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
<script type="text/javascript">
                $(document).ready( function () {
                    $('#table_id').DataTable();
                } );
                  var save_method; //for save method string
                  var table;


                  function add_book()
                  {
                    save_method = 'add';
                    $('#form')[0].reset(); // reset form on modals
                    $('#modal_form').modal('show'); // show bootstrap modal
                  //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
                  }

                  function edit_book(id)
                  {
                    save_method = 'update';
                    $('#form')[0].reset(); // reset form on modals

                    //Ajax Load data from ajax
                    $.ajax({
                      url : "<?php echo site_url('Kemahasiswaan/ajax_edit/')?>/" + id,
                      type: "GET",
                      dataType: "JSON",
                      success: function(data)
                      {

                          $('[name="idKegiatan"]').val(data.idKegiatan);
                          $('[name="namaOrmawa"]').val(data.namaOrmawa);
                          $('[name="tingkat"]').val(data.tingkat);
                          $('[name="kegiatan"]').val(data.kegiatan);
                          $('[name="tempat"]').val(data.tempat);
                          $('[name="waktu"]').val(data.waktu);
                          $('[name="tahun"]').val(data.tahun);
                          $('[name="dana"]').val(data.dana);


                          $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                          $('.modal-title').text('Kegiatan Mahasiswa'); // Set title to Bootstrap modal title

                      },
                      error: function (jqXHR, textStatus, errorThrown)
                      {
                          alert('Error get data from ajax');
                      }
                  });
                  }



                 
                  function save()
                  {
                    var url;

                    if ($.trim($("#namaOrmawa").val()) ==="" || $.trim($("#tingkat").val()) ==="" || $.trim($("#kegiatan").val()) ==="" || $.trim($("#tempat").val()) ==="" || $.trim($("#datepicker").val()) ==="" || $.trim($("#tahun").val()) ==="" || $.trim($("#dana").val()) ==="") {
                        $('#btnSave').click(function(e) {
                            e.preventDefault();
                            alert('Ada field yang belum diisi');
                            return false;
                        })
                    }
                    else{
                        if(save_method == 'add')
                        {
                          url = "<?php echo site_url('Kemahasiswaan/tambahKegiatan')?>";
                        }
                        else
                        {
                          url = "<?php echo site_url('Kemahasiswaan/ubahKegiatan')?>";
                        }
                     // ajax adding data to database
                        $.ajax({
                          url : url,
                          type: "POST",
                          data: $('#form').serialize(),
                          dataType: "JSON",
                          success: function(data)
                          {
                             //if success close modal and reload ajax table
                             $('#modal_form').modal('hide');
                            location.reload();// for reload a page
                          },
                          error: function (jqXHR, textStatus, errorThrown)
                          {
                              alert('Error adding / update data');
                          }
                      });
                    }
                  }
                  

                  function delete_book(id)
                  {
                    if(confirm('Are you sure delete this data?'))
                    {
                      // ajax delete data from database
                        $.ajax({
                          url : "<?php echo site_url('Kemahasiswaan/hapusKegiatan')?>/"+id,
                          type: "POST",
                          dataType: "JSON",
                          success: function(data)
                          {
                             
                             location.reload();
                          },
                          error: function (jqXHR, textStatus, errorThrown)
                          {
                              alert('Error deleting data');
                          }
                      });

                    }
                  }
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
  $(function () {
    $('#example1').DataTable()
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
<!-- <?php
        //foreach($data as $dt){
           // $jumlah1[] = $dt->jumlah1;
           //$jumlah2[] = $dt->jumlah2;
           // $jumlah3[] = $dt->jumlah3;
            //$jumlah4[] = $dt->jumlah4;
            //$jumlah5[] = $dt->jumlah5;
            //$jumlah6[] = $dt->jumlah6;
      //  }
    ?> -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : [<?php foreach ($data2 as $key ) {
        echo $key['tahun']; ?>, 
      <?php } ?>],
      datasets: [
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php foreach ($data2 as $data2){
                                  echo $data2['jumlah'].',';            
          }?>]
        }
      ]
    }

    var areaChartOptions = {
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

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

    
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : <?php echo $data4[0]['jumlah']; ?>,
        color    : '#f56954',
        highlight: '#d2d6de',
        label    : 'HIMATIF'
      },
      {
        value    : <?php echo $data4[1]['jumlah']; ?>,
        color    : '#00a65a',
        highlight: '#d2d6de',
        label    : 'HMTS'
      },
      {
        value    : <?php echo $data4[2]['jumlah']; ?>,
        color    : '#f39c12',
        highlight: '#d2d6de',
        label    : 'HMM'
      },
      {
        value    : <?php echo $data4[3]['jumlah']; ?>,
        color    : '#00c0ef',
        highlight: '#d2d6de',
        label    : 'HIMATRO'
      },
      {
        value    : <?php echo $data4[4]['jumlah']; ?>,
        color    : '#3c8dbc',
        highlight: '#d2d6de',
        label    : 'MOSTANEER'
      },
      {
        value    : <?php echo $data4[5]['jumlah']; ?>,
        color    : '#000080',
        highlight: '#d2d6de',
        label    : 'PULKANIK'
      },
      {
        value    : <?php echo $data4[6]['jumlah']; ?>,
        color    : '#000000',
        highlight: '#d2d6de',
        label    : 'FOTIK'
      },
      {
        value    : <?php echo $data4[7]['jumlah']; ?>,
        color    : '#BF00FF',
        highlight: '#d2d6de',
        label    : 'ERCOM'
      }
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
</body>
</html>
