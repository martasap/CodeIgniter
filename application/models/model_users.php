<?php

/**
 * 
 */
class model_users extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	function can_log_in(){
		$this->db->where('email', $this->input->post('email') );
$this->db->where('password', md5($this->input->post('password'))) ;
$query = $this->db->get('users');
if($query->num_rows() == 1)
{
	$data['email']=$this->input->post('email');
		
		$data['password']=$this->input->post('password');
		
		$data['is_logged_in'] = 1;
	$this->session->set_userdata($data);
	return true;
}
else{
return false;	
}
	}
	
	function add_temp_user($key){
	/*	$data=array(
		'email'=> $this->input->post('email'),
		'password'=> md5($this->input->post('password')),
		'key'=> $key
		);*/
		$data['email']=$this->input->post('email');
		$data['password']=md5($this->input->post('password'));
		$data['key']=$key;
		$query = $this->db->insert('temp_users', $data);
		if($query){
			return true;
		}
		else{
			return false;
		}
	}
	
	function is_key_valid($key){
		$this->db->where('key', $key);
		$query= $this->db->get('temp_users');
		if($query->num_rows() == 1){
			return true;
		}
		else {
			return false;
		}
	}
	
	function add_user($key){
		$this->db->where('key', $key);
		$temp_user= $this->db->get('temp_users');
		if($temp_user){
			$row= $temp_user->row();
			$data['email']=$row->email;
			$data['password']=$row->password;
			//$query=$this->db->insert('user',$data);
			$did_add_user=$this->db->insert('users',$data);
		}
		if($did_add_user){
			$this->db->where('key', $key);
			$this->db->delete('temp_users');
			return $data['email'];
		} return false;
	}
	
function email_exists($email){
	$sql=" *SELECT id, email FROM users WHERE email = '{$email}' LIMIT 1";
	$result = $this->db->query($sql);
	$row= $result->row();
	return ($result->num_rows() === 1 && $row->email) ? $row->id : false;
}

function verify_reset_password_code($email, $code)
{
	$sql=" *SELECT id, email FROM users WHERE email = '{$email}' LIMIT 1";
	$result = $this->db->query($sql);
	$row= $result->row();
	if($result->num_rows()==1){
		return($code == md5($this->config->item('salt') . $row->id)) ? true : false;
	}
	else{
		return false;
	}
}
function update_password(){
	$email=$this->input->post('email');
	$password=sha1($this->config->item('salt') . $this->input->post('password'));
	$sql = " *UPDATE users SET password = '{$password}' WHERE email = '{$email} LIMIT 1";
	$this->db->query($sql);
	if($this->db->affected_rows() ===1){
		return true;
	}
	else{
		return false;
	}
}
}
