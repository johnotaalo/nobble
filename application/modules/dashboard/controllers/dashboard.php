<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->module('user');
		$this->user->check_login();
		$this->load->model('m_dashboard');

		$this->load->module('products');
		$this->load->module('blog');
		$this->load->module('orders');
	}

	function index()
	{
		$data['product_list'] = $this->recent_products();
		$data['order_summary'] = $this->order_summary();
		$data['cat_pro_counts'] = $this->category_products_counts();
		$data['blog_stats'] = $this->blog_stats();
		$data['today_returns'] = $this->returns_comparison();
		$data['today_data'] = $this->order_comparison();
		$data['order_counts'] = $this->get_order_counts();
		$data['list_item'] = 'dashboard';
		$data['content_view'] = 'dashboard/dashboard';
		$this->template->call_admin_template($data);
	}

	function categories()
	{
		$this->products->categories();
	}

	function category($category_id = NULL)
	{
		(isset($category_id)) ? $this->products->category($category_id) : $this->products->category();
	}

	function product($product_id = NULL)
	{
		$this->products->product($product_id);
	}

	function blog()
	{
		$this->blog->load_blogger();
	}

	function orders()
	{
		$this->orders->order();
	}

	function get_order_counts()
	{
		$count_data = $this->m_dashboard->get_order_counts();

		return $count_data;
	}

	function order_comparison()
	{
		$icon = $color = '';
		$comparison = $this->m_dashboard->get_order_comparison();
		$yesterday = $comparison->yesterday;
		$today = $comparison->today;
		$total = $yesterday + $today;
		$difference = $today - $yesterday;

		$percentage = ($total != 0) ? $difference / $total * 100 : 0 ;

		if($percentage < 0){
			$percentage *= -1;
			$icon = 'caret-down';
			$color = 'red';
		}
		else if($percentage > 0)
		{
			$icon = 'caret-up';
			$color = 'green';
		}
		else
		{
			$icon = 'minus';
			$color = 'yellow';
		}
		
		$comparison_div = '<span class="description-percentage text-'.$color.'"><i class="fa fa-'.$icon.'"></i> '.$percentage.'%</span>
            <h5 class="description-header">'.$today.'</h5>';

        return $comparison_div;
	}

	function returns_comparison()
	{
		$total_today = $total_yesterday = $total = 0;
		$icon = $color = '';
		$yesterday_comparison = $this->m_dashboard->get_returns_comparison('yesterday');
		$today_comparison = $this->m_dashboard->get_returns_comparison('today');

		if ($today_comparison) {
			foreach ($today_comparison as $key => $value) {
				$total_today += $value->TOTAL;
			}
		}

		if($yesterday_comparison)
		{
			foreach ($yesterday_comparison as $key => $value) {
				$total_yesterday += $value->TOTAL;
			}
		}

		$total = $total_today + $total_yesterday;
		$difference = $total_today - $total_yesterday;
		$percentage = ($total != 0) ? $difference / $total * 100 : 0 ;		

		if($percentage < 0){
			$percentage *= -1;
			$icon = 'caret-down';
			$color = 'red';
		}
		else if($percentage > 0)
		{
			$icon = 'caret-up';
			$color = 'green';
		}
		else
		{
			$icon = 'minus';
			$color = 'yellow';
		}

		$comparison_div = '<span class="description-percentage text-'.$color.'"><i class="fa fa-'.$icon.'"></i> '.round($percentage, 1).'%</span>
            <h5 class="description-header">Ksh. '.$total_today.'</h5>';

        return $comparison_div;
	}

	function blog_stats()
	{
		$blog_stats = array();
		$blog_data = $this->m_dashboard->get_blog_stats();

		$percentage = ($blog_data->blog_counts > 0) ? $blog_data->thirty_days / $blog_data->blog_counts * 100 : 0;
		$formatted_percentage = ($percentage < 0) ? $percentage *=1 : $percentage;

		$blog_stats['blog_percentage_increase_number'] = $percentage;
		$blog_stats['blog_numbers'] = $blog_data->blog_counts;
		$blog_stats['blog_percentage_increase_description'] = ($percentage < 0) ? $percentage . ' decrease' : $percentage . ' increase';

		return $blog_stats;
	}

	function category_products_counts()
	{
		$category_products_counts = array();
		$category_products_counts = $this->m_dashboard->get_category_products_counts();
		return $category_products_counts;
	}

	function order_summary()
	{
		$summary = $this->m_dashboard->get_order_summary();

		// echo "<pre>";print_r($summary);die;

		$dates = $counts = $overall = array();
		$overall['oldest'] = end($summary);
		foreach ($summary as $key => $value) {
			$counts[$value->product_id] = $value->order_counts;
			if ($key == 0) {
				$overall['latest'] = $value;
			}
		}

		asort($counts);
		$least_ordered = key($counts);
		arsort($counts);
		$most_ordered = key($counts);
		$counts = array();

		foreach ($summary as $key => $value) {
			if ($value->product_id == $least_ordered) {
				$overall['least'] = $value;
			}
			else if($value->product_id == $most_ordered)
			{
				$overall['most'] = $value;
			}
		}

		foreach ($overall as $key => $value) {
			if($value->latest_order_date == '')
			{
				$value->latest_order_date = 'Never Ordered';
			}

			if(strtotime($value->latest_order_date))
			{
				$value->latest_order_date = date('dS F, Y', strtotime($value->latest_order_date));
			}

			if($value->order_counts == 0)
			{
				$value->order_counts = 'Never Ordered';
			}
			else
			{
				$value->order_counts = $value->order_counts . ' times';
			}
		}
	return $overall;
	}

	function recent_products()
	{
		$product_list = '';
		$products = $this->m_products->get_recent_products();
		if ($products) {
			foreach ($products as $key => $value) {
				$images = $this->m_products->get_product_images($value['product_id']);
				$image = ($images) ? $images[0]['image_path'] : base_url() .'assets/images/no-image-available.jpg';
				$product_list .= '<li class="item">
              <div class="product-img">
                <img src="'.$image.'" alt="Product Image" style = "width: 50px; height: 50px;">
              </div>
              <div class="product-info">
                <a href="'.base_url().'dashboard/product/'.$value['product_id'].'" class="product-title">'.$value['product_name'].'<span class="label label-warning pull-right">Ksh. '.$value['price'].'</span></a>
                <span class="product-description">
                '.$value['description'].'
                </span>
              </div>
            </li><!-- /.item -->';
			}
		}
		else
		{
			$product_list .= '<li class = "item">No product uploaded</li>';
		}

		return $product_list;
	}

	function users()
	{
		$this->user->user_management();
	}
}

//date('dS F, Y', strtotime($value->latest_order_date));