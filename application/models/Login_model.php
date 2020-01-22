<?php

class Login_model extends CI_Model {
	
	public function chkUser($email, $password) {
		$this->db->select('*');
		$this->db->from('tbl_users');

		$this->db->where('email', $email);
		$this->db->where('password', md5($password));

		$query = $this->db->get();
		return $query->row_array();
	}
}