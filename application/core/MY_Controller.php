<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
// error_reporting(E_ALL ^ E_DEPRECATED);
class MY_Controller extends MX_Controller
{
	var $pass_data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->module('template');
		$this->load->module('upload');
	}

	function load_page($view)
	{
		$view = str_replace("_","/",$view);
		$this->load->view($view);
	}
}