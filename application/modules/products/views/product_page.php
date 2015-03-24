<style type="text/css">
	.content
	{
		padding: 0;
	}
	.arealocation
	{
		padding: 15px;
		background-color: #95a5a6;
		margin-top: 0;
	}
	.extradetail
	{
		color: #2980b9;
	}

	.updatearea
	{
		padding-left: 35px;
		padding-right: 35px;
	}
</style>
<div class = "row" style = "padding-left: 30px;padding-right: 30px;">
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>products/"><i class = "fa fa-barcode"></i> Products</a></li>
		<li><a href="<?php echo base_url();?>products/category/<?php echo $category->category_id; ?>"><i class = "ion ion-folder"></i> <?php echo $category->category_name; ?></a></li>
		<li class="active"><?php echo $product_details->product_name; ?></li>
	</ol>
</div>

<div class="row updatearea">
	<h4> <i class = "ion ion-edit"></i> Editting: <span class = "extradetail"><?php echo $product_details->product_name; ?></span>. <span class = "pull-right"><i class = "ion ion-android-calendar"></i> <span><?php echo date("d-M-Y", strtotime($product_details->added_on)); ?></span></span></h4>

	<form method = "POST" entype = "multipart/form-data" action = "<?php echo base_url(); ?>products/update/product" class = "col-md-6" id = "update_product_form">
		<fieldlist>
			<legend>Product Details</legend>
			<div class="form-group">
				<label for="product_name">Product Name</label>
				<input type="text" class="form-control" id="product_name" name = "product_name" value = "<?php echo $product_details->product_name; ?>">
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea type="text" class="form-control" id="description" name = "description" rows = "8"><?php echo $product_details->description; ?></textarea>
			</div>
			<div class="form-group">
				<label for="price">Price</label>
				<input type="text" class="form-control" id="price" name = "price" value = "<?php echo $product_details->price; ?>">
			</div>
			<input type = "hidden" name = "product_id" value = "<?php echo $product_details->product_id; ?>">
			<div id = "display"></div>
			<div class = "form-group">
				<button class="btn btn-success btn-flat" id = "update_btn">Update Product</button>
			</div>

		</fieldlist>
	</form>

	<div class = "col-md-6">
		<div class = "row">
			<div class = "image_container">
				<div class = "heading">
					<legend><i class = "ion ion-images"></i>&nbsp;Product Images <span class = "pull-right"><a class = "btn bg-olive btn-flat call_dropzone"><i class = "ion ion-plus"></i>&nbsp;Add images</a></span></legend>
				</div>
				<div class = "product_images"><?php echo $product_images;?></div>
			</div>
			<div class ="dropzone_container">
				<a href = "#" id = "call_images"><i class = "ion ion-android-arrow-back"></i> Back to Images</a>
				<form id="my-awesome-dropzone" class="dropzone" action="<?php echo base_url(); ?>products/upload_product_photos" enctype="multipart/form-data">
					<div class="dropzone-previews"></div>
					<input type = "hidden" name = "product_id" value = "<?php echo $product_details->product_id; ?>">
					<input type = "hidden" name = "product_name" value = "<?php echo $product_details->product_name; ?>">
					<button type="submit" class="btn btn-success pull-right"><i class = "fa fa-upload"></i>&nbsp;Upload Photos!</button>
					<div class="fallback">
						<input name="file" type="file" multiple />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.dropzone_container').hide();
		$('.call_dropzone').click(function(){
			$('.dropzone_container').show();
			$('.product_images').hide();
		});

		$('#call_images').click(function(){
			$('.dropzone_container').hide();
			$('.product_images').show();
		});

		$('#update_btn').click(function(){
			form_id = 'update_product_form';
			processform(form_id, function(message){
				if(message.type === 'Success'){
					$('#display').html('<center><p style = "color: green"><i class = "ion ion-android-done-all"></i>&nbsp;'+message.message+'</p></center>');
				}
				else
				{
					$('#display').html('<center><p style = "color: red"><i class = "ion ion-android-done-all"></i>&nbsp;'+message.message+'</p></center>');
				}
				setTimeout(function() {
					$("#display p").remove();
				}, 5000);
			});
		});
	});
</script>
