/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/*.blade.php",
    "./resources/views/components/*.blade.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

