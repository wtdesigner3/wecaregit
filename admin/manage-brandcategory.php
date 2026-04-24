<?php 
require('checksession.php'); 
require('includes/function.php');
if(isset($_POST['submit']))
{
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $sort=mysqli_real_escape_string($conn,$_POST['sort']);
  $status=mysqli_real_escape_string($conn,$_POST['status']);
  	$bimage=$_FILES['bimage']['name'];
	$bimage=time()."_".$bimage;
	move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/brand/".$bimage);
  $query=mysqli_query($conn,"INSERT INTO `tbl_brandcategory`(`name`,`image`,`sort`,`status`) VALUES ('$name','$bimage','$sort','$status')");
	if($query==true)
	{
	$_SESSION['success']="Data Category Added Successfully";
	header("refresh: 2;"); 
	}
	else 
	{
	$_SESSION['error']="Something went wrong. Please try again";	
	} 
}
//===========================//
if(isset($_POST['update']))
{
  $b=mysqli_real_escape_string($conn,$_POST['id']);
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $sort=mysqli_real_escape_string($conn,$_POST['sort']);
  $status=mysqli_real_escape_string($conn,$_POST['status']);
  $old = mysqli_real_escape_string($conn,$_POST['oldimg']);  
  $bimage=$_FILES['bimage']['name'];
  
  // Get Image Dimension
  
  if($bimage !='')
  {
    $fileinfo = @getimagesize($_FILES["bimage"]["tmp_name"]);
    $bimage=time()."_".$bimage;
    @unlink("../uploads/brand/".$old); 
    move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/brand/".$bimage);
  }
   else
  {
    $ig=mysqli_query($conn,"SELECT * FROM `tbl_brandcategory` WHERE `id`='$b'"); 
	$brec=mysqli_fetch_array($ig);
    $bimage=$brec['image'];
  }
  $query=mysqli_query($conn,"UPDATE `tbl_brandcategory` SET `name`='$name',`image`='$bimage', `sort`='$sort', `status`='$status' WHERE `id`='$b'");
  if($query==true)
  {
  $_SESSION['success']="Data updated successfully";			
  }
  else 
  {
  $_SESSION['success']="Something went wrong. Please try again";
  }
} 
?>
<!DOCTYPE html>
<html lang="en">
<?php require("includes/head.php"); ?>
<body>
<style>
.switcher label:after {
    content: '';
    height: 15px;
    width: 15px;
}
.switcher label:before {
    width: 36px;
    height: 19px;
}
</style>
	<!-- begin #page-container -->
	<?php require("includes/header.php"); ?>
	<!-- end #header -->	
	<!-- begin #sidebar -->
	<?php require("includes/left.php"); ?>
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Brand</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Manage Brand Category </a></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Brand Category </h1>
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
							<h4 class="panel-title">Add Brand Category</h4>
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
                  <label for="bannerlink">Category Name</label>
                  <input type="text"  name="name"  placeholder="Enter Category Name" class="form-control" id="bannerlink">
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputPassword1">Icon Image</label><code>Icon size should be 512px X 512px in jpg or png</code>
                  <input type="file" name="bimage" class="form-control" id="exampleInputPassword1" >
                 </div>
                
                 <div class="form-group">
                  <label for="bannerlink">Sort By</label>
                  <input type="number"  name="sort" placeholder="Sort by" class="form-control" id="bannerlink">
                 </div>
                
                <div class="form-group">
                <input type="radio" value="1" id="optionsRadios3" name="status" checked>
                <label for="optionsRadios3">Active</label>
                <input type="radio" value="0" id="optionsRadios4" name="status">
                <label for="optionsRadios4">Inactive</label>
                </div>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
              </div>
            </form>
						</div>
						<!-- end panel-body -->
					</div>
					<!-- end panel -->
				</div>
                
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
							<h4 class="panel-title">View Brand Category</h4>
						</div>
						<!-- end panel-heading -->
						<div class="panel-body">
						<!-- begin panel-body -->
						<table  class="table table-striped table-bordered">
								<thead>
									<tr>
										<th width="1%"></th>
										<th class="text-nowrap">Icon image</th>
										<th class="text-nowrap">Category Name</th>
										<th width="1%" class="text-nowrap">Status</th>
										<th width="1%" class="text-nowrap">Edit</th>
                                        <th width="1%" class="text-nowrap">Delete</th>
									</tr>
								</thead>
								<tbody>
                                <?php $trc=mysqli_query($conn,"SELECT * FROM `tbl_brandcategory` ORDER BY `id`"); 
                                $i=1;
						         while($mrc=mysqli_fetch_array($trc))
								 { 
								    
						       ?> 
									<tr class="odd gradeX">
										<td width="1%" class="f-s-600 text-inverse"><?php echo $i;?></td>
										<td width="1%" class="with-img"><img src="../uploads/brand/<?= $mrc['image'];?>" class="img-rounded height-60" /></td>
							            <td><?php echo $mrc['name'];?></td>
                                        <td>
                                        <div class="switcher">
                                              <input type="checkbox" onClick="updateId('<?php echo $mrc['id']; ?>')" name="switcher_checkbox_1" id="switcher_checkbox_<?php echo $mrc['id'];?>" <?php if( $mrc['status']=='1'){ echo "checked"; }else {} ?> value="1">
                                              <label for="switcher_checkbox_<?php echo $mrc['id'];?>"></label>
                                            </div>
                                        </td>
										
                                         <td>
                                          <a href="#modal-editbrand<?php echo $mrc['id'];?>" class="label label-sm label-primary" title="Edit" style="text-decoration: none;" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
                             <div class="modal fade" id="modal-editbrand<?php echo $mrc['id'];?>" aria-hidden="true" style="display: none;">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Edit Brand Category</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											
												<form role="form" method="POST"  enctype="multipart/form-data">
                                                  <div class="box-body">
                                                    <input type="hidden" name="id" value="<?php echo $mrc['id'];?>">
                                                     <div class="form-group">
                                                      <label for="bannerlink">Category Name</label>
                                                      <input type="text"  name="name"  value="<?php echo $mrc['name'];?>" class="form-control" id="bannerlink">
                                                    </div>
                                                    
                                                        <div class="form-group">
                                                        <label for="bannerlink">Icon Image</label><code>Icon size should be 512px X 512px in jpg or png</code>
                                                        <input type="file"  name="bimage"  class="form-control" id="bannerlink">
                                                        <input type="hidden" name="oldimg"  value="<?= $mrc['image']; ?>">
                                                        <img src="../uploads/brand/<?= $mrc['image']; ?>" width="100" height="40">
                                                        </div>
                                                    
                                                     <div class="form-group">
									                  <label for="bannerlink">Sort By</label>
									                  <input type="number"  name="sort" value="<?= $mrc['sort']; ?>" class="form-control" id="bannerlink">
									                 </div>
                                                    
                                                    <div class="form-group">
                                                    <input type="radio" value="1" id="optionsRadios3" name="status" <?php if( $mrc['status']=='1'){ echo "checked"; } ?>>
                                                    <label for="optionsRadios3">Active</label>
                                                    <input type="radio" value="0" id="optionsRadios4" name="status" <?php if( $mrc['status']=='0'){ echo "checked"; } ?>>
                                                    <label for="optionsRadios4">Inactive</label>
                                                    </div>
                                                  
                                                  </div>
                                                  <!-- /.box-body -->
                                    
                                                  <div class="box-footer">
                                                    <input type="hidden"  name="bid"  value="<?php echo $mrc['id'];?>">
                                                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
                                                    <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                                                  </div>
                                                </form>
											
										</div>
										
									</div>
								</div>
							</div>
                                           
                                        </td>
										
                                        <td>
                                          <a href="delete/brandcategory.php?cid=<?php echo $mrc['id'];?>" onClick="if(confirm('Are You Sure Want To Delete This Record')){ return true;} else { return false; }"  class="label label-sm label-danger" title="Delete" style="text-decoration: none;"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
									</tr>
								<?php  $i++; } ?>
                                    <tfoot>
                                    <tr>
																				<th width="1%"></th>
																				<th class="text-nowrap">Category Name</th>
																				<th class="text-nowrap">Status</th>
																				<th class="text-nowrap">Edit</th>
                                        <th class="text-nowrap">Delete</th>
									</tr>
                                    </tfoot>
								</tbody>
							</table>
						<!-- end panel-body -->
					</div>
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
			TableManageResponsive.init();
		});
	</script>
    <!------------------------------>    
 <script>
function updateId(id)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            //alert(xmlhttp.responseText);
        }
    };
    xmlhttp.open("GET", "status/brandcategory.php?id=" +id, true);
    xmlhttp.send();
}
</script>
 <!--------------------------------------->  


</body>
</html>
