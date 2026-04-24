<?php
require('checksession.php');
include 'includes/function.php';  
require('includes/imgclass.php');
if(isset($_POST['submit']))
{  
  $category = mysqli_real_escape_string($conn,$_POST['category']); 

    //--------------------------------------------//
	$title= mysqli_real_escape_string($conn,$_POST['title']);
	$des= mysqli_real_escape_string($conn,$_POST['des']);
    $heading = mysqli_real_escape_string($conn,$_POST['heading']);
	$metatag = mysqli_real_escape_string($conn,$_POST['metatag']);
	$keyword = mysqli_real_escape_string($conn,$_POST['keyword']);
	$metadesc = mysqli_real_escape_string($conn,$_POST['metadesc']);

                                     
    //--------------------------------------------//
	
	$status= mysqli_real_escape_string($conn,$_POST['status']);

    //------------|Main|-----------//
	$bimages=$_FILES['bimage']['name'];
	$bimage=$pcode."_".$bimages;
	if($bimages!=''){
	move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/brand/".$bimage);
	}else{
	$bimage=0;	
	}
	//------------|Multiple|-----------//
	foreach($_FILES['pimages']['tmp_name'] as $key => $tmp_name )
    {
	 $file_name = $pcode."_".$_FILES['pimages']['name'][$key];
	 $file[]=$file_name;
	 $file_size =$_FILES['pimages']['size'][$key];
	 $file_tmp =$_FILES['pimages']['tmp_name'][$key];
	 $file_type=$_FILES['pimages']['type'][$key];    
	
	 $desired_dir="../uploads/brand/";
	 if(is_dir($desired_dir)==false)
	 {
		mkdir("$desired_dir", 0700);        // Create directory/path if it does not exist
	 }
	 move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
    }
    $pimages=implode(",",$file);

	$data=mysqli_query($conn,"INSERT INTO `tbl_brand` (`category_id`, `title`,`des`,`heading`, `p_title`, `p_keyword`, `p_metadesc`, `p_image`, `p_mimage`, `p_status`) VALUES ('$category','$title','$des','$heading', '$metatag', '$keyword', '$metadesc','$bimage', '$pimages','$status')");

	if($data==true)
	  {
		$_SESSION['success']="Data Added successfully";
		header("refresh:3;url=manage-product.php");	
	  }
		else 
	  {
		$_SESSION['error']="Something went wrong. Please try again";
		header("refresh:3;url=add-product.php");	
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
				<li class="breadcrumb-item active">Add Brand</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Brand <small>Add Brand</small></h1>
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
							<h4 class="panel-title">Add Brand</h4>
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
                         <option>Select Brand</option>
                               <?php
                                $cdata=mysqli_query($conn,"SELECT * FROM `tbl_category` WHERE  `c_status`='1' ");
                                while($crec=mysqli_fetch_array($cdata))
                                {
                               ?>    
                                <option value="<?= $crec['c_id']; ?>"><?= $crec['c_name']; ?></option>
                               <?php 
                               } 
                               ?>      
                      </select>
                    </div>
            
                
             <div class="col-lg-12 text-center">
                 <strong>==========================// <font color="#FF0000">Brand Details</font>//==========================</strong>
             </div>    
                
                   <div class="form-group">
                  <label for="heading">Brand Title</label>
                  <input type="text"  name="title" class="form-control" id="heading" placeholder="Enter title" required>
                </div>
                 
                 <div class="form-group">
                      <label for="exampleInputPassword1">Brand Short Description</label>
                       <textarea  class="editor1 form-control" name="des" placeholder="Product Short Description" rows="2"  id="editor1"></textarea>
                    </div>
                 
              
                   <div class="form-group">
                  <label for="heading">Brand Heading</label>
                  <input type="text"  name="heading" class="form-control" id="heading" placeholder="Enter Heading" required>
                </div>
                
                 <div class="col-lg-6">   
                 <div class="form-group">
                    <label for="exampleInputPassword1">Brand Images (Main)</label>
                    <input type="file" name="bimage" class="form-control" id="exampleInputPassword1">
                    <p class="help-block">Image dimension must be 1600 X 1600px and must be jpg format (keep images name sort For better Response)</p>
                  </div>
                </div> 
                
                <div class="col-lg-6">   
                 <div class="form-group">
                    <label for="exampleInputPassword1">Brand Images (Multiple)</label>
                    <input type="file" name="pimages[]" class="form-control" id="exampleInputPassword1" multiple>
                    <p class="help-block">Image dimension must be 1600 X 1600px and must be jpg format (keep images name sort For better Response)</p>
                  </div>
                </div>  
                


                
                 <div class="col-lg-12"> 
                    
                  <div class="form-group">
                    <label>Status</label>
                   <input type="radio" value="1" id="optionsRadios3" name="status" checked>
                   <label for="optionsRadios3">Active</label>
                   <input type="radio" value="0" id="optionsRadios4" name="status">
                   <label for="optionsRadios4">Inactive</label>
                  </div>
                  
                  
                  <div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
                      <div class="form-group">
                        <label for="metatag">Meta Title</label>
                        <input type="text" name="metatag" id="metatag" placeholder="Meta Title" class="form-control" >
                      </div>
                     
                      <div class="form-group">
                        <label for="keyword">Meta Keyword</label>
                        <textarea name="keyword" id="keyword" placeholder="Meta Keyword" class="form-control" ></textarea>
                      </div>
                     
                      <div class="form-group">
                        <label for="metadescription">Meta Description</label>
                        <textarea name="metadesc" id="metadescription" placeholder="Meta Description" class="form-control" ></textarea>
                      </div> 
                 </div>  
                 <br/>
                    <div class="col-lg-12"> 
                   <div class="form-group">
                  <label for="heading">Product Tags</label>
                  <input type="text"  name="tags" class="form-control" id="heading" placeholder="Enter Product Tags By which it can search">
                </div>
                 </div>
                   
                   <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
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
