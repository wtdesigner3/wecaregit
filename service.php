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

    <style>
        /* ═══════════════════════════════════════════
           WECARE DENTAL — SERVICE PAGE REDESIGN
           Primary: #00a3c8  |  Dark: #1a2e35
        ═══════════════════════════════════════════ */
        :root {
            --blue: #00a3c8;
            --blue-dark: #008caf;
            --blue-deep: #006f8e;
            --blue-pale: #e6f6fa;
            --blue-light: #cceef6;
            --dark: #1a2e35;
            --mid: #2c4a54;
            --text: #444f5a;
            --muted: #7a8a92;
            --light-bg: #f4f8fa;
            --white: #ffffff;
            --border: #ddeef3;
            --accent: #ff6b35;
            --green: #28a745;
            --shadow-sm: 0 2px 12px rgba(0, 163, 200, 0.08);
            --shadow-md: 0 8px 32px rgba(0, 163, 200, 0.14);
            --shadow-lg: 0 20px 60px rgba(0, 163, 200, 0.18);
            --radius: 14px;
            --radius-lg: 22px;
        }

        /* ── HERO SPLIT ── */
        .service-hero-split {
            padding: 0;
            background: linear-gradient(135deg, #f0fafd 0%, #e6f6fa 40%, #ffffff 100%);
            position: relative;
            overflow: hidden;
        }

        .service-hero-split::before {
            content: '';
            position: absolute;
            top: -120px;
            right: -120px;
            width: 480px;
            height: 480px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 163, 200, 0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        .service-hero-split::after {
            content: '';
            position: absolute;
            bottom: -60px;
            left: -60px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 163, 200, 0.07) 0%, transparent 70%);
            pointer-events: none;
        }

        .service-hero-inner {
            padding: 80px 0 70px;
            position: relative;
            z-index: 1;
        }

        /* Hero left text */
        .hero-content-left {
            padding-right: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--blue-pale);
            color: var(--blue);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 6px 14px;
            border-radius: 50px;
            margin-bottom: 20px;
            border: 1px solid var(--blue-light);
            width: fit-content;
        }

        .hero-tag::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--blue);
            display: inline-block;
        }

        .hero-content-left h1 {
            font-size: clamp(28px, 3.5vw, 44px);
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 18px;
            line-height: 1.18;
            letter-spacing: -0.01em;
        }

        .hero-content-left h1 em {
            font-style: italic;
            color: var(--blue);
        }

        .hero-content-left p {
            font-size: 16px;
            color: var(--text);
            margin-bottom: 32px;
            line-height: 1.75;
            max-width: 460px;
        }

        .hero-btn-group {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            align-items: center;
        }

        .btn-blue-main {
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dark) 100%);
            color: #fff !important;
            padding: 14px 32px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 6px 24px rgba(0, 163, 200, 0.35);
            transition: all 0.25s;
            border: none;
            cursor: pointer;
        }

        .btn-blue-main:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 32px rgba(0, 163, 200, 0.45);
            color: #fff !important;
        }

        .btn-call {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--dark) !important;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            transition: color 0.2s;
        }

        .btn-call:hover {
            color: var(--blue) !important;
        }

        .btn-call-icon {
            width: 42px;
            height: 42px;
            background: var(--blue-pale);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: background 0.2s;
        }

        .btn-call:hover .btn-call-icon {
            background: var(--blue-light);
        }

        /* Hero stats bar */
        .hero-stats-bar {
            display: flex;
            gap: 0;
            margin-top: 40px;
            background: #fff;
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            overflow: hidden;
            width: fit-content;
        }

        .hero-stat {
            padding: 16px 28px;
            text-align: center;
            border-right: 1px solid var(--border);
        }

        .hero-stat:last-child {
            border-right: none;
        }

        .hero-stat-num {
            font-size: 22px;
            font-weight: 800;
            color: var(--blue);
            line-height: 1;
        }

        .hero-stat-label {
            font-size: 11px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-top: 4px;
        }

        /* Hero image right */
        .hero-img-right {
            position: relative;
        }

        .hero-img-right img {
            width: 100%;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            display: block;
        }

        .hero-img-badge {
            position: absolute;
            bottom: -18px;
            left: 28px;
            background: #fff;
            border-radius: var(--radius);
            padding: 14px 20px;
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid var(--border);
            min-width: 210px;
        }

        .badge-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--blue-pale), var(--blue-light));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .badge-text strong {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: var(--dark);
        }

        .badge-text span {
            font-size: 12px;
            color: var(--muted);
        }

        .hero-img-tag {
            position: absolute;
            top: 20px;
            right: -14px;
            background: var(--blue);
            color: #fff;
            border-radius: 50px;
            padding: 8px 18px;
            font-size: 12px;
            font-weight: 700;
            box-shadow: 0 4px 16px rgba(0, 163, 200, 0.4);
            animation: floatBadge 3s ease-in-out infinite;
        }

        @keyframes floatBadge {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-6px);
            }
        }

        /* ── MAIN GRID (description + sidebar) ── */
        .service-main-grid {
            padding: 70px 0 80px;
            background: var(--light-bg);
        }

        /* Sidebar */
        .sidebar-services {
            background: #fff;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            border: 1px solid var(--border);
            position: sticky;
            top: 100px;
        }

        .sidebar-header {
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dark) 100%);
            padding: 22px 26px;
        }

        .sidebar-title {
            font-size: 17px;
            font-weight: 700;
            color: #fff;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-title::before {
            content: '🦷';
            font-size: 18px;
        }

        .sidebar-list {
            list-style: none;
            padding: 8px 0;
            margin: 0;
        }

        .sidebar-list li {
            margin: 0;
        }

        .sidebar-list a {
            color: var(--text);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 26px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            border-bottom: 1px solid #f0f4f6;
        }

        .sidebar-list a::after {
            content: '›';
            font-size: 18px;
            color: var(--muted);
            transition: color 0.2s, transform 0.2s;
        }

        .sidebar-list a:hover,
        .sidebar-list a.active {
            color: var(--blue);
            background: var(--blue-pale);
            padding-left: 32px;
        }

        .sidebar-list a:hover::after,
        .sidebar-list a.active::after {
            color: var(--blue);
            transform: translateX(3px);
        }

        .sidebar-list a.active {
            font-weight: 700;
            border-left: 3px solid var(--blue);
        }

        .sidebar-contact-box {
            margin: 0;
            padding: 22px 26px;
            background: linear-gradient(135deg, #f0fafd 0%, var(--blue-pale) 100%);
            border-top: 1px solid var(--border);
        }

        .sidebar-contact-box p {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--muted);
            margin-bottom: 8px;
        }

        .sidebar-phone {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--blue) !important;
            font-size: 20px;
            font-weight: 800;
            text-decoration: none;
            letter-spacing: -0.02em;
            transition: color 0.2s;
        }

        .sidebar-phone:hover {
            color: var(--blue-dark) !important;
        }

        .sidebar-wa-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 14px;
            background: #25d366;
            color: #fff !important;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.2s, transform 0.2s;
        }

        .sidebar-wa-btn:hover {
            background: #1da851;
            transform: translateY(-1px);
        }

        /* Description content */
        .description-content {
            background: #fff;
            padding: 44px 48px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            line-height: 1.85;
            color: var(--text);
            font-size: 15.5px;
        }

        .description-content h2 {
            font-size: 24px;
            font-weight: 800;
            color: var(--dark);
            margin-top: 36px;
            margin-bottom: 14px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--blue-pale);
        }

        .description-content h3 {
            font-size: 19px;
            font-weight: 700;
            color: var(--mid);
            margin-top: 28px;
            margin-bottom: 12px;
        }

        .description-content h4 {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark);
            margin-top: 20px;
            margin-bottom: 8px;
        }

        .description-content p {
            margin-bottom: 16px;
        }

        .description-content ul {
            padding-left: 0;
            list-style: none;
            margin-bottom: 20px;
        }

        .description-content ul li {
            padding: 6px 0 6px 26px;
            position: relative;
            color: var(--text);
        }

        .description-content ul li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--blue);
            font-weight: 700;
        }

        .description-content strong {
            color: var(--dark);
        }

        .description-content a {
            color: var(--blue);
        }

        /* Why-choose inline highlight strip */
        .why-strip {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1px;
            background: var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            margin: 32px 0;
            border: 1px solid var(--border);
        }

        .why-item {
            background: var(--blue-pale);
            padding: 20px 18px;
            text-align: center;
        }

        .why-item-icon {
            font-size: 26px;
            margin-bottom: 8px;
        }

        .why-item-text {
            font-size: 13px;
            font-weight: 600;
            color: var(--mid);
            line-height: 1.4;
        }

        /* ── TRUST BADGES STRIP ── */
        .trust-strip {
            background: var(--dark);
            padding: 30px 0;
        }

        .trust-inner {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 40px;
        }

        .trust-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.85);
        }

        .trust-icon {
            width: 46px;
            height: 46px;
            background: rgba(0, 163, 200, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .trust-label {
            font-size: 14px;
            font-weight: 600;
            line-height: 1.3;
        }

        .trust-sub {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.45);
        }

        /* ── ENQUIRY SECTION ── */
        .enquiry-section {
            padding: 80px 0;
            background: #fff;
            position: relative;
            overflow: hidden;
        }

        .enquiry-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--blue) 0%, var(--blue-dark) 100%);
        }

        .enquiry-section-title {
            text-align: center;
            margin-bottom: 48px;
        }

        .enquiry-section-title .section-tag {
            display: inline-block;
            background: var(--blue-pale);
            color: var(--blue);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 50px;
            border: 1px solid var(--blue-light);
            margin-bottom: 14px;
        }

        .enquiry-section-title h2 {
            font-size: clamp(22px, 3vw, 34px);
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .enquiry-section-title p {
            color: var(--muted);
            font-size: 15px;
        }

        .enquiry-layout {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 50px;
            align-items: start;
            max-width: 1000px;
            margin: 0 auto;
        }

        /* Enquiry info col */
        .enquiry-info {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .info-card {
            background: var(--light-bg);
            border-radius: var(--radius);
            padding: 22px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            border: 1px solid var(--border);
            transition: box-shadow 0.2s;
        }

        .info-card:hover {
            box-shadow: var(--shadow-sm);
        }

        .info-card-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dark) 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
            box-shadow: 0 4px 14px rgba(0, 163, 200, 0.3);
        }

        .info-card-body strong {
            display: block;
            font-size: 15px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 4px;
        }

        .info-card-body span {
            font-size: 13.5px;
            color: var(--muted);
            line-height: 1.6;
        }

        .info-card-body a {
            color: var(--blue);
            text-decoration: none;
            font-weight: 600;
        }

        /* Enquiry form */
        .enquiry-form-wrap {
            background: linear-gradient(135deg, var(--dark) 0%, var(--mid) 100%);
            padding: 40px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
        }

        .enquiry-form-wrap .form-label-top {
            color: rgba(255, 255, 255, 0.5);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-bottom: 20px;
            display: block;
        }

        .enquiry-form-wrap .form-control {
            background: rgba(255, 255, 255, 0.08);
            border: 1.5px solid rgba(255, 255, 255, 0.15);
            color: #fff;
            border-radius: 10px;
            padding: 13px 16px;
            font-size: 14.5px;
            transition: border-color 0.2s, background 0.2s;
        }

        .enquiry-form-wrap .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .enquiry-form-wrap .form-control:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(0, 163, 200, 0.2);
            color: #fff;
            outline: none;
        }

        .enquiry-form-wrap textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .btn-submit-form {
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dark) 100%);
            color: #fff !important;
            border: none;
            padding: 14px 36px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            width: 100%;
            box-shadow: 0 6px 20px rgba(0, 163, 200, 0.4);
            transition: all 0.25s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit-form:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(0, 163, 200, 0.5);
        }

        /* ── MODAL REDESIGN ── */
        #bookingModal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 28, 35, 0.75);
            backdrop-filter: blur(8px);
            animation: fadeModalIn 0.3s ease;
        }

        @keyframes fadeModalIn {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        .modal-content {
            background: #fff;
            margin: 4% auto;
            padding: 0;
            border-radius: var(--radius-lg);
            width: 92%;
            max-width: 480px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.35);
            animation: slideModalIn 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes slideModalIn {
            from {
                transform: translateY(40px) scale(0.95);
                opacity: 0
            }

            to {
                transform: translateY(0) scale(1);
                opacity: 1
            }
        }

        .modal-header-bar {
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-deep) 100%);
            padding: 28px 32px 22px;
            position: relative;
        }

        .modal-header-bar h3 {
            font-size: 22px;
            font-weight: 800;
            color: #fff;
            margin: 0 0 6px;
        }

        .modal-header-bar p {
            color: rgba(255, 255, 255, 0.75);
            font-size: 14px;
            margin: 0;
        }

        .close-modal {
            position: absolute;
            right: 18px;
            top: 16px;
            width: 34px;
            height: 34px;
            background: rgba(255, 255, 255, 0.18);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            line-height: 1;
            cursor: pointer;
            color: #fff;
            transition: background 0.2s;
            border: none;
        }

        .close-modal:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .modal-body-pad {
            padding: 28px 32px 32px;
        }

        .modal-body-pad .form-control {
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 13px 16px;
            font-size: 14.5px;
            color: var(--dark);
            transition: border-color 0.2s, box-shadow 0.2s;
            background: var(--light-bg);
        }

        .modal-body-pad .form-control:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(0, 163, 200, 0.15);
            background: #fff;
            outline: none;
        }

        .modal-body-pad select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2300a3c8' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 36px;
        }

        .modal-body-pad label {
            font-size: 12px;
            font-weight: 700;
            color: var(--muted);
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 6px;
            display: block;
        }

        .btn-modal-submit {
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dark) 100%);
            color: #fff;
            border: none;
            padding: 15px 24px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            width: 100%;
            box-shadow: 0 6px 20px rgba(0, 163, 200, 0.35);
            transition: all 0.25s;
            margin-top: 6px;
        }

        .btn-modal-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(0, 163, 200, 0.5);
        }

        /* btn-blue backward compat */
        .btn-blue {
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue-dark) 100%) !important;
            color: #fff !important;
            padding: 13px 30px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 6px 22px rgba(0, 163, 200, 0.35);
            transition: all 0.25s;
            border: none;
            cursor: pointer;
        }

        .btn-blue:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 163, 200, 0.45);
            color: #fff !important;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 991px) {
            .hero-content-left {
                padding-right: 0;
                margin-bottom: 40px;
            }

            .hero-img-tag {
                right: 10px;
            }

            .description-content {
                padding: 28px 24px;
            }

            .enquiry-layout {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .enquiry-form-wrap {
                padding: 28px 24px;
            }

            .trust-inner {
                gap: 22px;
            }
        }

        @media (max-width: 767px) {
            .service-hero-inner {
                padding: 50px 0 40px;
            }

            .hero-stats-bar {
                flex-wrap: wrap;
                width: 100%;
            }

            .hero-stat {
                flex: 1 1 auto;
            }

            .hero-img-badge {
                position: static;
                margin-top: 20px;
                width: 100%;
            }

            .why-strip {
                grid-template-columns: 1fr 1fr;
            }

            .modal-content {
                margin: 10% auto;
            }

            .modal-header-bar,
            .modal-body-pad {
                padding: 22px 20px;
            }
        }

        @media (max-width: 480px) {
            .hero-stats-bar {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .why-strip {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div id="page" class="page-wrapper">

        <?php include 'inc/header.php'; ?>

        <!-- ═══════════════════════════════════════
             BREADCRUMB HERO
        ═══════════════════════════════════════ -->
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

        <!-- ═══════════════════════════════════════
             HERO SPLIT SECTION
        ═══════════════════════════════════════ -->
        <section class="service-hero-split">
            <div class="container">
                <div class="service-hero-inner">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="hero-content-left">
                                <span class="hero-tag">Expert Dental Care · Jamshedpur</span>
                                <h1>Best <em><?= $pdetailrec['heading']; ?></em> in Jamshedpur</h1>
                                <p><?= htmlspecialchars(substr(strip_tags($pdetailrec['des']), 0, 210)) ?>...</p>
                                <div class="hero-btn-group">
                                    <button class="btn-blue-main" onclick="openModal()">
                                        📅 Book Appointment
                                    </button>
                                    <a href="tel:<?= $coninfo['con_phone1'] ?>" class="btn-call">
                                        <span class="btn-call-icon">📞</span>
                                        <?= $coninfo['con_phone1'] ?>
                                    </a>
                                </div>
                                <div class="hero-stats-bar">
                                    <div class="hero-stat">
                                        <div class="hero-stat-num">12+</div>
                                        <div class="hero-stat-label">Yrs Experience</div>
                                    </div>
                                    <div class="hero-stat">
                                        <div class="hero-stat-num">1000+</div>
                                        <div class="hero-stat-label">Happy Patients</div>
                                    </div>
                                    <div class="hero-stat">
                                        <div class="hero-stat-num">98%</div>
                                        <div class="hero-stat-label">Satisfaction</div>
                                    </div>
                                    <div class="hero-stat">
                                        <div class="hero-stat-num">20+</div>
                                        <div class="hero-stat-label">Services</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-img-right">
                                <span class="hero-img-tag">✅ Trusted by 1000+ Patients</span>
                                <img src="<?= BASE_URL ?>uploads/services/<?= $pdetailrec['image'] ?>"
                                    alt="<?= htmlspecialchars($pdetailrec['heading']) ?> in Jamshedpur – We Care Dental Clinic">
                                <div class="hero-img-badge">
                                    <div class="badge-icon">🏆</div>
                                    <div class="badge-text">
                                        <strong>Dr. Anand Pandey</strong>
                                        <span>12+ Years of Expert Care</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══════════════════════════════════════
             TRUST STRIP
        ═══════════════════════════════════════ -->
        <div class="trust-strip">
            <div class="container">
                <div class="trust-inner">
                    <div class="trust-item">
                        <div class="trust-icon">🔬</div>
                        <div>
                            <div class="trust-label">Advanced Technology</div>
                            <div class="trust-sub">Latest dental equipment</div>
                        </div>
                    </div>
                    <div class="trust-item">
                        <div class="trust-icon">🛡️</div>
                        <div>
                            <div class="trust-label">100% Safe & Sterile</div>
                            <div class="trust-sub">International hygiene standards</div>
                        </div>
                    </div>
                    <div class="trust-item">
                        <div class="trust-icon">💊</div>
                        <div>
                            <div class="trust-label">Pain-Free Treatments</div>
                            <div class="trust-sub">Comfortable procedures</div>
                        </div>
                    </div>
                    <div class="trust-item">
                        <div class="trust-icon">💰</div>
                        <div>
                            <div class="trust-label">Affordable Pricing</div>
                            <div class="trust-sub">Transparent, no hidden costs</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══════════════════════════════════════
             DESCRIPTION + SIDEBAR
        ═══════════════════════════════════════ -->
        <section class="service-main-grid">
            <div class="container">
                <div class="row">

                    <!-- Sidebar -->
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="sidebar-services">
                            <div class="sidebar-header">
                                <h3 class="sidebar-title">Our Services</h3>
                            </div>
                            <ul class="sidebar-list">
                                <?php
                                $otherSvc = mysqli_query($conn, "SELECT * FROM `tbl_services` WHERE `status`='1' ORDER BY `sort` ASC");
                                while ($svc = mysqli_fetch_array($otherSvc)) {
                                    $active = ($svc['url'] == $bname) ? 'active' : '';
                                    echo '<li><a href="' . BASE_URL . $svc['url'] . '" class="' . $active . '">' . $svc['heading'] . '</a></li>';
                                }
                                ?>
                            </ul>
                            <div class="sidebar-contact-box">
                                <p>Need Help? Call Us</p>
                                <a class="sidebar-phone" href="tel:<?= $coninfo['con_phone1'] ?>">
                                    📞 <?= $coninfo['con_phone1'] ?>
                                </a>
                                <a class="sidebar-wa-btn"
                                    href="https://api.whatsapp.com/send?phone=<?= $coninfo['con_phone1'] ?>&text=Hello%2C+I+need+help+with+<?= urlencode($pdetailrec['heading']) ?>"
                                    target="_blank" rel="noopener">
                                    💬 WhatsApp Us
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Main Description -->
                    <div class="col-lg-8">
                        <div class="description-content">
                            <?= $pdetailrec['des'] ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ═══════════════════════════════════════
             ENQUIRY SECTION
        ═══════════════════════════════════════ -->
        <section class="enquiry-section">
            <div class="container">
                <div class="enquiry-section-title">
                    <span class="section-tag">Get In Touch</span>
                    <h2>Have a Question? We're Here to Help</h2>
                    <p>Send us a message and our team will respond within a few hours.</p>
                </div>

                <div class="enquiry-layout">
                    <!-- Info column -->
                    <div class="enquiry-info">
                        <div class="info-card">
                            <div class="info-card-icon">📍</div>
                            <div class="info-card-body">
                                <strong>Visit Our Clinic</strong>
                                <span>47, Thakur Bari Road, Opposite Zila Parishad Bhawan, Sakchi, Jamshedpur, Jharkhand
                                    831001</span>
                            </div>
                        </div>
                        <div class="info-card">
                            <div class="info-card-icon">📞</div>
                            <div class="info-card-body">
                                <strong>Call / WhatsApp</strong>
                                <span><a
                                        href="tel:<?= $coninfo['con_phone1'] ?>"><?= $coninfo['con_phone1'] ?></a></span>
                            </div>
                        </div>
                        <div class="info-card">
                            <div class="info-card-icon">⏰</div>
                            <div class="info-card-body">
                                <strong>Clinic Hours</strong>
                                <span>Mon – Sat: 9:00 AM – 8:00 PM<br>Sunday: By Appointment Only</span>
                            </div>
                        </div>
                        <div class="info-card">
                            <div class="info-card-icon">⚡</div>
                            <div class="info-card-body">
                                <strong>Emergency Care</strong>
                                <span>Emergency dental care available — call us anytime for urgent cases.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Form column -->
                    <div class="enquiry-form-wrap">
                        <span class="form-label-top">Send Quick Enquiry</span>
                        <form method="POST" action="<?= BASE_URL; ?>mail/contactMail" name="enquiryForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name *"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="tel" name="phone" class="form-control" placeholder="Phone Number *"
                                        required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address *"
                                        required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <textarea name="message" class="form-control" rows="4"
                                        placeholder="How can we help you?"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn-submit-form">
                                        📨 Send Enquiry
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══════════════════════════════════════
             BOOKING MODAL
        ═══════════════════════════════════════ -->
        <div id="bookingModal">
            <div class="modal-content">
                <div class="modal-header-bar">
                    <button class="close-modal" onclick="closeModal()" aria-label="Close">&times;</button>
                    <h3>📅 Book an Appointment</h3>
                    <p>Fill in your details to schedule your visit for <strong
                            style="color:#fff;"><?= $pdetailrec['heading'] ?></strong>.</p>
                </div>
                <div class="modal-body-pad">
                    <form method="POST" action="<?= BASE_URL; ?>mail/contactMail">
                        <div class="mb-3">
                            <label>Your Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your full name"
                                required>
                        </div>
                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Enter your phone number"
                                required>
                        </div>
                        <div class="mb-3">
                            <label>Patient Type</label>
                            <input type="hidden" name="service" value="<?= $pdetailrec['heading'] ?>">
                            <select class="form-control" name="patient">
                                <option>New Patient</option>
                                <option>Returning Patient</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                        </div>
                        <button type="submit" class="btn-modal-submit">
                            ✅ Schedule My Appointment
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <?php include 'inc/footer.php'; ?>

    </div><!-- END PAGE -->

    <?php include 'inc/footer-data.php'; ?>

    <script>
        function openModal() {
            document.getElementById('bookingModal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            document.getElementById('bookingModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        window.onclick = function (event) {
            if (event.target == document.getElementById('bookingModal')) {
                closeModal();
            }
        }
    </script>
</body>

</html>