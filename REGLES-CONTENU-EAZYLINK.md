# ⚠️ RÈGLES DE CONTENU EAZYLINK - À RESPECTER ABSOLUMENT

## 📌 Résumé Exécutif

Ce document définit les **règles strictes** pour la création de contenu automatisé sur EazyLink.fr.
**Toute violation de ces règles entraînera le rejet automatique de l'article.**

---

## 🎯 Structure de Référence OBLIGATOIRE

### Fichier Modèle
**`/exemple-article-optimisation-continue.html`**

Tous les articles doivent suivre cette structure :

1. **Fil d'Ariane** : `Accueil / Blog / [Titre article]`
2. **Header Article** :
   - Catégorie (ex: "Excellence Opérationnelle")
   - Titre H1
   - Date de publication + Temps de lecture
3. **Image Principale** : 1170x780px (Unsplash ou générée)
4. **Paragraphe d'Accroche** : En gras, résume l'article
5. **Sections H2/H3** : Structurées et hiérarchisées
6. **Encadrés Citation** : Pour les insights importants
7. **Section Statistiques** : Si pertinent (key-stats)
8. **Section Sources et Références** : OBLIGATOIRE
9. **CTA Final** : Avec bouton d'action
10. **Bouton Partage LinkedIn**

---

## ✅ SOURCES ET DONNÉES - RÈGLES STRICTES

### Règle #1 : Sources Obligatoires
**TOUTES** les statistiques, pourcentages et données chiffrées **DOIVENT** avoir une source vérifiable.

#### ✅ Bon Exemple
```
"48,3% des entreprises encouragent l'utilisation de l'IA selon l'étude McKinsey 2025"
"67% des professionnels utilisent l'IA quotidiennement (Gartner, 2025)"
```

#### ❌ Mauvais Exemple
```
"Environ 50% des entreprises utilisent l'IA"
"La plupart des professionnels adoptent l'IA"
"Les études montrent que..."
```

### Règle #2 : Section Sources Obligatoire
Chaque article DOIT contenir une section "## Sources et Références" avec :
- **Minimum 3 sources fiables**
- Format : `[Titre] - [Organisme] - [Année] - [Lien]`

#### Exemple
```markdown
## Sources et Références

1. The State of AI in 2025 - McKinsey Global Institute - 2025 - https://mckinsey.com/...
2. AI Adoption Report - Gartner - 2025 - https://gartner.com/...
3. Digital Transformation Survey - IDC - 2024 - https://idc.com/...
```

### Règle #3 : Pas d'Approximation
❌ **INTERDIT** :
- Approximations ("environ", "près de", "autour de")
- Inventions de chiffres
- Données non vérifiables
- Sources vagues ("selon des études", "les experts disent")

✅ **AUTORISÉ** :
- Données précises avec source exacte
- Citations d'experts nommés
- Références à des études publiées

---

## ❌ FAQ INTERDITE DANS LES ARTICLES

### Règle Absolue
**PAS de section FAQ dans les articles de blog.**

#### Pourquoi ?
- FAQ déjà présente sur le site EazyLink
- Évite la duplication de contenu
- Optimise la structure SEO

#### Validation Automatique
Le workflow n8n **bloquera automatiquement** tout article contenant :
- Section "FAQ"
- Balise `<h2>FAQ</h2>`
- Questions/Réponses formatées en FAQ

---

## 🤖 Validation Automatique n8n

### Étape de Validation (Avant Publication)

Le workflow vérifie automatiquement :

1. ✅ **Présence section "Sources et Références"**
2. ✅ **Minimum 3 sources dans le JSON**
3. ✅ **Aucune FAQ détectée**
4. ✅ **Statistiques avec sources** (détection pattern `X%`)
5. ✅ **Structure conforme au modèle**

### En Cas d'Échec
- ❌ Article **rejeté** avant publication
- 📧 Notification email avec détails de l'erreur
- 📊 Enregistrement dans Google Sheets "Rejets"

---

## 📝 Template de Prompt IA

### Prompt pour Génération d'Articles

```
Tu es un expert en IA générative et transformation digitale. Rédige un article SEO-optimisé de 1200 mots.

STRUCTURE DE RÉFÉRENCE : /exemple-article-optimisation-continue.html

CONTRAINTES STRICTES :
❌ PAS de FAQ (déjà présente sur le site)
✅ SOURCES OBLIGATOIRES : Toutes les statistiques DOIVENT avoir une source vérifiable
  * Format : "X% selon [Étude Organisme Année]"
  * Pas d'approximation ni d'invention
  * Sources réelles uniquement

SECTION SOURCES OBLIGATOIRE :
Ajouter en fin d'article "## Sources et Références" avec :
- Minimum 3 sources fiables
- Format : [Titre] - [Organisme] - [Année] - [Lien]

FORMAT DE SORTIE JSON :
{
  "title": "...",
  "content": "...",
  "sources": [
    {
      "title": "Nom étude",
      "organization": "Organisme",
      "year": "2025",
      "url": "https://..."
    }
  ]
}
```

---

## 🎨 Éléments Visuels Requis

### Images
- **Principale** : 1170x780px (ratio 3:2)
- **Alt text** : Descriptif + mot-clé
- **Source** : Unsplash ou DALL-E

### Encadrés
```html
<div class="highlight-box">
  <p>"Citation ou insight important"</p>
</div>
```

### Statistiques Clés
```html
<div class="key-stats">
  <div class="stat-item">
    <span class="stat-number">23%</span>
    <span class="stat-label">Description avec source</span>
  </div>
</div>
```

---

## 📊 Checklist Avant Publication

### Validation Manuelle (Si Applicable)
- [ ] Structure conforme à `/exemple-article-optimisation-continue.html`
- [ ] Toutes les statistiques ont une source
- [ ] Section "Sources et Références" complète (min. 3)
- [ ] Aucune FAQ présente
- [ ] Paragraphe d'accroche en gras
- [ ] Image principale optimisée
- [ ] CTA final présent
- [ ] Bouton partage LinkedIn fonctionnel

### Validation Automatique n8n
- [ ] Pas de FAQ détectée
- [ ] Minimum 3 sources dans JSON
- [ ] Section Sources présente dans HTML
- [ ] Statistiques sourcées
- [ ] Structure HTML valide

---

## 🚨 Erreurs Courantes à Éviter

### ❌ Erreur #1 : FAQ dans l'article
```markdown
## FAQ
### Question 1 ?
Réponse...
```
**Solution** : Supprimer complètement la section FAQ

### ❌ Erreur #2 : Statistiques sans source
```
"50% des entreprises utilisent l'IA"
```
**Solution** : `"50% des entreprises utilisent l'IA selon McKinsey 2025"`

### ❌ Erreur #3 : Sources vagues
```
## Sources
- Étude récente
- Rapport d'experts
```
**Solution** : Sources précises avec organisme, année et lien

### ❌ Erreur #4 : Approximations
```
"Environ 30% des professionnels..."
```
**Solution** : `"30,2% des professionnels selon Gartner 2025"`

---

## 📞 Support

En cas de question sur ces règles :
1. Consulter `/exemple-article-optimisation-continue.html`
2. Vérifier le PRD SEO complet : `/SEO-PRD-EazyLink-COMPLET-2025.md`
3. Tester avec un article pilote avant automatisation complète

---

**Version** : 1.0  
**Date** : Octobre 2025  
**Mise à jour** : Mensuelle ou selon évolution SEO
