<?php
require('checksession.php');
include 'includes/function.php';     

$id=$_REQUEST['bid'];
$bdata=mysqli_query($conn,"SELECT * FROM `tbl_services` where `id`='$id'");
$brec=mysqli_fetch_array($bdata);
if(isset($_POST['update']))
{
  $phpdate = date("Y/m/d");
  $category = mysqli_real_escape_string($conn,$_POST['category_id']);
  $heading = mysqli_real_escape_string($conn,$_POST['heading']);
  $link = mysqli_real_escape_string($conn,$_POST['link']);
  $pgurl = mysqli_real_escape_string($conn,$_POST['pgurl']);
  $rewriteurl = str_replace(array( '\'', '"', '&', '$', '@', '#', '--', '---', '(', ')', '[', ']','.', '/', '_', '?', ' ', ',', ';', '<', '>' ), '-', $pgurl);
  $newurl = strtolower($rewriteurl);
  $des = mysqli_real_escape_string($conn,$_POST['des']);
  $shortdes = mysqli_real_escape_string($conn,$_POST['shortdes']);
  $metatag = mysqli_real_escape_string($conn,$_POST['metatag']);    
  $keyword = mysqli_real_escape_string($conn,$_POST['keyword']);  
  $metadesc = mysqli_real_escape_string($conn,$_POST['metadesc']); 
  $head_detail = mysqli_real_escape_string($conn,$_POST['head_detail']); 
  $position = mysqli_real_escape_string($conn,$_POST['position']);   
  $status = mysqli_real_escape_string($conn,$_POST['status']); 
  $alt1 = mysqli_real_escape_string($conn,$_POST['alt1']); 
  $alt2 = mysqli_real_escape_string($conn,$_POST['alt2']); 
  $halt = mysqli_real_escape_string($conn,$_POST['halt']); 
  $old = mysqli_real_escape_string($conn,$_POST['oldimg']);
  $old2 = mysqli_real_escape_string($conn,$_POST['oldimg2']); 
  $old3 = mysqli_real_escape_string($conn,$_POST['oldimg3']);
  $hold = mysqli_real_escape_string($conn,$_POST['holdimg']);

  $bimage=$_FILES['bimage']['name'];
  if($bimage!='')
  {
    $bimage=time()."_".$bimage;
     @unlink("../uploads/services/".$old); 
     move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/services/".$bimage);
  }

   else {
   $bimage = $brec['image'];
   }	
   
   $cimage=$_FILES['cimage']['name'];
   if($cimage!='')
   {
    $cimage=time()."_".$cimage;
     @unlink("../uploads/services/".$old2); 
     move_uploaded_file($_FILES["cimage"]["tmp_name"], "../uploads/services/".$cimage);
   }

  else {
   $cimage = $brec['icon'];
   }
   
      $himage=$_FILES['himage']['name'];
   if($himage!='')
   {
    $himage=time()."_".$himage;
     @unlink("../uploads/services/".$hold); 
     move_uploaded_file($_FILES["himage"]["tmp_name"], "../uploads/services/".$himage);
   }

  else {
   $himage = $brec['hicon'];
   }
   
   $dimage=$_FILES['dimage']['name'];
   if($dimage!='')
   {
    $dimage=time()."_".$dimage;
     @unlink("../uploads/services/".$old3); 
     move_uploaded_file($_FILES["dimage"]["tmp_name"], "../uploads/services/".$dimage);
   }
   else {
   $dimage = $brec['breadcrumb'];
   }

  $query=mysqli_query($conn,"UPDATE `tbl_services` SET `category_id`='0',`heading`='$heading',`url`='$newurl',`des`='$des',`alt1`='$alt1',`alt2`='$alt2',`halt`='$halt',`shortdes`='$shortdes',`image`='$bimage',`icon`='$cimage',`hicon`='$himage',`breadcrumb`='$dimage',`metatag`='$metatag',`keyword`='$keyword',`metadesc`='$metadesc',`sort`='$position',`status`='$status',`date`='$phpdate',`link`='$link',`head_detail` = '$head_detail' WHERE `id`='$id'");
 if($query==true)
  {
	$_SESSION['success']="Data Updated successfully";
	header("refresh:3;url=manage-services.php");  
	}
	else 
	{
	// Message for unsuccessfull insertion
	$_SESSION['success']="Something went wrong. Please try again";
	header("refresh:3;url=manage-services.php");  	
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
				<li class="breadcrumb-item"><a href="javascript:;">Services Management</a></li>
				<li class="breadcrumb-item active">Edit Services</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Manage Services</h1>
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
							<h4 class="panel-title">Edit Services</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
              
              <div class="row" style="display:none;">
                 <div class="form-group col-md-12">
                  <label class="control-label">Services Category<span class="vd_red">*</span></label>
                        <select name="category_id" class="form-control">
                           <option disabled>Select Project Category</option>
                          <?php
                            $cdata=mysqli_query($conn,"SELECT * FROM `tbl_servicescategory` WHERE `status`='1' ");
                            while($crec=mysqli_fetch_array($cdata))
                            {
                            if($crec['id']==$brec['category_id'])
                            {
                            echo "<option value='$crec[id]' selected>$crec[name]</option>";
                            }
                            else
                            {
                            echo "<option value='$crec[id]'>$crec[name]</option>";
                            }
                      } ?>      
                        </select>
                 </div>
               
                 </div> 
                 
                  <div class="form-group">
                  <label for="one">Services Heading</label>
                  <input type="text"  name="heading" class="form-control" id="one" value="<?= $brec['heading']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="two">Services Url</label>
                  <input type="text"  name="pgurl"  value="<?= $brec['url']; ?>" class="form-control" id="two">
                </div>
                
                <div class="form-group d-none">
                  <label for="two">Services Link <code>If redirect This Page Put Link Here..</code></label>
                  <input type="text"  name="link" id="" value="<?= $brec['link']; ?>" class="form-control" >
                </div>
                
                <div class="form-group">
                  <label for="one">Short Description</label>
                  <input type="text"  name="shortdes" class="form-control" id="one" value="<?= $brec['shortdes']; ?>">
                </div>
                
                 <div class="form-group">
                  <label for="aa"> Description</label>
                  <textarea  name="des" class="editor1 form-control" id="editor1"  rows="12"><?= $brec['des']; ?></textarea>
                
                 </div>

                 <div class="form-group">
                  <label for="bannerlink">Image File</label><code>Image Size should be 706px X 193px in png</code>
                  <input type="file"  name="bimage"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg"  value="<?= $brec['image']; ?>">
                  <img src="../uploads/services/<?= $brec['image']; ?>" class=" bg-dark" width="100" height="40">
                </div>
                <div class="form-group d-none">
                  <label for="one">Enter Alt</label>
                  <input type="text"  name="alt1" class="form-control" value="<?= $brec['alt1']; ?>">
                </div>
         
                <div class="form-group d-none">
                  <label for="bannerlink">Home Icon File</label><code>Icon Size should be 512px X 512px in png and  White image</code>
                  <input type="file"  name="cimage"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg2"  value="<?= $brec['icon']; ?>">
                  <img src="../uploads/services/<?= $brec['icon']; ?>" class=" bg-dark" width="100" height="40">
                </div>
                
                <div class="form-group d-none">
                  <label for="one">Enter Alt</label>
                  <input type="text"  name="alt2" class="form-control" value="<?= $brec['alt2']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="bannerlink">Header Icon File</label><code>Icon Size should be 512px X 512px in png and  White image</code>
                  <input type="file"  name="himage"  class="form-control" id="bannerlink">
                  <input type="hidden" name="holdimg"  value="<?= $brec['hicon']; ?>">
                  <img src="../uploads/services/<?= $brec['hicon']; ?>" class=" bg-dark" width="100" height="40">
                </div>
                
                <div class="form-group d-none">
                  <label for="one">Enter Alt</label>
                  <input type="text"  name="halt" class="form-control" value="<?= $brec['halt']; ?>">
                </div>
         
                 <div class="form-group d-none">
                  <label for="bannerlink">Breadcrumb File</label><code>Image Size should be 1920px X 250px in png or jpg</code>
                  <input type="file"  name="dimage"  class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg3"  value="<?= $brec['breadcrumb']; ?>">
                  <img src="../uploads/services/<?= $brec['breadcrumb']; ?>" width="100" height="40">
                </div>
              
                 <div class="form-group">
                  <label for="exampleInputPassword1">Sort Number</label>
                  <input type="number" name="position" class="form-control" id="exampleInputPassword1" value="<?= $brec['sort']; ?>">
                </div>
                
                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios3" name="status" <?php if($brec['status']=='1'){ echo 'checked';}?>>
                <label for="optionsRadios3">Active</label>
                <input type="radio" value="0" id="optionsRadios4" name="status" <?php if($brec['status']=='0'){ echo 'checked';}?>>
                <label for="optionsRadios4">Inactive</label>
                </div>
                
                <div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
                 <div class="form-group">
                  <label for="metatag">Meta Title</label>
                  <input type="text" name="metatag" id="metatag" value="<?= $brec['metatag']; ?>" class="form-control" >
                 </div>
                 
                  <div class="form-group">
                  <label for="keyword">Meta Keyword</label>
                  <textarea name="keyword" id="keyword" class="form-control" ><?= $brec['keyword']; ?></textarea>
                 </div>
                 
                 <div class="form-group">
                  <label for="metadescription">Meta Description</label>
                  <textarea name="metadesc" id="metadescription"  class="form-control" ><?= $brec['metadesc']; ?></textarea>
                 </div>
                 
                 <div class="form-group">
                  <label for="head_detail">Head Detail</label>
                  <textarea name="head_detail" id="head_detail"  class="form-control" ><?= $brec['head_detail']; ?></textarea>
                 </div>
                 </div> <br/>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                <input id="btnPassport" type="button" class="btn btn-warning" value="Use Seo tools" name="btnPassport" /> 
              </div>
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
initSample();
CKEDITOR.replace('editor1', {
    filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});
CKEDITOR.replace('editor2', {
    filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});

CKEDITOR.replace('editor3', {
    filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});
CKEDITOR.replace('editor4', {
    filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
});
</script>
	
	<script>
		$(document).ready(function() {
			App.init();

   
};
	</script>   
<script>
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


    var src = document.getElementById("one"),
        dst = document.getElementById("two");
    src.addEventListener('input', function() {
        dst.value = src.value;
    });
</script>
</body>
</html>
