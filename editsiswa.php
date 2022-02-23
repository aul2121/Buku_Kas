<?php 
@$aksi = $_GET['aksi'];
@$judul = 'INPUT SISWA';
@$nimnya = $_GET['nim'];
if ($aksi == 'edit') {
$judul = 'EDIT SISWA';
$sql = "SELECT * FROM siswa WHERE NIM='$nimnya'";
$query = mysqli_query($konek, $sql);
$isi = mysqli_fetch_array($query);

}
?>