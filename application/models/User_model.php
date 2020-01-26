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

}