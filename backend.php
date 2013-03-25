
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Bulsara</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<link type="text/css" rel="stylesheet" href="style.css" />
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<meta http-equiv='cache-control' content='no-cache'>
		<meta http-equiv='expires' content='0'>
		<meta http-equiv='pragma' content='no-cache'>

		
		<script>
								



			$(document).ready(function()
			{
				
				
				  jQuery.get('video.txt',function(data)
											{
												
												if((data.replace(" ","")!="") && (window.location.pathname.indexOf("delete")==-1))
														  {
														  	
														  		var needle=data.indexOf("?v=")+3;
														 	$("#youtube").html(     "<object width='340' height='190'><param name='movie' "
																			 						  + 'value=https://youtube.googleapis.com/v/'+data.substr(needle,needle+11)+"?version=2&fs=1"
																								      + "<param name='allowScriptAccess' value='always'></param>"
																									  + "<embed src=https://youtube.googleapis.com/v/"+data.substr(needle,needle+11)+"?version=2&fs=1&autoplay=1'"
																								      + "  type='application/x-shockwave-flash'"
																									  + " allowscriptaccess='always'"
																								      + " width='340' height='190'></embed>"
																								   	  +  "</object>");
																	 		
																	 		
												 		
															}
															
											});
				$("#carica").click(function()
				{
					
 
					$("#loading").dialog({  closeOnEscape: false,
					   open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog || ui).hide(); }
					   
					});
				
				
				// $("#container").animate({"":""});
				});
				
			 });
		</script>
   </head>
   <body>
   	<div style=" margin-top: 2%;" align="left"> <a href="join_us.php"<!--?id="<?php echo hash('sha256','ok'); ?>"--> >Gestione posizione aperta</a>
   	&nbsp;&nbsp; <a>Gestione Partner</a> &nbsp;&nbsp;<a href="indexLuca.html"> Index</a></div>
   	<div style=" margin-top: 2%;">
   	<?php 
   			session_start();
   		  if(is_numeric($_GET["num"])&&($_GET["num"]>0)) //num photo
   			
   			echo '<h1 align="center"> hai caricato con successo '.$_GET["num"].' foto</h1>';
   		 
		  else if(is_numeric($_GET["num"])&&$_GET["num"]==0)
   		  	echo '<h1 align="center"> errore caricamento foto(Ricorda: SOLO JPG )</h1>';
   		 
		 if(isset($_GET["error"])&&($_GET["error"]=="true")) 
   			echo '<h1 align="center">errore upload file</h1>';
		  if(isset($_GET["video"])&&($_GET["video"]=="ok")) 
   			echo '<h1 align="center"> video caricato correttamente</h1></br>';
		   if(isset($_GET["delete"])&&($_GET["delete"]=="ok")) 
   			echo '<h1 align="center"> video cancellato correttamente</h1></br>';
		 
		 
		   if($_SESSION["user"]=="chief")       // if($_GET["id"]==hash("sha256","ok"))
   		{
   			
   			
					 session_start();
			     	
   		 					 ?>
   		 <div align="center">
   			<form method="post"  action="load_video.php"  >
   		
   		  link youtube
   			
   			
   			<input type="text" name="video" style="width:300px;"  id ="video"/>
   			<input type="submit" value="Carica Video" />
   			
   			<br>
   			<div id ="youtube" align="center"></div>
   			
   			</form>
   			
   		<?php
   		  header("Pragma-directive: no-cache");
	    header("Cache-directive: no-cache");
	    header("Cache-control: no-cache");
	    header("Pragma: no-cache");
	    header("Expires: 0");
   		
   		  if(($_GET["delete"]!="ok")) { ?>	
   		<form method="post"  action="delete.php"  >
   		
   		<input type="submit"  value="Elimina Video" id="delete" />
   		</form>
   			
   		<?php }?>
   		
   		<form method="post"  enctype="multipart/form-data" action="load_photo.php"  >
   		
   		<div align="center">
   			
   			
   			Cliccando su carica verranno caricate TUTTE le immagini appena prese dal propio PC<br>
   		 <input  type="submit" id="carica" style="size: 100px; margin-left: 40%; margin-right: 40%; color: green; font-family:Courier; font-size:larger" value="Carica!!!"  />
   			<BR>
   			<table >
   		<tr>		
   		<img src="gallery1.jpg?a=<?php echo time();?>" style="width: 140px; height:100px" /><img src="prima.png"/>&nbsp; Carica&nbsp;  <input id="img1" name="img1" type="file">
   	    <img src="gallery2.jpg?b=<?php echo time();?>" style="width: 140px; height:100px" /><img src="seconda.png"/>&nbsp;Carica&nbsp;  <input id="img2" name="img2" type="file"><br>
   		</tr>
   		<tr>
   		<img src="gallery3.jpg?c=<?php echo time();?>" style="width: 140px; height:100px" /><img src="terza.png"/>&nbsp;Carica&nbsp;  <input id="img3" name="img3" type="file">
   		<img src="gallery4.jpg?d=<?php echo time();?>" style="width: 140px; height:100px" /><img src="quarta.png"/>&nbsp; Carica&nbsp;  	<input id="img4" name="img4" type="file"><br>
   		</tr>
   		<tr>
   		<img src="gallery5.jpg?e=<?php echo time();?>" style="width: 140px; height:100px" /><img src="quinta.png"/> &nbsp; Carica  &nbsp;	<input id="img5" name="img5" type="file">
   		<img src="gallery6.jpg?f=<?php echo time();?>" style="width: 140px; height:100px" /><img src="sesta.png"/>&nbsp;Carica  &nbsp;	<input id="img6" name="img6" type="file"><br>
   	    </tr>
   		<tr>
   	    <img src="gallery7.jpg?g=<?php echo time();?>" style="width: 140px; height:100px" /><img src="settima.png"/> &nbsp;  Carica  &nbsp;	<input id="img7" name="img7" type="file">
   		<img src="gallery8.jpg?h=<?php echo time();?>" style="width: 140px; height:100px" /><img src="ottava.png"/>&nbsp;Carica&nbsp;  <input id="img8" name="img8" type="file"><br>
   			</tr>
   		</table>
   			</table>
   			
   			
   		</div>	
   	
   	    
   		</form>
   		
   		<div id="loading" align="center" style="display:none; background-color: black; color:white; z-index: 100; width:600px; height:400px;  -moz-border-radius: 15px;border-radius: 15px;">
   			Il tempo dipendera dal numero di file caricati<br>
   			
   			<img src="loading.gif">
   		</div>
   		
   		</div>
   		<?php 
				

						
				}//if sono davvero admin
				
				else header("location:login.php");
				
   		
   		 ?>
   	</div>
   	
   </body>