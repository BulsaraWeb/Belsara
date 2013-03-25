<?php


	if(file_exists("video.txt"))
	  {	file_put_contents("video.txt", " ");
		header("location:backend.php?delete=ok");		
	  }
	else
		;

?>