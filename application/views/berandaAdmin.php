<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Beranda | Badan Pertanahan Nasional Kanwil Provinsi Bengkulu</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/silatah/dist/img/Icon/logobpn.ico');?>">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/bower_components/jvectormap/jquery-jvectormap.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/dist/css/skins/_all-skins.min.css'); ?>">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/bower_components/fullcalendar/dist/fullcalendar.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/silatah/bower_components/fullcalendar/dist/fullcalendar.print.min.css');?>" media="print">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
  <script src="https://code.highcharts.com/js/highcharts.js"></script>
  <script src="https://code.highcharts.com/js/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/data.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
</head>
<style type="text/css">
  @import 'https://code.highcharts.com/css/highcharts.css';
  #container {
    height: 400px;
    max-width: 100%;
    margin: 0 auto;
  }
  .highcharts-pie-series .highcharts-point {
    stroke: #EDE;
    stroke-width: 2px;
  }
  .highcharts-pie-series .highcharts-data-label-connector {
    stroke: silver;
    stroke-dasharray: 2, 2;
    stroke-width: 2px;
  }
</style>
<body class="hold-transition skin-black sidebar-mini" style="font-family: 'Bree Serif', serif;">
<div class="wrapper">
  <?php $this->load->view('sidebar'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes --><?=$this->session->flashdata('akun')?>
      <div class="row" style="font-family: 'Bree Serif', serif;">
        <div class="col-md-6 col-sm-6 col-xs-12" style="margin-left: 25%">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><div class="icon"><i class="fa fa-home"></i></div></span>

            <div class="info-box-content">
              <span class="info-box-text"> </span><br>
              <span class="info-box-text">Anda masuk sebagai, <strong>Super Administrator</strong></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Agief Muftahid</b> 1.0
      </div>
      <strong>SI Pengadaan Barang Persediaan Kantor | BPN Kanwil Provinsi Bengkulu</strong>
   </footer>
  <?php $this->load->view('controlsidebar'); ?>

</div>
<!-- ./wrapper -->
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
            <input type="hidden" name="form" value="User/beranda">
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
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/silatah/bower_components/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/silatah/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/silatah/dist/js/adminlte.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/silatah/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'); ?>"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url('assets/silatah/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/silatah/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/silatah/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/silatah/bower_components/chart.js/Chart.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/silatah/dist/js/pages/dashboard2.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/silatah/dist/js/demo.js'); ?>"></script>
<!-- FLOT CHARTS -->
<script src="<?php echo base_url('assets/silatah/bower_components/Flot/jquery.flot.js'); ?>"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url('assets/silatah/bower_components/Flot/jquery.flot.resize.js'); ?>"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url('assets/silatah/bower_components/Flot/jquery.flot.pie.js'); ?>"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url('assets/silatah/bower_components/Flot/jquery.flot.categories.js'); ?>"></script>
<!-- fullCalendar -->
<script src="<?php echo base_url('assets/silatah/bower_components/moment/moment.js');?>"></script>
<script src="<?php echo base_url('assets/silatah/bower_components/fullcalendar/dist/fullcalendar.min.js');?>"></script>

<script type="text/javascript">
  Highcharts.chart('container', {

    title: {
        text: 'Grafik Jatah Anggaran per Bidang'
    },

    series: [{
        type: 'pie',
        allowPointSelect: true,
        keys: ['name', 'y', 'selected', 'sliced'],
        data: [
            <?php $x=1; foreach ($donut as $key) { ?>
            ['<?php echo $key->namaBidang?>', <?php echo $key->jatah?>, false],
            <?php $x++;} ?>
        ]
    }]
});
</script>
<script type="text/javascript">
  Highcharts.chart('container2', {
    data: {
        table: 'datatable'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Jumlah Pengambilan Barang per Bulan'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Jumlah'
        }
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y;
        }
    }
});
</script>
<!-- Script Chartjs -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    var color1 = '#01721b' 
    var color2 = '#0f8e2d' 
    var color3 = '#0bc637' 
    var color4 = '#023d10' 
    var color5 = '#45ef6d'
    var color6 = '#185125'
    var color7 = '#69c67e'
    var color8 = '#34633f'
    var color9 = '#1c3f24'
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
    <?php $x=1; foreach ($donut as $key) { ?>
      {
        value    : <?php echo $key->jatah?>,
        color    : color<?php echo $x;?>,
        highlight: '#d2d6de',
        label    : '<?php echo $key->namaBidang?>'
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
<!-- Script Flot Chart -->
<script>
  $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 100

    function getRandomData() {

      if (data.length > 0)
        data = data.slice(1)

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [getRandomData()], {
      grid  : {
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color     : '#3c8dbc'
      },
      lines : {
        fill : true, //Converts the line chart to area chart
        color: '#3c8dbc'
      },
      yaxis : {
        min : 0,
        max : 100,
        show: true
      },
      xaxis : {
        show: true
      }
    })

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on')
        setTimeout(update, updateInterval)
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */

    /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data

    var sin = [], cos = []
    for (var i = 0; i < 14; i += 0.5) {
      sin.push([i, Math.sin(i)])
      cos.push([i, Math.cos(i)])
    }
    var line_data1 = {
      data : sin,
      color: '#3c8dbc'
    }
    var line_data2 = {
      data : cos,
      color: '#00c0ef'
    }
    $.plot('#line-chart', [line_data1, line_data2], {
      grid  : {
        hoverable  : true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0,
        lines     : {
          show: true
        },
        points    : {
          show: true
        }
      },
      lines : {
        fill : false,
        color: ['#3c8dbc', '#f56954']
      },
      yaxis : {
        show: true
      },
      xaxis : {
        show: true
      }
    })
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: 'absolute',
      display : 'none',
      opacity : 0.8
    }).appendTo('body')
    $('#line-chart').bind('plothover', function (event, pos, item) {

      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2)

        $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
          .css({ top: item.pageY + 5, left: item.pageX + 5 })
          .fadeIn(200)
      } else {
        $('#line-chart-tooltip').hide()
      }

    })
    /* END LINE CHART */

    /*
     * FULL WIDTH STATIC AREA CHART
     * -----------------
     */
    var areaData = [[2, 88.0], [3, 93.3], [4, 102.0], [5, 108.5], [6, 115.7], [7, 115.6],
      [8, 124.6], [9, 130.3], [10, 134.3], [11, 141.4], [12, 146.5], [13, 151.7], [14, 159.9],
      [15, 165.4], [16, 167.8], [17, 168.7], [18, 169.5], [19, 168.0]]
    $.plot('#area-chart', [areaData], {
      grid  : {
        borderWidth: 0
      },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color     : '#00c0ef'
      },
      lines : {
        fill: true //Converts the line chart to area chart
      },
      yaxis : {
        show: false
      },
      xaxis : {
        show: false
      }
    })

    /* END AREA CHART */

    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [<?php foreach($bar as $key){?>['<?php if($key->month == 1){echo "Januari";}elseif($key->month == 2){echo "Februari";}elseif($key->month == 3){echo "Maret";}elseif($key->month == 4){echo "April";}elseif($key->month == 5){echo "Mei";}elseif($key->month == 6){echo "Juni";}elseif($key->month == 7){echo "Juli";}elseif($key->month == 8){echo "Agustus";}elseif($key->month == 9){echo "September";}elseif($key->month == 10){echo "Oktober";}elseif($key->month == 11){echo "November";}elseif($key->month == 12){echo "Desember";}else{echo $key->month;}?>', <?php echo $key->jumlah?>],<?php } ?>],
      color: '#0f8e2d'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#0f8e2d',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */
    var color1 = '#366d43' 
    var color2 = '#163a1f' 
    var color3 = '#1df452' 
    var color4 = '#023d10' 
    var color5 = '#45ef6d'
    var color6 = '#00f738'
    var color7 = '#69c67e'
    var color8 = '#34633f'
    var color9 = '#1c3f24'

    var donutData = [<?php $t=1; foreach($donut as $key){?>
      { label: '<?php echo $key->namaBidang?>', data: <?php echo $key->jatah?>, color: color<?php echo $t;?> },
      <?php $t++;}?>
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #000; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>
<!-- Script Calendar -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'Hari Ini',
        month: 'Bulan',
        week : 'Minggu',
        day  : 'Hari'
      },
      //Random default events
      events    : [
        {}
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</body>
</html>
