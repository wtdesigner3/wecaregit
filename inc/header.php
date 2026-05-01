<?php
$con = mysqli_query($conn, "SELECT * FROM `tbl_contact`");
$coninfo = mysqli_fetch_array($con);

$conqry = mysqli_query($conn, "SELECT * FROM `tbl_profile`");
$proinfo = mysqli_fetch_array($conqry);
?>


<!-- ── TOP BAR ── -->
<!--<div class="topbar">-->
<!--    <div class="topbar-left">-->
<!--        <?php if (!empty($coninfo['con_phone1'])): ?>-->
  <!--        <span class="topbar-item">-->
  <!--            <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.95 11 19.79 19.79 0 01.88 2.38 2 2 0 012.86.18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0121.22 14l.7 2.92z"/></svg>-->
  <!--            <a href="tel:<?= $coninfo['con_phone1']; ?>"><?= $coninfo['con_phone1']; ?></a>-->
  <!--            <?php if (!empty($coninfo['con_phone2'])): ?>-->
    <!--            &nbsp;·&nbsp;<a href="tel:<?= $coninfo['con_phone2']; ?>"><?= $coninfo['con_phone2']; ?></a>-->
    <!--            <?php endif; ?>-->
  <!--        </span>-->
  <!--        <?php endif; ?>-->

<!--        <?php if (!empty($coninfo['con_email1'])): ?>-->
  <!--        <a href="mailto:<?= $coninfo['con_email1']; ?>" class="topbar-item">-->
  <!--            <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>-->
  <!--            <?= $coninfo['con_email1']; ?>-->
  <!--        </a>-->
  <!--        <?php endif; ?>-->
<!--    </div>-->

<!--    <div class="topbar-right">-->
<!--        <?php if (!empty($coninfo['con_facebook'])): ?>-->
  <!--        <a href="<?= $coninfo['con_facebook']; ?>" class="topbar-social" target="_blank" rel="noopener" aria-label="Facebook">-->
  <!--            <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>-->
  <!--        </a>-->
  <!--        <?php endif; ?>-->
<!--        <?php if (!empty($coninfo['con_instagram'])): ?>-->
  <!--        <a href="<?= $coninfo['con_instagram']; ?>" class="topbar-social" target="_blank" rel="noopener" aria-label="Instagram">-->
  <!--            <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>-->
  <!--        </a>-->
  <!--        <?php endif; ?>-->
<!--        <?php if (!empty($coninfo['con_whatsapp'])): ?>-->
  <!--        <a href="https://api.whatsapp.com/send?phone=<?= $coninfo['con_whatsapp']; ?>&text=Hello%20I%20need%20assistance" class="topbar-social" target="_blank" rel="noopener" aria-label="WhatsApp">-->
  <!--            <svg viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/></svg>-->
  <!--        </a>-->
  <!--        <?php endif; ?>-->
<!--    </div>-->
<!--</div>-->

<!-- ═══ TOP CONTACT BAR ═══ -->
<div class="top-contact-bar">
  <div class="top-bar-inner">

    <div class="top-bar-ticker">
      <div class="ticker-track">
        <span class="ticker-item"><span class="ticker-dot"></span>✦ Now accepting new patients — Book your smile
          consultation today!</span>
        <span class="ticker-item"><span class="ticker-dot"></span>Emergency dental care available — Call us
          anytime</span>
        <span class="ticker-item"><span class="ticker-dot"></span>Modern dentistry with a gentle touch — Experience the
          difference</span>
        <span class="ticker-item"><span class="ticker-dot"></span>Trusted by thousands of happy patients across the
          region</span>
        <!-- Duplicate for seamless loop -->
        <span class="ticker-item"><span class="ticker-dot"></span>✦ Now accepting new patients — Book your smile
          consultation today!</span>
        <span class="ticker-item"><span class="ticker-dot"></span>Emergency dental care available — Call us
          anytime</span>
        <span class="ticker-item"><span class="ticker-dot"></span>Modern dentistry with a gentle touch — Experience the
          difference</span>
        <span class="ticker-item"><span class="ticker-dot"></span>Trusted by thousands of happy patients across the
          region</span>
      </div>
    </div>

    <div class="top-bar-contacts">
      <a class="contact-pill pill-address" href="https://maps.google.com/?q=YOUR+CLINIC+ADDRESS" target="_blank"
        rel="noopener">
        <svg class="pill-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
          <circle cx="12" cy="10" r="3" />
        </svg>
        <?= $coninfo['con_address']; ?>
      </a>
      <div class="contact-divider"></div>
      <a class="contact-pill pill-phone" href="tel:<?= $coninfo['con_phone1']; ?>">
        <svg class="pill-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path
            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.83a16 16 0 0 0 5.58 5.58l1.5-1.5a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 15" />
        </svg>
        +91 <?= $coninfo['con_phone1']; ?>
      </a>
      <a class="contact-pill pill-phone d-none" href="tel:<?= $coninfo['con_phone2']; ?>">
        <svg class="pill-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path
            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.83a16 16 0 0 0 5.58 5.58l1.5-1.5a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21.73 15" />
        </svg>
        +91 <?= $coninfo['con_phone2']; ?>
      </a>
    </div>

  </div>
</div>

<!-- ── MAIN HEADER ── -->
<header id="site-header">
  <div class="header-inner">

    <!-- Logo -->
    <a href="<?= BASE_URL; ?>" class="header-logo">
      <?php if (!empty($proinfo['pro_logo'])): ?>
        <img src="<?= BASE_URL; ?>uploads/<?= $proinfo['pro_logo']; ?>" alt="<?= $proinfo['pro_title']; ?>"
          class="logo-img">
      <?php else: ?>
        <div class="logo-fallback-mark">
          <svg viewBox="0 0 24 24">
            <path d="M12 2C8.5 2 5 5.5 5 9c0 2.5 1.2 4.5 3 6l1.5 7h5L16 15c1.8-1.5 3-3.5 3-6 0-3.5-3.5-7-7-7z" />
          </svg>
        </div>
        <div class="logo-text-wrap">
          <span class="logo-name"><?= $proinfo['pro_title'] ?? 'DentalCare'; ?></span>
          <span class="logo-tagline">Dental Care</span>
        </div>
      <?php endif; ?>
    </a>

    <!-- Desktop Nav -->
    <ul class="main-nav">
      <li><a href="<?= BASE_URL; ?>">Home</a></li>
      <li><a href="<?= BASE_URL; ?>about">About Us</a></li>

      <!-- Our Services dropdown -->
      <li>
        <a href="javascript:void(0)">
          Our Services
          <svg class="arrow" viewBox="0 0 24 24">
            <polyline points="6 9 12 15 18 9" />
          </svg>
        </a>
        <div class="nav-dropdown mega">
          <div class="mega-grid">
            <?php
            $svcNav = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `status`='1' ORDER BY `sort` ASC");
            if (mysqli_num_rows($svcNav) != 0) {
              while ($svc = mysqli_fetch_array($svcNav)) {
                $href = (!empty($svc['link'])) ? $svc['link'] : BASE_URL . $svc['url'];
                ?>
                <a href="<?= $href; ?>" class="dropdown-item">

                  <span class="dropdown-label"><?= $svc['heading']; ?></span>
                </a>
              <?php }
            } ?>
          </div>
        </div>
      </li>


      <li><a href="<?= BASE_URL; ?>blog">Blog</a></li>
      <li><a href="<?= BASE_URL; ?>contact">Contact</a></li>
    </ul>

    <!-- Book CTA -->
    <a href="#" class="header-cta  d-none d-md-block" onclick="openModal()">
      <svg viewBox="0 0 24 24">
        <rect x="3" y="4" width="18" height="18" rx="2" />
        <line x1="16" y1="2" x2="16" y2="6" />
        <line x1="8" y1="2" x2="8" y2="6" />
        <line x1="3" y1="10" x2="21" y2="10" />
      </svg>
      Book Appointment
    </a>

    <!-- Hamburger -->
    <button class="mobile-toggle" id="mobileToggle" aria-label="Open menu">
      <svg viewBox="0 0 24 24">
        <line x1="3" y1="6" x2="21" y2="6" />
        <line x1="3" y1="12" x2="21" y2="12" />
        <line x1="3" y1="18" x2="21" y2="18" />
      </svg>
    </button>

  </div>
</header>


<!-- ── MOBILE DRAWER ── -->
<div class="mobile-drawer" id="mobileDrawer">
  <div class="drawer-backdrop" id="drawerBackdrop"></div>
  <div class="drawer-panel">

    <div class="drawer-top">
      <?php if (!empty($proinfo['pro_logo'])): ?>
        <img src="<?= BASE_URL; ?>uploads/<?= $proinfo['pro_logo']; ?>" alt="<?= $proinfo['pro_title']; ?>"
          class="drawer-logo">
      <?php else: ?>
        <span
          style="font-family:'Cormorant Garamond',serif; font-size:18px; font-weight:600; color:var(--charcoal);"><?= $proinfo['pro_title'] ?? 'DentalCare'; ?></span>
      <?php endif; ?>
      <button class="drawer-close" id="drawerClose">
        <svg viewBox="0 0 24 24">
          <line x1="18" y1="6" x2="6" y2="18" />
          <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
      </button>
    </div>

    <ul class="drawer-nav">
      <li><a href="<?= BASE_URL; ?>">Home</a></li>
      <li><a href="<?= BASE_URL; ?>about">About Us</a></li>

      <!-- Our Services accordion -->
      <li>
        <button class="drawer-accordion-btn" data-target="drawer-services">
          Our Services
          <svg viewBox="0 0 24 24">
            <polyline points="6 9 12 15 18 9" />
          </svg>
        </button>
        <div class="drawer-submenu" id="drawer-services">
          <?php
          $svcMob = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `status`='1' ORDER BY `sort` ASC");
          if (mysqli_num_rows($svcMob) != 0) {
            while ($sm = mysqli_fetch_array($svcMob)) {
              $href = (!empty($sm['link'])) ? $sm['link'] : BASE_URL . $sm['url'];
              ?>
              <a href="<?= $href; ?>">
                <img src="<?= BASE_URL; ?>uploads/services/<?= $sm['hicon']; ?>" alt="<?= $sm['halt']; ?>">
                <?= $sm['heading']; ?>
              </a>
            <?php }
          } ?>
        </div>
      </li>


      <li><a href="<?= BASE_URL; ?>blog">Blog</a></li>
      <li><a href="<?= BASE_URL; ?>contact">Contact</a></li>
    </ul>

    <div class="drawer-footer">
      <a href="#" class="drawer-cta" onclick="openModal()">Book Appointment</a>
      <?php if (!empty($coninfo['con_phone1'])): ?>
        <a href="tel:<?= $coninfo['con_phone1']; ?>" class="drawer-contact">
          <svg viewBox="0 0 24 24">
            <path
              d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.95 11 19.79 19.79 0 01.88 2.38 2 2 0 012.86.18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0121.22 14l.7 2.92z" />
          </svg>
          <?= $coninfo['con_phone1']; ?>
        </a>
      <?php endif; ?>
    </div>

  </div>
</div>

<script>
  (function () {
    // Sticky header on scroll
    window.addEventListener('scroll', function () {
      document.getElementById('site-header').classList.toggle('scrolled', window.scrollY > 40);
    });

    // Mobile drawer open/close
    var toggle = document.getElementById('mobileToggle');
    var drawer = document.getElementById('mobileDrawer');
    var backdrop = document.getElementById('drawerBackdrop');
    var closeBtn = document.getElementById('drawerClose');

    function openDrawer() { drawer.classList.add('open'); document.body.style.overflow = 'hidden'; }
    function closeDrawer() { drawer.classList.remove('open'); document.body.style.overflow = ''; }

    if (toggle) toggle.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    if (backdrop) backdrop.addEventListener('click', closeDrawer);
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeDrawer(); });

    // Mobile accordion submenus
    document.querySelectorAll('.drawer-accordion-btn').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var targetId = btn.getAttribute('data-target');
        var submenu = document.getElementById(targetId);
        var isOpen = submenu.classList.contains('open');
        // Close all others
        document.querySelectorAll('.drawer-submenu').forEach(function (s) { s.classList.remove('open'); });
        document.querySelectorAll('.drawer-accordion-btn').forEach(function (b) { b.classList.remove('open'); });
        if (!isOpen) {
          submenu.classList.add('open');
          btn.classList.add('open');
        }
      });
    });
  })();
</script>




<script>
  (function () {
    const topBar = document.querySelector('.top-contact-bar');
    if (!topBar) return;

    const barHeight = topBar.offsetHeight;

    // Push page content down so it doesn't hide under the bar
    document.body.style.paddingTop = barHeight + 'px';

    let lastScrollY = window.scrollY;

    window.addEventListener('scroll', function () {
      const currentScrollY = window.scrollY;

      if (currentScrollY === 0) {
        // At the very top — always show
        topBar.classList.add('show-bar');
      } else if (currentScrollY < lastScrollY) {
        // Scrolling UP — show the bar
        topBar.classList.add('show-bar');
      } else {
        // Scrolling DOWN — hide the bar
        topBar.classList.remove('show-bar');
      }

      lastScrollY = currentScrollY;
    });

    // Show on page load if at top
    if (window.scrollY === 0) {
      topBar.classList.add('show-bar');
    }
  })();
</script>