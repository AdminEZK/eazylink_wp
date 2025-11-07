# 🚀 Guide d'Installation n8n - EazyLink Articles SEO

## 📋 Vue d'Ensemble

Ce guide vous accompagne pas à pas pour installer et configurer le workflow n8n d'automatisation de publication d'articles SEO pour EazyLink.fr.

---

## ✅ Prérequis

### Comptes et Services Requis
- [ ] **n8n** : Compte cloud ou installation self-hosted
- [ ] **OpenAI** : Compte avec API Key (GPT-4 + DALL-E 3)
- [ ] **Google Workspace** : Pour Google Sheets
- [ ] **WordPress** : Site EazyLink.fr avec accès admin
- [ ] **LinkedIn** : Page entreprise EazyLink
- [ ] **SMTP** : Pour notifications email

### Plugins WordPress Requis
- [ ] **Yoast SEO** (Premium recommandé)
- [ ] **WordPress REST API** (activé par défaut)
- [ ] **Custom Fields** (pour Schema.org)

---

## 📊 Étape 1 : Créer les Google Sheets

### Sheet 1 : "Calendrier Éditorial"

**Colonnes (A à J)** :
| Colonne | Nom | Type | Exemple |
|---------|-----|------|---------|
| A | Statut | Liste | À générer, En cours, Publié |
| B | Date Pub | Date | 2025-10-25 |
| C | Sujet | Texte | Optimisation Continue en Entreprise |
| D | Mot-clé principal | Texte | optimisation continue IA |
| E | Mots-clés secondaires | Texte | kaizen, lean six sigma, IA prédictive |
| F | Type | Liste | Article blog, Post LinkedIn, Carrousel |
| G | Secteur | Liste | Finance, Marketing, RH, Production |
| H | Priorité | Liste | Haute, Moyenne, Faible |
| I | URL WP | URL | (rempli automatiquement) |
| J | URL LinkedIn | URL | (rempli automatiquement) |

**Exemple de ligne** :
```
À générer | 2025-10-28 | Transformation Digitale par l'IA | transformation digitale IA | automatisation, ROI, stratégie | Article blog | Marketing | Haute | | 
```

### Sheet 2 : "Performance"

**Colonnes (A à K)** :
| Colonne | Nom | Exemple |
|---------|-----|---------|
| A | Article | Titre de l'article |
| B | Date Pub | 2025-10-25 |
| C | Mot-clé | optimisation continue IA |
| D | Impressions 7j | (à remplir manuellement ou via API) |
| E | Clics 7j | (à remplir manuellement ou via API) |
| F | Position | (à remplir manuellement ou via API) |
| G | CTR | (calculé) |
| H | LinkedIn Impr. | (à remplir manuellement) |
| I | LinkedIn Eng. | (à remplir manuellement) |
| J | Leads | (à remplir manuellement) |
| K | URL | https://eazylink.fr/blog/... |

---

## 🔑 Étape 2 : Obtenir les API Keys

### OpenAI
1. Aller sur https://platform.openai.com/api-keys
2. Créer une nouvelle clé API
3. **Copier et sauvegarder** (elle ne sera plus visible)
4. Ajouter des crédits (minimum 20€ recommandé)

### Google Sheets
1. Aller sur https://console.cloud.google.com/
2. Créer un nouveau projet "EazyLink n8n"
3. Activer l'API Google Sheets
4. Créer des identifiants OAuth 2.0
5. Télécharger le fichier JSON

### WordPress
1. Installer le plugin **Application Passwords**
2. Aller dans Profil > Application Passwords
3. Créer un nouveau mot de passe pour "n8n"
4. **Copier** le mot de passe généré

### LinkedIn
1. Créer une app sur https://www.linkedin.com/developers/
2. Demander l'accès à l'API Marketing
3. Obtenir Client ID et Client Secret
4. Configurer OAuth redirect URL

---

## 📥 Étape 3 : Importer le Workflow n8n

### Installation
1. **Ouvrir n8n** (cloud ou self-hosted)
2. Cliquer sur **"+"** → **"Import from File"**
3. Sélectionner `n8n-workflow-eazylink-articles.json`
4. Le workflow s'ouvre avec tous les nodes

### Configuration des Credentials

#### 1. OpenAI
- Node : "Générer Article avec OpenAI" + "Générer Image DALL-E"
- Type : OpenAI API
- API Key : `sk-...` (votre clé)

#### 2. Google Sheets
- Nodes : "Lire Calendrier", "Mettre à Jour Calendrier", "Tracker Performance"
- Type : Google Sheets OAuth2
- Suivre le flow OAuth pour autoriser

#### 3. WordPress
- Node : "Publier sur WordPress"
- Type : WordPress OAuth2 ou Basic Auth
- URL : `https://eazylink.fr`
- Username : votre email admin
- Password : Application Password créé

#### 4. LinkedIn
- Node : "Publier sur LinkedIn"
- Type : LinkedIn OAuth2
- Client ID et Secret de votre app

#### 5. SMTP (Email)
- Nodes : "Envoyer Notification", "Notification Erreur"
- Type : SMTP
- Host : `smtp.gmail.com` (ou votre serveur)
- Port : 587
- Username/Password : vos identifiants

---

## ⚙️ Étape 4 : Configuration des Nodes

### Node "Lire Calendrier Éditorial"
```json
{
  "sheetId": "VOTRE_SHEET_ID",  // ID de votre Google Sheet
  "range": "Calendrier!A:J"
}
```

**Comment trouver le Sheet ID ?**
URL : `https://docs.google.com/spreadsheets/d/[SHEET_ID]/edit`

### Node "Générer Article avec OpenAI"
- **Model** : `gpt-4-turbo-preview` (ou `gpt-4`)
- **Temperature** : `0.7` (créativité modérée)
- **Max Tokens** : `4000`
- **Response Format** : `json_object`

### Node "Publier sur WordPress"
- **URL** : `https://eazylink.fr`
- **Status** : `publish` (ou `draft` pour test)
- **Categories** : Mapper avec `{{$json.category}}`
- **Tags** : Mapper avec `{{$json.tags.join(',')}}`

### Node "Publier sur LinkedIn"
- **Text** : Template du post (déjà configuré)
- **Visibility** : `PUBLIC`

---

## 🧪 Étape 5 : Tests

### Test 1 : Validation Manuelle
1. Désactiver le trigger automatique
2. Ajouter une ligne test dans Google Sheets :
```
À générer | 2025-10-25 | Test Article IA | test IA | automatisation | Article blog | Tech | Haute | | 
```
3. Cliquer sur **"Execute Workflow"** manuellement
4. Vérifier chaque étape

### Test 2 : Validation des Sources
1. Le node "Valider Sources et Qualité" doit :
   - ✅ Accepter si 3+ sources
   - ❌ Rejeter si FAQ détectée
   - ❌ Rejeter si stats sans sources

### Test 3 : Publication WordPress
1. Vérifier que l'article apparaît sur WordPress
2. Vérifier les champs Yoast SEO
3. Vérifier le Schema.org (View Source)

### Test 4 : Publication LinkedIn
1. Vérifier que le post apparaît sur la page LinkedIn
2. Vérifier le lien vers l'article

---

## 🔄 Étape 6 : Activation du Workflow

### Planification
Le workflow est configuré pour s'exécuter :
- **Jours** : Lundi, Mercredi, Vendredi
- **Heure** : 8h00 (heure serveur)
- **Cron** : `0 8 * * 1,3,5`

### Activation
1. Cliquer sur le toggle **"Active"** en haut à droite
2. Le workflow est maintenant actif
3. Il s'exécutera automatiquement selon le planning

---

## 📊 Étape 7 : Monitoring

### Dashboard n8n
- **Executions** : Voir l'historique des exécutions
- **Logs** : Consulter les erreurs éventuelles
- **Metrics** : Suivre les performances

### Google Sheets "Performance"
- Suivi automatique des articles publiés
- Métriques SEO de base
- À compléter manuellement avec données Search Console

### Notifications Email
- ✅ Email de confirmation à chaque publication
- ❌ Email d'erreur si validation échoue

---

## 🛠️ Personnalisations Avancées

### Modifier le Prompt OpenAI
Node "Générer Article avec OpenAI" → Modifier le message user

**Exemple** : Ajouter un style spécifique
```
STYLE : Analytique, data-driven, avec storytelling
TONE : Professionnel mais accessible, inspirant
```

### Ajouter des Liens Internes
Node "Optimiser SEO" → Modifier `internalLinkingRules`

```javascript
const internalLinkingRules = {
  "IA générative": "/solutions-ia/",
  "diagnostic IA": "/solutions-ia/diagnostic/",
  "votre nouveau lien": "/votre-page/",
  // ...
};
```

### Modifier le Template LinkedIn
Node "Publier sur LinkedIn" → Modifier le texte

```
🚀 [Emoji personnalisé]

[Votre template]

#VosHashtags
```

---

## 🚨 Dépannage

### Erreur : "Validation failed - FAQ detected"
**Cause** : L'article généré contient une FAQ
**Solution** : Relancer la génération ou modifier le prompt pour insister "PAS de FAQ"

### Erreur : "Less than 3 sources"
**Cause** : L'IA n'a pas fourni assez de sources
**Solution** : Modifier le prompt pour exiger "Minimum 5 sources fiables"

### Erreur : "Stats without source"
**Cause** : Statistiques sans attribution
**Solution** : Vérifier le contenu généré, ajouter manuellement les sources

### Erreur : WordPress Authentication
**Cause** : Credentials WordPress invalides
**Solution** : Régénérer l'Application Password, mettre à jour dans n8n

### Erreur : OpenAI Rate Limit
**Cause** : Trop de requêtes ou crédits insuffisants
**Solution** : Ajouter des crédits, espacer les exécutions

---

## 📈 Optimisations

### Réduire les Coûts OpenAI
1. Utiliser `gpt-3.5-turbo` pour les brouillons
2. Réduire `max_tokens` si articles trop longs
3. Générer images avec Unsplash au lieu de DALL-E

### Améliorer la Qualité
1. Ajouter des exemples dans le prompt
2. Utiliser `temperature: 0.5` pour plus de cohérence
3. Ajouter une étape de relecture humaine (status: draft)

### Scaling
1. Augmenter la fréquence (quotidien)
2. Ajouter plusieurs workflows par secteur
3. Intégrer d'autres canaux (Twitter, Newsletter)

---

## 📋 Checklist Finale

### Configuration
- [ ] Google Sheets créés et configurés
- [ ] Toutes les API Keys obtenues
- [ ] Workflow importé dans n8n
- [ ] Credentials configurés
- [ ] Sheet IDs mis à jour dans les nodes

### Tests
- [ ] Test manuel réussi
- [ ] Validation des sources fonctionne
- [ ] Article publié sur WordPress
- [ ] Post publié sur LinkedIn
- [ ] Emails de notification reçus

### Production
- [ ] Workflow activé
- [ ] Planning configuré (Lun/Mer/Ven 8h)
- [ ] Monitoring en place
- [ ] Équipe formée

---

## 🎯 Prochaines Étapes

1. **Semaine 1** : Tester avec 3 articles manuels
2. **Semaine 2** : Activer l'automatisation
3. **Semaine 3** : Analyser les premières performances
4. **Semaine 4** : Optimiser les prompts selon résultats

---

## 📞 Support

**Documentation n8n** : https://docs.n8n.io/
**Community** : https://community.n8n.io/
**PRD SEO EazyLink** : `/SEO-PRD-EazyLink-COMPLET-2025.md`
**Sources Fiables** : `/SOURCES-FIABLES-IA-TRANSFORMATION.md`

---

**Version** : 1.0  
**Date** : Octobre 2025  
**Auteur** : EazyLink Strategy Team
