# 🚀 Guide d'Installation - Workflow EazyLink Simplifié (Anthropic Only)

## 📋 Vue d'ensemble

Architecture simplifiée : **Telegram → Claude (Anthropic) → WordPress**

Plus besoin de Perplexity ! Claude gère tout :
- ✅ Analyse du sujet
- ✅ Choix de la catégorie
- ✅ Recherche des mots-clés
- ✅ Génération de l'article SEO
- ✅ Optimisation du contenu

---

## 🎯 Workflow Unique

**Fichier** : `n8n-workflow-telegram-eazylink-simple.json`

### Flux :
1. **Telegram Trigger** - Reçoit les commandes (`/new`, `/ia`, etc.)
2. **Parse Command** - Analyse la commande et le sujet
3. **Check Error** - Vérifie que le sujet est valide
4. **Telegram Progress** - Informe l'utilisateur
5. **Anthropic Agent** - Claude génère l'article complet
6. **WordPress Publish** - Publie l'article
7. **Telegram Success** - Confirme la publication

---

## 📦 Installation

### 1. Importer le Workflow dans n8n

1. Ouvrez n8n : `https://votre-n8n.com`
2. Cliquez sur **"+"** → **"Import from File"**
3. Sélectionnez `n8n-workflow-telegram-eazylink-simple.json`
4. Le workflow s'ouvre automatiquement

### 2. Configurer les Credentials

#### A. Telegram Bot

1. Dans n8n : **Credentials** → **Add Credential** → **Telegram API**
2. Remplissez :
   - **Access Token** : Votre token de @BotFather
3. Sauvegardez avec le nom : `Telegram Bot`

#### B. Anthropic (Claude)

1. **Credentials** → **Add Credential** → **Anthropic API**
2. Remplissez :
   - **API Key** : Votre clé Anthropic (commence par `sk-ant-`)
3. Sauvegardez avec le nom : `Anthropic Claude`

#### C. WordPress

1. **Credentials** → **Add Credential** → **HTTP Basic Auth**
2. Remplissez :
   - **User** : Votre username WordPress
   - **Password** : Votre Application Password WordPress
3. Sauvegardez avec le nom : `WordPress Basic Auth`

**Comment créer un Application Password WordPress** :
```
1. WordPress Admin → Utilisateurs → Profil
2. Section "Mots de passe d'application"
3. Nom : "n8n"
4. Cliquez "Ajouter"
5. Copiez le mot de passe généré (format: xxxx xxxx xxxx xxxx)
```

### 3. Associer les Credentials au Workflow

Dans chaque nœud du workflow :

#### Nœud "Telegram Trigger"
- Cliquez sur le nœud
- **Credential for Telegram** → Sélectionnez `Telegram Bot`

#### Nœud "Telegram: Error"
- **Credential for Telegram** → Sélectionnez `Telegram Bot`

#### Nœud "Telegram: Progress"
- **Credential for Telegram** → Sélectionnez `Telegram Bot`

#### Nœud "Telegram: Success"
- **Credential for Telegram** → Sélectionnez `Telegram Bot`

#### Nœud "Anthropic Chat Model"
- **Credential for Anthropic** → Sélectionnez `Anthropic Claude`

#### Nœud "WordPress: Publish"
- **Authentication** → `Generic Credential Type` → `HTTP Basic Auth`
- **Credential for Basic Auth** → Sélectionnez `WordPress Basic Auth`
- **URL** : Remplacez par votre URL WordPress
  ```
  https://votre-site.com/wp-json/wp/v2/posts
  ```

### 4. Configurer les Variables d'Environnement

Dans le nœud **"WordPress: Publish"**, remplacez :
```
={{ $env.WORDPRESS_URL }}
```

Par votre vraie URL :
```
https://votre-site.com
```

Ou configurez la variable d'environnement dans n8n :
```
Settings → Variables → Add Variable
Name: WORDPRESS_URL
Value: https://votre-site.com
```

### 5. Activer le Workflow

1. Cliquez sur le bouton **"Active"** en haut à droite
2. Le workflow est maintenant en écoute des messages Telegram

---

## 🧪 Test

### 1. Test Simple

Dans Telegram, envoyez :
```
/new GPT-5 vient de sortir avec de nouvelles fonctionnalités
```

**Réponse attendue** :
```
⏳ Création de l'article en cours...

📊 Analyse du sujet...
✍️ Génération du contenu avec Claude...
```

Puis :
```
✅ Article publié avec succès !

📝 Titre : GPT-5 : Les Nouvelles Fonctionnalités...
📁 Catégorie : Intelligence Artificielle & Innovation
🔑 Mots-clés : GPT-5, OpenAI, IA générative
📊 Score SEO : 85/100

🔗 WordPress : https://votre-site.com/gpt-5-nouvelles-fonctionnalites

⏱️ Article créé par Claude (Anthropic)
```

### 2. Test avec Catégorie Forcée

```
/ia Les agents autonomes révolutionnent l'entreprise
```

L'article sera forcé dans la catégorie "IA & Innovation".

### 3. Test d'Erreur

```
/new test
```

**Réponse** :
```
❌ Veuillez fournir un sujet d'article.

Exemple: /new GPT-5 vient de sortir
```

---

## 🐛 Débogage

### Le bot ne répond pas

1. **Vérifiez que le workflow est actif** (bouton "Active" en vert)
2. **Testez le webhook Telegram** :
   ```
   https://api.telegram.org/botYOUR_TOKEN/getWebhookInfo
   ```
3. **Vérifiez les logs n8n** : Executions → Voir les erreurs

### Erreur "Unauthorized" WordPress

1. **Vérifiez l'Application Password** (pas le mot de passe normal)
2. **Testez avec curl** :
   ```bash
   curl -X POST https://votre-site.com/wp-json/wp/v2/posts \
     -u "username:xxxx xxxx xxxx xxxx" \
     -H "Content-Type: application/json" \
     -d '{"title":"Test","content":"Test","status":"draft"}'
   ```

### Claude ne génère pas bien le JSON

1. **Vérifiez le prompt** dans le nœud "AI Agent"
2. **Ajustez la température** (0.5-0.7 recommandé)
3. **Augmentez maxTokens** si l'article est tronqué

---

## 📊 Catégories WordPress

Assurez-vous que les IDs correspondent dans WordPress :

| ID | Catégorie | Commande |
|----|-----------|----------|
| 1 | Excellence Opérationnelle | `/excellence` |
| 2 | Transformation Digitale | `/transformation` |
| 3 | IA & Innovation | `/ia` |
| 4 | Finance & IA | `/finance` |
| 5 | Marketing Automation | `/marketing` |
| 6 | RH & Talent | `/rh` |
| 7 | Stratégie & Gouvernance | `/strategie` |

**Vérifier les IDs dans WordPress** :
```
Admin → Articles → Catégories → Survolez une catégorie
L'URL affiche : ?tag_ID=3
```

---

## 🎯 Commandes Disponibles

- `/new [sujet]` - Article avec catégorie automatique
- `/excellence [sujet]` - Force catégorie Excellence Opérationnelle
- `/transformation [sujet]` - Force catégorie Transformation Digitale
- `/ia [sujet]` - Force catégorie IA & Innovation
- `/finance [sujet]` - Force catégorie Finance & IA
- `/marketing [sujet]` - Force catégorie Marketing Automation
- `/rh [sujet]` - Force catégorie RH & Talent
- `/strategie [sujet]` - Force catégorie Stratégie & Gouvernance

---

## ✅ Checklist de Déploiement

- [ ] Workflow importé dans n8n
- [ ] Credentials Telegram configurés
- [ ] Credentials Anthropic configurés
- [ ] Credentials WordPress configurés
- [ ] URL WordPress mise à jour
- [ ] IDs des catégories vérifiés
- [ ] Workflow activé
- [ ] Test `/new` réussi
- [ ] Test avec catégorie forcée réussi
- [ ] Article visible sur WordPress

---

## 🚀 Prochaines Étapes

1. **Ajoutez LinkedIn** (optionnel) - Workflow séparé
2. **Configurez les commandes Telegram** - Via @BotFather
3. **Testez en production** - Créez plusieurs articles
4. **Optimisez le prompt Claude** - Ajustez selon vos besoins

---

**Version** : 2.0 (Simplifié - Anthropic Only)  
**Date** : Octobre 2025  
**Auteur** : EazyLink
