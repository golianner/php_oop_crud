<?php include 'header.php'; ?>
<section>
	<style type="text/css">
		thead th {
			text-align: center;
		}
	</style>
	<div class="container">
		<a href="<?php echo $db->base_url().'insert.php'; ?>" class="btn btn-primary" style="margin-bottom: 10px"> + Tambah Data</a>
		<table class="table table-bordered table-stripped table-hover">
			<thead>
				<tr>
					<th width="1%">No</th>
					<th width="25%">Nama</th>
					<th width="25%">Email</th>
					<th width="15%">Tanggal Lahir</th>
					<th width="10%">Kelas</th>
					<th width="15%" colspan="2">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$mhs = $db->get_mahasiswa()->get_result();
				while ($res = $mhs->fetch_object()) {
					?>
					<tr>
						<td align="center" style="vertical-align: middle;"><?php echo $no; ?></td>
						<td style="vertical-align: middle;"><?php echo $res->nama; ?></td>
						<td style="vertical-align: middle;"><?php echo $res->email; ?></td>
						<td align="center" style="vertical-align: middle;"><?php echo $res->tgl_lahir; ?></td>
						<td style="vertical-align: middle;"><?php echo $res->kelas; ?></td>
						<td style="vertical-align: middle;"><a href="<?php echo $db->base_url().'update.php?id='.$res->id; ?>" class="btn btn-success btn-sm">Edit</a></td>
						<td style="vertical-align: middle;"><a href="<?php echo $db->base_url().'process/Process.php?kode=delete&id='.$res->id; ?>" class="btn btn-danger btn-sm">Hapus</a></td>
					</tr>
					<?php
					$no++;
				}
				?>
			</tbody>
		</table>
	</div>
</section>
<?php include 'footer.php'; ?>