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
		<!--<script type="text/javascript" src="jscolor/jscolor.js"></script>-->
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
		<script>
		
		var actualCatSelected=-1;
		
		function checkForm()
		          {
		           if($('#changePin').is(':checked'))
		             {
		              var str=$("#catPin").val();
		              if(str!="" && (str.indexOf(".png")==str.length-4 || str.indexOf(".PNG")==str.length-4))
		                {
		                 $("#loading").css("display","block"); 
		                 return true;
		                }
		              else
		                {		            
		                 alert("Hai selezionato un'immagine non .png");
		                 $("#loading").css("display","none");
    		             return false;
		                }
		             }
		           $("#loading").css("display","block");
		           return true;  
		          }
		          
		function handleFileManager()
		          {
		           if($('#changePin').is(':checked')) 
					  $("#fileManager").css("display","block");
				   else 
					  $("#fileManager").css("display","none");
		          }
		
		function checkNew(focused)
		          {
                   focused.css("background-color","#BBFFFF");	
		          };
		          
		    
		
		function enableForm()
		          {
		          	
		          	  $("#pin"+actualCatSelected).css("display","none");
		          	  $('input[name=catDescr]').val("");
		          	  $('input[name=catName]').val("");
		          	  $('input[name=catNumber]').val("");
		          	  $('input[name=catDescr]').attr("disabled", "disabled");
		          	  $('input[name=catName]').attr("disabled", "disabled");
		          	  $('input[name=catNumber]').attr("disabled", "disabled");
		          	  $('input[name=changePin]').attr("disabled", "disabled");
		          	  $('input[name=catPin]').attr("disabled", "disabled");
	
		          	  $('input[name=catDescr]').css("background-color","#FFFFFF");
		          	  $('input[name=catName]').css("background-color","#FFFFFF");
		          	  $('input[name=catNumber]').css("background-color","#FFFFFF");
		          	  
	                if($('#listaCategorie').val()<=0)
	                  {
	                   $('input[value=Modifica]').attr("disabled", "disabled");;
	                   return;
	                   actualCatSelected=-1;
	                  } 
	                actualCatSelected=$('#listaCategorie').val();
	                $('input[value=Modifica]').removeAttr("disabled");
	                $('input[name=catDescr]').removeAttr("disabled");
		          	$('input[name=catName]').removeAttr("disabled");
		          	$('input[name=catNumber]').removeAttr("disabled");
		          	$('input[name=changePin]').removeAttr("disabled");
		          	$('input[name=catPin]').removeAttr("disabled");
	                //alert(actualCatSelected);
	                $("#pin"+actualCatSelected).css("display","block");
	                $('input[name=catDescr]').val($("#cat"+actualCatSelected).attr("title"));
	                $('input[name=catName]').val($("#listaCategorie option[value='"+actualCatSelected+"']").text());
	                $('input[name=catNumber]').val($("#num"+actualCatSelected).text());
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
	  
	   
	   if(is_numeric($_GET["err"])&&($_GET["err"]>0))
	      echo '<center>Modifica non avvenuta: immagine caricata non PNG</center><br><br>';
	   
	   
	   
	   // Category List
	   $cat=getCategories();
	   ?>
	   <center>
	   	<form action="backendCategoryController.php" method="post" enctype="multipart/form-data" onSubmit="return checkForm()">
	   	 <table width="80%">
	   	  <tr>
	   	   <td>
	   	    Categorie <br>Presenti:<br>
	   	    <?php
	   	    foreach($cat as $k=>$v)
		              echo '<div id="num'.$k.'" style="display: none;">'.$v['number'].'</div>'
		     ?>
		     
	   	    <select id="listaCategorie" name="categoryList" id="category" size="8" onchange="enableForm();">
		   	 
		   	  <?php
		   	  
			   foreach($cat as $k=>$v)
		              echo '<option id="cat'.$k.'" value="'.$k.'" title="'.$v['description'].'">'.$v['catName'].'</option>';
		   		?>
       	    </select>
       	   </td>
       	   <td>
            Nome Categoria:
            <br>
            <input id="catName" type="text" name="catName" onkeydown=" checkNew($(this));" disabled>
            <br><br>
	  	    Sottotitolo Categoria:
	  	    <br><input id="catDescr" type="text" name="catDescr" onchange="checkNew($(this));" onkeydown="checkNew($(this));" disabled>
	   	   </td>
	   	   <td>
	   	   	Immagine Pin (attuale:)
		    <?php
			  foreach($cat as $k=>$v)
				      echo '<img id="pin'.$k.'" src="'.$v['pinPath'].'" style="display: none;"/>';			         
			?><br>
			<input type="checkbox" id="changePin" name="changePin" value="changePin" onchange='handleFileManager();' disabled>(cambia:)<br><br>
			<div id="fileManager" style="display: none">
	   		 <input id="catPin" value="clicca per modificare" name="catPin" type="file" disabled>  <!-- onchange="checkNew($(this));" onkeydown="checkNew($(this));">-->
	  	    </div>
	  	     <br><br>
            Numero:<br>
            <input id="catNumber" type="text" name="catNumber" onchange="checkNew($(this));" onkeydown="checkNew($(this));" disabled>
	  	    <!--<br><br>
	  	    Color:<br>
	  	    <input id="catColor" type="text" name="catColor" onfocus="if($(this).val=='FFFFFF') $('input[value=Inserisci]').attr('disabled', 'disabled'); else  " class="color">-->
	   	   </td>
	   	   
	   	  </tr>
	   	 </table>
        <br>
        <!--<input type="submit" value="Elimina" disabled>-->
        <img id="loading" src="loading.gif" style="display: none;" /> <br>
	    <input type="submit" value="Modifica" disabled>
	    
	   </form>
	   
	   <br><br><br><br><br><br>
	   <!-- Insert new location -->
	   
	   <form action="backendMappa.php" method="post">
	    <br>Nuovo Partner (indirizzo): <input id="searchLoc" type="text" name="locName" onkeydown="enableDisableButtonNewLoc();">
	    <input type="submit" value="Inserisci" id="insertLoc" disabled >
	   </form>
	   

	  </center>
       
	  

	</body>
</html>