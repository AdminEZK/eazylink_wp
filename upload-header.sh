#!/bin/bash

# Upload rapide du header.php corrigé

FTP_HOST="epervier.o2switch.net"
FTP_USER="dabe3350"
FTP_PASS="A5hq-RSjf-KzJ+"

echo "📤 Upload du header.php corrigé..."

lftp -u $FTP_USER,$FTP_PASS -p 21 $FTP_HOST << 'EOF'
set ftp:ssl-allow no
cd /public_html/wp-content/themes/eazylink-child
lcd /Users/francois/Local\ Sites/website/app/public/wp-content/themes/eazylink-child
put header.php
ls -lh header.php
bye
EOF

echo ""
echo "✅ header.php uploadé !"
