<?php
require('checksession.php'); 
include 'includes/function.php'; 
$condata=mysqli_query($conn,"SELECT * FROM `tbl_divisionpage`");
$conrec=mysqli_fetch_array($condata);

if(isset($_POST['add']))
{

$title = mysqli_real_escape_string($conn,$_POST['div_page']);
 if(!empty($_FILES["aimage"]["name"])) {   
  $aimage=$_FILES['aimage']['name'];
  $aimage=time()."_".$aimage; 
  move_uploaded_file($_FILES['aimage']['tmp_name'],"../uploads/division/".$aimage);
  }else{
 $aimage = $conrec['image'];
}
$condata=mysqli_query($conn,"SELECT * FROM `tbl_divisionpage` where d_id='$title'");
$conrec=mysqli_num_rows($condata);

  if($conrec>0) { // if data exist update the data
    $_SESSION['error']="Data is already inserted";
}
  
    else{ // insert the data if data is not exist
      $query=mysqli_query($conn,"insert into `tbl_divisionpage` SET `d_id`='$title',`image`='$aimage'");
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
				<li class="breadcrumb-item active">Manage Service</li>
			</ol>
			<!-- begin page-header -->
			<h1 class="page-header">Manage Service</h1>
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
							<h4 class="panel-title">Manage Service</h4>
						</div>
						<!-- begin panel-body -->
						<div class="panel-body">                 
		<form role="form" method="POST"  enctype="multipart/form-data">
              <div class="box-body">
                 <div class="row"> 

                <div class="form-group col-5">
                  <label for="heading">Homepage Service Title</label>
                  <select name="div_page" class="form-control" required>
                       <option disabled>Select Category</option>
                       <?php
                        $cdata=mysqli_query($conn,"SELECT * FROM `tbl_division` WHERE  `status`='1' ");
                        while($crec=mysqli_fetch_array($cdata))
                        {
                       ?> 
                          
                        <option value="<?= $crec['id']; ?>"><?= $crec['title']; ?></option>
                             <?php 
                       } 
                       ?>  
                  </select>
                  
                </div>  

                

                
                <div class="form-group col-5">
                  <label for="exampleInputPassword1">Homepage Service Image</label>
                  <input type="file"  name="aimage" class="form-control" id="exampleInputPassword1" >
                  <p class="help-block">Image must be 1600 X 400 jpg png format</p>
                </div>
                <div class="form-group col-2">
                <label for="exampleInputPassword1" style="display: block;">&nbsp;</label>
                <button type="submit" name="add" class="btn btn-primary">Add</button>
               
              </div>
              </div>


              <!-- /.box-body -->

              
            </form>
						</div>
            
						<!-- end panel-body -->
					</div>


           
						<!-- begin alert -->
						<div class="alert alert-secondary fade show">
							
						
						</div>
						<!-- end alert -->
						<!-- begin panel-body -->
						<div class="panel-body">
							<table id="data-table-responsive" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th width="1%">S.No</th>
										<th width="1%" data-orderable="false">Image</th>               
                    <th width="1%" class="text-nowrap">Title</th>
                    <th width="1%" class="text-nowrap">Edit</th>
                    <th width="1%" class="text-nowrap">Delete</th>
                    
									</tr>
								</thead>
								<tbody>
<?php $count=1; $condata=mysqli_query($conn,"SELECT * FROM `tbl_divisionpage`");

  
  
  


while( $web=mysqli_fetch_array($condata))
{

$dp= $web['d_id'];
$cond = mysqli_query($conn,"SELECT * FROM `tbl_division` where id='$dp'");
$web2=mysqli_fetch_array($cond);
?>

<tr class="odd gradeX">
<td width="1%" class="f-s-600 text-inverse"><?php echo $web['id'];?></td>
<td width="1%" class="with-img"><img src="../uploads/division/<?php echo $web['image'];?>" class="img-rounded height-60" /></td>

<td width="1%" class="f-s-600 text-inverse"><?php echo $web2['title'];?></td>
<td><a href=""  data-toggle="modal" data-target="#exampleModal<?=$count;?>" class='label label-sm label-primary'  title="Edit division" ><i class="fa fa-edit"></i> EDIT</a></td>
<td><a href="delete/division_page.php?bid=<?php echo $web['id'];?>" class='label label-sm label-danger' data-toggle="tooltip" title="Delete division" ><i class="fa fa-trash"></i> DELETE</a></td>

</tr>
                  <div class="modal fade" id="exampleModal<?=$count;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <form role="form" method="POST" action="edit-divisionpage.php"  enctype="multipart/form-data">                  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel-body">                 
		
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="bid" value="<?=$web['id'];?>">
                  <label for="heading">Homepage Service Title</label>
                  
                  <div class="form-group">
                  <input type="text"  name="title" class="form-control" id="one" value="<?=$web2['title'];?>" readonly>
                </div>           
                </div>  

                

                <div class="row">  
                <div class="form-group col-9">
                  <label for="exampleInputPassword1">Homepage Service Image</label>
                  <input type="file"  name="aimage" class="form-control" id="exampleInputPassword1" >
                  <input type="hidden"  name="oldimg" class="form-control" value="<?= $web['image']; ?>" >
                  <p class="help-block">Image must be 1600 X 400 jpg png format</p>
                </div>
               
              </div>
              <input type="submit" name="update" class="btn btn-primary">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    
      </div>
      
    </div>
  </div></form>
</div>


								<?php $count++; }?>	
                                    
								</tbody>
							</table>
						</div>
						<!-- end panel-body -->
                      
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
