<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance(); 
 
          
        date_default_timezone_set("Asia/Kolkata");
    }
    
    
    //android code starts
    
    public function signup()
    {   
        $result=array();
        $data=array(
            'user_name' => $this->input->post('user_name'),
            'user_email' => $this->input->post('user_email'),
            'user_password' => $this->input->post('user_password'));
       
         $db_result = $this->db->get_where('user', array('user_email'=>$data['user_email']))->row();
       
        if(empty($db_result))
        {   
            
            $data['created_date']= date("Y-m-d H:i:s");
            $this->db->insert('user',$data);
             
            $user_id=$this->db->insert_id();
            $result = $data;
            $result['message']='Registered Successfully.';
            $result['user_id']=$user_id;
            $result['user_profile_pic']='';
        }
        else
        {
           
            $result['message']='This email is already registered.';

        }
        
        
        echo json_encode($result);
        
    }
    
    public function signin()
    {
        $data=array(
            'user_email' => $this->input->post('user_email'),
            'user_password' => $this->input->post('user_password'),
            );
            
            
       $result=array();
       $result = $this->db->get_where('user', $data)->row();
      
      if(!empty($result)){
             $result->user_profile_pic= 'uploads/user/'.$result->user_profile_pic;
            $result->message  ='Welcome '.$result->user_name;
            
         }
         else{
             $result->message='Incorrect Credentials.';
         }
       
        
        echo json_encode($result);
        
    }
    
    public function ediProfile(){
        $user_id = $this->input->post('user_id');
        $data = array();
        
        (trim($this->input->post('user_name')) !=  '') ? $data['user_name'] = $this->input->post('user_name') : '';
        (trim($this->input->post('user_profile_pic')) !='' ) ? $data['user_profile_pic'] = $this->input->post('user_profile_pic') : '';
        
        if(isset($data['user_profile_pic']) && $data['user_profile_pic'] != ''){
            
            $image = base64_decode($data['user_profile_pic']);
            $image_name = "user_".$user_id."_".date('Y-m-d-H-i-s').".jpg";
            $path = "uploads/user/";
            file_put_contents($path . $image_name, $image);
            
            $data['user_profile_pic'] = $image_name;
        }
        
        $this->db->update('user',$data,array('user_id' => $user_id));
        echo json_encode($this->db->select('*,concat("uploads/user/",user_profile_pic) as user_profile_pic')->where('user_id',$user_id)->get('user')->result());
    }
    
    public function home_components(){
        $user_id = $this->input->post('user_id');
        $result = array();
        if($user_id != '' && $user_id != 0 ){
            $result = $this->db->select('home_components_id,home_components_name,home_components_order,home_components_status')->order_by('home_components_order','ASC')->get('home_components')->result();
            echo json_encode($result);
        }
        else
        {
            echo json_encode($result);
        }

    }
    
    public function music_count($category_id){
        if($category_id!='' && $category_id!=0)
            return $db_result = $this->db->get_where('music',array('category_id' => $category_id, 'music_status' => 'ENABLE'))->num_rows();
        else
            return 0;
    }
    
    public function home(){
        $user_id = trim($this->input->post('user_id'));
        $start =($this->input->post('start') ? $this->input->post('start') : '');
        $end =($this->input->post('end') ? $this->input->post('end') : '');
            
        $is_myProfile = trim($this->input->post('is_myProfile'));
        $home_components=trim(strtolower($this->input->post("home_components_name")));
        $limit =$this->db->get_where('home_components',array('home_components_name' =>$home_components))->row();
        $result =array();
        if($user_id != '' && $user_id != 0 ){
            if(!empty($limit)){
                $limit=$limit->home_components_item_display_count;
                $home_component =str_replace(' ','_',$home_components);
                
                switch ($home_component)
        		{
        		    
        		  case 'banner_slider':
        		      
        		      $result = $this->db->select('category_id,category_name,category_banner_text,CONCAT("uploads/category/banner/", category_banner) as category_banner')->where(array('category_is_in_slider'=>1,'category_status'=>'ENABLE'))->order_by('category_banner_order','ASC')->order_by('created_date','desc')->get('category',$limit)->result();
        		      foreach($result as $row){
        		          $row->music_count = $this->music_count($row->category_id);
        		      }
        		      break;
        		  
        		  case 'category':
                        $result = $this->db->select('category_id,category_name,concat("uploads/category/icon/",category_icon) as category_icon')->where(array('category_status'=>'ENABLE'))->order_by('category_order','ASC')->order_by('created_date','desc')->get('category',$limit)->result();
                        foreach($result as $row){
        		          $row->music_count = $this->music_count($row->category_id);
        		      }
                        
        		      break;  
        		      
        		  case 'top_sounds':
        		      $this->db->select('music.music_id,music.category_id,music.music_title,concat("uploads/music/",music_file) as music_file, concat("uploads/music/image/",music_image) as music_image,music_duration,COUNT(like_type_id) as like_count');
                              $this->db->join('music','music.music_id =liked.like_type_id');
                      if($is_myProfile)   
                               $this->db->where('liked.user_id',$user_id);
                                
                              $this->db->where(array('like_type'=>'Music','music.music_status'=>'ENABLE'));
                              $this->db->group_by('like_type_id');
                              $this->db->order_by('like_count', 'desc');
                              $this->db->order_by('liked.created_date','desc');
                       if($start != '' and $end != '')
                       {
                           $range = $end-$start; 
                       $query=$this->db->get('liked', $range,$start);
                       }
                       else
                       $query=$this->db->get('liked', $limit);
                       $result = $query->result();
                       foreach($result as $music){
                          
                           $music->category_name = ( isset($music->category_id) && ($music->category_id != 0)) ?  ($this->db->select('category_name')->where(array('category_id'=>$music->category_id))->get('category')->row()->category_name) : '' ;
                           
                            $music->is_liked = $this->db->get_where('liked',array('user_id' => $user_id,'like_type'=>'Music','like_type_id'=>$music->music_id))->num_rows() ;
                            $music->is_in_playlist = $this->db->get_where('user_playlist_music',array('user_id' => $user_id,'music_id'=>$music->music_id))->num_rows() ;
                            $music->playCount =$this->db->get_where('recently_view',array('recently_view_type'=>'Music','recently_view_type_id'=>$music->music_id))->num_rows();
                            
                       }        
        		      break;
        		  
        		      
        		  case 'popular_sounds':
        		  case 'recently_played' : 
        		      
                		      $this->db->select('music.music_id,music.category_id,music.music_title,concat("uploads/music/",music_file) as music_file,concat("uploads/music/image/",music_image) as music_image,music_duration, COUNT(recently_view_type_id) as playCount');
                		      $this->db->join('music','music.music_id =recently_view.recently_view_type_id');
                	   if($is_myProfile)   
                	           $this->db->where('recently_view.user_id',$user_id);
                	            
                		      $this->db->where(array('recently_view_type'=>'Music','music.music_status'=>'ENABLE'));
                		      $this->db->group_by('recently_view_type_id');
                		if($home_component == 'popular_sounds')
                		      $this->db->order_by('playCount', 'desc');
                		      $this->db->order_by('recently_view.created_date','desc');
                	   if($start != '' and $end != '')
                	   {
                	       $range = $end-$start; 
            		   $query=$this->db->get('recently_view', $range,$start);
                	   }
            		   else
            		   $query=$this->db->get('recently_view', $limit);
        		      $result = $query->result();
        		       foreach($result as $music){
        		           
        		           $music->category_name = ( isset($music->category_id) && ($music->category_id != 0)) ?  ($this->db->select('category_name')->where(array('category_id'=>$music->category_id))->get('category')->row()->category_name) : '' ;
        		           
        		            $music->is_liked = $this->db->get_where('liked',array('user_id' => $user_id,'like_type'=>'Music','like_type_id'=>$music->music_id))->num_rows() ;
        		            $music->is_in_playlist = $this->db->get_where('user_playlist_music',array('user_id' => $user_id,'music_id'=>$music->music_id))->num_rows() ;
        		            $music->like_count = $this->db->get_where('liked',array('like_type'=>'Music','like_type_id'=>$music->music_id))->num_rows() ;
        		            
        		           
        		       }
        		       
        		      break;
        		      
        		      
        		  case 'popular_albums':
        		      
        		      $this->db->select('album.album_id,album.album_name, concat("uploads/album/",album_image) as album_image,COUNT(recently_view_type_id) as viewCount');
                		      $this->db->join('album','album.album_id =recently_view.recently_view_type_id');
                	   if($is_myProfile)   
                	           $this->db->where('recently_view.user_id',$user_id);
                	            
                		      $this->db->where(array('recently_view_type'=>'Album','album.album_status'=>'ENABLE'));
                		      $this->db->group_by('recently_view_type_id');
                		      $this->db->order_by('viewCount', 'desc');
                		      $this->db->order_by('recently_view.created_date','desc');
                	   if($start != '' and $end != '')
                	   {
                	       $range = $end-$start; 
            		   $query=$this->db->get('recently_view', $range,$start);
                	   }
            		   else
            		   $query=$this->db->get('recently_view', $limit);
        		       $result = $query->result();
        		       foreach($result as $album){
        		            $album->is_liked = $this->db->get_where('liked',array('user_id' => $user_id,'like_type'=>'Album','like_type_id'=>$album->album_id))->num_rows() ;
        		            $album->like_count = $this->db->get_where('liked',array('like_type'=>'Album','like_type_id'=>$album->album_id))->num_rows() ;
        		            $album->music_count = $this->db->get_where('music',array('album_id' => $album->album_id,'music_status'=>'ENABLE'))->num_rows() ;
        		       }
        		      break;
        		      
        		      
        		  
        		     
        		   default : 
        		      $result= array();
        		    }
    		 
    		
            }
        }
        // echo $this->db->last_query();
		  echo json_encode($result);
    }
    
    public function playMusic(){
        $music_id = $this->input->post('music_id');
        $user_id = $this->input->post('user_id');
        $result = array();
        if($music_id !='' && $music_id !=0 && $user_id !='' && $user_id !=0)
        {
        $result = $this->db->select('music.*,concat("uploads/music/",music_file) as music_file, concat("uploads/music/image/",music_image) as music_image,music_duration')->where(array('music.music_status'=>'ENABLE','music_id'=>$music_id))->get('music')->row();
        if(!empty($result)){
            $result->is_in_playlist = $this->db->get_where('user_playlist_music',array('user_id' => $user_id,'music_id'=>$result->music_id))->num_rows() ;
            $result->like_count = $this->likeCount('Music',$result->music_id);
              
            $result->category_name = ( isset($result->category_id) && ($result->category_id != 0)) ?  ($this->db->select('category_name')->where(array('category_id'=>$result->category_id))->get('category')->row()->category_name) : '' ;
              
            $result->is_liked = $this->db->get_where('liked',array('user_id' => $user_id,'like_type'=>'Music','like_type_id'=>$music_id))->num_rows() ;
            
            $data =array('recently_view_type'=>'Music','recently_view_type_id'=>$music_id,'user_id'=>$user_id,'created_date'=>date('Y-m-d H:i:s'));
            $this->db->insert('recently_view',$data);
            }
        }
        // echo $this->db->last_query();
        echo json_encode($result);
        
    }
    
    public function like()
    {   
            $data=array(
                'user_id' => $this->input->post('user_id'),
                'like_type' => $this->input->post('like_type'),
                'like_type_id' => $this->input->post('like_type_id'),
                'like_date' => date('Y-m-d'),
                'created_date' =>date('Y-m-d H:i:s')
              );
            $result= $this->db->get_where('liked',array('user_id' => $data['user_id'],'like_type'=>$data['like_type'],'like_type_id'=>$data['like_type_id']))->result() ;
            if(empty($result)) $this->db->insert('liked',$data); 
            echo json_encode(array());
       
    }
    
    public function unlike()
    {   
         
        $data=array(
            'user_id' => $this->input->post('user_id'),
            'like_type' => $this->input->post('like_type'),
            'like_type_id' => $this->input->post('like_type_id'),
          );
        $result =  $this->db->where($data)->delete('liked'); 
        echo json_encode(array());
            
    }
    
    public function createPlayList(){
        $user_id = $this->input->post('user_id');
        $user_playlist_name = $this->input->post('user_playlist_name');
        
        
         $result= $this->db->get_where('user_playlist',array('user_id' => $user_id,'user_playlist_name'=>$user_playlist_name))->result() ;
        if(empty($result))
        {   
            $data = array(
                'user_id' => $user_id,
                'user_playlist_name'=>$user_playlist_name,
                'created_date'=>date('Y-m-d H:i:s')
                );
            $this->db->insert('user_playlist',$data); 
        }
        echo json_encode(array());
        
 
    }
    
    public function getPlaylists(){
        
        $user_id = $this->input->post('user_id');
        $result = $this->db->select('user_playlist_id,user_playlist_name')->where(array('user_id'=>$user_id))->order_by('created_date','DESC')->get('user_playlist')->result();
       foreach($result as $playlist){
           
           $playlist->music_count = $this->db->select('user_playlist_music.*')->join('music', 'music.music_id=user_playlist_music.music_id')->where(array('user_id'=>$user_id,'user_playlist_id'=>$playlist->user_playlist_id,'music_status'=>'ENABLE'))->get('user_playlist_music')->num_rows();
           
            $playlist->images = $this->db->select('concat("uploads/music/image/",music_image) as music_image')->join('user_playlist_music','user_playlist.user_playlist_id = user_playlist_music.user_playlist_id')->join('music','music.music_id = user_playlist_music.music_id')->where(array('user_playlist_music.user_id'=>$user_id,'user_playlist_music.user_playlist_id'=>$playlist->user_playlist_id,'music_status'=>'ENABLE'))->order_by('rand()')->get('user_playlist',3)->result();
       }
       
        echo json_encode($result);

    }
    
    public function addInPlaylist(){
        $data=array(
            'user_id' => $this->input->post('user_id'),
            'music_id' => $this->input->post('music_id'),
            'user_playlist_id' => $this->input->post('user_playlist_id')
         );
         $result =  $this->db->get_where('user_playlist_music',array('user_id' => $data['user_id'],'music_id' => $data['music_id'],'user_playlist_id' => $data['user_playlist_id']))->result() ;
        if(empty($result))
        {
            $data['created_date']= date("Y-m-d H:i:s");
            $this->db->insert('user_playlist_music',$data); 
        }
        echo json_encode(array()); 
    }
    
    public function removeFromPlaylist(){
        $data=array(
            'user_id' => $this->input->post('user_id'),
            'music_id' => $this->input->post('music_id')
         );
        $result =  $this->db->where($data)->delete('user_playlist_music'); 
        
        echo json_encode(array()); 
    }
    
    public function getPlaylistMusic(){
        $data=array(
            'user_id' => $this->input->post('user_id'),
            'user_playlist_id' => $this->input->post('user_playlist_id')
         );
        $start =($this->input->post('start') ? $this->input->post('start') : 0);
            $end =($this->input->post('end') ? $this->input->post('end') : 10);
        $range = $end-$start;
        
              $this->db->select('music.music_id,music.category_id,music.music_title,concat("uploads/music/",music_file) as music_file, concat("uploads/music/image/",music_image) as music_image,music_duration');
              $this->db->join('music','music.music_id =user_playlist_music.music_id');
              
              $this->db->where(array('user_playlist_music.user_playlist_id'=>$data['user_playlist_id'],'music.music_status'=>'ENABLE'));
             
              $this->db->order_by('user_playlist_music.created_date','desc');
               
              $query=$this->db->get('user_playlist_music', $range,$start);
               
               
               $result = $query->result();
               
                foreach($result as $music){
                    $music->album_name = ( isset($music->album_id) && ($music->album_id != 0)) ?  ($this->db->select('album_name')->where(array('album_id'=>$music->album_id))->get('album')->row()->album_name) : '' ;
                   $music->category_name = ( isset($music->category_id) && ($music->category_id != 0)) ?  ($this->db->select('category_name')->where(array('category_id'=>$music->category_id))->get('category')->row()->category_name) : '' ;
                   $music->movie_name =( isset($music->movie_id) && ($music->movie_id != 0))  ?  ($this->db->select('movie_name')->where(array('movie_id'=>$music->movie_id))->get('movie')->row()->movie_name) : '' ;
                    $music->is_liked = $this->db->get_where('liked',array('user_id' => $data['user_id'],'like_type'=>'Music','like_type_id'=>$music->music_id))->num_rows() ;
                  $music->like_count = $this->likeCount('Music',$music->music_id);
                  $music->playCount =$this->db->get_where('recently_view',array('recently_view_type'=>'Music','recently_view_type_id'=>$music->music_id))->num_rows();
                  $music->is_in_playlist = $this->db->get_where('user_playlist_music',array('user_id' => $data['user_id'],'music_id'=>$music->music_id))->num_rows() ;
                    
            
               }  
         echo json_encode($result);
         
    }
    
    public function deletePlayList(){
        $data=array(
            'user_id' => $this->input->post('user_id'),
            'user_playlist_id' => $this->input->post('user_playlist_id')
         );
         
        $result =  $this->db->where($data)->delete('user_playlist_music'); 
        $result1=  $this->db->where($data)->delete('user_playlist'); 
             echo json_encode(array());
        
    }
    
    public function getPackages(){
        echo json_encode($this->db->select('package_id,package_name,package_duration,concat("$",package_price)  as package_price,concat("$",(package_price * package_duration))  as total_package_price')->where(array('package_status'=>"ENABLE",'package_name !='=>'Free'))->get('package_settings')->result());
        
    }
    
    public function getPaymentMethods(){
        echo json_encode($this->db->select('*')->where('payment_method_status',"ENABLE")->get('payment_method')->result());
        
    }
    
    public function getStripePaymentScreen(){
        
       
        $data['total_package_price'] = $this->input->post('total_package_price');
        $data['package_id'] = $this->input->post('package_id');
        $data['user_id'] = $this->input->post('user_id');
        
        $this->load->view('stripe_payment',$data);
    }
    
    
    
    public function search(){
        $search = trim($this->input->post('search'));
        $user_id = $this->input->post('user_id');
        
        $result = array();
        
       $data1  = $this->db->select('music_id as id,music_title as search_text,music_id,category_id,music_title,concat("uploads/music/",music_file) as music_file,concat("uploads/music/image/",music_image) as music_image,music_duration')->where("music_title like TRIM('%$search%')")->get('music')->result();
       foreach($data1 as $music){
           $music->search_type = 'music';
            $music->playCount =$this->db->get_where('recently_view',array('recently_view_type'=>'Music','recently_view_type_id'=>$music->music_id))->num_rows() ;
            
           $music->category_name = ( isset($music->category_id) && ($music->category_id != 0)) ?  ($this->db->select('category_name')->where(array('category_id'=>$music->category_id))->get('category')->row()->category_name) : '' ;
           
            $music->is_liked = $this->db->get_where('liked',array('user_id' => $user_id,'like_type'=>'Music','like_type_id'=>$music->music_id))->num_rows() ;
            $music->is_in_playlist = $this->db->get_where('user_playlist_music',array('user_id' => $user_id,'music_id'=>$music->music_id))->num_rows() ;
            $music->like_count = $this->db->get_where('liked',array('like_type'=>'Music','like_type_id'=>$music->music_id))->num_rows() ;
            
           array_push($result,$music);
           
       }
       
      
       
        echo json_encode($result);
    }
    
    public function getAllMusics(){
        $user_id = $this->input->post('user_id');
        $start =($this->input->post('start') ? $this->input->post('start') : 0);
        $end =($this->input->post('end') ? $this->input->post('end') : 10);
        
        $range = $end - $start;
                $this->db->select('music_id,category_id,music_title,concat("uploads/music/",music_file) as music_file,concat("uploads/music/image/",music_image) as music_image,music_duration');
                $this->db->where(array('music_status'=>'ENABLE'));
                $this->db->order_by('music.created_date','desc');
            $query=$this->db->get('music', $range,$start);
            
            $result = $query->result();
            
            foreach($result as $music){
                $music->playCount =$this->db->get_where('recently_view',array('recently_view_type'=>'Music','recently_view_type_id'=>$music->music_id))->num_rows() ;
                
               $music->category_name = ( isset($music->category_id) && ($music->category_id != 0)) ?  ($this->db->select('category_name')->where(array('category_id'=>$music->category_id))->get('category')->row()->category_name) : '' ;
               
                $music->is_liked = $this->db->get_where('liked',array('user_id' => $user_id,'like_type'=>'Music','like_type_id'=>$music->music_id))->num_rows() ;
                $music->is_in_playlist = $this->db->get_where('user_playlist_music',array('user_id' => $user_id,'music_id'=>$music->music_id))->num_rows() ;
                $music->like_count = $this->db->get_where('liked',array('like_type'=>'Music','like_type_id'=>$music->music_id))->num_rows() ;
                
               
            }
            
            echo json_encode($result);
    }
    
    public function likeCount($like_type='',$id=0){
        
        if($like_type!='' && $id!=0)
            return $db_result = $this->db->get_where('liked',array('like_type' => $like_type, 'like_type_id' => $id))->num_rows();
        else
            return 0;
    }
    
    
    public function getAllCategories()
    {
            $result = $this->db->select('category_id,category_name,CONCAT("uploads/category/icon/", category_icon) as category_icon')->where(array('category_status'=>'ENABLE'))->order_by('category_order','ASC')->order_by('created_date','desc')->get('category')->result();
                
            foreach($result as $row){
                $row->music_count = $this->db->select('music_id')->where(array('music_status'=>'ENABLE','category_id'=>$row->category_id))->get('music')->num_rows();
            }
            echo json_encode($result);
    }
    
  public function getCategoryMusic(){
        $user_id = $this->input->post('user_id');
        $category_id = $this->input->post('category_id');
        $start =($this->input->post('start') ? $this->input->post('start') : '');
        $end =($this->input->post('end') ? $this->input->post('end') : '');
        $result = array();
        if($user_id !=0 && $user_id !='' && $category_id  !='' && $category_id !=0){
        $result = $this->db->select('*,concat("uploads/music/",music_file) as music_file, concat("uploads/music/image/",music_image) as music_image,music_duration')->where(array(
                'category_id'=>$category_id,'music_status'=>'ENABLE') )->get('music')->result(); 
                
            foreach($result as $music){
                
                    $music->is_liked = $this->db->get_where('liked',array('user_id' => $user_id,'like_type'=>'Music','like_type_id'=>$music->music_id))->num_rows() ;
                    $music->is_in_playlist = $this->db->get_where('user_playlist_music',array('user_id' => $user_id,'music_id'=>$music->music_id))->num_rows() ; 
            }
        }
       
        echo json_encode($result);

  }
  
  public function getAppInfo()
    {
            $result = $this->db->select()->get('settings')->result();
                
           
            echo json_encode($result);
    }
    
  
   function seconds_from_time() {
       $time = $this->input->post('time');
    	list($m, $s) = explode(':', $time);
    	echo round((($m * 60) + $s)*1000);
    }
    
    
}
            