<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('cat_model');
	    $this->load->model('slider_model');
	}

	
	public function index()
	{
		 $data = array();

		 $data['get_all_categories'] = $this->cat_model->get_all_categories();
		 $data['all_slider'] = $this->slider_model->get_all_slider();
		// echo'<pre>'; print_r($data); die;
		 
		 $data['title'] = 'Home | Fashi';
		 $data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		 $data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		 $data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		 $data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		 $data['partner'] = $this->load->view('frontend_template/partner', $data, TRUE);


		 $data['home_content'] = $this->load->view('home_content', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function contact()
	{
		$data = array();

		$data['title'] = 'Contact | Aid';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['partner'] = $this->load->view('frontend_template/partner', $data, TRUE);

		$data['home_content'] = $this->load->view('home/contact', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function shop()
	{
		$data = array();

		$data['get_all_categories'] = $this->cat_model->get_all_categories();

		$data['title'] = 'shop | Fashi';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['partner'] = $this->load->view('frontend_template/partner', $data, TRUE);

		$data['home_content'] = $this->load->view('home/shop', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function blog()
	{
		$data = array();

		$data['get_all_categories'] = $this->cat_model->get_all_categories();

		$data['title'] = 'Blog | Fashi';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['partner'] = $this->load->view('frontend_template/partner', $data, TRUE);

		$data['home_content'] = $this->load->view('home/blog', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function blog_detail()
	{
		$data = array();

		$data['get_all_categories'] = $this->cat_model->get_all_categories();

		$data['title'] = 'Blog-Detail | Fashi';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['partner'] = $this->load->view('frontend_template/partner', $data, TRUE);

		$data['home_content'] = $this->load->view('home/blog_detail', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function cart()
	{
		$data = array();

		$data['get_all_categories'] = $this->cat_model->get_all_categories();

		$data['title'] = 'Shopping-Cart | Fashi';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['partner'] = $this->load->view('frontend_template/partner', $data, TRUE);

		$data['home_content'] = $this->load->view('home/cart', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function check_out()
	{
		$data = array();

		$data['get_all_categories'] = $this->cat_model->get_all_categories();

		$data['title'] = 'Check-Out| Fashi';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['partner'] = $this->load->view('frontend_template/partner', $data, TRUE);

		$data['home_content'] = $this->load->view('home/check_out', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function register()
	{
		$data = array();

		$data['get_all_categories'] = $this->cat_model->get_all_categories();

		$data['title'] = 'Register| Fashi';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['partner'] = $this->load->view('frontend_template/partner', $data, TRUE);

		$data['home_content'] = $this->load->view('home/register', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function login()
	{
		$data = array();

		$data['get_all_categories'] = $this->cat_model->get_all_categories();

		$data['title'] = 'Login| Fashi';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['partner'] = $this->load->view('frontend_template/partner', $data, TRUE);

		$data['home_content'] = $this->load->view('home/login', $data, TRUE);

		$this->load->view('main_content', $data);
	}
}
