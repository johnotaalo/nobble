<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_Customercart extends My_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function complete()
	{
		$insert_data = $this->input->post();
		$query = $this->db->insert('customer_order_details', $insert_data);

		if ($query) {
			return mysql_insert_id();
		}
		else
		{
			return FALSE;
		}
	}

	function save_ordered_items($ordered_items)
	{
		if(count($ordered_items) > 1)
		{
			$insertion = $this->db->insert_batch('customer_order_items', $ordered_items);
		}
		else
		{
			$insertion = $this->db->insert('customer_order_items', $ordered_items[0]);
		}

		if ($insertion) {
			return mysql_insert_id();
		}
		else
		{
			return FALSE;
		}
	}
}