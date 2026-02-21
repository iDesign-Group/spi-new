<?php
/**
 * Shree Plastic Industries - News & Certificates Page
 * Company certifications, accreditations and news updates
 */

require_once '../includes/config.php';

$page_title = 'News & Certificates';
$page_description = 'Shree Plastic Industries is certified by MPCB, CPCB, GEM Verified Manufacturer, ISO and MSME - reflecting our commitment to quality, compliance and sustainability.';

include '../includes/header.php';
?>

<style>
/* ───────────────────────────────────────────
   CERTIFICATES GRID
─────────────────────────────────────────── */
.cert-section {
    padding: 90px 0 100px;
    background: #F7F9FC;
}

.cert-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px;
    margin-top: 56px;
}

.cert-grid-row2 {
    display: flex;
    justify-content: center;
    gap: 32px;
    margin-top: 32px;
}
.cert-grid-row2 .cert-card {
    width: calc(33.333% - 16px);
    max-width: 380px;
}

.cert-card {
    background: #FFFFFF;
    border-radius: 16px;
    padding: 40px 32px 36px;
    text-align: center;
    box-shadow: 0 4px 24px rgba(0,0,0,0.07);
    border: 1.5px solid rgba(0, 102, 204, 0.08);
    transition: all 0.35s ease;
    position: relative;
    overflow: hidden;
}

.cert-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, #0066CC, #2E5090);
    border-radius: 16px 16px 0 0;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.cert-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 16px 48px rgba(0, 102, 204, 0.15);
    border-color: rgba(0, 102, 204, 0.25);
}

.cert-card:hover::before { opacity: 1; }

.cert-icon-wrap {
    width: 96px;
    height: 96px;
    margin: 0 auto 24px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(0,102,204,0.10), rgba(46,80,144,0.10));
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s ease;
}

.cert-card:hover .cert-icon-wrap {
    background: linear-gradient(135deg, rgba(0,102,204,0.18), rgba(46,80,144,0.18));
}

.cert-icon-wrap svg {
    width: 48px;
    height: 48px;
    color: #0066CC;
}

.cert-badge {
    display: inline-block;
    background: linear-gradient(135deg, #0066CC, #2E5090);
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.2px;
    text-transform: uppercase;
    padding: 4px 14px;
    border-radius: 20px;
    margin-bottom: 16px;
}

.cert-card h3 {
    font-size: 20px;
    font-weight: 700;
    color: #1A1A1A;
    margin-bottom: 8px;
    font-family: 'Montserrat', sans-serif;
}

.cert-authority {
    font-size: 12px;
    font-weight: 600;
    color: #0066CC;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 14px;
}

.cert-card p {
    font-size: 14px;
    color: #666;
    line-height: 1.7;
    margin: 0;
}

/* ───────────────────────────────────────────
   NEWS SECTION
─────────────────────────────────────────── */
.news-section {
    padding: 90px 0 100px;
    background: #FFFFFF;
}

/* Single card — wide horizontal layout */
.news-single {
    display: flex;
    background: #FFFFFF;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 40px rgba(0,0,0,0.10);
    border: 1px solid rgba(0,0,0,0.07);
    margin-top: 50px;
    max-width: 860px;
    margin-left: auto;
    margin-right: auto;
    transition: all 0.35s ease;
}

.news-single:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 56px rgba(0,102,204,0.14);
}

.news-single-image {
    flex: 0 0 400px;
    min-height: 300px;
    background: linear-gradient(135deg, #EEF3FB, #DDE8F8);
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #AABFE0;
}

.news-single-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.news-single-image svg {
    width: 64px;
    height: 64px;
}

.news-single-content {
    flex: 1;
    padding: 40px 36px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.news-tag {
    font-size: 11px;
    font-weight: 700;
    color: #0066CC;
    text-transform: uppercase;
    letter-spacing: 1.4px;
    margin-bottom: 10px;
}

.news-date {
    font-size: 12px;
    color: #999;
    margin-bottom: 14px;
    font-family: 'Open Sans', sans-serif;
}

.news-title {
    font-size: 22px;
    font-weight: 700;
    color: #1A1A1A;
    margin-bottom: 16px;
    line-height: 1.4;
    font-family: 'Montserrat', sans-serif;
}

.news-excerpt {
    color: #555;
    font-size: 15px;
    line-height: 1.75;
    margin: 0;
}

/* ───────────────────────────────────────────
   CTA STRIP
─────────────────────────────────────────── */
.cert-cta {
    background: linear-gradient(135deg, #1A1A1A 0%, #2E5090 100%);
    padding: 80px 0;
    text-align: center;
}

.cert-cta h2 {
    color: #fff;
    font-size: 32px;
    margin-bottom: 16px;
    font-family: 'Montserrat', sans-serif;
}

.cert-cta p {
    color: rgba(255,255,255,0.75);
    font-size: 16px;
    margin-bottom: 36px;
    max-width: 540px;
    margin-left: auto;
    margin-right: auto;
}

/* ───────────────────────────────────────────
   RESPONSIVE
─────────────────────────────────────────── */
@media (max-width: 991px) {
    .cert-grid { grid-template-columns: repeat(2, 1fr); }
    .cert-grid-row2 { flex-wrap: wrap; }
    .cert-grid-row2 .cert-card { width: calc(50% - 16px); max-width: none; }
    .news-single { flex-direction: column; max-width: 560px; }
    .news-single-image { flex: none; height: 260px; width: 100%; }
}

@media (max-width: 575px) {
    .cert-grid { grid-template-columns: 1fr; }
    .cert-grid-row2 { flex-direction: column; }
    .cert-grid-row2 .cert-card { width: 100%; }
    .news-single-content { padding: 28px 22px; }
    .news-title { font-size: 18px; }
    .cert-cta h2 { font-size: 24px; }
}
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-bg" style="background: linear-gradient(135deg, #1A1A1A 0%, #2E5090 100%);"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-quote">News &amp; Certificates</h1>
        <p class="hero-tagline">Certified. Compliant. Trusted Since 1984.</p>
    </div>
</section>

<!-- Intro -->
<section class="intro-section">
    <div class="container">
        <div class="intro-content animate-on-scroll">
            <h2 class="intro-title">Our Certifications &amp; Accreditations</h2>
            <p class="intro-text">
                At Shree Plastic Industries, compliance is not an afterthought &mdash; it is built into every process, every product, and every decision we make.
                Our certifications from national regulatory bodies and international standards organisations reflect four decades of responsible, high-quality manufacturing.
            </p>
        </div>
    </div>
</section>

<!-- Certificates Section -->
<section class="cert-section">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2 class="section-title">Certificates We Hold</h2>
            <p class="section-subtitle">Recognised by leading regulatory and standards bodies</p>
        </div>

        <!-- Row 1: MPCB · CPCB · GEM -->
        <div class="cert-grid">
            <!-- MPCB -->
            <div class="cert-card animate-on-scroll stagger-1">
                <div class="cert-icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <polyline points="9 12 11 14 15 10"/>
                    </svg>
                </div>
                <span class="cert-badge">State Regulatory</span>
                <h3>MPCB</h3>
                <p class="cert-authority">Maharashtra Pollution Control Board</p>
                <p>Certified and approved by the Maharashtra Pollution Control Board, ensuring all our manufacturing operations meet state environmental norms and pollution control standards.</p>
            </div>

            <!-- CPCB -->
            <div class="cert-card animate-on-scroll stagger-2">
                <div class="cert-icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                        <line x1="2" y1="12" x2="22" y2="12"/>
                    </svg>
                </div>
                <span class="cert-badge">National Regulatory</span>
                <h3>CPCB</h3>
                <p class="cert-authority">Central Pollution Control Board</p>
                <p>Recognised by the Central Pollution Control Board, confirming that our plastic manufacturing processes adhere to national environmental protection and waste management regulations.</p>
            </div>

            <!-- GEM -->
            <div class="cert-card animate-on-scroll stagger-3">
                <div class="cert-icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                    </svg>
                </div>
                <span class="cert-badge">Government Portal</span>
                <h3>GEM Verified</h3>
                <p class="cert-authority">Government e-Marketplace</p>
                <p>Verified and listed as an authorised manufacturer on the Government e-Marketplace (GeM), enabling direct supply to central and state government departments across India.</p>
            </div>
        </div>

        <!-- Row 2: ISO · MSME (centred) -->
        <div class="cert-grid-row2">
            <!-- ISO -->
            <div class="cert-card animate-on-scroll stagger-1">
                <div class="cert-icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <rect x="3" y="3" width="18" height="18" rx="3"/>
                        <path d="M7 8h4m-4 4h10M7 16h6"/>
                        <circle cx="17" cy="8" r="1" fill="currentColor"/>
                    </svg>
                </div>
                <span class="cert-badge">International Standard</span>
                <h3>ISO Certified</h3>
                <p class="cert-authority">International Organisation for Standardisation</p>
                <p>ISO certified, demonstrating our commitment to internationally recognised quality management systems and consistent delivery of products that meet customer and regulatory requirements.</p>
            </div>

            <!-- MSME -->
            <div class="cert-card animate-on-scroll stagger-2">
                <div class="cert-icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                </div>
                <span class="cert-badge">Government of India</span>
                <h3>MSME Registered</h3>
                <p class="cert-authority">Ministry of Micro, Small &amp; Medium Enterprises</p>
                <p>Officially registered under the MSME Act with the Ministry of Micro, Small &amp; Medium Enterprises, Government of India &mdash; qualifying us for priority sector benefits and government procurement programmes.</p>
            </div>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="news-section">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2 class="section-title">Latest News</h2>
            <p class="section-subtitle">Company updates and announcements</p>
        </div>

        <!-- Plast India 2026 -->
        <div class="news-single animate-on-scroll">

            <div class="news-single-image">
                <img
                    src="<?php echo $basePath; ?>assets/images/news/plast-india-2026.jpg"
                    alt="Visited Plast India 2026 – Delhi"
                    loading="lazy"
                    onerror="this.style.display='none'; this.parentNode.innerHTML='<svg viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1\'><rect x=\'3\' y=\'3\' width=\'18\' height=\'18\' rx=\'2\'/><circle cx=\'8.5\' cy=\'8.5\' r=\'1.5\'/><polyline points=\'21 15 16 10 5 21\'/></svg>';">
            </div>

            <div class="news-single-content">
                <p class="news-tag">&#127981; Trade Show</p>
                <p class="news-date">February 2026</p>
                <h3 class="news-title">Visited Plast India 2026 &ndash; Delhi</h3>
                <p class="news-excerpt">
                    Our team had the privilege of attending Plast India 2026 in Delhi &mdash; one of India&rsquo;s largest and most prestigious plastic industry exhibitions.
                    The event brought together manufacturers, innovators, and industry leaders from across the globe, offering valuable insights into the latest advancements
                    in plastic technology, sustainable materials, and packaging solutions. The experience reaffirmed our commitment to staying at the forefront of the industry.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- CTA Strip -->
<section class="cert-cta">
    <div class="container">
        <h2>Want to Verify Our Certifications?</h2>
        <p>Get in touch with us for official certificate copies or any compliance-related queries.</p>
        <a href="<?php echo $basePath; ?>pages/contact.php" class="btn btn-primary">Contact Us</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
