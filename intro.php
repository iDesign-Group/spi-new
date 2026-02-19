<?php
/**
 * Shree Plastic Industries - Intro/Splash Page
 * Logo pop-out animation with auto-redirect after 5 seconds
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
        
        .intro-container {
            text-align: center;
            opacity: 1;
            transition: opacity 0.5s ease-in;
        }
        
        .intro-container.fade-out {
            opacity: 0;
        }
        
        .logo-wrapper {
            perspective: 1000px;
            margin-bottom: 40px;
        }
        
        .intro-logo {
            width: 1200px;
            height: auto;
            max-width: 90vw;
            opacity: 0;
            animation: logoPop 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            filter: drop-shadow(0 0 30px rgba(0, 102, 204, 0.4));
        }
        
        .intro-logo.glowing {
            opacity: 1;
            animation: logoGlow 3s ease-in-out infinite;
        }
        
        .intro-tagline {
            color: #FFFFFF;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 4px;
            text-transform: uppercase;
            opacity: 0;
            animation: fadeInUp 1s ease-out 1s forwards;
        }
        
        .intro-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
            font-weight: 400;
            letter-spacing: 2px;
            margin-top: 16px;
            opacity: 0;
            animation: fadeInUp 1s ease-out 1.3s forwards;
        }
        
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
            animation: fadeIn 0.5s ease-out 1.5s forwards;
        }
        
        .skip-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #FFFFFF;
            border-color: rgba(255, 255, 255, 0.5);
        }
        
        /* Keyframes */
        @keyframes logoPop {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            60% {
                transform: scale(1.15);
                opacity: 1;
            }
            80% {
                transform: scale(0.95);
                opacity: 1;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        @keyframes logoGlow {
            0%, 100% {
                filter: drop-shadow(0 0 20px rgba(0, 102, 204, 0.3));
            }
            50% {
                filter: drop-shadow(0 0 40px rgba(0, 102, 204, 0.6));
            }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes progressFill {
            0% { width: 0; }
            100% { width: 100%; }
        }
        
        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .intro-logo,
            .intro-tagline,
            .intro-subtitle,
            .skip-btn,
            .progress-fill {
                animation: none;
                opacity: 1;
                transform: none;
            }
            
            .progress-fill {
                width: 100%;
            }
        }
        
        /* Mobile */
        @media (max-width: 576px) {
            .intro-logo {
                width: 90vw;
            }
            
            .intro-tagline {
                font-size: 18px;
                letter-spacing: 2px;
            }
            
            .intro-subtitle {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="intro-container" id="introContainer">
        <div class="logo-wrapper">
            <!-- Logo Image - replace src with actual logo -->
            <img 
                src="assets/images/logo.png" 
                alt="<?php echo SITE_NAME; ?>" 
                class="intro-logo"
                id="introLogo"
                onerror="this.style.display='none'; document.getElementById('logoFallback').style.display='block';"
            >
            <!-- Fallback text logo if image not found -->
            <div id="logoFallback" style="display: none; color: #FFFFFF; font-size: 48px; font-weight: 700;">
                SPI
            </div>
        </div>
        
        <h1 class="intro-tagline"><?php echo SITE_TAGLINE; ?></h1>
        <p class="intro-subtitle"><?php echo SITE_NAME; ?></p>
    </div>
    
    <div class="progress-bar">
        <div class="progress-fill" id="progressFill"></div>
    </div>
    
    <button class="skip-btn" id="skipBtn" onclick="redirectToHome()">
        Skip Intro
    </button>
    
    <script>
        // Add glow effect after pop animation completes
        setTimeout(function() {
            var logo = document.getElementById('introLogo');
            if (logo) {
                logo.classList.add('glowing');
            }
        }, 900);
        
        // Redirect after 5 seconds
        var redirectTimeout = setTimeout(function() {
            redirectToHome();
        }, 5000);
        
        // Redirect function
        function redirectToHome() {
            clearTimeout(redirectTimeout);
            
            var container = document.getElementById('introContainer');
            container.classList.add('fade-out');
            
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 500);
        }
        
        // Handle escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                redirectToHome();
            }
        });
        
        // Preload main page
        var link = document.createElement('link');
        link.rel = 'prefetch';
        link.href = 'index.php';
        document.head.appendChild(link);
    </script>
</body>
</html>
