<?php
require("config.php");
session_start();
if(isset($_SESSION['uid'])){
if(isset($_FILES['profpix'])){
		$file = $_FILES['profpix'];
		$image_name = $file['name'];
		if($image_name != ""){
		$image_tmp = $file['tmp_name'];
		$image_size = $file['size'];
		$allowed = array("png","jpg","jpeg","ico");
			$file_ext = strtolower(end(explode('.',$image_name)));
			if(in_array($file_ext, $allowed)){
				if($image_size <= 2000000){
					$formatted_file = uniqid('',true).'.'.$file_ext;
						if(move_uploaded_file($image_tmp,"hookists/".$formatted_file)){
							$chg_pix = $con -> prepare("UPDATE hookists SET profile_pix = ? WHERE ref = ?");
							if($chg_pix -> execute(array($formatted_file,$_SESSION['uid']))){
								echo "<center><br/><br/><br/><br/><b style='color:#2e9fff;'>Your Profile pix is updated Successfully <a href='account-manager.php'>return</a></b></center>";
							}else{
								echo "SORRY: Something went wrong!";
							}
						}
				}else{
					
				echo "<center><b style='color:orange;'>Sorry, image of <span style='font-family:nyala;'>".$image_size."</span> size is too much for  profile pix .</b><br/><a href='account-manager.php'>return</a></center> ";
				}
			}else{
				
				echo "<center><b style='color:orange;'>Sorry, ".$file_ext." is not a supported file format for profile pix . Upload only (png), (jpg), (ico) OR (jpeg) format</b><br/><a href='account-manager.php'>return</a></center> ";
			}
		}else{
	header("Location:account-manager.php");
}

}
}else{
	header("Location:index.php?pn=1");
}
?>