<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran extends CI_Controller {
	function __construct(){
        parent::__construct();
        $status = $this->session->userdata('login');
        if($status != 'login'){
            redirect('User');
        }
    }
    //ANGGARAN
    public function formAnggaran()
    {   
        $data['data']=$this->Madmin->lihat('tb_bidang')->result_array();
        $data['data2'] = $this->Madmin->getJoin2All('tb_pegawai','tb_bidang','*','tb_pegawai.idBidang=tb_bidang.idBidang')->result_array();
        $data['data3'] = $this->Madmin->getJoin2AllGroup('tb_bidang','tb_anggaran','*,SUM(jumlah) as jlh','tb_bidang.idBidang=tb_anggaran.idBidang')->result_array();
        $this->load->view('bidang',$data);
    }
    public function tambahAnggaran(){
        $tahun = $this->input->post('tahun');
        $tahunskrng = date('Y');
        if($tahun<$tahunskrng){
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Tidak Bisa Memasukkan Anggaran Tahun Yang Lalu <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Anggaran/formAnggaran');
        }elseif ($tahun>$tahunskrng) {
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Anggaran Untuk Tahun Tersebut Belum Ada <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Anggaran/formAnggaran');
        }elseif ($tahun==$tahunskrng){
            $cek = $this->db->query('select * from tb_anggaran where tahun ="'.$tahun.'"')->num_rows();
            if($cek==0){
                for ($i=1; $i <= 9; $i++) {    
                    $this->Madmin->ubah('tb_bidang',array('jatah' => 0),array('idBidang' => $i));
                }
                $data = array(
                    'idBidang' => 1,
                    'jumlah' => str_replace(".","",$this->input->post('jumlah1')),
                    'tahun' => $tahun
                );
                $this->Madmin->tambah('tb_anggaran',$data);
                $jatahLama1 = $this->Madmin->getWhere('tb_bidang',array('idBidang' => 1))->row()->jatah;
                $data11 = array(
                    'jatah'    => str_replace(".","",$this->input->post('jumlah1')) + $jatahLama1
                );
                $this->Madmin->ubah('tb_bidang',$data11,array('idBidang' => 1));
                $data2 = array(
                    'idBidang' => 2,
                    'jumlah' => str_replace(".","",$this->input->post('jumlah2')),
                    'tahun' => $tahun
                );
                $this->Madmin->tambah('tb_anggaran',$data2);
                $jatahLama2 = $this->Madmin->getWhere('tb_bidang',array('idBidang' => 2))->row()->jatah;
                $data21 = array(
                    'jatah'    => str_replace(".","",$this->input->post('jumlah2')) + $jatahLama2
                );
                $this->Madmin->ubah('tb_bidang',$data21,array('idBidang' => 2));
                $data3 = array(
                    'idBidang' => 3,
                    'jumlah' => str_replace(".","",$this->input->post('jumlah3')),
                    'tahun' => $tahun
                );
                $this->Madmin->tambah('tb_anggaran',$data3);
                $jatahLama3 = $this->Madmin->getWhere('tb_bidang',array('idBidang' => 3))->row()->jatah;
                $data31 = array(
                    'jatah'    => str_replace(".","",$this->input->post('jumlah3')) + $jatahLama3
                );
                $this->Madmin->ubah('tb_bidang',$data31,array('idBidang' => 3));
                $data4 = array(
                    'idBidang' => 4,
                    'jumlah' => str_replace(".","",$this->input->post('jumlah4')),
                    'tahun' => $tahun
                );
                $this->Madmin->tambah('tb_anggaran',$data4);
                $jatahLama4 = $this->Madmin->getWhere('tb_bidang',array('idBidang' => 4))->row()->jatah;
                $data41 = array(
                    'jatah'    => str_replace(".","",$this->input->post('jumlah4')) + $jatahLama4
                );
                $this->Madmin->ubah('tb_bidang',$data41,array('idBidang' => 4));
                $data5 = array(
                    'idBidang' => 5,
                    'jumlah' => str_replace(".","",$this->input->post('jumlah5')),
                    'tahun' => $tahun
                );
                $this->Madmin->tambah('tb_anggaran',$data5);
                $jatahLama5 = $this->Madmin->getWhere('tb_bidang',array('idBidang' => 5))->row()->jatah;
                $data51 = array(
                    'jatah'    => str_replace(".","",$this->input->post('jumlah5')) + $jatahLama5
                );
                $this->Madmin->ubah('tb_bidang',$data51,array('idBidang' => 5));
                $data6 = array(
                    'idBidang' => 6,
                    'jumlah' => str_replace(".","",$this->input->post('jumlah6')),
                    'tahun' => $tahun
                );
                $this->Madmin->tambah('tb_anggaran',$data6);
                $jatahLama6 = $this->Madmin->getWhere('tb_bidang',array('idBidang' => 6))->row()->jatah;
                $data61 = array(
                    'jatah'    => str_replace(".","",$this->input->post('jumlah6')) + $jatahLama6
                );
                $this->Madmin->ubah('tb_bidang',$data61,array('idBidang' => 6));
                $data7 = array(
                    'idBidang' => 7,
                    'jumlah' => str_replace(".","",$this->input->post('jumlah7')),
                    'tahun' => $tahun
                );
                $this->Madmin->tambah('tb_anggaran',$data7);
                $jatahLama7 = $this->Madmin->getWhere('tb_bidang',array('idBidang' => 7))->row()->jatah;
                $data71 = array(
                    'jatah'    => str_replace(".","",$this->input->post('jumlah7')) + $jatahLama7
                );
                $this->Madmin->ubah('tb_bidang',$data71,array('idBidang' => 7));
                $data8 = array(
                    'idBidang' => 8,
                    'jumlah' => str_replace(".","",$this->input->post('jumlah8')),
                    'tahun' => $tahun
                );
                $this->Madmin->tambah('tb_anggaran',$data8);
                $jatahLama8 = $this->Madmin->getWhere('tb_bidang',array('idBidang' => 8))->row()->jatah;
                $data81 = array(
                    'jatah'    => str_replace(".","",$this->input->post('jumlah8')) + $jatahLama8
                );
                $this->Madmin->ubah('tb_bidang',$data81,array('idBidang' => 8));
                $data9 = array(
                    'idBidang' => 9,
                    'jumlah' => str_replace(".","",$this->input->post('jumlah9')),
                    'tahun' => $tahun
                );
                $this->Madmin->tambah('tb_anggaran',$data9);
                $jatahLama9 = $this->Madmin->getWhere('tb_bidang',array('idBidang' => 9))->row()->jatah;
                $data91 = array(
                    'jatah'    => str_replace(".","",$this->input->post('jumlah9')) + $jatahLama9
                );
                $this->Madmin->ubah('tb_bidang',$data91,array('idBidang' => 9));
                $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Tambah Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Anggaran/formAnggaran');
            }else{
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Anggaran Tahun Tersebut Sudah Ada <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Anggaran/formAnggaran');
            }
        }
    }
    public function ubahAnggaran(){
        $id = $_POST['idBidang'];
        $jlh = $_POST['jumlah'];
        $jlh2 = $_POST['jumlahLama'];
        $anggaran = $_POST['idAnggaran'];
        $x=0;
        foreach ($id as $key) {
        	$fix = str_replace(".","",$jlh[$x]);
        	$fix2 = str_replace(".","",$jlh2[$x]);
            $data = array(
                'idBidang'    => $id[$x],
                'jumlah'    => $fix,
                'tahun'    => $this->input->post('tahun')
            );
            $jatahLama = $this->Madmin->getWhere('tb_bidang',array('idBidang' => $id[$x]))->row()->jatah;
            $jumlahLama = $this->input->post('jumlahLama');
            $data2 = array(
                'jatah'    => $jatahLama + ($fix - $fix2)
            );
            $this->Madmin->ubah('tb_anggaran',$data,array('idAnggaran' => $anggaran[$x]));
            $this->Madmin->ubah('tb_bidang',$data2,array('idBidang' => $id[$x]));
            $x++;
        }
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Ubah Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Anggaran/formAnggaran');
    }
    public function hapusAnggaran($tahun){
        $id=$_POST['idBidang'];
        $jlh=$_POST['jumlah'];
        $x=0;
        $tahunskrng = date('Y');
        if($tahun==$tahunskrng){
            foreach ($id as $key) {
                $jatah = $this->Madmin->getWhere('tb_bidang',array('idBidang' => $id[$x]))->row()->jatah;
                $data['jatah'] = $jatah-$jlh[$x];
                $this->Madmin->ubah('tb_bidang',$data,array('idBidang' => $id[$x]));
                $x++;
            };
        }
        $this->db->delete('tb_anggaran',array('tahun'=>$tahun));
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Hapus Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Anggaran/formAnggaran');
    }
    public function cetakRAB($tahun){
        $data['data'] = $this->db->query('select *,year(tanggalBeli) as tahun from tb_beli join tb_barang on tb_beli.kodeBarang=tb_barang.kodeBarang join tb_kategori on tb_barang.idKategori=tb_kategori.idKategori where year(tanggalBeli)="'.$tahun.'" group by tb_kategori.idKategori')->result_array();
        $data['jumlah'] = $this->db->query('select SUM(hargaTotal) as jumlah from tb_beli')->result_array();
        $this->load->view('cetakRAB',$data);
    }
}
