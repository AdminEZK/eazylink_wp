# EazyLink - Site WordPress

![EazyLink](https://img.shields.io/badge/WordPress-Theme-blue)
![Version](https://img.shields.io/badge/version-1.0.0-green)

## 📋 Description

EazyLink est un site WordPress moderne dédié à l'intelligence artificielle et à la transformation digitale. Le site propose des solutions IA personnalisées et une expertise sectorielle pour accompagner les entreprises dans leur transition numérique.

## ✨ Fonctionnalités

- **Design Moderne** : Interface glassmorphism avec effets de transparence et dégradés
- **Responsive Design** : Optimisé pour tous les écrans (mobile, tablette, desktop)
- **Multilingue** : Support Polylang (FR/EN/ES)
- **Blog Dynamique** : Système de filtres par catégorie avec animations
- **Pages Personnalisées** :
  - Page d'accueil avec statistiques IA
  - Page Solutions avec process interactif
  - Page Experts IA par secteur
  - Page Blog avec filtres dynamiques
  - Pages légales (CGV, Politique de confidentialité)

## 🎨 Design System

### Couleurs
- **Blue Night** : `#1a1a3e`
- **Violet Deep** : `#2d1b69`
- **Orange Vif** : `#FF7043`
- **Rose Accent** : `#ff006e`

### Typographie
- **Titres** : Montserrat (600)
- **Contenu** : Inter (400)

### Composants
- Conteneurs standardisés : `1400px`
- Boutons avec bordures arrondies : `60px`
- Effet glassmorphism : `backdrop-filter: blur(20px)`
- Gradient principal : `linear-gradient(135deg, #1a1a3e 0%, #2d1b69 50%, #ff006e 100%)`

## 🚀 Installation

### Prérequis
- WordPress 5.8+
- PHP 7.4+
- MySQL 5.7+

### Installation locale

1. Clonez le dépôt :
```bash
git clone https://github.com/VOTRE-USERNAME/eazylink.git
```

2. Configurez WordPress :
   - Créez une base de données MySQL
   - Copiez `wp-config-sample.php` vers `wp-config.php`
   - Configurez vos identifiants de base de données

3. Activez le thème :
   - Allez dans `Apparence > Thèmes`
   - Activez le thème EazyLink Child

4. Installez les plugins recommandés :
   - Polylang (multilingue)
   - Yoast SEO (référencement)
   - Contact Form 7 (formulaires)

## 📁 Structure du Projet

```
/wp-content/themes/eazylink-child/
├── css/
│   ├── design-system.css      # Variables et styles globaux
│   ├── tailwind.css           # Utilitaires Tailwind
│   ├── page-solutions.css     # Styles page Solutions
│   ├── page-experts.css       # Styles page Experts
│   └── page-blog.css          # Styles page Blog
├── assets/
│   ├── css/
│   │   ├── front-page.css     # Styles page d'accueil
│   │   └── single-article.css # Styles articles
│   └── js/
│       ├── blog-filters.js    # Filtres blog
│       └── animations.js      # Animations générales
├── templates/
│   ├── front-page.php         # Template page d'accueil
│   ├── page-solutions.php     # Template Solutions
│   ├── page-experts.php       # Template Experts IA
│   └── single.php             # Template article
├── functions.php              # Fonctions WordPress
├── header.php                 # Header du site
├── footer.php                 # Footer du site
└── style.css                  # Styles principaux
```

## 🔧 Configuration

### Polylang (Multilingue)

Le site est configuré pour supporter 3 langues :
- Français (FR) - Langue par défaut
- Anglais (EN)
- Espagnol (ES)

Consultez `POLYLANG-SETUP.md` pour la configuration complète.

### Yoast SEO

Configuration recommandée disponible dans `YOAST-SEO-CONFIG.md`.

## 🎯 Pages Principales

- **Accueil** : `/` - Présentation générale avec statistiques IA
- **Solutions** : `/solutions/` - Catalogue des solutions IA
- **Experts IA** : `/experts-ia/` - Expertise par secteur
- **Blog** : `/blog/` - Articles et actualités IA
- **Contact** : `/contact/` - Formulaire de contact

## 🛠️ Technologies

- **CMS** : WordPress 6.x
- **Framework CSS** : Custom Design System + Tailwind CSS
- **JavaScript** : Vanilla JS (animations, filtres)
- **Fonts** : Montserrat, Inter (Google Fonts)
- **Icons** : SVG custom

## 📱 Responsive Breakpoints

- **Mobile** : < 768px
- **Tablette** : 768px - 1024px
- **Desktop** : 1024px - 1500px
- **Large Desktop** : > 1500px

## 🤝 Contribution

Les contributions sont les bienvenues ! Pour contribuer :

1. Forkez le projet
2. Créez une branche (`git checkout -b feature/AmazingFeature`)
3. Committez vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Pushez vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.

## 👤 Auteur

**EazyLink Team**

- Website: [eazylink.fr](https://eazylink.fr)
- Email: contact@eazylink.fr

## 🙏 Remerciements

- Design inspiré des meilleures pratiques UX/UI modernes
- Communauté WordPress pour les plugins et le support
- Tous les contributeurs du projet

---

⭐ N'oubliez pas de mettre une étoile si ce projet vous a aidé !
