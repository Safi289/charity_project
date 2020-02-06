<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();

	    $this->load->library('cart');
	    $this->load->model('cat_model');
	    $this->load->model('slider_model');
	    $this->load->model('brand_model');
	    $this->load->model('color_model');
	    $this->load->model('size_model');
	    $this->load->model('pro_model');
	    $this->load->model('order_model');
	    $this->load->helper('form');
	}

	public function index()
	{
		$data = array();

		$data['get_all_categories'] = $this->cat_model->get_all_categories();
		$data['all_brand']    = $this->brand_model->get_all_brand();
		$data['all_color']    = $this->color_model->get_all_color();
		$data['all_size']     = $this->size_model->get_all_size();
		$data['product_info'] = $this->pro_model->get_all_product();
		$data['cart_item']    = $this->cart->contents();

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


	public function submit_order()
	{
		$post  = $this->input->post(); 
		// echo '<pre>'; print_r($post); die;
		$order = array();
		$data = array();
		$order_detail = array();
		
		$data['first_name']   = $post['first_name'];
		$data['last_name']    = $post['last_name'];
		$data['company_name'] = $post['company_name'];
		$data['country']      = $post['country'];
		$data['address']      = $post['address'];
		$data['city']         = $post['city'];
		$data['email']        = $post['email'];
		$data['phone']        = $post['phone'];
		// echo 'User Data: <pre>';print_r($data);
		$insert_id = $this->order_model->insert_customer($data);

		$order['user_id']           = $insert_id;
		$order['total']     		= $post['total'];
		$order['created_at']     	= date('Y-m-d H:i:s');

		// echo 'Order Data: <pre>';print_r($order);
		
		$insert_order_id = $this->order_model->add_order_data($order);	

		for ($i = 0; $i < count($post['item_id']); $i++) {
			$order_detail['order_id']          = $insert_order_id;
			$order_detail['item_id']           = $post['item_id'][$i];
			$order_detail['item_qty']          = $post['qty'][$i];
			$order_detail['item_subtotal']     = $post['subtotal'][$i];

			// echo 'Order Detail Data: <pre>';print_r($order_detail);
			$this->order_model->add_order_detail($order_detail);
		}

		// die;
		redirect('checkout-complete');
	}

	public function checkout_complete() {

		$data = array();

		
		//echo '<pre>'; print_r($data['cart_item']); die;
		$data['get_all_categories'] = $this->cat_model->get_all_categories();

		$data['all_brand']    = $this->brand_model->get_all_brand();
	


		$data['title'] = 'Order | Fashi';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);
		$data['partner'] = $this->load->view('frontend_template/partner', $data, TRUE);

		$data['home_content'] = $this->load->view('home/checkout_complete', $data, TRUE);

		$this->load->view('main_content', $data);
	}

}
