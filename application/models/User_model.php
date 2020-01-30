<?php

class User_model extends CI_Model {
	
	//insert product data into database
	public function add_user($data) 
	{
		$this->db->insert('tbl_users', $data);
	}

	public function get_all_user()
	{
		 $this->db->select('*');
		 $this->db->from('tbl_users');

		 $query = $this->db->get();
		return $query->result_array();
	}

	public function user_info($id) {
		 $this->db->select('*');
		 $this->db->from('tbl_users');

		 $this->db->where('id', $id);

		 $query = $this->db->get();
		return $query->row_array();
	}

	public function update_user_info($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_users', $data);
	}

	public function delete_user($id)
	{
		$this->db->where('id', $id);

		$this->db->delete('tbl_users');
	}


	var $table         = "tbl_users";
	var $select_column = array("id", "name", "email", "user_mobile", "user_address", "user_type", "user_image");
	var $order_column  = array(null, "name", "email", null, null); 


	//call from this model
	public function query()
	{
		$this->db->select($this->select_column);
		$this->db->from($this->table);

		// if($this->input->post('search', 'value'))
		// {
		// 	$this->db->like("name", $this->input->post('search', 'value'));
		// 	$this->db->or_like("id", $this->input->post('search', 'value'));
		// }

		if( $this->input->post('order'))
		{	
			$this->db->order_by($this->order_column[$this->input->post('order', '0', 'column')], $this->input->post('order', '0', 'dir'));
		}

		else
		{
			$this->db->order_by("id", "ASC");
		}
	}


	// call from controllers
	public function datatables()
	{
		$this->query();

		$this->db->limit($this->input->post('length'), $this->input->post('start'));

		$query = $this->db->get();

		return $query->result();

	}


	public function get_filtered_data()
	{
		$this->query();
		$query = $this->db->get();
		return $query->num_rows(); 
	}

	public function get_all_data()
	{
		$this->db->select($this->select_column);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	

}