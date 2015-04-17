<div class = "row">
	<table class = "table table-bordered table-hover">
		<thead>
			<th>#</th>
			<th>Blog Title</th>
			<th>Excerpt</th>
			<th>Activation</th>
		</thead>
		<tbody>
		<?php
			$deactivated_table = '';
			$deactivated = $this->m_blog->get_deactivated();
			if ($deactivated) {
				$counter = 0;
				foreach ($deactivated as $key => $value) {
					$counter++;
					$deactivated_table .= '<tr>
					<td>'.$counter.'</td>
					<td>'.$value->blog_name.'</td>
					<td>'.implode(' ', array_slice(explode(' ', $value->blog_content), 0, 10)).'...</td>
					<td><a class = "label label-success" href = "'.base_url().'blog/activation/activate/'.$value->blog_id.'">Activate</a></td>
					</tr>';
				}
			}

			echo $deactivated_table;
		?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$('table').dataTable();
</script>