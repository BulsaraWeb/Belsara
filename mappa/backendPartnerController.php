<?php
  require("markerModel.php");
  if(isset($_POST['partnerList']))
    {
     $id=$_POST['partnerList'];
     $toBeUpdated=array();
	 $err=0;
	 if(isset($_POST["parName"]))
	    $toBeUpdated['name']=$_POST["parName"];
     if(isset($_POST["parNumber"]))
	    $toBeUpdated['number']=$_POST["parNumber"];
	 //if(isset($_POST["catDescr"]))
	 //   $toBeUpdated['description']=$_POST["catDescr"];
	 
	 if(isset($_POST["changeFoto"]))
	   {
	    if($_FILES['parFoto']['error']==0 && strstr($_FILES['parFoto']['name'],".png"))
		  {
		   move_uploaded_file($_FILES["parFoto"]["tmp_name"],$_SERVER["DOCUMENT_ROOT"]."newSite/mappa/rect-images/".$id.".png");
		   $toBeUpdated['fotoPath']=/*$_SERVER["DOCUMENT_ROOT"]."newSite/mappa/*/"rect-images/".$id.".png";
		  }
		else 
		   $err++;
	   }
	   
	 if(isset($_POST["changeFoto"]))
	   {
	    if($_FILES['parFoto']['error']==0 && strstr($_FILES['parFoto']['name'],".png"))
		  {
		   
		  }
		else 
		   $err++;
	   }
	 
	   
	 if($err==0)
	    updateCategory($id, $toBeUpdated);
    }
 
 header("location:backendCategoryView.php?id=".hash("sha256","ok")."&err=".$err);
?>