<style type="text/css">
	.content
	{
		padding: 0;
	}
</style>
<div class = "row" style = "padding-left: 30px;padding-right: 30px;">
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>dashboard/categories/"><i class = "fa fa-barcode"></i> Products</a></li>
		<li class = "active"><i class = "ion ion-folder"></i> <?php if($category_details){echo $category_details->category_name;}else{ echo "All"; } ?></a></li>
	</ol>
</div>
<div class ="col-md-12" style="padding-left: 25px;padding-right: 25px;">
	<?php $category_id = ($this->uri->segment(3, 0)); ?>
	<?php if($category_id){ ?>
	<div class = "row">
		<a href = "#" id = "addproduct" class = "action btn btn-primary btn-flat" data-type = "action-modal" data-view = "products_addproduct" data-target = "form-modal-body" data-title = "Add a Product" style = "font-size: 120%;padding:5px;color: #fff; margin: 10px;"><i class = "ion ion-plus"></i> Add a Product</a>
	</div>
	<?php } ?>
	<div class = "row">
		<div class="col-md-12">
			<?php echo $products_output; ?>
		</div>
	</div>
</div>