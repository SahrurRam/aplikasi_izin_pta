<?php
include("sess_check.php");

$no=$_POST['no'];
$aksi=$_POST['aksi'];
$reject=$_POST['reject'];
$stt_cuti = "";
$null = 0;

if($aksi=="2"){
	$stt_cuti="Rejected";
	$sql = "UPDATE cuti SET
			stt_cuti='". $stt_cuti ."',
			lead_app='". $null ."',
			spv_app='". $null ."',
			ket_reject='". $reject ."'
			WHERE no_cuti='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: approval_cuti.php?act=update&msg=success");
	
}else{
	$stt_cuti="Menunggu Approval Admin";
	$num	=1;
	$sql = "UPDATE cuti SET
			stt_cuti='". $stt_cuti ."',
			mng_app='". $num ."'
			WHERE no_cuti='". $no ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: approval_cuti.php?act=update&msg=success");
	
}
?>