<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Orders extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_orders');
		$this->pass_data['list_item'] = 'orders';
	}

	function order()
	{
		$this->pass_data['order_details'] = $this->order_details();
		$this->pass_data['content_view'] = 'orders/order_page';
		$this->template->call_admin_template($this->pass_data);
	}

	function order_details()
	{
		$orders = $this->m_orders->get_order_details();
		$order_table = array();

		foreach ($orders as $key => $value) {
			$table = '';
			$counter = 0;

			$order_table['counts'][$key] = count($value);
			foreach ($value as $k => $v) {
				$counter++;
				$table .= '<tr>
					<td><input type = "checkbox" name = "all_orders_'.$counter.'" value = "'.$v->order_id.'"></td>
					<td>'.$v->first_name.'</td>
					<td>'.$v->last_name.'</td>
					<td>'.$v->phonenumber.'</td>
					<td>'.$v->email_address.'</td>
					<td>'.date('dS F, Y', strtotime($v->order_date)).'</td>
					<td><a href = "#" class = "action-x btn btn-primary btn-xs" style = "color: white;" data-type = "action-modal" data-url = "orders/get_order_summary/'.$v->order_id.'" data-target = "form-modal-body" data-title = "Order Summary" data-order-id = "'.$v->order_id.'" ><i class = "fa fa-eye"></i>&nbsp;View Order</a></td>';
					if(($v->completed == 0) && ($v->in_transit == 0))
					{
						$table .= '<td>
						<a href = "#" class = "label label-danger">Pending</a>
						</td>';
					}
					else if(($v->completed == 0) && ($v->in_transit == 1))
					{
						$table .= '<td>
						<a href = "#" class = "label label-warning">In Transit</a>
						</td>';
					}
					else if(($v->completed == 1) && ($v->in_transit == 0))
					{
						$table .= '<td>
						<a href = "#" class = "label label-success">Completed</a>
						</td>';
					}

					if ($v->is_active == 1) {
						$table .= '<td>
						<a href = "'.base_url().'orders/process_order/cancel/'.$v->order_id.'" style = "color: red;"><i class = "fa fa-remove"></i>&nbsp;Cancel Order</a>
						</td>';
					}
					else
					{
						$table .= '<td>
						<a href = "'.base_url().'orders/process_order/restore/'.$v->order_id.'" style = "color: green;"><i class = "fa fa-refresh"></i>&nbsp;Restore Order</a>
						</td>';
					}

				$table .= '</tr>';
			}
			$order_table[$key] = $table;
		}

		return $order_table;
	}

	function get_order_summary($order_id)
	{
		$order_details = $this->m_orders->get_order_details_by_id($order_id);
		$order_items = $this->m_orders->get_order_items($order_id);

		$data['order_details'] = $order_details;
		$items_table = '';
		$grand_total = 0;
		foreach ($order_items as $key => $value) {
			$grand_total += $value->total;
			$items_table .= '<tr>
			<td>'.$value->product_name.'</td>
			<td>'.$value->quantity.'</td>
			<td>'.$value->price.'</td>
			<td>'.$value->total.'</td>
			</tr>';
		}
		$data['items_table'] = $items_table;
		$data['grand_total'] = $grand_total;

		$this->load->view('orders/ordersummary', $data);
	}

	function process_order($type, $order_id)
	{
		$update = $this->m_orders->process_order($type, $order_id);
		if ($update) {
			if ($type == 'delivery') {
				$this->db->select('email_address, first_name, last_name, postal_address');
				$order_details = $this->db->get_where('customer_order_details', array('order_id' => $order_id))->row();
				$order_items = $this->m_orders->get_order_items($order_id);
				$first_name = $order_details->first_name;
				$last_name = $order_details->last_name;

				$fullname = ucwords(strtolower($first_name .' ' . $last_name));

				$message = '<center><h3>Delivery Confirmation</h3></center>
				<p style = "font-size: 110%;">Hi, '.$fullname.'... We are so glad that you made an order with us. This is to confirm that the order you made has been approved and is being delivered to the following postal address: <span style = "color: blue; text-decoration: underlined;">'.$order_details->postal_address.'</span><br />
					The order has been included below:
				</p>
				<table class = "table">
				<thead>
					<tr>
						<th style = "width: 55%;">Product Name</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>';
				$grand_total = 0;
				foreach ($order_items as $key => $value) {
					$grand_total += $value->total;
					$message .= '<tr>
					<td>'.$value->product_name.'</td>
					<td>'.$value->quantity.'</td>
					<td>'.$value->price.'</td>
					<td>'.$value->total.'</td>
					</tr>';
				}
				$message .= '<tr>
							<td colspan="3" style = "text-align: right;">Grand Total</td>
							<td>'.$grand_total.'</td>
						</tr>
					</tbody>
				</table>';
				$message .= '<p style = "color: red;">If you did not make this transaction, contact the administrator at admin@nobbledrug.com</p>';
				$email = $order_details->email_address;
				
				$sent = $this->send_email($email, $message, 'Delivery Confirmation Message');
			}
			redirect(base_url().'dashboard/orders');
		}
	}
}