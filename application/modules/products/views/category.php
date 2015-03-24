<style type="text/css">
	.content
	{
		padding: 0;
	}
</style>
<div class = "row" style = "padding-left: 30px;padding-right: 30px;">
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>products/"><i class = "fa fa-barcode"></i> Products</a></li>
		<li class = "active"><i class = "ion ion-folder"></i> <?php echo $category_details->category_name; ?></a></li>
	</ol>
</div>
<div class ="col-md-12" style="padding-left: 25px;padding-right: 25px;">
	<div class = "row">
		<a href = "#" id = "addproduct" class = "action btn btn-primary btn-flat" data-type = "action-modal" data-view = "products_addproduct" data-target = "form-modal-body" data-title = "Add a Product" style = "font-size: 120%;padding:5px;color: #fff; margin: 10px;"><i class = "ion ion-plus"></i> Add a Product</a>
	</div>
	<div class = "row">
		<div class="col-md-12">
			<?php echo $products_output; ?>
		</div>
	</div>
</div>