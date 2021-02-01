<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends CI_Model{
    
	public function select($value='*',$table='',$where=array(),$order_field='',$order_by='',$start=0,$range='',$column='',$like_array=array(),$or_like='')
	{		
	          $this->db->select($value); 
	          if(!empty($where))
		          	 $this->db->where($where);
	          
	      	  if(!empty($like_array))
	      	  {	
	      	  	if($or_like==1)
	      	  		$this->db->or_like($like_array);
	      	  	else
	      	  		$this->db->like($like_array);
	      	  }
	      	  $this->db->order_by($order_field,$order_by);
	      	  if($range)
	      	  	$this->db->limit($range,$start);
	          
	    $query=$this->db->get($table);
	    
	 
	  	if($column && $range==1)
	    {	
	    	return $query->row($column);
	    	exit();
	    }
	    
	    return $query->result();
	}
	
	
	
    public function getBooks($category_id=0,$author_id=0,$start='',$range=''){
	            $this->db->select('book_id,book_title, concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/thumb/"),book_preview) as book_preview,concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/"),book_pdf) as pdf,category_name,author_name');
	            $this->db->join('category','category.category_id = book.category_id');
	            $this->db->join('author','author.author_id = book.author_id');
	            $this->db->where('book_status','ENABLE');
	            
	            if($category_id !=0 )
	            $this->db->where('book.category_id',$category_id);
	            if($author_id !=0 )
	            $this->db->where('book.author_id',$author_id);
	            
	          
	  $result = $this->db->get('book');
 	  
    return $result->result();
	    
	}
	
	public function getFavourite($user_id=0,$start='',$range=''){
	            $this->db->select('book.book_id,book_title, concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/thumb/"),book_preview) as book_preview,concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/"),book_pdf) as pdf,category_name,author_name');
	            $this->db->join('favourite','favourite.book_id = book.book_id');
	            $this->db->join('category','category.category_id = book.category_id');
	            $this->db->join('author','author.author_id = book.author_id');
	           
	            $this->db->where('favourite.user_id',$user_id);
	            $this->db->where('book_status','ENABLE');
	          if($start!='' or $range!='')
	            $this->db->limit($range,$start);
	  $result = $this->db->get('book');
	  
    return $result->result();
	    
	}
	
	public function singleBook($book_id){
	            $this->db->select('book.category_id,category_name,concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/thumb/"),book_preview) as book_preview ,concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/"),book_pdf) as link,book_size,book_pages,author_name');
	            $this->db->join('category','category.category_id = book.category_id');
	            $this->db->join('author','author.author_id = book.author_id');
	            $this->db->where('book_id',$book_id);
	  $result = $this->db->get('book');

    return $result->result();
	    
	}
	
	
	public function getComments($user_id=0,$book_id,$start=0,$range=10){
	            $this->db->select('comment_id,comment,user_name');
	            $this->db->join('user','comment.user_id = user.user_id');
	           
	            if($user_id != 0)
	            $this->db->where('comment.user_id',$user_id);
	            $this->db->limit($range,$start);
	  $result = $this->db->get('comment');

    return $result->result();
	    
	}
	
   public function getContinueRead($user_id=0,$start='',$range=''){
	            $this->db->select('last_read.book_id,book_title, concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/thumb/"),book_preview) as book_preview,concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/"),book_pdf) as pdf,category_name,author_name');
	            $this->db->join('book','last_read.book_id = book.book_id');
	            $this->db->join('category','category.category_id = book.category_id');
	            $this->db->join('author','author.author_id = book.author_id');
	            $this->db->where('book_status','ENABLE');
	            
	            if($user_id !=0 )
	            $this->db->where('last_read.user_id',$user_id);
	            
	            $this->db->order_by('last_read.created_date','desc');
	            
	          if($start!='' or $range!='')
	            $this->db->limit($range,$start);
	  $result = $this->db->get('last_read');
 	 
    return $result->result();
	    
	}

	
	public function countdata($value='*',$table,$where=array())
	{
		$this->db->select($value);
		if(!empty($where))
		{
			$this->db->where($where);
		}
		$count=$this->db->count_all_results($table);
		return $count;
	}

	
	public function update($where=array(),$table='',$data=array())
	{
	    
	     $this->db->where($where);
	     $query=$this->db->update($table,$data);
	     return $this->db->affected_rows();
	}

	public function delete($where=array(),$table='')
	{
	  	 $this->db->where($where);
	     $query=$this->db->delete($table);
	     return $this->db->affected_rows();
	}

	public function insert($table='',$data=array())
	{ 
	    $this->db->insert($table,$data);
	    return $this->db->insert_id();
	
	}

}

