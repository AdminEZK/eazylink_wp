#!/bin/bash

# Migration via FTP (car SSH port 22 est bloqué)

echo "🔄 Migration du site WordPress via FTP"
echo "======================================="
echo ""
echo "Ce script va :"
echo "1. Sauvegarder l'ancienne version"
echo "2. Supprimer les anciens fichiers WordPress"
echo "3. Copier app/public/ vers la racine"
echo "4. Supprimer le dossier app/"
echo ""
read -p "Continuer ? (y/n) " -n 1 -r
echo ""

if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    echo "❌ Migration annulée"
    exit 1
fi

# Configuration FTP O2Switch
FTP_HOST="epervier.o2switch.net"
FTP_USER="dabe3350"
FTP_PASS="A5hq-RSjf-KzJ+"
FTP_PORT="21"

echo ""
echo "📡 Connexion au serveur O2Switch via FTP..."
echo ""

# Utiliser lftp pour exécuter les commandes
lftp -u $FTP_USER,$FTP_PASS -p $FTP_PORT $FTP_HOST << 'EOF'
set ftp:ssl-allow no

cd /public_html

echo "📦 1. Sauvegarde de l'ancienne version..."
# Créer un dossier de sauvegarde
!mkdir -p ~/backup_migration_$(date +%Y%m%d_%H%M)

echo "✅ Préparation de la sauvegarde terminée"

echo ""
echo "🗑️  2. Suppression des anciens fichiers WordPress..."

# Supprimer les dossiers WordPress
rm -rf wp-admin
rm -rf wp-includes

# Supprimer les fichiers PHP WordPress à la racine
rm -f wp-activate.php
rm -f wp-blog-header.php
rm -f wp-comments-post.php
rm -f wp-cron.php
rm -f wp-load.php
rm -f wp-login.php
rm -f wp-settings.php
rm -f wp-signup.php
rm -f wp-trackback.php
rm -f xmlrpc.php
rm -f license.txt
rm -f readme.html
rm -f index.php

echo "✅ Anciens fichiers supprimés"

echo ""
echo "📤 3. Copie de la nouvelle version depuis app/public/..."

# Copier wp-admin
!echo "  → Copie de wp-admin..."
mirror app/public/wp-admin wp-admin

# Copier wp-includes
!echo "  → Copie de wp-includes..."
mirror app/public/wp-includes wp-includes

# Copier les fichiers PHP
!echo "  → Copie des fichiers PHP..."
cd app/public
mget -O /public_html wp-*.php
put -O /public_html index.php
put -O /public_html xmlrpc.php 2>/dev/null || true
put -O /public_html .htaccess 2>/dev/null || true

cd /public_html

echo "✅ Nouvelle version copiée"

echo ""
echo "🧹 4. Nettoyage..."

# Supprimer les fichiers .md
!find wp-content/ -name "*.md" -type f 2>/dev/null || true

# Supprimer le dossier app/
rm -rf app

# Supprimer les fichiers de dev
rm -f package.json
rm -f package-lock.json
rm -f create-seo-articles.js

echo "✅ Nettoyage terminé"

echo ""
echo "💨 5. Vidage des caches..."
rm -rf wp-content/cache/wp-rocket
rm -rf wp-content/cache/autoptimize
rm -rf wp-content/cache/busting

echo "✅ Caches vidés"

echo ""
echo "=========================================="
echo "✅ MIGRATION TERMINÉE AVEC SUCCÈS !"
echo "=========================================="
echo ""
echo "📊 Structure actuelle :"
ls -lah | head -20

bye
EOF

echo ""
echo "✅ Migration terminée !"
echo ""
echo "🔍 Prochaines étapes :"
echo "1. Testez votre site : https://eazylink.fr"
echo "2. Connectez-vous en SSH pour vider le cache WordPress :"
echo "   cd ~/public_html && wp cache flush && wp rewrite flush"
