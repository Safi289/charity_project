<?php

class Slider_model extends CI_Model {
	
	//insert category data into database
	public function add_slider($data) {
		$this->db->insert('tbl_slider', $data);
	}

	//get categories data from database for view
	public function get_all_slider() {
		$this->db->select('*');
		$this->db->from('tbl_slider');

		$query = $this->db->get();
		return $query->result_array();
	}
	
}