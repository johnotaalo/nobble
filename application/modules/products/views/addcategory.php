<form method = "POST" action = "<?php echo base_url(); ?>products/addcategory">
	<div class="form-group">
		<label for="category_name">Category Name</label>
		<input type="text" class="form-control" id="category_name" placeholder="Enter Name of category" name = "category_name">
	</div>

	<div class="form-group">
		<label for="category_description">Description</label>
		<textarea name = "category_description" id="category_description" placeholder="Enter Description of category" class = "form-control" row = "5"></textarea>
	</div>

	<button type="submit" class="btn btn-primary">Add Category</button>
</form>