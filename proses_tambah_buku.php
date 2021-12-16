<?php 
if ($_POST) {
	$nama_buku=$_POST['nama_buku'];
	$deskripsi=$_POST['deskripsi'];
	if (empty($nama_buku)) {
		echo "<script>alert('Nama Buku Tidak Boleh Kosong');location.href='tambah_buku.php';</script>";
	}elseif (empty($deskripsi)) {
		echo "<script>alert('Deskripsi Tidak Boleh Kosong');location.href='tambah_buku.php';</script>";
	}else {
		include "koneksi.php";
		$insert=mysqli_query($conn,"insert into buku (nama_buku, deskripsi) value ('".$nama_buku."','".$deskripsi."')");
		if ($insert) {
			echo "<script>alert('Sukses Menambahkan Buku');location.href='buku.php';</script>";
		}else{
			echo "<script>alert('Gagal Menambahkan Buku');location.href='tambah_buku.php';</script>";
		}
	}
}
?>