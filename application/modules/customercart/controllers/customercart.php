<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Customercart extends MY_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('m_customercart');
	}

	function index($error = NULL)
	{
		if (isset($error)) {
			$this->passdata['error'] = 'Could not update cart. Try again later';
		}
		// $data = $this->passdata
		$data['content_view'] = 'home/cart_view'; 
		$this->template->call_front_end_template($data);
	}

	function update()
	{
		$frags = '';
		$update_data = array();
		foreach ($this->input->post() as $key => $value) {
			if ($key != 'update_cart') {
				$frags = explode('_', $key);
				$row_id = $frags[1];
				$k = $frags[0];
				$update_data[$row_id][$k] = $value;
			}
			
		}
		$data = array();
		foreach ($update_data as $key => $value) {
			$data[] = $value;
		}

		if ($this->cart->update($data)) {
			redirect(base_url().'customercart');
		}
		else
		{
			$this->index(1);
		}
	}

	function removeitem($rowid = NULL)
	{
		if(isset($rowid))
		{
			$data = array(
				'rowid' => $rowid,
				'qty' => 0);

			if ($this->cart->update($data)) {
				redirect(base_url().'customercart');
			}
			else
			{
				$this->index(1);
			}
		}
		else
		{
			if($this->cart->destroy())
			{
				redirect(base_url().'customercart');
			}
			else
			{
				$this->index(1);
			}
		}
	}

	function completeorder()
	{
		$data['content_view'] = 'home/completeorder_v';
		$this->template->call_front_end_template($data);
	}

	function load_success()
	{
		$data['content_view'] = 'customercart/success_v';
		$this->template->call_front_end_template($data);
	}
	function complete()
	{
		$order_items = array();
		$order_id = $this->m_customercart->complete();

		if ($order_id) {
			$counter = 0;
			foreach ($this->cart->contents() as $key => $value) {
				$order_items[$counter]['order_id'] = $order_id;
				$order_items[$counter]['product_id'] = $value['id'];
				$order_items[$counter]['quantity'] = $value['qty'];
				$counter++;
			}

			$tracking_id = $this->m_customercart->save_ordered_items($order_items);

			if ($tracking_id) {
				$order_details = $this->db->query("SELECT * FROM customer_order_details WHERE order_id = " . $order_id)->row();
				$order = '';
				foreach ($this->cart->contents() as $key => $value) {
                    $order.= "<tr>
                    <td>".$value['name']."</td>
                    <td style = 'text-align: center;'>".$value['qty']."</td>
                    <td style = 'text-align: center;'>".$value['price']."</td>
                    <td>Ksh. ".$value['subtotal']."</td>
                    </tr>";
                }
                $order.= "<tr>
                <td colspan = '3' style = 'text-align: right;'>Grand Total</td>
                <td style = 'text-align: left;'>Ksh. ".$this->cart->total()."</td>
                </tr>";
				
				$customer_email = '<div>
				<center><h2>Order Confirmation</h2></center>
				<p style = "padding: 3px; font-size: 110%;">Hi, <b>'.$this->input->post('first_name').' '.$this->input->post('last_name').'</b>, we have received your order that was made on: '.date('L dS F, Y', strtotime($order_details->order_date)).' at: '.date('H:i:s', strtotime($order_details->order_date)).'.<br/>
					The order is as shown below
					<table class = "table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th style = "text-align: center;">Quantity</th>
                                <th style = "text-align: center;">Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>'.$order.'
                        </tbody>
                    </table>

                    If you wish to cancel this order, please contact the admin on admin@nobbledrug.com
				</p>
				</div>';

				$admin_email = '<div>
				<center><h2>Order Confirmation</h2></center>
				<p style = "padding: 3px; font-size: 110%;">Hi, we have received an order from <b>'.$this->input->post('first_name').' '.$this->input->post('last_name').'</b>. Find below the order as follows.
					<table class = "table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th style = "text-align: center;">Quantity</th>
                                <th style = "text-align: center;">Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>'.$order.'
                        </tbody>
                    </table>
				</p>
				</div>';

				$customer = $this->send_email($this->input->post('email_address'), $customer_email, 'NOBBLEDRUG::Order Confirmation');
				$admin = $this->send_email('john.otaalo@strathmore.edu', $admin_email, 'NOBBLEDRUG::Order Confirmation');
				if ($customer && $admin) {
					$this->cart->destroy();
					$this->load_success();
				}
			}
		}
	}

	function cart_items($limit)
	{
		$cart_div = '';
		if ($this->cart->contents()) {
			// echo "<pre>";print_r($this->cart->contents());die;
			$counter = 0;
			foreach ($this->cart->contents() as $key => $value) {
				if($counter < 3){
					$cart_div .= '<div class="cart_box">
							   	 <div class="message">
							   	     <div class="alert-close"> </div> 
					                <div class="list_img"><img src="'.$this->cart->product_options($key)['image'].'" class="img-responsive" alt=""/></div>
								    <div class="list_desc"><h4><a href="#">'.$value['name'].'</a></h4>'.$value['qty'].' x<span class="actual">
		                             Ksh. '.$value['price'].'</span></div>
		                              <div class="clearfix"></div>
	                              </div>
	                            </div>';
	                $counter++;
				}
			}

			$cart_div .= '<div class="total">
	                        	<a href = "#">View Full Cart</a>
	                        	<div class="clearfix"> </div>
	                        </div>';
		}
		else
		{
			$cart_div .= '<center>No items in the cart</center>';
		}

		return $cart_div;
	}

	function test_success()
	{
		$data['content_view'] = 'customercart/success_v';
		$this->template->call_front_end_template($data);
	}
}