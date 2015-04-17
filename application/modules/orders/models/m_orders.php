<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_Orders extends MY_Model{
	function __construct()
	{
		parent::__construct();
	}

	function get_order_details()
	{
		$return_data = array();
		$filter_array = array(
			'all' => '',
			'pending' => 'WHERE completed = 0 AND in_transit = 0',
			'in_transit' => 'WHERE completed = 0 AND in_transit = 1',
			'completed' => 'WHERE completed = 1 AND in_transit = 0',
			'is_active' => 'WHERE is_active = 0'
			);

		foreach ($filter_array as $key => $value) {
			$query = $this->db->query("SELECT * FROM customer_order_details " .$value ." ORDER BY order_date DESC");

			$result = $query->result();

			$return_data[$key] = $result;
		}

		return $return_data;
	}

	function get_order_details_by_id($order_id)
	{
		$query = $this->db->query("
			SELECT * FROM customer_order_details
			WHERE order_id = ".$order_id."
			");
		$result = $query->row();

		return $result;
	}

	function get_order_items($order_id)
	{
		$query = $this->db->query("
			SELECT p.product_name, i.quantity, p.price, (p.price * i.quantity) as total FROM  customer_order_items i
			JOIN customer_order_details d ON i.order_id = d.order_id
			JOIN products p ON p.product_id = i.product_id
			WHERE d.order_id = " .$order_id);

		$result = $query->result();

		return $result;
	}

	function process_order($type, $order_id)
	{
		$update_data = array();
		switch ($type) {

			case 'complete':
				$update_data['completed'] = 1;
				$update_data['in_transit'] = 0;
				break;

			case 'delivery':
				$update_data['completed'] = 0;
				$update_data['in_transit'] = 1;
				break;
			case 'cancel':
				$update_data['is_active'] = 0;
				break;
			case 'restore':
				$update_data['is_active'] = 1;
				break;
		}

		$this->db->where('order_id', $order_id);
		$update = $this->db->update('customer_order_details', $update_data);

		return $update;
	}
}