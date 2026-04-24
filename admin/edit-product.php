<?php
error_reporting(0);
require('checksession.php');
include 'includes/function.php'; 
require('includes/imgclass.php');    
$b=$_REQUEST['cid'];
$bdata=mysqli_query($conn,"SELECT * FROM `tbl_product` where `p_id`='$b'");
$brec=mysqli_fetch_array($bdata);
if(isset($_POST['update']))
{   
$category = mysqli_real_escape_string($conn,$_POST['category']); 

    //--------------------------------------------//
	$title= mysqli_real_escape_string($conn,$_POST['title']);
	$des= mysqli_real_escape_string($conn,$_POST['des']);
    $heading = mysqli_real_escape_string($conn,$_POST['heading']);
	$metatag = mysqli_real_escape_string($conn,$_POST['metatag']);
	$keyword = mysqli_real_escape_string($conn,$_POST['keyword']);
	$metadesc = mysqli_real_escape_string($conn,$_POST['metadesc']);

  $status= mysqli_real_escape_string($conn,$_POST['status']);
	$old= mysqli_real_escape_string($conn,$_POST['oldimg']);


    //--------------------------------------------//
    $bimage=$_FILES['bimage']['name'];
    $bimage=time()."_".$bimage;
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["bimage"]["tmp_name"]);
    if($fileinfo!=''){
    @unlink("../uploads/product/".$old); 
    move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/brand/".$bimage);
    }
      else
    {
	 $bimage=$brec['p_image'];
    }
   //--------------image---------------//
   
     foreach($_FILES['pimages']['tmp_name'] as $key => $tmp_name )

    {
        if($tmp_name!='')
        {
        unlink("../uploads/brand/".$brec['p_mimage']);
        $file_name = time()."_".$_FILES['pimages']['name'][$key];
        $file[]=$file_name;
        $file_size =$_FILES['pimages']['size'][$key];
        $file_tmp =$_FILES['pimages']['tmp_name'][$key];
        $file_type=$_FILES['pimages']['type'][$key];    
        
        $desired_dir="../uploads/brand";
        if(is_dir($desired_dir)==false)
        {
            mkdir("$desired_dir", 0700);        // Create directory/path if it does not exist
        }
        move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
        }
        else
        {
            $pimages=$brec['p_mimage'];
            $image=explode(",",$pimages);
            for($i=0;$i<count($image);$i++)
            {
                $file[]=$image[$i];
            }
        }
    }
     // $image=explode(",",$pimages);
    $oldpimages=$_POST['oldmimage'];

  
  // $pimagesfg=implode(",",$oldpimages);
  $pimagess=implode(",",$file);
  
  
//  $pimages = $oldpimages.",".$pimagess;

  if($oldpimages==$pimagess){
    $pimages = $pimagess;
  } else {
 $pimages = $oldpimages.",".$pimagess;

}

   //==================================================================//

  $query=mysqli_query($conn,"UPDATE `tbl_product` SET `category_id`='$category',`title`='$title',`des`='$des', `heading`='$heading',`p_title`='$metatag', `p_keyword`='$keyword', `p_metadesc`='$metadesc', `p_image`='$bimage', `p_mimage`='$pimages',`p_status`='$status' WHERE `p_id`='$b'");
     
 echo  print_r($query); 

      if($query==true)
        {
          $_SESSION['success']="Data updated Successfully";
          header("refresh:3;url=manage-product.php"); 
        }
        else 
        {
          $_SESSION['error']="Something went wrong. Please try again";
          header("refresh:3;url=manage-product.php"); 
		    }
	}
  ?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>
<body>
	
	
	<!-- begin #page-container -->
	<?php require("includes/header.php"); ?>
	<!-- end #header -->	
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Brand Management</a></li>
				<li class="breadcrumb-item active">Edit Brand</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Brand <small>Edit Brand</small></h1>
			<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-10 -->
				<div class="col-lg-12">
					<!-- begin panel -->
					<div class="panel panel-inverse">
						<!-- begin panel-heading -->
						<div class="panel-heading">
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
							<h4 class="panel-title">Edit Brand</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form"  method="POST"  enctype="multipart/form-data">
              <div class="box-body">
              <div class="col-lg-12">
                <div class="row">
            
             <div class="col-lg-12 text-center">
                 <strong>==========================// <font color="#FF0000">Brand Category</font>//==========================</strong>
             </div>
                
             
                  <div class="form-group">
                     <label for="heading">Menu</label>
                      <select name="category" class="form-control" onchange="test(this.value)">
                         <option>Select Category</option>
                               <?php
                            $mdata=mysqli_query($conn,"SELECT * FROM `tbl_category` ");
                            while($mrec=mysqli_fetch_array($mdata))
                            {
                            if($mrec['c_id']==$brec['category_id'])
                            {
                            echo "<option value='$mrec[c_id]' selected>$mrec[c_name]</option>";
                            }
                            else
                            {
                            echo "<option value='$mrec[c_id]'>$mrec[c_name]</option>";
                            }
                            } ?>     
                      </select>
                    </div>
         
               


              
            
                
             <div class="col-lg-12 text-center">
                 <strong>==========================// <font color="#FF0000">Brand Details</font>//==========================</strong>
             </div>    
                
             
                   <div class="form-group">
                  <label for="heading">Brand Title</label>
                  <input type="text"  name="title" class="form-control" id="heading" placeholder="Enter Name" value="<?= $brec['title']; ?>">
                </div>
                
                 
                  
                  <div class="form-group">
                    <label>Product Full Description</label>
                    <textarea  name="des" class="editor2 form-control" id="editor2" placeholder="Enter text ..." rows="12"><?= $brec['des']; ?></textarea>
                   </div>

             

               
                   <div class="form-group">
                  <label for="heading">Brand Heading</label>
                  <input type="text"  name="heading" class="form-control" id="heading" placeholder="Enter heading" value="<?= $brec['heading']; ?>">
                </div>
               


                 <div class="col-lg-6">   
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" name="bimage" class="form-control" id="exampleInputFile">
                    <input type="hidden" name="oldimg"  value="<?= $brec['p_image']; ?>">
                    <p class="help-block">Image dimension must be 1600 X 1600px and must be jpg format (keep images name sort For better Response)</p>
                    <img src="../uploads/product/<?= $brec['p_image']; ?>" style="width:20%;">
                  </div>
                </div> 
                
                <div class="col-lg-6">   
                 <div class="form-group">
                    <label for="exampleInputPassword1">Product Images (Multiple)</label>
                    <input type="file" name="pimages[]" class="form-control" id="exampleInputPassword1" multiple>
                    <p class="help-block">Image dimension must be 1600 X 1600px and must be jpg format (keep images name sort For better Response)</p>
                    <p>
 <form method="post">
 </form>
  
                      <?php 
                        $pimages=$brec['p_mimage'];
                          $image=explode(",",$pimages);
                          echo "<div class='row'>"; 
                          for($i=0;$i<count($image);$i++)
                          {
                          ?>
                          <div class='col-sm-4'>
                          <form method="post">
                          <input type="hidden" value="<?= $userToDelete = $image[$i] ?>" name="imageg">
                          
                            <button name="deleteimg">X</button> <img src="../uploads/product/<?= $image[$i] ?>" height="100px" width="90px" />
                            </form>
                            </div>
                          <?php }
                          echo "</div>";?>
<input type="hidden" value="<?= $pimages; ?>" name="oldmimage">
<?php
if(isset($_POST['deleteimg'])){

$url=$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";  
$pimages=$brec['p_mimage'];

$userToDelete =$_POST['imageg'];

echo $image=explode(",",$pimages);

$deleteKey = array_search($userToDelete,$image);

unset($image[$deleteKey]);

$usersd = implode(",",$image);

 $query=mysqli_query($conn,"UPDATE `tbl_product` SET `p_mimage`='$usersd' WHERE `p_id`='$b'");
 if($query==true)
 {
 $_SESSION['success']=" Data Updated Successfully";  
 echo '<meta http-equiv="refresh" content="3;" />';
 }
 else 
 {
 $_SESSION['error']="Something went wrong. Please try again";    
 }
}

?>







                    
                    </p>
                  </div>
                </div>  
                


                  <div class="form-group">
                   <input type="radio" value="1" id="optionsRadios3" name="status" <?php if($brec['p_status']=='1') echo "checked";?>>
                   <label for="optionsRadios3">Active</label>
                   <input type="radio" value="0" id="optionsRadios4" name="status" <?php if($brec['p_status']=='0') echo "checked";?>>
                   <label for="optionsRadios4">Inactive</label>
                  </div>
                  
                  
                  <div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
                      <div class="form-group">
                        <label for="metatag">Meta Title</label>
                        <input type="text" name="metatag" id="metatag" placeholder="Meta Title" class="form-control" value="<?= $brec['p_title']; ?>">
                      </div>
                     
                      <div class="form-group">
                        <label for="keyword">Meta Keyword</label>
                        <textarea name="keyword" id="keyword" placeholder="Meta Keyword" class="form-control" ><?= $brec['p_keyword']; ?></textarea>
                      </div>
                     
                      <div class="form-group">
                        <label for="metadescription">Meta Description</label>
                        <textarea name="metadesc" id="metadescription" placeholder="Meta Description" class="form-control" ><?= $brec['p_metadesc']; ?></textarea>
                      </div> 
                    
                 </div>  
                 <br/>
       
                   
                   <div class="box-footer">
                      <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                      <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                      <input id="btnPassport" type="button" class="btn btn-warning" value="Use Seo tools" name="btnPassport" /> 
                    </div>
              
                 </div>
                 
                </div>
              </div>
             </div>
              <!-- /.box-body -->

              
            </form>
						</div>
						<!-- end panel-body -->
					</div>
					<!-- end panel -->
				</div>
				<!-- end col-10 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->
		
		
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
<?php require("includes/footer.php"); ?>

   <script>
function test(t)
{
  var obj=new XMLHttpRequest();
  obj.open("GET","ajax/category.php?data="+t,true);
  obj.send();
  obj.onreadystatechange= function(){
    if(obj.readyState==4)
    {
      document.getElementById("sub").innerHTML=obj.responseText;
    }
  }
}
</script> 
   <script>
function tests(t)
{
  var obj=new XMLHttpRequest();
  obj.open("GET","ajax/subcategory.php?data="+t,true);
  obj.send();
  obj.onreadystatechange= function(){
    if(obj.readyState==4)
    {
      document.getElementById("subs").innerHTML=obj.responseText;
    }
  }
}
</script>  

   <script>
function testss(t)
{
  var obj=new XMLHttpRequest();
  obj.open("GET","ajax/subsubcategory.php?data="+t,true);
  obj.send();
  obj.onreadystatechange= function(){
    if(obj.readyState==4)
    {
      document.getElementById("subss").innerHTML=obj.responseText;
    }
  }
}
</script>   	
<script>
	$(document).ready(function() {
		App.init();
		CKEDITOR.replace( 'editor1' );
		CKEDITOR.replace( 'editor2' );
		CKEDITOR.replace( 'editor3' );
		
	});
</script>
<script>
 $(document).ready(function() { 
  if ($('.dim').val() == 'diamond') {
    $('.diamondsec').show();
  } else {
    $('.diamondsec').hide();
  }

$('.dim').change(function() {

  if(this.value=='diamond'){
    $('.diamondsec').show();
   } else{
    $('.diamondsec').hide();
   }

  });
  
  });
</script>



<script>
 $(document).ready(function() { 
  if ($('.dim').val() == 'gift') {
    $('.giftsec').show();
    $('.giftssec').hide();
  } else {
    $('.giftsec').hide();
    $('.giftssec').show();
  }

$('.dim').change(function() {

  if(this.value=='gift'){
    $('.giftsec').show();
    $('.giftssec').hide();
   } else{
    $('.giftsec').hide();
    $('.giftssec').show();
   }

  });
  
  });
</script>
<!------------------------>
<script type="text/javascript">
$(function () {
   $("#btnPassport").click(function () {
      if ($(this).val() == "Use Seo tools") {
            $("#dvPassport").show();
            $(this).val("Close Seo tools");
        } else {
            $("#dvPassport").hide();
            $(this).val("Use Seo tools");
        }
    });
});
</script>
<!------------------------------>
</body>
</html>
