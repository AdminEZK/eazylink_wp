#!/bin/bash

# ==============================================
# Script de configuration des commandes Telegram Bot
# ==============================================

# Charger les variables d'environnement
if [ -f .env ]; then
    export $(cat .env | grep -v '^#' | xargs)
else
    echo "❌ Fichier .env non trouvé"
    exit 1
fi

# Vérifier que le token est configuré
if [ -z "$TELEGRAM_BOT_TOKEN" ]; then
    echo "❌ TELEGRAM_BOT_TOKEN non configuré dans .env"
    exit 1
fi

echo "🤖 Configuration des commandes du bot Telegram..."
echo ""

# Définir les commandes
COMMANDS='[
  {"command":"start","description":"🚀 Démarrer le bot et voir le menu"},
  {"command":"new","description":"✍️ Créer un nouvel article (mode automatique)"},
  {"command":"excellence","description":"🔵 Article Excellence Opérationnelle"},
  {"command":"transformation","description":"🟣 Article Transformation Digitale"},
  {"command":"ia","description":"🔴 Article IA & Innovation"},
  {"command":"finance","description":"🟢 Article Finance & IA"},
  {"command":"marketing","description":"🟠 Article Marketing Automation & Data"},
  {"command":"rh","description":"🔷 Article RH & Talent Management"},
  {"command":"strategie","description":"⚫ Article Stratégie & Gouvernance IA"},
  {"command":"categories","description":"📁 Voir toutes les catégories"},
  {"command":"help","description":"❓ Aide et documentation"},
  {"command":"status","description":"📊 Statut du bot"}
]'

# Envoyer les commandes à l'API Telegram
RESPONSE=$(curl -s -X POST "https://api.telegram.org/bot${TELEGRAM_BOT_TOKEN}/setMyCommands" \
  -H "Content-Type: application/json" \
  -d "{\"commands\": $COMMANDS}")

# Vérifier le résultat
if echo "$RESPONSE" | grep -q '"ok":true'; then
    echo "✅ Commandes configurées avec succès !"
    echo ""
    echo "📋 Commandes disponibles :"
    echo "  /start - Démarrer le bot"
    echo "  /new - Créer un article (catégorie auto)"
    echo "  /excellence - Excellence Opérationnelle"
    echo "  /transformation - Transformation Digitale"
    echo "  /ia - IA & Innovation"
    echo "  /finance - Finance & IA"
    echo "  /marketing - Marketing Automation"
    echo "  /rh - RH & Talent Management"
    echo "  /strategie - Stratégie & Gouvernance"
    echo "  /categories - Liste des catégories"
    echo "  /help - Aide"
    echo "  /status - Statut"
    echo ""
    echo "🎉 Ouvrez Telegram et tapez / pour voir les commandes !"
else
    echo "❌ Erreur lors de la configuration :"
    echo "$RESPONSE"
    exit 1
fi
