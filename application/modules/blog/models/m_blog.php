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

	function get_latest_blogs($limit = 5)
	{
		$query = $this->db->query("SELECT * FROM blogs WHERE is_active = 1 AND published = 1 ORDER BY published_on DESC LIMIT 5");

		$result = $query->result();

		return $result;
	}

	function get_all_published_blogs($limits)
	{
		$query = $this->db->query("SELECT * FROM blogs WHERE is_active = 1 AND published = 1 ORDER BY published_on DESC LIMIT " . $limits . ", 10");

		$result = $query->result();

		return $result;
	}

	function get_blog_titles()
	{
		$query = $this->db->query("SELECT t.topic_id, t.topic_name, t.description, t.is_active, (SELECT count(b.blog_id) as blogs FROM blogs b WHERE t.topic_id = b.topic_id) as blog_count FROM blog_topics t GROUP BY topic_name ORDER BY blog_count DESC");

		$result = $query->result();

		return $result;
	}

	function get_blog_details($blog_id)
	{
		$query = $this->db->query("SELECT * FROM blogs WHERE blog_id = " . $blog_id ." LIMIT 1");
		$result = $query->row();

		return $result;
	}

	function get_blog_by_id($blog_id)
	{
		$query = $this->db->query("SELECT * FROM blogs WHERE is_active = 1 AND published = 1 AND blog_id = " . $blog_id ." LIMIT 1");

		$result = $query->row();

		return $result;
	}

	function get_blog_by_id_all($blog_id)
	{
		$query = $this->db->query("SELECT * FROM blogs WHERE blog_id = " . $blog_id);

		$result = $query->row();

		return $result;
	}

	function updateblog()
	{
		// echo json_encode($this->input->post());
		$action = '';
		$update_data = $blog_ids = array();
		$counter = 0;
		$action = ($this->input->post('action_to_do') == 'publish') ? 'published' : 'is_active' ;
		foreach ($this->input->post() as $key => $val) {
			
			if (strpos($key, 'blog_id') !== FALSE) {
				$this->frags = explode("_", $key);
				$blog_ids[] = $val; 
			}
		}

		foreach ($blog_ids as $key => $value) {
			if($action == 'published')
			{
				$update_data[$counter]['published'] = 1;
				$single_update['published'] = 1;
			}
			else
			{
				$update_data[$counter]['is_active'] = 0;
				$single_update['is_active'] = 0;
			}

			$update_data[$counter]['blog_id'] = $value;

			$counter++;
		}

		if(count($blog_ids) == 1){

			$this->db->where('blog_id', $blog_ids[0]);
			$update = $this->db->update('blogs', $single_update);
		}
		else
		{
			$update = $this->db->update_batch('blogs', $update_data, 'blog_id');
		}

		$returned = ($update) ? true : false ;
		return $returned;
	}

	function get_topic_by_id($topic_id)
	{
		$query = $this->db->query("SELECT * FROM blog_topics WHERE topic_id = " . $topic_id);
		$result = $query->row();

		return $result;
	}

	function get_deactivated()
	{
		$query = $this->db->query("SELECT * FROM blogs WHERE is_active = 0");
		$result = $query->result();

		return $result;
	}

	function get_all_blogs()
	{
		$query = $this->db->get('blogs');
		$result = $query->result();

		return $result;
	}

	function update_blog_clean()
	{
		$update_data = array();
		foreach ($this->input->post() as $key => $value) {
			if($key != 'blog_id')
			{
				$update_data[$key] = $value;
			}
		}

		$this->db->where('blog_id', $this->input->post('blog_id'));
		$update = $this->db->update('blogs', $update_data);

		return $update;
	}
}