<?php
/**
 * Footer de debug pour identifier les problèmes de style
 */

if (!defined('ABSPATH')) {
    exit;
}

?>
    </div><!-- #content -->

<!-- FOOTER HOME CHARGÉ -->
<style>
/* FOOTER DEBUG - Force absolument le style glassmorphism */
body.home .footer,
body.home footer,
body.home .site-footer,
body.front-page .footer,
body.front-page footer,
body.front-page .site-footer {
    background: transparent !important;
    backdrop-filter: blur(20px) !important;
    -webkit-backdrop-filter: blur(20px) !important;
    position: relative !important;
    width: calc(100% - 60px) !important;
    max-width: 1518px !important;
    margin: 50px auto !important;
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
    border-radius: 15px !important;
    padding: 48px 0 !important;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1) !important;
}

body.home .footer::before,
body.home footer::before,
body.front-page .footer::before,
body.front-page footer::before {
    content: '' !important;
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
    background: rgba(26, 26, 62, 0.3) !important;
    border-radius: 15px !important;
    z-index: -1 !important;
}

body.home .footer-container,
body.front-page .footer-container {
    max-width: 100% !important;
    margin: 0 30px !important;
    padding: 0 2rem !important;
    position: relative !important;
    z-index: 1 !important;
}

/* Mobile */
@media (max-width: 768px) {
    body.home .footer,
    body.home footer,
    body.front-page .footer,
    body.front-page footer {
        width: calc(100% - 40px) !important;
        margin: 40px auto !important;
        padding: 24px 0 !important;
    }
    
    body.home .footer-container,
    body.front-page .footer-container {
        margin: 0 20px !important;
        padding: 0 1.5rem !important;
    }
}
</style>

<footer class="footer site-footer text-white">
  <div class="footer-container">
    <div class="footer-content">
      <!-- Logo et description -->
      <div class="footer-column">
        <div class="footer-logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="https://eazylink.fr/wp-content/uploads/2025/11/Logo_signature.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="logo-img">
          </a>
        </div>
        <p class="footer-description">
          Nous aidons les entreprises à intégrer l'IA de manière stratégique et efficace pour transformer leurs opérations et stimuler leur croissance.
        </p>
      </div>
      
      <!-- Navigation -->
      <div class="footer-column">
        <h3>Navigation</h3>
        <ul class="footer-nav">
          <li><a href="<?php echo esc_url(home_url('/')); ?>" class="footer-link">Accueil</a></li>
          <li><a href="<?php echo esc_url(home_url('/experts-ia/')); ?>" class="footer-link">Expert IA</a></li>
          <li><a href="<?php echo esc_url(home_url('/nos-solutions-ia/')); ?>" class="footer-link">Nos Solutions</a></li>
          <li><a href="<?php echo esc_url(home_url('/blog/')); ?>" class="footer-link">Blog</a></li>
          <li><a href="<?php echo esc_url(home_url('/about/')); ?>" class="footer-link">À Propos</a></li>
          <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="footer-link">Contact</a></li>
        </ul>
      </div>
      
      <!-- Contact et réseaux sociaux -->
      <div class="footer-column">
        <h3>Contact</h3>
        <div class="footer-contact">
          <div class="contact-item">
            <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <a href="mailto:hello@eazylink.fr" class="footer-link">hello@eazylink.fr</a>
          </div>
        </div>
        
        <!-- Réseaux sociaux -->
        <h3>Suivez-nous</h3>
        <div class="social-icons">
          <a href="https://www.linkedin.com/company/eazylink" target="_blank" rel="noopener noreferrer" class="social-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="social-svg" fill="currentColor" viewBox="0 0 24 24">
              <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
    
    <!-- Copyright et liens légaux -->
    <div class="copyright-section">
      <div class="copyright-content">
        <!-- Copyright -->
        <div class="copyright">
          &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tous droits réservés.
        </div>
        
        <!-- Sélecteur de langue -->
        <div class="language-switcher">
          <?php
          if (function_exists('pll_the_languages')) {
              pll_the_languages(array(
                  'dropdown' => 0,
                  'show_names' => 1,
                  'show_flags' => 1,
                  'hide_if_empty' => 0,
                  'force_home' => 0,
                  'echo' => 1,
                  'hide_if_no_translation' => 0,
                  'display_names_as' => 'name'
              ));
          }
          ?>
        </div>
        
        <!-- Liens légaux -->
        <div class="legal-links">
          <a href="<?php echo esc_url(home_url('/mentions-legales/')); ?>" class="legal-link">Mentions Légales</a>
          <a href="<?php echo esc_url(home_url('/politique-de-confidentialite/')); ?>" class="legal-link">Politique de Confidentialité</a>
          <a href="<?php echo esc_url(home_url('/cgv/')); ?>" class="legal-link">CGV</a>
        </div>
      </div>
    </div>
  </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
