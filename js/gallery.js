 //----------------------ANIMAZIONE CAMBIO FOTO------------------
			$(document).ready(function(){
			
				var count=0;
				//capire in quanto tempo quanti click
				var zommed=false;
				var start ;
				var elapsed=0;
				
				for(var k=0; k<8; k++)

			$("#gallery").delegate("#vetrina"+k, "click", function(e)
			 {
				
				
				 thumb = $(this);
				
				 
				 if (!zommed)
				 	{
				 	
				 	
				
					
				    for (var i = 0; i < 8; i++)

					 if ($("#vetrina"+i).attr("id") != $(this).attr("id"))
					 	  
					 	  
					 	 $("#vetrina" + i).animate({"opacity":"90%"},200);

				 else  
					 {
					 	
						 $(this).attr("src","backend_images/gallery"+i+".jpg").fadeIn()/*.removeClass(".thumbVetrina").fadeIn(5).animate({ "width" : 980, "height" : 500}, 1)*/;
				 
	
	
					 }

				  zommed = true;
				  start = new Date().getTime();
				  count++;
		
			if((elapsed==0))
			  {
			  	elapsed=1;
			  	
			  }
				 
				 }
				 
				 
			else if(zommed)/*&& ((elapsed==1||elapsed<500) && count>0  )*/
				 {
				 
				 
				 
				 // for (var j = 0; j < 8; j++)
				// $("#vetrina" + j).fadeOut(1);
// 	
					 var big_image = $(this);
					 elapsed = new Date().getTime() - start;
					if(elapsed<400)
						{
							//alert(elapsed);
							setTimeout(function(){
							zommed=true;
							return;},300);
						}
						
					 var m = 0;
					 // var id=$("#vetrina" + i).attr("id");
					 // var i = id.replace("vetrina", "");
					 // if (i > 3)
					 // m = 200;
					 //rimpicciolisco l'immagine
	
					
					 var id= $(this).attr("id").replace("vetrina","");
					 $(this).attr("src","backend_images/galleryThumb"+id+".jpg")/*.animate({"width":245, "height":200},10).addClass(".thumbVertrina")*/.fadeIn();
					 // .animate({
					 // "width" : w,
					 // "height" : h
					 // }, 50);
// 	
					 for (var j = 7; j >= 0; j--)
						
					 $("#vetrina" + j).fadeIn(1);
	
					 zommed = false;
	
					 }
	
				 });
				 
			});	
				 //click vetrina any
				 