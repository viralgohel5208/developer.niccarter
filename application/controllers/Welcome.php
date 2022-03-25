<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('admin/welcome_model','model');
		
	}


	public function index()
	{

		$data['data'] = $this->model->Employee();
        // $this->load->view('admin/include/navbar.php'); 
		$this->load->view('welcome_page', $data);		
	}
}
