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

For flip cards on businesses page, recommended **400x300px** (4:3 aspect ratio).

| File Name | Location | Product | Keywords for Image |
|-----------|----------|---------|--------------------|
| `polythene-bags.jpg` | `/assets/images/products/` | Polythene Bags & Rolls (LDPE & HM) | LDPE bags, polyethylene rolls, packaging bags |
| `polypropylene-bags.jpg` | `/assets/images/products/` | Polypropylene Bags & Rolls | PP bags, transparent bags, garment packaging |
| `3d-covers.jpg` | `/assets/images/products/` | 3D / 5D Polythene Covers | Industrial covers, machinery protection, equipment covers |
| `compostable-bags.jpg` | `/assets/images/products/` | Compostable Garbage Bags | Biodegradable bags, eco-friendly, green garbage bags |
| `nursery-bags.jpg` | `/assets/images/products/` | Nursery Bags | Plant bags, cultivation bags, seedling bags |
| `grow-bags.jpg` | `/assets/images/products/` | Grow Bags | Vegetable grow bags, urban gardening, terrace farming |
| `banana-bags.jpg` | `/assets/images/products/` | Banana Skirting Bags | Banana bunch covers, fruit protection bags |
| `grocery-bags.jpg` | `/assets/images/products/` | Grocery Bags | Food packaging, grocery packaging, kg bags |
| `vci-bags.jpg` | `/assets/images/products/` | VCI Bags | Anti-corrosion bags, metal protection, rust prevention |
| `recycled-bags.jpg` | `/assets/images/products/` | Recycled Bags & Sheets | Recycled plastic, eco-friendly, sustainable bags |
| `seal-me-bags.jpg` | `/assets/images/products/` | Seal Me Bags (BOPP) | BOPP bags, self-seal bags, display packaging |
| `courier-bags.jpg` | `/assets/images/products/` | Courier Bags | Tamper-proof bags, shipping bags, e-commerce packaging |
| `raw-material.jpg` | `/assets/images/products/` | Plastic Virgin Raw Material | Plastic pellets, polymer granules, raw material |
| `bubble-roll.jpg` | `/assets/images/products/` | Bubble Roll | Bubble wrap, protective packaging, cushioning material |

---

## Image Specifications

### General Guidelines

- **Format**: JPG for photographs, PNG for logos/graphics with transparency
- **Quality**: 80-85% compression for web optimization
- **Color Profile**: sRGB
- **Resolution**: 72 DPI for web
- **File Size**: Keep under 200KB per image for optimal loading

### Recommended Dimensions

| Image Type | Width | Height | Aspect Ratio |
|------------|-------|--------|--------------|
| Hero Images | 1920px | 800px | 2.4:1 |
| About/Content Images | 800px | 600px | 4:3 |
| Team Portraits | 400px | 500px | 4:5 |
| Timeline Images | 600px | 400px | 3:2 |
| Product Images | 400px | 300px | 4:3 |
| Logo | 200px | 80px | Variable |

### Product Image Guidelines

**Important Tips for Product Photos:**

1. **Clean Background**: White or light gray background works best
2. **Well-Lit**: Ensure products are clearly visible with proper lighting
3. **Product Focus**: Show the actual product prominently
4. **Context**: Include usage context where helpful (e.g., bags with items)
5. **Quality**: Sharp, high-resolution images that showcase product quality
6. **Consistency**: Maintain similar style across all product images

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
│   ├── polypropylene-bags.jpg
│   ├── 3d-covers.jpg
│   ├── compostable-bags.jpg
│   ├── nursery-bags.jpg
│   ├── grow-bags.jpg
│   ├── banana-bags.jpg
│   ├── grocery-bags.jpg
│   ├── vci-bags.jpg
│   ├── recycled-bags.jpg
│   ├── seal-me-bags.jpg
│   ├── courier-bags.jpg
│   ├── raw-material.jpg
│   └── bubble-roll.jpg
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
| Products | 14 |
| **TOTAL** | **36** |

---

## Image Upload Instructions

### Method 1: Using GitHub Web Interface

1. Navigate to the repository on GitHub
2. Go to `assets/images/products/` folder
3. Click "Add file" > "Upload files"
4. Drag and drop your product images
5. Ensure filenames match exactly as listed above
6. Commit the changes

### Method 2: Using Git Command Line

```bash
# Navigate to your local repository
cd spi-new

# Create products directory if it doesn't exist
mkdir -p assets/images/products

# Copy your images to the products folder
cp /path/to/your/images/*.jpg assets/images/products/

# Add and commit
git add assets/images/products/
git commit -m "Add product images"
git push origin main
```

### Method 3: Using cPanel File Manager

1. Login to your hosting cPanel
2. Navigate to File Manager
3. Go to `public_html/assets/images/products/`
4. Upload all product images
5. Ensure correct permissions (644 for files)

---

## Image Checklist

### Products (Priority: HIGH)

- [ ] polythene-bags.jpg
- [ ] polypropylene-bags.jpg
- [ ] 3d-covers.jpg
- [ ] compostable-bags.jpg
- [ ] nursery-bags.jpg
- [ ] grow-bags.jpg
- [ ] banana-bags.jpg
- [ ] grocery-bags.jpg
- [ ] vci-bags.jpg
- [ ] recycled-bags.jpg
- [ ] seal-me-bags.jpg
- [ ] courier-bags.jpg
- [ ] raw-material.jpg
- [ ] bubble-roll.jpg

---

## Notes

1. **Fallback Handling**: The website includes fallback handling for missing images
2. **Lazy Loading**: Content images use `loading="lazy"` for performance
3. **Alt Text**: All images have descriptive alt text for accessibility
4. **Retina Support**: Consider providing @2x versions for high-DPI displays
5. **Image Optimization**: Use tools like TinyPNG or ImageOptim before uploading

---

*Last Updated: February 2026*
