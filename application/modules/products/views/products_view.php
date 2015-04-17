<div class ="col-md-12" style="padding-left: 25px;">
	<div class = "row" style = "padding-bottom: 5px;">
		<div class = "col-md-6">
			<p>Showing: <span id = "show_results"></span> of <span id = "total_results"></span> categories</p>
		</div>
		<div class = "pull-right col-md-6">
			<form method="POST" action = "<?php echo base_url();?>products/search" id = "category_search_form">
				<div class="input-group input-group-sm">
                    <input type = "search" name = "search_product" class = "form-control" />
                    <span class="input-group-btn">
                      <button class = "btn btn-info btn-flat" id = "form_search_btn"><i class = "fa fa-search"></i>&nbsp;&nbsp;Search</button>
                    </span>
                  </div>
			</form>
		</div>
	</div>
	<legend></legend>
	<div class = "row">
		<div class = "adddiv col-md-2">
		<a href = "#" id = "addcategory" class = "action" data-type = "action-modal" data-view = "products_addcategory" data-target = "form-modal-body" data-title = "Add a Category">
			<center>
				<i class = "fa fa-plus fa-5x"></i>
				<p>Add a Category</p>
			</center>
		</a>
		</div>
		<div id = "category_content">
			<?php echo $category_list; ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		process_ajax('products/createcategorylist/ajax_search/', function(data){
			obj = jQuery.parseJSON(data);
			$('#category_content').html(obj.category_list);
			$('#show_results').html(obj.result_count);
			$('#total_results').html(obj.result_count);
		});
		$('input[name="search_product"]').keyup(function(){
			typed_value = $(this).val();
			if (typed_value !== '')
			{
				process_ajax('products/search/ajax_search/'+typed_value, function(data){
					obj = jQuery.parseJSON(data);
					$('#category_content').html(obj.category_list);
					$('#show_results').html(obj.result_count);
				});
			}
			else
			{
				process_ajax('products/createcategorylist/ajax_search/', function(data){
					obj = jQuery.parseJSON(data);
					$('#category_content').html(obj.category_list);
					$('#show_results').html(obj.result_count);
				});
			}
		});
	});

	$('#form_search_btn').click(function(){
		processform('category_search_form', function(data){
			obj = jQuery.parseJSON(data);
			$('#category_content').html(obj.category_list);
			$('#show_results').html(obj.result_count);
		});
	});
</script>