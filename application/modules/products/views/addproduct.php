<form method = "POST" action = "<?php echo base_url(); ?>products/addproduct/">
	<div class="form-group">
		<label for="product_name">Product Name</label>
		<input type="text" class="form-control" id="product_name" placeholder="Enter Name of product" name = "product_name">
	</div>
	<?php ?>
	<div class="form-group">
		<label for="product_description">Description</label>
		<textarea name = "description" id="product_description" placeholder="Enter Description of product" class = "form-control" row = "5"></textarea>
	</div>

	<div class="form-group">
		<label for="product_name">Product Price</label>
		<input type="text" class="form-control" id="product_name" placeholder="Enter Amount in Ksh." name = "price">
	</div>

	<input type = "hidden" name = "category_id" value = "" />
	<div class = "form-group"></div>
	<button type="submit" class="btn btn-primary">Add Product</button>

</form>