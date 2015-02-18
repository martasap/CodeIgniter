<?php class model_login extends CI_Model {
	
	function __construct() {
		parent::__construct();
				$this->load->library('table');
  $this->load->helper('url');
	}
	
function email_exists($email){
	$sql=" SELECT id, email FROM users WHERE email = '{$email}' LIMIT 1";
	$result = $this->db->query($sql);
	$row= $result->row();
	return ($result->num_rows() === 1 && $row->email) ? $row->id : false;
}

function verify_reset_password_code($email, $code)
{
	$sql=" SELECT id, email FROM users WHERE email = '{$email}' LIMIT 1";
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
	//$password=sha1($this->config->item('salt') . $this->input->post('password'));
	$password=md5($this->input->post('password'));
	$sql = " UPDATE users SET password = '{$password}' WHERE email = '{$email}' LIMIT 1";
	$this->db->query($sql);
	if($this->db->affected_rows() ===1){
		return true;
	}
	else{
		return false;
	}
}
}
?>