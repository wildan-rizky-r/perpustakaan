<?php 
	include "header.php";
?>
<h2>Daftar Buku</h2>
<hr>
<a href="tambah_buku.php" class="btn btn-primary" style="margin: 10px;">Tambah</a>
<div class="row">
	<?php 
	include "koneksi.php";
	$qry_buku=mysqli_query($conn, "select * from buku");
	while ($dt_buku=mysqli_fetch_array($qry_buku)) {
	?>
	<div class="col-md-3" style="border: 3px;">
		<div class="card" style="background-color: gray; color: white; display: inline-block; margin: 5px;">
			<img src="buku.jpg" class="card-img-top" style="height: 50%">
			<div class="card-body">
				<h5 class="card-title" style="text-align: center; color: ghostwhite;"><?=$dt_buku['nama_buku']?></h5>
				<p class="card-text"><?=substr($dt_buku['deskripsi'], 0, 200)?></p>
				<a href="pinjam_buku.php?id_buku=<?=$dt_buku['id_buku']?>" class="btn btn-primary">Pinjam</a>
			</div>
		</div>
	</div>
<?php 
	}
?>
</div>
<?php 
	include "footer.php";
?>