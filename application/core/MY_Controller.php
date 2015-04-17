<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
// error_reporting(E_ALL ^ E_DEPRECATED);
class MY_Controller extends MX_Controller
{
	var $pass_data = array();
	var $passdata = array();
	function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->module('template');
		$this->load->module('upload');
		$this->load->module('products');
		$this->load->module('analytics');
		$this->load->model('m_products');
		$product_listing = $this->products->create_category_list();
		$this->pass_data['latest_products'] = $this->products->create_latest_products_list();
		$this->passdata['product_listing'] = $product_listing;
		$this->pass_data['product_listing'] = $product_listing;
		// $this->cart->destroy();
	}

	function load_page($view, $data = NULL)
	{
		$view = str_replace("_","/",$view);
		$this->load->view($view);
	}

	function send_email($email, $message, $subject = NULL)
	{
		$time=date('Y-m-d');
		$header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- If you delete this tag, the sky will fall on your head -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ZURBemails</title>
	
<link rel="stylesheet" type="text/css" href="'.base_url().'assets/email.css" />

</head>
 
<body bgcolor="#FFFFFF">
<table class="head-wrap" bgcolor="#999999">
	<tr>
		<td></td>
		<td class="header container">
			
				<div class="content">
					<table bgcolor="#999999">
					<tr>
						<td><img src="'.base_url().'assets/images/Banner.png" /></td>
						<td align="right"><h6 class="collapse">NobbleDrug</h6></td>
					</tr>
				</table>
				</div>
				
		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->
';
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => "chrizota@gmail.com",
			'smtp_pass' => "Chrispine-2014"
			);
		$footer = '</body></html>';
		$email_message = $header . $message;
		
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('chrizota@gmail.com', 'NOBBLEDRUG SYSTEM NOTIFICATION');
		$this->email->to($email);
		if(!isset($subject)){$this->email->subject('Contact Request Received');}
		else{$this->email->subject($subject);}
		$this->email->message($email_message);
		$this->email->set_mailtype("html");
		
		
		if($this->email->send())
		{	
			// $this->admin_model->store_sent_email($recipient, $subject, $message, $time);
			return true;
			
		} else 
		{
			return false;
		}
	}
}