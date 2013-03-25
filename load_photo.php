<?php

include ('image.php');
		$how_much=0;
		$width=80;
		$height=60;
		for ( $i=1; $i<9; $i++)
		{
			
		}
		
		
		for ( $i=1; $i<9; $i++)
		{
			
				
			
			if(strstr($_FILES['img'.$i]['name'],".jpg"))/*||strstr($_FILES['img'.$i]['name'],".JPG")||strstr($_FILES['img'.$i]['name'],".jpeg")||strstr($_FILES['img'.$i]['name'],".JPEG"))*/
			{
				//if(file_exists($_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg"))
				
				 if(unlink($_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg"));
				 else header("location:backend.php?error=true");
				if(move_uploaded_file($_FILES['img'.$i]['tmp_name'],$_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg"))
					
					{
						$size = getimagesize($_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg");
						if($size[0]>$width && $size[1]>$height)
					      {
					      	
								$file=$_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg";
					      		$save=$_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg";
					      		
					      		list($width, $height) = getimagesize($file) ;
								
								$modwidth = 980;
								
								$modheight = 600;
								
								$tn = imagecreatetruecolor($modwidth, $modheight) ;
								
								$image = imagecreatefromjpeg($file) ;
								
								imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;
								
								imagejpeg($tn, $save, 100);

						  }
						//chmod($_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg", 0755);
						$how_much++;
						
					 }
				
				/*if (is_uploaded_file($_FILES['img'.$i]['tmp_name']))
				{
					
					list($width, $height, $type, $attr) = getimagesize($_FILES['img'.$i]['tmp_name']);
				    // // Controllo che le dimensioni (in pixel) non superino 160x180
				    // if (($width > 980) || ($height > 400)) {
				      // $msg = "<p>Dimensioni non corrette!!</p>";
				      // break;
				    // }
				    // Controllo che il file sia in uno dei formati GIF, JPG o PNG
				    // if (($type!=1) && ($type!=2) && ($type!=3)) 
				    // {
				      // $msg = "<p>Formato non corretto!!</p>";
				      // break;
				    // }
				  
				
				}
					
				else 
				{
				   header("location:indexLuca.html");	
				}
				*/
				
				
			}
			
       
		}
		 header("location:backend.php?num=".$how_much);
		 
	
	
?>