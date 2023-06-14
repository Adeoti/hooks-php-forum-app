<?php
session_start();
if(!isset($_SESSION['uid'])){
	header("Location:join.php");
}else{
	$channel_cat = "";
	if(isset($_GET['channel']))
	{
		$channel = preg_replace('/[^a-z]/',"",$_GET['channel']);
				/*if($channel != "business" || $channel != "campus" || $channel != "programming" || $channel !="crime" || $channel != "celebrities" || $channel != "technology" || $channel != "exams" || $channel != "relationship" || $channel != "fashion" || $channel != "health" || $channel != "culture" || $channel != "politics" || $channel != "sport" || $channel != "farming"){
					header("Location:index.php");
				}
					*/
					switch($channel){
						case 'programming' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						case 'business' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						case 'crime' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						case 'exams' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						case 'celebrities' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						case 'technology' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						case 'farming' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						case 'fashion' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						case 'politics' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						case 'campus' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						case 'culture' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						case 'relationship' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						case 'sport' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						case 'health' : $channel_cat = "<select name='channel'><option value='$channel'>".$channel."</option></select>";
						break;
						default : header("Location:index.php");
						
					}
		
			
	}else{
		$channel_cat = '
			<select name="channel" style="width:49%; height:40px; border:1px solid #eee; border-radius:4px;">
								<option value="">...Choose Category...</option>
								<option value="business">Business</option>
								<option value="campus">Campus</option>
								<option value="celebrities">Celebrities</option>
								<option value="crime">Crime</option>
								<option value="culture">Culture</option>
								<option value="exams">Exams</option>
								<option value="farming">Farming</option>
								<option value="fashion">Fashion</option>
								<option value="health">Health</option>
								<option value="politics">Politics</option>
								<option value="programming">Programming</option>
								<option value="relationship">Relationship</option>
								<option value="sport">Sport</option>
								<option value="technology">Technology</option>
								
								
								
								
							</select>
		
		';
	}
	?>
	
<!DOCTYPE html>
	<html>
	<head>
		<title>Start Your Dicussion</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
		<?php require("rel.php"); ?>
	</head>
	<body>
		<?php include("toolbox.php"); ?>
		<div class="wrapper " >
			<?php include("header.php"); ?>
			
				<br/><br/><br/>
				<div class="container-fluid">
				<div class="row">
				<div class="col-sm-2 col-md-2"></div>
				<div class="col-sm-6 col-md-6" style="background-color:lightgray;">
					<form action="post-discussion.php" method="post" id="posterim" enctype="multipart/form-data" name="discussionPer">
						<br/>
							<label for="title">Title</label><br/>
							<input type="text"  style="width:100%; height:40px; text-indent:10px; border:1px solid #eee; border-radius:5px;" placeholder="Enter Topic Title" name="title" class="title"/><br/>
						<br/><?php echo $channel_cat; ?>
							<select name="mode" style="width:50%; height:40px; border:1px solid #eee; border-radius:4px;">
								<option value="">...Mode...</option>
								<option title="post news on the selected category" value="News">News</option>
								<option title="create guide on the selected category" value="Guide">Guide</option>
								<option title="ask question on the selected category" value="Question">Question</option>
								<option title="Use no mode" value="Question">None</option>
							</select><br/><br/>
						<center><label for="content">Content</label></center>
							<textarea style="display:none;" name="content" id="textpane"></textarea>
							<div class="typing-format-tool">
								<span onclick="_bold_();"><i class="fa fa-bold"></i></span>
								<span onclick="__bend_();"><i class="fa fa-italic"></i></span>
								<span onclick="__rule_under();"><i class="fa fa-underline"></i></span>
								<span onclick="__ul_list();"><i class="fa fa-list-ul"></i></span>
								<span onclick="__ol_list();"><i class="fa fa-list-ol"></i></span>
								<span onclick="_justifyLeft_();"><i class="fa fa-align-left"></i></span>
								<span onclick="_justifyCenter_();"><i class="fa fa-align-center"></i></span>
								<span onclick="_justifyRight_();"><i class="fa fa-align-right"></i></span>
								<span onclick="_justifyAll_();"><i class="fa fa-align-justify"></i></span>
								<span onclick="__indent();"><i class="fa fa-indent"></i></span>
								<span onclick="_outdent_();"><i class="fa fa-outdent"></i></span>
								<span onclick="__cutOff_();"><i class="fa fa-scissors"></i></span>
								<span onclick="__remove_();"><i class="fa fa-trash-o"></i></span>
							</div>
							<iframe id="myEditor" style="width:100%; height:220px; background-color:#fff; border:1px solid #eee;" name="myEditor" class="myEditor"></iframe>
							
							<!--<input type="button" onclick="processDraft()" value="Save as Draft"  name="draft" class="publish-btn draft"/>-->
							
							<div class="row">
								<div class="col-sm-6 col-md-6">
							<label class="pic-crea btn btn-sm btn-success" ><i class="fa fa-upload" style="color:#fff;"></i> upload<input style="display:none;" type="file" name="image" class="image-chooser"/></label>
									
								</div>
								<div class="col-sm-6 col-md-6">
							<input name="link" type="text" placeholder="Attarch Link" class="link-box" style=" text-align:center; color:#f05f70; border:1px solid #eee; height:33px; border-radius:7px; display:inline-block; "/>
							<button type="button" onclick="processDiscussion()"  name="post" class="btn btn-sm btn-primary publish-btn post"><i class="fa fa-check"></i> Publish</button>
								
								</div>
							
							</div>
							
							<div class="line"></div>
					
					</form>
				</div>
				
				<div class="col-md-3 col-md-3 ">
				<?php include("posting-guide.php"); ?>
				
				</div>
				
			</div>
			</div>
				
				
		</div>
		<div class="line"></div>
		
		
			<?php include("footer.php"); ?>
			<?php include("message-box.php"); ?>
			<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="js/custom.js"></script>
		<!-- <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script> -->
		<script>
			var editor;
			editor = document.getElementById("myEditor");
			editor = editor.contentWindow.document;
			function __wake(){
				editor.designMode = "on";
				editor.spellcheck = false;
					editor.addEventListener("focus", function(){
						$('.typing-format-tool').slideDown(1000);
					});
					
			}
		__wake();
			function _bold_(){
				editor.execCommand('bold',false,null);
			}
			function __bend_(){
				editor.execCommand('italic',false,null);
			}
			function __cutOff_(){
				editor.execCommand('cut',false,null);
			}
			function __rule_under(){
				editor.execCommand('underline',false,null);
			}
			function __ul_list(){
				editor.execCommand('insertUnOrderedList',false,null);
			}
			function __ol_list(){
				editor.execCommand('insertOrderedList',false,null);
			}
			function __remove_(){
			
				editor.execCommand('forwardDelete',false,null);
			}
			function __indent(){
			
				editor.execCommand('indent',false,null);
			}
			function _outdent_(){
			
				editor.execCommand('outdent',false,null);
			}
			function _justifyCenter_(){
			
				editor.execCommand('justifyCenter',false,null);
			}
			function _justifyLeft_(){
			
				editor.execCommand('justifyLeft',false,null);
			}
			function _justifyRight_(){
			
				editor.execCommand('justifyRight',false,null);
			}
			function _justifyAll_(){
			
				editor.execCommand('justifyAll',false,null);
			}
				function processDiscussion(){
					// var content = $('.emojionearea-editor').html();
					var form = document.getElementById("posterim");
					form.action = "post-discussion.php";
					var content = window.frames['myEditor'].document.body.innerHTML;
					var pane = document.getElementById("textpane");
						pane.value = content;
						document.forms['discussionPer'].submit();
					
					
					
					
				}
				function processDraft(){
					
					var form = document.getElementById("posterim");
					form.action = "draft-discussion.php";
					// var content = $('.emojionearea-editor').html();
					var content = window.frames['myEditor'].document.body.innerHTML;
					var pane = document.getElementById("textpane");
						pane.value = content;
						document.forms['discussionPer'].submit();
					
				}
		</script>
		<script>
		/*$(document).ready(function() {
	$("#myEditor").emojioneArea({
  	pickerPosition: "right",
    tonesStyle: "bullet"
	
  });
	$('.prntContent').click(function(){
		alert($('.emojionearea-editor').html());
	});
});*/
		</script>
	</body>
	</html>
	<?php
}
?>