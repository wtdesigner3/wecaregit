<?php require('inc/function.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- SITE TITLE -->
    <title>Press Release || <?= SITE_NAME ?></title>
    <?php include 'inc/head.php'; ?>
</head>
<body>
    <!-- PRELOADER SPINNER================== -->
    <div id="loader-wrapper">
        <div id="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
    <!-- PAGE CONTENT====================== -->
    <div id="page" class="page">
        <!-- HEADER======================= -->

        <?php include 'inc/header.php'; ?>
        <!-- END HEADER -->
        <div id="breadcrumb" class="division">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class=" breadcrumb-holder">
                            <!-- Breadcrumb Nav -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= BASE_URL; ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Press Release</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div> <!-- End row -->
            </div> <!-- End container -->
        </div>
        <section class="filtter">
            <div class="container">
                <h1 class="text-center mb-5 mt-4 steelblue-color">Press Release</h1>
                <ul class="filter-menu">
                    <li data-target="image" class="current">Image</li>
                    <li data-target="video">Video</li>
                </ul>
                <ul class="filter-item">
                    <?php
                        $pressqryy = mysqli_query($conn, "SELECT * FROM `tbl_press` WHERE `status`='1' ORDER BY `sort` ASC");
                        if (mysqli_num_rows($pressqryy) != 0) {
                            while ($pressfetch = mysqli_fetch_array($pressqryy))
                            { 
                                if ($pressfetch['video'] != '') 
                                { ?>
                                    <li data-item="video" class="col-md-3 delete">
                                        <div class="doctor-1">
                                            <!-- Doctor Video -->
                                            <div class="hover-overlay text-center">
                                                <iframe src="https://www.youtube.com/embed/<?= $pressfetch['video']; ?>" width="100%" height="300"
                                                    style="border:1px solid black;"></iframe>
                                            </div>
                                        </div>
                                    </li>
                               <?php  
                               }
                               else
                               { ?>
                                    <li data-item="image" class="col-md-3 active">
                                        <div class="doctor-1">
                                            <!-- Doctor Photo -->
                                            <div class="hover-overlay text-center">
                                                <!-- Photo -->
                                                <img loading="lazy"  class="img-fluid"
                                                    src="<?= BASE_URL; ?>uploads/team/<?= $pressfetch['image']; ?>"
                                                    alt="<?= $pressfetch['alt']; ?>">
                                                <div class="item-overlay"></div>
                                                <!-- Profile Link -->
                                                <div class="profile-link">
                                                    <div class="blog-post-img">
                                                        <div class="video-preview text-center">
                                                            <!-- Change the link HERE!!! -->
                                                            <a class="image-link"
                                                                href="<?= BASE_URL; ?>uploads/team/<?= $pressfetch['image']; ?>">
                                                                <!-- Play Icon -->
                                                                <div class="video-btn play-icon-blue">
                                                                    <div class="video-block-wrapper video-block-wrapper2">
                                                                        <p>Read More</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    
                               <?php 
                               } 
                              } 
                        }
                            ?>
                </ul>
            </div>
    </div>
    </section>


    </diV>


    <div>

        <?php include 'inc/footer.php' ?>
        <div class="job-desc-container summary"></div>
    </div> <!-- END PAGE CONTENT -->


    <?php include 'inc/footer-data.php' ?>

    <script>

        let sortBtn = document.querySelector('.filter-menu').children;
        let sortItem = document.querySelector('.filter-item').children;

        for (let i = 0; i < sortBtn.length; i++) {
            sortBtn[i].addEventListener('click', function () {
                for (let j = 0; j < sortBtn.length; j++) {
                    sortBtn[j].classList.remove('current');
                }

                this.classList.add('current');


                let targetData = this.getAttribute('data-target');

                for (let k = 0; k < sortItem.length; k++) {
                    sortItem[k].classList.remove('active');
                    sortItem[k].classList.add('delete');

                    if (sortItem[k].getAttribute('data-item') == targetData || targetData == "all") {
                        sortItem[k].classList.remove('delete');
                        sortItem[k].classList.add('active');
                    }
                }
            });
        }

    </script>

</body>

</html>