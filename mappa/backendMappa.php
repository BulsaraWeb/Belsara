<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Bulsara</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<link type="text/css" rel="stylesheet" href="style.css" />
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<script>
		$(document).ready(function() 
				{
				 
				});
		</script>
		</head>
	<body>
	 <?php
	   echo '<select name="categoryList" id="category" size="8" multiple="multiple">';
	   require("markerModel.php");
	   $cat=getCategories();
	   foreach($cat as $k=>$v)
              echo '<option value="'.$k.'">'.$v.'</option>';
       echo '</select>';
	  ?>

	</body>
</html>