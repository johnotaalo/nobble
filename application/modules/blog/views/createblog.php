<style type="text/css">
	.form-group
	{
		padding: 0;
		margin: 0;
	}
</style>

<div class="row" style="margin-left: 0;padding: 0 30px 0 15px;">
	<form role = "form" action = "<?php echo base_url();?>blog/create_blog" method = "POST" enctype = "multipart/form-data" id = "blog_form">
		<div class="form-group">
			<label for="topic">Topic</label>
			<div class = "input-group">
				<select class = "form-control" name = "topic_id" id = "topic_select" required>
					<option value = "0">Select a Topic</option>
					<span id = "topic-options"></span>
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
			<input type="text" name = "blog_name" id = "blog_name" class = "form-control" required/>
		</div>

		<div class = "form-group">
			<label for = "blog_content">Blog Content</label>
			<textarea id="editor1" name="blog_content" rows="10" cols="10" class = "ckdified" required>
				Blog content comes <b>here</b>
			</textarea>
		</div>
		<input type = "hidden" name = "published" id = "published"/>
		<div class = "form-group">
			<center>
			<button class = "btn btn-primary btn-flat activator" data-activation = "1"><i class = "ion ion-printer"></i> Save and Publish</button>
			<button class = "btn btn-success btn-flat activator" data-activation = "0"><i class = "ion ion-ios-timer-outline"></i> Save and Wait</button>
			<a class = "btn btn-danger btn-flat" id = "cancel"><i class = "ion ion-close"></i> Cancel Blog</a>
			</center>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(function () {
		createtopiclist();
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace('editor1');
		$('.activator').click(function(){
			$('#published').val($(this).attr('data-activation'));
		});

		$('#cancel').click(function(){
			reset_form(blog_form);
		});
	});
</script>