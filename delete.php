<?php


	if(file_exists("video.txt"))
	  {
	  	$conn= mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
				mysql_select_db("Sql634189_1",$conn);
				// Check connessione
				// if (mysql_connect_errno($con))
				  // {
				  // echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  // }
				  
						
				     mysql_query("UPDATE  BulsaraAdmin SET video_link =' '");
				 
					file_put_contents("video.txt"," ");
					mysql_close();
		
			file_put_contents("video.txt", " ");
		header("location:backend.php?delete=ok");		
	  }
	else
		;

?>