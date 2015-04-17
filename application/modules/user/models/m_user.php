<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends MY_model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function authenticate()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$hash_password = md5($password);

		// $query = $this->db->get_where('user', array('username' => $username, 'password' => $hash_password), 1);
		$query = $this->db->query("SELECT * FROM user WHERE username = '".$username."' AND password = '".$hash_password."' AND active = 1");

		$result = $query->row();

		return $result;
	}

	function addadmin()
	{
		$insert_data = $this->input->post();

		$insertion = $this->db->insert('admin', $insert_data);

		return $insertion;
	}

	function add_user($username, $admin_id)
	{
		$password = md5('12345');
		$insert_data = array('username' => $username, 'password' => $password, 'admin_id' => $admin_id);

		$insertion = $this->db->insert('user', $insert_data);

		return $insertion;
	}

	function get_admin_data($admin_id)
	{
		$where = array('admin_id' => $admin_id);

		$query = $this->db->get_where('admin', $where, 1);

		$result = $query->row();

		return $result;
	}
}