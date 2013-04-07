	
	$(document).ready(function(){
	var offset_header = 120;

		
		$("#logo_link").click(function() 
		{
			$('html, body').animate({
				scrollTop : $('#container').position().top - offset_header
			}, 600);
			
		});

		
		$("#who_we_are").click(function() {
		
	
			$('html, body').animate(
			{
				scrollTop : $('#chi_siamo').position().top - offset_header
			}, 600);
		});
		
		$("#services").click(function() 
		{
			$('html, body').animate({
				scrollTop : $('#servizi').position().top - offset_header
			}, 600);
		});
		
		$("#support").click(function() 
		{
			$('html, body').animate({
				scrollTop : $('#supporti').position().top - offset_header
			}, 600);
		});
		
		$("#partner").click(function() 
		{
			$('html, body').animate({
				scrollTop : $('#map').position().top - offset_header
			}, 600);
		});
		
		$("#join_us").click(function() 
		{
			$('html, body').animate({
				scrollTop : $('#posizione_aperta').position().top - offset_header
			}, 600);
		});
		
		$("#contact").click(function() 
		{
			$('html, body').animate({
				scrollTop : $('#biglietto').position().top - offset_header
			}, 'slow');
		});
	
		});
// MENU HEADER---------------------------------------------------------------------
				
