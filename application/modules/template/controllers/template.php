<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Template extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function call_admin_template()
	{
		echo "Admin Template";die;
	}
}