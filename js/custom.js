	$(document).ready(function(){
		
	$('.notific-pan').css('background','red');
		
		$('.notification-bell').on('click', function(){
			$('.notific-pan').fadeToggle();
			$('.notification-body-body').load("notifications.php");
			$.post("zeronotifications.php",{chk:0}, function(data){
				notific_count();
			});
	});
	
		
		$('.tool-controler').on('click',function(){
				$('.sec').slideToggle();
				
			});
	$('.composer').draggable();
	$('.close-composer').on('click', function(){
		$('.composer').hide({'effect':'blind', 'duration':2000});
		$('.overlay').hide({'effect':'blind', 'duration':2000});
	});
	
	$('.reply-trigger').on('click', function(){
		$('.reply-box').focus();
	});
	$('.clue').on('click', function(){
		$('.receipient-drop').fadeToggle(1000);
	});
	$('.receipient-drop a').click(function(){
		$('.breem').val($(this).attr('rel'));
		$('.receipient-drop').fadeOut(1000);
	});
	$('.box.in').on('click', function(){
		$("#messageLoader").load("inbox-save.php").error(function(){
			$("#messageLoader").html("<h3>Ooops !! Loading Error...</h3>");
		});
	});
	$('.box.out').on('click', function(){
		$("#messageLoader").load("sent-save.php").error(function(){
			$("#messageLoader").html("<h3>Ooops !! Loading Error...</h3>");
		});
	});
	$('.box.draft').on('click', function(){
		$("#messageLoader").load("draft-save.php").error(function(){
			$("#messageLoader").html("<h3>Ooops !! Loading Error...</h3>");
		});
	});
	$('.photoSpace img').mouseover(function(){
		$(this).addClass('photo-view');
		$('.photoSpace img').not($(this)).removeClass('photo-view');
	});
	$('.photoSpace img').mouseout(function(){
		$(this).removeClass('photo-view');
		
	});
	$('.photoSpace img').click(function(){
		var src = $(this).attr('src');
		var output = $('.previwer-inner img');
		output.attr('src',src);
		$('.previwer').fadeIn(1000);
		$('.overlay').fadeIn(1000);
		
	});
	$('.overlay').on('click', function(){
		$('.previwer').fadeOut(1000);
		$('.overlay').fadeOut(1000);
	});
	$(".searchHandle").on("click",function(){
		$(".search-box").focus();
		$(".board").addClass("wrapp").animate({
				top:"370px",
				left:"-440px"
		}).fadeIn(1000).delay(1000).animate({
			top:50+"px",
			left:0
		},500).delay(1000).animate({
			color:"#fff"
		}).delay(3000).removeClass("wrapp").fadeOut("slow");
	});
	
	function notific_count(){
		$.post("notific_checker.php",{chk:1},function(data){
			$('.notific-count').html(data);
		});
	}
	notific_count();
	setInterval(notific_count(),500);
	
	
	
	
	});
	
	
			
	
	
	