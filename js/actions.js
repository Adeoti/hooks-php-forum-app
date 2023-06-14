$(document).ready(function(){
$('.dv-votes').on('click', function(evt){
					evt.preventDefault();
					var ref = $(this).attr('href');
						ref = ref.slice(ref.indexOf('?')+1);
						$.get("downvotes.php",ref,function(data){
							$('.vote-display').html(data).fadeIn(500).delay(1000).fadeOut('slow');
							$.get("downvoter.php",ref,function(data){
								$('.downvoter').html(data);
								$.get("upvoter.php",ref,function(data){
								$('.upvoter').html(data);
							});
								
							});
						});
						
						
				});
				$('.up-votes').on('click', function(evt){
					evt.preventDefault();
					var ref = $(this).attr('href');
						ref = ref.slice(ref.indexOf('?')+1);
						$.get("upvotes.php",ref,function(data){
							$('.vote-display').html(data).fadeIn(500).delay(1000).fadeOut('slow');
							$.get("upvoter.php",ref,function(data){
								$('.upvoter').html(data);
								$.get("downvoter.php",ref,function(data){
								$('.downvoter').html(data);
								
							});
							});
						});
						
						
				});
				/* $('.reply-btn').click(function(event){
					event.preventDefault();
					var comment = $('.reply-box').attr('value');
					//var comment = $('.emojionearea-editor').html();
					var ref = $(this).parent('form').attr('action');
					ref = ref.slice(ref.indexOf('ref')+4);
					var data = {ref:ref, reply_content:comment};
					$.post("post-reply.php",data,function(data){
						$('.reply-notific').html(data).fadeIn(500).delay(1000).fadeOut('slow');
						$.post("replication.php",{ref:ref},function(data){
							$('.replication').html(data);
							$('.emojionearea-editor').html("");
						});
					});
				}); */
				$('.pinHandle').on('click',function(xyz){
					xyz.preventDefault();
					var ref = $(this).attr('href');
					ref = ref.slice(ref.indexOf('?')+1);
					$.get("fav-pin.php",ref,function(data){
						$('.pinned-display').html(data).fadeIn(500).delay(1000).fadeOut('slow');
						$.get("pinnedcheker.php",ref,function(data){
							$(".thumbLogo").html(data);
						});
					});
					
					
				});

});