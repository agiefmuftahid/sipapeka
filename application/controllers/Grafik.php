<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
        parent::__construct();
    }
	public function chartBarang1()
	{
		$data['graph'] = $this->Mdata->chartKategoribrg();
		$this->load->view('chart', $data);
	}
}
