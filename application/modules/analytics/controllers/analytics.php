<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Analytics extends MY_Controller
{
	var $graph_data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_analytics');
	}

	function get_order_data($range)
	{
		$message = array();
		$range = str_replace('_', ' ', $range);
		$date = date_create();
		date_sub($date, date_interval_create_from_date_string($range));
		$from = date_format($date, 'Y-m-d');
		$to = date('Y-m-d');

		$data = $this->m_analytics->get_order_data($from, $to);
		// echo count($data);die;
		if($range == '1 months')
		{
			$date = date_create();
			$range = '1 week';
			date_sub($date, date_interval_create_from_date_string($range));
			$from = date_format($date, 'Y-m-d');
			$data = $this->m_analytics->get_order_data_one_week($from, $to);
		}
		else if(count($data) == 1 && $range != '1 months')
		{
			$date = date_create();
			$range = '30 days';
			date_sub($date, date_interval_create_from_date_string($range));
			$from = date_format($date, 'Y-m-d');
			$data = $this->m_analytics->get_order_data_one_week($from, $to);
		}

		foreach ($data as $key => $value) {
			$this->graph_data["labels"][] = $value->order_dates;
			$this->graph_data["datasets"]["data"][]= $value->counter;
		}

		$message['range']['from'] = $from;
		$message['range']['to'] = $to;
		$message['graph_data'] = $this->graph_data;
		echo json_encode($message, JSON_NUMERIC_CHECK);
	}

	function product_order_distribution($range)
	{
		$message = array();
		$pie_data = array();
		$range = str_replace('_', ' ', $range);
		$date = date_create();
		date_sub($date, date_interval_create_from_date_string($range));
		$from = date_format($date, 'Y-m-d');
		$to = date('Y-m-d');

		$data = $this->m_analytics->get_product_order_data($from, $to);
		$row = array();
		foreach ($data as $product_orders) {
			$row[0] = $product_orders->product_name;
			$row[1] = $product_orders->product_count;
			array_push($pie_data, $row);
			// $pie_data[][$product_orders->product_name] = $product_orders->product_count;
		}

		print json_encode($pie_data, JSON_NUMERIC_CHECK);
	}
}