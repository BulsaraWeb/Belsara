
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
  jQuery.get('video.txt?id=123',function(data)
	{
	 if((data.replace(" ","")!="") && (window.location.pathname.indexOf("delete")==-1))
	   {
						  	
   		 var needle=data.indexOf("?v=")+3;
		 $("#youtube").html(  "<object width='200' height='150'><param name='movie' value=https://youtube.googleapis.com/v/" + data.substr(needle, needle + 11) + "?version=3&autoplay=1&color=white&fs=1" + "<param name='allowFullScreen' value='true'></param><param name='allowScriptAccess' value='always'></param>" + "<embed src=https://youtube.googleapis.com/v/" + data.substr(needle, needle + 11) + "?version=3&fs=1&autoplay=1&color=white&enablejsapi=1" + "  type='application/x-shockwave-flash'" + " allowscriptaccess='always'" + " width='200' height='150'></embed>" + "</object>").css("width", 200).css("height", 150);

	  }
							
	});
			
			
			

	$("#carica").click(function()
	 {
						// if((' input[type=text]').text()=="")						
 							// confirm("Immagine senza testo?");
 							
		$("#loading").css("width",$(document).width()).css("height",$(document).height()).css("float","left");
		$("#img_loading").css("width",$(document).width()).css("height",$(document).height());
	    $("#container").fadeOut("fast");
		$("#loading").fadeIn("fast");
	    // $("#loading").fadeIn("fast").dialog({  closeOnEscape: false, 					   
	   // open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog || ui).hide(); }
 	  // });
	// $("#container").animate({"":""});
				
	});
//----------------------------------------------------grafica file input-------------------------------------

(function($) {
    $.fn.prettyFileInput = function(options) {
        var defaults = {
            inputHolderClass: 'file-input',
            buttonClass: 'btn',
            additionalButtonClasses: 'btn-file-input',
            buttonActiveClass: 'btn-file-input-active',
            fakeFileHolderClass: 'file-holder',
          
            defaultText: 'Grande',
            defaultFileSelectedText: 'Pronta'

        };
        var options = $.extend(defaults, options);

        return this.each(function() {

            var obj = $(this);

            obj.wrap('<span class="' + options.inputHolderClass + '"></span>');
            obj.after('<span class="' + options.buttonClass + ' ' + options.additionalButtonClasses + '">' + options.defaultText + '</span>');

            obj.bind('change focus click', function() {

                $val = obj.val();

                valArray = $val.split('\\');
                newVal = valArray[valArray.length - 1];
                $button = obj.siblings('.' + options.buttonClass + '');
                $fakeHolder = obj.siblings('.' + options.fakeFileHolderClass + '');

                if (newVal !== '') {
                    $button.addClass(options.buttonActiveClass).html(options.defaultFileSelectedText);
                }

                if ($fakeHolder.length === 0) {
                    obj.parent().append('<span class="'+options.fakeFileHolderClass+'">' + newVal + '</span>');
                } else {
                    $fakeHolder.text(newVal);
                }

                if (($fakeHolder.length > 0) && (newVal === '')) {
                    $fakeHolder.remove();
                    //my edit luca
                    
                    $button.html(options.defaultText).removeClass().addClass(options.buttonClass + ' ' + options.additionalButtonClasses);
                }

            });
        });
    };
})(jQuery);
//----------------------------------------------------grafica file input-------------------------------------

(function($) {
    $.fn.prettyFileInput2 = function(options) {
        var defaults = {
            inputHolderClass: 'file-input',
            buttonClass: 'btn',
            additionalButtonClasses: 'btn-file-input',
            buttonActiveClass: 'btn-file-input-active',
            fakeFileHolderClass: 'file-holder',
          
            defaultText: 'Thumb &nbsp;',
            defaultFileSelectedText: 'Pronta'

        };
        var options = $.extend(defaults, options);

        return this.each(function() {

            var obj = $(this);

            obj.wrap('<span class="' + options.inputHolderClass + '"></span>');
            obj.after('<span class="' + options.buttonClass + ' ' + options.additionalButtonClasses + '">' + options.defaultText + '</span>');

            obj.bind('change focus click', function() {

                $val = obj.val();

                valArray = $val.split('\\');
                newVal = valArray[valArray.length - 1];
                $button = obj.siblings('.' + options.buttonClass + '');
                $fakeHolder = obj.siblings('.' + options.fakeFileHolderClass + '');

                if (newVal !== '') {
                    $button.addClass(options.buttonActiveClass).html(options.defaultFileSelectedText);
                }

                if ($fakeHolder.length === 0) {
                    obj.parent().append('<span class="'+options.fakeFileHolderClass+'">' + newVal + '</span>');
                } else {
                    $fakeHolder.text(newVal);
                }

                if (($fakeHolder.length > 0) && (newVal === '')) {
                    $fakeHolder.remove();
                    //my edit luca
                    
                    $button.html(options.defaultText).removeClass().addClass(options.buttonClass + ' ' + options.additionalButtonClasses);
                }

            });
        });
    };
})(jQuery);
//----------------------------------------------------grafica file input-------------------------------------


	//if($('input[type=file]').attr("class")!="btn_all")
	for(var i=1;i<6; i++)
	{
		$('#th_img'+i).prettyFileInput2();
		$('#img'+i).prettyFileInput();
	}
	// var colIndex = $(this).parent().children().index($(this));
  

	$("#carica").css("margin-left",($(document).width()-$(this).width())/2);

   // if (($("input[type=text]").attr("id").replace("title_img",""))=="")
  // $("input[id=text]").animate({"margin-left":"-=90px"},1000);
	
});//ready function
		</script>
   </head>
   <body>
   	<div id="loading" style="display:none; ">
   			
   				<img src="loading.gif" id="img_loading">
   				</div>
   				
   		<div id="container">
   	 	<?php 
   	error_reporting(E_ERROR | E_PARSE);
   			session_start();
			 if($_SESSION["user"]=="chief")       // if($_GET["id"]==hash("sha256","ok"))
   		{?>
   	<div style=" margin-top: 2%;" align="left"> <a href="join_us.php"<!--?id="<?php echo hash('sha256','ok'); ?>"--> >Gestione posizione aperta</a>
   	&nbsp;&nbsp; <a>Gestione Partner</a> &nbsp;&nbsp;<a href="indexLuca.php"> Index</a></div>
   	<div style=" margin-top: 2%;">
   	<?php 
   
	      		     	
      		 					 
   		  if(is_numeric($_GET["num"])&&($_GET["num"]>0)) //num photo
   			
   			echo '<script>alert("hai caricato con successo'.$_GET['num'].' foto");</script>';
   		 
		  else if(is_numeric($_GET["num"])&&$_GET["num"]==0)
   		  	echo '<script>alert(" errore caricamento foto (Ricorda: SOLO JPG)");</script>';
   	
   		 
		 if(isset($_GET["error"])&&($_GET["error"]=="true")) 
   			echo '<script>alert("errore upload file");</script>';
		  if(isset($_GET["video"])&&($_GET["video"]=="ok")) 
   			echo '<script>alert(" video caricato correttamente");</script>';
		   if(isset($_GET["delete"])&&($_GET["delete"]=="ok")) 
   			echo '<script>alert(" video cancellato correttamente");</script>';
		   
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
   		
   		  if(isset($_GET["delete"])&&($_GET["delete"]!="ok")) { ?>	
   		<form method="post"  action="delete.php"  >
   		
   		<input type="submit"  value="Elimina Video" id="delete" />
   		</form>
   			
   		<?php }?>
   		
   		<form method="post"  enctype="multipart/form-data" action="load_photo.php"  >
   		
   		<div align="center">
   			
   		<br><br>
   <table >
   		<tr>
	   		<td style="width: 300px">
	   		  <img src="backend_images/galleryThumb0.jpg?a=<?php echo time();?>" style="width: 100px; height:60px" /> 	
		  			<img src="backend_images/gallery0.jpg?a=<?php echo time();?>" style="width: 60%         ; height:60%         " />
		     
		   </td>
	   		<td  rowspan="1"  >		
	   					<input type="text" style="margin-top:22px;margin-left:-82px;"  id="title_img1"  name="title_img1" onclick="this.value=''" value="ratio 1.25 ">
			
			  		  <input id="img1" name="img1" type="file"><br>
		         
		   	      <input id="th_img1"    value="Thumb" name="th_img1" type="file">
	   		</td>
	   		
	   
   			<td style="width: 300px">		
		   		<img src="backend_images/galleryThumb1.jpg?a=<?php echo time();?>" style="width: 100px; height:60px" />
		   		<img src="backend_images/gallery1.jpg?a=<?php echo time();?>" style="width: 60%         ; height:60%         " />
		   	</td>
   		    <td rowspan="1"		    style="width:200px; height:150px;">		
				<input type="text" style="margin-top:22px;margin-left:-82px;"  id="title_img2" name="title_img2" onclick="this.value=''" value="ratio 1.25">
				
		   	    <input id="img2"  name="img2" type="file"><br>
		   	    
		   	    <input id="th_img2"     value="Thumb" name="th_img2" type="file">
   			</td>
   		
   		</tr>
   		
   		

   		<tr>
	   		<td style="width: 300px">		
		   		<img src="backend_images/galleryThumb2.jpg?a=<?php echo time();?>" style="width: 100px; height:60px" />
		   		<img src="backend_images/gallery2.jpg?a=<?php echo time();?>" style="width: 60%         ; height:60%         " />
		   </td>
	   		<td  rowspan="1"		   >		
				<input  type="text" style="margin-top:22px;margin-left:-82px;"   id="title_img3" name="title_img3" onclick="this.value=''" value="ratio 2.4 ">
				
		   	    <input id="img3"  name="img3" type="file"><br>
	   		    
		   	    <input id="th_img3"     value="Thumb" name="th_img3" type="file">
	   		
	   		</td>
	   		
	   
   			<td style="width: 300px">			
		   		<img src="backend_images/galleryThumb3.jpg?a=<?php echo time();?>" style="width: 100px; height:60px" />
		   		<img src="backend_images/gallery3.jpg?a=<?php echo time();?>" style="width: 60%         ; height:60%         " />
		   	</td>
   		    <td  rowspan="1"		    style="width:200px; height:150px; ">		
				<input type="text" style="margin-top:22px;margin-left:-82px;" id="title_img4" name="title_img4" onclick="this.value=''" value="ratio 3.65">
				
		   	    <input id="img4"  name="img4" type="file"><br>
		   	    	
		   	    <input id="th_img4"     value="Thumb" name="th_img4" type="file">
   			</td>
   		</tr>
   		<tr>
   		
		  <td style="width: 300px; ">			
		   		<img src="backend_images/galleryThumb4.jpg?a=<?php echo time();?>" style="width: 100px; height:60px" />
		   		<img src="backend_images/gallery4.jpg?a=<?php echo time();?>" style="width: 60%         ; height:60%         " />
		   	</td>
   		    <td rowspan="1"		    style="width:200px; height:150px; ">		
				<input type="text" style="margin-top:22px;margin-left:-82px;" id="title_img5" name="title_img5" onclick="this.value=''" value="ratio 1.25">
				
		   	    <input id="img5"  name="img5" type="file"><br>
		   	    <input id="th_img5"     value="Thumb" name="th_img5" type="file">
   			</td>   		
   			
   			<td rowspan="1"	>
   				   <input  type="submit" id="carica"  class="btn_all"  value="UPLOAD!" />
   			</td>
   		</tr>
   		
   		
  </table>   			
  <!-- <table>
   		<tr>
	   		<td>	
		   		<img src="backend_images/galleryThumb4.jpg?a=<?php echo time();?>" style="width: 100px; height:60px" />
		   		<img src="images/quinta.png" style="width: 100px; height:60px"/>  
	   		</td>
	   		<td align="center"width="35%" rowspan="3"		   >		
				<input type= "text" id="title_img5" style="margin-left: -50%"  name="title_img5" onclick="this.value=''" value="titolo ">
				</br>
		   	    <input id="img5" name="img5" type="file">
	   		</td>
   			<td>			
		   		<img src="backend_images/galleryThumb5.jpg?a=<?php echo time();?>" style="width: 100px; height:60px" />
		   		<img src="images/sesta.png" style="width: 100px; height:60px"/> 
		   	</td>
   		    <td align="center"rowspan="3"		    width="">		
				<input type= "text" id="title_img6" name="title_img6" onclick="this.value=''" value="titolo">
				</br>
		   	    <input id="img6" name="img6" type="file">
   			</td>
   		
   		</tr>
   		
   		
  </table>   		
   <table>
   		<tr>
	   		<td align="center">		
		   		<img src="backend_images/galleryThumb6.jpg?a=<?php echo time();?>" style="width: 100px; height:60px" />
		   		 <img src="images/settima.png" style="width: 100px; height:60px"/>  
	   		</td>
	   		<td align="center"width="35%" rowspan="3"		   >		
				<input type= "text" style="margin-left: -50%"  id="title_img7" name="title_img7" onclick="this.value=''" value="titolo ">
				</br>
		   	    <input id="img7"  name="img7" type="file">
	   		</td>
   			<td>			
		   		<img src="backend_images/galleryThumb7.jpg?a=<?php echo time();?>" style="width: 100px; height:60px" />
		   		<img src="images/ottava.png" style="width: 100px; height:60px"/> 
		   	</td>
   		    <td align="center"rowspan="3"		    width="">		
				<input type= "text"  id="title_img8" name="title_img8" onclick="this.value=''" value="titolo">
				</br>
		   	     <input id="img8" name="img8" type="file">
   			</td>
   		
   		</tr>
   		
   		
  </table> -->
  	
   			
   		  
   		
   		</div>	
   	
   		
   		</form>
   		
   	
   		
   		</div>
   	</div>
 </div> 
   		<?php 
				

						
				}//if sono davvero admin
				
				else header("location:login.php");
				
   		
   		 ?>
   
   		
   </body>