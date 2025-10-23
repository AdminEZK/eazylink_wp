<?php
/**
 * Template Name: Page À Propos
 *
 * Le template pour la page À Propos
 *
 * @package EazyLink_Child
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        
        <!-- Hero Section -->
        <section class="hero-about-section">
            <div class="container">
                <div class="hero-about-grid">
                    <!-- Colonne de gauche - Contenu -->
                    <div class="hero-content">
                        <h1 class="hero-title">
                            Notre <span class="gradient-text">Mission</span>
                        </h1>
                        <p class="hero-text-primary">
                            Chez EazyLink, nous avons une mission claire : démocratiser l'intelligence artificielle en la rendant accessible, compréhensible et actionnable pour toutes les entreprises, quelle que soit leur taille ou leur secteur d'activité.
                        </p>
                        <p class="hero-text-secondary">
                            Nous croyons fermement que l'IA n'est pas seulement l'avenir, mais qu'elle est déjà un levier de croissance essentiel pour les entreprises d'aujourd'hui. Notre objectif est de vous accompagner dans cette transformation digitale, en vous fournissant les outils, les connaissances et le support nécessaires pour réussir.
                        </p>
                        
                    </div>
                    
                    <!-- Colonne de droite - Photo -->
                    <div class="hero-image">
                        <div class="hero-image-container">
                            <!-- Image principale -->
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/img_about.png'); ?>" 
                                 alt="L'équipe EazyLink - Experts en Intelligence Artificielle" 
                                 class="hero-img" />
                            
                            <!-- Éléments décoratifs -->
                            <div class="hero-decoration hero-decoration-1"></div>
                            <div class="hero-decoration hero-decoration-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Values Section -->
        <section class="values-about-section">
            <div class="container">
                <div class="values-header">
                    <h2 class="values-title">Nos Valeurs</h2>
                    <p class="values-subtitle">
                        Ces principes guident chacune de nos actions et décisions
                    </p>
                </div>
                
                <div class="values-grid">
                    <?php
                    // Données pour les valeurs - 3 valeurs principales
                    $values = array(
                        array(
                            'icon' => 'lightbulb',
                            'title' => 'Innovation',
                            'description' => 'Nous restons à la pointe des avancées en IA pour offrir les solutions les plus innovantes à nos clients.',
                            'color' => 'from-orange-500 to-pink-500'
                        ),
                        array(
                            'icon' => 'users',
                            'title' => 'Accessibilité',
                            'description' => 'Nous rendons l\'IA accessible à tous, quelle que soit votre expertise technique ou la taille de votre entreprise.',
                            'color' => 'from-blue-500 to-purple-500'
                        ),
                        array(
                            'icon' => 'shield',
                            'title' => 'Éthique',
                            'description' => 'Nous nous engageons à promouvoir une utilisation éthique et responsable de l\'IA, respectueuse des données et de la vie privée.',
                            'color' => 'from-green-500 to-teal-500'
                        )
                    );

                    foreach ($values as $index => $value) :
                    ?>
                    <div class="value-card">
                        <div class="value-card-inner">
                            <!-- Icône avec gradient de fond -->
                            <div class="value-icon value-icon-<?php echo $index + 1; ?>">
                                <?php if ($value['icon'] === 'lightbulb') : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                <?php elseif ($value['icon'] === 'users') : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                <?php elseif ($value['icon'] === 'shield') : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Contenu de la card -->
                            <div class="value-content">
                                <h3 class="value-card-title"><?php echo esc_html($value['title']); ?></h3>
                                <p class="value-card-description"><?php echo esc_html($value['description']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>


        <!-- Team Section -->
        <section class="team-about-section">
            <div class="container">
                <div class="team-header">
                    <h2 class="team-title">La Team</h2>
                    <p class="team-subtitle">
                        Des experts passionnés par l'IA et dédiés à votre réussite
                    </p>
                </div>
                
                <div class="team-grid">
                    <?php
                    // Fonction helper pour récupérer une image de la médiathèque par nom de fichier
                    function get_media_image_by_name($filename, $size = 'medium') {
                        global $wpdb;
                        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM {$wpdb->posts} WHERE post_title LIKE %s AND post_type = 'attachment' AND post_mime_type LIKE 'image%'", '%' . $filename . '%'));
                        if (!empty($attachment)) {
                            return wp_get_attachment_image_url($attachment[0], $size);
                        }
                        return false;
                    }
                    
                    $team = array(
                        array(
                            'name' => 'François Chédeville',
                            'role' => 'Co-Fondateur & CTO',
                            'image' => get_media_image_by_name('francois-co-fondateur-eazylink') ?: get_stylesheet_directory_uri() . '/assets/images/team-1.jpg',
                            'bio' => 'Designer et créatif dans le digital depuis 2019, formateur et vibe codeur, j\'explore l\'IA avec une approche de maker. Mon rôle : transformer la complexité en solutions concrètes et utiles pour les entreprises.',
                            'linkedin' => 'https://www.linkedin.com/in/francoischedeville/'
                        ),
                        array(
                            'name' => 'Benoit David',
                            'role' => 'Co-Fondateur & Business Developer ',
                            'image' => get_stylesheet_directory_uri() . '/assets/images/team-2.jpg',
                            'bio' => 'Avec 10 ans d\'expérience dans le développement commercial et un parcours d\'entrepreneur, j\'apporte une vision business pragmatique. Mon rôle : aider les entreprises à adopter l\'IA comme un véritable moteur de croissance.',
                            'linkedin' => 'https://www.linkedin.com/in/benoitdavid/'
                        ),
                        
                    );

                    foreach ($team as $member) :
                    ?>
                    <div class="team-card">
                        <div class="team-card-inner">
                            <div class="team-avatar">
                                <img src="<?php echo esc_url($member['image']); ?>" alt="<?php echo esc_attr($member['name']); ?>" class="team-avatar-img" />
                            </div>
                            <div class="team-content">
                                <h3 class="team-member-name"><?php echo esc_html($member['name']); ?></h3>
                                <p class="team-member-role"><?php echo esc_html($member['role']); ?></p>
                                <p class="team-member-bio"><?php echo esc_html($member['bio']); ?></p>
                                <a href="<?php echo esc_url($member['linkedin']); ?>" target="_blank" rel="noopener noreferrer" class="team-linkedin-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="team-linkedin-icon" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                    </svg>
                                    LinkedIn
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>


        


    


        <!-- Touch Point Section -->
        <section class="py-20">
            <div class="container">
                <div class="touch-point">
                    <h2>Découvrez nos solutions IA</h2>
                    <p>Transformez votre entreprise avec nos solutions d'intelligence artificielle personnalisées et notre accompagnement expert.</p>
                    <div class="touch-point-actions">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Nous contacter</a>
                        <a href="<?php echo esc_url(home_url('/nos-solutions-ia/')); ?>" class="btn btn-secondary">Découvrir nos solutions</a>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
