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
});

function process_ajax(data_url, handledata)
{
	$.ajax({
		url: base_url + data_url,
		beforeSend: function( xhr ) {
		}
	})
	.done(function( data ) {
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
				obj = jQuery.parseJSON(data); 
				handledata(obj);
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{

			}
		});	});
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
