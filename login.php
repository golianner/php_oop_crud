<?php
include_once 'includes/DbOperation.php';
$db = new DbOperation();
if ($db->cek_login()) {
	header("location:".$db->base_url());
}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		.login-form {
			width: 340px;
			margin: 50px auto;
		}
		.login-form form {
			margin-bottom: 15px;
			background: #f7f7f7;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}
		.login-form h2 {
			margin: 0 0 15px;
		}
		.form-control, .btn {
			min-height: 38px;
			border-radius: 2px;
		}
		.btn {        
			font-size: 15px;
			font-weight: bold;
		}
	</style>
	<title>Halaman Login</title>
</head>
<body>
	<div class="login-form">
		<form action="<?php echo $db->base_url().'process/Process.php?kode=login'; ?>" method="post">
			<h2 class="text-center">Log in</h2>       
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Username" required="required">
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password" required="required">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">Log in</button>
			</div>
			<div class="clearfix">
				<label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
				<a href="#" class="pull-right">Forgot Password?</a>
			</div>        
		</form>
		<p class="text-center"><a href="#">Create an Account</a></p>
	</div>
</body>
</html>