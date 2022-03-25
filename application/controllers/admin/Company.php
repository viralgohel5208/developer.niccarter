<?php

class Company extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        /*cache control*/
        $this->load->library('date_time');
        $this->load->model('admin/company_model','model');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	    
	    if ($this->session->userdata('login_status')!= 1 || $this->session->userdata('user_id') =="" || $this->session->userdata('user_type')!='Admin' ){
            redirect(site_url('admin'),'refresh');
	    }
	}
	
	public function index(){
	    $page_data['page_name']  = 'company/view_company';
        $page_data['page_title'] = 'Add Company';
        $page_data['data'] = $this->model->Company();
        $this->load->view('admin/common', $page_data);
	}
	
	public function add_company()
	{
	    $page_data['page_name']  = 'company/add_edit_company';
        $page_data['page_title'] = 'Add Company';
        // $page_data['row_data'] = $this->model->Image();
        $this->load->view('admin/common', $page_data);
	}
	
	public function create()
	{
	    $insert = $this->model->AddCompany();
	    
	    if($insert == true){
                $message = array('message'=>'Company Added Successfully.', 'class'=>'success');
            }else{
                $message = array('message'=>'Failed to Company.', 'class'=>'danger');
            }
            
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/company'),'refresh');
	}
	
	public function edit($param='')
	{
	    $param=$this->security->xss_clean($param);
	    $param = base64_decode($param);
	    $page_data['row_data'] = $this->model->get_data($param);
	    $page_data['page_name']  = 'company/add_edit_company';
        $page_data['page_title'] = 'Company';
        $this->load->view('admin/common', $page_data);  
	}
	
	public function update($param='')
	{
	    $param=$this->security->xss_clean($param);
	    $param = base64_decode($param);
	    $update = $this->model->EditCompany($param);
	    
	    if($update == true){
            $message = array('message'=>'Company Updated Successfully.', 'class'=>'success');
        }else{
            $message = array('message'=>'Failed to Update Company.', 'class'=>'danger');
        }
        
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/company'),'refresh');
	}
	
	public function delete($param='')
	{
	    $param=$this->security->xss_clean($param);
	    $param = base64_decode($param);
	    
	    if($this->db->delete('company',array('id'=>$param)))
	    {	       
            $message = array('message'=>'Company Deleted Successfully.', 'class'=>'success');
        }else{
            $message = array('message'=>'Failed to Delete Company.', 'class'=>'danger');
        }
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/company'),'refresh');
	}
	
	public function image_delete($param='')
	{
	    $param=$this->security->xss_clean($param);
	    $param = base64_decode($param);
	    
	    if($this->db->delete('company_image',array('id'=>$param)))
	    {
            $message = array('message'=>'Image Deleted Successfully.', 'class'=>'success');
        }else{
            $message = array('message'=>'Failed to Delete Image.', 'class'=>'danger');
        }
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/company'),'refresh');
	}
	
	public function Company_image($company_id)
	{
	    $company_id = base64_decode($company_id);
	    $page_data['data'] = $this->model->Company_image($company_id);
	    $page_data['company_name'] = $this->model->get_data($company_id);
	    
	    $page_data['page_name']  = 'company/view_company_image';
        $page_data['page_title'] = 'Company Image';
        $this->load->view('admin/common', $page_data);
	    
	}
}