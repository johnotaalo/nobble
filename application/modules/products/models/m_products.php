<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_Products extends MY_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function addcategory()
	{
		$insertion = FALSE;
		$insert_data = $this->input->post();

		$insertion = $this->db->insert('category', $insert_data);

		return $insertion;
	}

	function get_all_categories()
	{
		$query = $this->db->query("SELECT * FROM category");
		$result = $query->result_array();

		return $result;
	}

	function get_product_by_category($category_id = NULL)
	{
		$query = (isset($category_id)) ? $this->db->get_where('products', array('category_id' => $category_id)) : $this->db->get('products');

		$result = $query->result_array();

		return $result;
	}

	function addproduct()
	{
		$insert_data = $this->input->post();
		$insertion = $this->db->insert('products', $insert_data);

		return $insertion;
	}

	function get_product_by_id($product_id)
	{
		$query = $this->db->get_where('products', array('product_id' => $product_id));

		$result = $query->row();

		return $result;
	}

	function get_product_by_id_active($product_id)
	{
		$query = $this->db->get_where('products', array('product_id' => $product_id, 'is_active' => 1));

		$result = $query->row();

		return $result;
	}
	function get_product_images($product_id = NULL)
	{
		$query = ($product_id) ? $this->db->get_where('product_images', array('product_id' => $product_id)) : $this->db->get('product_images');
		$result = $query->result_array();

		return $result;
	}

	function update($type)
	{
		$update_data = array();
		$id = $this->input->post('product_id');
		foreach ($this->input->post() as $key => $value) {
			if($key != 'product_id')
			{
				$update_data[$key] = $value;
			}
		}

		$this->db->where('product_id', $id);
		$update = $this->db->update('products', $update_data);

		return $update;
	}

	function get_product_category($category_id)
	{
		$query = $this->db->get_where('category', array('category_id' => $category_id));
		$result = $query->row();

		return $result;
	}

	function get_category_by_id($category_id)
	{
		$query = $this->db->get_where('category', array('category_id' => $category_id));
		$result = $query->row();

		return $result;
	}

	function activation($type, $todo, $id)
	{
		$table = $data = $item_id = '';
		$table = ($type == 'product') ? 'products' : 'category';
		$data = ($todo == 'activate') ? 1 : 0 ;
		$item_id = ($type == 'product') ? 'product_id' : 'category_id';

		$update_data = array('is_active' => $data);

		$this->db->where($item_id, $id);
		$update = $this->db->update($table, $update_data);

		return $update;
	}

	function get_recent_products()
	{
		$query = $this->db->query('SELECT * FROM products WHERE is_active = 1 ORDER BY added_on DESC LIMIT 4');

		$result = $query->result_array();

		return $result;

	}

	function get_latest_product_image_by_id($product_id)
	{
		$query = $this->db->query('SELECT image_path FROM product_images WHERE product_id = ' . $product_id .' AND is_active = 1 ORDER BY added_on DESC LIMIT 2');

		$result = $query->row();

		return $result;
	}

	function get_active_products_by_category($category_id)
	{
		$query = $this->db->get_where('products', array('category_id' => $category_id, 'is_active' => 1));

		$result = $query->result_array();

		return $result;
	}

	function get_all_products()
	{
		$query = $this->db->get_where('products', array('is_active' => 1));

		$result = $query->result_array();

		return $result;
	}

	function search_category($parameter)
	{
		$query = $this->db->query("SELECT * FROM category WHERE category_name LIKE '%".$parameter."%' OR category_description LIKE '%".$parameter."%'");
		$result = $query->result_array();
		return $result;
	}

	function get_most_ordered($limit)
	{
		$query = $this->db->query("SELECT p.product_id, p.product_name, count(i.product_id) as orders, p.price FROM customer_order_items i
			JOIN products p ON p.product_id = i.product_id
			GROUP BY p.product_id
            ORDER BY orders DESC
            LIMIT " . $limit);
		
		$result = ($limit == 1) ? $query->row() : $query->result();

		return $result;
	}

	function get_cheapest_product($limit)
	{
		$query = $this->db->query("SELECT * FROM products WHERE is_active = 1 ORDER BY price LIMIT " .$limit);

		$result = $query->result();

		return $result;
	}
}