<!DOCTYPE html>
	<html>
	<head>
		<title>Gallery Port</title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
	<?php include("toolbox.php"); ?>
		<?php include("toolbox.php"); ?>
			<?php include("header.php"); ?>
			<div class="profile-header-cover"><br/><br/><br/><br/>
					<div class="member-special-navs">
						<a href="javascript:void(0)" class="compose-tool"><i class="fa fa-envelope-o"></i> Message Her</a>
						<a href="#"><i class="fa fa-rocket"></i> Follow Her</a>
					</div>
				<div class="profile-pic">
					<div class="member-names">
						<strong style="color:#f3f3f3;">Alien Thruckflex</strong><br/>
						***(Scholar)***
					</div><br/>
				<img src="images/profpix3.jpg"/>
				</div>
			</div>
					<div class="member-navs">
						<ul>
							<li><a href="#" ><i class="fa fa-book"></i> Threads</a></li>
							<li><a href="#" ><i class="fa fa-map-marker"></i> About</a></li>
							<li><a href="#" class="active"><i class="fa fa-folder-open"></i> Gallery</a></li>
							<li><a href="top.php"><i class="fa fa-calendar"></i> Events</a></li>
							<li><a href="top.php"><i class="fa fa-files-o"></i> Drafts</a></li>
							<li><a href="top.php"><i class="fa fa-briefcase"></i> More</a></li>
						</ul>
					</div>
			<div class="wrapper">
			
				<?php include("announcement.php"); ?>
				<?php include("advertpan.php"); ?>
				<div class="leftFrag"></div>
				<div class="middleFrag">
					<div class="gallery-pane"><br/><br/>
							<strong style="color:#999;"><i class="fa fa-camera"></i> photos</strong>
							<br/><br/>
							<div class="previwer">
							<div class="previwer-inner">
								<img src=""/>
							</div>
								<div class="previwer-footer">
									<div class="arrow left-x"><i class="fa fa-backward"></i></div>
									<div class="arrow right-x"><i class="fa fa-forward"></i></div>
								</div>
							</div>
						<div class="photoSpace">
							<img src="images/cover.jpg" />
							<img src="images/cover.jpg" />
							<img src="images/profpix2.jpg" />
							<img src="images/cover.jpg" />
							<img src="images/profpix3.jpg" />
							<img src="images/cover.jpg" />
							<img src="images/cover.jpg" />
							<img src="images/cover.jpg" />
							<img src="images/profpix.jpg" />
							<img src="images/cover.jpg" />
							<img src="images/profpix5.jpg" />
						</div>
						<br/><br/><br/>
							<strong style="color:#999;"><i class="fa fa-film"></i> Videos</strong>
						<div class="videoSpace"></div>
					
					</div>
				</div>
				<?php include("right-seg.php"); ?>
		
		
		
		
		
		
		
		
		</div>
		<div class="line"></div>
			
			
			
			<?php include("footer.php"); ?>
			<?php include("message-box.php"); ?>
			<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
	</html>