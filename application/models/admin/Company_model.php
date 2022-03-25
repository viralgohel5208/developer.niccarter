<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Company_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        
        if ($this->session->userdata('login_status')!= 1 || $this->session->userdata('user_id') =="" || $this->session->userdata('user_type')!='Admin' ){
            redirect(site_url('admin'),'refresh');
	    }
    }
    
    public function AddCompany()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');        
        $this->form_validation->set_rules('total_employees', 'Description', 'trim|required');
        
        $data = array();
	    if($this->form_validation->run() == false){
            $message = array('message'=>'Form Validation Failed.', 'class'=>'danger');
        }else{
            $arr=$this->security->xss_clean($this->input->post());
            
            $data['company_name'] = $arr['name'];
            $data['company_address'] = $arr['address'];            
            $data['employees'] = $arr['total_employees'];          
            
            $this->db->insert('company',$data);
            $id = $this->db->insert_id();
           
            return true;
            }
        
    }
    
    public function EditCompany($param)
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('total_employees', 'Employees', 'trim|required');       	   
	    
	    $data  = array();
	    if($this->form_validation->run() == false){
            $message = array('message'=>'Form Validation Failed.', 'class'=>'danger');
        }else{
            $arr=$this->security->xss_clean($this->input->post());
            
            $data['company_name'] = $arr['name'];
            $data['company_address'] = $arr['address'];            
            $data['employees'] = $arr['total_employees'];          
            
            $this->db->where('id',$param);
	        if($this->db->update('company',$data))
	        {
	            return true;
	        }else{
	            return false;
	        }
        }
    }
    
    public function Company(){
        $this->db->select('*');
        $this->db->from('company b');        
        $this->db->order_by('b.id', 'desc');
        $data = $this->db->get()->result_array();
        return $data;
    }
    
    public function get_data($id)
    {
        return $data = $this->db->get_where('company',array('id'=>$id))->row_array();
    }
    
    public function Company_image($company_id)
    {
        $this->db->select('id,image');
        $this->db->where('company_id',$company_id);
        $query = $this->db->get('company_image');
        $result = $query->result_array();
        return $result;
    }
}
?>