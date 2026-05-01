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

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$canonical_url = BASE_URL . 'services/' . $pdetailrec['url'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="<?= BASE_URL ?>uploads/fevicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="<?= BASE_URL ?>uploads/fevicon.jpg" rel="shortcut icon" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">

    <!-- BOOTSTRAP CSS -->
    <link href="<?php echo BASE_URL; ?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo BASE_URL; ?>css/flaticon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- PLUGINS STYLESHEET -->
    <link href="<?php echo BASE_URL; ?>css/menu.css" rel="stylesheet">
    <link id="effect" href="<?php echo BASE_URL; ?>css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>css/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>css/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>css/jquery.datetimepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL; ?>toaster/toaster.css">
    <link rel="shortcut icon" href="<?= BASE_URL; ?>uploads/<?= $proinfo['pro_favicon']; ?>">

    <!-- TEMPLATE CSS -->
    <link href="<?php echo BASE_URL; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>css/responsive.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>css/internal-pages.css" rel="stylesheet">
    
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($pdetailrec['metatag'] ?: $pdetailrec['heading']) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pdetailrec['metadesc'] ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta name="keywords" content="<?= htmlspecialchars($pdetailrec['keyword'] ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?= $canonical_url ?>" />

    <!-- Open Graph -->
    <meta property="og:title" content="<?= htmlspecialchars($pdetailrec['metatag'] ?: $pdetailrec['heading']) ?>" />
    <meta property="og:description" content="<?= htmlspecialchars($pdetailrec['metadesc'] ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $canonical_url ?>" />
    <meta property="og:image" content="<?= BASE_URL; ?>uploads/services/<?= $pdetailrec['image']; ?>" />

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500&display=swap" rel="stylesheet" />

    <style>
        :root {
            --sage: #4a7c59;
            --sage-light: #6fa080;
            --sage-pale: #d4e8d8;
            --cream: #f8f4ee;
            --warm-white: #fdfaf6;
            --charcoal: #1c2b1e;
            --mid: #3d5240;
            --muted: #7a8f7d;
            --accent: #c8843a;
            --accent-light: #e8a85a;
            --red-soft: #c75b5b;
            --border: rgba(74, 124, 89, 0.15);
        }

        .fade-in {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .hero {
            min-height: 80vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            padding-top: 80px;
            position: relative;
            overflow: hidden;
            background: var(--warm-white);
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 60% 80% at 70% 50%, var(--sage-pale) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-left {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 5% 8%;
            z-index: 1;
        }

        .hero h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2.5rem, 4vw, 4rem);
            color: var(--charcoal);
            line-height: 1.1;
            margin-bottom: 1.5rem;
        }

        .hero-sub {
            font-size: 1.1rem;
            color: var(--muted);
            margin-bottom: 2rem;
            max-width: 500px;
        }

        .service-content-section {
            padding: 5rem 8%;
            background: #fff;
        }

        .service-main-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--mid);
        }

        .service-main-content h2, .service-main-content h3 {
            font-family: 'Cormorant Garamond', serif;
            color: var(--sage);
            margin: 2rem 0 1rem;
        }

        @media (max-width: 900px) {
            .hero { grid-template-columns: 1fr; }
            .hero-right { display: none; }
        }
    </style>
</head>

<body>
    <?php include 'inc/header.php'; ?>

    <div class="hero">
        <div class="hero-bg"></div>
        <div class="hero-left">
            <nav class="breadcrumb-nav" style="margin-bottom: 1rem; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--accent);">
                <a href="<?= BASE_URL ?>" style="color: inherit; text-decoration: none;">Home</a> / 
                <a href="<?= BASE_URL ?>services" style="color: inherit; text-decoration: none;">Services</a> / 
                <span><?= $pdetailrec['heading'] ?></span>
            </nav>
            <h1><?= $pdetailrec['heading'] ?></h1>
            <p class="hero-sub"><?= htmlspecialchars(substr(strip_tags($pdetailrec['des']), 0, 160)) ?>...</p>
            <div class="hero-actions">
                <a href="<?= BASE_URL ?>contact" class="btn-primary" style="background: var(--sage); color: #fff; padding: 0.8rem 2rem; border-radius: 50px; text-decoration: none; display: inline-block;">Book Appointment</a>
            </div>
        </div>
        <div class="hero-right" style="display: flex; align-items: center; justify-content: center; padding: 5%;">
             <?php if (!empty($pdetailrec['image'])): ?>
                <img src="<?= BASE_URL ?>uploads/services/<?= $pdetailrec['image'] ?>" alt="<?= $pdetailrec['heading'] ?>" style="max-width: 100%; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
             <?php endif; ?>
        </div>
    </div>

    <section class="service-content-section fade-in">
        <div class="service-main-content">
            <?= $pdetailrec['des'] ?>
        </div>
    </section>

    <?php 
    // Include the extra components from gum-treatments that the user liked
    // These would be the static sections like Symptoms, Process etc if they are broadly applicable
    // For now I'll include the footer and footer data.
    ?>

    <?php include 'inc/footer.php'; ?>
    <?php include 'inc/footer-data.php'; ?>

    <script>
        const observer = new IntersectionObserver(entries => {
            entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
        }, { threshold: 0.1 });
        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
    </script>
</body>
</html>
