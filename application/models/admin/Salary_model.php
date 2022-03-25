<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Salary_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        
        if ($this->session->userdata('login_status')!= 1 || $this->session->userdata('user_id') =="" || $this->session->userdata('user_type')!='Admin' ){
            redirect(site_url('admin'),'refresh');
	    }
    }
    
    public function AddSalary()
    {
        $this->form_validation->set_rules('salary_amount', 'Amount', 'trim|required');
        $this->form_validation->set_rules('salary_period', 'Period', 'trim|required');        
        
        
        $data = array();
	    if($this->form_validation->run() == false){
            $message = array('message'=>'Form Validation Failed.', 'class'=>'danger');
        }else{
            $arr=$this->security->xss_clean($this->input->post());
            
            $data['salary_amount'] = $arr['salary_amount'];
            $data['salary_period'] = $arr['salary_period'];                                
            
            $this->db->insert('salary',$data);
            $id = $this->db->insert_id();
           
            return true;
            }
        
    }
    
    public function EditSalary($param)
    {
        $this->form_validation->set_rules('salary_amount', 'Amount', 'trim|required');
        $this->form_validation->set_rules('salary_period', 'Period', 'trim|required');       	   
	    
	    $data  = array();
	    if($this->form_validation->run() == false){
            $message = array('message'=>'Form Validation Failed.', 'class'=>'danger');
        }else{
            $arr=$this->security->xss_clean($this->input->post());
            
            $data['salary_amount'] = $arr['salary_amount'];
            $data['salary_period'] = $arr['salary_period'];                  
            
            $this->db->where('id',$param);
	        if($this->db->update('salary',$data))
	        {
	            return true;
	        }else{
	            return false;
	        }
        }
    }
    
    public function Salary(){
        $this->db->select('*');
        $this->db->from('salary b');        
        $this->db->order_by('b.id', 'desc');
        $data = $this->db->get()->result_array();
        return $data;
    }
    
    public function get_data($id)
    {
        return $data = $this->db->get_where('salary',array('id'=>$id))->row_array();
    }
    
    
}
?>