<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Welcome_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
       
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