document.addEventListener('DOMContentLoaded', () => {

    // Sticky Navbar
    const navbar = document.getElementById('navbar');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });

    // Smooth Scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const id = this.getAttribute('href');
            if(id === '#') return;
            
            const target = document.querySelector(id);
            if(target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Form submission animation (mock)
    const form = document.querySelector('.appointment-form');
    if(form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = form.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            
            btn.innerHTML = '<i class="ph-bold ph-spinner ph-spin"></i> Processing...';
            
            setTimeout(() => {
                btn.classList.remove('btn-primary');
                btn.style.background = '#10b981';
                btn.innerHTML = '<i class="ph-bold ph-check"></i> Request Sent';
                form.reset();
                
                setTimeout(() => {
                    btn.classList.add('btn-primary');
                    btn.style.background = '';
                    btn.innerHTML = originalText;
                }, 3000);
            }, 1500);
        });
    }

    // Mobile Menu
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const closeBtn = document.getElementById('close-menu-btn');
    const mobileNav = document.getElementById('mobile-nav');
    const mobileOverlay = document.getElementById('mobile-menu-overlay');

    if(mobileBtn && closeBtn && mobileNav && mobileOverlay) {
        mobileBtn.addEventListener('click', () => {
            mobileNav.classList.add('active');
            mobileOverlay.classList.add('active');
        });
        
        closeBtn.addEventListener('click', () => {
            mobileNav.classList.remove('active');
            mobileOverlay.classList.remove('active');
        });
        
        mobileOverlay.addEventListener('click', () => {
            mobileNav.classList.remove('active');
            mobileOverlay.classList.remove('active');
        });
    }

});
