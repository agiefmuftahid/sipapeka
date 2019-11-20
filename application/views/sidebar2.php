  <header class="main-header" style="font-family: 'Bree Serif', serif;">
    <!-- Logo -->
    <a href="<?php echo base_url('Admin/beranda'); ?>" class="logo" style="font-family: 'Bree Serif', serif;">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-mini"><b>BPN</b></span>
      <span class="logo-lg"><b>SIPAPEKA</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url('assets/login/images/logobpn.png');?>" class="user-image" width="50px" height="50px" alt="AVATAR">
              <span class="hidden-xs"><?php echo $this->session->userdata('namaKantor') ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <center><img src="<?php echo base_url('assets/login/images/logobpn.png');?>" class="img-circle" width="100px" height="100px" alt="AVATAR"></center>
                <p>
                  <?php echo $this->session->userdata('namaKantor') ?>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
              <div class="pull-left">
                  <button data-toggle="modal" data-target="#pengaturan" class="btn btn-default"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;Pengaturan</button>
                </div>
                <div class="pull-right">
                  <button data-toggle="modal" data-target="#keluar" class="btn btn-danger"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Keluar</button>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/silatah/dist/img/logobpn.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" style="font-family: 'Bree Serif', serif;">
          <br>
          <?php $nip = $this->session->userdata('nip');$nama = $this->db->query('Select * from tb_pegawai where NIP_pegawai = "'.$nip.'"')->row();?>
          <small><p><?php echo $nama->namaPegawai ?></p></small>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" style="font-family: 'Bree Serif', serif;">
        <li class="header">Navigasi Utama</li>
        <li>
          <a href="<?php echo base_url('User/beranda'); ?>">
            <i class="fa fa-home"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('Beli/formBeli'); ?>">
            <i class="ion ion-ios-cart"></i>
            <span>Pembelian Barang</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('Stok/formBarang'); ?>">
            <i class="fa fa-cubes"></i> <span>Data Master Stok Barang</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('Kwitansi/formDistribusi'); ?>">
            <i class="fa fa-share"></i>
            <span>Distribusi Barang</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('Anggaran/formAnggaran'); ?>">
            <i class="fa fa-usd"></i>
            <span>Manajemen Anggaran</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('Pegawai/formPegawai'); ?>">
            <i class="fa fa-users"></i>
            <span>Manajemen Pegawai</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('User/formLaporan'); ?>">
            <i class="fa fa-print"></i>
            <span>Manajemen Laporan</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>