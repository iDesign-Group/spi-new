<?php
/**
 * Shree Plastic Industries - Careers Page
 * Career opportunities and company culture
 */

require_once '../includes/config.php';

$page_title = 'Careers';
$page_description = 'Join our team at Shree Plastic Industries. Explore career opportunities and be part of our growing family.';

include '../includes/header.php';
?>

<style>
.careers-cta {
    background: linear-gradient(135deg, #0066CC, #2E5090);
    padding: 80px 0;
    text-align: center;
    color: #FFFFFF;
}

.careers-cta h2 {
    color: #FFFFFF;
    margin-bottom: 20px;
}

.careers-cta p {
    color: rgba(255, 255, 255, 0.9);
    max-width: 600px;
    margin: 0 auto 30px;
}

.values-section {
    padding: 80px 0;
}

.culture-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 50px;
}

.culture-card {
    text-align: center;
    padding: 40px 30px;
    background: #FFFFFF;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.culture-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.culture-icon {
    width: 70px;
    height: 70px;
    margin: 0 auto 20px;
    background: #F5F5F5;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0066CC;
}

.culture-icon svg {
    width: 35px;
    height: 35px;
}

.culture-card h3 {
    font-size: 20px;
    margin-bottom: 12px;
}

.culture-card p {
    color: #666666;
    font-size: 14px;
    line-height: 1.7;
}

@media (max-width: 991px) {
    .culture-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 575px) {
    .culture-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-bg" style="background: linear-gradient(135deg, #1A1A1A 0%, #2E5090 100%);"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="hero-content-inner">
            <h1 class="hero-quote">Careers</h1>
            <p class="hero-tagline">Grow With Us, Build Your Future</p>
        </div>
    </div>
</section>
<script>
// Load hero image if available
(function() {
    var img = new Image();
    img.onload = function() {
        document.querySelector('.hero-bg').style.backgroundImage = "url('../assets/images/heroes/careers-hero.jpg')";
    };
    img.src = '../assets/images/heroes/careers-hero.jpg';
})();
</script>

<!-- Introduction -->
<section class="intro-section">
    <div class="container">
        <div class="intro-content animate-on-scroll">
            <h2 class="intro-title">Join Our Team</h2>
            <p class="intro-text">
                At Shree Plastic Industries, we believe our people are our greatest asset. We foster a culture of 
                growth, innovation, and collaboration, providing our team members with opportunities to develop 
                their skills and advance their careers while making a meaningful impact.
            </p>
        </div>
    </div>
</section>

<!-- Our Culture -->
<section class="values-section bg-light">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2 class="section-title">Why Work With Us</h2>
            <p class="section-subtitle">
                Discover what makes Shree Plastic Industries a great place to build your career
            </p>
        </div>
        
        <div class="culture-grid">
            <div class="culture-card animate-on-scroll stagger-1">
                <div class="culture-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        <polyline points="17 6 23 6 23 12"></polyline>
                    </svg>
                </div>
                <h3>Growth Opportunities</h3>
                <p>Continuous learning and development programs to help you reach your full potential.</p>
            </div>
            
            <div class="culture-card animate-on-scroll stagger-2">
                <div class="culture-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3>Collaborative Environment</h3>
                <p>Work alongside talented professionals who support and inspire each other.</p>
            </div>
            
            <div class="culture-card animate-on-scroll stagger-3">
                <div class="culture-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                </div>
                <h3>Work-Life Balance</h3>
                <p>We value your well-being and support a healthy balance between work and personal life.</p>
            </div>
            
            <div class="culture-card animate-on-scroll stagger-4">
                <div class="culture-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="8" r="7"></circle>
                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                    </svg>
                </div>
                <h3>Recognition &amp; Rewards</h3>
                <p>Your contributions are valued and recognized with competitive compensation and benefits.</p>
            </div>
            
            <div class="culture-card animate-on-scroll stagger-5">
                <div class="culture-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path>
                    </svg>
                </div>
                <h3>Innovation Focus</h3>
                <p>Be part of a company that embraces innovation and sustainable practices.</p>
            </div>
            
            <div class="culture-card animate-on-scroll stagger-6">
                <div class="culture-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                </div>
                <h3>Family Values</h3>
                <p>Join a company that treats its employees like family, with care and respect.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="careers-cta">
    <div class="container">
        <div class="animate-on-scroll">
            <h2>Interested in Joining Us?</h2>
            <p>
                We're always looking for talented individuals who share our passion for excellence and sustainability. 
                Send us your resume and let's explore how we can grow together.
            </p>
            <a href="mailto:careers@shreeplasticindustries.com" class="btn btn-white">Send Your Resume</a>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
