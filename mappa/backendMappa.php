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
		          	
	                 if($('#listaCategorie').val()<=0)
	                   {
	                    $('input[value=Elimina]').attr("disabled", "disabled");;
	                    return;
	                   } 
	                   $('input[value=Elimina]').removeAttr("disabled");	
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
				
				});
		</script>
		</head>
	<body>
	 <?php
	   require("markerModel.php");
	  if(isset($_POST["catName"]) && isset($_POST["pin"]) && isset($_POST["description"]))
 	    {
 	    //	unlink($_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg");
 	    echo $_FILES['pin'].'<br>';
		 if(move_uploaded_file($_FILES['pin'],$_SERVER["DOCUMENT_ROOT"]."/newSite/mappa/pin-images/pin.jpg"))
 	        echo "arrivo --> ";
		 else
		 	echo "ciccia --> ";
   		 addCategory($_POST["catName"],$_SERVER["DOCUMENT_ROOT"]."/newSite/mappa/pin-images/pin.jpg",$_POST["description"]);
		 echo 'Inserito  '.$_POST["catName"].'  '.$_SERVER["DOCUMENT_ROOT"]."/newSite/mappa/pin-images/pin.jpg".'  '.$_POST["description"];
  		}
  	  
	  else if(isset($_POST['categoryList']))
	    {
	     
		 removeCategory($_POST['categoryList']);
	    }
	   
	   //removeCategoryFromName
	   
	   echo '<center><table width=80%>';
	   echo '<tr>';
	   
	   // Category List
	   echo '<td>';
	   $cat=getCategories();
	   echo '<form action="backendMappa.php" method="post">';
	   echo 'Categorie Presenti:<br><select id="listaCategorie" name="categoryList" id="category" size="8" onchange="enableDisableButtonDelCat();">';
	   foreach($cat as $k=>$v)
              echo '<option value="'.$k.'">'.$v['catName'].'</option>';
       echo '</select><br><input type="submit" value="Elimina" disabled>';
	   echo '</form>';
	   echo '</td>';
	   
	   // Insert new category
	   echo '<td>';
	   echo '<form action="backendMappa.php" method="post">';
	   echo '<br>Nuova Categoria: <input id="catName" type="text" name="catName" onkeydown="enableDisableButtonNewCat();">';
	   echo '<br>Immagine Pin: <input id="pin" name="pin" type="file" onkeydown="enableDisableButtonNewCat();">';
	   echo '<br>Descrizione: <input id="description" type="text" name="description" onkeydown="enableDisableButtonNewCat();">';
	   echo '<br><input type="submit" value="Inserisci" disabled >';
	   echo '</form>';
	   echo '</td>';
	   
	   // Insert new location
	   echo '<td>';
	   echo '<form action="backendMappa.php" method="post">';
	   echo '<br>Nuovo Partner (indirizzo): <input id="searchLoc" type="text" name="locName" onkeydown="enableDisableButtonNewLoc();">';
	   echo '<input type="submit" value="Inserisci" id="insertLoc" disabled >';
	   echo '</form>';
	   echo '</td>';
	   echo '</tr>';

	   echo '</table></center>';
       
	  ?>

	</body>
</html>