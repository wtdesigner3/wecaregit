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

$canonical_url = BASE_URL . $pdetailrec['url'];

// Get contact info for the form
$con = mysqli_query($conn, "SELECT * FROM `tbl_contact`");
$coninfo = mysqli_fetch_array($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/head.php'; ?>
    <title><?= htmlspecialchars($pdetailrec['metatag'] ?: $pdetailrec['heading']) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pdetailrec['metadesc'] ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta name="keywords" content="<?= htmlspecialchars($pdetailrec['keyword'] ?? '', ENT_QUOTES, 'UTF-8') ?>" />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?= $canonical_url ?>" />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        /* =============================================
           CSS VARIABLES — Brand Tokens
        ============================================= */
        :root {
            --primary: #1e8c8b;
            --primary-dark: #156868;
            --primary-light: #e6f5f5;
            --primary-mid: #c2e8e8;
            --accent: #f4a738;
            --text-dark: #1a1a2e;
            --text-body: #4a5568;
            --text-muted: #718096;
            --bg-light: #f7fbfb;
            --bg-white: #ffffff;
            --border: #e2ecec;
            --shadow-sm: 0 2px 12px rgba(30, 140, 139, 0.08);
            --shadow-md: 0 8px 32px rgba(30, 140, 139, 0.12);
            --shadow-lg: 0 20px 60px rgba(30, 140, 139, 0.16);
            --radius-sm: 8px;
            --radius-md: 14px;
            --radius-lg: 22px;
            --radius-xl: 32px;
            --font-display: 'DM Serif Display', Georgia, serif;
            --font-body: 'DM Sans', sans-serif;
            --container-max: 1200px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* =============================================
           BASE RESETS
        ============================================= */
        body {
            font-family: var(--font-body);
            color: var(--text-body);
            background: var(--bg-white);
        }

        /* =============================================
           BREADCRUMB / PAGE HERO — kept as original
        ============================================= */
        /* No overrides — page-hero uses the site's existing styles from the theme */

        /* =============================================
           HERO SPLIT SECTION
        ============================================= */
        .service-hero-split {
            padding: 72px 0 60px;
            background: var(--bg-white);
        }

        .service-hero-split .container {
            max-width: var(--container-max);
        }

        .hero-content-left {
            padding-right: 40px;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 6px 16px;
            border-radius: 50px;
            margin-bottom: 20px;
        }

        .hero-tag::before {
            content: '';
            width: 6px;
            height: 6px;
            background: var(--primary);
            border-radius: 50%;
            display: inline-block;
        }

        .hero-content-left h1 {
            font-family: var(--font-display);
            font-size: clamp(30px, 3.5vw, 44px);
            font-weight: 400;
            color: var(--text-dark);
            margin-bottom: 20px;
            line-height: 1.18;
            letter-spacing: -0.5px;
        }

        .hero-content-left h1 em {
            font-style: italic;
            color: var(--primary);
        }

        .hero-content-left p {
            font-size: 16px;
            color: var(--text-body);
            margin-bottom: 32px;
            line-height: 1.75;
        }

        .btn-primary-teal {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--primary);
            color: #fff !important;
            padding: 14px 32px;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 600;
            font-family: var(--font-body);
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 6px 24px rgba(30, 140, 139, 0.3);
        }

        .btn-primary-teal:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 32px rgba(30, 140, 139, 0.38);
            color: #fff !important;
        }

        .btn-primary-teal svg {
            transition: var(--transition);
        }

        .btn-primary-teal:hover svg {
            transform: translateX(3px);
        }

        .hero-img-right {
            position: relative;
        }

        .hero-img-right::before {
            content: '';
            position: absolute;
            top: -16px;
            right: -16px;
            width: 80%;
            height: 80%;
            background: var(--primary-light);
            border-radius: var(--radius-lg);
            z-index: 0;
        }

        .hero-img-right::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: -10px;
            width: 50%;
            height: 50%;
            background: var(--primary-mid);
            border-radius: var(--radius-md);
            z-index: 0;
            opacity: 0.5;
        }

        .hero-img-right img {
            position: relative;
            z-index: 1;
            width: 100%;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            display: block;
            object-fit: cover;
        }

        /* =============================================
           MAIN GRID — Sidebar + Content
        ============================================= */
        .service-main-grid {
            padding: 64px 0 80px;
            background: var(--bg-light);
        }

        .service-main-grid .container {
            max-width: var(--container-max);
        }

        /* ── SIDEBAR ── */
        .sidebar-col {
            position: relative;
        }

        .sidebar-sticky-wrap {
            position: sticky;
            top: 90px;
        }

        .sidebar-card {
            background: var(--bg-white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
        }

        /* Services list block */
        .sidebar-services-block {
            padding: 28px;
        }

        .sidebar-block-title {
            font-family: var(--font-display);
            font-size: 18px;
            color: var(--text-dark);
            margin-bottom: 18px;
            padding-bottom: 14px;
            border-bottom: 2px solid var(--primary-light);
            position: relative;
        }

        .sidebar-block-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--primary);
        }

        .sidebar-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-list li {
            margin-bottom: 2px;
        }

        .sidebar-list a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: var(--text-body);
            font-size: 14px;
            font-weight: 500;
            padding: 10px 14px;
            border-radius: var(--radius-sm);
            text-decoration: none;
            transition: var(--transition);
            gap: 8px;
        }

        .sidebar-list a .arrow-icon {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            color: transparent;
            transition: var(--transition);
            flex-shrink: 0;
        }

        .sidebar-list a:hover,
        .sidebar-list a.active {
            background: var(--primary-light);
            color: var(--primary);
        }

        .sidebar-list a:hover .arrow-icon,
        .sidebar-list a.active .arrow-icon {
            background: var(--primary);
            color: #fff;
        }

        .sidebar-list a.active {
            font-weight: 700;
        }

        /* Contact CTA block */
        .sidebar-cta-block {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 28px;
            position: relative;
            overflow: hidden;
        }

        .sidebar-cta-block::before {
            content: '🦷';
            position: absolute;
            right: -8px;
            top: -10px;
            font-size: 80px;
            opacity: 0.1;
            line-height: 1;
        }

        .sidebar-cta-block p.cta-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 6px;
        }

        .sidebar-cta-block p.cta-sub {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 14px;
            line-height: 1.5;
        }

        .sidebar-cta-block a.cta-phone {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            font-size: 18px;
            font-weight: 700;
            font-family: var(--font-display);
            text-decoration: none;
            transition: var(--transition);
        }

        .sidebar-cta-block a.cta-phone .phone-icon {
            width: 38px;
            height: 38px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
            transition: var(--transition);
        }

        .sidebar-cta-block a.cta-phone:hover .phone-icon {
            background: rgba(255, 255, 255, 0.35);
        }

        .sidebar-cta-block a.cta-phone:hover {
            color: #fff;
            opacity: 0.9;
        }

        /* ── MAIN DESCRIPTION ── */
        .description-card {
            background: var(--bg-white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        /* =============================================
           ATTRACTIVE BULLET POINTS
           Targets all ul/ol inserted via admin editor
        ============================================= */
        .description-body ul {
            list-style: none;
            padding: 0;
            margin: 0 0 22px 0;
        }

        .description-body ul li {
            position: relative;
            padding: 10px 14px 10px 44px;
            margin-bottom: 8px;
            background: var(--bg-light);
            border-radius: var(--radius-sm);
            border-left: 3px solid var(--primary);
            font-size: 15px;
            color: var(--text-body);
            line-height: 1.6;
            transition: var(--transition);
        }

        .description-body ul li:hover {
            background: var(--primary-light);
            border-left-color: var(--primary-dark);
        }

        .description-body ul li::before {
            content: '';
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 10'%3E%3Cpath d='M1 5l3.5 3.5L11 1' stroke='white' stroke-width='1.8' fill='none' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 10px;
            background-color: var(--primary);
        }

        /* Nested ul */
        .description-body ul ul {
            margin: 10px 0 4px 0;
        }

        .description-body ul ul li {
            background: #fff;
            border-left-color: var(--primary-mid);
            font-size: 14px;
        }

        .description-body ul ul li::before {
            background-color: var(--primary-mid);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3E%3Ccircle cx='4' cy='4' r='2.5' fill='%231e8c8b'/%3E%3C/svg%3E");
            background-size: 8px;
        }

        /* Ordered list */
        .description-body ol {
            list-style: none;
            counter-reset: ol-counter;
            padding: 0;
            margin: 0 0 22px 0;
        }

        .description-body ol li {
            counter-increment: ol-counter;
            position: relative;
            padding: 10px 14px 10px 52px;
            margin-bottom: 8px;
            background: var(--bg-light);
            border-radius: var(--radius-sm);
            font-size: 15px;
            color: var(--text-body);
            line-height: 1.6;
            transition: var(--transition);
        }

        .description-body ol li:hover {
            background: var(--primary-light);
        }

        .description-body ol li::before {
            content: counter(ol-counter);
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 26px;
            height: 26px;
            background: var(--primary);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            font-family: var(--font-body);
            line-height: 26px;
            text-align: center;
        }

        /* Sticky sidebar — requires row to be align-items: flex-start */
        .sidebar-row {
            align-items: flex-start !important;
        }

        .desc-header {
            background: linear-gradient(135deg, var(--primary-light) 0%, #daf0f0 100%);
            padding: 28px 36px 22px;
            border-bottom: 1px solid var(--primary-mid);
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .desc-header-icon {
            width: 48px;
            height: 48px;
            background: var(--primary);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .desc-header-text h2 {
            font-family: var(--font-display);
            font-size: 22px;
            color: var(--text-dark);
            margin: 0 0 4px;
        }

        .desc-header-text p {
            font-size: 13px;
            color: var(--text-muted);
            margin: 0;
        }

        .description-body {
            padding: 36px;
            line-height: 1.85;
            color: var(--text-body);
            font-size: 15.5px;
        }

        .description-body h2,
        .description-body h3 {
            font-family: var(--font-display);
            color: var(--text-dark);
            margin-top: 36px;
            margin-bottom: 16px;
            line-height: 1.3;
        }

        .description-body h2 {
            font-size: 26px;
        }

        .description-body h3 {
            font-size: 20px;
            color: var(--primary-dark);
        }

        .description-body h2::after {
            content: '';
            display: block;
            width: 40px;
            height: 3px;
            background: var(--primary);
            margin-top: 10px;
            border-radius: 2px;
        }

        .description-body p {
            margin-bottom: 18px;
        }

        .description-body ul li,
        .description-body ol li {
            margin-bottom: 10px;
            padding-left: 6px;
        }

        .description-body ul {
            padding-left: 20px;
        }

        .description-body ul li::marker {
            color: var(--primary);
        }

        .description-body strong {
            color: var(--text-dark);
        }

        .description-body a {
            color: var(--primary);
        }

        /* =============================================
           ENQUIRY SECTION
        ============================================= */
        .enquiry-section {
            padding: 80px 0;
            background: var(--bg-white);
            position: relative;
        }

        .enquiry-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), #29b5b4, var(--primary));
        }

        .enquiry-section .container {
            max-width: var(--container-max);
        }

        .enquiry-inner {
            max-width: 760px;
            margin: 0 auto;
        }

        .enquiry-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 6px 16px;
            border-radius: 50px;
            margin-bottom: 14px;
        }

        .enquiry-title {
            font-family: var(--font-display);
            font-size: clamp(28px, 3vw, 38px);
            color: var(--text-dark);
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .enquiry-sub {
            color: var(--text-muted);
            font-size: 15px;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .enquiry-form-card {
            background: #fff;
            border-radius: var(--radius-xl);
            padding: 48px;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
        }

        .enquiry-form-card .form-control {
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 13px 18px;
            font-family: var(--font-body);
            font-size: 14.5px;
            color: var(--text-dark);
            background: var(--bg-light);
            transition: var(--transition);
            width: 100%;
            outline: none;
        }

        .enquiry-form-card .form-control:focus {
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(30, 140, 139, 0.1);
        }

        .enquiry-form-card textarea.form-control {
            resize: vertical;
            min-height: 110px;
        }

        .form-label-float {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
            letter-spacing: 0.5px;
            margin-bottom: 6px;
            text-transform: uppercase;
        }

        .btn-submit-teal {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 15px 48px;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 700;
            font-family: var(--font-body);
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 6px 24px rgba(30, 140, 139, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-submit-teal:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 32px rgba(30, 140, 139, 0.38);
        }

        /* =============================================
           BOOKING MODAL
        ============================================= */
        #bookingModal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(15, 25, 40, 0.65);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            align-items: center;
            justify-content: center;
        }

        #bookingModal.open {
            display: flex;
        }

        .modal-box {
            background: #fff;
            border-radius: var(--radius-xl);
            width: 94%;
            max-width: 480px;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.25);
            animation: modalSlideIn 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 24px 28px 22px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
        }

        .modal-header-text {
            flex: 1;
            min-width: 0;
        }

        .modal-header h3 {
            font-family: var(--font-display);
            font-size: 22px;
            color: #fff;
            margin: 0 0 5px;
            line-height: 1.2;
        }

        .modal-header p {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
            line-height: 1.4;
        }

        .modal-close-btn {
            flex-shrink: 0;
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            cursor: pointer;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 20px;
            line-height: 1;
            transition: var(--transition);
            margin-top: 2px;
        }

        .modal-close-btn:hover {
            background: rgba(255, 255, 255, 0.35);
        }

        .modal-body {
            padding: 28px 32px 32px;
        }

        .modal-body .form-control {
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 12px 16px;
            font-family: var(--font-body);
            font-size: 14px;
            color: var(--text-dark);
            background: var(--bg-light);
            width: 100%;
            transition: var(--transition);
            outline: none;
            margin-bottom: 14px;
        }

        .modal-body .form-control:focus {
            border-color: var(--primary);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(30, 140, 139, 0.1);
        }

        .modal-body select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%231e8c8b' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 36px;
        }

        .btn-modal-submit {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 14px;
            border-radius: var(--radius-sm);
            font-size: 15px;
            font-weight: 700;
            font-family: var(--font-body);
            cursor: pointer;
            width: 100%;
            transition: var(--transition);
            box-shadow: 0 4px 20px rgba(30, 140, 139, 0.3);
            margin-top: 4px;
        }

        .btn-modal-submit:hover {
            background: var(--primary-dark);
            box-shadow: 0 8px 28px rgba(30, 140, 139, 0.4);
        }

        /* =============================================
           RESPONSIVE
        ============================================= */
        @media (max-width: 991px) {
            .hero-content-left {
                padding-right: 0;
                margin-bottom: 40px;
            }

            .hero-img-right::before,
            .hero-img-right::after {
                display: none;
            }

            .sidebar-sticky-wrap {
                position: static;
            }

            .sidebar-col {
                margin-bottom: 30px;
            }
        }

        @media (max-width: 767px) {
            .service-hero-split {
                padding: 48px 0 40px;
            }

            .service-main-grid {
                padding: 40px 0 56px;
            }

            .description-body {
                padding: 24px 20px;
            }

            .desc-header {
                padding: 20px 24px 16px;
            }

            .enquiry-form-card {
                padding: 28px 20px;
            }

            .modal-body {
                padding: 20px 20px 24px;
            }

            .modal-header {
                padding: 22px 24px 18px;
            }
        }
    </style>
</head>

<body>

    <div id="page" class="page-wrapper">

        <?php include 'inc/header.php'; ?>

        <!-- BREADCRUMB HERO -->
        <div class="page-hero">
            <div class="page-hero-inner">
                <nav class="breadcrumb-nav">
                    <a href="<?= BASE_URL; ?>">Home</a>
                    <span class="breadcrumb-sep">›</span>
                    <span><?= $pdetailrec['heading']; ?></span>
                </nav>
                <h1><?= $pdetailrec['heading']; ?></h1>
            </div>
        </div>

        <!-- HERO SPLIT SECTION -->
        <section class="service-hero-split">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="hero-content-left">
                            <span class="hero-tag">Expert Dental Care</span>
                            <h1>Best <em><?= $pdetailrec['heading']; ?></em> in Jamshedpur</h1>
                            <p><?= htmlspecialchars(substr(strip_tags($pdetailrec['des']), 0, 200)) ?>...</p>
                            <a href="javascript:void(0)" class="btn-primary-teal" onclick="openModal()">
                                Book Appointment
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M3 8h10M9 4l4 4-4 4" stroke="#fff" stroke-width="1.8"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="hero-img-right">
                            <img src="<?= BASE_URL ?>uploads/services/<?= $pdetailrec['image'] ?>"
                                alt="<?= $pdetailrec['heading'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- MAIN GRID: SIDEBAR + DESCRIPTION -->
        <section class="service-main-grid">
            <div class="container">
                <div class="row sidebar-row">

                    <!-- LEFT SIDEBAR (sticky) -->
                    <div class="col-lg-4 sidebar-col">
                        <div class="sidebar-sticky-wrap">
                            <div class="sidebar-card">

                                <!-- Services List -->
                                <div class="sidebar-services-block">
                                    <h3 class="sidebar-block-title">Our Services</h3>
                                    <ul class="sidebar-list">
                                        <?php
                                        $otherSvc = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `status`='1' ORDER BY `sort` ASC");
                                        while ($svc = mysqli_fetch_array($otherSvc)) {
                                            $active = ($svc['url'] == $bname) ? 'active' : '';
                                            echo '<li>
                                                <a href="' . BASE_URL . $svc['url'] . '" class="' . $active . '">
                                                    <span>' . htmlspecialchars($svc['heading']) . '</span>
                                                    <span class="arrow-icon">›</span>
                                                </a>
                                            </li>';
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <!-- CTA Phone Block -->
                                <div class="sidebar-cta-block">
                                    <p class="cta-label">Need Help?</p>
                                    <p class="cta-sub">Call us anytime — we're happy to assist you.</p>
                                    <a href="tel:<?= $coninfo['con_phone1'] ?>" class="cta-phone">
                                        <span class="phone-icon">📞</span>
                                        <?= $coninfo['con_phone1'] ?>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- MAIN DESCRIPTION -->
                    <div class="col-lg-8">
                        <div class="description-card">
                            <div class="desc-header">
                                <div class="desc-header-icon">🦷</div>
                                <div class="desc-header-text">
                                    <h2><?= $pdetailrec['heading']; ?></h2>
                                    <p>WeCare Dental Clinic, Jamshedpur</p>
                                </div>
                            </div>
                            <div class="description-body">
                                <?= $pdetailrec['des'] ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ENQUIRY SECTION -->
        <section class="enquiry-section">
            <div class="container">
                <div class="enquiry-inner text-center">
                    <span class="enquiry-badge">✉ Get in Touch</span>
                    <h2 class="enquiry-title">Send Us a Quick Enquiry</h2>
                    <p class="enquiry-sub">Have a question about our services? Fill in the form and we'll get back to
                        you shortly.</p>
                </div>
                <div class="enquiry-inner">
                    <div class="enquiry-form-card">
                        <form method="POST" action="<?= BASE_URL; ?>mail/contactMail" name="enquiryForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label-float">Your Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label-float">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="+91 XXXXX XXXXX"
                                        required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label-float">Email Address</label>
                                    <input type="email" name="email" class="form-control" placeholder="you@example.com"
                                        required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label-float">Your Message</label>
                                    <textarea name="message" class="form-control"
                                        placeholder="How can we help you?"></textarea>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn-submit-teal">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M2 8l12 0M10 4l4 4-4 4" stroke="#fff" stroke-width="1.8"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Send Enquiry
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- BOOKING MODAL -->
        <div id="bookingModal">
            <div class="modal-box">
                <div class="modal-header">
                    <div class="modal-header-text">
                        <h3>Book an Appointment</h3>
                        <p>Schedule your visit for <?= $pdetailrec['heading'] ?></p>
                    </div>
                    <button class="modal-close-btn" onclick="closeModal()">×</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= BASE_URL; ?>mail/contactMail">
                        <input type="text" name="name" class="form-control" placeholder="Your Name *" required>
                        <input type="tel" name="phone" class="form-control" placeholder="Phone Number *" required>
                        <input type="hidden" name="service" value="<?= $pdetailrec['heading'] ?>">
                        <select class="form-control" name="patient">
                            <option>New Patient</option>
                            <option>Returning Patient</option>
                        </select>
                        <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                        </div>
                        <button type="submit" class="btn-modal-submit">Schedule Now</button>
                    </form>
                </div>
            </div>
        </div>

        <?php include 'inc/footer.php'; ?>

    </div><!-- END PAGE -->

    <?php include 'inc/footer-data.php'; ?>

    <script>
        function openModal() {
            const modal = document.getElementById('bookingModal');
            modal.classList.add('open');
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            const modal = document.getElementById('bookingModal');
            modal.classList.remove('open');
            document.body.style.overflow = 'auto';
        }
        window.onclick = function (event) {
            const modal = document.getElementById('bookingModal');
            if (event.target === modal) closeModal();
        }
    </script>
</body>

</html>