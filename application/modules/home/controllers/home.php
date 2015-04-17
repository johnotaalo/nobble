<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Home extends MY_Controller
{
	var $passdata;
	function __construct()
	{
		parent::__construct();
		$this->load->module('products');
		$this->load->module('blog');
		$this->load->module('comments');
	}

	function index()
	{
		$data['most_ordered'] = $this->most_ordered_products();
		$data['latest_blogs'] = $this->get_latest_blog_posts();
		$data['products'] = $this->products->get_products_home();
		$data['x_latest_products'] = $this->get_front_page_latest();
		$data['content_view'] = 'home/home';
		$this->template->call_front_end_template($data);
	}
	function old_index()
	{
		$this->passdata['recent_listing'] = $this->get_recent_products();
		$this->passdata['recent_blog'] = $this->get_latest_blog_posts();
		$this->load->view('home', $this->passdata);
	}

	function get_recent_products()
	{
		$recent_listing = '';
		$recents = $this->m_products->get_recent_products();
		$counter = 0;
		if($recents){
			foreach ($recents as $key => $value) {
				$latest_image = $this->m_products->get_latest_product_image_by_id($value['product_id']);
				$image_link = ($latest_image) ? $latest_image->image_path : base_url() . 'assets/images/no-image-available.jpg';
				$recent_listing .= '<li class="col-lg-3 design" data-id="id-'.$counter.'" data-type="web">';
				$recent_listing .= '<div class="item-thumbs">';
				$recent_listing .= '<!-- Fancybox - Gallery Enabled - Title - Full Image -->';
				$recent_listing .= '<a class="hover-wrap fancybox" data-fancybox-group="gallery" title="'.$value['product_name'].'" href="'.$image_link.'">';
				$recent_listing .= '<span class="overlay-img"></span><span class="overlay-img-thumb font-icon-plus"></span></a>';
				$recent_listing .= '<!-- Thumb Image and Description -->';
				$recent_listing .= '<img style = "width: 260px; height: 195px;" src="'.$image_link.'" alt="'.$value['description'].'<br/> Price: KSH. '.$value['price'].'">';
				$recent_listing .= '</div></li>';
				$counter++;
			}
		}
		else
		{
			$recent_listing .= '<h3>No products Yet</h3>';
		}

		return $recent_listing;
	}

	function get_front_page_latest()
	{
		$product_list = '';
		$products = $this->db->query("SELECT p.*, c.category_name FROM products p, category c WHERE p.is_active = 1 AND c.category_id = p.category_id ORDER BY added_on DESC LIMIT 3");
		$result = $products->result();

		if ($result) {
			foreach ($result as $key => $value) {
				$image = $this->m_products->get_latest_product_image_by_id($value->product_id);
				$image_path = ($image) ? $image->image_path : base_url() .'assets/images/no-image-available.jpg' ;
				// echo "<pre>";print_r($value);die;
				$product_list .= '<li>
					<a href="'.base_url().'products/view/'.$value->product_id.'">
						<img src="'.$image_path.'" alt="" title="" class="property_img">
					</a>
					<span class="price">Ksh. '.$value->price.'</span>
					<div class="property_details">
						<h1>
							<a href="'.base_url().'products/view/'.$value->product_id.'">'.$value->product_name.'</a>
						</h1>
						<div class = "row">
							<a href = "href="'.base_url().'products/view/'.$value->product_id.'" class = "btn btn-primary pull-right">View Product</a>
						</div>
					</div>
				</li>';
			}
		}
		else
		{
			$product_list = '<center>No Products Yet</center>';
		}

		return $product_list;
		
	}

	function get_latest_blog_posts($type = 'rows')
	{
		$recent_blogs = $list_blogs = '';

		$recent_blog_data = $this->m_blog->get_latest_blogs(4);
		if($recent_blog_data)
		{
			$counter = 0;
		foreach ($recent_blog_data as $blog) {
			$counter++;
			$row = ($counter == 2) ? 'row_2' : 'blog_1';
			$comments = $this->comments->get_comment_count($blog->blog_id)->verified;
			$recent_blogs .= '<div class="col-md-3 col-sm-6">
                        <article class="post-wrap">
                            <div class="post-media">
                                <div class="post-type"><i class="fa fa-picture-o"></i></div>
                                <div class="thumbnail no-border no-padding">
                                    <div class="media">
                                        <a class="media-link" href="'.base_url().'blog/read/'.$blog->blog_id.'">
                                            <img src="'.$blog->blog_cover.'" alt="" style = "height: 165px !important;"/>
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-header">
                                <div class="post-meta">'.date('m d, Y',strtotime($blog->published_on)).' : By <a href="#">Admin</a> : '.$comments.' <i class="fa fa-comments"></i></div>
                                <h2 class="post-title"><a href="'.base_url().'blog/read/'.$blog->blog_id.'">'.$blog->blog_name.'</a></h2>
                            </div>
                            <div class="post-body">
                                <div class="post-excerpt">
                                    '.implode(' ', array_slice(explode(' ', $blog->blog_content), 0, 10)).'...
                                </div>
                            </div>
                        </article>
                    </div>';
		}
		}
		else
		{
			$recent_blogs = $list_blogs = '<center><h3>No blog Posts yet</h3></center>';
		}

		$final = ($type == 'rows') ? $recent_blogs : $list_blogs;

		return $final;
	}

	function most_ordered_products()
	{
		$most_ordered = '';
		$products = $this->m_products->get_most_ordered(3);
		if($products)
		{
			// echo "<pre>";print_r($products);die;
			foreach ($products as $key => $value) {
				$image = $this->m_products->get_latest_product_image_by_id($value->product_id);
				$image_path = ($image) ? $image->image_path : base_url() .'assets/images/no-image-available.jpg' ;
				$most_ordered .= '<div class="col_1_of_3 span_1_of_3">
							<div class="shop-holder1">
		                        <a href="'.base_url().'products/view/'.$value->product_id.'"><img src="'.$image_path.'" class="img-responsive" alt="'.$value->product_name.'" style = "width: 182px; height: 137px;"/></a>
		                    </div>
		                    <div class="shop-content" style="height: 80px;">
		                            <h3><a href="'.base_url().'products/view/'.$value->product_id.'">'.$value->product_name.'</a></h3>
		                            <span><span class="amount">Ksh. '.$value->price.'</span></span>
		                    </div>
						</div>';
			}
		}
		else
		{
			$most_ordered .= '<center>No Products Yet</center>';
		}

		return $most_ordered;
	}
}					