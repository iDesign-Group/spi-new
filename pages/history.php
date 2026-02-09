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
/* Timeline Specific Styles */
.timeline-section {
    padding: 80px 0;
    background: linear-gradient(to bottom, #FFFFFF 0%, #F5F5F5 100%);
}

.timeline {
    position: relative;
    max-width: 1000px;
    margin: 0 auto;
    padding: 40px 20px;
}

/* Vertical line on the left side */
.timeline::before {
    content: '';
    position: absolute;
    top: 0;
    left: 60px;
    width: 3px;
    height: 100%;
    background: linear-gradient(to bottom, #0066CC, #2E5090);
    border-radius: 3px;
}

.timeline-item {
    position: relative;
    width: 100%;
    padding: 0 20px 40px 100px;
    margin-bottom: 0;
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease;
}

.timeline-item.animate-in {
    opacity: 1;
    transform: translateY(0);
}

/* Timeline marker on the left line */
.timeline-marker {
    position: absolute;
    top: 30px;
    left: 51px;
    width: 20px;
    height: 20px;
    background: #0066CC;
    border: 4px solid #FFFFFF;
    border-radius: 50%;
    box-shadow: 0 0 0 4px rgba(0, 102, 204, 0.2);
    z-index: 1;
    transform: scale(0);
    transition: transform 0.4s ease 0.3s;
}

.timeline-item.animate-in .timeline-marker {
    transform: scale(1);
}

.timeline-card {
    background: #FFFFFF;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    cursor: pointer;
    text-align: left;
}

.timeline-card:hover {
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    transform: translateY(-4px);
}

.timeline-period {
    display: inline-block;
    background: linear-gradient(135deg, #0066CC, #2E5090);
    color: #FFFFFF;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 16px;
}

.timeline-title {
    font-size: 24px;
    color: #1A1A1A;
    margin-bottom: 8px;
}

.timeline-subtitle {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    color: #0066CC;
    margin-bottom: 16px;
}

.timeline-content p {
    color: #666666;
    line-height: 1.8;
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
    list-style: none;
    padding-left: 0;
}

.timeline-highlights li {
    position: relative;
    padding-left: 20px;
    margin-bottom: 8px;
    color: #666666;
    font-size: 14px;
}

.timeline-highlights li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: #0066CC;
    font-weight: 600;
}

/* Mobile Timeline */
@media (max-width: 768px) {
    .timeline {
        padding: 40px 15px;
    }
    
    .timeline::before {
        left: 25px;
    }
    
    .timeline-item {
        padding: 0 15px 30px 60px;
    }
    
    .timeline-marker {
        left: 16px;
    }
    
    .timeline-title {
        font-size: 20px;
    }
    
    .timeline-card {
        padding: 20px;
    }
}
</style>


<!-- Hero Section -->
<section class="hero">
    <div class="hero-bg" style="background: linear-gradient(135deg, #1A1A1A 0%, #2E5090 100%);"></div>
    <div class="hero-bg" style="background-image: url('../assets/images/heroes/history-hero.jpg');"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-quote">Our Journey</h1>
        <p class="hero-tagline">Four Decades of Excellence, Innovation & Growth</p>
    </div>
</section>

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
