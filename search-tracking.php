<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	if($_REQUEST[tracking_tracking]!="")
	{
		$SQL="SELECT * FROM tracking, courier WHERE tracking_tracking = courier_tracking AND courier_tracking = '$_REQUEST[tracking_tracking]' ORDER BY tracking_id";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		global $SERVER_PATH;
	}
?>
<script>
function delete_tracking(tracking_id)
{
	if(confirm("Do you want to delete the tracking?"))
	{
		this.document.frm_tracking.tracking_id.value=tracking_id;
		this.document.frm_tracking.act.value="delete_tracking";
		this.document.frm_tracking.action = "lib/tracking.php";
		this.document.frm_tracking.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">Track Your Courier</h4>
			<form name="frm_tracking" action="#" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr>
						<td colspan="7">Traking Number : <input type="text" name="tracking_tracking" class="inputfield" style="height: 23px; width: 229px;">&nbsp;&nbsp;<input type="submit" value="Search" class="simplebtn"></td>
					  </tr>
						<?php if(mysqli_num_rows($rs)) { ?>
							<tr class="tablehead bold">
								<td scope="col">Traking ID </td>
								<td scope="col">Date</td>
								<td scope="col">Description</td>
					  	</tr>
						<?php } ?>
					<?php 
					$sr_no=1;
					if(mysqli_num_rows($rs)) {
						while($data = mysqli_fetch_assoc($rs))
						{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$data[tracking_tracking]?></td>
						<td><?=$data[tracking_date]?></td>
						<td><?=$data[tracking_description]?></td>
					  </tr>
					<?php 
						}  
					}
					else {
						echo "<tr><td colspan='7'>No tracking record found !!!</td></tr>";
					}
					?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="tracking_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
