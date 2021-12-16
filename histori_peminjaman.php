<?php 
	include "header.php";
?>
<h2>Histori Peminjaman Buku</h2>
<table class="table table-hover table-striped">
	<thead>
		<th>NO</th><th>TANGGAL PINJAM</th><th>TANGGAL HARUS KEMBALI</th><th>NAMA BUKU</th><th>STATUS</th><th>AKSI</th>
	</thead>
	<tbody>
		<?php
		include "koneksi.php"; 
		$qry_histori=mysqli_query($conn, "select * from peminjaman_buku order by id_peminjaman_buku desc");
		$no=0;
		while ($dt_histori=mysqli_fetch_array($qry_histori)) {
			$no++;

			$buku_dipinjam="<ol>";
			$qry_buku=mysqli_query($conn, "select * from detail_peminjaman_buku join buku on buku.id_buku=detail_peminjaman_buku.id_buku where id_peminjaman_buku = '".$dt_histori['id_peminjaman_buku']."'");
			while ($dt_buku=mysqli_fetch_array($qry_buku)) {
				$buku_dipinjam.="<li>".$dt_buku['nama_buku']."</li>";
			}
			$buku_dipinjam.="</ol>";

			$qry_cek_kembali=mysqli_query($conn, "select * from pengembalian_buku where id_peminjaman_buku = '".$dt_histori['id_peminjaman_buku']."'");
			if (mysqli_num_rows($qry_cek_kembali)>0) {
				$dt_kembali=mysqli_fetch_array($qry_cek_kembali);
				$denda="Denda RP.".$dt_kembali['denda'];
				$status_kembali="<label class='alert alert-success'>Sudah Kembali <br>".$denda."</label>";
				$button_kembali="";				
			}else{
				$status_kembali="<label class='alert alert-danger'>Belum Kembali</label>";
				$button_kembali="<a href='kembali.php?id=".$dt_histori['id_peminjaman_buku']."' class='btn btn-warning' onclick='return confirm(\"Yakin ingin mengembalikan???\")'>Kembalikan</a>";
			}
		?>
			<tr>
				<td><?=$no?></td><td><?=$dt_histori['tanggal_pinjam']?></td><td><?=$dt_histori['tanggal_kembali']?></td><td><?=$buku_dipinjam?></td><td><?=$status_kembali?></td><td><?=$button_kembali?></td>
			</tr>
		<?php
		}
		?>
	</tbody>
</table>
<?php 
	include "footer.php";
?>