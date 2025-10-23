<?php
/**
 * Script de Test du Système de Contact
 * URL: /wp-content/themes/eazylink-child/test-contact-system.php
 */

// Charger WordPress
// Chemin corrigé pour la structure Local by Flywheel
require_once(__DIR__ . '/../../../wp-load.php');

// Vérifier les permissions
if (!current_user_can('manage_options')) {
    die('Accès refusé. Vous devez être administrateur.');
}

// Tests
$tests = array();

// Test 1: Vérifier que la table existe
global $wpdb;
$table_name = $wpdb->prefix . 'eazylink_contacts';
$table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;
$tests['table'] = array(
    'name' => 'Table de base de données',
    'status' => $table_exists,
    'message' => $table_exists ? "Table '$table_name' existe" : "Table '$table_name' n'existe pas"
);

// Test 2: Vérifier les colonnes de la table
if ($table_exists) {
    $columns = $wpdb->get_results("SHOW COLUMNS FROM $table_name");
    $required_columns = array('id', 'name', 'email', 'message', 'created_at', 'status');
    $column_names = array_map(function($col) { return $col->Field; }, $columns);
    $has_all_columns = count(array_intersect($required_columns, $column_names)) === count($required_columns);
    
    $tests['columns'] = array(
        'name' => 'Structure de la table',
        'status' => $has_all_columns,
        'message' => $has_all_columns ? count($columns) . ' colonnes présentes' : 'Colonnes manquantes'
    );
}

// Test 3: Vérifier les clés reCAPTCHA
$has_site_key = defined('EAZYLINK_RECAPTCHA_SITE_KEY') && !empty(EAZYLINK_RECAPTCHA_SITE_KEY);
$has_secret_key = defined('EAZYLINK_RECAPTCHA_SECRET_KEY') && !empty(EAZYLINK_RECAPTCHA_SECRET_KEY);
$tests['recaptcha'] = array(
    'name' => 'Configuration reCAPTCHA',
    'status' => $has_site_key && $has_secret_key,
    'message' => $has_site_key && $has_secret_key ? 'Clés configurées' : 'Clés non configurées (optionnel)'
);

// Test 4: Vérifier que les hooks sont enregistrés
$has_hooks = has_action('admin_post_eazylink_contact') && has_action('admin_post_nopriv_eazylink_contact');
$tests['hooks'] = array(
    'name' => 'Hooks WordPress',
    'status' => $has_hooks,
    'message' => $has_hooks ? 'Hooks enregistrés' : 'Hooks manquants'
);

// Test 5: Tester wp_mail (simulation)
$mail_function_exists = function_exists('wp_mail');
$tests['mail'] = array(
    'name' => 'Fonction wp_mail',
    'status' => $mail_function_exists,
    'message' => $mail_function_exists ? 'Fonction disponible' : 'Fonction manquante'
);

// Test 6: Vérifier le template de contact
$template_path = get_stylesheet_directory() . '/page-contact.php';
$template_exists = file_exists($template_path);
$tests['template'] = array(
    'name' => 'Template de contact',
    'status' => $template_exists,
    'message' => $template_exists ? 'Template trouvé' : 'Template manquant'
);

// Test 7: Compter les messages existants
if ($table_exists) {
    $message_count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
    $tests['messages'] = array(
        'name' => 'Messages en base',
        'status' => true,
        'message' => $message_count . ' message(s) enregistré(s)'
    );
}

// Test 8: Vérifier la page admin
$admin_page_exists = function_exists('eazylink_contacts_page');
$tests['admin'] = array(
    'name' => 'Page d\'administration',
    'status' => $admin_page_exists,
    'message' => $admin_page_exists ? 'Page admin disponible' : 'Page admin manquante'
);

// Calculer le score global
$total_tests = count($tests);
$passed_tests = count(array_filter($tests, function($test) { return $test['status']; }));
$score_percentage = round(($passed_tests / $total_tests) * 100);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Système de Contact - EazyLink</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #1a1a3e 0%, #2d1b69 50%, #ff006e 100%);
            color: white;
            min-height: 100vh;
            padding: 40px 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .header h1 {
            color: #FF7043;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .score {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .score-circle {
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            font-weight: bold;
            background: conic-gradient(
                #4ade80 0% <?php echo $score_percentage; ?>%,
                rgba(255, 255, 255, 0.1) <?php echo $score_percentage; ?>% 100%
            );
        }
        
        .score-inner {
            width: 130px;
            height: 130px;
            background: #1a1a3e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .tests {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .test-item {
            display: flex;
            align-items: center;
            padding: 20px;
            margin-bottom: 15px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease;
        }
        
        .test-item:hover {
            transform: translateX(5px);
        }
        
        .test-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-right: 20px;
            flex-shrink: 0;
        }
        
        .test-icon.success {
            background: rgba(74, 222, 128, 0.2);
            color: #4ade80;
        }
        
        .test-icon.warning {
            background: rgba(251, 191, 36, 0.2);
            color: #fbbf24;
        }
        
        .test-content {
            flex: 1;
        }
        
        .test-name {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }
        
        .test-message {
            opacity: 0.8;
            font-size: 0.9rem;
        }
        
        .actions {
            margin-top: 30px;
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn {
            display: inline-block;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.3s ease;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #FF7043 0%, #ff006e 100%);
            color: white;
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .info-box {
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 12px;
            padding: 20px;
            margin-top: 30px;
        }
        
        .info-box h3 {
            color: #60a5fa;
            margin-bottom: 10px;
        }
        
        .info-box ul {
            list-style: none;
            padding-left: 0;
        }
        
        .info-box li {
            padding: 5px 0;
            padding-left: 25px;
            position: relative;
        }
        
        .info-box li:before {
            content: "→";
            position: absolute;
            left: 0;
            color: #60a5fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🧪 Test du Système de Contact</h1>
            <p>Vérification de la configuration EazyLink</p>
        </div>
        
        <div class="score">
            <div class="score-circle">
                <div class="score-inner">
                    <?php echo $score_percentage; ?>%
                </div>
            </div>
            <h2><?php echo $passed_tests; ?>/<?php echo $total_tests; ?> tests réussis</h2>
            <p style="opacity: 0.8; margin-top: 10px;">
                <?php 
                if ($score_percentage === 100) {
                    echo "✅ Système parfaitement configuré !";
                } elseif ($score_percentage >= 75) {
                    echo "⚠️ Configuration presque complète";
                } else {
                    echo "❌ Configuration incomplète";
                }
                ?>
            </p>
        </div>
        
        <div class="tests">
            <h2 style="margin-bottom: 20px;">Résultats des Tests</h2>
            
            <?php foreach ($tests as $key => $test) : ?>
                <div class="test-item">
                    <div class="test-icon <?php echo $test['status'] ? 'success' : 'warning'; ?>">
                        <?php echo $test['status'] ? '✓' : '⚠'; ?>
                    </div>
                    <div class="test-content">
                        <div class="test-name"><?php echo esc_html($test['name']); ?></div>
                        <div class="test-message"><?php echo esc_html($test['message']); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="actions">
            <a href="<?php echo home_url('/contact/'); ?>" class="btn btn-primary">Tester le Formulaire</a>
            <a href="<?php echo admin_url('admin.php?page=eazylink-contacts'); ?>" class="btn btn-secondary">Voir les Contacts</a>
            <a href="<?php echo admin_url(); ?>" class="btn btn-secondary">Dashboard WordPress</a>
        </div>
        
        <?php if ($score_percentage < 100) : ?>
        <div class="info-box">
            <h3>📋 Actions Recommandées</h3>
            <ul>
                <?php if (!$table_exists) : ?>
                    <li>Créer la table de base de données (voir activate-contact-table.php)</li>
                <?php endif; ?>
                
                <?php if (!$has_site_key || !$has_secret_key) : ?>
                    <li>Configurer les clés reCAPTCHA (voir RECAPTCHA-CONFIG.md)</li>
                <?php endif; ?>
                
                <?php if (!$has_hooks) : ?>
                    <li>Vérifier que functions.php est bien chargé</li>
                <?php endif; ?>
                
                <?php if (!$template_exists) : ?>
                    <li>Vérifier que page-contact.php existe dans le thème</li>
                <?php endif; ?>
            </ul>
        </div>
        <?php endif; ?>
        
        <div class="info-box" style="margin-top: 20px;">
            <h3>📚 Documentation</h3>
            <ul>
                <li>FORMULAIRE-CONTACT-README.md - Guide complet</li>
                <li>CONFIGURATION-FORMULAIRE-CONTACT.md - Configuration détaillée</li>
                <li>RECAPTCHA-CONFIG.md - Guide reCAPTCHA</li>
            </ul>
        </div>
        
        <p style="text-align: center; margin-top: 40px; opacity: 0.6; font-size: 14px;">
            ⚠️ Supprimez ce fichier après les tests (sécurité)
        </p>
    </div>
</body>
</html>
