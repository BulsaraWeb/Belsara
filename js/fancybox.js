   /*     $(".wrap_fancybox").css("margin-top",260);
				$(".fancybox").fancybox({

					
					openEffect : 'elastic',
					openSpeed : 250,

					closeEffect : 'elastic',
					closeSpeed : 250,

					closeClick : true,

					closeBtn : true,

				    
					arrows : true,
					


					// helpers : {
						// overlay : {
									// css : {
											// 'background' : 'rgba(58, 48, 45, 0.75)'
										   // }
// 
							  	  // }
							  // }
				});
				*/
				/*----------------------ANIMAZIONE CAMBIO FOTO------------------
						(function ($, F) {
    
								    // Opening animation - fly from the top
								    F.transitions.dropIn = function() 
								    {
								        var endPos = F._getPosition(true);
								
								        endPos.top = (parseInt(endPos.top, 10) - 200) + 'px';
								        endPos.opacity = 0;
								        
								        F.wrap.css(endPos).show().animate({
								            top: '+=200px',
								            opacity: 1
								        }, {
								            duration: F.current.openSpeed,
								            complete: F._afterZoomIn
								        });
								    };
								
								    // Closing animation - fly to the top
								    F.transitions.dropOut = function() 
								    {
								        F.wrap.removeClass('fancybox-opened').animate({
								            top: '-=200px',
								            opacity: 0
								        }, {
								            duration: F.current.closeSpeed,
								            complete: F._afterZoomOut
								        });
								    };
								    
								    // Next gallery item - fly from left side to the center
								    F.transitions.slideIn = function()
								     {
								        var endPos = F._getPosition(true);
								
								        endPos.left = (parseInt(endPos.left, 10) - 200) + 'px';
								        endPos.opacity = 0;
								        
								        F.wrap.css(endPos).show().animate({
								            left: '+=200px',
								            opacity: 1
								        }, {
								            duration: F.current.nextSpeed,
								            complete: F._afterZoomIn
								        });
								    };
								    
								    // Current gallery item - fly from center to the right
								    F.transitions.slideOut = function() 
								    {
								        F.wrap.removeClass('fancybox-opened').animate({
								            left: '+=200px',
								            opacity: 0
								        }, {
								            duration: F.current.prevSpeed,
								            complete: function () {
								                $(this).trigger('onReset').remove();
								            }
								        });
								    };
								
								}(jQuery, jQuery.fancybox));
								
								$(".fancybox")
								    .attr('rel', 'gallery')
								    .fancybox({
								        openMethod : 'dropIn',
								        openSpeed : 250,
								
								        closeMethod : 'dropOut',
								        closeSpeed : 150,
								        
								        nextMethod : 'slideIn',
								        nextSpeed : 250,
								        
								        prevMethod : 'slideOut',
								        prevSpeed : 250
								  });


*/   