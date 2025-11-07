#!/bin/bash

# Migration simple et directe via FTP

echo "🔄 Migration WordPress - Version Simplifiée"
echo "============================================"
echo ""

# Configuration
FTP_HOST="epervier.o2switch.net"
FTP_USER="dabe3350"
FTP_PASS="A5hq-RSjf-KzJ+"
FTP_PORT="21"

read -p "Lancer la migration ? (y/n) " -n 1 -r
echo ""

if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    exit 1
fi

echo ""
echo "📤 Étape 1/3 : Copie de wp-admin..."
lftp -u $FTP_USER,$FTP_PASS -p $FTP_PORT $FTP_HOST << 'EOF'
set ftp:ssl-allow no
cd /public_html
rm -rf wp-admin
mirror -R /Users/francois/Local\ Sites/website/app/public/wp-admin wp-admin
bye
EOF

echo "✅ wp-admin copié"
echo ""
echo "📤 Étape 2/3 : Copie de wp-includes..."
lftp -u $FTP_USER,$FTP_PASS -p $FTP_PORT $FTP_HOST << 'EOF'
set ftp:ssl-allow no
cd /public_html
rm -rf wp-includes
mirror -R /Users/francois/Local\ Sites/website/app/public/wp-includes wp-includes
bye
EOF

echo "✅ wp-includes copié"
echo ""
echo "📤 Étape 3/3 : Copie des fichiers PHP..."
lftp -u $FTP_USER,$FTP_PASS -p $FTP_PORT $FTP_HOST << 'EOF'
set ftp:ssl-allow no
cd /public_html
lcd /Users/francois/Local\ Sites/website/app/public
mput wp-*.php
put index.php
put xmlrpc.php
put .htaccess
bye
EOF

echo "✅ Fichiers PHP copiés"
echo ""
echo "🧹 Nettoyage..."
lftp -u $FTP_USER,$FTP_PASS -p $FTP_PORT $FTP_HOST << 'EOF'
set ftp:ssl-allow no
cd /public_html
rm -rf app
rm -rf wp-content/cache/wp-rocket
ls -lah
bye
EOF

echo ""
echo "✅ Migration terminée !"
echo ""
echo "🌐 Testez : https://eazylink.fr"
