<?php
session_start();
if(!isset($_SESSION['uid']))
{
	header("Location:index.php");
}else{
	?>
	
<!DOCTYPE html>
	<html>
	<head>
		<title>Draft Collapsed</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
		<?php include("toolbox.php"); ?>
		<div class="wrapper ">
			<?php include("header.php"); ?>
			<div class="empty-left"></div>
		<div class="posting-pannel-hf" >
					<i class="fa fa-book"></i> Draft
					<!--Usage Start -->
					<?php
						require("config.php");
						$fetch_draft = $con -> prepare("SELECT * FROM drafts ORDER BY ref DESC");
						if($fetch_draft -> execute())
						{
							if($fetch_draft -> rowCount()>0)
							{
								$fetch_draft -> setFetchMode(PDO::FETCH_ASSOC);
								while($row = $fetch_draft -> fetch())
								{
									$ref = $row['ref'];
									$title = $row['title'];
									$title_w = "";
										if(strlen($title)>30){
											$title_w = substr($title,0,30)."...";
										}else{
											$title_w = $title;
										}
									$category = $row['category'];
									$mode = $row['mode'];
									$content = $row['content'];
									$link = $row['link'];
									$creator_ref = $row['creator_ref'];
									$date = $row['date'];
								?>
					<div class="segus">
						<div class="draft-header">
							<div class="header-left">
							&nbsp;&nbsp;
								<strong title="<?php echo $title; ?>"><?php echo $title_w; ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#666;"><i class="fa fa-tags"></i> <?php echo $category; ?></span>
								</div>
							<div class="header-right">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<span style="color:#666;"><i class="fa fa-clock-o"></i> saved on <?php echo $date; ?></span>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
							<div class="line"></div>
						</div>
							<div class="draft-main">
								<div class="draft-main-left">
									<?php echo $content; ?>
								</div>
								<div class="draft-main-right">
									<img src="images/cover.jpg">
								</div>
								<div class="line"></div>
							</div>
						<div class="draft-footer">
							<a href="unlink-draft.php?ref=<?php echo $ref; ?>"><i class="fa fa-trash"></i> Delete</a>
							<a href="#"><i class="fa fa-pencil"></i> Edit</a>
							<a href="#" class="pub"><i class="fa fa-pencil-square-o"></i> Publish</a>
						</div>
					
					
						</div>
						<?php
								}
								
							}else{
								echo "Empty!";
							}
						}
					
					?>
						<!--Usage End -->
					
				</div>
				<?php include("posting-guide.php"); ?>
				
		</div>
		<div class="line"></div>
		
		
			<?php include("footer.php"); ?>
			<?php include("message-box.php"); ?>
			<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="js/custom.js"></script>
		<script>
			
		</script>
	</body>
	</html>
	<?php
}
?>