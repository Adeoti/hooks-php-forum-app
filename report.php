<?php
session_start();
if(!isset($_SESSION['uid'])){
	header("Location:index.php");
}
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Discussion Reported</title>
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
require("config.php");
if(isset($_SESSION['uid'])){
	if(isset($_POST['report-btn'])){
		$reason = htmlspecialchars(trim($_POST['reason']));
			if($reason){
				if(isset($_GET['ref']))
	{
		$ref = preg_replace('/[^0-9]/',"",$_GET['ref']);
			$report = $con -> prepare("INSERT INTO reports(reporter,disc_source,reason,date) VALUES(?,?,?,?)");
				if($report -> execute(array($_SESSION['uid'],$ref,$reason,date('d,M-Y')))){
					echo "";
				echo "<br/><br/><center><div style='font-size:20px; color:#666; font-weight:bold;'>Hi <b style='color:#2e9fff;'>".$_SESSION['fname'].",</b> The Discussion has been reported and drastic action will be taken immidiately!!</div> <br/><i class='fa fa-thumbs-up' style=\"font-size:24px; color:#f05f70;\"></i>  Thanks for your kindness...</center></br/></br/>";

				}else{
					echo "";
				}
	}else{
		header("Location:index.php");
	}
			}else{
						echo "<br/><br/><center><div style='font-size:20px; color:#666; font-weight:bold;'>Hi <b style='color:#2e9fff;'>".$_SESSION['fname'].",</b> Sorry, you have to provide your reason for reporting this .</div> <br/><i class='fa fa-thumbs-up' style=\"font-size:24px; color:#f05f70;\"></i>  Thanks for your kindness... </center></br/></br/>";
			}
	}
}else{
	header("Location:index.php");
}

?>
				</div>
				<?php include("posting-guide.php"); ?>
				
		</div>
		<div class="line"></div>
		
		
			<?php include("footer.php"); ?>
			<?php include("message-box.php"); ?>
			<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
	</html>