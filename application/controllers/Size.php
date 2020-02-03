<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Size extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();

	    $user_id = $this->session->userdata('user_id');
	    if($user_id == '')
	    {
	    	redirect('login');
	    }

	    $this->load->model('size_model');
	}

	public function index()
	{ 
			
	}

	public function add_size()
	{
		$data = array();

		$data['title']         = 'Add Size | Admin';
		$data['page_title']    = 'Add Size';
		$data['headerlink']    = $this->load->view('backend_template/headerlink', $data, TRUE);
		$data['header']        = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar']       = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink']    = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer']        = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/size/add_size', $data, TRUE);

		$this->load->view('admin_main_content', $data);

	}

	public function submit_size()
	{
		$post = $this->input->post();

		$data = array();

		$data['size_name'] = $post['size_name'];

        $this->form_validation->set_rules('size_name', 'Size Name', 'required');

        if ($this->form_validation->run() == FALSE)
        {
			redirect('show-size');	
		}
		else
		{
			//echo '<pre>'; print_r($data); die;
			$this->size_model->add_size($data);	

			redirect('show-size');
		}
	}

	public function show_size()
	{
		$data = array();

		$data['all_size'] = $this->size_model->get_all_size();
		 // echo '<pre>';print_r($data);die;
		

		$data['title']         = 'Show Size';
		$data['page_title']    = 'Show Size';
		$data['headerlink']    = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header']        = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar']       = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink']    = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer']        = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/size/show_size', $data, TRUE);


		$this->load->view('admin_main_content', $data);	
	}

	public function edit_size($size_id)
	{
		$data = array();
		//$data['all_brand']  = $this->brand_model->get_all_brand();
		$data['size_info'] = $this->size_model->get_size_info($size_id);
		
		$data['title'] = 'Edit Size';
		$data['page_title'] = 'Size';
		$data['headerlink'] = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header'] = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar'] = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink'] = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer'] = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/size/edit_size', $data, TRUE);

		$this->load->view('admin_main_content', $data);	
	}

	public function update_size()
	{
		$post = $this->input->post();

		$data = array();

		$data['size_name']        = $post['size_name'];


		$size_id = $post['size_id'];


		$this->size_model->update_size_info($size_id, $data);	
		//echo "<pre>";print_r($data);die;
		$this->session->set_flashdata('message', 'Successfully Updated');	
		redirect('show-size');
	}

	public function delete_size($size_id)
	{
		

		$this->size_model->delete_size($size_id);

		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect('show-size');
	}

}
