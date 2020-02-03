<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();

	    $user_id = $this->session->userdata('user_id');
	    if($user_id == '')
	    {
	    	redirect('login');
	    }

	    $this->load->model('cat_model');
	    $this->load->model('pro_model');
	    $this->load->model('brand_model');
	}

	public function index()
	{ 
			
	}

	public function add_product()
	{
		$data = array();

		$data['all_category']  = $this->cat_model->get_all_categories();
		$data['all_brand']  = $this->brand_model->get_all_brand();

		$data['title']         = 'Add Product';
		$data['page_title']    = 'Products';
		$data['headerlink']    = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header'] = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar'] = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink'] = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer'] = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/product/add_product', $data, TRUE);

		$this->load->view('admin_main_content', $data);	
	}

	public function submit_product()
	{
		$post = $this->input->post();
		
		$data = array();
		$data['product_name']        = $post['pro_name'];
		$data['product_brand']       = $post['product_brand'];
		$data['product_category']    = $post['pro_category'];
		$data['product_price']       = $post['pro_price'];
		$data['product_description'] = $post['pro_description'];

		$data['product_type'] = 2;
		if(isset($post['featured'])) {
			$data['product_type'] = 1;
		}

		$config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('pro_image')) {
            $error = array('error' => $this->upload->display_errors());
            //echo "<pre>";print_r($error);
        }
        else {
            $file_data = $this->upload->data();
            $data['product_image'] = $file_data['file_name'];
        }
		
		$this->pro_model->add_pro($data);
		
		redirect('show-product');
	}


	public function show_product()
	{
		

		$data = array();

		$data['product_info']     = $this->pro_model->get_all_product();
		$data['all_category']     = $this->cat_model->get_all_categories();
		$data['all_brand']        = $this->brand_model->get_all_brand();
		//echo "<pre>";print_r($data['product_info']);die;

		$data['title']            = 'Show Product';
		$data['page_title']       = 'Show Product';
		$data['headerlink']       = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header'] = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar'] = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink'] = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer'] = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/product/show_product', $data, TRUE);

		$this->load->view('admin_main_content', $data);	
	}

	public function edit_product($product_id)
	{
		$data = array();
		$data['all_category']  = $this->cat_model->get_all_categories();
		$data['all_brand']     = $this->brand_model->get_all_brand();
		$data['product_info']  = $this->pro_model->get_product_info($product_id);
		// echo '<pre>';print_r($data['product_info']);die;
		$data['title'] = 'Edit Product';
		$data['page_title'] = 'Product';
		$data['headerlink'] = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header'] = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar'] = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink'] = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer'] = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/product/edit_product', $data, TRUE);

		$this->load->view('admin_main_content', $data);	
	}

	public function update_product()
	{
		$post = $this->input->post();

		$data = array();

		$data['product_brand']       = $post['product_brand'];
		$data['product_category']    = $post['pro_category'];
		$data['product_name']        = $post['pro_name'];
		$data['product_price']       = $post['pro_price'];
		$data['product_description'] = $post['pro_description'];
		if($this->input->post('hot')){
			$data['product_type'] = 2;
		} else{
			$data['product_type'] = 1;
		}

		//echo "<pre>";print_r($data);die;

		$product_id = $post['product_id'];

		$data['product_image'] = $this->input->post('prev_product_image');

		$config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('pro_image'))
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
        	$file_data = $this->upload->data();
            $data['product_image'] = $file_data['file_name'];
        }

       // echo "<pre>";print_r($data);die;

		$this->pro_model->update_product_info($product_id, $data);	
		//echo "<pre>";print_r($data);die;
		$this->session->set_flashdata('message', 'Successfully Updated');	
		redirect('show-product');
	}

	public function delete_product($product_id)
	{
		$product_info = $this->pro_model->get_product_info($product_id);
		//echo "<pre>";print_r($product_info);die;
		unlink("uploads/".$product_info['product_image']);

		$this->pro_model->delete_product($product_id);

		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect('show-product');
	}

	public function ajax_product_data()
	{
		$get = $this->input->get();
		//print_r($get);
	 	$data['get_product'] = $this->pro_model->get_product_info($get['id']);
	 	$data['all_category'] = $this->cat_model->get_all_categories();
	 	//print_r($data);
	 	$data['edit_product'] = $this->load->view('admin/product/edit_product_modal', $data, true);
	 	echo json_encode($data);
   	    exit(); 
	}


}
