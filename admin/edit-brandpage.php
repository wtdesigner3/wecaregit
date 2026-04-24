<?php
require('checksession.php'); 
include 'includes/function.php'; 
$id=$_REQUEST['bid'];
if(isset($_POST['update']))
{


 if(!empty($_FILES["aimage"]["name"])) { 
  
  $aimage=$_FILES['aimage']['name'];
  $aimage=time()."_".$aimage; 
  move_uploaded_file($_FILES['aimage']['tmp_name'],"../uploads/brand/".$aimage);
  $query=mysqli_query($conn,"UPDATE `tbl_brandpage` SET `image`='$aimage' where id='$id'");
  }
else{    
    $query=mysqli_query($conn,"UPDATE `tbl_brandpage` SET `d_id`='$title' where id='$id'");
}

  
if($query)
  {
  $_SESSION['success']="Data Updated Successfull";
  header("Location:manage-brandpage.php");
  }
  else
  {
  $_SESSION['error']="Something Error";
  }
}
?>
