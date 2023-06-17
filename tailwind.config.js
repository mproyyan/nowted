/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#181818",
        secondary: "#1C1C1C",
        tertiary: "#272727",
        gactive: "#333333",
        bactive: "#312EB5",
        gtext: "#979797"
      }
    },
  },
  plugins: [],
}

