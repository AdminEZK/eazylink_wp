#!/bin/bash

# Script pour migrer le site de app/public/ vers public_html/

echo "🔄 Migration du site WordPress..."
echo ""
echo "⚠️  Ce script va :"
echo "1. Sauvegarder l'ancienne version dans ~/backup_old_site"
echo "2. Déplacer app/public/* vers public_html/"
echo "3. Nettoyer les fichiers inutiles"
echo ""

read -p "Voulez-vous continuer ? (y/n) " -n 1 -r
echo ""

if [[ ! $REPLY =~ ^[Yy]$ ]]
then
    echo "❌ Migration annulée"
    exit 1
fi

# Configuration SSH O2Switch
ssh dabe3350@epervier.o2switch.net << 'ENDSSH'

cd ~

echo "📦 Sauvegarde de l'ancienne version..."
mkdir -p backup_old_site_$(date +%Y%m%d_%H%M)
cd public_html

# Sauvegarder uniquement les fichiers WordPress à la racine (pas app/)
tar -czf ~/backup_old_site_$(date +%Y%m%d_%H%M)/old_wordpress.tar.gz \
  --exclude='app' \
  --exclude='backup_*' \
  --exclude='cgi-bin' \
  --exclude='error_log' \
  .

echo "✅ Sauvegarde créée"
echo ""

# Vérifier si app/public existe et contient WordPress
if [ -d "app/public/wp-admin" ]; then
    echo "📂 Nouvelle version trouvée dans app/public/"
    
    # Supprimer les anciens fichiers WordPress à la racine (sauf app/)
    echo "🗑️  Suppression des anciens fichiers..."
    rm -rf wp-admin wp-includes wp-content/*.php
    rm -f wp-*.php index.php xmlrpc.php license.txt readme.html
    
    # Déplacer le contenu de app/public/ vers la racine
    echo "📤 Déplacement de la nouvelle version..."
    cp -R app/public/* .
    cp -R app/public/.htaccess . 2>/dev/null || true
    
    # Nettoyer
    echo "🧹 Nettoyage..."
    rm -rf app/
    
    echo ""
    echo "✅ Migration terminée !"
    echo ""
    echo "📊 Vérification :"
    ls -lah | head -20
    
else
    echo "❌ Erreur : app/public/wp-admin introuvable"
    exit 1
fi

ENDSSH

echo ""
echo "✅ Migration terminée sur le serveur !"
echo ""
echo "🔍 Prochaines étapes :"
echo "1. Testez votre site : https://eazylink.fr"
echo "2. Videz le cache : wp cache flush && wp rewrite flush"
echo "3. Vérifiez les thèmes : wp theme list"
