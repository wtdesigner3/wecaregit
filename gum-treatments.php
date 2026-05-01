<?php require('inc/function.php'); 

$heading = "Gum Treatments";
$metatag = "Gum Treatments in Jamshedpur | Best Periodontal Care - We Care Dental Clinic";
$metadesc = "Looking for gum treatments in Jamshedpur? We Care Dental Clinic offers professional periodontal care, laser gum surgery, and deep cleaning for healthy gums.";
$keyword = "gum treatments, periodontal care, Jamshedpur, dentist, laser gum surgery";
$image = "s-1.jpg"; // Using an existing image as placeholder
$canonical_url = BASE_URL . "gum-treatments";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'inc/head.php'; ?>
    <title><?= htmlspecialchars($metatag) ?></title>
    <meta name="description" content="<?= htmlspecialchars($metadesc) ?>" />
    <meta name="keywords" content="<?= htmlspecialchars($keyword) ?>">
    <meta name="robots" content="index, follow" />

    <link rel="canonical" href="<?= $canonical_url ?>" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= htmlspecialchars($metatag) ?>" />
    <meta property="og:description" content="<?= htmlspecialchars($metadesc) ?>" />
    <meta property="og:image" content="<?= BASE_URL; ?>uploads/services/<?= $image; ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= htmlspecialchars($metatag) ?>" />
    <meta name="twitter:description" content="<?= htmlspecialchars($metadesc) ?>" />
    <meta name="twitter:image" content="<?= BASE_URL; ?>uploads/services/<?= $image; ?>" />

    <!-- Schema.org for Dentist -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Dentist",
      "name": "We Care Dental Clinic",
      "url": "<?= $canonical_url ?>",
      "logo": "<?= BASE_URL ?>uploads/logo.png",
      "telephone": "+91-99341-07774",
      "email": "info@wecare.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Sakchi",
        "addressLocality": "Jamshedpur",
        "addressRegion": "Jharkhand",
        "postalCode": "831001",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "22.8046",
        "longitude": "86.2029"
      },
      "openingHours": "Mo-Sa 09:00-20:00",
      "description": "Best dental clinic in Jamshedpur offering expert gum disease treatment and periodontal care under Dr. Anand Pandey.",
      "founder": "Dr. Anand Pandey",
      "areaServed": "Jamshedpur, Jharkhand, India"
    }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

    <!-- PRELOADER -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>

    <div id="page">

        <?php include 'inc/header.php'; ?>

        <!-- PAGE HERO -->
        <div class="page-hero no-bg">
            <div class="page-hero-inner">
                <nav class="breadcrumb-nav">
                    <a href="<?= BASE_URL; ?>">Home</a>
                    <span class="breadcrumb-sep">›</span>
                    <a href="javascript:void(0)">Our Services</a>
                    <span class="breadcrumb-sep">›</span>
                    <span><?= $heading; ?></span>
                </nav>
                <h1><?= $heading; ?></h1>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="content-wrapper">

            <main class="service-main">
                <h2 class="service-title"><?= $heading; ?></h2>
                <div class="title-divider"></div>

                <div class="service-content">
                    <p>Gum health is the foundation of a healthy smile. At We Care Dental Clinic, we provide comprehensive periodontal treatments to help you maintain strong, disease-free gums.</p>
                    
                    <h3>What is Periodontal Disease?</h3>
                    <p>Periodontal (gum) disease is an infection of the tissues that support your teeth. It is primarily caused by plaque, a sticky film of bacteria that constantly forms on your teeth.</p>
                    
                    <h3>Our Gum Care Services</h3>
                    <ul>
                        <li><strong>Deep Cleaning (Scaling & Root Planing):</strong> Removing plaque and tartar from above and below the gum line.</li>
                        <li><strong>Laser Gum Treatment:</strong> Modern, painless procedure to treat infected gum tissue.</li>
                        <li><strong>Gingivitis Treatment:</strong> Reversing early-stage gum inflammation.</li>
                        <li><strong>Gum Grafting:</strong> Restoring receding gum lines for better aesthetics and health.</li>
                    </ul>

                    <h3>Why Choose Us for Gum Treatments?</h3>
                    <p>Our expert team led by Dr. Anand Pandey uses the latest technology to ensure your treatment is effective, comfortable, and long-lasting. We focus on both curative and preventive care to keep your smile healthy.</p>
                </div>
            </main>

            <aside class="service-sidebar">
                <div class="sidebar-card">
                    <div class="sidebar-card-title">Our Services</div>
                    <ul class="service-nav-list">
                        <li>
                            <a href="<?= BASE_URL; ?>gum-treatments" class="active">
                                Gum Treatments
                                <svg viewBox="0 0 24 24">
                                    <polyline points="9 18 15 12 9 6" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="appt-card">
                    <div class="appt-icon">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                    </div>
                    <h4>Book an Appointment</h4>
                    <p>Schedule your gum health checkup today.</p>
                    <a href="<?= BASE_URL; ?>contact" class="btn-appt">Book Now</a>
                </div>
            </aside>

        </div>

        <?php include 'inc/footer.php'; ?>

    </div>

    <?php include 'inc/footer-data.php'; ?>

    <script>
        window.addEventListener('load', () => {
            document.getElementById('loader-wrapper').classList.add('hidden');
            setTimeout(() => document.getElementById('loader-wrapper').style.display = 'none', 700);
        });
    </script>
</body>

</html>
