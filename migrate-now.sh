#!/bin/bash

# Script de migration : app/public/ → ~/public_html/

echo "🔄 Migration du site WordPress"
echo "================================"
echo ""
echo "Ce script va :"
echo "1. Sauvegarder l'ancienne version"
echo "2. Déplacer app/public/ vers la racine de public_html/"
echo "3. Supprimer le dossier app/"
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
echo "📡 Connexion au serveur O2Switch..."

# Exécuter la migration via SSH
ssh dabe3350@epervier.o2switch.net << 'ENDSSH'

cd ~/public_html

echo ""
echo "📦 1. Sauvegarde de l'ancienne version..."
tar -czf ~/backup_before_migration_$(date +%Y%m%d_%H%M).tar.gz \
  --exclude='app' \
  --exclude='backup_*' \
  --exclude='cgi-bin' \
  --exclude='error_log' \
  . 2>/dev/null

echo "✅ Sauvegarde créée dans ~/backup_before_migration_*.tar.gz"

echo ""
echo "🗑️  2. Suppression des anciens fichiers WordPress..."
rm -rf wp-admin wp-includes
rm -f wp-activate.php wp-blog-header.php wp-comments-post.php wp-cron.php
rm -f wp-load.php wp-login.php wp-settings.php wp-signup.php wp-trackback.php
rm -f xmlrpc.php license.txt readme.html
rm -f index.php

echo "✅ Anciens fichiers supprimés"

echo ""
echo "📤 3. Copie de la nouvelle version depuis app/public/..."

# Copier les dossiers
cp -R app/public/wp-admin .
cp -R app/public/wp-includes .

# Fusionner wp-content (ne pas écraser, juste ajouter)
cp -Rn app/public/wp-content/* wp-content/ 2>/dev/null || true

# Copier les fichiers PHP
cp app/public/wp-*.php .
cp app/public/index.php .
cp app/public/xmlrpc.php . 2>/dev/null || true

# Copier .htaccess si différent
if [ -f app/public/.htaccess ]; then
    cp app/public/.htaccess .
fi

echo "✅ Nouvelle version copiée"

echo ""
echo "🧹 4. Nettoyage..."

# Supprimer les fichiers .md dans wp-content
find wp-content/ -name "*.md" -type f -delete 2>/dev/null || true

# Supprimer le dossier app/
rm -rf app/

# Supprimer les fichiers de dev
rm -f package.json package-lock.json
rm -f create-seo-articles.js
rm -f *.html 2>/dev/null || true

echo "✅ Nettoyage terminé"

echo ""
echo "💨 5. Vidage des caches..."
rm -rf wp-content/cache/wp-rocket/* 2>/dev/null || true
rm -rf wp-content/cache/autoptimize/* 2>/dev/null || true
rm -rf wp-content/cache/busting/* 2>/dev/null || true

# Utiliser WP-CLI si disponible
if command -v wp &> /dev/null; then
    wp cache flush 2>/dev/null || true
    wp rewrite flush 2>/dev/null || true
    echo "✅ Cache WordPress vidé"
fi

echo ""
echo "=========================================="
echo "✅ MIGRATION TERMINÉE AVEC SUCCÈS !"
echo "=========================================="
echo ""
echo "📊 Structure actuelle :"
ls -lah | head -20

echo ""
echo "🎨 Thèmes installés :"
wp theme list 2>/dev/null || echo "WP-CLI non disponible"

echo ""
echo "🌐 Testez votre site : https://eazylink.fr"

ENDSSH

echo ""
echo "✅ Migration terminée sur le serveur !"
echo ""
echo "🔍 Prochaines étapes :"
echo "1. Testez votre site : https://eazylink.fr"
echo "2. Vérifiez toutes les pages"
echo "3. Si tout fonctionne, vous pouvez supprimer les sauvegardes"
