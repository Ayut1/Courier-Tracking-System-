<?php 
	include_once("includes/header.php"); 
	if($_REQUEST["branch_id"])
	{
		$SQL="SELECT * FROM branch WHERE branch_id = ".$_REQUEST["branch_id"];
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
				<h4 class="heading colr">Add New Branch</h4>

				<h6 class="heading colr">Branch Details</h6>
				<form action="lib/branch.php" enctype="multipart/form-data" method="post" name="frm_branch">
					<ul class="forms">
						<li class="txt">Branch Address</li>
						<li class="inputfield"><input name="branch_address" type="text" class="bar" required value="<?=$data['branch_address']?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Branch City</li>
						<li class="inputfield"><input name="branch_city" type="text" class="bar" required value="<?=$data['branch_city']?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Branch State</li>
						<li class="inputfield"><input name="branch_state" type="text" class="bar" required value="<?=$data['branch_state']?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Branch Country</li>
						<li class="inputfield"><input name="branch_country" type="text" class="bar" required value="<?=$data['branch_country']?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Branch Contact</li>
						<li class="inputfield"><input name="branch_contact" type="text" class="bar" required value="<?=$data['branch_contact']?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Branch Zipcode</li>
						<li class="inputfield"><input name="branch_zipcode" type="text" class="bar" required value="<?=$data['branch_zipcode']?>"/></li>
					</ul>
                                    

					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_branch">
					<input type="hidden" name="branch_id" value="<?=$data['branch_id']?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 