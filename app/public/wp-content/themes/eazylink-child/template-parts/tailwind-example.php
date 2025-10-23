<?php
/**
 * Template part pour démontrer l'utilisation de Tailwind CSS
 *
 * @package EazyLink_Child
 */
?>

<section class="bg-gradient-to-r from-blue-night to-deep-purple py-16">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-4xl font-bold text-white mb-6">Exemple d'utilisation de Tailwind CSS</h2>
      <p class="text-lg text-white/80 mb-10">Cette section utilise les classes Tailwind CSS pour le styling et la mise en page.</p>
      
      <div class="flex flex-wrap justify-center gap-4">
        <a href="#" class="btn-primary">Bouton Principal</a>
        <a href="#" class="btn-secondary">Bouton Secondaire</a>
        <a href="#" class="btn-outline">Bouton Outline</a>
      </div>
    </div>
  </div>
</section>

<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12">Cartes avec Tailwind CSS</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Carte 1 -->
      <div class="card">
        <div class="bg-bright-orange/10 p-4 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-bright-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-3 text-center">Solution Rapide</h3>
        <p class="text-gray-600 text-center">Utilisez les classes utilitaires de Tailwind pour un développement rapide et efficace.</p>
      </div>
      
      <!-- Carte 2 -->
      <div class="card">
        <div class="bg-accent-pink/10 p-4 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-accent-pink" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-3 text-center">Design Personnalisé</h3>
        <p class="text-gray-600 text-center">Personnalisez facilement les couleurs, les espacements et les typographies selon votre design system.</p>
      </div>
      
      <!-- Carte 3 -->
      <div class="card">
        <div class="bg-light-purple/10 p-4 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-light-purple" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-3 text-center">Responsive Design</h3>
        <p class="text-gray-600 text-center">Créez des interfaces adaptatives avec les préfixes responsive de Tailwind (sm, md, lg, xl).</p>
      </div>
    </div>
  </div>
</section>

<section class="py-16 bg-blue-night text-white">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto">
      <div class="flex flex-col md:flex-row items-center gap-8">
        <div class="md:w-1/2">
          <h2 class="text-3xl font-bold mb-6">Intégration avec votre design system</h2>
          <p class="mb-6">Tailwind CSS a été configuré pour s'intégrer parfaitement avec votre design system existant, en utilisant les mêmes couleurs, espacements et typographies.</p>
          <div class="flex gap-4">
            <a href="#" class="btn-primary">En savoir plus</a>
          </div>
        </div>
        <div class="md:w-1/2 grid grid-cols-2 gap-4">
          <div class="h-24 bg-bright-orange rounded-lg flex items-center justify-center">
            <span class="font-semibold">bright-orange</span>
          </div>
          <div class="h-24 bg-accent-pink rounded-lg flex items-center justify-center">
            <span class="font-semibold">accent-pink</span>
          </div>
          <div class="h-24 bg-deep-purple rounded-lg flex items-center justify-center">
            <span class="font-semibold">deep-purple</span>
          </div>
          <div class="h-24 bg-light-purple rounded-lg flex items-center justify-center">
            <span class="font-semibold">light-purple</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
