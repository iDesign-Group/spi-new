    </main>
    <!-- End Main Content -->
    
    <!-- Footer -->
    <footer class="main-footer">
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Company Info -->
                <div class="footer-section footer-about">
                    <a href="<?php echo $basePath; ?>index.php" class="footer-logo-link">
                        <img src="<?php echo $basePath; ?>assets/images/logo-white.png" alt="<?php echo SITE_NAME; ?>" class="footer-logo">
                    </a>
                    <p class="footer-tagline">"Believe in Yourself"</p>
                    <p class="footer-description">
                        Shree Plastic Industries, distinguished name in Indian plastic manufacturing since <?php echo SITE_ESTABLISHED; ?>. 
                        Delivering premium-quality plastic products and innovative packaging solutions.
                    </p>
                </div>
                
                <!-- Quick Links -->
                <div class="footer-section footer-links">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-nav">
                        <li><a href="<?php echo $basePath; ?>index.php">About Us</a></li>
                        <li><a href="<?php echo $basePath; ?>pages/history.php">Our History</a></li>
                        <li><a href="<?php echo $basePath; ?>pages/businesses.php">Businesses</a></li>
                        <li><a href="<?php echo $basePath; ?>pages/sustainability.php">Sustainability</a></li>
                        <li><a href="<?php echo $basePath; ?>pages/careers.php">Careers</a></li>
                        <li><a href="<?php echo $basePath; ?>pages/news-media.php">News & Media</a></li>
                    </ul>
                </div>
                
                <!-- Our Products -->
                <div class="footer-section footer-products">
                    <h4 class="footer-heading">Our Products</h4>
                    <ul class="footer-nav">
                        <li><a href="<?php echo $basePath; ?>pages/businesses.php">Polythene Bags & Rolls</a></li>
                        <li><a href="<?php echo $basePath; ?>pages/businesses.php">VCL Bags</a></li>
                        <li><a href="<?php echo $basePath; ?>pages/businesses.php">Compostable Bags</a></li>
                        <li><a href="<?php echo $basePath; ?>pages/businesses.php">Printed Shopping Bags</a></li>
                        <li><a href="<?php echo $basePath; ?>pages/businesses.php">Pouches</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="footer-section footer-contact">
                    <h4 class="footer-heading">Contact Us</h4>
                    <address class="contact-info">
                        <div class="contact-item">
                            <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span><?php echo SITE_LOCATION; ?></span>
                        </div>
                        <div class="contact-item">
                            <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <a href="mailto:<?php echo CONTACT_EMAIL; ?>"><?php echo CONTACT_EMAIL; ?></a>
                        </div>
                        <div class="contact-item">
                            <svg class="contact-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <a href="tel:<?php echo str_replace(['-', ' '], '', CONTACT_PHONE); ?>"><?php echo CONTACT_PHONE; ?></a>
                        </div>
                    </address>
                </div>
            </div>
            
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p class="copyright">
                        &copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.
                    </p>
                    <p class="footer-credits">
                        Established <?php echo SITE_ESTABLISHED; ?> | Pune, Maharashtra
                    </p>
                    <p class="footer-developer-credit">
                        Managed, Developed and Designed by <a href="https://www.idesigngroup.co.in/" target="_blank" rel="noopener noreferrer" class="idesign-link">iDesign</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- ==========================================
         WhatsApp Chat Widget
         ========================================== -->
    <?php
        $wa_number = defined('WHATSAPP_NUMBER') ? WHATSAPP_NUMBER : (defined('CONTACT_PHONE') ? preg_replace('/[^0-9]/', '', CONTACT_PHONE) : '');
        $wa_number = preg_replace('/[^0-9]/', '', $wa_number);
        // Ensure country code — prepend 91 if 10 digits (Indian number)
        if (strlen($wa_number) === 10) { $wa_number = '91' . $wa_number; }
    ?>
    <style>
        /* ── WhatsApp Widget ── */
        .wa-widget {
            position: fixed;
            bottom: 28px;
            right: 28px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 12px;
            font-family: 'Open Sans', sans-serif;
        }

        /* Chat popup box */
        .wa-popup {
            width: 320px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
            overflow: hidden;
            transform: scale(0.85) translateY(20px);
            transform-origin: bottom right;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .wa-popup.wa-open {
            transform: scale(1) translateY(0);
            opacity: 1;
            pointer-events: all;
        }

        /* Popup header */
        .wa-popup-header {
            background: #25D366;
            padding: 16px 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
        }

        .wa-popup-avatar {
            width: 44px;
            height: 44px;
            background: rgba(255,255,255,0.25);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .wa-popup-avatar svg {
            width: 26px;
            height: 26px;
            fill: #fff;
        }

        .wa-popup-info {
            flex: 1;
        }

        .wa-popup-name {
            font-weight: 700;
            font-size: 15px;
            color: #fff;
            margin: 0 0 2px;
            line-height: 1.2;
        }

        .wa-popup-status {
            font-size: 12px;
            color: rgba(255,255,255,0.85);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .wa-popup-status::before {
            content: '';
            width: 7px;
            height: 7px;
            background: #fff;
            border-radius: 50%;
            display: inline-block;
        }

        .wa-popup-close {
            background: none;
            border: none;
            cursor: pointer;
            color: rgba(255,255,255,0.85);
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background 0.2s;
        }

        .wa-popup-close:hover {
            background: rgba(255,255,255,0.2);
            color: #fff;
        }

        .wa-popup-close svg {
            width: 18px;
            height: 18px;
        }

        /* Chat body */
        .wa-popup-body {
            background: #ECE5DD;
            padding: 18px 16px;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c8bfb5' fill-opacity='0.3'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* Chat bubble */
        .wa-chat-bubble {
            background: #fff;
            border-radius: 0 10px 10px 10px;
            padding: 10px 14px;
            font-size: 14px;
            color: #303030;
            line-height: 1.6;
            box-shadow: 0 1px 2px rgba(0,0,0,0.12);
            position: relative;
            max-width: 90%;
            margin-bottom: 6px;
        }

        .wa-chat-bubble::before {
            content: '';
            position: absolute;
            top: 0;
            left: -8px;
            border-width: 0 8px 8px 0;
            border-style: solid;
            border-color: transparent #fff transparent transparent;
        }

        .wa-chat-time {
            text-align: right;
            font-size: 11px;
            color: #999;
            margin-top: 4px;
        }

        /* Quick reply chips */
        .wa-quick-replies {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 14px;
        }

        .wa-quick-reply {
            background: #fff;
            border: 1.5px solid #25D366;
            color: #128C7E;
            border-radius: 20px;
            padding: 6px 14px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .wa-quick-reply:hover {
            background: #25D366;
            color: #fff;
        }

        /* Popup footer CTA */
        .wa-popup-footer {
            padding: 14px 16px;
            background: #fff;
        }

        .wa-start-chat {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            background: #25D366;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }

        .wa-start-chat:hover {
            background: #128C7E;
            color: #fff;
        }

        .wa-start-chat svg {
            width: 20px;
            height: 20px;
            fill: #fff;
        }

        /* Floating trigger button */
        .wa-trigger {
            width: 60px;
            height: 60px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 16px rgba(37, 211, 102, 0.5);
            border: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .wa-trigger:hover {
            background: #128C7E;
            transform: scale(1.08);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
        }

        .wa-trigger svg {
            width: 32px;
            height: 32px;
            fill: #fff;
            transition: all 0.3s ease;
        }

        /* Pulse ring animation */
        .wa-trigger::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: rgba(37, 211, 102, 0.4);
            animation: wa-pulse 2s ease-out infinite;
        }

        @keyframes wa-pulse {
            0%   { transform: scale(1);   opacity: 0.8; }
            100% { transform: scale(1.8); opacity: 0; }
        }

        /* Tooltip label */
        .wa-tooltip {
            position: absolute;
            right: 70px;
            background: #1A1A1A;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 6px;
            white-space: nowrap;
            pointer-events: none;
            opacity: 0;
            transform: translateX(6px);
            transition: all 0.2s ease;
        }

        .wa-tooltip::after {
            content: '';
            position: absolute;
            right: -6px;
            top: 50%;
            transform: translateY(-50%);
            border-width: 5px 0 5px 6px;
            border-style: solid;
            border-color: transparent transparent transparent #1A1A1A;
        }

        .wa-trigger:hover .wa-tooltip {
            opacity: 1;
            transform: translateX(0);
        }

        /* Notification dot */
        .wa-notif-dot {
            position: absolute;
            top: 4px;
            right: 4px;
            width: 12px;
            height: 12px;
            background: #FF3B30;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        /* Close icon inside trigger (shown when open) */
        .wa-trigger .wa-icon-close { display: none; }
        .wa-trigger.wa-active .wa-icon-whatsapp { display: none; }
        .wa-trigger.wa-active .wa-icon-close { display: block; }
        .wa-trigger.wa-active::before { animation: none; opacity: 0; }
        .wa-trigger.wa-active .wa-notif-dot { display: none; }

        @media (max-width: 480px) {
            .wa-widget { bottom: 18px; right: 16px; }
            .wa-popup { width: calc(100vw - 32px); }
        }
    </style>

    <!-- Widget HTML -->
    <div class="wa-widget" id="waWidget">

        <!-- Popup window -->
        <div class="wa-popup" id="waPopup" role="dialog" aria-label="WhatsApp Chat">
            <!-- Header -->
            <div class="wa-popup-header">
                <div class="wa-popup-avatar">
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 0C7.163 0 0 7.163 0 16c0 2.833.738 5.49 2.027 7.8L0 32l8.4-2.007A15.93 15.93 0 0 0 16 32c8.837 0 16-7.163 16-16S24.837 0 16 0zm0 29.333a13.27 13.27 0 0 1-6.773-1.854l-.487-.29-4.987 1.19 1.253-4.853-.317-.5A13.267 13.267 0 0 1 2.667 16C2.667 8.636 8.636 2.667 16 2.667S29.333 8.636 29.333 16 23.364 29.333 16 29.333zm7.27-9.88c-.4-.2-2.363-1.163-2.73-1.297-.367-.133-.633-.2-.9.2-.267.4-1.03 1.297-1.263 1.563-.233.267-.467.3-.867.1-.4-.2-1.687-.623-3.213-1.98-1.187-1.057-1.987-2.363-2.22-2.763-.233-.4-.025-.617.175-.816.18-.18.4-.467.6-.7.2-.233.267-.4.4-.667.133-.267.067-.5-.033-.7-.1-.2-.9-2.163-1.233-2.963-.323-.78-.65-.673-.9-.686-.233-.013-.5-.016-.767-.016s-.7.1-1.067.5c-.367.4-1.4 1.367-1.4 3.333s1.433 3.867 1.633 4.133c.2.267 2.82 4.307 6.833 6.04.953.413 1.697.66 2.277.843.957.305 1.827.262 2.517.159.767-.114 2.363-.967 2.697-1.9.333-.933.333-1.733.233-1.9-.1-.167-.367-.267-.767-.467z"/>
                    </svg>
                </div>
                <div class="wa-popup-info">
                    <p class="wa-popup-name"><?php echo SITE_NAME; ?></p>
                    <span class="wa-popup-status">Typically replies instantly</span>
                </div>
                <button class="wa-popup-close" id="waClose" aria-label="Close chat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>

            <!-- Chat body -->
            <div class="wa-popup-body">
                <div class="wa-chat-bubble">
                    👋 Hello! Welcome to <strong><?php echo SITE_NAME; ?></strong>.<br><br>
                    How can we help you today?
                    <div class="wa-chat-time"><?php echo date('h:i A'); ?></div>
                </div>

                <!-- Quick reply chips -->
                <div class="wa-quick-replies">
                    <a class="wa-quick-reply" href="https://wa.me/<?php echo $wa_number; ?>?text=Hi%2C+I+want+to+enquire+about+your+products" target="_blank" rel="noopener">Product Enquiry</a>
                    <a class="wa-quick-reply" href="https://wa.me/<?php echo $wa_number; ?>?text=Hi%2C+I+need+a+quote+for+bulk+order" target="_blank" rel="noopener">Get a Quote</a>
                    <a class="wa-quick-reply" href="https://wa.me/<?php echo $wa_number; ?>?text=Hi%2C+I+have+a+general+query" target="_blank" rel="noopener">General Query</a>
                </div>
            </div>

            <!-- CTA button -->
            <div class="wa-popup-footer">
                <a class="wa-start-chat" href="https://wa.me/<?php echo $wa_number; ?>?text=Hello%2C+I+visited+your+website+and+would+like+to+connect." target="_blank" rel="noopener">
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 0C7.163 0 0 7.163 0 16c0 2.833.738 5.49 2.027 7.8L0 32l8.4-2.007A15.93 15.93 0 0 0 16 32c8.837 0 16-7.163 16-16S24.837 0 16 0zm0 29.333a13.27 13.27 0 0 1-6.773-1.854l-.487-.29-4.987 1.19 1.253-4.853-.317-.5A13.267 13.267 0 0 1 2.667 16C2.667 8.636 8.636 2.667 16 2.667S29.333 8.636 29.333 16 23.364 29.333 16 29.333zm7.27-9.88c-.4-.2-2.363-1.163-2.73-1.297-.367-.133-.633-.2-.9.2-.267.4-1.03 1.297-1.263 1.563-.233.267-.467.3-.867.1-.4-.2-1.687-.623-3.213-1.98-1.187-1.057-1.987-2.363-2.22-2.763-.233-.4-.025-.617.175-.816.18-.18.4-.467.6-.7.2-.233.267-.4.4-.667.133-.267.067-.5-.033-.7-.1-.2-.9-2.163-1.233-2.963-.323-.78-.65-.673-.9-.686-.233-.013-.5-.016-.767-.016s-.7.1-1.067.5c-.367.4-1.4 1.367-1.4 3.333s1.433 3.867 1.633 4.133c.2.267 2.82 4.307 6.833 6.04.953.413 1.697.66 2.277.843.957.305 1.827.262 2.517.159.767-.114 2.363-.967 2.697-1.9.333-.933.333-1.733.233-1.9-.1-.167-.367-.267-.767-.467z"/>
                    </svg>
                    Start Chat on WhatsApp
                </a>
            </div>
        </div>

        <!-- Floating trigger button -->
        <button class="wa-trigger" id="waTrigger" aria-label="Chat with us on WhatsApp">
            <span class="wa-notif-dot"></span>
            <span class="wa-tooltip">Chat with us!</span>
            <!-- WhatsApp icon -->
            <svg class="wa-icon-whatsapp" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 0C7.163 0 0 7.163 0 16c0 2.833.738 5.49 2.027 7.8L0 32l8.4-2.007A15.93 15.93 0 0 0 16 32c8.837 0 16-7.163 16-16S24.837 0 16 0zm0 29.333a13.27 13.27 0 0 1-6.773-1.854l-.487-.29-4.987 1.19 1.253-4.853-.317-.5A13.267 13.267 0 0 1 2.667 16C2.667 8.636 8.636 2.667 16 2.667S29.333 8.636 29.333 16 23.364 29.333 16 29.333zm7.27-9.88c-.4-.2-2.363-1.163-2.73-1.297-.367-.133-.633-.2-.9.2-.267.4-1.03 1.297-1.263 1.563-.233.267-.467.3-.867.1-.4-.2-1.687-.623-3.213-1.98-1.187-1.057-1.987-2.363-2.22-2.763-.233-.4-.025-.617.175-.816.18-.18.4-.467.6-.7.2-.233.267-.4.4-.667.133-.267.067-.5-.033-.7-.1-.2-.9-2.163-1.233-2.963-.323-.78-.65-.673-.9-.686-.233-.013-.5-.016-.767-.016s-.7.1-1.067.5c-.367.4-1.4 1.367-1.4 3.333s1.433 3.867 1.633 4.133c.2.267 2.82 4.307 6.833 6.04.953.413 1.697.66 2.277.843.957.305 1.827.262 2.517.159.767-.114 2.363-.967 2.697-1.9.333-.933.333-1.733.233-1.9-.1-.167-.367-.267-.767-.467z"/>
            </svg>
            <!-- Close icon -->
            <svg class="wa-icon-close" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>

    <script>
    (function () {
        var trigger  = document.getElementById('waTrigger');
        var popup    = document.getElementById('waPopup');
        var closeBtn = document.getElementById('waClose');

        function openChat() {
            popup.classList.add('wa-open');
            trigger.classList.add('wa-active');
            trigger.setAttribute('aria-expanded', 'true');
        }

        function closeChat() {
            popup.classList.remove('wa-open');
            trigger.classList.remove('wa-active');
            trigger.setAttribute('aria-expanded', 'false');
        }

        trigger.addEventListener('click', function () {
            popup.classList.contains('wa-open') ? closeChat() : openChat();
        });

        closeBtn.addEventListener('click', closeChat);

        // Auto-open after 4 seconds on first visit
        if (!sessionStorage.getItem('wa_shown')) {
            setTimeout(function () {
                openChat();
                sessionStorage.setItem('wa_shown', '1');
            }, 4000);
        }
    })();
    </script>

    <!-- iDesign Link Animation Styles -->
    <style>
        .footer-developer-credit {
            margin-top: 10px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .idesign-link {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            position: relative;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .idesign-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background: linear-gradient(90deg, #4CAF50, #2196F3);
            transition: width 0.3s ease;
        }
        
        .idesign-link:hover {
            color: #4CAF50;
            transform: translateY(-2px);
            text-shadow: 0 2px 8px rgba(76, 175, 80, 0.3);
        }
        
        .idesign-link:hover::after {
            width: 100%;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50%       { opacity: 0.7; }
        }
        
        .idesign-link:hover {
            animation: pulse 1.5s ease-in-out infinite;
        }
    </style>
    
    <!-- JavaScript Files -->
    <script src="<?php echo $basePath; ?>assets/js/main.js"></script>
    <?php if (isset($page_js)): ?>
    <script src="<?php echo $basePath . $page_js; ?>"></script>
    <?php endif; ?>
</body>
</html>
