<?php 
	include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOO17+AMvyTG2x" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<h3>Data Jurusan</h3>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>NO</th>
				<th>JURUSAN</th>
				<th>ANGKATAN</th>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include "koneksi.php";
			$qry_jurusan = mysqli_query($conn,"select * from jurusan");
			$no = 0;
			while ($data_jurusan = mysqli_fetch_array($qry_jurusan)) {
			$no++;?>
			<tr>
			<td><?=$no?></td><td><?=$data_jurusan['nama_jurusan']?></td> <td><?=$data_jurusan['angkatan']?></td>

			<td><a href="hapus_jurusan.php?id_jurusan=<?=$data_jurusan['id_jurusan']?>" onclick="return confirm('Apakah anda yakin menghapus data ini')" class="btn btn-danger">Hapus</a></td>
			</tr>
			<?php 
			}
			?>
			</tbody>
	</table>
	<a href="tambah_jurusan.php" class="btn btn-primary" style="margin-left: 100px;">Tambah</a>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
<?php 
	include "footer.php";
?>