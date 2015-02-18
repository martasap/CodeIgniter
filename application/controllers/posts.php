<?php
class posts extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	$this->load->model('post');
	}
	
	/*function post($postID){
		$this->load->model('comment');
		$data['comments']=$this->comment->get_comments($id);
		$data['post']=$this->post->get_post($id);
		$this->load->view('post', $data);
			}*/
	
	
}