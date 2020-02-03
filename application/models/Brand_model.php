<?php

class Brand_model extends CI_Model {
	
	//insert category data into database
	public function add_brand($data) {
		$this->db->insert('tbl_brand', $data);
	}

	//get brand data from database for view
	public function get_all_brand() {
		$this->db->select('*');
		$this->db->from('tbl_brand');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_brand_info($brand_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_brand');

		$this->db->where('brand_id', $brand_id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_brand_info($brand_id, $data)
	{
		$this->db->where('brand_id', $brand_id);
		$this->db->update('tbl_brand', $data);
	}


	public function delete_brand($brand_id)
	{
		$this->db->where('brand_id', $brand_id);
		$this->db->delete('tbl_brand');
	}
	
}