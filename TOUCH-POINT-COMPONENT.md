# Composant Touch Point - EazyLink Design System

Le composant **Touch Point** est un élément réutilisable du design system EazyLink conçu pour créer des points de contact efficaces avec les utilisateurs. Il peut être utilisé pour des CTA, des invitations à l'action, ou des sections de conversion.

## Usage de base

```html
<div class="touch-point">
    <h2>Prêt à transformer votre approche de l'IA ?</h2>
    <p>Chez EazyLink, nous combinons expertise stratégique et support opérationnel pour vous offrir un accompagnement complet. Discutons de vos enjeux lors d'un diagnostic offert.</p>
    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Nous contacter</a>
</div>
```

## Variantes disponibles

### 1. Touch Point Standard (par défaut)
```html
<div class="touch-point">
    <h2>Titre du touch point</h2>
    <p>Description du touch point avec un message engageant.</p>
    <a href="#" class="btn btn-primary">Action principale</a>
</div>
```

### 2. Touch Point Primary (avec dégradé orange-rose)
```html
<div class="touch-point touch-point-primary">
    <h2>Découvrez nos solutions IA</h2>
    <p>Transformez votre entreprise avec nos solutions d'intelligence artificielle sur mesure.</p>
    <a href="#" class="btn btn-primary">En savoir plus</a>
</div>
```

### 3. Touch Point Secondary (avec accent violet)
```html
<div class="touch-point touch-point-secondary">
    <h2>Besoin d'aide ?</h2>
    <p>Notre équipe d'experts est là pour vous accompagner dans votre transformation digitale.</p>
    <a href="#" class="btn btn-secondary">Contactez-nous</a>
</div>
```

### 4. Touch Point Compact (version réduite)
```html
<div class="touch-point touch-point-compact">
    <h2>Newsletter</h2>
    <p>Restez informé de nos dernières actualités.</p>
    <a href="#" class="btn btn-outline">S'abonner</a>
</div>
```

### 5. Touch Point avec icône
```html
<div class="touch-point">
    <div class="touch-point-icon">
        <i class="fas fa-rocket"></i>
    </div>
    <h2>Lancez votre projet</h2>
    <p>Commencez dès aujourd'hui votre transformation digitale.</p>
    <a href="#" class="btn btn-primary">Démarrer</a>
</div>
```

### 6. Touch Point avec actions multiples
```html
<div class="touch-point">
    <h2>Choisissez votre parcours</h2>
    <p>Découvrez la solution qui correspond le mieux à vos besoins.</p>
    <div class="touch-point-actions">
        <a href="#" class="btn btn-primary">Entreprise</a>
        <a href="#" class="btn btn-secondary">Startup</a>
        <a href="#" class="btn btn-outline">Particulier</a>
    </div>
</div>
```

## Classes CSS disponibles

### Classes principales
- `.touch-point` : Classe de base du composant
- `.touch-point-primary` : Variante avec dégradé orange-rose
- `.touch-point-secondary` : Variante avec accent violet
- `.touch-point-compact` : Version compacte avec moins de padding

### Classes d'éléments
- `.touch-point-icon` : Conteneur pour icône circulaire avec dégradé
- `.touch-point-actions` : Conteneur pour actions multiples (boutons)

## Personnalisation

### Variables CSS utilisées
```css
--space-xl: 48px          /* Padding principal */
--space-lg: 24px          /* Padding compact */
--space-md: 16px          /* Marges internes */
--border-radius-lg: 16px  /* Bordures arrondies */
--white: #FFFFFF          /* Couleur du texte */
--accent-gradient         /* Dégradé pour icônes */
--font-heading           /* Police des titres */
--font-body             /* Police du contenu */
```

### Effets visuels
- **Glassmorphism** : Arrière-plan semi-transparent avec effet de flou
- **Hover** : Animation de levée (translateY) et changement d'opacité
- **Responsive** : Adaptation automatique sur mobile et tablette

## Bonnes pratiques

1. **Titre** : Utilisez des titres courts et impactants (max 8-10 mots)
2. **Description** : Limitez à 2-3 lignes pour maintenir l'impact visuel
3. **CTA** : Un seul bouton principal par touch point (sauf variante actions multiples)
4. **Placement** : Idéal en fin de section ou entre les contenus principaux
5. **Espacement** : Le composant gère automatiquement ses marges verticales

## Exemples d'usage par page

### Page d'accueil
```html
<div class="touch-point touch-point-primary">
    <h2>Prêt à transformer votre approche de l'IA ?</h2>
    <p>Chez EazyLink, nous combinons expertise stratégique et support opérationnel pour vous offrir un accompagnement complet.</p>
    <a href="/contact/" class="btn btn-primary">Diagnostic gratuit</a>
</div>
```

### Page Blog
```html
<div class="touch-point touch-point-secondary">
    <h2>Vous avez aimé cet article ?</h2>
    <p>Découvrez nos autres contenus sur l'intelligence artificielle et la transformation digitale.</p>
    <div class="touch-point-actions">
        <a href="/blog/" class="btn btn-primary">Voir tous les articles</a>
        <a href="/newsletter/" class="btn btn-outline">S'abonner</a>
    </div>
</div>
```

### Page Contact
```html
<div class="touch-point touch-point-compact">
    <div class="touch-point-icon">
        <i class="fas fa-phone"></i>
    </div>
    <h2>Besoin d'une réponse rapide ?</h2>
    <p>Appelez-nous directement pour un premier échange.</p>
    <a href="tel:+33123456789" class="btn btn-secondary">01 23 45 67 89</a>
</div>
```

## Responsive Design

Le composant s'adapte automatiquement :
- **Desktop** : Padding complet, texte centré
- **Tablette** : Padding réduit, boutons flexibles
- **Mobile** : Padding minimal, boutons empilés verticalement

## Intégration WordPress

Pour utiliser dans vos templates WordPress :

```php
<div class="touch-point">
    <h2><?php echo esc_html($touch_point_title); ?></h2>
    <p><?php echo esc_html($touch_point_description); ?></p>
    <a href="<?php echo esc_url(home_url($touch_point_link)); ?>" class="btn btn-primary">
        <?php echo esc_html($touch_point_cta); ?>
    </a>
</div>
```
