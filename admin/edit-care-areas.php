<?php
require('checksession.php');
include 'includes/function.php';


$b = $_REQUEST['eid'];
$bdata = mysqli_query($conn, "SELECT * FROM `tbl_care_areas` where `id`='$b'");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) 
{
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $subtitle = mysqli_real_escape_string($conn, $_POST['subtitle']);
  $position = mysqli_real_escape_string($conn, $_POST['position']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  $alt = mysqli_real_escape_string($conn, $_POST['alt']);
  
    $bimages=$_FILES['bimage']['name'];
    if($bimages!='')
    {
        $unq= rand(1111, 9999);
        $bimage=$unq."_".$bimages;
        move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/brand/".$bimage);
    
    }else{
     $bimage= $brec['image'];
    }
    
    
      $alt2 = mysqli_real_escape_string($conn, $_POST['alt2']);
  
    $bimages2=$_FILES['bimage2']['name'];
    if($bimages2!='')
    {
        $unq= rand(1111, 9999);
        $bimage2=$unq."_".$bimages2;
        move_uploaded_file($_FILES["bimage2"]["tmp_name"], "../uploads/brand/".$bimage2);
    
    }else{
     $bimage2= $brec['image2'];
    }

  $query = mysqli_query($conn, "UPDATE `tbl_care_areas` SET `brand_id`='$category',`title`='$title',`alt`='$alt',`alt2`='$alt2',`subtitle`='$subtitle',`status`='$status',`sort`='$position',`image`='$bimage',`image2`='$bimage2' WHERE `id`='$b'");

  if ($query == true) 
  {
    $_SESSION['success'] = "Updated Successfully";
    header("Refresh:2; url=manage-care-areas.php");
  } 
  else 
  {
    $_SESSION['error'] = "Something went wrong. Please try again";
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
      <li class="breadcrumb-item"><a href="javascript:;">Manage Care Areas</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">Edit Care Areas</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edit Care Areas</h1>
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
            <h4 class="panel-title">Edit Care Areas</h4>
          </div>
          <!-- end panel-heading -->

          <!-- begin panel-body -->
          <div class="panel-body">
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                  
                        <div class="form-group">
                            <label for="heading">Select Category</label>
                            <select name="category" class="form-control" onchange="updateCategory(this.value)" required>
                                <option>Select Category</option>
                                <?php
                                $cdata = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE  `status`='1' ");
                                while ($crec = mysqli_fetch_array($cdata)) 
                                {
                                  if($brec["brand_id"]==$crec["id"])
                                  {
                                    ?>
                                      <option value="<?= $crec['id']; ?>" selected><?= $crec['heading']; ?></option>
                                  <?php
                                  }
                                  else
                                  {
                                      ?>
                                      <option value="<?= $crec['id']; ?>"><?= $crec['heading']; ?></option>
                                    <?php
                                  }
                                }
                                ?>
                            </select>
                        </div>

                <div class="form-group">
                    <label for="banner">Enter Title</label>
                    <input type="text" name="title" class="form-control" id="banner" value="<?= $brec['title']; ?>">
                </div>
                
                <div class="form-group">
                    <label for="banner">Enter Subtitle</label>
                    <input type="text" name="subtitle" class="form-control" id="banner" value="<?= $brec['subtitle']; ?>">
                </div>
                
                
                <div class="form-group">
                  <label for="exampleInputFile">File Input</label>
                  <input type="file" name="bimage" class="form-control" id="exampleInputFile">
                  <p class="help-block">Image dimension must be 512 X 512 & must be jpg format</p>
                  <img style="background:gray; width:20%;" src="../uploads/brand/<?= $brec['image']; ?>">
                </div>
                <div class="form-group">
                    <label for="banner">Enter Alt</label>
                    <input type="text" name="alt" class="form-control" value="<?= $brec['alt']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">File Input 2</label>
                  <input type="file" name="bimage2" class="form-control" id="exampleInputFile">
                  <p class="help-block">Image dimension must be 512 X 512 & must be jpg format</p>
                  <img style="background:gray; width:20%;" src="../uploads/brand/<?= $brec['image2']; ?>">
                </div>
                <div class="form-group">
                    <label for="banner">Enter Alt</label>
                    <input type="text" name="alt2" class="form-control" value="<?= $brec['alt2']; ?>">
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">Position</label>
                    <input type="number" name="position" class="form-control" id="exampleInputPassword1" value="<?= $brec['sort']; ?>">
                </div>

                <div class="form-group">
                  <input type="radio" value="1" id="optionsRadios3" name="status" <?php if ($brec['status'] == '1') { echo 'checked'; } ?>>
                  <label for="optionsRadios3">Active</label>
                  <input type="radio" value="0" id="optionsRadios4" name="status" <?php if ($brec['status'] == '0') { echo 'checked'; } ?>>
                  <label for="optionsRadios4">Inactive</label>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-primary">Click Here To Update</button>
                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
              </div>
            </form>
          </div>
          <!-- end panel-body -->
        </div>
        <!-- end panel -->
      </div>
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

</body>

</html>