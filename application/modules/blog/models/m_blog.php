<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_Blog extends MY_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function addblog()
	{
		$insert_data = $this->input->post();

		$insert = $this->db->insert('blogs', $insert_data);

		return $insert;
	}

	function add_topic()
	{
		$insert_data = $this->input->post();

		$insert = $this->db->insert('blog_topics', $insert_data);

		return $insert;
	}

	function gettopic($is_active = NULL)
	{
		$query = ($is_active) ? $this->db->get_where('blog_topics', array('is_active'=> $is_active)) : $this->db->get('blog_topics') ;

		$result = $query->result_array();

		return $result;
	}
}