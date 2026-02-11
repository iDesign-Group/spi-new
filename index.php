<?php
/**
 * Shree Plastic Industries - Home Page
 * Main landing page with hero slider and Why Choose Us section
 */

require_once 'includes/config.php';

$page_title = 'Home';
$page_description = 'Welcome to Shree Plastic Industries - Leading plastic manufacturing company in Pune since 1984. Specializing in Skirting Bags, Garbage Bags, HDPE Sheets, LDPE Bags, Vacuum Bagging Film.';

include 'includes/header.php';

// Hero Slider data
$heroSlides = [
    [
        'image' => 'assets/images/heroes/home-hero.jpg',
        'title' => 'Welcome to <span>Shree Plastic Industries</span>',
        'description' => 'Leading plastic manufacturing company in Pune with over 4 decades of excellence in quality and innovation.'
    ],
    [
        'image' => 'assets/images/heroes/businesses-hero.jpg',
        'title' => 'Quality <span>Plastic Products</span>',
        'description' => 'Specializing in Skirting Bags, Garbage Bags, HDPE Sheets, LDPE Bags, and Vacuum Bagging Films.'
    ],
    [
        'image' => 'assets/images/heroes/sustainability-hero.jpg',
        'title' => 'Committed to <span>Sustainability</span>',
        'description' => 'Building a greener future through responsible manufacturing and eco-friendly practices.'
    ]
];

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
/* Hero Slider Styles */
.hero-slider {
    position: relative;
    height: 100vh;
    min-height: 600px;
    overflow: hidden;
}

.hero-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease-in-out;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero-slide.active {
    opacity: 1;
    z-index: 1;
}

.hero-slide-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    z-index: -2;
}

.hero-slide.active .hero-slide-bg {
    animation: kenburns 15s ease-out forwards;
}

@keyframes kenburns {
    0% {
        transform: scale(1);
    }
    100% {
        transform: scale(1.1);
    }
}

.hero-slide-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(26, 26, 26, 0.5), rgba(26, 26, 26, 0.7));
    z-index: -1;
}

.hero-slide-content {
    text-align: center;
    color: #FFFFFF;
    max-width: 900px;
    padding: 0 24px;
    position: relative;
    z-index: 2;
}

.hero-slide.active .hero-slide-content {
    animation: fadeInUp 1s ease-out;
}

.hero-slide-content h1 {
    font-family: 'Montserrat', sans-serif;
    font-size: 56px;
    font-weight: 700;
    margin-bottom: 24px;
    text-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
    color: #FFFFFF;
}

.hero-slide-content h1 span {
    color: #0066CC;
}

.hero-slide-content p {
    font-size: 20px;
    font-weight: 400;
    opacity: 0.9;
    line-height: 1.6;
    margin-bottom: 32px;
}

.hero-cta {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
}

/* Slider Controls */
.slider-controls {
    position: absolute;
    bottom: 40px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 12px;
    z-index: 10;
}

.slider-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    border: 2px solid rgba(255, 255, 255, 0.8);
    cursor: pointer;
    transition: all 0.3s ease;
}

.slider-dot.active {
    background: #0066CC;
    border-color: #0066CC;
    width: 40px;
    border-radius: 6px;
}

.slider-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.5);
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10;
    color: #fff;
    font-size: 20px;
}

.slider-arrow:hover {
    background: rgba(0, 102, 204, 0.8);
    border-color: #0066CC;
}

.slider-arrow.prev {
    left: 30px;
}

.slider-arrow.next {
    right: 30px;
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
    .hero-slide-content h1 {
        font-size: 42px;
    }
    
    .choose-us-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .slider-arrow {
        width: 40px;
        height: 40px;
    }
}

@media (max-width: 575px) {
    .hero-slide-content h1 {
        font-size: 32px;
    }
    
    .hero-slide-content p {
        font-size: 16px;
    }
    
    .choose-us-grid {
        grid-template-columns: 1fr;
    }
    
    .choose-card {
        height: 280px;
    }
    
    .slider-arrow {
        display: none;
    }
}
</style>

<!-- Hero Slider Section -->
<section class="hero-slider" id="heroSlider">
    <?php foreach ($heroSlides as $index => $slide): ?>
    <div class="hero-slide <?php echo $index === 0 ? 'active' : ''; ?>" data-slide="<?php echo $index; ?>">
        <div class="hero-slide-bg" style="background-image: url('<?php echo $slide['image']; ?>');"></div>
        <div class="hero-slide-overlay"></div>
        <div class="hero-slide-content">
            <h1><?php echo $slide['title']; ?></h1>
            <p><?php echo sanitize($slide['description']); ?></p>
            <?php if ($index === 0): ?>
            <div class="hero-cta">
                <a href="pages/businesses.php" class="btn btn-primary">Explore Our Products</a>
                <a href="pages/about.php" class="btn btn-secondary" style="border-color: #fff; color: #fff;">Learn More About Us</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
    
    <!-- Slider Controls -->
    <div class="slider-controls">
        <?php foreach ($heroSlides as $index => $slide): ?>
        <span class="slider-dot <?php echo $index === 0 ? 'active' : ''; ?>" data-slide="<?php echo $index; ?>"></span>
        <?php endforeach; ?>
    </div>
    
    <button class="slider-arrow prev" aria-label="Previous slide">‹</button>
    <button class="slider-arrow next" aria-label="Next slide">›</button>
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
// Hero Slider functionality
(function() {
    const slider = document.getElementById('heroSlider');
    const slides = slider.querySelectorAll('.hero-slide');
    const dots = slider.querySelectorAll('.slider-dot');
    const prevBtn = slider.querySelector('.slider-arrow.prev');
    const nextBtn = slider.querySelector('.slider-arrow.next');
    let currentSlide = 0;
    let slideInterval;
    
    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        currentSlide = (index + slides.length) % slides.length;
        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
    }
    
    function nextSlide() {
        showSlide(currentSlide + 1);
    }
    
    function prevSlide() {
        showSlide(currentSlide - 1);
    }
    
    function startAutoplay() {
        slideInterval = setInterval(nextSlide, 5000);
    }
    
    function stopAutoplay() {
        clearInterval(slideInterval);
    }
    
    // Event listeners
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            stopAutoplay();
            showSlide(index);
            startAutoplay();
        });
    });
    
    prevBtn.addEventListener('click', () => {
        stopAutoplay();
        prevSlide();
        startAutoplay();
    });
    
    nextBtn.addEventListener('click', () => {
        stopAutoplay();
        nextSlide();
        startAutoplay();
    });
    
    // Pause on hover
    slider.addEventListener('mouseenter', stopAutoplay);
    slider.addEventListener('mouseleave', startAutoplay);
    
    // Start autoplay
    startAutoplay();
})();

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
