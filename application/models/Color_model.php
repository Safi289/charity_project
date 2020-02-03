<?php

class Color_model extends CI_Model {
	
	//insert category data into database
	public function add_color($data) {
		$this->db->insert('tbl_color', $data);
	}

	//get brand data from database for view
	public function get_all_color() {
		$this->db->select('*');
		$this->db->from('tbl_color');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_color_info($color_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_color');

		$this->db->where('color_id', $color_id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_color_info($color_id, $data)
	{
		$this->db->where('color_id', $color_id);
		$this->db->update('tbl_color', $data);
	}


	public function delete_color($color_id)
	{
		$this->db->where('color_id', $color_id);
		$this->db->delete('tbl_color');
	}
	
}