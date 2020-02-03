<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Color extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();

	    $user_id = $this->session->userdata('user_id');
	    if($user_id == '')
	    {
	    	redirect('login');
	    }

	    $this->load->model('color_model');
	}

	public function index()
	{ 
			
	}

	public function add_color()
	{
		$data = array();

		$data['title']         = 'Add Color | Admin';
		$data['page_title']    = 'Add Color';
		$data['headerlink']    = $this->load->view('backend_template/headerlink', $data, TRUE);
		$data['header']        = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar']       = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink']    = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer']        = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/color/add_color', $data, TRUE);

		$this->load->view('admin_main_content', $data);

	}

	public function submit_color()
	{
		$post = $this->input->post();

		$data = array();

		$data['color_name'] = $post['color_name'];

		$config['upload_path']          = 'uploads/color/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('color_image'))
        {
            $error = array('error' => $this->upload->display_errors());
            // echo "<pre>";print_r($error['error']);die;
        }
        else
        {
            $file_data = $this->upload->data();
            $data['color_image'] = $file_data['file_name']; 
            //echo "<pre>";print_r($data);die;
        }

        $this->form_validation->set_rules('color_name', 'Color Name', 'required');

        if (empty($_FILES['color_image']['name']))
        {
            $this->form_validation->set_rules('color_image', 'Color Image', 'required');
        }

        if ($this->form_validation->run() == FALSE)
        {
			redirect('show-color');	
		}
		else
		{
			//echo '<pre>'; print_r($data); die;
			$this->color_model->add_color($data);	

			redirect('show-color');
		}
	}

	public function show_color()
	{
		$data = array();

		$data['all_color'] = $this->color_model->get_all_color();
		 // echo '<pre>';print_r($data);die;
		

		$data['title']         = 'Show Brand';
		$data['page_title']    = 'Show Brand';
		$data['headerlink']    = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header']        = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar']       = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink']    = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer']        = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/color/show_color', $data, TRUE);


		$this->load->view('admin_main_content', $data);	
	}

	public function edit_color($color_id)
	{
		$data = array();
		//$data['all_brand']  = $this->brand_model->get_all_brand();
		$data['color_info'] = $this->color_model->get_color_info($color_id);
		
		$data['title'] = 'Edit Color';
		$data['page_title'] = 'Color';
		$data['headerlink'] = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header'] = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar'] = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink'] = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer'] = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/color/edit_color', $data, TRUE);

		$this->load->view('admin_main_content', $data);	
	}

	public function update_color()
	{
		$post = $this->input->post();

		$data = array();

		$data['color_name']        = $post['color_name'];


		$color_id = $post['color_id'];

		$data['color_image'] = $this->input->post('prev_color_image');

		$config['upload_path']          = 'uploads/color/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('color_image'))
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
        	$file_data = $this->upload->data();
            $data['color_image'] = $file_data['file_name'];
        }

      
        $color_info = $this->color_model->get_color_info($color_id);
        unlink("uploads/color/".$color_info['color_image']);

		$this->color_model->update_color_info($color_id, $data);	
		//echo "<pre>";print_r($data);die;
		$this->session->set_flashdata('message', 'Successfully Updated');	
		redirect('show-color');
	}

	public function delete_color($color_id)
	{
		$color_info = $this->color_model->get_color_info($color_id);
		//echo "<pre>";print_r($brand_info);die;
		unlink("uploads/color/".$color_info['color_image']);

		$this->color_model->delete_color($color_id);

		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect('show-color');
	}

}
