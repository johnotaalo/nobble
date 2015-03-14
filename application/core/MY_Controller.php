<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
// error_reporting(E_ALL ^ E_DEPRECATED);
class MY_Controller extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->module('template');
	}
}