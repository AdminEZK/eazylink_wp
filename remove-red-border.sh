#!/bin/bash

# Supprimer le cadre rouge de test

FTP_HOST="epervier.o2switch.net"
FTP_USER="dabe3350"
FTP_PASS="A5hq-RSjf-KzJ+"

echo "🔍 Recherche du cadre rouge..."

# Télécharger le style.css
lftp -u $FTP_USER,$FTP_PASS -p 21 $FTP_HOST << 'EOF'
set ftp:ssl-allow no
cd /public_html/wp-content/themes/eazylink-child
get style.css -o /tmp/style-eazylink.css
bye
EOF

# Chercher et afficher les lignes avec border red
echo ""
echo "📋 Lignes contenant 'border' et 'red' :"
grep -n "border.*red\|red.*border" /tmp/style-eazylink.css || echo "Aucune trouvée dans style.css"

echo ""
echo "Vérifier aussi dans les autres fichiers CSS..."
