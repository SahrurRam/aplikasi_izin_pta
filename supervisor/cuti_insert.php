<?php
include("sess_check.php");

$npp	= $_POST['npp'];
$ajuan = date('Y-m-d');
$mulai	= $_POST['mulai'];
$akhir	= $_POST['akhir'];
$jam_awal	= $_POST['jam_awal'];
$jam_akhir	= $_POST['jam_akhir'];
$ket	= $_POST['keterangan'];
$mng	= $_POST['mng'];

$start = new DateTime($mulai);
$finish = new DateTime($akhir);
$int = $start->diff($finish);
$dur = $int->days;
$durasi = $dur+1;

$stt_cuti = "Menunggu Approval Pejabat";

$id = date('dmYHis');

$pgw = "SELECT * FROM employee WHERE npp='$npp'";
$qpgw = mysqli_query($conn,$pgw);
$ress = mysqli_fetch_array($qpgw);


	$sql 	= "INSERT INTO cuti (no_cuti, npp, tgl_pengajuan, tgl_awal, tgl_akhir, jam_awal, jam_akhir, durasi, keterangan, manager, stt_cuti) 
				VALUES ('$id','$npp','$ajuan','$mulai','$akhir','$jam_awal','$jam_akhir','$durasi','$ket','$mng','$stt_cuti')";
	$query 	= mysqli_query($conn,$sql);
	if($query){
		echo "<script type='text/javascript'>
				alert('Pengajuan cuti berhasil!'); 
				document.location = 'cuti_waitapp.php'; 
			</script>";

	}else {
		echo "<script type='text/javascript'>
				alert('Terjadi kesalahan, silahkan coba lagi!.'); 
				document.location = 'cuti_create.php'; 
			</script>";
	}

?>