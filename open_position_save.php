<?php
 mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
			mysql_select_db("Sql634189_1");
			// Check connessione
			// if (mysql_connect_errno($con))
			  // {
			  // echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  // }
			  
					
			 $result= mysql_query("UPDATE  BulsaraAdmin SET posizione_aperta =".$_POST["descrizione"]);
			 $num=mysql_numrows($result);

					mysql_close();
					
					
					$i=0;
					while ($i < $num) 
					{
					
							$field=mysql_result($result,$i,"posizione_aperta");
							
		
							$i++;
					}
					
				


?>