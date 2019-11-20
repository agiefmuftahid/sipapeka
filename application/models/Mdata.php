<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdata extends CI_Model {

	public function barchart(){
        $this->db->select('MONTH(tglDistribusi) as month, COUNT(idDistribusi) as jumlah');
        $this->db->from('tb_kwitansi');
        $this->db->group_by('MONTH(tglDistribusi)');
        $this->db->where('year(tglDistribusi)',date('Y'));
        $query = $this->db->get();
        return $query->result();
    }
    public function donutchart(){
        $this->db->select('*');
        $this->db->from('tb_bidang');
        $query = $this->db->get();
        return $query->result();
    }
    public function chartKategoribrg(){
        return $this->db->query("SELECT tb_kategori.kategori,SUM(jumlah) as jumlah FROM tb_barang JOIN tb_kategori ON tb_barang.idKategori = tb_kategori.idKategori GROUP BY tb_barang.idKategori");
    }
}
