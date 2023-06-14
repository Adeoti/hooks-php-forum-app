<?php
session_start();
if(!isset($_SESSION['uid'])){
	header("Location:index.php");
}
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Discussion Drafted</title>
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
	if(isset($_POST['title'])){
		$title = htmlspecialchars(trim($_POST['title']));
		$category = htmlspecialchars(trim($_POST['channel']));
		$mode = htmlspecialchars(trim($_POST['mode']));
		$content = (trim($_POST['content']));
		$link = htmlspecialchars(trim($_POST['link']));
		$date = date("d,M-Y");
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
			//Power
			$insert_ = $con -> prepare("INSERT INTO drafts(title,category,mode,content,link,creator_ref,date) VALUES(?,?,?,?,?,?,?)");
				if($insert_ -> execute(array($title,$category,$mode,$content,$link,$creator_ref,$date)))
				{
					echo "<br/><br/><center><div style='font-size:20px; color:#666; font-weight:bold;'>Hi <b style='color:#2e9fff;'>".$_SESSION['fname'].",</b> Thanks for drafting a dicussion</div> <br/><i class='fa fa-thumbs-up' style=\"font-size:24px; color:#f05f70;\"></i> You can always access it... It's  <a href='draft-collapsed.php'>here</a></center></br/></br/>";
				}else{
					echo "Sorry, the server is busy, try again. ";
				}
			
			}else{
				echo "Empty Discussion  cannot be Saved!! <a href='creator.php'>create one</a>";
			}
	}else{
		echo "No NO NO NO Nooooooooooooo";
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