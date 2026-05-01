<?php
$con = mysqli_query($conn, "SELECT * FROM `tbl_contact`");
$coninfo = mysqli_fetch_array($con);

$conqry = mysqli_query($conn, "SELECT * FROM `tbl_profile`");
$proinfo = mysqli_fetch_array($conqry);

// Newsletter submit
if (isset($_POST['submitsat'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check = mysqli_query($conn, "SELECT `nl_email` FROM `tbl_newsletter` WHERE `nl_email`='$email'");
    if (mysqli_num_rows($check) == 0) {
        $ins = mysqli_query($conn, "INSERT INTO `tbl_newsletter`(`nl_email`) VALUES ('$email')");
        $_SESSION[$ins ? 'success' : 'error'] = $ins ? "Successfully subscribed!" : "Something went wrong. Please try again.";
    } else {
        $_SESSION['error'] = "This email is already subscribed.";
    }
}

// First brand & first service for quick links
$brand1fetch = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tbl_brand` WHERE `status`='1' ORDER BY `sort` ASC LIMIT 1"));
$brandfetch = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `status`='1' ORDER BY `sort` ASC LIMIT 1"));
?>


<footer id="main-footer">

    <div class="footer-upper c-footer">

        <!-- ══ COL 1: Brand ══ -->
        <div class="footer-col">
            <span class="footer-col-title">About Us</span>

            <?php if (!empty($proinfo['pro_logo'])): ?>
                <img src="<?= BASE_URL; ?>uploads/<?= $proinfo['pro_logo']; ?>" class="footer-brand-logo"
                    alt="<?= $proinfo['pro_title']; ?>">
            <?php else: ?>
                <img src="<?= BASE_URL; ?>images/ft-logo.png" class="footer-brand-logo" alt="<?= $proinfo['pro_title']; ?>">
            <?php endif; ?>

            <p class="footer-brand-desc">
                <?= !empty($proinfo['pro_detail']) ? mb_strimwidth(strip_tags($proinfo['pro_detail']), 0, 160, '…') : 'Providing trusted dental care with a gentle touch. Your smile is our passion.'; ?>
            </p>

            <!-- Social Icons -->
            <div class="footer-socials">
                <?php if (!empty($coninfo['con_facebook'])): ?>
                    <a href="<?= $coninfo['con_facebook']; ?>" target="_blank" rel="noopener" class="footer-social-btn"
                        aria-label="Facebook">
                        <svg viewBox="0 0 24 24">
                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if (!empty($coninfo['con_instagram'])): ?>
                    <a href="<?= $coninfo['con_instagram']; ?>" target="_blank" rel="noopener" class="footer-social-btn"
                        aria-label="Instagram">
                        <svg viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" />
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if (!empty($coninfo['con_whatsapp'])): ?>
                    <a href="https://api.whatsapp.com/send?phone=<?= $coninfo['con_whatsapp']; ?>&text=Hello%20Please%20call%20me%20back%20to%20discuss%20more"
                        target="_blank" rel="noopener" class="footer-social-btn" aria-label="WhatsApp">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" />
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if (!empty($coninfo['con_twitter'])): ?>
                    <a href="<?= $coninfo['con_twitter']; ?>" target="_blank" rel="noopener" class="footer-social-btn"
                        aria-label="Twitter / X">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if (!empty($coninfo['con_linkedin'])): ?>
                    <a href="<?= $coninfo['con_linkedin']; ?>" target="_blank" rel="noopener" class="footer-social-btn"
                        aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z" />
                            <circle cx="4" cy="4" r="2" />
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if (!empty($coninfo['con_youtube'])): ?>
                    <a href="<?= $coninfo['con_youtube']; ?>" target="_blank" rel="noopener" class="footer-social-btn"
                        aria-label="YouTube">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M22.54 6.42a2.78 2.78 0 00-1.95-1.97C18.88 4 12 4 12 4s-6.88 0-8.59.45A2.78 2.78 0 001.46 6.42 29 29 0 001 12a29 29 0 00.46 5.58A2.78 2.78 0 003.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.45a2.78 2.78 0 001.95-1.95A29 29 0 0023 12a29 29 0 00-.46-5.58z" />
                            <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" />
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if (!empty($coninfo['con_kooapp'])): ?>
                    <a href="<?= $coninfo['con_kooapp']; ?>" target="_blank" rel="noopener" class="footer-social-btn"
                        aria-label="Koo">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M8 12c0-2.21 1.79-4 4-4s4 1.79 4 4-1.79 4-4 4-4-1.79-4-4z" />
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>


        <!-- ══ COL 2: Quick Links ══ -->
        <div class="footer-col">
            <span class="footer-col-title">Quick Links</span>
            <ul class="footer-links">
                <li>
                    <a href="<?= BASE_URL; ?>">
                        <span class="link-arrow"><svg viewBox="0 0 24 24">
                                <polyline points="9 18 15 12 9 6" />
                            </svg></span>
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?= BASE_URL; ?>about">
                        <span class="link-arrow"><svg viewBox="0 0 24 24">
                                <polyline points="9 18 15 12 9 6" />
                            </svg></span>
                        About Us
                    </a>
                </li>

                <li>
                    <a href="<?= BASE_URL; ?>blog">
                        <span class="link-arrow"><svg viewBox="0 0 24 24">
                                <polyline points="9 18 15 12 9 6" />
                            </svg></span>
                        Blog
                    </a>
                </li>


                <li>
                    <a href="<?= BASE_URL; ?>contact">
                        <span class="link-arrow"><svg viewBox="0 0 24 24">
                                <polyline points="9 18 15 12 9 6" />
                            </svg></span>
                        Contact Us
                    </a>
                </li>
            </ul>
        </div>


        <!-- ══ COL 3: Our Services ══ -->
        <div class="footer-col">
            <span class="footer-col-title">Our Services</span>
            <ul class="footer-links">
                <?php
                $ftSvc = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `status`='1' ORDER BY `sort` ASC LIMIT 6");
                if (mysqli_num_rows($ftSvc) != 0) {
                    while ($fs = mysqli_fetch_array($ftSvc)) {
                        $fhref = (!empty($fs['link'])) ? $fs['link'] : BASE_URL . 'services/' . $fs['url'];
                        ?>
                        <li>
                            <a href="<?= $fhref; ?>">
                                <span class="link-arrow"><svg viewBox="0 0 24 24">
                                        <polyline points="9 18 15 12 9 6" />
                                    </svg></span>
                                <?= $fs['heading']; ?>
                            </a>
                        </li>
                    <?php }
                } ?>
            </ul>
        </div>


        <!-- ══ COL 3: Contact ══ -->
        <div class="footer-col">
            <span class="footer-col-title">Our Location</span>
            <div class="footer-contact-items">

                <?php if (!empty($coninfo['con_address'])): ?>
                    <div class="footer-contact-item">
                        <div class="footer-contact-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </div>
                        <div class="footer-contact-text">
                            <span class="footer-contact-label">Address</span>
                            <div class="footer-contact-value"><?= $coninfo['con_address']; ?></div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($coninfo['con_email1'])): ?>
                    <a href="mailto:<?= $coninfo['con_email1']; ?>" class="footer-contact-item">
                        <div class="footer-contact-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                        </div>
                        <div class="footer-contact-text">
                            <span class="footer-contact-label">Email</span>
                            <div class="footer-contact-value"><?= $coninfo['con_email1']; ?></div>
                        </div>
                    </a>
                <?php endif; ?>

                <?php if (!empty($coninfo['con_phone1'])): ?>
                    <div class="footer-contact-item">
                        <div class="footer-contact-icon">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.95 11 19.79 19.79 0 01.88 2.38 2 2 0 012.86.18h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L7.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 14l-.08 2.92z" />
                            </svg>
                        </div>
                        <div class="footer-contact-text">
                            <span class="footer-contact-label">Phone</span>
                            <div class="footer-contact-value">
                                <a href="tel:<?= $coninfo['con_phone1']; ?>"><?= $coninfo['con_phone1']; ?></a>
                                <?php if (!empty($coninfo['con_phone2'])): ?>
                                    <a href="tel:<?= $coninfo['con_phone2']; ?>"><?= $coninfo['con_phone2']; ?></a>
                                <?php endif; ?>
                                <?php if (!empty($coninfo['con_phone3'])): ?>
                                    <a href="tel:<?= $coninfo['con_phone3']; ?>"><?= $coninfo['con_phone3']; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>


        <!-- ══ COL 4: Callback Form ══ -->
        <div class="footer-col d-none">
            <span class="footer-col-title">Request a Call Back</span>
            <div class="footer-form-card">
                <p class="footer-form-intro">Leave your details and we'll call you back at your preferred time.</p>
                <form method="POST" action="<?= BASE_URL; ?>mail/footerMail.php" name="contactForm">
                    <div class="footer-form-group">
                        <label>Your Name</label>
                        <input type="text" name="name" placeholder="Full name" required>
                    </div>
                    <div class="footer-form-group">
                        <label>Phone Number</label>
                        <input type="tel" name="phone" placeholder="+91 XXXXX XXXXX" required>
                    </div>
                    <div class="recaptcha-wrap">
                        <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                    </div>
                    <button type="submit" name="submit2" class="footer-submit-btn">
                        Request Call Back
                        <svg viewBox="0 0 24 24">
                            <line x1="22" y1="2" x2="11" y2="13" />
                            <polygon points="22 2 15 22 11 13 2 9 22 2" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

    </div><!-- END footer-upper -->


    <!-- ── Divider ── -->
    <div class="footer-divider">
        <div class="footer-divider-line"></div>
    </div>


    <!-- ── Bottom Bar ── -->
    <div class="footer-bottom">

        <p class="footer-copyright">
            © <?= date('Y'); ?> <span>Copyrights</span>. All Rights Reserved
            <!-- &nbsp;·&nbsp; Design by
            <a href="https://quitegood.co/" target="_blank" rel="noopener">dsdad adsd</a> -->
        </p>

        <div class="footer-bottom-links">
            <a href="<?= BASE_URL; ?>privacy">Privacy Policy</a>
            <div class="footer-bottom-dot"></div>
            <a href="<?= BASE_URL; ?>termsandcondition">Terms &amp; Conditions</a>

            <?php if (!empty($coninfo['con_whatsapp'])): ?>
                <div class="footer-bottom-dot"></div>
                <a href="https://api.whatsapp.com/send?phone=<?= $coninfo['con_whatsapp']; ?>&text=Hello" target="_blank"
                    rel="noopener">
                    WhatsApp Us
                </a>
            <?php endif; ?>
        </div>



    </div>

</footer>
<?php include 'inc/booking-modal.php'; ?>