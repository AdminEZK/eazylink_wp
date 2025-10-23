<?php
/**
 * Script de création d'articles automatique pour EazyLink
 * À exécuter une seule fois pour créer des articles de démonstration
 */

// Sécurité : ne pas exécuter directement
if (!defined('ABSPATH')) {
    require_once('../../../wp-config.php');
}

// Vérifier les permissions
if (!current_user_can('publish_posts')) {
    wp_die('Vous n\'avez pas les permissions nécessaires.');
}

/**
 * Données d'exemple pour les articles
 */
$articles_data = [
    [
        'title' => 'L\'Intelligence Artificielle au Service de Votre Entreprise',
        'content' => 'L\'intelligence artificielle transforme radicalement le paysage entrepreneurial moderne. Dans cet article, nous explorons comment les entreprises peuvent tirer parti de l\'IA pour optimiser leurs processus, améliorer leur productivité et créer de nouvelles opportunités de croissance.

Les applications de l\'IA en entreprise sont multiples : automatisation des tâches répétitives, analyse prédictive, personnalisation de l\'expérience client, et bien plus encore. Découvrez les stratégies gagnantes pour intégrer l\'IA dans votre organisation.

## Les Avantages Clés de l\'IA

1. **Automatisation intelligente** : Réduction des coûts opérationnels
2. **Analyse de données** : Prise de décision basée sur les données
3. **Personnalisation** : Expérience client sur mesure
4. **Prédiction** : Anticipation des tendances du marché

L\'avenir appartient aux entreprises qui sauront adopter ces technologies innovantes tout en gardant l\'humain au centre de leur stratégie.',
        'category' => 'Intelligence Artificielle',
        'tags' => ['IA', 'Entreprise', 'Innovation', 'Technologie'],
        'excerpt' => 'Découvrez comment l\'intelligence artificielle peut transformer votre entreprise et créer de nouvelles opportunités de croissance.'
    ],
    [
        'title' => 'Les Tendances du Marketing Digital en 2024',
        'content' => 'Le marketing digital évolue constamment, et 2024 apporte son lot de nouvelles tendances et opportunités. Dans un monde où l\'attention des consommateurs est de plus en plus fragmentée, les entreprises doivent adapter leurs stratégies pour rester compétitives.

## Les Tendances Incontournables

### 1. Marketing Conversationnel
Les chatbots et assistants virtuels deviennent plus sophistiqués, offrant une expérience client personnalisée 24h/24.

### 2. Contenu Vidéo Court
TikTok, Instagram Reels, YouTube Shorts : le contenu vidéo court continue de dominer les réseaux sociaux.

### 3. Marketing d\'Influence Micro
Les micro-influenceurs offrent un meilleur ROI avec des audiences plus engagées et authentiques.

### 4. Personnalisation Avancée
L\'utilisation de l\'IA pour créer des expériences ultra-personnalisées devient la norme.

## Conseils Pratiques

- Investissez dans la création de contenu authentique
- Utilisez les données pour personnaliser vos campagnes
- Expérimentez avec les nouvelles plateformes émergentes
- Mesurez et optimisez continuellement vos performances

Le succès en marketing digital nécessite une approche agile et une veille constante des nouvelles tendances.',
        'category' => 'Marketing Digital',
        'tags' => ['Marketing', 'Digital', 'Tendances', 'Stratégie'],
        'excerpt' => 'Explorez les tendances marketing digital de 2024 et découvrez comment adapter votre stratégie pour rester compétitif.'
    ],
    [
        'title' => 'Optimisation SEO : Guide Complet pour 2024',
        'content' => 'Le référencement naturel (SEO) reste l\'un des leviers les plus importants pour générer du trafic qualifié vers votre site web. Avec les évolutions constantes des algorithmes de Google, il est crucial de rester à jour sur les meilleures pratiques.

## Les Fondamentaux du SEO Moderne

### Contenu de Qualité
Google privilégie toujours le contenu utile, original et bien structuré. Votre contenu doit répondre aux questions de vos utilisateurs de manière complète et engageante.

### Expérience Utilisateur (UX)
Les Core Web Vitals sont désormais des facteurs de classement officiels. La vitesse de chargement, l\'interactivité et la stabilité visuelle sont essentielles.

### SEO Technique
- Structure des URLs optimisée
- Balises meta descriptives
- Schema markup pour les données structurées
- Optimisation mobile-first

## Stratégies Avancées

### 1. Recherche Vocale
Optimisez pour les requêtes conversationnelles et les questions longues.

### 2. Intelligence Artificielle
Utilisez l\'IA pour analyser les intentions de recherche et créer du contenu ciblé.

### 3. SEO Local
Pour les entreprises locales, optimisez votre présence sur Google My Business et les annuaires locaux.

## Outils Recommandés

- Google Search Console
- SEMrush ou Ahrefs
- PageSpeed Insights
- Google Analytics 4

Le SEO est un investissement à long terme qui nécessite patience et constance, mais les résultats en valent la peine.',
        'category' => 'SEO',
        'tags' => ['SEO', 'Référencement', 'Google', 'Optimisation'],
        'excerpt' => 'Maîtrisez les techniques SEO modernes avec ce guide complet pour améliorer votre visibilité sur Google en 2024.'
    ],
    [
        'title' => 'Transformation Digitale : Par Où Commencer ?',
        'content' => 'La transformation digitale n\'est plus une option mais une nécessité pour les entreprises qui souhaitent rester compétitives. Cependant, beaucoup d\'organisations ne savent pas par où commencer cette transition cruciale.

## Qu\'est-ce que la Transformation Digitale ?

La transformation digitale va bien au-delà de la simple adoption de nouvelles technologies. C\'est un changement fondamental dans la façon dont une organisation fonctionne et apporte de la valeur à ses clients.

## Les Étapes Clés

### 1. Audit de l\'Existant
Évaluez vos processus actuels, vos outils et vos compétences internes.

### 2. Définition de la Vision
Établissez une vision claire de ce que vous voulez accomplir avec la transformation digitale.

### 3. Formation des Équipes
Investissez dans la formation de vos collaborateurs aux nouveaux outils et méthodes de travail.

### 4. Implémentation Progressive
Commencez par des projets pilotes avant de déployer à grande échelle.

## Les Bénéfices Attendus

- **Efficacité opérationnelle** : Automatisation des processus
- **Expérience client améliorée** : Interactions plus fluides et personnalisées
- **Agilité** : Capacité à s\'adapter rapidement aux changements du marché
- **Innovation** : Nouvelles opportunités de revenus

## Défis Courants

- Résistance au changement
- Manque de compétences techniques
- Budget limité
- Complexité de l\'intégration

La clé du succès réside dans une approche méthodique, une communication claire et un accompagnement adapté de tous les acteurs de l\'entreprise.',
        'category' => 'Transformation Digitale',
        'tags' => ['Digital', 'Transformation', 'Entreprise', 'Innovation'],
        'excerpt' => 'Découvrez les étapes essentielles pour réussir votre transformation digitale et moderniser votre entreprise.'
    ],
    [
        'title' => 'E-commerce : Stratégies pour Augmenter Vos Ventes',
        'content' => 'Le commerce électronique continue de croître, mais la concurrence s\'intensifie. Pour réussir dans cet environnement compétitif, il faut adopter des stratégies éprouvées et innovantes.

## Optimisation de l\'Expérience Utilisateur

### Navigation Intuitive
Votre site doit être facile à naviguer avec une architecture claire et des catégories bien définies.

### Processus de Commande Simplifié
Réduisez le nombre d\'étapes nécessaires pour finaliser un achat. Proposez des options de paiement multiples et sécurisées.

### Responsive Design
Assurez-vous que votre site fonctionne parfaitement sur tous les appareils, particulièrement mobile.

## Stratégies Marketing Efficaces

### 1. Email Marketing
Créez des campagnes personnalisées basées sur le comportement d\'achat de vos clients.

### 2. Retargeting
Récupérez les visiteurs qui ont abandonné leur panier avec des publicités ciblées.

### 3. Avis Clients
Les témoignages et avis clients renforcent la confiance et influencent les décisions d\'achat.

### 4. Programme de Fidélité
Récompensez vos clients fidèles avec des points, des remises ou des avantages exclusifs.

## Analyse et Optimisation

### Métriques Importantes
- Taux de conversion
- Panier moyen
- Taux d\'abandon de panier
- Coût d\'acquisition client (CAC)
- Valeur vie client (LTV)

### Tests A/B
Testez continuellement différentes versions de vos pages pour optimiser les performances.

## Tendances Émergentes

- Commerce social (Social Commerce)
- Réalité augmentée pour l\'essayage virtuel
- Intelligence artificielle pour la recommandation produits
- Livraison ultra-rapide et options écologiques

Le succès en e-commerce nécessite une approche holistique combinant technologie, marketing et service client exceptionnel.',
        'category' => 'E-commerce',
        'tags' => ['E-commerce', 'Ventes', 'Marketing', 'Conversion'],
        'excerpt' => 'Boostez vos ventes en ligne avec ces stratégies e-commerce éprouvées pour optimiser votre boutique et fidéliser vos clients.'
    ]
];

/**
 * Fonction pour créer les articles
 */
function create_sample_articles($articles_data) {
    $created_articles = [];
    
    foreach ($articles_data as $article) {
        // Vérifier si l'article existe déjà
        $existing_post = get_page_by_title($article['title'], OBJECT, 'post');
        if ($existing_post) {
            continue; // Skip si l'article existe déjà
        }
        
        // Créer la catégorie si elle n'existe pas
        $category = wp_create_category($article['category']);
        
        // Créer les tags
        $tag_ids = [];
        foreach ($article['tags'] as $tag_name) {
            $tag = wp_create_tag($tag_name);
            if (!is_wp_error($tag)) {
                $tag_ids[] = $tag['term_id'];
            }
        }
        
        // Données de l'article
        $post_data = [
            'post_title'    => $article['title'],
            'post_content'  => $article['content'],
            'post_excerpt'  => $article['excerpt'],
            'post_status'   => 'publish',
            'post_type'     => 'post',
            'post_author'   => get_current_user_id(),
            'post_category' => [$category],
            'tags_input'    => $tag_ids,
            'meta_input'    => [
                '_yoast_wpseo_metadesc' => $article['excerpt'],
                '_yoast_wpseo_title' => $article['title'] . ' | EazyLink'
            ]
        ];
        
        // Créer l'article
        $post_id = wp_insert_post($post_data);
        
        if (!is_wp_error($post_id)) {
            $created_articles[] = [
                'id' => $post_id,
                'title' => $article['title'],
                'url' => get_permalink($post_id)
            ];
        }
    }
    
    return $created_articles;
}

// Exécuter la création si appelé directement
if (isset($_GET['create_articles']) && $_GET['create_articles'] === 'true') {
    $created = create_sample_articles($articles_data);
    
    echo '<h2>Articles créés avec succès :</h2>';
    echo '<ul>';
    foreach ($created as $article) {
        echo '<li><a href="' . $article['url'] . '" target="_blank">' . $article['title'] . '</a></li>';
    }
    echo '</ul>';
    echo '<p><a href="' . home_url('/blog') . '">Voir tous les articles</a></p>';
} else {
    echo '<h2>Créateur d\'articles EazyLink</h2>';
    echo '<p>Ce script va créer ' . count($articles_data) . ' articles de démonstration.</p>';
    echo '<p><a href="?create_articles=true" class="button button-primary">Créer les articles</a></p>';
}
?>
