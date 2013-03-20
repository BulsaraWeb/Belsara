$(document).ready(function() 
				{
				});
				

$(window).on("scroll", function()
                {
                	$("#log").text("YAYA");
                 $('.stat').each(function(index) 
								{
								
								 var distance=Math.abs($(this).offset().top-($(window).scrollTop()+$(window).height()/2.0));
								 if(distance<$(window).height()/2.0)
                                   {
									var scale=50*(1.0 - distance / ( $(window).height()/2.0) );
									$("#log").text(""+distance+" = "+$(window).height());
									$(this).css('font-size',10+scale);
									//$(this).css()
                                   }
							    });
				});