<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();

	    $user_id = $this->session->userdata('user_id');
	    if($user_id == '')
	    {
	    	redirect('login');
	    }

	    $this->load->model('cat_model');
	}

	public function index()
	{ 
		$data = array();

		$data['title'] = 'Dashboard';
		$data['page_title'] = 'Dashboard';
		$data['headerlink'] = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header'] = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar'] = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink'] = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer'] = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin_home_content', $data, TRUE);

		$this->load->view('admin_main_content', $data);	
	}

	public function add_user()
	{
		$data = array();

		

		

		$data['title'] = 'Add User';
		$data['page_title'] = 'Users';
		$data['headerlink'] = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header'] = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar'] = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink'] = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer'] = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/user/add_user', $data, TRUE);

		$this->load->view('admin_main_content', $data);	

	}



	// public function add_category()
	// {
	// 	$this->form_validation->set_rules('cat_name', 'Cat_name', 'required', array('required' => 'you must provide a %s.'));

	// 	if ($this->form_validation->run() == FALSE){

	// 			$data = array();

	// 			$data['title'] = 'Add Category';
	// 			$data['page_title'] = 'Categories';
	// 			$data['headerlink'] = $this->load->view('backend_template/headerlink', $data, TRUE);	
	// 			$data['header'] = $this->load->view('backend_template/header', $data, TRUE);
	// 			$data['leftbar'] = $this->load->view('backend_template/leftbar', $data, TRUE);
	// 			$data['footerlink'] = $this->load->view('backend_template/footerlink', $data, TRUE);
	// 			$data['footer'] = $this->load->view('backend_template/footer', $data, TRUE);
	// 			$data['admin_content'] = $this->load->view('admin/category/add_category', $data, TRUE);

	// 			$this->load->view('admin_main_content', $data);	
	// 	} else{

	// 	}
	// }

	//add to database
	public function submit_category()
	{

		$post = $this->input->post();

		$data = array();
		$data['cat_name'] = $post['cat_name'];

		$this->form_validation->set_rules('cat_name', 'Category Name', 'required');

		//echo '<pre>';print_r($data);die;

		if ($this->form_validation->run() == FALSE){

			$this->session->set_flashdata('message', 'Requirement Error');
			redirect('show-category');

		} else {
			//echo '<pre>';print_r($data);die;
			$this->cat_model->add_cat($data);	
			$this->session->set_flashdata('message', 'Successfully Added');	
			redirect('show-category');
		}
	}

	//show all category
	public function all_category()
	{
		$data = array();

		$data['all_category'] = $this->cat_model->get_all_categories();
		// echo '<pre>';print_r($data['all_category']);die;
		$data['title']         = 'Show Category';
		$data['page_title']    = 'Show Categories';
		$data['headerlink']    = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header']        = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar']       = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink']    = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer']        = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/category/show_category', $data, TRUE);

		$this->load->view('admin_main_content', $data);	
	}


	//show data with data table
	public function fetch_category()
	{
		// echo '<pre>';print_r($_POST);die;
		//$this->load->model('cat_model');
		$draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));

		$fetch_data = $this->cat_model->make_datatables();
		$data = array();
		
		$i = 1;
		foreach ($fetch_data as $row)
		{
			$html = '';
			$html .= '<button  data-id="'.$row->cat_id.'" type="button" class="btn btn-primary edit_category_btn" href="javascript:void(0)">Edit</button>
				<a href="'.base_url().'delete-category/'.$row->cat_id.'" class="btn btn-danger btn-sm">Delete</a>';

		 	$sub_array = array();

		 	$sub_array[] = $i;
		 	$sub_array[] = $row->cat_name;
		 	$sub_array[] = $html;

		 	$data[] = $sub_array; 
		 	$i++;
		}
		
		// echo '<pre>';print_r($data);die;

		$output = array(
			"draw"             => intval($_POST["draw"]),
			"recordsTotal"     => $this->cat_model->get_all_data(),
			"rescordsFiltered" => $this->cat_model->get_filtered_data(),
			"data"             => $data
		);
		echo json_encode($output);
		//print_r($output);die;
	}


	//get data from database for update
	public function edit_category($cat_id)
	{
		//get data
		$data = array();
		$data['category_info'] = $this->cat_model->get_category_info($cat_id);

		$data['title'] = 'Edit Category';
		$data['page_title'] = 'Categories';
		$data['headerlink'] = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header'] = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar'] = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink'] = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer'] = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/category/edit_category', $data, TRUE);

		$this->load->view('admin_main_content', $data);	
	}

	//update data into database
	public function update_category()
	{
		$post = $this->input->post();
		//echo '<pre>';print_r($post);die;
		$data = array();
		$data['cat_name'] = $post['cat_name'];
		$cat_id = $post['cat_id'];



		$this->cat_model->update_category_info($cat_id, $data);	
		$this->session->set_flashdata('message', 'Successfully Updated');	
		redirect('show-category');
	}



	//delete category
	public function delete_category($cat_id)
	{
		$this->cat_model->delete_category($cat_id);
		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect('show-category');

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	//edit category with ajax and modal
	public function ajax_category_data()
	{
	 	$get = $this->input->get();

	 	$data['get_category'] = $this->cat_model->get_category_info($get['id']);
	 	// print_r($data);
	 	$data['edit_category'] = $this->load->view('admin/category/edit_category_modal', $data, true);
	 	echo json_encode($data);
        exit();
	}

}
