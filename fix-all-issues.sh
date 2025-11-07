#!/bin/bash

# Script pour corriger tous les problèmes restants

echo "🔧 Correction complète du site EazyLink"
echo "======================================="
echo ""

FTP_HOST="epervier.o2switch.net"
FTP_USER="dabe3350"
FTP_PASS="A5hq-RSjf-KzJ+"

# 1. Télécharger le style.css pour vérifier le cadre rouge
echo "📥 1. Téléchargement du style.css..."
lftp -u $FTP_USER,$FTP_PASS -p 21 $FTP_HOST << 'EOF'
set ftp:ssl-allow no
cd /public_html/wp-content/themes/eazylink-child
get style.css -o /tmp/style-child.css
bye
EOF

# Chercher le cadre rouge
echo ""
echo "🔍 Recherche du cadre rouge dans style.css..."
if grep -q "border.*red\|red.*border" /tmp/style-child.css; then
    echo "⚠️  Cadre rouge trouvé !"
    grep -n "border.*red\|red.*border" /tmp/style-child.css
    
    # Supprimer les lignes avec border red
    sed -i.bak '/border.*red\|red.*border/d' /tmp/style-child.css
    
    echo ""
    echo "📤 Upload du style.css corrigé..."
    lftp -u $FTP_USER,$FTP_PASS -p 21 $FTP_HOST << 'EOF'
set ftp:ssl-allow no
cd /public_html/wp-content/themes/eazylink-child
put /tmp/style-child.css -o style.css
bye
EOF
    echo "✅ style.css corrigé et uploadé"
else
    echo "✅ Pas de cadre rouge dans style.css"
fi

# 2. Corriger les URLs via SSH
echo ""
echo "🔄 2. Correction des URLs dans la base de données..."
ssh dabe3350@epervier.o2switch.net << 'ENDSSH'
cd ~/public_html

echo "Remplacement de toutes les variantes d'URL..."
wp search-replace 'website.local' 'eazylink.fr' --all-tables --precise 2>/dev/null || true
wp search-replace 'http://website.local' 'https://eazylink.fr' --all-tables 2>/dev/null || true
wp search-replace 'https://website.local' 'https://eazylink.fr' --all-tables 2>/dev/null || true
wp search-replace '//website.local' '//eazylink.fr' --all-tables 2>/dev/null || true

echo ""
echo "Vidage des caches..."
wp cache flush 2>/dev/null || true
wp transient delete --all 2>/dev/null || true
rm -rf wp-content/cache/* 2>/dev/null || true

echo ""
echo "✅ URLs corrigées et caches vidés"
ENDSSH

# Nettoyer
rm /tmp/style-child.css* 2>/dev/null || true

echo ""
echo "=========================================="
echo "✅ CORRECTION TERMINÉE !"
echo "=========================================="
echo ""
echo "🌐 Testez maintenant : https://eazylink.fr"
echo "💡 Videz le cache de votre navigateur (Ctrl+Shift+Suppr)"
