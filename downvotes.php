<?php
session_start();
require("config.php");
	if(isset($_GET['ref']))
	{
		$ref = preg_replace('/[^0-9]/',"",$_GET['ref']);
			$chk_first = $con -> prepare("SELECT * FROM downvotes WHERE disc_source = ? AND creator = ? ");
				if($chk_first -> execute(array($ref, $_SESSION['uid'])))
				{
					if($chk_first -> rowCount()>0)
					{
						$alter = $con -> prepare("UPDATE downvotes SET status = ?, date = ? WHERE disc_source =? AND creator = ?");
							if($alter -> execute(array("yes",date("d,M-Y"),$ref,$_SESSION['uid'])))
							{
								$chk_upvotes = $con -> prepare("SELECT * FROM upvotes WHERE disc_source = ? AND creator = ? ");
									if($chk_upvotes -> execute(array($ref, $_SESSION['uid'])))
									{
										if($chk_upvotes -> rowCount()>0)
										{
								$alteration = $con -> prepare("UPDATE upvotes SET status =? WHERE disc_source =? AND creator = ?");
										if(!$alteration -> execute(array("no",$ref,$_SESSION['uid'])))
										{
								echo "Altered";
											
										}
										}
									}else{
										echo "Error Occured!!";
									}
								echo "Downvoted";
							}else{
								echo "Time Flushed!";
							}
					}else{
						$establish = $con -> prepare("INSERT INTO downvotes(creator,disc_source,date,status) VALUES(?,?,?,?)");
						if($establish -> execute(array($_SESSION['uid'],$ref,date('d,m,Y'),"yes"))){
							echo "Downvoted";
							$chk_upvotes = $con -> prepare("SELECT * FROM upvotes WHERE disc_source = ? AND creator = ? ");
									if($chk_upvotes -> execute(array($ref, $_SESSION['uid'])))
									{
										if($chk_upvotes -> rowCount()>0)
										{
								$alteration = $con -> prepare("UPDATE upvotes SET status =? WHERE disc_source =? AND creator = ?");
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