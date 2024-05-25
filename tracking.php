<?php 
	include_once("includes/header.php"); 
	if($_SESSION['login'] != 1) {
		header("Location:login.php?msg=Login first to continue !!!");
	} 
	if($_REQUEST['tracking_id'])
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
				<h4 class="heading colr">Add New Tracking</h4>
				<form action="lib/tracking.php" enctype="multipart/form-data" method="post" name="frm_car">
					<ul class="forms">
						<li class="txt">Traking Number</li>
						<li class="inputfield">
							<select name="tracking_tracking" class="bar" required/>
								<?php echo get_new_optionlist("courier","courier_tracking","courier_tracking",$data['tracking_tracking']); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Date</li>
						<li class="inputfield"><input name="tracking_date" id="tracking_date" type="text" class="bar" required value="<?=$data['tracking_date']?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="tracking_description" cols="" rows="6" required><?=$data['tracking_description'];?></textarea></li>
						</li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Save Tracking" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="tracking_id" value="<?=$data['tracking_id']?>">
					<input type="hidden" name="avail_image" value="<?=$data['tracking_photo']?>">
					<input type="hidden" name="act" value="save_tracking">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php if($data['tracking_photo']) { ?>
				<img src="<?=$SERVER_PATH.'uploads/'.$data['tracking_photo']?>">
			<?php } ?>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
