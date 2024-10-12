/** @type {import('tailwindcss').Config} */
import tailwindForm from '@tailwindcss/forms'
export default {
  content: [
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],
  darkMode: 'selector',
  theme: {
    extend: {},
  },
  plugins: [
    tailwindForm,
  ],
}
