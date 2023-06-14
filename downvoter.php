<?php 
require("config.php");
session_start();
if(isset($_GET['ref']))
{
	$ref = preg_replace('/[^0-9]/',"",$_GET['ref']);

									$chk_if = $con -> prepare("SELECT * FROM downvotes WHERE disc_source = ? AND creator = ? AND status=?");
										$chk_if -> execute(array($ref,$_SESSION['uid'],"yes"));
										if($chk_if -> rowCount() > 0)
										{
											?>
								<b title="downvotes"><i class="fa fa-hand-o-down" style="color:#f05f70;"></i></b> 		
											<?php
										}else{
											?>
								<a class="dv-votes" href="downvotes.php?ref=<?php echo $ref.substr(str_shuffle('A&%#+?B?C>?D?+::)E?FG??H?IJ?K?LMNO?P:Q:)?(R:?S?TU>?VWXYZ'),0,20); ?>" title="downvote"><i class="fa fa-hand-o-down" style="color:#ffc107;"></i></a> <span style="color:#666;">
	
								<?php
										}
								?>
								<span style="color:#666;">
								<?php
									$fetch_downvotes = $con -> prepare("SELECT * FROM downvotes WHERE disc_source=? AND status=?");
									$fetch_downvotes -> execute(array($ref,"yes"));
									if($fetch_downvotes -> rowCount() > 0){
										echo $fetch_downvotes -> rowCount();
									}else{
										echo 0;
									}
									}
								?>
								</span>
								<script src="js/qwrs.js"></script>
		<script src="js/jquery ui/jquery-ui.min.js"></script>
		<script src="js/actions.js"></script>