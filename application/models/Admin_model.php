<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model{
    
	public function select($value='*',$table='',$where=array(),$order_field='',$order_by='',$start=0,$range='',$column='')
	{		
	          $this->db->select($value); 
	          if(!empty($where))
		          	 $this->db->where($where);
	          
	      	  
	      	  $this->db->order_by($order_field,$order_by);
	      	  if($range)
	      	  	$this->db->limit($range,$start);
	          
	    $query=$this->db->get($table);
	    
	  	if($column && $range==1)
	    {	
	    	return $query->row($column);
	    	exit();
	    }
	    // print_r($this->db->last_query());
	    return $query->result();
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

	

	public function getBooks($category_id=0,$author_id=0,$start='',$range=''){
	            $this->db->select('book.*,category_name,concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/thumb/"),book_preview) as book_preview,concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/"),book_pdf) as pdf,author_name');
	            $this->db->join('category','category.category_id = book.category_id');
	            $this->db->join('author','author.author_id = book.author_id');
	            
	            
	            if($category_id !=0 )
	            $this->db->where('book.category_id',$category_id);
	            if($author_id !=0 )
	            $this->db->where('book.author_id',$author_id);
	            
	          if($start!='' or $range!='')
	            $this->db->limit($range,$start);
	  $result = $this->db->get('book');
 	  
    return $result->result();
	    
	}
	

	public function recently_added(){
	            $this->db->select('book.*, concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/thumb/"),book_preview) as book_preview,concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/"),book_pdf) as pdf,category_name,author_name');
	            $this->db->join('category','category.category_id = book.category_id');
	            $this->db->join('author','author.author_id = book.author_id');
	            
	            $this->db->order_by('book.created_date','desc');
	          
	  $result = $this->db->get('book');
 	  
    return $result->result();
	    
	}

	public function most_popular()
	{
			 $this->db->select('book.*,category_name,concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/thumb/"),book_preview) as book_preview,count(last_read.book_id) as book_read,author.author_name');
            $this->db->join('book','book.book_id = last_read.book_id');
            $this->db->join('category','category.category_id = book.category_id');
            $this->db->join('author','author.author_id = book.author_id');
            
            $this->db->group_by('last_read.book_id');
            $this->db->limit(5);
  		$result = $this->db->get('last_read');
   		return $result->result();

   }
   public function most_favourite()
	{
			$this->db->select('book.*,category_name,concat(concat(concat("'.base_url().'assets/book/",replace(category_name," ","_")),"/thumb/"),book_preview) as book_preview,count(favourite.book_id) as book_read,author.author_name');
            $this->db->join('book','book.book_id = favourite.book_id');
            $this->db->join('category','category.category_id = book.category_id');
            $this->db->join('author','author.author_id = book.author_id');
            
            $this->db->group_by('favourite.book_id');
            $this->db->limit(5);
  		$result = $this->db->get('favourite');
   		return $result->result();

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
	//print_r($this->db->last_query());
	}

}

?>