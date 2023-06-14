<?php
require("config.php");
	if(isset($_GET['ref']))
	{
		$ref =preg_replace('/[^0-9]/',"",$_GET['ref']);
			$chk_first = $con -> prepare("SELECT * FROM upvotes WHERE disc_source = ?");
				if($chk_first -> execute(array($ref)))
				{
					if($chk_first -> rowCount()>0)
					{
						$alter = $con -> prepare("UPDATE upvotes SET status =? WHERE disc_source =? ");
							if($alter -> execute(array(0,$ref))){
								echo "Upvoted";
							}else{
								echo "Time Flushed!";
							}
					}else{
						$establish = $con -> prepare("INSERT INTO upvotes(creator,disc_source,date) VALUES(?,?,?)");
						if($establish -> execute(array($_SESSION['uid'],$ref,date('d,m,Y')))){
							echo "Upvoted";
						}else{
							echo "Time Flushed";
						}
					}
				}else{
					echo "Sorry, Server Error !!";
				}
	}


?>