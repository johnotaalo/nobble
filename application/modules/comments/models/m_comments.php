<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_Comments extends MY_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function submit_comment()
	{
		$post_data = $this->input->post();

		$insertion = $this->db->insert('comments', $post_data);

		return $insertion;
	}

	function get_comment_count($comment_blog_id = NULL)
	{
		$filter_statement = '';
		if (isset($comment_blog_id)) {
			$filter_statement = ' AND comment_blog_id = ' .$comment_blog_id;
		}
		$query = $this->db->query("SELECT
			(SELECT count(comment_id) FROM comments WHERE verified = 1 AND is_active = 1 ".$filter_statement.") AS verified,
			(SELECT count(comment_id) FROM comments WHERE verified = 0 AND is_active = 1 ".$filter_statement.") AS not_verified
			FROM comments LIMIT 1");

		$result = $query->row();

		return $result;
	}

	function get_all_comments()
	{
		$query = $this->db->query("SELECT * FROM comments");
		$result = $query->result();

		return $result;
	}

	function get_comment_by_id($comment_id)
	{
		$query = $this->db->query("SELECT * FROM comments WHERE comment_id = " . $comment_id);
		$result = $query->row();

		return $result;
	}
}