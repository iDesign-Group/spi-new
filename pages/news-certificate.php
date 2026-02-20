<?php
/**
 * Shree Plastic Industries - News & Certificate Page
 * Company news, press releases, certificates and awards
 */

require_once '../includes/config.php';

$page_title = 'News & Certificate';
$page_description = 'Stay updated with the latest news, certificates, awards and press releases from Shree Plastic Industries.';

include '../includes/header.php';
?>

<style>
.news-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 50px;
}

.news-card {
    background: #FFFFFF;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.news-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.news-image {
    width: 100%;
    height: 200px;
    background: #F5F5F5;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #CCCCCC;
    overflow: hidden;
}

.news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.news-image svg {
    width: 60px;
    height: 60px;
}

.news-content {
    padding: 24px;
}

.news-date {
    font-size: 12px;
    color: #0066CC;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 12px;
}

.news-title {
    font-size: 18px;
    margin-bottom: 12px;
    line-height: 1.4;
}

.news-excerpt {
    color: #666666;
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 16px;
}

.news-link {
    font-size: 14px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.news-link svg {
    width: 16px;
    height: 16px;
    transition: transform 0.3s ease;
}

.news-link:hover svg {
    transform: translateX(4px);
}

/* Certificates & Awards Section */
.awards-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    margin-top: 50px;
}

.award-card {
    background: #FFFFFF;
    border-radius: 12px;
    padding: 30px 20px;
    text-align: center;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 102, 204, 0.1);
}

.award-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 30px rgba(0, 102, 204, 0.15);
    border-color: #0066CC;
}

.award-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    background: linear-gradient(135deg, rgba(0, 102, 204, 0.1), rgba(46, 80, 144, 0.1));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0066CC;
}

.award-icon svg {
    width: 40px;
    height: 40px;
}

.award-icon img {
    width: 60px;
    height: 60px;
    object-fit: contain;
}

.award-card h4 {
    font-size: 16px;
    margin-bottom: 8px;
    color: #1A1A1A;
}

.award-card p {
    font-size: 13px;
    color: #666666;
    line-height: 1.5;
}

.award-year {
    display: inline-block;
    background: #0066CC;
    color: #fff;
    font-size: 11px;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 20px;
    margin-top: 12px;
}

/* Media Kit Section */
.media-kit-section {
    background: linear-gradient(135deg, #1A1A1A, #2E2E2E);
    padding: 100px 0;
}

.media-kit-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 50px;
}

.media-kit-card {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 40px 30px;
    text-align: center;
    transition: all 0.3s ease;
}

.media-kit-card:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: #0066CC;
    transform: translateY(-4px);
}

.media-kit-icon {
    width: 60px;
    height: 60px;
    margin: 0 auto 24px;
    color: #0066CC;
}

.media-kit-card h4 {
    color: #FFFFFF;
    font-size: 18px;
    margin-bottom: 12px;
}

.media-kit-card p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 20px;
}

.media-kit-card .btn {
    padding: 10px 24px;
    font-size: 13px;
}

/* Publications Grid */
.publications-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    margin-top: 50px;
}

.publication-card {
    display: flex;
    background: #FFFFFF;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.publication-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.publication-image {
    flex: 0 0 180px;
    background: #F5F5F5;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #CCCCCC;
}

.publication-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.publication-content {
    padding: 24px;
    flex: 1;
}

.publication-source {
    font-size: 11px;
    color: #0066CC;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 8px;
}

.publication-title {
    font-size: 16px;
    margin-bottom: 8px;
    line-height: 1.4;
}

.publication-date {
    font-size: 12px;
    color: #999999;
    margin-bottom: 12px;
}

.publication-excerpt {
    color: #666666;
    font-size: 13px;
    line-height: 1.6;
}

@media (max-width: 991px) {
    .news-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .awards-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .media-kit-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .publications-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 575px) {
    .news-grid {
        grid-template-columns: 1fr;
    }
    .awards-grid {
        grid-template-columns: 1fr;
    }
    .media-kit-grid {
        grid-template-columns: 1fr;
    }
    .publication-card {
        flex-direction: column;
    }
    .publication-image {
        flex: none;
        height: 180px;
    }
}
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-bg" style="background: linear-gradient(135deg, #1A1A1A 0%, #2E5090 100%);"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-quote">News &amp; Certificate</h1>
        <p class="hero-tagline">Our Achievements, Certifications &amp; Latest Updates</p>
    </div>
</section>

<!-- Introduction -->
<section class="intro-section">
    <div class="container">
        <div class="intro-content animate-on-scroll">
            <h2 class="intro-title">Latest from Shree Plastic Industries</h2>
            <p class="intro-text">
                Stay informed about our latest developments, industry certifications, and company milestones. 
                From new product launches to sustainability initiatives, find all our updates here.
            </p>
        </div>
    </div>
</section>

<!-- Certificates & Awards Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2 class="section-title">Certificates &amp; Awards</h2>
            <p class="section-subtitle">
                Recognition of our commitment to quality and excellence
            </p>
        </div>
        
        <?php
        // Awards and certificates data - Add your certificates here
        $awards = [
            [
                'title' => 'ISO 9001:2015',
                'description' => 'Quality Management System Certification',
                'year' => '2020',
                'icon' => 'certificate'
            ],
            [
                'title' => 'ISO 17088',
                'description' => 'Compostable Plastics Certification',
                'year' => '2021',
                'icon' => 'leaf'
            ],
            [
                'title' => 'Excellence Award',
                'description' => 'Industry Excellence in Manufacturing',
                'year' => '2023',
                'icon' => 'award'
            ],
            [
                'title' => 'Green Initiative',
                'description' => 'Environmental Sustainability Recognition',
                'year' => '2024',
                'icon' => 'globe'
            ]
        ];
        
        // Icon function for awards
        function getAwardIcon($type) {
            $icons = [
                'certificate' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M7 7h10M7 12h10M7 17h6"/></svg>',
                'leaf' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6.5 21.5s6-5.5 6-10.5c0-4-3-7-7-7 0 4.5 1.5 10 1 17.5z"/><path d="M17.5 21.5s-6-5.5-6-10.5c0-4 3-7 7-7 0 4.5-1.5 10-1 17.5z"/></svg>',
                'award' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>',
                'globe' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>'
            ];
            return $icons[$type] ?? $icons['certificate'];
        }
        ?>
        
        <div class="awards-grid">
            <?php foreach ($awards as $index => $award): ?>
            <div class="award-card animate-on-scroll stagger-<?php echo ($index % 4) + 1; ?>">
                <div class="award-icon">
                    <?php echo getAwardIcon($award['icon']); ?>
                </div>
                <h4><?php echo sanitize($award['title']); ?></h4>
                <p><?php echo sanitize($award['description']); ?></p>
                <span class="award-year"><?php echo sanitize($award['year']); ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Recent News Section -->
<section class="section">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2 class="section-title">Recent News</h2>
            <p class="section-subtitle">
                Company updates and announcements
            </p>
        </div>
        
        <?php
        $newsItems = [
            [
                'date' => 'Coming Soon',
                'title' => 'Expansion Plans Announced',
                'excerpt' => 'Stay tuned for exciting announcements about our growth and expansion plans.',
                'image' => null,
                'link' => null
            ],
            [
                'date' => 'Coming Soon',
                'title' => 'Sustainability Milestones',
                'excerpt' => 'Updates on our journey towards more sustainable manufacturing practices.',
                'image' => null,
                'link' => null
            ],
            [
                'date' => 'Coming Soon',
                'title' => 'New Product Launch',
                'excerpt' => 'Information about our latest product innovations and offerings.',
                'image' => null,
                'link' => null
            ]
        ];
        ?>
        
        <div class="news-grid">
            <?php foreach ($newsItems as $index => $news): ?>
            <div class="news-card animate-on-scroll stagger-<?php echo ($index % 3) + 1; ?>">
                <div class="news-image">
                    <?php if ($news['image']): ?>
                    <img src="<?php echo $basePath; ?>assets/images/news/<?php echo $news['image']; ?>" 
                         alt="<?php echo sanitize($news['title']); ?>" loading="lazy">
                    <?php else: ?>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                    <?php endif; ?>
                </div>
                <div class="news-content">
                    <p class="news-date"><?php echo sanitize($news['date']); ?></p>
                    <h3 class="news-title"><?php echo sanitize($news['title']); ?></h3>
                    <p class="news-excerpt"><?php echo sanitize($news['excerpt']); ?></p>
                    <?php if ($news['link']): ?>
                    <a href="<?php echo sanitize($news['link']); ?>" class="news-link">
                        Read More
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Publications Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-header animate-on-scroll">
            <h2 class="section-title">Press Coverage &amp; Publications</h2>
            <p class="section-subtitle">
                News articles and features about Shree Plastic Industries
            </p>
        </div>
        
        <?php
        $publications = [
            [
                'source' => 'Industry Magazine',
                'title' => 'Publication Coming Soon',
                'date' => 'TBA',
                'excerpt' => 'Featured articles about our manufacturing excellence and industry contributions will be listed here.',
                'image' => null,
                'link' => null
            ],
            [
                'source' => 'Business News',
                'title' => 'Publication Coming Soon',
                'date' => 'TBA',
                'excerpt' => 'Press coverage and media features will be showcased in this section.',
                'image' => null,
                'link' => null
            ]
        ];
        ?>
        
        <div class="publications-grid">
            <?php foreach ($publications as $index => $pub): ?>
            <div class="publication-card animate-on-scroll stagger-<?php echo ($index % 2) + 1; ?>">
                <div class="publication-image">
                    <?php if ($pub['image']): ?>
                    <img src="<?php echo $basePath; ?>assets/images/publications/<?php echo $pub['image']; ?>" 
                         alt="<?php echo sanitize($pub['title']); ?>" loading="lazy">
                    <?php else: ?>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" style="width:50px;height:50px;">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                    <?php endif; ?>
                </div>
                <div class="publication-content">
                    <p class="publication-source"><?php echo sanitize($pub['source']); ?></p>
                    <h3 class="publication-title"><?php echo sanitize($pub['title']); ?></h3>
                    <p class="publication-date"><?php echo sanitize($pub['date']); ?></p>
                    <p class="publication-excerpt"><?php echo sanitize($pub['excerpt']); ?></p>
                    <?php if ($pub['link']): ?>
                    <a href="<?php echo sanitize($pub['link']); ?>" class="news-link" target="_blank">
                        Read Article
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Media Kit Section -->
<section class="media-kit-section">
    <div class="container">
        <div class="section-header animate-on-scroll text-center">
            <h2 class="section-title" style="color: #FFFFFF;">Media Kit</h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.7);">
                Download our brand assets and company resources
            </p>
        </div>
        
        <div class="media-kit-grid">
            <div class="media-kit-card animate-on-scroll stagger-1">
                <div class="media-kit-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <path d="M21 15l-5-5L5 21"/>
                    </svg>
                </div>
                <h4>Logo Package</h4>
                <p>Download our official logos in various formats (PNG, SVG, EPS)</p>
                <a href="<?php echo $basePath; ?>assets/downloads/spi-logo-package.zip" class="btn btn-primary" download>Download</a>
            </div>
            
            <div class="media-kit-card animate-on-scroll stagger-2">
                <div class="media-kit-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                </div>
                <h4>Company Profile</h4>
                <p>Comprehensive overview of our company, history, and capabilities</p>
                <a href="<?php echo $basePath; ?>assets/downloads/spi-company-profile.pdf" class="btn btn-primary" download>Download PDF</a>
            </div>
            
            <div class="media-kit-card animate-on-scroll stagger-3">
                <div class="media-kit-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 20h9"/>
                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                    </svg>
                </div>
                <h4>Brand Guidelines</h4>
                <p>Usage guidelines for our brand identity and visual standards</p>
                <a href="<?php echo $basePath; ?>assets/downloads/spi-brand-guidelines.pdf" class="btn btn-primary" download>Download PDF</a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section bg-light">
    <div class="container text-center">
        <div class="animate-on-scroll">
            <h2>Media Inquiries</h2>
            <p class="section-subtitle mb-4">
                For press inquiries, interview requests, or media-related questions, please contact us.
            </p>
            <a href="mailto:media@shreeplasticindustries.com" class="btn btn-primary">Contact Media Team</a>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
