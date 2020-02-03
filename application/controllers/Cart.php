<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();

	    

	    //$this->load->model('cart_model');
	    $this->load->library('cart');
	    $this->load->model('cat_model');
	    $this->load->model('slider_model');
	    $this->load->model('brand_model');
	    $this->load->model('color_model');
	    $this->load->model('size_model');
	    $this->load->model('pro_model');
	}

	public function index()
	{ 

		$data = array();

		$data['cart_item'] = $this->cart->contents();
		//echo '<pre>'; print_r($data['cart_item']); die;

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

		$data['home_content'] = $this->load->view('home/cart', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function add_cart($product_id)
	{
		
		$product = $this->pro_model->get_product_info($product_id);

		$data = array(
            'id'    => $product['product_id'],
            'qty'   => 1,
            'price' => $product['product_price'],
            'name'  => $product['product_name'],
            'image' => $product['product_image']
        );

		$this->cart->insert($data);
		redirect('cart');
		//echo '<pre>'; print_r($data); die;

		
	}

	function update_cart_qty(){
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        echo $update?'ok':'err';
    }

	 function remove_cart($rowid){
        // Remove item from cart
        // $remove = $this->cart->remove($rowid);
        // echo '<pre>'; print_r($remove); die;

        $data = array(
	        'rowid' => $rowid,
	        'qty'   => 0
		);

		$this->cart->update($data);
        
        // Redirect to the cart page
        redirect('cart');
    }

	

}
