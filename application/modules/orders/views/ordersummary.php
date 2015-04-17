<style>
	.box-group div
	{
		border-radius: 0 !important;
	}
</style>
<div class="box-group" id="accordion">
	<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
	<div class="panel box box-primary">
		<div class="box-header with-border">
			<h4 class="box-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="collapsed">
					<i class = "fa fa-info"></i> Order Details
				</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true">
			<div class="box-body">
				<table class = "table table-bordered">
				<tr>
					<td><label>Order No:</label></td>
					<td><?php echo $order_details->order_id; ?></td>
					<td><label>Order Date:</label></td>
					<td> <?php echo date('d F, Y', strtotime($order_details->order_date)); ?></td>
				</tr>
				<tr>
					<td><label>Customer Name:</label></td>
					<td colspan = "3"><?php echo ucwords(strtolower($order_details->first_name . ' ' . $order_details->last_name));?></td>
				</tr>
				<tr>
					<td><label>Phone Number:</label></td>
					<td colspan = "3"><?php echo $order_details->phonenumber; ?></td>
				</tr>
				<tr>
					<td><label>Email Address:</label></td>
					<td colspan = "3"><?php echo $order_details->email_address; ?></td>
				</tr>
				<tr>
					<td><label>Packaging:</label></td>
					<td colspan = "3"><?php echo ucwords($order_details->packaging); ?></td>
				</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="panel box box-danger">
		<div class="box-header with-border">
			<h4 class="box-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				<i class = "fa fa-truck"></i> Shipping Details
			</a>
			</h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse">
			<div class="box-body">
				<table class = "table">
					<tr>
						<td><label>Postal Address: </label></td>
						<td><?php echo $order_details->postal_address;?></td>
					</tr>
					<tr>
						<td><label>Physical Address: </label></td>
						<td><?php echo $order_details->physical_address;?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<table class = "table">
		<thead>
			<tr>
				<th style = "width: 55%;">Product Name</th>
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php echo $items_table; ?>
			<tr>
				<td colspan="3" style = "text-align: right;">Grand Total</td>
				<td><?php echo $grand_total; ?></td>
			</tr>
		</tbody>
	</table>
	<legend></legend>
	<div class = "row">
		<div class = "col-md-12">
			
			<div class = "pull-left">
				<p>The order is currently 
				<?php
				$button = '';
				if(($order_details->completed == 0) && ($order_details->in_transit == 0))
				{
					echo "<a href = '#' class = 'label label-danger'>pending</a>";
					$button = '<a href = "'.base_url().'orders/process_order/delivery/'.$order_details->order_id.'" class = "btn btn-warning btn-sm">Deliver Order</a>';
				}
				else if(($order_details->completed == 0) && ($order_details->in_transit == 1))
				{
					echo "<a href = '#' class = 'label label-warning'>being delivered</a>";
					$button = '<a href = "'.base_url().'orders/process_order/complete/'.$order_details->order_id.'" class = "btn btn-success btn-sm">Complete Order</a>';
				}
				else if(($order_details->completed == 1) && ($order_details->in_transit == 0))
				{
					echo "<a href = '#' class = 'label label-success'>complete</a>";
					$button = 'No custom actions';
				}
				?>
				</p>
			</div>
			<div class = "pull-right">
				<?php echo $button; ?> | <a href = "#" class = "btn btn-danger btn-sm" data-dismiss="modal">Cancel</a>
			</div>
		</div>
	</div>
</div>