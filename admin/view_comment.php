<?php
require('checksession.php');
@extract($_REQUEST);
include 'includes/function.php'; 
if(isset($_POST['Dectivate']) && $bb!='')
{
		foreach($bb as $act)
		{
			mysqli_query($conn,"update tbl_comments set status='0' where id='$act'");
		}
}

		
if(isset($_POST['Activate']) && $bb!='')
{
		foreach($bb as $act)
		{
			mysqli_query($conn,"update tbl_comments set status='1' where id='$act'");
		}
}
		

if(isset($_POST['Delete']) && $bb!='')
{
		foreach($bb as $act)
		{
			mysqli_query($conn,"delete from tbl_comments where id='$act'");
		}
}
		
		$mqry="select * from tbl_comments ";
		$mqry.=" order by id desc";

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
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Blog</a></li>
				<li class="breadcrumb-item active">Managed Blog</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Managed Blog </h1>
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
							<h4 class="panel-title">Manage Blog</h4>
						</div>
						<!-- end panel-heading -->
                       <form name="myform" method="post" action=""> 
						<!-- begin alert -->
						<div class="alert alert-secondary fade show">
							<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">&times;</span>
							</button>
                            <div class="btn-group btn-group-justified">
                              <input type="Submit" name="Activate" value="Activate" class="btn btn-info btn-flat"> 
                              <input type="Submit" name="Dectivate" value="Dectivate" class="btn btn-info btn-flat"> 
                              <input type="Submit" name="Delete" class="btn btn-info btn-flat" value="Delete" onClick="if(confirm('Are You Sure Want To Delete This Record')){ return true;} else { return false; }">
                            </div>
							
						</div>
						<!-- end alert -->
						<!-- begin panel-body -->
						<div class="panel-body">
							<table id="data-table-responsive" class="table table-striped table-bordered">
                              <thead>
                                  <tr>
                                      <th style="text-align:center">Sr.No.</th>
                                      <!--<th  class="nosort" style="text-align:center"><h3>sortorder</h3></th>-->
                                      <th class="nosort" style="text-align:center">Name</th>
                                      <th class="nosort" style="text-align:center">Email</th>
                                      <th class="nosort" style="text-align:center">Message</th>
                                      <!--<th class="nosort" style="text-align:center"><h3>Trainer Name</h3></th>
                                      <th class="nosort" style="text-align:center"><h3>Level</h3></th>
                                      <th class="nosort" style="text-align:center"><h3>Image</h3></th>-->
                                      <th class="nosort" style="text-align:center">Status</th>
                                      <th class="nosort"style="text-align:center">Reply</th>
                                      <th class="nosort" style="text-align:center">Select</th>
                                  </tr>
                              </thead>
                             <tbody>
              <?php $count=1; $fetch=mysqli_query($conn,$mqry);
			  while($web=mysqli_fetch_array($fetch)) { ?>
                <tr>
                    <td style="text-align:center"><?php echo $count;?></td>
					<!--<td style="text-align:center"><?php echo $web['sort'];?></td>-->
					<td style="text-align:center"><?php echo $web['name'];?></td>
					<td style="text-align:center"><?php echo $web['email'];?></td>
					<td style="text-align:center"><?php echo $web['message'];?></td>
					<!--<td style="text-align:center"><?php echo $web['trainer'];?></td>
					<td style="text-align:center"><?php echo $web['level'];?></td>
					<td style="text-align:center"><img src="../images/info/<?php echo $web['img']; ?>"  style="width:150px; height:70px;"  /></td>-->
                    <td style="text-align:center"><?php if( $web['status']=='1'){echo "Active";} else {echo "Inactive";}?></td>
                    <td style="text-align:center"><a href="reply.php?eid=<?php echo $web['id'];?>" title="Edit">Reply</a></td>
                    <td align="center"><input type="checkbox" value="<?php echo $web['id']; ?>" name="bb[]" id="bb[]"></td>
                </tr>
               <?php $count++; }?>
            </tbody>
							</table>
						</div>
						<!-- end panel-body -->
                        </form>
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
    xmlhttp.open("GET", "status/blog.php?id=" +id, true);
    xmlhttp.send();
}
</script>
</body>
</html>
