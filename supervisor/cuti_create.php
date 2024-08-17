<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Buat Pengajuan";
	$menuparent = "cuti";
	include("layout_top.php");
	$now = date('Y-m-d');
	$timeZone = new DateTime('now', new DateTimeZone('Asia/Makassar'));
	$timeZone->setTimezone(new DateTimeZone('Asia/Makassar'));
	$npp = $sess_spvid;
?>
<script type="text/javascript">
function valid()
{
	if(document.cuti.akhir.value < document.cuti.mulai.value){
		alert("Tanggal akhir harus lebih besar dari tanggal mulai cuti!");
		return false;
	}

	if(document.cuti.mulai.value < document.cuti.now.value){
		alert("Tanggal mulai cuti tidak valid!");
		return false;
	}
	
	return true;
}
</script>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Pengajuan Izin</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" name="cuti" action="cuti_insert.php" method="POST" enctype="multipart/form-data" onSubmit="return valid();">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Form Pengajuan Izin</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Mulai Izin</label>
										<div class="col-sm-4">
											<input type="date" name="mulai" class="form-control" required>
											<input type="hidden" name="now" class="form-control" value="<?php echo $now;?>" required>
											<input type="hidden" name="npp" class="form-control" value="<?php echo $npp;?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Akhir Izin</label>
										<div class="col-sm-4">
											<input type="date" name="akhir" class="form-control" required>
										</div>
									</div>
									<!-- <div class="form-group">
										<label class="control-label col-sm-3">Waktu Izin</label>
										<div class="col-sm-4"> -->
											<input type="hidden" name="time" value="<?php echo $timeZone->format('H:i'); ?>" class="form-control" >
										<!-- </div>
									</div> -->
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan</label>
										<div class="col-sm-4">
											<textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" required></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Pejabat</label>
										<div class="col-sm-4">
											<select name="mng" id="mng" class="form-control" required>
											<option value="" selected>======== Pilih Pejabat ========</option>
												<?php
													$mySql = "SELECT * FROM employee WHERE hak_akses='Pejabat' ORDER BY nama_emp";
													$myQry = mysqli_query($conn, $mySql);
													$dataLeader = $result['npp'];
													while ($leaderData = mysqli_fetch_array($myQry)) {
														if ($leaderData['npp']== $dataLeader) {
														$cek = " selected";
														} else { $cek=""; }
														echo "<option value='$leaderData[npp]' $cek>".$leaderData['nama_emp']."</option>";
													}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>