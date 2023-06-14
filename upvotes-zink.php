<?php
require("config.php");
									$fetch_upvotes = $con -> prepare("SELECT * FROM upvotes WHERE disc_source=?");
									$fetch_upvotes -> execute(array($ref));
									if($fetch_upvotes -> rowCount() > 0){
										echo $fetch_upvotes -> rowCount();
									}else{
										echo 0;
									}
								?>