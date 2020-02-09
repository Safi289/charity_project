<?php

class Pro_model extends CI_Model {
	
	//insert product data into database
	public function add_pro($data) 
	{
		$this->db->insert('tbl_product', $data);
	}
	

	public function get_all_product()
	{

		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->join('tbl_category', 'tbl_product.product_category = tbl_category.cat_id', 'LEFT');
		$this->db->join('tbl_brand', 'tbl_product.product_brand = tbl_brand.brand_id', 'LEFT');
		$this->db->limit('3');

		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_all_product_count()
	{

		$this->db->select('count(product_id) as total_row');
		$this->db->from('tbl_product');
		$this->db->join('tbl_category', 'tbl_product.product_category = tbl_category.cat_id', 'LEFT');
		$this->db->join('tbl_brand', 'tbl_product.product_brand = tbl_brand.brand_id', 'LEFT');
		

		$query = $this->db->get();
		$result= $query->row_array();

		//echo '<pre>'; print_r($result); die;
		return $result['total_row'];
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

	public function get_record($row_no, $per_page)
	{
		$this->db->select('*');
		$this->db->from('tbl_product');
		$this->db->join('tbl_category', 'tbl_product.product_category = tbl_category.cat_id', 'LEFT');
		$this->db->join('tbl_brand', 'tbl_product.product_brand = tbl_brand.brand_id', 'LEFT');
		$this->db->limit($row_no, $per_page);

		$query = $this->db->get();       	
		return $query->result_array();  
	}

	public function get_record_count() {
    	$this->db->select('count(*) as allcount');
      	$this->db->from('tbl_product');
      	$this->db->join('tbl_category', 'tbl_product.product_category = tbl_category.cat_id', 'LEFT');
		$this->db->join('tbl_brand', 'tbl_product.product_brand = tbl_brand.brand_id', 'LEFT');

      	$query = $this->db->get();
      	$result = $query->result_array();      
      	return $result[0]['allcount'];
    }
 
}