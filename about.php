<?php require('inc/function.php'); ?>
<?php
$abt = mysqli_query($conn, "SELECT * FROM `tbl_about` WHERE id='1'");
$abtfetch = mysqli_fetch_array($abt);
$abtqry = mysqli_query($conn, "SELECT * FROM `tbl_homeabout` WHERE id='1'");
$fetchabt = mysqli_fetch_array($abtqry);

$abtdir = mysqli_query($conn, "SELECT * FROM `tbl_directors` WHERE id='1'");
$abtdirfetch = mysqli_fetch_array($abtdir);

$abt2 = mysqli_query($conn, "SELECT * FROM `tbl_teampage` WHERE id='1'");
$abtfetch2 = mysqli_fetch_array($abt2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/head.php'; ?>
    <title><?= htmlspecialchars(!empty($abtfetch['metatag']) ? $abtfetch['metatag'] : $abtfetch['title']) ?> || <?= SITE_NAME ?></title>
    <meta name="description" content="<?= htmlspecialchars($abtfetch['metadesc'] ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta name="keywords" content="<?= htmlspecialchars($abtfetch['keyword'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    <meta name="robots" content="index, follow" />
    <?= $abtfetch['head_detail'] ?>




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
         PAGE HERO
    ═══════════════════════════════════════ -->
        <div class="page-hero">
            <div class="page-hero-inner">
                <nav class="breadcrumb-nav">
                    <a href="<?= BASE_URL; ?>">Home</a>
                    <span class="breadcrumb-sep">›</span>
                    <span><?= $abtfetch['headtitle'] ?? 'About Us'; ?></span>
                </nav>
                <h1>
                    <?= $abtfetch['headtitle'] ?? 'About Us'; ?>
                </h1>
            </div>
        </div>


        <!-- ═══════════════════════════════════════
         ABOUT INTRO
    ═══════════════════════════════════════ -->
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
                <h2 class="section-heading">
                    <?= $fetchabt['title'] ?? 'Committed to <em>Exceptional</em> Dental Health'; ?>
                </h2>
                <p class="about-desc"><?= strip_tags($fetchabt['des']); ?></p>

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

                <!--<a href="<?= BASE_URL; ?>about" class="btn-sage">-->
                <!--    Learn More About Us-->
                <!--    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">-->
                <!--        <path d="M5 12h14M12 5l7 7-7 7" />-->
                <!--    </svg>-->
                <!--</a>-->
            </div>
        </section>


        <!-- ═══════════════════════════════════════
         STATS BAND
    ═══════════════════════════════════════ -->
        <?php
        $achieve = mysqli_query($conn, "SELECT * FROM `tbl_achievement` WHERE id='1'");
        if (mysqli_num_rows($achieve) > 0) {
            $allStats = mysqli_fetch_assoc($achieve);
            ?>
            <div id="stats-band">
                <div class="stats-inner">
                    <?php
                    if (!empty($allStats['number1']) && !empty($allStats['text1'])) {
                        ?>
                        <div class="stat-item">
                            <div class="stat-num"><?= $allStats['number1'] ?> </div>
                            <div class="stat-label"><?= $allStats['text1'] ?></div>
                        </div>
                    <?php } ?>
                    <?php
                    if (!empty($allStats['number2']) && !empty($allStats['text2'])) {
                        ?>
                        <div class="stat-item">
                            <div class="stat-num"><?= $allStats['number2'] ?></div>
                            <div class="stat-label"><?= $allStats['text2'] ?></div>
                        </div>
                    <?php } ?>
                    <?php
                    if (!empty($allStats['number3']) && !empty($allStats['text3'])) {
                        ?>
                        <div class="stat-item">
                            <div class="stat-num"><?= $allStats['number3'] ?></div>
                            <div class="stat-label"><?= $allStats['text3'] ?></div>
                        </div>
                    <?php } ?>
                    <?php
                    if (!empty($allStats['number4']) && !empty($allStats['text4'])) {
                        ?>
                        <div class="stat-item">
                            <div class="stat-num"><?= $allStats['number4'] ?></div>
                            <div class="stat-label"><?= $allStats['text4'] ?></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <!-- ═══════════════════════════════════════
         DIRECTOR / FOUNDER SECTION
    ═══════════════════════════════════════ -->
        <section id="director-section">
            <div class="director-inner">

                <!-- Photo -->
                <div class="director-img-wrap">
                    <img loading="lazy" class="director-img"
                        src="<?= BASE_URL; ?>uploads/about/<?= $abtdirfetch['image']; ?>"
                        alt="<?= $abtdirfetch['alt']; ?>">
                    <span class="director-img-tag">Founder &amp; Director</span>
                    <div class="director-quote-mark">"</div>
                </div>

                <!-- Content -->
                <div class="director-content">
                    <span class="section-tag"><?= $abtdirfetch['subtitle'] ?? 'Meet Our Leader'; ?></span>
                    <h2 class="director-name"><?= $abtdirfetch['title']; ?></h2>
                    <span class="director-role"><?= $abtdirfetch['subtitle']; ?></span>

                    <?php if (!empty($abtdirfetch['txt1'])): ?>
                        <blockquote class="director-tagline"><?= $abtdirfetch['txt1']; ?></blockquote>
                    <?php endif; ?>

                    <p class="director-desc"><?= $abtdirfetch['des']; ?></p>

                    <!-- Checklist -->
                    <?php
                    $checks = ['txt2', 'txt3', 'txt4', 'txt5', 'txt6', 'txt7'];
                    $hasChecks = false;
                    foreach ($checks as $c) {
                        if (!empty($abtdirfetch[$c])) {
                            $hasChecks = true;
                            break;
                        }
                    }
                    if ($hasChecks):
                        ?>
                        <div class="director-checklist">
                            <?php foreach ($checks as $c): ?>
                                <?php if (!empty($abtdirfetch[$c])): ?>
                                    <div class="check-item">
                                        <div class="check-dot">
                                            <svg viewBox="0 0 24 24">
                                                <polyline points="20 6 9 17 4 12" />
                                            </svg>
                                        </div>
                                        <?= $abtdirfetch[$c]; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <a href="<?= BASE_URL; ?>contact" class="btn-sage">Get in Touch</a>
                </div>
            </div>
        </section>


        <!-- ═══════════════════════════════════════
         TEAM SECTION
    ═══════════════════════════════════════ -->
        <section id="team-section">
            <div class="team-header">
                <span class="section-tag"><?= $abtfetch2['title'] ?? 'Our Team'; ?></span>
                <h2 class="section-heading" style="text-align:center;">
                    <?= $abtfetch2['title'] ?? 'Meet Our <em>Expert</em> Doctors'; ?>
                </h2>
                <p style="font-size:15px; color:var(--warm-grey); margin-top:16px;"><?= $abtfetch2['subtitle'] ?? ''; ?>
                </p>
                <div class="divider" style="margin: 20px auto 0;"></div>
            </div>

            <div class="team-slider-wrap">
                <div class="team-slider-viewport">
                    <div class="team-slider-track" id="teamTrack">
                        <?php
                        $teamqry = mysqli_query($conn, "SELECT * FROM `tbl_teams` WHERE `d_status`='1' ORDER BY `d_sort` ASC");
                        if (mysqli_num_rows($teamqry) != 0) {
                            while ($teamfetch = mysqli_fetch_array($teamqry)) {
                                ?>
                                <div class="team-card">
                                    <div class="team-card-inner" onclick="openModal(<?= $teamfetch['d_id']; ?>)">
                                        <div class="team-photo">
                                            <img loading="lazy" src="<?= BASE_URL; ?>uploads/team/<?= $teamfetch['d_image']; ?>"
                                                alt="<?= $teamfetch['alt']; ?>">
                                            <div class="team-photo-overlay">
                                                <button class="view-profile-btn">View Profile</button>
                                            </div>
                                        </div>
                                        <div class="team-info">
                                            <h5><?= $teamfetch['d_name']; ?></h5>
                                            <span class="team-exp"><?= $teamfetch['d_experience']; ?></span>
                                            <span class="team-role"><?= $teamfetch['d_profession']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>

                <div class="slider-nav">
                    <button class="slider-btn" id="teamBtnPrev">
                        <svg viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                    </button>
                    <div class="slider-dots" id="teamDots"></div>
                    <button class="slider-btn" id="teamBtnNext">
                        <svg viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>


        <!-- ═══════════════════════════════════════
         TEAM MODALS (data store)
    ═══════════════════════════════════════ -->
        <script>
            var teamData = {
                <?php
                $teamqry2 = mysqli_query($conn, "SELECT * FROM `tbl_teams` WHERE `d_status`='1' ORDER BY `d_sort` ASC");
                if (mysqli_num_rows($teamqry2) != 0) {
                    while ($tm = mysqli_fetch_array($teamqry2)) {
                        echo $tm['d_id'] . ': {';
                        echo 'name:' . json_encode($tm['d_name']) . ',';
                        echo 'exp:' . json_encode($tm['d_experience']) . ',';
                        echo 'role:' . json_encode($tm['d_profession']) . ',';
                        echo 'img:' . json_encode(BASE_URL . 'uploads/team/' . $tm['d_image']) . ',';
                        echo 'alt:' . json_encode($tm['alt']) . ',';
                        echo 'desc:' . json_encode($tm['d_des']) . '},';
                    }
                }
                ?>
            };
        </script>

        <!-- Single reusable modal -->
        <div class="team-modal-overlay" id="teamModalOverlay" onclick="if(event.target===this)closeModal()">
            <div class="team-modal" id="teamModal">
                <button class="modal-close" onclick="closeModal()">
                    <svg viewBox="0 0 24 24">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
                <div class="modal-body-inner">
                    <div class="modal-photo-col">
                        <img id="modalImg" src="" alt="">
                    </div>
                    <div class="modal-info-col">
                        <p class="modal-expert-tag">Meet Our Expert</p>
                        <h3 class="modal-name" id="modalName"></h3>
                        <span class="modal-exp" id="modalExp"></span>
                        <span class="modal-role" id="modalRole"></span>
                        <div class="modal-divider"></div>
                        <p class="modal-desc" id="modalDesc"></p>
                    </div>
                </div>
            </div>
        </div>


        <!-- ═══════════════════════════════════════
         FULL WIDTH IMAGE
    ═══════════════════════════════════════ -->
        <?php if (!empty($abtfetch['f_image'])): ?>
            <section id="fullimg-section">
                <div class="fullimg-inner">
                    <img loading="lazy" src="<?= BASE_URL; ?>uploads/about/<?= $abtfetch['f_image']; ?>" alt="About Banner">
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

        // ── Team Modal ──
        function openModal(id) {
            const d = teamData[id];
            if (!d) return;
            document.getElementById('modalImg').src = d.img;
            document.getElementById('modalImg').alt = d.alt;
            document.getElementById('modalName').textContent = d.name;
            document.getElementById('modalExp').textContent = d.exp;
            document.getElementById('modalRole').textContent = d.role;
            document.getElementById('modalDesc').innerHTML = d.desc;
            document.getElementById('teamModalOverlay').classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            document.getElementById('teamModalOverlay').classList.remove('open');
            document.body.style.overflow = '';
        }
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

        // ── Team Slider ──
        (function () {
            const track = document.getElementById('teamTrack');
            const dotsEl = document.getElementById('teamDots');
            const prevBtn = document.getElementById('teamBtnPrev');
            const nextBtn = document.getElementById('teamBtnNext');
            if (!track) return;

            const cards = track.children;
            const total = cards.length;
            let current = 0;

            function getVis() {
                if (window.innerWidth <= 480) return 1;
                if (window.innerWidth <= 768) return 2;
                if (window.innerWidth <= 1100) return 3;
                return 4;
            }

            function buildDots() {
                const vis = getVis();
                const pages = Math.ceil(total / vis);
                dotsEl.innerHTML = '';
                for (let i = 0; i < pages; i++) {
                    const d = document.createElement('span');
                    d.className = 's-dot' + (i === 0 ? ' active' : '');
                    d.addEventListener('click', () => goTo(i));
                    dotsEl.appendChild(d);
                }
            }

            function updateDots() {
                dotsEl.querySelectorAll('.s-dot').forEach((d, i) => d.classList.toggle('active', i === current));
            }

            function setWidths() {
                const vis = getVis();
                const gap = 24;
                const vp = track.parentElement;
                const cardW = (vp.offsetWidth - gap * (vis - 1)) / vis;
                Array.from(cards).forEach(c => {
                    c.style.flex = `0 0 ${cardW}px`;
                    c.style.marginRight = gap + 'px';
                });
                buildDots();
                goTo(current);
            }

            function goTo(n) {
                const vis = getVis();
                const pages = Math.ceil(total / vis);
                current = Math.max(0, Math.min(n, pages - 1));
                const gap = 24;
                const vp = track.parentElement;
                const cardW = (vp.offsetWidth - gap * (vis - 1)) / vis;
                track.style.transform = `translateX(-${current * vis * (cardW + gap)}px)`;
                updateDots();
            }

            prevBtn.addEventListener('click', () => goTo(current - 1));
            nextBtn.addEventListener('click', () => {
                const vis = getVis();
                const pages = Math.ceil(total / vis);
                goTo(current + 1 >= pages ? 0 : current + 1);
            });

            // Auto-advance
            let autoT = setInterval(() => {
                const vis = getVis();
                const pages = Math.ceil(total / vis);
                goTo(current + 1 >= pages ? 0 : current + 1);
            }, 4000);
            track.addEventListener('mouseenter', () => clearInterval(autoT));
            track.addEventListener('mouseleave', () => {
                autoT = setInterval(() => {
                    const vis = getVis();
                    const pages = Math.ceil(total / vis);
                    goTo(current + 1 >= pages ? 0 : current + 1);
                }, 4000);
            });

            setWidths();
            window.addEventListener('resize', setWidths);
        })();

        // ── Scroll reveal ──
        const obs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.style.opacity = 1;
                    e.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.12 });

        document.querySelectorAll('.about-sub-card, .stat-item, .team-card-inner, .check-item').forEach(el => {
            el.style.opacity = 0;
            el.style.transform = 'translateY(24px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            obs.observe(el);
        });
    </script>
</body>

</html>