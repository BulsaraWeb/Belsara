<?php


// descrizione separa mumero

// ogni categoria ha un proprio colore e un rettangolo (png piccola)

// una foto (png) nome e un numero

function updateCategory($id, $updateList)
   {
   	
    // Opens a connection to a MySQL server
    $connection=mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
    if(!$connection) 
      {
       die('Not connected');
       return;
      }

    // Set the active MySQL database
    $db_selected = mysql_select_db("Sql634189_1");
    if(!$db_selected) 
      {
       die('DB not found');
       return;
      }


	$query = "UPDATE category
			  SET ";
			  		  
	
	
	
			  
	$keys=array_keys($updateList);
	
	
	for($i=0; $i<sizeof($keys); $i++)
	   {
		$k=$keys[$i];
	   	$query=$query.$k."='".$updateList[$k]."'";
		if($i+1!=sizeof($keys))
		   $query=$query.", ";
	   }
	$query.=" WHERE id='".$id."' ";			  
	
			  
			  
    // Select all the rows in the markers table
    //$query ="INSERT INTO category (catName, pinPath, description, number, color, rectPath) VALUES ('".$cat."','".$pin."','".$description."','".$number."','".$color."','".$pathRect."') ";

    
   
    $result = mysql_query($query);
	
	
	
	 mysql_close($connection);
    }

//_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
   
//-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


function addCategory($cat, $pin, $description, $number, $color, $pathRect)
   {
   	
    // Opens a connection to a MySQL server
    $connection=mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
    if(!$connection) 
      {
       die('Not connected');
       return;
      }

    // Set the active MySQL database
    $db_selected = mysql_select_db("Sql634189_1");
    if(!$db_selected) 
      {
       die('DB not found');
       return;
      }

    // Select all the rows in the markers table
    $query ="INSERT INTO category (catName, pinPath, description, number, color, rectPath) VALUES ('".$cat."','".$pin."','".$description."','".$number."','".$color."','".$pathRect."') ";

    
   
    $result = mysql_query($query);
	
	 mysql_close($connection);
    }

    
//_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
   
//-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_
        

function removeCategory($cat)
   {
   	
    // Opens a connection to a MySQL server
    $connection=mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
    if(!$connection) 
      {
       die('Not connected');
       return;
      }

    // Set the active MySQL database
    $db_selected = mysql_select_db("Sql634189_1");
    if(!$db_selected) 
      {
       die('DB not found');
       return;
      }

    // Select all the rows in the markers table
    $query ="DELETE FROM category WHERE id=".$cat." ";

    
   
    $result = mysql_query($query);
	
	 mysql_close($connection);
    }

//_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
   
//-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_
	

function getCategories()
   {
   	
    // Opens a connection to a MySQL server
   $connection=mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
   if(!$connection) 
     {
      die('Not connected');
      return;
     }

   // Set the active MySQL database
   $db_selected = mysql_select_db("Sql634189_1");
   if(!$db_selected) 
     {
      die('DB not found');
      return;
     }

   // Select all the rows in the markers table
   $query = "SELECT * FROM category WHERE 1";
   $result = mysql_query($query);

   $ret=array();
   while($row = @mysql_fetch_assoc($result))    
        {
 	 	 $ret[$row['id']]=$row;
	    }
	mysql_close($connection);
	return $ret;
   }

   
//_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
   
//-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


function getCities()
   {
   	
    // Opens a connection to a MySQL server
   $connection=mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
   if(!$connection) 
     {
      die('Not connected');
      return;
     }

   // Set the active MySQL database
   $db_selected = mysql_select_db("Sql634189_1");
   if(!$db_selected) 
     {
      die('DB not found');
      return;
     }

   // Select all the rows in the markers table
   $query = "SELECT * FROM city WHERE 1";
   $result = mysql_query($query);

   $ret=array();
   while($row = @mysql_fetch_assoc($result))    
        {
 	 	 $ret[$row['id']]=$row;
	    }
	mysql_close($connection);
	return $ret;
   }
   
//_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
   
//-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_
   
function getCategory($id)
   {
   	
    // Opens a connection to a MySQL server
   $connection=mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
   if(!$connection) 
     {
      die('Not connected');
      return;
     }

   // Set the active MySQL database
   $db_selected = mysql_select_db("Sql634189_1");
   if(!$db_selected) 
     {
      die('DB not found');
      return;
     }

   // Select all the rows in the markers table
   $query = "SELECT * FROM category WHERE id=".$id;
   $result = mysql_query($query);

   $ret=array();
   
   while($row = @mysql_fetch_assoc($result))    
        {
 	 	 $ret[$row[0]]=$row;
	    }
	mysql_close($connection);
	if(len($ret)>=1)
	return $ret[0];
   }
   
//_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-
   
//-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_

   
function getMarkers()
   { 
    // Opens a connection to a MySQL server
    $connection=mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
    if(!$connection) 
      {
       die('Not connected');
       return;
      }

   // Set the active MySQL database
   $db_selected = mysql_select_db("Sql634189_1");
   if(!$db_selected) 
     {
      die('DB not found');
      return;
     }

   // Select all the rows in the markers table
   $query = "SELECT * FROM markers WHERE 1";
   $result = mysql_query($query);

   $ret=array();
   while($row = @mysql_fetch_assoc($result))    
        {
 	 	 $ret[$row['id']]=$row;
	    }
	mysql_close($connection);
	return $ret;
   }
	 

?>