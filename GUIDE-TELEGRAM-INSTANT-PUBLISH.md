# 📱 Guide : Telegram Instant Publish avec Agent IA

## 🎯 Vue d'Ensemble

Ce guide vous permet de configurer la publication instantanée d'articles via Telegram, avec analyse automatique des mots-clés (Perplexity + PRD) et catégorisation intelligente.

**Durée estimée** : 1-2 heures  
**Niveau** : Avancé

---

## ✅ Prérequis

- [ ] Bot Telegram créé (vous l'avez déjà)
- [ ] n8n configuré avec l'Agent IA de base
- [ ] Perplexity API Key
- [ ] Tous les tools de base (1-7) fonctionnels

---

## 🔑 Étape 1 : Obtenir l'API Perplexity

### 1.1 Créer un Compte Perplexity

1. Aller sur https://www.perplexity.ai
2. Créer un compte ou se connecter
3. Aller dans **Settings > API**
4. Cliquer sur **Generate API Key**
5. **Copier la clé** : `pplx-...`

### 1.2 Tarification Perplexity

- **Gratuit** : 5 requêtes/jour
- **Pro** : 10$/mois - 300 requêtes/jour
- **Enterprise** : Sur devis

**Recommandation** : Plan Pro suffisant pour 50-100 articles/mois

---

## 🤖 Étape 2 : Configurer le Bot Telegram

### 2.1 Récupérer le Token du Bot

Vous avez déjà un bot, récupérez son token :

1. Ouvrir Telegram
2. Chercher **@BotFather**
3. Envoyer `/mybots`
4. Sélectionner votre bot
5. Cliquer sur **API Token**
6. **Copier le token** : `123456789:ABCdefGHIjklMNOpqrsTUVwxyz`

### 2.2 Configurer les Commandes du Bot

Dans BotFather :

1. Envoyer `/setcommands`
2. Sélectionner votre bot
3. Copier-coller :

```
create - Créer et publier un article immédiatement
categories - Afficher la liste des catégories
status - Voir les articles en cours
help - Afficher l'aide
```

---

## 🔧 Étape 3 : Configurer n8n

### 3.1 Ajouter la Credential Telegram

1. Dans n8n, aller dans **Settings > Credentials**
2. **Add Credential** > **Telegram**
3. Remplir :
   - Credential name : `Telegram Bot`
   - Access Token : Votre token bot
4. **Save**

### 3.2 Configurer le Webhook Telegram

1. Ouvrir le workflow `EazyLink - Telegram Instant Publish`
2. Cliquer sur le node **Telegram Webhook**
3. Copier l'URL du webhook : `https://votre-n8n.com/webhook/telegram-webhook`
4. Dans un terminal ou Postman, envoyer :

```bash
curl -X POST "https://api.telegram.org/bot<VOTRE_TOKEN>/setWebhook" \
  -H "Content-Type: application/json" \
  -d '{"url": "https://votre-n8n.com/webhook/telegram-webhook"}'
```

5. Vérifier : `https://api.telegram.org/bot<VOTRE_TOKEN>/getWebhookInfo`

---

## 📥 Étape 4 : Créer les Nouveaux Tools

### 4.1 Tool 8 : search_keywords_perplexity

Voir `n8n-tools-telegram-advanced.md` pour le code complet.

**Résumé** :
- Appelle l'API Perplexity
- Retourne mots-clés + contexte + sources
- Durée : ~10 secondes

### 4.2 Tool 9 : analyze_prd_keywords

**Résumé** :
- Analyse le PRD SEO avec Claude
- Identifie les mots-clés stratégiques EazyLink
- Durée : ~5 secondes

### 4.3 Tool 10 : determine_category

**Résumé** :
- Algorithme de scoring
- Détermine la catégorie automatiquement
- Durée : < 1 seconde

### 4.4 Tool 11 : get_categories_list

**Résumé** :
- Retourne la liste des 7 catégories
- Pour la commande `/categories`
- Durée : < 1 seconde

**Instructions détaillées** : Voir `n8n-tools-telegram-advanced.md`

---

## 🚀 Étape 5 : Importer le Workflow Telegram

### 5.1 Importer le JSON

1. Dans n8n, **New Workflow**
2. **Import from File**
3. Sélectionner `n8n-workflow-telegram-instant-publish.json`

### 5.2 Configurer les IDs des Tools

Remplacer dans chaque Tool node :

```
WORKFLOW_ID_TOOL_3 → ID du workflow "Tool: Generate Article"
WORKFLOW_ID_TOOL_4 → ID du workflow "Tool: Validate Quality"
WORKFLOW_ID_TOOL_5 → ID du workflow "Tool: Publish WordPress"
WORKFLOW_ID_TOOL_6 → ID du workflow "Tool: Publish LinkedIn"
WORKFLOW_ID_TOOL_8 → ID du workflow "Tool: Search Keywords Perplexity"
WORKFLOW_ID_TOOL_9 → ID du workflow "Tool: Analyze PRD Keywords"
WORKFLOW_ID_TOOL_10 → ID du workflow "Tool: Determine Category"
WORKFLOW_ID_TOOL_11 → ID du workflow "Tool: Get Categories List"
```

### 5.3 Configurer les Credentials

- **Telegram Bot** : Sélectionner la credential créée
- **Anthropic Claude** : Sélectionner la credential existante

### 5.4 Activer le Workflow

1. **Save** le workflow
2. Toggle **Active** à ON

---

## 🧪 Étape 6 : Tests

### Test 1 : Commande /help

1. Ouvrir Telegram
2. Chercher votre bot
3. Envoyer `/help`
4. **Attendu** : Message avec la liste des commandes

### Test 2 : Commande /categories

1. Envoyer `/categories`
2. **Attendu** : Liste des 7 catégories avec emojis

### Test 3 : Commande /create

1. Envoyer `/create GPT-5 vient de sortir`
2. **Attendu** :
   - Message "🔍 Analyse en cours..."
   - Après 2-3 minutes : Message de succès avec URLs

### Vérification

- [ ] Article visible sur WordPress
- [ ] Post visible sur LinkedIn
- [ ] Catégorie correcte assignée
- [ ] Mots-clés pertinents

---

## 📊 Étape 7 : Monitoring

### Dashboard Telegram

Créer un Google Sheet "Telegram Publish Log" :

| Date | Utilisateur | Sujet | Catégorie | Mots-clés | URLs | Temps |
|------|-------------|-------|-----------|-----------|------|-------|
| ... | ... | ... | ... | ... | ... | ... |

### Métriques à Suivre

- **Temps moyen** : < 3 minutes
- **Taux de succès** : > 90%
- **Catégories les plus utilisées**
- **Mots-clés les plus fréquents**

---

## 💡 Utilisation Quotidienne

### Scénario 1 : Actualité Urgente

**Situation** : GPT-5 vient de sortir

**Action** :
```
/create GPT-5 vient de sortir
```

**Résultat** : Article publié en 2-3 minutes

---

### Scénario 2 : Sujet Planifié

**Situation** : Vous avez une idée d'article

**Action** :
```
/create Optimiser les processus RH avec l'IA
```

**Résultat** : 
- Catégorie : RH & Talent Management
- Mots-clés : recrutement IA, SIRH, people analytics
- Publication immédiate

---

### Scénario 3 : Vérifier les Catégories

**Action** :
```
/categories
```

**Résultat** : Liste complète des catégories disponibles

---

## 🎯 Workflow Complet

```
[Vous sur Telegram]
    ↓
    /create GPT-5 sortie
    ↓
[n8n Webhook] → Reçoit le message
    ↓
[Parser] → Extrait "GPT-5 sortie"
    ↓
[Telegram] → "🔍 Analyse en cours..."
    ↓
[Agent IA]
    ├─ [Perplexity] → Mots-clés tendances
    ├─ [PRD Analysis] → Mots-clés stratégiques
    ├─ [Determine Category] → "IA & Innovation"
    ├─ [Generate Article] → Article 1200 mots
    ├─ [Validate Quality] → Score 92/100
    ├─ [Publish WordPress] → URL WP
    └─ [Publish LinkedIn] → URL LI
    ↓
[Telegram] → "✅ Article publié !"
```

**Temps total** : 2-3 minutes

---

## 🚨 Dépannage

### Erreur : "Webhook not set"

**Solution** :
```bash
curl -X POST "https://api.telegram.org/bot<TOKEN>/setWebhook" \
  -d "url=https://votre-n8n.com/webhook/telegram-webhook"
```

### Erreur : "Perplexity API failed"

**Causes** :
- API Key invalide
- Quota dépassé
- Service indisponible

**Solution** :
- Vérifier la clé API
- Vérifier le quota (Settings > API)
- Utiliser uniquement le PRD si Perplexity down

### Erreur : "Category determination failed"

**Cause** : Sujet trop vague

**Solution** : Être plus précis dans le sujet

**Exemple** :
- ❌ `/create IA`
- ✅ `/create IA générative en finance`

### L'agent ne répond pas

**Causes** :
- Webhook mal configuré
- Workflow pas activé
- Tool manquant

**Solution** :
1. Vérifier `getWebhookInfo`
2. Vérifier que le workflow est **Active**
3. Tester chaque tool individuellement

---

## 🎓 Bonnes Pratiques

### 1. Formulation du Sujet

**Bon** :
- `/create GPT-5 : nouvelles capacités multimodales`
- `/create Automatisation RH avec l'IA en 2025`
- `/create ROI de l'IA : méthodologie de calcul`

**Mauvais** :
- `/create IA` (trop vague)
- `/create article` (pas de sujet)
- `/create test` (pas pertinent)

### 2. Timing

- **Actualités** : Publier immédiatement via Telegram
- **Sujets planifiés** : Ajouter au Google Sheet pour le workflow automatique
- **Urgence** : Telegram > Google Sheet

### 3. Vérification Post-Publication

Toujours vérifier :
- [ ] Titre accrocheur
- [ ] Catégorie correcte
- [ ] Mots-clés pertinents
- [ ] Sources vérifiables
- [ ] Pas de FAQ
- [ ] Liens internes

---

## 📈 Évolutions Futures

### Phase 2 : Commandes Avancées

```
/create_draft [sujet] - Créer en brouillon (pas publié)
/schedule [sujet] [date] - Planifier une publication
/update [id] - Mettre à jour un article existant
/stats - Statistiques de publication
```

### Phase 3 : Multi-Utilisateurs

- Gestion des permissions
- Workflow d'approbation
- Notifications d'équipe

### Phase 4 : Analytics

- Tracking automatique des performances
- Suggestions de sujets basées sur les tendances
- Optimisation des horaires de publication

---

## ✅ Checklist Finale

### Configuration
- [ ] API Perplexity obtenue
- [ ] Bot Telegram configuré
- [ ] Webhook Telegram configuré
- [ ] 4 nouveaux tools créés (8, 9, 10, 11)
- [ ] Workflow Telegram importé
- [ ] IDs des tools mis à jour
- [ ] Credentials configurées

### Tests
- [ ] `/help` fonctionne
- [ ] `/categories` fonctionne
- [ ] `/create` fonctionne
- [ ] Article publié sur WordPress
- [ ] Post publié sur LinkedIn
- [ ] Catégorie correcte assignée

### Production
- [ ] Workflow activé
- [ ] Monitoring en place
- [ ] Équipe formée

---

## 🎉 Résultat Final

Vous pouvez maintenant :

✅ **Publier un article en 2-3 minutes** depuis Telegram  
✅ **Analyse automatique** des mots-clés (Perplexity + PRD)  
✅ **Catégorisation intelligente** automatique  
✅ **Publication multi-canal** (WordPress + LinkedIn)  
✅ **Notification instantanée** avec URLs  

**Cas d'usage** : Actualité urgente, idée spontanée, événement en direct

---

**Version** : 1.0  
**Date** : Octobre 2025  
**Auteur** : EazyLink Strategy Team
