<?php
/**
 * Shree Plastic Industries - Header Component
 * Fixed navigation + Auto Language Detection (browser-based)
 */

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
    <meta name="google-site-verification" content="YOUR_GOOGLE_VERIFICATION_CODE">
    <meta property="og:title" content="<?php echo isset($page_title) ? sanitize($page_title) : SITE_NAME; ?>">
    <meta property="og:description" content="Distinguished plastic manufacturing company since 1984">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    <title><?php echo isset($page_title) ? sanitize($page_title) . ' | ' . SITE_NAME : SITE_NAME . ' - ' . SITE_TAGLINE; ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo $basePath; ?>assets/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/animations.css">
    <?php if (isset($page_css)): ?>
    <link rel="stylesheet" href="<?php echo $basePath . $page_css; ?>">
    <?php endif; ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXXX-X"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-XXXXXXXXX-X');
    </script>

    <!-- Google Translate (silent init) -->
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en', autoDisplay: false }, 'google_translate_element');
        }
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <style>
        /* ───────────────── WhatsApp Float ───────────────── */
        .whatsapp-float {
            position: fixed; width: 60px; height: 60px;
            bottom: 30px; right: 30px;
            background-color: #25D366; color: #FFF;
            border-radius: 50%; text-align: center;
            box-shadow: 0 4px 15px rgba(37,211,102,0.4);
            z-index: 9999; display: flex; align-items: center;
            justify-content: center; transition: all 0.3s ease;
            text-decoration: none;
        }
        .whatsapp-float:hover { background-color: #128C7E; transform: scale(1.1); box-shadow: 0 6px 20px rgba(37,211,102,0.6); }
        .whatsapp-float svg { width: 32px; height: 32px; fill: currentColor; }
        .whatsapp-tooltip {
            position: absolute; right: 70px;
            background: #1A1A1A; color: #fff;
            padding: 8px 16px; border-radius: 4px;
            font-size: 14px; font-family: 'Open Sans', sans-serif;
            white-space: nowrap; opacity: 0; visibility: hidden;
            transition: all 0.3s ease;
        }
        .whatsapp-float:hover .whatsapp-tooltip { opacity: 1; visibility: visible; }
        .main-header .logo { height: 85px !important; }
        @media (max-width: 991px) { .main-header .logo { height: 65px !important; } }

        /* ──────────── Hide Google Translate default UI ──────────── */
        #google_translate_element { display: none !important; }
        .goog-te-banner-frame,
        .goog-te-balloon-frame,
        .goog-te-gadget { display: none !important; }
        .VIpgJd-ZVi9od-aZ2wEe-wOHMyf,
        .VIpgJd-ZVi9od-aZ2wEe-OiiCO { display: none !important; }
        body { top: 0 !important; }

        /* ──────────── Auto-Language Notification Bar ──────────── */
        .spi-lang-bar {
            display: none;
            position: fixed;
            top: 85px; left: 0; right: 0;
            z-index: 9998;
            background: linear-gradient(90deg, #003580 0%, #0055b3 100%);
            padding: 8px 50px 8px 20px;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-family: 'Open Sans', sans-serif;
            font-size: 13px;
            color: rgba(255,255,255,0.88);
            box-shadow: 0 3px 16px rgba(0,0,0,0.25);
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .spi-lang-bar.spi-show {
            display: flex;
            animation: spiBarSlide 0.3s ease-out;
        }
        .spi-lang-bar.spi-hide {
            animation: spiBarHide 0.2s ease-in forwards;
        }
        @keyframes spiBarSlide {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes spiBarHide {
            from { opacity: 1; transform: translateY(0); }
            to   { opacity: 0; transform: translateY(-10px); }
        }
        .spi-bar-icon { font-size: 15px; }
        .spi-bar-lang-name { font-weight: 600; color: #fff; }
        .spi-bar-sep { opacity: 0.4; }
        .spi-bar-en-btn {
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.38);
            color: #fff; padding: 3px 14px;
            border-radius: 12px; font-size: 12px;
            font-family: 'Open Sans', sans-serif;
            cursor: pointer; transition: background 0.2s ease;
            white-space: nowrap;
        }
        .spi-bar-en-btn:hover { background: rgba(255,255,255,0.26); }
        .spi-bar-close {
            position: absolute; right: 14px;
            background: none; border: none;
            color: rgba(255,255,255,0.5);
            font-size: 17px; line-height: 1;
            cursor: pointer; padding: 0 4px;
            transition: color 0.2s ease;
        }
        .spi-bar-close:hover { color: #fff; }
        @media (max-width: 991px) {
            .spi-lang-bar { top: 65px; font-size: 12px; gap: 7px; }
            .spi-bar-en-btn { padding: 2px 10px; font-size: 11px; }
        }
        @media (max-width: 480px) {
            .spi-lang-bar { flex-wrap: wrap; padding: 8px 40px 8px 14px; justify-content: flex-start; }
        }
    </style>
</head>
<body>

    <!-- Google Translate hidden widget -->
    <div id="google_translate_element" aria-hidden="true"></div>

    <!-- Auto Language Notification Bar -->
    <div id="spiLangBar" class="spi-lang-bar" role="status" aria-live="polite">
        <span class="spi-bar-icon">&#127760;</span>
        <span>Page auto-translated to&nbsp;<span id="spiLangName" class="spi-bar-lang-name"></span></span>
        <span class="spi-bar-sep">&mdash;</span>
        <button class="spi-bar-en-btn" onclick="spiViewEnglish()">View in English</button>
        <button class="spi-bar-close" onclick="spiDismissBar()" aria-label="Dismiss">&times;</button>
    </div>

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
                    <li class="nav-item"><a href="<?php echo $basePath; ?>index.php" class="nav-link <?php echo isActivePage('index') ? 'active' : ''; ?>">Home</a></li>
                    <li class="nav-item"><a href="<?php echo $basePath; ?>pages/about.php" class="nav-link <?php echo isActivePage('about') ? 'active' : ''; ?>">About</a></li>
                    <li class="nav-item"><a href="<?php echo $basePath; ?>pages/businesses.php" class="nav-link <?php echo isActivePage('businesses') ? 'active' : ''; ?>">Businesses</a></li>
                    <li class="nav-item"><a href="<?php echo $basePath; ?>pages/sustainability.php" class="nav-link <?php echo isActivePage('sustainability') ? 'active' : ''; ?>">Sustainability</a></li>
                    <li class="nav-item"><a href="<?php echo $basePath; ?>pages/careers.php" class="nav-link <?php echo isActivePage('careers') ? 'active' : ''; ?>">Careers</a></li>
                    <li class="nav-item"><a href="<?php echo $basePath; ?>pages/news-media.php" class="nav-link <?php echo isActivePage('news-media') ? 'active' : ''; ?>">News and Media</a></li>
                    <li class="nav-item"><a href="<?php echo $basePath; ?>pages/contact.php" class="nav-link <?php echo isActivePage('contact') ? 'active' : ''; ?>">Contact Us</a></li>
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
                <li class="mobile-nav-item"><a href="<?php echo $basePath; ?>index.php" class="mobile-nav-link <?php echo isActivePage('index') ? 'active' : ''; ?>">Home</a></li>
                <li class="mobile-nav-item"><a href="<?php echo $basePath; ?>pages/about.php" class="mobile-nav-link <?php echo isActivePage('about') ? 'active' : ''; ?>">About</a></li>
                <li class="mobile-nav-item"><a href="<?php echo $basePath; ?>pages/businesses.php" class="mobile-nav-link <?php echo isActivePage('businesses') ? 'active' : ''; ?>">Businesses</a></li>
                <li class="mobile-nav-item"><a href="<?php echo $basePath; ?>pages/sustainability.php" class="mobile-nav-link <?php echo isActivePage('sustainability') ? 'active' : ''; ?>">Sustainability</a></li>
                <li class="mobile-nav-item"><a href="<?php echo $basePath; ?>pages/careers.php" class="mobile-nav-link <?php echo isActivePage('careers') ? 'active' : ''; ?>">Careers</a></li>
                <li class="mobile-nav-item"><a href="<?php echo $basePath; ?>pages/news-media.php" class="mobile-nav-link <?php echo isActivePage('news-media') ? 'active' : ''; ?>">News and Media</a></li>
                <li class="mobile-nav-item"><a href="<?php echo $basePath; ?>pages/contact.php" class="mobile-nav-link <?php echo isActivePage('contact') ? 'active' : ''; ?>">Contact Us</a></li>
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

<!-- =====================================================
     AUTO LANGUAGE DETECTION SCRIPT
     - Reads browser language on first visit
     - Auto-translates via Google Translate cookie
     - Shows slim bar: "Translated to X | View in English"
     - Saves preference so it never nags again
====================================================== -->
<script>
(function () {

    /* ── Browser code → Google Translate code + display name ── */
    var LM = {
        'hi':{c:'hi',n:'Hindi'},        'mr':{c:'mr',n:'Marathi'},
        'gu':{c:'gu',n:'Gujarati'},     'bn':{c:'bn',n:'Bengali'},
        'ta':{c:'ta',n:'Tamil'},        'te':{c:'te',n:'Telugu'},
        'kn':{c:'kn',n:'Kannada'},      'pa':{c:'pa',n:'Punjabi'},
        'ml':{c:'ml',n:'Malayalam'},    'or':{c:'or',n:'Odia'},
        'as':{c:'as',n:'Assamese'},     'ur':{c:'ur',n:'Urdu'},
        'ar':{c:'ar',n:'Arabic'},       'zh':{c:'zh-CN',n:'Chinese'},
        'fr':{c:'fr',n:'French'},       'de':{c:'de',n:'German'},
        'es':{c:'es',n:'Spanish'},      'ja':{c:'ja',n:'Japanese'},
        'ko':{c:'ko',n:'Korean'},       'ru':{c:'ru',n:'Russian'},
        'pt':{c:'pt',n:'Portuguese'},   'it':{c:'it',n:'Italian'},
        'nl':{c:'nl',n:'Dutch'},        'tr':{c:'tr',n:'Turkish'},
        'vi':{c:'vi',n:'Vietnamese'},   'th':{c:'th',n:'Thai'},
        'pl':{c:'pl',n:'Polish'},       'uk':{c:'uk',n:'Ukrainian'},
        'id':{c:'id',n:'Indonesian'},   'ms':{c:'ms',n:'Malay'},
        'fa':{c:'fa',n:'Persian'},      'he':{c:'iw',n:'Hebrew'},
        'sv':{c:'sv',n:'Swedish'},      'da':{c:'da',n:'Danish'},
        'fi':{c:'fi',n:'Finnish'},      'no':{c:'no',n:'Norwegian'},
        'cs':{c:'cs',n:'Czech'},        'sk':{c:'sk',n:'Slovak'},
        'hu':{c:'hu',n:'Hungarian'},    'ro':{c:'ro',n:'Romanian'},
        'bg':{c:'bg',n:'Bulgarian'},    'hr':{c:'hr',n:'Croatian'},
        'sr':{c:'sr',n:'Serbian'},      'lt':{c:'lt',n:'Lithuanian'},
        'lv':{c:'lv',n:'Latvian'},      'et':{c:'et',n:'Estonian'},
        'el':{c:'el',n:'Greek'},        'af':{c:'af',n:'Afrikaans'},
        'sw':{c:'sw',n:'Swahili'},      'am':{c:'am',n:'Amharic'},
        'sq':{c:'sq',n:'Albanian'},     'az':{c:'az',n:'Azerbaijani'},
        'be':{c:'be',n:'Belarusian'},   'hy':{c:'hy',n:'Armenian'},
        'ka':{c:'ka',n:'Georgian'},     'is':{c:'is',n:'Icelandic'},
        'ne':{c:'ne',n:'Nepali'},       'si':{c:'si',n:'Sinhala'},
        'km':{c:'km',n:'Khmer'},        'my':{c:'my',n:'Myanmar'},
        'tl':{c:'tl',n:'Filipino'},     'uz':{c:'uz',n:'Uzbek'},
        'kk':{c:'kk',n:'Kazakh'},       'mn':{c:'mn',n:'Mongolian'},
        'mt':{c:'mt',n:'Maltese'},      'ga':{c:'ga',n:'Irish'},
        'cy':{c:'cy',n:'Welsh'},        'eu':{c:'eu',n:'Basque'},
        'gl':{c:'gl',n:'Galician'},     'so':{c:'so',n:'Somali'},
        'zu':{c:'zu',n:'Zulu'},         'yo':{c:'yo',n:'Yoruba'},
        'ha':{c:'ha',n:'Hausa'},        'rw':{c:'rw',n:'Kinyarwanda'}
    };

    /* ── Helpers ── */
    function getCookie(n) {
        var r = document.cookie.match('(^|;)\\s*' + n + '\\s*=\\s*([^;]+)');
        return r ? r[2] : '';
    }
    function setGoogTrans(code) {
        var exp = new Date();
        exp.setFullYear(exp.getFullYear() + 1);
        var e = exp.toUTCString();
        document.cookie = 'googtrans=/en/' + code + '; expires=' + e + '; path=/';
        document.cookie = 'googtrans=/en/' + code + '; expires=' + e + '; path=/; domain=.' + location.hostname;
    }
    function clearGoogTrans() {
        document.cookie = 'googtrans=; Max-Age=0; path=/';
        document.cookie = 'googtrans=; Max-Age=0; path=/; domain=.' + location.hostname;
    }
    function showBar(name) {
        var bar = document.getElementById('spiLangBar');
        var nm  = document.getElementById('spiLangName');
        if (!bar || !nm) return;
        nm.textContent = name;
        bar.classList.add('spi-show');
    }

    /* ── Public: "View in English" button ── */
    window.spiViewEnglish = function () {
        localStorage.setItem('spi_lpref', 'en');
        clearGoogTrans();
        location.reload();
    };

    /* ── Public: Dismiss bar (keep translation, just hide bar) ── */
    window.spiDismissBar = function () {
        var bar = document.getElementById('spiLangBar');
        if (!bar) return;
        bar.classList.add('spi-hide');
        setTimeout(function () {
            bar.classList.remove('spi-show', 'spi-hide');
        }, 220);
        sessionStorage.setItem('spi_bar_dismissed', '1');
    };

    /* ── Main logic (runs after DOM ready) ── */
    document.addEventListener('DOMContentLoaded', function () {

        /* If user previously chose English — clear any translation and stop */
        if (localStorage.getItem('spi_lpref') === 'en') {
            clearGoogTrans();
            return;
        }

        var cookie = getCookie('googtrans');

        /* Translation already active (cookie exists from a previous visit/detection) */
        if (cookie && cookie.length > 5 && cookie !== '/en/en') {
            var activeCode = cookie.split('/')[2];
            if (activeCode && activeCode !== 'en') {
                /* Show bar unless user already dismissed it this session */
                if (!sessionStorage.getItem('spi_bar_dismissed')) {
                    var savedName = localStorage.getItem('spi_lname');
                    if (!savedName) {
                        /* Reverse lookup name from code */
                        for (var k in LM) {
                            if (LM[k].c === activeCode) { savedName = LM[k].n; break; }
                        }
                    }
                    showBar(savedName || activeCode);
                }
            }
            return;
        }

        /* ── First visit: detect browser language ── */
        var bl = (navigator.language || navigator.userLanguage || 'en')
                    .toLowerCase().split('-')[0];

        /* Already English — nothing to do */
        if (bl === 'en') return;

        /* Look up in our map */
        var match = LM[bl];
        if (!match) return; /* Unsupported language — keep English */

        /* Apply translation and reload */
        localStorage.setItem('spi_lname', match.n);
        setGoogTrans(match.c);
        location.reload();
    });

}());
</script>
