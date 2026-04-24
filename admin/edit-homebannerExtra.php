<?php
require('checksession.php');
include '../inc/function.php';

$b = $_REQUEST['cid'];
$bdata = mysqli_query($conn, "SELECT * FROM `tbl_hmbanner_extra` where `id`='$b'");
$brec = mysqli_fetch_array($bdata);
if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $alt = mysqli_real_escape_string($conn, $_POST['alt']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $sort = mysqli_real_escape_string($conn, $_POST['sort']);
    $old = mysqli_real_escape_string($conn, $_POST['oldimg']);
    $bimage = $_FILES['bimage']['name'];
    if ($bimage != "") {
        $bimage = time() . "_" . $bimage;
        @unlink("../uploads/home/" . $old);
        move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/home/" . $bimage);
    } else {
        $bimage = $brec['image'];
    }

    $query = mysqli_query($conn, "UPDATE `tbl_hmbanner_extra` SET `image`='$bimage',`content`='$content',`title`='$title',`alt`='$alt',`sort`='$sort', `status`='$status' WHERE `id`='$b'");
    if ($query == true) {
        $_SESSION['success'] = "Updated successfully";
        header("refresh:3;url=manage-homebannerExtra.php");
    } else {
        $_SESSION['error'] = "Something went wrong";
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
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">Home Why Us Extra Management</a></li>
            <li class="breadcrumb-item active">Edit Home Why Us Extra</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header"><a href="javascript:;" onClick="javascript:history.go(-1)"
                class="btn btn-l btn-icon btn-circle btn-primary" data-click="panel-remove"><i
                    class="fa fa-arrow-left"></i></a> Manage Home Why Us Extra</h1>
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
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                                data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                                data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                                data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                                data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Edit Home Why Us Extra</h4>
                    </div>
                    <!-- end panel-heading -->

                    <!-- begin panel-body -->
                    <div class="panel-body">
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="heading">Enter Title</label>
                                    <input type="text" name="title" class="form-control" id="heading"
                                        value="<?= $brec['title']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="content1">Enter Content</label>
                                    <textarea name="content" class="form-control" id="content1"><?= $brec['content']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="bannerlink">Position</label>
                                    <input type="number" name="sort" value="<?= $brec['sort']; ?>" class="form-control"
                                        id="bannerlink">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" name="bimage" class="form-control" id="exampleInputFile">
                                    <input type="hidden" name="oldimg" value="<?= $brec['image']; ?>">
                                    <p class="help-block">Image dimension must be 512 × 512 px & must be jpg format</p>
                                    <img src="../uploads/home/<?= $brec['image']; ?>" style="width:10%;background:gray">
                                </div>
                                <div class="form-group">
                                    <label for="heading">Enter Alt</label>
                                    <input type="text" name="alt" class="form-control" value="<?= $brec['alt']; ?>">
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

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="update" class="btn btn-primary">Click Here To
                                    Update</button>
                                <button type="reset" name="reset" class="btn btn-danger">Reset</button>

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
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
            class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <?php require("includes/footer.php"); ?>

    <script>
        $(document).ready(function () {
            App.init();
            initSample();
            CKEDITOR.replace('editor1', {
                filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
            });
            CKEDITOR.replace('editor2', {
                filebrowserUploadUrl: 'assets/ckeditor/samples/get_imagelink.php',
            });
        });
    </script>
    <!------------------------>

    <!------------------------------>

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