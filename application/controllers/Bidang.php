<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller {
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
    public function tambahBidang(){
        $data = array(
            'namaBidang'    => $this->input->post('namaBidang')
        );
        $this->Madmin->tambah('tb_bidang',$data);
        $this->session->set_flashdata('notif2','<div class="alert alert-success" role="alert"> Tambah Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Anggaran/formAnggaran');
    }
    public function ubahBidang(){
        $idBidang['idBidang'] = $this->input->post('idBidang');
        $data = array(
            'namaBidang'    => $this->input->post('namaBidang')
        );
        $this->Madmin->ubah('tb_bidang',$data,$idBidang);
        $this->session->set_flashdata('notif2','<div class="alert alert-success" role="alert"> Ubah Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Anggaran/formAnggaran');
    }
    public function hapusBidang($idBidang){
        $this->db->delete('tb_bidang',array('idBidang'=>$idBidang));
        $this->session->set_flashdata('notif2','<div class="alert alert-success" role="alert"> Hapus Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Anggaran/formAnggaran');
    }
}
