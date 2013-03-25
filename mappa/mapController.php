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
$query = "SELECT * FROM markers WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query');
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysql_fetch_assoc($result))
{	
  $newChild = $root->appendChild($xmlDoc->createElement("marker"));	
  
  $tableFields=array();
  $tableFields[]="name";
  $tableFields[]="address";
  $tableFields[]="lat";
  $tableFields[]="lng";
  $tableFields[]="type";
 
  
  for($i=0; $i<sizeof($tableFields); $i++)
     $newChild->appendChild($xmlDoc->createAttribute($tableFields[$i]))->appendChild($xmlDoc->createTextNode($row[$tableFields[$i]]));
  
  
 /* 
  // ADD TO XML DOCUMENT NODE
  $node = $doc->create_element("marker");
  $newnode = $parnode->append_child($node);

  $newnode->set_attribute("name", $row['name']);
  $newnode->set_attribute("address", $row['address']);
  $newnode->set_attribute("lat", $row['lat']);
  $newnode->set_attribute("lng", $row['lng']);
  $newnode->set_attribute("type", $row['type']);*/
}

mysql_close($connection);
echo $xmlDoc->saveXML();
/*
$xmlfile = $doc->dump_mem();
echo $xmlfile;*/

?>