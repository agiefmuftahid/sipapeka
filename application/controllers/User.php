<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
        parent::__construct();
    }
	public function index()
	{
		$status = $this->session->userdata('login');
        if($status == 'login'){
            redirect('User/beranda');
        }else{
        	$this->load->view('login');
        }
	}
    public function ajax_edit()
    {
            $id = $this->input->get('fak');
            $data = $this->Madmin->get_by_id($id);

            echo json_encode($data);
    }
    public function ajax_edit3()
    {
            $id = $this->input->get('fak');
            $data = $this->Madmin->getktg('tb_barang','tb_kategori','*','tb_barang.idKategori=tb_kategori.idKategori',$id);

            echo json_encode($data);
    }
    public function ajax_edit2()
    {
            $id = $this->input->get('fak');
            $data = $this->Madmin->get_by_id2($id);

            echo json_encode($data);
    }
	public function cekLogin()
	{
		$nip = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
		$cek = $this->Mlogin->proseslogin($nip,$password);
		$hasil = count($cek);
		if($hasil > 0)
		{
            if($nip == "admin"){
                $this->session->set_userdata(array(
                        'login'         => "login",
                        'nip'      => $cek[0]['NIP_pegawai'],
                        'namaKantor'      => $cek[0]['namaKantor']
                    ));
                redirect('User/berandaAdmin');
            }else{
                $this->session->set_userdata(array(
                        'login'         => "login",
                        'nip'      => $cek[0]['NIP_pegawai'],
                        'namaKantor'      => $cek[0]['namaKantor']
                    ));
                redirect('User/beranda');
            }
		}else{
			$this->load->view('login');
		}
	}
	public function logout(){
        $this->session->sess_destroy();
        redirect('user','refresh');
    }
    public function beranda()
	{
        $data['jumlahBeli'] = $this->Madmin->getJoin2All('tb_barang','tb_beli','*','tb_barang.kodeBarang = tb_beli.kodeBarang')->num_rows();
        $data['jumlahStok'] = $this->Madmin->lihat('tb_barang')->num_rows();
        $data['jumlahDistribusi'] = $this->Madmin->getJoinGroupBeranda('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang')->num_rows();
        $data['bar'] = $this->Mdata->barchart();
        $data['donut'] = $this->Mdata->donutchart();
		$this->load->view('beranda',$data);
	}
    public function berandaAdmin()
    {
        $data['jumlahBeli'] = $this->Madmin->getJoin2All('tb_barang','tb_beli','*','tb_barang.kodeBarang = tb_beli.kodeBarang')->num_rows();
        $data['jumlahStok'] = $this->Madmin->lihat('tb_barang')->num_rows();
        $data['jumlahDistribusi'] = $this->Madmin->getJoinGroupBeranda('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang')->num_rows();
        $data['bar'] = $this->Mdata->barchart();
        $data['donut'] = $this->Mdata->donutchart();
        $this->load->view('berandaAdmin',$data);
    }
    public function formUser(){
        $data['jumlahBeli'] = $this->Madmin->getJoin2All('tb_barang','tb_beli','*','tb_barang.kodeBarang = tb_beli.kodeBarang')->num_rows();
        $data['jumlahStok'] = $this->Madmin->lihat('tb_barang')->num_rows();
        $data['jumlahDistribusi'] = $this->Madmin->getJoinGroupBeranda('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang')->num_rows();
        $data['data'] = $this->db->query('select * from tb_user join tb_pegawai on tb_user.NIP_pegawai=tb_pegawai.NIP_pegawai')->result_array();
        $this->load->view('manajemenUser',$data);
    }
    public function tambahUser(){
        $data = array(
            'username'    => $this->input->post('username'),
            'password'    => $this->input->post('password'),
            'NIP_pegawai' => $this->input->post('pegawai')
        );
        $user=$this->input->post('username');
        if($user == 'admin'){
            $this->session->set_flashdata('akun','<div class="alert alert-danger" role="alert"> Tidak Bisa Menambah Super Admin <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/formUser');
        }else{
            $this->Madmin->tambah('tb_user',$data);
            $this->session->set_flashdata('akun','<div class="alert alert-success" role="alert"> Data User Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/formUser');
        }
    }
	public function ubahUser(){
        $NIP_user['username'] = $this->input->post('username2');
        $form = $this->input->post('form');
        $data = array(
            'username'    => $this->input->post('username'),
            'password'    => $this->input->post('password'),
            'NIP_pegawai' => $this->input->post('nip')
        );
        $this->Madmin->ubah('tb_user',$data,$NIP_user);
        $this->session->set_flashdata('akun','<div class="alert alert-success" role="alert"> Data User Berhasil Diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect($form);
    }
    public function hapusUser($username){
        $this->db->delete('tb_user',array('username'=>$username));
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Hapus Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('User/formUser');
    }
    public function he($id)
    {
            $data = $this->Madmin->he($id);

            echo json_encode($data);
    }
    public function filter()
    {

        $filter = $this->input->post('button');
        $field  = $this->input->post('field');
        $search = $this->input->post('search');

        if (isset($filter) && !empty($search)) {
            $data['data'] = $this->Madmin->getWhereLike('tb_barang','tb_kategori','*','tb_barang.idKategori=tb_kategori.idKategori',$field,$search)->result();
            $this->load->view('stok',$data);
        } else {
            $data['data'] = $this->Madmin->getJoin2All('tb_barang','tb_kategori','*','tb_barang.idKategori=tb_kategori.idKategori')->result();
            $this->load->view('stok',$data);
        }
    }





    //LAPORAN
    public function formLaporan()
    {   
        $data['data'] = $this->Madmin->getTahun('tb_barang','tb_beli','tb_kategori','*','tb_barang.kodeBarang = tb_beli.kodeBarang','tb_barang.idKategori = tb_kategori.idKategori')->result_array();
        $data['data2'] = $this->Madmin->lihatGroup('tb_anggaran','tb_bidang','*','tb_anggaran.idBidang=tb_bidang.idBidang')->result_array();
        $this->load->view('cetak',$data);
    }
    public function laporan()
    {   
        $tabel = $this->input->post('tabel');
        $tahun  = $this->input->post('tahun');
        $tahun2 = $this->input->post('tahun2');
        $bulan = $this->input->post('bulan');
        $tgl1 = $this->input->post('tgl1');
        $tgl2 = $this->input->post('tgl2');
        $cetak = $this->input->post('cetak');

        if (isset($cetak) && !empty($tahun)) {
            if($tabel == "tb_beli"){
                $data['data'] = $this->Madmin->getJoin3AllWhere('tb_barang','tb_beli','tb_kategori','*,year(tanggalBeli) as tahun','tb_barang.kodeBarang = tb_beli.kodeBarang','tb_barang.idKategori = tb_kategori.idKategori',$tahun)->result_array();
                $data['jumlah'] = $this->db->query('select SUM(hargaTotal) as jumlah from tb_beli where year(tanggalBeli) = "'.$tahun.'"')->result_array();
                $this->load->view('cetakBeli',$data);
            }else if ($tabel == "tb_kwitansi") {
                $data['data'] = $this->Madmin->getJoinGroupWhere5('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','tb_user','*,tb_kwitansi.jumlah as jumlahKeluar,year(tglDistribusi) as tahun','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang','tb_kwitansi.username=tb_user.username','Year(tglDistribusi)',$tahun)->result_array();
                $data['jumlah'] = $this->db->query('select SUM(hargaTotal) as jumlah from tb_kwitansi where year(tglDistribusi) = "'.$tahun.'"')->result_array();
                $this->load->view('cetakDistribusi',$data);
            }
        } else if(isset($cetak) && !empty($tahun2) && !empty($bulan))  {
            if($tabel == "tb_beli"){
                $data['data'] = $this->Madmin->getJoin3AllWhere2('tb_barang','tb_beli','tb_kategori','*','tb_barang.kodeBarang = tb_beli.kodeBarang','tb_barang.idKategori = tb_kategori.idKategori',$tahun2,$bulan)->result_array();
                $data['jumlah'] = $this->db->query('select SUM(hargaTotal) as jumlah from tb_beli where year(tanggalBeli) = "'.$tahun2.'" and month(tanggalBeli) ="'.$bulan.'"')->result_array();
                $data['bulan'] = $bulan;
                $data['tahun2'] = $tahun2;
                $this->load->view('cetakBeliBulan',$data);
            }else if ($tabel == "tb_kwitansi") {
                $data['data'] = $this->Madmin->getJoinGroupWhere4('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','tb_user','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang','tb_kwitansi.username=tb_user.username','Year(tglDistribusi)',$tahun2,'Month(tglDistribusi)',$bulan)->result_array();
                $data['jumlah'] = $this->db->query('select SUM(hargaTotal) as jumlah from tb_kwitansi where year(tglDistribusi) = "'.$tahun2.'" and month(tglDistribusi) ="'.$bulan.'"')->result_array();
                $data['bulan'] = $bulan;
                $data['tahun2'] = $tahun2;
                $this->load->view('cetakDistribusiBulan',$data);
            }
        }else if(isset($cetak) && !empty($tgl1))  {
            if($tabel == "tb_beli"){
                $data['data'] = $this->Madmin->getJoin3AllDate('tb_barang','tb_beli','tb_kategori','*,year(tanggalBeli) as tahun','tb_barang.kodeBarang = tb_beli.kodeBarang','tb_barang.idKategori = tb_kategori.idKategori',$tgl1,$tgl2)->result_array();
                $data['jumlah'] = $this->db->query('select SUM(hargaTotal) as jumlah from tb_beli where tanggalBeli >="'.$tgl1.'" and tanggalBeli <="'.$tgl2.'"')->result_array();
                $data['tgl1'] = $tgl1;
                $data['tgl2'] = $tgl2;
                $this->load->view('cetakBeliTanggal',$data);
            }else if ($tabel == "tb_kwitansi") {
                $data['data'] = $this->Madmin->getJoinGroupDate('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','tb_user','*,tb_kwitansi.jumlah as jumlahKeluar','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang','tb_kwitansi.username=tb_user.username',$tgl1,$tgl2)->result_array();
                $data['jumlah'] = $this->db->query('select SUM(hargaTotal) as jumlah from tb_kwitansi where tglDistribusi >="'.$tgl1.'" and tglDistribusi <="'.$tgl2.'"')->result_array();
                $data['tgl1'] = $tgl1;
                $data['tgl2'] = $tgl2;
                $this->load->view('cetakDistribusiTanggal',$data);
            }
        }else if(isset($cetak))  {
            if($tabel == "tb_beli"){
                $data['data'] = $this->Madmin->getJoin3Allorder('tb_barang','tb_beli','tb_kategori','*,year(tanggalBeli) as tahun','tb_barang.kodeBarang = tb_beli.kodeBarang','tb_barang.idKategori=tb_kategori.idKategori')->result_array();
                $data['jumlah'] = $this->db->query('select SUM(hargaTotal) as jumlah from tb_beli')->result_array();
                $this->load->view('cetakBeli',$data);
            }else if ($tabel == "tb_kwitansi") {
                $data['data'] = $this->Madmin->getJoin4All('tb_kwitansi','tb_barang','tb_pegawai','tb_bidang','*','tb_barang.kodeBarang = tb_kwitansi.kodeBarang','tb_pegawai.NIP_pegawai = tb_kwitansi.NIP_pegawai','tb_bidang.idBidang = tb_pegawai.idBidang')->result_array();
                $this->load->view('cetakDistribusi',$data);
            }else if ($tabel == "tb_barang") {
                $data['data']=$this->db->query('select * from tb_barang join tb_kategori on tb_barang.idKategori=tb_kategori.idKategori group by tb_kategori.idKategori')->result();
                $this->load->view('cetakBarang',$data);
            }
        }
        else {
            $data['data'] = $this->Madmin->getTahun('tb_barang','tb_beli','tb_kategori','*','tb_barang.kodeBarang = tb_beli.kodeBarang','tb_barang.idKategori = tb_kategori.idKategori')->result_array();
            $this->load->view('cetak',$data);
        }
    }
}
