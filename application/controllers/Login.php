<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function __construct() 
	{
	    parent::__construct();

	    $user_id = $this->session->userdata('user_id');
	    if($user_id != '') 
	    {
	    	redirect('dashboard');
	    }
	}
	
	public function index()
	{
		$this->load->view('login');	
	}

	public function formPost()
	{
	    $post = $this->input->post();

	    $email    = $post['email'];
	    $password = $post['password'];

	    $login_data = $this->login_model->chkUser($email, $password);

	    if($login_data) 
	    {
	    	$data = array();

	    	$data['user_id']     = $login_data['id'];
	    	$data['user_name']   = $login_data['name'];
	    	$data['user_email']  = $login_data['email'];
	    	$data['user_type']   = $login_data['user_type'];

	    	$this->session->set_userdata($data);

	    	redirect('dashboard');
	    } 
	    else
	    {
	    	$this->session->set_flashdata('message', 'Incorrect Email or Password');
	    	redirect('login');
	    }
	}
}
