# Shree Plastic Industries - Website Manual

## Table of Contents
1. [Overview](#overview)
2. [File Structure](#file-structure)
3. [Configuration](#configuration)
4. [Pages Overview](#pages-overview)
5. [Image Requirements](#image-requirements)
6. [Video Requirements](#video-requirements)
7. [Content Management](#content-management)
8. [Google Analytics & Webmaster Tools](#google-analytics--webmaster-tools)
9. [WhatsApp Integration](#whatsapp-integration)
10. [Adding New Content](#adding-new-content)
11. [Troubleshooting](#troubleshooting)

---

## Overview

**Website:** Shree Plastic Industries Corporate Website  
**Technology:** PHP, HTML5, CSS3, JavaScript  
**Established:** 1984  
**Location:** Pisoli, Undri, Pune, Maharashtra, India

### Key Features
- Responsive design (mobile, tablet, desktop)
- Video hero section on homepage
- Animated flip cards
- WhatsApp floating button on all pages
- Google Analytics integration
- SEO optimized

---

## File Structure

```
spi/
├── index.php                    # Homepage (Video hero + Why Choose Us)
├── intro.php                    # Splash/Intro page with 3D logo animation
├── .htaccess                    # URL rewriting and security
│
├── includes/
│   ├── config.php               # Site configuration constants
│   ├── header.php               # Common header (navigation, meta tags)
│   └── footer.php               # Common footer
│
├── pages/
│   ├── about.php                # About Us page
│   ├── history.php              # Company history/timeline
│   ├── businesses.php           # Products and services
│   ├── sustainability.php       # Sustainability initiatives
│   ├── careers.php              # Career opportunities
│   └── news-media.php           # News, awards, media kit
│
├── assets/
│   ├── css/
│   │   ├── main.css             # Primary styles
│   │   ├── responsive.css       # Mobile/tablet styles
│   │   └── animations.css       # Animation keyframes
│   │
│   ├── js/
│   │   ├── main.js              # Core JavaScript
│   │   ├── timeline.js          # History page timeline
│   │   └── flipcards.js         # Flip card animations
│   │
│   ├── images/                  # All website images
│   │   ├── logo.png
│   │   ├── logo-white.png
│   │   ├── favicon.ico
│   │   ├── heroes/              # Hero/banner images
│   │   ├── team/                # Team member photos
│   │   ├── about/               # About page images
│   │   ├── products/            # Product images
│   │   ├── timeline/            # History timeline images
│   │   ├── news/                # News article images
│   │   └── publications/        # Press coverage images
│   │
│   ├── videos/
│   │   └── hero-video.mp4       # Homepage background video
│   │
│   ├── downloads/               # Downloadable files
│   │   ├── spi-logo-package.zip
│   │   ├── spi-company-profile.pdf
│   │   └── spi-brand-guidelines.pdf
│   │
│   └── data/
│       └── content.json         # Dynamic content data
│
└── WEBSITE_MANUAL.md            # This file
```

---

## Configuration

### File: `includes/config.php`

Edit this file to update site-wide settings:

```php
// Site Information
define('SITE_NAME', 'Shree Plastic Industries');
define('SITE_TAGLINE', 'Believe in Yourself');
define('SITE_URL', 'https://www.shreeplasticindustries.com');
define('SITE_ESTABLISHED', '1984');

// Contact Information
define('CONTACT_EMAIL', 'info@shreeplasticindustries.com');
define('CONTACT_PHONE', '+91 20 XXXX XXXX');
define('CONTACT_ADDRESS', 'Pisoli, Undri, Pune, Maharashtra, India');
```

---

## Pages Overview

### 1. Intro Page (`intro.php`)
- **Purpose:** Splash screen with 3D animated logo
- **Duration:** 5 seconds auto-redirect
- **Logo Size:** 1200px width (6x enlarged)
- **Skip Option:** "Skip Intro" button and Escape key

### 2. Homepage (`index.php`)
- **Video Hero Section**
  - Background video plays automatically (muted, looped)
  - Fallback image if video fails
  - "Welcome to Shree Plastic Industries" heading
  - Company description text
  - CTA buttons: "Explore Our Products" and "Learn More About Us"

- **Why Choose Us Section**
  - 6 animated flip cards with hover effect
  - Cards: Experience, Quality Manufacturing, Wide Product Range, Trusted Partnership, Customer-Centric, Modern Infrastructure

### 3. About Page (`pages/about.php`)
- Company introduction
- Values & Behaviours section (6 value cards)
- Four Decades of Excellence section
- Product Solutions preview
- Closing quote

### 4. History Page (`pages/history.php`)
- Interactive timeline
- Company milestones from 1984 to present
- Animated scroll effects

### 5. Businesses Page (`pages/businesses.php`)
- Product categories with flip cards
- Products: Skirting Bags, Garbage Bags, HDPE Sheets, LDPE Bags, Vacuum Bagging Film, Vacuum Bags

### 6. Sustainability Page (`pages/sustainability.php`)
- Leadership vision sections (Nimesh Shah & Milan Shah)
- Sustainability commitments grid
- Company pledge
- Team photos

### 7. Careers Page (`pages/careers.php`)
- Career opportunities
- Company culture
- Application information

### 8. News & Media Page (`pages/news-media.php`)
- **Certificates & Awards Section**
- **Recent News Section**
- **Press Coverage & Publications**
- **Media Kit Downloads**

---

## Image Requirements

### Logo Images
| Filename | Dimensions | Location | Description |
|----------|------------|----------|-------------|
| `logo.png` | 400x150px | `assets/images/` | Main logo (dark background) |
| `logo-white.png` | 400x150px | `assets/images/` | White logo (for dark sections) |
| `favicon.ico` | 32x32px | `assets/images/` | Browser tab icon |

### Hero/Banner Images
| Filename | Dimensions | Location | Used On |
|----------|------------|----------|---------|
| `home-hero.jpg` | 1920x1080px | `assets/images/heroes/` | Homepage (video fallback) |
| `about-hero.jpg` | 1920x800px | `assets/images/heroes/` | About page |
| `history-hero.jpg` | 1920x800px | `assets/images/heroes/` | History page |
| `businesses-hero.jpg` | 1920x800px | `assets/images/heroes/` | Businesses page |
| `sustainability-hero.jpg` | 1920x800px | `assets/images/heroes/` | Sustainability page |
| `sustainability-bg.jpg` | 1920x1080px | `assets/images/heroes/` | Sustainability commitments bg |
| `careers-hero.jpg` | 1920x800px | `assets/images/heroes/` | Careers page |
| `news-hero.jpg` | 1920x800px | `assets/images/heroes/` | News & Media page |

### Team Photos
| Filename | Dimensions | Location | Person |
|----------|------------|----------|--------|
| `nimesh-shah.jpg` | 600x800px | `assets/images/team/` | Mr. Nimesh Shah (Director) |
| `milan-shah.jpg` | 600x800px | `assets/images/team/` | Mr. Milan Shah (Director) |
| `nitin-shah.jpg` | 600x800px | `assets/images/team/` | Mr. Nitin Shah (Founder) |
| `placeholder-person.jpg` | 600x800px | `assets/images/` | Fallback for missing photos |

### About Section Images
| Filename | Dimensions | Location | Description |
|----------|------------|----------|-------------|
| `factory.jpg` | 800x600px | `assets/images/about/` | Manufacturing facility |
| `products.jpg` | 800x600px | `assets/images/about/` | Product range display |
| `team.jpg` | 800x600px | `assets/images/about/` | Team photo |
| `quality.jpg` | 800x600px | `assets/images/about/` | Quality control |

### Product Images
| Filename | Dimensions | Location | Product |
|----------|------------|----------|---------|
| `skirting-bags.jpg` | 600x400px | `assets/images/products/` | Skirting Bags |
| `garbage-bags.jpg` | 600x400px | `assets/images/products/` | Garbage Bags |
| `hdpe-sheets.jpg` | 600x400px | `assets/images/products/` | HDPE Sheets |
| `ldpe-bags.jpg` | 600x400px | `assets/images/products/` | LDPE Bags |
| `vacuum-film.jpg` | 600x400px | `assets/images/products/` | Vacuum Bagging Film |
| `vacuum-bags.jpg` | 600x400px | `assets/images/products/` | Vacuum Bags |
| `compostable-bags.jpg` | 600x400px | `assets/images/products/` | Compostable Bags |
| `polythene-rolls.jpg` | 600x400px | `assets/images/products/` | Polythene Rolls |

### Timeline Images (History Page)
| Filename | Dimensions | Location | Year/Event |
|----------|------------|----------|------------|
| `1984-founding.jpg` | 600x400px | `assets/images/timeline/` | Company founding |
| `1990-expansion.jpg` | 600x400px | `assets/images/timeline/` | First expansion |
| `2000-milestone.jpg` | 600x400px | `assets/images/timeline/` | Millennium milestone |
| `2020-modern.jpg` | 600x400px | `assets/images/timeline/` | Modern facility |

### News Images
| Filename | Dimensions | Location | Description |
|----------|------------|----------|-------------|
| `news-[topic].jpg` | 600x400px | `assets/images/news/` | News article thumbnail |

### Publication Images
| Filename | Dimensions | Location | Description |
|----------|------------|----------|-------------|
| `article-[name].jpg` | 400x300px | `assets/images/publications/` | Press article thumbnail |

---

## Video Requirements

### Homepage Hero Video
| Filename | Format | Dimensions | Duration | Location |
|----------|--------|------------|----------|----------|
| `hero-video.mp4` | MP4 (H.264) | 1920x1080px | 15-30 sec | `assets/videos/` |

**Video Specifications:**
- **Format:** MP4 with H.264 codec
- **Resolution:** 1920x1080 (Full HD) minimum
- **Frame Rate:** 24-30 fps
- **File Size:** Keep under 10MB for fast loading
- **Audio:** None (video plays muted)
- **Content:** Manufacturing facility, products, or abstract corporate footage
- **Loop:** Video should loop seamlessly

**Tips for Video:**
1. Compress video using HandBrake or similar tool
2. Ensure smooth loop transition (start and end frames match)
3. Keep lighting consistent throughout
4. Avoid text overlays (text is added via HTML)

---

## Content Management

### Updating Certificates & Awards

**File:** `pages/news-media.php`

Find the `$awards` array and modify:

```php
$awards = [
    [
        'title' => 'ISO 9001:2015',           // Certificate name
        'description' => 'Quality Management', // Short description
        'year' => '2020',                      // Year received
        'icon' => 'certificate'                // Icon type: certificate, leaf, award, globe
    ],
    // Add more awards here...
];
```

### Updating News Articles

**File:** `pages/news-media.php`

Find the `$newsItems` array:

```php
$newsItems = [
    [
        'date' => 'January 15, 2026',
        'title' => 'New Facility Opening',
        'excerpt' => 'Brief description of the news...',
        'image' => 'news-facility.jpg',    // Place in assets/images/news/
        'link' => 'https://example.com'    // External link or null
    ],
    // Add more news items...
];
```

### Updating Publications/Press Coverage

**File:** `pages/news-media.php`

Find the `$publications` array:

```php
$publications = [
    [
        'source' => 'Industry Today',
        'title' => 'SPI Featured in Industry Magazine',
        'date' => 'December 2025',
        'excerpt' => 'Brief excerpt from the article...',
        'image' => 'article-industry.jpg',  // Place in assets/images/publications/
        'link' => 'https://example.com'     // Link to full article
    ],
    // Add more publications...
];
```

### Updating Timeline Events

**File:** `assets/data/content.json`

Edit the timeline section in the JSON file to add/modify historical events.

### Updating Values & Behaviours

**File:** `assets/data/content.json`

Edit the values section to modify company values displayed on the About page.

---

## Google Analytics & Webmaster Tools

### Setting Up Google Analytics

1. Create a Google Analytics account at https://analytics.google.com
2. Create a new property for your website
3. Get your Measurement ID (format: `G-XXXXXXXXXX` or `UA-XXXXXXXXX-X`)
4. Edit `includes/header.php`:

```php
<!-- Find and replace this line -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXXX-X"></script>

<!-- And this line -->
gtag('config', 'UA-XXXXXXXXX-X');
```

Replace `UA-XXXXXXXXX-X` with your actual tracking ID.

### Setting Up Google Search Console (Webmaster Tools)

1. Go to https://search.google.com/search-console
2. Add your website property
3. Choose "HTML tag" verification method
4. Copy the verification code
5. Edit `includes/header.php`:

```php
<!-- Find and replace this line -->
<meta name="google-site-verification" content="YOUR_GOOGLE_VERIFICATION_CODE">
```

Replace `YOUR_GOOGLE_VERIFICATION_CODE` with your actual code.

---

## WhatsApp Integration

### Configuring WhatsApp Button

The WhatsApp floating button appears on all pages.

**File:** `includes/header.php`

Find and update the phone number:

```html
<a href="https://wa.me/919876543210" class="whatsapp-float" ...>
```

**Format:** `wa.me/[country_code][phone_number]`
- India: `919876543210` (91 = India code, then 10-digit number)
- No spaces, dashes, or plus sign

### Customizing WhatsApp Message

To add a pre-filled message:

```html
<a href="https://wa.me/919876543210?text=Hello%20I%20am%20interested%20in%20your%20products" ...>
```

---

## Adding New Content

### Adding a New Page

1. Create new file in `pages/` directory:

```php
<?php
require_once '../includes/config.php';

$page_title = 'New Page Title';
$page_description = 'Page meta description for SEO';

include '../includes/header.php';
?>

<!-- Your page content here -->

<?php include '../includes/footer.php'; ?>
```

2. Add navigation link in `includes/header.php`:

```php
<li class="nav-item">
    <a href="<?php echo $basePath; ?>pages/new-page.php" class="nav-link">New Page</a>
</li>
```

### Adding Media Kit Downloads

1. Create your downloadable files:
   - `spi-logo-package.zip` - Logo files in PNG, SVG, EPS formats
   - `spi-company-profile.pdf` - Company overview document
   - `spi-brand-guidelines.pdf` - Brand usage guidelines

2. Place files in `assets/downloads/`

3. Links are already configured in `pages/news-media.php`

---

## Troubleshooting

### Images Not Loading

1. **Check file path:** Ensure image is in correct folder
2. **Check filename:** Case-sensitive on Linux servers (`Logo.png` ≠ `logo.png`)
3. **Check file extension:** Use lowercase `.jpg`, `.png`
4. **Clear browser cache:** Ctrl+F5 or Cmd+Shift+R

### Video Not Playing

1. **Check format:** Must be MP4 with H.264 codec
2. **Check file size:** Large files may timeout
3. **Check filename:** Must be `hero-video.mp4` in `assets/videos/`
4. **Fallback image:** Ensure `home-hero.jpg` exists as backup

### WhatsApp Button Not Working

1. **Check phone number format:** No spaces or special characters
2. **Include country code:** e.g., `91` for India
3. **Test on mobile:** WhatsApp Web may behave differently

### Styles Not Updating

1. **Clear browser cache**
2. **Check for CSS syntax errors**
3. **Verify file is saved**
4. **Check file path in header.php**

### PHP Errors

1. **Check syntax:** Missing semicolons, brackets
2. **Check file permissions:** Server needs read access
3. **Enable error display:** Add to top of page for debugging:
   ```php
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   ```

---

## Color Scheme Reference

| Color | Hex Code | Usage |
|-------|----------|-------|
| Primary Dark | `#1A1A1A` | Headers, text, dark sections |
| Primary Blue | `#0066CC` | Accents, links, buttons |
| Secondary Blue | `#2E5090` | Gradients, hover states |
| Light Gray | `#F5F5F5` | Backgrounds, alternating sections |
| Text Gray | `#666666` | Body text, descriptions |
| White | `#FFFFFF` | Backgrounds, light text |
| WhatsApp Green | `#25D366` | WhatsApp button |

---

## Support & Maintenance

### Regular Maintenance Tasks

1. **Weekly:** Check contact form submissions
2. **Monthly:** Update news and announcements
3. **Quarterly:** Review and update content
4. **Annually:** Update copyright year in footer, review certificates

### Backup Recommendations

1. Backup entire `spi/` folder regularly
2. Keep copies of `content.json` after updates
3. Maintain image library backup separately

---

**Document Version:** 1.0  
**Last Updated:** February 2026  
**Created For:** Shree Plastic Industries

