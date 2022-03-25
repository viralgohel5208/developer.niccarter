<?php

class Employee extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        /*cache control*/
        $this->load->library('date_time');
        $this->load->model('admin/employee_model','model');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	    
	    if ($this->session->userdata('login_status')!= 1 || $this->session->userdata('user_id') =="" || $this->session->userdata('user_type')!='Admin' ){
            redirect(site_url('admin'),'refresh');
	    }
	}
	
	public function index(){
	    $page_data['page_name']  = 'employee/view_employee';
        $page_data['page_title'] = 'Add Employee';
        $page_data['data'] = $this->model->Employee();
        $this->load->view('admin/common', $page_data);
	}
	
	public function add_employee()
	{
	    $page_data['page_name']  = 'employee/add_edit_employee';
        $page_data['page_title'] = 'Add Employee';
        // $page_data['row_data'] = $this->model->Image();
        $this->load->view('admin/common', $page_data);
	}
	
	public function create()
	{
	    $insert = $this->model->AddEmployee();
	    
	    if($insert == true){
                $message = array('message'=>'Employee Added Successfully.', 'class'=>'success');
            }else{
                $message = array('message'=>'Failed to Employee.', 'class'=>'danger');
            }
            
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/employee'),'refresh');
	}
	
	public function edit($param='')
	{
	    $param=$this->security->xss_clean($param);
	    $param = base64_decode($param);
	    $page_data['row_data'] = $this->model->get_data($param);
	    $page_data['page_name']  = 'employee/add_edit_employee';
        $page_data['page_title'] = 'Employee';
        $this->load->view('admin/common', $page_data);  
	}
	
	public function update($param='')
	{
	    $param=$this->security->xss_clean($param);
	    $param = base64_decode($param);
	    $update = $this->model->EditEmployee($param);
	    
	    if($update == true){
            $message = array('message'=>'Employee Updated Successfully.', 'class'=>'success');
        }else{
            $message = array('message'=>'Failed to Update Employee.', 'class'=>'danger');
        }
        
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/employee'),'refresh');
	}
	
	public function delete($param='')
	{
	    $param=$this->security->xss_clean($param);
	    $param = base64_decode($param);
	    
	    if($this->db->delete('employee',array('id'=>$param)))
	    {	       
            $message = array('message'=>'Employee Deleted Successfully.', 'class'=>'success');
        }else{
            $message = array('message'=>'Failed to Delete Employee.', 'class'=>'danger');
        }
        $this->session->set_flashdata('flash_message',$message);
        redirect(site_url('admin/employee'),'refresh');
	}
	

}