module.exports = {
  purge: [
      './resources/**/*.blade.php'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {
        opacity: ['disabled'],
    },
  },
  corePlugins: {
   borderRadius: false,
  },
  plugins: [],
}
