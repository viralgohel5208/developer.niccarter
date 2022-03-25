<?php

class Admin extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        /*cache control*/
		$this->load->library('upload');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	    
	    if ($this->session->userdata('login_status')!= 1 || $this->session->userdata('user_id') =="" || $this->session->userdata('user_type')!='Admin' ){
            redirect(site_url('admin'),'refresh');
	    }
	}
	
	public function index(){
	    $page_data['page_name']  = 'add_user';
        $page_data['page_title'] = 'Add User';
        $this->load->view('admin/common', $page_data);  
	}
	
}