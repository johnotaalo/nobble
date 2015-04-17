<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_Contact extends MY_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function submit_contact()
	{
		$input_data = $this->input->post();

		$insertion = $this->db->insert('contact', $input_data);

		return $insertion;
	}
}