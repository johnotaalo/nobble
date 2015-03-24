<form method = "POST" action = "<?php echo base_url();?>blog/add_topic" role = "form" id = "topicform">
	<div class = "form-group">
		<label for = "topic_name">Topic Name</label>
		<input type = "text" name = "topic_name" id = "topic_name" class = 'form-control'>
	</div>
	<div class = "form-group">
		<label for = "description">Description</label>
		<textarea name = "description" id = "description" class = 'form-control' cols = "40"></textarea>
	</div>

	<div class = "form-group">
		<button class = "btn btn-primary" id = "topic_submit"><i class = "ion ion-ios-download"></i>&nbsp;&nbsp;Add Topic</button>
		<div id = "message"></div>
	</div>
</form>

<script>
	$(document).ready(function(){
		createtopiclist();
		$('#topic_submit').click(function(){
			processform('topicform', function(todo){
				if(todo.type === 'Failed'){
					$('#message').html('<p style = "color: red;">Failed.</p>');
				}
				else
				{
					createtopiclist();
					$('.modal').modal('hide');
				}
			});
		});
	});
</script>