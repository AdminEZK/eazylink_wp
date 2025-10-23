<?php
/**
 * Template Name: Page des Experts IA
 * Template pour afficher la page des experts IA
 */

// Empêcher l'accès direct
if (!defined('ABSPATH')) {
    exit;
}

get_header(); ?>

    <!-- Section 1: Titre d'Accroche -->
    <header class="experts-hero-section">
        <div class="container">
            <h1 class="gradient-text">Nos Experts IA : La Stratégie et l'Action au Cœur de Votre Transformation.</h1>
            <p>Chez EazyLink, nous croyons qu'une stratégie IA réussie repose sur une double expertise : traduire votre vision stratégique et piloter sa mise en œuvre opérationnelle pour des résultats concrets et mesurables.</p>
            <a href="#process" class="btn btn-primary">Découvrir notre approche</a>
        </div>
    </header>

    <main>
        <!-- Section 2: Experts par Métier -->
        <section class="experts-section">
            <div class="container">
                <h2>Une Expertise IA Adaptée à Chaque Métier</h2>
                <div class="experts-grid">
                    <!-- Carte Avocat -->
                    <div class="expert-card">
                        <div class="card-icon violet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.916 17.916 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" /></svg>
                        </div>
                        <h4>Juridique</h4>
                        <p class="sector-info">Secteur: Services & Infrastructures numériques</p>
                        <p>Spécialité: Protection de la propriété intellectuelle & IA. France + Afrique / Moyen-Orient. Interventions type LEEM.</p>
                        <a href="<?php echo home_url('/contact/'); ?>" class="card-link">Contacter
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                        </a>
                    </div>
                    
                    <!-- Carte Ressources Humaines -->
                    <div class="expert-card">
                        <div class="card-icon violet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4.13a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                        </div>
                        <h4>Ressources Humaines</h4>
                        <p class="sector-info">Secteur: TPE / PME</p>
                        <p>Spécialité: Externalisation admin RH et accompagnement structuration / développement via outils RH.</p>
                        <a href="<?php echo home_url('/contact/'); ?>" class="card-link">Contacter
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                        </a>
                    </div>

                    <!-- Carte Import / Export -->
                    <div class="expert-card">
                        <div class="card-icon violet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 14h18M4 6h16a1 1 0 011 1v10a1 1 0 01-1 1H4a1 1 0 01-1-1V7a1 1 0 011-1z" /></svg>
                        </div>
                        <h4>Import / Export</h4>
                        <p class="sector-info">Secteur: Stratégie & Développement international</p>
                        <p>Spécialité: Audits qualité, études de marché, plans de stratégie, accompagnement écoles et entreprises internationales.</p>
                        <a href="<?php echo home_url('/contact/'); ?>" class="card-link">Contacter
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                        </a>
                    </div>

                    <!-- Carte Développeur IA -->
                     <div class="expert-card">
                        <div class="card-icon violet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" /></svg>
                        </div>
                        <h4>Développeur IA & Data</h4>
                        <p class="sector-info">Secteur: Technologies & Innovation</p>
                        <p>Spécialité: Intégration d'APIs IA, développement de chatbots, pipelines de données, MLOps et solutions d'automatisation intelligente.</p>
                        <a href="<?php echo home_url('/contact/'); ?>" class="card-link">Contacter
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                        </a>
                    </div>

                     <!-- Carte Marketing digital -->
                     <div class="expert-card">
                        <div class="card-icon violet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" /></svg>
                        </div>
                        <h4>Marketing Digital & IA</h4>
                        <p class="sector-info">Secteur: E-commerce & Communication Digitale</p>
                        <p>Spécialité: Automatisation marketing, personnalisation IA, attribution multi-touch, optimisation des conversions et stratégies omnicanales.</p>
                        <a href="<?php echo home_url('/contact/'); ?>" class="card-link">Contacter
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                        </a>
                    </div>

                    <!-- Carte Tourisme -->
                    <div class="expert-card">
                        <div class="card-icon violet">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-5.13-4.17-9.3-9.3-9.3S.9 6.87.9 12s4.17 9.3 9.3 9.3 9.3-4.17 9.3-9.3z" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 15.3a3.3 3.3 0 100-6.6 3.3 3.3 0 000 6.6z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-1.8M6.3 12H4.5M12 4.5v-1.8M12 19.5v-1.8" /></svg>
                        </div>
                        <h4>Transformation Digitale, IA et Management agile</h4>
                        <p class="sector-info">Secteur: Strétégie</p>
                        <p>Spécialité: A défnir</p>
                        <a href="<?php echo home_url('/contact/'); ?>" class="card-link">Contacter
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Processus d'Intervention -->
        <section id="process" class="process-section">
            <div class="container">
                <h2>De l'Analyse à l'Action : Notre Process</h2>
                <div class="process-grid">
                    <!-- Étape 1 -->
                    <div class="process-step">
                        <div class="step-number">01</div>
                        <h3>Diagnostic & Stratégie</h3>
                        <p>Analyse la situation, identifie les problématiques, effectue un diagnostic approfondi de l'entreprise afin d'identifier les actions à mener.</p>
                    </div>
                    <!-- Étape 2 -->
                    <div class="process-step">
                        <div class="step-number">02</div>
                        <h3>Proposition de Solutions</h3>
                        <p>Propose une typologie de solutions adaptées, tenant compte du contexte et des possibilités offertes par l’IA.</p>
                    </div>
                    <!-- Étape 3 -->
                    <div class="process-step">
                        <div class="step-number">03</div>
                        <h3>Déploiement & Suivi</h3>
                        <p>Agit auprès du client afin d'assurer la mise en place des opérations, leur pérennité et les outils de mesure.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 4: Support EazyLink -->
        <section class="support-section">
            <div class="container support-layout">
                <div class="support-content">
                    <h2>Plus qu'un Expert, Toute une Équipe à Vos Côtés</h2>
                    <p>L'expert EazyLink n'est jamais seul. Il est soutenu par notre structure qui garantit la mise en œuvre technique, la veille technologique et la coordination globale pour une solution complète et pérenne.</p>
                </div>
                <div class="support-list">
                    <div class="support-item">
                        <h4>Support Technique & Opérationnel</h4>
                        <p>Nous assurons la mise en œuvre technique et opérationnelle des recommandations de l’expert.</p>
                    </div>
                    <div class="support-item">
                        <h4>Veille et Intégration</h4>
                        <p>Nous facilitons l’intégration des outils, l'automatisation des flux et assurons la veille technologique.</p>
                    </div>
                    <div class="support-item">
                        <h4>Suivi et Ajustement</h4>
                        <p>Nous favorisons le suivi, l’accompagnement et l’ajustement éventuel des solutions déployées.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Container Gradient Background pour FAQ + CTA + Footer -->
        <div class="gradient-background">
            <!-- Section FAQ spécifique aux Experts IA -->
        <section class="faq-section">
            <div class="container">
                <div class="section-header">
                    <h2>Questions sur nos Experts IA</h2>
                    <p>Découvrez comment nos experts sectoriels peuvent transformer votre entreprise avec l'IA</p>
                </div>
                
                <details class="faq-item">
                    <summary>Comment choisir l'expert EazyLink adapté à mon secteur ?</summary>
                    <div class="answer">
                        <p>Chaque expert EazyLink possède une spécialisation sectorielle précise (juridique, RH, marketing digital, développement, etc.). Lors de notre premier échange, nous identifions vos besoins spécifiques pour vous orienter vers l'expert le plus pertinent pour votre domaine d'activité.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Quelle est la différence entre un consultant IA et un expert EazyLink ?</summary>
                    <div class="answer">
                        <p>Un expert EazyLink combine expertise métier et connaissance approfondie de l'IA. Contrairement à un consultant généraliste, il comprend les spécificités de votre secteur et est soutenu par notre structure technique pour assurer la mise en œuvre concrète des recommandations.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>L'expert travaille-t-il seul ou avec une équipe ?</summary>
                    <div class="answer">
                        <p>L'expert EazyLink n'est jamais seul. Il est soutenu par notre structure qui garantit la mise en œuvre technique, la veille technologique et la coordination globale. Cette approche collaborative assure une solution complète et pérenne.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Combien de temps dure un accompagnement avec un expert ?</summary>
                    <div class="answer">
                        <p>La durée varie selon vos besoins : de quelques semaines pour un diagnostic et des recommandations stratégiques, à plusieurs mois pour un accompagnement complet incluant la mise en œuvre. Nous adaptons notre intervention à votre rythme et vos objectifs.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Nos experts peuvent-ils intervenir à distance ?</summary>
                    <div class="answer">
                        <p>Oui, nos experts sont habitués aux interventions hybrides. Ils peuvent travailler à distance pour les phases de diagnostic et de conseil, et se déplacer sur site quand c'est nécessaire pour la mise en œuvre ou la formation de vos équipes.</p>
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Comment mesurer le ROI de l'intervention d'un expert IA ?</summary>
                    <div class="answer">
                        <p>Nous définissons des KPIs clairs dès le début : gains de productivité, réduction des coûts, amélioration de la qualité, temps économisé. L'expert met en place un tableau de bord de suivi et organise des points réguliers pour mesurer l'impact concret sur votre activité.</p>
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
