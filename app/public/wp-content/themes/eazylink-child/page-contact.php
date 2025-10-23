<?php
/**
 * Template Name: Page Contact
 *
 * Le template pour la page de contact
 *
 * @package EazyLink_Child
 */

get_header();
?>

<?php // Safeguard: ACF may be inactive on some environments ?>
<?php $has_acf = function_exists('get_field'); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        
        <!-- Section Hero -->
        <section class="py-20">
            <div class="container">
                <div class="max-w-4xl mx-auto text-center">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6"><?php the_title(); ?></h1>
                    <?php if ($has_acf && get_field('page_subtitle')) : ?>
                        <p class="text-xl text-white/80 mb-8"><?php echo wp_kses_post(get_field('page_subtitle')); ?></p>
                    <?php else : ?>
                        <p class="text-xl text-white/80 mb-8">Nous sommes à votre écoute pour toute question ou demande de collaboration</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        
        <!-- Section Contact -->
        <section class="contact-section py-16">
            <div class="container">
                <div class="contact-layout">
                    <!-- Informations de contact - 1/3 -->
                    <div class="contact-info">
                        <h2 class="contact-info-title"><?php echo ($has_acf && get_field('contact_info_title')) ? get_field('contact_info_title') : 'Nos coordonnées'; ?></h2>
                        
                        <div class="contact-details">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="contact-content">
                                    <h3 class="contact-label">Email</h3>
                                    <p><a href="mailto:<?php echo esc_attr(($has_acf && get_field('company_email')) ? get_field('company_email') : 'hello@eazylink.fr'); ?>" class="contact-link"><?php echo esc_html(($has_acf && get_field('company_email')) ? get_field('company_email') : 'hello@eazylink.fr'); ?></a></p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div class="contact-content">
                                    <h3 class="contact-label">Adresse</h3>
                                    <p><?php echo esc_html(($has_acf && get_field('company_address')) ? get_field('company_address') : 'Lancieux, France'); ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="contact-social">
                            <h3 class="social-title"><?php echo ($has_acf && get_field('social_title')) ? get_field('social_title') : 'Suivez-nous'; ?></h3>
                            <div class="social-links">
                                <?php if ($has_acf && get_field('linkedin_url')) : ?>
                                <a href="<?php echo esc_url(get_field('linkedin_url')); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="social-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                    </svg>
                                </a>
                                <?php else : ?>
                                <a href="https://www.linkedin.com/company/eazylink" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="social-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                    </svg>
                                </a>
                                <?php endif; ?>
                                
                                <?php if ($has_acf && get_field('twitter_url')) : ?>
                                <a href="<?php echo esc_url(get_field('twitter_url')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Twitter" class="social-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Formulaire de contact - 2/3 -->
                    <div class="contact-form-wrapper">
                        <h2 class="text-2xl font-bold mb-8"><?php echo ($has_acf && get_field('form_title')) ? get_field('form_title') : 'Envoyez-nous un message'; ?></h2>

                        <?php // Affiche un message de statut après soumission ?>
                        <?php if ( isset($_GET['contact_status']) ) : ?>
                            <?php 
                                $status = sanitize_text_field($_GET['contact_status']);
                                $messages = array(
                                    'success'          => "✅ Merci ! Votre message a bien été envoyé. Nous vous répondrons dans les plus brefs délais.",
                                    'validation_error' => "❌ Merci de vérifier les champs obligatoires (nom, email, message).",
                                    'send_error'       => "❌ Une erreur est survenue lors de l'envoi. Veuillez réessayer.",
                                    'spam'             => "⚠️ Votre soumission a été bloquée (détectée comme spam).",
                                    'invalid_nonce'    => "⚠️ Session expirée. Veuillez rafraîchir la page et réessayer.",
                                    'privacy_required' => "❌ Vous devez accepter la politique de confidentialité.",
                                    'invalid_email'    => "❌ L'adresse email n'est pas valide.",
                                    'recaptcha_failed' => "⚠️ Vérification de sécurité échouée. Veuillez réessayer.",
                                );
                                $is_success = ($status === 'success');
                                $notice_text = isset($messages[$status]) ? $messages[$status] : '';
                            ?>
                            <?php if ( $notice_text ) : ?>
                                <div id="contact-notice" class="<?php echo $is_success ? 'bg-green-600/20 border border-green-500 text-green-100' : 'bg-red-600/20 border border-red-500 text-red-100'; ?> rounded-lg px-4 py-3 mb-6" style="transition: opacity 0.5s ease;">
                                    <?php echo esc_html($notice_text); ?>
                                    <button onclick="this.parentElement.remove(); window.history.replaceState({}, '', window.location.pathname);" style="float: right; background: none; border: none; color: inherit; cursor: pointer; font-size: 1.2rem; line-height: 1; padding: 0 0 0 10px;">&times;</button>
                                </div>
                                <script>
                                // Auto-masquer le message après 5 secondes
                                setTimeout(function() {
                                    var notice = document.getElementById('contact-notice');
                                    if (notice) {
                                        notice.style.opacity = '0';
                                        setTimeout(function() {
                                            notice.remove();
                                            // Nettoyer l'URL
                                            window.history.replaceState({}, '', window.location.pathname);
                                        }, 500);
                                    }
                                }, 5000);
                                </script>
                            <?php endif; ?>
                        <?php endif; ?>

                         <div class="dark-bg">
                             <div class="contact-form-container">
                                 <h2 class="form-title">Contactez-nous</h2>
                                 <p class="form-subtitle">Comment pouvons-nous vous aider aujourd'hui ?</p>
                                 
                                 <!-- Choix du sujet (Design System) -->
                                 <div class="form-topics" id="topic-buttons">
                                     <button type="button" class="topic-button active" data-value="demande-generale">Demande générale</button>
                                     <button type="button" class="topic-button" data-value="demande-devis">Demande de devis</button>
                                     <button type="button" class="topic-button" data-value="diagnostic-ia">Diagnostic IA</button>
                                     <button type="button" class="topic-button" data-value="accompagnement-projet">Accompagnement projet IA</button>
                                 </div>
                                 
                                <form id="contact-form-ds" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
                                    <input type="hidden" name="action" value="eazylink_contact" />
                                    <?php wp_nonce_field('eazylink_contact', 'eazylink_nonce'); ?>
                                     <input type="hidden" name="subject" id="subject-hidden" value="demande-generale" />
                                     <input type="hidden" name="recaptcha_token" id="recaptcha-token" value="" />
                                     <!-- Honeypot anti-spam -->
                                     <input type="text" name="website" id="website" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />
                                     <!-- Ligne 1: Nom & Entreprise -->
                                     <div class="form-row">
                                         <div class="form-col">
                                             <div class="form-group">
                                                 <label for="name" class="form-label">Nom</label>
                                                 <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom" required />
                                             </div>
                                         </div>
                                         <div class="form-col">
                                             <div class="form-group">
                                                 <label for="company" class="form-label">Entreprise</label>
                                                 <input type="text" id="company" name="company" class="form-control" placeholder="Votre entreprise" />
                                             </div>
                                         </div>
                                     </div>
                                     
                                     <!-- Ligne 2: Email & Téléphone -->
                                     <div class="form-row">
                                         <div class="form-col">
                                             <div class="form-group">
                                                 <label for="email" class="form-label">Email</label>
                                                 <input type="email" id="email" name="email" class="form-control" placeholder="votre@email.com" required />
                                             </div>
                                         </div>
                                         <div class="form-col">
                                             <div class="form-group">
                                                 <label for="phone" class="form-label">Téléphone</label>
                                                 <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre numéro de téléphone" />
                                             </div>
                                         </div>
                                     </div>
                                     
                                     <!-- Message -->
                                     <div class="form-group">
                                         <label for="message" class="form-label">Message</label>
                                         <textarea id="message" name="message" class="form-control" placeholder="Détaillez votre demande ici..." rows="4" required></textarea>
                                     </div>
                                     
                                     <!-- Privacy -->
                                     <div class="form-check">
                                         <input type="checkbox" id="privacy" name="privacy" class="form-check-input" required />
                                         <label for="privacy" class="form-check-label">J'accepte que mes données soient traitées conformément à la <a href="<?php echo esc_url(home_url('/politique-de-confidentialite/')); ?>" class="text-bright-orange hover:underline">politique de confidentialité</a>.</label>
                                     </div>
                                     
                                     <!-- CTA -->
                                     <div class="form-submit">
                                         <button type="submit" class="btn btn-primary btn-primary-gradient">Envoyer le message</button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                         <script>
                         document.addEventListener('DOMContentLoaded', function() {
                             // Gestion des boutons de sujet
                             const topicButtons = document.querySelectorAll('#topic-buttons .topic-button');
                             const hiddenSubject = document.getElementById('subject-hidden');
                             topicButtons.forEach(btn => {
                                 btn.addEventListener('click', () => {
                                     topicButtons.forEach(b => b.classList.remove('active'));
                                     btn.classList.add('active');
                                     hiddenSubject.value = btn.getAttribute('data-value');
                                 });
                             });
                             
                             // reCAPTCHA v3 - Génération du token avant soumission
                             <?php if (!empty(EAZYLINK_RECAPTCHA_SITE_KEY)) : ?>
                             const form = document.getElementById('contact-form-ds');
                             form.addEventListener('submit', function(e) {
                                 e.preventDefault();
                                 grecaptcha.ready(function() {
                                     grecaptcha.execute('<?php echo EAZYLINK_RECAPTCHA_SITE_KEY; ?>', {action: 'contact_form'}).then(function(token) {
                                         document.getElementById('recaptcha-token').value = token;
                                         form.submit();
                                     });
                                 });
                             });
                             <?php endif; ?>
                         });
                         </script>
                     </div>
                </div>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
