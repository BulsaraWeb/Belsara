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

				
				echo $input_password;
			   if ($input_password == $field) 
			     {
			     	session_start();
			     	session_register("chief",$_SESSION["user"]);
			
			       if(session_start())
				   $_SESSION['user']="chief"; 
				    
				   else echo $_SESSION['user'];
				    header("location: http://www.bulsara.it/newSite/backend.php?id=".$param);
				  }
			   else  header("location:login.php?error=true");
			
			
				// mysql_close();	  

	  		
	      }

      
		  
		      
	
	


?>