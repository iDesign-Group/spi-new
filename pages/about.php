<?php
/**
 * Shree Plastic Industries - About Page
 * Detailed about section with values and company information
 */

require_once '../includes/config.php';

$page_title = 'About Us';
$page_description = 'Learn about Shree Plastic Industries - Our history, values, and commitment to excellence in plastic manufacturing since 1984.';

// Load content data
$content = loadJsonData('content');
$values = $content['values'] ?? [];

include '../includes/header.php';

// Helper function to get SVG icons for values
function getValueIcon($iconName) {
    $icons = [
        'ethics' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            <path d="M9 12l2 2 4-4"></path>
        </svg>',
        'excellence' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="8" r="7"></circle>
            <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
        </svg>',
        'innovation' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path>
            <circle cx="12" cy="12" r="4"></circle>
        </svg>',
        'sustainability' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
            <path d="M7 12s2-3 5-3 5 3 5 3"></path>
            <path d="M12 9v6"></path>
        </svg>',
        'improvement' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
            <polyline points="17 6 23 6 23 12"></polyline>
        </svg>',
        'team' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
        </svg>'
    ];
    
    return $icons[$iconName] ?? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle></svg>';
}
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-bg" style="background: linear-gradient(135deg, #1A1A1A 0%, #2E5090 100%);"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-quote">"Believe in Yourself"</h1>
        <p class="hero-tagline"><?php echo SITE_NAME; ?> is a distinguished name in Indian plastic industry</p>
    </div>
</section>
<script>
// Load hero image if available
(function() {
    var img = new Image();
    img.onload = function() {
        document.querySelector('.hero-bg').style.backgroundImage = "url('../assets/images/heroes/about-hero.jpg')";
    };
    img.src = '../assets/images/heroes/about-hero.jpg';
})();
</script>

<!-- Introduction Section -->
<section class="intro-section">
    <div class="container">
        <div class="intro-content animate-on-scroll">
            <h2 class="intro-title">"Believe in Yourself" — Our Driving Philosophy</h2>
            <p class="intro-text">
                Welcome to Shree Plastic Industries, a distinguished name in India's plastic manufacturing landscape. 
                Since our establishment in <?php echo SITE_ESTABLISHED; ?>, we have been at the forefront of delivering 
                premium-quality plastic products and innovative packaging solutions to businesses across the nation. 
                Rooted in the industrial hub of Pune, Maharashtra, we have grown from a modest manufacturing unit to 
                a comprehensive plastic solutions provider, serving diverse industries with unwavering commitment to excellence.
            </p>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2 class="section-title">Our Values & Behaviours</h2>
            <p class="section-subtitle">
                The principles that guide everything we do at Shree Plastic Industries
            </p>
        </div>
        
        <div class="values-grid">
            <?php foreach ($values as $index => $value): ?>
            <div class="value-card animate-on-scroll stagger-<?php echo ($index % 6) + 1; ?>">
                <div class="value-icon">
                    <?php echo getValueIcon($value['icon']); ?>
                </div>
                <h3 class="value-title"><?php echo sanitize($value['title']); ?></h3>
                <p class="value-description"><?php echo sanitize($value['description']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Legacy Section -->
<section class="section">
    <div class="container">
        <div class="alt-section animate-on-scroll">
            <div class="alt-image">
                <img src="<?php echo $basePath; ?>assets/images/about/factory.jpg" alt="Shree Plastic Industries"
                     onerror="this.style.display='none'; this.parentElement.innerHTML='<div style=\"width:100%;height:300px;background:linear-gradient(135deg,#f5f5f5,#e0e0e0);display:flex;align-items:center;justify-content:center;border-radius:8px;color:#999;\"><span>Mr. Nitin Shah</span></div>
            </div>
            <div class="alt-content">
                <h2 class="alt-title">Four Decades of Excellence</h2>
                <p class="alt-text">
                    Since 1984, Shree Plastic Industries has been synonymous with quality and innovation in the 
                    Indian plastic manufacturing sector. Our journey began with a vision to deliver excellence, 
                    and today, we continue to uphold the same commitment that our founder, Mr. Nitin Shah, 
                    instilled in our company culture.
                </p>
                <p class="alt-text">
                    Under the leadership of Mr. Nimesh Shah and Mr. Milan Shah, we have expanded our capabilities 
                    while maintaining our core values of integrity, quality, and customer satisfaction.
                </p>
                <a href="history.php" class="btn btn-primary">Explore Our History</a>
            </div>
        </div>
    </div>
</section>



<!-- Closing Quote -->
<section class="section">
    <div class="container">
        <div class="quote-block animate-on-scroll">
            <p class="quote-text">
                "We Believe, Therefore We Can. Shree Plastic Industries has the spirit of Quality & Vision 
                that quality always pays."
            </p>
            <p class="quote-author">— Nimesh Shah & Milan Shah</p>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>

