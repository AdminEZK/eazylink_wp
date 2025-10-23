# 🚀 Quick Start - Formulaire de Contact EazyLink

## ⚡ Démarrage en 3 Minutes

### Étape 1️⃣ : Activer la Table (30 secondes)

**Aller sur :** 
```
https://votre-site.com/wp-content/themes/eazylink-child/activate-contact-table.php
```

✅ Vérifier le message "Table créée avec succès"

### Étape 2️⃣ : Configurer l'Email (1 minute)

**Fichier :** `functions.php` **Ligne 919**

```php
$to = 'hello@eazylink.fr'; // ← Remplacer par votre email
```

### Étape 3️⃣ : Tester (1 minute)

**Aller sur :**
```
https://votre-site.com/contact/
```

1. Remplir le formulaire
2. Soumettre
3. Vérifier l'email reçu

---

## ✅ C'est Tout !

Votre formulaire est **opérationnel** avec :
- ✅ Collecte de données
- ✅ Stockage en BDD
- ✅ Envoi d'emails
- ✅ Protection anti-spam (Honeypot)

---

## 🔐 Sécurité Avancée (Optionnel - 5 minutes)

### Ajouter reCAPTCHA v3

1. **Créer un compte :** https://www.google.com/recaptcha/admin
2. **Type :** reCAPTCHA v3
3. **Copier les clés**
4. **Ajouter dans `functions.php` lignes 763-764 :**

```php
define('EAZYLINK_RECAPTCHA_SITE_KEY', 'VOTRE_CLE_SITE');
define('EAZYLINK_RECAPTCHA_SECRET_KEY', 'VOTRE_CLE_SECRETE');
```

**Guide complet :** `RECAPTCHA-CONFIG.md`

---

## 📊 Voir les Messages Reçus

**WordPress Admin → Menu "Contacts"**

Interface avec :
- Liste des messages
- Statut (Nouveau/Lu)
- Actions (Marquer lu, Supprimer)
- Email cliquable pour répondre

---

## 🧪 Tester la Configuration

**Aller sur :**
```
https://votre-site.com/wp-content/themes/eazylink-child/test-contact-system.php
```

Affiche un rapport complet avec score de configuration.

---

## 📧 Configuration SMTP (Recommandé)

Pour garantir la délivrabilité des emails :

1. **Installer :** Plugin "WP Mail SMTP"
2. **Configurer :** Gmail, SendGrid, Mailgun, etc.
3. **Tester :** Envoi d'email de test

---

## 🔍 Vérification Rapide

| Élément | Statut | Action |
|---------|--------|--------|
| Table BDD | ❓ | Vérifier avec activate-contact-table.php |
| Email configuré | ❓ | Vérifier ligne 919 de functions.php |
| Formulaire accessible | ❓ | Tester /contact/ |
| Email reçu | ❓ | Vérifier boîte mail |
| Admin fonctionnel | ❓ | Vérifier menu Contacts |

---

## 📚 Documentation Complète

| Fichier | Contenu |
|---------|---------|
| **FORMULAIRE-CONTACT-README.md** | Guide complet |
| **CONFIGURATION-FORMULAIRE-CONTACT.md** | Configuration détaillée |
| **RECAPTCHA-CONFIG.md** | Guide reCAPTCHA |
| **Ce fichier** | Quick Start |

---

## 🆘 Problèmes Courants

### Email non reçu
→ Installer plugin SMTP

### Erreur "Table n'existe pas"
→ Exécuter activate-contact-table.php

### reCAPTCHA ne fonctionne pas
→ Vérifier les clés dans functions.php

### Message "Session expirée"
→ Rafraîchir la page (F5)

---

## 🎯 Prochaines Étapes

1. ✅ Configurer SMTP
2. ✅ Ajouter reCAPTCHA
3. ✅ Personnaliser les emails
4. ✅ Tester sur mobile
5. ✅ Supprimer les fichiers de test

---

## 🗑️ Nettoyage (Après Installation)

Supprimer ces fichiers (sécurité) :

```
/wp-content/themes/eazylink-child/activate-contact-table.php
/wp-content/themes/eazylink-child/test-contact-system.php
```

---

## ✨ Fonctionnalités Incluses

- ✅ Validation des données
- ✅ Protection anti-spam (Honeypot)
- ✅ reCAPTCHA v3 (optionnel)
- ✅ Stockage en BDD
- ✅ Email admin + client
- ✅ Interface d'administration
- ✅ Conformité RGPD
- ✅ IP tracking
- ✅ Statut des messages

---

**Temps total d'installation : 3-8 minutes**  
**Niveau de difficulté : ⭐ Facile**

🎉 **Félicitations ! Votre formulaire est prêt !**
