<?php
/**
 * Template Name: Article EazyLink
 * Template pour l'affichage d'un article avec design system dark
 */

// Empêcher l'accès direct
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
    $categories = get_the_category();
    $primary_cat = !empty($categories) ? $categories[0] : null;
    $has_thumb = has_post_thumbnail();
    ?>

    <!-- Section Fil d'Ariane -->
    <section class="breadcrumb-section">
        <div class="container">
            <p class="breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a> / 
                <a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a> / 
                <?php if ($primary_cat) : ?>
                    <a href="<?php echo esc_url(get_category_link($primary_cat->term_id)); ?>"><?php echo esc_html($primary_cat->name); ?></a> / 
                <?php endif; ?>
                <span><?php echo esc_html(wp_trim_words(get_the_title(), 8, '...')); ?></span>
            </p>
        </div>
    </section>

    <!-- Header de l'article -->
    <header class="article-header">
        <div class="container">
            <?php if ($primary_cat) : ?>
                <p class="category"><?php echo esc_html($primary_cat->name); ?></p>
            <?php endif; ?>
            <h1><?php the_title(); ?></h1>
            <p class="article-meta">
                Publié le <?php echo esc_html(get_the_date('j F Y')); ?> | 
                Temps de lecture : 
                <?php
                $content = get_the_content();
                $word_count = str_word_count(strip_tags($content));
                $reading_time = ceil($word_count / 200); // 200 mots par minute
                echo $reading_time . ' minute' . ($reading_time > 1 ? 's' : '');
                ?>
            </p>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="container">
        <?php if ($has_thumb) : ?>
            <?php the_post_thumbnail('large', array('class' => 'article-image', 'alt' => get_the_title())); ?>
        <?php endif; ?>
        
        <article class="article-content">
            <?php the_content(); ?>

            <!-- Section de partage -->
            <div class="article-share">
                <p>Partager cet article :</p>
                <a href="#" class="share-btn" id="linkedin-share-btn" target="_blank" rel="noopener noreferrer">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                    </svg>
                    LinkedIn
                </a>
            </div>

            <!-- Touch Point CTA -->
            <div class="touch-point">
                <h2>Découvrez nos solutions IA</h2>
                <p>Transformez votre entreprise avec nos solutions d'intelligence artificielle personnalisées et notre accompagnement expert.</p>
                <div class="touch-point-actions">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Nous contacter</a>
                    <a href="<?php echo esc_url(home_url('/solutions/')); ?>" class="btn btn-secondary">Découvrir nos solutions</a>
                </div>
            </div>
        </article>
    </main>

    <script>
            const linkedinBtn = document.getElementById('linkedin-share-btn');
            if (linkedinBtn) {
                // Récupère l'URL actuelle de la page
                const postUrl = encodeURIComponent(window.location.href);
                // Récupère le titre de la page pour le pré-remplir
                const postTitle = encodeURIComponent(document.title);
                
                // Construit l'URL de partage LinkedIn
                const linkedinUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${postUrl}`;
                
                // Met à jour le lien du bouton
                linkedinBtn.href = linkedinUrl;
            }
        });
    </script>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
