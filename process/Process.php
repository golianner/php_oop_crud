<?php

include_once "../includes/DbOperation.php";

$db = new DbOperation();

if (isset($_GET['kode'])) {
	switch ($_GET['kode']) {
		case 'insert':
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$kelas = $_POST['kelas'];
		$add = $db->insert_mahasiswa($nama,$email,$tgl_lahir,$kelas);
		if ($add) {
			header("location:".$db->base_url());
		}
		break;

		case 'update':
		$id = $_SESSION['id'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$kelas = $_POST['kelas'];
		$edit = $db->update_mahasiswa($nama,$email,$tgl_lahir,$kelas,$id);
		if ($edit) {
			header("location:".$db->base_url());
		}
		break;

		case 'delete':
		$id = $_GET['id'];
		$delete = $db->delete_mahasiswa($id);
		if ($delete) {
			header("location:".$db->base_url());
		}
		break;

		case 'login':
		if (!empty($_POST['username'] || !empty($_POST['password']))) {
			$username = $_POST['username'];
			$password = sha1($_POST['password']);
			$result = $db->login($username,$password);
			echo $result;
			if ($result > 0) {
				$_SESSION['akun_login'] = true;
				echo "<script> alert('OK'); </script>";
				header('location: '.$db->base_url());
			} else {
				echo "<script> alert('NO'); </script>";
				header('location: '.$db->base_url().'login.php');	
			}
		} else {
			header('location: '.$db->base_url().'login.php');
		}
		break;
		case 'logout':
		session_unset("akun_login");
		header("location:".$db->base_url());
		break;
	}
} else {
	header("location:".$db->base_url());
}