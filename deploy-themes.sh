#!/bin/bash

# Configuration FTP O2Switch
FTP_HOST="epervier.o2switch.net"
FTP_USER="dabe3350"
FTP_PASS="A5hq-RSjf-KzJ+"
FTP_PORT="21"

echo "🎨 Déploiement des thèmes WordPress vers O2Switch..."
echo ""

# Transférer les thèmes
lftp -u $FTP_USER,$FTP_PASS -p $FTP_PORT $FTP_HOST << 'EOF'
set ftp:ssl-allow no
set mirror:use-pget-n 5
cd public_html/wp-content/themes

# Supprimer et recréer les dossiers
rm -rf astra
rm -rf eazylink-child

# Transférer le thème Astra
lcd /Users/francois/Local\ Sites/website/app/public/wp-content/themes
mirror -R --verbose --parallel=3 astra

# Transférer le thème enfant EazyLink
mirror -R --verbose --parallel=3 --exclude node_modules/ eazylink-child

ls -la
bye
EOF

echo ""
echo "✅ Thèmes déployés !"
