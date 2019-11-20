<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

	public function proseslogin($username,$password)
	{
		$this->db->where('username',$username);
        $this->db->where('password',$password);
        $query = $this->db->get('tb_user');
        return $query->result_array();
	}
}
