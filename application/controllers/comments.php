<?php

class Comments extends CI_Controller{
	
	function add_comment($id){
		if(!$_POST){
			//echo "Coś nie tak...";
			redirect(base_url() . 'site/post/' .$id);
		}
		$this->load->model('data_model');
		/*$data=array(
		'id'=>$id,
		'is_logged_in'=>$this->session->userdata('is_logged_in'),
		'comment'=>$_POST['comment']
		);*/
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(!$is_logged_in){
			redirect(base_url() . 'site/login');
		}
		$this->load->model('comment');
		$data=array(
		'id'=>$id,
		'userID'=>$this->session->userdata('id'),
		'comment'=>$_POST['comment']
		);
		$this->comment->add_comment($data);
		echo "Takkkkkkkkkkkk";
		redirect('site/post/' .$id);
		
	}
	function add_commentp($id){
		if(!$_POST){
			//echo "Coś nie tak...";
			redirect(base_url() . 'site/promo/' .$id);
		}
		$this->load->model('site_model');
		/*$data=array(
		'id'=>$id,
		'is_logged_in'=>$this->session->userdata('is_logged_in'),
		'comment'=>$_POST['comment']
		);*/
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(! $is_logged_in){
			redirect(base_url() . 'site/login');
		}
		$this->load->model('comment');
		$data=array(
		'id'=>$id,
		'userID'=>$this->session->userdata('id'),
		'comment'=>$_POST['comment']
		);
		$this->comment->add_commentp($data);
		echo "Takkkkkkkkkkkk";
		redirect('site/promo/' .$id);
		
	}
}
