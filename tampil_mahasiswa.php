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
	<h3>Data Mahasiswa</h3>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>NO</th>
				<th>NAMA</th>
				<th>TANGGAL LAHIR</th>
				<th>JENIS KELAMIN</th>
				<th>ALAMAT</th>
				<th>USERNAME</th>
				<th>JURUSAN</th>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include "koneksi.php";
			$qry_mahasiswa=mysqli_query($conn,"select * from mahasiswa join jurusan on jurusan.id_jurusan=mahasiswa.id_jurusan");
			$no=0;
			while ($data_mahasiswa=mysqli_fetch_array($qry_mahasiswa)) {
				$no++;?>
				<tr>
					<td><?=$no?></td>
					<td><?=$data_mahasiswa['nama']?></td>
					<td><?=$data_mahasiswa['tanggal_lahir']?></td>
					<td><?=$data_mahasiswa['jenis_kelamin']?></td>
					<td><?=$data_mahasiswa['alamat']?></td>
					<td><?=$data_mahasiswa['username']?></td>
					<td><?=$data_mahasiswa['nama_jurusan']?></td>
					<td><a href="ubah_mahasiswa.php?id_mhs=<?=$data_mahasiswa['id_mhs']?>" class="btn btn-success">Ubah</a> | <a href="hapus_mahasiswa.php?id_mhs=<?=$data_mahasiswa['id_mhs']?>" onclick="return confirm('Apakah anda yakin menghapus data ini')" class="btn btn-danger">Hapus</a> </td>
				</tr>
				<?php 
				}
				?>
		</tbody>
	</table>
	<a href="tambah_mahasiswa.php" class="btn btn-primary" style="margin-left: 100px;">Tambah</a>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
<?php 
	include "footer.php";
?>