<?php
/**
 * DEBUG - Afficher les CSS chargés
 * Ajouter ce code temporairement dans header.php pour voir quels CSS sont chargés
 */

echo "<!-- DEBUG CSS LOADING -->\n";
echo "<!-- is_front_page: " . (is_front_page() ? 'YES' : 'NO') . " -->\n";
echo "<!-- is_home: " . (is_home() ? 'YES' : 'NO') . " -->\n";
echo "<!-- is_page_template: " . (is_page_template() ? get_page_template_slug() : 'NO') . " -->\n";
echo "<!-- body_class: " . implode(' ', get_body_class()) . " -->\n";

global $wp_styles;
if (isset($wp_styles->queue)) {
    echo "<!-- CSS FILES ENQUEUED:\n";
    foreach ($wp_styles->queue as $handle) {
        if (isset($wp_styles->registered[$handle])) {
            echo "  - " . $handle . ": " . $wp_styles->registered[$handle]->src . "\n";
        }
    }
    echo "-->\n";
}
?>
