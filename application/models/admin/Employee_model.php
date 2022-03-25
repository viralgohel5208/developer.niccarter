<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Employee_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        
        if ($this->session->userdata('login_status')!= 1 || $this->session->userdata('user_id') =="" || $this->session->userdata('user_type')!='Admin' ){
            redirect(site_url('admin'),'refresh');
	    }
    }
    
    public function AddEmployee()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');        
       
        
        $data = array();
	    if($this->form_validation->run() == false){
            $message = array('message'=>'Form Validation Failed.', 'class'=>'danger');
        }else{
            $arr=$this->security->xss_clean($this->input->post());
            
            $data['name'] = $arr['name'];
            $data['email'] = $arr['email'];            
            $data['company_id'] = $arr['company_id'];          
            $data['salary_id'] = $arr['salary_id'];          
            
            $this->db->insert('employee',$data);
            $id = $this->db->insert_id();
           
            return true;
            }
        
    }
    
    public function EditEmployee($param)
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('company_id', 'Employees', 'trim|required');       	   
	    
	    $data  = array();
	    if($this->form_validation->run() == false){
            $message = array('message'=>'Form Validation Failed.', 'class'=>'danger');
        }else{
            $arr=$this->security->xss_clean($this->input->post());
            
            $data['name'] = $arr['name'];
            $data['email'] = $arr['email'];            
            $data['company_id'] = $arr['company_id'];          
            $data['salary_id'] = $arr['salary_id'];          
            
            $this->db->where('id',$param);
	        if($this->db->update('employee',$data))
	        {
	            return true;
	        }else{
	            return false;
	        }
        }
    }
    
    public function Employee(){
        $this->db->select('*');
        $this->db->from('employee b');
        $this->db->join('company c','b.company_id=c.id','left');        
        $this->db->join('salary s','b.salary_id=s.id','left');        
        $this->db->order_by('b.id', 'desc');
        $data = $this->db->get()->result_array();
        return $data;
    }
    
    public function get_data($id)
    {
        return $data = $this->db->get_where('employee',array('id'=>$id))->row_array();
    }
    
   
}
?>