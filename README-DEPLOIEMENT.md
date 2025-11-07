# 🚀 Guide de Déploiement - EazyLink

## 📋 Vue d'ensemble

Vous avez 2 scripts pour gérer votre site WordPress sur O2Switch :

1. **`migrate-now.sh`** - Migration initiale (à exécuter UNE FOIS)
2. **`deploy-production.sh`** - Déploiement automatique (à utiliser après chaque modification)

---

## 🔄 1. Migration Initiale (À FAIRE MAINTENANT)

Cette étape déplace le contenu de `app/public/` vers `~/public_html/` sur le serveur.

### Exécution

```bash
chmod +x migrate-now.sh
./migrate-now.sh
```

### Ce que fait le script

1. ✅ Sauvegarde l'ancienne version
2. ✅ Supprime les anciens fichiers WordPress
3. ✅ Copie la nouvelle version depuis `app/public/`
4. ✅ Supprime le dossier `app/`
5. ✅ Nettoie les fichiers inutiles
6. ✅ Vide les caches

### Après la migration

- Testez votre site : https://eazylink.fr
- Vérifiez toutes les pages
- Si tout fonctionne, vous pouvez supprimer les sauvegardes sur le serveur

---

## 🚀 2. Déploiement Automatique (WORKFLOW QUOTIDIEN)

Après avoir fait des modifications en local, utilisez ce workflow :

### Workflow Git + Déploiement

```bash
# 1. Faire vos modifications en local
# 2. Commiter vos changements
git add .
git commit -m "Description de vos modifications"
git push

# 3. Déployer vers O2Switch
./deploy-production.sh
```

### Ce que fait le script de déploiement

1. ✅ Vérifie l'état Git
2. ✅ Affiche le dernier commit
3. ✅ Synchronise uniquement les fichiers modifiés
4. ✅ Déploie directement dans `~/public_html/`
5. ✅ Vide automatiquement les caches
6. ✅ Transfert rapide (seulement les fichiers changés)

### Avantages

- 🚀 **Rapide** : Synchronise uniquement les fichiers modifiés
- 🔒 **Sécurisé** : Vérifie l'état Git avant déploiement
- 🧹 **Propre** : Vide automatiquement les caches
- 📦 **Ciblé** : Déploie thèmes, plugins et fichiers core

---

## 📁 Structure après migration

```
~/public_html/                    ← Site WordPress actif
├── wp-admin/                     ← Administration WordPress
├── wp-content/
│   ├── themes/
│   │   ├── astra/               ← Thème parent
│   │   └── eazylink-child/      ← Votre thème personnalisé
│   ├── plugins/                 ← Vos plugins
│   └── uploads/                 ← Médias
├── wp-includes/                 ← Core WordPress
├── wp-config.php                ← Configuration
└── index.php                    ← Point d'entrée
```

**Plus de dossier `app/` !** Tout est à la racine de `public_html/`.

---

## 🔧 Commandes utiles sur le serveur

### Connexion SSH
```bash
ssh dabe3350@epervier.o2switch.net
```

### Vider le cache manuellement
```bash
cd ~/public_html
rm -rf wp-content/cache/wp-rocket/*
wp cache flush
wp rewrite flush
```

### Vérifier les thèmes
```bash
wp theme list
```

### Vérifier les plugins
```bash
wp plugin list
```

### Voir les logs d'erreur
```bash
tail -50 ~/public_html/error_log
```

---

## ⚠️ Important

### À NE PAS déployer

Ces fichiers sont automatiquement exclus :
- ❌ `.git/` et `.gitignore`
- ❌ `node_modules/`
- ❌ Fichiers `.md` (documentation)
- ❌ `package.json` / `package-lock.json`
- ❌ Fichiers HTML de démo
- ❌ Scripts de développement

### À déployer

- ✅ Thème `eazylink-child/`
- ✅ Plugins WordPress
- ✅ Fichiers PHP WordPress
- ✅ Médias dans `uploads/`
- ✅ Configuration (si modifiée)

---

## 🆘 En cas de problème

### Le site ne fonctionne pas après migration

```bash
# Sur le serveur
cd ~/public_html
wp theme activate eazylink-child
wp cache flush
wp rewrite flush
```

### Restaurer une sauvegarde

```bash
# Lister les sauvegardes
ls -lh ~/backup_*

# Restaurer (remplacer DATE par la date de votre sauvegarde)
cd ~/public_html
tar -xzf ~/backup_before_migration_DATE.tar.gz
```

### Problème de permissions

```bash
# Corriger les permissions
find ~/public_html -type d -exec chmod 755 {} \;
find ~/public_html -type f -exec chmod 644 {} \;
```

---

## 📞 Support

- **Serveur** : O2Switch (epervier.o2switch.net)
- **Site** : https://eazylink.fr
- **Admin WordPress** : https://eazylink.fr/wp-admin

---

## ✅ Checklist de déploiement

Avant chaque déploiement :

- [ ] Modifications testées en local
- [ ] Git commit effectué
- [ ] Git push effectué
- [ ] Script `deploy-production.sh` exécuté
- [ ] Site testé en production
- [ ] Cache vidé si nécessaire
