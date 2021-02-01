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
        
    }
 
    public function index()
    {
        $result['user_count']         = $this->db->get('user')->num_rows() ;
        $result['music_count']         = $this->db->get('music')->num_rows() ;
        $result['category_count']         = $this->db->get('artist')->num_rows() ;
        // $result['like_count']         = $this->db->get('album')->num_rows() ;
        
        $result['current_month_user_count']         = $this->db->get('user')->num_rows() ;
        $result['current_month_music_count']         = $this->db->get('music')->num_rows() ;
        $result['current_month_category_count']         = $this->db->get('category')->num_rows() ;
        // $result['current_month_album_count']         = $this->db->get('album')->num_rows() ;
        
        /*
        $result['current_month_user_count']         = $this->db->get_where('user','MONTH(created_date) = MONTH(CURRENT_DATE())')->num_rows() ;
        $result['current_month_music_count']         =  $this->db->get_where('music','MONTH(created_date) = MONTH(CURRENT_DATE())')->num_rows() ;
        $result['current_month_artist_count']         =  $this->db->get_where('artist','MONTH(created_date) = MONTH(CURRENT_DATE())')->num_rows() ;
        $result['current_month_album_count']         =  $this->db->get_where('album','MONTH(created_date) = MONTH(CURRENT_DATE())')->num_rows() ;
        */
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
        
        $this->load->view('index', $result);
    }
    
    
    
    public function category()
    {
        $result             = array();
        // $result['category'] = $this->db->select('c.*, p.category_name parent_category_name')->join('category p','c.parent_category_id = p.category_id','left')->order_by('c.created_date','desc')->get('category c')->result();
        $result['category'] = $this->db->select('*,concat("uploads/category/icon/",category_icon) as category_icon')->get('category')->result();;
        foreach ($result['category'] as $category) {
            ($category->category_status == "ENABLE") ? $category->status_class = "btn-success" : $category->status_class = "btn-danger";
            $category->musics =  $this->db->get_where('music',array('category_id' => $category->category_id))->num_rows() ;
            
        }
        
        $this->load->view('category', $result);
    }
    
    public function addCategory()
    {
        /*
        $data = array(
                'category_name' => $this->input->post('category_name'),
                'parent_category_id' => $this->input->post('parent_category'),
                
                'category_status' => 'ENABLE',
                'created_date'=>date('Y-m-d H:i:s')
            );
       
        $this->db->insert('category',$data);
        
        $category_id = $this->db->insert_id();
        
        if($category_id){
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Category Added Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        }
        else{
           $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-danger background-danger'>Something get wrong, try again..!</div>"); 
        }
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Category Added Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        redirect('admin/category');
    }
    
    
    public function editCategory()
    {   
        /*
        $id   = $this->input->post('id');
        $data = array(
            'category_name' => $this->input->post('category_name'),
            'parent_category_id' => $this->input->post('parent_category')
        );
        
        $this->db->update('category', $data ,array('category_id' => $id
        ));
        
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Category Data Updated Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
        redirect('admin/category');
    }
    
    public function changeCategoryStatus($value = '')
    {
        /*
        $this->input->post('status') == "ENABLE" ? $status = "DISABLE" : $status = "ENABLE";
        
        $where  = array(
            'category_id' => $this->input->post('id')
        );
        $data   = array(
            'category_status' => $status
        );
        $result = $this->db->update('category', $data,$where);
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Category Status Changed Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
    }
    
    public function changeMusicStatus($value = '')
    {
        /*
        $this->input->post('status') == "ENABLE" ? $status = "DISABLE" : $status = "ENABLE";
        
        $where  = array(
            'music_id' => $this->input->post('id')
        );
        $data   = array(
            'music_status' => $status
        );
        $result = $this->db->update('music', $data,$where);
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Music Status Changed Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
    }
    
    public function deleteCategory($value = '')
    {
        /*
        $cat_id   = $this->input->post('cat_id');
       
        
         $result = $this->db->where(array('category_id' => $cat_id))->delete('category');
        if ($result == 1) {
            echo "success";
            $this->db->update('music',array('category_id'=>null),array('category_id'=>$cat_id));
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Category Deleted Successfully..!</div>");
            
        }
        */
         $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Category Deleted Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        echo "success";
    }
    
    public function list($type)
    {   
        
        $result           = array();
        $result[$type] = $result = $this->db->select("*,concat('uploads/$type/',".$type."_image) as ".$type."_image")->order_by('created_date','DESC')->get("$type")->result();
         
        foreach ($result[$type] as $obj) {
            $id_type  = $type.'_id';
            
            $obj->musics = $this->db->get_where('music',array($id_type =>$obj->$id_type))->num_rows() ;
            $obj->likes = $this->likecount($type,$obj->$id_type);
            
        }
        if($type == 'album'){
            foreach($result[$type] as $album){
                $name =  $this->db->get_where('artist',array('artist_id'=>$album->artist_id))->row();
                
                 $album->artist_name = (!empty($name->artist_name) ? $name->artist_name : ''); 
                
            }
            $result['artists'] = $this->db->select('artist_id,artist_name')->get('artist')->result();
        }
        
        $this->load->view("$type", $result);
    }
    
    public function addListItem($type)
    {
        /*
        $input_data = $this->input->post(NULL, TRUE);
        
        $type_image = $type.'_image';
        $input_data[$type.'_status'] = 'ENABLE';
        $input_data['created_date'] = date('Y-m-d H:i:s');
        
        $config['upload_path']   = './uploads/'.$type;
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite']     = TRUE;
        
        $config['file_name']     = preg_replace("/[^a-z]+/", "", strtolower($input_data[$type.'_name'])).'_'.date('Ymdhis') . '.' . pathinfo($_FILES[$type_image]['name'], PATHINFO_EXTENSION);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload($type_image)) {
            $data = $this->upload->data();
            
            $input_data[$type_image] = $data['file_name'];
            $this->db->insert($type, $input_data);
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>".ucfirst($type)." Added Successfully..!</div>");
        }
        else{
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-danger background-danger'>Something went wrong, try again..!</div>");
        }
        
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Item Added Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
        redirect('admin/list/'.$type);
    }
    
    
    public function editListItem($type)
    {
        /*
        $id   = $this->input->post($type.'_id');
        $input_data = $this->input->post(NULL, TRUE);
        
        $type_id = $type.'_id';
        $type_image = $type.'_image';
        
        
        
        if (!empty($_FILES[$type_image])) {
            $config['upload_path']   = './uploads/'.$type;
            $config['allowed_types'] = 'jpg|png';
            $config['overwrite']     = TRUE;
            
            $config['file_name']     = preg_replace("/[^a-z]+/", "", strtolower($input_data[$type.'_name'])).'_'.date('Ymdhis') . '.' . pathinfo($_FILES[$type_image]['name'], PATHINFO_EXTENSION);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload($type_image)) {
                $data = $this->upload->data();
                
                $input_data[$type_image] = $data['file_name'];
            }
        }
        
        $this->db->update($type,$input_data,array($type_id=>$input_data[$type.'_id']));
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Item Data Updated Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
        redirect('admin/list/'.$type);
    }
    
    
    
    public function changeListStatus($type)
    {
        /*
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
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Item Status Changed Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
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
        $result['artists']   = $this->db->select('artist_id,artist_name')->get( 'artist')->result();
        $result['albums']   = $this->db->select('album_id,album_name')->get( 'album')->result();
        $result['movies']   = $this->db->select('movie_id,movie_name')->get( 'movie')->result();
        
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
            
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Music Uploaded Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        redirect('admin/uploadMusic');
    }
    
    public function deleteMusic($value = '')
    {
        /*
        $music_id = $this->input->post('music_id');
        
        $result = $this->db->where(array('music_id' => $music_id))->delete('music');
        if ($result == 1) {
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Music Deleted Successfully..!</div>");
            
            echo "success";
        }
        else{
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Try again..!</div>");
        }
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Music Deleted Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        echo "success";
    }
    
    
    public function bannerSlider()
    {
        $result            = array();
        $result['banners'] = $this->db->select('*,CONCAT("uploads/banner/", banner_slider_image) as banner_slider_image')->get('banner_slider')->result();
        
        $this->load->view('banner_slider', $result);
        
    }
    
    public function banner($action='view',$id=0)
    {
         $result            = array();
         $result['action'] = $action;
         $result['banner'] = $this->db->select('*,CONCAT("uploads/banner/", banner_slider_image) as banner_slider_image')->where(array('banner_slider_id'=>$id))->order_by('banner_slider_order','ASC')->get('banner_slider')->row();
         
         $this->load->view('banner', $result);
    }
    
    public function changeBannerStatus()
    {
        /*
        $this->input->post('status') == "ENABLE" ? $status = "DISABLE" : $status = "ENABLE";
        
       
        $this->db->update('banner_slider',array('banner_slider_status' => $status),array('banner_slider_id' =>$this->input->post('id')));
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Banner Status Changed Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
    }
    
    
    public function banner_process()
    {
        /*
        $id   = $this->input->post('banner_slider_id');
        $data = $this->input->post();
        
        ( isset($data['banner_slider_status']) && $data['banner_slider_status'] == 'on' )  ? $data['banner_slider_status'] = 'ENABLE' : $data['banner_slider_status'] ='DISABLE' ;
       
        
        
        if (($_FILES['banner_slider_image']['name'] != '')) {
            $extension = pathinfo($_FILES['banner_slider_image']['name'], PATHINFO_EXTENSION);
       
            $file_name = preg_replace('/[^a-zA-Z0-9]/', '_', $data['banner_slider_name']) . '_'.date("YmdHis").'.' . $extension;
            $config['upload_path']   = './uploads/banner';
            $config['allowed_types'] = 'jpg|png';
            $config['file_name']     = $file_name;
            
            $this->upload->initialize($config);
            if ($this->upload->do_upload('banner_slider_image')) {
                $data1 = $this->upload->data();
                $data['banner_slider_image'] = $data1['file_name'];
            }
            
            
        }
       
        
        if(!isset($id) || ($id==0 )){
            $data['created_date']  = date('Y-m-d H:i:s');
            $this->db->insert('banner_slider', $data);
        
        }
        else{
            $this->db->update('banner_slider',$data,array('banner_slider_id' => $id));
        }
        
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Banner Data Saved Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
        redirect('admin/bannerSlider');
    }
    
    public function deleteBanner($value = '')
    {
        /*
         $banner_id = $this->input->post('banner_id');
        
        $result = $this->db->where(array('banner_slider_id' => $banner_id))->delete('banner_slider');
        
        if ($result == 1) {
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Banner Deleted Successfully..!</div>");
            
            echo "success";
        }
        */
         $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Banner Deleted Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
            
            echo "success";
        
    }
    
    public function users()
    {
        $result['users'] = $this->db->select('*,concat("uploads/user/",user_profile_pic) as user_profile_pic')->order_by('created_date','desc')->get('user')->result();
        foreach($result['users'] as $user){
            $user->package_name = $this->db->select('package_name')->where('package_id',$user->user_package_id)->get('package_settings')->row()->package_name;
            $user->playlists = $this->db->select('user_playlist_id,user_playlist_name')->where('user_id',$user->user_id)->get('user_playlist')->result();
             foreach($user->playlists as $playlists){
                $playlists->playlist_music_count = $this->db->select('user_playlist_music_id')->where(array('user_id'=>$user->user_id,'user_playlist_id'=>$playlists->user_playlist_id))->get('user_playlist_music')->num_rows();
                 
             }
        }
        $this->load->view('user', $result);
    }
    
    public function userPayments($id=0){
         $result['all_payments'] =array();
         $result['user_name'] ='';
         /*
        if($id != 0){
            $result['user_name'] = $this->db->select('user_id,user_name')->where('user_id',$id)->get('user')->row()->user_id;
            $result['all_payments'] = $this->db->select('user_payment.*,package_settings.package_name')->join('package_settings','package_settings.package_id=user_payment.package_id')->where('user_id',$id)->order_by('created_date','desc')->get('user_payment')->result();
        }*/
        $this->load->view('payments',$result);
        
    }
    
    
    
    public function settings()
    {   
        $type = $this->input->get('type');
        $result =array();
        $result['settings_type'] = $type;
        switch ($type)
        {
            case 'ads':
            case 'package':
            case 'notification':
                $result['settings_status'] = $this->db->select('*')->where('settings_flag_name',ucfirst($type))->get('settings_flag')->row();
                $result[$type.'_settings']=$this->db->select('*')->get($type.'_settings')->result();
                $this->load->view($type.'_settings', $result); 
                break;
            case 'payments' :
                $result             = array();
                $result['payments'] = $this->db->get('payment_method')->result();
                foreach ($result['payments'] as $payment) {
                    ($payment->payment_method_status == "ENABLE") ? $payment->status_class = "btn-success" : $payment->status_class = "btn-danger";
                
                }
                $this->load->view('payment_method', $result);
         break;
           
            case 'apphomescreen':
            default:
                $result             = array();
                $result['home_components'] = $this->db->select('*')->order_by('home_components_order','ASC')->order_by('created_date','desc')->get('home_components')->result();
               
             
            $this->load->view('home_components', $result);
             break;   
        }
       
    }
    
    public function changeSettingStatus($value = '')
    {
        /*
        $this->input->post('settings_flag_value') == "ENABLE" ? $status = "DISABLE" : $status = "ENABLE";
       
        $result = $this->db->update('ads_settings',array('settings_flag_value'=>$status),array('settings_flag_id'=>$this->input->post('settings_flag_id')));
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Settings Status Changed Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
    }
    
    public function changeSettingsFlagStatus($value = '')
    {
        /*
        $result = $this->db->update('settings_flag',array('settings_flag_value'=>$this->input->post('settings_flag_settings')),array('settings_flag_name'=>$this->input->post('name')));
        
        $this->db->update('settings_flag',array('settings_flag_value'=>$this->input->post('settings_flag_settings')),array('settings_flag_name'=>$this->input->post('name')));
        
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Settings Status Changed Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
    }
    
    public function changeSingleSettingStatus($value = '')
    {   
        /*
        $type=$this->input->get('type');
        $data = $this->input->post();
       
        $data[$type.'_status'] == "ENABLE" ? $data[$type.'_status'] = "DISABLE" : $data[$type.'_status'] = "ENABLE";
      
        $result = $this->db->update($type.'_settings',$data,array($type.'_id'=>$data[$type.'_id']));
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Item Settings Status Changed Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
    }
    
    public function changeSettingsNotificationStatus($value = '')
    {
        /*
        $this->input->post('status') == "ENABLE" ? $status = "DISABLE" : $status = "ENABLE";
        $where  = array(
            'notification_id' => $this->input->post('id')
        );
        $data   = array(
            'settings_status' => $status
        );
        $result = $this->db->update('notification_settings', $data,$where);
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Notification Settings Status Changed Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
    }
    
    public function changeComponentStatus($value = '')
    {
        /*
        $data = $this->input->post();
       
        $where  = array(
            'home_components_id' => $this->input->post('home_components_id')
        );
        
        $result = $this->db->update('home_components',$data,$where);
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Status Changed Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
    }
    
    public function addAdsAttirbute($value = '')
    {
        /*
        $data = array(
            'ads_title' => trim($this->input->post('ads_title')),
            'ads_id_value' => trim($this->input->post('ads_id_value')),
            'ads_status' => "ENABLE",
            'last_updated'=>date('Y-m-d H:i:s')
        );
        $ads_row =  $this->db->get_where('ads_settings',array('ads_title'=>$data['ads_title']))->row();
        if(empty($ads_row)){
        $this->db->insert('ads_settings', $data);
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Ads Attribute Added Successfully..!</div>");
        }
        else{
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-danger background-danger'>This Attribute is already added, add other one..!</div>");
        
        }*/
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Ads Attribute Added Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        redirect('admin/settings?type=ads');
    }
    
    
    public function editAdsAttribute($value = '')
    {   
        /*
        $id   = $this->input->post('id');
        $data = array(
            'ads_title' => $this->input->post('name'),
            'ads_id_value' => $this->input->post('value'),
            'last_updated'=>date('Y-m-d H:i:s')
        );
        $this->db->update('ads_settings', $data,array(
            'ads_id' => $id
        ) );
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Ads Attribute Value Edited Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
        redirect('admin/settings?type=ads');
    }
    
    public function editHomeComponent($value = '')
    {
        /*
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
       */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Home Component Data Edited Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
        redirect('admin/settings?type=apphomescreen');
    }
    
    
    public function addPackage($value = '')
    {
        /*
        $data=$this->input->post();
        $data['package_price'] = preg_replace("/[^0-9\.]/", '', $data['package_price']);
        $data['package_status']  = 'ENABLE';
        $data['created_date'] = date('Y-m-d H:i:s');
        
        $package_row =  $this->db->get_where('package_settings',array('package_name'=>$data['package_name']))->row();
        if(empty($package_row)){
        $this->db->insert('package_settings', $data);
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Package Added Successfully..!</div>");
        }
        else{
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-danger background-danger'>This Package Name is already added, add other one..!</div>");
        
        }
        */
         $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Package Added Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
        redirect('admin/settings?type=package');
    }
    
    public function editPackage($value = '')
    {
        /*
        $id   = $this->input->post('id');
        $data = array(
            'package_name' => $this->input->post('package_name'),
            'package_duration' => $this->input->post('package_duration'),
            'package_price' => preg_replace("/[^0-9\.]/", '',$this->input->post('package_price')),
            'package_note' => $this->input->post('package_note')
        );
        $this->db->update( 'package_settings', $data,array(
            'package_id' => $id
        ));
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Package Edited Successfully..!</div>");
        
        redirect('admin/settings?type=package');
    }
    
    public function addPayment()
    {
        /*
        $data = $this->input->post();
        $data['payment_method_status'] = 'ENABLE';
        $data['created_date']=date('Y-m-d H:i:s');
         
        $data1 =  $this->db->select('payment_method_id')->where(array('payment_method_name'=>$data['payment_method_name']))->get('payment_method')->row();
            
       if(empty($data1)){
        $this->db->insert('payment_method',$data);
        
        $payment_id = $this->db->insert_id();
        
        if($payment_id){
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Payment Method Added Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        }
        else{
           $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-danger background-danger'>Something get wrong, try again..!</div>"); 
        }
       }
       else{
            $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-danger background-danger'>This Payment Method is already added, add other one..!</div>");
       }
       */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Payment Method Added Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
      
        redirect('admin/settings?type=payments');
    }
    
    public function editPayment()
    {
        /*
        $id   = $this->input->post('payment_method_id');
        $data = $this->input->post();
        
        
        $this->db->update('payment_method', $data ,array('payment_method_id' => $id));
        
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Payment Method Data Updated Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
        redirect('admin/settings?type=payments');
    }
    
    public function changePaymentStatus($value = '')
    {
        /*
        $this->input->post('status') == "ENABLE" ? $status = "DISABLE" : $status = "ENABLE";
        
        $where  = array(
            'payment_method_id' => $this->input->post('id')
        );
        $data   = array(
            'payment_method_status' => $status
        );
        $result = $this->db->update('payment_method', $data,$where);
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Payment Method Status Changed Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
    }
    
    public function sendNotification()
    {
        $this->load->view('send_notification');
    }
    
    public function send_noti_process()
    {
        
        $categories = $this->input->post('categories');
        $title      = $this->input->post('title');
        $message    = $this->input->post('message');
        
        /*
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
        */
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Notification Send Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
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
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Notification Send Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
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
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Notification Settings Data Changed Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
        
        redirect('admin/settings?type=notification');
    }
    
    
    
    public function change_password()
    {
        $this->load->view('change_password');
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
        $this->session->set_flashdata("flash_msg", "<div id='flash_msg' class='alert alert-success background-success'>Admin Password Changed Successfully..!(Insert/Update/Delete not allowed in Demo)</div>");
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
        $this->load->view('api_list', $result);
    }
    
    public function logout($value = '')
    {
        $this->session->sess_destroy();
        redirect('login');
    }
    
}
