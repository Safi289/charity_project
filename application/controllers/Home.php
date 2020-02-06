<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();

	    $this->load->model('cat_model');
	    $this->load->model('slider_model');
	    $this->load->model('brand_model');
	    $this->load->model('color_model');
	    $this->load->model('size_model');
	    $this->load->model('pro_model');

	    $this->load->library('cart');
	}

	
	public function index()
	{
		 $data = array();

		 $data['get_all_categories'] = $this->cat_model->get_all_categories();
		 $data['all_slider'] = $this->slider_model->get_all_slider();
		 $data['all_brand'] = $this->brand_model->get_all_brand();

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
		$data['all_brand'] = $this->brand_model->get_all_brand();
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

		$data['all_brand']    = $this->brand_model->get_all_brand();
		$data['all_color']    = $this->color_model->get_all_color();
		$data['all_size']     = $this->size_model->get_all_size();
		$data['product_info'] = $this->pro_model->get_all_product();

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
		$data['all_brand'] = $this->brand_model->get_all_brand();

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
		$data['all_brand'] = $this->brand_model->get_all_brand();

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
		$data['all_brand'] = $this->brand_model->get_all_brand();
		$data['all_color']    = $this->color_model->get_all_color();
		$data['all_size']     = $this->size_model->get_all_size();
		$data['product_info'] = $this->pro_model->get_all_product();

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
		$data['all_brand']    = $this->brand_model->get_all_brand();
		$data['all_color']    = $this->color_model->get_all_color();
		$data['all_size']     = $this->size_model->get_all_size();
		$data['product_info'] = $this->pro_model->get_all_product();
		$data['cart_item']    = $this->cart->content();

		//echo '<pre>'; print_r($data); die;

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
		$data['all_brand'] = $this->brand_model->get_all_brand();

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
		$data['all_brand'] = $this->brand_model->get_all_brand();

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
