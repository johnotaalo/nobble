<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Products extends MY_Controller
{
	var $list_item = 'products';
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_products');
		$this->pass_data['list_item'] = 'products';

	}

	function index()
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
			redirect(base_url().'products');
		}
	}

	function createcategorylist()
	{
		$category_list = '';
		$categories = $this->m_products->get_all_categories();

		if ($categories) {
			foreach ($categories as $key => $value) {
				$category_list .= '<div class = "col-md-2" style = "padding: 7px;">
				<a class = "action" href= "'.base_url().'products/category/'.$value['category_id'].'"><center><div class = "folder">
				<i class = "ion ion-ios-folder" style = "font-size: 6em;"></i>

				<p style = "font-size: 110%;">'.$value['category_name'].'</p>
				</div>
				</center></a>
				</div>';
			}
		}

		return $category_list;
	}

	function category($category_id)
	{
		$product_listing = '';
		$this->pass_data['category_details'] = $this->m_products->get_category_by_id($category_id);
		$this->pass_data['products_output'] = $this->create_products_listing('all', $category_id);
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
			redirect(base_url().'products/product/' . mysql_insert_id());
		}
	}

	function product($product_id)
	{
		$this->pass_data['product_details'] = ($this->get_product_details($product_id)) ? $this->get_product_details($product_id) : FALSE ;
		$this->pass_data['category'] = $this->m_products->get_product_category($this->get_product_details($product_id)->category_id);
		$this->pass_data['product_images'] = $this->create_product_image_list('grid', $product_id);
		$this->pass_data['content_view'] = 'products/product_page';
		$this->template->call_admin_template($this->pass_data);
	}

	function create_products_listing($type = NULL, $category_id)
	{
		$product_table = $product_grid = '';
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
					$product_table .= '<td><a href = "'.base_url('products/product').'/'.$value['product_id'].'"><i class = "fa fa-pencil"></i> Edit</a></td>';
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
		return $product_table;
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
			redirect(base_url() . 'products/category/' . $this->session->userdata('category_id'));
		}
	}
}