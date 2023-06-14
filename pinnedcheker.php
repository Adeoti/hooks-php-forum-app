<?php
require("config.php");
session_start();
					if(isset($_GET['ref'])){
						$ref = preg_replace('/[^0-9]/',"",$_GET['ref']);
									$chkPinned = $con -> prepare("SELECT * FROM favourites WHERE disc_source=? AND pinner=?");
									$chkPinned -> execute(array($ref,$_SESSION['uid']));
									if($chkPinned -> rowCount()>0)
									{
										?>
							<b title="pinned to favourite"><i class="fa fa-thumb-tack" style="color:#f05f70;"></i></b>
										<?php
									}else{
										?>
							<a class="pinHandle" href="fav-pin.php?ref=<?php echo $ref; ?>" title="pin to favourite"><i class="fa fa-thumb-tack" style="color:#2e9fff;"></i></a>			
										<?php
									}
									}
								?>