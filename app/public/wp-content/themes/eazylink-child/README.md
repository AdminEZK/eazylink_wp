# EazyLink Child Theme avec Tailwind CSS

Ce thème enfant WordPress utilise Tailwind CSS pour le styling.

## Installation

1. Assurez-vous d'avoir Node.js et NPM installés sur votre machine
2. Naviguez vers le répertoire du thème enfant :
   ```bash
   cd /chemin/vers/wp-content/themes/eazylink-child
   ```
3. Installez les dépendances :
   ```bash
   npm install
   ```
4. Compilez les styles Tailwind :
   ```bash
   npm run build
   ```

## Développement

Pour travailler sur le thème avec une recompilation automatique des styles :

```bash
npm run watch
```

## Structure des fichiers

- `src/tailwind.css` : Fichier source CSS avec les directives Tailwind
- `css/tailwind.css` : Fichier compilé (ne pas modifier directement)
- `tailwind.config.js` : Configuration de Tailwind CSS
- `postcss.config.js` : Configuration de PostCSS

## Utilisation de Tailwind

Vous pouvez utiliser les classes Tailwind directement dans vos fichiers PHP :

```html
<div class="flex items-center justify-between p-4 bg-blue-night text-white">
  <h2 class="text-2xl font-bold">Exemple</h2>
  <button class="btn-primary">Cliquez ici</button>
</div>
```

## Composants personnalisés

Des composants personnalisés ont été créés pour correspondre au design system :

- `.btn-primary` : Bouton principal avec dégradé
- `.btn-secondary` : Bouton secondaire avec bordure
- `.btn-outline` : Bouton avec contour
- `.card` : Carte avec ombre et animation au survol

## Intégration avec le design system existant

Tailwind CSS a été configuré pour compléter le design system existant, avec les mêmes couleurs, espacements et typographie.
