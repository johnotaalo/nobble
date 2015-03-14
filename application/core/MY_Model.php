<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
// error_reporting(E_ALL ^ E_DEPRECATED);
class MY_Model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$em = $this->doctrine->em;
	}
}