
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Bulsara</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<link type="text/css" rel="stylesheet" href="style.css" />
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		
		<script>
			$(document).ready(function()
			{
				// for(var i=1; i<9; i++)
				// $('#img'+i).change( function()
											    // {
											      // if ($(this).val().indexOf(".jpg")<=0 )alert("solo file jpeg!!") );
											    // }
									// );
// 				
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
   	<div style=" margin-top: 2%;" align="center"> Mappa della posizione delle foto<br> Mappa=nero <br> Foto=giallo</div>
   	<div style=" margin-top: 2%;">
   	<?php 
   			
   		  if(is_numeric($_GET["num"])&&($_GET["num"]>0)) //num photo
   			echo ' hai caricato con successo '.$_GET["num"].' foto';
   		  else if(is_numeric($_GET["num"])&&$_GET["num"]==0)
   		  	echo 'errore caricamento foto(Ricorda: SOLO JPG )';
   		 ?>
   		<?php if($_GET["id"]==hash("sha256","ok"))
   		{
   			if( $_SESSION["user"]=="chief")echo "yeeeeeeeeeeeeee";else echo $_SESSION; //sicurezza ?>
   			
   		
   			
   		<form method="post"  enctype="multipart/form-data" action="load_photo.php"  >
   		<div align="center">
   			Cliccando su carica verranno caricate TUTTE le immagini appena prese dal propio PC<br>
   		 <input  type="submit" id="carica" style="size: 100px; margin-left: 40%; margin-right: 40%; color: green; font-family:Courier; font-size:larger" value="Carica!!!"  />
   			<BR>
   			<table >
   		<tr>		
   		<img src="gallery1.jpg" style="width: 140px; height:100px" /><img src="prima.png"/>&nbsp; Carica&nbsp;  <input id="img1" name="img1" type="file">
   	    <img src="gallery2.jpg" style="width: 140px; height:100px" /><img src="seconda.png"/>&nbsp;Carica&nbsp;  <input id="img2" name="img2" type="file"><br>
   		</tr>
   		<tr>
   		<img src="gallery3.jpg" style="width: 140px; height:100px" /><img src="terza.png"/>&nbsp;Carica&nbsp;  <input id="img3" name="img3" type="file">
   		<img src="gallery4.jpg" style="width: 140px; height:100px" /><img src="quarta.png"/>&nbsp; Carica&nbsp;  	<input id="img4" name="img4" type="file"><br>
   		</tr>
   		<tr>
   		<img src="gallery5.jpg" style="width: 140px; height:100px" /><img src="quinta.png"/> &nbsp; Carica  &nbsp;	<input id="img5" name="img5" type="file">
   		<img src="gallery6.jpg" style="width: 140px; height:100px" /><img src="sesta.png"/>&nbsp;Carica  &nbsp;	<input id="img6" name="img6" type="file"><br>
   	    </tr>
   		<tr>
   	    <img src="gallery7.jpg" style="width: 140px; height:100px" /><img src="settima.png"/> &nbsp;  Carica  &nbsp;	<input id="img7" name="img7" type="file">
   		<img src="gallery8.jpg" style="width: 140px; height:100px" /><img src="ottava.png"/>&nbsp;Carica&nbsp;  <input id="img8" name="img8" type="file"><br>
   			</tr>
   		</table>
   			</table>
   			
   			
   		</div>	
   	
   	    
   		</form>
   		
   		<div id="loading" align="center" style="display:none; background-color: black; color:white; z-index: -1; -moz-border-radius: 15px;border-radius: 15px;">
   			Il tempo dipendera dal numero di file caricato<br>
   			
   			<img src="loading.gif">
   		</div>
   		
   		
   		<?php 
				

							
				}//if sono davvero admin
				
				else echo "WTF";
				
   		
   		 ?>
   	</div>
   	
   </body>