<style type="text/css">
	.content
	{
		padding: 0 25px;
	}

	#topic
	{
		padding: 0;
		margin: 0;
	}

	.topic-row
	{
		width: 100%;
		padding: 10px;
	}
	.innersidebar
	{
		float:left;
		background:#34495e;
		height: 100vh;
		padding: 0 0 0 6px;
	}

	.innersidebar ul
	{
		list-style-type: none;
		margin: 0;
		padding: 0;
	}

	.innersidebar ul li a
	{
		display: block;
		padding: 7px;
		color: #fff;
	}

	.innersidebar li:hover
	{
		background-color: #2c3e50;
		border-left: 3px solid #27ae60;
	}

	.innersidebar ul li.inner-active
	{
		background-color: #2c3e50;
		border-left: 3px solid #27ae60;
	}

	.innersidebar ul li i
	{
		padding-right: 7px;
	}
</style>

<div class = "row">
	<div class = "col-md-2 innersidebar">
		<nav>
			<ul class = "inner">
				<li><a href = "#" class = "action" data-target = "content-container" data-view = "blog_createblog" data-title = ""><i class = "ion ion-plus"></i>&nbsp;Create Blog</a></li>
				<li><a href = "#" class = "action" data-target = "content-container" data-view = "blog_topicsv" data-title = "Topics"><i class = "ion ion-ios-photos"></i>&nbsp;Topics</a></li>
				<li><a href = "#" class = "action" data-target = "content-container" data-view = "blog_createblog" data-title = ""><i class = "ion ion-load-c"></i>&nbsp;Waiting List</a></li>
				<li><a href = "#" class = "action" data-target = "content-container" data-view = "blog_createblog" data-title = ""><i class = "ion ion-ios-locked"></i>&nbsp;Locked Blogs</a></li>
				<li><a href = "#" class = "action" data-target = "content-container" data-view = "blog_createblog" data-title = ""><i class = "ion ion-ios-chatbubble"></i>&nbsp;Comments</a></li>
				<li><a href = "#" class = "action" data-target = "content-container" data-view = "blog_createblog" data-title = ""><i class = "ion ion-ios-keypad"></i>&nbsp;All Blogs</a></li>
			</ul>
		</nav>
	</div>

	<div class="col-md-10">
		<div class = "row topic-row">
			<h3 id = "topic"></h3>
		</div>
		<div class="row">
			<center><div class = "message_box"></div></center>
			<div id = "content-container"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		list_item = $(".inner > :first-child");
		list_item.addClass('inner-active');
		anchor = list_item.find('a');
		load_page(anchor);
	});
	$('.action').click(function(){
		$('li.inner-active').removeClass('inner-active');
		this_parent = $(this).parent();
		this_parent.addClass('inner-active');
		$('#topic').html($(this).attr('data-title'));
	});
	
</script>