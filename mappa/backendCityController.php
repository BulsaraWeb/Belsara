<?php
  require("markerModel.php");
  if(isset($_POST['categoryList']))
    {
     $id=$_POST['categoryList'];
     $toBeUpdated=array();
	 $err=0;
	 if(isset($_POST["catName"]))
	    $toBeUpdated['catName']=$_POST["catName"];
     if(isset($_POST["catNumber"]))
	    $toBeUpdated['number']=$_POST["catNumber"];
	 if(isset($_POST["catDescr"]))
	    $toBeUpdated['description']=$_POST["catDescr"];
	 
	 if(isset($_POST["changePin"]))
	   {
	    if($_FILES['catPin']['error']==0 && strstr($_FILES['catPin']['name'],".png"))
		  {
		   move_uploaded_file($_FILES["catPin"]["tmp_name"],$_SERVER["DOCUMENT_ROOT"]."newSite/mappa/pin-images/".$id.".png");
		   $toBeUpdated['pinPath']=/*$_SERVER["DOCUMENT_ROOT"]."newSite/mappa/*/"pin-images/".$id.".png";
		  }
		else 
		   $err++;
	   }
	 
	   
	 if($err==0)
	    updateCategory($id, $toBeUpdated);
    }
 
 header("location:backendCityView.php?id=".hash("sha256","ok")."&err=".$err);
?>