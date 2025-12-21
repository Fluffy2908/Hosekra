/**
 * Hosekra Theme JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Hamburger Menu Toggle
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');
    const body = document.body;

    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            body.classList.toggle('menu-open');
        });

        // Close menu when clicking on a link
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                mobileMenu.classList.remove('active');
                body.classList.remove('menu-open');
            });
        });
    }

    // Smooth scroll for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                const navHeight = document.querySelector('.site-navigation').offsetHeight;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - navHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Navigation background on scroll
    const navigation = document.querySelector('.site-navigation');
    if (navigation) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                navigation.classList.add('scrolled');
            } else {
                navigation.classList.remove('scrolled');
            }
        });
    }

    // Animate elements on scroll
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements for animation
    const animateElements = document.querySelectorAll('.feature-card, .model-card, .section-header');
    animateElements.forEach(function(el) {
        observer.observe(el);
    });

    // Form submission handler
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Basic form validation
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();

            if (!name || !email || !message) {
                alert('Prosimo izpolnite vsa obvezna polja.');
                return;
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Prosimo vnesite veljaven e-poštni naslov.');
                return;
            }

            // Here you would typically send the form data to a server
            // For now, we'll just show a success message
            alert('Hvala za vaše sporočilo! Odgovorili vam bomo v najkrajšem možnem času.');
            contactForm.reset();
        });
    }
});

// Prevent body scroll when mobile menu is open
document.documentElement.style.setProperty('--vh', `${window.innerHeight * 0.01}px`);
window.addEventListener('resize', function() {
    document.documentElement.style.setProperty('--vh', `${window.innerHeight * 0.01}px`);
});
