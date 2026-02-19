<?php
/**
 * Shree Plastic Industries - Header Component
 * Fixed navigation + multi-language support (133 languages)
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

    <!-- Google Translate Init -->
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <style>
        /* ── WhatsApp Float ── */
        .whatsapp-float {
            position: fixed; width: 60px; height: 60px;
            bottom: 30px; right: 30px;
            background-color: #25D366; color: #FFF;
            border-radius: 50%; text-align: center; font-size: 30px;
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
            white-space: nowrap; opacity: 0; visibility: hidden; transition: all 0.3s ease;
        }
        .whatsapp-float:hover .whatsapp-tooltip { opacity: 1; visibility: visible; }
        .main-header .logo { height: 85px !important; }
        @media (max-width: 991px) { .main-header .logo { height: 65px !important; } }

        /* ══════════════════════════════════════════════════
           HIDE GOOGLE TRANSLATE DEFAULT UI
        ══════════════════════════════════════════════════ */
        #google_translate_element { display: none !important; }
        .goog-te-banner-frame,
        .goog-te-balloon-frame { display: none !important; }
        .goog-te-gadget { display: none !important; }
        .VIpgJd-ZVi9od-aZ2wEe-wOHMyf,
        .VIpgJd-ZVi9od-aZ2wEe-OiiCO { display: none !important; }
        body { top: 0 !important; }
        .goog-te-menu-frame { box-shadow: none !important; }

        /* ══════════════════════════════════════════════════
           CUSTOM LANGUAGE SELECTOR
        ══════════════════════════════════════════════════ */
        .lang-selector {
            position: relative;
            display: flex;
            align-items: center;
            margin-left: 14px;
            flex-shrink: 0;
        }
        .lang-btn {
            display: flex; align-items: center; gap: 5px;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.25);
            color: rgba(255,255,255,0.88);
            padding: 5px 11px;
            border-radius: 20px;
            font-family: 'Open Sans', sans-serif;
            font-size: 12px; font-weight: 500;
            cursor: pointer;
            transition: all 0.25s ease;
            white-space: nowrap;
            letter-spacing: 0.2px;
        }
        .lang-btn:hover, .lang-btn.open {
            background: rgba(0,102,204,0.22);
            border-color: #0066CC;
            color: #fff;
        }
        .lang-chevron { transition: transform 0.22s ease; flex-shrink: 0; }
        .lang-btn.open .lang-chevron { transform: rotate(180deg); }

        /* Dropdown panel */
        .lang-dropdown {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            width: 232px;
            background: #1A1A1A;
            border: 1px solid rgba(0,102,204,0.3);
            border-radius: 10px;
            box-shadow: 0 14px 45px rgba(0,0,0,0.65);
            display: none;
            z-index: 99999;
            overflow: hidden;
        }
        .lang-dropdown.open {
            display: block;
            animation: lgFadeIn 0.17s ease-out;
        }
        @keyframes lgFadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Search */
        .lang-search-wrap {
            padding: 9px 9px 7px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }
        .lang-search {
            width: 100%; box-sizing: border-box;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 6px;
            padding: 6px 9px 6px 28px;
            color: #fff; font-size: 12px;
            font-family: 'Open Sans', sans-serif;
            outline: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='13' height='13' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.35)' stroke-width='2.5'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cpath d='M21 21l-4.35-4.35'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: 8px center;
        }
        .lang-search::placeholder { color: rgba(255,255,255,0.32); }
        .lang-search:focus { border-color: rgba(0,102,204,0.55); background-color: rgba(255,255,255,0.09); }

        /* List */
        .lang-list {
            list-style: none; margin: 0; padding: 3px 0;
            max-height: 246px; overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #0066CC #1A1A1A;
        }
        .lang-list::-webkit-scrollbar { width: 3px; }
        .lang-list::-webkit-scrollbar-track { background: #1A1A1A; }
        .lang-list::-webkit-scrollbar-thumb { background: #0066CC; border-radius: 2px; }

        .lang-item {
            padding: 6px 13px;
            cursor: pointer;
            font-size: 12.5px;
            color: rgba(255,255,255,0.72);
            font-family: 'Open Sans', sans-serif;
            display: flex; align-items: center; gap: 8px;
            transition: background 0.12s ease, color 0.12s ease;
        }
        .lang-item:hover { background: rgba(0,102,204,0.18); color: #fff; }
        .lang-item.is-active { color: #5aadff; font-weight: 600; }
        .lang-item.is-active::after { content: '✓'; margin-left: auto; font-size: 11px; color: #5aadff; }
        .lang-flag { font-size: 14px; line-height: 1; flex-shrink: 0; }

        .lang-section-label {
            padding: 7px 13px 3px;
            font-size: 9.5px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: rgba(255,255,255,0.28);
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }
        .lang-hr { border: none; border-top: 1px solid rgba(255,255,255,0.06); margin: 3px 0; }
        .lang-no-results {
            padding: 14px; color: rgba(255,255,255,0.38);
            font-size: 12px; text-align: center;
            font-family: 'Open Sans', sans-serif;
        }

        /* Mobile language row */
        .mobile-lang-row {
            padding: 14px 24px 20px;
            border-top: 1px solid rgba(255,255,255,0.08);
            display: flex; align-items: center; gap: 10px;
        }
        .mobile-lang-label {
            color: rgba(255,255,255,0.55);
            font-size: 13px;
            font-family: 'Open Sans', sans-serif;
            white-space: nowrap;
        }
        .mobile-lang-select {
            flex: 1; background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.18);
            color: #fff; padding: 6px 10px;
            border-radius: 6px; font-size: 12px;
            font-family: 'Open Sans', sans-serif;
            outline: none; cursor: pointer;
        }
        .mobile-lang-select option { background: #1A1A1A; color: #fff; }

        @media (max-width: 991px) { .lang-selector { display: none; } }
    </style>
</head>
<body>

    <!-- Google Translate hidden widget -->
    <div id="google_translate_element" aria-hidden="true"></div>

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

            <!-- Language Selector (Desktop) -->
            <div class="lang-selector" id="langSelector">
                <button class="lang-btn" id="langBtn" onclick="toggleLangDropdown()" aria-label="Select language" aria-expanded="false">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                    <span id="currentLangName">English</span>
                    <svg class="lang-chevron" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
                <div class="lang-dropdown" id="langDropdown">
                    <div class="lang-search-wrap">
                        <input type="text" id="langSearch" class="lang-search" placeholder="Search language..." oninput="filterLangs(this.value)" autocomplete="off">
                    </div>
                    <ul class="lang-list" id="langList"></ul>
                </div>
            </div>

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
            <!-- Language selector for mobile -->
            <div class="mobile-lang-row">
                <span class="mobile-lang-label">🌐 Language:</span>
                <select class="mobile-lang-select" id="mobileLangSelect" onchange="switchLanguage(this.value, this.options[this.selectedIndex].text)">
                </select>
            </div>
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

    <!-- ═══════════════════════════════════════════════════
         LANGUAGE SWITCHER JAVASCRIPT
    ════════════════════════════════════════════════════ -->
    <script>
    (function(){

        /* ── Popular languages shown at top ── */
        var POPULAR = [
            {c:'en',  n:'English',             f:'🇬🇧'},
            {c:'hi',  n:'Hindi',               f:'🇮🇳'},
            {c:'mr',  n:'Marathi',             f:'🇮🇳'},
            {c:'gu',  n:'Gujarati',            f:'🇮🇳'},
            {c:'bn',  n:'Bengali',             f:'🇧🇩'},
            {c:'ta',  n:'Tamil',               f:'🇮🇳'},
            {c:'te',  n:'Telugu',              f:'🇮🇳'},
            {c:'kn',  n:'Kannada',             f:'🇮🇳'},
            {c:'pa',  n:'Punjabi',             f:'🇮🇳'},
            {c:'ur',  n:'Urdu',                f:'🇵🇰'},
            {c:'ar',  n:'Arabic',              f:'🇸🇦'},
            {c:'zh-CN',n:'Chinese (Simplified)',f:'🇨🇳'},
            {c:'fr',  n:'French',              f:'🇫🇷'},
            {c:'de',  n:'German',              f:'🇩🇪'},
            {c:'es',  n:'Spanish',             f:'🇪🇸'},
            {c:'ja',  n:'Japanese',            f:'🇯🇵'},
            {c:'ru',  n:'Russian',             f:'🇷🇺'}
        ];

        /* ── All 133 languages (A-Z after popular) ── */
        var ALL = [
            {c:'af',n:'Afrikaans',f:'🇿🇦'},{c:'sq',n:'Albanian',f:'🇦🇱'},{c:'am',n:'Amharic',f:'🇪🇹'},
            {c:'ar',n:'Arabic',f:'🇸🇦'},{c:'hy',n:'Armenian',f:'🇦🇲'},{c:'as',n:'Assamese',f:'🇮🇳'},
            {c:'ay',n:'Aymara',f:'🇧🇴'},{c:'az',n:'Azerbaijani',f:'🇦🇿'},{c:'bm',n:'Bambara',f:'🇲🇱'},
            {c:'eu',n:'Basque',f:'🇪🇸'},{c:'be',n:'Belarusian',f:'🇧🇾'},{c:'bn',n:'Bengali',f:'🇧🇩'},
            {c:'bho',n:'Bhojpuri',f:'🇮🇳'},{c:'bs',n:'Bosnian',f:'🇧🇦'},{c:'bg',n:'Bulgarian',f:'🇧🇬'},
            {c:'ca',n:'Catalan',f:'🇪🇸'},{c:'ceb',n:'Cebuano',f:'🇵🇭'},{c:'ny',n:'Chichewa',f:'🇲🇼'},
            {c:'zh-CN',n:'Chinese (Simplified)',f:'🇨🇳'},{c:'zh-TW',n:'Chinese (Traditional)',f:'🇹🇼'},
            {c:'co',n:'Corsican',f:'🇫🇷'},{c:'hr',n:'Croatian',f:'🇭🇷'},{c:'cs',n:'Czech',f:'🇨🇿'},
            {c:'da',n:'Danish',f:'🇩🇰'},{c:'dv',n:'Dhivehi',f:'🇲🇻'},{c:'doi',n:'Dogri',f:'🇮🇳'},
            {c:'nl',n:'Dutch',f:'🇳🇱'},{c:'en',n:'English',f:'🇬🇧'},{c:'eo',n:'Esperanto',f:'🌍'},
            {c:'et',n:'Estonian',f:'🇪🇪'},{c:'ee',n:'Ewe',f:'🇬🇭'},{c:'tl',n:'Filipino',f:'🇵🇭'},
            {c:'fi',n:'Finnish',f:'🇫🇮'},{c:'fr',n:'French',f:'🇫🇷'},{c:'fy',n:'Frisian',f:'🇳🇱'},
            {c:'gl',n:'Galician',f:'🇪🇸'},{c:'ka',n:'Georgian',f:'🇬🇪'},{c:'de',n:'German',f:'🇩🇪'},
            {c:'el',n:'Greek',f:'🇬🇷'},{c:'gn',n:'Guarani',f:'🇵🇾'},{c:'gu',n:'Gujarati',f:'🇮🇳'},
            {c:'ht',n:'Haitian Creole',f:'🇭🇹'},{c:'ha',n:'Hausa',f:'🇳🇬'},{c:'haw',n:'Hawaiian',f:'🇺🇸'},
            {c:'iw',n:'Hebrew',f:'🇮🇱'},{c:'hi',n:'Hindi',f:'🇮🇳'},{c:'hmn',n:'Hmong',f:'🇱🇦'},
            {c:'hu',n:'Hungarian',f:'🇭🇺'},{c:'is',n:'Icelandic',f:'🇮🇸'},{c:'ig',n:'Igbo',f:'🇳🇬'},
            {c:'ilo',n:'Ilocano',f:'🇵🇭'},{c:'id',n:'Indonesian',f:'🇮🇩'},{c:'ga',n:'Irish',f:'🇮🇪'},
            {c:'it',n:'Italian',f:'🇮🇹'},{c:'ja',n:'Japanese',f:'🇯🇵'},{c:'jw',n:'Javanese',f:'🇮🇩'},
            {c:'kn',n:'Kannada',f:'🇮🇳'},{c:'kk',n:'Kazakh',f:'🇰🇿'},{c:'km',n:'Khmer',f:'🇰🇭'},
            {c:'rw',n:'Kinyarwanda',f:'🇷🇼'},{c:'gom',n:'Konkani',f:'🇮🇳'},{c:'ko',n:'Korean',f:'🇰🇷'},
            {c:'kri',n:'Krio',f:'🇸🇱'},{c:'ku',n:'Kurdish (Kurmanji)',f:'🏴'},{c:'ckb',n:'Kurdish (Sorani)',f:'🏴'},
            {c:'ky',n:'Kyrgyz',f:'🇰🇬'},{c:'lo',n:'Lao',f:'🇱🇦'},{c:'la',n:'Latin',f:'🏛️'},
            {c:'lv',n:'Latvian',f:'🇱🇻'},{c:'ln',n:'Lingala',f:'🇨🇩'},{c:'lt',n:'Lithuanian',f:'🇱🇹'},
            {c:'lg',n:'Luganda',f:'🇺🇬'},{c:'lb',n:'Luxembourgish',f:'🇱🇺'},{c:'mk',n:'Macedonian',f:'🇲🇰'},
            {c:'mai',n:'Maithili',f:'🇮🇳'},{c:'mg',n:'Malagasy',f:'🇲🇬'},{c:'ms',n:'Malay',f:'🇲🇾'},
            {c:'ml',n:'Malayalam',f:'🇮🇳'},{c:'mt',n:'Maltese',f:'🇲🇹'},{c:'mi',n:'Maori',f:'🇳🇿'},
            {c:'mr',n:'Marathi',f:'🇮🇳'},{c:'mni-Mtei',n:'Meitei (Manipuri)',f:'🇮🇳'},{c:'lus',n:'Mizo',f:'🇮🇳'},
            {c:'mn',n:'Mongolian',f:'🇲🇳'},{c:'my',n:'Myanmar (Burmese)',f:'🇲🇲'},{c:'ne',n:'Nepali',f:'🇳🇵'},
            {c:'no',n:'Norwegian',f:'🇳🇴'},{c:'or',n:'Odia (Oriya)',f:'🇮🇳'},{c:'om',n:'Oromo',f:'🇪🇹'},
            {c:'ps',n:'Pashto',f:'🇦🇫'},{c:'fa',n:'Persian',f:'🇮🇷'},{c:'pl',n:'Polish',f:'🇵🇱'},
            {c:'pt',n:'Portuguese',f:'🇵🇹'},{c:'pa',n:'Punjabi',f:'🇮🇳'},{c:'qu',n:'Quechua',f:'🇵🇪'},
            {c:'ro',n:'Romanian',f:'🇷🇴'},{c:'ru',n:'Russian',f:'🇷🇺'},{c:'sm',n:'Samoan',f:'🇼🇸'},
            {c:'sa',n:'Sanskrit',f:'🇮🇳'},{c:'gd',n:'Scots Gaelic',f:'🏴'},{c:'nso',n:'Sepedi',f:'🇿🇦'},
            {c:'sr',n:'Serbian',f:'🇷🇸'},{c:'st',n:'Sesotho',f:'🇱🇸'},{c:'sn',n:'Shona',f:'🇿🇼'},
            {c:'sd',n:'Sindhi',f:'🇵🇰'},{c:'si',n:'Sinhala',f:'🇱🇰'},{c:'sk',n:'Slovak',f:'🇸🇰'},
            {c:'sl',n:'Slovenian',f:'🇸🇮'},{c:'so',n:'Somali',f:'🇸🇴'},{c:'es',n:'Spanish',f:'🇪🇸'},
            {c:'su',n:'Sundanese',f:'🇮🇩'},{c:'sw',n:'Swahili',f:'🇰🇪'},{c:'sv',n:'Swedish',f:'🇸🇪'},
            {c:'tg',n:'Tajik',f:'🇹🇯'},{c:'ta',n:'Tamil',f:'🇮🇳'},{c:'tt',n:'Tatar',f:'🇷🇺'},
            {c:'te',n:'Telugu',f:'🇮🇳'},{c:'th',n:'Thai',f:'🇹🇭'},{c:'ti',n:'Tigrinya',f:'🇪🇷'},
            {c:'ts',n:'Tsonga',f:'🇿🇦'},{c:'tr',n:'Turkish',f:'🇹🇷'},{c:'tk',n:'Turkmen',f:'🇹🇲'},
            {c:'ak',n:'Twi',f:'🇬🇭'},{c:'uk',n:'Ukrainian',f:'🇺🇦'},{c:'ur',n:'Urdu',f:'🇵🇰'},
            {c:'ug',n:'Uyghur',f:'🇨🇳'},{c:'uz',n:'Uzbek',f:'🇺🇿'},{c:'vi',n:'Vietnamese',f:'🇻🇳'},
            {c:'cy',n:'Welsh',f:'🏴'},{c:'xh',n:'Xhosa',f:'🇿🇦'},{c:'yi',n:'Yiddish',f:'🇮🇱'},
            {c:'yo',n:'Yoruba',f:'🇳🇬'},{c:'zu',n:'Zulu',f:'🇿🇦'}
        ];

        /* current active lang code */
        var activeLang = localStorage.getItem('spi_lang') || 'en';
        var activeName = localStorage.getItem('spi_lang_name') || 'English';

        /* ── Switch language ── */
        window.switchLanguage = function(code, name) {
            var exp = new Date();
            exp.setFullYear(exp.getFullYear() + 1);
            var es = exp.toUTCString();
            if (code === 'en') {
                document.cookie = 'googtrans=; Max-Age=0; path=/';
                document.cookie = 'googtrans=; Max-Age=0; path=/; domain=.' + location.hostname;
            } else {
                document.cookie = 'googtrans=/en/' + code + '; expires=' + es + '; path=/';
                document.cookie = 'googtrans=/en/' + code + '; expires=' + es + '; path=/; domain=.' + location.hostname;
            }
            localStorage.setItem('spi_lang', code);
            localStorage.setItem('spi_lang_name', name);
            location.reload();
        };

        /* ── Build desktop list ── */
        function buildList(langs, showSections) {
            var ul = document.getElementById('langList');
            if (!ul) return;
            ul.innerHTML = '';
            if (!langs.length) {
                ul.innerHTML = '<li class="lang-no-results">No language found</li>';
                return;
            }
            if (showSections) {
                /* Popular section */
                var lbl1 = document.createElement('li');
                lbl1.className = 'lang-section-label'; lbl1.textContent = '★ Popular';
                ul.appendChild(lbl1);
                POPULAR.forEach(function(l){ ul.appendChild(makeItem(l)); });
                var hr = document.createElement('li');
                hr.innerHTML = '<hr class="lang-hr">';
                ul.appendChild(hr);
                var lbl2 = document.createElement('li');
                lbl2.className = 'lang-section-label'; lbl2.textContent = 'All Languages';
                ul.appendChild(lbl2);
                /* All A-Z, skipping ones already in popular */
                var popCodes = POPULAR.map(function(x){ return x.c; });
                ALL.forEach(function(l){
                    if (!popCodes.includes(l.c)) ul.appendChild(makeItem(l));
                });
            } else {
                langs.forEach(function(l){ ul.appendChild(makeItem(l)); });
            }
        }

        function makeItem(l) {
            var li = document.createElement('li');
            li.className = 'lang-item' + (l.c === activeLang ? ' is-active' : '');
            li.innerHTML = '<span class="lang-flag">' + l.f + '</span>' + l.n;
            li.onclick = function(){ switchLanguage(l.c, l.n); };
            return li;
        }

        /* ── Filter on search ── */
        window.filterLangs = function(q) {
            q = q.trim().toLowerCase();
            if (!q) { buildList([], true); return; }
            var res = ALL.filter(function(l){ return l.n.toLowerCase().includes(q); });
            buildList(res, false);
        };

        /* ── Toggle dropdown ── */
        window.toggleLangDropdown = function() {
            var btn = document.getElementById('langBtn');
            var dd  = document.getElementById('langDropdown');
            var inp = document.getElementById('langSearch');
            var isOpen = dd.classList.contains('open');
            if (isOpen) {
                dd.classList.remove('open');
                btn.classList.remove('open');
                btn.setAttribute('aria-expanded','false');
            } else {
                dd.classList.add('open');
                btn.classList.add('open');
                btn.setAttribute('aria-expanded','true');
                if (inp) { inp.value = ''; filterLangs(''); inp.focus(); }
            }
        };

        /* Close on outside click */
        document.addEventListener('click', function(e){
            var sel = document.getElementById('langSelector');
            if (sel && !sel.contains(e.target)) {
                var dd  = document.getElementById('langDropdown');
                var btn = document.getElementById('langBtn');
                if (dd)  dd.classList.remove('open');
                if (btn) { btn.classList.remove('open'); btn.setAttribute('aria-expanded','false'); }
            }
        });

        /* ── Init on DOM ready ── */
        document.addEventListener('DOMContentLoaded', function(){
            /* Update button label */
            var el = document.getElementById('currentLangName');
            if (el) el.textContent = activeName;

            /* Build desktop list */
            buildList([], true);

            /* Build mobile select */
            var ms = document.getElementById('mobileLangSelect');
            if (ms) {
                ALL.forEach(function(l){
                    var opt = document.createElement('option');
                    opt.value = l.c; opt.textContent = l.f + ' ' + l.n;
                    if (l.c === activeLang) opt.selected = true;
                    ms.appendChild(opt);
                });
            }
        });

    })();
    </script>
