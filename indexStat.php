<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Bulsara</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv='cache-control' content='no-cache'>
		<meta http-equiv='expires' content='0'>
		<meta http-equiv='pragma' content='no-cache'>

		<link type="text/css" rel="stylesheet" href="styleStat.css" />
		<link type="text/css" rel="stylesheet" href="fonts.css" />

		<!--<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="jquery-1.9.1.min.js"></script>
		<script src="jquery.mousewheel.js"></script>
		<script type="text/javascript" src="gallery/lib/jquery.mousewheel-3.0.6.pack.js"></script>
		-->
		<script src="jquery-1.9.1.min.js"></script>

		<script src="pallini/pallini.js"></script>
		<script src="statistiche/statistiche.js"></script>

		<script type="text/javascript" src="js/biglietto.js"></script>
		<!-- <script type="text/javascript" src="js/gallery.js"></script> -->
		<script type="text/javascript" src="js/header.js"></script>
		<script type="text/javascript" src="js/logo.js"></script>

		<script>
			$(document).ready(function() {
				
				
				
				
				$("#cp").hover(function()
				{
					$("#cp").attr("src","images/pulsante-cp_rosso.png");
					
	           
				},
				
					function()
				{
					$("#cp").attr("src","images/pulsante-cp_grigio.png");
					
	           
				});
				
				$("#ooo").hover(function()
				{
					$("#ooo").attr("src","images/pulsante-ooo_rosso.png");
					
	           
				},
				
					function()
				{
					$("#ooo").attr("src","images/pulsante-ooo_grigio.png");
					
	           
				});
				
				$("#dn").hover(function()
				{
					$("#dn").attr("src","images/pulsante-dn_rosso.png");
					
	           
				},
				
					function()
				{
					$("#dn").attr("src","images/pulsante-dn_grigio.png");
					
	           
				});
				
				
				
				
					
				var count = 0;
				//capire in quanto tempo quanti click
				var zommed = false;
				var start;
				var elapsed = 0;

					var count=0;
				//capire in quanto tempo quanti click
				var zommed=false;
				var start ;
				var elapsed=0;
				var classe;
				var th_width;
				var th_height;
				
				
				for(var k=0; k<8; k++)

			$("#vetrina"+k).click(function(e)
			 {
			
	 
				 if (!zommed)
				 	{
				
						classe=$(this).attr('class');
						th_height= $(this).height();				
						th_width= $(this).width();
				    for (var i = 0; i < 8; i++)

					
					 	 	//$("#vetrina" + i).fadeTo(1,0.5).css("position","relative");;
					 	 	$("#vetrina" + i).fadeOut(1);
					 	 
				for (var i = 0; i < 8; i++)
				
				  if ($("#vetrina"+i).attr("id") == $(this).attr("id"))	 	  
					 {				   
					  // $("#gallery").prepend($("#vetrina"+i).clone().removeClass(classe).attr("id","clone").attr("src","backend_images/gallery"+i+".jpg").fadeIn(1).css("z-index",10).animate({"width":"900px","height":"400px"},1000) );
						$("#vetrina"+i).removeClass(classe).attr("src","backend_images/gallery"+i+".jpg").fadeIn(1).css("z-index",10).animate({"width":"900px","height":"400px"},100);
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
					//alert(elapsed);
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
				   $("#vetrina"+id).attr("src","backend_images/galleryThumb"+id+".jpg").css("width",th_width).css("height",th_height).addClass(classe);/*animate({"height":th_height,"width":th_width},1);*/
					
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

				//click vetrina any

				// $("#biglietto").css("-webkit-transform", "rotate(-15deg)");
				// $("#biglietto").css("-moz-transform", "rotate(-15deg)");
				// $("#biglietto").css("-o-transform", "rotate(-15deg)");
				// $("#biglietto").css("-ms-transform", "rotate(-15deg)");
				// $("#biglietto").css("transform", "rotate(-15deg)");

				//calcolo la larghezza dello schermo

				var scrWidth = $(document).width();
				var scrHeight = $(document).height();
				var w = $(document).width() / 4;

				jQuery.get('video.txt', function(data) {

					if (data.replace(" ", "") != "") {
						for (var i = 0; i < 8; i++)
							$("div_vetrina" + i).remove();

						var needle = data.indexOf("?v=") + 3;
						$("#gallery").html("<object width='980' height='500'><param name='movie' " + 'value=https://youtube.googleapis.com/v/' + data.substr(needle, needle + 11) + "?version=3&autoplay=1&color=white&fs=1" + "<param name='allowScriptAccess' value='always'></param>" + "<embed src=https://youtube.googleapis.com/v/" + data.substr(needle, needle + 11) + "?version=2&fs=1&autoplay=1'" + "  type='application/x-shockwave-flash'" + " allowscriptaccess='always'" + " width='980' height='500'></embed>" + "</object>").css("width", 980).css("height", 500);

					}

				});

				//MENU HEADER

				if (scrWidth > 980) {
					//calcolo quanto spazio serve per centrare la schermata
					var my_left = (scrWidth - 980) / 2;
					var my_right = (scrWidth - 980) / 2;
					$("#container").css("margin-left", my_left).css("margin-right", my_right);

					// if (scrHeight / 8 > 100)
					// $("#menu_header").css("height", scrHeight / 8);

				}

				var id_animating = sessionStorage.getItem('animating');

				var startingHeight = $("#gallery").height();
				var lastScrollTop = 0;
				//
				// $('#container').bind('mousewheel', function(event, delta) {
				// var dir = delta > 0 ? 'Up' : 'Down', vel = Math.abs(delta);
				// if(dir=='Up'&&$(window).scrollTop()<100)
				// {
				// alert("asda");
				// $("#logo").fadeOut(200).attr("src","logo_completo.png").fadeIn(500);
				//
				// }
				// return false;
				//});

				$(window).on("scroll", function() {//sto scrollando la finestra

					/*
					 if ($(window).scrollTop() > 500)
					 {
					 var s = document.createElement("script");
					 s.type = "text/javascript";
					 s.src  = "http://maps.google.com/maps/api/js?v=3&sensor=true&callback=gmap_draw";
					 var s = document.createElement("script");
					 s.type = "text/javascript";
					 s1.type = "text/javascript";
					 s1.src  ="mappa/mappa.js"

					 var s1 = document.createElement("script");

					 window.gmap_draw = function()
					 {

					 };
					 $("head").append(s);
					 }
					 */

					if ($("#foo").position().top <= ($(window).scrollTop() + 500)) 
						{
						   
							
							//	alert($(".footer").position().top+"   "+$(window).scrollTop());
							//	$("#biglietto").show().animate({"margin-bottom":"0px"},4000);
							$("#biglietto").show();
							$("#biglietto").animate({'margin-bottom' : '-230px'},{duration : 1000});
							
							//$(".footer").animate({'margin-left':'100px'},400);
							//$("#biglietto").hide("drop",{direction:"up"},200).show("drop",{direction:"up"},200);
						}
										
					
					$("#gallery").css("height", startingHeight - $(window).scrollTop());
					statTop = $("#gallery").position().top + (startingHeight - $(window).scrollTop()) + $("#menu_header").height();
					$("#div_stat").css("top", statTop);

					$('.stat').each(function(index) {
						var distance = Math.abs($(this).offset().top - ($(window).scrollTop() + $(window).height() / 2.0));
						if (distance < $(window).height() / 2.0) {
							var scale = 50 * (1.0 - distance / ($(window).height() / 2.0) );
							//$("#log").text(""+scale);
							$(this).css('font-size', 10 + scale);
						}
					});

				});
				// on scroll

				function formatTimeOfDay(millisSinceEpoch) {
					var secondsSinceEpoch = (millisSinceEpoch / 1000) | 0;
					var secondsInDay = ((secondsSinceEpoch % 86400) + 86400) % 86400;
					var seconds = secondsInDay % 60;
					var minutes = ((secondsInDay / 60) | 0) % 60;
					var hours = (secondsInDay / 3600) | 0;
					return hours + (minutes < 10 ? ":0" : ":") + minutes + (seconds < 10 ? ":0" : ":") + seconds;
				}

			});
			//document.ready

		</script>
	</head>
	<body>

		<?php

		error_reporting(E_ERROR | E_PARSE);
		header("Pragma-directive: no-cache");
		header("Cache-directive: no-cache");
		header("Cache-control: no-cache");
		header("Pragma: no-cache");
		header("Expires: 0");
		require('gallery_titles.php');
		$titles=array();

		$titles= get_titles();

		?>

		<div id="menu_header" >

			<a id="logo_link"> <img src="images/logo_completo.png" id="logo" /> </a>
			<br>

			<a id="who_we_are" href="#"> <img src="images/chi_siamo.png"/> </a>
			<a id="services" href="#"> <img src="images/servizi.png"/></a>
			<a href="#" id="support"> <img src="images/supporti.png"/></a>
			<a href="#" id="partner"><img src="images/partner.png"/></a>
			<a href="#" id="join_us"> <img src="images/join_us.png"/></a>
			<a href="#" id="contact"> <img src="images/contatti.png"/></a>
			<a href="login.php"> <img width="50px" height="50px" src="images/login.png"/></a>
			<!--<?php if($_SESSION["user"]!="")echo "<a href='login.php'>Login</a>";?>-->

			<div id="pallini" width="980" height="40"></div>

		</div>
		<div id="container"  align="center" >
			<!--<div id="lente" style="width:200px;height:200px;background-color:#b0c4de;"></div>-->
			<div id="gallery">
				<div id="div_vetrina0" >
					<img id="vetrina0" src="backend_images/galleryThumb0.jpg" class="thumbVetrina"/><!--</a>-->
				</div>
				<div id="div_vetrina1" >
					<!--<a title="<?php echo $titles[2];?>" class=" fancybox" rel="gallery" href="gallery2.jpg">--><img id="vetrina1" class="thumbVetrina" src="backend_images/galleryThumb1.jpg"/><!--</a>-->
				</div>
				<div id="div_vetrina2">
					<!--<a title="<?php echo $titles[3];?>"  class=" fancybox" rel="gallery" href="gallery3.jpg">--><img id="vetrina2" class="thumbVetrina_big" src="backend_images/galleryThumb2.jpg"/><br><!--</a>-->
				</div>
				<div id="div_vetrina3" >
					<!--	<a title="<?php echo $titles[4];?>"   rel="gallery" href="gallery4.jpg">--><img src="backend_images/galleryThumb3.jpg" class="thumbVetrina_biggest"  id="vetrina3"/><!--</a>-->
				</div>
				<div id="div_vetrina4" >
					<!--	<a title="<?php echo $titles[5];?>"   rel="gallery" href="gallery5.jpg">--><img src="backend_images/galleryThumb4.jpg" class="thumbVetrina"  id="vetrina4"/><!--</a>-->
				</div>
				
			</div>

			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<div id="chi_siamo" style="background-image: url('images/chi-siamo_back.png'); height: 1310px;">
				<br>
				<br>
				<p>
					<label align="left" style="font-family:'rosario-bold'; font-size:36px"> Bulsara </label>
					<label align="left" style=" font-family:'rosario-regular'; font-size:18px"> ,dal termine inglese </label>

					<label align="left" style=" font-family:'rosario-italic'; font-size:18px"> bull&#x2019;s eye </label>

					<label align="left" style=" font-family:'rosario-regular'; font-size:18px"> , il centro del bersaglio, opera nel campo
						<br>
						della </label>
					<label align="left" style=" font-family:'rosario-regular'; font-size:28px"> comunicazione non convenzionale </label>

					<label align="left" style=" font-family:'rosario-regular'; font-size:18px"> ed &egrave; </label>
					<label align="left" style=" font-family:'rosario-bold'; font-size:24px"> leader in Italia </label>
					<br>
					<label align="left" style=" font-family:'rosario-regular'; font-size:18px"> nel </label>
					<label align="left" style=" font-family:'rosario-bolditalic'; font-size:29px"> Washroom Advertising </label>
					<label align="left" style=" font-family:'rosario-regular'; font-size:18px"> ,la pubblicit&agrave; all&#x2019;interno dei servizi igienici.
						<br>
						Attraverso l&#x2019;utilizzo di </label>
					<label align="left" style=" font-family:'rosario-regular'; font-size:24px"> spazi insoliti indoor </label>
					<label align="left" style=" font-family:'rosario-bold'; font-size:18px"> , Bulsara mira a colpire ed attrarre
						<br>
						il pubblico di riferimento con </label>
					<label align="left" style=" font-family:'rosario-regular'; font-size:23px"> campagne coinvolgenti </label>
					<label align="left" style=" font-family:'rosario-regualr'; font-size:18px"> e di </label>
					<label align="left" style=" font-family:'rosario-regular'; font-size:23px"> grande impatto . </label>
				</p>

			</div>
		

			<div style="margin-top: -300px; margin-left: 40px;" align="left">
				
				<label align="left" style=" font-family:'cardo-italic'; font-size:17px"> 
				 Bando per l&#x2019;accesso al  </label><br>
			    <label align="left" style=" font-family:'cardo-bold'; font-size:17px"> 
				&#x201c;Fondo per la creativit&agrave; 2012&#x201d;.
				</label>
				 <br>
				<label align="left" style=" font-family:'cardo-italic'; font-size:17px"> 
				Ammissione al contributo relativo<br> al bando per l&#x2019;accesso al <br> &#x201c;Fondo per la creativit&agrave; 2012&#x201d;.

				</label>	
				</div>
			
			
				<div style="margin-top: -80px; margin-left: 380px" align="left">
				<label align="left" style=" font-family:'oleoScript-regular'; font-size:17px"> Per l&#x2019;evento &#x201c;Startuppers sotto il Sole:<br> 24 ore di creatività e innovazione&#x201d;.</label>
				<br>
				<br>
				<label align="left" style=" font-family:'oleoScript-regular'; font-size:21px"> Premio per la creativit&agrave;<br> del Sole 24 ore. </label>
				
				</div>
				
				<div style="margin-top:-230px; margin-left: 700px" align="left">
				<label align="left" style=" font-family:'cardo-italic'; font-size:14px"> &#x201c;I Giovani e il Lavoro 2012&#x201d; </label>
				<br>
				<label align="left" style=" font-family:'cardo-italic'; font-size:13px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; XVI edizione
				<br>
				<label align="left" style=" font-family:'cardo-italic'; font-size:17px">	Premio &#x201c;All&#x2019;Azienda<br> preferita dai partecipanti per<br> presentazione, disponibilit&agrave;<br> e cortesia dello staff.  </label>
				</div>
		         <div align="center" style="margin-top: -240px; position: relative; z-index: 10">
		         	
		         	<img  id="cp" src="images/pulsante-cp_grigio.png" />
		         	
		         	<img id="dn" src="images/pulsante-dn_grigio.png"/>
		         	
		         <img id="ooo" src="images/pulsante-ooo_grigio.png"/>
		         	
		         </div>
<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			 <div align="center">
			 	<!-- LUCATISCALINO da qua -->
				<div id="statistiche" align="left">
					<div class="statContainer">
					<label class="stat" style="font-family:'cabin-regular'; font-size:35px">66</label><label class="stat" style="font-family:'cabin-regular'; font-size:25px">%</label>
					</div>
					<br>
					<div class="statContainer">
					<label class="stat" style="font-family:'cabin-regular'; font-size:45">65</label><label class="stat" style="font-family:'cabin-regular'; font-size:35px">%</label>
					
					</div>
					<br>
					<div class="statContainer">
						<label class="stat" style="font-family:'cabin-regular'; font-size:55px">78,5</label><label class="stat" style="font-family:'cabin-regular'; font-size:45px">%</label>
					
					</div>
					<br>
					<div class="statContainer">
					    <label class="stat" style="font-family:'cabin-regular'; font-size:45px">70</label><label class="stat" style="font-family:'cabin-regular'; font-size:35px">%</label>
					
					</div>
					
					<br>
					<div class="statContainer">
					    <label class="stat" style="font-family:'cabin-regular'; font-size:35px">1</label><label class="stat" style="font-family:'cabin-regular'; font-size:25px">%</label>
					</div>
					
				</div>
				<!-- LUCATISCALINO a qua -->
			</div> 
			<!---->
		
			
			
		
			<div id="supporti" style="background-image: url('images/supporti_back.png'); height: 1550px;">
			</div>
			
			<div id="map" style="width: 500px; height: 300px"></div>

			<div  id="posizione_aperta"style="background-image: url('images/join_us_back.png'); height: 510px; font-size: larger;" ></div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>

			<br>
			<br>
			<br>
			
		
		<div id="footer">
			<img id="biglietto"  src="contatti/bv.png" class="biglietto"/>
			<br>
			<img  id="foo" src="contatti/contatti_back.png" />

			<a href="http://twitter.com" id="tweet"> </a>

			<a href="#" id="face"> </a>
		</div>
</div>
	</body>

</html>
