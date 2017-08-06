const {mix} = require('laravel-mix');

// mix.browserSync('st.com');
mix.less('resources/assets/less/main.less', 'public/css');
