<?php

class Brand_model extends CI_Model {
	
	//insert category data into database
	public function add_brand($data) {
		$this->db->insert('tbl_brand', $data);
	}

	//get categories data from database for view
	// public function get_all_brand() {
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_brand');

	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }
	
}