<?php


function addCategory($cat, $pin, $description)
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
    $query ="INSERT INTO category (catName, pinPath, description) VALUES ('".$cat."','".$pin."','".$description."') ";

    
   
    $result = mysql_query($query);
	
	 mysql_close($connection);
    }


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