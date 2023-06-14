<?php 
require("config.php");
session_start();
if(isset($_GET['ref']))
{
	$ref = preg_replace('/[^0-9]/',"",$_GET['ref']);

									$chk_if = $con -> prepare("SELECT * FROM upvotes WHERE disc_source = ? AND creator = ? AND status=?");
										$chk_if -> execute(array($ref, $_SESSION['uid'],"yes"));
										if($chk_if -> rowCount() > 0)
										{
											?>
								<b title="upvotes"><i class="fa fa-hand-o-up" style="color:#f05f70;"></i></b> 		
											<?php
										}else{
											?>
								<a class="up-votes" href="upvotes.php?ref=<?php echo $ref.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" title="upvote"><i class="fa fa-hand-o-up" style="color:#2e9fff;"></i></a> 			
											<?php
										}
								?>
							<span style="color:#666;">
								<?php
									$fetch_upvotes = $con -> prepare("SELECT * FROM upvotes WHERE disc_source=? AND status=?");
									$fetch_upvotes -> execute(array($ref,"yes"));
									if($fetch_upvotes -> rowCount() > 0){
										echo $fetch_upvotes -> rowCount();
									}else{
										echo 0;
									}
									}
								?>
							</span>
							<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="js/actions.js"></script>