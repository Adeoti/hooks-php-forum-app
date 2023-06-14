<?php
session_start();
session_destroy();
unset($_SESSION['uid']);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create Your Account</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
			<style>
				
				.leftFrag{
					width:50%;
					float:left;
					position:fixed;
					top:0;
					left:0;
					bottom:0;
					-webkit-box-shadow:0 0 5px 5px rgba(0,0,0,0.08);
					-moz-box-shadow:0 0 5px 5px rgba(0,0,0,0.08);
					-ms-box-shadow:0 0 5px 5px rgba(0,0,0,0.08);
					-o-box-shadow:0 0 5px 5px rgba(0,0,0,0.08);
					background-color:#fff;
				}
				.leftFrag .section{
					width:80%;
					margin:0px auto;
					margin-top:50px;
					overflow:hidden;
				}
				.login-link{
					width:30%;
					margin:0px auto;
					margin-top:20px;
					color:gray;
				}
				.disclaimer{
					width:80%;
					margin:0px auto;
					color:orange;
				}
				.middle-man{
					height:200px;
					border-radius:10px;
					font-size:25px;
					color:#666;
					width:60%;
					margin:0px auto;
					margin-top:60px;
					
				}
				.features{
					width:100%;
					background-color:#fff;
					height:100px;
					padding:5px;
				}
				.features div{
					float:left;
					width:20%;
					margin:8px;
					padding-top:13px;
					text-align:center;
					line-height:40px;
					border-radius:7px;
					-webkit-border-radius:7px;
					-moz-border-radius:7px;
					-ms-border-radius:7px;
					-o-border-radius:7px;
					height:100%;
					font-weight:bold;
					background-color:#eee;
				}
				.feat{
					font-size:35px;
					color:magenta;
				}
				.slogans{
					font-weight:bold;
					text-align:center;
					margin-top:30px;
					color:#006;
				}
				.passHint{
					top:14px;
					border:1px solid red;
					background-color:#fff;
					padding:4px;
					display:none;
					border-radius:5px;
					line-height:22px;
					right:0px;
					position:absolute;
					
				}
				.emailFeedBack{
					top:14px;
					display:none;
					z-index:3000;
					right:0px;
					position:absolute;
				}
				
				.formbox form label{
					display:block;
					color:#fff;
				}
				.formbox form [type=text], .formbox form [type=email], .formbox form [type=password], .formbox form select {
					width:100%;
					border:1px solid #eee;
					border-radius:5px;
					height:38px;
					text-indent:10px;
				}
			</style>
				<?php require("rel.php"); ?>
				
	</head>
<body class="container-fluid">	
		
		<div class="row">
			<div class="col-sm-6 col-md-6">
			<div class="section"><br/>
					<center>{logo}</center>
				<h2 style="text-align:center;">Welcome to the #1 African Educational Community</h2>
						<div class="middle-man">
							<i class="fa fa-quote-left"></i>
								The Illiterate Of The 21<sup>st</sup> century will not be those who cannot read and write, but those who cannot learn, unlearn and relearn.
							<i class="fa fa-quote-right"></i> <b style="color:#49ae4d;">__ Alvin Toffler</b>
								
						</div>
						<div class="line"></div>
					<div class="features">
						<div>
							<i class="fa fa-graduation-cap feat"></i><br/>
						Educating
						</div>
						<div>
							<i class="fa fa-music feat"></i><br/>
						Entertaining
						</div>
						<div>
							<i class="fa fa-bullhorn feat"></i><br/>
						Informative
						</div>
						<div>
							<i class="fa fa-gamepad feat"></i><br/>
						Interesting
						</div>
					
					</div>
					<div class="line"></div>
					<div class="slogans">
						**Join The Board Of Scholars
					</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 ">
		<h2 class="ring-heading">Welcome to the #1 African Educational Community ::: Let's promote knowledge together</h2>
			<br/><br/><br/>
		<div class="row">
			<div class="col-sm-1 colmd-1"></div>
		
		<div class="formbox bg-secondary col-sm-7 col-md-7" style="border-radius:5px; padding:8px;">
			<form action="" method="POST" enctype="multipart/form-data">
					<label for="fname"  class="lbl">Username</label>
				<input type="text" placeholder="will be shown as your name" id="fname" name="fname" class="effect" required/><br/>
					<label for="email" class="lbl">Email Name</label>
					<span style="position:relative; background-color:red; color:red;">
				<input type="email" placeholder="email address" id="email" name="email" class="effect mail" required/><br/>
					<span class="emailFeedBack">0000</span>
				</span>
					<label for="pass" style="position:relative;" class="lbl">Password </label>
					<span style="position:relative; background-color:red; color:red;">
				<input type="password" placeholder="Your Secrete Pin" id="pass" name="password" class="effect" required/><br/>
						<span class="passHint">Minimum of 6 characters</span>
					</span>
					<label class="lbl">Gender</label>
						<div class="row">
							<div class="col-md-6 col-sm-12">
						<label style="display:inline-block;"> Male <input type="radio" name="gender" value="male"/></label>	
							</div>
							<div class="col-sm-6 col-md-6">
					<label style="display:inline-block;"> Female <input type="radio" name="gender" value="female"/></label>
							
							</div>
						</div>
					<label for="country" class="lbl">Country</label>
						<select required name="country" id="state" class="effect">
								<option>Algeria</option>
								<option>Angola</option>
								<option>Benin</option>
								<option>Botswana</option>
								<option>Burkina Faso</option>
								<option>Burundi</option>
								<option>Cabo Verde</option>
								<option>Cameroon</option>
								<option>Central African Republic (CAR)</option>
								<option>Chad</option>
								<option>Comoros</option>
								<option>Democratic Republic of the Congo</option>
								<option>Republic of the Congo</option>
								<option>Cote d'Ivoire</option>
								<option>Djibouti</option>
								<option>Egypt</option>
								<option>Equatorial Guinea</option>
								<option>Eritrea</option>
								<option>Eswatini (formerly Swaziland)</option>
								<option>Ethiopia</option>
								<option>Gabon</option>
								<option>Gambia</option>
								<option>Ghana</option>
								<option>Guinea</option>
								<option>Guinea-Bissau</option>
								<option>Kenya</option>
								<option>Lesotho</option>
								<option>Liberia</option>
								<option>Libya</option>
								<option>Madagascar</option>
								<option>Malawi</option>
								<option>Mali</option>
								<option>Mauritania</option>
								<option>Mauritius</option>
								<option>Morocco</option>
								<option>Mozambique</option>
								<option>Namibia</option>
								<option>Niger</option>
								<option>Nigeria</option>
								<option>Rwanda</option>
								<option>Sao Tome and Principe</option>
								<option>Senegal</option>
								<option>Seychelles</option>
								<option>Sierra Leone</option>
								<option>Somalia</option>
								<option>South Africa</option>
								<option>South Sudan</option>
								<option>Sudan</option>
								<option>Swaziland (renamed to Eswatini)</option>
								<option>Tanzania</option>
								<option>Togo</option>
								<option>Tunisia</option>
								<option>Uganda</option>
								<option>Zambia</option>
								<option>Zimbabwe</option>
						</select><br/>
					<br/>
						<input type="reset" value="Reset" />
							<div style="float:right;"><button name="pullTrigger" class="btn btn-sm btn-primary"><i class="fa fa-sign-in"></i> sign up</button></div>
							<div style="clear:both;"></div>
			</form>
			<?php
				require("engine/joiner.php");
					if(isset($_POST['pullTrigger']))
					{
							$fname = htmlspecialchars(trim(stripslashes($_POST['fname'])));
							$fname = ucfirst(strtolower($fname));
							$email = htmlspecialchars(trim(stripslashes($_POST['email'])));
							$password = htmlspecialchars(trim(stripslashes($_POST['password'])));
							$gender = $_POST['gender'];
							$country = $_POST['country'];
							$status = "Yea! I am using hook";
							$date = date('Y-m-d h:i:s');
							$mobile = "Nill";
							$profile_pix = "nill";
							$rank = "Lurker";
								
									$insert = new Master();
									$insert -> createAccount($fname,$email,$password,$gender,$country,$status,$date,$mobile,$profile_pix,$rank);
								
					}
			?>
		</div>
		</div>
			<div class="login-link" style="color:gray;">
				Already a member, <a href="login.php">log in</a>
			</div>
			<div class="disclaimer">By Signing UP or IN, we agree that you've reviewed the <a href="#">terms of policy and usage</a>!</div>
			<br/><br/>
		</div>
		
		
		
		</div>
		
		<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script>
		$(document).ready(function(){
				//$('.formbox').draggable();
			$('#pass').blur(function(){
				var lengthOff = $(this).val().length;
				if(lengthOff === 0){
					$('.passHint').text("Password must be filled");
					$('.passHint').fadeIn('500');
				}else if(lengthOff < 6){
					$('.passHint').text("Minimum of 6 characters");
					$('.passHint').fadeIn('500');
				}else{
					$('.passHint').fadeOut('500');
				}
			});
			$('.effect').blur(function(){
				var offLen = $(this).val().length;
					if(offLen === 0){
						$(this).css('border','1px solid #f00');
					}else{
						$(this).css('border','1px solid #e8e8e8');
						
					}
			});
			$('.mail').blur(function(){
				var mail = $(this).val();
			$.post("checkmail.php",{mail:mail}, function(data){
				if(data !=""){
				$('.emailFeedBack').fadeIn(500);
				$('.emailFeedBack').html(data);
				}else{
				$('.emailFeedBack').fadeOut(500);
					
				}
			});
			});
		});
		
			
		</script>
</body>
	</html>