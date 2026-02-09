/**
 * Shree Plastic Industries - Timeline JavaScript
 * Interactive timeline functionality with animations
 */

(function() {
    'use strict';

    /**
     * Timeline class for managing timeline interactions
     */
    class Timeline {
        constructor(container) {
            this.container = container;
            this.items = container.querySelectorAll('.timeline-item');
            this.line = container.querySelector('.timeline-line-progress');
            this.init();
        }

        init() {
            this.setupObserver();
            this.setupClickHandlers();
        }

        /**
         * Setup Intersection Observer for scroll animations
         */
        setupObserver() {
            const options = {
                threshold: 0.2,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        // Add staggered delay based on item index
                        setTimeout(() => {
                            entry.target.classList.add('animate-in');
                        }, index * 150);
                    }
                });
            }, options);

            this.items.forEach(item => observer.observe(item));

            // Observe the timeline line for progress animation
            if (this.line) {
                const lineObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.animateLine();
                        }
                    });
                }, { threshold: 0.1 });

                lineObserver.observe(this.container);
            }
        }

        /**
         * Animate the timeline line
         */
        animateLine() {
            if (this.line) {
                this.line.style.height = '100%';
            }
        }

        /**
         * Setup click handlers for timeline items
         */
        setupClickHandlers() {
            this.items.forEach(item => {
                const expandBtn = item.querySelector('.timeline-expand-btn');
                const content = item.querySelector('.timeline-expandable');

                if (expandBtn && content) {
                    expandBtn.addEventListener('click', () => {
                        this.toggleExpand(item, expandBtn, content);
                    });
                }

                // Also allow clicking on the card to expand
                const card = item.querySelector('.timeline-card');
                if (card && content) {
                    card.addEventListener('click', (e) => {
                        // Don't trigger if clicking on links
                        if (e.target.tagName !== 'A') {
                            this.toggleExpand(item, expandBtn, content);
                        }
                    });
                }
            });
        }

        /**
         * Toggle expand/collapse of timeline item
         */
        toggleExpand(item, btn, content) {
            const isExpanded = item.classList.contains('expanded');

            // Close all other items
            this.items.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('expanded');
                    const otherContent = otherItem.querySelector('.timeline-expandable');
                    if (otherContent) {
                        otherContent.style.maxHeight = '0';
                    }
                }
            });

            // Toggle current item
            if (isExpanded) {
                item.classList.remove('expanded');
                content.style.maxHeight = '0';
                if (btn) btn.setAttribute('aria-expanded', 'false');
            } else {
                item.classList.add('expanded');
                content.style.maxHeight = content.scrollHeight + 'px';
                if (btn) btn.setAttribute('aria-expanded', 'true');

                // Scroll item into view
                setTimeout(() => {
                    item.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 300);
            }
        }
    }

    /**
     * Initialize timelines on page
     */
    function initTimelines() {
        const timelineContainers = document.querySelectorAll('.timeline');
        
        timelineContainers.forEach(container => {
            new Timeline(container);
        });
    }

    /**
     * Load timeline data via AJAX
     */
    async function loadTimelineData(url) {
        try {
            const response = await fetch(url);
            if (!response.ok) throw new Error('Network response was not ok');
            return await response.json();
        } catch (error) {
            console.error('Error loading timeline data:', error);
            return null;
        }
    }

    /**
     * Render timeline from data
     */
    function renderTimeline(container, data) {
        if (!data || !data.timeline) return;

        const html = data.timeline.map((item, index) => `
            <div class="timeline-item" data-period="${item.period}">
                <div class="timeline-marker">
                    <span class="timeline-year">${item.period.split(' - ')[0]}</span>
                </div>
                <div class="timeline-card">
                    <div class="timeline-period">${item.period}</div>
                    <h3 class="timeline-title">${item.title}</h3>
                    <p class="timeline-subtitle">${item.subtitle}</p>
                    <div class="timeline-content">
                        <p>${item.description}</p>
                    </div>
                    ${item.highlights ? `
                        <div class="timeline-expandable" style="max-height: 0; overflow: hidden; transition: max-height 0.4s ease;">
                            <ul class="timeline-highlights">
                                ${item.highlights.map(h => `<li>${h}</li>`).join('')}
                            </ul>
                        </div>
                        <button class="timeline-expand-btn" aria-expanded="false">
                            <span class="expand-text">Read More</span>
                            <svg class="expand-icon" viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                    ` : ''}
                </div>
            </div>
        `).join('');

        container.innerHTML = `
            <div class="timeline-line">
                <div class="timeline-line-progress"></div>
            </div>
            ${html}
        `;

        // Initialize the timeline functionality
        new Timeline(container);
    }

    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initTimelines);
    } else {
        initTimelines();
    }

    // Export for use in other scripts
    window.SPITimeline = {
        Timeline,
        loadTimelineData,
        renderTimeline,
        init: initTimelines
    };

})();
