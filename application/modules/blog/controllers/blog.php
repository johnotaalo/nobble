<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Blog extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_blog');
		$this->pass_data['list_item'] = 'blog';
	}

	function index()
	{
		$this->pass_data['blog_list'] = $this->create_blog_list();
		$this->pass_data['content_view'] = 'blog/blog_list';
		$this->template->call_admin_template($this->pass_data);
	}

	function create_blog()
	{
		$message = array();
		$upload_data = $this->upload->uploadanimage('blog_cover', 'uploads/blog_covers');
		$_POST['blog_cover'] = $upload_data['path'];
		$_POST['published_on'] = date('Y-m-d H:i:s');
		$saving = $this->m_blog->addblog();

		if ($saving) {
			$message['type'] = 'Success';
			$message['message'] = 'Successfully saved blog';
		}
		else
		{
			$message['type'] = 'Failed';
			$message['message'] = 'Failed to upload blog! Try Again!!!';
		}

		echo json_encode($message);
	}

	function add_topic()
	{
		$message = array();
		$added = $this->m_blog->add_topic();

		if ($added) {
			$message['type'] = 'Success';
		}
		else
		{
			$message['type'] = 'Failed';
		}

		echo json_encode($message);
	}

	function createtopiclist($type, $is_active)
	{
		$select = $grid = $table = $return_data = '';

		$topics = $this->m_blog->gettopic($is_active);
		$select = '<option value = "0">Select A Topic</option>';

		if ($topics) {
			foreach ($topics as $key => $value) {
				$select .= '<option value = "'.$value['topic_id'].'">'.$value['topic_name'].'</option>';
			}
		}

		switch ($type) {
			case 'select':
				$return_data = $select;
				break;
			
			default:
				# code...
				break;
		}

		echo $return_data;
	}
	function create_blog_list()
	{

	}
}