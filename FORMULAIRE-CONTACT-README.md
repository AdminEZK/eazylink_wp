# 📧 Formulaire de Contact EazyLink - Guide Complet

## 🎯 Vue d'Ensemble

Système complet de formulaire de contact avec :
- ✅ **Collecte de données** sécurisée
- ✅ **Stockage en base de données** WordPress
- ✅ **Envoi d'emails** (admin + client)
- ✅ **Protection anti-spam** (Honeypot + reCAPTCHA v3)
- ✅ **Interface d'administration** dédiée
- ✅ **Vérification de confidentialité** obligatoire

---

## 🚀 Installation Rapide (5 minutes)

### Étape 1 : Activer la Table de Base de Données

**Option A - Via Script d'Activation (Recommandé)**

1. Aller sur : `https://votre-site.com/wp-content/themes/eazylink-child/activate-contact-table.php`
2. Vérifier que le message "✅ Table créée avec succès !" s'affiche
3. Supprimer le fichier `activate-contact-table.php` (sécurité)

**Option B - Automatique au Changement de Thème**

La table se crée automatiquement quand vous activez/changez de thème.

**Option C - Manuelle via phpMyAdmin**

Exécuter le SQL fourni dans `CONFIGURATION-FORMULAIRE-CONTACT.md`

### Étape 2 : Configurer l'Email de Réception

**Fichier :** `/app/public/wp-content/themes/eazylink-child/functions.php`

**Ligne 919 :** Remplacer par votre email

```php
$to = 'hello@eazylink.fr'; // ← Votre email ici
```

### Étape 3 : Configurer reCAPTCHA (Optionnel)

**Voir le guide :** `RECAPTCHA-CONFIG.md`

1. Créer un compte sur https://www.google.com/recaptcha/admin
2. Obtenir les clés (Site Key + Secret Key)
3. Les ajouter dans `functions.php` lignes 763-764

**Si vous sautez cette étape :** Le formulaire fonctionnera avec protection Honeypot uniquement.

### Étape 4 : Tester

1. Aller sur `/contact/`
2. Remplir et soumettre le formulaire
3. Vérifier :
   - ✅ Message "✅ Merci ! Votre message a bien été envoyé"
   - ✅ Email reçu dans votre boîte
   - ✅ Email de confirmation reçu par le client
   - ✅ Message visible dans WordPress Admin > Contacts

---

## 📁 Fichiers Modifiés/Créés

### Fichiers Modifiés

1. **`functions.php`** (320 lignes ajoutées)
   - Configuration reCAPTCHA
   - Traitement du formulaire
   - Stockage en BDD
   - Envoi d'emails
   - Page d'administration

2. **`page-contact.php`** (30 lignes modifiées)
   - Support reCAPTCHA
   - Messages d'erreur améliorés
   - Champ token caché

### Fichiers Créés

1. **`CONFIGURATION-FORMULAIRE-CONTACT.md`** - Documentation complète
2. **`RECAPTCHA-CONFIG.md`** - Guide reCAPTCHA
3. **`activate-contact-table.php`** - Script d'activation (à supprimer après usage)
4. **`FORMULAIRE-CONTACT-README.md`** - Ce fichier

---

## 🔐 Sécurité Implémentée

### Protections Actives

| Protection | Description | Statut |
|------------|-------------|--------|
| **Nonce WordPress** | Anti-CSRF | ✅ Actif |
| **Honeypot** | Champ caché anti-bot | ✅ Actif |
| **reCAPTCHA v3** | Score de confiance Google | ⚙️ Optionnel |
| **Validation Email** | Format vérifié | ✅ Actif |
| **Sanitization** | Nettoyage des données | ✅ Actif |
| **IP Tracking** | Traçabilité | ✅ Actif |
| **Privacy Check** | Case obligatoire | ✅ Actif |

### Données Collectées

**Champs du formulaire :**
- Nom (obligatoire)
- Email (obligatoire)
- Entreprise (optionnel)
- Téléphone (optionnel)
- Sujet (demande générale / devis)
- Message (obligatoire)
- Acceptation confidentialité (obligatoire)

**Métadonnées automatiques :**
- IP du visiteur
- User-Agent (navigateur)
- Date/heure de soumission
- Statut (nouveau/lu)

---

## 📊 Interface d'Administration

### Accès

**WordPress Admin > Contacts** (icône email dans le menu)

### Fonctionnalités

- **Liste complète** : Tous les messages reçus
- **Indicateur visuel** : Nouveaux messages en surbrillance jaune
- **Actions** :
  - ✅ Marquer comme lu
  - 🗑️ Supprimer
  - 📧 Répondre (clic sur email)
- **Tri** : Par date décroissante

### Colonnes Affichées

| Colonne | Contenu |
|---------|---------|
| ID | Numéro unique |
| Nom | Nom du contact |
| Email | Email cliquable |
| Entreprise | Société |
| Sujet | Type de demande |
| Message | Aperçu (10 mots) |
| Date | Date/heure |
| Statut | Nouveau / Lu |
| Actions | Boutons |

---

## 📧 Emails Envoyés

### 1. Email Administrateur

**Destinataire :** Email configuré (ligne 919)  
**Sujet :** `[EazyLink] Nouveau message de contact - [Sujet]`  
**Format :** HTML stylisé  
**Contenu :**
- Nom, Email, Entreprise, Téléphone
- Sujet de la demande
- Message complet
- IP et date

### 2. Email Client (Confirmation)

**Destinataire :** Email du client  
**Sujet :** `Confirmation de réception - EazyLink`  
**Format :** HTML stylisé  
**Contenu :**
- Message de remerciement
- Récapitulatif de la demande
- Signature EazyLink

---

## 🛠️ Configuration SMTP (Recommandé)

Par défaut, WordPress utilise `mail()` PHP qui peut être bloqué.

### Plugin Recommandé : WP Mail SMTP

1. **Installer** : WordPress Admin > Extensions > Ajouter
2. **Rechercher** : "WP Mail SMTP"
3. **Activer** et configurer avec :
   - Gmail
   - SendGrid
   - Mailgun
   - SMTP personnalisé

### Test d'Envoi

```php
// Ajouter temporairement dans functions.php
$test = wp_mail('votre-email@example.com', 'Test', 'Message de test');
var_dump($test); // true = OK, false = Erreur
```

---

## 🧪 Messages d'Erreur et Solutions

| Message | Cause | Solution |
|---------|-------|----------|
| ✅ Message envoyé | Succès | Rien à faire |
| ❌ Champs obligatoires | Champ vide | Remplir nom, email, message |
| ❌ Email invalide | Format incorrect | Vérifier l'email |
| ❌ Confidentialité requise | Case non cochée | Cocher la case |
| ⚠️ Spam détecté | Honeypot rempli | Bot bloqué (normal) |
| ⚠️ reCAPTCHA échoué | Score < 0.5 | Comportement suspect |
| ⚠️ Session expirée | Nonce invalide | Rafraîchir la page |
| ❌ Erreur d'envoi | wp_mail() échoué | Configurer SMTP |

---

## 🔍 Débogage

### Activer les Logs WordPress

**Ajouter dans `wp-config.php` :**

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

**Consulter :** `/wp-content/debug.log`

### Vérifier la Table

**Via phpMyAdmin :**

1. Ouvrir la base de données WordPress
2. Chercher la table `wp_eazylink_contacts`
3. Vérifier qu'elle existe et contient les colonnes

**Via SQL :**

```sql
SHOW TABLES LIKE 'wp_eazylink_contacts';
SELECT * FROM wp_eazylink_contacts ORDER BY created_at DESC LIMIT 10;
```

### Tester reCAPTCHA

**Console du navigateur (F12) :**

1. Aller sur `/contact/`
2. Soumettre le formulaire
3. Chercher : `grecaptcha` dans les logs
4. Vérifier le score retourné

---

## 📈 Fonctionnalités Avancées (Optionnelles)

### Export CSV

Ajouter un bouton d'export dans la page admin pour télécharger tous les contacts en CSV.

**Code à ajouter :** Voir `CONFIGURATION-FORMULAIRE-CONTACT.md`

### Intégration CRM

Connecter le formulaire à :
- Zapier
- Make (Integromat)
- N8N
- HubSpot
- Salesforce

**Via webhook :** Ajouter `wp_remote_post()` après l'insertion en BDD.

### Notifications Slack

Recevoir une notification Slack à chaque nouveau message.

**Code :** Voir documentation complète.

### Auto-réponse Personnalisée

Personnaliser l'email de confirmation selon le sujet choisi.

---

## ✅ Checklist de Vérification

### Installation

- [ ] Table `wp_eazylink_contacts` créée
- [ ] Email de réception configuré
- [ ] Clés reCAPTCHA ajoutées (optionnel)
- [ ] Plugin SMTP installé (recommandé)

### Tests

- [ ] Formulaire accessible sur `/contact/`
- [ ] Soumission réussie avec message de succès
- [ ] Email administrateur reçu
- [ ] Email de confirmation client reçu
- [ ] Message visible dans Admin > Contacts
- [ ] Statut "Nouveau" affiché correctement
- [ ] Action "Marquer lu" fonctionne
- [ ] Action "Supprimer" fonctionne

### Sécurité

- [ ] Honeypot actif (champ caché)
- [ ] Nonce WordPress vérifié
- [ ] reCAPTCHA configuré (optionnel)
- [ ] Validation email active
- [ ] Case confidentialité obligatoire
- [ ] IP tracking fonctionnel

---

## 🆘 Support et Ressources

### Documentation

- **Configuration complète :** `CONFIGURATION-FORMULAIRE-CONTACT.md`
- **Guide reCAPTCHA :** `RECAPTCHA-CONFIG.md`
- **Ce fichier :** `FORMULAIRE-CONTACT-README.md`

### Liens Utiles

- **reCAPTCHA Admin :** https://www.google.com/recaptcha/admin
- **WP Mail SMTP :** https://wordpress.org/plugins/wp-mail-smtp/
- **Documentation WordPress :** https://developer.wordpress.org/

### En Cas de Problème

1. Vérifier les logs (`/wp-content/debug.log`)
2. Tester `wp_mail()` avec un script simple
3. Vérifier que la table existe dans phpMyAdmin
4. Consulter la console du navigateur (F12)
5. Vérifier la configuration SMTP

---

## 📝 Notes Importantes

### Conformité RGPD

- ✅ Case de consentement obligatoire
- ✅ Lien vers politique de confidentialité
- ✅ Données stockées de manière sécurisée
- ✅ Possibilité de suppression des données
- ⚠️ Ajouter une page de politique de confidentialité si absente

### Performance

- Le formulaire utilise reCAPTCHA v3 (invisible, pas de friction)
- Les emails sont envoyés de manière asynchrone
- La table est indexée pour des requêtes rapides

### Maintenance

- Nettoyer régulièrement les anciens messages
- Vérifier les statistiques reCAPTCHA
- Surveiller les logs d'erreurs
- Mettre à jour les clés si compromises

---

## 🎉 Félicitations !

Votre formulaire de contact est maintenant **100% opérationnel** avec :

- ✅ Collecte de données sécurisée
- ✅ Protection anti-spam multi-niveaux
- ✅ Stockage en base de données
- ✅ Envoi d'emails automatique
- ✅ Interface d'administration complète
- ✅ Conformité RGPD

**Prochaines étapes suggérées :**

1. Configurer SMTP pour garantir la délivrabilité
2. Ajouter les clés reCAPTCHA pour une protection maximale
3. Personnaliser les emails selon votre charte graphique
4. Intégrer avec votre CRM (optionnel)

---

**Dernière mise à jour :** 3 octobre 2025  
**Version :** 1.0.0  
**Auteur :** EazyLink Development Team
