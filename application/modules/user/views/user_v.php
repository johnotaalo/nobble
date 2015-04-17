<!DOCTYPE html>
<html>
<head>
	<title>NobbleDrug Authentication</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/bootstrap/cosmo.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/ionicons/css/ionicons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/custom/login.css">
</head>
<body>
	<?php
		if (isset($login)) {
			echo "<center>";
			echo '<div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Oh snap!</strong> Error Loging in. Please Try Again.
              </div></center>';
		}
	?>
	<div class = "overlay"></div>
	<div class = "login-container col-md-3">
		<div class = "login-panel">
			<div class = "outer_border">
				<div class = "login-heading">
					<center><div class = "avatar-holder animated tada" style="background-image: url('<?php echo base_url(); ?>assets/login/avatars/avatar-male.png')"></div></center>
					<h4>Login Below</h4>
				</div>
			</div>
			<div class = "login-body animated fadeInLeft">
				<form method = "POST" name = "login-form" action = "<?php echo base_url();?>user/authenticate" id = "login-form">
					<div class = "input"><input type = "text" name = "username" placeholder = "Username" id = "username" required/><span class = "input-icon" id = "sign-user"><i class = "ion ion-person"></i></span></div>
					<div class = "input"><input type = "password" name = "password" placeholder = "Password" id = "password" required/><span class = "input-icon"><i class = "ion ion-lock-combination"></i></span></div>
					<button class = "login-button" id = "sign-in"><i class = "ion ion-log-in"></i> Sign In</button>
				</form>

				<small>Problem signing in? <a href = "#" id = "help">Get Help here</a></small>
			</div>
			<div class = "login-footer"></div>
		</div>
	</div>

	<div class = "footer animated pulse">
		&copy; Chrizota Systems <?php echo date('Y');?>
	</div>

	<!--scripts -->
	<script type="text/javascript" src = "<?php echo base_url(); ?>assets/login/scripts/jquery.js"></script>
	<script type="text/javascript" src = "<?php echo base_url(); ?>assets/login/scripts/login.js"></script>
</body>
</html>