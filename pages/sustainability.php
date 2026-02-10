<?php
/**
 * Shree Plastic Industries - Sustainability Page
 * Leadership vision with alternating content sections
 */

require_once '../includes/config.php';

$page_title = 'Sustainability';
$page_description = 'Discover our commitment to sustainability - From eco-friendly products to green manufacturing practices.';

// Load sustainability data
$content = loadJsonData('content');
$sustainability = $content['sustainability'] ?? [];
$leadership = $content['leadership'] ?? [];

include '../includes/header.php';
?>

<style>
/* Sustainability Page Specific Styles */
.sustainability-hero {
    background-attachment: fixed;
}

.leader-section {
    padding: 100px 0;
}

.leader-section:nth-child(even) {
    background-color: #F5F5F5;
}

.leader-content {
    display: flex;
    align-items: center;
    gap: 60px;
}

.leader-content.reverse {
    flex-direction: row-reverse;
}

.leader-image {
    flex: 0 0 35%;
    position: relative;
}

.leader-image img {
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
}

.leader-image::after {
    content: '';
    position: absolute;
    bottom: -20px;
    left: -20px;
    right: 20px;
    top: 20px;
    border: 0px solid #ffffff;
    border-radius: 8px;
    z-index: -1;
}

.leader-content.reverse .leader-image::after {
    left: 20px;
    right: -20px;
}

.leader-text {
    flex: 1;
}

.leader-quote {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-style: italic;
    color: #1A1A1A;
    line-height: 1.5;
    margin-bottom: 24px;
    position: relative;
    padding-left: 30px;
}

.leader-quote::before {
    content: '"';
    position: absolute;
    left: 0;
    top: -10px;
    font-size: 60px;
    color: #0066CC;
    opacity: 0.3;
    font-family: Georgia, serif;
}

.leader-attribution {
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    color: #0066CC;
    font-size: 16px;
    margin-bottom: 24px;
}

.leader-description {
    color: #666666;
    line-height: 1.8;
}

/* Commitments Section */
.commitments-section {
    background: linear-gradient(135deg, rgba(0, 102, 204, 0.95), rgba(46, 80, 144, 0.95)),
                url('../assets/images/heroes/sustainability-bg.jpg') center/cover;
    padding: 100px 0;
    color: #FFFFFF;
}

.commitments-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 50px;
}

.commitment-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 30px;
    border-radius: 8px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.commitment-card:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: translateY(-4px);
}

.commitment-icon {
    width: 50px;
    height: 50px;
    margin-bottom: 20px;
    color: #FFFFFF;
}

.commitment-card h4 {
    color: #FFFFFF;
    font-size: 18px;
    margin-bottom: 12px;
}

.commitment-card p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    line-height: 1.7;
}

/* Pledge Section */
.pledge-section {
    background: #1A1A1A;
    padding: 80px 0;
    text-align: center;
}

.pledge-content {
    max-width: 800px;
    margin: 0 auto;
}

.pledge-title {
    color: #0066CC;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 3px;
    margin-bottom: 20px;
}

.pledge-text {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    font-style: italic;
    color: #FFFFFF;
    line-height: 1.5;
    margin-bottom: 30px;
}

.pledge-tagline {
    color: rgba(255, 255, 255, 0.7);
    font-size: 16px;
}

/* Responsive */
@media (max-width: 991px) {
    .leader-content,
    .leader-content.reverse {
        flex-direction: column;
    }
    
    .leader-image {
        flex: none;
        width: 60%;
        margin: 0 auto 40px;
    }
    
    .leader-image::after {
        display: none;
    }
    
    .leader-text {
        text-align: center;
    }
    
    .leader-quote {
        padding-left: 0;
        font-size: 24px;
    }
    
    .leader-quote::before {
        display: none;
    }
    
    .commitments-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 575px) {
    .leader-image {
        width: 80%;
    }
    
    .leader-quote {
        font-size: 20px;
    }
    
    .commitments-grid {
        grid-template-columns: 1fr;
    }
    
    .pledge-text {
        font-size: 24px;
    }
}
</style>

<!-- Hero Section -->
<section class="hero sustainability-hero">
    <div class="hero-bg parallax-bg" style="background: linear-gradient(135deg, #1A1A1A 0%, #2E5090 100%);"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-quote">Sustainability</h1>
        <p class="hero-tagline">Building a Greener Tomorrow, Today</p>
    </div>
</section>
<script>
// Load hero image if available
(function() {
    var img = new Image();
    img.onload = function() {
        document.querySelector('.hero-bg').style.backgroundImage = "url('../assets/images/heroes/sustainability-hero.jpg')";
    };
    img.src = '../assets/images/heroes/sustainability-hero.jpg';
})();
</script>

<!-- Introduction -->
<section class="intro-section">
    <div class="container">
        <div class="intro-content animate-on-scroll">
            <h2 class="intro-title">Our Commitment to the Planet</h2>
            <p class="intro-text">
                At Shree Plastic Industries, we recognize that true business success is measured not just in profits, 
                but in our positive impact on the environment and communities we serve. Our commitment to sustainability 
                is woven into every aspect of our operations, from material sourcing to manufacturing processes and 
                product lifecycle management.
            </p>
        </div>
    </div>
</section>

<!-- Leadership Vision - Nimesh Shah -->
<section class="leader-section">
    <div class="container">
        <div class="leader-content animate-on-scroll">
            <div class="leader-image">
                <img src="<?php echo $basePath; ?>assets/images/team/nimesh-shah.jpg" alt="Mr. Nimesh Shah - Director"
                     onerror="this.src='<?php echo $basePath; ?>assets/images/placeholder-person.jpg';">
            </div>
            <div class="leader-text">
                <h3 class="leader-attribution">Mr. Nimesh Shah, Director</h3>
                <blockquote class="leader-quote">
                    "Our prosperity is to ensure care for our Mother Earth and the welfare of our people."
                </blockquote>
                <p class="leader-description">
                    At Shree Plastic Industries, we recognize that true business success is measured not just in 
                    profits, but in our positive impact on the environment and communities we serve. Our commitment 
                    to sustainability is woven into every aspect of our operations, from material sourcing to 
                    manufacturing processes and product lifecycle management.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Vision - Milan Shah -->
<section class="leader-section">
    <div class="container">
        <div class="leader-content reverse animate-on-scroll">
            <div class="leader-image">
                <img src="<?php echo $basePath; ?>assets/images/team/milan-shah.jpg" alt="Mr. Milan Shah - Director"
                     onerror="this.src='<?php echo $basePath; ?>assets/images/placeholder-person.jpg';">
            </div>
            <div class="leader-text">
                <h3 class="leader-attribution">Mr. Milan Shah, Director</h3>
                <blockquote class="leader-quote">
                    "It begins from home. The world is entering a new energy era. The age of fossil fuels, 
                    which powered economic growth for nearly three centuries, cannot continue much longer. 
                    Transition to the new era of green, clean, and renewable energy is imperative."
                </blockquote>
                <p class="leader-description">
                    We stand at the threshold of transformation. At Shree Plastic Industries, we are pioneering 
                    the shift toward sustainable manufacturing practices, embracing biodegradable materials, and 
                    investing in clean energy solutions that will define the future of our industry.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Our Commitments -->
<section class="commitments-section">
    <div class="container">
        <div class="section-header text-center animate-on-scroll">
            <h2 class="section-title" style="color: #FFFFFF;">Our Sustainability Commitments</h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.8);">
                Each of our initiatives contributes to a greener, more sustainable future
            </p>
        </div>
        
        <div class="commitments-grid">
            <?php 
            $commitmentIcons = [
                '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>',
                '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>',
                '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>',
                '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
                '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
                '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>'
            ];
            
            if (!empty($sustainability['commitments'])): 
                foreach ($sustainability['commitments'] as $index => $commitment): 
            ?>
            <div class="commitment-card animate-on-scroll stagger-<?php echo ($index % 6) + 1; ?>">
                <div class="commitment-icon">
                    <?php echo $commitmentIcons[$index % count($commitmentIcons)]; ?>
                </div>
                <p><?php echo sanitize($commitment); ?></p>
            </div>
            <?php 
                endforeach; 
            endif; 
            ?>
        </div>
    </div>
</section>

<!-- Our Pledge -->
<section class="pledge-section">
    <div class="container">
        <div class="pledge-content animate-on-scroll">
            <p class="pledge-title">Our Pledge to Future Generations</p>
            <p class="pledge-text">
                "<?php echo sanitize($sustainability['pledge'] ?? 'We pledge to educate and lead people from Industrial Civilization to an Ecological Civilization.'); ?>"
            </p>
            <p class="pledge-tagline">
                This is not just our promise—it's our responsibility. Together, we are building a sustainable future, one innovation at a time.
            </p>
        </div>
    </div>
</section>

<!-- Closing Quote -->
<section class="section">
    <div class="container">
        <div class="quote-block animate-on-scroll">
            <p class="quote-text">
                "<?php echo sanitize($sustainability['closingQuote'] ?? 'We Believe, Therefore We Can. Shree Plastic Industries has the spirit of Quality & Vision that quality always pays.'); ?>"
            </p>
            <p class="quote-author">— <?php echo sanitize($sustainability['closingAuthors'] ?? 'Nimesh Shah & Milan Shah'); ?></p>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
