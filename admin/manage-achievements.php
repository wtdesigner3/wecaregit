<?php
require('checksession.php');
include 'includes/function.php';
$condata = mysqli_query($conn, "SELECT * FROM `tbl_achievement`");
$conrec = mysqli_fetch_array($condata);
if (isset($_POST['update'])) {
    $number1 = mysqli_real_escape_string($conn, $_POST['number1']);
    $text1 = mysqli_real_escape_string($conn, $_POST['text1']);
    $number2 = mysqli_real_escape_string($conn, $_POST['number2']);
    $text2 = mysqli_real_escape_string($conn, $_POST['text2']);
    $number3 = mysqli_real_escape_string($conn, $_POST['number3']);
    $text3 = mysqli_real_escape_string($conn, $_POST['text3']);
    $number4 = mysqli_real_escape_string($conn, $_POST['number4']);
    $text4 = mysqli_real_escape_string($conn, $_POST['text4']);

    // image one
    // if (!empty($_FILES["aimage"]["name"])) {

    //     $aimage = $_FILES['aimage']['name'];
    //     $aimage = time() . "_" . $aimage;
    //     move_uploaded_file($_FILES['aimage']['tmp_name'], "../uploads/about/" . $aimage);
    // } else {
    //     $aimage = $conrec['image'];
    // }

    $query = mysqli_query($conn, "UPDATE `tbl_achievement` SET `number1`='$number1',`text1`='$text1',`number2`='$number2',`text2`='$text2',`number3`='$number3',`text3`='$text3',`number4`='$number4',`text4`='$text4' ");
    if ($query) {
        $_SESSION['success'] = "Achievements Updated Successfull";
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
            <li class="breadcrumb-item active">Manage Achievements</li>
        </ol>
        <!-- begin page-header -->
        <h1 class="page-header">Manage Achievements</h1>
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
                        <h4 class="panel-title">Manage Achievements</h4>
                    </div>
                    <!-- begin panel-body -->
                    <div class="panel-body">
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="number1">Achievement Number1</label>
                                    <input type="text" name="number1" class="form-control" id="number1"
                                        placeholder="Enter Number" value="<?= $conrec['number1']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="text1">Achievement Text1</label>
                                    <input type="text" name="text1" class="form-control" id="text1"
                                        placeholder="Enter Text" value="<?= $conrec['text1']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="number2">Achievement Number2</label>
                                    <input type="text" name="number2" class="form-control" id="number2"
                                        placeholder="Enter Number" value="<?= $conrec['number2']; ?>">
                                </div>


                                <div class="form-group">
                                    <label for="text2">Achievement Text2</label>
                                    <input type="text" name="text2" class="form-control" id="text2"
                                        placeholder="Enter Text" value="<?= $conrec['text2']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="number3">Achievement Number3</label>
                                    <input type="text" name="number3" class="form-control" id="number3"
                                        placeholder="Enter Number" value="<?= $conrec['number3']; ?>">
                                </div>


                                <div class="form-group">
                                    <label for="text3">Achievement Text3</label>
                                    <input type="text" name="text3" class="form-control" id="text3"
                                        placeholder="Enter Text" value="<?= $conrec['text3']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="number4">Achievement Number4</label>
                                    <input type="text" name="number4" class="form-control" id="number4"
                                        placeholder="Enter Number" value="<?= $conrec['number4']; ?>">
                                </div>


                                <div class="form-group">
                                    <label for="text4">Achievement Text4</label>
                                    <input type="text" name="text4" class="form-control" id="text4"
                                        placeholder="Enter Text" value="<?= $conrec['text4']; ?>">
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                                <!-- <button type="reset" name="reset" class="btn btn-danger">Reset</button> -->
                                <!-- <input id="btnPassport" type="button" class="btn btn-warning" value="Use Seo tools" name="btnPassport" />  -->
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