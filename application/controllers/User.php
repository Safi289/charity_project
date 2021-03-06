<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();

	    $user_id = $this->session->userdata('user_id');
	    if($user_id == '')
	    {
	    	redirect('login');
	    }

	    // $this->load->model('cat_model');
	    // $this->load->model('pro_model');
	    $this->load->model('user_model');
	}

	public function index()
	{ 
			
	}

	//show user with data table
	public function fetch_user()
	{

		//echo '<pre>';print_r($_POST);die;
		$fetch_data = $this->user_model->datatables();
		$data = array();
		// echo '<pre>';print_r($fetch_data);die;
		
		$i = 1;
		foreach ($fetch_data as $row)
		{
			$html  = '';
			$html .= '<button data-id="'.$row->id.'" type="button" class="btn btn-primary btn-sm edit_user_btn" href="javascript:void(0)">
                     Edit</button>
                    <a href="'.base_url().'delete-user/ '.$row->id.'" class="btn btn-danger btn-sm">Delete</a>';
            $test = array();
            $test[] = $i;
            $test[] = $row->name;
            $test[] = $row->email;
            $test[] = $row->user_mobile;
            $test[] = $row->user_address;
            $test[] = $row->user_type;
            $test[] = '<img height="50" weidtht="50" src="'.base_url().'uploads/'.$row->user_image.'">';
            $test[] = $html;

            $data[] = $test;
            $i++;
            //echo '<pre>';print_r($data);die;
        }
            $output = array(
			"draw"             => intval($_POST["draw"]),
			"recordsTotal"     => $this->user_model->get_all_data(),
			"rescordsFiltered" => $this->user_model->get_filtered_data(),
			"data"             => $data

		);
            
		echo json_encode($output);
		//echo '<pre>';print_r($output);die;
	}

	public function add_user()
	{
		// $data = array();

		// $data['all_category']  = $this->cat_model->get_all_categories();

		$data['title']         = 'Add User';
		$data['page_title']    = 'Users';
		$data['headerlink']    = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header']        = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar']       = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink']    = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer']        = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content'] = $this->load->view('admin/user/add_user', $data, TRUE);

		$this->load->view('admin_main_content', $data);	
	}

	public function submit_user()
	{
		$post = $this->input->post();
		
		$data = array();
		$data['name']           = $post['user_name'];
		$data['email']          = $post['user_email'];
		$data['user_mobile']    = $post['user_mobile'];
		$data['user_address']   = $post['user_address'];
		$data['password']       = md5($post['user_password']);

		$data['user_type'] = 2;
		if(isset($post['editor'])) 
		{
			$data['user_type'] = 3;
		}

		$config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('user_image'))
        {
            $error = array('error' => $this->upload->display_errors());
            //echo "<pre>";print_r($error);
        }
        else
        {
            $file_data = $this->upload->data();
            $data['user_image'] = $file_data['file_name'];
        }
       // echo "<pre>";print_r($data);die;
		
		$this->user_model->add_user($data);
		redirect('show-user');
	}

	public function show_user()
	{
		$data = array();

		$data['all_user']         = $this->user_model->get_all_user();

		// $ajaxdata = $this->user_model->get_all_user();
  //       echo json_encode($ajaxdata);

		//$data['user_info']         = $this->user_model->user_info();
		//echo "<pre>";print_r($data['all_user']);die;

		$data['title']            = 'Show User';
		$data['page_title']       = 'Users';
		$data['headerlink']       = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header']           = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar']          = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink']       = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer']           = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content']    = $this->load->view('admin/user/show_user', $data, TRUE);

		$this->load->view('admin_main_content', $data);	
	}

	public function edit_user($id)
	{
		$data = array();

		$data['all_user']         = $this->user_model->get_all_user();

		//echo json_encode($get_student); 

		//$data['user_info']        = $this->user_model->user_info($id);

		$data['title']            = 'Show User';
		$data['page_title']       = 'Users';
		$data['headerlink']       = $this->load->view('backend_template/headerlink', $data, TRUE);	
		$data['header']           = $this->load->view('backend_template/header', $data, TRUE);
		$data['leftbar']          = $this->load->view('backend_template/leftbar', $data, TRUE);
		$data['footerlink']       = $this->load->view('backend_template/footerlink', $data, TRUE);
		$data['footer']           = $this->load->view('backend_template/footer', $data, TRUE);
		$data['admin_content']    = $this->load->view('admin/user/edit_user', $data, TRUE);

		$this->load->view('admin_main_content', $data);	
	}

	public function update_user()
	{
		$post = $this->input->post();

		$data = array();

		
		$data['name']           = $post['user_name'];
		$data['email']          = $post['user_email'];
		$data['user_mobile']    = $post['user_mobile'];
		$data['user_address']   = $post['user_address'];
		if($post['user_password']) {
			$data['password']   = md5($post['user_password']);
		}
		

		//echo "<pre>";print_r($data);die;

		if($this->input->post('editor')) {
			$data['user_type'] = 2;
		} else {
			$data['user_type'] = 3;
		}
		$data['user_image'] = $this->input->post('prev_user_image');

		$config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'gif|jpg|png';


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('user_image')) {
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $file_data = $this->upload->data();
            $data['user_image'] = $file_data['file_name'];
        }
		// echo "<pre>";print_r($data);die;

		$id = $post['id'];

		$this->user_model->update_user_info($id, $data);	
		$this->session->set_flashdata('message', 'Successfully Updated');	
		redirect('show-user');
	}

	public function delete_user($id)
	{
		$user_info = $this->user_model->user_info($id);
		// echo "<pre>";print_r($user_info);die;
		unlink("uploads/".$user_info['user_image']);

		$this->user_model->delete_user($id);

		$this->session->set_flashdata('message', 'Successfully Deleted');
		redirect('show-user');
	}

	public function user_data()
	{
        $data = $this->user_model->get_all_user();
        echo json_encode($data);
    }

    public function ajax_user_data() {
    	$get = $this->input->get();
    	
    	$data['get_user'] = $this->user_model->user_info($get['id']);
    	$data['edit_user'] = $this->load->view('admin/user/edit_user_modal', $data, true);
    	echo json_encode($data);
        exit();
    }

}
