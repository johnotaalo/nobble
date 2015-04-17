<div class = "row">
	<a href = "#" class="btn btn-flat bg-olive action" onclick="load_page(this)" data-target = "form-modal-body" data-type = "action-modal" data-title = "Add Topic" data-view = "blog_addtopic"><i class = "ion ion-plus"></i> Add a Topic</a>
</div>

<div class = "row">
	<table class = "table table-bordered table-hover" id = "topic_table">
		<thead>
			<tr>
				<th>#</th>
				<th>Topic Name</th>
				<th>Desciption</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$topics_table = '';
			$query = $this->db->query("SELECT t.topic_id, t.topic_name, t.description, t.is_active, (SELECT count(b.blog_id) as blogs FROM blogs b WHERE t.topic_id = b.topic_id) as blog_count FROM blog_topics t GROUP BY topic_name");

			$result = $query->result();

			if ($result) {
			$counter = 1;
			foreach ($result as $key => $value) {
				$topics_table .= '<tr>
				<td>'.$counter.'</td>
				<td>'.$value->topic_name.'</td>
				<td>'.$value->description.'</td>';
				$committing = '';
				if ($value->is_active == 1) {
					$committing = '<td><a href = "#"><i class = "fa fa-pencil"></i> Edit</a></td>
					<td><a href = "#"><i class = "fa fa-trash"></i> Delete</a></td>';
				}
				else
				{
					$committing = '<td><a href = "#">Restore First</a></td>
					<td><a href = "#"><i class = "fa fa-refresh"></i> Refresh</a></td>';
				}
				$topics_table .= $committing .'</tr>';
				$counter++;
			}
		}

		echo $topics_table;
		?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#topic_table').dataTable();
	});
</script>