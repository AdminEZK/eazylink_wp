# 🔐 Configuration Telegram - EazyLink

## ✅ Informations de Configuration

### Bot Telegram
- **Nom** : EazyLink Articles Bot
- **Username** : @eazylink_articles_bot
- **Bot ID** : 8286332909
- **Token** : `8286332909:AAGL7SfPf9nFPbZEbWfEQ-Bbt0TYGaHrJI0`

### Utilisateur
- **Nom** : François
- **Chat ID** : `6892309735`
- **Langue** : Français (fr)

---

## 📝 Configuration n8n

### Credentials Telegram

```
Type: Telegram API
Name: Telegram Bot EazyLink
Access Token: 8286332909:AAGL7SfPf9nFPbZEbWfEQ-Bbt0TYGaHrJI0
```

### Chat ID dans les Nodes

Tous les nodes Telegram utilisent :
```json
{
  "chatId": "6892309735"
}
```

---

## 🧪 Tests de Validation

### Test 1 : Vérifier le Bot
```
URL: https://api.telegram.org/bot8286332909:AAGL7SfPf9nFPbZEbWfEQ-Bbt0TYGaHrJI0/getMe

Résultat: ✅ OK
{
  "ok": true,
  "result": {
    "id": 8286332909,
    "is_bot": true,
    "first_name": "EazyLink Articles Bot",
    "username": "eazylink_articles_bot"
  }
}
```

### Test 2 : Vérifier le Chat ID
```
URL: https://api.telegram.org/bot8286332909:AAGL7SfPf9nFPbZEbWfEQ-Bbt0TYGaHrJI0/getUpdates

Résultat: ✅ OK
Chat ID récupéré: 6892309735
```

### Test 3 : Envoyer un Message Test

Dans n8n, créer un workflow simple :
```json
{
  "nodes": [
    {
      "name": "Test Telegram",
      "type": "n8n-nodes-base.telegram",
      "parameters": {
        "chatId": "6892309735",
        "text": "🎉 Test de connexion réussi !"
      }
    }
  ]
}
```

---

## 🚀 Workflow Configuré

### Fichier
`n8n-workflow-eazylink-avec-validation-telegram.json`

### Nodes Telegram Configurés

1. **Telegram - Aperçu Article**
   - Chat ID: 6892309735
   - Envoie le résumé de l'article

2. **Telegram - Demande Validation**
   - Chat ID: 6892309735
   - Envoie l'image avec boutons

3. **Telegram - Réponse Utilisateur** (Trigger)
   - Écoute les clics sur les boutons

4. **Telegram - Régénération**
   - Chat ID: 6892309735
   - Notification de régénération

5. **Telegram - Confirmation**
   - Chat ID: 6892309735
   - Confirmation de publication

6. **Telegram - Annulation**
   - Chat ID: 6892309735
   - Message d'annulation

---

## 📱 Utilisation

### Démarrer une Conversation

Dans Telegram :
1. Chercher : `@eazylink_articles_bot`
2. Cliquer sur **Start**
3. Tu recevras les notifications automatiquement

### Commandes Disponibles

- `/start` - Démarrer le bot
- `/help` - Aide (à implémenter)
- `/status` - Statut des articles (à implémenter)

---

## 🔒 Sécurité

### ⚠️ IMPORTANT - Ne Jamais Partager

- ❌ Le Token du bot : `8286332909:AAGL7SfPf9nFPbZEbWfEQ-Bbt0TYGaHrJI0`
- ❌ Ton Chat ID : `6892309735`

### Bonnes Pratiques

1. **Variables d'environnement** : Stocker le token dans les credentials n8n
2. **Accès limité** : Seul ton Chat ID peut interagir
3. **Rotation** : Changer le token si compromis via @BotFather

### Révoquer le Token

Si nécessaire :
```
1. Ouvrir @BotFather
2. /mybots
3. Sélectionner EazyLink Articles Bot
4. API Token → Revoke current token
5. Générer un nouveau token
```

---

## 🎯 Prochaines Étapes

### 1. Importer le Workflow
```bash
n8n → Import from File → n8n-workflow-eazylink-avec-validation-telegram.json
```

### 2. Configurer les Credentials

#### Telegram
- ✅ Token : `8286332909:AAGL7SfPf9nFPbZEbWfEQ-Bbt0TYGaHrJI0`
- ✅ Chat ID : `6892309735` (déjà dans le workflow)

#### Autres (à configurer)
- OpenAI API Key
- Google Sheets OAuth2
- WordPress OAuth2
- LinkedIn OAuth2

### 3. Tester

1. Activer le workflow
2. Ajouter une ligne "À générer" dans Google Sheets
3. Exécuter manuellement
4. Vérifier que tu reçois les messages Telegram

---

## 📊 Monitoring

### Vérifier les Messages Reçus

À tout moment :
```
https://api.telegram.org/bot8286332909:AAGL7SfPf9nFPbZEbWfEQ-Bbt0TYGaHrJI0/getUpdates
```

### Historique des Conversations

Tout l'historique est visible dans Telegram avec le bot.

---

## 🛠️ Dépannage

### Erreur : "Unauthorized"
**Cause** : Token invalide
**Solution** : Vérifier le token dans @BotFather

### Erreur : "Chat not found"
**Cause** : Chat ID incorrect
**Solution** : Vérifier que tu as bien envoyé un message au bot

### Pas de Notification
**Cause** : Workflow non actif ou Chat ID incorrect
**Solution** : 
1. Vérifier que le workflow est actif
2. Vérifier le Chat ID : `6892309735`
3. Vérifier les credentials Telegram

### Boutons ne Fonctionnent Pas
**Cause** : Webhook Trigger non configuré
**Solution** : Activer le node "Telegram - Réponse Utilisateur"

---

## 📞 Support

**Telegram Bot API** : https://core.telegram.org/bots/api
**n8n Telegram Node** : https://docs.n8n.io/integrations/builtin/app-nodes/n8n-nodes-base.telegram/
**@BotFather** : https://t.me/botfather

---

**Date de Configuration** : 23 Octobre 2025
**Status** : ✅ Configuré et Testé
**Prêt pour Production** : Oui (après configuration des autres APIs)
