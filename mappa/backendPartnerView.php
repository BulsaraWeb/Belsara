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
		<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>-->
		<script>
		
		 //<![CDATA[
    var map;
    var customIcons = {
      restaurant: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      bar: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      }
    };

    function load() {
     
        map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(47.6145, -122.3418),
        zoom: 13,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      	
      downloadUrl("backendCityMapController.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
          var type = markers[i].getAttribute("category_exkey");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>" + address;
          var icon = markers[i].getAttribute("pinPath");
          
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: "http://www.bulsara.it/newSite/mappa/"+icon,
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send();
    }

    function doNothing() {}

	function modifyPartnerList(idCat) 
	{
     
	 var url="backendCityMapController.php";
	 
	 if(idCat!="All")
	   {
	   	url+="?idCat="+idCat;
	   	// Enable Disable Add / Del
	   }
	 else
	   {
	   	// Enable Disable Add / Del
	   }
	    
	 downloadUrl(url, function(data)
	   {
	    var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
 	    $("#partnerList").empty();
 	    $("#partnerInfos").html(" ");
        for (var i = 0; i < markers.length; i++) 
           {
           	var option = $('<option></option>').attr("value", markers[i].getAttribute("idpar"))
           									   //.attr("id", markers[i].getAttribute("id"))
           	                                   .text(markers[i].getAttribute("name"));
            $("#partnerList").append(option);
            var divNum = "<div id='num"+markers[i].getAttribute("par")+"' style='display: none;'>"+markers[i].getAttribute("number")+"</div>";
            var divAddress = "<div id='address"+markers[i].getAttribute("par")+"' style='display: none;'>"+markers[i].getAttribute("address")+"</div>";
           	var img="<img id='fotoNo'>";
            if(markers[i].getAttribute("fotoPath")!="null" && markers[i].getAttribute("fotoPath")!=null)
               img='<img id="foto'+markers[i].getAttribute("idpar")+'" src="'+markers[i].getAttribute("fotoPath")+'" style="display: none;"/>';
           	$("#partnerInfos").html($("#partnerInfos").html()+divNum+divAddress);
           	$("#FotoView").html($("#FotoView").html()+img)
           	
           }
         deselectPartner();
       });
	}
    //]]>
           	
          



		
		var actualCatSelected=-1;
		var actualParSelected=-1;
		
		function setLatLng(address) 
		        {
                 var geocoder = new google.maps.Geocoder(); 
                 $("#LOAD_COORD").css("display","block");
		         geocoder.geocode
		            ({
			 	      address : address, 
				      region: 'no' 
			         },function(results, status) 
		                      {
		                       $("#LOAD_COORD").css("display","none");
		    	               if(status.toLowerCase() == 'ok')
		    	                 {
					              // Get center
					              var coords = new google.maps.LatLng
					                     (
						                  results[0]['geometry']['location'].lat(),
						                  results[0]['geometry']['location'].lng()
					                     );
					              $("#parLat").val(coords.lat());
					              $("#parLng").val(coords.lng());
					              
					              //jQuery('#coords').html('Latitute: ' + coords.lat() + '    Longitude: ' + coords.lng() );
                                  map.setCenter(coords);
					              map.setZoom(18);
 
					              // Set marker also
					              marker = new google.maps.Marker
					                      ({
						                    position: coords, 
						                    map: map, 
						                    title: address,
					                      });
					              $("#OK").css("display","block");
					              $("#ERROR").css("display","none");
		    	                 }
		    	               else
		    	                 {
		    	                  $("#OK").css("display","none");
					              $("#ERROR").css("display","block");	
		    	                 }
			                  });
	               }
		
		
		function checkForm()
		          {
		          	$("#OK").css("display","none");
					$("#ERROR").css("display","none");
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
		          
		function handleAddressManager()
		          {
		           if($('#changeAddress').is(':checked')) 
					  $("#addressManager").css("display","block");
				   else 
					  $("#addressManager").css("display","none");
		          }
		          
		function handleFileManager()
		          {
		           $("#OK").css("display","none");
				   $("#ERROR").css("display","none");
		           if($('#changeFoto').is(':checked')) 
					  $("#fileManager").css("display","block");
				   else 
					  $("#fileManager").css("display","none");
		          }
		
		function checkNew(focused)
		          {
                   focused.css("background-color","#BBFFFF");	
		          };
		          
		    
		function deselectPartner()
		          {
		          	actualParSelected=-1;
		          	  $("#OK").css("display","none");
				      $("#ERROR").css("display","none");
		          	  $('input[name=parName]').val("");
		          	  $('input[name=parNumber]').val("");
		          	  $("#actualAddress").html("");
		          	  $('input[name=parName]').css("background-color","#FFFFFF");
		          	  $('input[name=parNumber]').css("background-color","#FFFFFF");
		          	  $('input[name=changeAddress]').attr("disabled","disabled");
		          	  $('input[name=parAddress]').attr("disabled","disabled");
		          	  $('input[name=parCheckAddress]').attr("disabled","disabled");
		          	  $('input[name=parName]').attr("disabled","disabled");
		          	  $('input[name=parNumber]').attr("disabled","disabled");
		          	  $('input[name=changeFoto]').attr("disabled", "disabled");
		          	  $('input[name=parFoto]').attr("disabled", "disabled");
		          	  
		          	  
		          }
		
		function enableForm()
		          {
		          	$("#OK").css("display","none");
				   $("#ERROR").css("display","none");
		           //$("#pin"+actualParSelected).css("display","none");
		          $("#foto"+actualParSelected).css("display","none");
		          	  $('input[name=parName]').val("");
		          	  $('input[name=parNumber]').val("");
		          	  $('#actualAddress').html(" ");
		          	  $('input[name=changeAddress]').attr("disabled","disabled");
		          	  $('input[name=parAddress]').attr("disabled","disabled");
		          	  $('input[name=parName]').attr("disabled","disabled");
		          	  $('input[name=parNumber]').attr("disabled","disabled");
		          	  $('input[name=parCheckAddress]').attr("disabled","disabled");
		          	  $('input[name=parName]').css("background-color","#FFFFFF");
		          	  $('input[name=parNumber]').css("background-color","#FFFFFF");
		          	  
	                if($('#partnerList').val()<=0)
	                  {
	                   $('input[value=Modifica]').attr("disabled", "disabled");;
	                   return;
	                   actualParSelected=-1;
	                  } 
	                actualParSelected=$('#partnerList').val();
	                $('input[value=Modifica]').removeAttr("disabled");
	                
		          	$('input[name=parName]').removeAttr("disabled");
		          	$('input[name=parNumber]').removeAttr("disabled");
		          	$('input[name=changeAddress]').removeAttr("disabled");
		          	$('input[name=parAddress]').removeAttr("disabled");
		          	$('input[name=changeFoto]').removeAttr("disabled");
		          	$('input[name=parFoto]').removeAttr("disabled");
	                $('#parCheckAddress').removeAttr("disabled");
	                $("#foto"+actualParSelected).css("display","block");
	                
	                $('input[name=parName]').val($("#partnerList option[value='"+actualParSelected+"']").text());
	                $("#actualAddress").html($("#address"+actualParSelected).html());
	                $('input[name=parNumber]').val($("#num"+actualParSelected).html());
	                
		          };
		          

		          
		          
		function initialize() 
		          {
		 		   input = document.getElementById('parAddress');
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
												  //alert(place.geometry.location);
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
				 load();
				 
				 actualCatSelected=-1;
				 actualParSelected=-1;
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
	   $par=getMarkers();
	   ?>
	   <center>
	   	<form action="backendPartnerController.php" method="post" enctype="multipart/form-data" onSubmit="return checkForm()">
	   	 <table width="85%">
	   	  <tr>
	   	   <td>
	   	    Categorie <br>Presenti:<br>
	   	    
		     
	   	    <select id="listaCategorie" name="categoryList" id="category" size="7" onchange="modifyPartnerList($(this).val());">
		   	 
		   	  <?php		   	  
		   	   echo '<option id="catAll" value="All" title=":: All ::" selected="selected">All</option>';
			   foreach($cat as $k=>$v)
		              echo '<option id="cat'.$k.'" value="'.$k.'" title="'.$v['description'].'">'.$v['catName'].'</option>';
		   		?>
       	    </select>
       	   </td>
       	   <td>
       	   	Partner per<br>
       	   	categoria:<br>
       	   	<?php
       	   	echo '<div id="partnerInfos">';
	   	    foreach($par as $k=>$v)
		              {
		              	echo '<div id="num'.$k.'" style="display: none;">'.$v['number'].'</div>';
						echo '<div id="address'.$k.'" style="display: none;">'.$v['address'].'</div>';
					  }
		    echo '</div>';
		     ?>
       	   	<select id="partnerList" name="partnerList" id="category" size="8" onchange="enableForm();">
		   	  <?php
			   foreach($par as $k=>$v)
		              echo '<option id="par'.$k.'" value="'.$k.'">'.$v['name'].'</option>';
		   		?>
       	    </select>
       	   </td>
       	   <td>
       	   	Nome Partner:
       	   	<br>
            <input id="parName" type="text" name="parName" onkeydown=" checkNew($(this));" disabled><br>
            Indirizzo (attuale:)<br>
            <div id="actualAddress"> </div><br>
            <input type="checkbox" id="changeAddress" name="changeAddress" value="changeAddress" onchange='handleAddressManager();' disabled>(cambia:)<br><br>
			<div id="addressManager" style="display: none">
			 <img id="LOAD_COORD" src="loading.gif" style="display: none; width: 30px; height: 30px;" />	
			 <img id="OK" src="Check.png" style="display:none; width: 30px; height: 30px;">
			 <img id="ERROR" src="Error.png" style="display:none; width: 30px; height: 30px;">	
	   		 <input id="parAddress" placeholder="digita un indirizzo" name="parAddress" onchange='setLatLng($(this).val());' disabled>
	   		 <input id="parCheckAddress" type="button" value="set" onclick='setLatLng($("#parAddress").val());' disabled>  <!-- onchange="checkNew($(this));" onkeydown="checkNew($(this));">-->
	   		 
	  	    </div>
       	   </td>
       	   <td>
       	   	Number Partner:
       	   	<br>
            <input id="parNumber" type="text" name="parNumber" onkeydown=" checkNew($(this));" disabled>
       	   </td>
	   	   <td>
	   	   	<div id="map" style="width: 300px; height: 300px"> </div>
	   	   </td>
	   	  </tr>
	   	  <tr>
           <td>
           	<input id="parLat" type="text" name="parLat"><!-- style="display: none;"><br>--></br>
           	<input id="parLng" type="text" name="parLng"><!-- style="display: none;"><br>--></br>
           </td>
           <td>
           </td>
           <td colspan="3" id="FotoView">
           	Immagine Dettaglio (attuale:)
		    <?php
			  foreach($par as $k=>$v)
				      echo '<img id="foto'.$k.'" src="'.$v['fotoPath'].'" style="display: none;"/>';			         
			?><br>
			<input type="checkbox" id="changeFoto" name="changeFoto" value="changeFoto" onchange='handleFileManager();' disabled>(cambia:)<br><br>
			<div id="fileManager" style="display: none">
	   		 <input id="parFoto" value="clicca per modificare" name="parFoto" type="file" disabled>  <!-- onchange="checkNew($(this));" onkeydown="checkNew($(this));">-->
	  	    </div>
           </td>   	  
	   	  </tr>
	   	 </table>
        <br>
        <!--<input type="submit" value="Elimina" disabled>-->
        <img id="loading" src="loading.gif" style="display: none;" /> <br>
	    <input type="submit" value="Modifica" disabled>
	    
	   </form>
	  
	   

	  </center>
       
	  

	</body>
</html>