<?php
/**
 * Shree Plastic Industries - Products Page
 * Full listing of all products — linked from businesses page flip cards
 */

require_once '../includes/config.php';

$page_title = 'Our Products';
$page_description = 'Explore the complete range of Shree Plastic Industries products — from polythene bags to compostable solutions, VCI bags, grow bags and much more.';

include '../includes/header.php';
?>

<style>
/* ── Products Page Styles ── */
.products-hero {
    position: relative;
    padding: 120px 0 60px;
    background: linear-gradient(135deg, #1A1A1A 0%, #2E5090 100%);
    color: #FFFFFF;
    text-align: center;
}

.products-hero h1 {
    font-size: 48px;
    color: #FFFFFF;
    margin-bottom: 16px;
}

.products-hero p {
    font-size: 18px;
    opacity: 0.85;
    max-width: 600px;
    margin: 0 auto;
}

/* Product Cards Grid */
.products-section {
    padding: 80px 0;
    background-color: #F5F5F5;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px;
}

.product-card {
    background: #FFFFFF;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    scroll-margin-top: 100px;
}

.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 32px rgba(0,0,0,0.15);
}

.product-card-image {
    width: 100%;
    height: 220px;
    object-fit: cover;
    display: block;
    background: linear-gradient(135deg, #f0f0f0, #e0e0e0);
}

.product-card-image-placeholder {
    width: 100%;
    height: 220px;
    background: linear-gradient(135deg, #1A1A1A, #2E5090);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFFFFF;
}

.product-card-image-placeholder svg {
    width: 64px;
    height: 64px;
    opacity: 0.6;
}

.product-card-body {
    padding: 28px;
}

.product-badge {
    display: inline-block;
    background: #28a745;
    color: #FFFFFF;
    padding: 3px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 12px;
}

.product-card-title {
    font-size: 20px;
    font-weight: 700;
    color: #1A1A1A;
    margin-bottom: 10px;
    line-height: 1.3;
}

.product-card-short {
    color: #666666;
    font-size: 14px;
    margin-bottom: 14px;
    line-height: 1.6;
}

.product-card-desc {
    color: #444444;
    font-size: 15px;
    line-height: 1.8;
    margin-bottom: 20px;
    text-align: justify;
}

.product-section-label {
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: #0066CC;
    margin-bottom: 8px;
}

.product-features-list {
    list-style: none;
    padding: 0;
    margin: 0 0 20px;
}

.product-features-list li {
    position: relative;
    padding-left: 18px;
    margin-bottom: 6px;
    font-size: 14px;
    color: #444444;
    line-height: 1.6;
}

.product-features-list li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: #0066CC;
    font-weight: 700;
}

.product-applications {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 20px;
}

.product-application-tag {
    background: #EEF3FA;
    color: #2E5090;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
}

.product-materials {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 20px;
}

.product-material-tag {
    background: #F0FFF4;
    color: #28a745;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    border: 1px solid #c3e6cb;
}

.product-divider {
    border: none;
    border-top: 1px solid #EEEEEE;
    margin: 20px 0;
}

.product-enquire-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 24px;
    background: #0066CC;
    color: #FFFFFF;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: background 0.2s ease, transform 0.2s ease;
}

.product-enquire-btn:hover {
    background: #004999;
    color: #FFFFFF;
    transform: scale(1.03);
}

/* Back to Businesses */
.back-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #0066CC;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    margin-bottom: 40px;
    transition: color 0.2s ease;
}

.back-link:hover {
    color: #004999;
}

/* Responsive */
@media (max-width: 1199px) {
    .products-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 767px) {
    .products-grid { grid-template-columns: 1fr; }
    .products-hero h1 { font-size: 32px; }
}
</style>

<!-- Hero -->
<section class="products-hero">
    <div class="container">
        <h1>Our Products</h1>
        <p>A comprehensive range of high-quality plastic packaging solutions crafted with precision, quality, and sustainability.</p>
    </div>
</section>

<!-- Products Grid -->
<section class="products-section">
    <div class="container">

        <a href="businesses.php" class="back-link">
            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            Back to Businesses
        </a>

        <div class="products-grid" id="products-list">
            <!-- Products injected by JS -->
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section bg-light">
    <div class="container text-center">
        <h2>Need a Custom Solution?</h2>
        <p class="section-subtitle mb-4">
            We offer full customization across all product lines. Get in touch and our team will assist you.
        </p>
        <a href="mailto:<?php echo CONTACT_EMAIL; ?>" class="btn btn-primary">Enquire Now</a>
    </div>
</section>

<script>
(function() {
    'use strict';

    const icons = {
        'polythene': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><rect x="12" y="8" width="40" height="48" rx="4"/><path d="M20 8v-4h24v4"/><line x1="20" y1="20" x2="44" y2="20"/><line x1="20" y1="28" x2="44" y2="28"/></svg>`,
        'polypropylene': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><rect x="14" y="10" width="36" height="44" rx="3"/><path d="M22 10v-4h20v4"/><rect x="20" y="22" width="24" height="16" rx="2" fill="currentColor" opacity="0.2"/></svg>`,
        '3d-covers': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><path d="M12 20l20-8 20 8v24l-20 8-20-8z"/><path d="M12 20v24M32 12v32M52 20v24"/></svg>`,
        'compostable': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><circle cx="32" cy="32" r="20"/><path d="M32 20c-8 0-12 8-8 16s8 8 12 0-4-16-4-16"/></svg>`,
        'nursery': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><path d="M16 24h32v28c0 2-2 4-4 4H20c-2 0-4-2-4-4V24z"/><path d="M32 24v-8c0-4 4-8 8-8M32 16c0-4-4-8-8-8"/></svg>`,
        'growbags': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><rect x="16" y="20" width="32" height="32" rx="2"/><path d="M32 20v-8l-4-4M32 12l4-4"/></svg>`,
        'banana': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><path d="M32 12c-8 0-12 4-12 12v20c0 4 4 8 12 8s12-4 12-8V24c0-8-4-12-12-12z"/></svg>`,
        'grocery': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><path d="M16 20h32v32c0 2-2 4-4 4H20c-2 0-4-2-4-4V20z"/><path d="M24 20v-8h16v8"/></svg>`,
        'vci': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><rect x="16" y="16" width="32" height="32" rx="2"/><circle cx="32" cy="32" r="8"/></svg>`,
        'recycled': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><path d="M32 16l8 14h-8M32 48l-8-14h8M48 40l-12-8v8"/></svg>`,
        'bopp': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><rect x="12" y="16" width="40" height="32" rx="2"/><path d="M20 16v-4h24v4"/></svg>`,
        'courier': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><rect x="16" y="12" width="32" height="40" rx="2"/><path d="M24 12v-4h16v4"/></svg>`,
        'raw-material': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><ellipse cx="32" cy="16" rx="16" ry="8"/><path d="M16 16v32c0 4 7 8 16 8s16-4 16-8V16"/></svg>`,
        'bubble': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><circle cx="20" cy="20" r="6"/><circle cx="36" cy="20" r="6"/><circle cx="20" cy="36" r="6"/><circle cx="36" cy="36" r="6"/></svg>`,
        'default': `<svg viewBox="0 0 64 64" fill="none" stroke="#FFFFFF" stroke-width="2"><rect x="12" y="12" width="40" height="40" rx="4"/></svg>`
    };

    async function loadProducts() {
        try {
            const res = await fetch('../data/content.json');
            const json = await res.json();
            renderProducts(json.businesses || []);

            // Scroll to anchor if hash present
            if (window.location.hash) {
                setTimeout(() => {
                    const el = document.querySelector(window.location.hash);
                    if (el) el.scrollIntoView({ behavior: 'smooth' });
                }, 300);
            }
        } catch(e) {
            document.getElementById('products-list').innerHTML =
                '<p style="text-align:center;color:#666;padding:40px;">Unable to load products. Please try again later.</p>';
        }
    }

    function renderProducts(products) {
        const grid = document.getElementById('products-list');
        grid.innerHTML = products.map(p => {
            const badge = p.badge || (p.certifications ? p.certifications[0] : '');
            const imgPath = p.image ? '../' + p.image : '';
            const iconSvg = icons[p.icon] || icons['default'];

            const imageHtml = imgPath
                ? `<img class="product-card-image" src="${imgPath}" alt="${p.title}" loading="lazy"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                   <div class="product-card-image-placeholder" style="display:none;">${iconSvg}</div>`
                : `<div class="product-card-image-placeholder">${iconSvg}</div>`;

            const featuresHtml = p.features && p.features.length
                ? `<p class="product-section-label">Key Features</p>
                   <ul class="product-features-list">
                       ${p.features.map(f => `<li>${f}</li>`).join('')}
                   </ul>`
                : '';

            const appsHtml = p.applications && p.applications.length
                ? `<p class="product-section-label">Applications</p>
                   <div class="product-applications">
                       ${p.applications.map(a => `<span class="product-application-tag">${a}</span>`).join('')}
                   </div>`
                : '';

            const materialsHtml = p.materials && p.materials.length
                ? `<p class="product-section-label">Materials</p>
                   <div class="product-materials">
                       ${p.materials.map(m => `<span class="product-material-tag">${m}</span>`).join('')}
                   </div>`
                : '';

            return `
                <div class="product-card" id="product-${p.id}">
                    ${imageHtml}
                    <div class="product-card-body">
                        ${badge ? `<span class="product-badge">${badge}</span>` : ''}
                        <h2 class="product-card-title">${p.title}</h2>
                        <p class="product-card-short">${p.shortDescription}</p>
                        <hr class="product-divider">
                        <p class="product-card-desc">${p.description}</p>
                        ${featuresHtml}
                        ${appsHtml}
                        ${materialsHtml}
                        <a href="mailto:<?php echo CONTACT_EMAIL; ?>?subject=Enquiry: ${encodeURIComponent(p.title)}" class="product-enquire-btn">
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                            Enquire About This Product
                        </a>
                    </div>
                </div>
            `;
        }).join('');
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', loadProducts);
    } else {
        loadProducts();
    }
})();
</script>

<?php include '../includes/footer.php'; ?>
