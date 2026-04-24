<?php require('inc/function.php'); ?>
<?php
$con = mysqli_query($conn, "SELECT * FROM `tbl_contact`");
$coninfo = mysqli_fetch_array($con);

$profile = mysqli_query($conn, "SELECT * FROM `tbl_profile` WHERE pro_id='1'");
$prof = mysqli_fetch_array($profile);

$contact_seo = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_seo` WHERE `id`='2' AND `name`='Contact'"));

if (!empty($contact_seo['title']) && !empty($contact_seo['description']) && !empty($contact_seo['keywords'])) {
    $seo_title = $contact_seo['title'];
    $seo_detail = $contact_seo['description'];
    $seo_keyword = $contact_seo['keywords'];
} else {
    $seo_title = $prof['pro_title'];
    $seo_detail = $prof['pro_detail'];
    $seo_keyword = $prof['pro_keyword'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/head.php'; ?>
    <title><?= $seo_title ?></title>
    <meta name="description" content="<?= $seo_detail ?>" />
    <meta name="keywords" content="<?= $seo_keyword ?>">
    <meta name="robots" content="index, follow" />
    <?= $contact_seo['head_detail'] ?>

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

        <!-- HEADER -->
        <?php include 'inc/header.php'; ?>


        <!-- ═══════════════════════════════════════
         PAGE HERO
    ═══════════════════════════════════════ -->
        <div class="page-hero">
            <div class="page-hero-inner">
                <nav class="breadcrumb-nav">
                    <a href="<?= BASE_URL; ?>">Home</a>
                    <span class="breadcrumb-sep">›</span>
                    <span><?= !empty($coninfo['title']) ? $coninfo['title'] : 'Contact Us'; ?></span>
                </nav>
                <h1><?= $coninfo['title']; ?> </h1>
            </div>
        </div>

        <!-- ═══════════════════════════════════════
         CONTACT SECTION
    ═══════════════════════════════════════ -->
        <div id="contact-section">

            <!-- ── Left: Info ── -->
            <?php
            $serviceTitle = mysqli_fetch_assoc(mysqli_query($conn, "SELECT contact_title,contact_subtitle FROM `tbl_home_extra`"));
            ?>
            <div class="contact-info-col">
                <span class="section-tag">Get In Touch</span>
                <h2 class="contact-heading"><?= $serviceTitle['contact_title']; ?></h2>
                <p class="contact-intro">
                    <?= $serviceTitle['contact_subtitle']; ?>
                </p>

                <div class="detail-cards">

                    <?php if (!empty($coninfo['con_phone1'])): ?>
                        <div class="detail-card">
                            <div class="detail-card-icon">
                                <svg viewBox="0 0 24 24">
                                    <path
                                        d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.95 11 19.79 19.79 0 01.88 2.38 2 2 0 012.86.18h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L7.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 14l-.08 2.92z" />
                                </svg>
                            </div>
                            <div class="detail-card-body">
                                <span class="detail-card-label">Phone Numbers</span>
                                <div class="detail-card-values">
                                    <a href="tel:<?= $coninfo['con_phone1']; ?>"><?= $coninfo['con_phone1']; ?></a>
                                    <?php if (!empty($coninfo['con_phone2'])): ?><a
                                            href="tel:<?= $coninfo['con_phone2']; ?>"><?= $coninfo['con_phone2']; ?></a><?php endif; ?>
                                    <?php if (!empty($coninfo['con_phone3'])): ?><a
                                            href="tel:<?= $coninfo['con_phone3']; ?>"><?= $coninfo['con_phone3']; ?></a><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($coninfo['con_email1'])): ?>
                        <div class="detail-card">
                            <div class="detail-card-icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                            </div>
                            <div class="detail-card-body">
                                <span class="detail-card-label">Email Addresses</span>
                                <div class="detail-card-values">
                                    <a href="mailto:<?= $coninfo['con_email1']; ?>"><?= $coninfo['con_email1']; ?></a>
                                    <?php if (!empty($coninfo['con_email2'])): ?><a
                                            href="mailto:<?= $coninfo['con_email2']; ?>"><?= $coninfo['con_email2']; ?></a><?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($coninfo['con_address'])): ?>
                        <div class="detail-card">
                            <div class="detail-card-icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </div>
                            <div class="detail-card-body">
                                <span class="detail-card-label">Clinic Address</span>
                                <div class="detail-card-values">
                                    <span><?= $coninfo['con_address']; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- Social Links -->
                <div class="social-row">
                    <?php if (!empty($coninfo['con_facebook'])): ?>
                        <a href="<?= $coninfo['con_facebook']; ?>" class="social-chip" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                            </svg>
                            Facebook
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($coninfo['con_instagram'])): ?>
                        <a href="<?= $coninfo['con_instagram']; ?>" class="social-chip" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" />
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                            </svg>
                            Instagram
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($coninfo['con_whatsapp'])): ?>
                        <a href="https://api.whatsapp.com/send?phone=<?= $coninfo['con_whatsapp']; ?>" class="social-chip"
                            target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" />
                            </svg>
                            WhatsApp
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($coninfo['con_twitter'])): ?>
                        <a href="<?= $coninfo['con_twitter']; ?>" class="social-chip" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" />
                            </svg>
                            Twitter
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($coninfo['con_youtube'])): ?>
                        <a href="<?= $coninfo['con_youtube']; ?>" class="social-chip" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" />
                            </svg>
                            Youtube
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($coninfo['con_linkedin'])): ?>
                        <a href="<?= $coninfo['con_linkedin']; ?>" class="social-chip" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" />
                            </svg>
                            Linkedin
                        </a>
                    <?php endif; ?>
                    <?php if (!empty($coninfo['con_kooapp'])): ?>
                        <a href="<?= $coninfo['con_kooapp']; ?>" class="social-chip" target="_blank" rel="noopener">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" />
                            </svg>
                            Kooapp
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- ── Right: Form ── -->
            <div class="contact-form-col">
                <div class="form-card">
                    <h3 class="form-card-heading">Send Us a Message</h3>
                    <p class="form-card-sub">Fill in the form below and we'll get back to you shortly.</p>

                    <form method="POST" action="<?= BASE_URL; ?>mail/contactMail" name="contactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Your Name *</label>
                                <input type="text" name="name" placeholder="Full name" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number *</label>
                                <input type="tel" name="phone" placeholder="+91 XXXXX XXXXX" required>
                            </div>
                            <div class="form-group full">
                                <label>Email Address *</label>
                                <input type="email" name="email" placeholder="your@email.com" required>
                            </div>
                            <div class="form-group full">
                                <label>Patient Type *</label>
                                <div class="select-wrap">
                                    <select name="patient" required>
                                        <option value="New Patient">New Patient</option>
                                        <option value="Returning Patient">Returning Patient</option>
                                        <option value="Visited Before - Yes">Visited Before - Yes</option>
                                        <option value="Visited Before - No">Visited Before - No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group full">
                                <label>Message</label>
                                <textarea name="message"
                                    placeholder="Tell us about your dental concern or how we can help you…"></textarea>
                            </div>
                        </div>

                        <div class="recaptcha-wrap">
                            <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                        </div>

                        <button type="submit" name="submit" class="btn-submit">
                            Send Message
                            <svg viewBox="0 0 24 24">
                                <line x1="22" y1="2" x2="11" y2="13" />
                                <polygon points="22 2 15 22 11 13 2 9 22 2" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        </div><!-- END contact-section -->


        <!-- ═══════════════════════════════════════
         MAP
    ═══════════════════════════════════════ -->
        <?php if (!empty($coninfo['con_map'])): ?>
            <section id="map-section">
                <div class="map-wrap">
                    <iframe src="<?= $coninfo['con_map']; ?>" height="480" allowfullscreen="" loading="lazy"
                        title="Clinic Location">
                    </iframe>
                    <div class="map-label">
                        <div class="map-label-dot"></div>
                        <span><?= !empty($coninfo['con_address']) ? $coninfo['con_address'] : 'Our Clinic'; ?></span>
                    </div>
                </div>
            </section>
        <?php endif; ?>


        <!-- FOOTER -->
        <?php include 'inc/footer.php'; ?>

    </div><!-- END PAGE -->

    <?php include 'inc/footer-data.php'; ?>

    <script>
        // Preloader
        window.addEventListener('load', () => {
            document.getElementById('loader-wrapper').classList.add('hidden');
            setTimeout(() => document.getElementById('loader-wrapper').style.display = 'none', 700);
        });

        // Scroll reveal
        const obs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.style.opacity = 1;
                    e.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.detail-card, .info-strip-card, .form-card').forEach((el, i) => {
            el.style.opacity = 0;
            el.style.transform = 'translateY(20px)';
            el.style.transition = `opacity 0.6s ease ${i * 0.08}s, transform 0.6s ease ${i * 0.08}s`;
            obs.observe(el);
        });

        // Form submit feedback
        document.querySelector('form[name="contactForm"]').addEventListener('submit', function () {
            const btn = this.querySelector('.btn-submit');
            btn.innerHTML = `<svg viewBox="0 0 24 24" style="width:18px;height:18px;stroke:white;fill:none;stroke-width:2;animation:spin 0.8s linear infinite;"><circle cx="12" cy="12" r="10" stroke-opacity="0.3"/><path d="M12 2a10 10 0 0110 10"/></svg> Sending…`;
            btn.style.opacity = '0.8';
            btn.disabled = true;
        });
    </script>
</body>

</html>