<div class = "row">
	<table class = "table table-bordered">
		<thead>
			<th>#</th>
			<th>Blog Name</th>
			<th>Created on</th>
			<th>Status</th><!-- published or waiting -->
			<th>Delete</th>
			<th>Edit</th>
		</thead>
		<tbody>
			<?php echo $all_blogs; ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('table').dataTable();
	});
</script>