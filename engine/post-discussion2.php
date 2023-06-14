<?php
require("joiner.php");
	if(isset($_POST['title'])){
		$link_status = "";
		$title = htmlspecialchars(trim($_POST['title']));
		$category = htmlspecialchars(trim($_POST['category']));
		$mode = htmlspecialchars(trim($_POST['mode']));
		$content = htmlspecialchars(trim($_POST['content']));
		$link = htmlspecialchars(trim($_POST['link']));
		$date = date("d/m/Y");
		$upvotes = 0;
		$downvotes = 0;
		$view_counts = 0;
		$creator_ref = $_SESSION['uid'];
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
		echo "No NO NO NO Nooooooooooooo";
	}
	
?>