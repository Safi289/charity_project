<?php

class Size_model extends CI_Model {
	
	//insert category data into database
	public function add_size($data) {
		$this->db->insert('tbl_size', $data);
	}

	//get brand data from database for view
	public function get_all_size() {
		$this->db->select('*');
		$this->db->from('tbl_size');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_size_info($size_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_size');

		$this->db->where('size_id', $size_id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_size_info($size_id, $data)
	{
		$this->db->where('size_id', $size_id);
		$this->db->update('tbl_size', $data);
	}


	public function delete_size($size_id)
	{
		$this->db->where('size_id', $size_id);
		$this->db->delete('tbl_size');
	}
	
}