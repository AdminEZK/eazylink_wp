#!/bin/bash

# Script de déploiement automatique vers O2Switch
# À utiliser après un git commit/push pour mettre à jour le site en production

echo "🚀 Déploiement vers O2Switch (Production)"
echo "=========================================="
echo ""

# Configuration FTP O2Switch
FTP_HOST="epervier.o2switch.net"
FTP_USER="dabe3350"
FTP_PASS="A5hq-RSjf-KzJ+"
FTP_PORT="21"

# Dossier source (WordPress local)
SOURCE_DIR="/Users/francois/Local Sites/website/app/public"

# Dossier de destination sur le serveur
REMOTE_DIR="/public_html"

echo "📁 Source: $SOURCE_DIR"
echo "🌐 Serveur: $FTP_HOST"
echo "📂 Destination: $REMOTE_DIR"
echo ""

# Vérifier si des modifications Git existent
if [ -d ".git" ]; then
    echo "🔍 Vérification Git..."
    
    # Vérifier s'il y a des modifications non commitées
    if ! git diff-index --quiet HEAD --; then
        echo "⚠️  Attention : Vous avez des modifications non commitées"
        git status --short
        echo ""
        read -p "Voulez-vous continuer le déploiement ? (y/n) " -n 1 -r
        echo ""
        if [[ ! $REPLY =~ ^[Yy]$ ]]; then
            echo "❌ Déploiement annulé"
            exit 1
        fi
    else
        echo "✅ Branche propre, prêt à déployer"
    fi
    
    # Afficher le dernier commit
    echo ""
    echo "📝 Dernier commit :"
    git log -1 --oneline
    echo ""
fi

read -p "Déployer vers la production ? (y/n) " -n 1 -r
echo ""

if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    echo "❌ Déploiement annulé"
    exit 1
fi

echo ""
echo "📤 Déploiement en cours..."
echo ""

# Utiliser lftp pour le transfert
lftp -u $FTP_USER,$FTP_PASS -p $FTP_PORT $FTP_HOST << 'EOF'
set ftp:ssl-allow no
set mirror:use-pget-n 5

# Aller dans le dossier de destination
cd /public_html

# Aller dans le dossier source local
lcd /Users/francois/Local\ Sites/website/app/public

echo "📂 Synchronisation des fichiers..."

# Synchroniser uniquement les fichiers modifiés
# --only-newer : ne transfère que les fichiers plus récents
# --verbose : affiche les fichiers transférés
# --parallel : transferts parallèles pour plus de rapidité

mirror -R --only-newer --verbose --parallel=3 \
  --exclude .git/ \
  --exclude .gitignore \
  --exclude node_modules/ \
  --exclude .DS_Store \
  --exclude-glob *.md \
  --exclude package.json \
  --exclude package-lock.json \
  --exclude wp-config-staging.php \
  --exclude create-seo-articles.js \
  --exclude *.html \
  wp-content/themes/eazylink-child /public_html/wp-content/themes/eazylink-child

echo ""
echo "✅ Thème synchronisé"

# Synchroniser les plugins si modifiés
mirror -R --only-newer --verbose --parallel=3 \
  --exclude .git/ \
  --exclude node_modules/ \
  wp-content/plugins /public_html/wp-content/plugins

echo ""
echo "✅ Plugins synchronisés"

# Synchroniser les fichiers PHP à la racine si modifiés
mput -O /public_html wp-*.php
put -O /public_html index.php

echo ""
echo "✅ Fichiers WordPress synchronisés"

bye
EOF

echo ""
echo "🧹 Nettoyage du cache sur le serveur..."

# Vider le cache via SSH
ssh dabe3350@epervier.o2switch.net << 'ENDSSH'
cd ~/public_html
rm -rf wp-content/cache/wp-rocket/* 2>/dev/null || true
rm -rf wp-content/cache/autoptimize/* 2>/dev/null || true
wp cache flush 2>/dev/null || true
wp rewrite flush 2>/dev/null || true
echo "✅ Cache vidé"
ENDSSH

echo ""
echo "=========================================="
echo "✅ DÉPLOIEMENT TERMINÉ AVEC SUCCÈS !"
echo "=========================================="
echo ""
echo "🌐 Votre site : https://eazylink.fr"
echo ""
echo "📊 Fichiers déployés :"
echo "  - Thème eazylink-child"
echo "  - Plugins"
echo "  - Fichiers WordPress core"
echo ""
echo "💡 Conseil : Testez votre site pour vérifier que tout fonctionne"
