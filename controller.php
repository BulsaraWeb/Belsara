<?php






		if(isset($_POST['username'])&&isset($_POST['password']))
		   {
		   	
			$input_login=$_POST['username'];
			$input_password= hash("sha256", $_POST['password']);
			$param=hash("sha256", "ok");
            //connessione mysql
      	
            mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
			mysql_select_db("Sql634189_1");
			// Check connessione
			// if (mysql_connect_errno($con))
			  // {
			  // echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  // }
			  
					
			 $result= mysql_query("SELECT password FROM BulsaraAdmin WHERE username = 'admin'");
			 $num=mysql_numrows($result);

					mysql_close();
					
					
					$i=0;
					while ($i < $num) 
					{
					
							$field=mysql_result($result,$i,"password");
							
		
							$i++;
					}

				
				
			   if ($input_password == $field) 
			     {
			     	
					//$_SESSION["user"]="chief";
			        session_start();
			     	// session_register("chief",$_SESSION["user"]);
					 mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
					 mysql_select_db("Sql634189_1");
								
			        $_SESSION["user"]="chief";
					 $result= mysql_query("SELECT posizione_aperta FROM BulsaraAdmin ");
					 $num=mysql_numrows($result);

					mysql_close();
					
					
					$i=0;
					
					while ($i < $num) 
					{
					
							$field=mysql_result($result,$i,"posizione_aperta");
							
		
							$i++;
					}
					
					
				    $_SESSION["position_open"]=$field;
					 header("location: http://www.bulsara.it/newSite/backend.php");
				     exit();
				  
				 }
			   else 
			   	{
			   		 header("location:login.php?error=true");
					 exit();
				}
			
			
				// mysql_close();	  

	  		
	      }

      
		  
		      
	
	


?>