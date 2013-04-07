$(document).ready(function() 
				{
				 for(var i=0; i<90; i++)
					 $('#pallini').append('<img class="unpallino" src="pallini/pallino-grigio.png"/>');
			    });


$(window).on("scroll", function(){
	                              var prop=$(window).scrollTop()/$(window).height();
								  $('.unpallino').each(function(index) 
												               {
														        if(index<prop*12.4)
														           $(this).attr("src", "pallini/pallino-rosso.png");	
														        else
														       	   $(this).attr("src", "pallini/pallino-grigio.png");
												               });
								});
								
/* WITH CANVAS

at doc.start()
var canvas = document.getElementById("myCanvas");
var context = canvas.getContext('2d');

$(window).on("scroll", function(){
	                              var prop=$(window).scrollTop()/$(window).height();
								  context.clearRect(0, 0, canvas.width, canvas.height)
								  for(var i=0; i<60; i++)
								     {
								      context.beginPath();
      								  context.arc(10+i*20, 10, 5, 0, 2 * Math.PI, false);
      								  context.fillStyle = 'gray';
									  context.fill();
									}
								for(var i=0; i<prop*60; i++)
								   {
									context.beginPath();
      								context.arc(10+i*20, 10, 5, 0, 2 * Math.PI, false);
									context.fillStyle = 'red';
									context.fill();
									}
								});
*/