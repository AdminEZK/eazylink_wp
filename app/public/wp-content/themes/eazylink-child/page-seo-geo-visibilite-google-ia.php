<?php
/**
 * Template Name: Page SEO & GEO
 * Template pour la page SEO & GEO (visibilité Google et réponses IA)
 */

// Empêcher l'accès direct
if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>

    <!-- Section 1: Hero -->
    <header class="solutions-hero-section">
        <div class="container">
            <h1 class="gradient-text">SEO &amp; GEO : soyez visible sur Google et dans les réponses IA</h1>
            <p>Vos futurs clients ne recherchent plus uniquement avec quelques mots-clés. Ils posent désormais des questions précises à Google, Gemini, ChatGPT, Perplexity ou Copilot : « Quel prestataire peut m'aider ? », « Quelle entreprise intervient près de chez moi ? » ou « Qui recommandez-vous pour ce besoin ? »</p>
            <p>Eazylink aide votre entreprise à être mieux comprise, trouvée et choisie. Nous optimisons votre site, vos contenus, votre référencement local et vos informations clés afin de renforcer votre visibilité dans Google comme dans les nouveaux parcours de recherche assistés par IA.</p>
            <div class="hero-cta">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Demander un audit SEO &amp; visibilité IA</a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-secondary">Parler de votre projet</a>
            </div>
        </div>
    </header>

    <main>
        <!-- Section 2: SEO et GEO -->
        <section class="solutions-section">
            <div class="container">
                <h2>Deux leviers pour une même visibilité</h2>
                <div class="solutions-grid">
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg></div>
                        <h4>SEO — Search Engine Optimization</h4>
                        <p>Le SEO améliore la visibilité de votre site dans les résultats de recherche classiques. Il s'appuie sur la qualité technique de votre site, la clarté de vos pages, la pertinence de vos contenus, votre référencement local et la cohérence de votre offre.</p>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456z" /></svg></div>
                        <h4>GEO — Generative Engine Optimization</h4>
                        <p>Le GEO vise à rendre les informations de votre entreprise plus faciles à interpréter et à mobiliser dans les réponses générées par les moteurs et assistants IA, sans promettre une présence automatique dans leurs réponses.</p>
                    </div>
                </div>
                <p style="text-align:center; max-width:800px; margin:var(--space-xl) auto 0; color: var(--text-secondary);">L'objectif n'est pas de promettre une présence automatique dans ChatGPT, Gemini ou les aperçus IA de Google. Il consiste à construire une présence en ligne claire, fiable et utile, pour que votre entreprise puisse être identifiée comme une réponse pertinente lorsqu'un prospect exprime un besoin précis. Google confirme que les bonnes pratiques SEO, les contenus utiles et une base technique solide restent les principaux leviers de visibilité dans sa recherche générative.</p>
            </div>
        </section>

        <!-- Section 3: Ce que les IA doivent comprendre -->
        <section class="process-section">
            <div class="container">
                <h2>Ce que les IA doivent comprendre sur votre entreprise</h2>
                <p style="text-align:center; max-width:800px; margin:0 auto var(--space-xl); color: var(--text-secondary);">Pour citer, présenter ou recommander une entreprise, un moteur de recherche doit pouvoir identifier des informations fiables, accessibles et cohérentes. Votre présence digitale doit expliquer clairement :</p>
                <div class="process-grid">
                    <div class="process-card">
                        <div class="process-number">01</div>
                        <div class="process-content">
                            <h4>Vos services</h4>
                            <p>Vos services, spécialités et offres.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-number">02</div>
                        <div class="process-content">
                            <h4>Vos solutions</h4>
                            <p>Les problèmes que vous résolvez pour vos clients.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-number">03</div>
                        <div class="process-content">
                            <h4>Votre marché</h4>
                            <p>Vos secteurs d'activité et profils de clients.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-number">04</div>
                        <div class="process-content">
                            <h4>Votre zone</h4>
                            <p>Votre zone géographique ou vos marchés d'intervention.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-number">05</div>
                        <div class="process-content">
                            <h4>Vos preuves</h4>
                            <p>Vos réalisations, références, avis clients et certifications.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-number">06</div>
                        <div class="process-content">
                            <h4>Votre équipe</h4>
                            <p>Vos équipes, expertises et éléments de différenciation.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-number">07</div>
                        <div class="process-content">
                            <h4>Vos coordonnées</h4>
                            <p>Vos coordonnées, horaires et modalités de prise de contact.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-number">08</div>
                        <div class="process-content">
                            <h4>Vos réponses</h4>
                            <p>Les réponses aux questions posées avant un devis, une réservation ou un achat.</p>
                        </div>
                    </div>
                </div>
                <p style="text-align:center; max-width:800px; margin:var(--space-xl) auto 0; color: var(--text-secondary);">Eazylink structure ces informations pour qu'elles soient faciles à comprendre pour vos prospects, mais aussi exploitables par les moteurs de recherche. Des données structurées cohérentes avec le contenu visible peuvent aussi contribuer à l'éligibilité à certains résultats enrichis Google, sans constituer un raccourci vers les réponses IA.</p>
            </div>
        </section>

        <!-- Section 4: Ce que nous optimisons -->
        <section class="solutions-section">
            <div class="container">
                <h2>Une visibilité construite sur des bases solides</h2>
                <p style="text-align:center; max-width:800px; margin:0 auto var(--space-xl); color: var(--text-secondary);">Eazylink analyse votre présence actuelle et identifie ce qui freine votre compréhension par Google, par vos futurs clients et par les outils de recherche conversationnelle. Notre accompagnement peut inclure :</p>
                <div class="solutions-grid">
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg></div>
                        <h4>Audit SEO technique</h4>
                        <p>Indexation, performance, structure, erreurs et accessibilité.</p>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" /></svg></div>
                        <h4>Audit éditorial</h4>
                        <p>Pages existantes, positionnement, contenus manquants et opportunités.</p>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z" /></svg></div>
                        <h4>Pages de services</h4>
                        <p>Optimisation ou réécriture de vos pages de services.</p>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg></div>
                        <h4>Création de contenus</h4>
                        <p>Contenus répondant aux recherches concrètes de vos prospects.</p>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg></div>
                        <h4>SEO local</h4>
                        <p>Google Business Profile, zones d'intervention, cohérence des coordonnées et visibilité géolocalisée.</p>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a7.209 7.209 0 010-.255c.007-.378-.138-.75-.43-.991l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg></div>
                        <h4>Données structurées</h4>
                        <p>Mise en place de données structurées adaptées à votre activité.</p>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" /></svg></div>
                        <h4>Preuves d'expertise</h4>
                        <p>Valorisation de vos avis, réalisations, cas clients et certifications.</p>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" /></svg></div>
                        <h4>Maillage interne</h4>
                        <p>Optimisation du maillage interne et des appels à l'action.</p>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg></div>
                        <h4>Suivi des résultats</h4>
                        <p>Suivi via Google Search Console et indicateurs de visibilité.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 5: Recherches réelles -->
        <section class="process-section">
            <div class="container" style="max-width: 900px;">
                <h2 style="text-align:center;">Répondre aux vraies questions de vos prospects</h2>
                <p style="color: var(--text-secondary);">Vos clients ne cherchent pas toujours le nom exact de votre métier. Ils cherchent une solution, une urgence, une comparaison, un prestataire local ou une recommandation.</p>
                <p style="color: var(--text-secondary);">Par exemple, plutôt que de taper seulement « consultant SEO Rennes », un dirigeant peut demander :</p>
                <div class="process-card" style="text-align:center; margin: var(--space-lg) 0;">
                    <p style="font-style: italic; font-size: 1.25rem; color: var(--white); margin: 0;">« Qui peut améliorer la visibilité de mon entreprise sur Google et dans les réponses IA à Rennes ? »</p>
                </div>
                <p style="color: var(--text-secondary);">Votre site doit pouvoir répondre clairement à cette demande : avec une offre compréhensible, une page bien structurée, des exemples concrets, des preuves de savoir-faire et un moyen simple de vous contacter.</p>
                <p style="color: var(--text-secondary);">Nous ne créons pas des dizaines de pages artificielles. Nous développons des contenus réellement utiles, précis et différenciants — une approche cohérente avec les recommandations Google sur les contenus originaux, fiables et pensés d'abord pour les internautes.</p>
            </div>
        </section>

        <!-- Section 6: Méthode -->
        <section class="solutions-section">
            <div class="container">
                <h2>Une méthode claire et priorisée</h2>
                <div class="process-grid">
                    <div class="process-card">
                        <div class="process-number">01</div>
                        <div class="process-content">
                            <h4>Comprendre votre situation</h4>
                            <p>Nous analysons votre site, vos contenus, votre positionnement, votre visibilité locale et les informations publiques disponibles sur votre entreprise.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-number">02</div>
                        <div class="process-content">
                            <h4>Identifier les opportunités</h4>
                            <p>Nous repérons les pages à corriger, les besoins de contenus, les requêtes stratégiques, les freins techniques et les preuves à mieux valoriser.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-number">03</div>
                        <div class="process-content">
                            <h4>Optimiser l'essentiel</h4>
                            <p>Nous priorisons les actions qui peuvent avoir le plus d'impact : pages de services, SEO local, structure éditoriale, réassurance et conversion.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-number">04</div>
                        <div class="process-content">
                            <h4>Mesurer et faire évoluer</h4>
                            <p>Nous suivons les performances et ajustons la stratégie en fonction de votre activité, de la concurrence et de l'évolution des comportements de recherche.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 7: Pour qui -->
        <section class="process-section">
            <div class="container">
                <h2>Une stratégie adaptée aux entreprises de terrain</h2>
                <p style="text-align:center; max-width:800px; margin:0 auto var(--space-xl); color: var(--text-secondary);">Cette offre s'adresse notamment aux :</p>
                <div class="solutions-grid">
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21" /></svg></div>
                        <h4>Entreprises de services</h4>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" /></svg></div>
                        <h4>Indépendants et consultants</h4>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.734-.05a2.548 2.548 0 001.734-4.9l-3.44 3.44m-1.734 4.9l-3.44-3.44m0 0a2.548 2.548 0 00-3.586 0l-.233.233" /></svg></div>
                        <h4>Artisans et commerçants</h4>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" /></svg></div>
                        <h4>Cabinets et professions libérales</h4>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H7.5a.75.75 0 00-.75.75v3.75c0 .414.336.75.75.75z" /></svg></div>
                        <h4>Agences et prestataires B2B</h4>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg></div>
                        <h4>Entreprises locales qui développent leur zone de chalandise</h4>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" /></svg></div>
                        <h4>Structures qui veulent réduire leur dépendance à la publicité payante</h4>
                    </div>
                </div>
                <p style="text-align:center; max-width:800px; margin:var(--space-xl) auto 0; color: var(--text-secondary);">Elle est particulièrement pertinente si votre site est ancien, si votre offre manque de clarté, si vous êtes peu visible localement, si vos concurrents prennent la place dans Google ou si vous souhaitez anticiper l'évolution des recherches vers les assistants IA.</p>
            </div>
        </section>

        <!-- Container Gradient Background pour CTA -->
        <div class="gradient-background">
            <!-- Section 8: CTA Final -->
            <section class="cta-section" id="contact">
                <div class="container">
                    <div class="touch-point">
                        <h2>Faites de votre entreprise une réponse évidente</h2>
                        <p>Aujourd'hui, votre visibilité ne dépend pas seulement de votre position dans une liste de résultats. Elle dépend aussi de la capacité de votre entreprise à être comprise, reconnue et présentée comme une réponse fiable à une demande précise. Eazylink vous aide à construire une présence digitale plus claire, plus utile et plus visible — sur Google, Google Maps et dans les parcours de recherche assistés par IA.</p>
                        <div class="touch-point-actions">
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Demander un audit SEO &amp; visibilité IA</a>
                            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-secondary">Nous contacter</a>
                        </div>
                    </div>
                </div>
            </section>
        </div><!-- Fin gradient-background -->
    </main>

<?php get_footer(); ?>
