<form method = "POST" action = "<?php echo base_url(); ?>user/addadmin/" enctype = "multipart/form-data">
	<div class = "form-group">
		<label class = "label-control">First Name</label>
		<input type = "text" value = "" class = "form-control" name = "first_name" required/>
	</div>
	<div class = "form-group">
		<label class = "label-control">Last Name</label>
		<input type = "text" value = "" class = "form-control" name = "last_name" required/>
	</div>
	<div class = "form-group">
		<label class = "label-control">Phone Number</label>
		<input type = "text" value = "" class = "form-control" name = "phone_number" required/>
	</div>
	<div class = "form-group">
		<label class = "label-control">Email</label>
		<input type = "email" value = "" class = "form-control" name = "email_address" required/>
	</div>
	<div class = "form-group">
		<label class = "label-control">Profile</label>
		<input type = "file" value = "" class = "form-control" name = "profile_picture" required/>
	</div>
	<div class = "form-group">
		<button class = "btn btn-primary btn-flat">Add Administrator</button>
	</div>
</form>