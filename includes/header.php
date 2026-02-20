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
    
    <!-- WhatsApp Floating Button Styles -->
    <style>
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 30px;
            right: 30px;
            background-color: #25D366;
            color: #FFF;
            border-radius: 50%;
            text-align: center;
            font-size: 30px;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .whatsapp-float:hover {
            background-color: #128C7E;
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
        }
        
        .whatsapp-float svg {
            width: 32px;
            height: 32px;
            fill: currentColor;
        }
        
        .whatsapp-tooltip {
            position: absolute;
            right: 70px;
            background: #1A1A1A;
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 14px;
            font-family: 'Open Sans', sans-serif;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .whatsapp-float:hover .whatsapp-tooltip {
            opacity: 1;
            visibility: visible;
        }
        
        /* Larger logo in header */
        .main-header .logo {
            height: 85px !important;
        }
        
        @media (max-width: 991px) {
            .main-header .logo {
                height: 65px !important;
            }
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
    
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/919876543210" class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
        <span class="whatsapp-tooltip">Chat with us</span>
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>
    
    <!-- Main Content Wrapper -->
    <main class="main-content">
