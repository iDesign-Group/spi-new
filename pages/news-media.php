<?php
/**
 * Shree Plastic Industries - News & Certificates Page
 * Company certifications, accreditations and news updates
 */

require_once '../includes/config.php';

$page_title = 'News & Certificates';
$page_description = 'Shree Plastic Industries holds MPCB, CPCB, GEM Verified Manufacturer, ISO, MSME, EPR and CIPET ISO 17088 certifications - reflecting our commitment to quality, compliance and sustainability.';

include '../includes/header.php';
?>

<style>
/* ═══════════════════════════════════════════
   CERTIFICATES SECTION
═══════════════════════════════════════════ */
.cert-section {
    padding: 90px 0 100px;
    background: #F7F9FC;
}

/* ── Row 1: 4 equal columns ── */
.cert-row-1 {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    margin-top: 56px;
}

/* ── Row 2: 3 cards, same width as row-1 cols, centred ── */
.cert-row-2 {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    margin-top: 24px;
}
/* Hide the invisible 4th placeholder col */
.cert-row-2::after {
    content: '';
    display: block;
}

/* ── Card base ── */
.cert-card {
    background: #FFFFFF;
    border-radius: 16px;
    padding: 32px 22px 28px;
    text-align: center;
    box-shadow: 0 4px 24px rgba(0,0,0,0.07);
    border: 1.5px solid rgba(0,102,204,0.08);
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
    transform: translateY(-8px);
    box-shadow: 0 16px 40px rgba(0,102,204,0.15);
    border-color: rgba(0,102,204,0.25);
}

.cert-card:hover::before { opacity: 1; }

/* ── Icon circle ── */
.cert-icon-wrap {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
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
    width: 40px;
    height: 40px;
    color: #0066CC;
}

/* ── Badge ── */
.cert-badge {
    display: inline-block;
    background: linear-gradient(135deg, #0066CC, #2E5090);
    color: #fff;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    padding: 3px 12px;
    border-radius: 20px;
    margin-bottom: 12px;
}

.cert-badge.green {
    background: linear-gradient(135deg, #1a8c4e, #2daa6a);
}

/* ── Text ── */
.cert-card h3 {
    font-size: 17px;
    font-weight: 700;
    color: #1A1A1A;
    margin-bottom: 6px;
    font-family: 'Montserrat', sans-serif;
    line-height: 1.3;
}

.cert-authority {
    font-size: 11px;
    font-weight: 600;
    color: #0066CC;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 12px;
    line-height: 1.4;
}

.cert-card p.cert-desc {
    font-size: 13px;
    color: #666;
    line-height: 1.65;
    margin: 0;
}

/* ═══════════════════════════════════════════
   NEWS SECTION
═══════════════════════════════════════════ */
.news-section {
    padding: 90px 0 100px;
    background: #FFFFFF;
}

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

.news-single-image svg { width: 64px; height: 64px; }

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

/* ═══════════════════════════════════════════
   CTA STRIP
═══════════════════════════════════════════ */
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

/* ═══════════════════════════════════════════
   RESPONSIVE
═══════════════════════════════════════════ */
@media (max-width: 1199px) {
    .cert-row-1,
    .cert-row-2 { gap: 18px; }
}

@media (max-width: 991px) {
    .cert-row-1 { grid-template-columns: repeat(2, 1fr); }
    .cert-row-2 { grid-template-columns: repeat(2, 1fr); }
    .cert-row-2::after { display: none; }
    .news-single { flex-direction: column; max-width: 560px; }
    .news-single-image { flex: none; height: 260px; width: 100%; }
}

@media (max-width: 575px) {
    .cert-row-1,
    .cert-row-2 { grid-template-columns: 1fr; }
    .cert-row-2::after { display: none; }
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

<!-- ═══════ CERTIFICATES SECTION ═══════ -->
<section class="cert-section">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2 class="section-title">Certificates We Hold</h2>
            <p class="section-subtitle">Recognised by leading regulatory and standards bodies</p>
        </div>

        <!-- ── ROW 1: 4 cards ── -->
        <div class="cert-row-1">

            <!-- 1. MPCB -->
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
                <p class="cert-desc">Certified by the Maharashtra Pollution Control Board, ensuring all operations meet state environmental norms and pollution control standards.</p>
            </div>

            <!-- 2. CPCB -->
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
                <p class="cert-desc">Recognised by the Central Pollution Control Board, confirming our processes adhere to national environmental protection and waste management regulations.</p>
            </div>

            <!-- 3. GEM -->
            <div class="cert-card animate-on-scroll stagger-3">
                <div class="cert-icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                    </svg>
                </div>
                <span class="cert-badge">Government Portal</span>
                <h3>GEM Verified</h3>
                <p class="cert-authority">Government e-Marketplace</p>
                <p class="cert-desc">Verified and listed on the Government e-Marketplace (GeM), enabling direct supply to central and state government departments across India.</p>
            </div>

            <!-- 4. ISO -->
            <div class="cert-card animate-on-scroll stagger-4">
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
                <p class="cert-desc">ISO certified, demonstrating our commitment to internationally recognised quality management systems and consistent product delivery.</p>
            </div>

        </div>
        <!-- END ROW 1 -->

        <!-- ── ROW 2: 3 cards (grid col 4 stays empty = natural left-align in 4-col grid) ── -->
        <div class="cert-row-2">

            <!-- 5. MSME -->
            <div class="cert-card animate-on-scroll stagger-1">
                <div class="cert-icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                </div>
                <span class="cert-badge">Government of India</span>
                <h3>MSME Registered</h3>
                <p class="cert-authority">Ministry of Micro, Small &amp; Medium Enterprises</p>
                <p class="cert-desc">Registered under the MSME Act, qualifying us for priority sector benefits and government procurement programmes across India.</p>
            </div>

            <!-- 6. EPR -->
            <div class="cert-card animate-on-scroll stagger-2">
                <div class="cert-icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <polyline points="23 4 23 10 17 10"/>
                        <polyline points="1 20 1 14 7 14"/>
                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/>
                    </svg>
                </div>
                <span class="cert-badge green">Circular Economy</span>
                <h3>EPR</h3>
                <p class="cert-authority">Extended Producer Responsibility &mdash; MoEFCC</p>
                <p class="cert-desc">Registered under the EPR framework by MoEFCC, taking full accountability for the end-of-life management of our plastic products and packaging.</p>
            </div>

            <!-- 7. CIPET ISO 17088 -->
            <div class="cert-card animate-on-scroll stagger-3">
                <div class="cert-icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                        <path d="M6.5 21.5s6-5.5 6-10.5c0-4-3-7-7-7 0 4.5 1.5 10 1 17.5z"/>
                        <path d="M17.5 21.5s-6-5.5-6-10.5c0-4 3-7 7-7 0 4.5-1.5 10-1 17.5z"/>
                    </svg>
                </div>
                <span class="cert-badge green">Compostable</span>
                <h3>CIPET &ndash; ISO 17088</h3>
                <p class="cert-authority">Central Institute of Petrochemicals Engg. &amp; Technology</p>
                <p class="cert-desc">Certified compostable as per ISO 17088 by CIPET, confirming our products meet international standards for biodegradability and eco-toxicity.</p>
            </div>

        </div>
        <!-- END ROW 2 -->

    </div>
</section>

<!-- ═══════ NEWS SECTION ═══════ -->
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
                    alt="Visited Plast India 2026 &ndash; Delhi"
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

<!-- ═══════ CTA STRIP ═══════ -->
<section class="cert-cta">
    <div class="container">
        <h2>Want to Verify Our Certifications?</h2>
        <p>Get in touch with us for official certificate copies or any compliance-related queries.</p>
        <a href="<?php echo $basePath; ?>pages/contact.php" class="btn btn-primary">Contact Us</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
