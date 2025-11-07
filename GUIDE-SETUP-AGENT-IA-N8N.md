# 🚀 Guide Complet : Setup Agent IA n8n pour EazyLink

## 📋 Vue d'Ensemble

Ce guide vous accompagne pas à pas pour configurer l'Agent IA autonome qui automatise la publication d'articles SEO sur WordPress et LinkedIn.

**Durée estimée** : 2-3 heures  
**Niveau** : Intermédiaire  
**Prérequis** : Compte n8n, accès WordPress, APIs configurées

---

## ✅ Checklist Prérequis

### Comptes et Accès
- [ ] **n8n** : Compte cloud (https://app.n8n.io) ou self-hosted
- [ ] **Anthropic** : Compte avec API Key Claude (https://console.anthropic.com)
- [ ] **Google Workspace** : Pour Google Sheets API
- [ ] **WordPress** : Site EazyLink.fr avec accès admin
- [ ] **LinkedIn** : Page entreprise + Developer App
- [ ] **SMTP** : Gmail ou autre pour notifications

### Fichiers Requis
- [ ] `n8n-workflow-agent-ia-eazylink.json` (workflow principal)
- [ ] `n8n-tools-implementation.md` (7 workflows de tools)
- [ ] `n8n-agent-ia-architecture.md` (documentation)

---

## 🔑 Étape 1 : Obtenir les API Keys

### 1.1 Anthropic Claude API

1. Aller sur https://console.anthropic.com
2. Créer un compte ou se connecter
3. Aller dans **API Keys**
4. Cliquer sur **Create Key**
5. Nom : `n8n-eazylink`
6. **Copier la clé** : `sk-ant-api03-...`
7. Ajouter des crédits : Minimum 10€ (suffisant pour 200+ articles)

**Coût estimé** : ~0.04€ par article avec Claude 3.5 Sonnet

---

### 1.2 Google Sheets API

1. Aller sur https://console.cloud.google.com
2. Créer un nouveau projet : **"EazyLink n8n Agent"**
3. Activer l'API Google Sheets :
   - Menu > APIs & Services > Library
   - Chercher "Google Sheets API"
   - Cliquer sur **Enable**

4. Créer des credentials OAuth2 :
   - APIs & Services > Credentials
   - Create Credentials > **OAuth client ID**
   - Application type : **Web application**
   - Name : **n8n EazyLink Agent**
   - Authorized redirect URIs :
     * `https://app.n8n.io/rest/oauth2-credential/callback` (si n8n cloud)
     * Ou votre URL n8n self-hosted + `/rest/oauth2-credential/callback`
   
5. **Copier** :
   - Client ID : `123456789-abc.apps.googleusercontent.com`
   - Client Secret : `GOCSPX-...`

6. Récupérer le **Sheet ID** :
   - Ouvrir votre Google Sheet
   - URL : `https://docs.google.com/spreadsheets/d/[SHEET_ID]/edit`
   - Copier le SHEET_ID

---

### 1.3 WordPress API

WordPress a une API REST native, il suffit de créer un mot de passe d'application.

1. Se connecter à WordPress admin : `https://eazylink.fr/wp-admin`
2. Aller dans **Utilisateurs > Profil**
3. Descendre à **Mots de passe d'application**
4. Nom : `n8n Agent IA`
5. Cliquer sur **Ajouter**
6. **Copier** le mot de passe généré : `xxxx xxxx xxxx xxxx xxxx xxxx`

**Note** : Ce mot de passe ne sera plus visible, sauvegardez-le.

---

### 1.4 LinkedIn API

1. Créer une app sur https://www.linkedin.com/developers/apps
2. Cliquer sur **Create app**
3. Remplir :
   - App name : `EazyLink Content Publisher`
   - LinkedIn Page : Sélectionner votre page EazyLink
   - Privacy policy URL : `https://eazylink.fr/privacy`
   - App logo : Logo EazyLink

4. Dans l'onglet **Auth** :
   - Copier **Client ID** : `123456789`
   - Copier **Client Secret** : `AbCdEfGhIjKl`
   - Authorized redirect URLs :
     * `https://app.n8n.io/rest/oauth2-credential/callback`

5. Dans l'onglet **Products** :
   - Demander l'accès à **Share on LinkedIn**
   - Demander l'accès à **Marketing Developer Platform** (pour analytics)

6. Récupérer l'**Organization ID** :
   - Aller sur votre page LinkedIn
   - URL : `https://www.linkedin.com/company/[ORG_ID]/`
   - Copier l'ORG_ID

**Note** : L'accès aux APIs LinkedIn peut prendre 24-48h pour validation.

---

### 1.5 SMTP (Gmail)

1. Activer l'authentification 2 facteurs sur votre compte Gmail
2. Aller sur https://myaccount.google.com/apppasswords
3. Créer un mot de passe d'application :
   - App : **Mail**
   - Device : **n8n**
4. **Copier** le mot de passe : `abcd efgh ijkl mnop`

**Configuration SMTP** :
- Host : `smtp.gmail.com`
- Port : `587`
- Username : `votre-email@gmail.com`
- Password : Le mot de passe d'application

---

## 📊 Étape 2 : Créer le Google Sheet

### 2.1 Créer le Spreadsheet

1. Aller sur https://sheets.google.com
2. Créer un nouveau document
3. Nom : **"EazyLink - Calendrier Éditorial Agent IA"**

### 2.2 Sheet 1 : "Calendrier Éditorial"

**Ligne 1 (Headers)** :
```
A: ID | B: Statut | C: Date Pub | D: Sujet | E: Mot-clé principal | F: Mots-clés secondaires | G: Type | H: Secteur | I: Priorité | J: URL WP | K: URL LinkedIn
```

**Formule colonne A (ID)** :
```
=ROW()-1
```

**Listes déroulantes** :

- **Colonne B (Statut)** : `À générer, En cours, Validé, Publié, Rejeté`
- **Colonne G (Type)** : `Article blog, Post LinkedIn, Guide pratique, Étude de cas`
- **Colonne H (Secteur)** : `Finance, Marketing, RH, Production, Retail, Santé, Général`
- **Colonne I (Priorité)** : `Haute, Moyenne, Faible`

### 2.3 Ajouter des Articles de Test

**Ligne 2** :
```
1 | À générer | 2025-10-28 | Transformation Digitale par l'IA | transformation digitale IA | automatisation, ROI, stratégie | Article blog | Marketing | Haute | |
```

**Ligne 3** :
```
2 | À générer | 2025-10-30 | IA Générative en Finance | IA finance | fintech, analyse prédictive | Article blog | Finance | Haute | |
```

---

## 🔧 Étape 3 : Configurer n8n

### 3.1 Créer les Credentials

#### Anthropic Claude

1. Dans n8n, aller dans **Settings > Credentials**
2. Cliquer sur **Add Credential**
3. Chercher **Anthropic**
4. Remplir :
   - Credential name : `Anthropic Claude`
   - API Key : `sk-ant-api03-...` (votre clé)
5. **Save**

#### Google Sheets OAuth2

1. Add Credential > **Google Sheets OAuth2 API**
2. Remplir :
   - Credential name : `Google Sheets`
   - Client ID : `123456789-abc.apps.googleusercontent.com`
   - Client Secret : `GOCSPX-...`
3. Cliquer sur **Connect my account**
4. Autoriser l'accès dans la popup Google
5. **Save**

#### WordPress

1. Add Credential > **WordPress API**
2. Remplir :
   - Credential name : `WordPress EazyLink`
   - URL : `https://eazylink.fr`
   - Username : Votre email admin
   - Password : Le mot de passe d'application créé
3. **Save**

#### LinkedIn OAuth2

1. Add Credential > **LinkedIn OAuth2 API**
2. Remplir :
   - Credential name : `LinkedIn EazyLink`
   - Client ID : `123456789`
   - Client Secret : `AbCdEfGhIjKl`
3. Cliquer sur **Connect my account**
4. Autoriser l'accès dans la popup LinkedIn
5. **Save**

#### SMTP

1. Add Credential > **SMTP**
2. Remplir :
   - Credential name : `Gmail SMTP`
   - Host : `smtp.gmail.com`
   - Port : `587`
   - Secure : `TLS`
   - Username : `votre-email@gmail.com`
   - Password : Le mot de passe d'application Gmail
3. **Save**

---

## 📥 Étape 4 : Importer les Workflows

### 4.1 Créer les 7 Workflows de Tools

Pour chaque tool dans `n8n-tools-implementation.md` :

1. Dans n8n, cliquer sur **+ New Workflow**
2. Cliquer sur **⋮** (menu) > **Import from File**
3. Copier-coller le JSON du tool
4. Remplacer les variables :
   - `VOTRE_SHEET_ID` → Votre Sheet ID
   - Sélectionner les credentials créées
5. **Save** avec le nom exact du tool :
   - `Tool: Read Calendar`
   - `Tool: Update Status`
   - `Tool: Generate Article`
   - `Tool: Validate Quality`
   - `Tool: Publish WordPress`
   - `Tool: Publish LinkedIn`
   - `Tool: Send Notification`

6. **Tester chaque tool** :
   - Cliquer sur **Execute Workflow**
   - Vérifier que ça fonctionne
   - Corriger les erreurs éventuelles

### 4.2 Récupérer les IDs des Workflows

Pour chaque workflow de tool :

1. Ouvrir le workflow
2. Regarder l'URL : `https://app.n8n.io/workflow/[WORKFLOW_ID]`
3. Noter l'ID dans un fichier texte :

```
read_calendar_tool: 123
update_status_tool: 124
generate_article_tool: 125
validate_quality_tool: 126
publish_wordpress_tool: 127
publish_linkedin_tool: 128
send_notification_tool: 129
```

### 4.3 Importer le Workflow Principal

1. Créer un nouveau workflow
2. Importer `n8n-workflow-agent-ia-eazylink.json`
3. **Configurer chaque Tool node** :
   - Cliquer sur le node "Tool: Read Calendar"
   - Dans `workflowId`, remplacer par l'ID réel : `123`
   - Répéter pour les 7 tools

4. **Configurer l'Agent IA** :
   - Cliquer sur le node "Agent IA Publication"
   - Sélectionner la credential `Anthropic Claude`
   - Vérifier que le prompt système est correct

5. **Save** avec le nom : `EazyLink - Agent IA Publication`

---

## 🧪 Étape 5 : Tests

### 5.1 Test Individuel des Tools

#### Test 1 : Read Calendar

1. Ouvrir le workflow `Tool: Read Calendar`
2. Cliquer sur **Execute Workflow**
3. Vérifier le résultat :

```json
{
  "success": true,
  "count": 2,
  "articles": [
    {
      "id": 1,
      "sujet": "Transformation Digitale par l'IA",
      "keyword": "transformation digitale IA",
      ...
    }
  ]
}
```

#### Test 2 : Generate Article

1. Ouvrir le workflow `Tool: Generate Article`
2. Dans le trigger, ajouter des données de test :

```json
{
  "sujet": "Test IA",
  "keyword": "test intelligence artificielle",
  "secondary_keywords": "automatisation, innovation",
  "secteur": "Tech"
}
```

3. **Execute Workflow**
4. Vérifier que l'article est généré (1-2 minutes)

#### Test 3 : Validate Quality

1. Ouvrir le workflow `Tool: Validate Quality`
2. Utiliser l'article généré au test 2
3. **Execute Workflow**
4. Vérifier le score de qualité

#### Test 4 : Update Status

1. Ouvrir le workflow `Tool: Update Status`
2. Données de test :

```json
{
  "article_id": 1,
  "status": "En cours"
}
```

3. **Execute Workflow**
4. Vérifier dans Google Sheets que le statut a changé

#### Test 5-7 : WordPress, LinkedIn, Notification

Tester de la même manière avec des données appropriées.

---

### 5.2 Test Complet de l'Agent IA

1. **Préparer le Google Sheet** :
   - Mettre un article avec statut "À générer"
   - Priorité "Haute"

2. **Ouvrir le workflow principal** : `EazyLink - Agent IA Publication`

3. **Désactiver le trigger automatique** (pour test manuel) :
   - Cliquer sur le node "Déclencheur Programmé"
   - Toggle **Active** à OFF

4. **Exécuter manuellement** :
   - Cliquer sur **Execute Workflow**
   - Observer l'agent en action (5-10 minutes)

5. **Vérifier chaque étape** :
   - [ ] Agent lit le calendrier
   - [ ] Agent passe le statut à "En cours"
   - [ ] Agent génère l'article
   - [ ] Agent valide la qualité
   - [ ] Agent publie sur WordPress
   - [ ] Agent publie sur LinkedIn
   - [ ] Agent met à jour le statut "Publié"
   - [ ] Agent envoie la notification

6. **Vérifier les résultats** :
   - [ ] Article visible sur WordPress
   - [ ] Post visible sur LinkedIn
   - [ ] Google Sheet mis à jour avec URLs
   - [ ] Email de notification reçu

---

## 🚀 Étape 6 : Activation en Production

### 6.1 Activer le Workflow

1. Ouvrir le workflow principal
2. Cliquer sur le node "Déclencheur Programmé"
3. Vérifier le cron : `0 8 * * 1,3,5` (Lun/Mer/Ven à 8h)
4. Toggle **Active** à ON
5. En haut à droite, toggle **Active** pour tout le workflow

### 6.2 Monitoring

#### Dashboard n8n

- **Executions** : Voir l'historique
- **Logs** : Consulter les erreurs
- **Metrics** : Suivre les performances

#### Google Sheets

- Vérifier régulièrement les statuts
- Surveiller les articles "Rejeté"

#### Emails

- Lire les notifications de succès/erreur
- Agir sur les erreurs

---

## 🎯 Étape 7 : Optimisations

### 7.1 Ajuster le Prompt de l'Agent

Si les articles ne correspondent pas à vos attentes :

1. Ouvrir le workflow principal
2. Cliquer sur le node "Agent IA Publication"
3. Modifier le prompt système
4. **Save**

**Exemples d'ajustements** :

- **Plus de sources** : "Minimum 5 sources au lieu de 3"
- **Style différent** : "Ton plus technique" ou "Ton plus accessible"
- **Longueur** : "1500 mots au lieu de 1200"

### 7.2 Ajouter des Règles de Validation

Dans le workflow `Tool: Validate Quality`, ajuster les critères :

```javascript
// Exemple : Exiger 5 sources au lieu de 3
checks.sources_count.passed = sources.length >= 5;

// Exemple : Exiger 1500 mots au lieu de 1000
checks.word_count.passed = words.length >= 1500;
```

### 7.3 Personnaliser les Notifications

Dans le workflow `Tool: Send Notification`, modifier le template HTML.

---

## 🚨 Dépannage

### Erreur : "Tool execution failed"

**Cause** : Un tool n'a pas pu s'exécuter  
**Solution** :
1. Vérifier que tous les workflows de tools sont **Active**
2. Tester le tool individuellement
3. Vérifier les credentials

### Erreur : "Invalid API Key"

**Cause** : Credential incorrecte  
**Solution** :
1. Vérifier la clé API dans Settings > Credentials
2. Régénérer la clé si nécessaire
3. Mettre à jour dans n8n

### Erreur : "Article validation failed"

**Cause** : L'article ne respecte pas les critères  
**Solution** :
1. Lire les détails dans les logs
2. Ajuster le prompt de génération
3. Relancer l'agent

### Erreur : "Rate limit exceeded"

**Cause** : Trop de requêtes API  
**Solution** :
1. Ajouter des crédits Anthropic
2. Espacer les exécutions (réduire la fréquence)
3. Limiter le nombre d'articles par exécution

### L'agent ne fait rien

**Cause** : Aucun article "À générer" dans le calendrier  
**Solution** :
1. Vérifier le Google Sheet
2. Ajouter des articles avec statut "À générer"
3. Relancer l'agent

---

## 📊 Métriques de Succès

### KPIs à Suivre

| Métrique | Objectif | Mesure |
|----------|----------|--------|
| **Taux de succès** | > 90% | Articles publiés / Articles tentés |
| **Temps moyen** | < 5 min | Durée de l'exécution complète |
| **Score qualité** | > 85/100 | Score de validation moyen |
| **Sources par article** | ≥ 3 | Nombre de sources vérifiables |
| **Coût par article** | < 0.10€ | Coût API Anthropic |

### Dashboard Hebdomadaire

Créer un Google Sheet "Dashboard" avec :

- Articles publiés cette semaine
- Taux de succès
- Articles rejetés (avec raisons)
- Coût total
- Engagement LinkedIn (à remplir manuellement)

---

## 🎓 Bonnes Pratiques

### 1. Planification du Calendrier

- Remplir le calendrier 2 semaines à l'avance
- Varier les secteurs et types de contenu
- Prioriser les sujets d'actualité

### 2. Révision Humaine

Même avec l'automatisation :
- Lire les articles publiés
- Corriger les erreurs éventuelles
- Ajuster le prompt selon les résultats

### 3. Backup

- Exporter les workflows n8n régulièrement
- Sauvegarder le Google Sheet
- Garder un historique des articles publiés

### 4. Sécurité

- Ne jamais partager les API Keys
- Utiliser des mots de passe d'application (pas les mots de passe principaux)
- Révoquer les accès inutilisés

---

## 📈 Évolutions Futures

### Phase 2 : Analytics Automatiques

- Intégrer Google Search Console API
- Récupérer automatiquement les métriques SEO
- Remplir le sheet "Performance"

### Phase 3 : Multi-Canal

- Ajouter Twitter/X
- Ajouter Newsletter
- Ajouter Medium

### Phase 4 : IA Prédictive

- Analyser les performances passées
- Suggérer les meilleurs sujets
- Optimiser les horaires de publication

---

## 📞 Support

### Documentation

- **n8n** : https://docs.n8n.io/
- **Anthropic** : https://docs.anthropic.com/
- **WordPress REST API** : https://developer.wordpress.org/rest-api/
- **LinkedIn API** : https://learn.microsoft.com/en-us/linkedin/

### Community

- **n8n Community** : https://community.n8n.io/
- **n8n Discord** : https://discord.gg/n8n

### Fichiers du Projet

- `n8n-agent-ia-architecture.md` : Architecture détaillée
- `n8n-workflow-agent-ia-eazylink.json` : Workflow principal
- `n8n-tools-implementation.md` : Implémentation des 7 tools

---

## ✅ Checklist Finale

### Configuration
- [ ] Toutes les API Keys obtenues
- [ ] Google Sheet créé et rempli
- [ ] Credentials configurées dans n8n
- [ ] 7 workflows de tools créés et testés
- [ ] Workflow principal importé et configuré

### Tests
- [ ] Chaque tool testé individuellement
- [ ] Test complet de l'agent réussi
- [ ] Article publié sur WordPress
- [ ] Post publié sur LinkedIn
- [ ] Email de notification reçu

### Production
- [ ] Workflow activé
- [ ] Planning configuré (Lun/Mer/Ven 8h)
- [ ] Monitoring en place
- [ ] Calendrier rempli pour 2 semaines

---

## 🎉 Félicitations !

Votre Agent IA est maintenant opérationnel. Il va automatiquement :

✅ Lire le calendrier éditorial  
✅ Générer des articles SEO de qualité  
✅ Valider la qualité et les sources  
✅ Publier sur WordPress et LinkedIn  
✅ Vous notifier des résultats  

**Production estimée** : 12 articles/mois en automatique  
**Temps économisé** : ~48h/mois  
**Coût** : ~0.50€/mois (vs 500€+ avec rédacteur)

---

**Version** : 1.0  
**Date** : Octobre 2025  
**Auteur** : EazyLink Strategy Team
