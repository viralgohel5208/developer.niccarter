<?php

class Salary extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        /*cache control*/
        $this->load->library('date_time');
        $this->load->model('admin/salary_model','model');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	    
	    if ($this->session->userdata('login_status')!= 1 || $this->session->userdata('user_id') =="" || $this->session->userdata('user_type')!='Admin' ){
            redirect(site_url('admin'),'refresh');
	    }
	}
	
	public function index(){
	    $page_data['page_name']  = 'salary/view_salary';
        $page_data['page_title'] = 'Add Salary';
        $page_data['data'] = $this->model->Salary();
        $this->load->view('admin/common', $page_data);
	}
	
	public function add_salary()
	{
	    $page_data['page_name']  = 'salary/add_edit_salary';
        $page_data['page_title'] = 'Add Salary';
        // $page_data['row_data'] = $this->model->Image();
        $this->load->view('admin/common', $page_data);
	}
	
	public function create()
	{
	    $insert = $this->model->AddSalary();
	    
	    if($insert == true){
                $message = array('message'=>'Salary Added Successfully.', 'class'=>'success');
            }else{
                $message = array('message'=>'Failed to Salary.', 'class'=>'danger');
            }
            
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/salary'),'refresh');
	}
	
	public function edit($param='')
	{
	    $param=$this->security->xss_clean($param);
	    $param = base64_decode($param);
	    $page_data['row_data'] = $this->model->get_data($param);
	    $page_data['page_name']  = 'salary/add_edit_salary';
        $page_data['page_title'] = 'Salary';
        $this->load->view('admin/common', $page_data);  
	}
	
	public function update($param='')
	{
	    $param=$this->security->xss_clean($param);
	    $param = base64_decode($param);
	    $update = $this->model->EditSalary($param);
	    
	    if($update == true){
            $message = array('message'=>'Salary Updated Successfully.', 'class'=>'success');
        }else{
            $message = array('message'=>'Failed to Update Salary.', 'class'=>'danger');
        }
        
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/salary'),'refresh');
	}
	
	public function delete($param='')
	{
	    $param=$this->security->xss_clean($param);
	    $param = base64_decode($param);
	    
	    if($this->db->delete('salary',array('id'=>$param)))
	    {	       
            $message = array('message'=>'Salary Deleted Successfully.', 'class'=>'success');
        }else{
            $message = array('message'=>'Failed to Delete Salary.', 'class'=>'danger');
        }
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/salary'),'refresh');
	}
	
	public function image_delete($param='')
	{
	    $param=$this->security->xss_clean($param);
	    $param = base64_decode($param);
	    
	    if($this->db->delete('salary_image',array('id'=>$param)))
	    {
            $message = array('message'=>'Image Deleted Successfully.', 'class'=>'success');
        }else{
            $message = array('message'=>'Failed to Delete Image.', 'class'=>'danger');
        }
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/salary'),'refresh');
	}
	
	public function Salary_image($salary_id)
	{
	    $salary_id = base64_decode($salary_id);
	    $page_data['data'] = $this->model->Salary_image($salary_id);
	    $page_data['salary_name'] = $this->model->get_data($salary_id);
	    
	    $page_data['page_name']  = 'salary/view_salary_image';
        $page_data['page_title'] = 'Salary Image';
        $this->load->view('admin/common', $page_data);
	    
	}
}