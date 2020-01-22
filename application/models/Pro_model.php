<?php

class Pro_model extends CI_Model {
	
	//insert product data into database
	public function add_pro($data) 
	{
		$this->db->insert('tbl_product', $data);
	}
	

	public function get_all_product()
	{
		// $this->db->select('*');
		// $this->db->from('tbl_product');

		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->join('tbl_category', 'tbl_product.product_category = tbl_category.cat_id', 'LEFT');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_product_info($product_id) {

		// $this->db->select('*');
		// $this->db->from('tbl_product');

		$this->db->select('*');
		$this->db->from('tbl_product');

		$this->db->where('product_id', $product_id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_product_info($product_id, $data)
	{
		$this->db->where('product_id', $product_id);
		$this->db->update('tbl_product', $data);
	}

	public function delete_product($product_id)
	{
		$this->db->where('product_id', $product_id);
		$this->db->delete('tbl_product');
	}
 
}