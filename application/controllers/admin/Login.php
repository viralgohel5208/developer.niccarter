<?php
class Login extends CI_Controller {
    function __construct()
	{
		parent::__construct();
        /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}
	
	public function index(){
	    $this->load->view('admin/index');
	}
	
	public function validateLogin(){
	    
	    $this->form_validation->set_rules('email', 'Email', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    
	    if($this->form_validation->run()==false){
            $message = array('message'=>'Form Validation Failed.', 'class'=>'danger');
            $this->session->set_flashdata('flash_message',$message);
            redirect(site_url('admin'),'refresh');
        }else{
            $email = $this->security->xss_clean($this->input->post('email'));
	        $password = sha1($this->security->xss_clean($this->input->post('password')));
			// print_r($password);
			// exit;
	        
	        $validate = $this->db->get_where('employee',array('email'=>$email,'password'=>$password,'user_type'=>'Admin'))->num_rows();
	        
	        if($validate==1){
	            $data = $this->db->get_where('employee',array('email'=>$email,'password'=>$password,'user_type'=>'Admin'))->row_array();
	           // set user session data
	            $this->session->set_userdata('login_status', '1');
	            $this->session->set_userdata('user_id', $data['id']);
	            $this->session->set_userdata('user_type', $data['user_type']);
	            $this->session->set_userdata('name', $data['name']);
	            $this->session->set_userdata('menuper', $data['menuper']);
	            $this->session->set_userdata('photo', $data['photo']);
	            
                redirect(site_url('admin/company'),'refresh');
	        }else{
	          
	            $message = array('message'=>'Invalid User Name or Password !', 'class'=>'danger');
                $this->session->set_flashdata('flash_message',$message);
                redirect(site_url('admin'),'refresh');
	        }
        }
	}
}
?>