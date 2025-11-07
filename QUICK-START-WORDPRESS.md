# 🚀 Quick Start - WordPress EazyLink

## 🔐 Configuration WordPress pour n8n

### Méthode Recommandée : Application Passwords

---

## 📝 Étape 1 : Créer un Application Password

### 1. Se Connecter à WordPress
```
URL: https://eazylink.fr/wp-admin
```

### 2. Aller dans ton Profil
1. Cliquer sur ton nom en haut à droite
2. **Modifier le profil**
3. Descendre jusqu'à **Mots de passe d'application**

### 3. Créer un Nouveau Mot de Passe
1. **Nom de la nouvelle application** : `n8n EazyLink`
2. Cliquer sur **Ajouter un nouveau mot de passe d'application**
3. **Copier le mot de passe généré** (format : `xxxx xxxx xxxx xxxx xxxx xxxx`)

⚠️ **IMPORTANT** : Ce mot de passe ne sera affiché qu'une seule fois !

**Exemple** :
```
abcd efgh ijkl mnop qrst uvwx
```

### 4. Sauvegarder
- Username : Ton email WordPress (ex: `francois@eazylink.fr`)
- Password : Le mot de passe généré (avec ou sans espaces)

---

## 🔧 Étape 2 : Vérifier les Prérequis WordPress

### 1. Vérifier que l'API REST est Active

Ouvrir dans un navigateur :
```
https://eazylink.fr/wp-json/wp/v2/posts
```

**Réponse attendue** : JSON avec liste des posts (ou tableau vide)

**Si erreur 404** → L'API REST n'est pas activée

### 2. Installer les Plugins Requis

#### Plugin 1 : Yoast SEO (Recommandé)
```
WordPress Admin → Extensions → Ajouter
Chercher : "Yoast SEO"
Installer et Activer
```

#### Plugin 2 : Classic Editor (Optionnel)
Si tu veux utiliser l'éditeur classique au lieu de Gutenberg

#### Plugin 3 : Application Passwords (WordPress 5.6+)
Normalement inclus par défaut dans WordPress 5.6+

---

## 🔑 Étape 3 : Configurer dans n8n

### 1. Ajouter les Credentials WordPress

Dans n8n :
1. **Credentials** → **+ Add Credential**
2. Type : **WordPress API**
3. Remplir :
   - **URL** : `https://eazylink.fr`
   - **Username** : Ton email WordPress
   - **Password** : Le Application Password (avec ou sans espaces)

### 2. Tester la Connexion

Créer un workflow test :
```json
{
  "nodes": [
    {
      "name": "Test WordPress",
      "type": "n8n-nodes-base.wordpress",
      "parameters": {
        "resource": "post",
        "operation": "getAll"
      }
    }
  ]
}
```

Exécuter → Tu devrais voir tes posts WordPress !

---

## 📊 Étape 4 : Configurer les Catégories

### 1. Créer les Catégories dans WordPress

```
WordPress Admin → Articles → Catégories
```

**Catégories à créer** :
- Excellence Opérationnelle
- Transformation Digitale
- IA Générative
- Stratégie & Innovation
- Cas d'Usage
- Tendances IA

### 2. Noter les IDs des Catégories

Pour chaque catégorie, noter son ID :
```
WordPress Admin → Articles → Catégories
Survoler une catégorie → L'URL montre : tag_ID=123
```

**Exemple** :
```
Excellence Opérationnelle → ID: 5
Transformation Digitale → ID: 6
IA Générative → ID: 7
```

---

## 🏷️ Étape 5 : Configurer les Tags

### 1. Créer des Tags Communs

```
WordPress Admin → Articles → Étiquettes
```

**Tags recommandés** :
- IA générative
- ChatGPT
- Automatisation
- ROI
- Productivité
- Innovation
- Stratégie
- Transformation
- Digital
- Entreprise

---

## 🎨 Étape 6 : Configurer les Médias

### 1. Vérifier les Permissions Upload

```
WordPress Admin → Réglages → Médias
```

**Taille maximale** : Au moins 5 MB
**Formats autorisés** : JPG, PNG, WebP

### 2. Créer un Dossier pour les Images IA

Optionnel : Organiser les images générées par DALL-E dans un dossier spécifique

---

## 🔐 Étape 7 : Sécurité et Permissions

### 1. Vérifier les Permissions Utilisateur

Ton compte doit avoir le rôle **Administrateur** ou **Éditeur**

### 2. Limiter l'Accès aux Application Passwords

Seul ton compte devrait avoir des Application Passwords pour n8n

### 3. Révoquer un Application Password

Si nécessaire :
```
WordPress Admin → Profil → Mots de passe d'application
Cliquer sur "Révoquer" à côté du mot de passe
```

---

## 📝 Étape 8 : Configuration Yoast SEO

### 1. Activer l'API REST de Yoast

```
WordPress Admin → SEO → Général → Fonctionnalités
Activer : "API REST"
```

### 2. Configurer les Champs Personnalisés

Le workflow n8n va remplir automatiquement :
- `yoast_wpseo_title` → Titre SEO
- `yoast_wpseo_metadesc` → Meta description
- `yoast_wpseo_focuskw` → Mot-clé principal

---

## 🧪 Étape 9 : Test de Publication

### Test Manuel dans n8n

Créer un workflow test :
```json
{
  "nodes": [
    {
      "name": "Publier Test",
      "type": "n8n-nodes-base.wordpress",
      "parameters": {
        "resource": "post",
        "operation": "create",
        "title": "Test Article n8n",
        "content": "<p>Ceci est un test de publication automatique.</p>",
        "status": "draft",
        "categories": "5"
      }
    }
  ]
}
```

**Vérifier** :
1. L'article apparaît dans WordPress (Brouillons)
2. Le titre est correct
3. Le contenu est formaté
4. La catégorie est assignée

---

## 📊 Informations Utiles

### URL de l'API WordPress
```
https://eazylink.fr/wp-json/wp/v2/
```

### Endpoints Utilisés par n8n
```
/wp/v2/posts          → Articles
/wp/v2/media          → Images
/wp/v2/categories     → Catégories
/wp/v2/tags           → Tags
/wp/v2/users          → Utilisateurs
```

### Tester un Endpoint
```
https://eazylink.fr/wp-json/wp/v2/posts?per_page=5
```

---

## 🛠️ Dépannage

### Erreur : "Unauthorized"
**Cause** : Application Password incorrect
**Solution** : Régénérer un nouveau Application Password

### Erreur : "REST API disabled"
**Cause** : API REST désactivée
**Solution** : Vérifier les plugins de sécurité (Wordfence, etc.)

### Erreur : "Forbidden"
**Cause** : Permissions insuffisantes
**Solution** : Vérifier que ton compte est Administrateur

### Images ne s'uploadent pas
**Cause** : Limite de taille ou permissions
**Solution** : Augmenter `upload_max_filesize` dans php.ini

---

## ✅ Checklist Finale

- [ ] Application Password créé
- [ ] API REST testée et fonctionnelle
- [ ] Yoast SEO installé et configuré
- [ ] Catégories créées
- [ ] Tags créés
- [ ] Credentials WordPress ajoutés dans n8n
- [ ] Test de publication réussi

---

## 🎯 Résumé Configuration

**Ce dont tu as besoin pour n8n** :
```
URL: https://eazylink.fr
Username: francois@eazylink.fr (ton email WP)
Password: abcd efgh ijkl mnop qrst uvwx (Application Password)
```

**Prochaine étape** : Configuration OpenAI !
