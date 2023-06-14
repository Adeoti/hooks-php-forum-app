<?php
session_start();
require("config.php");
if(isset($_POST['chk']))
{
	$chk_if = $con -> prepare("SELECT * FROM notifications WHERE owner = ? AND status = ?");
		if($chk_if -> execute(array($_SESSION['uid'],1))){
			if($chk_if -> rowCount() > 0 ){
				echo "<span style='background:#f00; display:inline-block; width:100%; height:100%; border-radius:50%;'>".$chk_if -> rowCount()."</span>";
			}
		}
	
}

?>