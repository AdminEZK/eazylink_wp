/**
 * Animation de la timeline au scroll pour la page Solutions
 * Le fluide orange se remplit selon le scroll et les points deviennent orange quand le fluide les atteint
 */

document.addEventListener('DOMContentLoaded', function() {
    const timeline = document.querySelector('.timeline');
    const timelineItems = document.querySelectorAll('.timeline-item');
    
    if (!timeline || timelineItems.length === 0) return;

    // Création du trait de progression orange animé
    const progressLine = document.createElement('div');
    progressLine.className = 'timeline-progress';
    timeline.appendChild(progressLine);

    // Animation au scroll basée sur la position du container timeline
    let ticking = false;
    
    function updateTimelineProgress() {
        // Chercher la section du dessus (Notre Offre de Solutions)
        const solutionsSection = document.querySelector('.solutions-section');
        const timelineRect = timeline.getBoundingClientRect();
        const windowHeight = window.innerHeight;
        
        // Calcul de la progression basée sur la section du dessus
        let triggerElement = solutionsSection || timeline;
        const triggerRect = triggerElement.getBoundingClientRect();
        const timelineTop = triggerRect.top;
        const timelineHeight = triggerRect.height + timeline.getBoundingClientRect().height;
        
        // Animation commence dès que la section du dessus entre dans le viewport
        const startAnimation = windowHeight * 1.2; // Commence très tôt
        const endAnimation = -timelineHeight * 0.2; // Finit quand la timeline sort
        
        if (timelineTop <= startAnimation && timelineTop >= endAnimation) {
            // Calcul du pourcentage de progression (0 à 1) - Plus réactif
            let progress = Math.max(0, Math.min(1, 
                (startAnimation - timelineTop) / (startAnimation - endAnimation)
            ));
            
            // Courbe d'accélération pour rendre l'animation plus dynamique
            progress = Math.pow(progress, 0.7); // Accélération au début
            
            // Application de la progression au trait orange (fluide)
            const progressLine = timeline.querySelector('.timeline-progress');
            if (progressLine) {
                progressLine.style.transform = `scaleY(${progress})`;
                progressLine.style.opacity = progress > 0 ? 1 : 0;
            }
            
            // Activation des points selon la progression du fluide - Ordre normal 1→2→3→4
            timelineItems.forEach((item, index) => {
                // Position relative de chaque item - Ordre normal (1ère étape en premier)
                const itemProgress = (index + 1) / timelineItems.length; // 0.25, 0.5, 0.75, 1.0 (étapes 1→2→3→4)
                
                // Animation d'entrée du contenu - Plus rapide
                if (progress > itemProgress * 0.3) { // Contenu apparaît avant que le liquide n'atteigne le point
                    item.classList.add('timeline-item-visible');
                }
                
                // Le point devient orange quand le liquide l'atteint (scroll bas) et redevient gris (scroll haut)
                if (progress >= itemProgress) {
                    item.classList.add('timeline-point-active');
                    // Effet de pulsation après activation - Plus rapide
                    setTimeout(() => {
                        item.classList.add('timeline-point-pulse');
                    }, 100);
                } else {
                    // Retirer les classes si on scroll vers le haut (jauge remonte)
                    item.classList.remove('timeline-point-active', 'timeline-point-pulse');
                }
            });
        } else {
            // Reset quand la timeline n'est pas visible
            const progressLine = timeline.querySelector('.timeline-progress');
            if (progressLine) {
                progressLine.style.transform = 'scaleY(0)';
                progressLine.style.opacity = '0';
            }
            
            // Reset des points
            timelineItems.forEach(item => {
                item.classList.remove('timeline-point-active', 'timeline-point-pulse');
            });
        }
        
        ticking = false;
    }

    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateTimelineProgress);
            ticking = true;
        }
    }

    // Écoute du scroll pour l'animation fluide
    window.addEventListener('scroll', requestTick, { passive: true });
    
    // Animation initiale
    updateTimelineProgress();

    // Animation d'entrée en cascade des items au chargement si déjà visibles
    setTimeout(() => {
        timelineItems.forEach((item, index) => {
            const rect = item.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                setTimeout(() => {
                    item.classList.add('timeline-item-loaded');
                }, index * 150);
            }
        });
    }, 500);
});
