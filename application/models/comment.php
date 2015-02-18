<?php

class Comment extends CI_Model{
	function add_comment($data){
		$this->db->insert('comments', $data);
	}
	
	function get_comments($id){
		$this->db->select('comments.*, users.email')->from('comments')->join('users','users.id=comments.userID', 'left')->where('comments.id', $id)->order_by('comments.date_added','asc');
		$query=$this->db->get();
		return $query->result_array();
	}
}






