<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_Analytics extends MY_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_order_data($from, $to)
	{
		$query = $this->db->query("SELECT DATE_FORMAT(`order_date`, '%M %Y') AS order_dates, year(`order_date`) as Years, count(order_id) as counter
		FROM
		    customer_order_details
            WHERE date(`order_date`) BETWEEN '".$from."' AND '".$to."'
            GROUP BY order_dates
            ORDER BY order_date ASC");

		$result = $query->result();

		return $result;
	}

	function get_product_order_data($from, $to)
	{
		$query = $this->db->query("SELECT p.product_name, count(i.product_id) as product_count FROM products p, customer_order_items i, category c, customer_order_details d WHERE d.order_id = i.order_id AND p.is_active = 1 AND c.is_active = 1 AND p.category_id = c.category_id AND i.product_id = p.product_id
			GROUP BY p.product_id");

		$result = $query->result();

		return $result;
	}

	function get_order_data_one_week($from, $to)
	{
		$query = $this->db->query("SELECT DATE_FORMAT(`order_date`, '%D %M %Y') AS order_dates, year(`order_date`) as Years, count(order_id) as counter
		FROM
		    customer_order_details
            WHERE date(`order_date`) BETWEEN '".$from."' AND '".$to."'
            GROUP BY order_dates
            ORDER BY order_date ASC");

		$result = $query->result();

		return $result;
	}
}