<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beli extends CI_Controller {
	function __construct(){
        parent::__construct();
        $status = $this->session->userdata('login');
        if($status != 'login'){
            redirect('User');
        }
    }

    //BELI
	public function formBeli()
	{	
        $filter = $this->input->post('button');
        $field  = $this->input->post('field');
        $search = $this->input->post('search');
        $tampil = $this->input->post('tampil');
        $tgl1 = $this->input->post('tgl1');
        $tgl2 = $this->input->post('tgl2');

        if (isset($filter) && !empty($search)) {
            $data['data'] = $this->Madmin->getJoin3AllLike('tb_barang','tb_beli','tb_kategori','*,tb_beli.hargaTotal as hrg','tb_barang.kodeBarang = tb_beli.kodeBarang','tb_barang.idKategori = tb_kategori.idKategori',$field,$search)->result_array();
            $data['data2'] = $this->Madmin->lihat('tb_barang')->result_array();
            $data['data3'] = $this->Madmin->lihat('tb_kategori')->result_array();
            $data['data5'] = $this->db->query('select SUM(jumlah) as jlh from tb_anggaran where tahun=year(now())')->row();
            $data['data4'] = $this->db->query('select SUM(hargaTotal) as hrgtot from tb_beli where year(tanggalBeli)=year(now())')->row();
            $this->load->view('buy',$data);
        } else if(isset($filter) && !empty($tgl1))  {
            $data['data'] = $this->Madmin->getJoin3AllDate('tb_barang','tb_beli','tb_kategori','*,tb_beli.hargaTotal as hrg','tb_barang.kodeBarang = tb_beli.kodeBarang','tb_barang.idKategori = tb_kategori.idKategori',$tgl1,$tgl2)->result_array();
            $data['data2'] = $this->Madmin->lihat('tb_barang')->result_array();
            $data['data3'] = $this->Madmin->lihat('tb_kategori')->result_array();
            $data['data5'] = $this->db->query('select SUM(jumlah) as jlh from tb_anggaran where tahun=year(now())')->row();
            $data['data4'] = $this->db->query('select SUM(hargaTotal) as hrgtot from tb_beli where year(tanggalBeli)=year(now())')->row();
            $this->load->view('buy',$data);
        }else if(isset($tampil)) {
            $data['data'] = $this->Madmin->getJoin3All('tb_barang','tb_beli','tb_kategori','*,tb_beli.hargaTotal as hrg','tb_barang.kodeBarang = tb_beli.kodeBarang','tb_barang.idKategori = tb_kategori.idKategori')->result_array();
            $data['data2'] = $this->Madmin->lihat('tb_barang')->result_array();
            $data['data3'] = $this->Madmin->lihat('tb_kategori')->result_array();
            $data['data5'] = $this->db->query('select SUM(jumlah) as jlh from tb_anggaran where tahun=year(now())')->row();
            $data['data4'] = $this->db->query('select SUM(hargaTotal) as hrgtot from tb_beli where year(tanggalBeli)=year(now())')->row();
            $this->load->view('buy',$data);
        }
        else {
            $data['data'] = $this->Madmin->getJoin3All('tb_barang','tb_beli','tb_kategori','*,tb_beli.hargaTotal as hrg','tb_barang.kodeBarang = tb_beli.kodeBarang','tb_barang.idKategori = tb_kategori.idKategori')->result_array();
            $data['data2'] = $this->Madmin->lihat('tb_barang')->result_array();
            $data['data3'] = $this->Madmin->lihat('tb_kategori')->result_array();
            $data['data5'] = $this->db->query('select SUM(jumlah) as jlh from tb_anggaran where tahun=year(now())')->row();
            $data['data4'] = $this->db->query('select SUM(hargaTotal) as hrgtot from tb_beli where year(tanggalBeli)=year(now())')->row();
            $this->load->view('buy',$data);
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
	public function tambahBeli(){
        $harga = $this->input->post('hargaSatuan');
        $jumlah = $this->input->post('jumlah');
        $nama['kategori'] = $this->input->post('ktg');
        $kategori = $this->Madmin->getWhere('tb_kategori',$nama)->row();
        if(empty($kategori->idKategori)){
            $ktg = $this->input->post('ktg');
        	$dt['kategori'] = $ktg;
        	$this->Madmin->tambah('tb_kategori',$dt);
        }else{
            $ktg = $kategori->kategori;
        }
        $dta['kategori'] = $ktg;
        $idKategori = $this->Madmin->getWhere('tb_kategori',$dta)->row()->idKategori;
        $fix = str_replace(".","",$harga);
        $fix2 = str_replace(".","",$jumlah);
        $kodeBarang['kodeBarang'] = $this->input->post('kdBarang');
        $kodeBarang['idKategori'] = $idKategori;
        $cek = count($this->Madmin->getWhere('tb_barang',$kodeBarang)->result_array());
        if($cek >= 1){
            $jumlahLama = $this->Madmin->getWhere('tb_barang',$kodeBarang)->row()->jumlah;
            $jumlahBaru = $this->input->post('jumlah');
            $data2 = array(
            'kodeBarang'    => $this->input->post('kdBarang'),
            'namaBarang'    => $this->input->post('namaBarang'),
            'idKategori'    => $idKategori,
            'jumlah'    => $jumlahLama+$jumlahBaru,
            'satuan'    => $this->input->post('satuan'),
            'hargaSatuan'    => $this->input->post('hargaSatuan')
            );
            $this->Madmin->ubah('tb_barang',$data2,$kodeBarang);
        }else{
            $data2 = array(
                'kodeBarang'    => $this->input->post('kdBarang'),
                'namaBarang'    => $this->input->post('namaBarang'),
                'idKategori'    => $idKategori,
                'jumlah'    => $fix2,
                'satuan'    => $this->input->post('satuan'),
                'hargaSatuan'    => $fix
            );
            $this->Madmin->tambah('tb_barang',$data2);
        }
        $data = array(
            'tanggalBeli'      => $this->input->post('tanggalBeli'),
            'noBukti'    => $this->input->post('noBukti'),
            'kodeBarang'    => $this->input->post('kdBarang'),
            'jumlah'    => $fix2,
            'hargaTotal' => $fix*$fix2
        );
        $this->Madmin->tambah('tb_beli',$data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Tambah Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Beli/formBeli');
	}
	public function ubahBeli(){
		$noBukti['noBukti'] = $this->input->post('noBuktiLama');
        $kodeBarang['kodeBarang'] = $this->input->post('kodeBarang2');
        $beli = $this->Madmin->getWhere('tb_beli',$noBukti)->row()->jumlah;
        $barang = $this->Madmin->getWhere('tb_barang',$kodeBarang)->row()->jumlah;
        $jumlahBaru = $this->input->post('jumlah');
        $fix2 = str_replace(".","",$jumlahBaru);
        $harga = $this->input->post('hargaSatuan');
        $fix = str_replace(".","",$harga);
        $data = array(
            'tanggalBeli'      => $this->input->post('tanggalBeli'),
            'noBukti'    => $this->input->post('noBukti'),
            'kodeBarang'    => $this->input->post('kodeBarang'),
            'jumlah'    => $fix2
        );
        $data2 = array(
            'kodeBarang'    => $this->input->post('kodeBarang'),
            'namaBarang'    => $this->input->post('namaBarang'),
            'idKategori'    => $this->input->post('kategori'),
            'jumlah'    => $barang-($beli-$fix2),
            'satuan'    => $this->input->post('satuan'),
            'hargaSatuan'    => $fix
        );
        $this->Madmin->ubah('tb_barang',$data2,$kodeBarang);
        $this->Madmin->ubah('tb_beli',$data,$noBukti);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Ubah Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Beli/formBeli');
	}
    public function hapusBeli($noBukti){
        $nmrBukti['noBukti'] = $noBukti;
        $kodeBarang['kodeBarang'] = $this->Madmin->getWhere('tb_beli',$nmrBukti)->row()->kodeBarang;
        $jumlahBeli = $this->Madmin->getWhere('tb_beli',$nmrBukti)->row()->jumlah;
        $jumlahBarang = $this->Madmin->getWhere('tb_barang',$kodeBarang)->row()->jumlah;
        $data['jumlah'] = $jumlahBarang-$jumlahBeli;
        $this->Madmin->ubah('tb_barang',$data,$kodeBarang);
        $this->db->delete('tb_beli',array('noBukti'=>$noBukti));
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Hapus Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Beli/formBeli');
    }
    public function cetakBeli(){
        $data['data'] = $this->Madmin->getJoin2All('tb_barang','tb_beli','*','tb_barang.kodeBarang = tb_beli.kodeBarang')->result();
        $this->load->view('cetakBeli',$data);
    }
}
