#!/bin/bash

# Correction rapide du wp-config.php avec la bonne base de données

echo "🔧 Correction de wp-config.php"
echo "Base de données : dabe3350_wordpress"
echo ""

# Configuration FTP
FTP_HOST="epervier.o2switch.net"
FTP_USER="dabe3350"
FTP_PASS="A5hq-RSjf-KzJ+"
FTP_PORT="21"

# Télécharger le wp-config.php actuel
echo "📥 Téléchargement du wp-config.php actuel..."
lftp -u $FTP_USER,$FTP_PASS -p $FTP_PORT $FTP_HOST << 'EOF'
set ftp:ssl-allow no
cd /public_html
get wp-config.php -o /tmp/wp-config-backup.php
bye
EOF

# Modifier le nom de la base de données
echo "✏️  Modification du nom de la base de données..."
sed "s/dabe3350_staging.eazylink/dabe3350_wordpress/g" /tmp/wp-config-backup.php > /tmp/wp-config-fixed.php

# Vérifier le changement
echo ""
echo "📋 Nouvelle configuration :"
grep "DB_NAME\|DB_USER\|DB_PASSWORD\|DB_HOST" /tmp/wp-config-fixed.php
echo ""

read -p "Uploader cette configuration ? (y/n) " -n 1 -r
echo ""

if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    echo "❌ Annulé"
    rm /tmp/wp-config-*.php
    exit 1
fi

# Uploader le fichier corrigé
echo ""
echo "📤 Upload du wp-config.php corrigé..."
lftp -u $FTP_USER,$FTP_PASS -p $FTP_PORT $FTP_HOST << 'EOF'
set ftp:ssl-allow no
cd /public_html
put /tmp/wp-config-fixed.php -o wp-config.php
ls -lh wp-config.php
bye
EOF

# Nettoyer
rm /tmp/wp-config-*.php

echo ""
echo "✅ wp-config.php mis à jour !"
echo ""
echo "🌐 Testez votre site : https://eazylink.fr"
echo ""
echo "Si vous voyez toujours une erreur de connexion :"
echo "1. Vérifiez que la base 'dabe3350_wordpress' existe dans cPanel"
echo "2. Vérifiez que l'utilisateur 'dabe3350_wp910' a accès à cette base"
