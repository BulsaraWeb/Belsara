//$("#biglietto").css('margin-left' , '124px');
					
					//------------------------------------------------ANIMAZIONE BIGLIETTO.--------------------------------
					//	$("#biglietto").hide();
					//	$("#biglietto").css("margin-bottom","400px");
$(document).ready(function(){
$(window).on("scroll", function() 
{
	if($(window).scrollTop() + $(window).height() == $(document).height())
	{
			$("#biglietto").show();
		$("#biglietto").animate({'margin-bottom' : '-230px'},{duration : 1000});
	
		
	} 
	/* 
	if ($("#foo").position().top <= ($(window).scrollTop() + 500)) 
	{
	   
		
		//	alert($(".footer").position().top+"   "+$(window).scrollTop());
		//	$("#biglietto").show().animate({"margin-bottom":"0px"},4000);
		$("#biglietto").show();
		$("#biglietto").animate({'margin-bottom' : '-230px'},{duration : 1000});
		
		//$(".footer").animate({'margin-left':'100px'},400);
		//$("#biglietto").hide("drop",{direction:"up"},200).show("drop",{direction:"up"},200);
	}
	   // $("#biglietto").css(	'margin-bottom' , '0px').css('margin-left' , '0px');
 	*/
});
	
});

			/*complete : function() 
							{

								//$("#biglietto").css("-moz-transition-delay","0s, 0s, 0s");

								$("#biglietto").css("-webkit-transform", "rotate(35deg)");
								$("#biglietto").css("-moz-transform", "rotate(35deg)");
								$("#biglietto").css("-o-transform", "rotate(35deg)");
								$("#biglietto").css("-ms-transform", "rotate(35deg)");
								$("#biglietto").css("transform", "rotate(35deg)");
								
								
								
								$("#biglietto").css("transform", "scale(0.5,0.5)");
								$("#biglietto").css("-ms-transform"," scale(0.5,0.5)");
								$("#biglietto").css("-moz-transform", "scale(0.5,0.5)");
								
								$("#biglietto").css("-webkit-transform", "scale(0.5,0.5)");
								
								
								// $("#biglietto").css("-o-transform", "scale(1,1)");
								// $("#biglietto").css("transform", "scale(1,1)");
								// $("#biglietto").css("-ms-transform"," scale(1,1)");
								// $("#biglietto").css("-moz-transform", "scale(1,)");
// 												
								// $("#biglietto").css("-webkit-transform", "scale(1,1)");
// 												
// 												
								// $("#biglietto").css("-o-transform", "scale(1,1)");
							
								
								
								
								 /* Firefox */

								//$("#biglietto").css("transform", "rotateX(4.6deg)");

