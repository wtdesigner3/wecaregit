<?php
require('checksession.php');
include 'includes/function.php';
$condata = mysqli_query($conn, "SELECT * FROM `tbl_home_extra`");
$conrec = mysqli_fetch_array($condata);
if (isset($_POST['update'])) {
    $blog_title = mysqli_real_escape_string($conn, $_POST['blog_title']);
    $blog_subtitle = mysqli_real_escape_string($conn, $_POST['blog_subtitle']);
    $trusted_title = mysqli_real_escape_string($conn, $_POST['trusted_title']);
    $trusted_subtitle = mysqli_real_escape_string($conn, $_POST['trusted_subtitle']);
    $contact_title = mysqli_real_escape_string($conn, $_POST['contact_title']);
    $contact_subtitle = mysqli_real_escape_string($conn, $_POST['contact_subtitle']);

    $query = mysqli_query($conn, "UPDATE `tbl_home_extra` SET `blog_title`='$blog_title',`blog_subtitle`='$blog_subtitle',`trusted_title`='$trusted_title',`trusted_subtitle`='$trusted_subtitle',`contact_title`='$contact_title',`contact_subtitle`='$contact_subtitle'");
    if ($query) {
        $_SESSION['success'] = "About us Updated Successfull";
        header("refresh: 3;");
    } else {
        $_SESSION['error'] = "Something Error";
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
            <li class="breadcrumb-item active">Manage About</li>
        </ol>
        <!-- begin page-header -->
        <h1 class="page-header">Manage About</h1>
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
                        <h4 class="panel-title">Manage About</h4>
                    </div>
                    <!-- begin panel-body -->
                    <div class="panel-body">
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="heading">Blog Title</label>
                                        <input type="text" name="blog_title" class="form-control"
                                            placeholder="Enter Blog Title" value="<?= $conrec['blog_title']; ?>">
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="heading">Blog Subtitle</label>
                                        <input type="text" name="blog_subtitle" class="form-control" id="heading"
                                            placeholder="Enter Sub Title" value="<?= $conrec['blog_subtitle']; ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="heading">Trusted Title</label>
                                        <input type="text" name="trusted_title" class="form-control"
                                            placeholder="Enter Trusted Title" value="<?= $conrec['trusted_title']; ?>">
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="heading">Trusted Subtitle</label>
                                        <input type="text" name="trusted_subtitle" class="form-control" id="heading"
                                            placeholder="Enter Sub Title" value="<?= $conrec['trusted_subtitle']; ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="heading">Contact Title</label>
                                        <input type="text" name="contact_title" class="form-control"
                                            placeholder="Enter Contact Title" value="<?= $conrec['contact_title']; ?>">
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="heading">Contact Subtitle</label>
                                        <input type="text" name="contact_subtitle" class="form-control" id="heading"
                                            placeholder="Enter Contact Sub Title" value="<?= $conrec['contact_subtitle']; ?>">
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                                <!-- <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                                <input id="btnPassport" type="button" class="btn btn-warning" value="Use Seo tools"
                                    name="btnPassport" /> -->
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