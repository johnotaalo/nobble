<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Template extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->module('customercart');
		$this->load->module('home');
	}

	function call_admin_template($data = NULL)
	{
		$this->load->view('template/admin_template', $data);
	}

	function call_front_end_template($data = NULL)
	{
		$data['blog_list'] = $this->home->get_latest_blog_posts('list_blogs');
		$data['cart_items'] = $this->customercart->cart_items(2);
		$data['recommended'] = $this->products->get_recommended_drugs();
		$data['cheapest'] = $this->products->create_cheapest_product();
		$data['most_ordered'] = $this->products->create_most_ordered_list();
		$data['product_listing'] = $this->pass_data['product_listing'];
		$data['latest_products'] = $this->pass_data['latest_products'];
		$this->load->view('template/front_end_template', $data);
	}
}