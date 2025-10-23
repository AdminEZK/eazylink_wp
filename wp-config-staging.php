<?php
/**
 * Configuration WordPress pour l'environnement STAGING
 * À renommer en wp-config.php sur le serveur staging
 */

// ** Configuration Base de Données STAGING ** //
/** Nom de la base de données */
define( 'DB_NAME', 'dabe3350_staging' );

/** Nom d'utilisateur MySQL */
define( 'DB_USER', 'dabe3350_staging' ); // À adapter selon votre hébergeur

/** Mot de passe MySQL */
define( 'DB_PASSWORD', 'VOTRE_MOT_DE_PASSE_BDD' ); // À remplir

/** Serveur MySQL */
define( 'DB_HOST', 'localhost' ); // Ou l'adresse fournie par votre hébergeur

/** Charset de la base de données */
define( 'DB_CHARSET', 'utf8' );

/** Type de collation */
define( 'DB_COLLATE', '' );

/**
 * Clés d'authentification uniques et salts
 * IMPORTANT : Générez de nouvelles clés sur https://api.wordpress.org/secret-key/1.1/salt/
 */
define('AUTH_KEY',         'NOUVELLE_CLE_A_GENERER');
define('SECURE_AUTH_KEY',  'NOUVELLE_CLE_A_GENERER');
define('LOGGED_IN_KEY',    'NOUVELLE_CLE_A_GENERER');
define('NONCE_KEY',        'NOUVELLE_CLE_A_GENERER');
define('AUTH_SALT',        'NOUVELLE_CLE_A_GENERER');
define('SECURE_AUTH_SALT', 'NOUVELLE_CLE_A_GENERER');
define('LOGGED_IN_SALT',   'NOUVELLE_CLE_A_GENERER');
define('NONCE_SALT',       'NOUVELLE_CLE_A_GENERER');

/**
 * Préfixe des tables WordPress
 */
$table_prefix = 'wp_';

/**
 * Configuration spécifique STAGING
 */
// URL du site staging
define('WP_HOME', 'https://staging.eazylink.fr');
define('WP_SITEURL', 'https://staging.eazylink.fr');

// Désactiver l'édition de fichiers dans l'admin
define('DISALLOW_FILE_EDIT', true);

// Mode debug pour staging
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

// Forcer HTTPS
define('FORCE_SSL_ADMIN', true);

// Désactiver les mises à jour automatiques
define('AUTOMATIC_UPDATER_DISABLED', true);

/* C'est tout, ne pas modifier au-delà de cette ligne ! */

/** Chemin absolu vers le répertoire de WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once ABSPATH . 'wp-settings.php';
