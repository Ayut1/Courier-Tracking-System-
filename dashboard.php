<?php
	include_once("includes/header.php");
	if(isset($_REQUEST["car_id"]))
	{
		$SQL="SELECT * FROM car WHERE car_id = $_REQUEST[car_id]";
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
					<h4 class="heading colr">Welcome to Courier Tracking System</h4>
					<div class='msg'><?=$_REQUEST['msg']?></div>
					<ul class="login-home">
						<?php if($_SESSION['user_details']['user_level_id'] == 1) { ?>
							<li><a href="courier.php">Add Courier</a></li>
							<li><a href="tracking.php">Add Tracking</a></li>
                                                        <li><a href="branches.php">Add Branch</a></li>
							<li><a href="courier-report.php">Courier Report</a></li>
                                                        <li><a href="branch-report.php">Branch Report</a></li>
                                                        <li><a href="user-report.php">User Report</a></li>
							<li><a href="./lib/login.php?act=logout">Logout</a></li>
						<?php } ?>
						<?php if($_SESSION['user_details']['user_level_id'] == 2) { ?>
							<li><a href="./dashboard.php">Dashboard</a></li>
							<li><a href="courier.php">Add Courier</a></li>
							<li><a href="./courier-report.php">My Couriers</a></li>
							<li><a href="./lib/login.php?act=logout">Logout</a></li>

						<?php } ?>
					</ul>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?>
