<?php

/*
mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
mysql_select_db("Sql634189_1");
*/

// Start XML file, create parent node
$xmlDoc = new DOMDocument('1.0', 'iso-8859-1');
$root = $xmlDoc->appendChild($xmlDoc->createElement("markers"));



/*
$doc = domxml_new_doc("1.0");
$node = $doc->create_element("markers");
$parnode = $doc->append_child($node);
*/
// Opens a connection to a MySQL server
$connection=mysql_connect("62.149.150.181","Sql634189","7d4c6b35");
if (!$connection) {
  die('Not connected');
}

// Set the active MySQL database
$db_selected = mysql_select_db("Sql634189_1");;
if (!$db_selected) {
  die ('Can\'t use db');
}

// Select all the rows in the markers table
$query = "SELECT * FROM markers INNER JOIN category ON markers.category_exkey = category.id";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query'.$result);
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
$tableFields=array();
$tableFields[]="name";
$tableFields[]="address";
$tableFields[]="lat";
$tableFields[]="lng";
$tableFields[]="category_exkey";
$tableFields[]="pinPath";
 

$idCat=-1;
if(is_numeric($_GET["idCat"])&&($_GET["idCat"]>0))
   $idCat=$_GET["idCat"];
while ($row = @mysql_fetch_assoc($result))
{
  if($idCat!=-1)
    {
     if($idCat==$row["category_exkey"])		
	   {
	   	$newChild = $root->appendChild($xmlDoc->createElement("marker"));	
     	for($i=0; $i<sizeof($tableFields); $i++)
            $newChild->appendChild($xmlDoc->createAttribute($tableFields[$i]))->appendChild($xmlDoc->createTextNode($row[$tableFields[$i]]));
	   }
    }	
  else 
    {
     $newChild = $root->appendChild($xmlDoc->createElement("marker"));	
     for($i=0; $i<sizeof($tableFields); $i++)
         $newChild->appendChild($xmlDoc->createAttribute($tableFields[$i]))->appendChild($xmlDoc->createTextNode($row[$tableFields[$i]]));      
    }
}



mysql_close($connection);
echo $xmlDoc->saveXML();
/*
$xmlfile = $doc->dump_mem();
echo $xmlfile;*/

?>