$(document).ready(function(){
	$('.remove-notification').on('click', function(evt){
					evt.preventDefault();
					var ref = $(this).attr('href');
						ref = ref.slice(ref.indexOf('?')+1);
						$.get("delete-notification.php",ref,function(data){
							$('.notific-reporter').html(data);
							$('.notific-reporter').fadeIn(500).delay(1000).fadeOut(1000);
						});
				});
	
});