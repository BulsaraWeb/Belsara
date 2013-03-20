<?php
		$how_much=0;
		for ( $i=1; $i<9; $i++)
		{
			
		}
		
		
		for ( $i=1; $i<9; $i++)
		{
			
				
			
			if((strstr($_FILES['img'.$i]['name'],".jpg")))
			{
				//if(file_exists($_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg"))
				
				 unlink($_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg");
				if(move_uploaded_file($_FILES['img'.$i]['tmp_name'],$_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg"))
					
					{
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
		 header("location:backend.php?id=".hash("sha256","ok")."&num=".$how_much);
		 
		
?>