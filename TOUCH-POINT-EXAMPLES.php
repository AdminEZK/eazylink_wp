<?php
/**
 * Exemples d'utilisation du composant Touch Point
 * EazyLink Design System
 */

// Exemple 1: Touch Point standard pour CTA générique
?>
<div class="touch-point">
    <h2>Découvrez nos solutions IA</h2>
    <p>Transformez votre entreprise avec nos solutions d'intelligence artificielle personnalisées et notre accompagnement expert.</p>
    <a href="<?php echo esc_url(home_url('/solutions/')); ?>" class="btn btn-primary">Voir nos solutions</a>
</div>

<?php
// Exemple 2: Touch Point primary avec dégradé pour actions importantes
?>
<div class="touch-point touch-point-primary">
    <h2>Prêt à transformer votre approche de l'IA ?</h2>
    <p>Chez EazyLink, nous combinons expertise stratégique et support opérationnel pour vous offrir un accompagnement complet. Discutons de vos enjeux lors d'un diagnostic offert.</p>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Diagnostic gratuit</a>
</div>

<?php
// Exemple 3: Touch Point secondary avec accent violet
?>
<div class="touch-point touch-point-secondary">
    <h2>Besoin d'expertise sectorielle ?</h2>
    <p>Nos experts spécialisés par secteur vous accompagnent dans votre transformation digitale avec une approche sur mesure.</p>
    <a href="<?php echo esc_url(home_url('/experts-ia/')); ?>" class="btn btn-secondary">Rencontrer nos experts</a>
</div>

<?php
// Exemple 4: Touch Point compact pour espaces réduits
?>
<div class="touch-point touch-point-compact">
    <h2>Une question ?</h2>
    <p>Notre équipe est là pour vous aider.</p>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline">Nous contacter</a>
</div>

<?php
// Exemple 5: Touch Point avec icône pour newsletter
?>
<div class="touch-point touch-point-secondary">
    <div class="touch-point-icon">
        <i class="fas fa-envelope"></i>
    </div>
    <h2>Restez informé</h2>
    <p>Recevez nos dernières analyses et tendances IA directement dans votre boîte mail.</p>
    <a href="<?php echo esc_url(home_url('/newsletter/')); ?>" class="btn btn-primary">S'abonner</a>
</div>

<?php
// Exemple 6: Touch Point avec actions multiples
?>
<div class="touch-point">
    <h2>Choisissez votre parcours</h2>
    <p>Découvrez la solution qui correspond le mieux à vos besoins et à votre secteur d'activité.</p>
    <div class="touch-point-actions">
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Nous contacter</a>
        <a href="<?php echo esc_url(home_url('/solutions/')); ?>" class="btn btn-secondary">Voir nos solutions</a>
    </div>
</div>

<?php
// Exemple 7: Touch Point pour téléchargement de ressource
?>
<div class="touch-point touch-point-primary">
    <div class="touch-point-icon">
        <i class="fas fa-download"></i>
    </div>
    <h2>Guide gratuit : IA en entreprise</h2>
    <p>Téléchargez notre guide complet pour réussir votre transformation IA en 2024.</p>
    <a href="<?php echo esc_url(home_url('/ressources/guide-ia-entreprise.pdf')); ?>" class="btn btn-primary" download>Télécharger le guide</a>
</div>

<?php
// Exemple 8: Touch Point pour événement/webinar
?>
<div class="touch-point touch-point-secondary">
    <div class="touch-point-icon">
        <i class="fas fa-calendar"></i>
    </div>
    <h2>Webinar : L'IA au service de votre croissance</h2>
    <p>Rejoignez-nous le 15 mars pour découvrir comment l'IA peut accélérer votre développement.</p>
    <div class="touch-point-actions">
        <a href="<?php echo esc_url(home_url('/webinar-inscription/')); ?>" class="btn btn-primary">S'inscrire gratuitement</a>
        <a href="<?php echo esc_url(home_url('/webinars/')); ?>" class="btn btn-outline">Voir tous les webinars</a>
    </div>
</div>

<?php
// Exemple 9: Touch Point pour témoignage client
?>
<div class="touch-point">
    <h2>Ils nous font confiance</h2>
    <p>"EazyLink nous a accompagnés dans notre transformation IA avec une expertise remarquable. Nos processus sont maintenant 40% plus efficaces."</p>
    <div class="touch-point-actions">
        <a href="<?php echo esc_url(home_url('/temoignages/')); ?>" class="btn btn-primary">Voir tous les témoignages</a>
        <a href="<?php echo esc_url(home_url('/cas-clients/')); ?>" class="btn btn-secondary">Nos cas clients</a>
    </div>
</div>

<?php
// Exemple 10: Touch Point pour support/aide
?>
<div class="touch-point touch-point-compact">
    <div class="touch-point-icon">
        <i class="fas fa-life-ring"></i>
    </div>
    <h2>Besoin d'aide ?</h2>
    <p>Consultez notre centre d'aide ou contactez notre support.</p>
    <div class="touch-point-actions">
        <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="btn btn-secondary">FAQ</a>
        <a href="<?php echo esc_url(home_url('/support/')); ?>" class="btn btn-outline">Support</a>
    </div>
</div>

<?php
// Exemple 11: Touch Point pour blog/contenu
?>
<div class="touch-point touch-point-secondary">
    <h2>Vous avez aimé cet article ?</h2>
    <p>Découvrez nos autres contenus sur l'intelligence artificielle et la transformation digitale.</p>
    <div class="touch-point-actions">
        <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn-primary">Tous les articles</a>
        <a href="<?php echo esc_url(home_url('/newsletter/')); ?>" class="btn btn-outline">Newsletter</a>
    </div>
</div>

<?php
// Exemple 12: Touch Point avec urgence/offre limitée
?>
<div class="touch-point touch-point-primary">
    <div class="touch-point-icon">
        <i class="fas fa-clock"></i>
    </div>
    <h2>Offre spéciale : Diagnostic IA gratuit</h2>
    <p>Profitez de notre diagnostic IA gratuit jusqu'au 31 mars. Analysez le potentiel de votre entreprise avec nos experts.</p>
    <a href="<?php echo esc_url(home_url('/diagnostic-gratuit/')); ?>" class="btn btn-primary">Réserver mon créneau</a>
</div>

<?php
// Exemple 13: Touch Point pour partenariat/collaboration
?>
<div class="touch-point">
    <h2>Vous êtes consultant ou intégrateur ?</h2>
    <p>Rejoignez notre réseau de partenaires et proposez nos solutions IA à vos clients.</p>
    <div class="touch-point-actions">
        <a href="<?php echo esc_url(home_url('/partenaires/')); ?>" class="btn btn-primary">Devenir partenaire</a>
        <a href="<?php echo esc_url(home_url('/programme-partenaires/')); ?>" class="btn btn-secondary">En savoir plus</a>
    </div>
</div>

<?php
// Exemple 14: Touch Point pour formation
?>
<div class="touch-point touch-point-secondary">
    <div class="touch-point-icon">
        <i class="fas fa-graduation-cap"></i>
    </div>
    <h2>Formez vos équipes à l'IA</h2>
    <p>Nos formations sur mesure permettent à vos collaborateurs de maîtriser les outils IA et d'optimiser leur productivité.</p>
    <a href="<?php echo esc_url(home_url('/formations/')); ?>" class="btn btn-primary">Découvrir nos formations</a>
</div>

<?php
// Exemple 15: Touch Point pour démonstration produit
?>
<div class="touch-point touch-point-primary">
    <h2>Voir nos solutions en action</h2>
    <p>Réservez une démonstration personnalisée de nos outils IA et découvrez comment ils peuvent transformer votre activité.</p>
    <div class="touch-point-actions">
        <a href="<?php echo esc_url(home_url('/demo/')); ?>" class="btn btn-primary">Réserver une démo</a>
        <a href="<?php echo esc_url(home_url('/essai-gratuit/')); ?>" class="btn btn-secondary">Essai gratuit</a>
    </div>
</div>
