<?php
/**
 * Fonctions du thème enfant EazyLink - Version propre
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Configuration environnement staging - DÉSACTIVÉ pour production
 */
// Fonction désactivée pour la production
// La détection staging et l'indicateur ont été retirés

/**
 * Configuration du thème enfant
 */
function eazylink_child_setup() {
    // Support des images mises en avant
    add_theme_support('post-thumbnails');
    
    // Tailles d'images personnalisées
    add_image_size('eazylink-card', 400, 300, true);
    add_image_size('eazylink-hero', 1920, 800, true);
    add_image_size('eazylink-expert', 300, 300, true);
    
    // Menus
    register_nav_menus(array(
        'primary' => 'Menu Principal',
        'footer'  => 'Menu Pied de Page',
    ));
}
add_action('after_setup_theme', 'eazylink_child_setup');

/**
 * Chargement des scripts (JS seulement, CSS géré par header.php)
 */
function eazylink_child_enqueue_scripts() {
    $theme_version = wp_get_theme()->get('Version');
    
    // Script des animations du header
    if (file_exists(get_stylesheet_directory() . '/js/header-animations.js')) {
        wp_enqueue_script(
            'eazylink-header-animations',
            get_stylesheet_directory_uri() . '/js/header-animations.js',
            array(),
            $theme_version,
            true
        );
    }
    
    // Script principal si il existe
    if (file_exists(get_stylesheet_directory() . '/js/main.js')) {
        wp_enqueue_script(
            'eazylink-script',
            get_stylesheet_directory_uri() . '/js/main.js',
            array('jquery'),
            $theme_version,
            true
        );
    }
    
    // Script des filtres blog
    if ((is_home() || is_archive() || is_search() || is_category() || is_tag()) && file_exists(get_stylesheet_directory() . '/js/blog-filters.js')) {
        wp_enqueue_script(
            'eazylink-blog-filters',
            get_stylesheet_directory_uri() . '/js/blog-filters.js',
            array(),
            $theme_version,
            true
        );
    }

    // Script animation logos du hero - uniquement sur la page d'accueil
    if ((is_front_page() || is_home()) && file_exists(get_stylesheet_directory() . '/js/hero-logos.js')) {
        wp_enqueue_script(
            'eazylink-hero-logos',
            get_stylesheet_directory_uri() . '/js/hero-logos.js',
            array(),
            $theme_version,
            true
        );
    }
    
    // Script menu mobile - sur toutes les pages
    wp_add_inline_script('jquery', "
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('.mobile-menu-button');
            const menuContainer = document.querySelector('.mobile-menu-container');
            
            if (menuButton && menuContainer) {
                menuButton.addEventListener('click', function() {
                    this.classList.toggle('active');
                    menuContainer.classList.toggle('active');
                });
                
                // Fermer le menu en cliquant sur un lien
                const menuLinks = menuContainer.querySelectorAll('.nav-item');
                menuLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        menuButton.classList.remove('active');
                        menuContainer.classList.remove('active');
                    });
                });
            }
        });
    ");
}
add_action('wp_enqueue_scripts', 'eazylink_child_enqueue_scripts');

/**
 * Ajouter le bouton hamburger dans le header
 */
function eazylink_add_mobile_button() {
    ?>
    <button class="mobile-menu-button" aria-label="Menu mobile" style="background: transparent !important; border: none !important; color: white !important; font-size: 1.8rem !important; cursor: pointer !important; padding: 0.5rem !important; z-index: 10001 !important; position: fixed !important; top: 20px !important; right: 20px !important;">
        <span class="menu-icon" style="display: block !important; font-size: 1.8rem !important; line-height: 1 !important;">☰</span>
        <span class="close-icon" style="display: none !important; font-size: 2rem !important; line-height: 1 !important; color: white !important;">✕</span>
    </button>
    <?php
}
add_action('astra_header', 'eazylink_add_mobile_button', 5);

/**
 * Ajouter le menu mobile après le header
 */
function eazylink_add_mobile_menu() {
    ?>
    <!-- Menu Mobile -->
    <div class="mobile-menu-container">
        <nav class="nav">
            <a href="<?php echo home_url('/'); ?>" class="nav-item">Accueil</a>
            <a href="<?php echo home_url('/experts-ia/'); ?>" class="nav-item">Expert IA</a>
            <a href="<?php echo home_url('/nos-solutions-ia/'); ?>" class="nav-item">Nos Solutions</a>
            <a href="<?php echo home_url('/blog/'); ?>" class="nav-item">Blog</a>
            <a href="<?php echo home_url('/about/'); ?>" class="nav-item">À Propos</a>
            <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-primary btn-header">Contact</a>
        </nav>
    </div>
    <?php
}
add_action('astra_body_top', 'eazylink_add_mobile_menu');

/**
 * Widgets
 */
function eazylink_child_widgets_init() {
    register_sidebar(array(
        'name'          => 'Barre latérale',
        'id'            => 'sidebar-1',
        'description'   => 'Widgets pour la barre latérale principale',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'eazylink_child_widgets_init');

/**
 * Optimisations SEO
 */
function eazylink_child_seo_setup() {
    // Meta tags Open Graph
    function eazylink_add_opengraph() {
        if (is_single() || is_page()) {
            global $post;
            if (has_post_thumbnail($post->ID)) {
                $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
                echo '<meta property="og:image" content="' . esc_attr($img_src[0]) . '"/>';
            }
            echo '<meta property="og:title" content="' . esc_attr(get_the_title()) . '"/>';
            echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '"/>';
            echo '<meta property="og:url" content="' . esc_attr(get_permalink()) . '"/>';
            
            $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20);
            echo '<meta property="og:description" content="' . esc_attr($excerpt) . '"/>';
        }
    }
    add_action('wp_head', 'eazylink_add_opengraph');
}
add_action('after_setup_theme', 'eazylink_child_seo_setup');

/**
 * Fonction utilitaire pour l'extrait personnalisé
 */
function eazylink_custom_excerpt($length = 20) {
    global $post;
    
    if (has_excerpt()) {
        return get_the_excerpt();
    }
    
    $content = get_the_content();
    $content = wp_strip_all_tags($content);
    return wp_trim_words($content, $length, '...');
}

/**
 * Chargement des CSS spécifiques aux pages
 */
function eazylink_page_specific_styles() {
    $theme_version = wp_get_theme()->get('Version');
    
    // CSS pour la page d'accueil - DÉSACTIVÉ (géré dans header.php)
    // Le chargement est fait directement dans header.php pour éviter les conflits
    
    // CSS pour la page des experts
    if (is_page_template('page-experts.php') || is_page('experts') || is_page('expert-ia')) {
        if (file_exists(get_stylesheet_directory() . '/css/page-experts.css')) {
            wp_enqueue_style(
                'eazylink-page-experts',
                get_stylesheet_directory_uri() . '/css/page-experts.css',
                array(),
                $theme_version
            );
        }
    }
    
    // CSS pour la page des solutions
    if (is_page_template('page-solutions.php') || is_page('solutions') || is_page_template('page-seo-geo-visibilite-google-ia.php') || is_page('seo-geo-visibilite-google-ia')) {
        if (file_exists(get_stylesheet_directory() . '/css/page-solutions.css')) {
            wp_enqueue_style(
                'eazylink-page-solutions',
                get_stylesheet_directory_uri() . '/css/page-solutions.css',
                array('eazylink-child-style'),
                $theme_version
            );
        }
    }
    
    // CSS pour la page about
    if (is_page_template('page-about.php') || is_page('about') || is_page('a-propos')) {
        if (file_exists(get_stylesheet_directory() . '/css/page-about.css')) {
            wp_enqueue_style(
                'eazylink-page-about',
                get_stylesheet_directory_uri() . '/css/page-about.css',
                array('eazylink-child-style'),
                $theme_version
            );
        }
    }
    
    // CSS pour la page 404
    if (is_404()) {
        if (file_exists(get_stylesheet_directory() . '/css/page-404.css')) {
            wp_enqueue_style(
                'eazylink-page-404',
                get_stylesheet_directory_uri() . '/css/page-404.css',
                array('eazylink-child-style'),
                $theme_version
            );
        }
    }
    
    // CSS pour la page contact
    if (is_page_template('page-contact.php') || is_page('contact')) {
        if (file_exists(get_stylesheet_directory() . '/css/page-contact.css')) {
            wp_enqueue_style(
                'eazylink-page-contact',
                get_stylesheet_directory_uri() . '/css/page-contact.css',
                array('eazylink-child-style'),
                $theme_version
            );
        }
    }
    
    // CSS pour la page blog et archives
    if (is_home() || is_archive() || is_search() || is_category() || is_tag()) {
        if (file_exists(get_stylesheet_directory() . '/css/page-blog.css')) {
            wp_enqueue_style(
                'eazylink-page-blog',
                get_stylesheet_directory_uri() . '/css/page-blog.css',
                array('eazylink-child-style'),
                $theme_version
            );
        }
    }
    
    // CSS pour la page FAQ
    if (is_page_template('page-faq.php') || is_page('faq') || is_page('foire-aux-questions')) {
        // Les styles FAQ sont déjà intégrés dans le design system, pas besoin de CSS supplémentaire
        // Mais on peut ajouter des styles spécifiques si nécessaire plus tard
    }
}
add_action('wp_enqueue_scripts', 'eazylink_page_specific_styles');

/**
 * Ajouter un menu d'administration pour créer des articles
 */
function eazylink_add_admin_menu() {
    add_management_page(
        'Créateur d\'Articles EazyLink',
        'Créer Articles',
        'manage_options',
        'eazylink-create-articles',
        'eazylink_create_articles_page'
    );
}
add_action('admin_menu', 'eazylink_add_admin_menu');

/**
 * Page d'administration pour créer des articles
 */
function eazylink_create_articles_page() {
    if (isset($_POST['create_articles'])) {
        $result = eazylink_create_sample_articles();
        echo '<div class="notice notice-success"><p>Articles créés avec succès !</p></div>';
    }
    ?>
    <div class="wrap">
        <h1>Créateur d'Articles EazyLink</h1>
        <p>Cet outil vous permet de créer automatiquement des articles de démonstration pour votre blog.</p>
        
        <form method="post">
            <?php wp_nonce_field('create_articles_action', 'create_articles_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Articles à créer</th>
                    <td>
                        <p>5 articles de démonstration seront créés dans les catégories suivantes :</p>
                        <ul>
                            <li>Intelligence Artificielle</li>
                            <li>Marketing Digital</li>
                            <li>SEO</li>
                            <li>Transformation Digitale</li>
                            <li>E-commerce</li>
                        </ul>
                    </td>
                </tr>
            </table>
            
            <?php submit_button('Créer les Articles', 'primary', 'create_articles'); ?>
        </form>
    </div>
    <?php
}

/**
 * Fonction pour créer des articles de démonstration
 */
function eazylink_create_sample_articles() {
    // Vérifier les permissions
    if (!current_user_can('publish_posts')) {
        return false;
    }
    
    $articles_data = [
        [
            'title' => 'L\'Intelligence Artificielle au Service de Votre Entreprise',
            'content' => 'L\'intelligence artificielle transforme radicalement le paysage entrepreneurial moderne. Dans cet article, nous explorons comment les entreprises peuvent tirer parti de l\'IA pour optimiser leurs processus, améliorer leur productivité et créer de nouvelles opportunités de croissance...',
            'category' => 'Intelligence Artificielle',
            'tags' => ['IA', 'Entreprise', 'Innovation'],
            'excerpt' => 'Découvrez comment l\'intelligence artificielle peut transformer votre entreprise et créer de nouvelles opportunités de croissance.'
        ],
        [
            'title' => 'Les Tendances du Marketing Digital en 2024',
            'content' => 'Le marketing digital évolue constamment, et 2024 apporte son lot de nouvelles tendances et opportunités...',
            'category' => 'Marketing Digital',
            'tags' => ['Marketing', 'Digital', 'Tendances'],
            'excerpt' => 'Explorez les tendances marketing digital de 2024 et découvrez comment adapter votre stratégie.'
        ]
        // Ajoutez d'autres articles selon vos besoins
    ];
    
    $created_articles = [];
    
    foreach ($articles_data as $article) {
        // Vérifier si l'article existe déjà
        $existing_post = get_page_by_title($article['title'], OBJECT, 'post');
        if ($existing_post) {
            continue;
        }
        
        // Créer la catégorie
        $category = wp_create_category($article['category']);
        
        // Créer l'article
        $post_data = [
            'post_title'    => $article['title'],
            'post_content'  => $article['content'],
            'post_excerpt'  => $article['excerpt'],
            'post_status'   => 'publish',
            'post_type'     => 'post',
            'post_author'   => get_current_user_id(),
            'post_category' => [$category],
            'tags_input'    => $article['tags']
        ];
        
        $post_id = wp_insert_post($post_data);
        
        if (!is_wp_error($post_id)) {
            $created_articles[] = $post_id;
        }
    }
    
    return $created_articles;
}

/**
 * Configuration de l'API REST WordPress pour N8N
 */

// Activer l'API REST pour les articles
add_action('rest_api_init', 'eazylink_register_rest_routes');

function eazylink_register_rest_routes() {
    // Route personnalisée pour créer des articles via N8N
    register_rest_route('eazylink/v1', '/create-article', array(
        'methods' => 'POST',
        'callback' => 'eazylink_create_article_via_api',
        'permission_callback' => 'eazylink_check_api_permissions',
        'args' => array(
            'title' => array(
                'required' => true,
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field',
            ),
            'content' => array(
                'required' => true,
                'type' => 'string',
                'sanitize_callback' => 'wp_kses_post',
            ),
            'excerpt' => array(
                'required' => false,
                'type' => 'string',
                'sanitize_callback' => 'sanitize_textarea_field',
            ),
            'category' => array(
                'required' => false,
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field',
            ),
            'tags' => array(
                'required' => false,
                'type' => 'array',
            ),
            'featured_image_url' => array(
                'required' => false,
                'type' => 'string',
                'sanitize_callback' => 'esc_url_raw',
            ),
            'status' => array(
                'required' => false,
                'type' => 'string',
                'default' => 'publish',
                'enum' => array('draft', 'publish', 'pending'),
            ),
        ),
    ));

    // Route pour récupérer les catégories
    register_rest_route('eazylink/v1', '/categories', array(
        'methods' => 'GET',
        'callback' => 'eazylink_get_categories_api',
        'permission_callback' => '__return_true',
    ));
}

/**
 * Vérifier les permissions pour l'API
 */
function eazylink_check_api_permissions($request) {
    // Vérifier si l'utilisateur a les droits de publication
    if (current_user_can('publish_posts')) {
        return true;
    }
    
    // Vérifier l'authentification par clé API (pour N8N)
    $api_key = $request->get_header('X-API-Key');
    $stored_api_key = get_option('eazylink_api_key');
    
    if ($api_key && $stored_api_key && hash_equals($stored_api_key, $api_key)) {
        return true;
    }
    
    return new WP_Error(
        'rest_forbidden',
        'Vous n\'avez pas les permissions nécessaires pour créer des articles.',
        array('status' => 403)
    );
}

/**
 * Créer un article via l'API REST
 */
function eazylink_create_article_via_api($request) {
    $params = $request->get_params();
    
    // Préparer les données de l'article
    $post_data = array(
        'post_title'    => $params['title'],
        'post_content'  => $params['content'],
        'post_excerpt'  => isset($params['excerpt']) ? $params['excerpt'] : '',
        'post_status'   => isset($params['status']) ? $params['status'] : 'publish',
        'post_type'     => 'post',
        'post_author'   => get_current_user_id() ?: 1, // Utiliser l'admin par défaut si pas d'utilisateur connecté
    );
    
    // Créer l'article
    $post_id = wp_insert_post($post_data);
    
    if (is_wp_error($post_id)) {
        return new WP_Error(
            'article_creation_failed',
            'Erreur lors de la création de l\'article: ' . $post_id->get_error_message(),
            array('status' => 500)
        );
    }
    
    // Gérer la catégorie
    if (isset($params['category']) && !empty($params['category'])) {
        $category_id = wp_create_category($params['category']);
        wp_set_post_categories($post_id, array($category_id));
    }
    
    // Gérer les tags
    if (isset($params['tags']) && is_array($params['tags'])) {
        wp_set_post_tags($post_id, $params['tags']);
    }
    
    // Gérer l'image à la une
    if (isset($params['featured_image_url']) && !empty($params['featured_image_url'])) {
        $attachment_id = eazylink_upload_image_from_url($params['featured_image_url'], $post_id);
        if ($attachment_id && !is_wp_error($attachment_id)) {
            set_post_thumbnail($post_id, $attachment_id);
        }
    }
    
    // Retourner les informations de l'article créé
    $post = get_post($post_id);
    return array(
        'success' => true,
        'post_id' => $post_id,
        'post_url' => get_permalink($post_id),
        'edit_url' => get_edit_post_link($post_id),
        'title' => $post->post_title,
        'status' => $post->post_status,
        'date' => $post->post_date,
    );
}

/**
 * Récupérer les catégories via l'API
 */
function eazylink_get_categories_api($request) {
    $categories = get_categories(array(
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC',
    ));
    
    $formatted_categories = array();
    foreach ($categories as $category) {
        $formatted_categories[] = array(
            'id' => $category->term_id,
            'name' => $category->name,
            'slug' => $category->slug,
            'count' => $category->count,
        );
    }
    
    return array(
        'success' => true,
        'categories' => $formatted_categories,
    );
}

/**
 * Uploader une image depuis une URL
 */
function eazylink_upload_image_from_url($image_url, $post_id = 0) {
    if (!function_exists('media_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');
    }
    
    // Télécharger l'image
    $tmp = download_url($image_url);
    
    if (is_wp_error($tmp)) {
        return $tmp;
    }
    
    // Préparer le fichier pour l'upload
    $file_array = array(
        'name' => basename($image_url),
        'tmp_name' => $tmp,
    );
    
    // Uploader le fichier
    $attachment_id = media_handle_sideload($file_array, $post_id);
    
    // Nettoyer le fichier temporaire
    if (is_wp_error($attachment_id)) {
        @unlink($file_array['tmp_name']);
        return $attachment_id;
    }
    
    return $attachment_id;
}

/**
 * Ajouter une page d'administration pour configurer l'API
 */
add_action('admin_menu', 'eazylink_add_api_settings_page');

function eazylink_add_api_settings_page() {
    add_options_page(
        'Configuration API EazyLink',
        'API EazyLink',
        'manage_options',
        'eazylink-api-settings',
        'eazylink_api_settings_page'
    );
}

/**
 * Page de configuration de l'API
 */
function eazylink_api_settings_page() {
    if (isset($_POST['save_api_settings'])) {
        if (wp_verify_nonce($_POST['api_settings_nonce'], 'save_api_settings')) {
            $api_key = sanitize_text_field($_POST['api_key']);
            update_option('eazylink_api_key', $api_key);
            echo '<div class="notice notice-success"><p>Configuration API sauvegardée !</p></div>';
        }
    }
    
    $current_api_key = get_option('eazylink_api_key', '');
    if (empty($current_api_key)) {
        $current_api_key = wp_generate_password(32, false);
        update_option('eazylink_api_key', $current_api_key);
    }
    ?>
    <div class="wrap">
        <h1>Configuration API EazyLink</h1>
        <p>Configuration pour l'intégration avec N8N et autres services externes.</p>
        
        <form method="post">
            <?php wp_nonce_field('save_api_settings', 'api_settings_nonce'); ?>
            
            <table class="form-table">
                <tr>
                    <th scope="row">Clé API</th>
                    <td>
                        <input type="text" name="api_key" value="<?php echo esc_attr($current_api_key); ?>" class="regular-text" readonly />
                        <p class="description">
                            Cette clé doit être utilisée dans l'en-tête <code>X-API-Key</code> pour authentifier les requêtes N8N.
                            <br><strong>Gardez cette clé secrète !</strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">URL de l'API</th>
                    <td>
                        <code><?php echo esc_url(rest_url('eazylink/v1/create-article')); ?></code>
                        <p class="description">URL à utiliser dans N8N pour créer des articles.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">URL des catégories</th>
                    <td>
                        <code><?php echo esc_url(rest_url('eazylink/v1/categories')); ?></code>
                        <p class="description">URL pour récupérer la liste des catégories.</p>
                    </td>
                </tr>
            </table>
            
            <h2>Exemple de requête N8N</h2>
            <pre style="background: #f1f1f1; padding: 15px; border-radius: 5px; overflow-x: auto;">
POST <?php echo esc_url(rest_url('eazylink/v1/create-article')); ?>

Headers:
Content-Type: application/json
X-API-Key: <?php echo esc_attr($current_api_key); ?>

Body (JSON):
{
  "title": "Titre de l'article",
  "content": "Contenu complet de l'article en HTML",
  "excerpt": "Résumé de l'article",
  "category": "Intelligence Artificielle",
  "tags": ["IA", "Innovation", "Technologie"],
  "featured_image_url": "https://example.com/image.jpg",
  "status": "publish"
}
            </pre>
            
            <?php submit_button('Régénérer la clé API', 'secondary', 'save_api_settings'); ?>
        </form>
        
        <h2>Test de l'API</h2>
        <p>Vous pouvez tester l'API en utilisant les endpoints WordPress natifs :</p>
        <ul>
            <li><strong>Lister les articles :</strong> <code><?php echo esc_url(rest_url('wp/v2/posts')); ?></code></li>
            <li><strong>Créer un article :</strong> <code><?php echo esc_url(rest_url('wp/v2/posts')); ?></code> (POST)</li>
            <li><strong>Lister les catégories :</strong> <code><?php echo esc_url(rest_url('wp/v2/categories')); ?></code></li>
        </ul>
    </div>
    <?php
}

/**
 * Enregistrement des chaînes de traduction Polylang
 */
function eazylink_register_polylang_strings() {
    if (function_exists('pll_register_string')) {
        // Navigation principale
        pll_register_string('navigation', 'Accueil', 'EazyLink');
        pll_register_string('navigation', 'Expert IA', 'EazyLink');
        pll_register_string('navigation', 'Nos Solutions', 'EazyLink');
        pll_register_string('navigation', 'Blog', 'EazyLink');
        pll_register_string('navigation', 'À Propos', 'EazyLink');
        pll_register_string('navigation', 'Contact', 'EazyLink');
        
        // Footer
        pll_register_string('footer', 'Navigation', 'EazyLink');
        pll_register_string('footer', 'Contact', 'EazyLink');
        pll_register_string('footer', 'Suivez-nous', 'EazyLink');
        pll_register_string('footer', 'Tous droits réservés', 'EazyLink');
        pll_register_string('footer', 'Mentions Légales', 'EazyLink');
        pll_register_string('footer', 'Politique de Confidentialité', 'EazyLink');
        pll_register_string('footer', 'CGV', 'EazyLink');
        
        // Boutons et CTA
        pll_register_string('buttons', 'Découvrir nos solutions', 'EazyLink');
        pll_register_string('buttons', 'Contactez-nous', 'EazyLink');
        pll_register_string('buttons', 'En savoir plus', 'EazyLink');
        pll_register_string('buttons', 'Commencer', 'EazyLink');
        pll_register_string('buttons', 'Voir plus', 'EazyLink');
        pll_register_string('buttons', 'Lire la suite', 'EazyLink');
        
        // Textes généraux
        pll_register_string('general', 'Nous aidons les entreprises à intégrer l\'IA de manière stratégique et efficace pour transformer leurs opérations et stimuler leur croissance.', 'EazyLink');
        pll_register_string('general', 'Transformez votre entreprise avec l\'Intelligence Artificielle', 'EazyLink');
        pll_register_string('general', 'Des solutions IA sur mesure pour votre secteur', 'EazyLink');
        
        // Blog et articles
        pll_register_string('blog', 'Temps de lecture', 'EazyLink');
        pll_register_string('blog', 'min de lecture', 'EazyLink');
        pll_register_string('blog', 'Partager sur LinkedIn', 'EazyLink');
        pll_register_string('blog', 'Articles récents', 'EazyLink');
        pll_register_string('blog', 'Catégories', 'EazyLink');
        pll_register_string('blog', 'Tous les articles', 'EazyLink');
        
        // FAQ
        pll_register_string('faq', 'Questions Fréquentes', 'EazyLink');
        pll_register_string('faq', 'Vous avez des questions ?', 'EazyLink');
        
        // Formulaires
        pll_register_string('forms', 'Nom', 'EazyLink');
        pll_register_string('forms', 'Email', 'EazyLink');
        pll_register_string('forms', 'Message', 'EazyLink');
        pll_register_string('forms', 'Envoyer', 'EazyLink');
        pll_register_string('forms', 'Votre nom', 'EazyLink');
        pll_register_string('forms', 'Votre email', 'EazyLink');
        pll_register_string('forms', 'Votre message', 'EazyLink');
    }
}
add_action('init', 'eazylink_register_polylang_strings');

/**
 * Fonction helper pour les traductions Polylang
 */
function eazylink_translate($string, $context = 'general') {
    if (function_exists('pll__')) {
        return pll__($string);
    }
    return $string;
}

/**
 * Fonction helper pour afficher les traductions Polylang
 */
function eazylink_translate_e($string, $context = 'general') {
    if (function_exists('pll_e')) {
        pll_e($string);
    } else {
        echo esc_html($string);
    }
}

/**
 * ============================================================================
 * FORMULAIRE DE CONTACT - CONFIGURATION ET TRAITEMENT
 * ============================================================================
 */

/**
 * Configuration reCAPTCHA
 */
define('EAZYLINK_RECAPTCHA_SITE_KEY', ''); // À remplir avec votre clé site
define('EAZYLINK_RECAPTCHA_SECRET_KEY', ''); // À remplir avec votre clé secrète

/**
 * Configuration Telegram (Optionnel)
 */
define('EAZYLINK_TELEGRAM_BOT_TOKEN', '8132762264:AAF3DmFvlD7pT1kVABnu7WZjK-SnL-zjlN4'); // Token du bot Telegram
define('EAZYLINK_TELEGRAM_CHAT_ID', '-4813206847'); // Votre Chat ID Telegram

/**
 * Ajouter le script reCAPTCHA sur la page contact
 */
function eazylink_enqueue_recaptcha() {
    if (is_page_template('page-contact.php') || is_page('contact')) {
        if (!empty(EAZYLINK_RECAPTCHA_SITE_KEY)) {
            wp_enqueue_script(
                'google-recaptcha',
                'https://www.google.com/recaptcha/api.js?render=' . EAZYLINK_RECAPTCHA_SITE_KEY,
                array(),
                null,
                true
            );
        }
    }
}
add_action('wp_enqueue_scripts', 'eazylink_enqueue_recaptcha');

/**
 * Vérifier le reCAPTCHA
 */
function eazylink_verify_recaptcha($token) {
    if (empty(EAZYLINK_RECAPTCHA_SECRET_KEY)) {
        return true; // Pas de reCAPTCHA configuré
    }
    
    $response = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', array(
        'body' => array(
            'secret' => EAZYLINK_RECAPTCHA_SECRET_KEY,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        )
    ));
    
    if (is_wp_error($response)) {
        return false;
    }
    
    $body = json_decode(wp_remote_retrieve_body($response));
    
    // Score minimum de 0.5 (0.0 = bot, 1.0 = humain)
    return isset($body->success) && $body->success && $body->score >= 0.5;
}

/**
 * Envoyer une notification Telegram
 */
function eazylink_send_telegram_notification($name, $email, $company, $phone, $subject, $message) {
    if (empty(EAZYLINK_TELEGRAM_BOT_TOKEN) || empty(EAZYLINK_TELEGRAM_CHAT_ID)) {
        return false; // Telegram non configuré
    }
    
    // Formater le message Telegram
    $telegram_message = "🔔 *Nouveau message de contact EazyLink*\n\n";
    $telegram_message .= "👤 *Nom :* " . $name . "\n";
    $telegram_message .= "📧 *Email :* " . $email . "\n";
    
    if (!empty($company)) {
        $telegram_message .= "🏢 *Entreprise :* " . $company . "\n";
    }
    
    if (!empty($phone)) {
        $telegram_message .= "📱 *Téléphone :* " . $phone . "\n";
    }
    
    $telegram_message .= "📋 *Sujet :* " . $subject . "\n\n";
    $telegram_message .= "💬 *Message :*\n" . $message . "\n\n";
    $telegram_message .= "🌐 *IP :* " . $_SERVER['REMOTE_ADDR'] . "\n";
    $telegram_message .= "📅 *Date :* " . current_time('d/m/Y H:i');
    
    // Envoyer via l'API Telegram
    $url = 'https://api.telegram.org/bot' . EAZYLINK_TELEGRAM_BOT_TOKEN . '/sendMessage';
    
    $response = wp_remote_post($url, array(
        'body' => array(
            'chat_id' => EAZYLINK_TELEGRAM_CHAT_ID,
            'text' => $telegram_message,
            'parse_mode' => 'Markdown'
        )
    ));
    
    return !is_wp_error($response);
}

/**
 * Créer la table pour stocker les soumissions de contact
 */
function eazylink_create_contact_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'eazylink_contacts';
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        company varchar(255) DEFAULT NULL,
        phone varchar(50) DEFAULT NULL,
        subject varchar(255) DEFAULT NULL,
        message text NOT NULL,
        ip_address varchar(100) DEFAULT NULL,
        user_agent text DEFAULT NULL,
        privacy_accepted tinyint(1) DEFAULT 1,
        status varchar(20) DEFAULT 'new',
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id),
        KEY email (email),
        KEY created_at (created_at)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'eazylink_create_contact_table');
add_action('after_switch_theme', 'eazylink_create_contact_table');
// Forcer la création au chargement de l'admin (s'exécute une fois)
add_action('admin_init', 'eazylink_ensure_contact_table');

function eazylink_ensure_contact_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'eazylink_contacts';
    
    // Vérifier si la table existe déjà
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        eazylink_create_contact_table();
    }
}

/**
 * Traitement du formulaire de contact
 */
add_action('admin_post_eazylink_contact', 'eazylink_handle_contact_form');
add_action('admin_post_nopriv_eazylink_contact', 'eazylink_handle_contact_form');

function eazylink_handle_contact_form() {
    // 1. Vérification du nonce (sécurité CSRF)
    if (!isset($_POST['eazylink_nonce']) || !wp_verify_nonce($_POST['eazylink_nonce'], 'eazylink_contact')) {
        wp_redirect(add_query_arg('contact_status', 'invalid_nonce', wp_get_referer()));
        exit;
    }
    
    // 2. Honeypot anti-spam (champ caché)
    if (!empty($_POST['website'])) {
        wp_redirect(add_query_arg('contact_status', 'spam', wp_get_referer()));
        exit;
    }
    
    // 3. Vérification de la case confidentialité
    if (!isset($_POST['privacy']) || $_POST['privacy'] !== 'on') {
        wp_redirect(add_query_arg('contact_status', 'privacy_required', wp_get_referer()));
        exit;
    }
    
    // 4. Vérification reCAPTCHA
    if (!empty(EAZYLINK_RECAPTCHA_SECRET_KEY)) {
        $recaptcha_token = isset($_POST['recaptcha_token']) ? sanitize_text_field($_POST['recaptcha_token']) : '';
        if (!eazylink_verify_recaptcha($recaptcha_token)) {
            wp_redirect(add_query_arg('contact_status', 'recaptcha_failed', wp_get_referer()));
            exit;
        }
    }
    
    // 5. Validation et nettoyage des données
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $company = sanitize_text_field($_POST['company']);
    $phone = sanitize_text_field($_POST['phone']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Validation des champs obligatoires
    if (empty($name) || empty($email) || empty($message)) {
        wp_redirect(add_query_arg('contact_status', 'validation_error', wp_get_referer()));
        exit;
    }
    
    // Validation de l'email
    if (!is_email($email)) {
        wp_redirect(add_query_arg('contact_status', 'invalid_email', wp_get_referer()));
        exit;
    }
    
    // 6. Stockage en base de données
    global $wpdb;
    $table_name = $wpdb->prefix . 'eazylink_contacts';
    
    $inserted = $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'email' => $email,
            'company' => $company,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message,
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'privacy_accepted' => 1,
            'status' => 'new',
            'created_at' => current_time('mysql')
        ),
        array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%s', '%s')
    );
    
    // 7. Préparation de l'email
    $to = get_option('admin_email'); // Ou 'hello@eazylink.fr'
    $email_subject = '[EazyLink] Nouveau message de contact - ' . $subject;
    
    // Corps de l'email en HTML
    $email_body = '<html><body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">';
    $email_body .= '<div style="max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; border-radius: 10px;">';
    $email_body .= '<h2 style="color: #FF7043; border-bottom: 2px solid #FF7043; padding-bottom: 10px;">Nouveau message de contact</h2>';
    $email_body .= '<table style="width: 100%; margin: 20px 0;">';
    $email_body .= '<tr><td style="padding: 10px; background: white; border-radius: 5px; margin-bottom: 10px;"><strong>Nom :</strong> ' . esc_html($name) . '</td></tr>';
    $email_body .= '<tr><td style="padding: 10px; background: white; border-radius: 5px; margin-bottom: 10px;"><strong>Email :</strong> <a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a></td></tr>';
    if (!empty($company)) {
        $email_body .= '<tr><td style="padding: 10px; background: white; border-radius: 5px; margin-bottom: 10px;"><strong>Entreprise :</strong> ' . esc_html($company) . '</td></tr>';
    }
    if (!empty($phone)) {
        $email_body .= '<tr><td style="padding: 10px; background: white; border-radius: 5px; margin-bottom: 10px;"><strong>Téléphone :</strong> ' . esc_html($phone) . '</td></tr>';
    }
    $email_body .= '<tr><td style="padding: 10px; background: white; border-radius: 5px; margin-bottom: 10px;"><strong>Sujet :</strong> ' . esc_html($subject) . '</td></tr>';
    $email_body .= '</table>';
    $email_body .= '<div style="padding: 20px; background: white; border-radius: 5px; margin: 20px 0;">';
    $email_body .= '<strong>Message :</strong><br><br>' . nl2br(esc_html($message));
    $email_body .= '</div>';
    $email_body .= '<p style="font-size: 12px; color: #999; margin-top: 20px;">IP: ' . esc_html($_SERVER['REMOTE_ADDR']) . ' | Date: ' . current_time('d/m/Y H:i') . '</p>';
    $email_body .= '</div></body></html>';
    
    // Headers de l'email
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );
    
    // 8. Envoi de l'email
    $mail_sent = wp_mail($to, $email_subject, $email_body, $headers);
    
    // 8b. Envoi notification Telegram (si configuré)
    eazylink_send_telegram_notification($name, $email, $company, $phone, $subject, $message);
    
    // 9. Email de confirmation au client (optionnel)
    if ($mail_sent) {
        $client_subject = 'Confirmation de réception - EazyLink';
        $client_body = '<html><body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">';
        $client_body .= '<div style="max-width: 600px; margin: 0 auto; padding: 20px;">';
        $client_body .= '<h2 style="color: #FF7043;">Merci pour votre message !</h2>';
        $client_body .= '<p>Bonjour ' . esc_html($name) . ',</p>';
        $client_body .= '<p>Nous avons bien reçu votre message et nous vous répondrons dans les plus brefs délais.</p>';
        $client_body .= '<div style="padding: 15px; background: #f9f9f9; border-left: 4px solid #FF7043; margin: 20px 0;">';
        $client_body .= '<p style="margin: 0;"><strong>Récapitulatif de votre demande :</strong></p>';
        $client_body .= '<p style="margin: 10px 0 0 0;">' . nl2br(esc_html($message)) . '</p>';
        $client_body .= '</div>';
        $client_body .= '<p>À très bientôt,<br><strong>L\'équipe EazyLink</strong></p>';
        $client_body .= '</div></body></html>';
        
        $client_headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: EazyLink <' . get_option('admin_email') . '>'
        );
        
        wp_mail($email, $client_subject, $client_body, $client_headers);
    }
    
    // 10. Redirection avec message de statut
    if ($mail_sent && $inserted) {
        wp_redirect(add_query_arg('contact_status', 'success', wp_get_referer()));
    } else {
        wp_redirect(add_query_arg('contact_status', 'send_error', wp_get_referer()));
    }
    exit;
}

/**
 * Ajouter une page d'administration pour voir les contacts
 */
add_action('admin_menu', 'eazylink_add_contacts_menu');

function eazylink_add_contacts_menu() {
    add_menu_page(
        'Messages de Contact',
        'Contacts',
        'manage_options',
        'eazylink-contacts',
        'eazylink_contacts_page',
        'dashicons-email',
        26
    );
}

function eazylink_contacts_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'eazylink_contacts';
    
    // Traitement des actions
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
        $wpdb->delete($table_name, array('id' => intval($_GET['id'])));
        echo '<div class="notice notice-success"><p>Contact supprimé avec succès.</p></div>';
    }
    
    if (isset($_GET['action']) && $_GET['action'] === 'mark_read' && isset($_GET['id'])) {
        $wpdb->update($table_name, array('status' => 'read'), array('id' => intval($_GET['id'])));
    }
    
    // Récupérer les contacts
    $contacts = $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC");
    
    ?>
    <div class="wrap">
        <h1>Messages de Contact</h1>
        <p>Tous les messages reçus via le formulaire de contact.</p>
        
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Entreprise</th>
                    <th>Sujet</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($contacts)) : ?>
                    <tr>
                        <td colspan="9" style="text-align: center; padding: 20px;">Aucun message pour le moment.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($contacts as $contact) : ?>
                        <tr style="<?php echo $contact->status === 'new' ? 'background: #fff3cd;' : ''; ?>">
                            <td><?php echo esc_html($contact->id); ?></td>
                            <td><strong><?php echo esc_html($contact->name); ?></strong></td>
                            <td><a href="mailto:<?php echo esc_attr($contact->email); ?>"><?php echo esc_html($contact->email); ?></a></td>
                            <td><?php echo esc_html($contact->company); ?></td>
                            <td><?php echo esc_html($contact->subject); ?></td>
                            <td><?php echo esc_html(wp_trim_words($contact->message, 10)); ?></td>
                            <td><?php echo esc_html(date('d/m/Y H:i', strtotime($contact->created_at))); ?></td>
                            <td>
                                <?php if ($contact->status === 'new') : ?>
                                    <span style="color: #d63638; font-weight: bold;">● Nouveau</span>
                                <?php else : ?>
                                    <span style="color: #00a32a;">✓ Lu</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="?page=eazylink-contacts&action=mark_read&id=<?php echo $contact->id; ?>" class="button button-small">Marquer lu</a>
                                <a href="?page=eazylink-contacts&action=delete&id=<?php echo $contact->id; ?>" class="button button-small" onclick="return confirm('Supprimer ce contact ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}
?>
