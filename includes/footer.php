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
                        A distinguished name in Indian plastic manufacturing since <?php echo SITE_ESTABLISHED; ?>. 
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
                </div>
            </div>
        </div>
    </footer>
    
    <!-- JavaScript Files -->
    <script src="<?php echo $basePath; ?>assets/js/main.js"></script>
    <?php if (isset($page_js)): ?>
    <script src="<?php echo $basePath . $page_js; ?>"></script>
    <?php endif; ?>
</body>
</html>
