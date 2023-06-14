<?php
session_start();
if(!isset($_SESSION['uid'])){
	header("Location:index.php");
}
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Discussion Posted</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
		<?php include("toolbox.php"); ?>
		<div class="wrapper ">
			<?php include("header.php"); ?>
			
				<div class="container">
				<div class="row">
				<div class="col-sm-2 col-md-2">
				</div>
				<div class="col-sm-6 col-md-6">
					<div class="posting-pannel" style="width:100%;">
				<?php
require("engine/joiner.php");
	if(isset($_POST['title'])){
		$title = htmlspecialchars(trim($_POST['title']));
		$category = htmlspecialchars(trim($_POST['channel']));
		$mode = htmlspecialchars(trim($_POST['mode']));
		$content = (trim($_POST['content']));
		$link = htmlspecialchars(trim($_POST['link']));
		$date = date("Y-m-d h:i:s");
		$upvotes = 0;
		$downvotes = 0;
		$view_counts = 0;
		$creator_ref = $_SESSION['uid'];
			if($title && $category && $mode && $content)
			{
				if(strlen($link)>0)
			{
				$link = htmlspecialchars(trim($_POST['link']));
			}else{
				$link = "none";
			}
			
			//insert into DB
				$insert_handle = new Master();
				$insert_handle -> insertDiscussion($title,$category,$mode,$content,$link,$date,$upvotes,$downvotes,$view_counts,$creator_ref);
				
			}else{
				echo "Empty Discussion  cannot be created!! <a href='creator.php'>create one</a>";
			}
			
	}else{
		echo "No NO NO NO Nooooooooooooo";
	}
	
?>
				</div>
				</div>
				<div class="col-sm-4 col-md-4">
				<?php include("posting-guide.php"); ?>
				</div>
				</div>
				</div>
			
		
				
				
		</div>
		<div class="line"></div>
		
		
			<?php include("footer.php"); ?>
			<?php include("message-box.php"); ?>
			<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
	</html>