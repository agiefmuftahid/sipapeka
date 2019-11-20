<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	function __construct(){
        parent::__construct();
        $status = $this->session->userdata('login');
        if($status != 'login'){
            redirect('User');
        }
    }
    //PEGAWAI
    public function formPegawai()
    {   
        $filter = $this->input->post('button');
        $field  = $this->input->post('field');
        $search = $this->input->post('search');
        $tampil = $this->input->post('tampil');

        if (isset($filter) && !empty($search)) {
            $data['data'] = $this->Madmin->getWhereLike('tb_pegawai','tb_bidang','*','tb_pegawai.idBidang=tb_bidang.idBidang',$field,$search)->result_array();
            $data['bidang'] = $this->Madmin->lihat('tb_bidang')->result_array();
            $this->load->view('pegawai',$data);
        } else if(isset($tampil)) {
            $data['data'] = $this->Madmin->getJoin2All('tb_pegawai','tb_bidang','*','tb_pegawai.idBidang=tb_bidang.idBidang')->result_array();
            $data['bidang'] = $this->Madmin->lihat('tb_bidang')->result_array();
            $this->load->view('pegawai',$data);
        }
        else {
            $data['data'] = $this->Madmin->getJoin2All('tb_pegawai','tb_bidang','*','tb_pegawai.idBidang=tb_bidang.idBidang')->result_array();
            $data['bidang'] = $this->Madmin->lihat('tb_bidang')->result_array();
            $this->load->view('pegawai',$data);
        }
    }
    public function tambahPegawai(){
        $data = array(
            'NIP_pegawai'    => $this->input->post('NIP_pegawai'),
            'namaPegawai'    => $this->input->post('namaPegawai'),
            'idBidang'    => $this->input->post('idBidang')
        );
        $this->Madmin->tambah('tb_pegawai',$data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Tambah Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Pegawai/formPegawai');
    }
    public function ubahPegawai(){
        $NIP_pegawai['NIP_pegawai'] = $this->input->post('NIP_lama');
        $data = array(
            'NIP_pegawai'    => $this->input->post('NIP_pegawai'),
            'namaPegawai'    => $this->input->post('namaPegawai'),
            'idBidang'    => $this->input->post('idBidang')
        );
        $this->Madmin->ubah('tb_pegawai',$data,$NIP_pegawai);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Ubah Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Pegawai/formPegawai');
    }
    public function hapusPegawai($NIP_pegawai){
        $this->db->delete('tb_pegawai',array('NIP_pegawai'=>$NIP_pegawai));
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Hapus Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Pegawai/formPegawai');
    }
}
