<?php
/**
 * Template Name: Page d'Accueil EazyLink
 * Template pour la page d'accueil du site EazyLink
 */

// Empêcher l'accès direct
if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>

    <!-- Section 1: Hero Header -->
    <header class="accueil-hero-section">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-content">
                    <h1 class="gradient-text">Votre Partenaire IA, au service de votre excellence.</h1>
                    <p>Eazylink va au-delà de la formation des collaborateurs en connectant votre entreprise a ses experts professionels de l'IA pour assurer la mise en œuvre de vos projets.<br> Transformons ensemble votre potentiel en performance.</p>
                    <div class="hero-buttons">
                        <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-primary">Nous contacter</a>
                        <a href="<?php echo home_url('/nos-solutions-ia/'); ?>" class="btn btn-secondary">Découvrir nos solutions</a>                    </div>
                    <!-- Chiffres clés intégrés dans le hero -->
                </div>
                <div class="hero-image">
                    <!-- Static Orchestre Image replacing animated hero logos -->
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/img orchestre.png' ); ?>" alt="EazyLink Orchestre" />
                </div>
            </div>
            <!-- Chiffres clés déplacés sous la grille du hero -->
            <!-- Sources des statistiques :
                 - 68% : PwC 2025 - Étude "IA dans les opérations industrielles"
                 - 33% : Wüest Partner 2024 - Gain de productivité IA générative France
                 - 78% : Stanford HAI 2025 - AI Index Report "AI Goes Corporate" -->
            <div class="hero-key-figures">
                <div class="key-figure-item">
                    <h3>68%</h3>
                    <p>Des entreprises visent +3pts de rentabilité d'ici 2030</p>
                    <small class="source">Source: PwC 2025</small>
                </div>
                <div class="key-figure-item">
                    <h3>33%</h3>
                    <p>De gain de productivité avec l'IA générative</p>
                    <small class="source">Source: Wüest Partner 2024</small>
                </div>
                <div class="key-figure-item">
                    <h3>78%</h3>
                    <p>Des organisations utilisent l'IA en 2024</p>
                    <small class="source">Source: Stanford HAI 2025</small>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- Section 1: La Double Dimension -->
        <section class="double-dimension-section">
            <div class="container">
                <div class="dimension-grid">
                    <div class="dimension-item">
                        <div class="dimension-icon strategic">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.311a15.045 15.045 0 01-7.5 0C4.508 17.64 2.25 14.434 2.25 10.5 2.25 6.566 4.508 3.36 7.5 2.311c2.692-1.038 5.808-1.038 8.5 0 2.992 1.05 5.25 4.256 5.25 8.189 0 3.934-2.258 7.135-5.25 8.189z" /></svg>
                        </div>
                        <h3>L'Expert Stratégique</h3>
                        <p>Nos experts analysent votre situation, identifient vos besoins et définissent une feuille de route IA alignée sur vos objectifs business.</p>
                    </div>
                    <div class="dimension-item">
                        <div class="dimension-icon operational">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6A2.25 2.25 0 0112.75 8.25v1.5a2.25 2.25 0 01-2.25 2.25H6.75a2.25 2.25 0 01-2.25-2.25v-7.5A2.25 2.25 0 016.75 2.25h3.75a2.25 2.25 0 012.25 2.25v1.5m0 13.5h-9A2.25 2.25 0 012.25 18v-9a2.25 2.25 0 012.25-2.25h9A2.25 2.25 0 0115 9v9a2.25 2.25 0 01-2.25 2.25z" /></svg>
                        </div>
                        <h3>Le Support Opérationnel</h3>
                        <p>La structure EazyLink apporte le support technique, facilite l'intégration des outils et assure la veille technologique pour péréniser la vision.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Pour Qui ? -->
        <section class="personas-section">
            <div class="container">
                <h2>Une Solution Adaptée à Chaque Ambition</h2>
                <div class="personas-grid">
                    <div class="persona-card">
                        <h4>Pour les Décideurs </h4>
                        <p>Accompagnement sur-mesure pour transformer votre ambition IA en un avantage concurrentiel.</p>
                        <a href="<?php echo home_url('/experts-ia/'); ?>">Découvrir nos experts →</a>
                    </div>
                    <div class="persona-card">
                        <h4>Responsables Métiers</h4>
                        <p>Adoptez et déployez les applications IA dans votre département (Marketing, RH, Finance, etc. )</p>
                        <a href="<?php echo home_url('/experts-ia/'); ?>">Explorer par métiers →</a>
                    </div>
                    <div class="persona-card">
                        <h4>Pour les PME </h4>
                        <p>Des solutions IA opérationnelles, adaptées à vos ressources, avec un ROI clair pour accélérer votre croissance.</p>
                        <a href="<?php echo home_url('/nos-solutions-ia/'); ?>">Nos solutions concrètes →</a>
                    </div>
                    <div class="persona-card">
                        <h4>Pour les Startups </h4>
                        <p>Accélérez votre positionnement produit et votre time-to-market grâce à notre expertise métier et notre support opérationnel.</p>
                        <a href="<?php echo home_url('/nos-solutions-ia/'); ?>">Accélérer mon projet →</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 4: Capacités Techniques (Home Page) -->
        <section class="capabilities-section">
            <div class="container">
                <h2>De la Stratégie à l'Outil</h2>
                <p class="section-intro">Notre force réside dans notre capacité à transformer les recommandations stratégiques en solutions technologiques fonctionnelles. Nous faisons plus que conseiller, nous construisons.</p>
                <div class="capabilities-grid">
                    <div class="capability-card">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h12A2.25 2.25 0 0020.25 14.25V3M3.75 21h16.5M16.5 3.75h.008v.008H16.5V3.75z" /></svg></div>
                        <h4>Outils IA Sur Mesure</h4>
                        <p>Nous créons des applications spécifiques qui répondent précisément à vos enjeux métiers.</p>
                    </div>
                    <div class="capability-card">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.898 20.553L16.5 21.75l-.398-1.197a3.375 3.375 0 00-2.455-2.455L12.75 18l1.197-.398a3.375 3.375 0 002.455-2.455l.398-1.197.398 1.197a3.375 3.375 0 002.455 2.455l1.197.398-1.197.398a3.375 3.375 0 00-2.455 2.455z" /></svg></div>
                        <h4>Automatisation de Processus</h4>
                        <p>Nous optimisons vos worflow pour libérer vos équipes des taches ingrates, chronophages et booster votre productivité.</p>
                    </div>
                    <div class="capability-card">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" /></svg></div>
                        <h4>Intégration d'Outils & API</h4>
                        <p>Nous connectons l'IA à votre écosystème logiciel (CRM, ERP ) pour unifier vos données.</p>
                    </div>
                </div>
                <div class="section-cta">
                    <a href="<?php echo home_url('/nos-solutions-ia/'); ?>" class="btn btn-secondary">Découvrir nos capacités techniques</a>
                </div>
            </div>
        </section>

 <!-- Section 6: L'Avantage EazyLink -->
 <section class="support-section">
            <div class="container support-layout">
                <div class="support-content">
                    <h2>Les Avantages EazyLink : Plus qu'une Solution, un Partenariat</h2>
                    <p>En choisissant EazyLink, vous ne bénéficiez pas seulement de l'expertise d'un consultant, mais de la puissance d'une structure entièrement dédiée à la réussite de vos projets IA.</p>
                </div>
                <div class="support-list">
                    <div class="support-item">
                        <h4>Synergie des Compétences</h4>
                        <p>Nous assurons la relation entre les experts des différents métiers pour apporter une solution globale et complète à vos besoins.</p>
                    </div>
                    <div class="support-item">
                        <h4>Support Opérationnel Intégré</h4>
                        <p>Nous facilitons l'intégration des outils, l'automatisation des flux et assurons une veille technologique constante.</p>
                    </div>
                    <div class="support-item">
                        <h4>Accompagnement Durable</h4>
                        <p>Nous favorisons le suivi, l'accompagnement et l'ajustement des solutions pour garantir leur pertinence sur le long terme.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 5: Nos Derniers Articles -->
        <section class="articles-section">
            <div class="container">
                <h2>Nos Derniers Articles & Insights</h2>
                <div class="articles-grid">
                    <?php
                    // Récupérer les 4 derniers articles publiés
                    $latest_posts = new WP_Query(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'meta_query' => array(
                            'relation' => 'OR',
                            array(
                                'key' => '_thumbnail_id',
                                'compare' => 'EXISTS'
                            ),
                            array(
                                'key' => '_thumbnail_id',
                                'compare' => 'NOT EXISTS'
                            )
                        )
                    ));

                    if ($latest_posts->have_posts()) :
                        while ($latest_posts->have_posts()) : $latest_posts->the_post();
                            // Récupérer la catégorie principale
                            $categories = get_the_category();
                            $category_name = !empty($categories) ? $categories[0]->name : 'Non classé';
                            
                            // Récupérer l'image à la une ou utiliser une image par défaut
                            $thumbnail_url = has_post_thumbnail() ? 
                                get_the_post_thumbnail_url(get_the_ID(), 'large') : 
                                'https://images.unsplash.com/photo-1677756119517-756a188d2d94?q=80&w=1170&auto=format&fit=crop';
                            
                            // Récupérer l'extrait ou créer un extrait du contenu
                            $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20, '...');
                    ?>
                        <div class="article-card">
                            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                            <div class="article-card-content">
                                <p class="category"><?php echo esc_html(strtoupper($category_name)); ?></p>
                                <h4><?php the_title(); ?></h4>
                                <p><?php echo esc_html($excerpt); ?></p>
                                <a href="<?php the_permalink(); ?>">Lire la suite →</a>
                            </div>
                        </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Affichage de fallback si aucun article n'existe
                        for ($i = 1; $i <= 4; $i++) :
                    ?>
                        <div class="article-card">
                            <img src="https://images.unsplash.com/photo-1677756119517-756a188d2d94?q=80&w=1170&auto=format&fit=crop" alt="Article à venir">
                            <div class="article-card-content">
                                <p class="category">À VENIR</p>
                                <h4>Article en préparation</h4>
                                <p>Nous préparons du contenu de qualité pour vous. Revenez bientôt !</p>
                                <a href="<?php echo home_url('/blog/'); ?>">Découvrir le blog →</a>
                            </div>
                        </div>
                    <?php 
                        endfor;
                    endif; 
                    ?>
                </div>
                <div class="section-cta">
                    <a href="<?php echo home_url('/blog/'); ?>" class="btn btn-secondary">Voir tous les articles</a>
                </div>
            </div>
        </section>







        
        <!-- Container Gradient Background pour FAQ + CTA + Footer -->
        <div class="gradient-background">
            <!-- Section FAQ -->
            <section class="faq-section">
            <div class="container">
                <h2>Questions Fréquentes</h2>
                <p class="section-intro">Découvrez les réponses aux questions les plus courantes sur nos services d'accompagnement IA.</p>
                
                <details class="faq-item">
                    <summary>Qu'est-ce qui différencie EazyLink des autres consultants IA ?</summary>
                    <div class="answer">
                        <p>EazyLink combine expertise stratégique et support opérationnel dans une approche unique. Nous ne nous contentons pas de conseiller : nous accompagnons la mise en œuvre concrète de vos projets IA avec notre structure dédiée et nos experts sectoriels.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Comment se déroule un accompagnement EazyLink ?</summary>
                    <div class="answer">
                        <p>Notre processus commence par un diagnostic gratuit de vos besoins, suivi de la définition d'une stratégie IA personnalisée, puis de l'implémentation avec nos experts sectoriels et notre support technique intégré.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Quels sont les délais pour voir les premiers résultats ?</summary>
                    <div class="answer">
                        <p>Les premiers résultats sont généralement visibles dès les premières semaines. Pour une implémentation complète, comptez entre 2 à 6 mois selon la complexité de votre projet et vos objectifs.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>EazyLink convient-il aux PME et startups ?</summary>
                    <div class="answer">
                        <p>Absolument ! Nous proposons des solutions adaptées à chaque taille d'entreprise, avec un focus particulier sur le ROI et des approches modulaires pour les PME et startups qui souhaitent accélérer leur croissance.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Proposez-vous un accompagnement après la mise en œuvre ?</summary>
                    <div class="answer">
                        <p>Oui, notre accompagnement durable inclut le suivi, les ajustements nécessaires, la veille technologique et la formation continue de vos équipes pour garantir le succès à long terme de vos projets IA.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Comment puis-je évaluer si l'IA est adaptée à mon entreprise ?</summary>
                    <div class="answer">
                        <p>Nous proposons un diagnostic gratuit qui analyse votre situation actuelle, identifie les opportunités d'amélioration et évalue le potentiel de l'IA pour votre secteur et vos processus métiers. <a href="<?php echo home_url('/contact/'); ?>">Contactez-nous</a> pour planifier votre diagnostic.</p>
                    </div>
                </details>
            </div>
        </section>
        <!-- Section 8: Touch Point Final -->
        <section class="cta-section" id="contact">
            <div class="container">
                <div class="touch-point">
                    <h2>Découvrez nos solutions IA</h2>
                    <p>Transformez votre entreprise avec nos solutions d'intelligence artificielle personnalisées et notre accompagnement expert.</p>
                    <div class="touch-point-actions">
                        <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-primary">Nous contacter</a>
                        <a href="<?php echo home_url('/nos-solutions-ia/'); ?>" class="btn btn-secondary">Découvrir nos solutions</a>
                    </div>
                </div>
            </div>
        </section>
        </div> <!-- Fin gradient-background -->
    </main>

<?php get_footer(); ?>
