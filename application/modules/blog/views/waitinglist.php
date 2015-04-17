<div class ="row">
<form method = "POST" action = "<?php echo base_url(); ?>blog/updateblog" id = "update_blog">
	<table class = "table table-hover table-bordered">
		<thead>
			<tr>
				<th><input type = "checkbox" id = "select-all" /></th>
				<th>Blog Name</th>
				<th>Blog Content</th>
				<th>Publish</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$query = $this->db->query("SELECT * FROM blogs WHERE published = 0 AND is_active = 1");
				$result = $query->result();

				if ($result) {
					$counter = 1;
					foreach ($result as $key => $value) {
						echo "<tr>
						<td><input type = 'checkbox' value = '".$value->blog_id."' class = 'checker' name = 'blog_id_".$counter."'/></td>
						<td>".$value->blog_name."</td>
						<td>".implode(' ', array_slice(explode(' ', $value->blog_content), 0, 10))."... </td>
						<td><a href = '#' data-id = '".$value->blog_id."' data-name = 'update'><i class = 'fa fa-print'></i>&nbsp;Publish</a></td>
						<td><a href = '#' data-id = '".$value->blog_id."' data-name = 'delete'><i class = 'fa fa-trash'></i>&nbsp;Delete</a></td>
						</tr>";
						$counter++;
					}
				}
			?>
		</tbody>
	</table>
	<input id = "action_to_do" name = "action_to_do" value = "" type = "hidden" />
	With Selected: <button class = "btn btn-default action-button" data-action = "publish"><i class = "fa fa-print"></i> Publish</button>    |    <button class = "btn btn-default action-button" data-action = "delete"><i class = "fa fa-trash"></i> Delete</button>
	</form>
</div>

<script type="text/javascript">
	$('table').dataTable();
	$('#select-all').click(function(){
		if($(this).is(":checked"))
		{
			$('.checker').prop("checked", true);
		}
		else
		{
			$('.checker').prop("checked", false);
		}
	});
	$('.action-button').click(function(){
		$('#action_to_do').val($(this).attr('data-action'));
		processform('update_blog', function(data){
			list_item = $("#wait");
			list_item.addClass('inner-active');
			anchor = list_item.find('a');
			load_page(anchor);
		});
	});
</script>