<?php

class Cat_model extends CI_Model {
	
	//insert category data into database
	public function add_cat($data) {
		$this->db->insert('tbl_category', $data);
	}

	//get categories data from database for view
	public function get_all_categories() {
		$this->db->select('*');
		$this->db->from('tbl_category');

		$query = $this->db->get();
		return $query->result_array();
	}

	//get category data from database for update
	public function get_category_info($cat_id) {
		$this->db->select('*');
		$this->db->from('tbl_category');

		$this->db->where('cat_id', $cat_id);

		$query = $this->db->get();
		return $query->row_array();
	}

	//update categories data into database
	public function update_category_info($cat_id, $data)
	{
		$this->db->where('cat_id', $cat_id);
		$this->db->update('tbl_category', $data);
	}

	//delete from databse
	public function delete_category($cat_id)
	{
		$this->db->where('cat_id', $cat_id);
		$this->db->delete('tbl_category');
	}
}