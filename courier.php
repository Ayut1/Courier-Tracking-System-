<?php 
	include_once("includes/header.php"); 
	if(isset($_REQUEST["courier_id"]))
	{
		$SQL="SELECT * FROM courier WHERE courier_id = $_REQUEST[courier_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Add New Courier</h4>

				<h6 class="heading colr">Sender Details</h6>
				<?php if(isset($_REQUEST['courier_id']))  { ?>
				<form action="lib/courier.php" enctype="multipart/form-data" method="post" name="frm_courier">
					<ul class="forms">
						<li class="txt">Sender Name</li>
						<li class="inputfield"><input name="courier_sender_name" type="text" class="bar" required value="<?=$data['courier_sender_name']?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Sender Mobile</li>
						<li class="inputfield"><input name="courier_sender_mobile" type="text" class="bar" required value="<?=$data['courier_sender_mobile']?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Sender Email</li>
						<li class="inputfield"><input name="courier_sender_email" type="text" class="bar" required value="<?=$data['courier_sender_email']?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Full Address</li>
						<li class="textfield"><textarea name="courier_sender_address" cols="" rows="6" required><?=$data['courier_sender_address']?></textarea></li>
					</ul>
					<ul class="forms">
						<li class="txt">Weight</li>
						<li class="inputfield"><input name="courier_package_weight" type="number" step="0.01" class="bar" required value="<?=$data['courier_package_weight']?>"/></li>
					</ul>

					<h6 class="heading colr" style="clear:both">Receiver Details</h6>				
					<ul class="forms">
						<li class="txt">Receiver Name</li>
						<li class="inputfield"><input name="courier_receiver_name" type="text" class="bar" required value="<?=$data['courier_receiver_name']?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Receiver Mobile</li>
						<li class="inputfield"><input name="courier_receiver_mobile" type="text" class="bar" required value="<?=$data['courier_receiver_mobile']?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Receiver Email</li>
						<li class="inputfield"><input name="courier_receiver_email" type="text" class="bar" required value="<?=$data['courier_receiver_email']?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Full Address</li>
						<li class="textfield"><textarea name="courier_receiver_address" cols="" rows="6" required><?=$data['courier_receiver_address']?></textarea></li>
					</ul>
					<?php if($_SESSION['user_details']['user_level_id'] == 1) { ?>
					<h6 class="heading colr" style="clear:both">Cost and Description Details</h6>	
					<ul class="forms">
						<li class="txt">Total Cost</li>
						<li class="inputfield"><input name="courier_cost" type="number" step="0.01" class="bar" value="<?=$data['courier_cost']?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="courier_description" cols="" rows="6"><?=$data['courier_description']?></textarea></li>
					</ul>	
					<?php } ?>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_courier">
					<input type="hidden" name="courier_id" value="<?=$data['courier_id']?>">
				</form>
				<?php } else{ ?>
					<form action="lib/courier.php" enctype="multipart/form-data" method="post" name="frm_courier">
					<ul class="forms">
						<li class="txt">Sender Name</li>
						<li class="inputfield"><input name="courier_sender_name" type="text" class="bar" required value=""/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Sender Mobile</li>
						<li class="inputfield"><input name="courier_sender_mobile" type="text" class="bar" required value=""></li>
					</ul>
					<ul class="forms">
						<li class="txt">Sender Email</li>
						<li class="inputfield"><input name="courier_sender_email" type="text" class="bar" required value=""></li>
					</ul>
					<ul class="forms">
						<li class="txt">Full Address</li>
						<li class="textfield"><textarea name="courier_sender_address" cols="" rows="6" required></textarea></li>
					</ul>
					<ul class="forms">
						<li class="txt">Weight</li>
						<li class="inputfield"><input name="courier_package_weight" type="number" step="0.01" class="bar" required value=""></li>
					</ul>

					<h6 class="heading colr" style="clear:both">Receiver Details</h6>				
					<ul class="forms">
						<li class="txt">Receiver Name</li>
						<li class="inputfield"><input name="courier_receiver_name" type="text" class="bar" required value=""></li>
					</ul>
					<ul class="forms">
						<li class="txt">Receiver Mobile</li>
						<li class="inputfield"><input name="courier_receiver_mobile" type="text" class="bar" required value=""></li>
					</ul>
					<ul class="forms">
						<li class="txt">Receiver Email</li>
						<li class="inputfield"><input name="courier_receiver_email" type="text" class="bar" required value=""></li>
					</ul>
					<ul class="forms">
						<li class="txt">Full Address</li>
						<li class="textfield"><textarea name="courier_receiver_address" cols="" rows="6" required></textarea></li>
					</ul>
					<?php if($_SESSION['user_details']['user_level_id'] == 1) { ?>
					<h6 class="heading colr" style="clear:both">Cost and Description Details</h6>	
					<ul class="forms">
						<li class="txt">Total Cost</li>
						<li class="inputfield"><input name="courier_cost" type="number" step="0.01" class="bar" value=""></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="courier_description" cols="" rows="6"></textarea></li>
					</ul>	
					<?php } ?>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_courier">
				</form>
					<?php } ?>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 