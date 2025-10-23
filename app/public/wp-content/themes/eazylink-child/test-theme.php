<?php
/**
 * Test si le thème enfant est actif
 */

// Afficher des informations de debug
echo '<div style="position: fixed; top: 0; left: 0; background: red; color: white; padding: 10px; z-index: 9999;">';
echo 'THÈME ACTIF: ' . get_template() . '<br>';
echo 'THÈME ENFANT: ' . get_stylesheet() . '<br>';
echo 'RÉPERTOIRE THÈME: ' . get_stylesheet_directory() . '<br>';
echo '</div>';
