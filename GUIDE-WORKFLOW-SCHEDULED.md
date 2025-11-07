# 📅 Guide - Workflow Publication Programmée (Auto-Veille)

## 🎯 Vue d'ensemble

**Fichier** : `n8n-workflow-scheduled-auto.json`

Ce workflow publie **automatiquement** 6 articles par semaine :
- **Lundi** : 9h00 et 14h00
- **Mercredi** : 9h00 et 14h00
- **Vendredi** : 9h00 et 14h00

**Total** : 6 articles/semaine = ~24 articles/mois

---

## 🔄 Fonctionnement

### 1. **CRON Trigger** ⏰
Déclenche automatiquement aux horaires programmés.

**Expression CRON** : `0 9,14 * * 1,3,5`
- `0` = minute 0
- `9,14` = à 9h et 14h
- `*` = tous les jours du mois
- `*` = tous les mois
- `1,3,5` = lundi (1), mercredi (3), vendredi (5)

### 2. **Rotation Catégorie** 🔄
Sélectionne automatiquement une catégorie différente chaque jour.

**Algorithme** :
```javascript
Jour de l'année % 7 = Index de catégorie

Exemple :
- Jour 300 → 300 % 7 = 6 → Catégorie 7 (Stratégie & Gouvernance)
- Jour 301 → 301 % 7 = 0 → Catégorie 1 (Excellence Opérationnelle)
```

**Résultat** : Chaque catégorie est couverte équitablement.

### 3. **Claude Auto-Veille** 🤖
Claude effectue 2 missions :

#### Mission 1 : Trouver un sujet récent
- Analyse les actualités tech récentes (< 7 jours)
- Vérifie la pertinence pour la catégorie
- Évalue le potentiel SEO
- Sélectionne le meilleur sujet

#### Mission 2 : Générer l'article
- Crée un article SEO de 1500-2000 mots
- Structure H1, H2, H3
- Intègre les mots-clés naturellement
- Optimise pour le référencement

### 4. **WordPress Publish** 📝
Publie l'article automatiquement :
- Titre et contenu
- Catégorie WordPress
- Meta SEO (Yoast)
- Status : `publish` (en ligne immédiatement)

### 5. **LinkedIn Publish** 💼
Partage automatiquement sur LinkedIn :
- Texte accrocheur
- Lien vers l'article WordPress
- Hashtags pertinents
- Limité à 3000 caractères

### 6. **Telegram Notification** 📱
Vous envoie une notification avec :
- Titre de l'article
- Catégorie
- Sujet trouvé par Claude
- Score SEO
- Liens WordPress et LinkedIn

---

## 📦 Installation

### 1. Importer le Workflow

1. Ouvrez n8n
2. **Workflows** → **Import from File**
3. Sélectionnez `n8n-workflow-scheduled-auto.json`

### 2. Configurer les Credentials

#### A. Anthropic (Claude)
```
Credentials → Add → Anthropic API
- API Key : sk-ant-api03-xxxxx
- Nom : Anthropic Claude
```

#### B. WordPress
```
Credentials → Add → HTTP Basic Auth
- User : votre_username
- Password : xxxx xxxx xxxx xxxx (Application Password)
- Nom : WordPress Basic Auth
```

#### C. LinkedIn
```
Credentials → Add → LinkedIn OAuth2 API
- Suivez le flow OAuth2 dans n8n
- Nom : LinkedIn OAuth2
```

#### D. Telegram
```
Credentials → Add → Telegram API
- Access Token : votre_bot_token
- Nom : Telegram Bot
```

### 3. Configurer les Variables

Dans votre `.env` ou dans n8n Settings → Variables :

```bash
WORDPRESS_URL=https://votre-site.com
TELEGRAM_CHAT_ID=6892309735
```

### 4. Vérifier les IDs de Catégories WordPress

Dans le nœud **"Rotation Catégorie"**, vérifiez que les IDs correspondent :

```javascript
{ id: 1, name: "Excellence Opérationnelle" },
{ id: 2, name: "Transformation Digitale" },
{ id: 3, name: "Intelligence Artificielle & Innovation" },
{ id: 4, name: "Finance & IA" },
{ id: 5, name: "Marketing Automation & Data" },
{ id: 6, name: "RH & Talent Management" },
{ id: 7, name: "Stratégie & Gouvernance IA" }
```

**Vérifier dans WordPress** :
```
Admin → Articles → Catégories
Survolez une catégorie → URL affiche tag_ID=X
```

### 5. Activer le Workflow

Cliquez sur le bouton **"Active"** en haut à droite.

---

## 🧪 Test Manuel

### Option 1 : Attendre le prochain CRON
Le workflow se déclenchera automatiquement au prochain horaire programmé.

### Option 2 : Test Immédiat

1. Cliquez sur le nœud **"CRON: Lun/Mer/Ven 9h & 14h"**
2. Cliquez sur **"Execute Node"**
3. Le workflow s'exécute immédiatement

**Résultat attendu** :
- Article publié sur WordPress
- Post partagé sur LinkedIn
- Notification Telegram reçue

---

## 📊 Exemple de Notification Telegram

```
✅ Article programmé publié avec succès !

📅 Publication automatique
📝 Titre : GPT-5 : Les Nouvelles Fonctionnalités qui Révolutionnent l'IA
📁 Catégorie : Intelligence Artificielle & Innovation

🔍 Sujet trouvé : Annonce GPT-5 par OpenAI
📰 Source : OpenAI Blog
📅 Date actu : 2025-10-27

🔑 Mots-clés : GPT-5, OpenAI, IA générative, LLM, innovation
📊 Score SEO : 88/100
📝 Mots : 1850
⏱️ Lecture : 8 min

🔗 WordPress : https://votre-site.com/gpt-5-nouvelles-fonctionnalites
🔗 LinkedIn : Publié ✅

🤖 Article créé automatiquement par Claude
```

---

## 🎯 Calendrier de Publication

### Semaine Type

| Jour | Heure | Catégorie (rotation) |
|------|-------|---------------------|
| **Lundi** | 9h00 | Excellence Opérationnelle |
| **Lundi** | 14h00 | Transformation Digitale |
| **Mercredi** | 9h00 | IA & Innovation |
| **Mercredi** | 14h00 | Finance & IA |
| **Vendredi** | 9h00 | Marketing Automation |
| **Vendredi** | 14h00 | RH & Talent |

**Note** : La rotation change chaque semaine automatiquement.

---

## 🔧 Personnalisation

### Changer les Horaires

Modifiez l'expression CRON dans le nœud **"CRON: Lun/Mer/Ven 9h & 14h"** :

```
0 9,14 * * 1,3,5  →  Lun/Mer/Ven à 9h et 14h
0 10,15 * * 1,3,5  →  Lun/Mer/Ven à 10h et 15h
0 9 * * 1-5  →  Tous les jours de la semaine à 9h
0 9,14,17 * * 1,3,5  →  3 fois par jour
```

**Outil** : https://crontab.guru pour tester vos expressions CRON

### Changer la Longueur des Articles

Dans le prompt Claude, modifiez :
```
**Longueur** : 1500-2000 mots
```

Par :
```
**Longueur** : 800-1200 mots  (articles courts)
**Longueur** : 2500-3000 mots  (articles longs)
```

### Désactiver LinkedIn

Supprimez ou désactivez les nœuds :
- "Prepare LinkedIn Post"
- "LinkedIn: Publish"

Connectez directement "WordPress: Publish" → "Telegram: Notification"

### Ajouter d'Autres Canaux

Vous pouvez ajouter :
- **Twitter/X** (après LinkedIn)
- **Facebook** (après LinkedIn)
- **Newsletter** (envoi automatique)

---

## 🐛 Débogage

### Le workflow ne se déclenche pas

1. **Vérifiez que le workflow est actif** (bouton vert)
2. **Vérifiez l'expression CRON** avec https://crontab.guru
3. **Vérifiez le fuseau horaire** de votre serveur n8n
4. **Testez manuellement** : Execute Node sur le CRON

### Claude ne trouve pas de sujet

1. **Vérifiez votre API key Anthropic**
2. **Augmentez maxTokens** (8000 → 12000)
3. **Modifiez le prompt** pour être plus spécifique
4. **Vérifiez les logs** : Executions → Voir l'erreur

### WordPress retourne une erreur

1. **Testez avec curl** :
```bash
curl -X POST https://votre-site.com/wp-json/wp/v2/posts \
  -u "username:app_password" \
  -H "Content-Type: application/json" \
  -d '{"title":"Test","content":"Test","status":"draft"}'
```

2. **Vérifiez les IDs de catégories**
3. **Vérifiez les permissions** de l'utilisateur WordPress

### LinkedIn ne publie pas

1. **Reconnectez OAuth2** dans les credentials
2. **Vérifiez les permissions** (w_member_social)
3. **Testez avec un post manuel** dans LinkedIn

---

## 📈 Statistiques Attendues

### Par Mois
- **Articles publiés** : ~24 articles
- **Couverture catégories** : Équilibrée (3-4 articles/catégorie)
- **Trafic estimé** : 5,000-10,000 visiteurs/mois (après 3 mois)
- **Leads estimés** : 50-100 leads/mois (après 3 mois)

### Par An
- **Articles** : ~288 articles
- **Trafic** : 50,000-100,000 visiteurs/an
- **Leads** : 600-1,200 leads/an

---

## ✅ Checklist de Déploiement

- [ ] Workflow importé dans n8n
- [ ] Credentials Anthropic configurés
- [ ] Credentials WordPress configurés
- [ ] Credentials LinkedIn configurés
- [ ] Credentials Telegram configurés
- [ ] Variables d'environnement configurées
- [ ] IDs catégories WordPress vérifiés
- [ ] Expression CRON vérifiée
- [ ] Test manuel réussi
- [ ] Workflow activé
- [ ] Première notification Telegram reçue

---

## 🚀 Prochaines Étapes

1. ✅ Workflow programmé opérationnel
2. ⏳ Créer le workflow Telegram instantané
3. ⏳ Tester les deux workflows ensemble
4. ⏳ Optimiser les prompts Claude selon les résultats
5. ⏳ Analyser les performances SEO après 1 mois

---

**Version** : 1.0  
**Date** : Octobre 2025  
**Auteur** : EazyLink
