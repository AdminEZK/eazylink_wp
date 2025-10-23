<?php
/**
 * Template Name: Page Blog EazyLink
 * Template pour l'affichage du blog avec design system dark
 */

// Empêcher l'accès direct
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- Section 1: Titre d'Accroche -->
<header class="hero-section">
    <div class="container">
        <?php
        if (is_home() && !is_front_page()) :
            $blog_page_id = get_option('page_for_posts');
            $title = get_the_title($blog_page_id) ?: 'Notre Blog';
            $description = get_post_field('post_content', $blog_page_id) ?: 'Découvrez nos analyses, nos cas d\'usage et nos réflexions sur l\'intelligence artificielle pour rester à la pointe de l\'innovation.';
            ?>
            <h1 class="gradient-text"><?php echo esc_html($title); ?></h1>
            <p><?php echo esc_html(wp_trim_words(strip_tags($description), 25)); ?></p>
            <?php
        elseif (is_archive()) :
            ?>
            <h1 class="gradient-text">
                <?php
                if (is_category()) {
                    echo 'Catégorie : ';
                    single_cat_title();
                } elseif (is_tag()) {
                    echo 'Tag : ';
                    single_tag_title();
                } elseif (is_author()) {
                    the_post();
                    echo 'Articles de ' . get_the_author();
                    rewind_posts();
                } elseif (is_day()) {
                    echo 'Archives du ' . get_the_date();
                } elseif (is_month()) {
                    echo 'Archives de ' . get_the_date('F Y');
                } elseif (is_year()) {
                    echo 'Archives de ' . get_the_date('Y');
                } else {
                    echo 'Archives';
                }
                ?>
            </h1>
            <?php
            the_archive_description('<p>', '</p>');
        elseif (is_search()) :
            ?>
            <h1 class="gradient-text">
                Résultats pour : "<?php echo get_search_query(); ?>"
            </h1>
            <p>Voici les articles correspondant à votre recherche.</p>
            <?php
        else :
            ?>
            <h1 class="gradient-text">Notre Blog</h1>
            <p>Découvrez nos analyses, nos cas d'usage et nos réflexions sur l'intelligence artificielle pour rester à la pointe de l'innovation.</p>
            <?php
        endif;
        ?>
    </div>
</header>

<main>
    <!-- Section 2: Filtre de Catégories -->
    <section class="filter-section">
        <div class="container">
            <div class="filter-buttons">
                <?php
                // Filtres par catégorie
                $categories = get_categories(array(
                    'hide_empty' => true,
                    'number' => 6
                ));
                
                if (!empty($categories)) :
                ?>
                    <button class="filter-btn <?php echo !is_category() ? 'active' : ''; ?>" data-filter="all">Toutes les catégories</button>
                    <?php foreach ($categories as $category) : ?>
                        <button class="filter-btn <?php echo is_category($category->slug) ? 'active' : ''; ?>" data-filter="<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?></button>
                    <?php endforeach; ?>
                <?php else : ?>
                    <button class="filter-btn active" data-filter="all">Toutes les catégories</button>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Section 3: Grille des Articles -->
    <section class="blog-grid-section">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="articles-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        $categories = get_the_category();
                        $category_slug = !empty($categories) ? $categories[0]->slug : '';
                        $category_name = !empty($categories) ? $categories[0]->name : 'Non classé';
                        ?>
                        <div class="article-card" data-category="<?php echo esc_attr($category_slug); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                            <?php else : ?>
                                <img src="https://images.unsplash.com/photo-1677756119517-756a188d2d94?q=80&w=1170&auto=format&fit=crop" alt="<?php echo esc_attr(get_the_title()); ?>">
                            <?php endif; ?>
                            <div class="article-card-content">
                                <p class="category"><?php echo esc_html($category_name); ?></p>
                                <h4><?php the_title(); ?></h4>
                                <p>
                                    <?php
                                    $excerpt = has_excerpt() ? get_the_excerpt() : get_the_content();
                                    echo esc_html(wp_trim_words(wp_strip_all_tags($excerpt), 20, '…'));
                                    ?>
                                </p>
                                <a href="<?php the_permalink(); ?>">Lire la suite →</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="blog-pagination">
                    <?php
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => 'Précédent',
                        'next_text' => 'Suivant',
                        'before_page_number' => '<span class="screen-reader-text">Page </span>',
                    ));
                    ?>
                </div>

            <?php else : ?>
                <div class="blog-no-results">
                    <div class="no-results-content">
                        <h2>Aucun article trouvé</h2>
                        <p>Désolé, aucun contenu ne correspond à vos critères. Essayez de parcourir nos catégories ou utilisez la recherche.</p>
                        <div class="no-results-actions">
                            <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn-primary">Voir tous les articles</a>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-secondary">Retour à l'accueil</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Section 4: Touch Point Newsletter -->
    <section class="cta-section" id="contact">
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
</main>

<?php get_footer(); ?>
