<!DOCTYPE html>
	<html>
	<head>
		<title>Start Your Thread</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
		<?php include("toolbox.php"); ?>
		<div class="wrapper ">
			<?php include("header.php"); ?>
		<div class="empty-left"></div>
		<div class="posting-pannel">
				<?php
							echo "<br/><center><i class='fa fa-warning' style=\"font-size:44px; color:orange;\"></i></center><br/><center><div style='font-size:20px; color:#666; font-weight:bold;'>Hi <b style='color:#2e9fff;'>,</b> Sorry, the Email OR Password you entered is invalid</div> <br/> Click <a href='login.php'>here</a> to return</center></br/></br/>";

				?>
		</div>
				<?php //include("posting-guide.php"); ?>
				
		</div>
		<div class="line"></div>
		
		
			<?php include("footer.php"); ?>
			<?php include("message-box.php"); ?>
			<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
	</html>