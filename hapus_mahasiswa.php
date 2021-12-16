<?php 
	if($_GET['id_mhs']) {
		include "koneksi.php";
		$qry_hapus=mysqli_query($conn, "delete from mahasiswa where id_mhs='".$_GET['id_mhs']."'");
		if ($qry_hapus) {
			echo "<script>alert('Sukses Hapus Mahasiswa');location.href='tampil_mahasiswa.php';</script>";
		}else{
			echo "<script>alert('Gagal Hapus Mahasiswa');location.href='tampil_mahasiswa.php';</script>";
		}
	}
?>