/** @type {import('tailwindcss').Config} */
import tailwindForm from '@tailwindcss/forms'
import colors from 'tailwindcss/colors'

export default {
  content: [
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],
  darkMode: 'selector',
  theme: {
    extend: {},
    colors: {
      ...colors,
      cgreen: {
        300: '#68eefd',
        500: '#04e2fb',
        600: '#03b5c9',
        800: '#028391',

      },
    },
  },
  plugins: [
    tailwindForm,
  ],
}
