<?php
require('checksession.php');
include 'includes/function.php';

$id = $_REQUEST['bid'];
$bdata = mysqli_query($conn, "SELECT * FROM `tbl_brand` where `id`='$id'");
$brec = mysqli_fetch_array($bdata);

if (isset($_POST['update'])) {
  
  $phpdate = date("Y/m/d");
  $category = mysqli_real_escape_string($conn, $_POST['category_id']);
  $heading = mysqli_real_escape_string($conn, $_POST['heading']);
  $pgurl = mysqli_real_escape_string($conn, $_POST['pgurl']);
  $rewriteurl = str_replace(array('\'', '"', '&', '$', '@', '#', '--', '---', '(', ')', '[', ']', '.', '/', '_', '?', ' ', ',', ';', '<', '>'), '-', $pgurl);
  $newurl = strtolower($rewriteurl);
  $des = mysqli_real_escape_string($conn, $_POST['des']);
  $shortdes = mysqli_real_escape_string($conn, $_POST['shortdes']);
  $metatag = mysqli_real_escape_string($conn, $_POST['metatag']);
  $keyword = mysqli_real_escape_string($conn, $_POST['keyword']);
  $metadesc = mysqli_real_escape_string($conn, $_POST['metadesc']);
  $head_detail = mysqli_real_escape_string($conn, $_POST['head_detail']);
  $position = mysqli_real_escape_string($conn, $_POST['position']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  $alt1 = mysqli_real_escape_string($conn, $_POST['alt1']);
  $alt2 = mysqli_real_escape_string($conn, $_POST['alt2']);
  $alt3 = mysqli_real_escape_string($conn, $_POST['alt3']);

  $bimage = $_FILES['bimage']['name'];
  if($bimage!='')
  {
      $bimage = time() . "_" . $bimage;
      @unlink("../uploads/brand/" . $brec['image']);
      move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/brand/" . $bimage);
  }
 else 
 {
    $bimage = $brec['image'];
  }


  $cimage = $_FILES['cimage']['name'];
  if($cimage!='')
  {
      $cimage = time() . "_" . $cimage;
      @unlink("../uploads/brand/" . $brec['icon']);
      move_uploaded_file($_FILES["cimage"]["tmp_name"], "../uploads/brand/" . $cimage);
  }
 else {
    $cimage = $brec['icon'];
  }

  $dimage = $_FILES['dimage']['name'];
  if($dimage!='')
  {
      $dimage = time() . "_" . $dimage;
      @unlink("../uploads/brand/" . $brec['breadcrumb']);
      move_uploaded_file($_FILES["dimage"]["tmp_name"], "../uploads/brand/" . $dimage);
  }
  else {
    $dimage = $brec['breadcrumb'];
  }

  $eimage = $_FILES['eimage']['name'];
  if($eimage!='')
  {
     $eimage = time() . "_" . $eimage;
      @unlink("../uploads/brand/" . $brec['main_image']);
      move_uploaded_file($_FILES["eimage"]["tmp_name"], "../uploads/brand/" . $eimage);
  }
  else {
    $eimage = $brec['main_image'];
  }

  $query = mysqli_query($conn, "UPDATE `tbl_brand` SET `category_id`='0',`heading`='$heading',`url`='$newurl',`des`='$des',`alt1`='$alt1',`alt2`='$alt2',`alt3`='$alt3',`shortdes`='$shortdes',`image`='$bimage',`icon`='$cimage',`breadcrumb`='$dimage',`metatag`='$metatag',`keyword`='$keyword',`metadesc`='$metadesc',`sort`='$position',`status`='$status',`date`='$phpdate',`main_image`='$eimage',`head_detail` = '$head_detail' WHERE `id`='$id'");
  if ($query == true) {
    $_SESSION['success'] = "Data Updated successfully";
    header("refresh:3;url=manage-brand.php");
  } else {
    // Message for unsuccessfull insertion
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
      <li class="breadcrumb-item"><a href="javascript:;">Brand Management</a></li>
      <li class="breadcrumb-item active">Edit Brand</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Manage Brand</h1>
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
            <h4 class="panel-title">Edit Brand</h4>
          </div>
          <!-- end panel-heading -->

          <!-- begin panel-body -->
          <div class="panel-body">
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="box-body">

                <div class="row" style="display:none;">
                  <div class="form-group col-md-12">
                    <label class="control-label">Brand Category<span class="vd_red">*</span></label>
                    <select name="category_id" class="form-control">
                      <option disabled>Select Project Category</option>
                      <?php
                      $cdata = mysqli_query($conn, "SELECT * FROM `tbl_brandcategory` WHERE `status`='1' ");
                      while ($crec = mysqli_fetch_array($cdata)) {
                        if ($crec['id'] == $brec['category_id']) {
                          echo "<option value='$crec[id]' selected>$crec[name]</option>";
                        } else {
                          echo "<option value='$crec[id]'>$crec[name]</option>";
                        }
                      } ?>
                    </select>
                  </div>

                </div>

                <div class="form-group">
                  <label for="one">Brand Heading</label>
                  <input type="text" name="heading" class="form-control" id="one" value="<?= $brec['heading']; ?>">
                </div>

                <div class="form-group">
                  <label for="two">News Url</label>
                  <input type="text" name="pgurl" value="<?= $brec['url']; ?>" class="form-control" id="two">
                </div>

                <div class="form-group">
                  <label for="one">Short Description</label>
                  <input type="text" name="shortdes" class="form-control" id="one" value="<?= $brec['shortdes']; ?>">
                </div>

                <div class="form-group">
                  <label for="aa"> Description</label>
                  <textarea name="des" class="editor1 form-control" id="editor1" rows="12"><?= $brec['des']; ?></textarea>

                </div>

                <div class="form-group">
                  <label for="bannerlink">HomePage Image File</label><code>Image Size should be 706px X 193px in png and White image</code>
                  <input type="file" name="bimage" class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg" value="<?= $brec['image']; ?>">
                  <img src="../uploads/brand/<?= $brec['image']; ?>" width="100" height="40" class="bg-dark">
                </div>
                <div class="form-group">
                  <label for="one">Alt</label>
                  <input type="text" name="alt1" class="form-control" placeholder="Enter Alt" value="<?= $brec['alt1']; ?>">
                </div>



                <div class="form-group">
                  <label for="bannerlink">Header Icon File</label><code>Icon Size should be 512px X 512px in png</code>
                  <input type="file" name="cimage" class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg2" value="<?= $brec['icon']; ?>">
                  <img src="../uploads/brand/<?= $brec['icon']; ?>" width="100" height="40">
                </div>
                
                <div class="form-group">
                  <label for="one">Alt</label>
                  <input type="text" name="alt2" class="form-control" placeholder="Enter Alt" value="<?= $brec['alt2']; ?>">
                </div>

                <div class="form-group">
                  <label for="bannerlink">Breadcrumb File</label><code>Image Size should be 1920px X 250px in png or jpg</code>
                  <input type="file" name="dimage" class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg3" value="<?= $brec['breadcrumb']; ?>">
                  <img src="../uploads/brand/<?= $brec['breadcrumb']; ?>" width="100" height="40">
                </div>

                <div class="form-group">
                  <label for="bannerlink">Main Image File</label><code>Image Size should be 1920 X 800 in png or jpg</code>
                  <input type="file" name="eimage" class="form-control" id="bannerlink">
                  <input type="hidden" name="oldimg4" value="<?= $brec['main_image']; ?>">
                  <img src="../uploads/brand/<?= $brec['main_image']; ?>" width="100" height="40">
                </div>
                <div class="form-group">
                  <label for="one">Alt</label>
                  <input type="text" name="alt3" class="form-control" placeholder="Enter Alt" value="<?= $brec['alt3']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Sort Number</label>
                  <input type="number" name="position" class="form-control" id="exampleInputPassword1" value="<?= $brec['sort']; ?>">
                </div>

                <div class="form-group">
                  <input type="radio" value="1" id="optionsRadios3" name="status" <?php if ($brec['status'] == '1') {
                                                                                    echo 'checked';
                                                                                  } ?>>
                  <label for="optionsRadios3">Active</label>
                  <input type="radio" value="0" id="optionsRadios4" name="status" <?php if ($brec['status'] == '0') {
                                                                                    echo 'checked';
                                                                                  } ?>>
                  <label for="optionsRadios4">Inactive</label>
                </div>

                <div id="dvPassport" style="display:none; border: 1px solid #242a30;padding: 10px;background: #fdfbef;">
                  <div class="form-group">
                    <label for="metatag">Meta Title</label>
                    <input type="text" name="metatag" id="metatag" value="<?= $brec['metatag']; ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="keyword">Meta Keyword</label>
                    <textarea name="keyword" id="keyword" class="form-control"><?= $brec['keyword']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="metadescription">Meta Description</label>
                    <textarea name="metadesc" id="metadescription" class="form-control"><?= $brec['metadesc']; ?></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="head_detail">Head Detail</label>
                    <textarea name="head_detail" id="head_detail" class="form-control"><?= $brec['head_detail']; ?></textarea>
                  </div>
                </div> <br />

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
    });
  </script>
  <script>
    $(function() {
      $("#btnPassport").click(function() {
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