/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.php',
    './js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        'blue-night': '#1a1a3e',
        'deep-purple': '#2d1b69',
        'bright-orange': '#FF7043',
        'accent-pink': '#ff006e',
        'light-orange': '#FF8A65',
        'dark-orange': '#E64A19',
        'light-purple': '#8B5CF6',
      },
      fontFamily: {
        'heading': ['Montserrat', 'sans-serif'],
        'body': ['Inter', 'sans-serif'],
      },
      spacing: {
        'xs': '4px',
        'sm': '8px',
        'md': '16px',
        'lg': '24px',
        'xl': '48px',
        '2xl': '64px',
        '3xl': '96px',
      },
      borderRadius: {
        'sm': '4px',
        'md': '8px',
        'lg': '16px',
        'xl': '50px',
      },
    },
  },
  plugins: [],
  // Empêche Tailwind de réinitialiser les styles par défaut
  corePlugins: {
    preflight: false,
  },
}
