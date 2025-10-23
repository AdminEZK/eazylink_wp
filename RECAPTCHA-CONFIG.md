# 🔐 Configuration Google reCAPTCHA v3 - Guide Rapide

## 📝 Étapes de Configuration

### 1. Créer un Compte reCAPTCHA

1. Aller sur : **https://www.google.com/recaptcha/admin/create**
2. Se connecter avec un compte Google

### 2. Enregistrer un Nouveau Site

Remplir le formulaire :

- **Libellé** : `EazyLink Contact Form`
- **Type de reCAPTCHA** : Sélectionner **reCAPTCHA v3**
- **Domaines** : 
  - `eazylink.fr`
  - `www.eazylink.fr`
  - `localhost` (pour les tests en local)
- **Accepter les conditions** : Cocher la case
- Cliquer sur **Envoyer**

### 3. Copier les Clés

Vous recevrez deux clés :

```
Clé du site (Site Key) : 6LdXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
Clé secrète (Secret Key) : 6LdYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
```

### 4. Ajouter les Clés dans WordPress

**Ouvrir le fichier :** `/app/public/wp-content/themes/eazylink-child/functions.php`

**Modifier les lignes 763-764 :**

```php
// AVANT (vide)
define('EAZYLINK_RECAPTCHA_SITE_KEY', '');
define('EAZYLINK_RECAPTCHA_SECRET_KEY', '');

// APRÈS (avec vos clés)
define('EAZYLINK_RECAPTCHA_SITE_KEY', '6LdXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
define('EAZYLINK_RECAPTCHA_SECRET_KEY', '6LdYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY');
```

### 5. Tester le Formulaire

1. Aller sur : **https://eazylink.fr/contact/**
2. Remplir et soumettre le formulaire
3. Vérifier que le message de succès s'affiche
4. Vérifier la console du navigateur (F12) pour voir le score reCAPTCHA

---

## 🎯 Comment fonctionne reCAPTCHA v3 ?

### Différence avec v2

- **v2** : Case "Je ne suis pas un robot" (visible)
- **v3** : **Invisible**, analyse le comportement de l'utilisateur

### Score de Confiance

reCAPTCHA v3 attribue un **score de 0.0 à 1.0** :

- **1.0** = Très probablement humain ✅
- **0.5** = Seuil par défaut (configuré dans le code)
- **0.0** = Très probablement un bot ❌

### Configuration du Seuil

**Modifier dans `functions.php` ligne 807 :**

```php
// Seuil par défaut : 0.5
return isset($body->success) && $body->success && $body->score >= 0.5;

// Plus strict (moins de spam, mais peut bloquer des humains)
return isset($body->success) && $body->success && $body->score >= 0.7;

// Plus permissif (plus de spam, mais moins de faux positifs)
return isset($body->success) && $body->success && $body->score >= 0.3;
```

---

## 🔍 Vérifier que reCAPTCHA Fonctionne

### Dans la Console du Navigateur

1. Ouvrir la page `/contact/`
2. Appuyer sur **F12** (outils développeur)
3. Onglet **Console**
4. Soumettre le formulaire
5. Chercher : `grecaptcha` dans les logs

### Dans l'Admin Google reCAPTCHA

1. Aller sur : **https://www.google.com/recaptcha/admin**
2. Cliquer sur votre site
3. Voir les **statistiques** :
   - Nombre de requêtes
   - Distribution des scores
   - Détection de bots

---

## 🚨 Dépannage

### Le formulaire ne se soumet pas

**Vérifier dans la console (F12) :**

```
Uncaught ReferenceError: grecaptcha is not defined
```

**Solution :** Les clés ne sont pas configurées ou le script ne se charge pas.

### Erreur "recaptcha_failed"

**Causes possibles :**
- Score < 0.5 (comportement suspect)
- Clé secrète incorrecte
- Domaine non autorisé

**Solution :**
1. Vérifier que le domaine est ajouté dans l'admin reCAPTCHA
2. Vérifier que la clé secrète est correcte
3. Baisser le seuil temporairement pour tester

### Le script reCAPTCHA ne se charge pas

**Vérifier :**
1. Que vous êtes sur la page `/contact/`
2. Que les clés ne sont pas vides
3. Que le fichier `functions.php` est bien sauvegardé

**Forcer le rechargement :**
```
Ctrl + Shift + R (Windows/Linux)
Cmd + Shift + R (Mac)
```

---

## 🔒 Sécurité des Clés

### ⚠️ NE JAMAIS :

- ❌ Partager la **clé secrète** publiquement
- ❌ Commiter la clé secrète sur GitHub
- ❌ L'envoyer par email non chiffré

### ✅ TOUJOURS :

- ✅ Garder la clé secrète dans `functions.php` (non accessible publiquement)
- ✅ Utiliser des variables d'environnement en production
- ✅ Régénérer les clés si elles sont compromises

### Configuration avec Variables d'Environnement (Avancé)

**Créer un fichier `.env` :**

```
RECAPTCHA_SITE_KEY=6LdXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
RECAPTCHA_SECRET_KEY=6LdYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY
```

**Modifier `functions.php` :**

```php
define('EAZYLINK_RECAPTCHA_SITE_KEY', getenv('RECAPTCHA_SITE_KEY'));
define('EAZYLINK_RECAPTCHA_SECRET_KEY', getenv('RECAPTCHA_SECRET_KEY'));
```

---

## 📊 Statistiques et Monitoring

### Tableau de Bord reCAPTCHA

**URL :** https://www.google.com/recaptcha/admin

**Métriques disponibles :**
- Nombre de requêtes par jour
- Distribution des scores
- Taux de détection de bots
- Erreurs et alertes

### Alertes Recommandées

Configurer des alertes pour :
- Pic de requêtes suspect
- Taux de bots élevé
- Erreurs de validation

---

## 🎨 Personnalisation (Optionnel)

### Badge reCAPTCHA

Par défaut, reCAPTCHA v3 affiche un badge en bas à droite.

**Pour le cacher (déconseillé) :**

Ajouter dans votre CSS :

```css
.grecaptcha-badge {
    visibility: hidden;
}
```

**⚠️ Important :** Si vous cachez le badge, vous DEVEZ afficher ce texte :

```html
Ce site est protégé par reCAPTCHA et la 
<a href="https://policies.google.com/privacy">Politique de confidentialité</a> et les 
<a href="https://policies.google.com/terms">Conditions d'utilisation</a> de Google s'appliquent.
```

---

## ✅ Checklist de Configuration

- [ ] Compte Google créé
- [ ] Site enregistré sur reCAPTCHA admin
- [ ] Type **v3** sélectionné
- [ ] Domaines ajoutés (eazylink.fr, www.eazylink.fr)
- [ ] Clé du site copiée
- [ ] Clé secrète copiée
- [ ] Clés ajoutées dans `functions.php` (lignes 763-764)
- [ ] Fichier sauvegardé
- [ ] Cache WordPress vidé
- [ ] Test du formulaire réussi
- [ ] Score reCAPTCHA visible dans la console
- [ ] Email de confirmation reçu

---

## 🔗 Ressources Utiles

- **Admin reCAPTCHA :** https://www.google.com/recaptcha/admin
- **Documentation :** https://developers.google.com/recaptcha/docs/v3
- **FAQ :** https://developers.google.com/recaptcha/docs/faq
- **Scores et Interprétation :** https://developers.google.com/recaptcha/docs/v3#interpreting_the_score

---

**Note :** Si vous ne configurez pas reCAPTCHA (clés vides), le formulaire fonctionnera quand même avec la protection Honeypot uniquement.
