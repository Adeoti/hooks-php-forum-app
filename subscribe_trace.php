<?php
session_start();
require_once('config.php');
$subscriber = $_SESSION['uid'];
$channel = preg_replace('/[^a-z]/',"",$_POST['channel']);
				$avil_ = $con -> prepare("SELECT * FROM channel_sub WHERE channel = ? AND subscriber = ? AND status = ?");
				if($avil_ -> execute(array($channel,$_SESSION['uid'],'yes'))){
					if($avil_ -> rowCount()>0){	
						?>
			<a href="javascript:void(0)" class="sub-btn2" subscriber="<?php echo $_SESSION['uid']?>" rel="<?php echo $channel;?>"> <i class="fa fa-pencil"></i> Unsubscribe</a>
						<?php
					}else{
						?>
			<a href="javascript:void(0)" class="sub-btn" subscriber="<?php echo $_SESSION['uid']?>" rel="<?php echo $channel;?>"> <i class="fa fa-pencil"></i> Subscribe</a>
						
						<?php
					}
				}else{
					echo "Something is not write..";
				}
?>


