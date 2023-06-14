<?php
session_start();
require("config.php");
	if(isset($_GET['ref']))
	{
		$ref = preg_replace('/[^0-9]/',"",$_GET['ref']);
			$chk_first = $con -> prepare("SELECT * FROM upvotes WHERE disc_source = ? AND creator = ? ");
				if($chk_first -> execute(array($ref, $_SESSION['uid'])))
				{
					if($chk_first -> rowCount()>0)
					{
						$alter = $con -> prepare("UPDATE upvotes SET status = ? , date = ? WHERE disc_source =? AND creator = ?");
							if($alter -> execute(array("yes",date("d,M-Y"),$ref,$_SESSION['uid'])))
							{
								$chk_downvote = $con -> prepare("SELECT * FROM downvotes WHERE disc_source = ? AND creator = ? ");
									if($chk_downvote -> execute(array($ref, $_SESSION['uid'])))
									{
										if($chk_downvote -> rowCount()>0)
										{
								$alteration = $con -> prepare("UPDATE downvotes SET status =? WHERE disc_source =? AND creator = ?");
										if(!$alteration -> execute(array("no",$ref,$_SESSION['uid'])))
										{
								echo "Altered";
											
										}
										}
									}else{
										echo "Error Occured!!";
									}
								echo "Upvoted";
							}else{
								echo "Time Flushed!";
							}
					}else{
						$establish = $con -> prepare("INSERT INTO upvotes(creator,disc_source,date,status) VALUES(?,?,?,?)");
						if($establish -> execute(array($_SESSION['uid'],$ref,date('d,m,Y'),"yes"))){
							echo "Upvoted";
							$chk_downvote = $con -> prepare("SELECT * FROM downvotes WHERE disc_source = ? AND creator = ? ");
									if($chk_downvote -> execute(array($ref, $_SESSION['uid'])))
									{
										if($chk_downvote -> rowCount()>0)
										{
								$alteration = $con -> prepare("UPDATE downvotes SET status =? WHERE disc_source =? AND creator = ?");
										if(!$alteration -> execute(array("no",$ref,$_SESSION['uid'])))
										{
								echo "Altered";
											
										}
										}
									}else{
										echo "Error Occured!!";
									}
						}else{
							echo "Time Flushed";
						}
					}
				}else{
					echo "Sorry, Server Error !!";
				}
	}


?>