#!/bin/bash

# Script pour mettre à jour les URLs dans la base de données

echo "🔄 Mise à jour des URLs dans la base de données"
echo "==============================================="
echo ""
echo "Changement : https://website.local → https://eazylink.fr"
echo ""
read -p "Continuer ? (y/n) " -n 1 -r
echo ""

if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    echo "❌ Annulé"
    exit 1
fi

# Configuration
DB_NAME="dabe3350_wordpress"
DB_USER="dabe3350_wp910"
DB_PASS="A5hq-RSjf-KzJ+"

echo ""
echo "📤 Upload du script SQL..."

# Créer le script SQL
cat > /tmp/update-urls.sql << 'SQL'
-- Mise à jour des URLs
UPDATE wp_options SET option_value = 'https://eazylink.fr' WHERE option_name = 'siteurl' OR option_name = 'home';
UPDATE wp_posts SET guid = REPLACE(guid, 'https://website.local', 'https://eazylink.fr');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'https://website.local', 'https://eazylink.fr');
UPDATE wp_posts SET post_excerpt = REPLACE(post_excerpt, 'https://website.local', 'https://eazylink.fr');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'https://website.local', 'https://eazylink.fr');
UPDATE wp_comments SET comment_content = REPLACE(comment_content, 'https://website.local', 'https://eazylink.fr');
UPDATE wp_comments SET comment_author_url = REPLACE(comment_author_url, 'https://website.local', 'https://eazylink.fr');
UPDATE wp_usermeta SET meta_value = REPLACE(meta_value, 'https://website.local', 'https://eazylink.fr');
SELECT 'URLs mises à jour avec succès!' as status;
SQL

# Uploader et exécuter via FTP + SSH
FTP_HOST="epervier.o2switch.net"
FTP_USER="dabe3350"
FTP_PASS="A5hq-RSjf-KzJ+"

lftp -u $FTP_USER,$FTP_PASS -p 21 $FTP_HOST << 'EOF'
set ftp:ssl-allow no
put /tmp/update-urls.sql -o /home/dabe3350/update-urls.sql
bye
EOF

echo "✅ Script SQL uploadé"
echo ""
echo "🔧 Exécution du script SQL..."
echo ""
echo "⚠️  Vous devez maintenant exécuter cette commande sur le serveur :"
echo ""
echo "mysql -u $DB_USER -p'$DB_PASS' $DB_NAME < ~/update-urls.sql"
echo ""
echo "Ou utilisez WP-CLI :"
echo ""
echo "cd ~/public_html"
echo "wp search-replace 'https://website.local' 'https://eazylink.fr' --all-tables"
echo "wp cache flush"

rm /tmp/update-urls.sql

echo ""
echo "📋 Le fichier SQL est disponible sur le serveur : ~/update-urls.sql"
