<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();

	    $user_id = $this->session->userdata('user_id');
	    if($user_id == '')
	    {
	    	redirect('login');
	    }

	    $this->load->model('brand_model');
	}

	public function index()
	{ 
			
	}

	public function add_brand()
	{
		$data = array();

		$data['title']         = 'Add Brand | Admin';
		$data['page_title']    = 'Add Brand';
		$data['headerlink']    = $this->load->view('backend_template/headerlink', $data, TRUE);
		$data['header']        = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar']       = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink']    = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer']        = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/brand/add_brand', $data, TRUE);

		$this->load->view('admin_main_content', $data);

	}

	public function submit_brand()
	{
		$post = $this->input->post();

		$data = array();

		$data['brand_name'] = $post['brand_name'];

		$config['upload_path']          = 'uploads/brand/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('brand_image'))
        {
            $error = array('error' => $this->upload->display_errors());
            // echo "<pre>";print_r($error['error']);die;
        }
        else
        {
            $file_data = $this->upload->data();
            $data['brand_image'] = $file_data['file_name']; 
            //echo "<pre>";print_r($data);die;
        }

        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');

        if (empty($_FILES['brand_image']['name']))
        {
            $this->form_validation->set_rules('brand_image', 'Brand Image', 'required');
        }

        if ($this->form_validation->run() == FALSE)
        {
			redirect('show-brand');	
		}
		else
		{
			//echo '<pre>'; print_r($data); die;
			$this->brand_model->add_brand($data);	

			redirect('show-brand');
		}
	}

	public function show_brand()
	{
		$data = array();

		$data['all_brand'] = $this->brand_model->get_all_brand();
		 // echo '<pre>';print_r($data);die;
		

		$data['title']         = 'Show Brand';
		$data['page_title']    = 'Show Brand';
		$data['headerlink']    = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header']        = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar']       = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink']    = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer']        = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/brand/show_brand', $data, TRUE);


		$this->load->view('admin_main_content', $data);	
	}

	public function edit_brand($brand_id)
	{
		$data = array();
		//$data['all_brand']  = $this->brand_model->get_all_brand();
		$data['brand_info'] = $this->brand_model->get_brand_info($brand_id);
		
		$data['title'] = 'Edit Brand';
		$data['page_title'] = 'Brand';
		$data['headerlink'] = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header'] = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar'] = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink'] = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer'] = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/brand/edit_brand', $data, TRUE);

		$this->load->view('admin_main_content', $data);	
	}

	public function update_brand()
	{
		$post = $this->input->post();

		$data = array();

		$data['brand_name']        = $post['brand_name'];


		$brand_id = $post['brand_id'];

		$data['brand_image'] = $this->input->post('prev_brand_image');

		$config['upload_path']          = 'uploads/brand/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('brand_image'))
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
        	$file_data = $this->upload->data();
            $data['brand_image'] = $file_data['file_name'];
        }

      
        $brand_info = $this->brand_model->get_brand_info($brand_id);
        unlink("uploads/brand/".$brand_info['brand_image']);

		$this->brand_model->update_brand_info($brand_id, $data);	
		//echo "<pre>";print_r($data);die;
		$this->session->set_flashdata('message', 'Successfully Updated');	
		redirect('show-brand');
	}

	public function delete_brand($brand_id)
	{
		$brand_info = $this->brand_model->get_brand_info($brand_id);
		//echo "<pre>";print_r($brand_info);die;
		unlink("uploads/brand/".$brand_info['brand_image']);

		$this->brand_model->delete_brand($brand_id);

		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect('show-brand');
	}

}
