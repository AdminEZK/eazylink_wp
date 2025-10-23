# 📧 Configuration du Formulaire de Contact EazyLink

## ✅ Fonctionnalités Implémentées

### 1. **Collecte des Données**
- ✅ Nom (obligatoire)
- ✅ Email (obligatoire avec validation)
- ✅ Entreprise (optionnel)
- ✅ Téléphone (optionnel)
- ✅ Sujet (demande générale / demande de devis)
- ✅ Message (obligatoire)
- ✅ Case confidentialité (obligatoire)

### 2. **Sécurité**
- ✅ **Nonce WordPress** : Protection CSRF
- ✅ **Honeypot** : Champ caché anti-spam
- ✅ **Google reCAPTCHA v3** : Vérification invisible (optionnel)
- ✅ **Validation des données** : Sanitization complète
- ✅ **Vérification email** : Format valide requis

### 3. **Stockage des Données**
- ✅ **Base de données WordPress** : Table `wp_eazylink_contacts`
- ✅ Stockage de toutes les informations du formulaire
- ✅ IP et User-Agent pour traçabilité
- ✅ Statut (nouveau/lu) pour gestion
- ✅ Date de création automatique

### 4. **Envoi d'Emails**
- ✅ **Email à l'administrateur** : Notification de nouveau message
- ✅ **Email de confirmation au client** : Accusé de réception
- ✅ **Format HTML** : Emails stylisés et professionnels
- ✅ **Reply-To** : Réponse directe au client

### 5. **Interface d'Administration**
- ✅ **Page dédiée** : Menu "Contacts" dans WordPress admin
- ✅ **Liste des messages** : Tableau avec toutes les soumissions
- ✅ **Actions** : Marquer lu / Supprimer
- ✅ **Indicateur visuel** : Nouveaux messages en surbrillance

---

## 🔧 Configuration Requise

### Étape 1 : Créer la Table de Base de Données

La table se crée automatiquement au changement de thème. Pour la créer manuellement :

```php
// Exécuter cette fonction une fois
eazylink_create_contact_table();
```

Ou via phpMyAdmin :

```sql
CREATE TABLE IF NOT EXISTS wp_eazylink_contacts (
    id bigint(20) NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    company varchar(255) DEFAULT NULL,
    phone varchar(50) DEFAULT NULL,
    subject varchar(255) DEFAULT NULL,
    message text NOT NULL,
    ip_address varchar(100) DEFAULT NULL,
    user_agent text DEFAULT NULL,
    privacy_accepted tinyint(1) DEFAULT 1,
    status varchar(20) DEFAULT 'new',
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY email (email),
    KEY created_at (created_at)
);
```

### Étape 2 : Configurer l'Email de Réception

Par défaut, les emails sont envoyés à l'adresse admin WordPress. Pour changer :

**Modifier dans `functions.php` ligne 919 :**

```php
$to = 'hello@eazylink.fr'; // Remplacer par votre email
```

### Étape 3 : Configurer Google reCAPTCHA v3 (Optionnel mais Recommandé)

#### 3.1 Obtenir les Clés reCAPTCHA

1. Aller sur : https://www.google.com/recaptcha/admin/create
2. Choisir **reCAPTCHA v3**
3. Ajouter votre domaine (ex: eazylink.fr)
4. Copier la **Clé du site** et la **Clé secrète**

#### 3.2 Ajouter les Clés dans functions.php

**Modifier dans `functions.php` lignes 763-764 :**

```php
define('EAZYLINK_RECAPTCHA_SITE_KEY', 'VOTRE_CLE_SITE_ICI');
define('EAZYLINK_RECAPTCHA_SECRET_KEY', 'VOTRE_CLE_SECRETE_ICI');
```

**Exemple :**
```php
define('EAZYLINK_RECAPTCHA_SITE_KEY', '6LdXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
define('EAZYLINK_RECAPTCHA_SECRET_KEY', '6LdYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY');
```

> **Note :** Si vous laissez les clés vides, le formulaire fonctionnera sans reCAPTCHA (protection honeypot uniquement).

---

## 📊 Accéder aux Messages de Contact

### Dans l'Administration WordPress

1. Connectez-vous au **WordPress Admin**
2. Cliquez sur **"Contacts"** dans le menu latéral (icône email)
3. Vous verrez la liste de tous les messages reçus

### Fonctionnalités de la Page Admin

- **Nouveaux messages** : Surlignés en jaune avec indicateur "● Nouveau"
- **Marquer lu** : Change le statut en "✓ Lu"
- **Supprimer** : Supprime définitivement le message
- **Email cliquable** : Cliquez pour répondre directement
- **Tri** : Par date décroissante (plus récent en premier)

---

## 🔐 Sécurité et Protection Anti-Spam

### Protections Actives

1. **Nonce WordPress** : Empêche les attaques CSRF
2. **Honeypot** : Champ caché qui piège les bots
3. **reCAPTCHA v3** : Score de confiance (0.5 minimum)
4. **Validation serveur** : Tous les champs sont vérifiés
5. **Sanitization** : Nettoyage de toutes les données
6. **IP Tracking** : Traçabilité des soumissions

### Messages d'Erreur

| Code | Message | Cause |
|------|---------|-------|
| `success` | ✅ Message envoyé | Tout s'est bien passé |
| `validation_error` | ❌ Champs obligatoires manquants | Nom, email ou message vide |
| `invalid_email` | ❌ Email invalide | Format email incorrect |
| `privacy_required` | ❌ Confidentialité requise | Case non cochée |
| `spam` | ⚠️ Détecté comme spam | Honeypot rempli |
| `recaptcha_failed` | ⚠️ Vérification échouée | Score reCAPTCHA < 0.5 |
| `invalid_nonce` | ⚠️ Session expirée | Nonce invalide |
| `send_error` | ❌ Erreur d'envoi | Problème wp_mail() |

---

## 📧 Configuration SMTP (Recommandé)

Par défaut, WordPress utilise la fonction PHP `mail()` qui peut être bloquée par certains hébergeurs.

### Installer un Plugin SMTP

**Option 1 : WP Mail SMTP (Recommandé)**

1. Installer le plugin **WP Mail SMTP**
2. Configurer avec Gmail, SendGrid, Mailgun, etc.
3. Tester l'envoi d'email

**Option 2 : Configuration Manuelle**

Ajouter dans `wp-config.php` :

```php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'votre-email@gmail.com');
define('SMTP_PASS', 'votre-mot-de-passe-app');
define('SMTP_FROM', 'noreply@eazylink.fr');
define('SMTP_NAME', 'EazyLink');
```

---

## 🎨 Personnalisation des Emails

### Email Administrateur

**Modifier dans `functions.php` lignes 920-941 :**

```php
$email_subject = '[EazyLink] Nouveau message de contact - ' . $subject;
$email_body = '<html>...</html>'; // Personnaliser le HTML
```

### Email Client (Confirmation)

**Modifier dans `functions.php` lignes 955-966 :**

```php
$client_subject = 'Confirmation de réception - EazyLink';
$client_body = '<html>...</html>'; // Personnaliser le HTML
```

### Désactiver l'Email de Confirmation

**Commenter les lignes 953-974 dans `functions.php` :**

```php
// if ($mail_sent) {
//     $client_subject = '...';
//     ...
//     wp_mail($email, $client_subject, $client_body, $client_headers);
// }
```

---

## 🧪 Tests et Débogage

### Tester le Formulaire

1. Aller sur `/contact/`
2. Remplir le formulaire
3. Vérifier :
   - ✅ Message de succès affiché
   - ✅ Email reçu dans la boîte admin
   - ✅ Email de confirmation reçu
   - ✅ Message dans WordPress Admin > Contacts

### Déboguer les Problèmes d'Email

**Activer les logs WordPress :**

Ajouter dans `wp-config.php` :

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

Consulter le fichier : `/wp-content/debug.log`

**Tester wp_mail() :**

```php
$test = wp_mail('votre-email@example.com', 'Test', 'Message de test');
var_dump($test); // true = succès, false = échec
```

---

## 📋 Checklist de Configuration

- [ ] Table `wp_eazylink_contacts` créée
- [ ] Email de réception configuré (ligne 919)
- [ ] Clés reCAPTCHA ajoutées (lignes 763-764) *(optionnel)*
- [ ] Plugin SMTP installé et configuré *(recommandé)*
- [ ] Test d'envoi de formulaire réussi
- [ ] Email administrateur reçu
- [ ] Email de confirmation reçu
- [ ] Messages visibles dans WordPress Admin > Contacts

---

## 🚀 Fonctionnalités Avancées (Optionnelles)

### Export CSV des Contacts

Ajouter un bouton d'export dans la page admin :

```php
// Fonction à ajouter dans functions.php
function eazylink_export_contacts_csv() {
    global $wpdb;
    $contacts = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}eazylink_contacts");
    
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="contacts-eazylink.csv"');
    
    $output = fopen('php://output', 'w');
    fputcsv($output, array('ID', 'Nom', 'Email', 'Entreprise', 'Téléphone', 'Sujet', 'Message', 'Date'));
    
    foreach ($contacts as $contact) {
        fputcsv($output, (array) $contact);
    }
    
    fclose($output);
    exit;
}
```

### Intégration CRM (Zapier, Make, N8N)

Le formulaire peut être connecté à un CRM via webhook :

```php
// Ajouter après l'insertion en BDD (ligne 916)
wp_remote_post('https://hooks.zapier.com/hooks/catch/XXXXX/', array(
    'body' => json_encode(array(
        'name' => $name,
        'email' => $email,
        'company' => $company,
        'message' => $message
    ))
));
```

### Notifications Slack

```php
// Envoyer une notification Slack
wp_remote_post('https://hooks.slack.com/services/YOUR/WEBHOOK/URL', array(
    'body' => json_encode(array(
        'text' => "Nouveau contact : $name ($email) - $subject"
    ))
));
```

---

## 📞 Support

Pour toute question ou problème :

1. Vérifier les logs WordPress (`/wp-content/debug.log`)
2. Tester l'envoi d'email avec un plugin SMTP
3. Vérifier que la table existe dans phpMyAdmin
4. Consulter la documentation reCAPTCHA si problème de validation

---

**Dernière mise à jour :** 3 octobre 2025  
**Version :** 1.0.0
