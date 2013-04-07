<?php

require ('SimpleImage.php');
		$how_much=0;
		$width=245;
		$height=200;
			
		
		
		
		for ( $i=1; $i<9; $i++)
		{
			
			if(strstr($_FILES['th_img'.$i]['name'],".jpg"))/*||strstr($_FILES['img'.$i]['name'],".JPG")||strstr($_FILES['img'.$i]['name'],".jpeg")||strstr($_FILES['img'.$i]['name'],".JPEG"))*/
			{
				
				 if(unlink($_SERVER["DOCUMENT_ROOT"]."/newSite/galleryThumb".$i.".jpg"));
				
				 // else
// 				 	
					 // header("location:backend.php?error=true");
// 				
				if(move_uploaded_file($_FILES['th_img'.$i]['tmp_name'],$_SERVER["DOCUMENT_ROOT"]."/newSite/galleryThumb".$i.".jpg"))	
					{
					}
					
			}
		}
				
			
			if(strstr($_FILES['img'.$i]['name'],".jpg"))/*||strstr($_FILES['img'.$i]['name'],".JPG")||strstr($_FILES['img'.$i]['name'],".jpeg")||strstr($_FILES['img'.$i]['name'],".JPEG"))*/
			{
				
				 if(unlink($_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg"));
				
				 // else
// 				 	
					 // header("location:backend.php?error=true");
// 				
				if(move_uploaded_file($_FILES['img'.$i]['tmp_name'],$_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg"))	
					{
						
						$size = getimagesize($_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg");
						// if($size[0]>$width && $size[1]>$height)
					      // {
					      	/*
								$file=$_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg";
					      		
					      		$save=$_SERVER["DOCUMENT_ROOT"]."/newSite/gallery".$i.".jpg";
					      		
					      		$saveThumb=$_SERVER["DOCUMENT_ROOT"]."/newSite/galleryThumb".$i.".jpg";
					      		
					      		list($width, $height) = getimagesize($file) ;

								$modwidth = 980;
								
								$modheight = 500;
								
								$Thumbwidth = 245;
								
								$Thumbheight = 200;
								
								$tn = imagecreatetruecolor($modwidth, $modheight) ;
								
								$image = imagecreatefromjpeg($file) ;
								
							
								imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;
		
								imagejpeg($tn, $save, 100);
								
								
								$tnThumb = imagecreatetruecolor($Thumbwidth, $Thumbheight) ;
								
								$imageThumb = imagecreatefromjpeg($file) ;
								
								
								imagecopyresampled($tnThumb, $image, 0, 0, 0, 0, $Thumbwidth, $Thumbheight, $width, $height) ;
								
								
								imagejpeg($tnThumb, $saveThumb, 100);
							
			
							*/
						       $how_much++;

						       if(!isset( $_POST['title_img'+$i]))
							   
							   	  $title="";
							   else
							      $title= $_POST['title_img'+$i];
							   $conn= mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
								mysql_select_db("Sql634189_1",$conn);
								// Check connessione
								// if (mysql_connect_errno($con))
								  // {
								  // echo "Failed to connect to MySQL: " . mysqli_connect_error();
								  // }
				  
						       
				   				 mysql_query("UPDATE  gallery SET gallery_title".$i." = ' " . $_POST["title_img" . $i ] . " ' " );
				 
							   mysql_close();
							  				
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
			
       
		//}
		 header("location:backend.php?num=".$how_much);
		 
	
	
?>