<?php
include("sess_check.php");

$no=$_POST['no'];
$aksi=$_POST['aksi'];
$reject=$_POST['reject'] ?? null;
$stt_cuti = "";
$null = 0;

$targetDirr = 'img_ttd/';
$target_file = $targetDirr . basename($_FILES["ttd"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$check = getimagesize($_FILES["ttd"]["tmp_name"]);
move_uploaded_file($_FILES["ttd"]["tmp_name"], $target_file);
 $escaped_filename = $conn->real_escape_string(basename($_FILES["ttd"]["name"]));

if($aksi=="2"){
	$stt_cuti="Rejected";
	$sql = "UPDATE cuti SET
			stt_cuti='. $stt_cuti .',
			lead_app='. $null .',
			spv_app='. $null .',
			mng_app='. $null .',
			ket_reject='. $reject .'
			WHERE no_cuti='. $no .'";
		$ress = mysqli_query($conn, $sql);
		header("location: app_wait.php?act=update&msg=success");
	
}else{
	$stt_cuti="Approved";
	$num	=1;
	$sql = "UPDATE cuti SET
			stt_cuti='". $stt_cuti ."',
			hrd_app='". $num ."',
			ttd='". $escaped_filename ."'
			WHERE no_cuti='". $no ."'";
	echo $sql;
		$ress = mysqli_query($conn, $sql);
		header("location: app_wait.php?act=update&msg=success");
	
}
?>