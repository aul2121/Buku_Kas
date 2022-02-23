<?php  
include "ceksession.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.min.css"/>
  <link rel="stylesheet" type="text/css" href="DataTables/buttons.dataTables.min.css"/>
  <script type="text/javascript" src="DataTables/datatables.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.min.js">
  	</script>
	<title>Aplikasi Buku Kas</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Buku Kas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?hal=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?hal=siswa">Siswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?hal=bayar">Pembayaran</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="Logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
	<?php
	include "koneksi.php";
	@$hal = $_GET['hal'];
	if ($hal == 'siswa') {
		include "siswa.php";
	} else if ($hal == 'bayar') {
       include "bayar.php";	
   }
   else if ($hal == 'home'){
   	include "home.php";
   }
   ?>
</div>
</body>
<script type="text/javascript" src="DataTables/jquery-3.5.1.js"></script>
<script type="text/javascript" src="DataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="DataTables/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="DataTables/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#tabelsiswa').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
       $('#tabelbayar').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
</script>
</html>