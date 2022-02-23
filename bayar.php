<?php
@$aksi = $_GET['aksi'];
 @$judul = 'INPUT PEMBAYARAN';
 @$btnaksi = 'Simpan';
 @$idnya = $_GET['ID'];
 @$tgl_bayar = '';
 @$jml_bayar ='';
 @$nim = '';


if ($aksi == 'edit') {
  $judul = 'EDIT PEMBAYARAN';
  $btnaksi = 'Edit';
  $sql = "SELECT * FROM pembayaran_kas WHERE ID='$idnya'";
  $query = mysqli_query($konek, $sql);
  $isi = mysqli_fetch_array($query);
  $tgl_bayar = $isi[1];
  $jml_bayar = $isi[2];
  $nim = $isi[3];

} else if($aksi == 'hapus') {
	$sql = "DELETE FROM pembayaran_kas WHERE ID='$idnya'";
	$query = mysqli_query($konek, $sql);
	echo "<meta http-equiv='refresh' content='1;url=?hal=bayar'>";
}
?>
<div class="row mt-3">
  <div class="col-sm-3 ml-2">
    <div class="card border-dark mb-3 target-left" style="max-width: 18rem;">
  <div class="card-header bg-trdarkansparent border-dark"><?php echo $judul; ?></div>
  <div class="card-body text-dark">
    <form method="post" action="">
  <div class="mb-3">
     <div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <select name="nim" id="" class="form-control">
      <option value="">Pilih Siswa</option>
      <?php  
      $sql = "SELECT * FROM siswa";
      $query = mysqli_query($konek, $sql);
      while ($data = mysqli_fetch_array($query)) {
        echo "<option value=$data[NIM]>$data[NIM] - $data[Nama]</option>";
      }
      ?>
    </select>
  </div>
    <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
    <input type="date" name="tgl_bayar" value="<?php echo $tgl_bayar; ?>" class="form-control" id="tgl_bayar" required="">
  </div>
  <div class="mb-3">
    <label for="jml_bayar" class="form-label">Jumlah Bayar</label>
    <textarea rows="2" cols="10" name="jml_bayar" class="form-control" id="jml_bayar" required=""><?php echo $jml_bayar; ?></textarea> 
  </div>
 
  
  <input type="submit" class="btn btn-primary" value="<?php echo $btnaksi; ?>" name="btnaksi">
</form>
</div>
  </div>
  <?php
  //jika tombol simpan di klik 
if (@$_POST['btnaksi'] == 'Simpan') {
  $tgl_bayar = $_POST ['tgl_bayar'];
  $jml_bayar = $_POST ['jml_bayar'];
  $nim = $_POST ['nim'];
  $sql = "INSERT into pembayaran_kas VALUES('', '$tgl_bayar',  '$jml_bayar', '$nim')";
  $query= mysqli_query($konek, $sql);
  echo "<span class='badge badge-primary'>Data Berhasil disimpan</span>";
  echo "<meta http-equiv='refresh' content='1;url=?hal=bayar'>";


  //jika tombol edit klik 
} else if (@$_POST['btnaksi'] == 'Edit') {
  $nim = $_POST ['nim'];
  $tgl_bayar = $_POST ['tgl_bayar'];
  $jml_bayar = $_POST ['jml_bayar'];
  $sql = "UPDATE pembayaran_kas SET tgl_bayar='$tgl_bayar', jml_bayar='$jml_bayar', NIM='$nim' WHERE ID='$idnya'";
  $query= mysqli_query($konek, $sql);
  echo "<span class='badge badge-primary'>Data berhasil diubah</span>";
  echo "<meta http-equiv='refresh' content='1;url=?hal=bayar'>";
  
}
  ?>
  </div>
  <div class="col-sm">
    <table class="table" id="tabelbayar">
    	  <thead class="table-dark">
      <tr>
<th>NIM</th>
<th>Tanggal Bayar</th>
<th>Jumlah Bayar</th>
<th>Aksi</th>
</tr>
<tbody>
  <?php
  $sql = "SELECT * FROM pembayaran_kas";
  $query= mysqli_query($konek, $sql);
  while ($data = mysqli_fetch_array($query)) {
   echo "<tr>
   <td>$data[NIM]</td>
    <td>$data[tgl_bayar]</td>
    <td>$data[jml_bayar]</td>
    <td> <a class='btn btn-sm btn-primary' href='?hal=bayar&aksi=edit&ID=$data[ID]'>Edit</a>
    <a class='btn btn-sm btn-danger' href='?hal=bayar&aksi=hapus&ID=$data[ID]'>Hapus</a></td>
  </tr>";
  }
  ?>
  </tbody>
</table>
  </div>
</div>