<?php
session_start();
require("config.php");
if(!isset($_SESSION['uid']))
{
	header("Location:index.php");
}else{
	if(isset($_GET['ref']))
	{
		$ref = preg_replace('/[^0-9]/',"",$_GET['ref']);
			$chk_first = $con -> prepare("SELECT * FROM drafts WHERE ref =? AND creator_ref=?");
				if($chk_first->execute(array($ref,$_SESSION['uid'])))
				{
					if($chk_first->rowCount()>0){
					$unlink_ = $con -> prepare("DELETE FROM drafts WHERE ref=? AND creator_ref=?");
					if($unlink_ -> execute(array($ref,$_SESSION['uid'])))
					{
						echo "The Draft has been deleted successfully";
					}else{
						echo "Deletion Terminated Unexpected!";
					}
					}else{
						echo "No Draft Found For This request";
					}
				}else{
					echo "Bad Connection!";
				}
	}else{
		echo "Wasteful visitation : <b style='color:#f00;'>236</b>";
	}
		
}

?>