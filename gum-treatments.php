<?php require('inc/function.php'); ?>

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

    <!-- RESPONSIVE CSS -->
    <link href="<?php echo BASE_URL; ?>css/responsive.css" rel="stylesheet">

    <!-- INTERNAL PAGES CSS -->
    <link href="<?php echo BASE_URL; ?>css/internal-pages.css" rel="stylesheet">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gum Treatments | Restore Healthy Gums & Prevent Gum Disease</title>
    <meta name="description"
        content="Expert gum treatments for gingivitis, periodontitis, gum recession & more. Learn about professional gum care options, symptoms, and how to restore your gum health today." />
    <meta name="keywords"
        content="gum treatments, gum disease treatment, periodontitis treatment, gingivitis treatment, gum recession, scaling and root planing, gum surgery, periodontal care" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="Gum Treatments" />
    <link rel="canonical" href="https://wecaredentist.com/gum-treatments" />

    <!-- Open Graph -->
    <meta property="og:title" content="Gum Treatments | Restore Healthy Gums" />
    <meta property="og:description"
        content="Expert gum treatments for gingivitis, periodontitis, gum recession & more. Restore your smile and gum health today." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://wecaredentist.com/gum-treatments" />

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "MedicalWebPage",
    "name": "Gum Treatments",
    "description": "Comprehensive guide to professional gum treatments including scaling and root planing, gum surgery, and periodontal therapy.",
    "url": "https://wecaredentist.com/gum-treatments",
    "about": {
      "@type": "MedicalCondition",
      "name": "Gum Disease",
      "alternateName": ["Periodontal Disease", "Gingivitis", "Periodontitis"]
    },
    "specialty": "Dentistry"
  }
  </script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-M967ZRN');</script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M967ZRN" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <meta name="google-site-verification" content="AI2zzZQoVRf4TOLbMR_X0FjRuyqBO6BIj7Z6Q7SUJmg" />
    <meta name="google-site-verification" content="NE3rt9pUVajPqa0gJS0o3jJr-UblHdN6ovNRTfMjG4g" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RXF235QPM1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-RXF235QPM1');
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RDLHPBP296"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-RDLHPBP296');
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500&display=swap"
        rel="stylesheet" />

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

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--warm-white);
            color: var(--charcoal);
            font-size: 16px;
            line-height: 1.7;
            overflow-x: hidden;
        }

        /* ── NAV ── */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.2rem 5%;
            background: rgba(253, 250, 246, 0.92);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .nav-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--sage);
            letter-spacing: 0.02em;
        }

        .nav-logo span {
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--mid);
            font-size: 0.875rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--sage);
        }

        .nav-cta {
            background: var(--sage);
            color: #fff;
            padding: 0.6rem 1.4rem;
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: background 0.2s, transform 0.2s;
        }

        .nav-cta:hover {
            background: var(--sage-light);
            transform: translateY(-1px);
        }

        /* ── HERO ── */
        .hero {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            padding-top: 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 60% 80% at 70% 50%, var(--sage-pale) 0%, transparent 70%),
                radial-gradient(ellipse 40% 60% at 10% 80%, rgba(200, 132, 58, 0.08) 0%, transparent 60%);
            pointer-events: none;
        }

        .hero-left {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 5% 6% 5% 8%;
            position: relative;
            z-index: 1;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 0.78rem;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 1.5rem;
        }

        .eyebrow-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--accent);
            display: inline-block;
        }

        .hero h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(3rem, 5vw, 5rem);
            font-weight: 300;
            line-height: 1.05;
            color: var(--charcoal);
            margin-bottom: 1.5rem;
        }

        .hero h1 em {
            font-style: italic;
            color: var(--sage);
        }

        .hero-sub {
            font-size: 1.05rem;
            color: var(--muted);
            max-width: 420px;
            margin-bottom: 2.5rem;
            line-height: 1.8;
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: var(--sage);
            color: #fff;
            padding: 0.9rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.25s;
            box-shadow: 0 4px 20px rgba(74, 124, 89, 0.3);
        }

        .btn-primary:hover {
            background: var(--sage-light);
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(74, 124, 89, 0.35);
        }

        .btn-outline {
            border: 1.5px solid var(--sage);
            color: var(--sage);
            padding: 0.9rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.25s;
        }

        .btn-outline:hover {
            background: var(--sage);
            color: #fff;
        }

        .hero-stats {
            display: flex;
            gap: 2.5rem;
            margin-top: 3.5rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border);
        }

        .stat-num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.2rem;
            font-weight: 600;
            color: var(--sage);
            line-height: 1;
        }

        .stat-label {
            font-size: 0.78rem;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-top: 0.3rem;
        }

        .hero-right {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5%;
        }

        .hero-illustration {
            width: 100%;
            max-width: 480px;
            aspect-ratio: 1;
            position: relative;
        }

        .hero-card {
            background: #fff;
            border-radius: 24px;
            padding: 2rem;
            box-shadow: 0 20px 60px rgba(28, 43, 30, 0.08), 0 4px 16px rgba(28, 43, 30, 0.04);
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--sage-pale), #b8d8c0);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        .card-title-group h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--charcoal);
        }

        .card-title-group p {
            font-size: 0.8rem;
            color: var(--muted);
        }

        .health-bar-group {
            margin-bottom: 1rem;
        }

        .bar-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.4rem;
            font-size: 0.8rem;
            color: var(--mid);
        }

        .bar-track {
            height: 8px;
            background: var(--sage-pale);
            border-radius: 10px;
            overflow: hidden;
        }

        .bar-fill {
            height: 100%;
            border-radius: 10px;
            background: linear-gradient(90deg, var(--sage-light), var(--sage));
            animation: fillBar 1.5s ease forwards;
            transform-origin: left;
        }

        @keyframes fillBar {
            from {
                width: 0
            }
        }

        .b1 {
            width: 90%;
            animation-delay: 0.2s;
        }

        .b2 {
            width: 76%;
            animation-delay: 0.4s;
        }

        .b3 {
            width: 83%;
            animation-delay: 0.6s;
        }

        .card-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #e8f4ec, #d4e8d8);
            color: var(--sage);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.82rem;
            font-weight: 500;
            margin-top: 0.5rem;
        }

        .float-tag {
            position: absolute;
            background: #fff;
            border-radius: 14px;
            padding: 0.7rem 1rem;
            box-shadow: 0 8px 30px rgba(28, 43, 30, 0.12);
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--charcoal);
            border: 1px solid var(--border);
            animation: floatTag 4s ease-in-out infinite;
        }

        .float-tag-1 {
            top: -20px;
            right: -20px;
            animation-delay: 0s;
        }

        .float-tag-2 {
            bottom: 30px;
            left: -30px;
            animation-delay: 1.5s;
        }

        @keyframes floatTag {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        /* ── SECTION COMMON ── */
        section {
            padding: 6rem 8%;
        }

        .section-label {
            font-size: 0.75rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--accent);
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2rem, 3.5vw, 3rem);
            font-weight: 300;
            color: var(--charcoal);
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .section-title strong {
            font-weight: 600;
            color: var(--sage);
        }

        .section-desc {
            color: var(--muted);
            max-width: 520px;
            line-height: 1.8;
        }

        /* ── SYMPTOMS ── */
        .symptoms-section {
            background: var(--cream);
        }

        .symptoms-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .symptom-card {
            background: #fff;
            border-radius: 20px;
            padding: 1.8rem;
            border: 1px solid var(--border);
            transition: transform 0.25s, box-shadow 0.25s;
            position: relative;
            overflow: hidden;
        }

        .symptom-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--sage-light), var(--sage-pale));
        }

        .symptom-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(28, 43, 30, 0.1);
        }

        .symptom-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .symptom-card h3 {
            font-size: 1.05rem;
            font-weight: 500;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }

        .symptom-card p {
            font-size: 0.88rem;
            color: var(--muted);
            line-height: 1.7;
        }

        .symptom-severity {
            display: inline-block;
            margin-top: 1rem;
            font-size: 0.72rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.25rem 0.7rem;
            border-radius: 50px;
            font-weight: 500;
        }

        .sev-mild {
            background: #e8f5e9;
            color: #388e3c;
        }

        .sev-mod {
            background: #fff8e1;
            color: #f9a825;
        }

        .sev-sev {
            background: #fce4e4;
            color: #c75b5b;
        }

        /* ── TREATMENTS ── */
        .treatments-section {
            background: var(--warm-white);
        }

        .treatments-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .treatment-tabs {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            border: 1.5px solid var(--border);
            background: transparent;
            color: var(--muted);
            cursor: pointer;
            font-size: 0.85rem;
            font-family: 'DM Sans', sans-serif;
            transition: all 0.2s;
        }

        .tab-btn.active,
        .tab-btn:hover {
            background: var(--sage);
            color: #fff;
            border-color: var(--sage);
        }

        .treatment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .treatment-card {
            background: #fff;
            border-radius: 24px;
            border: 1px solid var(--border);
            overflow: hidden;
            transition: transform 0.25s, box-shadow 0.25s;
        }

        .treatment-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 60px rgba(28, 43, 30, 0.1);
        }

        .treatment-card-top {
            padding: 2rem 2rem 1rem;
            background: linear-gradient(135deg, var(--sage-pale) 0%, #e8f5ec 100%);
            position: relative;
            min-height: 120px;
        }

        .treatment-num {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            font-weight: 700;
            color: rgba(74, 124, 89, 0.12);
            line-height: 1;
        }

        .treatment-icon {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }

        .treatment-card h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--charcoal);
        }

        .treatment-card-body {
            padding: 1.5rem 2rem 2rem;
        }

        .treatment-card p {
            font-size: 0.9rem;
            color: var(--muted);
            margin-bottom: 1.2rem;
            line-height: 1.75;
        }

        .treatment-meta {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .meta-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.78rem;
            color: var(--sage);
            font-weight: 500;
        }

        .meta-pill::before {
            content: '✓';
        }

        /* ── PROCESS ── */
        .process-section {
            background: var(--charcoal);
            color: #fff;
        }

        .process-section .section-title {
            color: #fff;
        }

        .process-section .section-title strong {
            color: var(--sage-light);
        }

        .process-section .section-desc {
            color: rgba(255, 255, 255, 0.55);
        }

        .process-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 0;
            margin-top: 3.5rem;
            position: relative;
        }

        .process-steps::before {
            content: '';
            position: absolute;
            top: 36px;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
        }

        .step {
            padding: 0 2rem;
            border-right: 1px solid rgba(255, 255, 255, 0.08);
            position: relative;
        }

        .step:last-child {
            border-right: none;
        }

        .step-num {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: rgba(74, 124, 89, 0.2);
            border: 1px solid rgba(74, 124, 89, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.6rem;
            font-weight: 600;
            color: var(--sage-light);
            margin-bottom: 1.5rem;
        }

        .step h3 {
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #fff;
        }

        .step p {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.7;
        }

        /* ── FAQ ── */
        .faq-section {
            background: var(--cream);
        }

        .faq-layout {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 5rem;
            align-items: start;
        }

        .faq-list {
            margin-top: 1rem;
        }

        .faq-item {
            border-bottom: 1px solid var(--border);
            padding: 1.3rem 0;
            cursor: pointer;
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--charcoal);
            gap: 1rem;
        }

        .faq-toggle {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: var(--sage-pale);
            color: var(--sage);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            font-weight: 300;
            flex-shrink: 0;
            transition: background 0.2s, transform 0.3s;
        }

        .faq-item.open .faq-toggle {
            background: var(--sage);
            color: #fff;
            transform: rotate(45deg);
        }

        .faq-answer {
            font-size: 0.88rem;
            color: var(--muted);
            line-height: 1.8;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease, padding 0.3s;
        }

        .faq-item.open .faq-answer {
            max-height: 200px;
            padding-top: 0.8rem;
        }

        /* ── CTA ── */
        .cta-section {
            background: linear-gradient(135deg, var(--sage) 0%, #3a6b49 100%);
            color: #fff;
            text-align: center;
            padding: 6rem 8%;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 70% 80% at 50% 50%, rgba(255, 255, 255, 0.06), transparent);
            pointer-events: none;
        }

        .cta-section h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2rem, 4vw, 3.5rem);
            font-weight: 300;
            line-height: 1.15;
            margin-bottom: 1.2rem;
        }

        .cta-section h2 em {
            font-style: italic;
        }

        .cta-section p {
            color: rgba(255, 255, 255, 0.7);
            max-width: 480px;
            margin: 0 auto 2.5rem;
        }

        .cta-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-white {
            background: #fff;
            color: var(--sage);
            padding: 0.9rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.25s;
        }

        .btn-white:hover {
            background: var(--sage-pale);
            transform: translateY(-2px);
        }

        .btn-ghost {
            border: 2px solid rgba(255, 255, 255, 0.5);
            color: #fff;
            padding: 0.9rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.25s;
        }

        .btn-ghost:hover {
            border-color: #fff;
            background: rgba(255, 255, 255, 0.1);
        }

        /* ── FOOTER ── */
        footer {
            background: var(--charcoal);
            color: rgba(255, 255, 255, 0.5);
            padding: 3rem 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: gap;
            gap: 1.5rem;
            font-size: 0.85rem;
        }

        .footer-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .footer-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.4);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: var(--sage-light);
        }

        /* ── ANIMATIONS ── */
        .fade-in {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 900px) {
            .hero {
                grid-template-columns: 1fr;
                min-height: auto;
                padding-bottom: 3rem;
            }

            .hero-right {
                display: none;
            }

            .hero-left {
                padding: 8% 6%;
            }

            .faq-layout {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }

            nav .nav-links {
                display: none;
            }

            .process-steps {
                grid-template-columns: 1fr 1fr;
            }

            .step {
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08);
                padding: 2rem 0;
            }

            .step:last-child {
                border-bottom: none;
            }

            .process-steps::before {
                display: none;
            }
        }

        @media (max-width: 600px) {
            section {
                padding: 4rem 5%;
            }

            .hero-stats {
                gap: 1.5rem;
            }

            .process-steps {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <!-- NAV -->


    <?php include 'inc/header.php'; ?>

    <!-- HERO -->
    <div class="hero" aria-label="Hero">
        <div class="hero-bg"></div>
        <div class="hero-left">
            <div class="hero-eyebrow"><span class="eyebrow-dot"></span> Expert Periodontal Care</div>
            <h1>Restore <em>Healthy</em><br>Gums & Protect<br>Your Smile</h1>
            <p class="hero-sub">Advanced gum treatments for gingivitis, periodontitis, recession, and beyond — tailored
                to your unique oral health needs.</p>
            <div class="hero-actions">
                <a href="#treatments" class="btn-primary">Explore Treatments</a>
                <a href="#symptoms" class="btn-outline">Check Symptoms</a>
            </div>
            <div class="hero-stats">
                <div>
                    <div class="stat-num">95%</div>
                    <div class="stat-label">Success Rate</div>
                </div>
                <div>
                    <div class="stat-num">20k+</div>
                    <div class="stat-label">Patients Treated</div>
                </div>
                <div>
                    <div class="stat-num">15+</div>
                    <div class="stat-label">Years Experience</div>
                </div>
            </div>
        </div>
        <div class="hero-right" aria-hidden="true">
            <div class="hero-illustration">
                <div class="hero-card">
                    <div>
                        <div class="card-header">
                            <div class="card-icon">🦷</div>
                            <div class="card-title-group">
                                <h3>Gum Health Score</h3>
                                <p>Post-treatment results</p>
                            </div>
                        </div>
                        <div class="health-bar-group">
                            <div class="bar-label"><span>Gum Tissue Health</span><span>90%</span></div>
                            <div class="bar-track">
                                <div class="bar-fill b1" style="width:0"></div>
                            </div>
                        </div>
                        <div class="health-bar-group">
                            <div class="bar-label"><span>Inflammation Reduction</span><span>76%</span></div>
                            <div class="bar-track">
                                <div class="bar-fill b2" style="width:0"></div>
                            </div>
                        </div>
                        <div class="health-bar-group">
                            <div class="bar-label"><span>Bone Density Preserved</span><span>83%</span></div>
                            <div class="bar-track">
                                <div class="bar-fill b3" style="width:0"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-badge">🌿 Clinically Proven Results</div>
                </div>
                <div class="float-tag float-tag-1">⏱ Quick Recovery</div>
                <div class="float-tag float-tag-2">✅ Pain-Free Options</div>
            </div>
        </div>
    </div>

    <!-- SYMPTOMS -->
    <section class="symptoms-section fade-in" id="symptoms" aria-labelledby="symptoms-heading">
        <div class="section-label">Know the Warning Signs</div>
        <h2 class="section-title" id="symptoms-heading">Symptoms of <strong>Gum Disease</strong></h2>
        <p class="section-desc">Early detection is key. Recognise these signs and seek treatment before gum disease
            advances into a serious condition.</p>
        <div class="symptoms-grid" role="list">
            <article class="symptom-card" role="listitem">
                <div class="symptom-icon">🩸</div>
                <h3>Bleeding Gums</h3>
                <p>Gums that bleed when brushing or flossing are often the first sign of gingivitis. Never ignore
                    bleeding as "normal."</p>
                <span class="symptom-severity sev-mild">Early Stage</span>
            </article>
            <article class="symptom-card" role="listitem">
                <div class="symptom-icon">😤</div>
                <h3>Persistent Bad Breath</h3>
                <p>Chronic halitosis or a persistent bad taste can signal bacterial build-up in pockets between teeth
                    and gums.</p>
                <span class="symptom-severity sev-mild">Mild–Moderate</span>
            </article>
            <article class="symptom-card" role="listitem">
                <div class="symptom-icon">📉</div>
                <h3>Receding Gum Line</h3>
                <p>When gums pull away from teeth, it exposes roots, making teeth appear longer and increasing
                    sensitivity and decay risk.</p>
                <span class="symptom-severity sev-mod">Moderate</span>
            </article>
            <article class="symptom-card" role="listitem">
                <div class="symptom-icon">💢</div>
                <h3>Swollen or Red Gums</h3>
                <p>Healthy gums are firm and pink. Swelling, redness, or tenderness indicate active infection and
                    inflammation.</p>
                <span class="symptom-severity sev-mild">Early Stage</span>
            </article>
            <article class="symptom-card" role="listitem">
                <div class="symptom-icon">🔓</div>
                <h3>Loose Teeth</h3>
                <p>Advanced periodontal disease destroys the bone and connective tissue that anchor teeth, causing
                    mobility or shifting.</p>
                <span class="symptom-severity sev-sev">Advanced</span>
            </article>
            <article class="symptom-card" role="listitem">
                <div class="symptom-icon">⚡</div>
                <h3>Tooth Sensitivity</h3>
                <p>Exposed roots from gum recession cause sharp sensitivity to hot, cold, or sweet foods — a telltale
                    sign of recession.</p>
                <span class="symptom-severity sev-mod">Moderate</span>
            </article>
        </div>
    </section>

    <!-- TREATMENTS -->
    <section class="treatments-section fade-in" id="treatments" aria-labelledby="treatments-heading">
        <div class="treatments-header">
            <div>
                <div class="section-label">Your Options</div>
                <h2 class="section-title" id="treatments-heading">Professional <strong>Gum Treatments</strong></h2>
                <p class="section-desc">From non-surgical deep cleaning to advanced surgical correction — we offer the
                    full spectrum of periodontal therapies.</p>
            </div>
            <div class="treatment-tabs" role="tablist" aria-label="Filter treatments">
                <button class="tab-btn active" role="tab" aria-selected="true">All</button>
                <button class="tab-btn" role="tab" aria-selected="false">Non-Surgical</button>
                <button class="tab-btn" role="tab" aria-selected="false">Surgical</button>
            </div>
        </div>
        <div class="treatment-grid">
            <article class="treatment-card">
                <div class="treatment-card-top">
                    <div class="treatment-num">01</div>
                    <div class="treatment-icon">🧹</div>
                    <h3>Scaling & Root Planing</h3>
                </div>
                <div class="treatment-card-body">
                    <p>A thorough deep-cleaning procedure that removes plaque and tartar from below the gum line and
                        smooths root surfaces to prevent bacteria from re-adhering.</p>
                    <div class="treatment-meta">
                        <span class="meta-pill">Non-surgical</span>
                        <span class="meta-pill">Most common</span>
                        <span class="meta-pill">1–2 visits</span>
                    </div>
                </div>
            </article>
            <article class="treatment-card">
                <div class="treatment-card-top">
                    <div class="treatment-num">02</div>
                    <div class="treatment-icon">💉</div>
                    <h3>Antibiotic Therapy</h3>
                </div>
                <div class="treatment-card-body">
                    <p>Topical or oral antibiotics are used alongside scaling to target remaining bacteria, reducing
                        infection and supporting healing of gum tissue.</p>
                    <div class="treatment-meta">
                        <span class="meta-pill">Non-surgical</span>
                        <span class="meta-pill">Adjunctive</span>
                        <span class="meta-pill">Targeted</span>
                    </div>
                </div>
            </article>
            <article class="treatment-card">
                <div class="treatment-card-top">
                    <div class="treatment-num">03</div>
                    <div class="treatment-icon">🔬</div>
                    <h3>Laser Gum Therapy</h3>
                </div>
                <div class="treatment-card-body">
                    <p>Minimally invasive laser treatment precisely removes infected tissue and bacteria while
                        preserving healthy gum tissue, with faster healing and less discomfort.</p>
                    <div class="treatment-meta">
                        <span class="meta-pill">Minimally invasive</span>
                        <span class="meta-pill">Fast healing</span>
                        <span class="meta-pill">Precise</span>
                    </div>
                </div>
            </article>
            <article class="treatment-card">
                <div class="treatment-card-top">
                    <div class="treatment-num">04</div>
                    <div class="treatment-icon">🏥</div>
                    <h3>Flap Surgery</h3>
                </div>
                <div class="treatment-card-body">
                    <p>For advanced periodontitis, the gum is folded back to allow deep cleaning of roots and reshaping
                        of the underlying bone for a healthier foundation.</p>
                    <div class="treatment-meta">
                        <span class="meta-pill">Surgical</span>
                        <span class="meta-pill">Advanced cases</span>
                        <span class="meta-pill">Long-term fix</span>
                    </div>
                </div>
            </article>
            <article class="treatment-card">
                <div class="treatment-card-top">
                    <div class="treatment-num">05</div>
                    <div class="treatment-icon">🌱</div>
                    <h3>Gum Grafting</h3>
                </div>
                <div class="treatment-card-body">
                    <p>Tissue is transplanted to cover exposed roots caused by gum recession, reducing sensitivity and
                        protecting against further bone and tissue loss.</p>
                    <div class="treatment-meta">
                        <span class="meta-pill">Surgical</span>
                        <span class="meta-pill">Recession repair</span>
                        <span class="meta-pill">Cosmetic benefit</span>
                    </div>
                </div>
            </article>
            <article class="treatment-card">
                <div class="treatment-card-top">
                    <div class="treatment-num">06</div>
                    <div class="treatment-icon">🦴</div>
                    <h3>Bone Grafting</h3>
                </div>
                <div class="treatment-card-body">
                    <p>Restores bone destroyed by periodontal disease using natural or synthetic grafting material,
                        providing stability for existing teeth or implant placement.</p>
                    <div class="treatment-meta">
                        <span class="meta-pill">Surgical</span>
                        <span class="meta-pill">Bone restoration</span>
                        <span class="meta-pill">Implant prep</span>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <!-- PROCESS -->
    <section class="process-section fade-in" id="process" aria-labelledby="process-heading">
        <div class="section-label">How It Works</div>
        <h2 class="section-title" id="process-heading">Your Path to <strong>Healthier Gums</strong></h2>
        <p class="section-desc">Our straightforward process ensures you receive the right treatment with clear guidance
            at every step.</p>
        <div class="process-steps">
            <div class="step">
                <div class="step-num">1</div>
                <h3>Consultation & Diagnosis</h3>
                <p>A thorough examination including digital X-rays and periodontal charting to assess the extent of gum
                    disease.</p>
            </div>
            <div class="step">
                <div class="step-num">2</div>
                <h3>Personalised Treatment Plan</h3>
                <p>We design a customised treatment plan based on your diagnosis, lifestyle, and preferences — no
                    one-size-fits-all.</p>
            </div>
            <div class="step">
                <div class="step-num">3</div>
                <h3>Treatment & Care</h3>
                <p>Expert treatment delivered comfortably using the latest techniques, with pain management options
                    available.</p>
            </div>
            <div class="step">
                <div class="step-num">4</div>
                <h3>Ongoing Maintenance</h3>
                <p>Regular periodontal maintenance visits to monitor healing and prevent recurrence of gum disease
                    long-term.</p>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="faq-section fade-in" id="faq" aria-labelledby="faq-heading">
        <div class="faq-layout">
            <div>
                <div class="section-label">Common Questions</div>
                <h2 class="section-title" id="faq-heading">Everything About <strong>Gum Treatments</strong></h2>
                <p class="section-desc">We answer your most important questions about gum disease and periodontal care.
                </p>
            </div>
            <div class="faq-list" itemscope itemtype="https://schema.org/FAQPage">
                <div class="faq-item" onclick="toggleFaq(this)" itemscope itemprop="mainEntity"
                    itemtype="https://schema.org/Question">
                    <div class="faq-question">
                        <span itemprop="name">Is gum disease treatment painful?</span>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <span itemprop="text">Most gum treatments are performed under local anesthesia, making the
                            procedure comfortable. You may experience mild soreness for a few days after treatment,
                            which is easily managed with over-the-counter pain relief. Laser treatments typically
                            involve even less discomfort.</span>
                    </div>
                </div>
                <div class="faq-item" onclick="toggleFaq(this)" itemscope itemprop="mainEntity"
                    itemtype="https://schema.org/Question">
                    <div class="faq-question">
                        <span itemprop="name">How long does gum treatment take?</span>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <span itemprop="text">Non-surgical treatments like scaling and root planing usually require 1–2
                            visits, each lasting 1–2 hours. Surgical procedures vary but most are completed in a single
                            session. Full healing can take 4–8 weeks depending on the severity of your condition.</span>
                    </div>
                </div>
                <div class="faq-item" onclick="toggleFaq(this)" itemscope itemprop="mainEntity"
                    itemtype="https://schema.org/Question">
                    <div class="faq-question">
                        <span itemprop="name">Can gum disease come back after treatment?</span>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <span itemprop="text">Yes, without proper home care and regular maintenance appointments, gum
                            disease can recur. We create a personalised maintenance schedule — typically every 3–4
                            months — to monitor your gum health and prevent relapse.</span>
                    </div>
                </div>
                <div class="faq-item" onclick="toggleFaq(this)" itemscope itemprop="mainEntity"
                    itemtype="https://schema.org/Question">
                    <div class="faq-question">
                        <span itemprop="name">Is gum treatment covered by insurance?</span>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <span itemprop="text">Many dental insurance plans cover periodontal treatments, especially
                            non-surgical procedures. Coverage varies by plan. Our team will verify your benefits before
                            treatment and discuss all payment options to ensure your care is accessible.</span>
                    </div>
                </div>
                <div class="faq-item" onclick="toggleFaq(this)" itemscope itemprop="mainEntity"
                    itemtype="https://schema.org/Question">
                    <div class="faq-question">
                        <span itemprop="name">What's the difference between gingivitis and periodontitis?</span>
                        <div class="faq-toggle">+</div>
                    </div>
                    <div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <span itemprop="text">Gingivitis is early-stage gum disease affecting only the gum tissue — it's
                            reversible with treatment. Periodontitis is advanced gum disease where infection spreads to
                            the bone and connective tissue. Periodontitis requires more intensive treatment but can be
                            controlled effectively.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section fade-in" id="cta" aria-labelledby="cta-heading">
        <h2 id="cta-heading">Ready to Restore <em>Healthy Gums?</em></h2>
        <p>Don't wait until gum disease progresses. Schedule a consultation today and take the first step toward lasting
            oral health.</p>
        <div class="cta-actions">
            <a href="tel:+1234567890" class="btn-white">📞 Call Us Today</a>
            <a href="mailto:hello@yourpractice.com" class="btn-ghost">Book Online</a>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include 'inc/footer.php'; ?>
    <?php include 'inc/footer-data.php'; ?>

    <script>
        // FAQ toggle
        function toggleFaq(el) {
            const isOpen = el.classList.contains('open');
            document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
            if (!isOpen) el.classList.add('open');
        }

        // Scroll fade-in
        const observer = new IntersectionObserver(entries => {
            entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
        }, { threshold: 0.1 });
        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

        // Bar animations on scroll
        const barObserver = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.querySelectorAll('.bar-fill').forEach((b, i) => {
                        const widths = ['90%', '76%', '83%'];
                        setTimeout(() => { b.style.width = widths[i]; }, i * 200);
                    });
                }
            });
        }, { threshold: 0.3 });
        document.querySelectorAll('.hero-card').forEach(el => barObserver.observe(el));

        // Tab buttons (visual only)
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab-btn').forEach(b => { b.classList.remove('active'); b.setAttribute('aria-selected', 'false'); });
                btn.classList.add('active');
                btn.setAttribute('aria-selected', 'true');
            });
        });
    </script>
</body>

</html>