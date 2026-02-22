/**
 * Shree Plastic Industries - Flip Cards JavaScript
 * AJAX-powered flip card functionality for businesses page
 */

(function() {
    'use strict';

    /**
     * FlipCards class for managing flip card grid
     */
    class FlipCards {
        constructor(container, options = {}) {
            this.container = container;
            this.options = {
                dataUrl: options.dataUrl || 'data/content.json',
                flipOnClick: options.flipOnClick !== false,
                flipOnHover: options.flipOnHover !== false,
                ...options
            };
            this.cards = [];
            this.data = null;
            this.init();
        }

        async init() {
            this.showLoading();
            await this.loadData();
            this.render();
            this.setupInteractions();
            this.setupAnimations();
        }

        /**
         * Show loading state
         */
        showLoading() {
            this.container.innerHTML = `
                <div class="flip-cards-loading">
                    <div class="loading-spinner"></div>
                    <p>Loading products...</p>
                </div>
            `;
        }

        /**
         * Load data via AJAX
         */
        async loadData() {
            try {
                // Determine the correct path based on current location
                let dataUrl = this.options.dataUrl;
                
                // Check if we're in a subdirectory
                if (window.location.pathname.includes('/pages/')) {
                    dataUrl = '../' + dataUrl;
                }

                const response = await fetch(dataUrl);
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const json = await response.json();
                this.data = json.businesses || [];
                
            } catch (error) {
                console.error('Error loading flip cards data:', error);
                this.showError();
            }
        }

        /**
         * Show error state
         */
        showError() {
            this.container.innerHTML = `
                <div class="flip-cards-error">
                    <svg viewBox="0 0 24 24" width="48" height="48" stroke="currentColor" stroke-width="2" fill="none">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <p>Unable to load products. Please try again later.</p>
                    <button class="btn btn-secondary retry-btn" onclick="location.reload()">Retry</button>
                </div>
            `;
        }

        /**
         * Render flip cards
         */
        render() {
            if (!this.data || this.data.length === 0) {
                this.showError();
                return;
            }

            const html = this.data.map((item, index) => this.renderCard(item, index)).join('');
            
            this.container.innerHTML = `
                <div class="flip-cards-grid">
                    ${html}
                </div>
            `;

            this.cards = this.container.querySelectorAll('.flip-card');
        }

        /**
         * Render individual card
         */
        renderCard(item, index) {
            const iconSvg = this.getIconSvg(item.icon);
            const features = item.features ? item.features.slice(0, 4) : [];
            const badge = item.badge || (item.certifications ? item.certifications[0] : '');
            
            // Get the correct image path
            let imagePath = item.image || '';
            if (imagePath && window.location.pathname.includes('/pages/')) {
                imagePath = '../' + imagePath;
            }

            return `
                <div class="flip-card stagger-${(index % 6) + 1}" data-id="${item.id}">
                    <div class="flip-card-inner">
                        <!-- Front -->
                        <div class="flip-card-front">
                            ${badge ? `<span class="flip-card-badge">${badge}</span>` : ''}
                            ${imagePath ? `
                                <div class="flip-card-image">
                                    <img src="${imagePath}" alt="${item.title}" loading="lazy" 
                                         onerror="this.style.display='none'; this.parentElement.innerHTML='${iconSvg.replace(/'/g, "&apos;")}
                                </div>
                            ` : `
                                <div class="flip-card-icon">
                                    ${iconSvg}
                                </div>
                            `}
                            <h3 class="flip-card-title">${item.title}</h3>
                            <p class="flip-card-short-desc">${item.shortDescription}</p>
                            <span class="flip-card-hint">
                                <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none">
                                    <polyline points="15 3 21 3 21 9"></polyline>
                                    <path d="M21 3l-7 7"></path>
                                </svg>
                                Hover to learn more
                            </span>
                        </div>
                        <!-- Back -->
                        <div class="flip-card-back">
                            <h4 class="flip-card-back-title">${item.title}</h4>
                            <p class="flip-card-description">${item.description}</p>
                            ${features.length > 0 ? `
                                <ul class="flip-card-features">
                                    ${features.map(f => `<li>${f}</li>`).join('')}
                                </ul>
                            ` : ''}
                            <a href="products.php#product-${item.id}" class="btn btn-white flip-card-btn">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            `;
        }

        /**
         * Get SVG icon based on icon name
         */
        getIconSvg(iconName) {
            const icons = {
                'polythene': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="12" y="8" width="40" height="48" rx="4"/>
                    <path d="M20 8v-4h24v4"/>
                    <line x1="20" y1="20" x2="44" y2="20"/>
                    <line x1="20" y1="28" x2="44" y2="28"/>
                </svg>`,
                'polypropylene': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="14" y="10" width="36" height="44" rx="3"/>
                    <path d="M22 10v-4h20v4"/>
                    <rect x="20" y="22" width="24" height="16" rx="2" fill="currentColor" opacity="0.2"/>
                </svg>`,
                '3d-covers': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 20l20-8 20 8v24l-20 8-20-8z"/>
                    <path d="M12 20v24M32 12v32M52 20v24"/>
                    <path d="M12 32l20 8 20-8"/>
                </svg>`,
                'vcl': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="16" y="12" width="32" height="40" rx="2"/>
                    <path d="M24 12v-4h16v4"/>
                    <circle cx="32" cy="32" r="8"/>
                    <path d="M32 24v-4M32 44v4M24 32h-4M44 32h-4"/>
                </svg>`,
                'compostable': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="32" cy="32" r="20"/>
                    <path d="M32 20c-8 0-12 8-8 16s8 8 12 0-4-16-4-16"/>
                    <path d="M28 52v4M36 52v4"/>
                </svg>`,
                'nursery': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 24h32v28c0 2-2 4-4 4H20c-2 0-4-2-4-4V24z"/>
                    <path d="M32 24v-8c0-4 4-8 8-8M32 16c0-4-4-8-8-8"/>
                    <circle cx="32" cy="36" r="2" fill="currentColor"/>
                </svg>`,
                'growbags': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="16" y="20" width="32" height="32" rx="2"/>
                    <path d="M32 20v-8l-4-4M32 12l4-4"/>
                    <line x1="24" y1="32" x2="40" y2="32"/>
                    <line x1="24" y1="40" x2="40" y2="40"/>
                </svg>`,
                'banana': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M32 12c-8 0-12 4-12 12v20c0 4 4 8 12 8s12-4 12-8V24c0-8-4-12-12-12z"/>
                    <path d="M20 24c-4 0-8 2-8 6v8c0 4 4 6 8 6"/>
                    <path d="M44 24c4 0 8 2 8 6v8c0 4-4 6-8 6"/>
                </svg>`,
                'grocery': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 20h32v32c0 2-2 4-4 4H20c-2 0-4-2-4-4V20z"/>
                    <path d="M24 20v-8h16v8"/>
                    <rect x="24" y="32" width="16" height="2" fill="currentColor"/>
                    <rect x="24" y="40" width="16" height="2" fill="currentColor"/>
                </svg>`,
                'vci': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="16" y="16" width="32" height="32" rx="2"/>
                    <circle cx="32" cy="32" r="8"/>
                    <circle cx="32" cy="32" r="4" fill="currentColor"/>
                    <line x1="32" y1="16" x2="32" y2="20"/>
                    <line x1="32" y1="44" x2="32" y2="48"/>
                    <line x1="16" y1="32" x2="20" y2="32"/>
                    <line x1="44" y1="32" x2="48" y2="32"/>
                </svg>`,
                'recycled': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M32 16l8 14h-8M32 48l-8-14h8M48 40l-12-8v8"/>
                    <path d="M24 22l8 6M40 22l-8 6M32 36v8"/>
                    <circle cx="24" cy="22" r="2" fill="currentColor"/>
                    <circle cx="40" cy="22" r="2" fill="currentColor"/>
                    <circle cx="32" cy="44" r="2" fill="currentColor"/>
                </svg>`,
                'bopp': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="12" y="16" width="40" height="32" rx="2"/>
                    <path d="M20 16v-4h24v4"/>
                    <rect x="20" y="28" width="24" height="12" rx="1"/>
                    <line x1="28" y1="24" x2="36" y2="24"/>
                </svg>`,
                'courier': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="16" y="12" width="32" height="40" rx="2"/>
                    <path d="M24 12v-4h16v4"/>
                    <rect x="22" y="20" width="20" height="8" rx="1"/>
                    <line x1="22" y1="36" x2="42" y2="36"/>
                    <line x1="22" y1="42" x2="36" y2="42"/>
                </svg>`,
                'bubble': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="20" cy="20" r="6"/>
                    <circle cx="36" cy="20" r="6"/>
                    <circle cx="52" cy="20" r="6"/>
                    <circle cx="20" cy="36" r="6"/>
                    <circle cx="36" cy="36" r="6"/>
                    <circle cx="52" cy="36" r="6"/>
                    <circle cx="20" cy="52" r="6"/>
                    <circle cx="36" cy="52" r="6"/>
                </svg>`,
                'bats': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="8" y="16" width="48" height="32" rx="4"/>
                    <line x1="20" y1="16" x2="20" y2="48"/>
                    <line x1="44" y1="16" x2="44" y2="48"/>
                    <circle cx="32" cy="32" r="6"/>
                </svg>`,
                'jackets': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 12h32l4 8v32l-4 4H16l-4-4V20z"/>
                    <path d="M24 12v8h16v-8"/>
                    <line x1="32" y1="28" x2="32" y2="48"/>
                </svg>`,
                'pouches': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 16h32v36c0 2-2 4-4 4H20c-2 0-4-2-4-4V16z"/>
                    <path d="M16 16c0-4 4-8 8-8h16c4 0 8 4 8 8"/>
                    <path d="M24 24h16"/>
                </svg>`,
                'printed': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 20h40v36H12z"/>
                    <path d="M20 20v-8h24v8"/>
                    <rect x="20" y="28" width="24" height="16" rx="2"/>
                    <line x1="24" y1="48" x2="40" y2="48"/>
                </svg>`,
                'raw-material': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <ellipse cx="32" cy="16" rx="16" ry="8"/>
                    <path d="M16 16v32c0 4 7 8 16 8s16-4 16-8V16"/>
                    <ellipse cx="32" cy="32" rx="16" ry="8"/>
                </svg>`,
                'default': `<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="12" y="12" width="40" height="40" rx="4"/>
                    <line x1="20" y1="24" x2="44" y2="24"/>
                    <line x1="20" y1="32" x2="44" y2="32"/>
                    <line x1="20" y1="40" x2="36" y2="40"/>
                </svg>`
            };

            return icons[iconName] || icons['default'];
        }

        /**
         * Setup card interactions
         */
        setupInteractions() {
            this.cards.forEach(card => {
                // Click to flip on mobile
                if (this.options.flipOnClick) {
                    card.addEventListener('click', (e) => {
                        // Don't flip if clicking on the Learn More link
                        if (e.target.closest('.flip-card-btn')) {
                            return;
                        }
                        
                        // Toggle flip on touch devices
                        if (window.matchMedia('(hover: none)').matches) {
                            card.classList.toggle('flipped');
                        }
                    });
                }
            });

            // Close flipped cards when clicking outside
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.flip-card')) {
                    this.cards.forEach(card => card.classList.remove('flipped'));
                }
            });
        }

        /**
         * Setup scroll animations for cards
         */
        setupAnimations() {
            // Check for reduced motion preference
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                this.cards.forEach(card => card.classList.add('animate-in'));
                return;
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            this.cards.forEach(card => observer.observe(card));
        }

        /**
         * Filter cards by category
         */
        filterCards(category) {
            if (!category || category === 'all') {
                this.cards.forEach(card => {
                    card.style.display = '';
                    card.classList.remove('filtered-out');
                });
                return;
            }

            this.cards.forEach(card => {
                const id = card.dataset.id;
                const item = this.data.find(d => d.id == id);
                
                if (item && item.category === category) {
                    card.style.display = '';
                    card.classList.remove('filtered-out');
                } else {
                    card.classList.add('filtered-out');
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        }

        /**
         * Search cards
         */
        searchCards(query) {
            const searchQuery = query.toLowerCase().trim();
            
            if (!searchQuery) {
                this.cards.forEach(card => {
                    card.style.display = '';
                    card.classList.remove('filtered-out');
                });
                return;
            }

            this.cards.forEach(card => {
                const id = card.dataset.id;
                const item = this.data.find(d => d.id == id);
                
                if (item) {
                    const searchText = [
                        item.title,
                        item.shortDescription,
                        item.description,
                        ...(item.features || []),
                        ...(item.applications || [])
                    ].join(' ').toLowerCase();
                    
                    if (searchText.includes(searchQuery)) {
                        card.style.display = '';
                        card.classList.remove('filtered-out');
                    } else {
                        card.classList.add('filtered-out');
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                }
            });
        }
    }

    /**
     * Initialize flip cards on page
     */
    function initFlipCards() {
        const containers = document.querySelectorAll('.flip-cards-container');
        
        containers.forEach(container => {
            const dataUrl = container.dataset.url || 'data/content.json';
            new FlipCards(container, { dataUrl });
        });
    }

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFlipCards);
    } else {
        initFlipCards();
    }

    // Export for use in other scripts
    window.SPIFlipCards = {
        FlipCards,
        init: initFlipCards
    };

})();
