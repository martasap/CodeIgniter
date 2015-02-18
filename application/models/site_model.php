<?php

/**
 * 
 */
class Site_model extends CI_Model {
	
	function getAll($num=5, $start=0) {
		/*$data = array();
		$q = $this->db->query("SELECT *FROM promo");
		if($q->num_rows()>0)
		{
			$data = $q->result();
			return $data;
		}*/
		$this->db->select()->from('promo')->order_by('data', 'desc')->limit($num,$start);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	function getDataByID($id)
{
	$query= $this->db->get_where('promo', array('id'=>$id));
	return $query->row_array();
}	

function liczprom(){
  $query = $this->db->get('promo');
  return $query->num_rows();           // return total number of country
 }
 
 function getprom($limit,$offset){
 	$this->db->order_by('data','desc');
  $query = $this->db->get('promo',$limit,$offset);
  return $query->result();           // return the country 
 }	
  function get_post($id){
 	$this->db->select()->from('promo')->where(array('id'=>$id))->order_by('data', 'desc');
	$query=$this->db->get();
	return $query->first_row('array');
 }
  function entries() {
          $this->db->select('title');
		  $this->db->select('id');
          $this->db->like('title', $this->input->post('queryString'), 'both'); 
          return $this->db->get('promo', 10);  
     }
}
