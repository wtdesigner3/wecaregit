<?php

require('inc/function.php');

$abtqry = mysqli_query($conn, "SELECT * FROM `tbl_homeabout` WHERE id='1'");
$fetchabt = mysqli_fetch_array($abtqry);

$why = mysqli_query($conn, "SELECT * FROM `tbl_whychoose` WHERE id='1'");
$whyfetch = mysqli_fetch_array($why);

$btmsec = mysqli_query($conn, "SELECT * FROM `tbl_bottomsections` WHERE id='1'");
$btmsecfetch = mysqli_fetch_array($btmsec);

$abt = mysqli_query($conn, "SELECT * FROM `tbl_testipage` WHERE id='1'");
$abtfetch = mysqli_fetch_array($abt);

$brand = mysqli_query($conn, "SELECT * FROM `tbl_brandhead` WHERE id='1'");
$brandf1 = mysqli_fetch_array($brand);

$service = mysqli_query($conn, "SELECT * FROM `tbl_servicesheadpage` WHERE id='1'");
$servicefetch = mysqli_fetch_array($service);

$press = mysqli_query($conn, "SELECT * FROM `tbl_pressheadpage` WHERE id='1'");
$presscfetch = mysqli_fetch_array($press);

$partner = mysqli_query($conn, "SELECT * FROM `tbl_partnerpage` WHERE id='1'");
$partfetch = mysqli_fetch_array($partner);

$profile = mysqli_query($conn, "SELECT * FROM `tbl_profile` WHERE pro_id='1'");
$prof = mysqli_fetch_array($profile);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/head.php'; ?>
    <style>
        /* Slide is the positioning parent */
        .hero-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.8s ease;
        }

        .hero-slide.active {
            opacity: 1;
            visibility: visible;
        }

        /* Image fills slide */
        .hero-slide img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }

        /* Overlay sits above image */
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: 2;
        }

        /* ✅ Content sits above overlay */
        .hero-slide-content {
            position: absolute;
            inset: 0;
            z-index: 3;
            /* higher than overlay z-index:2 */
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 80px;
            color: #fff;
            align-items: flex-start;
        }
    </style>
    <title><?= $prof['pro_title'] ?? 'Dental Clinic' ?></title>
    <meta name="keywords" content="<?= $prof['pro_keyword'] ?>">
    <meta name="description" content="<?= $prof['pro_detail'] ?>">
    <meta name="robots" content="index, follow" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://wecaredentist.com/" />
    <meta property="og:title" content="<?= $prof['pro_title'] ?? 'Dental Clinic' ?>" />
    <meta property="og:description" content="<?= $prof['pro_detail'] ?>" />
    <meta property="og:image" content="https://wecaredentist.com/uploads/about/1773225186_we9%20(1).jpg" />
    <meta property="og:site_name" content="We Care Dental Clinic" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="https://wecaredentist.com/" />
    <meta name="twitter:title" content="<?= $prof['pro_title'] ?? 'Dental Clinic' ?>" />
    <meta name="twitter:description" content="<?= $prof['pro_detail'] ?>" />
    <meta name="twitter:image" content="https://wecaredentist.com/uploads/about/1773225186_we9%20(1).jpg" />

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Dentist",
      "name": "We Care Dental Clinic",
      "url": "https://wecaredentist.com/",
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
    <?= $prof['head_detail'] ?>


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">

</head>

<body>
    <!-- ssssssssssssssssssssss -->
    <!-- PRELOADER -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>

    <div id="page">

        <!-- ═══════════════════════════════════
         HEADER
    ═══════════════════════════════════ -->
        <?php include 'inc/header.php'; ?>


        <!-- ═══════════════════════════════════
         HERO BANNER
    ═══════════════════════════════════ -->

        <section id="hero-section">
            <div class="hero-bg-slider">
                <?php
                $hbnr = mysqli_query($conn, "SELECT * FROM `tbl_banner` WHERE `bnr_status`='1' ORDER BY `bnr_sort` ASC");
                $i = 0;
                if (mysqli_num_rows($hbnr) != 0) {
                    while ($hbnrfetch = mysqli_fetch_array($hbnr)) {
                        ?>
                        <div class="hero-slide <?= $i == 0 ? 'active' : ''; ?>" data-index="<?= $i; ?>">

                            <!-- 1. Background image -->
                            <img loading="lazy" src="<?= BASE_URL; ?>uploads/banner/<?= $hbnrfetch['bnr_image']; ?>"
                                alt="<?= htmlspecialchars($hbnrfetch['bnr_subtitle'] ?? ''); ?>">

                            <!-- 2. Dark overlay -->
                            <div class="hero-overlay"></div>

                            <!-- 3. Content MUST be after overlay with higher z-index -->
                            <div class="hero-slide-content">
                                <div class="hero-eyebrow">
                                    <span class="hero-eyebrow-dot"></span>
                                    <span><?= htmlspecialchars($hbnrfetch['bnr_subtitle'] ?? ''); ?></span>
                                </div>
                                <h2 class="hero-title">
                                    <?= htmlspecialchars($hbnrfetch['bnr_title'] ?? ''); ?>
                                </h2>
                                <div class="hero-actions">
                                    <a href="<?= BASE_URL ?>contact" class="btn-primary-hero">
                                        Book Appointment
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2">
                                            <path d="M5 12h14M12 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <?php
                        $i++;
                    }
                } ?>
            </div>

            <!-- Indicators -->
            <?php
            $hbnr2 = mysqli_query($conn, "SELECT COUNT(*) as cnt FROM `tbl_banner` WHERE `bnr_status`='1'");
            $cntRow = mysqli_fetch_assoc($hbnr2);
            $totalSlides = $cntRow['cnt'];
            ?>
            <div class="hero-indicators">
                <?php for ($d = 0; $d < $totalSlides; $d++): ?>
                    <div class="hero-dot <?= $d == 0 ? 'active' : ''; ?>" data-target="<?= $d; ?>"></div>
                <?php endfor; ?>
            </div>

            <!-- Prev Button -->
            <button id="heroPrev" aria-label="Previous slide" style="
        position:absolute; left:32px; top:50%; transform:translateY(-50%); z-index:4;
        width:52px; height:52px; border-radius:50%; border:1.5px solid rgba(255,255,255,0.4);
        background:rgba(255,255,255,0.12); backdrop-filter:blur(8px);
        cursor:pointer; display:flex; align-items:center; justify-content:center;
        transition:all 0.3s ease;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1e8c8b" stroke-width="2">
                    <polyline points="15 18 9 12 15 6" />
                </svg>
            </button>

            <!-- Next Button -->
            <button id="heroNext" aria-label="Next slide" style="
        position:absolute; right:32px; top:50%; transform:translateY(-50%); z-index:4;
        width:52px; height:52px; border-radius:50%; border:1.5px solid rgba(255,255,255,0.4);
        background:rgba(255,255,255,0.12); backdrop-filter:blur(8px);
        cursor:pointer; display:flex; align-items:center; justify-content:center;
        transition:all 0.3s ease;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1e8c8b" stroke-width="2">
                    <polyline points="9 18 15 12 9 6" />
                </svg>
            </button>

            <!-- Stats -->
            <?php
            $achieve = mysqli_query($conn, "SELECT * FROM `tbl_achievement` WHERE id='1'");
            if (mysqli_num_rows($achieve) > 0) {
                $achieveData = mysqli_fetch_assoc($achieve);
                ?>
                <div class="hero-stats">
                    <?php if (!empty($achieveData['number1']) && !empty($achieveData['text1'])): ?>
                        <div class="hero-stat">
                            <div class="hero-stat-num"><?= $achieveData['number1'] ?></div>
                            <div class="hero-stat-label"><?= $achieveData['text1'] ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($achieveData['number2']) && !empty($achieveData['text2'])): ?>
                        <div class="hero-stat">
                            <div class="hero-stat-num"><?= $achieveData['number2'] ?></div>
                            <div class="hero-stat-label"><?= $achieveData['text2'] ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($achieveData['number3']) && !empty($achieveData['text3'])): ?>
                        <div class="hero-stat">
                            <div class="hero-stat-num"><?= $achieveData['number3'] ?></div>
                            <div class="hero-stat-label"><?= $achieveData['text3'] ?></div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php } ?>

        </section>



        <!-- ═══════════════════════════════════
         ABOUT US
    ═══════════════════════════════════ -->

        <section id="about-section">
            <div class="about-image-stack">
                <img loading="lazy" class="about-img-main"
                    src="<?= BASE_URL; ?>uploads/about/<?= $fetchabt['image']; ?>"
                    alt="<?= $fetchabt['alt'] ?? 'About Us'; ?>">
                <?php
                $achieve = mysqli_query($conn, "SELECT number4, text4 FROM `tbl_achievement` WHERE id='1'");
                if (mysqli_num_rows($achieve) > 0) {
                    $achieveData = mysqli_fetch_assoc($achieve);
                    ?>
                    <div class="about-img-badge">
                        <div class="badge-num"><?= $achieveData['number4'] ?></div>
                        <div class="badge-text"><?= $achieveData['text4'] ?></div>
                    </div>
                <?php } ?>
            </div>

            <div class="about-text">
                <span class="section-tag"><?= $fetchabt['subtitle'] ?? 'About Us'; ?></span>
                <h1 class="section-heading">
                    <?= $fetchabt['title'] ?? 'Committed to <em>Exceptional</em> Dental Health'; ?>
                </h1>
                <p class="about-desc"><?= $fetchabt['des']; ?></p>

                <div class="about-features">
                    <?php
                    $tblAboutCard = mysqli_query($conn, "SELECT * FROM `tbl_about_card` WHERE `status`='1' ORDER BY `sort` ASC");
                    if (mysqli_num_rows($tblAboutCard) > 0) {
                        while ($aboutCard = mysqli_fetch_assoc($tblAboutCard)) {
                            ?>
                            <div class="about-feature">
                                <div class="feature-icon">
                                    <img src="<?= BASE_URL; ?>uploads/about-card/<?= $aboutCard['image']; ?>"
                                        alt="<?= $aboutCard['title']; ?>"
                                        style="width:22px;height:22px;object-fit:contain;filter:brightness(2);">
                                </div>
                                <div class="feature-text">
                                    <h6><?= $aboutCard['title'] ?></h6>
                                    <p><?= $aboutCard['text'] ?></p>
                                </div>
                            </div>
                        <?php }
                    } ?>

                </div>

                <a href="<?= BASE_URL; ?>about" class="btn-sage">
                    Learn More About Us
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </section>


        <!-- ═══════════════════════════════════
         SERVICES
    ═══════════════════════════════════ -->


        <!-- ═══════════════════════════════════
         WHY CHOOSE US
    ═══════════════════════════════════ -->
        <section id="why-section">
            <div class="why-inner">
                <div class="why-image">
                    <div class="why-img-wrap">
                        <img loading="lazy" src="<?= BASE_URL; ?>uploads/icons/<?= $whyfetch['img7']; ?>"
                            alt="Why Choose Us">
                        <div class="why-img-overlay"></div>
                    </div>
                    <?php
                    $homeExtra = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_home_extra`"));
                    ?>
                    <div class="why-card-float">
                        <span><?= $homeExtra['trusted_title']; ?></span>
                        <p><?= $homeExtra['trusted_subtitle']; ?></p>
                    </div>
                </div>

                <div class="why-content">
                    <span class="section-tag"><?= $whyfetch['subtitle'] ?? 'Why Choose Us'; ?></span>
                    <h2 class="section-heading"><?= $whyfetch['title'] ?? 'The <em>Difference</em> You Will Feel'; ?>
                    </h2>
                    <p class="why-desc"><?= strip_tags($whyfetch['des']); ?></p>

                    <div class="why-grid">
                        <?php
                        $homeBannerExtra = mysqli_query($conn, "SELECT * FROM `tbl_hmbanner_extra` WHERE status='1' order by sort asc");
                        if (mysqli_num_rows($homeBannerExtra) > 0) {
                            while ($extraBannerHm = mysqli_fetch_assoc($homeBannerExtra)) {
                                ?>
                                <div class="why-card">
                                    <div class="why-card-icon">
                                        <img src="<?= BASE_URL; ?>uploads/home/<?= $extraBannerHm['image']; ?>"
                                            alt="<?= $extraBannerHm['alt']; ?>"
                                            style="width:22px;height:22px;object-fit:contain;filter:brightness(2);">
                                    </div>
                                    <h5><?= $extraBannerHm['title']; ?></h5>
                                    <p><?= $extraBannerHm['content']; ?></p>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── SERVICES ── -->
        <section id="services-section">
            <div class="section-header">
                <span class="section-tag" style="display:block; text-align:center; padding-left:0; margin-bottom:12px;">
                    <?= $servicefetch['title'] ?? 'Our Services'; ?>
                </span>
                <h2 class="section-heading">
                    <?= $servicefetch['subtitle'] ?? 'Comprehensive <em>Dental</em> Solutions'; ?>
                </h2>
                <div class="divider"></div>
            </div>

            <div class="services-grid">
                <?php
                $serviceqryy = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `status`='1' ORDER BY `sort` ASC");
                if (mysqli_num_rows($serviceqryy) != 0) {
                    while ($svc = mysqli_fetch_array($serviceqryy)) {
                        ?>
                        <a href="<?= BASE_URL; ?>services/<?= $svc['url']; ?>" class="service-card">
                            <div class="service-img-ring">
                                <div class="service-img-outer">
                                    <div class="service-img-inner">
                                        <img loading="lazy" src="<?= BASE_URL; ?>uploads/services/<?= $svc['image']; ?>"
                                            alt="<?= $svc['alt2']; ?>">
                                    </div>
                                </div>
                                <!-- Orbiting dot -->
                                <div class="service-orbit-dot"></div>
                            </div>

                            <div class="service-card-body">
                                <h4><?= $svc['heading']; ?></h4>
                                <p><?= mb_strimwidth(strip_tags($svc['shortdes']), 0, 80, '…'); ?></p>
                                <span class="service-link">Explore</span>
                            </div>
                        </a>
                    <?php }
                } ?>
            </div>
        </section>

        <!-- ═══════════════════════════════════
         TESTIMONIALS
    ═══════════════════════════════════ -->
        <section id="testimonials-section">
            <div class="section-header">
                <span class="section-tag text-light"
                    style="display:block; text-align:center; padding-left:0; margin-bottom:12px;"><?= $abtfetch['subtitle'] ?? 'Testimonials'; ?></span>
                <h2 class="section-heading text-light"><?= $abtfetch['title'] ?? 'What Our <em>Patients</em> Say'; ?>
                </h2>
                <!-- <div class="divider "></div> -->
            </div>

            <div class="testi-slider-wrap">
                <div class="testi-slider-viewport">
                    <div class="testi-slider-track" id="testiTrack">
                        <?php
                        $testqry = mysqli_query($conn, "SELECT * FROM `tbl_testimonial` WHERE `status`='1' ORDER BY `id` ASC");
                        if (mysqli_num_rows($testqry) != 0) {
                            while ($t = mysqli_fetch_array($testqry)) {
                                ?>
                                <div class="testi-card">
                                    <div class="testi-stars">
                                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                    </div>
                                    <div class="testi-quote">"</div>
                                    <p class="testi-text"><?= substr(strip_tags($t['detail']), 0, 220); ?>...</p>
                                    <div class="testi-author">
                                        <img loading="lazy" class="testi-avatar"
                                            src="<?= BASE_URL; ?>uploads/testimonial/<?= $t['image']; ?>"
                                            alt="<?= $t['alt']; ?>">
                                        <div class="testi-author-info">
                                            <h6><?= $t['name']; ?></h6>
                                            <span><?= $t['profession']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>

                <!-- Nav -->
                <div class="slider-nav">
                    <button class="slider-btn" id="testiBtnPrev" aria-label="Previous">
                        <svg viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                    </button>
                    <div class="slider-dots" id="testiDots"></div>
                    <button class="slider-btn" id="testiBtnNext" aria-label="Next">
                        <svg viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>


        <!-- ═══════════════════════════════════
         CLIENTS / BRANDS
    ═══════════════════════════════════ -->
        <section id="clients-section">
            <div class="clients-inner">
                <p class="clients-label"><?= $partfetch['title'] ?? 'Trusted Partners & Brands'; ?></p>
                <div class="clients-marquee">
                    <div class="clients-track">
                        <?php
                        $partqry = mysqli_query($conn, "SELECT * FROM `tbl_partner` WHERE `p_status`='1' ORDER BY `p_sort` ASC");
                        $logos = [];
                        if (mysqli_num_rows($partqry) != 0) {
                            while ($p = mysqli_fetch_array($partqry)) {
                                $logos[] = $p;
                                echo '<img loading="lazy" class="client-logo" src="' . BASE_URL . 'uploads/client/' . $p['p_image'] . '" alt="' . $p['alt'] . '">';
                            }
                            // Duplicate for seamless loop
                            foreach ($logos as $p) {
                                echo '<img loading="lazy" class="client-logo" src="' . BASE_URL . 'uploads/client/' . $p['p_image'] . '" alt="' . $p['alt'] . '">';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>


        <!-- ═══════════════════════════════════
         BLOGS
    ═══════════════════════════════════ -->
        <section id="blogs-section">
            <div class="section-header">
                <span class="section-tag"
                    style="display:block; text-align:center; padding-left:0; margin-bottom:12px;"><?= $homeExtra['blog_title']; ?></span>
                <h2 class="section-heading"><?= $homeExtra['blog_subtitle']; ?></h2>
                <div class="divider"></div>
            </div>

            <div class="blog-slider-wrap">
                <div class="blog-slider-viewport">
                    <div class="blog-slider-track" id="blogTrack">
                        <?php
                        $getLatest = mysqli_query($conn, "SELECT * FROM tbl_blogs WHERE b_status='1' ORDER BY b_date DESC LIMIT 9");
                        if (mysqli_num_rows($getLatest) > 0) {
                            while ($blog = mysqli_fetch_assoc($getLatest)) {
                                ?>
                                <a href="<?= BASE_URL; ?>blog-detail/<?= $blog['b_url']; ?>" class="blog-card">
                                    <div class="blog-img">
                                        <img loading="lazy" src="<?= BASE_URL; ?>uploads/blogs/<?= $blog['b_image']; ?>"
                                            alt="<?= $blog['alt']; ?>">
                                        <span class="blog-date-pill"><?= date("M d, Y", strtotime($blog['b_date'])); ?></span>
                                    </div>
                                    <div class="blog-body">
                                        <h4><?= $blog['b_title']; ?></h4>

                                        <p class="blog-card-excerpt">
                                            <?= strip_tags($blog['b_description']); ?>...
                                        </p>

                                        <span class="blog-arrow">Read Article →</span>
                                    </div>
                                </a>
                            <?php }
                        } ?>
                    </div>
                </div>

                <!-- Nav -->
                <div class="slider-nav">
                    <button class="slider-btn" id="blogBtnPrev" aria-label="Previous">
                        <svg viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                    </button>
                    <div class="slider-dots" id="blogDots"></div>
                    <button class="slider-btn" id="blogBtnNext" aria-label="Next">
                        <svg viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="blogs-footer">
                <a href="<?= BASE_URL; ?>blog" class="btn-sage">View All Articles</a>
            </div>
        </section>


        <!-- ═══════════════════════════════════
         FOOTER
    ═══════════════════════════════════ -->
        <?php include 'inc/footer.php'; ?>

    </div><!-- END PAGE -->

    <?php include 'inc/footer-data.php'; ?>

    <script>
        // ── Preloader ──
        window.addEventListener('load', () => {
            document.getElementById('loader-wrapper').classList.add('hidden');
            setTimeout(() => document.getElementById('loader-wrapper').style.display = 'none', 700);
        });

        // ── Hero Banner Slider ──
        (function () {
            const slides = document.querySelectorAll('.hero-slide');
            const dots = document.querySelectorAll('.hero-dot');
            if (!slides.length) return;
            let current = 0, timer;

            function goTo(n) {
                slides[current].classList.remove('active');
                if (dots[current]) dots[current].classList.remove('active');
                current = (n + slides.length) % slides.length;
                slides[current].classList.add('active');
                if (dots[current]) dots[current].classList.add('active');
            }

            function autoplay() { timer = setInterval(() => goTo(current + 1), 5000); }
            autoplay();

            dots.forEach((dot, i) => dot.addEventListener('click', () => { clearInterval(timer); goTo(i); autoplay(); }));

            const prevBtn = document.getElementById('heroPrev');
            const nextBtn = document.getElementById('heroNext');
            if (prevBtn) prevBtn.addEventListener('click', () => { clearInterval(timer); goTo(current - 1); autoplay(); });
            if (nextBtn) nextBtn.addEventListener('click', () => { clearInterval(timer); goTo(current + 1); autoplay(); });
        })();

        // ── Generic Carousel Factory ──
        function makeSlider({ trackId, prevId, nextId, dotsId, visibleCount }) {
            const track = document.getElementById(trackId);
            const dotsEl = document.getElementById(dotsId);
            if (!track) return;

            const cards = track.children;
            const total = cards.length;
            if (!total) return;

            // Responsive visible count
            function getVisible() {
                if (window.innerWidth <= 640) return 1;
                if (window.innerWidth <= 1024) return 2;
                return visibleCount;
            }

            let current = 0;
            let vis = getVisible();
            const pages = Math.ceil(total / vis);

            // Build dots
            dotsEl.innerHTML = '';
            for (let i = 0; i < pages; i++) {
                const d = document.createElement('span');
                d.className = 's-dot' + (i === 0 ? ' active' : '');
                d.addEventListener('click', () => goTo(i));
                dotsEl.appendChild(d);
            }

            function updateDots() {
                dotsEl.querySelectorAll('.s-dot').forEach((d, i) => d.classList.toggle('active', i === current));
            }

            function setCardWidth() {
                vis = getVisible();
                const gap = 24;
                const vp = track.parentElement;
                const totalW = vp.offsetWidth;
                const cardW = (totalW - gap * (vis - 1)) / vis;
                Array.from(cards).forEach(c => {
                    c.style.flex = `0 0 ${cardW}px`;
                    c.style.marginRight = gap + 'px';
                });
                goTo(current); // re-render position
            }

            function goTo(n) {
                const newPages = Math.ceil(total / getVisible());
                current = Math.max(0, Math.min(n, newPages - 1));
                vis = getVisible();
                const gap = 24;
                const vp = track.parentElement;
                const cardW = (vp.offsetWidth - gap * (vis - 1)) / vis;
                const offset = current * vis * (cardW + gap);
                track.style.transform = `translateX(-${offset}px)`;
                updateDots();
            }

            document.getElementById(prevId).addEventListener('click', () => goTo(current - 1));
            document.getElementById(nextId).addEventListener('click', () => goTo(current + 1));

            // Auto-advance
            let autoT = setInterval(() => goTo(current + 1 >= Math.ceil(total / getVisible()) ? 0 : current + 1), 4500);
            track.parentElement.addEventListener('mouseenter', () => clearInterval(autoT));
            track.parentElement.addEventListener('mouseleave', () => {
                autoT = setInterval(() => goTo(current + 1 >= Math.ceil(total / getVisible()) ? 0 : current + 1), 4500);
            });

            setCardWidth();
            window.addEventListener('resize', setCardWidth);
        }

        makeSlider({ trackId: 'testiTrack', prevId: 'testiBtnPrev', nextId: 'testiBtnNext', dotsId: 'testiDots', visibleCount: 3 });
        makeSlider({ trackId: 'blogTrack', prevId: 'blogBtnPrev', nextId: 'blogBtnNext', dotsId: 'blogDots', visibleCount: 3 });

        // ── Animate on scroll ──
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.style.opacity = 1; e.target.style.transform = 'translateY(0)'; } });
        }, { threshold: 0.1 });

        document.querySelectorAll('.service-card, .why-card').forEach(el => {
            el.style.opacity = 0;
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>


</body>

</html>