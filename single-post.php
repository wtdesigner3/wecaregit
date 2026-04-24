<?php
require("inc/function.php");

$url     = $_GET['url'];
$blogData = mysqli_query($conn, "SELECT * FROM `tbl_blogs` WHERE b_url='$url'");
$blog    = mysqli_fetch_assoc($blogData);

// Recent posts (excluding current)
$recentBlogs = mysqli_query($conn, "SELECT * FROM `tbl_blogs` WHERE b_id!='$blog[b_id]' AND b_status='1' ORDER BY b_date DESC LIMIT 6");

// Prev / Next post
$prevPost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT b_url, b_title FROM `tbl_blogs` WHERE b_status='1' AND b_date < '$blog[b_date]' ORDER BY b_date DESC LIMIT 1"));
$nextPost = mysqli_fetch_assoc(mysqli_query($conn, "SELECT b_url, b_title FROM `tbl_blogs` WHERE b_status='1' AND b_date > '$blog[b_date]' ORDER BY b_date ASC LIMIT 1"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'inc/head.php'; ?>
    <title><?php echo ($blog['metatag'] != '') ? $blog['metatag'] : $blog['b_title']; ?> || <?= SITE_NAME ?></title>
    <meta name="description" content="<?= $blog['metadesc']; ?>"/>
    <meta name="keywords"    content="<?= $blog['metakeyword']; ?>">
    <meta name="robots"      content="index, follow" />
    <?= $blog['head_detail'] ?>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">



</head>
<body>

<!-- Reading progress bar -->
<div class="reading-progress" id="readingProgress"></div>

<!-- PRELOADER -->
<div id="loader-wrapper"><div id="loader"></div></div>

<div id="page">

    <!-- HEADER -->
    <?php include 'inc/header.php'; ?>


    <!-- ═══════════════════════════════════════
         POST HERO
    ═══════════════════════════════════════ -->
    <div class="post-hero <?= empty($blog['b_image']) ? 'no-img' : ''; ?>">
        <?php if (!empty($blog['b_image'])): ?>
        <div class="post-hero-bg">
            <img loading="eager"
                src="<?= BASE_URL; ?>uploads/blogs/<?= $blog['b_image']; ?>"
                alt="<?= $blog['alt']; ?>">
            <div class="post-hero-overlay"></div>
        </div>
        <?php endif; ?>

        <div class="post-hero-inner">
            <nav class="breadcrumb-nav">
                <a href="<?= BASE_URL; ?>">Home</a>
                <span class="breadcrumb-sep">›</span>
                <a href="<?= BASE_URL; ?>blog">Blog</a>
                <span class="breadcrumb-sep">›</span>
                <span><?= mb_strimwidth($blog['b_title'], 0, 50, '…'); ?></span>
            </nav>

            <div class="post-hero-meta">
                <span class="meta-pill">
                    <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    <?= date("M d, Y", strtotime($blog['b_date'])); ?>
                </span>
                <span class="meta-pill">Dental Health</span>
            </div>

            <h1><?= $blog['b_title']; ?></h1>
        </div>
    </div>


    <!-- ── POST META STRIP ── -->
    <div class="post-meta-strip">
        <div class="post-meta-strip-inner">
            <div class="post-meta-left">
                <div class="post-meta-item">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span><?php
                        $wordCount = str_word_count(strip_tags($blog['b_description']));
                        $readTime  = max(1, ceil($wordCount / 200));
                        echo $readTime . ' min read';
                    ?></span>
                </div>
                <div class="post-meta-item">
                    <svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                    <span>Dental Care</span>
                </div>
                <div class="post-meta-item">
                    <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    <strong><?= number_format($wordCount); ?> words</strong>
                </div>
            </div>

            <div class="share-btns">
                <span class="share-label">Share</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode((isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>"
                   class="share-btn" target="_blank" rel="noopener" aria-label="Share on Facebook">
                    <svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                </a>
                <a href="https://twitter.com/intent/tweet?url=<?= urlencode((isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>&text=<?= urlencode($blog['b_title']); ?>"
                   class="share-btn" target="_blank" rel="noopener" aria-label="Share on Twitter">
                    <svg viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
                </a>
                <a href="https://api.whatsapp.com/send?text=<?= urlencode($blog['b_title'] . ' ' . ((isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'])); ?>"
                   class="share-btn" target="_blank" rel="noopener" aria-label="Share on WhatsApp">
                    <svg viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/></svg>
                </a>
                <button class="share-btn" onclick="copyLink()" aria-label="Copy link" title="Copy link">
                    <svg viewBox="0 0 24 24"><path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/></svg>
                </button>
            </div>
        </div>
    </div>


    <!-- ═══════════════════════════════════════
         MAIN CONTENT + SIDEBAR
    ═══════════════════════════════════════ -->
    <div class="content-wrapper">

        <!-- ── ARTICLE ── -->
        <article class="article-body">
            <div class="article-content">
                <?= $blog['b_description']; ?>
            </div>

            <!-- Prev / Next -->
            <?php if ($prevPost || $nextPost): ?>
            <div class="post-navigation">
                <?php if ($prevPost): ?>
                <a href="<?= BASE_URL; ?>blog-detail/<?= $prevPost['b_url']; ?>" class="post-nav-card prev">
                    <span class="post-nav-dir">
                        <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
                        Previous Post
                    </span>
                    <span class="post-nav-title"><?= $prevPost['b_title']; ?></span>
                </a>
                <?php else: ?><div></div><?php endif; ?>

                <?php if ($nextPost): ?>
                <a href="<?= BASE_URL; ?>blog-detail/<?= $nextPost['b_url']; ?>" class="post-nav-card next">
                    <span class="post-nav-dir">
                        Next Post
                        <svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
                    </span>
                    <span class="post-nav-title"><?= $nextPost['b_title']; ?></span>
                </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </article>


        <!-- ── SIDEBAR ── -->
        <aside class="article-sidebar">

            <!-- Book Appointment CTA -->
            <div class="cta-card">
                <div class="cta-card-icon">
                    <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
                <h4>Book an Appointment</h4>
                <p>Ready for a healthier smile? Schedule your visit with our expert team today.</p>
                <a href="<?= BASE_URL; ?>contact" class="cta-btn">Book Now</a>
            </div>

            <!-- Recent Posts -->
            <?php if (mysqli_num_rows($recentBlogs) > 0): ?>
            <div class="sidebar-card">
                <div class="sidebar-title">Recent Articles</div>
                <div class="recent-posts-list">
                    <?php while ($rc = mysqli_fetch_assoc($recentBlogs)): ?>
                    <a href="<?= BASE_URL; ?>blog-detail/<?= $rc['b_url']; ?>" class="recent-post-item">
                        <div class="recent-post-thumb">
                            <img loading="lazy"
                                src="<?= BASE_URL; ?>uploads/blogs/<?= $rc['b_image']; ?>"
                                alt="<?= $rc['alt']; ?>">
                        </div>
                        <div class="recent-post-info">
                            <div class="recent-post-title"><?= $rc['b_title']; ?></div>
                            <div class="recent-post-date">
                                <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                <?= date("M d, Y", strtotime($rc['b_date'])); ?>
                            </div>
                        </div>
                    </a>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Back to Blog -->
            <a href="<?= BASE_URL; ?>blog"
               style="display:flex; align-items:center; justify-content:center; gap:8px;
                      background:white; border:1.5px solid rgba(122,158,142,0.25);
                      border-radius:100px; padding:13px 24px;
                      font-size:13px; font-weight:500; color:var(--charcoal);
                      text-decoration:none; transition:all 0.4s ease;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
                Back to All Articles
            </a>

        </aside>
    </div>


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

// Reading progress bar
const progressBar = document.getElementById('readingProgress');
const article = document.querySelector('.article-body');
window.addEventListener('scroll', () => {
    if (!article) return;
    const rect   = article.getBoundingClientRect();
    const total  = article.offsetHeight;
    const scrolled = -rect.top;
    const progress = Math.min(Math.max(scrolled / total, 0), 1);
    progressBar.style.transform = `scaleX(${progress})`;
});

// Copy link
function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        const btn = event.currentTarget;
        btn.style.background = 'var(--sage-dark)';
        btn.querySelector('svg').style.stroke = 'white';
        setTimeout(() => {
            btn.style.background = '';
            btn.querySelector('svg').style.stroke = '';
        }, 1500);
    });
}

// Scroll reveal
const obs = new IntersectionObserver(entries => {
    entries.forEach(e => {
        if (e.isIntersecting) { e.target.style.opacity = 1; e.target.style.transform = 'translateY(0)'; }
    });
}, { threshold: 0.08 });

document.querySelectorAll('.recent-post-item, .post-nav-card').forEach((el, i) => {
    el.style.opacity = 0;
    el.style.transform = 'translateY(16px)';
    el.style.transition = `opacity 0.5s ease ${i * 0.06}s, transform 0.5s ease ${i * 0.06}s`;
    obs.observe(el);
});
</script>
</body>
</html>