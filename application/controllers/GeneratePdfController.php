<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneratePdfController extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();

	    $user_id = $this->session->userdata('user_id');
	    if($user_id == '')
	    {
	    	redirect('login');
	    }
	    $this->load->model('order_model');
	}

    function generate_pdf($id)
    {
    	$data = array();

		$data['get_order'] = $this->order_model->order_info($id);

        $this->load->library('pdf');
        $html = $this->load->view('GeneratePdfView', $data, true);
        $this->pdf->createPDF($html, 'mypdf', true);
    }
}
?>