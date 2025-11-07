#!/bin/bash

# Configuration FTP O2Switch
FTP_HOST="epervier.o2switch.net"
FTP_USER="dabe3350"
FTP_PASS="A5hq-RSjf-KzJ+"
FTP_PORT="21"

echo "🔍 Vérification de l'installation WordPress sur O2Switch..."
echo ""

# Connexion SSH pour vérifier l'état du serveur
ssh dabe3350@epervier.o2switch.net << 'ENDSSH'

echo "📂 Contenu de public_html:"
ls -lah public_html/

echo ""
echo "📄 Vérification du fichier wp-config.php:"
if [ -f public_html/wp-config.php ]; then
    echo "✅ wp-config.php existe"
    echo ""
    echo "🔍 Configuration de la base de données:"
    grep "DB_NAME\|DB_USER\|DB_HOST" public_html/wp-config.php | grep -v "//"
else
    echo "❌ wp-config.php n'existe pas"
fi

echo ""
echo "🗄️  Bases de données disponibles:"
mysql -e "SHOW DATABASES;"

echo ""
echo "📊 Informations sur les bases de données:"
mysql -e "SELECT SCHEMA_NAME, DEFAULT_CHARACTER_SET_NAME, DEFAULT_COLLATION_NAME FROM information_schema.SCHEMATA WHERE SCHEMA_NAME NOT IN ('information_schema', 'mysql', 'performance_schema', 'sys');"

echo ""
echo "🌐 Version PHP:"
php -v | head -n 1

echo ""
echo "📍 Répertoire actuel:"
pwd

echo ""
echo "💾 Espace disque:"
df -h | grep home

ENDSSH

echo ""
echo "✅ Vérification terminée"
