<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {
	function __construct(){
        parent::__construct();
        $status = $this->session->userdata('login');
        if($status != 'login'){
            redirect('User');
        }
    }

    //STOK
    public function formBarang()
    {   
        $filter = $this->input->post('button');
        $field  = $this->input->post('field');
        $search = $this->input->post('search');
        $tampil = $this->input->post('tampil');

        if (isset($filter) && !empty($search)) {
            $data['data'] = $this->Madmin->getWhereLikeOrder('tb_barang','tb_kategori','*','tb_barang.idKategori=tb_kategori.idKategori','kodeBarang',$field,$search)->result_array();
            $this->load->view('stok',$data);
        } else if(isset($tampil)) {
            $data['data'] = $this->Madmin->getJoin2AllOrder('tb_barang','tb_kategori','*','tb_barang.idKategori=tb_kategori.idKategori','kodeBarang')->result_array();
            $this->load->view('stok',$data);
        }
        else {
            $data['data'] = $this->Madmin->getJoin2AllOrder('tb_barang','tb_kategori','*','tb_barang.idKategori=tb_kategori.idKategori','kodeBarang')->result_array();
            $this->load->view('stok',$data);
        }
    }
    public function ubahBarang(){
        $kdBarang['kodeBarang'] = $this->input->post('kodeLama');
        $data = array(
            'kodeBarang'    => $this->input->post('kodeBarang'),
            'namaBarang'    => $this->input->post('namaBarang'),
            'satuan'    => $this->input->post('satuan'),
            'hargaSatuan'    => $this->input->post('hargaSatuan')
        );
        $data2 = array(
            'kodeBarang'    => $this->input->post('kodeBarang')
        );
        $this->Madmin->ubah('tb_barang',$data,$kdBarang);
        $this->Madmin->ubah('tb_beli',$data2,array('kodeBarang' => $this->input->post('kodeLama')));
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Ubah Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Stok/formBarang');
    }
    public function hapusBarang($kodeBarang){
        $this->db->delete('tb_barang',array('kodeBarang'=>$kodeBarang));
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Hapus Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Stok/formBarang');
    }
    public function cetakBarang(){
        $data['data']=$this->Madmin->lihat('tb_barang')->result();
        $this->load->view('cetakBarang',$data);
    }
}
