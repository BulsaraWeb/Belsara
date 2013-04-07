<html>
	<head>
		<title>Bulsara</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<link type="text/css" rel="stylesheet" href="style.css" />
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		
	</head>		
			
	<body>
		<?php session_start(); 
		if($_SESSION["user"]=="chief") //if($_GET["id"]== hash('sha256',"ok")){ $_SESSION["user"]="chief";
   			{
   				//phpinfo();
   				
			?>
	<div align="center">		
		<form action="open_position_save.php" method="post" >
			<br> <a href="">Gestione Partner</a> 
			<br>
			<a href="indexLuca.php"> Index</a>
			<br>
			<a href="backend.php">Gestione Galleria</a>
			<br>
			<br>
			<div>
					<p style="font-size: large; ">Descrizione posizione aperta</p> <br>
					<textarea  name="descrizione" id="descrizione" col="20" row="20" style=" font-size:large"> </textarea>		
					<input type="submit" value="Cambia" onclick="if($('#descrizione').replace(/ /g,'').val()=='') confirm( 'campo vuoto?' );" style="font-size: large; "/>	
								
								<?php
								//phpinfo();
								 
								
									//
									
								   if($_GET["joined"]=="true")
								   	echo '<br>Posizione aperta modificata correttamente<br>';
								   
								   
								   echo '<br><br><br>Posizione attuale :<br>'. $_SESSION["position_open"];
								
								?>
   			</div>		
		</form>
	</div>			
  </body>
  <?php }
			
								   else header("location:login.php") ?>		
  </html>
			