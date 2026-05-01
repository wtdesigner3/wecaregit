<?php
require("inc/function.php");

if (isset($_GET['page'])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$limit = 12;
$offset = ($page - 1) * $limit;

$blogs = mysqli_query($conn, "SELECT * FROM `tbl_blogs` WHERE b_status='1' ORDER BY b_date DESC LIMIT {$offset},{$limit}");
$profile = mysqli_query($conn, "SELECT * FROM `tbl_profile` WHERE pro_id='1'");
$prof = mysqli_fetch_array($profile);

$blog_seo = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tbl_seo` WHERE `id`='1' AND `name`='Blog'"));

if (!empty($blog_seo['title']) && !empty($blog_seo['description']) && !empty($blog_seo['keywords'])) {
    $seo_title = $blog_seo['title'];
    $seo_detail = $blog_seo['description'];
    $seo_keyword = $blog_seo['keywords'];
} else {
    $seo_title = $prof['pro_title'];
    $seo_detail = $prof['pro_detail'];
    $seo_keyword = $prof['pro_keyword'];
}

// Latest 3 for featured strip
$featuredBlogs = mysqli_query($conn, "SELECT * FROM `tbl_blogs` WHERE b_status='1' ORDER BY b_date DESC LIMIT 3");

// Total count for pagination
$totalCount = mysqli_num_rows(mysqli_query($conn, "SELECT b_id FROM tbl_blogs WHERE b_status='1'"));
$totalPages = ceil($totalCount / $limit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/head.php'; ?>
    <title><?= htmlspecialchars($seo_title ?? '', ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($seo_detail ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta name="keywords" content="<?= htmlspecialchars($seo_keyword ?? '', ENT_QUOTES, 'UTF-8') ?>">
    <meta name="robots" content="index, follow" />
    <?= $blog_seo['head_detail'] ?>




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
                    <span>Blog</span>
                </nav>
                <h1>Blog</h1>

            </div>
        </div>


        <!-- ═══════════════════════════════════════
         FEATURED ARTICLES
    ═══════════════════════════════════════ -->
        <?php if (mysqli_num_rows($featuredBlogs) > 0 && $page == 0): ?>
            <section id="featured-section">
                <div class="featured-inner">
                    <span class="section-tag">Latest Stories</span>
                    <h2 class="section-heading">Featured <em>Articles</em></h2>

                    <div class="featured-grid">
                        <?php while ($fb = mysqli_fetch_assoc($featuredBlogs)): ?>
                            <a href="<?= BASE_URL; ?>blog-detail/<?= $fb['b_url']; ?>" class="featured-card">
                                <img loading="lazy" class="featured-card-img"
                                    src="<?= BASE_URL; ?>uploads/blogs/<?= $fb['b_image']; ?>" alt="<?= $fb['alt']; ?>">
                                <div class="featured-overlay"></div>
                                <div class="featured-card-body">
                                    <span class="featured-date"><?= date("M d, Y", strtotime($fb['b_date'])); ?></span>
                                    <h3 class="featured-title"><?= $fb['b_title']; ?></h3>
                                    <span class="featured-read">Read Article</span>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>


        <!-- ═══════════════════════════════════════
         ALL BLOG POSTS GRID
    ═══════════════════════════════════════ -->
        <section id="blog-grid-section">
            <div class="blog-grid-inner">

                <div class="blog-grid-header">
                    <div>
                        <!-- <span class="section-tag">All Articles</span> -->
                        <h2 class="section-heading" style="margin-bottom:0;">Latest <em>Blogs</em></h2>
                        <p class="blog-count">
                            Showing <?= $offset + 1; ?>–<?= min($offset + $limit, $totalCount); ?> of
                            <?= $totalCount; ?> articles
                        </p>
                    </div>
                </div>

                <div class="blog-grid">
                    <?php
                    if (mysqli_num_rows($blogs) > 0) {
                        // Reset pointer since featured section used a different query
                        mysqli_data_seek($blogs, 0);
                        while ($blog = mysqli_fetch_assoc($blogs)):
                            ?>
                            <a href="<?= BASE_URL; ?>blog-detail/<?= $blog['b_url']; ?>" class="blog-card">
                                <div class="blog-card-img">
                                    <img loading="lazy" src="<?= BASE_URL; ?>uploads/blogs/<?= $blog['b_image']; ?>"
                                        alt="<?= $blog['alt']; ?>">
                                    <span class="blog-card-date"><?= date("M d, Y", strtotime($blog['b_date'])); ?></span>
                                </div>
                                <div class="blog-card-body">
                                    <h3 class="blog-card-title"><?= $blog['b_title']; ?></h3>
                                    <p class="blog-card-excerpt">
                                        <?= strip_tags($blog['b_description']); ?>...
                                    </p>
                                    <div class="blog-card-footer">
                                        <span class="blog-read-link">Read Article</span>
                                        <span class="blog-card-tag">Dental Health</span>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile;
                    } else { ?>
                        <div class="empty-state">
                            <h3>No Articles Yet</h3>
                            <p>Check back soon — we're working on some great content.</p>
                        </div>
                    <?php } ?>
                </div>


                <!-- ── PAGINATION ── -->
                <?php if ($totalPages > 1): ?>
                    <div class="pagination-wrap">

                        <?php if ($page > 1): ?>
                            <a href="<?= BASE_URL; ?>blog/page/<?= $page - 1; ?>" class="page-btn arrow" aria-label="Previous">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="15 18 9 12 15 6" />
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php
                        // Smart pagination: show first, last, and 2 around current
                        for ($i = 1; $i <= $totalPages; $i++):
                            $show = ($i == 1 || $i == $totalPages || abs($i - $page) <= 1);
                            $showEllipsisBefore = ($i == $page - 2 && $page > 3);
                            $showEllipsisAfter = ($i == $page + 2 && $page < $totalPages - 2);
                            if ($showEllipsisBefore): ?>
                                <span class="page-ellipsis">…</span>
                            <?php endif;
                            if ($show): ?>
                                <a href="<?= BASE_URL; ?>blog/page/<?= $i; ?>"
                                    class="page-btn <?= ($i == $page) ? 'active' : ''; ?>">
                                    <?= $i; ?>
                                </a>
                            <?php endif;
                            if ($showEllipsisAfter): ?>
                                <span class="page-ellipsis">…</span>
                            <?php endif;
                        endfor; ?>

                        <?php if ($page < $totalPages): ?>
                            <a href="<?= BASE_URL; ?>blog/page/<?= $page + 1; ?>" class="page-btn arrow" aria-label="Next">
                                <svg viewBox="0 0 24 24">
                                    <polyline points="9 18 15 12 9 6" />
                                </svg>
                            </a>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>

            </div>
        </section>


        <!-- ═══════════════════════════════════════
         NEWSLETTER STRIP
    ═══════════════════════════════════════ -->
        <!-- <section id="newsletter-strip">
        <div class="newsletter-inner">
            <h3>Stay <em>Informed</em></h3>
            <p>Get the latest dental health tips, clinic updates, and expert advice delivered to your inbox.</p>
            <div class="newsletter-form">
                <input type="email" class="newsletter-input" placeholder="Enter your email address">
                <button class="newsletter-btn">Subscribe</button>
            </div>
        </div>
    </section> -->


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
        }, { threshold: 0.08 });

        document.querySelectorAll('.blog-card, .featured-card').forEach((el, i) => {
            el.style.opacity = 0;
            el.style.transform = 'translateY(28px)';
            el.style.transition = `opacity 0.6s ease ${i * 0.07}s, transform 0.6s ease ${i * 0.07}s`;
            obs.observe(el);
        });
    </script>
</body>

</html>