<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class User_model extends CI_Model {
    
    function __construct() 
    {
        parent::__construct();
    }
    
    function CheckToken($token)
    {
        $this->db->select('auth_token');
        $this->db->where('auth_token',$token);
        $query = $this->db->get('auth_token');
        $result = $query->row_array();
        return $result['auth_token'];
    }
    
    function HomeNewsData()
    {
        $this->db->select('id,title,video_link,video_image as video_id,description,created_at');
        $this->db->order_by('id','desc');
        $this->db->limit(5);
        $query = $this->db->get('news');
        return $result = $query->result_array();
    }
    
    function ImageData()
    {
        $this->db->select('id,photo,description,created_at');
        $this->db->order_by('id','desc');
        $query = $this->db->get('images');
        return $result = $query->result_array();
    }
    
    function VideoData()
    {
        $this->db->select('id,title,video_link,video_image as video_id,description,created_at');
        $this->db->order_by('id','desc');
        $query = $this->db->get('videos');
        return $result = $query->result_array();
    }
    
    function About_usData()
    {
        $this->db->select('id,image,video_link,video_image as video_id,description,created_at');
        $this->db->order_by('id','desc');
        $query = $this->db->get('about_us');
        return $result = $query->result_array();
    }
    
    function ActivityName()
    {
        $this->db->select('id,color_code,name,sub_title,short_description,video_link,video_image as video_id,description,option1,option1_value,option2,option2_value,option3,option3_value,option4,option4_value,option5,option5_value,created_at');
        $this->db->order_by('id','desc');
        $this->db->where('branch_id',0);
        $query = $this->db->get('activity');
        return $result = $query->result_array();
    }
    
    function ActivityData()
    {
        $this->db->select('video_link,video_image as video_id,description,option1,option1_value,option2,option2_value,option3,option3_value,created_at');
        $this->db->where('id',$_GET['activity_id']);
        $this->db->order_by('id','desc');
        $query = $this->db->get('activity');
        return $result = $query->row_array();
    }
    
    function BranchActivityData($branch_id)
    {
        $this->db->select('id,color_code,name,sub_title,short_description,video_link,video_image as video_id,description,option1,option1_value,option2,option2_value,option3,option3_value,created_at');
        $this->db->order_by('id','desc');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('activity');
        return $result = $query->result_array();
    }
    
    function NewsActivityData($branch_id)
    {
        $this->db->select('id,title,video_link,video_image as video_id,description,created_at');
        $this->db->order_by('id','desc');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('news');
        return $result = $query->result_array();
    }
    
    function ActivityImage($activity_id)
    {
        $this->db->select('image');
        $this->db->where('activity_id',$activity_id);
        $this->db->order_by('id','desc');
        $this->db->limit(2);
        $query = $this->db->get('activity_image');
        return $result = $query->result_array();
    }
    
    function BranchName()
    {
        $this->db->select('id,name,city,description,address,latitude,longitude,created_at');
        $this->db->order_by('id','desc');
        $query = $this->db->get('branch');
        return $result = $query->result_array();
    }
    
    function BranchData()
    {
        $this->db->select('description,address,created_at');
        $this->db->where('id',$_GET['branch_id']);
        $this->db->order_by('id','desc');
        $query = $this->db->get('branch');
        return $result = $query->row_array();
    }
    
    function BranchImage($branch_id)
    {
        $this->db->select('image');
        $this->db->where('branch_id',$branch_id);
        $this->db->order_by('id','desc');
        $this->db->limit(2);
        $query = $this->db->get('branch_image');
        return $result = $query->result_array();
    }
    
    function NewsData()
    {
        $this->db->select('id,title,video_link,video_image as video_id,description,created_at');
        $this->db->order_by('id','desc');
        $this->db->where('branch_id',0);
        $query = $this->db->get('news');
        return $result = $query->result_array();
    }
    
    function News_image($news_id)
    {
        $this->db->select('image');
        $this->db->where('news_id',$news_id);
        $this->db->order_by('id','desc');
        $this->db->limit(2);
        $query = $this->db->get('news_image');
        return $result = $query->result_array();
    }
    
    function About_GurudevData()
    {
        $this->db->select('id,image,video_link,video_image as video_id,website_link,description,created_at');
        $this->db->order_by('id','desc');
        $query = $this->db->get('about_gurudev');
        return $result = $query->result_array();
    }
    
    function MissionData()
    {
        $this->db->select('id,title,image,description,created_at,created_at');
        $this->db->order_by('id','desc');
        $query = $this->db->get('mission');
        return $result = $query->result_array();
    }
    
    function VisionData()
    {
        $this->db->select('id,title,image,description,created_at');
        $this->db->order_by('id','desc');
        $query = $this->db->get('vision');
        return $result = $query->result_array();
    }
    
    function SettingData()
    {
        $this->db->select('id,r_key,secret_key');
        $query = $this->db->get('setting');
        return $result = $query->result_array();
    }
    
    function Typeof_Donation()
    {
        $this->db->select('id,name as value');
        $query = $this->db->get('donation');
        return $result = $query->result_array();
    }
    
    function Add_Donation($jsondata=array())
    {
        $data = array(
                'donation_id' => $jsondata->donation_id,
                'name' => $jsondata->name,
                'mobile_no' => $jsondata->mobile_no,
                'email' => $jsondata->email,
                'address' => $jsondata->address,
                'city' => $jsondata->city,
                'state' => $jsondata->state,
                'pin_code' => $jsondata->pin_code,
                'country' => $jsondata->country,
                'amount' => $jsondata->amount,
                'payment_status' => $jsondata->payment_status,
                'payment_id' => $jsondata->payment_id,
                'created_at' => date("Y-m-d H:i:s"),
            );
            
        $this->db->insert('donation_register',$data);
        $id = $this->db->insert_id();
        
        if($id != '')
        {
            return true;
        }else{
            return false;
        }
    }
    
    function ContactUs()
    {
        $this->db->select('id,email,address,mobile_no,fax_no,created_at');
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query = $this->db->get('contact_us');
        return $result = $query->row_array();
    }
    
    function Join_us($jsondata=array())
    {
        $data = array(
                'first_name' => $jsondata->first_name,
                'last_name' => $jsondata->last_name,
                'mobile_no' => $jsondata->mobile_no,
                'email' => $jsondata->email,
                // 'address' => $jsondata->address,
                'city' => $jsondata->city,
                'state' => $jsondata->state,
                // 'pin_code' => $jsondata->pin_code,
                'country' => $jsondata->country,
                // 'amount' => $jsondata->amount,
                // 'payment_status' => $jsondata->payment_status,
                // 'payment_id' => $jsondata->payment_id,
                'created_at' => date("Y-m-d H:i:s"),
            );
            
        $this->db->insert('join_us',$data);
        $id = $this->db->insert_id();
        
        if($id != '')
        {
            return true;
        }else{
            return false;
        }
    }
    
    function Token($jsondata=array())
    {
        $data = array(
                'token' => $jsondata->token,
                'created_at' => date("Y-m-d H:i:s"),
            );
            
        $this->db->insert('user_token',$data);
        $id = $this->db->insert_id();
        
        if($id != '')
        {
            return true;
        }else{
            return false;
        }
    }
}
?>