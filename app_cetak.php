<?php
	include("sess_check.php");

	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");
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

	<link href="libs/images/isk-logo.jpg" rel="icon" type="images/x-icon">

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
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td class="text-left" width="20%">
							<img src="libs/images/isk-logo.jpg" alt="logo-dkm" width="70" />
						</td>
						<td class="text-center" width="60%">
						<b>PT. ISK INDONESIA</b> <br>
						Jl. Maligi VII Lot Q-4C, Kawasan Industri KIIC, Sukaluyu, Kabupaten Karawang, Jawa Barat 17520<br>
						Telp: (021) 89115030<br>
						<td class="text-right" width="20%">
							<img src="libs/images/isk.jpg" alt="logo-dkm" width="130" height="70"/>
						</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>
<br/>
<br/>
	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center"><b>SURAT IZIN KELUAR KANTOR</b></h4>
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
			<p style="text-align: right;"><img src="foto/<?php echo $result['foto_emp'];?>" width="70px">&emsp;&emsp;&emsp;</p>
			<p style="text-align: right;"><?php echo $result['nama_emp'];?>&emsp;&emsp;</p>


				</h4>
			</table>
			<br>
			<div>
			<label>*Form ini dicetak oleh sistem dan tidak memerlukan tanda tangan atau pengesahan lain.</label>
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