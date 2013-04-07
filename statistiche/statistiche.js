var a=[];
$(document).ready(function() 
				{
				 a=[];
				 $('.stat').each(function(index)
				                {
				                 a[index]=$(this).css('font-size');
				                });
				});
				

$(window).on("scroll", function()
                {
                	
                 $('.stat').each(function(index) 
								{
								
								 var distance=Math.abs($(this).offset().top-($(window).scrollTop()+$(window).height()/2.0));
								 if(distance<$(window).height()/2.0)
                                   {
									var scale=38*(1.0 - distance / ( $(window).height()/2.0) );
									
									$(this).css('font-size',a[index]+scale);
									//$(this).css()
                                   }
							    });
				});