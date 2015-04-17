<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Products extends MY_Controller
{
	var $list_item = 'products';
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_products');
		$this->pass_data['list_item'] = 'products';
		$this->load->library('cart');

	}

	function index($category_id = NULL)
	{
		if ($category_id) {
			$data['category_details'] = $this->m_products->get_category_by_id($category_id);
		}
		$products = ($category_id) ? $this->m_products->get_active_products_by_category($category_id) : $this->m_products->get_all_products();
		$data['products_count'] = count($products);
		$data['product_list'] = $this->create_product_list_front($category_id);
		$data['sidebar'] = $this->create_sidebar_content($category_id);
		$data['products_list'] = $this->create_product_by_category($category_id);
		$data['categories'] = $this->create_category_list();
		$data['content_view'] = 'home/products';
		$this->template->call_front_end_template($data);
	}

	function view($product_id)
	{
		$pd = $this->get_product_details_($product_id);
		// echo "<pre>";print_r($pd);die;
		$carousel_indicators = $carousel_inner = $main_image = $recent_listing = '';

		$product_details = $this->m_products->get_product_by_id($product_id);
		// echo "<pre>";print_r($product_details);die;
		
		$data['related_product'] = $this->related_products($product_id);
		$data['main_image'] = $main_image;
		// $data['carousel_indicators'] = $carousel_indicators;
		$data['carousel_inner'] = $carousel_inner;
		$data['product_details'] = $pd;
		$data['content_view'] = 'home/product_view';
		$this->template->call_front_end_template($data);
	}


	function categories()
	{
		$this->pass_data['category_list'] = $this->createcategorylist();
		$this->pass_data['content_view'] = 'products/products_view';
		$this->template->call_admin_template($this->pass_data);
	}

	function addcategory()
	{
		$insertion = $this->m_products->addcategory();

		if($insertion)
		{
			$category_id = mysql_insert_id();
			redirect(base_url().'dashboard/category/'.$category_id);
		}
	}

	function createcategorylist($type = NULL)
	{
		$result_category = array();
		$category_list = '';
		$categories = $this->m_products->get_all_categories();

		if ($categories) {
			foreach ($categories as $key => $value) {
				$category_list .= '<div class = "col-md-2" style = "padding: 7px;">
				<a class = "action" href= "'.base_url().'dashboard/category/'.$value['category_id'].'"><center><div class = "folder">
				<i class = "ion ion-ios-folder" style = "font-size: 6em;"></i>

				<p style = "font-size: 110%;">'.$value['category_name'].'</p>
				</div>
				</center></a>
				</div>';
			}
		}

		if($type != 'ajax_search'){
			return $category_list;
		}
		else
		{
			$result_category['category_list'] = $category_list;
			$result_category['result_count'] = count($categories);

			echo json_encode($result_category);
		}
	}

	function search($type = NULL, $search_parameter = NULL)
	{
		$return_message = array();
		$category_list = '';
		if ($type == 'ajax_search') {
			$result = $this->m_products->search_category($search_parameter);

			if ($result) {
				foreach ($result as $key => $value) {
					$category_list .= '<div class = "col-md-2" style = "padding: 7px;">
				<a class = "action" href= "'.base_url().'dashboard/category/'.$value['category_id'].'"><center><div class = "folder">
				<i class = "ion ion-ios-folder" style = "font-size: 6em;"></i>

				<p style = "font-size: 110%;">'.$value['category_name'].'</p>
				</div>
				</center></a>
				</div>';
				}
			}
			else
			{
				$category_list .= '<center>No Results Found</center>';
			}

			$return_message['category_list'] = $category_list;
			$return_message['result_count'] = count($result);

			echo json_encode($return_message);
		}
		else
		{
			$search_parameter = $this->input->post('search_product');
			$result = $this->m_products->search_category($search_parameter);

			if ($result) {
				foreach ($result as $key => $value) {
					$category_list .= '<div class = "col-md-2" style = "padding: 7px;">
				<a class = "action" href= "'.base_url().'dashboard/category/'.$value['category_id'].'"><center><div class = "folder">
				<i class = "ion ion-ios-folder" style = "font-size: 6em;"></i>

				<p style = "font-size: 110%;">'.$value['category_name'].'</p>
				</div>
				</center></a>
				</div>';
				}
			}
			else
			{
				$category_list .= '<center>No Results Found</center>';
			}

			$return_message['category_list'] = $category_list;
			$return_message['result_count'] = count($result);

			echo json_encode($return_message);
		}
	}

	function create_category_list()
	{
		$category_list = '';
		$categories = $this->m_products->get_all_categories();

		if ($categories) {
			$counter = 1;
			foreach ($categories as $key => $value) {
				if($counter <= 5){
					$category_list .= '<li><a href = "'.base_url().'products/index/'.$value['category_id'].'">'.$value['category_name'].'</a></li>';
				}
				$counter++;
			}
		}

		return $category_list;
	}

	function category($category_id = NULL)
	{
		$product_listing = '';
		$this->pass_data['category_details'] = $this->m_products->get_category_by_id($category_id);
		$this->pass_data['products_output'] = ($category_id) ? $this->create_products_listing('table', $category_id) : $this->create_products_listing('table');
		$this->pass_data['product_listing'] = $product_listing;
		$this->pass_data['content_view'] = 'products/category';
		$this->session->set_userdata('category_id', $category_id);
		$this->template->call_admin_template($this->pass_data);
	}
	function ajax_add_category()
	{
	}

	function addproduct()
	{
		$category_id = $this->session->userdata('category_id');
		$_POST['category_id'] = $category_id;

		$insertion = $this->m_products->addproduct();

		if($insertion)
		{
			redirect(base_url().'dashboard/product/' . mysql_insert_id());
		}
	}

	function product($product_id = NULL)
	{
		$this->pass_data['product_details'] = ($this->get_product_details($product_id)) ? $this->get_product_details($product_id) : FALSE ;
		$this->pass_data['category'] = $this->m_products->get_product_category($this->get_product_details($product_id)->category_id);
		$this->pass_data['product_images'] = $this->create_product_image_list('grid', $product_id);
		$this->pass_data['content_view'] = 'products/product_page';
		$this->template->call_admin_template($this->pass_data);
	}

	function create_products_listing($type = NULL, $category_id = NULL)
	{
		// echo $category_id;die;
		$product_listing = '';
		$product_table = $product_grid = $product_list = '';
		$products = $this->m_products->get_product_by_category($category_id);
		$product_table = '<table class = "table table-bordered">
			<thead>
			<th>Product Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Edit</th>
			<th>Delete</th>
			</thead>
			<tbody>';
		if ($products){
			foreach ($products as $key => $value) {
				$product_table .= '<tr>';
				$product_table .= '<td>'.$value['product_name'].'</td>'; 
				$product_table .= '<td>'.$value['description'].'</td>';
				$product_table .= '<td>'.$value['price'].'</td>';
				if($value['is_active'] == 1){
					$product_table .= '<td><a href = "'.base_url('dashboard/product').'/'.$value['product_id'].'"><i class = "fa fa-pencil"></i> Edit</a></td>';
					$product_table .= '<td><a href = "'.base_url('products/activation/product/deactivate').'/'.$value['product_id'].'" class = "edit-button"><i class = "fa fa-trash"></i>&nbsp;Delete</a></td>';
				}
				else
				{
					$product_table .= '<td style = "color: red;"><i class = "ion ion-ios-close"></i>&nbsp;Restore First</td>';
					$product_table .= '<td><a href = "'.base_url('products/activation/product/activate').'/'.$value['product_id'].'" class = "edit-button"><i class = "fa fa-refresh"></i>&nbsp;Restore</a></td>';
				}
				$product_table .= '</tr>';
			}
			
		}
		$product_table .= '</tbody></table>';

		switch ($type) {
			case 'table':
				$product_listing = $product_table;
				break;
			
			case 'list':
				$product_listing = $product_list;
				break;
			default:
				# code...
				break;
		}
		return $product_listing;
	}

	function get_product_details($product_id)
	{
		$product_details = $this->m_products->get_product_by_id($product_id);
		if ($product_details) {
			return $product_details;
		}
		else
		{
			$product_details = FALSE;
		}
	}

	function create_product_image_list($type = NULL, $product_id = NULL)
	{
		$images_table = $images_grid = '';
		$product = $this->get_product_details($product_id);
		$product_images = $this->m_products->get_product_images($product_id);
		if($product_images)
		{
			$img_counter = 1;
			foreach ($product_images as $key => $value) {
				$images_grid .= '<div class = "product-image-box">';
				$images_grid .= '<div class = "product-image-container">';
				$images_grid .= '<span class = "corner"></span>';
				$images_grid .= '<div class = "image">';
				$images_grid .= '<img alt = "'.$product->product_name.'_'.$img_counter.'" src = "'.$value['image_path'].'" class = "img-responsive">';
				$images_grid .= '</div>';
				$images_grid .= '<div class = "image-actions">';
				$images_grid .= '<p>Added on: '.date('d-M-Y', strtotime($value['added_on']));
				if($value['is_active'] == 1){
					$images_grid .= '<a href = "#" class = "pull-right" data-id = "'.$value['image_id'].'" action = "delete-product"><i class = "ion ion-android-delete"></i> Delete This</a>';
				}
				else{
					$images_grid .= '<a href = "#" class = "pull-right" data-id = "'.$value['image_id'].'" action = "restore-product"><i class = "fa fa-refresh"></i> Restore</a>';
				}
				$images_grid .= '</p></div>';
				$images_grid .= '</div>';
				$images_grid .= '</div>';
			}
		}
		else
		{
			$images_grid .= '<div class = "nodata">
			<center><i class = "ion-android-cancel fa-5x" style = "color: #e74c3c;"></i>
			<h2 style = "margin: 0 0 10px 0;">No images found!</h2>
			<a href = "#" class = "btn btn-flat bg-olive call_dropzone" data-id = "'.$product_id.'">Add some images</a>
			</center>
			</div>';
		}

		return $images_grid;
	}

	function upload_product_photos()
	{
		$pictures_array = array();
		$ds = '/';
		$store_folder = 'uploads/products';
		if(!empty($_FILES))
		{
			foreach ($_FILES as $key => $value) {
				foreach ($value as $k => $v) {
					$counter = 0;
					foreach ($v as $offset => $picture_detail) {
						$pictures_array[$counter][$k] = $picture_detail;
						$counter++;
					}
				}
			}

			foreach ($pictures_array as $key => $value) {
				$tempFile = $value['tmp_name'];
				$targetPath = $store_folder . $ds;
				$targetFile = $targetPath . $value['name'];
				move_uploaded_file($tempFile, $targetFile);

				$image_name = $_POST['product_name'] . '_' . date('YnjGis');

				$upload = $this->upload_model->addimages(base_url() . $targetFile);
			}
		}
	}

	function update($type)
	{
		$update = $this->m_products->update($type);
		$message = array();
		if($update)
		{
			$message['type'] = 'Success';
			$message['message'] = "Successfully Updated";
		}
		else
		{
			$message['type'] = 'Error';
			$message['message'] = "Error Updating Product.Try Again";
		}

		echo json_encode($message);
	}

	function activation($type, $todo, $id)
	{
		$activation = $this->m_products->activation($type, $todo, $id);

		if($activation)
		{
			redirect(base_url() . 'dashboard/category/' . $this->session->userdata('category_id'));
		}
	}

	function create_product_by_category($category_id = NULL)
	{
		$products_list = '';
		$products = ($category_id) ? $this->m_products->get_active_products_by_category($category_id) : $this->m_products->get_all_products();
		// echo "<pre>";print_r($products);die;
		if ($products) {
			foreach ($products as $key => $value) {
				$image_list = $this->m_products->get_latest_product_image_by_id($value['product_id']);
				$image = ($image_list) ? $image_list->image_path : base_url() . 'assets/images/no-image-available.jpg';
				$category = $this->m_products->get_product_category($value['category_id'])->category_name;
				$products_list .= '<div class="col-md-4 col-sm-6 col-xsp-6">
                                <div class="thumbnail no-border no-padding">
                                    <div class="media">
                                        <img src="'.$image.'" alt="" height = "260" width = "263">
                                        <div class="caption hovered">
                                            <div class="caption-wrapper div-table">
                                                <div class="caption-inner div-cell">
                                                    <p class="caption-buttons">
                                                        <a class="btn btn-theme caption-view-more" href="'.base_url().'products/view/'.$value['product_id'].'">More</a>
                                                        <br class="clear"/>
                                                        <a class="btn btn-theme caption-add-to-cart" href="'.base_url().'products/direct_cart/'.$value['product_id'].'">Add to cart</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="caption-price"><span class="currency">Ksh.</span><span class="value">'.$value['price'].'</span></p>
                                    <div class="caption">
                                        <h3 class="caption-title">'.$value['product_name'].'</h3>
                                    </div>
                                    <div class="caption after-media">
                                        <p class="caption-read-more">
                                            <a class="btn btn-theme" href="#"><i class="fa fa-heart"></i></a>
                                            <a class="btn btn-theme" href="#"><i class="fa fa-exchange"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>';
			}
		}
		else
		{
			$products_list = '<center><h3>No Products</h3></center>';
		}

		return $products_list;
	}
	function my_cart()
	{
		$product_id = (string)$this->input->post('add-to-cart');
		$quantity = $this->input->post('quantity');
		$image =  $this->m_products->get_latest_product_image_by_id($product_id);

		$product_details = $this->m_products->get_product_by_id($product_id);
		$data = array('id'      => $product_id,
               'qty'     => $quantity,
               'price'   => $product_details->price,
               'name'    => $product_details->product_name,
               'options' => array('image' => $image->image_path));
		if($this->cart->insert($data))
		{
			redirect(base_url() . 'customercart');
		}
		else
		{
			echo "Error";
		}
	}

	function direct_cart($product_id)
	{
		$product_id = (string)$product_id;
		$quantity = 1;
		$image =  $this->m_products->get_latest_product_image_by_id($product_id);
		$product_details = $this->m_products->get_product_by_id($product_id);
		$data = array('id'      => $product_id,
               'qty'     => $quantity,
               'price'   => $product_details->price,
               'name'    => $product_details->product_name,
               'options' => array('image' => $image->image_path));
		if($this->cart->insert($data))
		{
			redirect(base_url() . 'customercart');
		}
		else
		{
			echo "Error";
		}

	}

	function create_latest_products_list()
	{
		$products = $this->m_products->get_recent_products();
		$products_list = '';
		if ($products) {
			foreach ($products as $key => $value) {
				$products_list .= '<li><a href = "'.base_url().'products/view/'.$value['product_id'].'">'.$value['product_name'].'</a></li>';
			}
		}
		else
		{
			$products_list .= '<li>No Products</li>';
		}

		return $products_list;
	}

	function get_recommended_drugs()
	{
		$recommended = '';
		$products = $this->m_products->get_all_products();
		if ($products) {
			foreach ($products as $key => $value) {
				$most_ordered = $this->m_products->get_most_ordered(1);

				$product_id = $most_ordered->product_id;
				$product_name = $most_ordered->product_name;

				$image = $this->m_products->get_latest_product_image_by_id($product_id)->image_path;

				$recommended = '<div class="media">
                                                <img src="'.$image.'" alt="">
                                                <div class="caption hovered">
                                                    <div class="caption-wrapper div-table">
                                                        <div class="caption-inner div-cell">
                                                            <p class="caption-view"><a class = "product_popup" data-id = "'.$product_id.'" href="#" data-toggle="modal" data-target="#popup-product-view">View details</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="caption">
                                                <h3 class="caption-title">'.$product_name.'</h3>
                                            </div>
                                            <div class="new">New</div>';

				// $recommended = '<div class = "li-thumb" data-id = "'.$product_id.'">
				// 				<img src = "'.$image.'" alt = "Product" style = "width: 200px;height: 200px;"/>
				// 				<div class = "img-overlay">
				// 					<h3>'.$product_name.'</h3>
				// 					<p>Click to view product</p>
				// 				</div>
				// 			</div>';
			}
		}
		else
		{
			$recommended = '<center><p>No Products Yet</p></center>';
		}
		
		return $recommended;
	}

	function create_cheapest_product($limit = 1)
	{
		$cheapest = '';
		$cheapest_products = $this->m_products->get_cheapest_product($limit);

		if ($cheapest_products) {
			foreach ($cheapest_products as $key => $value) {
				$product_id = $value->product_id;
				$product_name = $value->product_name;
				$image = ($this->m_products->get_latest_product_image_by_id($product_id)->image_path) ? $this->m_products->get_latest_product_image_by_id($product_id)->image_path : base_url() . 'assets/images/no-image-available.jpg';
				$cheapest = '<div class="media">
                                                <img src="'.$image.'" alt="">
                                                <div class="caption hovered">
                                                    <div class="caption-wrapper div-table">
                                                        <div class="caption-inner div-cell">
                                                            <p class="caption-view"><a class = "product_popup" data-id = "'.$product_id.'" href="#" data-toggle="modal" data-target="#popup-product-view">View details</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="caption">
                                                <h3 class="caption-title">'.$product_name.'</h3>
                                            </div>
                                            <div class="new">'.$value->price.'</div>';
			}
		}
		else
		{
			$cheapest = '<center><p>No Products Yet</p></center>';
		}

		return $cheapest;
	}
	function create_most_ordered_list()
	{
		$most_ordered_list = '';
		$products = $this->m_products->get_all_products();
		if ($products) {
			$limit = 4;
			$most_ordered = $this->m_products->get_most_ordered($limit);
			foreach ($most_ordered as $key => $value) {

				$product_id = $value->product_id;
				$product_name = $value->product_name;

				$most_ordered_list .= '<li><a href = "'.base_url().'products/view/'.$product_id.'">'.$product_name.'</a></li>';
			}
		}
		else
		{
			$most_ordered_list = '<center><p>No Products Yet</p></center>';
		}

		return $most_ordered_list;
	}

	function create_product_list_front($category_id = NULL)
	{
		$products_list = '';
		$new_products = array();
		$products = ($category_id) ? $this->m_products->get_active_products_by_category($category_id) : $this->m_products->get_all_products();

		if($products){
			$new_products = array_chunk($products, 4, true);

			foreach ($new_products as $key => $value) {
				$products_list .= '<div class = "grids_of_4">';
				foreach ($value as $k => $val) {
					$image_list = $this->m_products->get_latest_product_image_by_id($val['product_id']);
					$image = ($image_list) ? $image_list->image_path : base_url() . 'assets/images/no-image-available.jpg';
					$products_list .= '<div class = "col-md-3"><div class = "grid1_of_">
					<div class = "content_box">
						<a href = "'.base_url().'products/view/'.$val['product_id'].'">
							<div class="view view-fifth">
								<img src="'.$image.'" class="img-responsive" alt="" style = "height: 182px; width: 182px;"/>
								<div class="mask1">
									<div class="info">New</div>
								</div>
							</div>
						</a>
						<h5><a href="'.base_url().'products/view/'.$val['product_id'].'">'.$val['product_name'].'</a></h5>
						Ksh. '.$val['price'].'
					</div>
					</div></div>';
				}
				$products_list .='</div>';
			}
		}
		else
		{
			$products_list .= '<center><h3>No Products Yet</h3></center>';
		}

		return $products_list;
	}

	function create_sidebar_content($category_id = NULL)
	{
		$sidebar = array();
		$category_list = $latest_products_list = $most_ordered_list = '';
		$categories = $this->m_products->get_all_categories();
		$latest_products = $this->m_products->get_recent_products();
		$most_ordered = $this->m_products->get_most_ordered(4);

		if($categories){
			$class_active = '';
			if ($category_id == NULL) {
				$category_list = '<li><a href = "" class = "active">All</a></li>';
			}
			else
			{
				$category_list = '<li><a href = "">All</a></li>';
			}
			foreach ($categories as $key => $value) {
				if ($value['category_id'] == $category_id) {
					$class_active = 'active';
				}
				else
				{
					$class_active = '';
				}
				$category_list .= '<li class = "'.$class_active.'"><a href = "'.base_url().'products/index/'.$value['category_id'].'"><i class = "ion ion-ios-pulse"></i>&nbsp;'.$value['category_name'].'</li>';
			}
		}
		else
		{
			$category_list .= '<center>No Categories Yet</center>';
		}

		if($latest_products){

			foreach ($latest_products as $key => $value) {
				$latest_products_list .= '<li class = "list-group-item"><a href = "'.base_url().'products/view/'.$value['product_id'].'"><i class = "ion ion-ios-pulse"></i>&nbsp;'.$value['product_name'].'</a></li>';
			}
		}
		else
		{
			$latest_products_list .= '<center>No Products Yet</center>';
		}

		if($most_ordered){

			foreach ($most_ordered as $key => $value) {
				$image_list = $this->m_products->get_latest_product_image_by_id($value->product_id);
				$image = ($image_list) ? $image_list->image_path : base_url() . 'assets/images/no-image-available.jpg';
				$most_ordered_list .= '<div class="media">
                                <a class="pull-left" href="'.base_url().'products/view/'.$value->product_id.'">
                                    <img class="media-object" src="'.$image.'" alt="" height = "48" width = "48">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="'.base_url().'products/view/'.$value->product_id.'">'.$value->product_name.'</a></h4>
                                    <p class="price">Ksh. '.$value->price.'</p>
                                </div>
                            </div>';
				//$most_ordered_list .= '<li class = "list-group-item"><a href = ""><i class = "ion ion-ios-pulse"></i>&nbsp;'.$value->product_name.'</li>';
			}
		}
		else
		{
			$most_ordered_list .= '<center>No Products Yet</center>';
		}

		$sidebar['sidebar_categories'] = $category_list;
		$sidebar['sidebar_latest'] = $latest_products_list;
		$sidebar['sidebar_most'] = $most_ordered_list;

		return $sidebar;
	}

	function related_products($product_id)
	{
		$related_products = '';
		$product_details = $this->m_products->get_product_by_id($product_id);

		$category_id = $product_details->category_id;

		$products = $this->m_products->get_recent_products();
		if ($products) {
			foreach ($products as $key => $value) {
				$image_list = $this->m_products->get_latest_product_image_by_id($value['product_id']);
				$image = ($image_list) ? $image_list->image_path : base_url() . 'assets/images/no-image-available.jpg';
				$related_products .= '<div class="col-md-3 col-sm-6 col-xsp-6">
                    <div class="thumbnail no-border no-padding">
                        <div class="media">
                            <img src="'.$image.'" alt="" height = "230">
                            <div class="caption hovered">
                                <div class="caption-wrapper div-table">
                                    <div class="caption-inner div-cell">
                                        <p class="caption-buttons">
                                            <a class="btn btn-theme caption-view-more" href="'.base_url().'products/view/'.$value['product_id'].'">More</a>
                                            <br class="clear"/>
                                            <a class="btn btn-theme caption-add-to-cart" href="'.base_url().'products/direct_cart/'.$value['product_id'].'">Add to cart</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="caption-price"><span class="currency">Ksh.</span><span class="value">'.$value['price'].'</span></p>
                        <div class="caption">
                            <h3 class="caption-title">'.$value['product_name'].'</h3>
                        </div>
                        <div class="caption after-media">
                            <p class="caption-read-more">
                                <a class="btn btn-theme" href="#"><i class="fa fa-heart"></i></a>
                                <a class="btn btn-theme" href="#"><i class="fa fa-exchange"></i></a>
                            </p>
                        </div>
                    </div>
                </div>';
			}
		}
		else
		{
			$related_products .= '<center><h3 style = "font-family: Lato !important">No Products Yet</h3></center>';
		}

		return $related_products;
	}

	function get_product_details_($product_id, $type = 'array')
	{
		$image_slider = '';
		$default_image = base_url() . 'assets/images/no-image-available.jpg';
		$product_details = $this->m_products->get_product_by_id_active($product_id);
		if ($product_details) {
			$product_id = $product_details->product_id;
			$product_name = $product_details->product_name;
			$price = $product_details->price;
			$description = $product_details->description;
			$image = $this->m_products->get_latest_product_image_by_id($product_id);

			$image_source = ($image) ? $image->image_path : $default_image;
			$main_image = '<div class="item">';
			$main_image .= '<a href="'.$image_source.'" data-gal="prettyPhoto">';
			$main_image .= '<img class="img-responsive" src="'.$image_source.'" alt=""/>';
			$main_image .= '</a>';
			$main_image .= '</div>';


			$images = $this->m_products->get_product_images($product_id);
			if ($images) {
				$image_counts = count($images);
				if($image_counts > 1)
				{
					foreach ($images as $key => $value) {
						$image_slider .= '<div class="item"><a href="'.$value['image_path'].'" data-gal="prettyPhoto"><img class="img-responsive" src="'.$value['image_path'].'" alt="" width = "360" style = "height:356px;"/></a></div>';
					}
				}
				else
				{
					$image_slider .= '<div class="item"><a href="'.$images[0]['image_path'].'" data-gal="prettyPhoto"><img class="img-responsive" src="'.$images[0]['image_path'].'" alt="" width = "360" style = "height:356px;"/></a></div>
					<div class="item"><a href="'.$images[0]['image_path'].'" data-gal="prettyPhoto"><img class="img-responsive" src="'.$images[0]['image_path'].'" alt="" width = "360" style = "height:356px;"/></a></div>';
				}
				
			}
			else
			{
				$image_slider .= '<div class="item"><a href="'.$default_image.'" data-gal="prettyPhoto"><img class="img-responsive" src="'.$default_image.'" alt="" width = "360" style = "height:356px;"/></a></div>';
				$image_slider .= '<div class="item"><a href="'.$default_image.'" data-gal="prettyPhoto"><img class="img-responsive" src="'.$default_image.'" alt="" width = "360" style = "height:356px;"/></a></div>';
			}

			$product_array = array('product_id' => $product_id,
				'product_name' => $product_name,
				'price' => $price,
				'description' => $description,
				'image_slider' => $image_slider,
				'main_image' => $main_image);


			if($type == 'ajax')
			{
				echo json_encode($product_array);
			}
			else
			{
				return $product_array;
			}
		}
	}

	function get_products_home()
	{
		$latest = $common = '';
		$products = $this->m_products->get_recent_products();
		$most_ordered = $this->m_products->get_most_ordered(4);
		$default_image = base_url() . 'assets/images/no-image-available.jpg';
		if ($products) {
			foreach ($products as $key => $value) {
				$image = $this->m_products->get_latest_product_image_by_id($value['product_id']);

				$image_source = ($image) ? $image->image_path : $default_image;

				$latest .= '<div class="col-lg-3 col-md-4 col-sm-6 col-xsp-6 isotope-item latest" style = "height: 232px; overflow: hidden;">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <img src="'.$image_source.'" alt="" height = "252" width = "252">
                                <div class="caption hovered">
                                    <div class="caption-wrapper div-table">
                                        <div class="caption-inner div-cell">
                                            <p class="caption-view"><a href="#" class = "product_popup" data-id = "'.$value['product_id'].'" data-toggle="modal" data-target="#popup-product-view">View details</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <div class="caption-prices">
                                    <span class="price">Ksh. '.$value['price'].'</span>
                                </div>
                                <h3 class="caption-title">'.$value['product_name'].'</h3>
                            </div>
                        </div>
                    </div>';

			}
		}
		else
		{
			$latest = '<center><h2>No Products Yet</h2></center>';
		}

		if ($most_ordered) {
			foreach ($most_ordered as $key => $value) {
				$common .= '<div class="col-lg-3 col-md-4 col-sm-6 col-xsp-6 isotope-item common" style = "height: 232px; overflow: hidden;">
                        <div class="thumbnail no-border no-padding">
                            <div class="media">
                                <img src="'.$image_source.'" alt="" height = "252" width = "252">
                                <div class="caption hovered">
                                    <div class="caption-wrapper div-table">
                                        <div class="caption-inner div-cell">
                                            <p class="caption-view"><a href="#" class = "product_popup" data-id = "'.$value->product_id.'" data-toggle="modal" data-target="#popup-product-view">View details</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <div class="caption-prices">
                                    <span class="price">Ksh. '.$value->price.'</span>
                                </div>
                                <h3 class="caption-title">'.$value->product_name.'</h3>
                            </div>
                        </div>
                    </div>';
			}
		}
		else
		{
			$common = '<center><h2>No Products Yet</h2></center>';
		}

		$products_front = array('latest' => $latest, 'common' => $common);

		return $products_front;
	}
}