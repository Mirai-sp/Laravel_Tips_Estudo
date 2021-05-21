const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

// neste exemplo estaria unificando dois arquivos que estariam dentro de resources/views/css (reset.css e style.css) e unificando em um unico arquivo dentro da public/site/css
// mix.styles([
//         'resources/views/site/css/reset.css',
//         'resources/vies/site/css/style.css'
//     ], 'public/site/css/style.css').version();

// para rodar as modificacoes ou seja compilar este webpack, o production ele mimifica o conteudo
//npm run dev
//npm run production

// vou colocado acima o .version para evitar erro de cache, ou seja a cada compilaçao sera mudado o final do nome do arquivo, consequentemente o import do asset tbm deve ser importado
// com a tag correspondente, portanto usar o metodo mix ao invez de somente assets, ex:]
// <link rel="stylesheet" href="{{ url(mix('/site/css/style.css)) }}"