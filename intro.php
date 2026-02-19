<?php
/**
 * Shree Plastic Industries - Intro/Splash Page
 * Light Streak Reveal animation with auto-redirect after 5 seconds
 */

require_once 'includes/config.php';

// If user has already seen intro, redirect to home
if (hasSeenIntro()) {
    header('Location: index.php');
    exit;
}

// Mark intro as seen
markIntroAsSeen();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?> - Welcome</title>

    <!-- Preload fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            overflow: hidden;
        }

        body {
            background: linear-gradient(135deg, #1A1A1A 0%, #1C1D21 50%, #0d0d0f 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Montserrat', sans-serif;
        }

        /* ── Fade-out on exit ── */
        .intro-container {
            text-align: center;
            opacity: 1;
            transition: opacity 0.5s ease-in;
        }

        .intro-container.fade-out {
            opacity: 0;
        }

        .logo-wrapper {
            margin-bottom: 40px;
        }

        /* ═══════════════════════════════════════
           LIGHT STREAK — sweeps left to right
        ═══════════════════════════════════════ */
        .light-streak {
            position: fixed;
            top: 0;
            left: 0;
            width: 180px;
            height: 100%;
            /* Blue-white gradient core with soft fade edges */
            background: linear-gradient(
                90deg,
                transparent                    0%,
                rgba(0, 102, 204, 0.20)       20%,
                rgba(180, 215, 255, 0.95)     50%,
                rgba(0, 102, 204, 0.20)       80%,
                transparent                   100%
            );
            box-shadow: 0 0 90px 55px rgba(0, 102, 204, 0.30);
            transform: translateX(-250px);
            animation: streakMove 1.1s cubic-bezier(0.4, 0.0, 0.2, 1) 0.35s forwards;
            z-index: 10;
            pointer-events: none;
        }

        /* ═══════════════════════════════════════
           LOGO — revealed by clip-path in sync
           with the streak sweep
        ═══════════════════════════════════════ */
        .intro-logo {
            width: 1200px;
            height: auto;
            max-width: 90vw;
            /* Start fully hidden (clipped from the right) */
            clip-path: inset(0 100% 0 0);
            /* Reveal slightly behind the streak leading edge */
            animation: logoReveal 1.1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.40s forwards;
            filter: drop-shadow(0 0 30px rgba(0, 102, 204, 0.4));
        }

        /* After reveal, switch to continuous glow */
        .intro-logo.glowing {
            clip-path: inset(0 0% 0 0);
            animation: logoGlow 3s ease-in-out infinite;
        }

        /* ── Text elements ── */
        .intro-tagline {
            color: #FFFFFF;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 4px;
            text-transform: uppercase;
            opacity: 0;
            animation: fadeInUp 1s ease-out 1.65s forwards;
        }

        .intro-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
            font-weight: 400;
            letter-spacing: 2px;
            margin-top: 16px;
            opacity: 0;
            animation: fadeInUp 1s ease-out 1.95s forwards;
        }

        /* ── Progress bar ── */
        .progress-bar {
            position: fixed;
            bottom: 60px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 2px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #0066CC, #2E5090);
            width: 0;
            animation: progressFill 5s linear forwards;
        }

        /* ── Skip button ── */
        .skip-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: rgba(255, 255, 255, 0.6);
            padding: 8px 20px;
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 4px;
            opacity: 0;
            animation: fadeIn 0.5s ease-out 2s forwards;
        }

        .skip-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #FFFFFF;
            border-color: rgba(255, 255, 255, 0.5);
        }

        /* ═══════════════════════════════════════
           KEYFRAMES
        ═══════════════════════════════════════ */

        /* Streak shoots across the full viewport */
        @keyframes streakMove {
            0%   { transform: translateX(-250px); }
            100% { transform: translateX(calc(100vw + 250px)); }
        }

        /* Logo slides in from left behind the streak */
        @keyframes logoReveal {
            0%   { clip-path: inset(0 100% 0 0); }
            100% { clip-path: inset(0 0%   0 0); }
        }

        /* Continuous blue pulse glow after reveal */
        @keyframes logoGlow {
            0%, 100% { filter: drop-shadow(0 0 20px rgba(0, 102, 204, 0.3)); }
            50%       { filter: drop-shadow(0 0 45px rgba(0, 102, 204, 0.65)); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0);    }
        }

        @keyframes progressFill {
            0%   { width: 0;    }
            100% { width: 100%; }
        }

        /* ── Reduced motion ── */
        @media (prefers-reduced-motion: reduce) {
            .intro-logo,
            .intro-tagline,
            .intro-subtitle,
            .skip-btn,
            .progress-fill,
            .light-streak {
                animation: none;
                opacity: 1;
                transform: none;
                clip-path: none;
            }
            .progress-fill { width: 100%; }
            .light-streak  { display: none; }
        }

        /* ── Mobile ── */
        @media (max-width: 576px) {
            .intro-logo     { width: 90vw; }
            .intro-tagline  { font-size: 18px; letter-spacing: 2px; }
            .intro-subtitle { font-size: 12px; }
        }
    </style>
</head>
<body>

    <!-- Light streak overlay (pure CSS, no JS needed) -->
    <div class="light-streak" id="lightStreak"></div>

    <div class="intro-container" id="introContainer">
        <div class="logo-wrapper">
            <img
                src="assets/images/logo.png"
                alt="<?php echo SITE_NAME; ?>"
                class="intro-logo"
                id="introLogo"
                onerror="this.style.display='none'; document.getElementById('logoFallback').style.display='block';"
            >
            <!-- Fallback text if logo image not found -->
            <div id="logoFallback" style="display:none; color:#FFFFFF; font-size:48px; font-weight:700;">
                SPI
            </div>
        </div>

        <h1 class="intro-tagline"><?php echo SITE_TAGLINE; ?></h1>
        <p  class="intro-subtitle"><?php echo SITE_NAME;    ?></p>
    </div>

    <div class="progress-bar">
        <div class="progress-fill" id="progressFill"></div>
    </div>

    <button class="skip-btn" id="skipBtn" onclick="redirectToHome()">
        Skip Intro
    </button>

    <script>
        // Start continuous glow once streak + reveal are done (~1.55 s total)
        setTimeout(function () {
            var logo = document.getElementById('introLogo');
            if (logo) logo.classList.add('glowing');
        }, 1550);

        // Auto-redirect after 5 seconds
        var redirectTimeout = setTimeout(redirectToHome, 5000);

        function redirectToHome() {
            clearTimeout(redirectTimeout);
            document.getElementById('introContainer').classList.add('fade-out');
            setTimeout(function () {
                window.location.href = 'index.php';
            }, 500);
        }

        // Escape key shortcut
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') redirectToHome();
        });

        // Prefetch main page in background
        var link = document.createElement('link');
        link.rel  = 'prefetch';
        link.href = 'index.php';
        document.head.appendChild(link);
    </script>

</body>
</html>
