# 🚀 Guide Complet : Adaptation de Votre Workflow n8n pour EazyLink

## 📋 Vue d'Ensemble

Ce guide vous accompagne pas à pas pour transformer votre workflow n8n actuel en un système complet de publication automatique conforme au PRD EazyLink.

**Durée estimée** : 2-3 heures  
**Niveau** : Intermédiaire  
**Prérequis** : Workflow n8n existant avec Claude

---

## 🎯 Objectif Final

Transformer votre workflow actuel :
```
Webhook → Claude → HTML → GitHub → Email
```

En workflow EazyLink complet :
```
Schedule → Google Sheets → Claude → HTML → Validation → SEO → WordPress → LinkedIn → Tracking → Email
```

---

## 📂 Fichiers Créés

Tous les fichiers de configuration sont dans `/Users/francois/Local Sites/website/` :

1. ✅ **n8n-node-validation-sources.js** - Code de validation
2. ✅ **n8n-node-optimisation-seo.js** - Code d'optimisation SEO
3. ✅ **n8n-node-wordpress-config.md** - Configuration WordPress
4. ✅ **n8n-node-linkedin-config.md** - Configuration LinkedIn
5. ✅ **n8n-node-google-sheets-config.md** - Configuration Google Sheets
6. ✅ **GUIDE-ADAPTATION-WORKFLOW-EAZYLINK.md** - Ce guide

---

## 🗺️ Plan d'Action en 7 Étapes

### ✅ Étape 1 : Préparation (30 min)
### ✅ Étape 2 : Google Sheets (30 min)
### ✅ Étape 3 : Validation & SEO (30 min)
### ✅ Étape 4 : WordPress (20 min)
### ✅ Étape 5 : LinkedIn (30 min)
### ✅ Étape 6 : Tests (30 min)
### ✅ Étape 7 : Activation (10 min)

---

## 📝 Étape 1 : Préparation (30 min)

### 1.1 Checklist des Prérequis

- [ ] Accès à votre workflow n8n actuel
- [ ] Compte Google (pour Sheets)
- [ ] Accès admin WordPress EazyLink.fr
- [ ] Page LinkedIn EazyLink
- [ ] Tous les fichiers de configuration téléchargés

### 1.2 Créer les API Keys

#### OpenAI / Claude
- ✅ Vous avez déjà Claude configuré
- Rien à faire ici

#### WordPress
1. Aller sur https://eazylink.fr/wp-admin
2. Utilisateurs > Profil
3. Descendre à "Application Passwords"
4. Nom : `n8n Automation`
5. Cliquer sur "Add New"
6. **Copier** le mot de passe : `xxxx xxxx xxxx xxxx`

#### LinkedIn
1. Aller sur https://www.linkedin.com/developers/
2. Create app : `EazyLink Content Automation`
3. Sélectionner votre page EazyLink
4. Produits : Activer "Share on LinkedIn"
5. Auth > Noter Client ID et Secret

#### Google Sheets
1. https://console.cloud.google.com/
2. Nouveau projet : `EazyLink n8n`
3. Activer API Google Sheets
4. Créer OAuth2 credentials
5. Noter Client ID et Secret

### 1.3 Sauvegarder Votre Workflow Actuel

Dans n8n :
1. Ouvrir votre workflow
2. Menu (⋮) > Download
3. Sauvegarder : `workflow-eazylink-backup-[DATE].json`

---

## 📊 Étape 2 : Google Sheets (30 min)

### 2.1 Créer le Google Sheet

1. https://sheets.google.com
2. Nouveau document
3. Nom : `EazyLink - Calendrier Éditorial & Tracking`

### 2.2 Configurer Sheet 1 : "Calendrier Éditorial"

**Copier-coller les en-têtes (ligne 1)** :
```
ID | Statut | Date Pub | Sujet | Mot-clé principal | Mots-clés secondaires | Type | Secteur | Priorité | URL WP | URL LinkedIn
```

**Ajouter les listes déroulantes** :
- Colonne B (Statut) : `À générer, En cours, Validé, Publié, Rejeté`
- Colonne G (Type) : `Article blog, Post LinkedIn, Carrousel, Guide pratique, Étude de cas`
- Colonne H (Secteur) : `Finance, Marketing, RH, Production, Retail, Santé, Général`
- Colonne I (Priorité) : `Haute, Moyenne, Faible`

**Formule colonne A (ID)** :
```
=ROW()-1
```

### 2.3 Configurer Sheet 2 : "Performance"

**Copier-coller les en-têtes (ligne 1)** :
```
Article | Date Pub | Mot-clé | URL WP | Impressions 7j | Clics 7j | Position | CTR | LinkedIn Impr. | LinkedIn Eng. | Leads | Score SEO | Score Qualité
```

**Formule colonne H (CTR)** :
```
=IF(E2>0, F2/E2*100, 0)
```

### 2.4 Ajouter 3 Sujets de Test

Dans "Calendrier Éditorial", ajouter :

| ID | Statut | Date Pub | Sujet | Mot-clé principal | Mots-clés secondaires | Type | Secteur | Priorité |
|----|--------|----------|-------|-------------------|----------------------|------|---------|----------|
| 1 | À générer | 2025-10-28 | Test : Transformation Digitale IA | transformation digitale IA | automatisation, ROI | Article blog | Général | Haute |

### 2.5 Récupérer le Sheet ID

Dans l'URL :
```
https://docs.google.com/spreadsheets/d/[COPIER_CE_ID]/edit
```

**Exemple** : `1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms`

### 2.6 Configurer n8n

1. Dans n8n, ajouter node **"Google Sheets"**
2. Créer credential **"Google Sheets OAuth2"**
3. Client ID et Secret (de Google Cloud)
4. Autoriser l'accès

---

## 🔍 Étape 3 : Validation & SEO (30 min)

### 3.1 Ajouter Node "Validation Sources & Qualité"

1. **Après** votre node "Formatage HTML"
2. Ajouter node **"Function"**
3. Nom : `Validation Sources & Qualité`
4. Copier le code de `n8n-node-validation-sources.js`
5. Coller dans le node Function

**Ce node va** :
- ✅ Vérifier présence de 3+ sources
- ✅ Bloquer si FAQ détectée
- ✅ Vérifier statistiques avec sources
- ✅ Calculer score de qualité

### 3.2 Ajouter Node "Optimisation SEO"

1. **Après** "Validation Sources & Qualité"
2. Ajouter node **"Function"**
3. Nom : `Optimisation SEO`
4. Copier le code de `n8n-node-optimisation-seo.js`
5. Coller dans le node Function

**Ce node va** :
- ✅ Ajouter liens internes automatiquement
- ✅ Générer Schema.org
- ✅ Calculer score SEO
- ✅ Créer le slug URL

### 3.3 Tester les Nodes

1. Désactiver le workflow
2. Exécuter manuellement jusqu'à "Optimisation SEO"
3. Vérifier les outputs :
   - `validation.passed` = true
   - `seo.score` > 70
   - `optimizedContent` contient des liens internes

---

## 🌐 Étape 4 : WordPress (20 min)

### 4.1 Supprimer les Nodes GitHub

Dans votre workflow :
1. ❌ Supprimer "Push vers GitHub"
2. ❌ Supprimer "Vérification GitHub Pages"
3. ❌ Supprimer les connexions

### 4.2 Ajouter Node WordPress

1. **Après** "Optimisation SEO"
2. Ajouter node **"WordPress"**
3. Opération : **Post > Create**
4. Nom : `Publier sur WordPress`

### 4.3 Configurer la Connexion

1. Créer credential **"WordPress API"**
2. URL : `https://eazylink.fr`
3. Username : `votre-email@example.com`
4. Password : `xxxx xxxx xxxx xxxx` (Application Password)

### 4.4 Configurer les Champs

```javascript
Title: {{ $json.title }}
Content: {{ $json.optimizedContent }}
Status: publish
Author: 1
Excerpt: {{ $json.excerpt }}
Categories: 1
Comment Status: open
```

### 4.5 Tester

1. Exécuter le workflow jusqu'à WordPress
2. Vérifier que l'article apparaît sur WordPress
3. Vérifier l'URL retournée

**Voir détails** : `n8n-node-wordpress-config.md`

---

## 💼 Étape 5 : LinkedIn (30 min)

### 5.1 Récupérer Organization URN

1. Ajouter node temporaire **"HTTP Request"**
2. Method : GET
3. URL : `https://api.linkedin.com/v2/organizationAcls?q=roleAssignee`
4. Auth : OAuth2 LinkedIn
5. Exécuter et noter l'ID : `12345678`
6. **Organization URN** : `urn:li:organization:12345678`

### 5.2 Ajouter Node "Générer Post LinkedIn"

1. **Après** "Publier sur WordPress"
2. Ajouter node **"Function"**
3. Nom : `Générer Post LinkedIn`

```javascript
const title = $input.item.json.title;
const excerpt = $input.item.json.excerpt;
const url = $input.item.json.link; // URL WordPress

const postText = `🚀 ${title}

${excerpt.substring(0, 200)}...

📖 Lire l'article complet : ${url}

#IAGenerative #TransformationDigitale #Innovation`;

return {
  json: {
    ...$input.item.json,
    linkedin_post_text: postText
  }
};
```

### 5.3 Ajouter Node "Publier sur LinkedIn"

1. **Après** "Générer Post LinkedIn"
2. Ajouter node **"HTTP Request"**
3. Nom : `Publier sur LinkedIn`
4. Method : POST
5. URL : `https://api.linkedin.com/v2/ugcPosts`
6. Auth : OAuth2 LinkedIn
7. Headers :
```json
{
  "Content-Type": "application/json",
  "X-Restli-Protocol-Version": "2.0.0"
}
```
8. Body :
```json
{
  "author": "urn:li:organization:12345678",
  "lifecycleState": "PUBLISHED",
  "specificContent": {
    "com.linkedin.ugc.ShareContent": {
      "shareCommentary": {
        "text": "={{ $json.linkedin_post_text }}"
      },
      "shareMediaCategory": "ARTICLE",
      "media": [{
        "status": "READY",
        "originalUrl": "={{ $json.link }}",
        "title": {
          "text": "={{ $json.title }}"
        }
      }]
    }
  },
  "visibility": {
    "com.linkedin.ugc.MemberNetworkVisibility": "PUBLIC"
  }
}
```

**Voir détails** : `n8n-node-linkedin-config.md`

---

## 🔗 Étape 6 : Connecter Google Sheets (20 min)

### 6.1 Ajouter Node "Lire Calendrier" (Début)

1. **Au début** du workflow (remplacer Webhook)
2. Ajouter node **"Google Sheets"**
3. Opération : **Read > Get Many**
4. Nom : `Lire Calendrier Éditorial`
5. Configuration :
   - Document ID : `[VOTRE_SHEET_ID]`
   - Sheet Name : `Calendrier Éditorial`
   - Range : `A:K`

### 6.2 Ajouter Node "Filter"

1. **Après** "Lire Calendrier"
2. Ajouter node **"Filter"**
3. Condition : `{{ $json.Statut === "À générer" }}`

### 6.3 Ajouter Node "Mettre à Jour - Publié"

1. **Après** "Publier sur LinkedIn"
2. Ajouter node **"Google Sheets"**
3. Opération : **Update > Update Row**
4. Nom : `Mettre à Jour Calendrier`
5. Configuration :
   - Document ID : `[VOTRE_SHEET_ID]`
   - Sheet Name : `Calendrier Éditorial`
   - Row Number : `{{ $json.ID + 1 }}`
   - Columns :
```json
{
  "B": "Publié",
  "J": "={{ $json.link }}",
  "K": "={{ $json.id }}"
}
```

### 6.4 Ajouter Node "Tracking Performance"

1. **Après** "Mettre à Jour Calendrier"
2. Ajouter node **"Google Sheets"**
3. Opération : **Append > Append Row**
4. Nom : `Ajouter à Performance`
5. Configuration :
   - Document ID : `[VOTRE_SHEET_ID]`
   - Sheet Name : `Performance`
   - Columns :
```json
{
  "A": "={{ $json.title }}",
  "B": "={{ new Date().toISOString().split('T')[0] }}",
  "C": "={{ $json.keyword }}",
  "D": "={{ $json.link }}",
  "L": "={{ $json.seo.score }}",
  "M": "={{ $json.qualityScore }}"
}
```

**Voir détails** : `n8n-node-google-sheets-config.md`

---

## 🧪 Étape 7 : Tests (30 min)

### 7.1 Test Complet Manuel

1. **Désactiver** le Schedule Trigger
2. Dans Google Sheets, vérifier qu'il y a une ligne "À générer"
3. Dans n8n, cliquer sur **"Execute Workflow"**
4. Observer chaque étape :
   - ✅ Lecture Google Sheets
   - ✅ Génération Claude
   - ✅ Validation (doit passer)
   - ✅ Optimisation SEO
   - ✅ Publication WordPress
   - ✅ Publication LinkedIn
   - ✅ Mise à jour Google Sheets

### 7.2 Vérifications

#### WordPress
1. Aller sur https://eazylink.fr/wp-admin
2. Articles > Tous les articles
3. Vérifier que l'article est publié
4. Ouvrir l'article et vérifier :
   - ✅ Contenu formaté correctement
   - ✅ Liens internes présents
   - ✅ Sources en fin d'article
   - ✅ Pas de FAQ

#### LinkedIn
1. Aller sur votre page LinkedIn EazyLink
2. Vérifier que le post est publié
3. Vérifier le lien vers l'article

#### Google Sheets
1. Ouvrir "Calendrier Éditorial"
2. Vérifier que le statut est "Publié"
3. Vérifier que les URLs sont remplies
4. Ouvrir "Performance"
5. Vérifier qu'une nouvelle ligne est ajoutée

### 7.3 Test de Validation (Erreur)

Pour tester que la validation fonctionne :

1. Modifier le prompt Claude pour ajouter une FAQ
2. Exécuter le workflow
3. **Résultat attendu** : Erreur "FAQ détectée"
4. Vérifier que le statut reste "À générer"
5. Vérifier que l'email d'erreur est envoyé

### 7.4 Corriger les Erreurs

Si des erreurs surviennent, consulter :
- `n8n-node-wordpress-config.md` (section Dépannage)
- `n8n-node-linkedin-config.md` (section Dépannage)
- `n8n-node-google-sheets-config.md` (section Dépannage)

---

## ⚙️ Étape 8 : Configuration du Schedule (10 min)

### 8.1 Remplacer Webhook par Schedule

1. **Supprimer** le node "Webhook Trigger"
2. Ajouter node **"Schedule Trigger"**
3. Nom : `Déclenchement Automatique`

### 8.2 Configuration du Schedule

**Mode** : Custom (Cron)

**Cron Expression** :
```
0 8 * * 1,3,5
```

**Signification** :
- `0` : À la minute 0
- `8` : À 8h du matin
- `*` : Tous les jours du mois
- `*` : Tous les mois
- `1,3,5` : Lundi, Mercredi, Vendredi

**Timezone** : Europe/Paris

### 8.3 Activer le Workflow

1. En haut à droite, toggle **"Active"** sur ON
2. Le workflow s'exécutera automatiquement :
   - Lundi 8h
   - Mercredi 8h
   - Vendredi 8h

---

## 📊 Schéma du Workflow Final

```
┌─────────────────────────────────────────────────────────────┐
│ DÉCLENCHEMENT                                                │
└─────────────────────────────────────────────────────────────┘
    [Schedule Trigger] (Lun/Mer/Ven 8h)
            ↓
┌─────────────────────────────────────────────────────────────┐
│ LECTURE & FILTRAGE                                           │
└─────────────────────────────────────────────────────────────┘
    [Lire Calendrier Éditorial] ← Google Sheets
            ↓
    [Filter: Statut = "À générer"]
            ↓
    [Mettre à Jour: "En cours"] ← Google Sheets
            ↓
┌─────────────────────────────────────────────────────────────┐
│ GÉNÉRATION DE CONTENU                                        │
└─────────────────────────────────────────────────────────────┘
    [Génération Claude] ← VOTRE NODE EXISTANT ✅
            ↓
    [Formatage HTML] ← VOTRE NODE EXISTANT ✅
            ↓
┌─────────────────────────────────────────────────────────────┐
│ VALIDATION & OPTIMISATION                                    │
└─────────────────────────────────────────────────────────────┘
    [Validation Sources & Qualité] ← NOUVEAU ✨
            ├─ Si OK ↓
            │  [Optimisation SEO] ← NOUVEAU ✨
            │          ↓
┌───────────┼──────────────────────────────────────────────────┐
│ PUBLICATION│                                                  │
└───────────┼──────────────────────────────────────────────────┘
            │  [Publier sur WordPress] ← NOUVEAU ✨
            │          ↓
            │  [Générer Post LinkedIn] ← NOUVEAU ✨
            │          ↓
            │  [Publier sur LinkedIn] ← NOUVEAU ✨
            │          ↓
┌───────────┼──────────────────────────────────────────────────┐
│ TRACKING  │                                                   │
└───────────┼──────────────────────────────────────────────────┘
            │  [Mettre à Jour: "Publié"] ← Google Sheets
            │          ↓
            │  [Ajouter à Performance] ← Google Sheets
            │          ↓
            │  [Notification Email Succès] ← VOTRE NODE ✅
            │
┌───────────┼──────────────────────────────────────────────────┐
│ GESTION   │                                                   │
│ D'ERREUR  │                                                   │
└───────────┼──────────────────────────────────────────────────┘
            └─ Si Erreur ↓
               [Mettre à Jour: "Rejeté"] ← Google Sheets
                       ↓
               [Email d'erreur] ← VOTRE NODE ✅
```

---

## 📋 Checklist Finale

### Configuration
- [ ] Google Sheet créé et configuré
- [ ] 3 sujets de test ajoutés
- [ ] Toutes les API Keys obtenues
- [ ] Credentials configurés dans n8n
- [ ] Node Validation ajouté
- [ ] Node Optimisation SEO ajouté
- [ ] Nodes GitHub supprimés
- [ ] Node WordPress ajouté et configuré
- [ ] Nodes LinkedIn ajoutés et configurés
- [ ] Nodes Google Sheets ajoutés
- [ ] Schedule Trigger configuré

### Tests
- [ ] Test manuel complet réussi
- [ ] Article publié sur WordPress
- [ ] Post publié sur LinkedIn
- [ ] Google Sheets mis à jour
- [ ] Email de notification reçu
- [ ] Test de validation d'erreur réussi

### Production
- [ ] Workflow activé
- [ ] 12 sujets ajoutés au calendrier
- [ ] Équipe informée
- [ ] Monitoring en place

---

## 🎯 Prochaines Étapes

### Semaine 1 : Rodage
- Surveiller les 3 premières exécutions
- Ajuster les prompts si nécessaire
- Corriger les bugs éventuels

### Semaine 2 : Optimisation
- Analyser les scores SEO
- Améliorer les templates LinkedIn
- Ajuster la fréquence si besoin

### Semaine 3 : Scaling
- Ajouter plus de sujets au calendrier
- Augmenter la fréquence (quotidien ?)
- Ajouter d'autres canaux (Twitter, Newsletter)

---

## 🆘 Support

### Documentation
- **PRD SEO** : `/SEO-PRD-EazyLink-COMPLET-2025.md`
- **Règles de contenu** : `/REGLES-CONTENU-EAZYLINK.md`
- **Sources fiables** : `/SOURCES-FIABLES-IA-TRANSFORMATION.md`

### Dépannage
- **WordPress** : `n8n-node-wordpress-config.md`
- **LinkedIn** : `n8n-node-linkedin-config.md`
- **Google Sheets** : `n8n-node-google-sheets-config.md`

### Communauté
- **n8n Community** : https://community.n8n.io/
- **n8n Docs** : https://docs.n8n.io/

---

## 🎉 Félicitations !

Vous avez maintenant un workflow n8n complet qui :
- ✅ Génère du contenu de qualité avec Claude
- ✅ Valide automatiquement les règles EazyLink
- ✅ Optimise le SEO automatiquement
- ✅ Publie sur WordPress et LinkedIn
- ✅ Track les performances dans Google Sheets
- ✅ Notifie en cas de succès ou d'erreur

**Votre système de publication automatique est opérationnel ! 🚀**

---

**Version** : 1.0  
**Date** : Octobre 2025  
**Auteur** : EazyLink Strategy Team
