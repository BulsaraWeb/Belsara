<?php








 function get_titles()
{
	

				$conn= mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
				mysql_select_db("Sql634189_1",$conn);
				// Check connessione
				// if (mysql_connect_errno($con))
				  // {
				  // echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  // }
			    $return=array();
			    $result=mysql_query("SELECT * FROM gallery");
					
				$i=0;
				while($row = mysql_fetch_array($result))
				  {
				  	
						for($j=0; $j<8; $j++)
						$return[$j]= $row['gallery_title'.$j];
						
						
						$i++;
				  }
				
				mysql_close();
				
				return $return;
					
				 
				
}

?>