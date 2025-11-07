#!/bin/bash

# Configuration FTP O2Switch
FTP_HOST="epervier.o2switch.net"
FTP_USER="dabe3350"
FTP_PASS="A5hq-RSjf-KzJ+"
FTP_PORT="21"

# Dossier source (WordPress local)
SOURCE_DIR="/Users/francois/Local Sites/website/app/public"

echo "🚀 Déploiement WordPress vers O2Switch..."
echo "📁 Source: $SOURCE_DIR"
echo "🌐 Serveur: $FTP_HOST"
echo "📂 Destination: /public_html"
echo ""
echo "⚠️  ATTENTION: Cela va transférer tous les fichiers WordPress vers public_html"
echo ""
read -p "Continuer ? (y/n) " -n 1 -r
echo ""

if [[ ! $REPLY =~ ^[Yy]$ ]]
then
    echo "❌ Déploiement annulé"
    exit 1
fi

echo ""
echo "📤 Transfert en cours..."
echo ""

# Utiliser lftp pour le transfert
lftp -u $FTP_USER,$FTP_PASS -p $FTP_PORT $FTP_HOST << 'EOF'
set ftp:ssl-allow no
set mirror:use-pget-n 5
cd public_html
lcd /Users/francois/Local\ Sites/website/app/public

# Transférer tous les fichiers en excluant les fichiers de dev
mirror -R --verbose --parallel=3 \
  --exclude .DS_Store \
  --exclude .git/ \
  --exclude node_modules/ \
  --exclude-glob *.md \
  --exclude package.json \
  --exclude package-lock.json \
  .

bye
EOF

echo ""
echo "✅ Déploiement terminé !"
echo ""
echo "⚠️  N'oubliez pas de :"
echo "1. Configurer wp-config.php avec les identifiants de base de données O2Switch"
echo "2. Importer votre base de données"
echo "3. Mettre à jour les URLs dans la base de données"
