<?php
session_start();
if(!isset($_SESSION['uid'])){
	header("Location:index.php");
}

?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Message Board</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
		<?php include("toolbox.php"); ?>
		<div class="wrapper ">
			<?php include("header.php"); ?>
			<div class="empty-left"></div>
		<div class="posting-pannelv">
					<div class="message-board">
						<a href="javascript:void(0)" class="compose-tool"><i class="fa fa-pencil-square-o"></i> <strong>Create New</strong></a>
						<a href="javascript:void(0)" class="box in"><center><i class="fa fa-inbox"></i></center><br/> <strong>Inbox</strong></a>
						<a href="javascript:void(0)" class="box out"><center><i class="fa fa-location-arrow"></i></center><br/> <strong>Sentbox</strong></a>
						<a href="javascript:void(0)" class="box draft"><center><i class="fa fa-folder-open"></i></center><br/> <strong>Draft</strong></a>
						<div class="line"></div>
					</div>
					<hr color="#999" /><br/><br/>
					<div class="message-listing-pannel" id="messageLoader">
						
					</div>
					
					
		</div>
				<div class="posting-guide">
					
				</div>
				
		</div>
		<div class="line"></div>
		
		
			<?php include("footer.php"); ?>
			<?php include("message-box.php"); ?>
			<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="js/custom.js"></script>
		<script>
			
		</script>
	</body>
	</html>