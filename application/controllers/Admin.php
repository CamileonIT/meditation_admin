<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance();
        
        date_default_timezone_set("Asia/Kolkata");
        
        if (!$this->session->userdata('admin_id')) {
            redirect('login');
        }

        $settings     = $this->db->get('settings')->result() ;
        
    }
 
    public function index()
    {
        $result['user_count']         = $this->db->get('user')->num_rows() ;
        $result['music_count']         = $this->db->get('music')->num_rows() ;
        $result['category_count']         = $this->db->get('category')->num_rows() ;
        // $result['like_count']         = $this->db->get('album')->num_rows() ;
        
        $result['current_month_user_count']         = $this->db->get('user')->num_rows() ;
        $result['current_month_music_count']         = $this->db->get('music')->num_rows() ;
        $result['current_month_category_count']         = $this->db->get('category')->num_rows() ;
        // $result['current_month_album_count']         = $this->db->get('album')->num_rows() ;
        
        
        $result['current_month_user_count']         = $this->db->get_where('user','MONTH(created_date) = MONTH(CURRENT_DATE())')->num_rows() ;
        $result['current_month_music_count']         =  $this->db->get_where('music','MONTH(created_date) = MONTH(CURRENT_DATE())')->num_rows() ;
        $result['current_month_category_count']         =  $this->db->get_where('category','MONTH(created_date) = MONTH(CURRENT_DATE())')->num_rows() ;
        
        
            $this->db->select('music.*,category_name');
            
            $this->db->join('category','music.category_id = category.category_id','left');
            
            $this->db->order_by('created_date','desc');
            $this->db->order_by('music_id','desc');
        $query = $this->db->get('music',5);
        
        $result['latest_musics'] = $query->result();
        
              $this->db->select('music.*,category_name,COUNT(like_type_id) as likedCount');
              $this->db->join('music','music.music_id =liked.like_type_id');
            
            $this->db->join('category','music.category_id = category.category_id','left');
              
              $this->db->where(array('like_type'=>'Music','music.music_status'=>'ENABLE'));
              $this->db->group_by('like_type_id');
              $this->db->order_by('likedCount', 'desc');
              $this->db->order_by('liked.created_date','desc');
        $query1 = $this->db->get('liked',5);
        $result['favoutite_musics'] = $query1->result();
        $result['page']='index';
        $this->load->view('index', $result);
    }
    
    
    
    public function category()
    {
        $result             = array();
        // $result['category'] = $this->db->select('c.*, p.category_name parent_category_name')->join('category p','c.parent_category_id = p.category_id','left')->order_by('c.created_date','desc')->get('category c')->result();
        $result['page']='category';

        $result['category'] = $this->db->select('*,concat("uploads/category/icon/",category_icon) as category_icon')->get('category')->result();;
        foreach ($result['category'] as $category) {
            ($category->category_status == "ENABLE") ? $category->status_class = "btn-success" : $category->status_class = "btn-danger";
            $category->musics =  $this->db->get_where('music',array('category_id' => $category->category_id))->num_rows() ;
            
        }
        
        $this->load->view('category', $result);
    }
    
    public function addCategory()
    {   
        
        
        $data = array(
                'category_name' => $this->input->post('category_name'),
                'parent_category_id' => $this->input->post('parent_category'),
                
                'category_status' => 'ENABLE',
                'created_date'=>date('Y-m-d H:i:s')
            );
       
        $this->db->insert('category',$data);
        
        $category_id = $this->db->insert_id();
        
        if($category_id){
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Category Added Successfully..!</div>");
        }
        else{
           $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-danger background-danger'>Something get wrong, try again..!</div>"); 
        }
        
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Category Added Successfully..!</div>");
        redirect('admin/category');
    }
    
    
    public function editCategory()
    {   

        
        $id   = $this->input->post('id');
        $data = array(
            'category_name' => $this->input->post('category_name'),
            'parent_category_id' => $this->input->post('parent_category')
        );
        
        $this->db->update('category', $data ,array('category_id' => $id
        ));
        
        
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Category Data Updated Successfully..!</div>");
        
        redirect('admin/category');
    }
    
    public function changeCategorySliderStatus($value = '')
    {
        
        $this->input->post('slider_status') == "ENABLE" ? $status = "DISABLE" : $status = "ENABLE";
        
        $where  = array(
            'category_id' => $this->input->post('id')
        );
        $data   = array(
            'category_is_in_slider' => $status
        );
        $result = $this->db->update('category', $data,$where);
        
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Category Status Changed Successfully..!</div>");
        
    }
    
    public function changeListStatus($type)
    {
        
        $this->input->post('status') == "ENABLE" ? $status = "DISABLE" : $status = "ENABLE";
        $type_id = $type.'_id';
        $type_status = $type.'_status';
        
        $where   = array(
            $type_id => $this->input->post('id')
        );
        $data    = array(
            $type_status => $status
        );
        $result  = $this->db->update($type, $data,$where);
        
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Item Status Changed Successfully..!</div>");
        
    }

    public function changeMusicStatus($value = '')
    {
        
        $this->input->post('status') == "ENABLE" ? $status = "DISABLE" : $status = "ENABLE";
        
        $where  = array(
            'music_id' => $this->input->post('id')
        );
        $data   = array(
            'music_status' => $status
        );
        $result = $this->db->update('music', $data,$where);
        
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Music Status Changed Successfully..!</div>");
    }
    
    public function deleteCategory($value = '')
    {
        
        $cat_id   = $this->input->post('cat_id');
       
        
         $result = $this->db->where(array('category_id' => $cat_id))->delete('category');
        if ($result == 1) {
            echo "success";
            $this->db->update('music',array('category_id'=>null),array('category_id'=>$cat_id));
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Category Deleted Successfully..!</div>");
            
        }
        
         $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Category Deleted Successfully..!</div>");
        echo "success";
    }
   
   
   
    
    public function musics()
    {
        $category_id = $this->input->get('category');
       
        $playlist_id   = $this->input->get('playlist');
        $result=array();
        
        $result['categories'] = $this->db->select('category_id,category_name')->get( 'category')->result();
        
        
            $this->db->select('music.*,concat("uploads/music/",music_file) as music_file,concat("uploads/music/image/",music_image) as music_image,category_name');
            
            $this->db->join('category','music.category_id = category.category_id','left');
           
        if($playlist_id !='' && $playlist_id!=0){
            $this->db->join('user_playlist_music','user_playlist_music.music_id = music.music_id','left');
            $this->db->where('user_playlist_music.user_playlist_id',$playlist_id);
            
        }    
        if($category_id !='' && $category_id !=0)  
        {   
        
            $this->db->where('music.category_id',$category_id);
        }
         
            $this->db->order_by('created_date','desc');
        $query = $this->db->get('music');
        $result['musics'] = $query->result();
         foreach ($result['musics'] as $value) {
            
             $value->likes = $this->likecount('music',$value->music_id);
         }
         $result['page']='music';
         $this->load->view('music', $result);
    }
    
    public function likeCount($like_type='',$id=0){
        
        if($like_type!='' && $id!=0)
            return $db_result = $this->db->get_where('liked',array('like_type' => ucfirst($like_type), 'like_type_id' => $id))->num_rows();
        else
            return 0;
            
            
    }
    
    
    public function uploadMusic()
    {
        $result['categories'] = $this->db->select('category_id,category_name')->get( 'category')->result();
        
        $result['page']='upload_music';
        
        $this->load->view('uploadMusic', $result);
    }
    
    public function upload_process()
    {   
        
        $data=$this->input->post();
        $data['music_duration'] = ltrim(ltrim(gmdate("H:i:s", $data['music_duration']),'0'),':');
        
        $extension = pathinfo($_FILES['music_file']['name'], PATHINFO_EXTENSION);
       
        $file_name = preg_replace('/[^a-zA-Z0-9]/', '_', $data['music_title']) . '_'.date("YmdHis").'.' . $extension;
        
        move_uploaded_file($_FILES['music_file']['tmp_name'],'uploads/music/'.$file_name); 
        
        $data['music_file'] = $file_name;
        
        $image_ext = pathinfo($_FILES['music_image']['name'], PATHINFO_EXTENSION);
        
        $config1['upload_path']   = './uploads/music/image';
        $config1['allowed_types'] = 'jpg|png|jpeg';
        $config1['overwrite']     = TRUE;
        $config1['file_name']     = preg_replace('/[^a-zA-Z]/', '_', $data['music_title']) .'_'.date('Ymdhis') . '.'. $image_ext;
        
        $this->upload->initialize($config1);
        $this->upload->do_upload('music_image');
        $dataInfo1 = $this->upload->data();
        $data['music_image'] = $dataInfo1['file_name'];
        
        
        $data['music_status']  = 'ENABLE';
        $data['music_size']    = round($_FILES['music_file']['size'] / 1048576, 2) . " MB";
       
        $data['created_date'] = date('Y-m-d H:i:s');
        
        $result = $this->db->insert('music', $data);
        
        if ($result)
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Music Uploaded Successfully..!</div>");
        
        else
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-danger background-danger'>Something wrong, Try again..!</div>");
            
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Music Uploaded Successfully..!</div>");
        redirect('admin/uploadMusic');
    }
    
    public function deleteMusic($value = '')
    {
        
        $music_id = $this->input->post('music_id');
        
        $result = $this->db->where(array('music_id' => $music_id))->delete('music');
        if ($result == 1) {
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Music Deleted Successfully..!</div>");
            
            echo "success";
        }
        else{
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Try again..!</div>");
        }
       
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Music Deleted Successfully..!</div>");
        echo "success";
    }
    
    
    
    public function changeBannerStatus()
    {
        
        $this->input->post('status') == "ENABLE" ? $status = "DISABLE" : $status = "ENABLE";
        
       
        $this->db->update('banner_slider',array('banner_slider_status' => $status),array('banner_slider_id' =>$this->input->post('id')));
        
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Banner Status Changed Successfully..!</div>");
    }
    
    
    
   

    
    public function users()
    {
        $result['users'] = $this->db->select('*')->order_by('created_date','desc')->get('user')->result();
        foreach($result['users'] as $user){
            
            $user->playlists = $this->db->select('user_playlist_id,user_playlist_name')->where('user_id',$user->user_id)->get('user_playlist')->result();
             foreach($user->playlists as $playlists){
                $playlists->playlist_music_count = $this->db->select('user_playlist_music_id')->where(array('user_id'=>$user->user_id,'user_playlist_id'=>$playlists->user_playlist_id))->get('user_playlist_music')->num_rows();
                 
             }
        }
        $result['page']='user';

        $this->load->view('user', $result);
    }
    
    
    
    
    
    public function settings()
    {   
        $type = $this->input->get('type');
        $result =array();
        $result['page']='settings';

        $result['settings_type'] = $type;
        switch ($type)
        {
            case 'ads':
            case 'notification':
                
                $result['settings_row']=$this->db->select('*')->get('settings')->row_array();
                $this->load->view($type.'_settings', $result); 
                break;
            
           
            case 'apphomescreen':
            default:
            
                $result['home_components'] = $this->db->select('*')->order_by('home_components_order','ASC')->order_by('created_date','desc')->get('home_components')->result();
               
             
            $this->load->view('home_components', $result);
             break;   
        }
       
    }
    public function editsettings($type='')
    {
        $data   = $this->input->post();
        $this->db->update('settings', $data );
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>$type settings Value Edited Successfully..!</div>");
        
        redirect('admin/settings?type='.$type);
    }
    
    public function changeSettingStatus($value = '')
    {
        
        $this->input->post('settings_flag_value') == "ENABLE" ? $status = "DISABLE" : $status = "ENABLE";
       
        $result = $this->db->update('ads_settings',array('settings_flag_value'=>$status),array('settings_flag_id'=>$this->input->post('settings_flag_id')));
        
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Settings Status Changed Successfully..!</div>");
    }
    
   
    
    public function changeComponentStatus($value = '')
    {
        
        $data = $this->input->post();
       
        $where  = array(
            'home_components_id' => $this->input->post('home_components_id')
        );
        
        $result = $this->db->update('home_components',$data,$where);
        
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Status Changed Successfully..!</div>");
        
    }
    
    
    
    public function editHomeComponent($value = '')
    {
        
        $id   = $this->input->post('id');
        $data = array(
            'home_components_description' => $this->input->post('edit_description'),
            'home_components_item_display_count' => $this->input->post('value'),
            'home_components_order' => $this->input->post('edit_order'),
            '   home_components_item_display_count'=>$this->input->post('display_count')
        );
       
        $this->db->update('home_components', $data,array(
            'home_components_id' => $id
        ));
       
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Home Component Data Edited Successfully..!</div>");
        
        redirect('admin/settings?type=apphomescreen');
    }
    
    
    
    public function sendNotification()
    {   
        $result['page']='send_notification';

        $this->load->view('send_notification',$result);
    }
    
    public function send_noti_process()
    {
        
        $categories = $this->input->post('categories');
        $title      = $this->input->post('title');
        $message    = $this->input->post('message');
        
        
        $url           = 'https://fcm.googleapis.com/fcm/send';
        $reg_ids_array = $this->db->select('distinct(user_token)')->where(array(
            'TRIM(user_token)!=' => '' ))->get('user')->result();
        $tokens        = array();
        if (!empty($reg_ids_array)) {
            foreach ($reg_ids_array as $value) {
                $tokens[] = $value->user_token;
            }
        }
        $fields = array(
            'registration_ids' => $tokens,
            
            'notification' => array(
                "title" => $title,
                
                "text" => $message
            ),
            "data" => array(
                "title" => $title,
                "message" => $message
            )
        );
        if ($name = $_FILES['not_image']['name']) {
            
            $config['upload_path']   = './assets/images/notification';
            $config['allowed_types'] = 'jpg|png';
            $config['overwrite']     = TRUE;
            $config['file_name']     = strtolower($_FILES['not_image']['name']);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('not_image')) {
                $fields['data']['image'] = base_url() . "assets/images/notification/" . $config['file_name'];
            }
           
        }
        $fields  = json_encode($fields);
        $headers = array(
            'Authorization: key=' .$this->db->select('settings_value')->where(array(
                'settings_name' => 'API Key'
            ))->get('notification_settings')->row()->settings_value,
            'Content-Type: application/json'
        );
        $ch      = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($ch);
    //   print_r($result);
       
        curl_close($ch);
        
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Notification Send Successfully..!</div>");
    //   die;
        redirect('admin/sendNotification');
        
    }
    
    
    public function addNotificationSettings($value = '')
    {
        /*
        $id   = $this->input->post('id');
        $data = array(
            'settings_name' => trim($this->input->post('name')),
            '    settings_value' => trim($this->input->post('value')),
            'settings_status' => "ENABLE",
            'last_updated'=>date('Y-m-d H:i:s')
        );
        $this->db->insert('notification_settings', $data);
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Notification Send Successfully..!</div>");
        
        redirect('admin/settings?type=notification');
    }
    
    public function editNotificationSettings($value = '')
    {
        /*
        $id   = $this->input->post('id');
        $data = array(
            'settings_value' => $this->input->post('value'),
            'last_updated'=>date('Y-m-d H:i:s')
        );
        $this->db->update('notification_settings', $data,array(
            'notification_id' => $id
        ));
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Notification Settings Data Changed Successfully..!</div>");
        
        redirect('admin/settings?type=notification');
    }
    
    
    
    public function change_password()
    {
        $result['page']='change_password';

        $this->load->view('change_password',$result);
    }
    
    public function changePassProcess()
    {
        /*
       $where = array(
            'admin_id' => $this->input->post('admin_id')
        );
        $data  = array(
            'admin_password' => md5($this->input->post('password'))
        );
        
        $this->db->update('admin',$data,$where);
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Admin Password Changed Successfully..!</div>");
        redirect('admin');
        
    }
    
    public function apiList()
    {
        $result = array();
        $result['apis']=$this->db->get('api_list')->result();
        foreach($result['apis'] as $apis){
            $apis->parameters = $this->db->where('api_list_id',$apis->api_id)->get('api_list_parameters')->result();
        }
        // $result['apis']=array();
        $result['page']='api_list';

        $this->load->view('api_list', $result);
    }
    
    public function logout($value = '')
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    
}
