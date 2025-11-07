#!/bin/bash

# Configuration FTP O2Switch
FTP_HOST="epervier.o2switch.net"
FTP_USER="dabe3350"
FTP_PASS="A5hq-RSjf-KzJ+"
FTP_PORT="21"

echo "🔧 Correction du fichier functions.php sur O2Switch..."
echo ""

# Transférer le bon fichier functions.php
lftp -u $FTP_USER,$FTP_PASS -p $FTP_PORT $FTP_HOST << 'EOF'
set ftp:ssl-allow no
cd public_html/wp-content/themes/eazylink-child
put /Users/francois/Local\ Sites/website/app/public/wp-content/themes/eazylink-child/functions.php
ls -l functions.php
bye
EOF

echo ""
echo "✅ Fichier functions.php mis à jour !"
echo ""
echo "🧹 Nettoyage des fichiers .md inutiles..."

# Supprimer les fichiers .md du serveur
lftp -u $FTP_USER,$FTP_PASS -p $FTP_PORT $FTP_HOST << 'EOF'
set ftp:ssl-allow no
cd public_html
rm -f *.md
ls -lah | head -20
bye
EOF

echo ""
echo "✅ Nettoyage terminé !"
