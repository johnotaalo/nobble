<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
	}

	function index()
	{
		$data['list_item'] = 'dashboard';
		$data['content_view'] = 'dashboard/dashboard';
		$this->template->call_admin_template($data);
	}
}