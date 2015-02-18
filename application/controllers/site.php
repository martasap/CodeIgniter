<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Site extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library('table');
  $this->load->helper('url');
	}
	
	function index()
	{
		$this->load->model('data_model');
		$data['rows'] = $this->data_model->getAll();
		$this->load->view('home');
		
	}
	function aktualnosci($start=null)
	{
		$this->load->model('data_model');
		//$this->data_model->getDataByDate($data);
		 $this->load->library('uri');
		//$data['rows'] = $this->data_model->getAll();
		$this->load->library('pagination');
 
  $config['base_url'] = base_url().'site/aktualnosci';   // url of the page
  $config['total_rows'] = $this->data_model->liczakt(); //get total number of records 
  $config['per_page'] = 5;  // define how many records on page
// $config['uri_segment'] = 4;
 $config['next_link'] = '&raquo;';
 $config['prev_link'] = '&laquo;';
 $config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
 $config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
 $config['first_link'] = 'First';
$config['last_link'] = 'Last';
 $config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['full_tag_open'] = '<ul class="pagination">';
$config['full_tag_close'] = '</ul>';   
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>'; 
  $this->pagination->initialize($config);
  $config['pages'] = $this->pagination->create_links();
  //$data['country'] = $this->data_model->getakt(,$offset);
 // $this->load->view('aktualnosci',$data, $config);
  $data['country']=$this->data_model->getAll($config['per_page'], $start);
  $query_array=array(
	'title' => $this->input->get('title'),
	'contents' => $this->input->get('contents')
	);
	/* $search=  $this->input->post('search');
        $query = $this->data_model->getSubject($search);
        echo json_encode ($query);*/
  $this->load->view('aktualnosci', $data, $config);
		//$this->load->view('aktualnosci', $data, $config);
	}
	function filie()
	{
		$this->load->view('filie');
	}
	function kontakt()
	{
		$this->load->view('kontakt');
	}
function promo($id){
		$this->load->model('comment');
		$this->load->model('site_model');
	
	
		$data['comments']=$this->comment->get_comments($id);
		$data['post']=$this->site_model->get_post($id);
		$this->load->helper('form');
		$this->load->view('promo', $data);
			}
	function promocje($start=null)
	{
		$this->load->model('site_model');
		$this->load->library('pagination');
 		$this->load->library('uri');
 
  $config['base_url'] = base_url().'site/promocje';   // url of the page
  $config['total_rows'] = $this->site_model->liczprom(); //get total number of records 
  $config['per_page'] = 5;  // define how many records on page
// $config['uri_segment'] = 4;
$config['next_link'] = ' >> ';
$config['prev_link'] = ' << ';
$config['first_link'] = 'First';
$config['last_link'] = 'Last';
$config['full_tag_open'] = '<p>';
$config['full_tag_close'] = '</p>';
 $config['first_link'] = 'First';
$config['last_link'] = 'Last';
 $config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['full_tag_open'] = '<ul class="pagination">';
$config['full_tag_close'] = '</ul>';   
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>'; 
  $this->pagination->initialize($config);
 
  $data['country'] = $this->site_model->getAll($config['per_page'],$start);
   $query_array=array(
	'title' => $this->input->get('title'),
	'contents' => $this->input->get('contents')
	);
		//$data['rows'] = $this->site_model->getAll();
		$this->load->view('promocje', $data, $config);
	}
	
	function panel()
	{
		$this->load->model('data_model');
		$data['rows'] = $this->data_model->getAll();
		$this->load->view('panel', $data);
	}
	function edytuj($id)
	{
		$row=$this->m->getonerow($id);
		$data['r']=$row;
		$this->load->view('edit', $data);
	}
	
	function zapisz($id)
	{
$data['title']=$this->input->post('title');
//$data['author']=$this->input->post('author');
$data['contents']=$this->input->post('contents');
$res=$this->db->insert('data', $data);
if($res){
	header('location:' .base_url("/site/dodajakt"));
}


	}
	
		function zapiszprom($id)
	{
$data['title']=$this->input->post('title');
$data['author']=$this->input->post('author');
$data['contents']=$this->input->post('contents');
$res=$this->db->insert('promo', $data);
if($res){
	header('location:' .base_url("/site/dodajprom"));
}


	}
	 function address_data()
	{
		$this->load->model('data_model');
     $this->datatables->select("id,author, title, contents")
       
        ->from('data');
     echo $this->datatables->generate();
	}

	function aktualizuj()
	{
		$id=$this->input->post('id');
		$data['title']=$this->input->post('title');
$data['author']=$this->input->post('author');
$data['contents']=$this->input->post('contents');
		$this->db->where('id', $id);
		$this->db->update('data',$data);
		redirect($_SERVER['HTTP_REFERER']); 
		
	}
	
		function aktualizujprom()
	{
		$id=$this->input->post('id');
		$data['title']=$this->input->post('title');
$data['author']=$this->input->post('author');
$data['contents']=$this->input->post('contents');
		$this->db->where('id', $id);
		$this->db->update('promo',$data);
		redirect($_SERVER['HTTP_REFERER']); 
		
	}
	
	function usun($id)
	{
		$id=$this->db->where('id', $id);
		$this->db->delete('data');
		 redirect($_SERVER['HTTP_REFERER']); 
	}
	
		function usunprom($id)
	{
		$id=$this->db->where('id', $id);
		$this->db->delete('promo');
		 redirect($_SERVER['HTTP_REFERER']); 
	}
	
	function dodajakt()
	{
		$this->load->model('data_model');
		$data['rows'] = $this->data_model->getAll($num=5, $start=0);
		$this->load->view('dodajakt', $data);
	}
	
	function post($id){
		$this->load->model('comment');
		$this->load->model('data_model');
	
	
		$data['comments']=$this->comment->get_comments($id);
		$data['post']=$this->data_model->get_post($id);
		$this->load->helper('form');
		$this->load->view('post', $data);
			}
	
	function dodajprom()
	{
		$this->load->model('site_model');
		$data['rows'] = $this->site_model->getAll();
		$this->load->view('dodajprom', $data);
	}

function panelakt($offset=null)
	{
		$this->load->model('data_model');
		$this->load->library('uri');
		//$data['rows'] = $this->data_model->getAll();
		$this->load->library('pagination');
 
  $config['base_url'] = base_url().'site/panelakt';   // url of the page
  $config['total_rows'] = $this->data_model->liczakt(); //get total number of records 
  $config['per_page'] = 5;  // define how many records on page
// $config['uri_segment'] = 4;
 $config['next_link'] = '&raquo;';
 $config['prev_link'] = '&laquo;';
 $config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
 $config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
 $config['first_link'] = 'First';
$config['last_link'] = 'Last';
 $config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['full_tag_open'] = '<ul class="pagination">';
$config['full_tag_close'] = '</ul>';   
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>'; 
  $this->pagination->initialize($config);
  $config['pages'] = $this->pagination->create_links();
  $data['country'] = $this->data_model->getakt($config['per_page'],$offset);
		$this->load->view('panelakt', $data);
	}
	
	function panelprom($offset=null)
	{
		$this->load->model('site_model');
		$this->load->library('uri');
		//$data['rows'] = $this->data_model->getAll();
		$this->load->library('pagination');
 
  $config['base_url'] = base_url().'site/panelprom';   // url of the page
  $config['total_rows'] = $this->site_model->liczprom(); //get total number of records 
  $config['per_page'] = 5;  // define how many records on page
// $config['uri_segment'] = 4;
 $config['next_link'] = '&raquo;';
 $config['prev_link'] = '&laquo;';
 $config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
 $config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
 $config['first_link'] = 'First';
$config['last_link'] = 'Last';
 $config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['full_tag_open'] = '<ul class="pagination">';
$config['full_tag_close'] = '</ul>';   
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>'; 
  $this->pagination->initialize($config);
  $config['pages'] = $this->pagination->create_links();
  $data['country'] = $this->site_model->getprom($config['per_page'],$offset);
		$this->load->view('panelprom', $data);
	}
	function edytujakt($id)
	{
		$this->load->model('data_model');
		
		$data['rows'] = $this->data_model->getDataByID($id);
		$this->load->view('edytujakt', $data);
	}
	
	function edytujprom($id)
	{
		$this->load->model('site_model');
		$data['rows'] = $this->site_model->getDataByID($id);
		$this->load->view('edytujprom', $data);
	}

function login()
	{
$this->load->helper('form');
$this->load->library('form_builder');		
		$this->load->view('login');
	}

function login_validation()
{
	$this->load->library("facebook", array('appID'=>'321900324662010', 'secret'=> '3c1aa586fac94279782e5abd26f2e5b2'));
	$this->user = $this->facebook->getUser();
	if ($this->user) {
       try {
         // Proceed knowing you have a logged in user who's authenticated.
         $this->user = $this->facebook->api('/me');
            $this->logoutUrl = $this->facebook->getLogoutUrl( array("next"=> base_url() . "site/login") );
       } catch (FacebookApiException $e) {
         error_log($e);
         $this->user = null;
       }
        }
        else{
            $this->loginUrl = $this->facebook->getLoginUrl(array('users' => 'email'));
        }
$this->load->helper('form');
$this->load->library('form_builder');	
	$this->load->library('form_validation');
	$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');
	$this->form_validation->set_rules('password', 'Password', 'required|trim');
	if($this->form_validation->run())
	{
		$data['email']=$this->input->post('email');
		$data['password']=$this->input->post('password');
		$data['is_logged_in']=1;
		
		//$data['is_logged_in'] = 1;
		//'password'=> $this->input->post('password')
		
	/*	$data = array(
		'email'=> $this->input->post('email'),
		'is_logged_in' => 1
		);*/
		
		$this->session->set_userdata($data);
		redirect('site/index');
	}
	else {
		
		$this->load->view('login');	
		
	}
	//echo $this->input->post('email');
	//$this->load->view('login_validation');
}

function signup_validation()
{
	$this->load->helper('form');
$this->load->library('form_builder');		
	$this->load->library('form_validation');
	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
	$this->form_validation->set_rules('password', 'Password', 'required|trim');
	$this->form_validation->set_rules('cpassword', 'PotwierdzPass', 'required|trim|matches[password]');
	$this->form_validation->set_message('is_unique', "Konto o podanym adresie e-mail już istnieje");
	if($this->form_validation->run())
	{
		//$data['email']=$this->input->post('email');
		
		
		//$data['is_logged_in'] = 1;
		//'password'=> $this->input->post('password')
		$key = md5(uniqid());
		/*$this->load->library('email', array('mailtype' => 'html'));
		$this->email->from('tetristologo@gmail.com', "Admin");
		$this->email->to('tetristologo@gmail.com');
		$this->email->subject("Rejestracja w VVintage");
		$message ="<p> Dziękujemy za zarejestrowanie się w VVintage!<p>";
		$message .="<p><a href = '".base_url(). "site/register_user/$key'>Kliknij</a>, by potwierdzić konto</p> ";
		
		$this->email->message($message);*/
		$config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'tetristologo@gmail.com',
    'smtp_pass' => 'tetris123',
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);
		$this->load->library('email', $config);
		$this->load->model('model_users');
		$this->email->set_newline("\r\n");
		$this->email->from('tetristologo@gmail.com', "Admin");
		$this->email->to($this->input->post('email'));
		$this->email->subject("Rejestracja w VVintage");
		$message ="<p> Dziękujemy za zarejestrowanie się w VVintage!<p>";
		$message .="<p><a href = '".base_url(). "site/register_user/$key'>Kliknij</a>, by potwierdzić konto</p> ";
		
		$this->email->message($message);
	//	$this->email->send();
		//echo $this->email->print_debugger();
		if($this->model_users->add_temp_user($key)){
			if($this->email->send()){
			$this->load->view('wyslano');	; 
		}
else echo "Nie można wysłać maila";

		} else echo "Problem z dodaniem do bazy";
		

	}
	else {
		
		$this->load->view('signup');
		
	}
	//echo $this->input->post('email');
	//$this->load->view('login_validation');
}


function add_comment($postID){
		if(!$_POST){
			redirect(base_url() . 'site/post' .$id);
		}
		/*$data['is_logged_in']=1;
		$this->session->set_userdata($data);*/
		$is_logged_in=$this->session->userdata('is_logged_in');
		if(!is_logged_in){
			redirect(base_url() . 'site/login');
		}
		$this->load->model('comment');
		$data=array(
		'id'=>$id,
		'id'=>$this->session->userdata('id'),
		'comment'=>$_POST['comment']
		);
		$this->comment->add_comment($data);
		redirect(base_url(). 'site/post/'. $id);
	}
	
	/*function ajaxsearch(){
				$this->load->model('data_model');
				$szukane=$this->input->post('title');
		$description = $this->input->post('description');
		echo $this->data_model->getSearchResults($title, $description);
	}
	function search(){
		$this->load->model('data_model');
		$szukane=$this->input->post('title');
		$data['extraHeadContent']='<script type="text/javascript" src="' . base_url() . '/stronka/assets/js/function_search.js"></script>';
		$data['search_results']=$this->data_model->getSearchResults($title);
	$this->load->view('aktualnosci', $data);	
	}*/
function members(){
	if($this->session->userdata('is_logged_in'))
	{
		$this->load->view('members');
	}
	else{
		redirect('site/restricted');
	}
}
function restricted()
	{
		$this->load->view('restricted');
	}
function validate_credentials(){
	$this->load->model('model_users');
	if($this->model_users->can_log_in()){
		return true;
	}
	else {
		$this->form_validation->set_message('validate_credentials', 'Incorrect username/password');
	return false;
	}
}

function signup(){
	$this->load->helper('form');
$this->load->library('form_builder');		
	$this->load->view('signup');
}

function forgot(){
	$this->load->view('forgot');
}

function logout(){
	$this->session->sess_destroy();
	redirect('site/login');
}

function register_user($key){
$this->load->model('model_users');
if($this->model_users->is_key_valid($key)){
	if($newemail=$this->model_users->add_user($key)){
		$data['email']=$email;
		$data['is_logged_in']=1;
		$this->session->set_userdata($data);
		redirect('site/members');
	}
	else echo "Nie udało się dodać do bazy. Spróbuj ponownie.";
}
else {
	echo "invalid key";
}
}

function wyslij($email, $id)
{
	//$email = trim($this->input->post('email'));
		//$this->load->model('model_login');
		//$result = $this->model_login->email_exists($email);
		
		$config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'tetristologo@gmail.com',
    'smtp_pass' => 'tetris123',
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);
		$this->load->library('email', $config);
		$email_code = md5($this->config->item('salt') . $id);
		
		$this->email->set_newline("\r\n");
		$this->email->from('tetristologo@gmail.com', "Admin");
		$this->email->to($this->input->post('email'));
		$this->email->subject("Reset hasła w VVintage");
		/*$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1=strict.dtd"><html>
<meta http-equiv "Content-Type" content="text/html; charset-utf-8" />
</head><body>';*/
		$message ="<p> Wysłana została prośba o zresetowanie hasła. <p>";
		$message .='<p><strong><a href = "'.base_url(). 'site/reset_password_form/' . $email . '/' .
		$email_code .'" >Kliknij</a></strong>, by zresetować hasło</p> ';
		
		$this->email->message($message);
		if($this->email->send()){
			echo "Mail został wysłany!";
		}
else echo "Nie można wysłać maila";

}
function forgot_validation()
{
	if(isset($_POST['email']) && !empty($_POST['email'])){
	$this->load->library('form_validation');
		$this->load->model('model_login');
	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|xss_clean');
	
	if($this->form_validation->run() == false)
	{
		$this->load->view('login', array('error' => "Wpisz poprawny email"));
		}
	else{
		$email=trim($this->input->post('email'));
		$result = $this->model_login->email_exists($email);
		//$data['email']=$this->input->post('email');
		
		
		//$data['is_logged_in'] = 1;
		//'password'=> $this->input->post('password')
		//$key = md5(uniqid());
		/*$this->load->library('email', array('mailtype' => 'html'));
		$this->email->from('tetristologo@gmail.com', "Admin");
		$this->email->to('tetristologo@gmail.com');
		$this->email->subject("Rejestracja w VVintage");
		$message ="<p> Dziękujemy za zarejestrowanie się w VVintage!<p>";
		$message .="<p><a href = '".base_url(). "site/register_user/$key'>Kliknij</a>, by potwierdzić konto</p> ";
		
		$this->email->message($message);*/
		/*$email = trim($this->input->post('email'));
		$this->load->model('model_login');
		$result = $this->model_login->email_exists($email);*/
		if($result){
		/*$config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'tetristologo@gmail.com',
    'smtp_pass' => 'tetris123',
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);
		$this->load->library('email', $config);
		$email_code = md5($this->config->item('salt') . $id);
		
		$this->email->set_newline("\r\n");
		$this->email->from('tetristologo@gmail.com', "Admin");
		$this->email->to($this->input->post('email'));
		$this->email->subject("Reset hasła w VVintage");
		$message ="<p> Wysłana została prośba o zresetowanie hasła. <p>";
		$message .="<p><a href = '".base_url(). "site/nowehaslo/'>Kliknij</a>, by zresetować hasło</p> ";
		
		$this->email->message($message);*/
		//$this->;
		$this->wyslij($email, $result);
		$this->load->view('forgot', array('email' => $email));
		}

else{$this->load->view('forgot', array('error' => "Nie ma takiego maila"));
	
}
}
}
else{
	$this->load->view('forgot');
}
		/*if($this->email->send()){
			echo "Mail został wysłany!";
		}
else echo "Nie można wysłać maila";*/
		//echo $this->email->print_debugger();
		/*if($this->model_users->add_temp_user($key)){
			if($this->email->send()){
			echo "Mail został wysłany!";
		}
else echo "Nie można wysłać maila";

		} */ //else echo "Problem z dodaniem do bazy";
	/*	

	}
else{$this->load->view('forgot', array('error' => "Wpisz poprawny email"));}
	}
	else {
		
		$this->load->view('nowehaslo');
		
	}
	//echo $this->input->post('email');
	//$this->load->view('login_validation');*/
}


/*function odzysk($key){
$this->load->model('model_users');
if($this->model_users->is_key_valid($key)){
	redirect('site/nowehaslo');
}
else {
	echo "invalid key";
}
}*/

function nowehaslo(){
	$this->load->helper('form');
$this->load->library('form_builder');		
	$this->load->view('nowehaslo');
}

function reset_password_form($email, $email_code){
	$this->load->helper('form');
$this->load->library('form_builder');		
		if(isset($email, $email_code)) {
			$this->load->model('model_login');
		
			$email=trim($email);
			$email_hash=sha1($email . $email_code);
			$verified = $this->model_login->verify_reset_password_code($email, $email_code);
			if($verified){
				$this->load->view('nowehaslo', array('email_hash' =>$email_hash, 'email_code'=>$email_code, 'email'=>$email));
			}
			else{$this->load->view('forgot', array('error' => "Wpisz poprawny email"));}
			
		}
}

function update_password(){
	if(!isset($_POST['email'], $_POST['email_hash']) || $_POST['email_hash'] !== sha1($_POST['email'] . $_POST['email_code'])){
		die('Error updating ur pass');
	}
	$this->load->library('form_validation');
	$this->form_validation->set_rules('email_hash', 'Emailhash', 'required|trim');
	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|xss_clean');
	$this->form_validation->set_rules('password', 'Pass', 'required|trim|xss_clean');
	$this->form_validation->set_rules('cpassword', 'PotwierdzPass', 'required|trim|matches[password]|xss_clean');
if($this->form_validation->run() == FALSE){
//	$this->load->view('nowehaslo');
	echo "Nie dziala formularz";
}
else{
	$this->load->model('model_login');
	$result= $this->model_login->update_password();
	if($result){
		echo "Udalo sie!";
	}
	else {
		echo "Nie udalo sie";
	}
}
}
function search_engine(){
	$query_array=array(
	'title' => $this->input->post('title'),
	'contents' => $this->input->post('contents')
	);
//	$query_id= $this->input->save_query($query_array);
	
	redirect('site/aktualnosci/');
}
function szukaj(){
	$this->load->model('data_model');
	$title=$this->input->post('title');
	$data['search_results']=$this->data_model->getSearchResults($title);
	$this->load->view('aktualnosci', $data);
	
}
public function getSearchResults()
 {
  $this->load->database();  
  $partialSearch = $_POST['partialSearch'];
  $this->db->select('title');
  $this->db->like('title', $partialSearch); 
  $query = $this->db->get('data');
   
  $result = $query->result();
  $data = "";
  foreach($result as $row){
     $data = $data . "<div>" . $row->title . "</div>";
  }
  echo $data; 
 }
 
/* public function autocomplete() {
 	$this->load->model('data_model');
        $search_data = $this->input->post('search_data');
        $query = $this->data_model->get_autocomplete($search_data);

        foreach ($query->result() as $row):
            echo "<li><a href='" . base_url() . "site/aktualnosci/" . $row->id . "'>" . $row->title . "</a></li>";
        endforeach;
    }*/
    function autocomplete() {
        $this->load->model('data_model', 'category');
        $query= $this->category->entries();
 
        foreach($query->result() as $row):
        	echo "<p> <a href=' " .base_url(). "site/post/". $row->id . " '>" . $row->title . "</a></p>";//jak się odwołać do id posta
		
        endforeach;    
    }
 function autocomplete1() {
        $this->load->model('site_model', 'category');
        $query= $this->category->entries();
 
        foreach($query->result() as $row):
        	echo "<p> <a href=' " .base_url(). "site/promo/". $row->id . " '>" . $row->title . "</a></p>";//jak się odwołać do id posta
		
        endforeach;    
    }
  }

