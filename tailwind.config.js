module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
         extend: {
              colors: {
                  'main': '#373F4F',
                  'accent': '#0EC0FC',
                  'alert': '#ED1C24',
                  'addition-color': '#F2F6FA',
                  'addition-dark-color': '#C4C4C4',
              },
         },
    },
    plugins: [],
}
