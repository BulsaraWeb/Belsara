<?php
$conn= mysql_connect("62.149.150.181","Sql634189","7d4c6b35");

			mysql_select_db("Sql634189_1",$conn);
			// Check connessione
			// if (mysql_connect_errno($con))
			  // {
			  // echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  // }
			  
					
			     mysql_query("UPDATE  BulsaraAdmin SET posizione_aperta ='".$_POST["descrizione"]."'");
			 

					mysql_close();
					session_start();
					$_SESSION["position_open"]=$_POST["descrizione"];
					file_put_contents("posizione_aperta.txt", $_SESSION['position_open']);
					header("location:join_us.php?joined=true");
					exit();
	

?>