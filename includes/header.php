<?php
/**
 * Shree Plastic Industries - Header Component
 * Fixed navigation with responsive hamburger menu
 */

// Determine if we're in a subdirectory
$isSubpage = strpos($_SERVER['SCRIPT_NAME'], '/pages/') !== false;
$basePath = $isSubpage ? '../' : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo isset($page_description) ? sanitize($page_description) : 'Shree Plastic Industries - A distinguished name in Indian plastic manufacturing since 1984. Premium quality plastic products and innovative packaging solutions.'; ?>">
    <meta name="keywords" content="plastic manufacturing, polythene bags, packaging solutions, compostable bags, Pune, Maharashtra, India">
    <meta name="author" content="Shree Plastic Industries">
    
    <!-- Google Site Verification (Webmaster Tools) - Replace with your verification code -->
    <meta name="google-site-verification" content="YOUR_GOOGLE_VERIFICATION_CODE">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo isset($page_title) ? sanitize($page_title) : SITE_NAME; ?>">
    <meta property="og:description" content="Distinguished plastic manufacturing company since 1984">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    
    <title><?php echo isset($page_title) ? sanitize($page_title) . ' | ' . SITE_NAME : SITE_NAME . ' - ' . SITE_TAGLINE; ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo $basePath; ?>assets/images/favicon.ico">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/animations.css">
    
    <?php if (isset($page_css)): ?>
    <link rel="stylesheet" href="<?php echo $basePath . $page_css; ?>">
    <?php endif; ?>
    
    <!-- Google Analytics - Replace UA-XXXXXXXXX-X with your tracking ID -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXXX-X"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-XXXXXXXXX-X');
    </script>
    
    <style>
        /* Larger logo in header */
        .main-header .logo {
            height: 85px !important;
        }
        
        @media (max-width: 991px) {
            .main-header .logo {
                height: 65px !important;
            }
        }

        /* Mobile nav must sit above WhatsApp widget (z-index: 9999) and everything else */
        .mobile-nav-overlay {
            z-index: 10000 !important;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="main-header" id="mainHeader">
        <div class="header-container">
            <!-- Logo -->
            <a href="<?php echo $basePath; ?>index.php" class="logo-link">
                <img src="<?php echo $basePath; ?>assets/images/logo.png" alt="<?php echo SITE_NAME; ?>" class="logo">
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="main-nav" id="mainNav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="<?php echo $basePath; ?>index.php" class="nav-link <?php echo isActivePage('index') ? 'active' : ''; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $basePath; ?>pages/about.php" class="nav-link <?php echo isActivePage('about') ? 'active' : ''; ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $basePath; ?>pages/businesses.php" class="nav-link <?php echo isActivePage('businesses') ? 'active' : ''; ?>">Businesses</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $basePath; ?>pages/sustainability.php" class="nav-link <?php echo isActivePage('sustainability') ? 'active' : ''; ?>">Sustainability</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $basePath; ?>pages/careers.php" class="nav-link <?php echo isActivePage('careers') ? 'active' : ''; ?>">Careers</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $basePath; ?>pages/news-certificate.php" class="nav-link <?php echo isActivePage('news-certificate') ? 'active' : ''; ?>">News and Certificate</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $basePath; ?>pages/contact.php" class="nav-link <?php echo isActivePage('contact') ? 'active' : ''; ?>">Contact Us</a>
                    </li>
                </ul>
            </nav>
            
            <!-- Mobile Menu Toggle -->
            <button class="hamburger" id="hamburgerBtn" aria-label="Toggle navigation menu" aria-expanded="false">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </header>
    
    <!-- Mobile Navigation Overlay -->
    <div class="mobile-nav-overlay" id="mobileNavOverlay">
        <nav class="mobile-nav">
            <ul class="mobile-nav-list">
                <li class="mobile-nav-item">
                    <a href="<?php echo $basePath; ?>index.php" class="mobile-nav-link <?php echo isActivePage('index') ? 'active' : ''; ?>">Home</a>
                </li>
                <li class="mobile-nav-item">
                    <a href="<?php echo $basePath; ?>pages/about.php" class="mobile-nav-link <?php echo isActivePage('about') ? 'active' : ''; ?>">About</a>
                </li>
                <li class="mobile-nav-item">
                    <a href="<?php echo $basePath; ?>pages/businesses.php" class="mobile-nav-link <?php echo isActivePage('businesses') ? 'active' : ''; ?>">Businesses</a>
                </li>
                <li class="mobile-nav-item">
                    <a href="<?php echo $basePath; ?>pages/sustainability.php" class="mobile-nav-link <?php echo isActivePage('sustainability') ? 'active' : ''; ?>">Sustainability</a>
                </li>
                <li class="mobile-nav-item">
                    <a href="<?php echo $basePath; ?>pages/careers.php" class="mobile-nav-link <?php echo isActivePage('careers') ? 'active' : ''; ?>">Careers</a>
                </li>
                <li class="mobile-nav-item">
                    <a href="<?php echo $basePath; ?>pages/news-certificate.php" class="mobile-nav-link <?php echo isActivePage('news-certificate') ? 'active' : ''; ?>">News and Certificate</a>
                </li>
                <li class="mobile-nav-item">
                    <a href="<?php echo $basePath; ?>pages/contact.php" class="mobile-nav-link <?php echo isActivePage('contact') ? 'active' : ''; ?>">Contact Us</a>
                </li>
            </ul>
        </nav>
    </div>
    
    <!-- Main Content Wrapper -->
    <main class="main-content">
