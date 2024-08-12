<?php
	include("sess_check.php");

	include("dist/function/format_tanggal.php");
	$no 	 = $_GET['no'];
	$sql = "SELECT cuti.*, employee.* FROM cuti, employee WHERE cuti.npp=employee.npp
			AND cuti.no_cuti ='$no'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($query);
	// deskripsi halaman
	$pagedesc = "Cetak Form Cuti";
	$pagetitle = str_replace(" ", "_", $pagedesc)
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="universitas pamulang">

	<title><?php echo $pagetitle ?></title>

	<link href="libs/images/logo-pta.png" rel="icon" type="images/x-icon">

	<!-- Bootstrap Core CSS -->
	<link href="libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/offline-font.css" rel="stylesheet">
	<link href="dist/css/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="libs/jquery/dist/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
<br/>
<br/>
	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">FORM PENGAJUAN IZIN (APPROVED)</h4>
			<br />
			<br />
			<table class="table table-bordered">
<h4>
			<p>Perihal: <b>Permohonan Izin Keluar Kantor</b></p>
			<p>Kepada</p>
			<p>Yth. Sekretaris Pengadilan Tinggi Agama Makassar</p>
			<p>Saya yang bertanda tangan dibawah ini:</p>
			<p>Nama&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: <?php echo $result['nama_emp'];?></p>
			<p>NIP&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&nbsp;: <?php echo $result['npp'];?></p>
			<p>Jabatan&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : <?php echo $result['jabatan'];?></p>
			<p>Unit Kerja&emsp;&emsp;&emsp;&emsp;&ensp;: Pengadilan Tinggi Agama Makassar</p>
			<p>Memohon keluar kantor</p>
			<p>Pada Hari/Tanggal&emsp; : <?php echo IndonesiaTgl($result['tgl_awal']);?></p>
			<p>Sampai Pada&emsp;&emsp;&emsp;&ensp;: <?php echo IndonesiaTgl($result['tgl_akhir']);?></p>
			<p>Untuk keperluan&emsp;&emsp;: <?php echo $result['keterangan'];?></p>
			<p>Demikian permohonan ini kami sampaikan, atas perkenaannya kami ucapkan terimakasih</p>
			<p style="text-align: right;">Pemohon Izin&emsp;&emsp;</p>
			<br><br><br>
			<p style="text-align: right;"><?php echo $result['nama_emp'];?>&emsp;&emsp;</p>
			</h4>
			
			<h5>
			<p><b>Catatan:</b></p>
			<p><b>Setelah mengisi Permohonan Izin Keluar Kantor, selanjutnya membawa permohonan izin kepada Pejabat untuk diberikan Surat Izin Keluar Kantor, Kemudian menyerahkan Surat Izin Keluar Kantor kepada bagian Kepagawaian</b></p>
			</h5>
			</div>
			
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="libs/jTerbilang/jTerbilang.js"></script>

</body>
</html>