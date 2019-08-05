<?php include 'header.php'; 
if (isset($_GET['id'])) {
	$result = $db->get_mhs_by_id($_GET['id'])->get_result();
	$res = $result->fetch_object();
	$_SESSION['id'] = $_GET['id'];
} else {
	header("location:".$db->base_url());
}
?>
<section>
	<h2 style="text-align: center;">Edit Data Mahasiswa</h2>
	<div class="container">
		<form class="form" action="<?php echo $db->base_url().'process/Process.php?kode=update'; ?>" method="post">
			<div class="form-group">
				<label for="nama">Nama :</label>
				<input class="form-control" type="text" name="nama" id="nama" placeholder="Nama Mahasiswa" value="<?php echo $res->nama; ?>" required>
			</div>
			<div class="form-group">
				<label for="email">Email :</label>
				<input class="form-control" type="text" name="email" id="email" placeholder="Alamat Email" value="<?php echo $res->email; ?>" required>
			</div>
			<div class="form-group">
				<label for="tgl_lahir">Tanggal Lahir :</label>
				<input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo $res->tgl_lahir; ?>" required>
			</div>
			<div class="form-group">
				<label for="kelas">Kelas :</label>
				<select class="form-control" id="kelas" name="kelas" required>
					<option value="<?php echo $res->kelas; ?>"><?php echo $res->kelas; ?></option>
					<option value="TIF A">TIF A</option>
					<option value="TIF B">TIF B</option>
					<option value="TIF C">TIF C</option>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" style="width: 100px">
				<a href="<?php echo $db->base_url(); ?>" class="btn btn-success" style="width: 100px">Kembali</a>
			</div>
		</form>
	</div>
</section>
<?php include 'footer.php'; ?>