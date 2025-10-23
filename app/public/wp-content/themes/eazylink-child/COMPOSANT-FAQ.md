# Composant FAQ - Documentation

## Vue d'ensemble

Le composant FAQ d'EazyLink permet d'afficher des questions-réponses sous forme d'accordéon interactif. Il est entièrement intégré au design system et peut être utilisé sur n'importe quelle page.

## Fonctionnalités

- ✅ **Accordéon interactif** : Clic pour ouvrir/fermer les questions
- ✅ **Design cohérent** : Intégré au design system EazyLink
- ✅ **Responsive** : S'adapte à tous les écrans
- ✅ **Réutilisable** : Peut être utilisé sur plusieurs pages
- ✅ **Personnalisable** : Titre, sous-titre et questions modifiables
- ✅ **Sécurisé** : Utilise les fonctions WordPress pour la sécurité

## Utilisation

### 1. Page FAQ dédiée

Une page FAQ complète est disponible via le template `page-faq.php`. Pour l'utiliser :

1. Créer une nouvelle page dans WordPress
2. Sélectionner le template "FAQ" 
3. Publier la page

### 2. Composant réutilisable

Pour intégrer le composant FAQ dans une autre page :

```php
<?php
// Définir les questions-réponses
$faqs = array(
    array(
        'question' => 'Votre question ici',
        'answer' => 'Votre réponse ici avec du <strong>HTML</strong> si nécessaire'
    ),
    array(
        'question' => 'Une autre question',
        'answer' => 'Une autre réponse avec des <a href="/lien/">liens</a>'
    )
);

// Optionnel : personnaliser le titre
$section_title = 'Mes Questions Spécifiques';
$section_subtitle = 'Trouvez les réponses à vos questions';

// Inclure le composant
include(get_template_directory() . '/template-parts/faq-component.php');
?>
```

### 3. Exemple d'intégration dans une page existante

```php
// Dans page-solutions.php par exemple
<section class="solutions-section">
    <!-- Contenu de la page solutions -->
</section>

<?php
// Ajouter une section FAQ spécifique aux solutions
$faqs = array(
    array(
        'question' => 'Quelles solutions IA proposez-vous ?',
        'answer' => 'Nous proposons des solutions d\'automatisation, d\'analyse prédictive, de chatbots intelligents et bien plus encore.'
    ),
    array(
        'question' => 'Comment choisir la bonne solution ?',
        'answer' => 'Notre équipe réalise un diagnostic complet de vos besoins pour vous recommander la solution la plus adaptée.'
    )
);

$section_title = 'Questions sur nos Solutions';
include(get_template_directory() . '/template-parts/faq-component.php');
?>
```

## Structure CSS

Les styles FAQ sont intégrés dans le design system (`css/design-system.css`) :

- `.faq-section` : Section principale
- `.faq-item` : Élément de question-réponse
- `.faq-item summary` : Question cliquable
- `.faq-item .answer` : Réponse qui s'affiche/se cache
- `.faq-cta-section` : Section d'appel à l'action

## Classes CSS disponibles

```css
/* Section FAQ */
.faq-section { /* Styles de la section */ }

/* Item FAQ */
.faq-item { /* Styles de l'accordéon */ }
.faq-item[open] { /* État ouvert */ }

/* Question */
.faq-item summary { /* Styles de la question */ }
.faq-item summary::after { /* Icône + */ }

/* Réponse */
.faq-item .answer { /* Styles de la réponse */ }
.faq-item .answer p { /* Paragraphes de réponse */ }
.faq-item .answer strong { /* Texte en gras */ }
```

## Personnalisation

### Variables CSS disponibles

Le composant utilise les variables du design system :

```css
--deep-purple: #2d1b69;
--bright-orange: #FF7043;
--white: #FFFFFF;
--space-lg: 24px;
--space-xl: 48px;
--space-3xl: 96px;
--font-heading: 'Montserrat', sans-serif;
--font-body: 'Inter', sans-serif;
```

### Responsive

Le composant s'adapte automatiquement :

- **Desktop** : Questions sur une colonne, padding généreux
- **Tablet** : Légère réduction des espacements
- **Mobile** : Padding réduit, tailles de police adaptées

## Bonnes pratiques

1. **Questions claires** : Utilisez des questions directes et compréhensibles
2. **Réponses concises** : Évitez les réponses trop longues
3. **HTML sécurisé** : Utilisez `wp_kses_post()` pour le HTML dans les réponses
4. **Liens internes** : Privilégiez `home_url()` pour les liens internes
5. **Accessibilité** : Les éléments `<details>` sont accessibles par défaut

## Exemples de questions types

### Pour une page Solutions
- "Quelles solutions IA proposez-vous ?"
- "Comment choisir la bonne solution ?"
- "Quel est le délai d'implémentation ?"

### Pour une page Contact
- "Comment puis-je vous contacter ?"
- "Quels sont vos délais de réponse ?"
- "Proposez-vous des consultations gratuites ?"

### Pour une page About
- "Qui êtes-vous ?"
- "Quelle est votre expérience ?"
- "Pourquoi choisir EazyLink ?"

## Support et maintenance

Le composant FAQ est maintenu dans le cadre du design system EazyLink. Pour toute modification ou amélioration, modifier le fichier `css/design-system.css` dans la section "FAQ COMPONENT".
