<?php
require('checksession.php');
require('includes/function.php');
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $subtitle = mysqli_real_escape_string($conn, $_POST['subtitle']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $alt = mysqli_real_escape_string($conn, $_POST['alt']);

    $bimage=$_FILES['bimage']['name'];
    if($bimage!='')
    {
        $unq= rand(1111, 9999); 
        $bimage=$unq."_".$bimage;
        move_uploaded_file($_FILES["bimage"]["tmp_name"], "../uploads/brand/".$bimage);
    }
    else{
        $bimage='';
    }
    
    $alt2 = mysqli_real_escape_string($conn, $_POST['alt2']);

    $bimage2=$_FILES['bimage2']['name'];
    if($bimage2!='')
    {
        $unq= rand(1111, 9999); 
        $bimage2=$unq."_".$bimage2;
        move_uploaded_file($_FILES["bimage2"]["tmp_name"], "../uploads/brand/".$bimage2);
    }
    else{
        $bimage2='';
    }
 
  //====end===//

    $query = mysqli_query($conn, "INSERT INTO `tbl_care_areas`(`brand_id`, `image`,`alt`,`image2`,`alt2`, `title`,`subtitle`, `status`, `sort`) VALUES ('$category','$bimage','$alt','$bimage2','$alt2','$title','$subtitle','$status','$position')");
    if ($query == true) {
        $_SESSION['success'] = "Inserted successfully";
        header("Refresh:2; url=manage-care-areas.php");
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
            <li class="breadcrumb-item"><a href="javascript:;">Care Areas Management</a></li>
            <li class="breadcrumb-item active">Add Care Areas</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Manage Care Areas <small>.</small></h1>
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
                        <h4 class="panel-title">Add Care Areas</h4>
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
                                        while ($crec = mysqli_fetch_array($cdata)) {
                                        ?>
                                            <option value="<?= $crec['id']; ?>"><?= $crec['heading']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="banner">Enter Title</label>
                                    <input type="text" name="title" class="form-control" id="banner" placeholder="Enter Title">
                                </div>
                                
                                <div class="form-group">
                                    <label for="banner">Enter Subtitle</label>
                                    <input type="text" name="subtitle" class="form-control" id="banner" placeholder="Enter Subtitle">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label>
                                    <input type="file" name="bimage" class="form-control" id="exampleInputFile">
                                    <p class="help-block">Image dimension must be 764 X 384 & must be jpg format</p>
                                </div>
                                
                                <div class="form-group">
                                    <label for="banner">Enter Alt</label>
                                    <input type="text" name="alt" class="form-control" placeholder="Enter Alt">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputFile">Image2</label>
                                    <input type="file" name="bimage2" class="form-control" id="exampleInputFile">
                                    <p class="help-block">Image dimension must be 764 X 384 & must be jpg format</p>
                                </div>
                                
                                <div class="form-group">
                                    <label for="banner">Enter Alt2</label>
                                    <input type="text" name="alt2" class="form-control" placeholder="Enter Alt 2">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Position</label>
                                    <input type="number" name="position" class="form-control" id="exampleInputPassword1" placeholder="1-10">
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
                                <button type="submit" name="submit" class="btn btn-primary">Click Here To Submit</button>
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
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <?php require("includes/footer.php"); ?>


    <script>
        $(document).ready(function() {
            App.init();
            FormWysihtml5.init();
        });

        function updateCategory(id) {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    document.getElementById("sub").innerHTML = xmlHttp.responseText;
                }
            };
            xmlHttp.open("GET", "ajax/category.php?id=" + id, true);
            xmlHttp.send();
        }
    </script>

</body>

</html>