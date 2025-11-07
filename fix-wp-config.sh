#!/bin/bash

# Script pour corriger wp-config.php sur O2Switch

echo "🔧 Correction de wp-config.php"
echo "=============================="
echo ""
echo "Base de données actuelle : dabe3350_staging.eazylink"
echo ""
echo "Quelle base de données voulez-vous utiliser ?"
echo "1) dabe3350_eazylink (production)"
echo "2) dabe3350_wordpress"
echo "3) Autre (à saisir)"
echo ""
read -p "Votre choix (1/2/3) : " choice

case $choice in
    1)
        DB_NAME="dabe3350_eazylink"
        ;;
    2)
        DB_NAME="dabe3350_wordpress"
        ;;
    3)
        read -p "Nom de la base de données : " DB_NAME
        ;;
    *)
        echo "❌ Choix invalide"
        exit 1
        ;;
esac

echo ""
echo "📝 Configuration :"
echo "  Base de données : $DB_NAME"
echo "  Utilisateur : dabe3350_wp910"
echo "  Hôte : localhost"
echo ""
read -p "Confirmer ? (y/n) " -n 1 -r
echo ""

if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    echo "❌ Annulé"
    exit 1
fi

# Configuration FTP
FTP_HOST="epervier.o2switch.net"
FTP_USER="dabe3350"
FTP_PASS="A5hq-RSjf-KzJ+"
FTP_PORT="21"

# Créer un nouveau wp-config.php temporaire
cat > /tmp/wp-config-fix.txt << WPCONFIG
<?php
/**
 * Configuration WordPress - EazyLink Production
 */

// ** Réglages MySQL ** //
define( 'DB_NAME', '$DB_NAME' );
define( 'DB_USER', 'dabe3350_wp910' );
define( 'DB_PASSWORD', 'A5hq-RSjf-KzJ+' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// ** Clés d'authentification ** //
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

// ** Préfixe de table ** //
\$table_prefix = 'wp_';

// ** Mode debug ** //
define( 'WP_DEBUG', false );

// ** Chemin absolu ** //
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
WPCONFIG

echo ""
echo "📤 Upload du nouveau wp-config.php..."

# Uploader via FTP
lftp -u $FTP_USER,$FTP_PASS -p $FTP_PORT $FTP_HOST << EOF
set ftp:ssl-allow no
cd /public_html
put /tmp/wp-config-fix.txt -o wp-config.php
ls -lh wp-config.php
bye
EOF

# Nettoyer
rm /tmp/wp-config-fix.txt

echo ""
echo "✅ wp-config.php mis à jour !"
echo ""
echo "🌐 Testez votre site : https://eazylink.fr"
