<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php");
	$SQL="SELECT * FROM branch";

	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
	global $SERVER_PATH;
?>
<script>
function delete_branch(branch_id)
{
	if(confirm("Do you want to delete the branch?"))
	{
		this.document.frm_branch.branch_id.value=branch_id;
		this.document.frm_branch.act.value="delete_branch";
		this.document.frm_branch.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
				<h4 class="heading colr">Branch Reports</h4>
				<div class = "msg"><?=$_REQUEST['msg']?></div>
			<?php if(mysqli_num_rows($rs)) { ?>
			<form name="frm_branch" action="lib/branch.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Branch ID</td>
						<td scope="col">Branch Address</td>
						<td scope="col">Branch City</td>
						<td scope="col">Branch State</td>
						<td scope="col">Branch Zip Code</td>
						<td scope="col">Branch Country</td>
                                                <td scope="col">Branch Contact</td>
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
						<td style="text-align:center; font-weight:bold;"><?=$data['branch_id']?></td>
                                                <td><?=$data['branch_address']?></td>
						<td><?=$data['branch_city']?></td>
						<td><?=$data['branch_state']?></td>
						<td><?=$data['branch_zipcode']?></td>
                                                <td><?=$data['branch_country']?></td>
                                                <td><?=$data['branch_contact']?></td>
						<?php if($_SESSION['user_details']['user_level_id'] == 1) { ?>
						<td style="text-align:center"><a href="branches.php?branch_id=<?php echo $data['branch_id'] ?>">Edit</a> | <a href="Javascript:delete_branch(<?=$data['branch_id']?>)">Delete</a> </td>
						<?php } ?>
					  </tr>
					<?php } 
					}
					else {
					?>
						<div class = "msg">No Branches Found !!!</div>
					<?php
					}?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="branch_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 