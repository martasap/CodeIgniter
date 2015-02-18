<?php
/**
 * 
 */
class Email extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
function index() {
	
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->from('tetristologo@gmail.com','Najlepszy Admin' );
$this->email->to('tetristologo@gmail.com' );
$this->email->subject('1mail');
$this->email->message('tresc');

$path = $this->config->item('server_root');
$file = $path . '/stronka/attachments/yourinfo.txt';


$this->email->attach($file);

if($this->email->send())
{
	echo "Yayyyyyyy";
}
else {
	show_error($this->email->print_debugger());
}
	}
}
