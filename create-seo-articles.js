const axios = require('axios');

// Configuration
const SERVER_URL = 'http://localhost:3000';
const DESIGN_SYSTEM = {
    container: 'container',
    section: 'section-content',
    heading: 'section-title',
    subheading: 'section-subtitle',
    paragraph: 'content-text',
    list: 'content-list',
    cta_box: 'cta-box',
    cta_button: 'btn-primary',
    highlight: 'text-highlight',
    quote: 'content-quote',
    image_container: 'content-image',
    table: 'content-table',
    card: 'content-card',
    author_box: 'author-box',
};

// Définition des IDs des catégories SEO
const SEO_CATEGORIES = {
    EXPERTISE_IA: 1,        // Expertise IA Générative
    DIAGNOSTIC: 2,          // Diagnostic et Analyse
    STRATEGIE: 3,           // Stratégie et Conseil
    IMPLEMENTATION: 4,      // Implémentation et Support
    CAS_USAGE: 5,           // Cas d'Usage Sectoriels
    CONFORMITE: 6,          // Conformité et Éthique
    RESSOURCES: 7           // Ressources et Formation
};

// Définition des IDs des types de ressources
const RESOURCE_TYPES = {
    GUIDE: 1,               // Guide pratique
    ETUDE_CAS: 2,           // Étude de cas
    ARTICLE_FOND: 3,        // Article de fond
    LIVRE_BLANC: 4,         // Livre blanc
    CHECKLIST: 5            // Checklist
};

// Fonction pour formater le contenu avec le design system
function formatWithDesignSystem(content) {
    // Paragraphes
    content = content.replace(/<p>/g, `<p class="${DESIGN_SYSTEM.paragraph}">`);
    
    // Titres
    content = content.replace(/<h2>/g, `<h2 class="${DESIGN_SYSTEM.heading}">`);
    content = content.replace(/<h3>/g, `<h3 class="${DESIGN_SYSTEM.subheading}">`);
    
    // Listes
    content = content.replace(/<ul>/g, `<ul class="${DESIGN_SYSTEM.list}">`);
    content = content.replace(/<ol>/g, `<ol class="${DESIGN_SYSTEM.list}">`);
    
    // CTA Box
    content = content.replace(/<div class="cta-box">/g, `<div class="${DESIGN_SYSTEM.cta_box}">`);
    content = content.replace(/class="btn-primary"/g, `class="${DESIGN_SYSTEM.cta_button}"`);
    
    // Table des matières
    content = content.replace(/<div id="table-des-matieres">/g, '<div id="table-des-matieres" class="resource-toc">');
    
    return content;
}

// Fonction pour créer un article via le serveur MCP
async function createArticle(title, content, seoCategoryId, resourceTypeId, metaFields) {
    try {
        // Formater le contenu avec le design system
        const formattedContent = formatWithDesignSystem(content);
        
        // Préparer les données de l'article
        const articleData = {
            title: title,
            content: formattedContent,
            status: 'publish',
            type: 'resource',
            meta: metaFields,
            seo_category: seoCategoryId,
            resource_type: resourceTypeId
        };
        
        // Envoyer la requête au serveur MCP
        const response = await axios.post(`${SERVER_URL}/create_resource`, {
            resourceType: 'resource',
            data: articleData
        });
        
        console.log(`Article "${title}" créé avec succès (ID: ${response.data.id})`);
        return response.data;
    } catch (error) {
        console.error(`Erreur lors de la création de l'article "${title}":`, error.message);
        throw error;
    }
}

// Définition des 5 articles SEO à créer
const articles = [
    {
        title: "Les 7 cas d'usage de l'IA générative à fort impact pour les entreprises",
        seoCategory: SEO_CATEGORIES.EXPERTISE_IA,
        resourceType: RESOURCE_TYPES.ARTICLE_FOND,
        metaFields: {
            resource_subtitle: "Découvrez les applications concrètes de l'IA générative pour transformer votre entreprise",
            resource_meta_description: "Explorez les 7 cas d'usage de l'IA générative à plus fort impact pour les entreprises en 2025. Guide expert par EazyLink sur les applications concrètes de l'IA.",
            resource_focus_keyword: "cas usage IA générative entreprise",
            resource_secondary_keywords: "applications IA générative, transformation IA, ROI IA générative, implémentation IA",
            resource_author: "Thomas Dubois",
            resource_author_position: "Directeur Innovation IA",
            resource_author_bio: "Thomas est expert en innovation IA et accompagne les entreprises dans l'identification et l'implémentation de cas d'usage à fort impact.",
            resource_cta_title: "Vous souhaitez identifier les cas d'usage pertinents pour votre entreprise ?",
            resource_cta_text: "Demander un atelier découverte",
            resource_cta_link: "/contact"
        }
    },
    {
        title: "Comment mettre en place une gouvernance éthique de l'IA dans votre organisation",
        seoCategory: SEO_CATEGORIES.CONFORMITE,
        resourceType: RESOURCE_TYPES.GUIDE,
        metaFields: {
            resource_subtitle: "Guide pratique pour une utilisation responsable et conforme de l'IA générative",
            resource_meta_description: "Découvrez comment mettre en place un cadre de gouvernance éthique pour l'IA générative dans votre organisation. Guide complet par EazyLink sur la conformité et l'éthique.",
            resource_focus_keyword: "gouvernance éthique IA entreprise",
            resource_secondary_keywords: "conformité IA, éthique IA générative, cadre gouvernance IA, responsabilité IA",
            resource_author: "Claire Moreau",
            resource_author_position: "Experte Conformité & Éthique IA",
            resource_author_bio: "Claire est spécialiste des questions éthiques et juridiques liées à l'IA. Elle accompagne les entreprises dans la mise en place de cadres de gouvernance conformes aux réglementations.",
            resource_cta_title: "Vous souhaitez mettre en place un cadre de gouvernance IA dans votre organisation ?",
            resource_cta_text: "Demander un accompagnement",
            resource_cta_link: "/contact"
        }
    },
    {
        title: "5 étapes clés pour implémenter l'IA générative dans vos processus métier",
        seoCategory: SEO_CATEGORIES.IMPLEMENTATION,
        resourceType: RESOURCE_TYPES.CHECKLIST,
        metaFields: {
            resource_subtitle: "Méthodologie éprouvée pour une intégration réussie de l'IA dans vos workflows",
            resource_meta_description: "Suivez notre méthodologie en 5 étapes pour implémenter l'IA générative dans vos processus métier. Guide pratique par EazyLink pour une intégration réussie.",
            resource_focus_keyword: "implémentation IA générative processus métier",
            resource_secondary_keywords: "intégration IA workflow, déploiement IA entreprise, adoption IA générative, transformation processus IA",
            resource_author: "Marc Lefevre",
            resource_author_position: "Lead Consultant Implémentation IA",
            resource_author_bio: "Marc accompagne les entreprises dans le déploiement opérationnel de solutions d'IA générative, avec une approche centrée sur l'adoption par les utilisateurs.",
            resource_cta_title: "Vous souhaitez être accompagné dans l'implémentation de l'IA générative ?",
            resource_cta_text: "Demander un accompagnement",
            resource_cta_link: "/contact"
        }
    },
    {
        title: "Comment l'IA générative transforme le secteur de la finance : étude de cas",
        seoCategory: SEO_CATEGORIES.CAS_USAGE,
        resourceType: RESOURCE_TYPES.ETUDE_CAS,
        metaFields: {
            resource_subtitle: "Analyse des impacts et bénéfices concrets de l'IA générative dans le secteur financier",
            resource_meta_description: "Découvrez comment l'IA générative transforme le secteur financier à travers des cas concrets. Étude de cas détaillée par EazyLink sur les applications et bénéfices.",
            resource_focus_keyword: "IA générative secteur finance",
            resource_secondary_keywords: "transformation digitale finance, cas usage IA banque, automatisation processus financiers, IA services financiers",
            resource_author: "Julie Renard",
            resource_author_position: "Consultante IA Secteur Finance",
            resource_author_bio: "Julie est spécialiste des applications de l'IA dans le secteur financier. Elle accompagne les institutions financières dans leur transformation digitale par l'IA.",
            resource_cta_title: "Vous travaillez dans le secteur financier et souhaitez explorer les opportunités de l'IA ?",
            resource_cta_text: "Demander une étude personnalisée",
            resource_cta_link: "/contact"
        }
    },
    {
        title: "Formation à l'IA générative : guide complet pour les équipes métier",
        seoCategory: SEO_CATEGORIES.RESSOURCES,
        resourceType: RESOURCE_TYPES.LIVRE_BLANC,
        metaFields: {
            resource_subtitle: "Méthodologie et ressources pour former vos collaborateurs à l'utilisation de l'IA générative",
            resource_meta_description: "Guide complet pour former vos équipes métier à l'IA générative. Découvrez notre méthodologie de formation et nos ressources pédagogiques par EazyLink.",
            resource_focus_keyword: "formation IA générative équipes métier",
            resource_secondary_keywords: "apprentissage IA entreprise, compétences IA collaborateurs, adoption IA générative, montée en compétence IA",
            resource_author: "Émilie Laurent",
            resource_author_position: "Responsable Formation & Change Management",
            resource_author_bio: "Émilie est spécialiste de la formation et de la conduite du changement dans les projets de transformation digitale. Elle conçoit des programmes de formation adaptés aux différents profils métier.",
            resource_cta_title: "Vous souhaitez former vos équipes à l'IA générative ?",
            resource_cta_text: "Découvrir nos programmes de formation",
            resource_cta_link: "/formation"
        }
    }
];

// Fonction pour générer le contenu des articles
function generateArticleContent(article) {
    return `<!-- Introduction avec mots-clés principaux -->
<p>Cet article sur <strong>${article.metaFields.resource_focus_keyword}</strong> vous présente les informations essentielles pour comprendre et mettre en œuvre cette approche dans votre entreprise.</p>

<!-- Table des matières avec liens d'ancrage -->
<div id="table-des-matieres">
    <h2>Table des matières</h2>
    <ul>
        <li><a href="#section1">Section 1</a></li>
        <li><a href="#section2">Section 2</a></li>
        <li><a href="#section3">Section 3</a></li>
        <li><a href="#section4">Section 4</a></li>
        <li><a href="#section5">Section 5</a></li>
    </ul>
</div>

<!-- Section 1 -->
<h2 id="section1">Section 1</h2>
<p>Contenu de la section 1 avec des mots-clés pertinents comme ${article.metaFields.resource_secondary_keywords.split(',')[0]}.</p>

<!-- Section 2 -->
<h2 id="section2">Section 2</h2>
<p>Contenu de la section 2 avec des mots-clés pertinents comme ${article.metaFields.resource_secondary_keywords.split(',')[1]}.</p>

<!-- Section 3 -->
<h2 id="section3">Section 3</h2>
<p>Contenu de la section 3 avec des mots-clés pertinents comme ${article.metaFields.resource_secondary_keywords.split(',')[2]}.</p>

<!-- Section 4 -->
<h2 id="section4">Section 4</h2>
<p>Contenu de la section 4 avec des mots-clés pertinents comme ${article.metaFields.resource_secondary_keywords.split(',')[3]}.</p>

<!-- Section 5 -->
<h2 id="section5">Section 5</h2>
<p>Contenu de la section 5 avec des informations complémentaires sur ${article.metaFields.resource_focus_keyword}.</p>

<!-- Conclusion -->
<h2>Conclusion</h2>
<p>En conclusion, ${article.metaFields.resource_focus_keyword} représente une opportunité majeure pour les entreprises qui souhaitent améliorer leur performance et leur compétitivité.</p>

<!-- Call-to-action -->
<div class="cta-box">
    <h3>${article.metaFields.resource_cta_title}</h3>
    <p>Contactez nos experts pour un premier échange ou téléchargez notre guide méthodologique complet.</p>
    <a href="${article.metaFields.resource_cta_link}" class="btn-primary">${article.metaFields.resource_cta_text}</a>
</div>`;
}

// Fonction principale pour créer les articles
async function createSeoArticles() {
    console.log('=== Création des articles SEO ===');
    
    try {
        // Créer chaque article
        for (const article of articles) {
            console.log(`Création de l'article: ${article.title}`);
            
            // Générer le contenu de l'article
            const content = generateArticleContent(article);
            
            // Créer l'article via le serveur MCP
            await createArticle(
                article.title,
                content,
                article.seoCategory,
                article.resourceType,
                article.metaFields
            );
            
            console.log(`Article "${article.title}" créé avec succès`);
        }
        
        console.log('=== Création des articles SEO terminée ===');
    } catch (error) {
        console.error('Erreur lors de la création des articles:', error.message);
    }
}

// Exécuter la fonction principale
createSeoArticles();
