<?php
/**
 * Shree Plastic Industries - Businesses Page
 * AJAX-powered flip cards for product categories
 */

require_once '../includes/config.php';

$page_title = 'Our Businesses';
$page_description = 'Explore our comprehensive range of plastic products including polythene bags, VCL bags, compostable bags, pouches, and more.';
$page_js = 'assets/js/flipcards.js';

include '../includes/header.php';
?>

<style>
/* Flip Cards Specific Styles */
.flip-cards-section {
    padding: 80px 0;
    background-color: #F5F5F5;
}

.flip-cards-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
}

.flip-card {
    height: 400px;
    perspective: 1000px;
    cursor: pointer;
}

.flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    transition: transform 0.6s ease-in-out;
    transform-style: preserve-3d;
}

.flip-card:hover .flip-card-inner,
.flip-card.flipped .flip-card-inner {
    transform: rotateY(180deg);
}

.flip-card-front,
.flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
    border-radius: 8px;
    overflow: hidden;
}

.flip-card-front {
    background: #FFFFFF;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 30px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.flip-card-back {
    background: linear-gradient(135deg, #1A1A1A, #2E5090);
    color: #FFFFFF;
    transform: rotateY(180deg);
    display: flex;
    flex-direction: column;
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.flip-card-badge {
    position: absolute;
    top: 16px;
    right: 16px;
    background: #28a745;
    color: #FFFFFF;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
}

.flip-card-icon {
    width: 80px;
    height: 80px;
    margin-bottom: 20px;
    color: #0066CC;
}

.flip-card-icon svg {
    width: 100%;
    height: 100%;
}

.flip-card-title {
    font-size: 20px;
    font-weight: 700;
    color: #1A1A1A;
    margin-bottom: 12px;
}

.flip-card-short-desc {
    color: #666666;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 16px;
}

.flip-card-hint {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #0066CC;
    font-size: 12px;
    font-weight: 500;
    margin-top: auto;
}

.flip-card-back-title {
    font-size: 18px;
    margin-bottom: 12px;
    color: #FFFFFF;
}

.flip-card-description {
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 16px;
    flex-grow: 1;
    overflow: hidden;
}

.flip-card-features {
    margin-bottom: 20px;
}

.flip-card-features li {
    position: relative;
    padding-left: 16px;
    margin-bottom: 6px;
    font-size: 13px;
    opacity: 0.9;
}

.flip-card-features li::before {
    content: '•';
    position: absolute;
    left: 0;
    color: #0066CC;
}

.flip-card-btn {
    margin-top: auto;
    padding: 10px 20px;
    font-size: 12px;
}

/* Loading State */
.flip-cards-loading {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 80px 0;
    color: #666666;
}

.flip-cards-loading p {
    margin-top: 16px;
}

/* Error State */
.flip-cards-error {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 80px 0;
    color: #666666;
    text-align: center;
}

.flip-cards-error svg {
    color: #dc3545;
    margin-bottom: 16px;
}

.flip-cards-error p {
    margin-bottom: 20px;
}

/* Responsive */
@media (max-width: 1199px) {
    .flip-cards-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 991px) {
    .flip-cards-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .flip-card {
        height: 380px;
    }
}

@media (max-width: 575px) {
    .flip-cards-grid {
        grid-template-columns: 1fr;
    }
    
    .flip-card {
        height: 360px;
    }
}

/* Touch device hint */
@media (hover: none) {
    .flip-card-hint::after {
        content: ' (tap to flip)';
    }
}
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-bg" style="background: linear-gradient(135deg, #1A1A1A 0%, #2E5090 100%);"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-quote">Our Businesses</h1>
        <p class="hero-tagline">Comprehensive Plastic Solutions for Every Industry</p>
    </div>
</section>
<script>
// Load hero image if available
(function() {
    var img = new Image();
    img.onload = function() {
        document.querySelector('.hero-bg').style.backgroundImage = "url('../assets/images/heroes/businesses-hero.jpg')";
    };
    img.src = '../assets/images/heroes/businesses-hero.jpg';
})();
</script>

<!-- Introduction -->
<section class="intro-section">
    <div class="container">
        <div class="intro-content animate-on-scroll">
            <h2 class="intro-title">Product Excellence</h2>
            <p class="intro-text">
                At Shree Plastic Industries, we offer a diverse range of high-quality plastic products designed to 
                meet the unique needs of various industries. From traditional polythene solutions to eco-friendly 
                compostable alternatives, our products are manufactured with precision, quality, and sustainability in mind.
            </p>
        </div>
    </div>
</section>

<!-- Flip Cards Section -->
<section class="flip-cards-section">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2 class="section-title">Our Product Range</h2>
            <p class="section-subtitle">
                Hover over each card to discover more about our products
            </p>
        </div>
        
        <!-- AJAX-powered Flip Cards Container -->
        <div class="flip-cards-container" data-url="data/content.json">
            <!-- Cards will be loaded via JavaScript -->
            <div class="flip-cards-loading">
                <div class="loading-spinner"></div>
                <p>Loading products...</p>
            </div>
        </div>
    </div>
</section>

<!-- Quality Assurance -->
<section class="section">
    <div class="container">
        <div class="alt-section animate-on-scroll">
            <div class="alt-image">
                <img src="<?php echo $basePath; ?>assets/images/about/quality.jpg" alt="Quality Assurance" loading="lazy"
                     onerror="this.style.display='none'; this.parentElement.innerHTML='<div style=\"width:100%;height:300px;background:linear-gradient(135deg,#f5f5f5,#e0e0e0);display:flex;align-items:center;justify-content:center;border-radius:8px;color:#999;\"><span>Quality Assurance</span></div>
            </div>
            <div class="alt-content">
                <h2 class="alt-title">Committed to Quality</h2>
                <p class="alt-text">
                    Every product that leaves our facility undergoes rigorous quality checks to ensure it meets 
                    our exacting standards. Our ISO certifications and industry recognitions are a testament to 
                    our commitment to delivering excellence.
                </p>
                <p class="alt-text">
                    We continuously invest in advanced manufacturing technologies and skilled workforce to 
                    maintain our position as a trusted partner for businesses across India.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section bg-light">
    <div class="container text-center">
        <div class="animate-on-scroll">
            <h2>Need Custom Solutions?</h2>
            <p class="section-subtitle mb-4">
                Contact us to discuss your specific requirements. We offer customization across all our product lines.
            </p>
            <a href="mailto:<?php echo CONTACT_EMAIL; ?>" class="btn btn-primary">Get in Touch</a>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
