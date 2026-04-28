<?php require('inc/function.php');

$bname = $_GET["url"];
$pdetaildata = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `url`='" . $bname . "'");
$pdetailrec = mysqli_fetch_array($pdetaildata);

// Redirect to 404 if service not found
if (!$pdetailrec) {
    header("Location: " . BASE_URL . "404");
    exit();
}

$pdetaildata1 = mysqli_query($conn, "SELECT * FROM `tbl_servicespage` WHERE `id`='" . $pdetailrec['id'] . "'");
$pdetailrec1 = mysqli_fetch_array($pdetaildata1);
$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/head.php'; ?>
    <title><?= htmlspecialchars(!empty($pdetailrec['metatag']) ? $pdetailrec['metatag'] : $pdetailrec['heading']) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pdetailrec['metadesc'] ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta name="keywords" content="<?= htmlspecialchars($pdetailrec['keyword'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    <meta name="robots" content="index, follow" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= htmlspecialchars(!empty($pdetailrec['metatag']) ? $pdetailrec['metatag'] : $pdetailrec['heading'], ENT_QUOTES, 'UTF-8') ?>" />
    <meta property="og:description" content="<?= htmlspecialchars($pdetailrec['metadesc'] ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta property="og:image" content="<?= BASE_URL; ?>uploads/services/<?= $pdetailrec['image']; ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= htmlspecialchars(!empty($pdetailrec['metatag']) ? $pdetailrec['metatag'] : $pdetailrec['heading'], ENT_QUOTES, 'UTF-8') ?>" />
    <meta name="twitter:description" content="<?= htmlspecialchars($pdetailrec['metadesc'] ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta name="twitter:image" content="<?= BASE_URL; ?>uploads/services/<?= $pdetailrec['image']; ?>" />

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Dentist",
      "name": "We Care Dental Clinic",
      "url": "<?= $canonical_url ?>",
      "logo": "https://wecaredentist.com/uploads/logo.png",
      "telephone": "+91-99341-07774",
      "email": "info@wecare.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Sakchi",
        "addressLocality": "Jamshedpur",
        "addressRegion": "Jharkhand",
        "postalCode": "831001",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "22.8046",
        "longitude": "86.2029"
      },
      "openingHours": "Mo-Sa 09:00-20:00",
      "description": "Best dental clinic in Jamshedpur offering gum disease treatment, dental implants, braces, laser dentistry and more under Dr. Anand Pandey at Sakchi.",
      "founder": "Dr. Anand Pandey",
      "areaServed": "Jamshedpur, Jharkhand, India",
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "5",
        "ratingCount": "5"
      }
    }
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "<?= BASE_URL ?>"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Services",
          "item": "<?= BASE_URL ?>services"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "<?= $pdetailrec['heading'] ?>",
          "item": "<?= $canonical_url ?>"
        }
      ]
    }
    </script>
    <?= $pdetailrec['head_detail'] ?>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">

</head>

<body>

    <!-- PRELOADER -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>

    <div id="page">

        <!-- ═══════════════════════════════════════
         HEADER
    ═══════════════════════════════════════ -->
        <?php include 'inc/header.php'; ?>


        <!-- ═══════════════════════════════════════
         PAGE HERO WITH BREADCRUMB IMAGE
    ═══════════════════════════════════════ -->
        <div class="page-hero <?= empty($pdetailrec['breadcrumb']) ? 'no-bg' : ''; ?>">
            <?php if (!empty($pdetailrec['breadcrumb'])): ?>
                <div class="page-hero-bg d-none">
                    <img loading="lazy" src="<?= BASE_URL; ?>uploads/services/<?= $pdetailrec['breadcrumb']; ?>"
                        alt="<?= $pdetailrec['heading']; ?>">
                    <div class="page-hero-overlay"></div>
                </div>
            <?php endif; ?>
            <div class="page-hero-inner">
                <nav class="breadcrumb-nav">
                    <a href="<?= BASE_URL; ?>">Home</a>
                    <span class="breadcrumb-sep">›</span>
                    <a href="<?= BASE_URL; ?>services">Our Services</a>
                    <span class="breadcrumb-sep">›</span>
                    <span><?= $pdetailrec['heading']; ?></span>
                </nav>
                <h1><?= $pdetailrec['heading']; ?></h1>
            </div>
        </div>


        <!-- ═══════════════════════════════════════
         MAIN CONTENT + SIDEBAR
    ═══════════════════════════════════════ -->
        <div class="content-wrapper">

            <!-- ── MAIN ── -->
            <main class="service-main">

                <?php if (!empty($pdetailrec['image'])): ?>
                    <img loading="lazy" class="service-hero-img"
                        src="<?= BASE_URL; ?>uploads/services/<?= $pdetailrec['image']; ?>"
                        alt="<?= $pdetailrec['heading']; ?>">
                <?php endif; ?>

                <h2 class="service-title"><?= $pdetailrec['heading']; ?></h2>
                <div class="title-divider"></div>

                <?php if (!empty($pdetailrec['des'])): ?>
                    <div class="service-content">
                        <?= $pdetailrec['des']; ?>
                    </div>
                <?php endif; ?>

            </main>

            <!-- ── SIDEBAR ── -->
            <aside class="service-sidebar">

                <!-- All Services -->
                <div class="sidebar-card">
                    <div class="sidebar-card-title">All Services</div>
                    <ul class="service-nav-list">
                        <?php
                        $allSvc = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `status`='1' ORDER BY `sort` ASC");
                        if (mysqli_num_rows($allSvc) != 0) {
                            while ($svc = mysqli_fetch_array($allSvc)) {
                                $isActive = ($svc['url'] == $bname) ? 'active' : '';
                                ?>
                                <li>
                                    <a href="<?= BASE_URL; ?>services/<?= $svc['url']; ?>" class="<?= $isActive; ?>">
                                        <?= $svc['heading']; ?>
                                        <svg viewBox="0 0 24 24">
                                            <polyline points="9 18 15 12 9 6" />
                                        </svg>
                                    </a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </div>

                <!-- Book Appointment -->
                <div class="appt-card">
                    <div class="appt-icon">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                    </div>
                    <h4>Book an Appointment</h4>
                    <p>Ready to experience world-class dental care? Schedule your visit today.</p>
                    <a href="<?= BASE_URL; ?>contact" class="btn-appt">Book Now</a>
                    <?php
                    $con = mysqli_query($conn, "SELECT con_phone1,con_phone2 FROM `tbl_contact`");
                    $coninfo = mysqli_fetch_array($con);
                    ?>
                    <a href="tel:<?= $coninfo['con_phone1']; ?>" class="btn-call">Or call us directly →</a>
                </div>

                <!-- Quick Enquiry Form -->
                <div class="contact-card">
                    <div class="sidebar-card-title">Quick Enquiry</div>
                    <form method="POST" action="<?= BASE_URL; ?>mail/contactMail.php">
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" name="name" placeholder="Full name" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" placeholder="+91 XXXXX XXXXX" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="your@email.com" required>
                        </div>
                        <div class="form-group">
                            <label>Service</label>
                            <input type="text" name="service" value="<?= $pdetailrec['heading']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" placeholder="Tell us about your concern..."></textarea>
                        </div>

                        <div class="recaptcha-wrap">
                            <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                        </div>

                        <button type="submit" class="btn-submit">Send Enquiry</button>
                    </form>
                </div>

            </aside>
        </div><!-- END content-wrapper -->


        <!-- ═══════════════════════════════════════
         EXTRA CONTENT CARDS (tbl_extra)
    ═══════════════════════════════════════ -->
        <?php
        $extraText = mysqli_query($conn, "SELECT * FROM `tbl_extra_content` WHERE brand_id='$pdetailrec[id]' AND status='1'");
        $extraTexts = mysqli_fetch_assoc($extraText);
        $extras = mysqli_query($conn, "SELECT * FROM `tbl_extra` WHERE status='1' AND brand_id='$pdetailrec[id]' ORDER BY sort ASC");
        if (mysqli_num_rows($extras) > 0):
            ?>
            <section class="cards-section alt-bg">
                <div class="section-header-inline">
                    <span class="section-tag"><?= $extraTexts['title'] ?? 'Features'; ?></span>
                    <h2 class="section-heading"><?= $extraTexts['title']; ?></h2>
                </div>
                <div class="icon-cards-grid">
                    <?php while ($extr = mysqli_fetch_assoc($extras)): ?>
                        <div class="icon-card">
                            <div class="icon-card-img-wrap">
                                <img loading="lazy" src="<?= BASE_URL; ?>uploads/brand/<?= $extr['image2']; ?>"
                                    alt="<?= $extr['alt2']; ?>" class="img-default">
                                <img loading="lazy" src="<?= BASE_URL; ?>uploads/brand/<?= $extr['image']; ?>"
                                    alt="<?= $extr['alt']; ?>" class="img-hover">
                            </div>
                            <div class="icon-card-title"><?= $extr['title']; ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif; ?>


        <!-- ═══════════════════════════════════════
         CARE AREAS (tbl_care_areas)
    ═══════════════════════════════════════ -->
        <?php
        $cateBenifits = mysqli_query($conn, "SELECT * FROM `tbl_care_areas` WHERE status='1' AND brand_id='$pdetailrec[id]' ORDER BY sort ASC");
        if (mysqli_num_rows($cateBenifits) > 0):
            $careExtraText = mysqli_query($conn, "SELECT * FROM `tbl_careareashead`");
            $extracare = mysqli_fetch_assoc($careExtraText);
            ?>
            <section class="cards-section dark-bg d-none">
                <div class="section-header-inline">
                    <span class="section-tag"><?= $extracare['subtitle'] ?? 'Care Areas'; ?></span>
                    <h2 class="section-heading"><?= $extracare['title']; ?></h2>
                    <?php if (!empty($extracare['subtitle'])): ?>
                        <p class="section-sub"><?= $extracare['subtitle']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="icon-cards-grid">
                    <?php while ($cateBenifitss = mysqli_fetch_assoc($cateBenifits)): ?>
                        <div class="icon-card">
                            <div class="icon-card-img-wrap">
                                <img loading="lazy" src="<?= BASE_URL; ?>uploads/brand/<?= $cateBenifitss['image2']; ?>"
                                    alt="<?= $cateBenifitss['alt2']; ?>" class="img-default">
                                <img loading="lazy" src="<?= BASE_URL; ?>uploads/brand/<?= $cateBenifitss['image']; ?>"
                                    alt="<?= $cateBenifitss['alt']; ?>" class="img-hover">
                            </div>
                            <div class="icon-card-title"><?= $cateBenifitss['title']; ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif; ?>


        <!-- ═══════════════════════════════════════
         WHY US (tbl_why_us)
    ═══════════════════════════════════════ -->
        <?php
        $whyUs = mysqli_query($conn, "SELECT * FROM `tbl_why_us` WHERE status='1' AND brand_id='$pdetailrec[id]' ORDER BY sort ASC");
        if (mysqli_num_rows($whyUs) > 0):
            $worksExtraText = mysqli_query($conn, "SELECT * FROM `tbl_why_us_content`");
            $extraWorks = mysqli_fetch_assoc($worksExtraText);
            ?>
            <section class="cards-section d-none">
                <div class="section-header-inline">
                    <span class="section-tag"><?= $extraWorks['subtitle'] ?? 'Why Choose Us'; ?></span>
                    <h2 class="section-heading"><?= $extraWorks['title']; ?></h2>
                    <?php if (!empty($extraWorks['subtitle'])): ?>
                        <p class="section-sub"><?= $extraWorks['subtitle']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="icon-cards-grid">
                    <?php while ($whyItem = mysqli_fetch_assoc($whyUs)): ?>
                        <div class="icon-card">
                            <div class="icon-card-img-wrap">
                                <img loading="lazy" src="<?= BASE_URL; ?>uploads/brand/<?= $whyItem['image2']; ?>"
                                    alt="<?= $whyItem['alt2']; ?>" class="img-default">
                                <img loading="lazy" src="<?= BASE_URL; ?>uploads/brand/<?= $whyItem['image']; ?>"
                                    alt="<?= $whyItem['alt']; ?>" class="img-hover">
                            </div>
                            <div class="icon-card-title"><?= $whyItem['title']; ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif; ?>


        <?php
        $brandWorks = mysqli_query($conn, "SELECT * FROM `tbl_brand_works` WHERE status='1' AND brand_id='$pdetailrec[id]' ORDER BY sort ASC");
        if (mysqli_num_rows($brandWorks) > 0):
            $worksHead = mysqli_query($conn, "SELECT * FROM `tbl_workshead`");
            $extraWorksH = mysqli_fetch_assoc($worksHead);
            ?>
            <section class="timeline-section">
                <div class="timeline-inner">
                    <div class="section-header-inline" style="margin-bottom:0;">
                        <span class="section-tag"><?= $extraWorksH['subtitle'] ?? 'Process'; ?></span>
                        <h2 class="section-heading"><?= $extraWorksH['title']; ?></h2>
                        <?php if (!empty($extraWorksH['subtitle'])): ?>
                            <p class="section-sub"><?= $extraWorksH['subtitle']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="timeline-steps">
                        <?php
                        $stepNum = 1;
                        while ($work = mysqli_fetch_assoc($brandWorks)):
                            ?>
                            <div class="timeline-step">
                                <div class="timeline-step-num"><?= $stepNum++; ?></div>
                                <h5><?= $work['title']; ?></h5>
                                <p><?= $work['subtitle']; ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>


        <!-- ═══════════════════════════════════════
         VIDEOS (tbl_video)
    ═══════════════════════════════════════ -->
        <?php
        $videos = mysqli_query($conn, "SELECT * FROM `tbl_video` WHERE status='1' AND brand_id='$pdetailrec[id]' ORDER BY sort ASC");
        if (mysqli_num_rows($videos) > 0):
            $videText = mysqli_query($conn, "SELECT * FROM `tbl_video_content`");
            $videTexts = mysqli_fetch_assoc($videText);
            ?>
            <section class="videos-section">
                <div class="videos-inner">
                    <div class="section-header-inline">
                        <span class="section-tag">Media</span>
                        <h2 class="section-heading"><?= $videTexts['title']; ?></h2>
                    </div>
                    <div class="videos-grid">
                        <?php while ($video = mysqli_fetch_assoc($videos)): ?>
                            <div class="video-wrap">
                                <iframe src="<?= $video['url']; ?>" title="Service video"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen loading="lazy"></iframe>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>


        <!-- FOOTER -->
        <?php include 'inc/footer.php'; ?>

    </div><!-- END PAGE -->

    <?php include 'inc/footer-data.php'; ?>

    <script>
        // ── Preloader ──
        window.addEventListener('load', () => {
            document.getElementById('loader-wrapper').classList.add('hidden');
            setTimeout(() => document.getElementById('loader-wrapper').style.display = 'none', 700);
        });

        // ── Scroll reveal ──
        const obs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.style.opacity = 1;
                    e.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.icon-card, .timeline-step, .video-wrap').forEach(el => {
            el.style.opacity = 0;
            el.style.transform = 'translateY(24px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            obs.observe(el);
        });
    </script>
</body>

</html>