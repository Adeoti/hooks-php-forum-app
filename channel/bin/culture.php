<?php
session_start();
require("../config.php");
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Business Channel</title>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, intial-scale=1.0">
		<meta name="author" content="Adeoti Nurudeen">
		<meta name="description" content="No #1 Nigerian Education Community">
		<link rel="stylesheet" href="../cascade/style.css"/>
	</head>
	<body>
		<?php include("toolbox.php"); ?>
			<?php include("header.php"); ?>
			<div class="channel-pan">
				<div class="main">
				<a href="../creator.php?channel=business" class="new-thread-btn"><i class="fa fa-pencil-square-o"></i> Suggest Channel</a>
					<div class="channel-bot">
			<span class="ch-name">Culture</span>
			<div class="ch-pannel">
				<div class="ch-sub">
					<span class="ch-handle"><a href="thread-pannel.php?channel=culture&sub=dressing">Dressing</a>
					<span class="discussion-total">Discussions:34,0904</span>
					</span>
					
						<div class="description">
							Discussion board for cultural dressing. Get reasons to admire other's mode of dressing.
							</div>
						<div class="ch-hot">
							<i class="fa fa-book"></i>  <b>Discussions: 6,432</b><br/>
							<b>Last post by: </b><a href="#">poly36f</a>
						</div>
						<div class="line"></div>
						
				</div>
				<div class="ch-sub">
					<span class="ch-handle"><a href="thread-pannel.php?channel=culture&sub=dressing">Dialet</a>
					<span class="discussion-total">Discussions:34,0904</span>
					</span>
					
						<div class="description">
							Your dialet + my dialet + their dialet = ?. Get to know what?
						</div>
						<div class="ch-hot">
							<i class="fa fa-book"></i>  <b>Discussions: 6,432</b><br/>
							<b>Last post by: </b><a href="#">poly36f</a>
						</div>
						<div class="line"></div>
						
				</div>
				
		
		
				
				
		</div>
						<div class="line"></div>
		
			</div>
				
				</div>
				<?php require("rightSeg.php"); ?>
			
			</div>
		
		
		
		
		
		
		<div class="line"></div>
		
			
			<?php include("../footer.php"); ?>
			<?php include("../message-box.php"); ?>
			<script src="../js/qwrs.js"></script>
		<script src="../js/jquery ui/jquery-ui.min.js"></script>
		<script src="../js/custom.js"></script>
	</body>
	</html>