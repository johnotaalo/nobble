<div class="row" style="margin-left: 0;padding: 0 30px 0 15px;">
	<form role = "form" action = "<?php echo base_url();?>blog/update_blog" method = "POST" enctype = "multipart/form-data" id = "blog_form">
		<div class="form-group">
			<label for="topic">Topic</label>
			<div class = "input-group">
				<select class = "form-control" name = "topic_id" id = "topic_select" required>
					<option value = "0">Select a Topic</option>
					<span id = "topic-options"></span>
					<?php echo $topic_list;?>
				</select>
				<div class = "input-group-addon"><a href="#" onclick="load_page(this)" data-target = "form-modal-body" data-type = "action-modal" data-title = "Add Topic" data-view = "blog_addtopic"><i class = "ion ion-plus"></i>&nbsp;Add a Topic</a></div>
			</div>
		</div>

		<div class = "form-group">
			<label for = "cover">Cover Image</label>
			<input type = "file" name = "blog_cover" class = 'form-control'>
		</div>
		<div class = "form-group">
			<label for = "blog_name">Blog Name</label>
			<input type="text" name = "blog_name" id = "blog_name" class = "form-control" value = "<?php echo $blog_details->blog_name; ?>" required/>
		</div>

		<div class = "form-group">
			<label for = "blog_content">Blog Content</label>
			<textarea id="editor1" name="blog_content" rows="10" cols="10" class = "ckdified" required>
			<?php echo $blog_details->blog_content; ?>	
			</textarea>
		</div>
		<div class = "form-group">
			<center>
			<input type = "hidden" name = "blog_id" value="<?php echo $blog_details->blog_id; ?>">
			<button class = "btn btn-success btn-flat activator" data-activation = "1"><i class = "ion ion-printer"></i> Update Blog Post</button>
			<a class = "btn btn-danger btn-flat" id = "cancel"><i class = "ion ion-close"></i> Back</a>
			</center>
		</div>
	</form>
</div>
<script type="text/javascript">
	$(function () {
		// createtopiclist();
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		$('table').dataTable();
		CKEDITOR.replace('editor1');
	});
</script>