<?php
require("config.php");
session_start();	
	if(isset($_POST['ref']))
	{
		$content = trim($_POST['reply_content']);
		$date = date("d,M-Y");
		$replier = $_SESSION['uid'];
		$disc_source = preg_replace('/[^0-9]/',"",$_POST['ref']);
			if($content)
			{
				$insert_reply = $con -> prepare("INSERT INTO replies(replier,disc_source,content,date) VALUES(?,?,?,?)");
					if($insert_reply -> execute(array($replier,$disc_source,$content,$date)))
					{
						echo "Reply Posted";
						exit();
					}else{
						echo "Sorry, Something happened!!";
					}
			}
	}
?>
