<?php
require('checksession.php');
include 'includes/function.php';


$b = $_REQUEST['eid'];
$bdata = mysqli_query($conn, "SELECT * FROM `tbl_project_videos` where `id`='$b'");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) 
{
  $url = mysqli_real_escape_string($conn, $_POST['url']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $position = mysqli_real_escape_string($conn, $_POST['position']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);

  $query = mysqli_query($conn, "UPDATE `tbl_project_videos` SET `c_id`='$category',`url`='$url',`sort`='$position',`status`='$status' WHERE `id`='$b'");

  if ($query == true) 
  {
    $_SESSION['success'] = "Patients Speaks Updated Successfully";
    header("Refresh:2; url=manage-patients_speaks.php");
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
      <li class="breadcrumb-item"><a href="javascript:;">Manage Patients Speaks</a></li>
      <li class="breadcrumb-item"><a href="javascript:;">Edit Patients Speaks</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edit Patients Speaks</h1>
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
            <h4 class="panel-title">Edit Patients Speaks</h4>
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
                                $cdata = mysqli_query($conn, "SELECT * FROM `tbl_brand` WHERE  `status`='1' ");
                                while ($crec = mysqli_fetch_array($cdata)) 
                                {
                                  if($brec["c_id"]==$crec["id"])
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
                    <label for="banner">Enter Project Url</label>
                    <input type="text" name="url" class="form-control" id="banner" value="<?= $brec['url']; ?>">
                    <iframe src="<?= $brec['url']; ?>" frameborder="0"></iframe>
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

  <?php require("includes/footer-data.php"); ?>

  <script>
    $(document).ready(function() {
      App.init();
      TableManageResponsive.init();
    });
  </script>

</body>

</html>