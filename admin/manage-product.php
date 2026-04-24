<?php
require('checksession.php');
@extract($_REQUEST);
include 'includes/function.php'; 
// include("export_products.php");
if(isset($_POST['Dectivate']) && $bb!='')
{
		foreach($bb as $act)
		{
			mysqli_query($conn,"update tbl_product set p_status='0' where p_id='$act'");
		}
}		
if(isset($_POST['Activate']) && $bb!='')
{
		foreach($bb as $act)
		{
			mysqli_query($conn,"update tbl_product set p_status='1' where p_id='$act'");
		}
}
if(isset($_POST['Delete']) && $bb!='')
{
		foreach($bb as $act)
		{
			mysqli_query($conn,"delete from tbl_product where p_id='$act'");
		}
}
		$mqry="select * from tbl_product";
		$mqry.=" order by p_id Desc";

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
				<li class="breadcrumb-item"><a href="javascript:;">Product</a></li>
				<li class="breadcrumb-item active">Manage Product</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"> <a href="javascript:;" onClick="javascript:history.go(-1)" class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i class="fa fa-arrow-left"></i></a> Manage Product </h1>
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
							<h4 class="panel-title">Manage Product</h4>
						</div>
						<!-- end panel-heading -->
                       <form name="myform" method="post" action=""> 
						<!-- begin alert -->
						<div class="alert alert-secondary fade show">
							<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">&times;</span>
							</button>
							<div class="btn-group btn-group-justified">
                              <a href="add-product.php" class="btn btn-default active"><i class="fa fa-plus"></i> Add New Product</a>
                              <!-- <a href="import-product.php" class="btn btn-info btn-flat">Import Excel</a> -->
                                 <!-- <button type="Submit" id="export_data" name='export_data' class="btn btn-white btn-flat">Download Excel</button> -->
                              <input type="Submit" name="Activate" value="Activate" class="btn btn-info btn-flat"> 
                              <input type="Submit" name="Dectivate" value="Dectivate" class="btn btn-warning btn-flat"> 
                              <input type="Submit" name="Delete" class="btn btn-danger btn-flat" value="Delete" onClick="if(confirm('Are You Sure Want To Delete This Record')){ return true;} else { return false; }">
                            </div>
						</div>
						<!-- end alert -->
						<!-- begin panel-body -->
						<div class="panel-body">
                         <div class="table-responsive">
							<table id="data-table-responsive" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th width="1%"></th>
										<th width="1%" data-orderable="false"></th>
										<th width="5%">Category</th>
                                        <th width="5%">Subcategory</th>
                                      <!--   <th width="5%">S-Subcategory</th>
                                        <th width="5%">SS-Subcategory</th> -->

                                        <th class="text-nowrap">Product</th>
                                          <!--  <th width="10%">Variety</th> -->
										<!-- <th class="text-nowrap">P-Code</th> -->
                                        <!-- <th class="text-nowrap">P-Weight</th> -->
										<th width="1%">Status</th>
										<th width="1%">Edit</th>
										<th width="1%">Delete</th>
                                        <th width="1%">
											 <input type="checkbox" id="select_all">
                                         </th>
									</tr>
								</thead>
								<tbody>
                                <?php $count=1; $fetch=mysqli_query($conn,$mqry);
			                          while($web=mysqli_fetch_array($fetch)) { 
									  $pcdata=mysqli_query($conn,"select * from `tbl_category` where `c_id`='".$web['category_id']."'");
                                      $pcrec=mysqli_fetch_array($pcdata);

									  $pdata=mysqli_query($conn,"select * from `tbl_subcategory` where `sc_id`='".$web['subcategory_id']."'");
                                      $prec=mysqli_fetch_array($pdata);

                                      

			                    ?>
									<tr class="odd gradeX" style="font-weight: 600;">
										<td width="1%" class="f-s-600 text-inverse"><?php echo $count;?></td>
										<td width="1%" class="with-img"><img src="../uploads/product/<?= $web['p_image']; ?>"  width="80px" class="img-rounded" /></td>
                                        <td  style="font-weight: 600; color: black;"><?= $pcrec['c_name'];?></td>
                                         <td  style="font-weight: 600; color: black;"><?= $prec['sc_name'];?></td>

										<td style="color: black;font-weight: 700; "><?php echo $web['p_name'];?></td>
										<!-- <?php 
 $mqry=mysqli_query($conn,"SELECT * FROM `tbl_pricesize` WHERE `product_id`='$web[p_id]' order by ps_id ASC");
 $hj = mysqli_num_rows($mqry);

?>
 <td><a target="_blank" href="price-size.php?pid=<?php echo $web['p_id']; ?>">Variety<code style="color: red;">(<?= $hj;?>)</code></a></td> -->

										<!-- <td style="font-weight: 700; color: blue;"><?php echo $web['p_code'];?></td> -->
                                  
										<td>
                                        	<div class="switcher">
                                              <input type="checkbox" onClick="updateId('<?php echo $web['p_id']; ?>')" name="switcher_checkbox_1" id="switcher_checkbox_<?php echo $web['p_id']; ?>" <?php if( $web['p_status']=='1'){ echo "checked"; }else {} ?> value="1">
                                              <label for="switcher_checkbox_<?php echo $web['p_id'];?>"></label>
                                            </div>
                                        </td>
										
										<td>
                                          <a href="edit-product.php?cid=<?= $web['p_id'];?>" class="label label-sm label-primary" data-toggle="tooltip" title="Edit Product!"><i class="fa fa-edit"></i> Edit</a>
										</td> 
										<td>
                                            <a href="delete/product.php?cid=<?= $web['p_id'];?>" class="label label-sm label-danger" data-toggle="tooltip" title="Delete Product!"><i class="fa fa-trash"></i> Delete</a>
										</td> 
                                        <td>
                                          <input type="checkbox" class="checkbox" value="<?php echo $web['p_id']; ?>" name="bb[]" id="bb[]">
                                        </td>
									</tr>
								<?php $count++; }?>	
                                    
								</tbody>
							</table>
						</div>
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
    xmlhttp.open("GET", "status/product.php?id=" +id, true);
    xmlhttp.send();
}
</script>
 <!--------------------------------------->  
	<script type="text/javascript">
    $(document).ready(function(){
        $('#select_all').on('click',function(){
            if(this.checked){
                $('.checkbox').each(function(){
                    this.checked = true;
                });
            }else{
                 $('.checkbox').each(function(){
                    this.checked = false;
                });
            }
        });
        $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#select_all').prop('checked',true);
            }else{
                $('#select_all').prop('checked',false);
            }
        });
    });
    </script>
</body>
</html>
