<?php
/**
 * Header du thème enfant EazyLink
 * Compatible avec Astra
 */

if (!defined('ABSPATH')) {
    exit;
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if (apply_filters('astra_header_profile_gmpg_link', true)) {
    ?>
    <link rel="profile" href="https://gmpg.org/xfn/11"> 
    <?php
}
?>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    
    <!-- DESIGN SYSTEM - CHARGÉ EN PREMIER pour établir la base -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/design-system.css?v=<?php echo wp_get_theme()->get('Version'); ?>&t=<?php echo time(); ?>">
    
    <?php
    // CSS pour la page d'accueil (front-page)
    if (is_front_page() || is_home()) {
        if (file_exists(get_stylesheet_directory() . '/assets/css/front-page.css')) {
            echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/assets/css/front-page.css?v=' . wp_get_theme()->get('Version') . '&t=' . time() . '">';
        }
        if (file_exists(get_stylesheet_directory() . '/assets/css/hero-logos.css')) {
            echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/assets/css/hero-logos.css?v=' . wp_get_theme()->get('Version') . '">';
        }
    }
    
    // Chargement conditionnel du CSS spécifique aux pages
    if (is_page_template('page-experts.php') || is_page('experts') || is_page('expert-ia')) {
        if (file_exists(get_stylesheet_directory() . '/css/page-experts.css')) {
            echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/css/page-experts.css?v=' . wp_get_theme()->get('Version') . '">';
        }
    }
    
    // CSS pour la page des solutions (avec cache-busting sur filemtime)
    if (is_page_template('page-solutions.php') || is_page('solutions') || is_page('nos-solutions') || is_page('nos-solutions-ia') || is_page_template('page-seo-geo-visibilite-google-ia.php') || is_page('seo-geo-visibilite-google-ia')) {
        $solutions_css_path = get_stylesheet_directory() . '/css/page-solutions.css';
        if (file_exists($solutions_css_path)) {
            $solutions_css_uri = get_stylesheet_directory_uri() . '/css/page-solutions.css';
            $solutions_css_mtime = @filemtime($solutions_css_path);
            $version_param = wp_get_theme()->get('Version');
            $cache_bust = $solutions_css_mtime ? ('&t=' . $solutions_css_mtime) : '';
            echo '<link rel="stylesheet" href="' . $solutions_css_uri . '?v=' . $version_param . $cache_bust . '">';
        }
    }
    
    // CSS pour la page d'accueil (template personnalisé) - DÉSACTIVÉ
    // Ce fichier crée des conflits avec le footer glassmorphism
    // Utiliser front-page.css à la place
    
    // CSS pour la page blog et archives
    if (is_home() || is_archive() || is_search() || is_category() || is_tag()) {
        if (file_exists(get_stylesheet_directory() . '/css/page-blog.css')) {
            echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/css/page-blog.css?v=' . wp_get_theme()->get('Version') . '">';
        }
    }
    
    // CSS pour les articles individuels
    if (is_single()) {
        if (file_exists(get_stylesheet_directory() . '/css/single-article.css')) {
            echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/css/single-article.css?v=' . wp_get_theme()->get('Version') . '">';
        }
    }
    
    // CSS pour la page About - Détection améliorée
    $is_about_page = (
        is_page_template('page-about.php') || 
        is_page('about') || 
        is_page('a-propos') ||
        (function_exists('get_page_template_slug') && get_page_template_slug() === 'page-about') ||
        (isset($post) && $post && $post->post_name === 'about') ||
        (isset($post) && $post && $post->post_name === 'a-propos') ||
        strpos($_SERVER['REQUEST_URI'], '/about') !== false ||
        strpos($_SERVER['REQUEST_URI'], '/a-propos') !== false
    );
    
    if ($is_about_page) {
        if (file_exists(get_stylesheet_directory() . '/css/page-about.css')) {
            echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/css/page-about.css?v=' . wp_get_theme()->get('Version') . '">';
        }
        // Debug
        echo '<!-- DEBUG: About page CSS loaded -->';
    }
    
    // CSS pour la page Contact
    if (is_page_template('page-contact.php') || is_page('contact')) {
        if (file_exists(get_stylesheet_directory() . '/css/page-contact.css')) {
            echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/css/page-contact.css?v=' . wp_get_theme()->get('Version') . '">';
        }
    }
    ?>
    
    <!-- CSS PAGE ABOUT - CHARGÉ DIRECTEMENT -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/page-about.css?v=<?php echo wp_get_theme()->get('Version'); ?>">
    
    <!-- BURGER MENU FIX - Z-INDEX -->
    <style>
    /* Fix z-index pour burger menu responsive */
    @media (max-width: 1200px) {
        .burger-menu {
            z-index: 1002 !important;
            position: relative !important;
        }

        .eazylink-header {
            z-index: 1001 !important;
        }

        .mobile-nav {
            z-index: 1000 !important;
        }
    }
    </style>
    
    <!-- CSS COMPLÉMENTAIRE -->
    <style>
    /* RESET ET BASE */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    
    /* SUPPRIMÉ : Styles footer page d'accueil - Le design-system.css gère tout uniformément */
    
    <?php if ((is_home() && !is_front_page()) || is_archive() || is_search() || is_category() || is_tag()) : ?>
    /* STYLES BLOG FORCÉS */
    body {
        font-family: 'Inter', sans-serif !important;
        background-color: #1a1a3e !important;
        color: #FFFFFF !important;
        line-height: 1.6 !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    
    .container { 
        max-width: 1500px !important; 
        margin: 0 auto !important; 
        padding: 0 24px !important; 
    }
    
    .hero-section { 
        padding: 16px 0 !important; 
        text-align: center !important; 
        background: #2d1b69 !important; 
    }
    
    .hero-section h1 { 
        max-width: 800px !important; 
        margin: 0 auto 16px !important; 
        font-size: 2.2rem !important; 
        font-family: 'Montserrat', sans-serif !important;
    }
    
    .hero-section p { 
        max-width: 600px !important; 
        margin: 0 auto !important; 
        font-size: 1rem !important; 
        color: rgba(255, 255, 255, 0.7) !important; 
    }
    
    .gradient-text { 
        background: linear-gradient(135deg, #FFFFFF 0%, #FF7043 50%, #ff006e 100%) !important;
        -webkit-background-clip: text !important; 
        -webkit-text-fill-color: transparent !important; 
        background-clip: text !important; 
    }
    
    .filter-section { 
        padding: 24px 0 !important; 
        background-color: #1a1a3e !important; 
    }
    
    .filter-buttons { 
        display: flex !important; 
        justify-content: center !important; 
        flex-wrap: wrap !important; 
        gap: 16px !important; 
    }
    
    .filter-btn {
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        color: rgba(255, 255, 255, 0.7) !important;
        padding: 12px 24px !important;
        border-radius: 50px !important;
        cursor: pointer !important;
        font-family: 'Montserrat', sans-serif !important;
        font-weight: 600 !important;
        transition: all 0.3s ease !important;
    }
    
    .filter-btn:hover {
        background: rgba(255, 255, 255, 0.1) !important;
        color: #FFFFFF !important;
    }
    
    .filter-btn.active {
        background: linear-gradient(135deg, #FF7043 0%, #ff006e 100%) !important;
        color: #FFFFFF !important;
        border-color: transparent !important;
    }
    
    .blog-grid-section { 
        padding-top: 24px !important; 
    }
    
    .articles-grid {
        display: grid !important;
        grid-template-columns: 1fr !important;
        gap: 24px !important;
    }
    
    .article-card {
        background: rgba(255, 255, 255, 0.05) !important;
        border-radius: 16px !important;
        overflow: hidden !important;
        transition: transform 0.3s ease, opacity 0.4s ease !important;
        display: flex !important;
        flex-direction: column !important;
    }
    
    .article-card.hidden {
        transform: scale(0.9) !important;
        opacity: 0 !important;
        height: 0 !important;
        padding: 0 !important;
        margin: 0 !important;
        overflow: hidden !important;
    }
    
    .article-card:hover { 
        transform: translateY(-5px) !important; 
    }
    
    .article-card img { 
        width: 100% !important; 
        height: 200px !important; 
        object-fit: cover !important; 
    }
    
    .article-card-content { 
        padding: 24px !important; 
        flex-grow: 1 !important; 
        display: flex !important; 
        flex-direction: column !important; 
    }
    
    .article-card-content .category { 
        color: #FF7043 !important; 
        font-weight: 700 !important; 
        font-size: 0.8rem !important; 
        text-transform: uppercase !important; 
        margin-bottom: 8px !important; 
    }
    
    .article-card-content h4 { 
        margin-bottom: 16px !important; 
        font-size: 1.1rem !important; 
        color: #FFFFFF !important;
        font-family: 'Montserrat', sans-serif !important;
    }
    
    .article-card-content p { 
        font-size: 0.9rem !important; 
        color: rgba(255, 255, 255, 0.7) !important; 
        margin-bottom: 24px !important; 
        flex-grow: 1 !important; 
    }
    
    .article-card-content a { 
        color: #FFFFFF !important; 
        text-decoration: none !important; 
        font-weight: 700 !important; 
    }
    
    .cta-section { 
        background: linear-gradient(135deg, #FF7043 0%, #ff006e 100%) !important; 
        text-align: center !important; 
        padding: 96px 0 !important;
    }
    
    .cta-section h3 { 
        margin-bottom: 16px !important; 
        color: #FFFFFF !important;
        font-family: 'Montserrat', sans-serif !important;
    }
    
    .cta-section p { 
        max-width: 500px !important; 
        margin: 0 auto 48px !important; 
        color: #FFFFFF !important;
    }
    
    @media (min-width: 768px) {
        .articles-grid { 
            grid-template-columns: repeat(2, 1fr) !important; 
        }
    }
    
    @media (min-width: 1200px) {
        .articles-grid { 
            grid-template-columns: repeat(3, 1fr) !important; 
        }
    }
    
    @media (min-width: 1500px) {
        .articles-grid { 
            grid-template-columns: repeat(4, 1fr) !important; 
        }
    }
    
    <?php elseif (is_single()) : ?>
    /* STYLES ARTICLE FORCÉS - Structure simplifiée */
    body {
        font-family: 'Inter', sans-serif !important;
        background-color: #1a1a3e !important;
        color: #FFFFFF !important;
        line-height: 1.7 !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    
    .container { 
        max-width: 800px !important; 
        margin: 0 auto !important; 
        padding: 0 24px !important; 
    }
    
    h1, h2, h3 { 
        font-family: 'Montserrat', sans-serif !important; 
        font-weight: 700 !important; 
        line-height: 1.3 !important; 
        margin-bottom: 24px !important; 
    }
    h1 { font-size: 2.8rem !important; }
    h2 { font-size: 2rem !important; margin-top: 48px !important; }
    h3 { font-size: 1.5rem !important; margin-top: 24px !important; color: #FF7043 !important; }
    
    p { margin-bottom: 16px !important; color: rgba(255, 255, 255, 0.8) !important; }
    a { color: #FF7043 !important; text-decoration: none !important; font-weight: 600 !important; }
    a:hover { text-decoration: underline !important; }
    strong { color: #FFFFFF !important; font-weight: 700 !important; }
    ul { list-style-position: inside !important; padding-left: 16px !important; margin-bottom: 16px !important; }
    li { margin-bottom: 8px !important; }
    
    .breadcrumb-section {
        padding: 24px 0 !important;
        background-color: #2d1b69 !important;
    }
    .breadcrumb {
        font-size: 0.9rem !important;
        color: rgba(255, 255, 255, 0.8) !important;
    }
    .breadcrumb a {
        color: rgba(255, 255, 255, 0.8) !important;
        transition: color 0.3s ease !important;
    }
    .breadcrumb a:hover {
        color: #FFFFFF !important;
    }
    .breadcrumb span {
        color: #FFFFFF !important;
        font-weight: 600 !important;
    }
    
    .article-header {
        padding: 48px 0 !important;
        text-align: center !important;
        background: #2d1b69 !important;
    }
    .article-header .category {
        font-family: 'Montserrat', sans-serif !important;
        font-weight: 700 !important;
        color: #FF7043 !important;
        text-transform: uppercase !important;
        margin-bottom: 16px !important;
    }
    .article-header h1 {
        max-width: 90% !important;
        margin-left: auto !important;
        margin-right: auto !important;
    }
    .article-meta {
        color: rgba(255, 255, 255, 0.8) !important;
        font-size: 0.9rem !important;
    }
    
    .article-image {
        width: 100% !important;
        height: 400px !important;
        object-fit: cover !important;
        border-radius: 16px !important;
        margin: 48px 0 !important;
    }
    
    .article-content {
        padding: 48px 0 !important;
    }
    
    .article-cta {
        background: linear-gradient(135deg, #FF7043 0%, #ff006e 100%) !important;
        text-align: center !important;
        padding: 48px !important;
        border-radius: 16px !important;
        margin-top: 96px !important;
    }
    .article-cta h2 { 
        margin: 0 0 16px 0 !important; 
        color: #FFFFFF !important;
        font-family: 'Montserrat', sans-serif !important;
    }
    .article-cta p { 
        color: #FFFFFF !important; 
        max-width: 600px !important; 
        margin: 0 auto 24px !important; 
    }
    .btn { 
        display: inline-block !important; 
        padding: 16px 40px !important; 
        border-radius: 50px !important; 
        text-decoration: none !important; 
        font-weight: 700 !important; 
        font-family: 'Montserrat', sans-serif !important; 
        transition: transform 0.3s ease !important; 
    }
    .btn-light { 
        background: #FFFFFF !important; 
        color: #1a1a3e !important; 
    }
    .btn-light:hover { 
        transform: translateY(-3px) !important; 
    }
    
    @media (max-width: 767px) {
        h1 { font-size: 2.2rem !important; }
        h2 { font-size: 1.8rem !important; }
        .article-image { height: 250px !important; }
    }
    
    <?php endif; ?>
    
    /* BACKGROUND GRADIENT - TOUTES LES PAGES */
    body {
        background: linear-gradient(135deg, #1a1a3e 0%, #2d1b69 50%, #ff006e 100%) !important;
        color: white !important;
        font-family: 'Inter', sans-serif !important;
        min-height: 100vh !important;
        line-height: 1.6 !important;
    }
    
    /* HEADER PRINCIPAL */
    .eazylink-header {
        background: transparent !important;
        backdrop-filter: blur(20px) !important;
        position: fixed !important;
        top: 50px !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        width: 1518px !important;
        max-width: calc(100vw - 60px) !important;
        z-index: 1001 !important;
        transition: all 0.3s ease !important;
        padding: 2.5rem 0 !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        border-radius: 15px !important;
    }
    
    .eazylink-header.scrolled {
        padding: 1rem 0 !important;
        background: rgba(26, 26, 62, 0.95) !important;
        border-color: rgba(255, 255, 255, 0.3) !important;
    }
    
    .header-container {
        max-width: 100% !important;
        margin: 0 auto !important;
        padding: 0 2rem !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
    }
    
    /* LOGO */
    .eazylink-logo {
        display: flex !important;
        align-items: center !important;
        transition: all 0.3s ease !important;
    }
    
    .eazylink-logo img {
        height: 40px !important;
        width: auto !important;
        transition: all 0.3s ease !important;
    }
    
    .eazylink-header.scrolled .eazylink-logo img {
        height: 32px !important;
    }
    
    .eazylink-logo h1 {
        color: white !important;
        font-size: 1.8rem !important;
        font-weight: 700 !important;
        margin: 0 !important;
        transition: all 0.3s ease !important;
    }
    
    .eazylink-header.scrolled .eazylink-logo h1 {
        font-size: 1.5rem !important;
    }
    
    .eazylink-logo a {
        color: white !important;
        text-decoration: none !important;
    }
    
    /* NAVIGATION CENTRÉE */
    .eazylink-nav {
        display: flex !important;
        align-items: center !important;
        gap: 1.5rem !important;
        position: absolute !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        flex-wrap: nowrap !important;
    }

    .nav-item {
        color: rgba(255, 255, 255, 0.9) !important;
        text-decoration: none !important;
        padding: 0.65rem 1rem !important;
        border-radius: 25px !important;
        transition: all 0.3s ease !important;
        font-weight: 500 !important;
        font-size: 0.9rem !important;
        position: relative !important;
        white-space: nowrap !important;
    }
    
    .nav-item:hover {
        color: white !important;
        transform: translateY(-1px) !important;
    }
    
    .nav-item.active {
        color: white !important;
    }
    
    
    /* BOUTON CONTACT */
    .contact-btn {
        background: rgba(255, 255, 255, 0.1) !important;
        border: 1px solid rgba(255, 255, 255, 0.3) !important;
        color: white !important;
        padding: 0.75rem 2rem !important;
        border-radius: 25px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        transition: all 0.3s ease !important;
        backdrop-filter: blur(10px) !important;
        position: relative !important;
        overflow: hidden !important;
    }
    
    .contact-btn::before {
        content: '' !important;
        position: absolute !important;
        top: 0 !important;
        left: -100% !important;
        width: 100% !important;
        height: 100% !important;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent) !important;
        transition: left 0.6s ease !important;
        z-index: -1 !important;
    }
    
    .contact-btn:hover {
        background: rgba(255, 255, 255, 0.2) !important;
        border-color: rgba(255, 255, 255, 0.5) !important;
        transform: translateY(-2px) !important;
    }
    
    .contact-btn:hover::before {
        left: 100% !important;
    }
    
    <?php if (!is_page_template('page-accueil.php') && !is_front_page() && !is_home()) : ?>
    /* TYPOGRAPHIE */
    h1, h2, h3, h4, h5, h6 {
        color: white !important;
        margin-bottom: 1rem !important;
        font-family: 'Montserrat', sans-serif !important;
    }
    
    h1 { font-size: 3rem !important; font-weight: 700 !important; }
    h2 { font-size: 2.25rem !important; font-weight: 600 !important; }
    h3 { font-size: 1.5rem !important; font-weight: 600 !important; }
    
    p, li {
        color: rgba(255, 255, 255, 0.9) !important;
        line-height: 1.6 !important;
        margin-bottom: 1rem !important;
    }
    
    a {
        color: #FF7043 !important;
        transition: color 0.3s ease !important;
    }
    
    a:hover {
        color: white !important;
    }
    <?php endif; ?>
    
    <?php if (!is_page_template('page-accueil.php') && !is_front_page() && !is_home()) : ?>
    /* CONTENEUR */
    .container {
        max-width: 1400px !important;
        margin: 0 auto !important;
        padding: 0 2rem !important;
    }
    
    /* SECTIONS */
    section {
        padding: 4rem 0 !important;
    }
    
    /* BOUTONS */
    .btn {
        display: inline-block !important;
        padding: 1rem 2.5rem !important;
        border-radius: 50px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        transition: all 0.3s ease !important;
        margin: 0.5rem !important;
    }
    
    .btn-primary {
        background: linear-gradient(to right, #FF7043, #ff006e) !important;
        color: white !important;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 5px 20px rgba(255, 112, 67, 0.3) !important;
    }
    
    .btn-secondary {
        border: 1px solid rgba(255, 255, 255, 0.6) !important;
        background: transparent !important;
        color: white !important;
    }
    
    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1) !important;
        border-color: #FF7043 !important;
    }
    <?php endif; ?>
    
    /* MASQUER LES ÉLÉMENTS ASTRA QUI CRÉENT LES COLONNES */
    .ast-container,
    .ast-row,
    .ast-col-lg-12,
    .ast-col-md-12,
    .ast-separate-container .ast-article-post,
    .ast-separate-container .ast-article-single,
    .site-content .ast-container {
        max-width: none !important;
        width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    
    /* MASQUER LA SIDEBAR D'ASTRA */
    .widget-area,
    .secondary,
    .ast-sidebar-layout-right .site-content > .ast-container,
    .ast-sidebar-layout-left .site-content > .ast-container {
        display: none !important;
    }
    
    /* FORCER LE CONTENU EN PLEINE LARGEUR */
    .site-content,
    #primary,
    .content-area {
        width: 100% !important;
        max-width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    
    /* COMPENSATION POUR LE HEADER FIXE */
    body {
        padding-top: 220px !important;
    }
    
    .eazylink-header.scrolled ~ .site-content,
    .eazylink-header.scrolled ~ #content {
        padding-top: 0 !important;
    }
    
    /* MENU BURGER */
    .burger-menu {
        display: none;
        flex-direction: column;
        cursor: pointer;
        padding: 0.5rem;
        z-index: 1002;
        position: relative;
    }
    
    .burger-line {
        width: 25px !important;
        height: 3px !important;
        background: white !important;
        margin: 3px 0 !important;
        transition: all 0.3s ease !important;
        border-radius: 2px !important;
        display: block !important;
    }
    
    /* Force l'affichage des 3 lignes sur toutes les pages */
    body.home .burger-line,
    body.front-page .burger-line,
    body.page-template-front-page .burger-line {
        width: 25px !important;
        height: 3px !important;
        background: white !important;
        margin: 3px 0 !important;
        display: block !important;
    }
    
    .burger-menu.active .burger-line:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }
    
    .burger-menu.active .burger-line:nth-child(2) {
        opacity: 0;
    }
    
    .burger-menu.active .burger-line:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }
    
    /* MENU MOBILE */
    .mobile-nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        height: 100dvh;
        background: linear-gradient(135deg, rgba(26, 26, 62, 0.98) 0%, rgba(45, 27, 105, 0.98) 50%, rgba(255, 0, 110, 0.98) 100%);
        backdrop-filter: blur(20px);
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        gap: 1.25rem;
        padding: 120px 20px 40px;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
        box-sizing: border-box;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }
    
    .mobile-nav.active {
        opacity: 1;
        visibility: visible;
    }
    
    .mobile-nav .nav-item {
        color: white !important;
        text-decoration: none !important;
        font-size: 1.25rem !important;
        font-weight: 600 !important;
        padding: 0.6rem 1.5rem !important;
        border-radius: 25px !important;
        transition: all 0.3s ease !important;
        position: relative !important;
    }
    
    .mobile-nav .nav-item:hover {
        transform: scale(1.1) !important;
        color: #FF7043 !important;
    }
    
    .mobile-nav .nav-item.active {
        color: #FF7043 !important;
    }
    
    .mobile-nav .contact-btn {
        background: rgba(255, 255, 255, 0.2) !important;
        border: 2px solid #FF7043 !important;
        color: white !important;
        padding: 0.85rem 2.5rem !important;
        border-radius: 50px !important;
        font-size: 1.1rem !important;
        font-weight: 600 !important;
        margin-top: 0.75rem !important;
        flex-shrink: 0 !important;
        position: relative !important;
        overflow: hidden !important;
    }
    
    .mobile-nav .contact-btn::before {
        content: '' !important;
        position: absolute !important;
        top: 0 !important;
        left: -100% !important;
        width: 100% !important;
        height: 100% !important;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent) !important;
        transition: left 0.6s ease !important;
        z-index: -1 !important;
    }
    
    .mobile-nav .contact-btn:hover {
        background: #FF7043 !important;
        transform: scale(1.05) !important;
    }
    
    .mobile-nav .contact-btn:hover::before {
        left: 100% !important;
    }
    
    /* RESPONSIVE - MOBILE & TABLETTE */
    @media (max-width: 1200px) {
        .eazylink-header {
            padding: 2rem 0 !important;
            top: 40px !important;
            width: calc(100vw - 40px) !important;
            max-width: calc(100vw - 40px) !important;
        }
        
        .eazylink-header.scrolled {
            padding: 0.8rem 0 !important;
        }
        
        .eazylink-nav {
            display: none !important;
        }
        
        /* Cacher uniquement le CTA du header, pas celui du menu mobile */
        .header-container > .contact-btn {
            display: none !important;
        }
        
        /* Afficher le CTA dans le menu mobile */
        .mobile-nav .contact-btn {
            display: block !important;
        }
        
        .burger-menu {
            display: flex !important;
        }
        
        .header-container {
            justify-content: space-between !important;
        }
        
        .eazylink-logo h1 {
            font-size: 1.5rem !important;
        }
        
        .eazylink-header.scrolled .eazylink-logo h1 {
            font-size: 1.3rem !important;
        }
        
        body {
            padding-top: 200px !important;
        }
    }
    
    /* EFFETS VISUELS SUPPLÉMENTAIRES */
    
    .nav-item::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: #FF7043;
        transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 1px;
    }
    
    .nav-item:hover::after {
        width: 100%;
    }
    
    /* Forcer la barre active à être visible */
    .nav-item.active::after {
        width: 100% !important;
        background: #FF7043 !important;
        transition: none !important;
    }
    
    /* S'assurer que la barre active reste visible même au hover */
    .nav-item.active:hover::after {
        width: 100% !important;
        background: #FF7043 !important;
    }
    
    /* CSS inline supprimé - on utilise le design system comme les autres pages */
    
    /* Styles supprimés du header - tout est maintenant dans page-about.css */
    
    </style>

    <?php wp_head(); ?>
    <?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#content" title="<?php echo esc_attr(astra_default_strings('string-header-skip-link', false)); ?>">
    <?php echo esc_html(astra_default_strings('string-header-skip-link', false)); ?>
</a>

<div id="page" class="hfeed site">
    <!-- HEADER PERSONNALISÉ EAZYLINK -->
    <header class="eazylink-header" id="main-header">
        <div class="header-container">
            <!-- LOGO -->
            <div class="eazylink-logo">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            EazyLink
                        </a>
                    </h1>
                    <?php
                }
                ?>
            </div>
            
            <!-- NAVIGATION CENTRÉE -->
            <nav class="eazylink-nav">
                <?php
                // Navigation avec les vraies pages du site
                $current_url = $_SERVER['REQUEST_URI'];
                $current_page_id = get_the_ID();
                
                // Fonction pour détecter si une page existe et récupérer son URL et ID
                function get_page_info_by_possible_slugs($slugs) {
                    foreach ($slugs as $slug) {
                        $page = get_page_by_path($slug);
                        if ($page) {
                            return array(
                                'url' => get_permalink($page->ID),
                                'id' => $page->ID
                            );
                        }
                    }
                    return false;
                }
                
                // Détection des URLs réelles
                $expert_info = get_page_info_by_possible_slugs(['expert-ia', 'experts-ia', 'expert', 'experts', 'expertise-ia', 'expertise', 'expert-artificial-intelligence']);
                $solutions_info = get_page_info_by_possible_slugs(['nos-solutions-ia', 'nos-solutions', 'solutions-ia', 'solutions', 'notre-solutions', 'services']);
                
                $expert_url = $expert_info ? $expert_info['url'] : false;
                $expert_id = $expert_info ? $expert_info['id'] : false;
                $solutions_url = $solutions_info ? $solutions_info['url'] : false;
                $solutions_id = $solutions_info ? $solutions_info['id'] : false;
                
                $nav_items = array(
                    array(
                        'title' => 'Accueil', 
                        'url' => home_url('/'), 
                        'active' => is_front_page()
                    ),
                    array(
                        'title' => 'Expert IA', 
                        'url' => $expert_url ? $expert_url : home_url('/expert/'), 
                        'active' => ($expert_id && $current_page_id == $expert_id) || 
                                   (strpos($current_url, '/expert') !== false) ||
                                   (strpos($current_url, '/expertise') !== false)
                    ),
                    array(
                        'title' => 'Nos Solutions', 
                        'url' => $solutions_url ? $solutions_url : home_url('/nos-solutions-ia/'), 
                        'active' => ($solutions_id && $current_page_id == $solutions_id) || 
                                   (strpos($current_url, '/solutions') !== false) ||
                                   (strpos($current_url, '/nos-solutions') !== false) ||
                                   (strpos($current_url, '/nos-solutions-ia') !== false)
                    ),
                    array(
                        'title' => 'SEO/GEO',
                        'url' => home_url('/seo-geo-visibilite-google-ia/'),
                        'active' => (strpos($current_url, '/seo-geo-visibilite-google-ia') !== false)
                    ),
                    array(
                        'title' => 'About',
                        'url' => home_url('/a-propos/'),
                        'active' => (strpos($current_url, '/a-propos/') !== false)
                    ),
                    array(
                        'title' => 'Blog', 
                        'url' => home_url('/blog/'), 
                        'active' => (strpos($current_url, '/blog/') !== false || is_home() || is_category() || is_single())
                    )
                );
                
                foreach ($nav_items as $item) {
                    $active_class = $item['active'] ? 'active' : '';
                    echo '<a href="' . esc_url($item['url']) . '" class="nav-item ' . $active_class . '" data-debug="' . esc_attr($item['title'] . ': ' . $item['url'] . ' | Current: ' . $current_url . ' | Active: ' . ($item['active'] ? 'YES' : 'NO')) . '">' . esc_html($item['title']) . '</a>';
                }
                
                // Debug en commentaire HTML
                echo '<!-- DEBUG NAVIGATION:';
                echo ' Current URL: ' . $current_url;
                echo ' | Current Page ID: ' . $current_page_id;
                echo ' | Expert URL: ' . ($expert_url ? $expert_url : 'NOT FOUND');
                echo ' | Expert ID: ' . ($expert_id ? $expert_id : 'NOT FOUND');
                echo ' | Solutions URL: ' . ($solutions_url ? $solutions_url : 'NOT FOUND');
                echo ' | Solutions ID: ' . ($solutions_id ? $solutions_id : 'NOT FOUND');
                
                // Liste toutes les pages pour debug
                $all_pages = get_pages();
                echo ' | ALL PAGES: ';
                foreach ($all_pages as $page) {
                    echo $page->post_name . '(' . get_permalink($page->ID) . '), ';
                }
                echo ' -->';
                ?>
            </nav>
            
            <!-- BOUTON CONTACT -->
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="contact-btn">
                Contact
            </a>
            
            <!-- MENU BURGER -->
            <div class="burger-menu" id="burger-menu">
                <div class="burger-line"></div>
                <div class="burger-line"></div>
                <div class="burger-line"></div>
            </div>
        </div>
    </header>
    
    <!-- MENU MOBILE -->
    <nav class="mobile-nav" id="mobile-nav">
        <?php
        foreach ($nav_items as $item) {
            $active_class = $item['active'] ? 'active' : '';
            echo '<a href="' . esc_url($item['url']) . '" class="nav-item ' . $active_class . '">' . esc_html($item['title']) . '</a>';
        }
        ?>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="contact-btn">
            Contact
        </a>
    </nav>
    
    <!-- CONTENU PRINCIPAL -->
    <div id="content" class="site-content">