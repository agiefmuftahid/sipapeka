<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	public function get_by_id($id){
		$this->db->from('tb_barang');
		$this->db->where('kodeBarang',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function he($id){
		$this->db->from('tb_beli');
		$this->db->where('noBukti',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function getktg($table1,$table2,$data1,$data2,$id){
		$this->db->select($data1);
		$this->db->from($table1);
		$this->db->join($table2,$data2);
		$this->db->where('kodeBarang',$id);
		return $this->db->get()->row();
	}
	public function tambah($table,$data){
		return $this->db->insert($table,$data);
	}
	public function ubah($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}
	public function lihat($table){
		return $this->db->get($table);
	}
	public function lihatGroup($table1,$table2,$data1,$data2){
		$this->db->select($data1);
		$this->db->from($table1);
		$this->db->join($table2,$data2);
		$this->db->group_by('tahun');   
		return $this->db->get();
	}
	public function getJoin2All($table1,$table2,$data1,$data2){
		$this->db->select($data1);
		$this->db->from($table1);
		$this->db->join($table2,$data2);
		return $this->db->get();
	}
	public function getJoin2AllOrder($table1,$table2,$data1,$data2,$order){
		$this->db->select($data1);
		$this->db->from($table1);
		$this->db->join($table2,$data2);
		$this->db->order_by($order,'Asc');
		return $this->db->get();
	}
	public function getJoin2AllGroup($table1,$table2,$data1,$data2){
		$this->db->select($data1);
		$this->db->from($table1);
		$this->db->join($table2,$data2);
		$this->db->group_by('tahun');   
		return $this->db->get();
	}
	public function getJoin3All($table1,$table2,$table3,$data1,$data2,$data3)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);     
	    return $this->db->get();
	}
	public function getJoin3Allorder($table1,$table2,$table3,$data1,$data2,$data3)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);  
		$this->db->order_by('CAST(SUBSTRING(noBukti, 1, length(noBukti)-8)as int)');   
		$this->db->group_by('tb_kategori.idKategori'); 
	    return $this->db->get();
	}
	public function getJoin4All($table1,$table2,$table3,$table4,$data1,$data2,$data3,$data4)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);       
	    return $this->db->get();
	}
	public function getJoin5All($table1,$table2,$table3,$table4,$table5,$data1,$data2,$data3,$data4,$data5)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
	    $this->db->join($table5, $data5);              
	    return $this->db->get();
	}
	public function getJoin5AllCetakDistribusi($table1,$table2,$table3,$table4,$table5,$data1,$data2,$data3,$data4,$data5)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
	    $this->db->join($table5, $data5);              
	    return $this->db->get();
	}
	public function getJoinGroup($table1,$table2,$table3,$table4,$table5,$data1,$data2,$data3,$data4,$data5)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
	    $this->db->join($table5, $data5);
		$this->db->order_by('idDistribusi','desc');  
		$this->db->group_by('noBukti');              
	    return $this->db->get();
	}
	public function getJoinGroupBeranda($table1,$table2,$table3,$table4,$data1,$data2,$data3,$data4)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
		$this->db->order_by('idDistribusi','desc');  
		$this->db->group_by('noBukti');              
	    return $this->db->get();
	}
	public function getJoin4Group($table1,$table2,$table3,$table4,$data1,$data2,$data3,$data4)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
		$this->db->order_by('idDistribusi','desc');  
		$this->db->group_by('noBukti');              
	    return $this->db->get();
	}
	public function getJoinGroup2($table1,$table2,$table3,$table4,$table5,$data1,$data2,$data3,$data4,$data5,$id)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
	    $this->db->join($table5, $data5);
		$this->db->order_by('idDistribusi','desc');  
		$this->db->where('noBukti',$id);              
	    return $this->db->get();
	}
	public function getJoinGroup23($table1,$table2,$table3,$table4,$table5,$data1,$data2,$data3,$data4,$data5,$id)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
	    $this->db->join($table5, $data5);
		$this->db->order_by('idDistribusi','desc');  
		$this->db->where('noBukti',$id);              
	    return $this->db->get();
	}
	public function getWhere($table,$data){
		return $this->db->get_where($table,$data);
	}

	public function get_by_id2($id)
	{
	  
	  	$this->db->where('idKategori',$id); 
	  
	  	return $this->db->get('tb_kategori')->row();
	
	}
	public function get_by_id3($id)
	{
	  
	  	$this->db->where('kodeBarang',$id); 
	  
	  	return $this->db->get('tb_barang')->row();
	
	}
	public function getWhereLike($table1,$table2,$data1,$data2,$field,$search){
		$this->db->select($data1);
		$this->db->from($table1);
		$this->db->join($table2,$data2);
		$this->db->like($field, $search);
		return $this->db->get();
	}
	public function getWhereLikeOrder($table1,$table2,$data1,$data2,$order,$field,$search){
		$this->db->select($data1);
		$this->db->from($table1);
		$this->db->join($table2,$data2);
		$this->db->order_by($order,'asc');
		$this->db->like($field, $search);
		return $this->db->get();
	}
	public function getJoinGroupLike($table1,$table2,$table3,$table4,$data1,$data2,$data3,$data4,$field,$search)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
		$this->db->order_by('idDistribusi','desc');  
		$this->db->group_by('noBukti');
		$this->db->like($field, $search);              
	    return $this->db->get();
	}
	public function getJoin3AllLike($table1,$table2,$table3,$data1,$data2,$data3,$field,$search)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);  
		$this->db->like($field, $search);          
	    return $this->db->get();
	}
	public function getJoin3AllDate($table1,$table2,$table3,$data1,$data2,$data3,$tgl1,$tgl2)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);  
		$this->db->where('tanggalBeli >=',$tgl1);   
		$this->db->where('tanggalBeli <=',$tgl2);
		$this->db->order_by('CAST(SUBSTRING(noBukti, 1, length(noBukti)-8)as int)');  
		$this->db->group_by('tb_kategori.idKategori');          
	    return $this->db->get();
	}
	public function getJoin2AllWhere($table1,$table2,$data1,$data2,$id){
		$this->db->select($data1);
		$this->db->from($table1);
		$this->db->join($table2,$data2); 
		$this->db->where('idBidang',$id);   
		return $this->db->get();
	}
	public function getJoinGroupDate($table1,$table2,$table3,$table4,$table5,$data1,$data2,$data3,$data4,$data5,$tgl1,$tgl2)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
	    $this->db->join($table5, $data5);
		$this->db->order_by('idDistribusi','desc');  
		$this->db->where('tglDistribusi >=',$tgl1);   
		$this->db->where('tglDistribusi <=',$tgl2); 
		$this->db->group_by('noBukti');             
	    return $this->db->get();
	}
	public function getJoin3Allwhere($table1,$table2,$table3,$data1,$data2,$data3,$id){
		$this->db->select($data1);
		$this->db->from($table1);
		$this->db->join($table2,$data2);
		$this->db->join($table3,$data3);
		$this->db->where("Year(tanggalBeli)",$id);
		$this->db->order_by('CAST(SUBSTRING(noBukti, 1, length(noBukti)-8)as int)');
		$this->db->group_by('tb_kategori.idKategori');      
		return $this->db->get();
	}
	public function getJoinGroupWhere($table1,$table2,$table3,$table4,$table5,$data1,$data2,$data3,$data4,$data5,$where,$id)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
	    $this->db->join($table5, $data5);
		$this->db->order_by('idDistribusi','desc');  
		$this->db->group_by('noBukti');
		$this->db->where($where,$id);              
	    return $this->db->get();
	}
	public function getTahun($table1,$table2,$table3,$data1,$data2,$data3)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
		$this->db->group_by('Year(tb_beli.tanggalBeli)');              
	    return $this->db->get();
	}
	public function getJoin3Allwhere2($table1,$table2,$table3,$data1,$data2,$data3,$id,$id2){
		$this->db->select($data1);
		$this->db->from($table1);
		$this->db->join($table2,$data2);
		$this->db->join($table3,$data3);
		$this->db->where("Year(tanggalBeli)",$id);
		$this->db->where("Month(tanggalBeli)",$id2);
		$this->db->order_by('CAST(SUBSTRING(noBukti, 1, length(noBukti)-8)as int)');
		$this->db->group_by('tb_kategori.idKategori'); 
		return $this->db->get();
	}
	public function getJoinGroupWhere2($table1,$table2,$table3,$table4,$table5,$data1,$data2,$data3,$data4,$data5,$where,$id,$where2,$id2)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
	    $this->db->join($table5, $data5);
		$this->db->order_by('idDistribusi','desc');  
		$this->db->group_by('noBukti');
		$this->db->where($where,$id);  
		$this->db->where($where2,$id2);             
	    return $this->db->get();
	}
	public function getJoinGroupWhere3($table1,$table2,$table3,$table4,$table5,$data1,$data2,$data3,$data4,$data5,$where,$id)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
	    $this->db->join($table5, $data5);
		$this->db->where($where,$id);              
	    return $this->db->get();
	}
	public function getJoinGroupWhere3UbahDistribusi($table1,$table2,$table3,$table4,$data1,$data2,$data3,$data4,$where,$id)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
		$this->db->where($where,$id);              
	    return $this->db->get();
	}
	public function getJoinGroupWhere4($table1,$table2,$table3,$table4,$table5,$data1,$data2,$data3,$data4,$data5,$where,$id,$where2,$id2)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
	    $this->db->join($table5, $data5);
		$this->db->order_by('idDistribusi','desc');  
		$this->db->group_by('noBukti');
		$this->db->where($where,$id);  
		$this->db->where($where2,$id2);             
	    return $this->db->get();
	}
	public function getJoinGroupWhere5($table1,$table2,$table3,$table4,$table5,$data1,$data2,$data3,$data4,$data5,$where,$id)
	{
	    $this->db->select($data1);
	    $this->db->from($table1); 
	    $this->db->join($table2, $data2);
	    $this->db->join($table3, $data3);
	    $this->db->join($table4, $data4);
	    $this->db->join($table5, $data5);
		$this->db->order_by('idDistribusi','desc');  
		$this->db->group_by('noBukti');
		$this->db->where($where,$id);              
	    return $this->db->get();
	}
}
