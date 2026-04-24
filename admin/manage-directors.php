<?php
require('checksession.php'); 
include 'includes/function.php'; 
$condata=mysqli_query($conn,"SELECT * FROM `tbl_directors`");
$conrec=mysqli_fetch_array($condata);
if(isset($_POST['update']))
{
$title = mysqli_real_escape_string($conn,$_POST['title']);
$subtitle = mysqli_real_escape_string($conn,$_POST['subtitle']);
$des = mysqli_real_escape_string($conn,$_POST['des']);
$alt = mysqli_real_escape_string($conn,$_POST['alt']);
$longdes = mysqli_real_escape_string($conn,$_POST['longdes']);
$txt1 = mysqli_real_escape_string($conn,$_POST['txt1']);
$txt2 = mysqli_real_escape_string($conn,$_POST['txt2']);
$txt3 = mysqli_real_escape_string($conn,$_POST['txt3']);
$txt4 = mysqli_real_escape_string($conn,$_POST['txt4']);
$txt5 = mysqli_real_escape_string($conn,$_POST['txt5']);
$txt6 = mysqli_real_escape_string($conn,$_POST['txt6']);
$txt7 = mysqli_real_escape_string($conn,$_POST['txt7']);
$metatag = mysqli_real_escape_string($conn,$_POST['metatag']); 
$keyword = mysqli_real_escape_string($conn,$_POST['keyword']); 
$metadesc = mysqli_real_escape_string($conn,$_POST['metadesc']);
$headtitle = mysqli_real_escape_string($conn,$_POST['headtitle']);


// image one
 if(!empty($_FILES["aimage"]["name"])) { 
  
  $aimage=$_FILES['aimage']['name'];
  $aimage=time()."_".$aimage; 
  move_uploaded_file($_FILES['aimage']['tmp_name'],"../uploads/about/".$aimage);
  }else{
 $aimage = $conrec['image'];
}

 if(!empty($_FILES["bimage"]["name"])) { 
  
  $bimage=$_FILES['bimage']['name'];
  $bimage=time()."_".$bimage; 
  move_uploaded_file($_FILES['bimage']['tmp_name'],"../uploads/about/".$bimage);
  }else{
 $bimage = $conrec['headimg'];
}
  $query=mysqli_query($conn,"UPDATE `tbl_directors` SET `title`='$title',`alt`='$alt',`subtitle`='$subtitle',`des`='$des',`longdes`='$longdes',`txt1`='$txt1',`txt2`='$txt2',`txt3`='$txt3',`txt4`='$txt4',`txt5`='$txt5',`txt6`='$txt6',`txt7`='$txt7',`metatag`='$metatag',`keyword`='$keyword',`metadesc`='$metadesc',`image`='$aimage' ");
if($query)
  {
  $_SESSION['success']="Data Updated Successfull";
  header("refresh: 3;");
  }
  else
  {
  $_SESSION['error']="Something Error";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>
<body>
	<!-- begin #page-container -->
	<?php require("includes/header.php"); ?>
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>
	<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
				<li class="breadcrumb-item active">Manage Directors</li>
			</ol>
			<!-- begin page-header -->
			<h1 class="page-header">Manage Directors</h1>
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
							<h4 class="panel-title">Manage Directors</h4>
						</div>
						<!-- begin panel-body -->
						<div class="panel-body">                 
		<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="heading">Homepage Title</label>
                  <input type="text"  name="title" class="form-control" id="heading" placeholder="Enter Title" value="<?= $conrec['title']; ?>">
                </div>  

                <div class="form-group">
                  <label for="heading">Homepage Sub Title</label>
                  <input type="text"  name="subtitle" class="form-control" id="heading" placeholder="Enter Sub Title" value="<?= $conrec['subtitle']; ?>">
                </div>  

                <div class="form-group">
                <label>Homepage Short Description</label>
                <textarea  name="des" class="editor1 form-control" id="editor1" placeholder="Enter text ..." rows="12"><?= $conrec['des']; ?></textarea>
              </div>

              <!--<div class="form-group">-->
              <!--  <label>Homepage Long Description</label>-->
              <!--  <textarea  name="longdes" class="editor2 form-control" id="editor2" placeholder="Enter text ..." rows="12"><?= $conrec['longdes']; ?></textarea>-->
              <!--</div>-->
              
               <div class="form-group">
                  <label for="heading">Text Heading</label>
                  <input type="text"  name="txt1" class="form-control" id="heading" placeholder="Enter Title" value="<?= $conrec['txt1']; ?>">
                </div> 
                
                <div class="form-group">
                  <label for="heading">Text-1</label>
                  <input type="text"  name="txt2" class="form-control" id="heading" placeholder="Enter Title" value="<?= $conrec['txt2']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="heading">Text-2</label>
                  <input type="text"  name="txt3" class="form-control" id="heading" placeholder="Enter Title" value="<?= $conrec['txt3']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="heading">Text-3</label>
                  <input type="text"  name="txt4" class="form-control" id="heading" placeholder="Enter Title" value="<?= $conrec['txt4']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="heading">Text-4</label>
                  <input type="text"  name="txt5" class="form-control" id="heading" placeholder="Enter Title" value="<?= $conrec['txt5']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="heading">Text-5</label>
                  <input type="text"  name="txt6" class="form-control" id="heading" placeholder="Enter Title" value="<?= $conrec['txt6']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="heading">Text-6</label>
                  <input type="text"  name="txt7" class="form-control" id="heading" placeholder="Enter Title" value="<?= $conrec['txt7']; ?>">
                </div>

                <div class="row">  
                <div class="form-group col-9">
                  <label for="exampleInputPassword1">Homepage Image</label><code>Image size should be 426px X 700px in jpg or png</code>
                  <input type="file"  name="aimage" class="form-control" id="exampleInputPassword1" >
                  <p class="help-block">Image must be jpg png format</p>
                </div>
                <div class="col-3">  
                      <img src="../uploads/about/<?= $conrec['image']; ?>" style="width:40%;" /> 
                </div>
              </div>

               <div class="form-group">
                  <label for="heading">Alt</label>
                  <input type="text"  name="alt" class="form-control" placeholder="Enter Alt" value="<?= $conrec['alt']; ?>">
                </div>


              <div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;"> 
                <div class="form-group">
                  <label for="metatag">Meta Title</label>
                 <input type="text" name="metatag" id="metatag" placeholder="Meta Title" value="<?= $conrec['metatag']; ?>" class="form-control" >
                </div>
               
                <div class="form-group">
                  <label for="keyword">Meta Keyword</label>
                  <textarea name="keyword" id="keyword" placeholder="Meta Keyword"  class="form-control" ><?= $conrec['keyword']; ?></textarea>
               </div>
               
                <div class="form-group">
                  <label for="metadescription">Meta Description</label>
                  <textarea name="metadesc" id="metadescription" placeholder="Meta Description" class="form-control" ><?= $conrec['metadesc']; ?></textarea>
               </div> 
               </div>  <br/>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                <!-- <input id="btnPassport" type="button" class="btn btn-warning" value="Use Seo tools" name="btnPassport" />  -->
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
$(document).ready(function() {
App.init();
});
</script>
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
</body>
</html>
