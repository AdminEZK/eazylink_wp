<?php
/**
 * Template Name: Page des Solutions IA
 * Template pour afficher la page des solutions IA
 */

// Empêcher l'accès direct
if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>

    <!-- Section 1: Titre d'Accroche -->
    <header class="solutions-hero-section">
        <div class="container">
            <h1 class="gradient-text">Des Solutions IA Complètes, de la Stratégie à l'Implémentation.</h1>
            <p>Découvrez comment notre processus structuré et nos solutions sur mesure transforment vos défis en opportunités, en garantissant un impact réel et durable sur votre activité.</p>
            <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-primary">Contactez-nous</a>
        </div>
    </header>

    <main>
        <!-- Section 2: Notre Offre de Solutions -->
        <section class="solutions-section">
            <div class="container">
                <h2>Notre Gamme de Solutions</h2>
                <div class="solutions-grid">
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg></div>
                        <h4>Diagnostic et Analyse</h4>
                        <p>Nous évaluons votre maturité data & IA pour identifier les cas d'usage à plus fort potentiel et définir une feuille de route claire.</p>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" /></svg></div>
                        <h4>Conseil Stratégique</h4>
                        <p>Nos experts vous aident à aligner votre stratégie d'entreprise avec les opportunités de l'IA pour un avantage concurrentiel durable.</p>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z" /></svg></div>
                        <h4>Implémentation Technique</h4>
                        <p>Notre structure prend en charge le développement, l'intégration d'outils et l'automatisation des flux pour concrétiser la vision.</p>
                    </div>
                    <div class="service-card">
                        <div class="card-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-4.67c.12-.318.239-.636.356-.957m-8.582 3.317a3.372 3.372 0 00-3.372 3.372M9.513 12.343a3.372 3.372 0 00-3.372-3.372" /></svg></div>
                        <h4>Formation & Accompagnement</h4>
                        <p>Nous assurons la montée en compétence de vos équipes et un suivi continu pour garantir l'adoption et l'ajustement des solutions.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Notre Processus d'Accompagnement -->
        <section class="process-section">
            <div class="container">
                <h2>Un Accompagnement Pas à Pas vers le Succès</h2>
                <div class="process-grid">
                    <div class="process-card">
                        <div class="process-number">01</div>
                        <div class="process-content">
                            <h4>Écoute & Diagnostic</h4>
                            <p>Analyse approfondie de votre contexte, de vos données et de vos objectifs business.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-number">02</div>
                        <div class="process-content">
                            <h4>Stratégie & Cadrage</h4>
                            <p>Co-construction de la feuille de route, priorisation des projets et définition des KPIs.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-number">03</div>
                        <div class="process-content">
                            <h4>Déploiement & Intégration</h4>
                            <p>Mise en œuvre de la solution par nos équipes techniques, en mode agile.</p>
                        </div>
                    </div>
                    <div class="process-card">
                        <div class="process-number">04</div>
                        <div class="process-content">
                            <h4>Suivi & Optimisation</h4>
                            <p>Mesure des résultats, formation de vos équipes et ajustements pour maximiser l'impact.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 4: Les Avantages EazyLink -->
        <section class="advantages-section">
            <div class="container advantages-layout">
                <div class="advantages-content">
                    <h2 style="text-align: left; margin-bottom: var(--space-md );">L'Avantage EazyLink : Plus qu'une Solution, un Partenariat</h2>
                    <p style="color: var(--text-secondary);">En choisissant EazyLink, vous ne bénéficiez pas seulement de l'expertise d'un consultant, mais de la puissance d'une structure entièrement dédiée à la réussite de vos projets IA.</p>
                </div>
                <div class="advantages-list">
                    <div class="advantage-item">
                        <div class="advantage-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></div>
                        <div>
                            <h4>Synergie des Compétences</h4>
                            <p>Nous assurons la relation entre les experts des différents métiers pour apporter une solution globale et complète à vos besoins.</p>
                        </div>
                    </div>
                    <div class="advantage-item">
                        <div class="advantage-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg></div>
                        <div>
                            <h4>Support Opérationnel Intégré</h4>
                            <p>Nous facilitons l'intégration des outils, l'automatisation des flux et assurons une veille technologique constante.</p>
                        </div>
                    </div>
                    <div class="advantage-item">
                        <div class="advantage-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg></div>
                        <div>
                            <h4>Accompagnement Durable</h4>
                            <p>Nous favorisons le suivi, l'accompagnement et l'ajustement des solutions pour garantir leur pertinence sur le long terme.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Container Gradient Background pour FAQ + CTA + Footer -->
        <div class="gradient-background">
            <!-- Section FAQ spécifique aux Solutions -->
        <section class="faq-section">
            <div class="container">
                <div class="section-header">
                    <h2>Questions sur nos Solutions IA</h2>
                    <p>Trouvez les réponses aux questions les plus fréquentes sur nos solutions et notre processus d'accompagnement.</p>
                </div>
                
                <details class="faq-item">
                    <summary>Quelles solutions IA proposez-vous concrètement ?</summary>
                    <div class="answer">
                        <p>Nous proposons des solutions d'automatisation des processus, d'analyse prédictive, de chatbots intelligents, d'optimisation des opérations, et de personnalisation client. Chaque solution est adaptée à votre secteur et vos besoins spécifiques.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Comment choisir la bonne solution IA pour mon entreprise ?</summary>
                    <div class="answer">
                        <p>Notre processus commence par un diagnostic complet de votre maturité data & IA. Nous analysons vos processus, vos données disponibles et vos objectifs business pour identifier les cas d'usage à plus fort potentiel et définir une feuille de route personnalisée.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Combien de temps faut-il pour déployer une solution IA ?</summary>
                    <div class="answer">
                        <p>Le délai varie selon la complexité du projet. Pour des solutions simples d'automatisation, comptez 4-8 semaines. Pour des projets plus complexes d'IA prédictive, prévoyez 3-6 mois. Nous privilégions une approche agile avec des résultats visibles rapidement.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Mes données sont-elles suffisantes pour l'IA ?</summary>
                    <div class="answer">
                        <p>L'IA ne nécessite pas forcément du Big Data. Même avec des jeux de données limités, de nombreuses solutions peuvent apporter une valeur immense : automatisation, modèles pré-entraînés, optimisation des processus. Notre diagnostic initial identifie ces opportunités.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Proposez-vous un accompagnement après le déploiement ?</summary>
                    <div class="answer">
                        <p>Absolument. Nous assurons la formation de vos équipes, un support technique continu, l'optimisation des performances et l'évolution des solutions selon vos nouveaux besoins. Notre objectif est la pérennité de votre investissement IA.</p>
                    </div>
                </details>
            </div>
        </section>

        <!-- Section 5: Touch Point Final -->
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
