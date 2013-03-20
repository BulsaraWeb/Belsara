
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Login</title>
			<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		

	</head>
	<body>
		<?php
		   if(isset($_GET['error'])&&($_GET['error']==true))

			   {
			   	 echo '<label style="text-color:red">Username o password errati</label>';

			   }
		?>
		
		<form action="controller.php" method="post" >
			<div style="margin-top:20%" align="center">
				
				<input name="username" type="text" placeholder="username"  />
				<input name ="password" id="password" type="password" placeholder="password" />
				<!--onclick="$('#password').val($.sha1($('#password').val())); "-->
				<input type="submit" value="Login"   />
			</div>	
		</form>
		
	</body>
</html>
