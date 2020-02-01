<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();

	    $user_id = $this->session->userdata('user_id');
	    if($user_id == '')
	    {
	    	redirect('login');
	    }

	    $this->load->model('slider_model');
	}

	public function index()
	{ 
			
	}


	//add slider to database
	public function submit_slider()
	{

		$post = $this->input->post();

		$data1 = array();
		$data1['slider_title'] = $post['slider_title'];
		$data1['slider_text']  = $post['slider_text'];

		//image upload procedure
		$config['upload_path']          = 'uploads/slider';
        $config['allowed_types']        = 'gif|jpg|png';

        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('slider_image')) {
            $error = array('error' => $this->upload->display_errors());
            //echo "<pre>";print_r($error['error']);die;
        }
        else {
            $file_data = $this->upload->data();
            $data1['slider_image'] = $file_data['file_name'];
         
        }

		$this->form_validation->set_rules('slider_title', 'Slider Title', 'required');
		$this->form_validation->set_rules('slider_text', 'Slider Text', 'required');
		if (empty($_FILES['slider_image']['name']))
        {
            $this->form_validation->set_rules('slider_image', 'Slider Image', 'required');
        }
	

		if ($this->form_validation->run() == FALSE){

			
			//echo '<pre>';print_r($data);die;
			redirect('show-slider');
			//$this->load->view('admin/slider/show_slider');

		} else {


		
			$this->slider_model->add_slider($data1);	

			redirect('show-slider');
			//$this->load->view('admin/slider/show_slider');


		}
	}

	//show all slider
	public function show_slider()
	{
		$data = array();

		$data['all_slider'] = $this->slider_model->get_all_slider();
		 // echo '<pre>';print_r($data);die;
		

		$data['title']         = 'Show Slider';
		$data['page_title']    = 'Show Slider';
		$data['headerlink']    = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header']        = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar']       = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink']    = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer']        = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/slider/show_slider', $data, TRUE);


		$this->load->view('admin_main_content', $data);	
	}

}
