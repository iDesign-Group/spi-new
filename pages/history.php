<?php
/**
 * Shree Plastic Industries - History Page
 * RIL-style interactive vertical timeline
 */

require_once '../includes/config.php';

$page_title = 'Our History';
$page_description = 'Explore the journey of Shree Plastic Industries from 1984 to present - A story of vision, growth, and excellence.';
$page_js = 'assets/js/timeline.js';

// Load timeline data
$content = loadJsonData('content');
$timeline = $content['timeline'] ?? [];

include '../includes/header.php';
?>

<style>
/* Timeline Specific Styles - Straight Vertical Line on Left */
.timeline-section {
    padding: 80px 0;
    background: linear-gradient(to bottom, #FFFFFF 0%, #F5F5F5 100%);
}

.timeline {
    position: relative !important;
    max-width: 900px !important;
    margin: 0 auto !important;
    padding: 20px 20px 20px 50px !important;
}

/* Blue vertical line on the left */
.timeline::before {
    content: '' !important;
    position: absolute !important;
    top: 0 !important;
    left: 20px !important;
    width: 4px !important;
    height: 100% !important;
    background: linear-gradient(to bottom, #0066CC, #2E5090) !important;
    border-radius: 4px !important;
    transform: none !important;
}

/* All timeline items on the RIGHT of the blue line */
.timeline-item,
.timeline-item:nth-child(odd),
.timeline-item:nth-child(even) {
    position: relative !important;
    width: 100% !important;
    left: 0 !important;
    right: auto !important;
    padding: 0 0 50px 50px !important;
    text-align: left !important;
    margin-left: 0 !important;
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease;
}

.timeline-item:last-child {
    padding-bottom: 0 !important;
}

.timeline-item.animate-in {
    opacity: 1;
    transform: translateY(0);
}

/* Timeline marker - sits ON the blue line */
.timeline-marker,
.timeline-item:nth-child(odd) .timeline-marker,
.timeline-item:nth-child(even) .timeline-marker {
    position: absolute !important;
    top: 5px !important;
    left: 10px !important;
    right: auto !important;
    width: 24px !important;
    height: 24px !important;
    background: #0066CC !important;
    border: 4px solid #FFFFFF !important;
    border-radius: 50% !important;
    box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.2) !important;
    z-index: 2 !important;
    transform: scale(0);
    transition: transform 0.4s ease 0.3s;
}

.timeline-item.animate-in .timeline-marker {
    transform: scale(1) !important;
}

/* Timeline card - on the right side */
.timeline-card {
    background: #FFFFFF !important;
    padding: 30px !important;
    border-radius: 12px !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important;
    transition: all 0.3s ease !important;
    border-left: 4px solid #0066CC !important;
    text-align: left !important;
    margin-left: 0 !important;
}

.timeline-card:hover {
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12) !important;
    transform: translateX(8px) !important;
}

.timeline-period {
    display: inline-block;
    background: linear-gradient(135deg, #0066CC, #2E5090);
    color: #FFFFFF;
    padding: 8px 20px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 16px;
}

.timeline-title {
    font-size: 24px;
    color: #1A1A1A;
    margin-bottom: 8px;
    text-align: left !important;
}

.timeline-subtitle {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    color: #0066CC;
    margin-bottom: 16px;
    font-size: 16px;
    text-align: left !important;
}

.timeline-content p {
    color: #666666;
    line-height: 1.8;
    text-align: left !important;
}

.timeline-image {
    margin-top: 20px;
    border-radius: 8px;
    overflow: hidden;
}

.timeline-image img {
    width: 100%;
    height: auto;
}

.timeline-highlights {
    margin-top: 16px;
    padding-top: 16px;
    border-top: 1px solid #E0E0E0;
    text-align: left !important;
}

.timeline-highlights li {
    position: relative;
    padding-left: 24px;
    margin-bottom: 10px;
    color: #666666;
    font-size: 14px;
    line-height: 1.6;
    text-align: left !important;
}

.timeline-highlights li::before {
    content: '\2713';
    position: absolute;
    left: 0;
    color: #0066CC;
    font-weight: 600;
}

/* Tablet */
@media (max-width: 991px) {
    .timeline {
        max-width: 100% !important;
        padding: 20px 15px 20px 45px !important;
    }
    
    .timeline::before {
        left: 18px !important;
    }
    
    .timeline-marker,
    .timeline-item:nth-child(odd) .timeline-marker,
    .timeline-item:nth-child(even) .timeline-marker {
        left: 8px !important;
    }
    
    .timeline-item,
    .timeline-item:nth-child(odd),
    .timeline-item:nth-child(even) {
        padding: 0 0 40px 45px !important;
    }
}

/* Mobile */
@media (max-width: 575px) {
    .timeline {
        padding: 20px 10px 20px 35px !important;
    }
    
    .timeline::before {
        left: 12px !important;
        width: 3px !important;
    }
    
    .timeline-item,
    .timeline-item:nth-child(odd),
    .timeline-item:nth-child(even) {
        padding: 0 0 35px 35px !important;
    }
    
    .timeline-marker,
    .timeline-item:nth-child(odd) .timeline-marker,
    .timeline-item:nth-child(even) .timeline-marker {
        left: 2px !important;
        width: 20px !important;
        height: 20px !important;
    }
    
    .timeline-card {
        padding: 20px !important;
    }
    
    .timeline-title {
        font-size: 18px;
    }
    
    .timeline-period {
        font-size: 12px;
        padding: 6px 14px;
    }
}
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-bg" style="background-image: linear-gradient(135deg, #1A1A1A 0%, #2E5090 100%); background-size: cover; background-position: center center; background-repeat: no-repeat;"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-quote">Our Journey</h1>
        <p class="hero-tagline">Four Decades of Excellence, Innovation & Growth</p>
    </div>
</section>
<script>
(function() {
    var bg = document.querySelector('.hero-bg');
    var img = new Image();
    img.onload = function() {
        bg.style.backgroundImage = "url('../assets/images/heroes/history-hero.jpg')";
        bg.style.backgroundPosition = 'center center';
        bg.style.backgroundSize = 'cover';
        bg.style.backgroundRepeat = 'no-repeat';
    };
    img.src = '../assets/images/heroes/history-hero.jpg';
})();
</script>

<!-- Timeline Introduction -->
<section class="intro-section">
    <div class="container">
        <div class="intro-content animate-on-scroll">
            <h2 class="intro-title">A Legacy Built on Vision</h2>
            <p class="intro-text">
                From humble beginnings in 1984 to becoming a leading name in India's plastic manufacturing industry, 
                our journey is a testament to visionary leadership, unwavering commitment to quality, and the spirit 
                of continuous improvement.
            </p>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="timeline-section">
    <div class="container">
        <div class="timeline">
            <?php foreach ($timeline as $index => $item): ?>
            <div class="timeline-item" data-period="<?php echo sanitize($item['period']); ?>">
                <div class="timeline-marker"></div>
                <div class="timeline-card">
                    <span class="timeline-period"><?php echo sanitize($item['period']); ?></span>
                    <h3 class="timeline-title"><?php echo sanitize($item['title']); ?></h3>
                    <p class="timeline-subtitle"><?php echo sanitize($item['subtitle']); ?></p>
                    <div class="timeline-content">
                        <p><?php echo sanitize($item['description']); ?></p>
                    </div>
                    <?php if (!empty($item['highlights'])): ?>
                    <ul class="timeline-highlights">
                        <?php foreach ($item['highlights'] as $highlight): ?>
                        <li><?php echo sanitize($highlight); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
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
