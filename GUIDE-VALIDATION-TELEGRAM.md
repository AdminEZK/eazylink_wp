# 📱 Guide Validation Telegram - Workflow EazyLink

## 🎯 Fonctionnalité

Ce workflow ajoute une **validation humaine via Telegram** avant la publication des articles. Vous recevez l'aperçu de l'article + le visuel généré, et vous pouvez :

- ✅ **Valider et publier** directement
- 🔄 **Régénérer le visuel** (jusqu'à 3 fois)
- ❌ **Annuler** la publication

---

## 🚀 Flux de Validation

### 1. Génération Automatique
```
Lundi 8h → Workflow génère l'article + visuel
```

### 2. Notification Telegram
Vous recevez sur Telegram :
```
📝 Nouvel article généré

Titre: Optimisation Continue en Entreprise
Mot-clé: optimisation continue IA
Secteur: Production

Extrait:
L'optimisation continue n'est plus une option...

Sources: 5 sources citées
Mots: ~1200 mots

🖼️ Visuel en cours de génération...
```

### 3. Aperçu Visuel
Puis vous recevez l'image avec 3 boutons :

```
🎨 Visuel généré pour:
Optimisation Continue en Entreprise

[✅ Valider et Publier]
[🔄 Régénérer Visuel]
[❌ Annuler]
```

### 4. Actions Possibles

#### ✅ Valider et Publier
- Publication immédiate sur WordPress
- Publication sur LinkedIn
- Notification de confirmation

#### 🔄 Régénérer Visuel
- Génère une nouvelle variation (qualité HD)
- Vous renvoie le nouveau visuel
- Jusqu'à 3 tentatives
- Même prompt avec variation de style

#### ❌ Annuler
- Aucune publication
- Article reste "À générer" dans le calendrier
- Peut être relancé manuellement

---

## ⚙️ Configuration Telegram

### Étape 1 : Créer un Bot Telegram

1. **Ouvrir Telegram** et chercher `@BotFather`
2. **Envoyer** `/newbot`
3. **Choisir un nom** : `EazyLink Articles Bot`
4. **Choisir un username** : `eazylink_articles_bot`
5. **Copier le token** : `123456789:ABCdefGHIjklMNOpqrsTUVwxyz`

### Étape 2 : Obtenir votre Chat ID

1. **Envoyer un message** à votre bot
2. **Aller sur** : `https://api.telegram.org/bot<VOTRE_TOKEN>/getUpdates`
3. **Chercher** `"chat":{"id":123456789`
4. **Copier le Chat ID** : `123456789`

### Étape 3 : Configurer dans n8n

#### Credentials Telegram
```
Type: Telegram API
Access Token: 123456789:ABCdefGHIjklMNOpqrsTUVwxyz
```

#### Dans chaque node Telegram
```json
{
  "chatId": "123456789"  // Votre Chat ID
}
```

---

## 🔧 Nodes du Workflow

### 1. Telegram - Aperçu Article
**Quand** : Après génération de l'article
**Envoie** : Résumé de l'article (titre, extrait, stats)
**Format** : Markdown

### 2. Telegram - Demande Validation
**Quand** : Après génération de l'image
**Envoie** : Image + 3 boutons interactifs
**Boutons** :
- `approve_{rowIndex}` → Publier
- `regenerate_{rowIndex}` → Régénérer
- `cancel_{rowIndex}` → Annuler

### 3. Telegram - Réponse Utilisateur (Trigger)
**Type** : Webhook Trigger
**Écoute** : Clics sur les boutons
**Retourne** : `callback_query.data`

### 4. Vérifier Validation
**Condition** : `callback_query.data` contient `approve_`
**Si OUI** → Publier
**Si NON** → Passer au suivant

### 5. Vérifier Régénération
**Condition** : `callback_query.data` contient `regenerate_`
**Si OUI** → Régénérer image
**Si NON** → Annuler

### 6. Régénérer Image
**Prompt** : Même prompt + "Style variation {count}"
**Qualité** : HD (meilleure qualité)
**Retour** → Telegram avec nouvelle image

### 7. Telegram - Confirmation
**Quand** : Après publication réussie
**Envoie** : Liens WordPress + LinkedIn

---

## 📊 Exemple de Conversation

### Scénario 1 : Validation Directe

```
[Bot] 📝 Nouvel article généré
      Titre: ROI de l'IA Générative en Finance
      ...

[Bot] 🎨 [IMAGE]
      ✅ Valider et Publier
      🔄 Régénérer Visuel
      ❌ Annuler

[Vous] *Clic sur ✅ Valider*

[Bot] ✅ Article publié avec succès !
      📝 WordPress: https://eazylink.fr/blog/roi-ia-finance
      💼 LinkedIn: https://linkedin.com/...
```

### Scénario 2 : Régénération

```
[Bot] 🎨 [IMAGE - Version 1]
      ✅ Valider et Publier
      🔄 Régénérer Visuel
      ❌ Annuler

[Vous] *Clic sur 🔄 Régénérer*

[Bot] 🔄 Régénération du visuel en cours...
      Tentative 1/3

[Bot] 🎨 [IMAGE - Version 2]
      ✅ Valider et Publier
      🔄 Régénérer Visuel
      ❌ Annuler

[Vous] *Clic sur ✅ Valider*

[Bot] ✅ Article publié avec succès !
```

### Scénario 3 : Annulation

```
[Bot] 🎨 [IMAGE]
      ✅ Valider et Publier
      🔄 Régénérer Visuel
      ❌ Annuler

[Vous] *Clic sur ❌ Annuler*

[Bot] ❌ Publication annulée
      L'article reste en statut "À générer"
```

---

## 🎨 Personnalisation des Messages

### Modifier le Message d'Aperçu

Node "Telegram - Aperçu Article" :
```
📝 *Nouvel article généré*

*Titre:* {{$json.title}}
*Mot-clé:* {{$json.calendarData.keyword}}

[Votre texte personnalisé]
```

### Modifier les Boutons

Node "Telegram - Demande Validation" :
```json
{
  "inlineKeyboard": {
    "rows": [
      {
        "buttons": [
          {
            "text": "✅ Votre texte",
            "callbackData": "approve_{{$json.calendarData.rowIndex}}"
          }
        ]
      }
    ]
  }
}
```

### Ajouter des Emojis
```
✅ ❌ 🔄 📝 🎨 🚀 💼 📊 🎯 ⚡ 🔥 💡
```

---

## 🔐 Sécurité

### Limiter l'Accès
Seul votre Chat ID peut interagir avec le bot :
```javascript
// Ajouter dans un node Code
if ($json.callback_query.from.id !== VOTRE_CHAT_ID) {
  throw new Error('Accès non autorisé');
}
```

### Timeout de Validation
Ajouter un délai maximum :
```javascript
// Si pas de réponse après 24h → Annuler automatiquement
const createdAt = new Date($json.created_at);
const now = new Date();
const hoursDiff = (now - createdAt) / 1000 / 60 / 60;

if (hoursDiff > 24) {
  throw new Error('Délai de validation expiré');
}
```

---

## 📈 Avantages de la Validation

### Contrôle Qualité
- ✅ Vérifier la pertinence du visuel
- ✅ S'assurer de la cohérence avec le contenu
- ✅ Éviter les publications automatiques non désirées

### Flexibilité
- ✅ Publier immédiatement si satisfait
- ✅ Régénérer si le visuel ne convient pas
- ✅ Annuler si l'article nécessite des ajustements

### Traçabilité
- ✅ Historique des validations dans Telegram
- ✅ Notifications en temps réel
- ✅ Décisions documentées

---

## 🛠️ Dépannage

### Erreur : "Bot not found"
**Cause** : Token Telegram invalide
**Solution** : Vérifier le token dans @BotFather

### Erreur : "Chat not found"
**Cause** : Chat ID incorrect
**Solution** : Récupérer le bon Chat ID via `/getUpdates`

### Boutons ne répondent pas
**Cause** : Webhook Trigger non activé
**Solution** : Activer le workflow et vérifier le webhook

### Image ne s'affiche pas
**Cause** : Problème de téléchargement
**Solution** : Vérifier le node "Télécharger Image"

### Pas de notification
**Cause** : Workflow non actif ou Chat ID incorrect
**Solution** : Activer le workflow et vérifier les credentials

---

## 🎯 Workflow Complet

### Fichier
`n8n-workflow-eazylink-avec-validation-telegram.json`

### Nodes Principaux
1. ⏰ Déclencheur Programmé
2. 📊 Lire Calendrier
3. 🤖 Générer Article OpenAI
4. ✅ Valider Sources
5. 🎨 Générer Image DALL-E
6. 📱 Telegram - Aperçu
7. 📥 Télécharger Image
8. 📱 Telegram - Validation (avec boutons)
9. 🎧 Telegram Trigger (écoute réponses)
10. ✔️ Vérifier Validation
11. 🔄 Vérifier Régénération
12. 🔁 Régénérer Image (si demandé)
13. 📝 Publier WordPress
14. 💼 Publier LinkedIn
15. 📱 Telegram - Confirmation

### Total Nodes : 20+

---

## 📱 Commandes Bot Optionnelles

### Ajouter des Commandes

Dans @BotFather :
```
/setcommands

status - Voir les articles en attente
help - Aide sur l'utilisation
stats - Statistiques du mois
```

### Implémenter dans n8n

Ajouter un node "Telegram Trigger" pour les commandes :
```javascript
if ($json.message.text === '/status') {
  // Lire Google Sheets et compter articles "À générer"
  return { json: { command: 'status' } };
}
```

---

## 🎓 Bonnes Pratiques

### Validation Rapide
- ✅ Valider dans les 2h pour publication le jour même
- ✅ Utiliser les notifications push Telegram
- ✅ Activer le son pour ne pas manquer

### Régénération
- 🔄 Maximum 3 tentatives recommandé
- 🔄 Varier le prompt si insatisfait après 3 fois
- 🔄 Utiliser qualité HD pour version finale

### Organisation
- 📅 Planifier les validations dans votre agenda
- 📊 Suivre les taux de validation/régénération
- 📈 Analyser les visuels les plus performants

---

## 📞 Support

**Documentation Telegram Bot API** : https://core.telegram.org/bots/api
**n8n Telegram Node** : https://docs.n8n.io/integrations/builtin/app-nodes/n8n-nodes-base.telegram/
**Créer un Bot** : https://core.telegram.org/bots#creating-a-new-bot

---

**Version** : 2.0  
**Date** : Octobre 2025  
**Nouveau** : Validation Telegram interactive
