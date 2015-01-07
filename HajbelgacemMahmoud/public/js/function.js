$(function(){
	$(".img").each(function(){
		$(this).click(function(){
			alert('ok');
		});
		$(this).mouseover(function(){
			$(this).parent().css("z-index","100");
			$(this).removeClass('img');
		});
		$(this).mouseout(function(){
			$(this).addClass('img');
			$(this).parent().removeAttr("style");
		});
		
	});
});