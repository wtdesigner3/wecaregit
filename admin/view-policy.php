<?php
require('checksession.php'); 
include 'includes/function.php'; 
$condata=mysqli_query($conn,"SELECT * FROM `tbl_policy`");
$conrec=mysqli_fetch_array($condata);

if(isset($_POST['update']))
{
 $title = mysqli_real_escape_string($conn,$_POST['title']); 
  $metatag = mysqli_real_escape_string($conn,$_POST['metatag']); 
    $keyword = mysqli_real_escape_string($conn,$_POST['keyword']); 
	 $metadesc = mysqli_real_escape_string($conn,$_POST['metadesc']);
	 $head_detail = mysqli_real_escape_string($conn,$_POST['head_detail']);
      $detail = mysqli_real_escape_string($conn,$_POST['detail']); 
      if(!empty($_FILES["aimage"]["name"])) { 
  
  $aimage=$_FILES['aimage']['name'];
  $aimage=time()."_".$aimage; 
  move_uploaded_file($_FILES['aimage']['tmp_name'],"../uploads/about/".$aimage);
  }else{
 $aimage = $conrec['image'];
}
        $query=mysqli_query($conn,"UPDATE `tbl_policy` SET `abt_title`='$title',`image`='$aimage',`abt_titletag`='$metatag',`abt_keyword`='$keyword',`abt_metadesc`='$metadesc',`abt_details`='$detail',`head_detail` = '$head_detail'");
 
      
        if($query)
      {
			$_SESSION['success']="Policy Details Updated Successfull";
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
	<!-- end #header -->	
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Policy Management</a></li>
				<li class="breadcrumb-item active">Edit Policy</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Manage Policy <small>...</small></h1>
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
							<h4 class="panel-title">Edit Policy</h4>
						</div>
						<!-- end panel-heading -->
						
						<!-- begin panel-body -->
						<div class="panel-body">
                        
                         <!-----------------------------------------------------/Message/------------------------------------------------>
               <?php if(isset($erromsg)!=''){ ?>
               <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                    <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span><strong>Oh snap!</strong> <?php echo $erromsg;?>
               </div>
                <?php  } if(isset($msg)!=''){?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                    <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Well done!</strong> <?php echo $msg;?>.
                  </div> 
                <?php } ?>     
              <!-----------------------------------------------------/Message/------------------------------------------------> 
                        
                          
							<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
             
              
                <div class="form-group">
                  <label for="heading">Title</label>
                  <input type="text"  name="title" class="form-control" id="heading" placeholder="Enter Title" value="<?= $conrec['abt_title']; ?>">
                </div>
                
               
                
                <div id="myDIV" style="display:none;"> 
                 <div class="form-group">
                  <label for="metatag">Meta Title</label>
                  <input type="text" name="metatag" id="metatag" placeholder="Meta Title" value="<?= $conrec['abt_titletag']; ?>" class="form-control" >
                 </div>
                 
                  <div class="form-group">
                  <label for="keyword">Meta Keyword</label>
                  <textarea name="keyword" id="keyword" placeholder="Meta Keyword"  class="form-control" ><?= $conrec['abt_keyword']; ?></textarea>
                 </div>
                 
                 <div class="form-group">
                  <label for="metadescription">Meta Description</label>
                  <textarea name="metadesc" id="metadescription" placeholder="Meta Description" class="form-control" ><?= $conrec['abt_metadesc']; ?></textarea>
                 </div>
                 <div class="form-group">
                  <label for="head_detail">Head Detail</label>
                  <textarea name="head_detail" id="head_detail" placeholder="Head Detail" class="form-control" ><?= $conrec['head_detail']; ?></textarea>
                 </div>
                 </div>
                
                     
                
                <div class="form-group">
                  <label>Description</label>
                  <textarea  name="detail" class="editor1 form-control" id="editor1" placeholder="Enter text ..." rows="12"><?= $conrec['abt_details']; ?></textarea>
                </div>
        
                 <div class="row d-none">  
                <div class="form-group col-9">
                  <label for="exampleInputPassword1">Breadcrumb Image</label><code>Image size should be 1920px X 250px in jpg or png</code>
                  <input type="file"  name="aimage" class="form-control" id="exampleInputPassword1" >
                  <p class="help-block">Image must be jpg png format</p>
                </div>
                <div class="col-3">  
                      <img src="../uploads/about/<?= $conrec['image']; ?>" style="width:40%;" /> 
                </div>
              </div>
           
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                <!--<button type="button" onclick="myFunction()" class="btn btn-warning">Seo tools</button>-->
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
			CKEDITOR.replace( 'editor1' );
	
		});
	</script>
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
</body>
</html>
