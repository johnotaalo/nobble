<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_Dashboard extends MY_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_order_counts()
	{
		$query = $this->db->query("
			SELECT
			(SELECT count(order_id) FROM customer_order_details WHERE completed = 1 AND in_transit = 0) as completed,
			(SELECT count(order_id) FROM customer_order_details WHERE in_transit = 1 AND completed = 0) as in_transit,
			(SELECT count(order_id) FROM customer_order_details WHERE completed = 0 AND in_transit = 0) as pending,
			(SELECT count(order_id) FROM customer_order_details WHERE is_active = 0) as deleted,
			(SELECT count(order_id) FROM customer_order_details) as total_orders
			FROM customer_order_details LIMIT 1;
			");

		$result = $query->row();

		return $result;
	}

	function get_order_comparison(){
		$query = $this->db->query("
			SELECT
			(SELECT count(order_id) FROM customer_order_details WHERE DATE_FORMAT(order_date, '%Y-%m-%d') = DATE_FORMAT(subdate(NOW(),1), '%Y-%m-%d')) as yesterday,
			(SELECT count(order_id) FROM customer_order_details WHERE DATE_FORMAT(order_date, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d')) AS today
			FROM customer_order_details
			LIMIT 1
			");
		$result = $query->row();

		return $result;
	}

	function get_returns_comparison($when)
	{
		$where_clause = ' AND ';
		$where_clause .= ($when=='yesterday') ? "DATE_FORMAT(d.order_date, '%Y-%m-%d') = DATE_FORMAT(subdate(NOW(),1), '%Y-%m-%d')" : "DATE_FORMAT(d.order_date, '%Y-%m-%d') = DATE_FORMAT(NOW(), '%Y-%m-%d')";
		$query = $this->db->query("
			SELECT i.product_id, i.quantity * p.price AS TOTAL FROM products p, customer_order_details d, customer_order_items i WHERE p.product_id = i.product_id AND i.order_id = d.order_id".$where_clause."
			");
		// echo "SELECT i.product_id, i.quantity * p.price AS TOTAL FROM products p, customer_order_details d, customer_order_items i WHERE p.product_id = i.product_id AND i.order_id = d.order_id".$where_clause;
		$result = $query->result();

		return $result;
	}

	function get_blog_stats()
	{
		$date = date_create();
		date_sub($date, date_interval_create_from_date_string('30 days'));
		$from = date_format($date, 'Y-m-d');
		$to = date('Y-m-d');
		$query = $this->db->query("
			SELECT count(blog_id) as blog_counts,
			(SELECT count(blog_id) FROM blogs WHERE is_active = 1 AND published = 1 AND DATE_FORMAT(`published_on`, '%Y-%m-%d') BETWEEN '".$from."' AND '".$to."') as thirty_days
			FROM blogs WHERE is_active = 1
			AND published = 1
			");
		$result = $query->row();

		return $result;
	}

	function get_category_products_counts()
	{
		$query = $this->db->query("SELECT 
									(SELECT count(category_id) FROM  category WHERE is_active = 1) as categories, 
									(SELECT count(product_id) FROM products WHERE is_active = 1)as products
									FROM category");
		$result = $query->row();

		return $result;
	}

	function get_order_summary()
	{
		$query = $this->db->query("
			SELECT p.product_id, p.product_name, count(i.product_id) as order_counts, MAX(d.order_date) as latest_order_date FROM products p
			LEFT JOIN customer_order_items i ON p.product_id = i.product_id
			LEFT JOIN customer_order_details d ON i.order_id = d.order_id

			GROUP BY p.product_id
			ORDER BY latest_order_date DESC
			");
		$result = $query->result();

		return $result;
	}
}