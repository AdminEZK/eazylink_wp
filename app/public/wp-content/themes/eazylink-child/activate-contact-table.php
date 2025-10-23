<?php
/**
 * Script d'activation de la table de contacts
 * À exécuter une seule fois pour créer la table
 */

// Charger WordPress
// Chemin corrigé pour la structure Local by Flywheel
require_once(__DIR__ . '/../../../wp-load.php');

// Vérifier les permissions
if (!current_user_can('manage_options')) {
    die('Accès refusé. Vous devez être administrateur.');
}

// Créer la table
global $wpdb;
$table_name = $wpdb->prefix . 'eazylink_contacts';
$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE IF NOT EXISTS $table_name (
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
    PRIMARY KEY  (id),
    KEY email (email),
    KEY created_at (created_at)
) $charset_collate;";

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);

// Vérifier si la table existe
$table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activation Table Contacts - EazyLink</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #1a1a3e 0%, #2d1b69 50%, #ff006e 100%);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px;
            max-width: 600px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        h1 {
            color: #FF7043;
            margin-bottom: 20px;
        }
        .status {
            font-size: 48px;
            margin: 20px 0;
        }
        .success {
            color: #4ade80;
        }
        .error {
            color: #f87171;
        }
        .info {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            text-align: left;
        }
        .info strong {
            color: #FF7043;
        }
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #FF7043 0%, #ff006e 100%);
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            margin-top: 20px;
            transition: transform 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        code {
            background: rgba(0, 0, 0, 0.3);
            padding: 2px 8px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($table_exists) : ?>
            <div class="status success">✅</div>
            <h1>Table créée avec succès !</h1>
            <div class="info">
                <p><strong>Nom de la table :</strong> <code><?php echo esc_html($table_name); ?></code></p>
                <p><strong>Statut :</strong> Opérationnelle</p>
                <p><strong>Prochaine étape :</strong> Configurer les clés reCAPTCHA (optionnel)</p>
            </div>
            <a href="<?php echo admin_url('admin.php?page=eazylink-contacts'); ?>" class="btn">Voir les Contacts</a>
            <a href="<?php echo home_url('/contact/'); ?>" class="btn">Tester le Formulaire</a>
        <?php else : ?>
            <div class="status error">❌</div>
            <h1>Erreur de création</h1>
            <div class="info">
                <p><strong>Problème :</strong> La table n'a pas pu être créée.</p>
                <p><strong>Solution :</strong> Vérifiez les permissions de la base de données.</p>
            </div>
            <a href="<?php echo admin_url(); ?>" class="btn">Retour au Dashboard</a>
        <?php endif; ?>
        
        <div class="info" style="margin-top: 40px;">
            <h3 style="color: #FF7043; margin-top: 0;">📋 Informations</h3>
            <p><strong>Structure de la table :</strong></p>
            <ul style="text-align: left; font-size: 14px;">
                <li>ID (auto-increment)</li>
                <li>Nom, Email, Entreprise, Téléphone</li>
                <li>Sujet, Message</li>
                <li>IP, User Agent</li>
                <li>Statut (new/read)</li>
                <li>Date de création</li>
            </ul>
        </div>
        
        <p style="margin-top: 30px; font-size: 14px; opacity: 0.8;">
            ⚠️ Vous pouvez supprimer ce fichier après l'activation
        </p>
    </div>
</body>
</html>
