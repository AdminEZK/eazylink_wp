# 🤖 Guide des Commandes Telegram Bot EazyLink

## 📋 Liste des Commandes

### Commandes Principales

#### `/start`
Démarre le bot et affiche le menu principal avec toutes les options disponibles.

**Réponse du bot** :
```
🚀 Bienvenue sur EazyLink Bot !

Je peux créer des articles SEO optimisés dans 7 catégories :

🔵 /excellence - Excellence Opérationnelle
🟣 /transformation - Transformation Digitale  
🔴 /ia - Intelligence Artificielle & Innovation
🟢 /finance - Finance & IA
🟠 /marketing - Marketing Automation & Data
🔷 /rh - RH & Talent Management
⚫ /strategie - Stratégie & Gouvernance IA

✍️ /new - Créer un article (catégorie automatique)
📁 /categories - Voir toutes les catégories
❓ /help - Aide
```

---

#### `/new` - Créer un Article (Mode Automatique)
Crée un article en détectant automatiquement la meilleure catégorie selon le sujet.

**Utilisation** :
```
/new GPT-5 vient de sortir
```

**Processus** :
1. L'agent IA analyse le sujet
2. Recherche les mots-clés via Perplexity
3. Détermine la catégorie optimale (score basé sur le PRD)
4. Génère l'article SEO
5. Publie sur WordPress + LinkedIn

---

### Commandes par Catégorie

#### `/excellence` - Excellence Opérationnelle 🔵
Force la catégorie "Excellence Opérationnelle"

**Exemples** :
```
/excellence Optimiser les processus de production avec l'IA
/excellence Kaizen digital : amélioration continue
```

**Mots-clés cibles** : optimisation, processus, kaizen, lean, performance, efficacité

---

#### `/transformation` - Transformation Digitale 🟣
Force la catégorie "Transformation Digitale"

**Exemples** :
```
/transformation Digitaliser son entreprise en 2025
/transformation Conduite du changement digital
```

**Mots-clés cibles** : transformation, digitalisation, modernisation, changement

---

#### `/ia` - Intelligence Artificielle & Innovation 🔴
Force la catégorie "IA & Innovation"

**Exemples** :
```
/ia GPT-5 : les nouvelles fonctionnalités
/ia Agents autonomes IA en entreprise
```

**Mots-clés cibles** : IA générative, ChatGPT, machine learning, agents, RAG

---

#### `/finance` - Finance & IA 🟢
Force la catégorie "Finance & IA"

**Exemples** :
```
/finance Automatiser la comptabilité avec l'IA
/finance Détection de fraude par machine learning
```

**Mots-clés cibles** : finance, fintech, comptable, crédit, fraude

---

#### `/marketing` - Marketing Automation & Data 🟠
Force la catégorie "Marketing Automation & Data"

**Exemples** :
```
/marketing Personnalisation client avec l'IA
/marketing SEO et IA : meilleures pratiques
```

**Mots-clés cibles** : marketing, automation, personnalisation, SEO, analytics

---

#### `/rh` - RH & Talent Management 🔷
Force la catégorie "RH & Talent Management"

**Exemples** :
```
/rh Recrutement assisté par IA
/rh People analytics : mesurer l'engagement
```

**Mots-clés cibles** : recrutement, talent, formation, RH, engagement

---

#### `/strategie` - Stratégie & Gouvernance IA ⚫
Force la catégorie "Stratégie & Gouvernance IA"

**Exemples** :
```
/strategie ROI de l'IA : comment le mesurer
/strategie Gouvernance IA et éthique
```

**Mots-clés cibles** : stratégie, gouvernance, ROI, diagnostic, éthique

---

### Commandes Utilitaires

#### `/categories`
Affiche la liste complète des 7 catégories avec leurs descriptions et mots-clés.

#### `/help`
Affiche l'aide complète et les exemples d'utilisation.

#### `/status`
Affiche le statut du bot, les statistiques et les dernières publications.

---

## 🎯 Différence entre `/new` et les commandes de catégorie

| Commande | Catégorie | Utilisation |
|----------|-----------|-------------|
| `/new` | **Automatique** | L'IA choisit la meilleure catégorie selon le sujet |
| `/excellence` | **Forcée** | Toujours "Excellence Opérationnelle" |
| `/transformation` | **Forcée** | Toujours "Transformation Digitale" |
| `/ia` | **Forcée** | Toujours "IA & Innovation" |
| etc. | **Forcée** | Catégorie spécifique |

**Recommandation** : Utilisez `/new` pour laisser l'IA optimiser le choix de catégorie.

---

## 🚀 Installation des Commandes

### Méthode 1 : Script Automatique

```bash
chmod +x setup-telegram-commands.sh
./setup-telegram-commands.sh
```

### Méthode 2 : Manuelle via BotFather

1. Ouvrez Telegram et cherchez **@BotFather**
2. Envoyez `/setcommands`
3. Sélectionnez votre bot
4. Collez cette liste :

```
start - 🚀 Démarrer le bot et voir le menu
new - ✍️ Créer un nouvel article (mode automatique)
excellence - 🔵 Article Excellence Opérationnelle
transformation - 🟣 Article Transformation Digitale
ia - 🔴 Article IA & Innovation
finance - 🟢 Article Finance & IA
marketing - 🟠 Article Marketing Automation & Data
rh - 🔷 Article RH & Talent Management
strategie - ⚫ Article Stratégie & Gouvernance IA
categories - 📁 Voir toutes les catégories
help - ❓ Aide et documentation
status - 📊 Statut du bot
```

---

## 📊 Mapping Catégories → WordPress

| Commande | Catégorie | ID WordPress |
|----------|-----------|--------------|
| `/excellence` | Excellence Opérationnelle | 1 |
| `/transformation` | Transformation Digitale | 2 |
| `/ia` | IA & Innovation | 3 |
| `/finance` | Finance & IA | 4 |
| `/marketing` | Marketing Automation | 5 |
| `/rh` | RH & Talent | 6 |
| `/strategie` | Stratégie & Gouvernance | 7 |

---

## 🔧 Configuration dans n8n

Dans votre workflow n8n, ajoutez un nœud "Switch" pour router selon la commande :

```javascript
// Parser la commande Telegram
const text = $json.message.text;
const command = text.split(' ')[0].replace('/', '');
const subject = text.substring(command.length + 2).trim();

// Mapping commande → catégorie
const categoryMap = {
  'excellence': 'Excellence Opérationnelle',
  'transformation': 'Transformation Digitale',
  'ia': 'Intelligence Artificielle & Innovation',
  'finance': 'Finance & IA',
  'marketing': 'Marketing Automation & Data',
  'rh': 'RH & Talent Management',
  'strategie': 'Stratégie & Gouvernance IA'
};

return {
  command: command,
  subject: subject,
  category: categoryMap[command] || 'auto',
  forceCategory: command !== 'new'
};
```

---

## ✅ Vérification

Après installation, dans Telegram :
1. Tapez `/` dans le chat avec votre bot
2. Vous devriez voir toutes les commandes avec leurs icônes
3. Testez avec `/start` pour voir le menu

---

**Version** : 1.0  
**Date** : Octobre 2025  
**Auteur** : EazyLink
