# Shree Plastic Industries - Image Requirements

This document lists all images required for the website with their file names, locations, and recommended specifications.

---

## Logo Images

| File Name | Location | Dimensions | Description |
|-----------|----------|------------|-------------|
| `logo.png` | `/assets/images/` | 200x80px (or proportional) | Main logo for header (transparent PNG) |
| `logo-white.png` | `/assets/images/` | 200x80px (or proportional) | White version for dark footer |
| `favicon.ico` | `/assets/images/` | 32x32px / 16x16px | Browser favicon |

---

## Hero Images

All hero images should be **1920x800px** minimum for optimal display.

| File Name | Location | Page Used | Description |
|-----------|----------|-----------|-------------|
| `about-hero.jpg` | `/assets/images/heroes/` | index.php, about.php | Manufacturing facility or corporate image |
| `history-hero.jpg` | `/assets/images/heroes/` | history.php | Historical or legacy themed image |
| `businesses-hero.jpg` | `/assets/images/heroes/` | businesses.php | Products or manufacturing process |
| `sustainability-hero.jpg` | `/assets/images/heroes/` | sustainability.php | Nature/eco-friendly themed image |
| `sustainability-bg.jpg` | `/assets/images/heroes/` | sustainability.php | Background for commitments section |
| `careers-hero.jpg` | `/assets/images/heroes/` | careers.php | Team or workplace image |
| `news-hero.jpg` | `/assets/images/heroes/` | news-media.php | Corporate/media themed image |

---

## Team/Leadership Photos

Professional headshots, recommended **400x500px** or similar portrait ratio.

| File Name | Location | Person | Description |
|-----------|----------|--------|-------------|
| `nitin-shah.jpg` | `/assets/images/team/` | Mr. Nitin Shah | Founder portrait |
| `nimesh-shah.jpg` | `/assets/images/team/` | Mr. Nimesh Shah | Director portrait |
| `milan-shah.jpg` | `/assets/images/team/` | Mr. Milan Shah | Director portrait |
| `placeholder-person.jpg` | `/assets/images/` | Fallback | Generic placeholder for missing photos |

---

## About Section Images

Recommended **800x600px** or similar landscape ratio.

| File Name | Location | Description |
|-----------|----------|-------------|
| `factory.jpg` | `/assets/images/about/` | Manufacturing facility exterior/interior |
| `products.jpg` | `/assets/images/about/` | Product range showcase |
| `mission.jpg` | `/assets/images/about/` | Team or vision related image |
| `quality.jpg` | `/assets/images/about/` | Quality control or certification |

---

## Timeline Images

Historical images, recommended **600x400px**.

| File Name | Location | Period | Description |
|-----------|----------|--------|-------------|
| `1984-foundation.jpg` | `/assets/images/timeline/` | 1984-1994 | Early factory or founder image |
| `1995-partnerships.jpg` | `/assets/images/timeline/` | 1995-2008 | Partnership/growth era |
| `2008-leadership.jpg` | `/assets/images/timeline/` | 2008-2012 | Next generation leadership |
| `2013-innovation.jpg` | `/assets/images/timeline/` | 2013-Present | Modern facility/technology |

---

## Product Images

For flip cards on businesses page, recommended **400x300px**.

| File Name | Location | Product |
|-----------|----------|---------|
| `polythene-bags.jpg` | `/assets/images/products/` | Polythene Bags & Rolls |
| `vcl-bags.jpg` | `/assets/images/products/` | VCL Bags |
| `compostable-bags.jpg` | `/assets/images/products/` | Compostable Bags |
| `bats.jpg` | `/assets/images/products/` | Bats/Components |
| `jackets.jpg` | `/assets/images/products/` | Protective Jackets |
| `pouches.jpg` | `/assets/images/products/` | Pouches |
| `printed-bags.jpg` | `/assets/images/products/` | Printed Shopping Bags |
| `raw-material.jpg` | `/assets/images/products/` | Virgin Raw Material |

---

## Image Specifications

### General Guidelines

- **Format**: JPG for photographs, PNG for logos/graphics with transparency
- **Quality**: 80-85% compression for web optimization
- **Color Profile**: sRGB
- **Resolution**: 72 DPI for web

### Recommended Dimensions

| Image Type | Width | Height | Aspect Ratio |
|------------|-------|--------|--------------|
| Hero Images | 1920px | 800px | 2.4:1 |
| About/Content Images | 800px | 600px | 4:3 |
| Team Portraits | 400px | 500px | 4:5 |
| Timeline Images | 600px | 400px | 3:2 |
| Product Images | 400px | 300px | 4:3 |
| Logo | 200px | 80px | Variable |

### Hero Image Overlay

Hero images will have a dark gradient overlay applied via CSS:
```
rgba(26, 26, 26, 0.4) to rgba(26, 26, 26, 0.6)
```
Choose images that work well with this overlay - avoid very dark images.

---

## Directory Structure

```
/assets/images/
├── logo.png
├── logo-white.png
├── favicon.ico
├── placeholder-person.jpg
├── /heroes/
│   ├── about-hero.jpg
│   ├── history-hero.jpg
│   ├── businesses-hero.jpg
│   ├── sustainability-hero.jpg
│   ├── sustainability-bg.jpg
│   ├── careers-hero.jpg
│   └── news-hero.jpg
├── /team/
│   ├── nitin-shah.jpg
│   ├── nimesh-shah.jpg
│   └── milan-shah.jpg
├── /about/
│   ├── factory.jpg
│   ├── products.jpg
│   ├── mission.jpg
│   └── quality.jpg
├── /timeline/
│   ├── 1984-foundation.jpg
│   ├── 1995-partnerships.jpg
│   ├── 2008-leadership.jpg
│   └── 2013-innovation.jpg
├── /products/
│   ├── polythene-bags.jpg
│   ├── vcl-bags.jpg
│   ├── compostable-bags.jpg
│   ├── bats.jpg
│   ├── jackets.jpg
│   ├── pouches.jpg
│   ├── printed-bags.jpg
│   └── raw-material.jpg
└── /icons/
    └── (SVG icons are embedded in code)
```

---

## Total Images Required

| Category | Count |
|----------|-------|
| Logos & Favicon | 3 |
| Hero Images | 7 |
| Team Photos | 4 |
| About Section | 4 |
| Timeline | 4 |
| Products | 8 |
| **TOTAL** | **30** |

---

## Notes

1. **Fallback Handling**: The website includes fallback handling for missing images
2. **Lazy Loading**: Content images use `loading="lazy"` for performance
3. **Alt Text**: All images have descriptive alt text for accessibility
4. **Retina Support**: Consider providing @2x versions for high-DPI displays

---

*Last Updated: February 2026*
