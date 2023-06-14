<?php
	class Config{
		
		public function connect(){
			try{
				return new PDO("mysql:dbhost=localhost; dbname=hook", "root","");
			}catch(PDOException $e){
				echo $e -> getMessage();
			}
		}
	}
		class Master{
			private $con;
			public function __construct(){
				$this -> con = new Config();
				$this -> con = $this -> con -> connect();
			}
			// Account Creation Script
			public function createAccount($fname,$email,$pass,$gender,$country,$status,$date,$mobile,$profile_pix,$rank)
			{
				$error = 0;
				if($fname && $email && $pass && $gender && $country)
				{
					// ############# ...........Validation.....................########################
					// ###############......Check pass Length.............###########
						if(strlen($pass) >= 6 ){
							$chkMember = $this -> con -> prepare("SELECT * FROM hookists WHERE email = ?");
						$chkMember -> execute(array($email));
						if($chkMember -> rowCount() > 0)
						{
							$error ++;
							echo "This Email has already been used ! <b>Error </b>".$error;
						}else{
							$insertQuery = $this -> con -> prepare("INSERT INTO hookists(fname,email,password,gender,country,status,date,mobile,profile_pix,rank) VALUES(?,?,?,?,?,?,?,?,?,?)");
					if($insertQuery -> execute(array($fname,$email,$pass,$gender,$country,$status,$date,$mobile,$profile_pix,$rank)))
					{
						$fetch_handle = $this -> con -> prepare("SELECT ref FROM hookists WHERE email=?");
						if($fetch_handle -> execute(array($email))){
							$fetch_handle -> setFetchMode(PDO::FETCH_ASSOC);
							while($rowd = $fetch_handle -> fetch()){
								$refr = $rowd['ref'];
								$fname = $rowd['fname'];
							}
							require("notify.php");
							$msg = "Hi, ".$fname." . Welcome to the main <b><i>base of discussion</i></b>";
							notify($refr,$msg,"<i class='fa fa-unlock-alt' style='color:#2e9fff;'></i>",1,date("M d , Y"));
						}
						header("Location:created.php");
					}else{
						echo "Error Occured!!";
					}
						}
					
						}else{
							echo "Rules are drew for your safety, try again. <b>Hint: </b><span style=\"color:#f00;\">Password must be equal to or more than 6 characters.</span>";
						}
				}
			}
			// LogIn Script
			public function logIn($email,$password)
			{
				$logInScript = $this -> con -> prepare("SELECT * FROM hookists WHERE email = ? AND password =?");
					$logInScript -> execute(array($email,$password));
						if($logInScript -> rowCount() > 0)
						{
							$logInScript -> setFetchMode(PDO::FETCH_ASSOC);
							while($row = $logInScript -> fetch()){
								$_SESSION['uid'] = $row['ref'];
								$_SESSION['fname'] = $row['fname'];
								$_SESSION['lname'] = $row['lname'];
								$_SESSION['email'] = $row['email'];
								$_SESSION['password'] = $row['password'];
								$_SESSION['country'] = $row['country'];
								$_SESSION['dob'] = $row['dob'];
								$_SESSION['gender'] = $row['gender'];
								
							}
							header("Location:../index.php");
						}else{
							header("Location:../error-Login.php");
						}
					
			}
			// Discussion Creation Script
			public function insertDiscussion($title,$category,$mode,$content,$link,$date,$upvotes,$downvotes,$view_counts,$creator_ref)
			{
				$createScript = $this -> con -> prepare("INSERT INTO discussion(title,category,mode,content,link,creator_ref,date,upvotes,downvotes,view_counts) VALUES(?,?,?,?,?,?,?,?,?,?)"); 
				if($createScript -> execute(array($title,$category,$mode,$content,$link,$creator_ref,$date,$upvotes,$downvotes,$view_counts)))
				{
					echo "<br/><br/><center><div style='font-size:20px; color:#666; font-weight:bold;'>Hi <b style='color:#2e9fff;'>".$_SESSION['fname'].",</b> Thanks for creating this discussion</div> <br/><i class='fa fa-thumbs-up' style=\"font-size:24px; color:#f05f70;\"></i> Hoping to see more from you... <a href='index.php' class='btn btn-sm btn-success' role='button'><i class='fa fa-home'></i> go home</a> </center></br/></br/>";
					$chkifFirst = $this -> con -> prepare("SELECT * FROM discussion WHERE creator_ref = ?");
						if($chkifFirst -> execute(array($_SESSION['uid']))){
							$post_num = $chkifFirst -> rowCount();
									require("notify.php");
									require("rankit.php");
									$refr = $_SESSION["uid"];
								if($post_num === 1){
									$msg = "Hi, ".$_SESSION['fname']." . Thanks for creating your first Thread</i></b>";
									$msg2 = "Hi, ".$_SESSION['fname']." . You are no more a Lurker. Thanks.</i></b>";
									$msg3 = "Hurray, ".$_SESSION['fname']." . You are now a Senior. Thanks.</i></b>";
									$rank = "Senior" ; $ranker = $_SESSION['uid'];
									rank_it($rank,$ranker);
							notify($refr,$msg,"<i class='fa fa-pencil-square-o' style='color:#2e9fff;'></i>",1,date("M d , Y"));
							notify($refr,$msg2,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
							notify($refr,$msg3,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
											}else if($post_num === 500){
									$msge = "Hi, ".$_SESSION['fname']." . You are no more a Senior. Thanks.</i></b>";
									$msgf = "Hurray, ".$_SESSION['fname']." . You are now a Legend. Thanks.</i></b>";
									$rank = "Legend" ; $ranker = $_SESSION['uid'];
									rank_it($rank,$ranker);
							notify($refr,$msge,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
							notify($refr,$msgf,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
												
											}else if($post_num === 1000){
									$msge = "Hi, ".$_SESSION['fname']." . You are no more a Legend. Thanks.</i></b>";
									$msgf = "Hurray, ".$_SESSION['fname']." . You are now an Author. Thanks.</i></b>";
									$rank = "Author" ; $ranker = $_SESSION['uid'];
									rank_it($rank,$ranker);
							notify($refr,$msge,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
							notify($refr,$msgf,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
											}else if($post_num === 2000){
									$msge = "Hi, ".$_SESSION['fname']." . You are no more an Author. Thanks.</i></b>";
									$msgf = "Hurray, ".$_SESSION['fname']." . You are now a Model. Thanks.</i></b>";
									$rank = "Model" ; $ranker = $_SESSION['uid'];
									rank_it($rank,$ranker);
							notify($refr,$msge,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
							notify($refr,$msgf,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
											}else if($post_num === 5000){
									$msge = "Hi, ".$_SESSION['fname']." . You are no more a Model. Thanks.</i></b>";
									$msgf = "Hurray, ".$_SESSION['fname']." . You are now a Moderator. Thanks.</i></b>";
									$msgg = "Congrats, ".$_SESSION['fname']." . Claim your <a href='#'>prize</a>.</i></b>";
									$rank = "Moderator" ; $ranker = $_SESSION['uid'];
									rank_it($rank,$ranker);
							notify($refr,$msge,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
							notify($refr,$msgf,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
							notify($refr,$msgg,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
											}else if($post_num === 10000){
									$msge = "Hi, ".$_SESSION['fname']." . You are no more a Moderator. Thanks.</i></b>";
									$msgf = "Hurray, ".$_SESSION['fname']." . You are now a Hero. Kudos!</i></b>";
									$msgg = "Congrats, ".$_SESSION['fname']." . Claim your <a href='#'>prize</a>.</i></b>";
									$rank = "Hero" ; $ranker = $_SESSION['uid'];
									rank_it($rank,$ranker);
							notify($refr,$msge,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
							notify($refr,$msgf,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
							notify($refr,$msgg,"<i class='fa fa-trophy' style='color:#2e9fff;'></i>",1,date("M d , Y"));
											}
						}
				}else{
					echo "Sorry, the server is busy, try again. ";
				}
			}
			// Logout Script
			public function logout($x){
				session_destroy();
				unset($_SESSION['uid']);
				header("Location:../".$x);
			}
		}

?>