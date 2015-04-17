$(document).ready(function(){
	$('.action').click(function(){
		target = '#' + $(this).attr('data-target');
		view = $(this).attr('data-view');
		actiontype = $(this).attr('data-type');

		if (actiontype === "action-modal"){
			title = $(this).attr('data-title');
			$('.general_modal').modal('show');
			$('#form-modal-title').html(title);
		}

		get_page(view, target);
	});

	$('.action-page').click(function(){
		load_view(this);
	});

	$('.action-x').click(function(){
		target = '#' + $(this).attr('data-target');
		url = $(this).attr('data-url');
		title = $(this).attr('data-title');
		process_ajax(url, function(data){
			$('.general_modal').modal('show');
			$('#form-modal-title').html(title);
			$(target).html(data);
		});
	});
});

function process_ajax(data_url, handledata)
{
	$.ajax({
		url: base_url + data_url,
		beforeSend: function( xhr ) {
			$('.ajax-overlay').show();
		}
	})
	.done(function( data ) {
		$('.ajax-overlay').hide();
		handledata(data);
	});
}

function get_page(view, target)
{
	process_ajax('products/load_page/'+view, function(data){
		$(target).html(data);
	});
}



function processform(form_id, handledata)
{
	$('#'+form_id).submit(function( event ) {
		var formData = new FormData($('#'+form_id)[0]);
		var form_action = $('#'+form_id).attr('action');
		event.preventDefault();
		$.ajax({
			url : form_action,
			type: "POST",
			data : formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend:function()
			{
				console.log('Please wiat...');
			},
			success:function(data, textStatus, jqXHR) 
			{
				console.log(data);
				obj = jQuery.parseJSON(data); 
				handledata(obj);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				console.log(errorThrown + ' => ' + textStatus);
			}
		});	
	});
}

function load_page(that)
{
	target = '#' + $(that).attr('data-target');
	view = $(that).attr('data-view');
	actiontype = $(that).attr('data-type');

	if (actiontype === "action-modal"){
	title = $(that).attr('data-title');
		$('.general_modal').modal('show');
		$('#form-modal-title').html(title);
	}

	$('table').dataTable();
	get_page(view, target);
}

function load_view(that)
{
	target = '#' + $(that).attr('data-target');
	f = $(that).attr('data-view');
	f = f.replace(/_/g, '/');
	actiontype = $(that).attr('data-type');
	process_ajax(f, function(data){
		// $('table').dataTable();
		if(actiontype === 'action-modal')
		{
			title = $(that).attr('data-title');
			$('.general_modal').modal('show');
			$('#form-modal-title').html(title);
		}
		$(target).html(data);
	});

}
function createtopiclist()
{
	process_ajax('blog/createtopiclist/select/1', function(data){
		$('#topic_select').html(data);
	});
}

function reset_form(form_id)
{
	$('#'+form_id)[0].reset();
	$('#'+form_id).find('textarea.ckdified').val('');
}

function action_x(that)
{

}
