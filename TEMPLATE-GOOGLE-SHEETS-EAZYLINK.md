# 📊 Template Google Sheets - EazyLink Automatisation

## 🎯 Instructions

Créez 2 feuilles dans un même Google Sheets :
1. **Calendrier** (planning éditorial)
2. **Performance** (tracking résultats)

---

## 📅 Sheet 1 : "Calendrier"

### Structure des Colonnes

| Col | Nom | Type | Valeurs | Description |
|-----|-----|------|---------|-------------|
| A | **Statut** | Liste déroulante | À générer, En cours, Publié, Rejeté | État de l'article |
| B | **Date Pub** | Date | Format: JJ/MM/AAAA | Date de publication prévue |
| C | **Sujet** | Texte | Texte libre | Titre/sujet de l'article |
| D | **Mot-clé principal** | Texte | 2-5 mots | Mot-clé SEO principal |
| E | **Mots-clés secondaires** | Texte | Séparés par virgules | Mots-clés secondaires |
| F | **Type** | Liste déroulante | Article blog, Post LinkedIn, Carrousel, Livre blanc | Type de contenu |
| G | **Secteur** | Liste déroulante | Finance, Marketing, RH, Production, Tech, Général | Secteur ciblé |
| H | **Priorité** | Liste déroulante | Haute, Moyenne, Faible | Niveau de priorité |
| I | **URL WP** | URL | Auto-rempli | Lien WordPress (rempli par n8n) |
| J | **URL LinkedIn** | URL | Auto-rempli | Lien LinkedIn (rempli par n8n) |

### Configuration des Listes Déroulantes

#### Colonne A - Statut
```
À générer
En cours
Publié
Rejeté
```

#### Colonne F - Type
```
Article blog
Post LinkedIn
Carrousel
Livre blanc
```

#### Colonne G - Secteur
```
Finance
Marketing
RH
Production
Tech
Santé
Retail
Industrie
Services
Général
```

#### Colonne H - Priorité
```
Haute
Moyenne
Faible
```

### Exemples de Lignes

```
Statut      | Date Pub   | Sujet                                          | Mot-clé principal           | Mots-clés secondaires                    | Type          | Secteur   | Priorité | URL WP | URL LinkedIn
------------|------------|------------------------------------------------|-----------------------------|------------------------------------------|---------------|-----------|----------|--------|-------------
À générer   | 28/10/2025 | Optimisation Continue en Entreprise            | optimisation continue IA    | kaizen, lean six sigma, IA prédictive    | Article blog  | Production| Haute    |        |
À générer   | 30/10/2025 | ROI de l'IA Générative en Finance              | ROI IA finance              | automatisation, analyse prédictive       | Article blog  | Finance   | Haute    |        |
À générer   | 01/11/2025 | Transformation Digitale RH                     | transformation digitale RH  | recrutement IA, onboarding               | Article blog  | RH        | Moyenne  |        |
Publié      | 25/10/2025 | IA Générative et Marketing Automation          | IA marketing automation     | personnalisation, campagnes              | Article blog  | Marketing | Haute    | https://eazylink.fr/blog/ia-marketing | https://linkedin.com/...
```

### Mise en Forme Recommandée

1. **Ligne 1** : En-têtes en gras, fond bleu clair
2. **Colonne A** : Mise en forme conditionnelle
   - "À générer" → Fond orange
   - "En cours" → Fond jaune
   - "Publié" → Fond vert
   - "Rejeté" → Fond rouge
3. **Figer la ligne 1** pour navigation facile
4. **Filtres** activés sur toutes les colonnes

---

## 📈 Sheet 2 : "Performance"

### Structure des Colonnes

| Col | Nom | Type | Description |
|-----|-----|------|-------------|
| A | **Article** | Texte | Titre de l'article |
| B | **Date Pub** | Date | Date de publication |
| C | **Mot-clé** | Texte | Mot-clé principal |
| D | **Impressions 7j** | Nombre | Impressions Google 7 jours |
| E | **Clics 7j** | Nombre | Clics Google 7 jours |
| F | **Position** | Nombre | Position moyenne Google |
| G | **CTR** | Pourcentage | Taux de clic (calculé) |
| H | **LinkedIn Impr.** | Nombre | Impressions LinkedIn |
| I | **LinkedIn Eng.** | Nombre | Engagement LinkedIn (likes+comments+shares) |
| J | **Leads** | Nombre | Leads générés |
| K | **URL** | URL | Lien vers l'article |
| L | **Score SEO** | Texte | Excellent, Bon, Moyen |
| M | **Sources Count** | Nombre | Nombre de sources citées |
| N | **Word Count** | Nombre | Nombre de mots |

### Formules Automatiques

#### Colonne G - CTR (Taux de Clic)
```
=IF(D2>0, E2/D2, 0)
```
Format : Pourcentage avec 2 décimales

#### Colonne L - Score SEO (Automatique)
```
=IF(N2>=1000, IF(M2>=3, "Excellent", "Bon"), "Moyen")
```

### Exemples de Lignes

```
Article                          | Date Pub   | Mot-clé                  | Impr. 7j | Clics 7j | Position | CTR    | LinkedIn Impr. | LinkedIn Eng. | Leads | URL                                    | Score SEO | Sources | Words
---------------------------------|------------|--------------------------|----------|----------|----------|--------|----------------|---------------|-------|----------------------------------------|-----------|---------|------
Optimisation Continue IA         | 25/10/2025 | optimisation continue IA | 1250     | 45       | 8.5      | 3.6%   | 8500           | 125           | 3     | https://eazylink.fr/blog/optimisation  | Excellent | 5       | 1200
ROI IA Finance                   | 28/10/2025 | ROI IA finance           | 890      | 32       | 12.3     | 3.6%   | 6200           | 98            | 2     | https://eazylink.fr/blog/roi-ia-finance| Excellent | 4       | 1150
```

### Graphiques Recommandés

#### 1. Évolution Trafic Organique
- Type : Courbe
- Axe X : Date Pub
- Axe Y : Impressions 7j + Clics 7j

#### 2. Performance par Mot-clé
- Type : Barres horizontales
- Données : Position moyenne par mot-clé

#### 3. Engagement LinkedIn
- Type : Barres empilées
- Données : Impressions vs Engagement

#### 4. Distribution Score SEO
- Type : Camembert
- Données : Nombre d'articles par score

---

## 🎨 Mise en Forme Conditionnelle

### Sheet "Calendrier"

#### Colonne A - Statut
```
Si texte contient "À générer" → Fond #FFA500 (orange)
Si texte contient "En cours" → Fond #FFFF00 (jaune)
Si texte contient "Publié" → Fond #90EE90 (vert clair)
Si texte contient "Rejeté" → Fond #FF6B6B (rouge clair)
```

#### Colonne H - Priorité
```
Si texte = "Haute" → Texte rouge gras
Si texte = "Moyenne" → Texte orange
Si texte = "Faible" → Texte gris
```

### Sheet "Performance"

#### Colonne F - Position
```
Si valeur <= 3 → Fond vert
Si valeur <= 10 → Fond jaune
Si valeur > 10 → Fond orange
```

#### Colonne G - CTR
```
Si valeur >= 5% → Fond vert
Si valeur >= 2% → Fond jaune
Si valeur < 2% → Fond orange
```

#### Colonne L - Score SEO
```
Si texte = "Excellent" → Fond vert
Si texte = "Bon" → Fond jaune
Si texte = "Moyen" → Fond orange
```

---

## 🔗 Partage et Permissions

### Configuration Recommandée
1. **Propriétaire** : Compte Google principal EazyLink
2. **Éditeurs** : Équipe contenu
3. **Lecteurs** : Management, stakeholders
4. **n8n** : Accès via Service Account (OAuth2)

### Sécurité
- ✅ Activer l'historique des versions
- ✅ Protéger les colonnes I et J (URLs auto-remplies)
- ✅ Limiter l'accès aux données sensibles

---

## 📊 Dashboard Récapitulatif (Optionnel)

### Sheet 3 : "Dashboard"

Créer une vue d'ensemble avec :

#### KPIs Principaux
```
Total Articles Publiés : =COUNTIF(Calendrier!A:A,"Publié")
Articles en Attente : =COUNTIF(Calendrier!A:A,"À générer")
Moyenne Impressions : =AVERAGE(Performance!D:D)
Moyenne Position : =AVERAGE(Performance!F:F)
Total Leads : =SUM(Performance!J:J)
```

#### Graphiques
1. **Évolution mensuelle** : Articles publiés par mois
2. **Performance par secteur** : Impressions moyennes par secteur
3. **Top 10 articles** : Par impressions ou engagement

---

## 🔄 Workflow n8n - Interactions

### Lecture (n8n → Sheets)
- **Node** : "Lire Calendrier Éditorial"
- **Action** : Lit les lignes avec Statut = "À générer"
- **Fréquence** : Lun/Mer/Ven à 8h

### Écriture (n8n → Sheets)
- **Node** : "Mettre à Jour Calendrier"
- **Action** : 
  - Change Statut → "Publié"
  - Remplit URL WP (colonne I)
  - Remplit URL LinkedIn (colonne J)
  - Ajoute Date Publication

### Tracking (n8n → Sheets)
- **Node** : "Tracker Performance"
- **Action** : Ajoute nouvelle ligne dans "Performance"
- **Données** : Titre, Date, Mot-clé, URL, Score SEO, Sources, Word Count

---

## 📝 Template Prêt à Copier

### Création Rapide

1. **Créer un nouveau Google Sheets**
2. **Renommer** : "EazyLink - Automatisation Articles"
3. **Créer 3 feuilles** : Calendrier, Performance, Dashboard
4. **Copier-coller** les en-têtes ci-dessus
5. **Configurer** les listes déroulantes
6. **Appliquer** la mise en forme conditionnelle
7. **Partager** avec le Service Account n8n

### Lien Template (à créer)
Créez votre propre template et partagez-le en "Lecture seule" pour duplication facile.

---

## 🎯 Bonnes Pratiques

### Planification
- ✅ Planifier 2-3 semaines à l'avance
- ✅ Varier les secteurs et types de contenu
- ✅ Équilibrer priorités Haute/Moyenne/Faible

### Suivi
- ✅ Mettre à jour Performance chaque semaine
- ✅ Analyser les tendances mensuelles
- ✅ Ajuster la stratégie selon résultats

### Collaboration
- ✅ Commenter les lignes pour discussions
- ✅ Utiliser @mentions pour notifications
- ✅ Historique des versions pour traçabilité

---

## 📞 Support

**Documentation Google Sheets** : https://support.google.com/docs/
**Formules** : https://support.google.com/docs/table/25273
**API** : https://developers.google.com/sheets/api

---

**Version** : 1.0  
**Date** : Octobre 2025  
**Compatible avec** : Workflow n8n EazyLink v1.0
