/**
 * Animations du header EazyLink
 * Gestion du scroll et des interactions
 */

document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('main-header');
    const logo = document.querySelector('.eazylink-logo');
    const navItems = document.querySelectorAll('.nav-item');
    const contactBtn = document.querySelector('.contact-btn');
    const burgerMenu = document.getElementById('burger-menu');
    const mobileNav = document.getElementById('mobile-nav');
    
    let lastScrollTop = 0;
    let ticking = false;
    
    // Animation de scroll optimisée avec requestAnimationFrame
    function updateHeader() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        // Parallax subtil pour le logo
        if (logo) {
            const logoTransform = Math.min(scrollTop * 0.1, 10);
            logo.style.transform = `translateY(${logoTransform}px)`;
        }
        
        lastScrollTop = scrollTop;
        ticking = false;
    }
    
    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateHeader);
            ticking = true;
        }
    }
    
    window.addEventListener('scroll', requestTick);
    
    // Animation d'apparition des éléments de navigation (seulement au premier chargement)
    const isFirstLoad = !sessionStorage.getItem('headerAnimated');
    
    if (isFirstLoad) {
        navItems.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(-20px)';
            
            setTimeout(() => {
                item.style.transition = 'all 0.6s ease';
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }, 100 + (index * 100));
        });
        
        // Animation du bouton Contact
        if (contactBtn) {
            contactBtn.style.opacity = '0';
            contactBtn.style.transform = 'translateX(20px)';
            
            setTimeout(() => {
                contactBtn.style.transition = 'all 0.6s ease';
                contactBtn.style.opacity = '1';
                contactBtn.style.transform = 'translateX(0)';
            }, 600);
        }
        
        // Animation de chargement du header
        header.style.opacity = '0';
        header.style.transform = 'translateY(-100%)';
        
        setTimeout(() => {
            header.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
            header.style.opacity = '1';
            header.style.transform = 'translateY(0)';
        }, 100);
        
        // Marquer que l'animation a été jouée
        sessionStorage.setItem('headerAnimated', 'true');
    } else {
        // Si ce n'est pas le premier chargement, afficher directement les éléments
        navItems.forEach(item => {
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        });
        
        if (contactBtn) {
            contactBtn.style.opacity = '1';
            contactBtn.style.transform = 'translateX(0)';
        }
        
        header.style.opacity = '1';
        header.style.transform = 'translateY(0)';
    }
    
    // Gestion du menu burger
    if (burgerMenu && mobileNav) {
        burgerMenu.addEventListener('click', function() {
            burgerMenu.classList.toggle('active');
            mobileNav.classList.toggle('active');
            document.body.style.overflow = mobileNav.classList.contains('active') ? 'hidden' : '';
        });
        
        // Fermer le menu en cliquant sur un lien
        const mobileNavItems = mobileNav.querySelectorAll('.nav-item, .contact-btn');
        mobileNavItems.forEach(item => {
            item.addEventListener('click', function() {
                burgerMenu.classList.remove('active');
                mobileNav.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
        
        // Fermer le menu avec la touche Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileNav.classList.contains('active')) {
                burgerMenu.classList.remove('active');
                mobileNav.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }
    
    // Effet de hover amélioré pour les éléments de navigation
    navItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.05)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Gestion des clics avec animation
    navItems.forEach(item => {
        item.addEventListener('click', function(e) {
            // Animation de clic
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'translateY(-2px) scale(1.05)';
            }, 150);
        });
    });
    
    // Détection de la page active pour la navigation
    function setActiveNavItem() {
        const currentPath = window.location.pathname;
        
        navItems.forEach(item => {
            const itemPath = new URL(item.href).pathname;
            
            // Supprimer d'abord la classe active
            item.classList.remove('active');
            
            // Ajouter la classe active si c'est la bonne page
            if (currentPath === itemPath || 
                (currentPath === '/' && itemPath === '/') ||
                (currentPath.includes(itemPath) && itemPath !== '/')) {
                item.classList.add('active');
                console.log('Page active détectée:', item.textContent, 'Path:', itemPath);
            }
        });
    }
    
    setActiveNavItem();
    
    // Forcer l'affichage de la barre pour les éléments actifs
    setTimeout(() => {
        const activeItems = document.querySelectorAll('.nav-item.active');
        activeItems.forEach(item => {
            const afterElement = window.getComputedStyle(item, '::after');
            console.log('Élément actif trouvé:', item.textContent);
        });
    }, 100);
    
    // Smooth scroll pour les liens internes
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            
            if (target) {
                const headerHeight = header.offsetHeight;
                const targetPosition = target.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
});

// Gestion du redimensionnement de la fenêtre
window.addEventListener('resize', function() {
    const header = document.getElementById('main-header');
    if (header) {
        // Recalculer les positions si nécessaire
        header.style.transition = 'none';
        setTimeout(() => {
            header.style.transition = 'all 0.3s ease';
        }, 100);
    }
});
