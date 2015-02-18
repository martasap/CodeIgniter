<?php

/**
 * 
 */
class Data_model extends CI_Model {
	

function __construct()
{
	parent::__construct();
	
}


	function getAll($num=5, $start=0) { //z tej nie korzystam w wersji paginowanej
		/*$data = array();
		$q = $this->db->query("SELECT *FROM data");
		if($q->num_rows()>0)
		{
			$data = $q->result();
			return $data;
		}*/
		$this->db->select()->from('data')->order_by('data', 'desc')->limit($num,$start);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	function getDataByID($id)
{
	$query= $this->db->get_where('data', array('id'=>$id));
	return $query->row_array();
}		

function getDataByDate($data){
		$query= $this->db->get_where('data', array('data'=>$data));
	return $query->row_array();
}
	
	
 function liczakt(){
  $query = $this->db->get('data');
  return $query->num_rows();           // return total number of country
 }
 
 
 
 function getakt($limit,$offset){
 	
 	$this->db->order_by('data','desc');
	$this->db->join('users', 'users.id=data.userID', 'left');
  $query = $this->db->get('data',$limit,$offset);
  return $query->result();           // return the country 
 }	
 
 function get_post($id){
 	$this->db->select()->from('data')->where(array('id'=>$id))->order_by('data', 'desc');
	$query=$this->db->get();
	return $query->first_row('array');
 }
 
 function getSearchResults($title, $description =TRUE){
 	$this->db->like('title', $title);
	$this->db->orderby('title');
	$query =$this->db->get('data');
	if($query->num_rows()>0){
		$output='<ul>';
		foreach ($query->result() as $fun){
			if($description){
				$output .= '<li><strong>' . $fun->id . '</strong><br />';
				$output .= $fun->contents . '</li>';
				
			}
			else{
				$output .= '<li>' . $fun->title . '</li>';
			}
		}
		$output .= '</ul>';
		return $output;
	}
	else {
		return '<p> Nie znaleziono wyników </p>';
	}
 }
   function getSubject($search){
        $this->db->select("title");
        $whereCondition = array('title' =>$search);
        $this->db->where($whereCondition);
        $this->db->from('data');
        $query = $this->db->get();
        return $query->result();
    }
       public function get_autocomplete($search_data) {
       //	Select id & domain name from the table 'domain_hosting_info';
        $this->db->select('title');
        $this->db->select('id');
        $this->db->like('title', $search_data);
        return $this->db->get('data', 10);
    }
	   function get_bird($q){
    $this->db->select('title');
    $this->db->like('title', $q);
    $query = $this->db->get('data');
    if($query->num_rows > 0){
      foreach ($query->result_array() as $row){
        $row_set[] = htmlentities(stripslashes($row['title'])); //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
 function entries() {
          $this->db->select('title');
		  $this->db->select('id');
          $this->db->like('title', $this->input->post('queryString'), 'both'); 
          return $this->db->get('data', 10);  
     }
/* function getSearchResults($function_name, $description=TRUE){
 $this->db->like('title', $function_name);
 $this->db->orderby('title', $function_name);
 $query=$this->db->get('functions');
 }*/
}
