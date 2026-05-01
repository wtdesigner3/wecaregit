<?php require('inc/function.php'); 

$bname = $_GET["url"] ?? '';
$pdetaildata = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `url`='" . mysqli_real_escape_string($conn, $bname) . "'");
$pdetailrec = mysqli_fetch_array($pdetaildata);

// Redirect to 404 if service not found
if (!$pdetailrec) {
    header("HTTP/1.1 404 Not Found");
    include('404.php');
    exit();
}

$canonical_url = BASE_URL . $pdetailrec['url'];

// Get contact info for the form
$con = mysqli_query($conn, "SELECT * FROM `tbl_contact`");
$coninfo = mysqli_fetch_array($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/head.php'; ?>
    <title><?= htmlspecialchars($pdetailrec['metatag'] ?: $pdetailrec['heading']) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pdetailrec['metadesc'] ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta name="keywords" content="<?= htmlspecialchars($pdetailrec['keyword'] ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?= $canonical_url ?>" />

    <style>
        /* Redesign Specific Styles */
        .service-hero-split {
            padding: 80px 0;
            background: #fff;
        }
        .hero-content-left {
            padding-right: 30px;
        }
        .hero-content-left h1 {
            font-size: 42px;
            font-weight: 700;
            color: #222;
            margin-bottom: 20px;
            line-height: 1.2;
        }
        .hero-content-left p {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .hero-img-right img {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }
        
        .service-main-grid {
            padding: 60px 0;
            background: #f9f9f9;
        }
        .sidebar-services {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .sidebar-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #00a3c8;
        }
        .sidebar-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar-list li {
            margin-bottom: 12px;
        }
        .sidebar-list a {
            color: #444;
            display: block;
            padding: 8px 0;
            transition: 0.3s;
            border-bottom: 1px solid #eee;
        }
        .sidebar-list a:hover, .sidebar-list a.active {
            color: #00a3c8;
            padding-left: 5px;
        }
        
        .description-content {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            line-height: 1.8;
            color: #555;
        }
        .description-content h2, .description-content h3 {
            color: #222;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .enquiry-section {
            padding: 80px 0;
            background: #fff;
        }
        .enquiry-form-wrap {
            max-width: 800px;
            margin: 0 auto;
            background: #f4f7f9;
            padding: 50px;
            border-radius: 20px;
        }
        
        /* Modal Styles */
        #bookingModal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.6);
            backdrop-filter: blur(5px);
        }
        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            position: relative;
        }
        .close-modal {
            position: absolute;
            right: 20px;
            top: 15px;
            font-size: 28px;
            cursor: pointer;
            color: #aaa;
        }
        
        .btn-blue {
            background-color: #00a3c8;
            color: #fff;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-blue:hover {
            background-color: #008caf;
            color: #fff;
        }
    </style>
</head>

<body>

    <div id="page" class="page-wrapper">

        <?php include 'inc/header.php'; ?>

        <!-- ═══════════════════════════════════════
         BREADCRUMB HERO (Like Contact Page)
    ═══════════════════════════════════════ -->
        <div class="page-hero">
            <div class="page-hero-inner">
                <nav class="breadcrumb-nav">
                    <a href="<?= BASE_URL; ?>">Home</a>
                    <span class="breadcrumb-sep">›</span>
                    <span><?= $pdetailrec['heading']; ?></span>
                </nav>
                <h1><?= $pdetailrec['heading']; ?></h1>
            </div>
        </div>

        <!-- ═══════════════════════════════════════
         HERO SPLIT SECTION
    ═══════════════════════════════════════ -->
        <section class="service-hero-split">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="hero-content-left">
                            <span class="section-tag" style="color: #00a3c8; font-weight: 700; text-transform: uppercase; margin-bottom: 10px; display: block;">Expert Dental Care</span>
                            <h1>Best <em><?= $pdetailrec['heading']; ?></em> in Jamshedpur</h1>
                            <p><?= htmlspecialchars(substr(strip_tags($pdetailrec['des']), 0, 200)) ?>...</p>
                            <a href="javascript:void(0)" class="btn btn-blue" onclick="openModal()">Book Now</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hero-img-right">
                            <img src="<?= BASE_URL ?>uploads/services/<?= $pdetailrec['image'] ?>" alt="<?= $pdetailrec['heading'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══════════════════════════════════════
         DESCRIPTION SECTION WITH SIDEBAR
    ═══════════════════════════════════════ -->
        <section class="service-main-grid">
            <div class="container">
                <div class="row">
                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <div class="sidebar-services">
                            <h3 class="sidebar-title">Our Services</h3>
                            <ul class="sidebar-list">
                                <?php
                                $otherSvc = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `status`='1' ORDER BY `sort` ASC");
                                while ($svc = mysqli_fetch_array($otherSvc)) {
                                    $active = ($svc['url'] == $bname) ? 'active' : '';
                                    echo '<li><a href="'.BASE_URL.$svc['url'].'" class="'.$active.'">'.$svc['heading'].'</a></li>';
                                }
                                ?>
                            </ul>
                            
                            <div class="sidebar-contact" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
                                <p style="font-weight: 700; margin-bottom: 5px;">Need Help?</p>
                                <a href="tel:<?= $coninfo['con_phone1'] ?>" style="color: #00a3c8; font-size: 18px; font-weight: 700;"><?= $coninfo['con_phone1'] ?></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Main Description -->
                    <div class="col-lg-8">
                        <div class="description-content">
                            <?= $pdetailrec['des'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══════════════════════════════════════
         ENQUIRY FORM SECTION
    ═══════════════════════════════════════ -->
        <section class="enquiry-section">
            <div class="container">
                <div class="enquiry-form-wrap">
                    <div class="section-title">
                        <h2 class="h2-md">Quick Enquiry</h2>
                        <p class="p-lg">Have a question? Send us a message and we'll get back to you shortly.</p>
                    </div>
                    
                    <form method="POST" action="<?= BASE_URL; ?>mail/contactMail" name="enquiryForm" class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Your Name*" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="tel" name="phone" class="form-control" placeholder="Phone Number*" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email Address*" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <textarea name="message" class="form-control" rows="4" placeholder="How can we help you?"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-blue">Send Enquiry</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- ═══════════════════════════════════════
         BOOKING MODAL
    ═══════════════════════════════════════ -->
        <div id="bookingModal">
            <div class="modal-content">
                <span class="close-modal" onclick="closeModal()">&times;</span>
                <h3 style="font-weight: 700; margin-bottom: 10px;">Book an Appointment</h3>
                <p style="color: #666; margin-bottom: 25px;">Fill details to schedule your visit for <?= $pdetailrec['heading'] ?>.</p>
                
                <form method="POST" action="<?= BASE_URL; ?>mail/contactMail">
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" name="phone" class="form-control" placeholder="Phone Number" required>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="service" value="<?= $pdetailrec['heading'] ?>">
                        <select class="form-control" name="patient">
                            <option>New Patient</option>
                            <option>Returning Patient</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                    </div>
                    <button type="submit" class="btn btn-blue w-100">Schedule Now</button>
                </form>
            </div>
        </div>

        <?php include 'inc/footer.php'; ?>

    </div><!-- END PAGE -->

    <?php include 'inc/footer-data.php'; ?>

    <script>
        function openModal() {
            document.getElementById('bookingModal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            document.getElementById('bookingModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        window.onclick = function(event) {
            if (event.target == document.getElementById('bookingModal')) {
                closeModal();
            }
        }
    </script>
</body>

</html>
