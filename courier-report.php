<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php");
	$SQL="SELECT * FROM courier";

	if($_SESSION['user_details']['user_level_id'] == 2) {
		$SQL="SELECT * FROM courier WHERE courrier_paid='1' AND courier_user_id = ".$_SESSION['user_details']['user_id'];
	}

	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
	global $SERVER_PATH;
?>
<script>
function delete_courier(courier_id)
{
	if(confirm("Do you want to delete the courier?"))
	{
		this.document.frm_courier.courier_id.value=courier_id;
		this.document.frm_courier.act.value="delete_courier";
		this.document.frm_courier.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">Courier Reports</h4>
				<div class = "msg"><?=$_REQUEST['msg']?></div>
			<?php if(mysqli_num_rows($rs)) { ?>
			<form name="frm_courier" action="lib/courier.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Sr. No.</td>
						<td scope="col">Tracking Number</td>
						<td scope="col">Sender Name</td>
						<td scope="col">Receiver Name</td>
						<td scope="col">Sender Mobile</td>
						<td scope="col">Receiver Mobile</td>
						<?php if($_SESSION['user_details']['user_level_id'] == 1) { ?>
						<td scope="col">Action</td>
						<?php } ?>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><a href="tracking-report.php?tracking_tracking=<?=$data['courier_tracking']?>" style="color:#FF0000; font-size:14px; font-weight:bold; text-decoration:underline"><?=$data['courier_tracking']?></a></td>
						<td><?=$data['courier_sender_name']?></td>
						<td><?=$data['courier_receiver_name']?></td>
						<td><?=$data['courier_sender_mobile']?></td>
						<td><?=$data['courier_receiver_mobile']?></td>
						<?php if($_SESSION['user_details']['user_level_id'] == 1) { ?>
						<td style="text-align:center"><a href="courier.php?courier_id=<?php echo $data['courier_id'] ?>">Edit</a> | <a href="Javascript:delete_courier(<?=$data['courier_id']?>)">Delete</a> </td>
						<?php } ?>
					  </tr>
					<?php } 
					}
					else {
					?>
						<div class = "msg">No Courier Found !!!</div>
					<?php
					}?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="courier_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 