<?php
/**
 * Composant FAQ réutilisable
 * 
 * Usage: 
 * $faqs = array(
 *     array(
 *         'question' => 'Votre question ici',
 *         'answer' => 'Votre réponse ici'
 *     ),
 *     // ... autres questions
 * );
 * 
 * include(get_stylesheet_directory() . '/template-parts/faq-component.php');
 */

if (!defined('ABSPATH')) {
    exit;
}

// Debug messages removed

// FAQ par défaut si aucune n'est fournie
if (!isset($faqs) || empty($faqs)) {
    $faqs = array(
        array(
            'question' => 'Comment puis-je vous contacter ?',
            'answer' => 'Vous pouvez nous contacter via notre <a href="' . home_url('/contact/') . '">page de contact</a> ou par email à contact@eazylink.fr'
        ),
        array(
            'question' => 'Quels sont vos délais de réponse ?',
            'answer' => 'Nous nous engageons à répondre à toutes les demandes dans un délai de 24h ouvrées.'
        )
    );
}

// Titre de section optionnel
$section_title = isset($section_title) ? $section_title : 'Questions Fréquentes';
$section_subtitle = isset($section_subtitle) ? $section_subtitle : '';
?>

<section class="faq-section">
    <div class="container">
        <?php if ($section_title): ?>
            <div class="section-header">
                <h2><?php echo esc_html($section_title); ?></h2>
                <?php if ($section_subtitle): ?>
                    <p><?php echo esc_html($section_subtitle); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <?php foreach ($faqs as $faq): ?>
            <details class="faq-item">
                <summary><?php echo esc_html($faq['question']); ?></summary>
                <div class="answer">
                    <p><?php echo wp_kses_post($faq['answer']); ?></p>
                </div>
            </details>
        <?php endforeach; ?>
    </div>
</section>
