<?php
/*
session_start();
if($_SESSION['user']!='chief')
  header('location:../login.php');*/


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Bulsara</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
		<script>
		
		var actualCatSelected=-1;
		
		function enableDisableButtonNewCat()
		          {
		          	
	                 if($('input[name=catName]').val()=="" || $('input[name=pin]').val()=="" || $('input[name=description]').val()=="")
	                   {
	                    $('input[value=Inserisci]').attr("disabled", "disabled");;
	                    return;
	                   } 
	                   $('input[value=Inserisci]').removeAttr("disabled");	
		          };
		
		function enableDisableButtonDelCat()
		          {
		          	if(actualCatSelected!=-1)
		          	 {
		          	  $("#pin"+actualCatSelected).css("display","none");
		          	  $('input[name=editDescr]').val("");
		          	  $('input[name=editName]').val("");
		          	 }
	                if($('#listaCategorie').val()<=0)
	                  {
	                   $('input[value=Elimina]').attr("disabled", "disabled");;
	                   return;
	                   actualCatSelected=-1;
	                  } 
	                actualCatSelected=$('#listaCategorie').val();
	                $('input[value=Elimina]').removeAttr("disabled");
	                //alert(actualCatSelected);
	                $("#pin"+actualCatSelected).css("display","block");
	                $('input[name=editDescr]').val($("#cat"+actualCatSelected).attr("title"));
	                $('input[name=editName]').val($("#listaCategorie option[value='"+actualCatSelected+"']").text());
		          };
		          
		function enableDisableButtonNewLoc()
		          {
		          	
	                 if($('input[name=locName]').val()=="")
	                   {
	                    $('input[id=insertLoc]').attr("disabled", "disabled");;
	                    return;
	                   } 
	                   $('input[id=insertLoc]').removeAttr("disabled");	
		          };
		          
		          
		function initialize() 
		          {
		 		   input = document.getElementById('searchLoc');
			        var autocomplete = new google.maps.places.Autocomplete(input);
			        var infowindow = new google.maps.InfoWindow();
		
					google.maps.event.addDomListener(input, 'keydown', function(e) 
					                                {
										      		 if(e.keyCode == 13)
										      		   {
										      			if(e.preventDefault)
										      			  {
	        											   e.preventDefault();
	        											  }
	        											else
	        											  {
												           e.cancelBubble = true;
												           e.returnValue = false;
	        											  }
	      											    }
      												  }); 
		
			        google.maps.event.addListener(autocomplete, 'place_changed', function() 
			                                    {
										         infowindow.close();
										          //marker.setVisible(false);
										          input.className = 'text';
										          var place = autocomplete.getPlace();
										          if(!place.geometry) 
										            {
										             // Inform the user that the place was not found and return.
										             input.className = 'notfound';
										             return;
										            }
												  //document.getElementById('PrivateUser_LOCATION').value=place.geometry.location;
												  alert(place.geometry.location);
										          var address = '';
			          
										          if(place.address_components) 
										            {
										            address = [
										              (place.address_components[0] && place.address_components[0].short_name || ''),
										              (place.address_components[1] && place.address_components[1].short_name || ''),
										              (place.address_components[2] && place.address_components[2].short_name || '')
										                      ].join(' ');
										            }
			
										          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
										          //infowindow.open(map, marker);
			     							     });
      				}
      
        google.maps.event.addDomListener(window, 'load', initialize);		          
		          
		          
		          
		$(document).ready(function() 
				{
				 actualCatSelected=-1;
				});
		</script>
		</head>
	<body>
	 <?php
	   require("markerModel.php");
	  if(isset($_POST["catName"]) && $_FILES["file"]["error"]==0 && isset($_POST["description"]))
 	    {
 	     if((strstr($_FILES['pin']['name'],".png")))
		   {
		    move_uploaded_file($_FILES["pin"]["tmp_name"],$_SERVER["DOCUMENT_ROOT"]."newSite/mappa/pin-images/".$_POST["catName"].".png");
   		    addCategory($_POST["catName"],"http://www.bulsara.it/newSite/mappa/pin-images/".$_POST["catName"].".png",$_POST["description"]);
		    echo 'Inserimento avvenuto';
		   }
		 else
		   {
		   	echo "L'immagine caricata non e' png";
		   }
  	  	}
	  else if(isset($_POST['categoryList']))
	    {
	     
 	     //unlink($_SERVER["DOCUMENT_ROOT"]."newSite/mappa/pin-images/".     ?????     .".png");
		 removeCategory($_POST['categoryList']);
		 echo 'Categoria eliminata';
	    }
	   
	   
	   
	   
	   // Category List
	   $cat=getCategories();
	   echo '<center>';
	   echo '<form action="backendMappa.php" method="post">';
	   echo '<table><tr><td>';
	   echo 'Categorie <br>Presenti:<br><select id="listaCategorie" name="categoryList" id="category" size="8" onchange="enableDisableButtonDelCat();">';
	   foreach($cat as $k=>$v)
              echo '<option id="cat'.$k.'" value="'.$k.'" title="'.$v['description'].'">'.$v['catName'].'</option>';
       echo '</select></td><td>';
	   echo 'Nome: <br><input id="editName" type="text" name="editName" onkeydown="">';
	   echo '<br>Pin: ';
       foreach($cat as $k=>$v)
	         echo '<img id="pin'.$k.'" src="'.$v['pinPath'].'" style="display: none;">';
	   echo '<br><input id="editPin" value="clicca per modificare" name="editPin" type="file" onkeydown="">';
	   echo '<br><br>Descrizione: <br><input id="editDescr" type="text" name="editDescr" onkeydown="">';
	   echo '</td></tr></table>';
       echo '<br><br><input type="submit" value="Elimina" disabled>';
	   echo '    <input type="submit" value="Modifica" disabled>';
	   echo '</form>';
	   
	   echo '<br><br><br><br><br><br>';
	   
	   // Insert new category
	   echo '<form action="backendMappa.php" method="post" enctype="multipart/form-data">';
	   echo '<br>Nuova Categoria: <input id="catName" type="text" name="catName" onkeydown="enableDisableButtonNewCat();">';
	   echo '<br>Immagine Pin: <input id="pin" name="pin" type="file" onkeydown="enableDisableButtonNewCat();">';
	   echo '<br>Descrizione: <input id="description" type="text" name="description" onkeydown="enableDisableButtonNewCat();">';
	   echo '<br><input type="submit" value="Inserisci" disabled >';
	   echo '</form>';
	   
	   echo '<br><br><br><br><br><br>';
	   // Insert new location
	   
	   echo '<form action="backendMappa.php" method="post">';
	   echo '<br>Nuovo Partner (indirizzo): <input id="searchLoc" type="text" name="locName" onkeydown="enableDisableButtonNewLoc();">';
	   echo '<input type="submit" value="Inserisci" id="insertLoc" disabled >';
	   echo '</form>';
	   

	   echo '</center>';
       
	  ?>

	</body>
</html>