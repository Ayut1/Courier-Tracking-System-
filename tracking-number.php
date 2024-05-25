<?php 
	include_once("includes/header.php"); 
	if($_SESSION['login'] != 1) {
		header("Location:login.php?msg=Login first to continue !!!");
	} 
	if($_REQUEST["tracking_id"])
	{
		$SQL="SELECT * FROM tracking WHERE tracking_id = $_REQUEST[tracking_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
	global $SERVER_PATH;
?> 
<script>

jQuery(function() {
	jQuery( "#tracking_date" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-0:+0",
	   dateFormat: 'd MM,yy'
	});
});
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Traking Information</h4>
				<div style="font-size: 17px;color: #000000;font-weight: bold;">
				Your courier has been saved successfully. Your tracking numbner is 
				<span style="color:#FF0000"><?=$_REQUEST['tracking_tracking']?></span>
				</div>
			</div>
		</div>
		<div class="col2">
			<?php if($data[tracking_photo]) { ?>
				<img src="<?=$SERVER_PATH.'uploads/'.$data[tracking_photo]?>">
			<?php } ?>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
