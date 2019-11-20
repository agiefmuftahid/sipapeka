<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	public function tambah($table,$data){
		return $this->db->insert($table,$data);
	}
	public function ubah($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}
	public function lihat($table){
		return $this->db->get($table);
	}
	public function getJoin($table1,$table2,$data1,$data2){
		$this->db->from($table1);
		$this->db->join($table2,$data1);
		$this->db->where($table1);
		return $this->db->get();
	}
	public function getWhere($table,$data){
		return $this->db->get_where($table,$data);
	}
	public function getJoin2($table1,$table2,$table3,$data1,$data2,$data3)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);     
	    return $this->db->get();
	}
}
