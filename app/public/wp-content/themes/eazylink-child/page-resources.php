<?php
/**
 * Template Name: Page Ressources
 *
 * Le template pour la page des ressources
 *
 * @package EazyLink_Child
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        
        <!-- Section Hero -->
        <section class="page-hero section-gradient-main section-particles">
            <div class="container">
                <div class="page-hero-content">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if (get_field('page_subtitle')) : ?>
                        <p class="page-subtitle"><?php echo wp_kses_post(get_field('page_subtitle')); ?></p>
                    <?php else : ?>
                        <p class="page-subtitle">Découvrez nos ressources pour approfondir vos connaissances sur l'IA générative et son application en entreprise.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Section Introduction -->
        <section class="section-intro">
            <div class="container">
                <?php
                // Contenu de la page
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </section>

        <!-- Section Filtres -->
        <section class="section-filters">
            <div class="container">
                <div class="filters-wrapper">
                    <h2 class="filters-title">Filtrer par type</h2>
                    <div class="filters-buttons">
                        <button class="filter-button active" data-filter="all">Toutes les ressources</button>
                        <?php
                        $resource_types = get_terms(array(
                            'taxonomy' => 'resource_type',
                            'hide_empty' => true,
                        ));
                        
                        if (!empty($resource_types) && !is_wp_error($resource_types)) :
                            foreach ($resource_types as $type) :
                                ?>
                                <button class="filter-button" data-filter="<?php echo esc_attr($type->slug); ?>">
                                    <?php echo esc_html($type->name); ?>
                                </button>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Ressources Mises en Avant -->
        <section class="section-featured-resources section-colored section-primary section-diagonal">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Ressources à la une</h2>
                    <p class="section-subtitle">Nos contenus les plus populaires pour vous guider dans votre transformation par l'IA</p>
                </div>
                
                <div class="featured-resources-grid">
                    <?php
                    $featured_args = array(
                        'post_type' => 'resource',
                        'posts_per_page' => 3,
                        'meta_key' => 'resource_featured',
                        'meta_value' => '1',
                    );
                    
                    $featured_resources_query = new WP_Query($featured_args);
                    
                    if ($featured_resources_query->have_posts()) :
                        while ($featured_resources_query->have_posts()) :
                            $featured_resources_query->the_post();
                            
                            // Récupération des données de la ressource
                            $file = get_field('resource_file');
                            $form_id = get_field('resource_form_id');
                            $description = get_field('resource_description');
                            $resource_type_terms = get_the_terms(get_the_ID(), 'resource_type');
                            $resource_type = !empty($resource_type_terms) ? $resource_type_terms[0]->name : '';
                            $resource_type_slug = !empty($resource_type_terms) ? $resource_type_terms[0]->slug : '';
                            ?>
                            <div class="resource-card featured-resource resource-type-<?php echo esc_attr($resource_type_slug); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="resource-image">
                                        <?php the_post_thumbnail('eazylink-card'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="resource-content">
                                    <?php if ($resource_type) : ?>
                                        <div class="resource-type"><?php echo esc_html($resource_type); ?></div>
                                    <?php endif; ?>
                                    <h3 class="resource-title"><?php the_title(); ?></h3>
                                    <?php if ($description) : ?>
                                        <div class="resource-description"><?php echo wp_kses_post($description); ?></div>
                                    <?php else : ?>
                                        <div class="resource-description">
                                            <?php 
                                            if (function_exists('eazylink_custom_excerpt')) {
                                                echo eazylink_custom_excerpt(15);
                                            } else {
                                                the_excerpt();
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="resource-actions">
                                        <?php if ($file) : ?>
                                            <?php if ($form_id) : ?>
                                                <a href="<?php the_permalink(); ?>" class="btn-primary">Télécharger</a>
                                            <?php else : ?>
                                                <a href="<?php echo esc_url($file['url']); ?>" class="btn-primary" download>Télécharger</a>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <a href="<?php the_permalink(); ?>" class="btn-primary">Consulter</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>

        <!-- Section Toutes les Ressources -->
        <section class="section-all-resources">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Toutes nos ressources</h2>
                    <p class="section-subtitle">Explorez notre bibliothèque complète de ressources sur l'IA générative</p>
                </div>
                
                <div class="resources-grid">
                    <?php
                    $args = array(
                        'post_type' => 'resource',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );
                    
                    $resources_query = new WP_Query($args);
                    
                    if ($resources_query->have_posts()) :
                        while ($resources_query->have_posts()) :
                            $resources_query->the_post();
                            
                            // Récupération des données de la ressource
                            $file = get_field('resource_file');
                            $form_id = get_field('resource_form_id');
                            $description = get_field('resource_description');
                            $resource_type_terms = get_the_terms(get_the_ID(), 'resource_type');
                            $resource_type = !empty($resource_type_terms) ? $resource_type_terms[0]->name : '';
                            $resource_type_slug = !empty($resource_type_terms) ? $resource_type_terms[0]->slug : '';
                            ?>
                            <div class="resource-card resource-type-<?php echo esc_attr($resource_type_slug); ?>" data-type="<?php echo esc_attr($resource_type_slug); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="resource-image">
                                        <?php the_post_thumbnail('eazylink-card'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="resource-content">
                                    <?php if ($resource_type) : ?>
                                        <div class="resource-type"><?php echo esc_html($resource_type); ?></div>
                                    <?php endif; ?>
                                    <h3 class="resource-title"><?php the_title(); ?></h3>
                                    <?php if ($description) : ?>
                                        <div class="resource-description"><?php echo wp_kses_post($description); ?></div>
                                    <?php else : ?>
                                        <div class="resource-description">
                                            <?php 
                                            if (function_exists('eazylink_custom_excerpt')) {
                                                echo eazylink_custom_excerpt(15);
                                            } else {
                                                the_excerpt();
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="resource-actions">
                                        <?php if ($file) : ?>
                                            <?php if ($form_id) : ?>
                                                <a href="<?php the_permalink(); ?>" class="btn-primary">Télécharger</a>
                                            <?php else : ?>
                                                <a href="<?php echo esc_url($file['url']); ?>" class="btn-primary" download>Télécharger</a>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <a href="<?php the_permalink(); ?>" class="btn-primary">Consulter</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                        <div class="no-resources">
                            <p>Aucune ressource trouvée.</p>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </section>

        <!-- Section Newsletter -->
        <section class="section-newsletter section-colored section-secondary section-pattern">
            <div class="container">
                <div class="newsletter-content">
                    <h2>Restez informé</h2>
                    <p>Inscrivez-vous à notre newsletter pour recevoir nos dernières ressources et actualités sur l'IA générative.</p>
                    
                    <?php
                    // Affichage du formulaire de newsletter s'il existe
                    if (function_exists('gravity_form')) {
                        $newsletter_form_id = get_field('newsletter_form_id', 'option');
                        if ($newsletter_form_id) {
                            gravity_form($newsletter_form_id, false, false, false, '', true);
                        } else {
                            // Formulaire par défaut si aucun ID n'est défini
                            ?>
                            <form class="newsletter-form">
                                <input type="email" name="email" placeholder="Votre adresse email" required>
                                <button type="submit" class="btn-primary">S'inscrire</button>
                            </form>
                            <?php
                        }
                    } else {
                        // Formulaire par défaut si Gravity Forms n'est pas installé
                        ?>
                        <form class="newsletter-form">
                            <input type="email" name="email" placeholder="Votre adresse email" required>
                            <button type="submit" class="btn-primary">S'inscrire</button>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<script>
    // Script pour le filtrage des ressources par type
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-button');
        const resourceCards = document.querySelectorAll('.resource-card:not(.featured-resource)');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Retirer la classe active de tous les boutons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Ajouter la classe active au bouton cliqué
                this.classList.add('active');
                
                const filter = this.getAttribute('data-filter');
                
                resourceCards.forEach(card => {
                    if (filter === 'all') {
                        card.style.display = 'flex';
                    } else {
                        if (card.getAttribute('data-type') === filter) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    }
                });
            });
        });
    });
</script>

<?php
get_footer();
