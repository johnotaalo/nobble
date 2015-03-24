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

	function get_product_by_category($category_id)
	{
		$query = $this->db->get_where('products', array('category_id' => $category_id));

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
}