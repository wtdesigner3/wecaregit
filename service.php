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
</head>

<body>

    <div id="page" class="page-wrapper">

        <?php include 'inc/header.php'; ?>

        <!-- BREADCRUMB HERO -->
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

        <!-- HERO SPLIT SECTION -->
        <section class="service-hero-split">
            <div class="">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="hero-content-left">
                            <span class="hero-tag">Expert Dental Care</span>
                            <h2>Best <em><?= $pdetailrec['heading']; ?></em> in Jamshedpur</h2>
                            <p><?= htmlspecialchars(substr(strip_tags($pdetailrec['des']), 0, 200)) ?>...</p>
                            <a href="javascript:void(0)" class="btn-primary-teal" onclick="openModal()">
                                Book Appointment
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M3 8h10M9 4l4 4-4 4" stroke="#fff" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hero-img-right">
                            <img src="<?= BASE_URL ?>uploads/services/<?= $pdetailrec['image'] ?>"
                                alt="<?= $pdetailrec['heading'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- MAIN GRID: SIDEBAR + DESCRIPTION -->
        <section class="service-main-grid">
            <div class="">
                <div class="row sidebar-row">

                    <!-- MAIN DESCRIPTION (Now on the left) -->
                    <div class="col-lg-8">
                        <div class="description-card">
                            <div class="desc-header">
                                <div class="desc-header-icon">🦷</div>
                                <div class="desc-header-text">
                                    <h2><?= $pdetailrec['heading']; ?></h2>
                                    <p>WeCare Dental Clinic, Jamshedpur</p>
                                </div>
                            </div>
                            <div class="description-body">
                                <?= $pdetailrec['des'] ?>
                            </div>
                        </div>
                    </div>

                    <!-- SIDEBAR (Now on the right) -->
                    <div class="col-lg-4 sidebar-col">
                        <div class="sidebar-sticky-wrap">
                            <div class="sidebar-card">

                                <!-- Services List -->
                                <div class="sidebar-services-block">
                                    <h3 class="sidebar-block-title">Our Services</h3>
                                    <ul class="sidebar-list">
                                        <?php
                                        $otherSvc = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `status`='1' ORDER BY `sort` ASC");
                                        while ($svc = mysqli_fetch_array($otherSvc)) {
                                            $active = ($svc['url'] == $bname) ? 'active' : '';
                                            echo '<li>
                                                <a href="' . BASE_URL . $svc['url'] . '" class="' . $active . '">
                                                    <span>' . htmlspecialchars($svc['heading']) . '</span>
                                                    <span class="arrow-icon">›</span>
                                                </a>
                                            </li>';
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <!-- CTA Phone Block -->
                                <div class="sidebar-cta-block">
                                    <p class="cta-label">Need Help?</p>
                                    <p class="cta-sub">Call us anytime — we're happy to assist you.</p>
                                    <a href="tel:<?= $coninfo['con_phone1'] ?>" class="cta-phone">
                                        <span class="phone-icon">📞</span>
                                        <?= $coninfo['con_phone1'] ?>
                                    </a>
                                </div>

                            </div>

                        </div> <!-- End Sidebar Card 1 -->

                        <!-- SIDEBAR CARD 2: Quick Enquiry Form (Separate Card) -->
                        <div class="sidebar-card"
                            style="margin-top: 30px; border-radius: var(--radius-lg); background: var(--bg-white); box-shadow: var(--shadow-md); border: 1px solid var(--border); overflow: hidden;">
                            <div class="sidebar-enquiry-block" style="padding: 28px;">
                                <h3 class="sidebar-block-title" style="margin-bottom: 20px;">Quick Enquiry</h3>
                                <form method="POST" action="<?= BASE_URL; ?>mail/contactMail" name="sidebarEnquiryForm">
                                    <div class="mb-3">
                                        <label class="form-label-float">Your Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label-float">Phone Number</label>
                                        <input type="tel" name="phone" class="form-control" placeholder="Phone"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label-float">Your Message</label>
                                        <textarea name="message" class="form-control" placeholder="Message"
                                            style="min-height: 80px;"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                                    </div>
                                    <button type="submit" class="btn-submit-teal"
                                        style="width: 100%; justify-content: center;">Send Enquiry</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>
    </section>


    <!-- BOOKING MODAL -->
    <div id="bookingModal">
        <div class="modal-box">
            <div class="modal-header">
                <div class="modal-header-text">
                    <h3>Book <?= $pdetailrec['heading'] ?></h3>
                    <p>WeCare Dental Clinic, Jamshedpur</p>
                </div>
                <button class="modal-close-btn" onclick="closeModal()">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= BASE_URL; ?>mail/contactMail">
                    <input type="text" name="name" class="form-control" placeholder="Your Name *" required>
                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number *" required>
                    <input type="text" name="location" class="form-control" placeholder="Your Location *" required>
                    <input type="text" name="app_date" class="form-control" placeholder="Appointment Date *" required
                        onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'"
                        min="<?= date('Y-m-d') ?>">
                    <input type="hidden" name="service" value="<?= $pdetailrec['heading'] ?>">
                    <div class="mb-3">
                        <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                    </div>
                    <button type="submit" class="btn-modal-submit">Schedule Now</button>
                </form>
            </div>
        </div>
    </div>

    <?php include 'inc/footer.php'; ?>

    </div><!-- END PAGE -->

    <?php include 'inc/footer-data.php'; ?>

    <script>
        function openModal() {
            const modal = document.getElementById('bookingModal');
            modal.classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            const modal = document.getElementById('bookingModal');
            modal.classList.remove('open');
            document.body.style.overflow = 'auto';
        }
        window.onclick = function (event) {
            const modal = document.getElementById('bookingModal');
            if (event.target === modal) closeModal();
        }
    </script>
</body>

</html>