<?php include_once("includes/header.php"); ?> 
	<div class="crumb">

    </div>
    <div class="clear"></div>
	<div id="content_sec">
        <?php
        if (isset($_REQUEST["msg"])) {
            echo '<div><h1>'.$_REQUEST["msg"].'</h1><BR></div>';
        }
        ?>

		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Contact Us</h4>
				<form action="contact-confirmation.php">
					<ul class="forms">
						<li class="txt">Name</li>
						<li class="inputfield"><input name="name" type="text" class="bar" required/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Company</li>
						<li class="inputfield"><input name="company" type="text" class="bar" required/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Email</li>
						<li class="inputfield"><input name="email" type="text" class="bar" required/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Phone</li>
						<li class="inputfield"><input name="phone" type="text" class="bar" required/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Message</li>
						<li class="textfield"><textarea name="message" cols="" rows="6" required></textarea></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
				</form>
			</div>
		</div>
		<div class="col2">
			<div class="contactfinder">
				<h4 class="heading colr">Where to find us.</h4>
				<a href="#" class="mapcont"><img src="./images/map.gif" alt="" style="width:250px;"/></a>
				<h4>Get in touch</h4>
				<p>
					You’ll find us offices sitting right in <br />
					the town centre in the middle of Guildford, Surrey.<br />
					<br />
					171 abc Street<br />
					Lipsum<br />
					Lorem<br />
					GU5 3AB<br />
					<br /><br />
					+44 (0)2563 586215<br />
					<a href="">info@lipsum.com</a><br />
				</p>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 