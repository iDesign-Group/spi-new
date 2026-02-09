<?php
/**
 * Shree Plastic Industries - Home Page
 * Main landing page with video hero and Why Choose Us section
 */

require_once 'includes/config.php';

$page_title = 'Home';
$page_description = 'Welcome to Shree Plastic Industries - Leading plastic manufacturing company in Pune since 1984. Specializing in Skirting Bags, Garbage Bags, HDPE Sheets, LDPE Bags, Vacuum Bagging Film.';

include 'includes/header.php';

// Why Choose Us data
$whyChooseUs = [
    [
        'icon' => 'experience',
        'title' => 'Experience of 4 Decades',
        'description' => 'Over 4 decades of expertise in plastic manufacturing and industry knowledge'
    ],
    [
        'icon' => 'quality',
        'title' => 'Quality Manufacturing',
        'description' => 'State-of-the-art facilities with stringent quality control processes'
    ],
    [
        'icon' => 'products',
        'title' => 'Wide Product Range',
        'description' => 'Comprehensive selection of HDPE, LDPE products and specialized bags'
    ],
    [
        'icon' => 'partnership',
        'title' => 'Trusted Partnership',
        'description' => 'Reliable partnership firm with strong ties to Trimurti Plastic Industries'
    ],
    [
        'icon' => 'customer',
        'title' => 'Customer-Centric',
        'description' => 'Dedicated to meeting and exceeding customer expectations'
    ],
    [
        'icon' => 'infrastructure',
        'title' => 'Modern Infrastructure',
        'description' => "Advanced manufacturing setup in Pune's industrial hub"
    ]
];

// Icon mapping function
function getChooseUsIcon($iconName) {
    $icons = [
        'experience' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"></circle>
            <polyline points="12 6 12 12 16 14"></polyline>
        </svg>',
        'quality' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
        </svg>',
        'products' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
        </svg>',
        'partnership' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
        </svg>',
        'customer' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
        </svg>',
        'infrastructure' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
            <rect x="9" y="9" width="6" height="6"></rect>
            <line x1="9" y1="1" x2="9" y2="4"></line>
            <line x1="15" y1="1" x2="15" y2="4"></line>
            <line x1="9" y1="20" x2="9" y2="23"></line>
            <line x1="15" y1="20" x2="15" y2="23"></line>
            <line x1="20" y1="9" x2="23" y2="9"></line>
            <line x1="20" y1="14" x2="23" y2="14"></line>
            <line x1="1" y1="9" x2="4" y2="9"></line>
            <line x1="1" y1="14" x2="4" y2="14"></line>
        </svg>'
    ];
    return $icons[$iconName] ?? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle></svg>';
}
?>

<style>
/* Video Hero Styles */
.video-hero {
    position: relative;
    height: 100vh;
    min-height: 600px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.video-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -2;
}

.video-hero-fallback {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #1A1A1A 0%, #2E5090 100%);
    z-index: -3;
}

.video-hero-fallback.has-image {
    background: url('assets/images/heroes/home-hero.jpg') center/cover no-repeat;
}

.video-hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(26, 26, 26, 0.5), rgba(26, 26, 26, 0.7));
    z-index: -1;
}

.video-hero-content {
    text-align: center;
    color: #FFFFFF;
    max-width: 900px;
    padding: 0 24px;
    animation: fadeInUp 1s ease-out;
}

.video-hero-content h1 {
    font-family: 'Montserrat', sans-serif;
    font-size: 56px;
    font-weight: 700;
    margin-bottom: 24px;
    text-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
    color: #FFFFFF;
}

.video-hero-content h1 span {
    color: #0066CC;
}

.video-hero-content p {
    font-size: 20px;
    font-weight: 400;
    opacity: 0.9;
    line-height: 1.6;
}

.hero-cta {
    margin-top: 32px;
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
}

/* Why Choose Us Flash Cards */
.choose-us-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #F5F5F5 0%, #FFFFFF 100%);
}

.choose-us-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 50px;
}

.choose-card {
    position: relative;
    height: 320px;
    perspective: 1000px;
    cursor: pointer;
}

.choose-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    transform-style: preserve-3d;
}

.choose-card:hover .choose-card-inner {
    transform: rotateY(180deg);
}

.choose-card-front,
.choose-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
    border-radius: 12px;
    padding: 40px 30px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.choose-card-front {
    background: #FFFFFF;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(0, 102, 204, 0.1);
}

.choose-card-back {
    background: linear-gradient(135deg, #0066CC, #2E5090);
    transform: rotateY(180deg);
    color: #FFFFFF;
    box-shadow: 0 10px 40px rgba(0, 102, 204, 0.3);
}

.choose-card-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, rgba(0, 102, 204, 0.1), rgba(46, 80, 144, 0.1));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 24px;
    color: #0066CC;
    transition: all 0.3s ease;
}

.choose-card:hover .choose-card-icon {
    transform: scale(1.1);
}

.choose-card-icon svg {
    width: 40px;
    height: 40px;
}

.choose-card-title {
    font-family: 'Montserrat', sans-serif;
    font-size: 20px;
    font-weight: 700;
    color: #1A1A1A;
    margin-bottom: 12px;
}

.choose-card-back .choose-card-title {
    color: #FFFFFF;
    font-size: 22px;
}

.choose-card-desc {
    color: #666666;
    font-size: 14px;
    line-height: 1.6;
}

.choose-card-back .choose-card-desc {
    color: rgba(255, 255, 255, 0.9);
    font-size: 16px;
    line-height: 1.7;
}

/* .choose-card-number {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 36px;
    height: 36px;
    background: linear-gradient(135deg, #0066CC, #2E5090);
    color: #FFFFFF;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;
    font-size: 14px;
} */

/* .choose-card-back .choose-card-number {
    background: rgba(255, 255, 255, 0.2);
} */

/* Animation for cards */
.choose-card {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}

.choose-card.animate-in {
    opacity: 1;
    transform: translateY(0);
}

/* Responsive */
@media (max-width: 991px) {
    .video-hero-content h1 {
        font-size: 42px;
    }
    
    .choose-us-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 575px) {
    .video-hero-content h1 {
        font-size: 32px;
    }
    
    .video-hero-content p {
        font-size: 16px;
    }
    
    .choose-us-grid {
        grid-template-columns: 1fr;
    }
    
    .choose-card {
        height: 280px;
    }
}
</style>

<!-- Video Hero Section -->
<section class="video-hero">
    <div class="video-hero-fallback"></div>
    <video class="video-hero-bg" autoplay muted loop playsinline>
        <source src="assets/videos/hero-video.mp4" type="video/mp4">
    </video>
    <div class="video-hero-overlay"></div>
    <div class="video-hero-content">
        <h1>Welcome to <span><?php echo SITE_NAME; ?></span></h1>
        <p>
            Shree Plastic Industries has been at the forefront of plastic manufacturing excellence in Pune. 
            As a trusted firm, we have built our reputation on delivering high-quality plastic 
            products that meet the diverse needs of industries across India.
        </p>
        <div class="hero-cta">
            <a href="pages/businesses.php" class="btn btn-primary">Explore Our Products</a>
            <a href="pages/about.php" class="btn btn-secondary" style="border-color: #fff; color: #fff;">Learn More About Us</a>
        </div>
    </div>
</section>

<!-- Company Introduction -->
<section class="intro-section">
    <div class="container">
        <div class="intro-content animate-on-scroll">
            <h2 class="intro-title">Excellence in Plastic Manufacturing</h2>
            <p class="intro-text">
                Our state-of-the-art manufacturing facility in Pisoli, Undri specializes in producing a comprehensive 
                range of plastic solutions including <strong>Skirting Bags, Garbage Bags, HDPE Sheets, LDPE Bags, 
                Vacuum Bagging Film, and Vacuum Bags</strong>. With decades of industry expertise and commitment to quality, 
                we continue to serve our clients with dedication and excellence.
            </p>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="choose-us-section">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2 class="section-title">Why Choose Us</h2>
            <p class="section-subtitle">
                Discover what sets Shree Plastic Industries apart from the rest
            </p>
        </div>
        
        <div class="choose-us-grid" id="chooseUsGrid">
            <?php foreach ($whyChooseUs as $index => $item): ?>
            <div class="choose-card" data-index="<?php echo $index; ?>">
                <div class="choose-card-inner">
                    <div class="choose-card-front">
                        
                        <div class="choose-card-icon">
                            <?php echo getChooseUsIcon($item['icon']); ?>
                        </div>
                        <h3 class="choose-card-title"><?php echo sanitize($item['title']); ?></h3>
                        <p class="choose-card-desc"><?php echo sanitize($item['description']); ?></p>
                    </div>
                    <div class="choose-card-back">
                        
                        <h3 class="choose-card-title"><?php echo sanitize($item['title']); ?></h3>
                        <p class="choose-card-desc"><?php echo sanitize($item['description']); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section bg-light">
    <div class="container text-center">
        <div class="animate-on-scroll">
            <h2>Ready to Partner with Us?</h2>
            <p class="section-subtitle mb-4">
                Contact us today to discuss your plastic product requirements
            </p>
            <a href="pages/businesses.php" class="btn btn-primary">View Our Products</a>
            <a href="mailto:<?php echo CONTACT_EMAIL; ?>" class="btn btn-secondary" style="margin-left: 16px;">Get in Touch</a>
        </div>
    </div>
</section>

<script>
// Initialize flash card animations
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.choose-card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animate-in');
                }, entry.target.dataset.index * 100);
            }
        });
    }, { threshold: 0.1 });
    
    cards.forEach(card => observer.observe(card));
});
</script>

<?php include 'includes/footer.php'; ?>
