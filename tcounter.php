<?php
											$counter = "";
											function _squeezeCount($count,$_len){
											if($_len > 3){
												$a_c = 0; $b_c = 0; $d_c = 0; $e_c = 0; $f_c = 0;
												$a_c = substr($count,0,1);
												$b_c = substr($count,1,1);
												$d_c = substr($count,2,1);
												$e_c = substr($count,3,1);
												$f_c = substr($count,4,1);
													if($_len === 4 && $b_c == 0){
													$counter = $a_c."K";
													}else if($_len === 4 && $b_c !=0){
														$counter = $a_c.".".$b_c."K";
													}else if($_len === 5 && $d_c == 0){
														$counter = $a_c.$b_c."K";
													}else if($_len === 5 && $d_c != 0){
														$counter = $a_c.$b_c.".".$d_c."K";
													}else if($_len === 6 && $e_c == 0){
														$counter = $a_c.$b_c.$d_c."K";
													}else if($_len === 6 && $e_c != 0){
														$counter = $a_c.$b_c.$d_c.".".$e_c."K";
													}else if($_len ===7 && $b_c == 0){
														$counter = $a_c."M";
													}else if($_len === 7 && $b_c != 0){
														$counter = $a_c.".".$b_c."M";
													}else if($_len ===8 && $d_c == 0){
														$counter = $a_c.$b_c."M";
													}else if($_len ===8 && $d_c != 0){
														$counter = $a_c.$b_c.".".$d_c."M";
													}else if($_len ===9 && $e_c == 0){
														$counter = $a_c.$b_c.$d_c."M";
													}else if($_len ===9 && $e_c != 0){
														$counter = $a_c.$b_c.$d_c.".".$e_c."M";
													}else if($_len === 10 && $b_c == 0){
														$counter = $a_c."B";
													}else if($_len === 10 && $b_c != 0){
														$counter = $a_c.".".$b_c."B";
													}else{
														$counter = "VIP";
													}
											}else{
												$counter = $count;
											}
											echo $counter;
}?>