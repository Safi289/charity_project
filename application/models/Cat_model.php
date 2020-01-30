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


	//data table
	public function make_query()
	{
		$this->db->select('*');
		$this->db->from('tbl_category');

		if(isset($_POST["search"]["value"]))
		{
			$this->db->like("cat_name", $_POST["search"]["value"]);
			$this->db->or_like("cat_id", $_POST["search"]["value"]);
		}

		if(isset($_POST["order"]))
		{	
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}

		else
		{
			$this->db->order_by("cat_id", "DESC");
		}
	}

	public function make_datatables()
	{
		$this->make_query();
		if($_POST["length"] != -1)
		{
			$this->db->limit($_POST["length"], $_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_filtered_data()
	{
		$this->make_query();
		$query = $this->db->get();
		return $query->num_rows(); 
	}

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_category');
		return $this->db->count_all_results();
	}
}