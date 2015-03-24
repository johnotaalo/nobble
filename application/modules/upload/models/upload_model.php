<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_model extends MY_Model{
	function __construct()
	{
		parent:: __construct();
	}

	function addimages($path)
	{
		$data = array(
			'image_path' => $path,
			'product_id' => $_POST['product_id']
			);

		$query = $this->db->insert('product_images', $data);

		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}