# Configuration Polylang pour EazyLink

## 1. Installation et Configuration de Base

### Installation du Plugin
1. Allez dans **Extensions > Ajouter** dans votre admin WordPress
2. Recherchez "Polylang" et installez le plugin officiel
3. Activez le plugin

### Configuration Initiale
1. Allez dans **Langues > Langues**
2. Ajoutez vos langues :
   - **Français** : Code `fr`, Slug `fr`, Drapeau France
   - **Anglais** : Code `en`, Slug `en`, Drapeau Royaume-Uni
   - **Espagnol** : Code `es`, Slug `es`, Drapeau Espagne (optionnel)

3. Dans **Langues > Réglages** :
   - Cochez "Détecter la langue du navigateur"
   - Cochez "Masquer la langue par défaut dans l'URL" (optionnel)
   - Sélectionnez votre langue par défaut (Français)

## 2. Configuration des Menus et Widgets

### Menus Multilingues
1. Allez dans **Apparence > Menus**
2. Créez un menu pour chaque langue :
   - Menu Principal FR
   - Menu Principal EN
   - Menu Principal ES (si applicable)

3. Dans **Langues > Réglages > Menus** :
   - Assignez chaque menu à sa langue correspondante

### Widgets
1. Allez dans **Apparence > Widgets**
2. Configurez les widgets pour chaque langue si nécessaire

## 3. Traduction du Contenu

### Pages Principales à Traduire

#### Page d'Accueil (front-page.php)
**Français (original)** :
- Titre : "Transformez votre entreprise avec l'Intelligence Artificielle"
- Sous-titre : "Nous aidons les entreprises à intégrer l'IA de manière stratégique..."

**Anglais** :
- Titre : "Transform your business with Artificial Intelligence"
- Sous-titre : "We help businesses integrate AI strategically..."

**Espagnol** :
- Titre : "Transforma tu empresa con Inteligencia Artificial"
- Sous-titre : "Ayudamos a las empresas a integrar la IA estratégicamente..."

#### Page Experts IA
**Français** : "Experts IA"
**Anglais** : "AI Experts"
**Espagnol** : "Expertos IA"

#### Page Solutions
**Français** : "Nos Solutions"
**Anglais** : "Our Solutions"
**Espagnol** : "Nuestras Soluciones"

#### Page Blog
**Français** : "Blog"
**Anglais** : "Blog"
**Espagnol** : "Blog"

#### Page À Propos
**Français** : "À Propos"
**Anglais** : "About"
**Espagnol** : "Acerca de"

#### Page Contact
**Français** : "Contact"
**Anglais** : "Contact"
**Espagnol** : "Contacto"

### Navigation Footer
```php
// Dans footer.php, remplacez les liens statiques par :
<li><a href="<?php echo pll_home_url(); ?>" class="footer-link"><?php pll_e('Accueil'); ?></a></li>
<li><a href="<?php echo pll_home_url(); ?>experts-ia/" class="footer-link"><?php pll_e('Expert IA'); ?></a></li>
<li><a href="<?php echo pll_home_url(); ?>solutions/" class="footer-link"><?php pll_e('Nos Solutions'); ?></a></li>
<li><a href="<?php echo pll_home_url(); ?>blog/" class="footer-link"><?php pll_e('Blog'); ?></a></li>
<li><a href="<?php echo pll_home_url(); ?>about/" class="footer-link"><?php pll_e('À Propos'); ?></a></li>
<li><a href="<?php echo pll_home_url(); ?>contact/" class="footer-link"><?php pll_e('Contact'); ?></a></li>
```

## 4. Traduction des Chaînes de Texte

### Ajout des Chaînes dans functions.php
Ajoutez ce code dans votre `functions.php` :

```php
// Enregistrement des chaînes de traduction Polylang
if (function_exists('pll_register_string')) {
    // Navigation
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
    
    // Boutons
    pll_register_string('buttons', 'Découvrir nos solutions', 'EazyLink');
    pll_register_string('buttons', 'Contactez-nous', 'EazyLink');
    pll_register_string('buttons', 'En savoir plus', 'EazyLink');
    pll_register_string('buttons', 'Commencer', 'EazyLink');
}
```

### Traduction dans l'Admin
1. Allez dans **Langues > Traductions de chaînes**
2. Traduisez chaque chaîne pour chaque langue :

**Anglais** :
- Accueil → Home
- Expert IA → AI Expert
- Nos Solutions → Our Solutions
- À Propos → About
- Contact → Contact
- Découvrir nos solutions → Discover our solutions
- Contactez-nous → Contact us
- En savoir plus → Learn more
- Commencer → Get started

**Espagnol** :
- Accueil → Inicio
- Expert IA → Experto IA
- Nos Solutions → Nuestras Soluciones
- À Propos → Acerca de
- Contact → Contacto
- Découvrir nos solutions → Descubrir nuestras soluciones
- Contactez-nous → Contáctanos
- En savoir plus → Saber más
- Commencer → Empezar

## 5. Configuration des URLs

### Structure d'URL Recommandée
- **Français** : `https://eazylink.fr/` (langue par défaut)
- **Anglais** : `https://eazylink.fr/en/`
- **Espagnol** : `https://eazylink.fr/es/`

### Configuration dans WordPress
1. Allez dans **Réglages > Permaliens**
2. Choisissez "Nom de l'article" ou structure personnalisée
3. Dans **Langues > Réglages**, configurez les préfixes d'URL

## 6. Traduction des Pages Existantes

### Processus de Traduction
1. Éditez une page existante
2. Dans la métabox "Langues", cliquez sur "+" pour la langue cible
3. Traduisez le contenu
4. Publiez la traduction

### Pages Prioritaires à Traduire
1. **Page d'accueil** (front-page.php)
2. **Page Experts IA**
3. **Page Solutions**
4. **Page À Propos**
5. **Page Contact**
6. **Articles de blog principaux**

## 7. Test et Vérification

### Checklist de Vérification
- [ ] Le sélecteur de langue apparaît dans le footer
- [ ] Les drapeaux et noms de langues s'affichent correctement
- [ ] Les liens changent selon la langue sélectionnée
- [ ] Les menus sont traduits
- [ ] Les pages principales sont traduites
- [ ] Les chaînes de texte sont traduites
- [ ] Les URLs sont correctes pour chaque langue
- [ ] Le design reste cohérent sur toutes les langues

## 8. Maintenance

### Ajout de Nouvelles Traductions
1. Créez le contenu en français (langue par défaut)
2. Ajoutez les traductions via l'admin WordPress
3. Mettez à jour les menus si nécessaire
4. Testez le sélecteur de langue

### Mise à jour des Traductions
1. Modifiez le contenu original
2. Mettez à jour les traductions correspondantes
3. Vérifiez la cohérence entre les langues

---

**Note** : Le sélecteur de langue a été intégré dans le footer avec un design glassmorphism cohérent avec le reste du site EazyLink. Il s'adapte automatiquement aux différentes tailles d'écran et met en évidence la langue actuelle avec le dégradé orange-rose caractéristique d'EazyLink.
