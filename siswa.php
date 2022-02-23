<?php
@$aksi = $_GET['aksi'];
 @$judul = 'INPUT SISWA';
 @$btnaksi = 'Simpan';
 @$nimnya = $_GET['nim'];
 @$nim = '';
 @$nama = '';
 @$alamat ='';
 @$nohp = '';

if ($aksi == 'edit') {
  $judul = 'EDIT SISWA';
  $btnaksi = 'Edit';
  $sql = "SELECT * FROM siswa WHERE NIM='$nimnya'";
  $query = mysqli_query($konek, $sql);
  $isi = mysqli_fetch_array($query);
  $nim = $isi[0];
  $nama =  $isi[1];
  $alamat = $isi[2];
  $nohp = $isi[3];
} else if($aksi == 'hapus') {
	$sql = "DELETE FROM siswa WHERE NIM='$nimnya'";
	$query = mysqli_query($konek, $sql);
	echo "<meta http-equiv='refresh' content='1;url=?hal=siswa'>";
}
?>
<div class="row mt-3">
  <div class="col-sm-4 ml-2">
    <div class="card border-dark mb-3 target-left" style="max-width: 18rem;">
  <div class="card-header bg-trdarkansparent border-dark"><?php echo $judul; ?></div>
  <div class="card-body text-dark">
    <form method="post" action="">
  <div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="number" value="<?php echo $nim; ?>" name="nim" class="form-control" id="nim" required="">
  </div>
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control" id="nama" required="">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea rows="2" cols="10" name="alamat" class="form-control" id="alamat" required=""><?php echo $alamat; ?></textarea> 
  </div>
  <div class="mb-3">
    <label for="nohp" class="form-label">No.HP</label>
    <input type="number" name="nohp" value="<?php echo $nohp; ?>" class="form-control" id="nohp" required=""></textarea> 
  </div>
  <input type="submit" class="btn btn-primary" value="<?php echo $btnaksi; ?>" name="btnaksi">
</form>
</div>
  </div>
  <?php
  //jika tombol simpan di klik 
if (@$_POST['btnaksi'] == 'Simpan') {
  $nim = $_POST ['nim'];
  $nama = $_POST ['nama'];
  $alamat = $_POST ['alamat'];
  $nohp = $_POST ['nohp'];
  $sql = "INSERT into siswa VALUES('$nim', '$nama',  '$alamat', '$nohp')";
  $query= mysqli_query($konek, $sql);
  echo "<span class='badge badge-primary'>Data Berhasil disimpan</span>";
  echo "<meta http-equiv='refresh' content='1;url=?hal=siswa'>";

  //jika tombol edit klik 
} else if (@$_POST['btnaksi'] == 'Edit') {
  $nim = $_POST ['nim'];
  $nama = $_POST ['nama'];
  $alamat = $_POST ['alamat'];
  $nohp = $_POST ['nohp'];
  $sql = "UPDATE siswa SET NIM='$nim', Nama='$nama', Alamat='$alamat', No_HP='$nohp' WHERE NIM='$nimnya'";
  $query= mysqli_query($konek, $sql);
  echo "<span class='badge badge-primary'>Data berhasil diubah</span>";
  echo "<meta http-equiv='refresh' content='1;url=?hal=siswa'>";


}
  ?>
  </div>
  <div class="col-sm">
    <table class="table table-bordered" id="tabelsiswa">
    	  <thead class="table-dark">
      <tr>
<th>Nim</th>
<th>Nama</th>
<th>Alamat</th>
<th>No.HP</th>
<th>Aksi</th>
</tr>
<tbody>
  <?php
  $sql = "SELECT * FROM siswa";
  $query= mysqli_query($konek, $sql);
  while ($data = mysqli_fetch_array($query)) {
   echo "<tr>
    <td>$data[NIM]</td>
    <td>$data[Nama]</td>
    <td>$data[Alamat]</td>
    <td>$data[No_HP]</td>
    <td> <a class='btn btn-sm btn-primary' href='?hal=siswa&aksi=edit&nim=$data[NIM]'>Edit</a>
    <a class='btn btn-sm btn-danger' href='?hal=siswa&aksi=hapus&nim=$data[NIM]'>Hapus</a></td>
  </tr>";
  }
  ?>
  </tbody>
</table>
  </div>
</div>