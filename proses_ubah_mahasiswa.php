<?php 
if ($_POST) {
	$id_mhs=$_POST['id_mhs'];
	$nama=$_POST['nama'];
	$tanggal_lahir=$_POST['tanggal_lahir'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$alamat=$_POST['alamat'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$id_jurusan=$_POST['id_jurusan'];
	if (empty($nama)) {
		echo "<script>alert('Nama tidak boleh kosong');location.href='tambah_mahasiswa.php';</script>";

	}elseif (empty($username)) {
		echo "<script>alert('Username tidak boleh kosong');location.href='tambah_mahasiswa.php';</script>";	
	}else{
		include "koneksi.php";
		if (empty($password)) {
			$update=mysqli_query($conn, "update mahasiswa set nama='".$nama."',tanggal_lahir='".$tanggal_lahir."',jenis_kelamin='".$jenis_kelamin."',alamat='".$alamat."',username='".$username."',id_jurusan='".$id_jurusan."' where id_mhs='".$id_mhs."'") or die(mysqli_error($conn));
			if ($update) {
				echo "<script>alert ('Sukses update data');location.href='tampil_mahasiswa.php';</script>";
			} else{
				 echo "<script>alert ('Gagal update data');location.href='ubah_mahasiswa.php?id_mhs=".$id_mhs."';</script>";
			}
		} else{
			$update=mysqli_query($conn, "update mahasiswa set nama='".$nama."',tanggal_lahir='".$tanggal_lahir."',jenis_kelamin='".$jenis_kelamin."',alamat='".$alamat."',username='".$username."',password='".$password."',id_jurusan='".$id_jurusan."' where id_mhs= '".$id_mhs."'") or die(mysqli_error($conn));
			if ($update) {
				echo "<script>alert('Sukses update data');location.href='tampil_mahasiswa.php';</script>";	
			} else{
				echo "<script>alert('Gagal update data');location.href='ubah_mahasiswa.php?id_mhs=".$id_mhs."';</script>";
			}
		}
	}
}
?>