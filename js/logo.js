$(document).ready(function(){
var flag_down = false;
var flag_up = true;
$(window).on("scroll", function()
 {//sto scrollando la finestra
						
						
						
						
				
					if ($(window).scrollTop() > 500 /*&& $(window).scrollTop() < 600*/ && !flag_down)
					 {
						flag_up = false;
						$("#logo").attr("src", "images/logo.png");
						$("#header").css("height","-=100px!important")
						

						flag_down = true;
					}

					if ($(window).scrollTop() < 299 && !flag_up) 
					{
						flag_down = false;
						$("#logo").attr("src", "images/logo_completo.png");
							$("#header").css("height","+=100px!important");
						



						flag_up = true;
					}
					
					else	
					 {
					 	
					 	
					 }
	});
	
});