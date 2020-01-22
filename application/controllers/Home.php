<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$data = array();

		$data['title'] = 'Home | Aid';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);

		$data['home_content'] = $this->load->view('home_content', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function contact()
	{
		$data = array();

		$data['title'] = 'Contact | Aid';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);

		$data['home_content'] = $this->load->view('home/contact', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function contact1()
	{
		$data = array();

		$data['title'] = 'Contact1 | Aid';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);

		$data['home_content'] = $this->load->view('home/contact1', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function about()
	{
		$data = array();
		$data['title'] = 'About Us | Aid';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);

		$data['home_content'] = $this->load->view('home/about_us', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function causes()
	{
		$data = array();
		$data['title'] = 'Causes | Aid';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);

		$data['home_content'] = $this->load->view('home/causes', $data, TRUE);

		$this->load->view('main_content', $data);
	}

	public function stories()
	{
		$data = array();
		$data['title'] = 'Stories | Aid';
		$data['headerlink'] = $this->load->view('frontend_template/headerlink', $data, TRUE);
		$data['header'] = $this->load->view('frontend_template/header', $data, TRUE);
		$data['footer'] = $this->load->view('frontend_template/footer', $data, TRUE);
		$data['footerlink'] = $this->load->view('frontend_template/footerlink', $data, TRUE);

		$data['home_content'] = $this->load->view('home/stories', $data, TRUE);

		$this->load->view('main_content', $data);
	}
}
