<?php

class Order_model extends CI_Model {
	
	//insert product data into database
	public function add_order_data($data) 
	{
		$this->db->insert('tbl_order', $data);
		return $this->db->insert_id();
	}

	public function add_order_detail($data)
	{
		$this->db->insert('tbl_order_detail', $data);
	}

	public function insert_customer($data) {
		$this->db->insert('tbl_billing_detail', $data);
		return $this->db->insert_id();
	}

	public function get_all_order()
	{
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->join('tbl_billing_detail', 'tbl_order.user_id = tbl_billing_detail.billing_id', 'LEFT');
		// $this->db->join('tbl_brand', 'tbl_product.product_brand = tbl_brand.brand_id', 'LEFT');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function order_info($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_order_detail');

		$this->db->join('tbl_product', 'tbl_order_detail.item_id = tbl_product.product_id');
		$this->db->join('tbl_order', 'tbl_order.id = tbl_order_detail.order_id', 'LEFT');
		$this->db->join('tbl_billing_detail', 'tbl_billing_detail.billing_id = tbl_order.user_id', 'LEFT');
		
		$this->db->where('order_id', $id);

		$query = $this->db->get();
		return $query->result_array();

	}

 
}