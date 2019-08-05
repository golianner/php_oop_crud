<?php
require_once 'includes/DbOperation.php';
$db = new DbOperation(); 
if (!$db->cek_login()) {
 	header("location:".$db->base_url().'login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
	</style>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title>Mahasiswa</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">WebSiteName</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Page 1-1</a></li>
							<li><a href="#">Page 1-2</a></li>
							<li><a href="#">Page 1-3</a></li>
						</ul>
					</li>
					<li><a href="#">Page 2</a></li>
					<li><a href="<?php echo $db->base_url().'?page=login'; ?>">Login</a></li>
					<li><a href="<?php echo $db->base_url().'process/Process.php?kode=logout'; ?>">Logout</a></li>
				</ul>
			</div>
		</nav>

